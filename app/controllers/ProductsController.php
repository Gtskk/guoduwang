<?php

class ProductsController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($cat = 0)
	{
		$cats = array($cat);
		//当前类别信息
		$curcat = Category::find($cat);
		//当前类别父类
		if($curcat && $curcat->parent != 0){
			$cats[] = $curcat->parent;
			$curcat = Category::find($curcat->parent);
		}
		//菜单统一读取顶级类别子类别
		$menus = Category::whereIn('parent', $cats)->get();
		//子类别
		$children = Category::where('parent', $cat)->get();
		//类别IDs
		$cats = array($cat);
		if($children){
			foreach ($children as $child) {
				$cats[] = $child->id;
			}
		}
		//产品
		$products = DB::table('single_categories')->join('products', 'object_id', '=', 'id')->whereIn('category_id', $cats)->select('products.*')->paginate(16);

		$datas['curcat'] = $curcat;
		$datas['children'] = $menus;
		$datas['products'] = $products;

        return View::make('theme::products.index', compact('datas'));
	}

	/**
	 * Show a product
	 *
	 * @return Response
	 */
	public function show($id){
		$product = Product::find($id);
		return View::make('products.show', compact('product'));
	}

}
