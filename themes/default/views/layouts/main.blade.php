<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>{{ Config::get('site.site_name') }}</title>
		<meta name="robots" content="all" />
		<meta name="author" content="{{ Config::get('site.author') }}" />
		<meta name="copyright" content="http://www.tfwk.cn" />
		<meta name="description" content="{{ Config::get('site.description') }}" />
		<meta name="keywords" content="{{ Config::get('site.keywords') }}" />

		{{ stylesheet_link_tag() }}
	    {{ javascript_include_tag() }}
		@if(Request::path() == '/')
		<script type="text/javascript" src="{{ asset('packages/jjl/js/jquery.flexslider.js') }}"></script>
		<script type="text/javascript">
	        $(window).load(function(){
	           	$('.flexslider').flexslider({
	            	animation: "slide",
	            	slideshowSpeed: 5000,
	            	start: function(slider){
	            	$('body').removeClass('loading');
	            	}
	          	});
	        });
	    </script>
        @endif

        @if(Request::is('product/*'))
		<script type="text/javascript" src="{{ asset('packages/jjl/js/slides.min.jquery.js') }}"></script>
       	<script type="text/javascript">
	        $(function(){
				$('#slides').slides({
					generateNextPrev: true,
					play: 3500
				});
			});
		</script>
		@endif
		@yield('style')
	</head>
	<body>
		<!--header-->
		<div id="header">
			<!--nav-->
			<div id="nav">
				<div class="w90">
					<div class="logo"><h1><a href="/">Homelike家居乐</a></h1></div>
					<ul class="mainav">
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
					<br class="clear" />
				</div>
			</div>
			<div class="weibo">
				<div class="fr mr30">
					<span class="fl mr20"><a href="login.html">登录</a>|<a href="regist.html">注册</a></span>
					<span class="fl xinlang"><a href="http://weibo.com/u/3516209254">新浪微博</a></span>
					<span class="fl">|&nbsp;&nbsp;<a href="#">供货商入口</a></span>
				</div>
			</div>
		</div>

		@yield('content')

		<!-- footer -->
		<div id="footer" class="w1000 mt10 clearfix">
			<div class="footop">
				<p class="footopleft">
					<span class="phone">400-990-6061</span>
					<span class="find noline"><a href="{{ route('findstore') }}">门店查找<b>STORES TO FIND</b></a></span>
				</p>
				<p class="footopcenter">
					<span class="liansuo">大型装饰建材连锁超市
					<b class="f12">瓷砖/地板/卫浴/橱柜/厨房电器/漆胶/建材/移门柜体/五金工具/电工电料</b></span>
					<span class="find">新丽华企业集团<b>SIDIW CORPORATION GROUP</b></span>
				</p>
				<p class="footopright">
					<span class="indexabout">关于我们</span>
					<span class="find"><a href="contact.html">加入我们<b>JOIN US</b></a></span>
				</p>
			</div>
			<div class="footdown">
				<span class="fl ml20">Copyright &copy; 2013家居乐 苏ICP备12012215号 <a href="htttp://www.tfwk.cn">Designed By Tuneful</a></span>
				<span class="fr mr20">
					<a href="personcenter.html">个人中心</a>| 
					<a href="cns.html">投诉与建议</a> | 
					<a href="service.html">家居乐服务</a>
				</span>
			</div>
		</div>
	</body>
</html>