<?php

class Vote extends \Eloquent {
	protected $fillable = ['member_id', 'votable_id', 'votable_type', 'typeIs'];

	public function votable()
	{
		return $this->morphTo();
	}

	public function scopeByWhom($query, $user_id)
	{
        return $query->where('member_id','=',$user_id); 
    }

    public function scopeWithType($query, $type)
	{
        return $query->where('typeIs','=',$type); 
    }
}