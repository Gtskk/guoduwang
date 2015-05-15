<?php namespace Gtskk\Storage\Topic;

interface TopicInterface
{

	public function getRecentTopics($limit);

	public function getRecentUserTopics($id, $limit, $withPaginate);

	public function search($q);

	public function getTopicFilter();

	public function getTopicsWithFilter($filter, $page = 1, $limit);

	public function findOrFail($id);

	public function showTopicDetail($id);

	public function makeExcerpt($body);

}