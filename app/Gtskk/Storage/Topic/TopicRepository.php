<?php namespace Gtskk\Storage\Topic;

interface TopicRepository
{

	public function getRecentTopics($limit);

	public function getRecentUserTopics($id, $limit, $withPaginate);

	public function search($q);

}