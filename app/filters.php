<?php

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/

App::before(function($request)
{
	//
});


App::after(function($request, $response)
{
	//
});

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::guest('members/login');
});


Route::filter('auth.basic', function()
{
	return Auth::basic();
});

/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/

Route::filter('guest', function()
{
	if (Auth::check()) return Redirect::to('/');
});

/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/

Route::filter('csrf', function()
{
	if (Session::token() !== Input::get('_token'))
	{
		throw new Illuminate\Session\TokenMismatchException;
	}
});

Route::filter('manage_topics', function()
{
    if (! Entrust::can('manage_topics') ) // Checks the current user
    {
        return Redirect::to('members/login');
    }
});

Route::filter('manage_users', function()
{
    if (! Entrust::can('manage_users') ) // Checks the current user
    {
        return Redirect::to('members/login');
    }
});


if(!App::isLocal())
{
	// 缓存视图
	Route::filter('cache', function($route, $request, $response = null)
	{
		$key = 'route-'.Str::slug(Request::url());
		if(is_null($response) && Cache::has($key))
		{
		    return Cache::get($key);
		}
		elseif(!is_null($response) && !Cache::has($key))
		{
		    Cache::put($key, $response->getContent(), 30);
		}
	});


	// 存储sql到日志中
	Event::listen('illuminate.query', function($query, $bindings, $time, $name)
	{
	    $data = compact('bindings', 'time', 'name');

	    // Format binding data for sql insertion
	    foreach ($bindings as $i => $binding)
	    {
	        if ($binding instanceof \DateTime)
	        {
	            $bindings[$i] = $binding->format('\'Y-m-d H:i:s\'');
	        }
	        else if (is_string($binding))
	        {
	            $bindings[$i] = "'$binding'";
	        }
	    }

	    // Insert bindings into query
	    $query = str_replace(array('%', '?'), array('%%', '%s'), $query);
	    $query = vsprintf($query, $bindings);

	    Log::info($query, $data);
	});
}