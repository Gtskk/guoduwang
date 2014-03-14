<?php
use Stevemo\Cpanel\Controllers\BaseController;
class AdminCategoriesController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($tax = 'product')
	{
		$categories = Category::where('taxonomy', $tax)->paginate(30);

        return View::make('admin.categories.index', compact('categories'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('admin.categories.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$img = $this->save_file(Input::file('thumbnail'), 60, 25, 'categories');
		//滚动图像
		$slides = array();
		if(Input::hasFile('slides')){
			foreach(Input::file('slides') as $file){
				$slides[] = $this->save_file($file, 50, 14, 'categories');
			}
		}
		$slide = serialize($slides);

		$inputs = Input::except('thumbnail', 'slides');
		$inputs['thumbnail'] = $img;
		$inputs['slides'] = $slide;

		$category = Category::create($inputs);
        if ( !$category->errors()->all() )
        {
            return Redirect::route('admin.categories.index')
                ->with('success', Lang::get('cpanel::common.create_success'));
        }

        return Redirect::back()
            ->withInput()
            ->withErrors($category->errors());
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$category = Category::find($id);
        return View::make('admin.categories.show', compact('category'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$category = Category::find($id);
        return View::make('admin.categories.edit', compact('category'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$category = Category::find($id);

		$img = $this->save_file(Input::file('thumbnail'), 60, 25, 'categories');
		if($img == ''){
			$img = $category->thumbnail;
		}
		//滚动图像
		$slides = array();
		if(Input::hasFile('slides')){
			foreach(Input::file('slides') as $file){
				$slides[] = $this->save_file($file, 50, 14, 'categories');
			}
		}
		$slide = serialize($slides);
		if(empty($slides)){
			$slide = $category->slides;
		}

		$credentials = Input::except('thumbnail', 'slides');
		$credentials['thumbnail'] = $img;
		$credentials['slides'] = $slide;

        if( $category->update($credentials) )
        {
            return Redirect::route('admin.categories.index')
                ->with('success', Lang::get('cpanel::common.update_success'));
        }

        return Redirect::back()
            ->withInput()
            ->withErrors($category->errors());
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Category::destroy($id);

		return Redirect::route('admin.categories.index')
            ->with('success',Lang::get('cpanel::common.delete_success'));
	}

}
