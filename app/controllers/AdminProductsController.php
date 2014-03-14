<?php
use Stevemo\Cpanel\Controllers\BaseController;
class AdminProductsController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$products = DB::table('products')->orderby('id', 'desc')->paginate(30);
		foreach ($products as $key => &$value) {
			$value->thumbnail = str_replace('full', '60x70', $value->thumbnail);
			$value->top_img = str_replace('full', '60x70', $value->top_img);
		}
        return View::make('admin.products.index', compact('products'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('admin.products.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$img = $this->save_file(Input::file('thumbnail'));
		$top_img = $this->save_file(Input::file('top_img'));
		$inputs = Input::only('brand','style', 'specification', 'process', 'top_status', 'unit');
		$inputs['thumbnail'] = $img;
		$inputs['top_img'] = $top_img;


		$product = Product::create($inputs);
        if ( !$product->errors()->all() )
        {
        	// Category infos
			$allcats = Category::all();
			foreach ($allcats as $key => $value) {
				if(Input::has('category_'.($key+1))){
					$product->categories()->save($value);
				}
			}

            return Redirect::route('admin.products.index')
                ->with('success', Lang::get('cpanel::products.create_success'));
        }

        return Redirect::back()
            ->withInput()
            ->withErrors($product->errors());
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$product = Product::find($id);

		if (is_null($product))
        {
            App::abort(404);
        }

		$cats = array();
		// Category infos
		$allcats = Category::all();
		foreach ($product->categories as $value) {
			foreach ($allcats as $key => $cat) {
				if($value->id == $cat->id){
					$cats['category_'.($key+1)] = true;
				}
			}
		}

        return View::make('admin.products.edit', compact('product'))->with('cats', $cats);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$product = Product::find($id);

		$img = $this->save_file(Input::file('thumbnail'));
		$top_img = $this->save_file(Input::file('top_img'));
		if($img == ''){
			$img = $product->thumbnail;
		}
		if($top_img == ''){
			$top_img = $product->top_img;
		}
		$inputs = Input::only('brand','style', 'specification', 'process', 'category', 'top_status', 'unit');
		$inputs['thumbnail'] = $img;
		$inputs['top_img'] = $top_img;

		$product->update($inputs);
		if ( !$product->errors()->all() )
        {
        	// Category infos
        	// Firstly deleting existed category records
        	Relation::where('object_id', $id)->delete();
        	// Add new category records
        	$allcats = Category::all();
			foreach ($allcats as $key => $value) {
				if(Input::has('category_'.$key)){
					$product->categories()->save($value);
				}
			}

            return Redirect::route('admin.products.index')
                ->with('success', Lang::get('cpanel::products.update_success'));
        }

        return Redirect::back()
            ->withInput()
            ->withErrors($product->errors());
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		// Update relations
		Relation::where('object_id', $id)->delete();
		Product::destroy($id);

		return Redirect::route('admin.products.index')
            ->with('success',Lang::get('cpanel::common.delete_success'));
	}

}