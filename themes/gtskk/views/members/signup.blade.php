@extends('theme::layouts.main')

@section('content')
<div class="panel panel-default login_require">
    <div class="panel-heading text-center">{{ trans('common.register') }}</div>
    <div class="panel-body">
        <form method="POST" action="{{ route('members.store') }}" accept-charset="UTF-8">
            <div class="body bg-gray">
                @if (Session::get('error'))
                    <div class="alert alert-error alert-danger">
                        @if (is_array(Session::get('error')))
                            {{ head(Session::get('error')) }}
                        @endif
                    </div>
                @endif

                @if (Session::get('notice'))
                    <div class="alert">{{ Session::get('notice') }}</div>
                @endif
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                
                @if (isset($member['image_url']))
                <div class="form-group">
                    <label class="control-label" for="name">{{ lang('Avatar') }}</label>
                    <div style="text-align:center" class="form-group">
                        <img src="{{ $member['image_url'] }}" />
                    </div>
                </div>
                @endif
                @if (isset($member['github_name']))
                <div class="form-group">
                    <label for="github_name">{{ lang('Github Name') }}</label>
                    <input class="form-control" placeholder="{{ lang('Github Name') }}" type="text" name="github_name" id="github_name" value="{{{ $member['github_name'] }}}" readonly='readonly' />
                </div>
                @endif
                @if (isset($member['ghost_name']))
                <div class="form-group">
                    <label for="ghost_name">{{ lang('Ghost Name') }}</label>
                    <input class="form-control" placeholder="{{ lang('Ghost Name') }}" type="text" name="ghost_name" id="ghost_name" value="{{{ $member['ghost_name'] }}}" readonly='readonly' />
                </div>
                @endif
                <div class="form-group">
                    <label for="username">{{{ Lang::get('confide::confide.username') }}}</label>
                    <input class="form-control" placeholder="{{{ Lang::get('confide::confide.username') }}}" type="text" name="username" id="username" value="{{{ $member['username'] or Input::old('username') }}}">
                </div>
                <div class="form-group">
                    <label for="email">{{{ Lang::get('confide::confide.e_mail') }}} <!-- <small>{{ Lang::get('confide::confide.signup.confirmation_required') }}</small> --></label>
                    <input class="form-control" placeholder="{{{ Lang::get('confide::confide.e_mail') }}}" type="text" name="email" id="email" value="{{{ $member['email'] or Input::old('email') }}}" @if(isset($member['github_name']) or isset($member['ghost_name']))readonly='readonly' @endif>
                </div>
                <div class="form-group">
                    <label for="password">{{{ Lang::get('confide::confide.password') }}}</label>
                    <input class="form-control" placeholder="{{{ Lang::get('confide::confide.password') }}}" type="password" name="password" id="password">
                </div>
                <div class="form-group">
                    <label for="password_confirmation">{{{ Lang::get('confide::confide.password_confirmation') }}}</label>
                    <input class="form-control" placeholder="{{{ Lang::get('confide::confide.password_confirmation') }}}" type="password" name="password_confirmation" id="password_confirmation">
                </div>

                <div class="form-actions form-group">
                  <button type="submit" class="btn btn-primary">{{{ Lang::get('confide::confide.signup.submit') }}}</button>
                </div>
            </div>
        </form>
    </div>
</div>
@stop