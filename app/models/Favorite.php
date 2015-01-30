<?php

class Favorite extends \Eloquent {
	protected $fillable = [];

	public function post()
    {
        return $this->belongsTo('Post');
    }

    public function member()
    {
    	return $this->belongsTo('Member');
    }

    public static function isUserFavoritedTopic(Member $member, Topic $topic)
    {
    	return Favorite::where('member_id', $member->id)
    					->where('topic_id', $topic->id)
    					->first();
    }
}