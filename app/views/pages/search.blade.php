@extends('theme::layouts.main')

@section('content')
	<div class="row">
		{{-- 话题  --}}
		<div class="col-md-6">
			<div class="panel panel-default list-panel">
				<div class="panel-heading">
					<h3 class="panel-title text-center">{{ lang('Topics') }}</h3>
				</div>
				<div class="panel-body">
					@if(count($topics))
					<ul class="list-group">
					    @foreach ($topics as $topic)
					    <li class="list-group-item">
					        <a href="{{ route('topics.show', [$topic->id]) }}" >
					            {{ $topic->title }}
					        </a>
					        <span class="badge">{{ $topic->reply_count }}</span>
					    </li>
					    @endforeach
					</ul>
					@else
					   <div class="empty-block">{{ lang('search_no_results') }}~~</div>
					@endif
				</div>
			</div>
		</div>
		
		{{-- 用户 --}}
		<div class="col-md-6">
			<div class="panel panel-default list-panel">
				<div class="panel-heading">
					<h3 class="panel-title text-center">{{ lang('Members') }}</h3>
				</div>
				<div class="panel-body">
					@if(count($members))
					<ul class="list-group">
						@foreach ($members as $member)
						<li class="list-group-item media">
							<div class="media-left">
								<img src="{{ $member->image_url }}" class="img-circle" alt="Gravatar" style="width: 50px;">
							</div>
							<div class="media-body media-middle">
								<div class="media-heading">
									<a href="{{ route('members.show', [$member->id]) }}">
										{{ $member->username }}
									</a>									
								</div>
								{{ $member->email }}
							</div>
						</li>
						@endforeach
					</ul>
					@else
					   <div class="empty-block">{{ lang('search_no_results') }}~~</div>
					@endif
				</div>
			</div>
		</div>

	</div>
@stop