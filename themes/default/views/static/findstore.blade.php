@extends('layouts.main')

@section('style')
    <!--<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script> -->
    <script type="text/javascript" src="http://ditu.google.cn/maps/api/js?sensor=false"></script> 
    <script type="text/javascript" src="{{ asset('packages/jjl/mappoints.js') }}"></script>
    <script type="text/javascript" src="{{ asset('packages/jjl/findstore_google.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            var sid = {{ Input::get('id') ? Input::get('id') : 0}};
            var currCityid = {{ Input::get('cityid') ? Input::get('cityid') : 0 }};                               
            drawMap();
            zoomCity(currCityid,sid);
            $('#store_lists').children().eq(currCityid).find('a').addClass('current');
        }); 
    </script>
@stop

@section('content')
<!--con-->
<div id="main" class="w1000 mt20 clearfix">
    <h2 class="cnstit noline"><span>门店查找</span></h2>

    <div class="w1000">
        <ul id="store_lists" class="diarynav clearfix">
            <li><a href="javascript:void(0)" onclick="zoomCity(currCityid,0);">南京江东门店</a></li>
            <li><a href="javascript:void(0)" onclick="zoomCity(1,0);">徐州云龙店</a></li>
            <li><a href="javascript:void(0)" onclick="zoomCity(2,0);">常州奥体中心店</a></li>
        </ul>
        <br class="clear" />
        <div class="map">
            <div id="map_canvas" style="overflow:hidden;zoom:1;position:relative;"> 
                <div id="map" style="height:100%;-webkit-transition: all 0.5s ease-in-out;transition: all 0.5s ease-in-out;"></div>
            </div>
        </div>
        <div class="mapright">
            <h2 class="cnstit noline"><span>搜索线路</span></h2>
            <div class="mapC" style="margin:0px;padding:0px;min-height:20px;">
                <div class="line" style="padding-bottom:10px;">
                    <p class="ttl"><span class="tfc"><a href="javascript://" onclick="change_travelmode('taxi',1);">驾车</a> | <a href="javascript://" onclick="change_travelmode('walk',2);">步行</a></span>搜索线路</p>
                    <table cellpadding="0" cellspacing="0" border="0">
                        <colgroup>
                            <col class="col1">
                            <col class="col2">
                        </colgroup>
                        <tbody><tr>
                            <td>&nbsp;</td>
                            <td>
                            <input id="travelmode" type="hidden" value="1">
                            <p class="tfcSlt"><a href="javascript://" onclick="change_travelmode('taxi',1);" class="cur" id="taxi"><span>驾车</span></a>
                            <!--<a href="javascript://" onclick="change_travelmode('train',4);" id="train"><span>公交</span></a> -->
                            <a href="javascript://" onclick="change_travelmode('walk',2);" id="walk" class=""><span>步行</span></a></p></td>
                        </tr>
                        <tr>
                            <td><p class="place"><font face="Arial">A</font></p></td>
                            <td><input id="fromaddr" name="fromaddr" type="text" style="height:18px;line-height:18px;"></td>
                        </tr>
                        <tr>
                            <td><p class="place"><font face="Arial"><font face="Arial">B</font></font></p></td>
                            <td><select id="toaddr" name="toaddr" onchange="zoomCity(currCityid,this.value);" style=""><option value="0">江东门店</option><option value="1">镇江工作室</option></select></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td style="padding:10px 0px 0px 0px;"><img src="{{ asset('assets/goMap.png') }}" onclick="searchfromform();" style="border:0px;cursor:pointer"></td>
                        </tr>
                    </tbody></table>
                    </div>
                  
                <div id="rowlist" style="margin-top:0px;margin-bottom:0px;padding-left:2px;"></div>
                <div style="clear:both"></div>
                <div id="directioninfo">
                    <div class="result" id="my_textual_div" style="margin: 0px;"></div>
                </div>
            </div>
            <div class="address" style="padding-top:35px;">
                <table width="100%">
                    <tbody><tr>
                        <td rowspan="5" width="10" nowrap="nowrap" style="padding-bottom:5px;" align="center">
                        <div style="background-color: rgb(92, 44, 72); width: 2px; height: 90px; background-position: initial initial; background-repeat: initial initial;" id="l_bg">&nbsp;</div>
                        </td>
                        <td rowspan="5" width="15">&nbsp;</td>
                        <td><h2 style="color:#ffffff;"><span id="curren_store_title"><div style="background-color:#ff7f00;height:24px;padding-left:10px;width:68px;">雨花店：</div> </span></h2></td>
                    </tr>
                    <tr>
                        <td>地址：<span id="curren_store_addr">南京卡子门大街90号麦德龙旁</span></td>
                    </tr>
                    <tr id="curren_store_tel_tr">
                        <td>联系电话：<span id="curren_store_tel" class="a_face">025-52450077</span></td>
                    </tr>
                    <tr id="curren_store_tel2_tr">
                        <td id="curren_store_tel2">装修咨询：<span class="a_face">025-52457223</span></td>
                    </tr>
                        <tr id="curren_store_tel3_tr" style="display:none">
                                    <td id="curren_store_tel3">团购热线：<span class="a_face">021-66345050</span></td>
                        </tr>
                </tbody></table>
            </div>
            <!-- <div style="height:20px;">&nbsp;</div>
            <h3 class="f18 clorge">南京江东门店</h3>
            
            <p class="contxt">
                地&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;址：江苏省南京市建邺区江东门北街<br />
                电&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;话：4009906061<br />
                营业时间：周一-周五：9:00-18:00<br />
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;周六周日及节假日：9：00-19:00<br />
            </p> -->
        </div>
    </div>
</div>
@stop