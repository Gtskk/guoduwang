<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="robots" content="all" />
		<meta name="author" content="{{ Config::get('site.site_config.author') }}" />
		<meta name="description" content="{{ Config::get('site.site_config.description') }}" />
		<meta name="keywords" content="{{ Config::get('site.site_config.keywords') }}" />
		<title>{{ Config::get('site.site_config.site_name') }}</title>

		<link rel="stylesheet" href="{{ asset('assets/css/'.get_css_js_file('frontend.styles')) }}">
		@yield('styles')

		<script>
            Config = {
                'user_id': {{ isset($currentUser) ? $currentUser->id : 0 }},
                'routes': {
                	'site_url': '{{ url('/') }}',
                	'topic_url': '{{ route('topics.index') }}',
                	'login_url': '{{ route('login-required') }}',
                    'upload_image' : '{{ route('upload_image') }}',
                    'notificationsCount': '{{ route('notificationsCount') }}'
                },
                'token': '{{ csrf_token() }}',
            };
        </script>

	    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	    <!--[if lt IE 9]>
	      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	    <![endif]-->
	</head>
	<body>

		<div id="wrap">
		    <nav class="navbar navbar-inverse navbar-fixed-top">
		        <div class="container">
		            <div class="navbar-header">
		                <button type="button" class="navbar-toggle" data-target="#navbar">
		                    <span class="sr-only">Toggle navigation</span>
		                    <span class="icon-bar"></span>
		                    <span class="icon-bar"></span>
		                    <span class="icon-bar"></span>
		                </button>
		                <a class="navbar-brand" href="{{ URL::to('/') }}">{{ Config::get('site.site_config.site_name') }}</a>
		            </div>

		            <div id="navbar" class="collapse navbar-collapse">
		                <ul class="nav navbar-nav">
		                    <?php $num = count(Config::get('site.main_menu'));?>
		                    @foreach (Config::get('site.main_menu') as $title => $args)
		                        @if ($args['type'] === 'single')
		                            <li class="{{ $args['class'] or '' }}">
		                            @if(isset($args['param']))
		                                <a href="{{ isset($args['route']) ? route($args['route'], $args['param']) : '#'}}"@if(isset($args['menu']) && in_array(Request::segment(2), $args['menu'])) class="current"@endif>
		                            @else
		                                @if(isset($args['route']))
		                                <a href="{{ route($args['route']) }}"@if(Request::url() == route($args['route'])) class="current"@endif>
		                                @else
		                                <a href="#">
		                                @endif
		                            @endif
		                                    <b class="a{{ $num }}">{{ $title }}</b>
		                                </a>
		                            </li>
		                        @else
		                            <li class="dropdown">
		                                <a data-toggle="dropdown" class="dropdown-toggle" href="blank.html#">
		                                   {{ $title }} <b class="caret"></b>
		                                </a>
		                                <ul class="dropdown-menu">
		                                    @foreach ($args['links'] as $title => $value)
		                                        <li>{{ HTML::linkRoute($value['route'], $title) }}</li>
		                                    @endforeach
		                                </ul>
		                            </li>
		                        @endif
		                        <?php $num--;?>
		                    @endforeach
		                </ul>
						
						<div class="navbar-right">
			                <!-- 搜索 -->
			                <form class="navbar-form navbar-left" action="{{ URL::to('search') }}" accetp-charset="UTF-8" role="search">
					            <input id="searchkey" type="text" class="form-control" placeholder="搜索" name="q">
					        </form>

			                @if(Auth::check())
			                <ul class="nav navbar-nav navbar-right">
			                    <li>
			                  	<a href="{{ route('notifications.index') }}" class="text-warning">
			                      	<span class="badge badge-fade" id="notification-count">0</span>
			                  	</a>
			              		</li>
			              		<li>
			                  		<a href="{{ URL::to('members', Confide::user()->id) }}">
			                      		<i class="fa fa-user"></i> {{ Confide::user()->username }}
			                  		</a>
			              		</li>
			              		<li>
			                  		<a class="button" href="{{ URL::to('members/logout') }}" onclick=" return confirm('{{ lang("Are you sure want to logout?") }}')">
			                      	<i class="fa fa-sign-out"></i> {{ lang('Logout') }}
			                  	</a>
			              		</li>
			                </ul>
			                @elseif(Request::is('members/*'))
			                @else
			                	@include('theme::members.login')
			                @endif
						</div>
						
		            </div><!--/.navbar-collapse -->

		        </div>
		    </nav>
			
			@yield('content404')
			<div class="container">
				@yield('content')
			</div>

		</div>

		<div class="footer">
		    <div class="container">
		      	<p class="pull-left">
		      		<i class="fa fa-heart-o"></i> Made With Love By The YOHO Group. <br>
					&nbsp;<i class="fa fa-lightbulb-o"></i> Inspired by <a href="https://phphub.org">Phphub</a>.
		      	</p>

		      	<p class="pull-right">
		      		<i class="fa fa-cloud"></i> Powered by <a href="http://laravel.com">Laravel <i class="fa fa-external-link"></i></a>.
		      	</p>
		    </div>
		</div>
		
		<script type="text/javascript" src="{{ asset('assets/js/'.get_css_js_file('frontend.scripts')) }}"></script>
		<!--<script type="text/javascript">
		    // Enable pusher logging - don't include this in production
		    // Pusher.log = function(message) {
		    //   	if (window.console && window.console.log) {
		    //     	window.console.log(message);
		    // 	}
		    // };

            if(Config.user_id > 0)
            {
            	$.get(Config.routes.notificationsCount);

			    var pusher = new Pusher('1bc9b80b828a5ca33f9a');
			    var channel = pusher.subscribe('notifications');
			    var original_title = document.title;
			    channel.bind('count', function(data) {
			      	var nCount = parseInt(data.count);
			      	if(nCount > 0)
			      	{
			      	    $('#notification-count').text(nCount);
			      	    $('#notification-count').hasClass('badge-important') || $('#notification-count').addClass('badge-important');
			      	    document.title = '('+nCount+')'+original_title;
			      	}
			      	else
			      	{
			      	    document.title =  original_title;
			      	    $('#notification-count').text(0);
			      	    $('#notification-count').addClass('badge-fade');
			      	    $('#notification-count').removeClass('badge-important');
			      	}
			    });
			}
	  	</script>-->
		@yield('javascript')

	</body>
</html>