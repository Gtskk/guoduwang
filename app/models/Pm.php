<?php

class Pm extends Eloquent {
	protected $guarded = array();

	public static $rules = array();

	public static function getUserUnreadMessages($userid){
		$messages = DB::table('pms')
			->select('pms.id', 'title', 'message', 'pms.created_at', 'users.id', 'users.first_name', 'users.last_name')
			->join('users', function($join){
				$join->on('user1', '=', 'users.id')
				     ->orOn('user2', '=', 'users.id');
			})
			->whereRaw("((user1 = ? and user1read='no' and user2 = users.id) or (user2 = ? and user2read = 'no' and user1 = users.id)) and id2 = '1'", array($userid, $userid))
		    ->orderBy('pms.created_at', 'desc')->get();

		// Process the create time
		foreach ($messages as &$message) {
			$message->created_at = Helpers::convertTimeElapsedAsText(strtotime($message->created_at));
		}

		return $messages;
	}

	/**
	 * Used for self-join
	 */
	public function pm(){
		return $this->hasOne('Pm');
	}
}
