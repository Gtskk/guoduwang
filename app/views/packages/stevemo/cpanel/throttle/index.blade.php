@extends('cpanel::layouts')

@section('header')
<h1> {{ trans('cpanel::users.user_throttling') }}</h1>
@stop

@section('breadcrumb')
@parent
<li>
    <a href="{{route('cpanel.users.index')}}">
        <i class="fa fa-user"></i>
        {{ trans('cpanel::common.users') }}
    </a>
</li>
<li class="active">{{ trans('cpanel::users.throttling') }}</li>
@stop

@section('content')

<div class="row">
    <div class="col-lg-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">{{ $user->first_name }}&nbsp; {{ $user->last_name }} {{ trans('cpanel::users.throttling_status') }}</h3>
            </div>
            <div class="panel-body">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>{{ trans('cpanel::users.feature') }}</th>
                        <th>{{ trans('cpanel::users.status') }}</th>
                        <th>{{ trans('cpanel::common.action') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if ($throttle->isBanned())
                    <tr>
                        <td><strong>{{ trans('cpanel::users.ban_status') }}</strong></td>
                        <td>{{ trans('cpanel::users.user_banned') }}</td>
                        <td>
                            <a href="{{ route('cpanel.users.throttling.update',array($user->id,'unban')) }}"
                               class="btn btn-primary" rel="tooltip" title="UnBan User"
                               data-method="put" data-message="Unban this user?">
                                <i class="fa fa-check"></i>
                                Unban User
                            </a>
                        </td>
                    </tr>
                    @else
                    <tr>
                        <td><strong>{{ trans('cpanel::users.ban_status') }}</strong></td>
                        <td>{{ trans('cpanel::users.user_not_banned') }}</td>
                        <td>
                            <a href="{{ route('cpanel.users.throttling.update',array($user->id,'ban')) }}"
                               class="btn btn-danger" rel="tooltip" title="{{ trans('cpanel::users.ban_user') }}"
                               data-method="put" data-message="{{ trans('cpanel::users.ban_this_user') }}">
                                <i class="fa fa-ban"></i>
                                {{ trans('cpanel::users.ban_user') }}
                            </a>
                        </td>
                    </tr>
                    @endif

                    @if ($throttle->isSuspended())
                    <tr>
                        <td><strong>{{ trans('cpanel::users.suspension_status') }}</strong></td>
                        <td>{{ trans('cpanel::users.user_suspended') }}</td>
                        <td>
                            <a href="{{ route('cpanel.users.throttling.update',array($user->id,'unsuspend')) }}"
                               class="btn btn-primary" rel="tooltip" title="{{ trans('cpanel::users.unsuspend_user') }}"
                               data-method="put" data-message="{{ trans('cpanel::users.unsuspend_this_user') }}">
                                <i class="fa fa-check"></i>
                                {{ trans('cpanel::users.unsuspend_user') }}
                            </a>
                        </td>
                    </tr>
                    @else
                    <tr>
                        <td><strong>{{ trans('cpanel::users.suspension_status') }}</strong></td>
                        <td>{{ trans('cpanel::users.user_not_suspended') }}</td>
                        <td>
                            <a href="{{ route('cpanel.users.throttling.update',array($user->id,'suspend')) }}"
                               class="btn btn-danger" rel="tooltip" title="{{ trans('cpanel::users.suspend_user') }}"
                               data-method="put" data-message="{{ trans('cpanel::users.suspend_this_user') }}">
                                <i class="fa fa-ban"></i>
                                {{ trans('cpanel::users.suspend_user') }}
                            </a>
                        </td>
                    </tr>
                    @endif

                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

@stop