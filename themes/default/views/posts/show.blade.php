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
		{{ $post->body }}
	</div>
</div>
@stop