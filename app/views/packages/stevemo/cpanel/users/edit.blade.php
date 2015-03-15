@extends('cpanel::layouts')

@section('header')
<h1>{{ trans('cpanel::common.users') }}</h1>
@stop

@section('breadcrumb')
@parent
<li>
    <a href="{{route('cpanel.users.index')}}">
        <i class="fa fa-user"></i>
        {{ trans('cpanel::common.users') }}
    </a>
</li>
<li class="active">{{ trans('cpanel::common.Edit') }}</li>
@stop

@section('content')
<div class="row">
    <div class="col-lg-12">
        <?php
        $option = array(
            'route' => array('cpanel.users.update',$user->id),
            'method' => 'put',
            'class' => 'form-horizontal'
        );
        ?>
        {{ Form::model($user,$option) }}
        
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">{{ trans('cpanel::common.edit_something', array('thing'=>trans('cpanel::users.user'))) }} &quot;{{ $user->first_name }} {{ $user->last_name }}&quot;</h3>
            </div>
            <div class="panel-body">
                <div class="tabbable">

                    <ul class="nav nav-tabs" id="myTab">
                        <li class="active">
                            <a href="#credentials" data-toggle="tab">{{ trans('cpanel::users.user_credentials') }}</a>
                        </li>
                        <li>
                            <a href="#permissions" data-toggle="tab">{{ trans('cpanel::users.user_permissions') }}</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane active" id="credentials">
                            <div class="margin-top-20">

                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="first_name">{{ trans('cpanel::users.first_name') }}</label>
                                    <div class="col-md-4">
                                        {{ Form::text('first_name',null,array('class'=>'form-control','placeholder'=>trans('cpanel::users.first_name'))) }}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="last_name">{{ trans('cpanel::users.last_name') }}</label>
                                    <div class="col-md-4">
                                        {{ Form::text('last_name',null,array('class'=>'form-control','placeholder'=>trans('cpanel::users.last_name'))) }}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="email">{{ lang('Email') }}</label>
                                    <div class="col-md-4">
                                        {{ Form::email('email',null,array('class'=>'form-control','placeholder'=>lang('Email'))) }}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="password">{{ trans('cpanel::users.password') }}</label>
                                    <div class="col-md-4">
                                        {{ Form::password('password',array('class'=>'form-control','placeholder'=>trans('cpanel::users.password'))) }}
                                        <span class="help-block">{{ trans('cpanel::users.blank_to_keep_pass') }}</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="password_confirmation">{{ trans('cpanel::users.confirm_pass') }}</label>
                                    <div class="col-md-4">
                                        {{ Form::password('password_confirmation',array('class'=>'form-control','placeholder'=>trans('cpanel::users.confirm_pass'))) }}
                                        <span class="help-block">{{ trans('cpanel::users.blank_to_keep_pass') }}</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="groups[]" class="col-sm-2 control-label">{{ trans('cpanel::groups.Groups') }}</label>
                                    <div class="col-md-4">
                                        <select id="groups" name="groups[]" class="select2 form-control" multiple="true">
                                            @foreach($groups as $group)
                                            @if( in_array( $group->id, Input::old('groups', array())) or in_array($group->id, $userGroupsId) )
                                            <option selected="selected" value="{{ $group->id }}">{{ $group->name }}</option>
                                            @else
                                            <option value="{{ $group->id }}">{{ $group->name }}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-primary">{{ lang('Submit') }}</button>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="tab-pane" id="permissions">
                            <p class="lead margin-top-10">{{ trans('cpanel::users.override_group_permission') }}</p>
                            @include('cpanel::users.permissions_form')
                        </div>

                    </div>

                </div>
            </div>
        </div>

        {{Form::close()}}

    </div>
</div>
@stop
