@extends('theme::layouts.main')

@section('content404')
<!--con-->
<div id="wrapper">
	<div id="main">
		<div id="clouds1"></div>
		<div id="clouds2"></div>
		<div id="sign"></div>
		<div id="rain"></div> 
	</div>
	{{ HTML::style('css/404.css') }}
</div>
@overwrite

@section('javascript')
{{ HTML::script('js/404.js') }}
@stop