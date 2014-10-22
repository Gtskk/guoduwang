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

		//卫生间推荐
		$wsjChildren = Category::where('parent', 1)->orWhere('id', 1)->lists('id');
		$weishengjian = $wsjChildren ? $DB::table('single_categories')->join('products', 'object_id', '=', 'id')->whereIn('category_id', $wsjChildren)->where('top_status', 1)->take(1)->pluck('top_img') : '';
		//客厅推荐
		$ktChildren = Category::where('parent', 5)->orWhere('id', 5)->lists('id');
		$keting = $ktChildren ? DB::table('single_categories')->join('products', 'object_id', '=', 'id')->whereIn('category_id', $ktChildren)->where('top_status', 1)->take(1)->pluck('top_img') : '';
		//卧室推荐
		$wsChildren = Category::where('parent', 4)->orWhere('id', 4)->lists('id');
		$woshi = $wsChildren ? DB::table('single_categories')->join('products', 'object_id', '=', 'id')->whereIn('category_id', $wsChildren)->where('top_status', 1)->take(1)->pluck('top_img') : '';
		//阳台推荐
		$ytChildren = Category::where('parent', 6)->orWhere('id', 6)->lists('id');
		$yangtai = $ytChildren ? DB::table('single_categories')->join('products', 'object_id', '=', 'id')->whereIn('category_id', $ytChildren)->where('top_status', 1)->take(1)->pluck('top_img') : '';
		//厨房推荐
		$cfChildren = Category::where('parent', 2)->orWhere('id', 2)->lists('id');
		$chufang = $cfChildren ? DB::table('single_categories')->join('products', 'object_id', '=', 'id')->whereIn('category_id', $cfChildren)->where('top_status', 1)->take(1)->pluck('top_img') : '';
		//软装推荐
		$rzChildren = Category::where('parent', 34)->orWhere('id', 34)->lists('id');
		$ruanzhuang = $rzChildren ? DB::table('single_categories')->join('products', 'object_id', '=', 'id')->whereIn('category_id', $rzChildren)->where('top_status', 1)->orderby('id', 'desc')->take(1)->pluck('top_img') : '';
		//超爆单品推荐（基础建材）
		$cbdpChildren = Category::where('parent', 7)->orWhere('id', 7)->lists('id');
		$chaobaodanpin = $cbdpChildren ? DB::table('single_categories')->join('products', 'object_id', '=', 'id')->whereIn('category_id', $cbdpChildren)->where('top_status', 1)->take(1)->pluck('top_img') : '';
		//漆胶推荐
		$qjChildren = Category::where('parent', 40)->orWhere('id', 40)->lists('id');
		$qijiao = $qjChildren ? DB::table('single_categories')->join('products', 'object_id', '=', 'id')->whereIn('category_id', $qjChildren)->where('top_status', 1)->take(1)->pluck('top_img') : '';
		//电器推荐
		$dqChildren = Category::where('parent', 14)->orWhere('id', 14)->lists('id');
		$dianqi = $dqChildren ? DB::table('single_categories')->join('products', 'object_id', '=', 'id')->whereIn('category_id', $dqChildren)->where('top_status', 1)->take(1)->pluck('top_img') : '';
		//基础建材推荐
		$jcjcChildren = Category::where('parent', 39)->orWhere('id', 39)->lists('id');
		$jichujiancai = $jcjcChildren ? DB::table('single_categories')->join('products', 'object_id', '=', 'id')->whereIn('category_id', $jcjcChildren)->where('top_status', 1)->take(1)->pluck('top_img') : '';

		$datas['weishengjian'] = $weishengjian;
		$datas['keting'] = $keting;
		$datas['woshi'] = $woshi;
		$datas['yangtai'] = $yangtai;
		$datas['chufang'] = $chufang;
		$datas['ruanzhuang'] = $ruanzhuang;
		$datas['chaobaodanpin'] = $chaobaodanpin;
		$datas['qijiao'] = $qijiao;
		$datas['dianqi'] = $dianqi;
		$datas['jichujiancai'] = $jichujiancai;

		return View::make('theme::index', compact('datas'));
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