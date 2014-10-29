@extends('theme::layouts.main')

@section('content')
<!--con-->
<div class="container">
	@if(count($menus))
	<div class="row">
		<ul class="nav nav-pills nav-justified" role="tablist">
			@foreach($menus as $title => $menu)
			<li role="presentation"@if(Input::get('type') == $menu['param']['type']) class="active"@endif>
				<a href="{{ route($menu['route'], $menu['param']) }}">
					{{ $title }}
				</a>
			</li>
			@endforeach
		</ul>
	</div>
	@endif
	<div class="row">
		@if(count($posts))
		@foreach($posts as $post)
		<div class="col-xs-6 col-md-3">
			<a href="{{ route('posts.show', $post->id) }}" class="thumbnail">
				<img src="{{ asset($post->thumbnail) }}" />
			</a>
		</div>
		@endforeach

		{{ $posts->links() }}
		@else
		<h2>暂无新活动</h2>
		@endif
	</div>
</div>
@overwrite