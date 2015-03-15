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

//前台路由

Route::get('/', 'PagesController@showWelcome');
Route::get('/about', array(
	'as' => 'about',
	'uses' => 'PagesController@about'
));

/***************************************************/
/**************  Members Routes *******************/
/*************************************************/
Route::get('members/login', array(
	'as' => 'login-required',
	'uses' => 'MembersController@login'
));
Route::get('/members/githublogin', [
	'as' => 'githublogin',
	'uses' => 'MembersController@githublogin'
]);
Route::post('/members/ghostlogin', [
	'as' => 'ghostlogin',
	'uses' => 'MembersController@ghostlogin'
]);
Route::get('/members/ghostloginpage', [
	'as' => 'ghostloginpage',
	'uses' => 'MembersController@ghostloginpage'
]);
Route::post('members/login', 'MembersController@doLogin');
Route::get('members/confirm/{code}', 'MembersController@confirm');
Route::get('members/forgot_password', array(
	'as' => 'forgot_password',
	'uses' => 'MembersController@forgotPassword'
));
Route::post('members/forgot_password', 'MembersController@doForgotPassword');
Route::get('members/reset_password/{token}', 'MembersController@resetPassword');
Route::post('members/reset_password', 'MembersController@doResetPassword');
Route::get('members/logout', 'MembersController@logout');
Route::resource('members', 'MembersController');
Route::get('member-banned', [
    'as' => 'member-banned',
    'uses' => 'MembersController@memberBanned'
]);
Route::post('members/blocking/{id}',  [
	'as' => 'members.blocking',
	'uses' => 'MembersController@memberBlock',
	'before' => 'manage_users'
]);
Route::get('/members/{id}/replies', [
	'as' => 'members.replies',
	'uses' => 'MembersController@replies'
]);
Route::get('/members/{id}/topics', [
	'as' => 'members.topics',
	'uses' => 'MembersController@topics'
]);
Route::get('/members/{id}/favorites', [
	'as' => 'members.favorites',
	'uses' => 'MembersController@favorites'
]);

/****   Notifications Routes **/
Route::get('/notifications/count', [
	'before' => 'auth',
	'as' => 'notificationsCount',
	'uses' => 'NotificationsController@notificationsCount'
]);
Route::get('/notifications', [
	'as' => 'notifications.index',
	'uses' => 'NotificationsController@index'
]);

Route::delete('/notifications/{id}', [
	'as' => 'notifications.destroy',
	'uses' => 'NotificationsController@destroy'
]);



Route::post('upload_image', [
    'as' => 'upload_image',
    'uses' => 'TopicsController@uploadImage',
    'before' => 'auth'
]);

Route::post('/attentions/{id}', [
	'as' => 'attentions.createOrDelete',
	'uses' => 'AttentionsController@createOrDelete',
	'before' => 'auth'
]);
Route::post('/favorites/{id}', [
	'as' => 'favorites.createOrDelete',
	'uses' => 'FavoritesController@createOrDelete',
	'before' => 'auth'
]);
Route::resource('topics', 'TopicsController');


# ------------------ Topic Votes ------------------------
Route::group(['before' => 'auth'], function(){
	Route::post('/topics/{id}/upvote', [
		'as' => 'topics.upvote',
		'uses' => 'TopicsController@upvote',
	]);

	Route::post('/topics/{id}/downvote', [
		'as' => 'topics.downvote',
		'uses' => 'TopicsController@downvote',
	]);

	Route::post('/replies/{id}/vote', [
		'as' => 'replies.vote',
		'uses' => 'RepliesController@vote',
	]);
});
Route::get('feed', array(
	'as' => 'feed',
	'uses' => 'PagesController@feed'
));

Route::resource('nodes', 'NodesController');

/** Reply Routes */
Route::resource('replies', 'RepliesController', ['only' => ['store']]);
Route::delete('replies/delete/{id}',  [
	'as' => 'replies.destroy',
	'uses' => 'RepliesController@destroy',
	'before' => 'auth'
]);

# ------------------ 前台需要管理权限的路由 ------------------------
Route::group(['before' => 'manage_topics'], function(){
    Route::post('topics/recomend/{id}',  [
        'as' => 'topics.recomend',
        'uses' => 'TopicsController@recomend',
    ]);

    Route::post('topics/pin/{id}',  [
        'as' => 'topics.pin',
        'uses' => 'TopicsController@pin',
    ]);

    Route::delete('topics/delete/{id}',  [
        'as' => 'topics.destroy',
        'uses' => 'TopicsController@destroy',
    ]);

    Route::post('topics/sink/{id}',  [
        'as' => 'topics.sink',
        'uses' => 'TopicsController@sink',
    ]);
});

Route::group(['before' => 'manage_users'], function(){
	Route::post('users/blocking/{id}',  [
		'as' => 'users.blocking',
		'uses' => 'UsersController@blocking',
	]);
});



//后台路由
Route::group(array('prefix' => 'admin', 'before' => 'auth.cpanel|cache', 'after'=>'cache'), function(){

	/*
	|--------------------------------------------------------------------------
	| Cpanel Dashboard Routes
	|--------------------------------------------------------------------------
	|
	|
	*/
	Route::get('/', array(
	    'as'     => 'admin.dashboard.home',
	    'uses'   => 'AdminMembersController@dashboard',
	));

	/*
	|--------------------------------------------------------------------------
	| Admin Topics Routes
	|--------------------------------------------------------------------------
	|
	|
	*/
	Route::get('topics', array(
	    'as'     => 'admin.topics.index',
	    'uses'   => 'AdminTopicsController@index',
	));
	Route::get('topicsTrash', array(
	    'as'     => 'admin.topics.topicsTrash',
	    'uses'   => 'AdminTopicsController@topicsTrash',
	));
	Route::delete('topics/{id}', array(
	    'as'     => 'admin.topics.destroy',
	    'uses'   => 'AdminTopicsController@destroy',
	));
	Route::delete('topicsDestroy', array(
	    'as'     => 'admin.topics.destroyMany',
	    'uses'   => 'AdminTopicsController@destroyMany',
	));
	Route::put('topics/{id}', array(
	    'as'     => 'admin.topics.restore',
	    'uses'   => 'AdminTopicsController@restore',
	));
	Route::put('topicsRestore', array(
	    'as'     => 'admin.topics.restoreMany',
	    'uses'   => 'AdminTopicsController@restoreMany',
	));

	/*
	|--------------------------------------------------------------------------
	| Admin Members Routes
	|--------------------------------------------------------------------------
	|
	|
	*/
	Route::get('members', array(
	    'as'     => 'admin.members.index',
	    'uses'   => 'AdminMembersController@index',
	));
	Route::get('membersTrash', array(
	    'as'     => 'admin.members.membersTrash',
	    'uses'   => 'AdminMembersController@membersTrash',
	));
	Route::delete('members/{id}', array(
	    'as'     => 'admin.members.destroy',
	    'uses'   => 'AdminMembersController@destroy',
	));
	Route::delete('membersDestroy', array(
	    'as'     => 'admin.members.destroyMany',
	    'uses'   => 'AdminMembersController@destroyMany',
	));
	Route::put('members/{id}', array(
	    'as'     => 'admin.members.restore',
	    'uses'   => 'AdminMembersController@restore',
	));
	Route::put('membersRestore', array(
	    'as'     => 'admin.members.restoreMany',
	    'uses'   => 'AdminMembersController@restoreMany',
	));
});
//自定义404
App::missing(function($exception)
{
    return Response::view('theme::errors.404', array(), 404);
});
// 获取天气接口
// Route::get('api/weather', 'ApiController@weather');