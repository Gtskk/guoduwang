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
                'routes': {
                    'upload_image' : '{{ route('upload_image') }}'
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

	    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	        <div class="container">
	            <div class="navbar-header">
	                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	                    <span class="sr-only">Toggle navigation</span>
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	                </button>
	                <a class="navbar-brand" href="{{ URL::to('/') }}">{{ Config::get('site.site_config.site_name') }}</a>
	            </div>

	            <div id="navbar" class="navbar-collapse collapse">
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

	                @if(Auth::check())
	                    <h3 class="pull-right text-success">
	                    	Hello, {{ Confide::user()->username }}
	                    	<a href="{{ URL::to('members/logout') }}">Logout</a>
	                    </h3>
	                @elseif(Request::is('members/login'))
	                @else
	                	@include('theme::members.login')
	                @endif
					
					<!-- 搜索 -->
	                <form class="navbar-form navbar-right" action="{{ URL::to('search') }}" accetp-charset="UTF-8">
			            <input id="searchkey" type="text" class="form-control" placeholder="搜索" name="q">
			        </form>

	            </div><!--/.navbar-collapse -->

	        </div>
	    </nav>

		@section('content')
			<div class="container">
		        <!-- Example row of columns -->
		        <div class="row">
		            <div class="col-md-4">
		                <h2>Heading</h2>
		                <p>Donec id elit non mi porta gravida adfdt eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
		                <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
		            </div>
		            <div class="col-md-4">
		                <h2>Heading</h2>
		                <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
		                <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
		            </div>
		            <div class="col-md-4">
		                <h2>Heading</h2>
		                <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
		                <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
		            </div>
		        </div>

		        <hr>

		        <footer>
		            <p>&copy; Company 2014</p>
		        </footer>
		    </div> <!-- /container -->
		@show

		@section('javascript')
		<script src="{{ asset('assets/js/'.get_css_js_file('frontend.scripts')) }}"></script>
		@show

	</body>
</html>