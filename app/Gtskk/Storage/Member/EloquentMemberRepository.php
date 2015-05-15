<?php namespace Gtskk\Storage\Member;

use Illuminate\Database\Eloquent\Model;

/**
 * Eloquent会员库
 */
class EloquentMemberRepository implements MemberInterface
{

	protected $member;

	public function __construct(Model $member)
	{
		$this->member = $member;
	}

	/**
	 * 获取指定数目的会员
	 * @return Collection 会员Collection
	 */
	public function limitAll()
	{
		return $this->member->recent()->take(\Config::get('site.members_count'))->get();
	}

	/**
	 * 查询指定id的会员，查不到就抛出错误
	 * @param  int $id 会员ID
	 * @return Member  会员对象
	 */
	public function findOrFail($id)
	{
		return $this->member->findOrFail($id);
	}

	/**
	 * 创建新会员
	 * @param  array $input 注册有关数据数组
	 * @return Member  会员对象
	 */
	public function create($input)
	{
		$repo = \App::make('MemberRepository');
        $member = $repo->signup($input);

        return $member;
	}

	public function destroy($id)
	{
		return $this->member->destroy($id);
	}

	public function restore($id)
	{
		return $this->member->onlyTrashed()->findOrFail($id)->restore();
	}

	public function restoreMany($ids)
	{
		$members = $this->member->onlyTrashed()->whereIn('id', $ids)->get();
    	$members->each(function($topic){
    		$topic->restore();
    	});
	}

	public function paginateSelect($page = 1, $limit = 15)
	{
		$result = new \StdClass;
		$result->page = $page;
		$result->limit = $limit;
		$result->totalItems = 0;
		$result->items = array();

		$members = $this->member->where('id', '<>', 1)
			->skip($limit * ($page -1))
			->take($limit)
			->get();

		$result->items = $members->all();
		$result->totalItems = $this->totalMembers();

		return $result;
	}

	public function paginateDelete($limit = 15)
	{
		return $this->member->onlyTrashed()->paginate($limit);
	}

	public function getRecentMembers($limit)
	{
		return $this->member->recent()->take($limit)->get();
	}

	public function search($q)
	{
		return $this->member->where('username', 'like', '%'.$q.'%')->get(array('id', 'username', 'image_url', 'email'));
	}

	protected function totalMembers()
	{
		return $this->member->count();
	}
}