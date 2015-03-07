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
}