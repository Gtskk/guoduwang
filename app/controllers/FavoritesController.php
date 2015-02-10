<?php

class FavoritesController extends \BaseController {

	/**
	 * 创建或取消收藏.
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
			if(Attention::isUserAttentedTopic(Confide::user(), $topic))
			{
				$topic->favoritedBy()->detach($memberId);
				$message = lang('Attent');
			}else
			{
				$topic->favoritedBy()->attach($memberId);
				$message = lang('Cancel');
			}
		    
		    $resp['status'] = 'success';
		    $resp['message'] = $message;
		}

		die(json_encode($resp));
	}

}