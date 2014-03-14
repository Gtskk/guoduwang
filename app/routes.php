<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/*Route::get('/', function()
{
	return View::make('hello');
});*/


//后台路由
Route::group(array('prefix' => 'admin', 'before' => 'auth.cpanel'), function(){
	Route::resource('posts', 'AdminPostsController');
	Route::resource('comments', 'AdminCommentsController');
	Route::resource('products', 'AdminProductsController', array('except' => array('show')));
	Route::resource('categories', 'AdminCategoriesController', array('except' => array('show')));
});
/*//自定义404
App::missing(function($exception)
{
    return Response::view('errors.404', array(), 404);
});*/

//前台路由
Route::get('/', 'HomeController@showWelcome');
Route::get('login', 'LoginController@index');
Route::post('login', 'LoginController@post_login');
Route::get('product/{cat}', array('as' => 'product', 'uses' => 'ProductsController@index'))->where('cat', '[0-9]+');
Route::resource('posts', 'PostsController', array('only' => array('index', 'show')));
Route::get('comment', 'HomeController@comment');
Route::post('/comment_ajax', array(
	'as' => 'home.comment',
	'uses' => 'HomeController@comment_ajax'
));

// ===============================================
// STATIC PAGES ==================================
// ===============================================

Route::get('design', array('as' => 'design', function(){
	return View::make('static.design');
}));
Route::get('eight_02', array('as' => 'eight_02', function(){
	return View::make('static.eight_02');
}));
Route::get('eight_03', array('as' => 'eight_03', function(){
	return View::make('static.eight_03');
}));
Route::get('eight_04', array('as' => 'eight_04', function(){
	return View::make('static.eight_04');
}));
Route::get('eight_05', array('as' => 'eight_05', function(){
	return View::make('static.eight_05');
}));
Route::get('eight_06', array('as' => 'eight_06', function(){
	return View::make('static.eight_06');
}));
Route::get('eight_07', array('as' => 'eight_07', function(){
	return View::make('static.eight_07');
}));
Route::get('eight_08', array('as' => 'eight_08', function(){
	return View::make('static.eight_08');
}));
Route::get('service', array('as' => 'service', function(){
	return View::make('static.service');
}));
Route::get('team', array('as' => 'team', function(){
	return View::make('static.team');
}));
Route::get('question', array('as' => 'question', function(){
	return View::make('static.question');
}));
Route::get('about', array('as' => 'about', function(){
	return View::make('static.about');
}));
Route::get('findstore', array('as' => 'findstore', function(){
	return View::make('static.findstore');
}));