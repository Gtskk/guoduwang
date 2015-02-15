@extends('theme::layouts.main')

@section('content')

<div class="users-show">

	<div class="col-md-3 box" style="padding: 15px 15px;">
		@include('theme::members.partials.basicinfo')
	</div>

	<div class="main-col col-md-9 left-col">


	<div class="panel panel-default">

		@include('theme::members.partials.infonav', ['current' => 'topics'])

		<div class="panel-body remove-padding-vertically remove-padding-horizontal">

			@if (count($topics))
				@include('theme::members.partials.topics')
				<div class="pull-right add-padding-vertically"> {{ $topics->links(); }} </div>
			@else
				<div class="empty-block">{{ lang('Dont have any favorites yet') }}~~</div>
			@endif

		</div>

	</div>
	</div>
</div>

@stop