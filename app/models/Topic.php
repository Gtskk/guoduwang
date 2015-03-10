<?php

use LaravelBook\Ardent\Ardent;
use Laracasts\Presenter\PresentableTrait;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Topic extends Ardent
{

	/**
	 * Ardent validation rules
	 */
	public static $rules = array(
		'title' => 'required',
		'body' => 'required',
		'node_id' => 'required',
		'member_id' => 'required',
	);

	// manually maintian
	public $timestamps = false;

	use PresentableTrait;
	protected $presenter = 'Gtskk\Presenters\TopicPresenter';

	use SoftDeletingTrait;
    protected $dates = ['deleted_at'];

	// Don't forget to fill this array
	protected $fillable = [
		'title',
        'body',
        'excerpt',
		'body_original',
		'member_id',
		'node_id',
		'created_at',
		'updated_at'
	];

	public function votes()
	{
		return $this->morphMany('Vote', 'votable');
	}

	public function favoritedBy()
	{
		return $this->belongsToMany('Member', 'favorites');
	}

	public function attentedBy()
	{
		return $this->belongsToMany('Member', 'attentions');
	}

	public function node()
	{
		return $this->belongsTo('Node');
	}

	public function member()
	{
		return $this->belongsTo('Member', 'member_id');
	}

	public function replies()
	{
		return $this->hasMany('Reply');
	}

	public function lastReplyUser()
	{
		return $this->belongsTo('Member', 'last_reply_user_id');
	}

	public function generateLastReplyUserInfo()
    {
        $lastReply = $this->replies()->recent()->first();

        $this->last_reply_user_id = $lastReply ? $lastReply->member_id : 0;
        $this->save();
    }

	public function getRepliesWithLimit($limit = 30)
	{
		return $this->replies()
					->orderBy('vote_count', 'desc')
					->orderBy('created_at', 'asc')
					->with('member')
					->paginate($limit);
	}

	public function getTopicsWithFilter($filter, $limit = 13)
	{
		return $this->applyFilter($filter)
					->with('member', 'node', 'lastReplyUser')
					->paginate($limit);
	}

	public function getTrashTopicsWithFilter($filter, $limit = 13)
	{
		return $this->applyFilter($filter)
					->with('member', 'node')
					->onlyTrashed()
					->paginate($limit);
	}

	public function getNodeTopicsWithFilter($filter, $node_id, $limit = 13)
	{
		return $this->applyFilter($filter)
					->where('node_id', '=', $node_id)
					->with('member', 'node', 'lastReplyUser')
					->paginate($limit);
	}

	public function applyFilter($filter)
	{
		switch ($filter) {
			case 'noreply':
				return $this->where('reply_count', 0)->recent();
				break;
			case 'vote':
				return $this->orderBy('vote_count', 'desc')->recent();
				break;
			case 'excellent':
				return $this->excellent()->recent();
				break;
			case 'recent':
				return $this->recent();
				break;
			default:
				return $this->pin()->recentReply();
				break;
		}
	}

	/**
	 * 边栏同一节点下的话题列表
	 */
	public function getSameNodeTopics($limit = 8)
	{
		return Topic::where('node_id', '=', $this->node_id)
						->recent()
						->take($limit)
						->remember(10)
						->get();
	}

	public function scopeWhose($query, $member_id)
	{
        return $query->where('member_id','=',$member_id)->with('node');
    }

    public function scopeRecent($query)
    {
        return $query->orderBy('created_at','desc');
    }

    public function scopePin($query)
    {
        return $query->orderBy('order','desc');
    }

    public function scopeRecentReply($query)
    {
        return $query->where('created_at', '>', Carbon::today()->subMonths(6))->orderBy('updated_at', 'desc');
    }

    public function scopeExcellent($query)
    {
        return $query->where('is_excellent', '=', true);
    }

    public static function makeExcerpt($body)
    {
        $html = $body;
        $excerpt = trim(preg_replace('/\s\s+/', ' ', strip_tags($html)));
        return str_limit($excerpt, 200);
    }
}