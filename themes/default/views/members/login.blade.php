@extends('layouts.main')

@section('content')
	<div class="row">
		<div class="twelve columns">
			<h5>Login</h5>
		</div>
	</div>
	<div id="login_container" class="row">
		@include('layouts.errors')
		<form action="{{ URL::action('LoginController@post_login') }}" method="post">
			<div class="row">
				<div class="two columns"><label class="right inline">Username</label></div>
				<div class="ten columns"><input type="text" name="username" id="username" class="five"></div>
				<div class="two columns"><label for="" class="right inline">Password</label></div>
				<div class="ten columns"><input type="password" name="password" id="password" class="five"></div>
			</div>
			<div class="row">
				<div class="five columns"></div>
				<div class="seven columns"><input type="submit" value="Login"></div>
			</div>
		</form>
	</div>
@stop