@extends('theme::layouts.main')

@section('content')
<div class="users-show">

	<div class="col-md-3 box" style="padding: 15px 15px;">
		@include('theme::members.partials.basicinfo')
	</div>

	<div class="main-col col-md-9 left-col">

		@if ($member->introduction)
			<div class="box text-center">
				<span class="pull-left">{{ lang('profile') }}</span>
				<p class="pull-right">{{{ $member->introduction }}}</p>
			</div>
		@endif

		@if ($member->is_banned)
			<div class="text-center alert alert-info"><b>{{ lang('This user is banned!') }}</b></div>
		@endif

		<div class="panel panel-default">
			@include('theme::members.partials.infonav', ['current' => 'basicinfo'])
			@if($member->github_name)
			<iframe src="https://dn-phphub.qbox.me/github-card.html?user={{ $member->github_name }}&client_id={{ getenv('client_id') }}&client_secret={{ getenv('client_secret') }}&target=blank" frameborder="0" scrolling="0" width="100%" height="146px" allowtransparency></iframe>
			@endif
		</div>

		<div class="panel panel-default">

			<ul class="nav nav-tabs member-info-nav" role="tablist">
				<li class="active"><a href="#recent_replies" role="tab" data-toggle="tab">{{ lang('Recent Replies') }}</a></li>
				<li><a href="#recent_topics" role="tab" data-toggle="tab">{{ lang('Recent Topics') }}</a></li>
			</ul>

			<div class="panel-body">
				<!-- Tab panes -->
				<div class="tab-content">

					<div class="tab-pane active" id="recent_replies">

						@if (count($replies))
							@include('theme::members.partials.replies')
						@else
							<div class="empty-block">{{ lang('Dont have any comment yet') }}~~</div>
						@endif

					</div>

					<div class="tab-pane" id="recent_topics">
						@if (count($topics))
							@include('theme::members.partials.topics')
						@else
							<div class="empty-block">{{ lang('Dont have any data Yet') }}~~</div>
						@endif
					</div>

				</div>
			</div>

		</div>
	</div>
</div>
@stop