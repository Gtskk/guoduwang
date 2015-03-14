<?php

use Stevemo\Cpanel\Controllers\BaseController;
use Gtskk\Storage\Member\MemberRepository as Member;

class AdminMembersController extends BaseController {

	private $member;

	public function __construct(Member $member)
	{

		$this->member = $member;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$members = $this->member->paginateSelect();
        return View::make('theme::admin.members.index', compact('members'));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function membersTrash()
	{
		$members = $this->member->paginateDelete();
        return View::make('theme::admin.members.trash', compact('members'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $this->member->destroy($id);

        return Redirect::route('admin.members.index')
            ->with('success',Lang::get('cpanel::common.delete_success'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroyMany()
	{
        $ids = Input::get('delete');
        if($ids)
        {
        	$this->member->destroy($ids);
        	return Redirect::route('admin.members.index')
            ->with('success',Lang::get('cpanel::common.delete_success'));
        }

        return Redirect::route('admin.members.index')
            ->with('warning',Lang::get('cpanel::common.operate_failed'));
	}

	/**
	 * 还原会员
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function restore($id)
	{
        if($this->member->restore($id))
        {
        	return Redirect::route('admin.members.index')
                ->with('success',Lang::get('cpanel::common.operate_succeed'));
        }

        return Redirect::route('admin.members.index')
            ->with('warning',Lang::get('cpanel::common.operate_failed'));
	}

	/**
	 * 批量还原话题
	 *
	 * @return Response
	 */
	public function restoreMany()
	{
		$ids = Input::get('delete');
		if($ids)
        {
        	$this->member->restoreMany($ids);
        	return Redirect::route('admin.members.index')
            ->with('success',Lang::get('cpanel::common.operate_succeed'));
        }

        return Redirect::route('admin.members.index')
            ->with('warning',Lang::get('cpanel::common.operate_failed'));
	}

}
