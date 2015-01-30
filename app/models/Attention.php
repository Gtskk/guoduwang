<?php

class Attention extends \Eloquent {
	protected $fillable = [];

	public function post()
	{
		return $this->belogsTo('Post');
	}

	public function member()
    {
        return $this->belongsTo('Member');
    }

    public static function isUserAttentedTopic(Member $member, Topic $topic)
    {
    	return Attention::where('member_id', $member->id)
    					->where('topic_id', $topic->id)
    					->first();
    }
}