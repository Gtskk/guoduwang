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
	 * Remove the specified resource from storage.
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
        	Topic::destroy($ids);
        	return Redirect::route('admin.topics.index')
            ->with('success',Lang::get('cpanel::common.delete_success'));
        }

        return Redirect::route('admin.topics.index')
            ->with('error',Lang::get('cpanel::common.operate_failed'));
	}

}
