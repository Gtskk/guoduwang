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

@section('content')
<div class="row">
	<!-- 最新话题列表 -->
    <div class="col-lg-5">
    	@if(count($recentTopics))
        <div class="panel panel-primary">
            <div class="panel-heading">最新话题</div>
            <div class="list-group">
                @foreach($recentTopics as $topic)
                <a href="{{ route('topics.show', array($topic->id)) }}" class="list-group-item" target="_blank">
                    <span class="badge">{{ $topic->reply_count }}</span>
                    {{{ $topic->title }}}
                </a>
                @endforeach
            </div>
        </div>
        @else
        <h2>{{ lang('no_topics') }}</h2>
        @endif
    </div>

    <!-- 最新会员列表 -->
    <div class="col-lg-5 col-lg-offset-2">
    	@if(count($recentMembers))
        <div class="panel panel-primary member_list">
            <div class="panel-heading">最新会员</div>
            <div class="panel-body">
                @foreach($recentMembers as $member)
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                    <div class="thumbnail">
                        <a href="{{ route('members.show', array($member->id)) }}" target="_blank">
                            <img src="{{ $member->image_url }}" alt="{{ lang('Avatar') }}" class="img-circle" style="width:30px;">
                            <p class="text-center">{{{ $member->username }}}</p>
                        </a>                        
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @else
        <h2>{{ lang('no_members') }}</h2>
        @endif

    </div>
    </div>
</div>
@stop