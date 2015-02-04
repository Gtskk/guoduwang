<?php namespace Gtskk\Creators;

use Gtskk\Forms\ReplyCreationForm;
use Gtskk\Core\CreatorListener;
use Gtskk\Notification\Mention;
use Gtskk\Notification\Notifier;
use Reply, Confide, Topic, Notification, Carbon, App, Markdown;

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
        $this->form->validate($data);

        $reply = Reply::create($data);
        if ( ! $reply)
        {
            return $observer->creatorFailed($reply->getErrors());
        }

        // Add the reply user
        $topic = Topic::find($data['topic_id']);
        $topic->last_reply_user_id = Confide::user()->id;
        $topic->reply_count++;
        $topic->updated_at = Carbon::now()->toDateTimeString();
        $topic->save();

        Confide::user()->increment('reply_count', 1);

        App::make('Gtskk\Notification\Notifier')->newReplyNotify(Confide::user(), $this->mentionParser, $topic, $reply);

        return $observer->creatorSucceed($reply);
    }
}