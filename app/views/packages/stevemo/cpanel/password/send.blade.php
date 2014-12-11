@extends('cpanel::partials.simple_layouts')

@section('main_content')
<div class="form-box" id="login-box">
    <div class="header">{{ trans('common.reset_success') }}</div>
    <div class="body bg-gray">
        <p>
            We’ve sent an email to<strong>&nbsp;{{ $email }}&nbsp;</strong>
            containing a temporary link that will allow you to reset your password for the next 24 hours.
        </p>
        <p>Please check your spam folder if the email doesn’t appear within a few minutes.</p>
        <p>{{ link_to_route('cpanel.login', 'Return to sign in') }}</p>
    </div>
</div>
@stop