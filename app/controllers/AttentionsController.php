<?php

class AttentionsController extends \BaseController {

	/**
	 * 创建或取消关注
	 *
	 * @return Response
	 */
	public function createOrDelete($id)
	{
		$resp = array();
		$topic = Topic::findOrFail($id);
		$memberId = Confide::user()->id;
		if($memberId == $topic->member_id)
		{
		    $resp['status'] = 'fail';
		    $resp['message'] = lang('Can not attention your topic');
		}
		else
		{
			if(Attention::isUserFavoritedTopic(Confide::user(), $topic))
			{
				$topic->attentedBy()->detach($memberId);
				$message = {{ lang('Favorite') }};
			}else
			{
				$topic->attentedBy()->attach($memberId);
				$message = lang('Cancel');
			}
		    
		    $resp['status'] = 'success';
		    $resp['message'] = $message;
		}

		die(json_encode($resp));
	}

}
