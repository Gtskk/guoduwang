@extends('theme::layouts.main')

@section('content')
<div class="panel panel-default topiclist col-md-9">

    <div class="panel-heading">
        @if (isset($node))
        <div class="pull-left panel-title">{{ lang('Current Node') }}: {{{ $node->name }}}</div>
        @endif

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

@include('theme::topics.partials.sidebar')
@stop