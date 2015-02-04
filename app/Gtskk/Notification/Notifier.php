<?php namespace Gtskk\Notification;

use Gtskk\Forms\ReplyCreationForm;
use Gtskk\Core\CreatorListener;
use Gtskk\Notification\Mention;
use Reply, Topic, Notification, Carbon, Member;

class Notifier
{
    public $notifiedMembers = [];

    public function newReplyNotify(Member $fromMember, Mention $mentionParser, Topic $topic, Reply $reply)
    {
        // Notify the author
        Notification::batchNotify(
                    'new_reply',
                    $fromMember,
                    $this->removeDuplication([$topic->member]),
                    $topic,
                    $reply);

        // Notify attented users
        Notification::batchNotify(
                    'attention',
                    $fromMember,
                    $this->removeDuplication($topic->attentedBy),
                    $topic,
                    $reply);

        // Notify mentioned users
        Notification::batchNotify(
                    'at',
                    $fromMember,
                    $this->removeDuplication($mentionParser->members),
                    $topic,
                    $reply);
    }

    // in case of a user get a lot of the same notification
    public function removeDuplication($members)
    {
        $notYetNotifyUsers = [];
        foreach ($members as $member)
        {
            if (!in_array($member->id, $this->notifiedMembers))
            {
                $notYetNotifyUsers[] = $member;
                $this->notifiedMembers[] = $member->id;
            }
        }
        return $notYetNotifyUsers;
    }
}