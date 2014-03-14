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
    <!-- eight -->
    <div id="eight" class="w90 mt10">
        <h2 class="eightit"><img src="{{ asset('assets/eight.gif') }}" alt="只8步，马上了解全程家装全部!" /></h2>
        <b class="uleiline"></b>
        <ul class="eightlist clearfix">
            <li>
                <a href="eight_01.html" class="current">
                    <p class="a01">
                        <b>设计咨询</b>
                    </p>
                    <span class="a01">
                        <b>选择装修模式<br />
                            选择装修公司<br />
                            装修风水</b>
                    </span>
                </a>
            </li>
            <li>
                <a href="eight_01.html">
                    <p class="a02">
                        <b>开工大吉</b>
                    </p>
                    <span class="a02">
                        <b>施工方现场交底<br />
                            图纸深化<br />
                            定制商品现场测量</b>
                    </span>
                </a>
            </li>
            <li>
                <a href="eight_01.html">
                    <p class="a03">
                        <b>隐蔽工程</b>
                    </p>
                    <span class="a03">
                        <b>房型改造<br />
                            排管布线<br />
                            水电定位</b>
                    </span>
                </a>
            </li>
            <li>
                <a href="eight_01.html">
                    <p class="a04">
                        <b>瓦木工程 </b>
                    </p>
                    <span class="a04">
                        <b>防水墙地面处理<br />
                            瓷砖铺贴<br />
                            木工木制作</b>
                    </span>
                </a>
            </li>
            <li>
                <a href="eight_01.html">
                    <p class="a05">
                        <b>油漆工程</b>
                    </p>
                    <span class="a05">
                        <b>墙面处理<br />
                            油漆施工<br />
                            必备材料</b>
                    </span>
                </a>
            </li>
            <li>
                <a href="eight_01.html">
                    <p class="a06">
                        <b>成品安装</b>
                    </p>
                    <span class="a06">
                        <b>地板安装<br />
                            卫浴安装<br />
                            定制商品安装</b>
                    </span>
                </a>
            </li>
            <li>
                <a href="eight_01.html">
                    <p class="a07">
                        <b>环境检测</b>
                    </p>
                    <span class="a07">
                        <b>除尘保洁<br />
                            室内环境监测<br />
                            减轻环境污染</b>
                    </span>
                </a>
            </li>
            <li>
                <a href="eight_01.html">
                    <p class="a08">
                        <b>软装入住</b>
                    </p>
                    <span class="a08">
                        <b>电器入场<br />
                            家具入场<br />
                            家居装饰品入场</b>
                    </span>
                </a>
            </li>
        </ul>
    </div>
    <!--con-->
    <div id="main" class="w1000 mt20 clearfix">
        <ul class="toplist">
            @if($datas['weishengjian'])
            <li>
                <h3>
                    <strong>卫生间推荐</strong>
                    <b>Recommended Toilet</b>
                </h3>
                <img src="{{ asset($datas['weishengjian']) }}" />
            </li>
            @endif
            @if($datas['keting'])
            <li>
                <h3>
                    <strong>客厅推荐</strong>
                    <b>Recommended livingroom</b>
                </h3>
                <img src="{{ asset($datas['keting']) }}" />
            </li>
            @endif
            @if($datas['woshi'])
            <li>
                <h3>
                    <strong>卧室推荐</strong>
                    <b>Recommended Bedroom</b>
                </h3>
                <img src="{{ asset($datas['woshi']) }}" />
            </li>
            @endif
            @if($datas['yangtai'])
            <li>
                <h3>
                    <strong>阳台推荐</strong>
                    <b>Recommended Balcony</b>
                </h3>
                <img src="{{ asset($datas['yangtai']) }}" />
            </li>
            @endif
        </ul>
        <ul class="toplist downlist clearfix">
            @if($datas['chufang'])
            <li>
                <h3>
                    <strong>厨房推荐</strong>
                    <b>Recommended Kitchen</b>
                </h3>
                <img src="{{ asset($datas['chufang']) }}" />
            </li>
            @endif
            @if($datas['ruanzhuang'])
            <li>
                <h3>
                    <strong>软装推荐</strong>
                    <b>Recommended Soft furnishings</b>
                </h3>
                <img src="{{ asset($datas['ruanzhuang']) }}" />
            </li>
            @endif
            @if($datas['chaobaodanpin'])
            <li>
                <h3>
                    <strong>超爆单品推荐</strong>
                    <b>Hot Single Product</b>
                </h3>
                <img src="{{ asset($datas['chaobaodanpin']) }}" />
            </li>
            @endif
            @if($datas['qijiao'])
            <li>
                <h3>
                    <strong>漆胶推荐</strong>
                    <b>Recommended Paint glue</b>
                </h3>
                <img src="{{ asset($datas['qijiao']) }}" />
            </li>
            @endif
            @if($datas['dianqi'])
            <li>
                <h3>
                    <strong>电器推荐</strong>
                    <b>Recommended Electrical appliances</b>
                </h3>
                <img src="{{ asset($datas['dianqi']) }}" />
            </li>
            @endif
            @if($datas['jichujiancai'])
            <li>
                <h3>
                    <strong>基础建材推荐</strong>
                    <b>Basic materials</b>
                </h3>
                <img src="{{ asset($datas['jichujiancai']) }}" />
            </li>
            @endif
        </ul>
    </div>z
@stop