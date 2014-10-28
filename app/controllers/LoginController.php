<?php

class LoginController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if(Auth::check()){
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

		$user_details['status'] = 1;
		$remember = Input::get('remember');

		if(!Auth::attempt($user_details, $remember)){
			Session::flash('error', '用户名或密码错误或账户被禁用');
			return Redirect::to('login');
		}else{
			$user = Auth::user();

			//save user details into session
            Session::put('period_id', $user->period_id);
            Session::put('current_user', $user->username);
            Session::put('current_user_id', $user->id);

            return Redirect::intended('/');
		}

		/*if(Auth::check()){
			$user_id = Auth::user()->id;

			 //get user data
	        $user = DB::table('members')
	                ->where('id', '=', $user_id)
	        ->first(array( 'period_id', 'username', 'status'));

	        $username = $user->username;
	        $status = $user->status;

	        if($status == 1){ //check if user account is enabled
	            $period_id = $user->period_id;

	            //save user details into session
	            Session::put('period_id', $period_id);
	            Session::put('current_user', $username);
	            Session::put('current_user_id', $user_id);

	            //redirect user to his departments homepage
	            return Redirect::intended('/');

	        }else{//if user account is disabled
	            return Redirect::to('login')
	                ->with('error', '禁用的用户不能登陆');
	        }
		}*/
	}


	public function logout()
	{
		Auth::logout();
		return Redirect::to('login');
	}

}
