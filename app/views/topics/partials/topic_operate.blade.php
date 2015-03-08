<div class="panel-footer operate">

	<div class="pull-left" style="font-size:15px;">
		<div class="bdsharebuttonbox">
			<a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
			<a href="#" class="bds_sqq" data-cmd="sqq" title="分享到QQ好友"></a>
			<a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
			<a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
		</div>
		<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"1","bdMiniList":false,"bdPic":"","bdStyle":"1","bdSize":"16"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
	</div>

	<div class="pull-right">

		@if ($currentUser)
			<a title="{{ lang('Attent') }}" data-method="post" id="topic-attent-button" href="javascript:void(0);" data-url="{{ route('attentions.createOrDelete', $topic->id) }}">
				<i class="glyphicon glyphicon-eye-open"></i> 
				<span>
					@if(Attention::isUserAttentedTopic($currentUser, $topic))
					{{ lang('Cancel') }}
					@else 
					{{ lang('Attent') }}
					@endif
				</span>
			</a>

			<a title="{{ lang('Favorite') }}" data-method="post" id="topic-favorite-button" href="javascript:void(0);" data-url="{{ route('favorites.createOrDelete', $topic->id) }}">
				<i class="glyphicon glyphicon-bookmark"></i> 
				<span>
					@if (Favorite::isUserFavoritedTopic($currentUser, $topic)) 
					{{ lang('Cancel') }}
					@else 
					{{ lang('Favorite') }}
					@endif
				</span>
			</a>

			@if ($currentUser->can("manage_topics") )
			<a data-method="post" id="topic-recomend-button" href="javascript:void(0);" data-url="{{ route('topics.recomend', [$topic->id]) }}" class="pinSink {{ $topic->is_excellent ? 'active' :'';}}" title="{{ lang('Mark as Excellent') }}">
				<i class="fa fa-trophy"></i>
			</a>

				@if ($topic->order >= 0)
				<a data-method="post" id="topic-pin-button" href="javascript:void(0);" data-url="{{ route('topics.pin', [$topic->id]) }}" class="pinSink {{ $topic->order > 0 ? 'active' : '' }}" title="{{ lang('Pin it on Top') }}">
					<i class="fa fa-thumb-tack"></i>
				</a>
				@endif

				@if ($topic->order <= 0)
				<a data-method="post" id="topic-sink-button" href="javascript:void(0);" data-url="{{ route('topics.sink', [$topic->id]) }}" class="pinSink {{ $topic->order < 0 ? 'active' : '' }}" title="{{ lang('Sink This Topic') }}">
						<i class="fa fa-anchor"></i>
				</a>
				@endif

				<a data-method="delete" id="topic-delete-button" href="javascript:void(0);" data-url="{{ route('topics.destroy', [$topic->id]) }}" title="{{ lang('Delete') }}" class="admin">
						<i class="fa fa-trash-o"></i>
				</a>

			@endif

			@if ($currentUser->can("manage_topics") || $currentUser->id == $topic->member_id )
			<a id="topic-edit-button" href="{{ route('topics.edit', [$topic->id]) }}" title="{{ lang('Edit') }}" class="admin">
				<i class="fa fa-pencil-square-o"></i>
			</a>
			@endif
		@endif

	</div>
	<div class="clearfix"></div>
</div>
