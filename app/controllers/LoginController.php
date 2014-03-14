<?php

class LoginController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return View::make('members.login');
	}

	public function post_login(){
		$user_details = Input::all();
		$rules = array('username' => 'required', 'password' => 'required');
		$validation = Validator::make($user_details, $rules);
		if($validation->fails()){
			return Redirect::to('login')->with_errors($validation);
		}

		if(!Auth::attempt($user_details)){
			return Redirect::to('login')->with_errors('error', 'Cannot login');
		}

		if(Auth::check()){
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
	            return Redirect::to('/');

	        }else{//if user account is disabled
	            return Redirect::to('login')
	                ->with('error', 'Disabled users cannot login');
	        }
		}
	}

}
