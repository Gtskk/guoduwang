@extends('theme::layouts.main')

@section('content')
<div class="panel panel-default login_require">
    <div class="panel-heading text-center">{{ trans('common.sign_in') }}</div>
    <div class="panel-body">
        <form action="{{ route('oauth', Input::all()) }}" method="post" id="loginform">
            <div class="body bg-gray">
                @if ( Session::has('error') )
                <div class="alert alert-danger">
                    {{ Session::get('error') }}
                </div>
                @endif
                @if (Session::get('notice'))
                    <div class="alert">{{ Session::get('notice') }}</div>
                @endif
                <div class="form-group">
                    <input type="text" name="username" class="form-control" placeholder="{{ lang('username_or_email') }}" datatype="*" nullmsg="{{ lang('username_not_null') }}" />
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="{{ trans('cpanel::users.password') }}" datatype="*" nullmsg="{{ lang('password_not_null') }}" />
                </div>
                <div class="form-group">
                    <input type="checkbox" name="remember" /> {{ trans('common.remember') }}
                </div>
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            </div>
            <div class="footer">
                <button type="submit" name="login_require" class="btn bg-olive btn-block">{{ trans('common.sign_in') }}</button>
            </div>
        </form>
    </div>
</div>
@stop

@section('javascript')
<script type="text/javascript">
    /** 登录表单验证 */
    $("#loginform").Validform();
</script>
@stop