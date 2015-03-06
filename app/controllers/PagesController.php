<?php

class PagesController extends BaseController {

	public function showWelcome()
	{
		// $topics = Topic::excellent()->recent()->limit(20)->get();
		$topics = Cache::remember('topics', 5, function(){
			return Topic::excellent()->recent()->limit(20)->get();
		});
		
		return View::make('theme::pages.index', compact('topics'));
	}


	/**
	 * 关于页面
	 */
	public function about()
	{
		return View::make('theme::pages.about');
	}


	/**
	 * 搜索，使用google的
	 */
	public function search()
	{
		$query = Purifier::clean(Input::get('q'));
		return Redirect::away('https://www.google.com/search?q=site:phphub.org ' . $query, 301);
	}

	/**
	 *  Feed
	 */
	public function feed()
	{
		$topics = Topic::excellent()->recent()->limit(20)->get();
		$channel = array(
			'title' => Config::get('site.site_config.site_name').'-'.Config::get('site.site_config.keywords'),
			'description' => Config::get('site.site_config.description'),
			'link' => URL::route('feed')
		);
		$feed = Rss::feed('2.0', 'UTF-8');
		$feed->channel($channel);

	    foreach ($topics as $topic)
	    {
	        $feed->item([
                'title' => $topic->title,
                'description|cdata' => str_limit($topic->body, 200),
                'link' => URL::route('topics.show', $topic->id),
                ]);
	    }

	    return Response::make($feed, 200, array('Content-Type' => 'text/xml'));
	}

}