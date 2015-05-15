<?php namespace Gtskk\Storage\Topic;

use Redis, Input;
use Illuminate\Database\Eloquent\Model;

class EloquentTopicRepository implements TopicInterface
{

	protected $topic;

	public function __construct(Model $topic)
	{
		$this->topic = $topic;
	}

	public function getRecentTopics($limit = 10)
	{
		$topics = unserialize(Redis::get('indexTopics'));
		if(!$topics)
		{
			$topics = $this->topic->with('member', 'node')
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
			$topicsQuery = $this->topic->whose($id)->recent();
			$topics = $withPaginate ? $topicsQuery->paginate($limit) : $topicsQuery->limit($limit)->get();

			Redis::set($redisKey, serialize($topics));
		}

		return $topics;
	}

	public function search($q)
	{
		return $this->topic->where('title', 'like', '%'.$q.'%')->orWhere('body', 'like', '%'.$q.'%')->get(array('id', 'title', 'reply_count'));
	}

	public function getTopicFilter()
    {
        $filters = ['noreply', 'vote', 'excellent','recent'];
        $request_filter = Input::get('filter');
        if ( in_array($request_filter, $filters) )
        {
            return $request_filter;
        }
        return 'default';
    }

	public function getTopicsWithFilter($filter, $page = 1, $limit = 13)
	{
		$result = new \StdClass;
		$result->page = $page;
		$result->limit = $limit;
		$result->totalItems = 0;
		$result->items = array();

		$topic = $this->applyFilter($filter)
					->with('member', 'node', 'lastReplyUser')
					->skip($limit * ($page -1))
					->take($limit)
					->get();

		$result->items = $topic->all();
		$result->totalItems = $this->totalTopics();

		return $result;
	}

	public function getTrashTopicsWithFilter($filter, $page = 1, $limit = 13)
	{

		$result = new \StdClass;
		$result->page = $page;
		$result->limit = $limit;
		$result->totalItems = 0;
		$result->items = array();

		$topics = $this->applyFilter($filter)
					->with('member', 'node')
					->onlyTrashed()
					->skip($limit * ($page -1))
					->take($limit)
					->get();

		$result->items = $topics->all();
		$result->totalItems = $this->totalTopics();

		return $result;
	}

	private function applyFilter($filter)
	{
		switch ($filter) {
			case 'noreply':
				return $this->topic->where('reply_count', 0)->recent();
				break;
			case 'vote':
				return $this->topic->orderBy('vote_count', 'desc')->recent();
				break;
			case 'excellent':
				return $this->topic->excellent()->recent();
				break;
			case 'recent':
				return $this->topic->recent();
				break;
			default:
				return $this->topic->pin()->recentReply();
				break;
		}
	}

	private function totalTopics()
	{
		return $this->topic->count();
	}

	public function findOrFail($id)
	{
		return $this->topic->findOrFail($id);
	}

	public function showTopicDetail($id)
	{
		$topic = $this->topic->findOrFail($id);
        $replies = $topic->getRepliesWithLimit(80);
        $node = $topic->node;
        $nodeTopics = $topic->getSameNodeTopics();

        $topic->increment('view_count', 1);

        return compact('topic', 'replies', 'nodeTopics', 'node');
	}

	public function makeExcerpt($body)
    {
        $excerpt = trim(preg_replace('/\s\s+/', ' ', strip_tags($body)));
        return str_limit($excerpt, 200);
    }
}