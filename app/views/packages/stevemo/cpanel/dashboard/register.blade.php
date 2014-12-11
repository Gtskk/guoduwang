@extends('cpanel::partials.simple_layouts')

@section('main_content')
<div class="form-box" id="login-box">
    <div class="header">{{ trans('common.register') }}</div>
    {{Form::open(array('route'=>'cpanel.register'))}}
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
                {{ Form::text('first_name',null,array('class'=>'form-control','placeholder'=>trans('common.first_name'))) }}
            </div>
            <div class="form-group">
                {{ Form::text('last_name',null,array('class'=>'form-control','placeholder'=>trans('common.last_name'))) }}
            </div>
            <div class="form-group">
                {{ Form::email('email',null,array('class'=>'form-control','placeholder'=>trans('common.email'))) }}
            </div>
            <div class="form-group">
                {{ Form::password('password',array('class'=>'form-control','placeholder'=>trans('common.password'))) }}
            </div>
            <div class="form-group">
                {{ Form::password('password_confirmation',array('class'=>'form-control','placeholder'=>trans('common.retype_password'))) }}
            </div>
        </div>
        <div class="footer">

            <button type="submit" class="btn bg-olive btn-block">{{ trans('common.register') }}</button>

            <a href="{{route('cpanel.login')}}" class="text-center">{{ trans('common.have_membership') }}</a>
        </div>
    {{ Form::close() }}
</div>
@stop