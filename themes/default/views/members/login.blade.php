@extends('theme::layouts.main')

@section('loginform')
	<form action="{{ URL::action('LoginController@post_login') }}" method="post" class="navbar-form navbar-right" role="form">
        <div class="form-group@if(!empty($error)) has-error@endif">
            <input type="text" name="username" placeholder="Username" class="form-control">
        </div>
        <div class="form-group@if(!empty($error)) has-error@endif">
            <input type="password" name="password" placeholder="Password" class="form-control">
        </div>
        <div class="checkbox">
        	<label><input type="checkbox" name="remember"><span class="text-info">Remember</span></label>
        </div>
        <button type="submit" class="btn btn-success">Sign in</button>
    </form>
@stop