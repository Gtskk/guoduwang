<?php namespace Gtskk\Storage\Member;

interface MemberRepository
{
	public function limitAll();

	public function findOrFail($id);

	public function create($input);

	public function destroy($id);

	public function paginateSelect($limit);
}