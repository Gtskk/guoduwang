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
Route::group(array('before' => 'auth'), function(){
	Route::get('/', 'HomeController@showWelcome');
	Route::resource('posts', 'PostsController', array('only' => array('index', 'show')));
	Route::get('comment', 'HomeController@comment');
	Route::post('/comment_ajax', array(
		'as' => 'home.comment',
		'uses' => 'HomeController@comment_ajax'
	));
});
Route::get('login', 'LoginController@index');
Route::post('login', 'LoginController@post_login');