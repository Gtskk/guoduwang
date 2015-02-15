@extends('theme::layouts.main')

@section('content')
<div class="panel panel-default login_require">
    <div class="panel-heading text-center">Ghost登录</div>
    <div class="panel-body">
        <form action="{{ URL::action('MembersController@ghostlogin') }}" method="post">
            <div class="body bg-gray">
                @if (  Session::has('error') )
                <div class="alert alert-danger">
                    {{ Session::get('error') }}
                </div>
                @endif
                @if (Session::get('notice'))
                    <div class="alert">{{ Session::get('notice') }}</div>
                @endif
                <div class="form-group">
                    <input type="text" name="ghostlogin" class="form-control" placeholder="{{ trans('common.username') }}"/>
                </div>
                <div class="form-group">
                    <input type="password" name="ghostpassword" class="form-control" placeholder="{{ trans('common.password') }}"/>
                </div>
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            </div>
            <div class="footer">
                <button type="submit" class="btn bg-olive btn-block">{{ trans('common.sign_in') }}</button>
            </div>
        </form>            
    </div>
</div>
@stop