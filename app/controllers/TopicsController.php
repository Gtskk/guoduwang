<?php

use Gtskk\Core\CreatorListener;
use Gtskk\FormValidators\TopicCreationForm;
use Gtskk\Storage\Topic\TopicInterface as Topic;

class TopicsController extends BaseController implements CreatorListener
{
    protected $topic;

    public function __construct(Topic $topic)
    {
        parent::__construct();

        $this->beforeFilter('auth', ['except' => ['index', 'show']]);
        $this->topic = $topic;
    }

    public function index()
    {
        $page = Input::get('page', 1);
        $perPage = Config::get('site.topic_per_page');

        $filter = $this->topic->getTopicFilter();
        $pagiData = $this->topic->getTopicsWithFilter($filter, $page);
        $topics = Paginator::make(
            $pagiData->items,
            $pagiData->totalItems,
            $perPage
        );
        $nodes = Node::allLevelUp();

        return View::make('theme::topics.index', compact('topics', 'nodes'));
    }

    public function create()
    {
        $node = Node::find(Input::get('node_id'));
        $nodes = Node::allLevelUp();

        return View::make('theme::topics.create_edit', compact('nodes', 'node'));
    }

    public function store()
    {
        return App::make('Gtskk\Creators\TopicCreator')->create($this, Input::except('_token'));
    }

    public function show($id)
    {
        $data = $this->topic->showTopicDetail($id);

        return View::make('theme::topics.show', $data);
    }

    public function edit($id)
    {
        $topic = $this->topic->findOrFail($id);
        $this->authorOrAdminPermissioinRequire($topic->user_id);
        $nodes = Node::allLevelUp();
        $node = $topic->node;

        $topic->body = $topic->body_original;

        return View::make('theme::topics.create_edit', compact('topic', 'nodes', 'node'));
    }

    public function update($id)
    {
        $topic = $this->topic->findOrFail($id);
        $data = Input::only('title', 'body', 'node_id');

        $this->authorOrAdminPermissioinRequire($topic->user_id);

        $markdown = new Markdown;
        $data['body_original'] = $data['body'];
        $data['body'] = $markdown->convertMarkdownToHtml($data['body']);
        $data['excerpt'] = $this->topic->makeExcerpt($data['body']);

        // Validation
        App::make('Gtskk\Forms\TopicCreationForm')->validate($data);

        $topic->update($data);

        Flash::success(lang('Operation succeeded.'));
        return Redirect::route('topics.show', $topic->id);
    }

    /**
     * ----------------------------------------
     * Member Topic Vote function
     * ----------------------------------------
     */

    public function upvote($id)
    {
        if(Request::ajax())
        {
            $resp = array();
            $topic = $this->topic->findOrFail($id);
            if(Confide::user()->id == $topic->member_id)
            {
                $resp['status'] = 'fail';
                $resp['message'] = lang('Can not vote your feedback');
            }
            else
            {
                App::make('Gtskk\Vote\Voter')->topicUpVote($topic);
                $resp['status'] = 'success';
                $resp['message'] = $topic->vote_count ?: '';
            }
            
            die(json_encode($resp));
        }
    }

    public function downvote($id)
    {
        $resp = array();
        $topic = $this->topic->findOrFail($id);
        if(Confide::user()->id == $topic->member_id)
        {
            $resp['status'] = 'fail';
            $resp['message'] = lang('Can not downvote your feedback');
        }
        else
        {
            App::make('Gtskk\Vote\Voter')->topicDownVote($topic);
            $resp['status'] = 'success';
            $resp['message'] = $topic->vote_count ?: '';
        }
        
        die(json_encode($resp));
    }

    /**
     * ----------------------------------------
     * Admin Topic Management
     * ----------------------------------------
     */

    public function recomend($id)
    {
        $topic = $this->findOrFail($id);
        $topic->is_excellent = (!$topic->is_excellent);
        $topic->save();
        Notification::notify('topic_mark_excellent', Confide::user(), $topic->member, $topic);
        die(json_encode(array('status'=>'success', 'message'=>'')));
    }

    public function pin($id)
    {
        $topic = $this->findOrFail($id);
        ($topic->order > 0) ? $topic->decrement('order', 1) : $topic->increment('order', 1);
        die(json_encode(array('status'=>'success', 'message'=>'')));
    }

    public function sink($id)
    {
        $topic = $this->findOrFail($id);
        ($topic->order >= 0) ? $topic->decrement('order', 1) : $topic->increment('order', 1);
        die(json_encode(array('status'=>'success', 'message'=>'')));
    }

    public function destroy($id)
    {
        $topic = $this->findOrFail($id);
        $topic->delete();
        die(json_encode(array('status'=>'success', 'message'=>'')));
    }

    public function uploadImage()
    {
        if (Input::get('_folder') && $file = Input::file('file'))
        {
            $folder = Input::get('_folder');
            $allowed_extensions = ["png", "jpg", "gif"];
            if ( $file->getClientOriginalExtension() && !in_array($file->getClientOriginalExtension(), $allowed_extensions) ){
                return ['error' => '只能上传jpg，png或者gif格式的.'];
            }

            $fileName        = $file->getClientOriginalName();
            $extension       = $file->getClientOriginalExtension() ?: 'png';
            $folderName      = '/uploads/'.$folder.'/'.date("Ym", time()) .'/'.date("d", time()) .'/'. Confide::user()->id;
            $destinationPath = public_path() . $folderName;
            $safeName        = str_random(10).'.'.$extension;
            $file->move($destinationPath, $safeName);

            // If is not gif file, we will try to reduse the file size
            if ($file->getClientOriginalExtension() != 'gif')
            {
                // open an image file
                $img = Image::make($destinationPath . '/' . $safeName);
                // prevent possible upsizing
                $img->resize(1440, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
                
                // finally we save the image as a new file
                $img->save();
            }
            $filename = $folderName .'/'. $safeName;

            if($folder == 'avatars') {
                $img->resize(206, 206);
                // 自动保存到数据库
                Member::where('id', '=', Input::get('_userid'))->update(array('image_url'=>$filename));
            }

            $data['filename'] = $filename;
        }
        else
        {
            $data['error'] = '上传文件出错';
        }
        return $data;
    }
    

    /**
     * ----------------------------------------
     * CreatorListener Delegate
     * ----------------------------------------
     */

    public function creatorFailed($errors)
    {
        return Redirect::to('/');
    }

    public function creatorSucceed($topic)
    {
        Flash::success(lang('Operation succeeded.'));

        return Redirect::route('topics.show', array($topic->id));
    }
}