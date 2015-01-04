<?php
use LaravelBook\Ardent\Ardent;
class Comment extends Ardent {
	protected $guarded = array();

	public static $rules = array(
		'name' => 'required|min:3',
		'email' => 'required|between:3,64|email',
		'phone' => 'required|size:11',
		'comment' => 'required'
	);

	/**
	 * Get latest comments
	 */
	public static function getNewCommentsCountOfDay(){
		$comments = Comment::where('created_at', '>=', _getStartTime(mktime(0, 0, 0)))->where('created_at', '<=', _getEndTime(mktime(0, 0, 0)))->orderby('created_at', 'desc')->lists('created_at');

		// Process the create time
		foreach ($comments as &$value) {
			$value = convertTimeElapsedAsText(strtotime($value));
		}

		return $comments;
	}
}
