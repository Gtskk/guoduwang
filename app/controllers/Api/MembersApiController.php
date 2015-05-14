<?php namespace Api;

use Gtskk\Storage\Member\MemberRepository as Member;
use Gtskk\Transformers\MemberTransformer as MemberTransformer;

class MembersApiController extends BaseController {

	public function __construct(Member $member)
	{
		$this->member = $member;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function all()
	{
		return $this->response->array($this->member->limitAll()->toArray());
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return $this->response->item($this->member->findOrFail($id), new MemberTransformer);
	}

	/**
	 * 显示我
	 *
	 * @return Response
	 */
	public function showMe()
	{
		$id = \Session::get('userid');
		return $this->response->item($this->member->findOrFail($id), new MemberTransformer);
	}


}
