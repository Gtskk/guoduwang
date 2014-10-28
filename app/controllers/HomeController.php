<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| pluck you started. To route to this controller, just add the route:
	|
	|	Route::pluck('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome(){

		return View::make('theme::index');
		// return View::make('index', compact('datas'));
	}

	public function comment(){
		return View::make('comment');
	}

	public function comment_ajax(){

		$input = Input::all();
		$comment = Comment::create($input);

		if($comment->errors()){
			$status = 0;
			$info = '';
			$errors = $comment->errors()->all();
			foreach ($errors as $error) {
				$info .= $error.'<br />';
			}
		}else{
			$status = 1;
			$info = '提交成功';
		}

		die(json_encode(array('status' => $status, 'info' => $info)));
	}

}