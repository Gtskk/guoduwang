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

# ------------------ Route patterns---------------------
Route::pattern('id', '[0-9]+');


Route::resource('topics', 'TopicsController');
Route::resource('members', 'MembersController');
Route::resource('nodes', 'NodesController');


//后台路由
Route::group(array('prefix' => 'admin', 'before' => 'auth.cpanel|cache', 'after'=>'cache'), function(){
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
Route::get('/', 'PagesController@showWelcome');
Route::get('/about', array(
	'as' => 'about',
	'uses' => 'PagesController@about'
));
// Confide routes
Route::get('members/login', 'MembersController@login');
Route::post('members/login', 'MembersController@doLogin');
Route::get('members/confirm/{code}', 'MembersController@confirm');
Route::get('members/forgot_password', 'MembersController@forgotPassword');
Route::post('members/forgot_password', 'MembersController@doForgotPassword');
Route::get('members/reset_password/{token}', 'MembersController@resetPassword');
Route::post('members/reset_password', 'MembersController@doResetPassword');
Route::get('members/logout', 'MembersController@logout');