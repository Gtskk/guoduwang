@extends('theme::layouts.main')

@section('content')
<div class="container">
    <div class="panel panel-default login_require">
        <div class="panel-heading text-center">{{ trans('common.sign_in') }}</div>
        <div class="panel-body">
            <form action="{{ URL::action('MembersController@doLogin') }}" method="post">
                <div class="body bg-gray">
                    @if (  Session::has('error') )
                    <div class="alert alert-danger">
                        {{ Session::get('error') }}
                    </div>
                    @endif
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" placeholder="{{ trans('common.username') }}"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="{{ trans('common.password') }}"/>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="remember" /> {{ trans('common.remember') }}
                    </div>
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                </div>
                <div class="footer">
                    <button type="submit" class="btn bg-olive btn-block">{{ trans('common.sign_in') }}</button>
                    <p><a href="{{ route('cpanel.password.forgot')}}">{{ trans('common.forgot_passwd') }}</a></p>
                    <a href="{{route('cpanel.register')}}" class="text-center">{{ trans('common.register') }}</a>
                </div>
            </form>            
        </div>
    </div>
</div>
@stop