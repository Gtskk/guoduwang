@extends('theme::layouts.main')

@section('styles')
{{ HTML::style('assets/css/component.css') }}
@stop

@section('content')
<div class="container st-container" id="st-container">
    <div class="panel panel-default st-pusher">

        <div class="panel-heading">
            @if (isset($node))
            <div class="pull-left panel-title">{{ lang('Current Node') }}: {{{ $node->name }}}</div>
            @endif

            <div id="st-trigger-effects" class="nodeslist">
                <button class="btn btn-success btn-sm" data-effect="st-effect-1">{{ lang('All Nodes') }}</button>
            </div>

            @include('theme::topics.partials.filter')

          <div class="clearfix"></div>
        </div>

        @if ( ! $topics->isEmpty())

            <div class="panel-body remove-padding-horizontal">
                @include('theme::topics.partials.topics', ['column' => false])
            </div>

            <div class="panel-footer text-right remove-padding-horizontal pager-footer">
                <!-- Pager -->
                {{ $topics->appends(Request::except('page', '_pjax'))->links(); }}
            </div>

        @else
            <div class="panel-body">
                <div class="empty-block">{{ lang('Dont have any data Yet') }}~~</div>
            </div>
        @endif

    </div>

    <!-- Nodes Listing -->
    @include('theme::nodes.partials.list')

</div>
@stop