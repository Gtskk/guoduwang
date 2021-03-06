<div class="col-md-3 side-bar">

	<div class="panel panel-default corner-radius">

		@if (isset($node))
			<div class="panel-heading text-center">
				<h3 class="panel-title">{{{ $node->name }}}</h3>
			</div>
		@endif

		<div class="panel-body text-center">
			<div class="btn-group">
				<a href="
					{{ isset($node) ? URL::route('topics.create', ['node_id' => $node->id]) : URL::route('topics.create') ; }}
					" class="btn btn-success btn-lg">
					<i class="glyphicon glyphicon-pencil"> </i> {{ lang('New Topic') }}
				</a>
			</div>
		</div>
	</div>

	<!-- Nodes Listing -->
	@include('theme::nodes.partials.list')

	@if (isset($links) && count($links))
		<div class="panel panel-default corner-radius">
			<div class="panel-heading text-center">
				<h3 class="panel-title">{{ lang('Links') }}</h3>
			</div>
			<div class="panel-body text-center" style="padding-top: 5px;">
				@foreach ($links as $link)
						<a href="{{ $link->link }}" target="_blank" rel="nofollow" title="{{ $link->title }}">
								<img src="{{ $link->cover }}" style="width:150px; margin: 3px 0;">
						</a>
				@endforeach
			</div>
		</div>
	@endif

	@if (Route::currentRouteName() == 'topics.index')
		<div class="panel panel-default corner-radius">
			<div class="panel-heading text-center">
				<h3 class="panel-title">{{ lang('Recomended Resources') }}</h3>
			</div>
			<div class="panel-body">
				<ul class="list">
					<li><a href="http://laravel-china.org/">Laravel 4.2 文档</a></li>
					<li><a href="http://wulijun.github.io/php-the-right-way/">PHP The Right Way 中文版</a></li>
				</ul>
			</div>
		</div>
	@endif

	@if (isset($nodeTopics) && count($nodeTopics))
		<div class="panel panel-default corner-radius">
			<div class="panel-heading text-center">
				<h3 class="panel-title">{{ lang('Same Node Topics') }}</h3>
			</div>
			<div class="panel-body">
				<ul class="list">

					@foreach ($nodeTopics as $nodeTopic)
						<li>
						<a href="{{ route('topics.show', $nodeTopic->id) }}">
							{{{ $nodeTopic->title }}}
						</a>
						</li>
					@endforeach

				</ul>
			</div>
		</div>
	@endif

	<div class="panel panel-default corner-radius">
		<div class="panel-heading text-center">
			<h3 class="panel-title">{{ lang('Site Status') }}</h3>
		</div>
		<div class="panel-body">
			<ul>
				<li>{{ lang('Total User') }}: {{ $siteStat->member_count }} </li>
				<li>{{ lang('Total Topic') }}: {{ $siteStat->topic_count }} </li>
				<li>{{ lang('Total Reply') }}: {{ $siteStat->reply_count }} </li>
			</ul>
		</div>
	</div>

</div>
<div class="clearfix"></div>