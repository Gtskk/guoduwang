<?php

use Gtskk\Storage\Topic\TopicRepository as Topic;
use Gtskk\Storage\Member\MemberRepository as Member;

class PagesController extends BaseController {

	public function __construct(Topic $topic, Member $member)
	{
		$this->topic = $topic;
		$this->member = $member;
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
	 * 搜索
	 */
	public function search()
	{
		$query = Purifier::clean(Input::get('q'));
		// 从会员中进行搜索
		$members = $this->member->search($query);
		// 从话题中进行搜索
		$topics = $this->topic->search($query);

		return View::make('theme::pages.search', compact('members', 'topics'));
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