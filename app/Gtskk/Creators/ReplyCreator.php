<?php namespace Gtskk\Creators;

use Laracasts\Validation\FormValidationException;
use Gtskk\Forms\ReplyCreationForm;
use Gtskk\Core\CreatorListener;
use Gtskk\Notification\Mention;
use Gtskk\Notification\Notifier;
use Reply, Confide, Topic, Notification, Carbon, App, Markdown, Redirect;

class ReplyCreator
{
    protected $form;
    protected $mentionParser;

    public function __construct(ReplyCreationForm $form, Mention $mentionParser)
    {
        $this->form = $form;
        $this->mentionParser = $mentionParser;
    }

    public function create(CreatorListener $observer, $data)
    {
        $data['member_id'] = Confide::user()->id;
        $data['body'] = $this->mentionParser->parse($data['body']);

        $markdown = new Markdown;
        $data['body_original'] = $data['body'];
        $data['body'] = $markdown->convertMarkdownToHtml($data['body']);

        // Validation
        try
        {
            $this->form->validate($data);

            $reply = Reply::create($data);
            if ( ! $reply)
            {
                return $observer->creatorFailed($reply->getErrors());
            }
            $reply->member()->associate(Confide::user());
            $reply->save();

            // Add the reply user to topic table
            $topic = Topic::find($data['topic_id']);
            $topic->reply_count++;
            $topic->updated_at = Carbon::now()->toDateTimeString();
            $topic->last_reply_user_id = $data['member_id'];
            $topic->save();

            Confide::user()->increment('reply_count', 1);

            App::make('Gtskk\Notification\Notifier')->newReplyNotify(Confide::user(), $this->mentionParser, $topic, $reply);

            return $observer->creatorSucceed($reply);
        }
        catch(FormValidationException $e)
        {
            return Redirect::back()->withInput()->withErrors($e->getErrors());
        }
    }
}