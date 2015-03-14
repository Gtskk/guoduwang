<?php

use Stevemo\Cpanel\Controllers\BaseController;

class AdminTopicsController extends BaseController {

	private $topic;

	public function __construct(Topic $topic)
	{
		$this->topic = $topic;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$filter = $this->topic->present()->getTopicFilter();
        $topics = $this->topic->getTopicsWithFilter($filter);
        return View::make('theme::admin.topics.index', compact('topics'));
	}

	/**
	 * 回收站页面
	 *
	 * @return Response
	 */
	public function topicsTrash()
	{
		$filter = $this->topic->present()->getTopicFilter();
        $topics = $this->topic->getTrashTopicsWithFilter($filter);
        return View::make('theme::admin.topics.trash', compact('topics'));
	}

	/**
	 * 删除话题
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        Topic::destroy($id);

        return Redirect::route('admin.topics.index')
            ->with('success',Lang::get('cpanel::common.delete_success'));
	}

	/**
	 * 批量删除话题
	 *
	 * @return Response
	 */
	public function destroyMany()
	{
        $ids = Input::get('delete');
        if($ids)
        {
        	Topic::destroy($ids);
        	return Redirect::route('admin.topics.index')
            ->with('success',Lang::get('cpanel::common.delete_success'));
        }

        return Redirect::route('admin.topics.index')
            ->with('warning',Lang::get('cpanel::common.operate_failed'));
	}

	/**
	 * 还原话题
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function restore($id)
	{
        $topic = Topic::onlyTrashed()->findOrFail($id);
        $topic->restore();

        return Redirect::route('admin.topics.index')
            ->with('success',Lang::get('cpanel::common.operate_succeed'));
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
        	$topics = Topic::onlyTrashed()->whereIn('id', $ids)->get();
        	$topics->each(function($topic){
        		$topic->restore();
        	});
        	return Redirect::route('admin.topics.index')
            ->with('success',Lang::get('cpanel::common.operate_succeed'));
        }

        return Redirect::route('admin.topics.index')
            ->with('warning',Lang::get('cpanel::common.operate_failed'));
	}

}
