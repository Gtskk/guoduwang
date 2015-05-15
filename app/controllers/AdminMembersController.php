<?php

use Stevemo\Cpanel\Controllers\BaseController;
use Gtskk\Storage\Member\MemberInterface as Member;
use Gtskk\Storage\Topic\TopicInterface as Topic;

class AdminMembersController extends BaseController {

	private $member;
	private $topic;

	public function __construct(Member $member, Topic $topic)
	{

		$this->member = $member;
		$this->topic = $topic;
	}


	/**
	 * 显示dashboard
	 *
	 * 
	 * @return Response
	 */
	public function dashboard()
	{
		$recentTopics = $this->topic->getRecentTopics(20);
		$recentMembers = $this->member->getRecentMembers(20);
		return View::make('cpanel::dashboard.index', compact('recentTopics', 'recentMembers'));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$page = Input::get('page', 1);
        $perPage = Config::get('site.topic_per_page');

        $pagiData = $this->member->paginateSelect($page, $perPage);
        $members = Paginator::make(
            $pagiData->items,
            $pagiData->totalItems,
            $perPage
        );

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
