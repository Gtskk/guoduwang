<?php

use Gtskk\Core\CreatorListener;

class RepliesController extends BaseController implements CreatorListener
{
	public function __construct()
    {
        parent::__construct();
        $this->beforeFilter('auth');
    }

	public function store()
	{
		return App::make('Gtskk\Creators\ReplyCreator')->create($this, Input::except('_token'));
	}

    public function vote($id)
    {
        $resp = array();
        $reply = Reply::find($id);
        if(Confide::user()->id == $reply->member_id)
        {
            $resp['status'] = 'fail';
            $resp['message'] = lang('Can not vote your feedback');
        }
        else
        {
            App::make('Gtskk\Vote\Voter')->replyUpVote($reply);
            $resp['status'] = 'success';
            $resp['message'] = $reply->vote_count ?: '';
        }

        die(json_encode($resp));
    }

    public function destroy($id)
    {
        $resp = array('status'=>'fail','message'=>lang('permission_required'));
        $reply = Reply::findOrFail($id);
        if($this->authorOrAdminPermissioinRequire($reply->user_id))
        {
            $reply->delete();

            $reply->topic->decrement('reply_count', 1);
            $reply->topic->generateLastReplyUserInfo();

            $resp['status'] = 'success';
            $resp['message'] = $reply->topic->reply_count;
        }
        
        die(json_encode($resp));
    }

    /**
     * ----------------------------------------
     * CreatorListener Delegate
     * ----------------------------------------
     */

    public function creatorFailed($errors)
    {
    	Flash::error(lang('Operation failed.'));
        return Redirect::back();
    }

    public function creatorSucceed($reply)
    {
        Flash::success(lang('Operation succeeded.'));
        return Redirect::route('topics.show', array(Input::get('topic_id'), '#reply'.$reply->id));
    }

}