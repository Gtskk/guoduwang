@extends('theme::layouts.main')

@section('styles')
{{ HTML::style('assets/css/404.css') }}
@stop

@section('content404')
<!--con-->
<div id="wrapper">
	<div id="main">
		<div id="clouds1"></div>
		<div id="clouds2"></div>
		<div id="sign"></div>
		<div id="rain"></div>
	</div>
</div>
@overwrite

@section('javascript')
{{ HTML::script('assets/js/404.js') }}
@stop