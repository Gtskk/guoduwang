<?php
use LaravelBook\Ardent\Ardent;
class Category extends Ardent {
	protected $guarded = array();

	public static $rules = array(
		'name' => 'required'
	);

	public static function getCategories($excepts = array()){
		$res = array();
		$res[0] = Lang::get('cpanel::common.please_choose');
		$cates = Category::all();

		if($excepts){
			$cates = Category::whereNotIn('id', $excepts)->get();
		}
		
		foreach ($cates as $key => $value) {
			$res[$value->id] = $value->name;
		}

		return $res;
	}

	public function products(){

		return $this->belongsToMany('Product', 'single_categories', 'category_id', 'object_id');
	}

	
}
