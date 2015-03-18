<?php namespace Gtskk\Storage\Topic;

use Topic;

class EloquentTopicRepository implements TopicRepository
{

	public function getRecentTopics($limit = 10)
	{
		return Topic::with('member', 'node')
				->excellent()
				->recent()
				->limit($limit)
				->get();
	}
}