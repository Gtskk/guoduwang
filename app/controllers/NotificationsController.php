<?php

class NotificationsController extends \BaseController {

	/**
     * 获取用户通知数目
     * @return integer [description]
     */
    public function notificationsCount()
    {
        die(json_encode(Confide::user()->notification_count));
    }


	/**
	 * 查看当前登录用户所有通知
	 *
	 * @return Response
	 */
	public function index()
	{
		Auth::user()->notification_count = 0;
		Auth::user()->save();

		$perpage = 10;
		$new_reply_not = Auth::user()->notifications()->withType('new_reply')->paginate($perpage);
		$reply_upvote_not = Auth::user()->notifications()->withType('reply_upvote')->paginate($perpage);
		$topic_upvote_not = Auth::user()->notifications()->withType('topic_upvote')->paginate($perpage);
		$topic_mark_excellent_not = Auth::user()->notifications()->withType('topic_mark_excellent')->paginate($perpage);

		return View::make('theme::notifications.index', compact('new_reply_not', 'reply_upvote_not', 'topic_upvote_not', 'topic_mark_excellent_not'));
	}

	/**
	 * Remove the specified notification from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		if(Request::ajax())
		{
			Notification::destroy($id);
			die(json_encode(array('status'=>'success', 'message'=>'')));
		}
	}

}
