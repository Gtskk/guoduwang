@extends('layouts.main')

@section('style')
<script type="text/javascript" src="{{ asset('packages/jjl/js/teambox.js') }}"></script>
<script type="text/javascript" src="{{ asset('packages/jjl/js/jquery.cityselect.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function(){
      	$("#store_select").citySelect({
          	prov:"江苏", 
          	city:"南京",
          	dist:"江东门店"
      	});

		$('.seachbtn').click(function(){
			var $s1=$("#select");
			var $s2=$("#select2");
			var $s3=$("#select3");

			var s1_curr_val = $s1.val();
			var s2_curr_val = $s2.val();
			var s3_curr_val = $s3.val();
			var link = "/findstore?cityid=" + s2_curr_val+"&id=" + s3_curr_val;
			location.href = link;
		});
    });
</script>

@stop

@section('content')
<!--con-->
<div id="main" class="w1000 mt20 clearfix">
	<ul class="activetit clearfix">
		<li><a href="{{ route('design') }}">装修指南</a></li>
		<li><a href="{{ route('team') }}" class="current">设计团队</a></li>
		<li><a href="#">装修案例</a></li>
	</ul>
	<div class="teambox">
		<div class="teamleft mt20">
			<img src="assets/photo/team01.jpg" />
			<div class="teamtxt">
				<h2 class="clorge f16">
					系出名门、以人为本的家居乐装饰设计团队
				</h2>
				<p class="mt20">
					家居乐装饰公司拥有数十名毕业于专业院校的设计才俊。在各类大赛屡有斩获的他们全面超脱摆摆家具式的原始设计，将设计的源点置于对您生活情境、人生诉求的深刻体悟，并请您参与设计全程。</p>
				　　<p>一份客户需求表、至少12张的规范设计图纸、三个亮点，三级签字审核，确保您对设计师满意放心，“人性化”的设计理念，为您营造一个适合您的舒适、温馨生活乐园。</p>
				　　<p>工程开工后，家居乐的设计师会前往工地与工程部门进行沟通，就施工中的细节设计问题进行实地解决。</p>
				　　<p>设计交底时，设计师会现场详尽地将设计图解释于施工队长；设计师会告知工人水电走向与日后用途；设计师们将提供独到的延伸服务——软装饰后期配套效果设计，使您后置的窗帘、布艺、沙发、家具等完全与硬装修融为一体，充分体现出您高质量生活的品味。
				</p>
			</div>
		</div>
		<div class="teamright mt20">
			<a href="#">
				<img src="assets/photo/reserv.jpg" />
			</a>
			<a href="http://weibo.com/u/3516209254" target="_blank">
				<img src="assets/photo/sina2.jpg" class="mt10" />
			</a>
			<img src="assets/photo/weixin.jpg" class="mt10" />
			<div class="teamseach mt20">
				<h3 class="teamrtit">
					<span>门店查找</span>
				</h3>
				<div class="teamseachlist" id="store_select">
					<table border="0" cellpadding="6" cellspacing="0">
						  <tr>
						    <td>城市：</td>
						    <td><label>
						      <select name="select" id="select" class="prov">
						      </select> 
						      <select name="select2" id="select2" class="city">
						      </select>
						    </label></td>
						  </tr>
						  <tr>
						    <td>门店：</td>
						    <td>
						    	<select name="select3" id="select3" class="dist">
							    </select>
							</td>
						  </tr>
						  <tr>
						    <td>&nbsp;</td>
						    <td><label>
						      <input type="submit" name="button" id="button" class="seachbtn" value="提交" />
						    </label></td>
						  </tr>
						</table>
				</div>
				<b class="searchbot"></b>
			</div>
		</div>
		<br class="clear" />
		<h2 class="cnstit">
			<span>资质荣誉</span>
		</h2>
		<img src="assets/photo/team02.jpg" />
		<ul class="box01">
				<li style="left:0px;top:0px;">
					<div class="in">
						<img src="assets/photo/team03.jpg" width="189" height="241" />
						<p>资质荣誉</p>
					</div>
				</li>
				<li style="left:205px;top:0px;">
					<div class="in">
						<img src="assets/photo/team05.jpg" width="248" height="170" />
						<p>资质荣誉</p>
					</div>
				</li>
				<li style="left:474px;top:0px;">
					<div class="in">
						<img src="assets/photo/team06.jpg" width="248" height="170" />
						<p>资质荣誉</p>
					</div>
				</li>
				<li style="left:744px;top:0px;">
					<div class="in">
						<img src="assets/photo/team07.jpg" width="248" height="170" />
						<p>资质荣誉</p>
					</div>
				</li>
				<li style="left:0px;top:259px;">
					<div class="in">
						<img src="assets/photo/team04.jpg" width="190" height="168" />
						<p>资质荣誉</p>
					</div>
				</li>
				<li style="left:205px;top:187px;">
					<div class="in">
						<img src="assets/photo/team08.jpg" width="190" height="240" />
						<p>资质荣誉</p>
					</div>
				</li>
				<li style="left:410px;top:187px;">
					<div class="in">
						<img src="assets/photo/team09.jpg" width="190" height="240" />
						<p>资质荣誉</p>
					</div>
				</li>
				<li style="left:619px;top:187px;">
					<div class="in">
						<img src="assets/photo/team10.jpg" width="190" height="240" />
						<p>资质荣誉</p>
					</div>
				</li>
				<li style="left:826px;top:187px;">
					<div class="in">
						<img src="assets/photo/team11.jpg"  width="167" height="108" />
						<p>资质荣誉</p>
					</div>
				</li>
				<li style="left:826px;top:314px;">
					<div class="in">
						<img src="assets/photo/team12.jpg" width="167" height="114" />
						<p>资质荣誉</p>
					</div>
				</li>
			</ul>

	</div>
</div>
@stop