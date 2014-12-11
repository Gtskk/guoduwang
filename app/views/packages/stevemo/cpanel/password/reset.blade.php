@extends('cpanel::partials.simple_layouts')

@section('main_content')
<div class="form-box" id="login-box">
    <div class="header">{{ trans('common.create_new_passwd') }}</div>
    {{ Form::open(array('route'=>'cpanel.password.update')) }}
    {{ Form::hidden('code',$code)}}
        <div class="body bg-gray">
            @if (  Session::has('errors') )
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="form-group">
                <label for="password">{{ trans('common.password') }}</label>
                <input type="password" name="password" class="form-control" placeholder="{{ trans('common.password') }}"/>
            </div>
            <div class="form-group">
                <label for="password">{{ trans('common.retype_password') }}</label>
                <input type="password" name="password_confirmation" class="form-control" placeholder="{{ trans('common.retype_password') }}"/>
            </div>
        </div>
        <div class="footer">
            <button type="submit" class="btn bg-olive btn-block">{{ trans('common.reset_passwd') }}</button>
        </div>
    {{ Form::close() }}
</div>
@stop