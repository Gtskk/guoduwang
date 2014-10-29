<?php

class LoginController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if(Sentry::check()){
			return Redirect::to('/');
		}else{
			return View::make('theme::members.login');
		}
	}

	public function post_login(){
		$user_details = Input::only('username', 'password');
		$rules = array('username' => 'required', 'password' => 'required');
		$validation = Validator::make($user_details, $rules);
		if($validation->fails()){
			return Redirect::to('login')->withErrors($validation);
		}

		$remember = Input::get('remember');

		try
		{
		    // Find the user using the user id
		    $user = Sentry::authenticate($user_details, $remember);
		}
		catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
		{
		    echo 'Login field is required.';
		}
		catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
		{
		    echo 'Password field is required.';
		}
		catch (Cartalyst\Sentry\Users\WrongPasswordException $e)
		{
		    echo 'Wrong password, try again.';
		}
		catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
		{
		    echo 'User was not found.';
		}
		catch (Cartalyst\Sentry\Users\UserNotActivatedException $e)
		{
		    echo 'User is not activated.';
		}

		// The following is only required if the throttling is enabled
		catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e)
		{
		    echo 'User is suspended.';
		}
		catch (Cartalyst\Sentry\Throttling\UserBannedException $e)
		{
		    echo 'User is banned.';
		}
	}


	public function logout()
	{
		Sentry::logout();
		return Redirect::to('login');
	}

}
