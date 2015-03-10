<?php

use Stevemo\Cpanel\Controllers\BaseController;

class AdminMembersController extends BaseController {

	private $type;

	public function __construct()
	{

		if(Input::has('type'))
		{
			$this->type = Input::get('type');
		}
		else
		{
			$this->type = 'post';
		}

		View::composer(array(
			'theme::admin.topics.index', 
			'theme::admin.topics.show', 
			'theme::admin.topics.create', 
			'admin.topics.edit'), function($view)
		{
			$view->with('type', Input::get('type'));
		});
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$topics = Post::where('type', $this->type)->paginate(20);
        return View::make('theme::admin.topics.index', compact('topics'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('theme::admin.topics.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$img = $this->save_file(Input::file('thumbnail'), 60, 25, 'topics');

		$inputs = Input::except('slug', 'thumbnail');
		$inputs['slug'] = Str::slug(Input::get('slug'));
		$inputs['thumbnail'] = $img;

		$post = Post::create($inputs);
        if ( !$post->errors()->all() )
        {
            return Redirect::route('admin.topics.index', array('type' => $this->type))
                ->with('success', Lang::get('cpanel::topics.create_success'));
        }

        return Redirect::back()
            ->withInput()
            ->withErrors($post->errors());
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$post = Post::find($id);
        return View::make('theme::admin.topics.show', compact('post'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$post = Post::find($id);

        return View::make('theme::admin.topics.edit', compact('post'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$post = Post::find($id);
		
		$img = $this->save_file(Input::file('thumbnail'), 60, 25, 'topics');
		if($img == ''){
			$img = $post->thumbnail;
		}

		$credentials = Input::except('slug', 'thumbnail');
		$credentials['slug'] = Str::slug(Input::get('slug'));
		$credentials['thumbnail'] = $img;

        if( $post->update($credentials) )
        {
            return Redirect::route('admin.topics.index', array('type' => $this->type))
                ->with('success', Lang::get('cpanel::topics.update_success'));
        }

        return Redirect::back()
            ->withInput()
            ->withErrors($post->errors());
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        Post::destroy($id);

        return Redirect::route('admin.topics.index', array('type' => $this->type))
            ->with('success',Lang::get('cpanel::topics.delete_success'));
	}

}
