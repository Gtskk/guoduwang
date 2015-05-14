<?php namespace Gtskk\Transformers;

use League\Fractal\TransformerAbstract;

class MemberTransformer extends TransformerAbstract
{
	public function transform(\Member $member) {
		return [
			'id' => $member->id,
			'username' => $member->username
		];
	}
}