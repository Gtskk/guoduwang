<?php namespace Gtskk\Storage\Member;

interface MemberRepository
{
	public function limitAll();

	public function findOrFail($id);

	public function create($input);

	public function destroy($id);

	public function restore($id);

	public function restoreMany($ids);

	public function paginateSelect($limit);

	public function paginateDelete($limit);
}