@extends('cpanel::partials.simple_layouts')

@section('main_content')
<div class="form-box" id="login-box">
    <div class="header">{{ trans('common.forgot_passwd') }}</div>
    {{Form::open(array('route'=>'cpanel.password.forgot'))}}
    <div class="body bg-gray">
        @if (  Session::has('password_error') )
        <div class="alert alert-danger">
            {{ Session::get('password_error') }}
        </div>
        @endif
        <p class="">{{ trans('common.ensure_email_reset') }}</p>
        <div class="input-group">
            <span class="input-group-addon">
                <i class="fa fa-envelope"></i>
            </span>
            {{ Form::email('email',null,array('class'=>'form-control','placeholder'=>trans('common.email'))) }}
        </div>
    </div>
    <div class="footer">

        <button type="submit" class="btn bg-olive btn-block">{{ trans('common.reset_passwd') }}</button>

        <a href="{{route('cpanel.login')}}" class="text-center">{{ trans('common.have_membership') }}</a>
    </div>
    {{ Form::close() }}
</div>
@stop