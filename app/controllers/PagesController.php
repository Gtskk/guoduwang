<?php

class PagesController extends BaseController {

	public function showWelcome(){

		return View::make('theme::pages.index');
		// return View::make('index', compact('datas'));
	}


	/**
	 * 关于页面
	 */
	public function about()
	{
		return View::make('theme::pages.about');
	}


	/**
	 * 搜索，使用google的
	 */
	public function search()
	{
		$query = Purifier::clean(Input::get('q'));
		return Redirect::away('https://www.google.com/search?q=site:phphub.org ' . $query, 301);
	}

}