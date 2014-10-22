@extends('layouts.main')

@section('content')
    <!-- banner -->
    <div id="banner" class="w90 clearfix">
        <div class="flexslider">
            <span class="online"><a href="#">在线预约</a></span>
            <ul class="slides">
                <li>
                  <a href="#"><img src="{{ asset('assets/t/banner1.jpg') }}" /></a>
                </li>
                <li>
                  <a href="#"><img src="{{ asset('assets/t/banner2.jpg') }}" /></a>
                </li>
                <li>
                  <a href="#"><img src="{{ asset('assets/t/banner3.jpg') }}" /></a>
                </li>
            </ul>
        </div>
        <!-- 广告 -->
        <span class="advert"><a href="#"><img src="{{ asset('assets/t/guanggao.jpg') }}" /></a></span>
    </div>
    这是测试主题用的哦
@stop