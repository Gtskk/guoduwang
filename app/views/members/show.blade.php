@extends('theme::layouts.main')

@section('content')
<div class="users-show">

	<div class="col-md-3 box" style="padding: 15px 15px;">
		@include('theme::members.partials.basicinfo')
	</div>

	<div class="main-col col-md-9 left-col">

		@include('flash::message')

		@if ($member->introduction)
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="panel-title text-center">
						<h4>{{ lang('profile') }}</h4>
					</div>
				</div>
				<div class="panel-body">
					<p>{{{ $member->introduction }}}</p>
				</div>
			</div>
		@endif

		@if ($member->is_banned)
			<div class="text-center alert alert-info"><b>{{ lang('This user is banned!') }}</b></div>
		@endif

		<div class="panel panel-default">
			@include('theme::members.partials.infonav', ['current' => 'basicinfo'])
			@if($member->github_name)
			{{ $member->present()->githubCard }}
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