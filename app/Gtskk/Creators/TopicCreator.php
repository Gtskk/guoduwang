<?php namespace Gtskk\Creators;

use Laracasts\Validation\FormValidationException;
use Gtskk\Forms\TopicCreationForm;
use Gtskk\Core\CreatorListener;
use Gtskk\Notification\Mention;
use Confide, Topic, Carbon, App, Markdown, Redirect;

class TopicCreator
{
    protected $form;
    protected $mentionParser;

    public function __construct(TopicCreationForm $form, Mention $mentionParser)
    {
        $this->form = $form;
        $this->mentionParser = $mentionParser;
    }

    public function create(CreatorListener $observer, $data)
    {
        $data['member_id'] = Confide::user()->id;
        $data['node_id'] = $data['node_id'];
        $data['title'] = $data['title'];
        $data['body'] = $this->mentionParser->parse($data['body']);

        $markdown = new Markdown;
        $data['body_original'] = $data['body'];
        $data['body'] = $markdown->convertMarkdownToHtml($data['body']);

        $data['created_at'] = Carbon::now()->toDateTimeString();
        $data['updated_at'] = Carbon::now()->toDateTimeString();

        try
        {
            // Validation
            $this->form->validate($data);

            $topic = Topic::create($data);
            if (!$topic)
            {
                return $observer->creatorFailed($topic->getErrors());
            }
            $topic->member()->associate(Confide::user());
            $topic->node->increment('topic_count', 1);
            $topic->node->updated_at = Carbon::now()->toDateTimeString();
            $topic->push();

            return $observer->creatorSucceed($topic);
        }
        catch(FormValidationException $e)
        {
            return Redirect::back()->withInput()->withErrors($e->getErrors());
        }
    }
}