<?php
use LaravelBook\Ardent\Ardent;
class Product extends Ardent {

	protected $guarded = array();
	
	public function categories(){
		
		return $this->belongsToMany('Category', 'single_categories', 'object_id', 'category_id');
	}

}