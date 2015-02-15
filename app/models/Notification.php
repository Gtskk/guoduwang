<?php

use Laracasts\Presenter\PresentableTrait;

class Notification extends \Eloquent
{
    use PresentableTrait;
    public $presenter = 'Gtskk\Presenters\MemberPresenter';

	// Don't forget to fill this array
	protected $fillable = [
			'from_member_id',
			'member_id',
			'topic_id',
			'reply_id',
			'body',
			'type'
			];

	public function member()
	{
		return $this->belongsTo('Member');
	}

	public function topic()
	{
		return $this->belongsTo('Topic');
	}

	public function fromMember()
	{
		return $this->belongsTo('Member', 'from_member_id');
	}

	/**
	 * Create a notification
	 * @param  [type] $type     currently have 'at', 'new_reply', 'attention'
	 * @param  Member   $fromMember come from who
	 * @param  array   $members   to who, array of members
	 * @param  Topic  $topic    cuurent context
	 * @param  Reply  $reply    the content
	 * @return [type]           none
	 */
	public static function batchNotify($type, Member $fromMember, $members, Topic $topic, Reply $reply = null)
	{
		$nowTimestamp = Carbon::now()->toDateTimeString();
		$data = [];

		foreach ($members as $toMember)
		{
			if ($fromMember->id == $toMember->id)
				continue;

			$data[] = [
				'from_member_id' => $fromMember->id,
				'member_id'      => $toMember->id,
				'topic_id'     => $topic->id,
				'reply_id'     => $reply->id,
				'body'         => $reply->body,
				'type'         => $type,
				'created_at'   => $nowTimestamp,
				'updated_at'   => $nowTimestamp
			];

			$toMember->increment('notification_count', 1);
		}

        if (count($data)) {
            Notification::insert($data);
        }
	}

    public function scopeRecent($query)
    {
        return $query->orderBy('created_at','desc');
    }

    public static function notify($type, Member $fromMember, Member $toMember, Topic $topic, Reply $reply = null)
    {
        if ($fromMember->id == $toMember->id)
            return;

        if (Notification::isNotified($fromMember->id, $toMember->id, $topic->id, $type))
            return;

        $nowTimestamp = Carbon::now()->toDateTimeString();


        $data[] = [
            'from_member_id' => $fromMember->id,
            'member_id'      => $toMember->id,
            'topic_id'     => $topic->id,
            'reply_id'     => $reply ? $reply->id : 0,
            'body'         => $reply ? $reply->body : '',
            'type'         => $type,
            'created_at'   => $nowTimestamp,
            'updated_at'   => $nowTimestamp
        ];

        $toMember->increment('notification_count', 1);

        Notification::insert($data);
    }

    public static function isNotified($from_member_id, $member_id, $topic_id, $type)
    {
        $notifys = Notification::fromwhom($from_member_id)
                        ->toWhom($member_id)
                        ->atTopic($topic_id)
                        ->withType($type)->get();
        return $notifys->count();
    }

    public function scopeFromWhom($query, $from_member_id)
    {
        return $query->where('from_member_id', '=', $from_member_id);
    }

    public function scopeToWhom($query, $member_id)
    {
        return $query->where('member_id', '=', $member_id);
    }

    public function scopeWithType($query, $type)
    {
        return $query->where('type', '=', $type);
    }

    public function scopeAtTopic($query, $topic_id)
    {
        return $query->where('topic_id', '=', $topic_id);
    }


}