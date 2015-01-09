<?php

class Reply extends Eloquent {

	protected $fillable = [
		'body',
		'user_id',
        'topic_id',
		'body_original',
	];

    /*public static function boot()
    {
        parent::boot();

        static::created(function($topic)
        {
            SiteStatus::newReply();
        });
    }*/

	public function member()
	{
		return $this->belongsTo('Member');
	}

	public function topic()
	{
		return $this->belongsTo('Topic');
	}

	public function scopeWhose($query, $user_id)
	{
        return $query->where('user_id','=',$user_id)->with('topic');
    }

    public function scopeRecent($query)
    {
        return $query->orderBy('created_at','desc');
    }
}