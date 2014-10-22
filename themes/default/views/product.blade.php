@extends('layouts.main')

@section('content')
	<!--con-->
	<div id="main" class="w1000 mt20 clearfix">
		@if(isset($datas['curcat']->slides) && $datas['curcat']->slides)
		<div id="slides">
			<div class="slides_container">
				@foreach(unserialize($datas['curcat']->slides) as $slide)
				<div>
					<img src="{{ asset($slide) }}" />
				</div>
				@endforeach
			</div>
		</div>
		@endif
		<div class="proleftnav mt20">
			<h2 class="protit">
				<img src="{{ asset($datas['curcat']->thumbnail) }}" />
			</h2>
			@if(count($datas['children']))
			<ul class="pronav">
				@foreach($datas['children'] as $child)
				<li>
					<a href="{{ route('product', $child->id) }}"@if(Request::url() == route('product', $child->id))) class="current"@endif>
						{{{ $child->name }}}
					</a>
				</li>
				@endforeach
			</ul>
			@endif
			<a href="http://weibo.com/u/3516209254" target="_blank">
				<img src="{{ asset('assets/sina.jpg') }}" />
			</a>
		</div>
		<div class="prorightcon mt20">
			@if(count($datas['products']))
			<ul class="prolist clearfix">
				@foreach($datas['products'] as $product)
				<li>
					<img src="{{ asset($product->thumbnail) }}" />
					<p>
						<span>{{{ $product->brand }}}<br />
						{{{ $product->style }}}<br />
						{{{ $product->specification }}}
						</span>
						<b><em>￥</em>{{{ floatval($product->price) }}}{{{ $product->unit or '' }}}</b>
					</p>
				</li>
				@endforeach
			</ul>
			@endif
			<!-- page -->
			{{ $datas['products']->links('layouts.paginate') }}
		</div>
		<br class="clear" />
	</div>
@stop