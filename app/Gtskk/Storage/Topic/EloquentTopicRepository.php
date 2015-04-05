<?php namespace Gtskk\Storage\Topic;

use Topic, Redis;

class EloquentTopicRepository implements TopicRepository
{

	public function getRecentTopics($limit = 10)
	{
		$topics = unserialize(Redis::get('indexTopics'));
		if(!$topics)
		{
			$topics = Topic::with('member', 'node')
						->excellent()
						->recent()
						->limit($limit)
						->get();
			Redis::set('indexTopics', serialize($topics));
		}

		return $topics;
	}

	public function getRecentUserTopics($id, $limit=10, $withPaginate=false)
	{
		$redisKey = 'user_topic_'.$id;
		if($withPaginate)
		{
			$redisKey .= '_withPaginate';
		}

		$topics = unserialize(Redis::get($redisKey));
		if(!$topics)
		{
			$topicsQuery = Topic::whose($id)->recent();
			$topics = $withPaginate ? $topicsQuery->paginate($limit) : $topicsQuery->limit($limit)->get();

			Redis::set($redisKey, serialize($topics));
		}

		return $topics;
	}

	public function search($q)
	{
		return Topic::where('title', 'like', '%'.$q.'%')->orWhere('body', 'like', '%'.$q.'%')->get(array('id', 'title', 'reply_count'));
	}
}