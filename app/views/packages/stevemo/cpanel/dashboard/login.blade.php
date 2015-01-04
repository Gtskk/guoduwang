@extends('cpanel::partials.simple_layouts')

@section('main_content')
<div class="form-box" id="login-box">
    <div class="header">{{ trans('common.sign_in') }}</div>
    <form action="{{ route('cpanel.login') }}" method="post">
        <div class="body bg-gray">
            @if (  Session::has('login_error') )
            <div class="alert alert-danger">
                {{ Session::get('login_error') }}
            </div>
            @endif
            @if (  Session::has('success') )
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
            @endif
            <div class="form-group">
                <input type="text" name="login_attribute" class="form-control" placeholder="{{ trans('common.'.$login_attribute) }}"/>
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="{{ trans('common.password') }}"/>
            </div>
            <div class="form-group">
                <input type="checkbox" name="remember_me" value="true"/> {{ trans('common.remember') }}
            </div>
        </div>
        <div class="footer">
            <button type="submit" class="btn bg-olive btn-block">{{ trans('common.sign_in') }}</button>
            <p><a href="{{route('cpanel.password.forgot')}}">{{ trans('common.forgot_passwd') }}</a></p>
            <a href="{{route('cpanel.register')}}" class="text-center">{{ trans('common.register') }}</a>
        </div>
    </form>
</div>
@stop