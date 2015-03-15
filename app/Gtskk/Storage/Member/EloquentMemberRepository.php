<?php namespace Gtskk\Storage\Member;

use Member;

class EloquentMemberRepository implements MemberRepository
{
	public function limitAll()
	{
		return Member::recent()->take(\Config::get('site.members_count'))->get();
	}

	public function findOrFail($id)
	{
		return Member::findOrFail($id);
	}

	public function create($input)
	{
		$repo = \App::make('MemberRepository');
        $user = $repo->signup($input);

        return $user;
	}

	public function destroy($id)
	{
		return Member::destroy($id);
	}

	public function restore($id)
	{
		return Member::onlyTrashed()->findOrFail($id)->restore();
	}

	public function restoreMany($ids)
	{
		$members = Member::onlyTrashed()->whereIn('id', $ids)->get();
    	$members->each(function($topic){
    		$topic->restore();
    	});
	}

	public function paginateSelect($limit = 15)
	{
		return Member::where('id', '<>', 1)->paginate($limit);
	}

	public function paginateDelete($limit = 15)
	{
		return Member::onlyTrashed()->paginate($limit);
	}

	public function getRecentMembers($limit)
	{
		return Member::recent()->take($limit)->get();
	}
}