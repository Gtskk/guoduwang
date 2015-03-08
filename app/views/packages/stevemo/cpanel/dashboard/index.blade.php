@extends('cpanel::layouts')

@section('header')
    <h1>
        {{ trans('cpanel::common.dashboard') }}
    </h1>
@stop

@section('breadcrumb')
<li class="active">
    <i class="fa fa-dashboard"></i>
    {{ trans('cpanel::common.dashboard') }}
</li>
@stop
