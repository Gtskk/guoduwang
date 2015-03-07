<?php namespace Gtskk\Storage\Member;

interface MemberRepository
{
	public function limitAll();

	public function findOrFail($id);

	public function create($input);
}