<?php
use LaravelBook\Ardent\Ardent;
class Post extends Ardent {
	protected $guarded = array();

	public static $rules = array(
		'title' => 'required|min:1',
		'slug' => 'required',
		'body' => 'required'
	);
}
