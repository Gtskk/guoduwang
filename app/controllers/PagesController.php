<?php

use Gtskk\Storage\Topic\TopicRepository as Topic;

class PagesController extends BaseController {

	private $topic;

	public function __construct(Topic $topic)
	{
		$this->topic = $topic;
	}

	public function showWelcome()
	{
		$topics = $this->topic->getRecentTopics(20);
		
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
		$topics = $this->topic->getRecentTopics(20);
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