@extends('theme::layouts.main')

@section('content')

<div class="panel panel-default">

    <div class="panel-heading">
      {{ lang('My Notifications') }}
    </div>

    <div class="panel-body">

    	<ul class="nav nav-tabs" role="tablist">
    		<li class="active" role="presentaion">
    			<a href="#new_reply" role="tab" data-toggle="tab">{{ lang('Recent Replies') }}</a>
    		</li>
    		<li role="presentaion">
    			<a href="#reply_upvote" role="tab" data-toggle="tab">被顶评论</a>
    		</li>
    		<li role="presentaion">
    			<a href="#topic_upvote" role="tab" data-toggle="tab">被顶主题</a>
    		</li>
    		<li role="presentaion">
    			<a href="#topic_mark_excellent" role="tab" data-toggle="tab">推荐主题</a>
    		</li>
    	</ul>
		
    	<div class="tab-content notificationsList">
    		<div class="tab-pane active" id="new_reply">
            	@if (count($new_reply_not))
	            	@include('theme::notifications.partials.notifications', array('tempData'=>$new_reply_not))
	            @else
	            	<div class="empty-block">{{ lang('Dont have any data Yet') }}~~</div>
	            @endif

	            {{ $new_reply_not->links(); }}
    		</div>

    		<div class="tab-pane" id="reply_upvote">
    			@if (count($reply_upvote_not))
					@include('theme::notifications.partials.notifications', array('tempData'=>$reply_upvote_not))
				@else
					<div class="empty-block">{{ lang('Dont have any data Yet') }}~~</div>
				@endif
    		</div>

    		<div class="tab-pane" id="topic_upvote">
    			@if (count($topic_upvote_not))
					@include('theme::notifications.partials.notifications', array('tempData'=>$topic_upvote_not))
				@else
					<div class="empty-block">{{ lang('Dont have any data Yet') }}~~</div>
				@endif
    		</div>

    		<div class="tab-pane" id="topic_mark_excellent">
    			@if (count($topic_mark_excellent_not))
					@include('theme::notifications.partials.notifications', array('tempData'=>$topic_mark_excellent_not))
				@else
					<div class="empty-block">{{ lang('Dont have any data Yet') }}~~</div>
				@endif
    		</div>
    	</div>

    </div>

</div>

@stop

@section('javascript')
<script type="text/javascript">
	$(function () {
	  	$('[data-toggle="tooltip"]').tooltip()
	});
</script>
@stop