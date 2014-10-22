@extends('layouts.main')

@section('content')
<!--con-->
<div id="main" class="w1000 mt20 clearfix">
	@if(count($menus))
	<ul class="activetit clearfix">
		@foreach($menus as $title => $menu)
		<li>
			<a href="{{ route($menu['route'], $menu['param']) }}"@if(Input::get('type') ==$menu['param']['type']) class="current"@endif>
				{{ $title }}
			</a>
		</li>
		@endforeach
		<li><a href="#">往期活动</a></li>
	</ul>
	@endif
	<div class="activephoto mt20">
		@if(count($posts))
		@foreach($posts as $post)
		<a href="{{ route('posts.show', $post->id) }}">
			<img src="{{ asset($post->thumbnail) }}" />
		</a>
		@endforeach
		@else
		<h2>暂无新活动</h2>
		@endif
	</div>
</div>
@stop