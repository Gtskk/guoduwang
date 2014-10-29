<?php

class PostsController extends BaseController {
	public $type;
	public $menu;

	public function __construct(){
		if(Input::has('type')){
			$this->type = Input::get('type');
		}else{
			$this->type = 'post';
		}

		//菜单
		View::composer(array('theme::posts.index', 'theme::posts.show'), function($view){
			$menus = array(
				'最新活动' => array('route' => 'posts.index', 'param' => array('type' => 'new_act')),
				'主题活动' => array('route' => 'posts.index', 'param' => array('type' => 'theme_act')),
				'往期活动' => array('route' => 'posts.index', 'param' => array('type' => 'old_act'))
			);
			$view->with('menus', $menus);
		});
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

        $posts = Post::where('type', $this->type)->paginate(20);
        return View::make('theme::posts.index', compact('posts'));
	}

	/**
	 * Show a post
	 *
	 * @return Response
	 */
	public function show($id){
		$post = Post::find($id);
		return View::make('posts.show', compact('post'));
	}
}
