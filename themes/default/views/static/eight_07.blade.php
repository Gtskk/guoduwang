@extends('layouts.main')

@section('content')
<!--con-->
<div id="main" class="w1000 mt20 clearfix">
	<ul class="activetit clearfix">
		<li><a href="design.html" class="current">装修指南</a></li>
		<li><a href="team.html">设计团队</a></li>
		<li><a href="case.html">装修案例</a></li>
	</ul>
	<!-- eight -->
	<div id="eight" class="w90 mt10">
		<h2 class="eightit"><img src="images/eight.gif" alt="只8步，马上了解全程家装全部!" /></h2>
		<strong class="designote">注：以下步骤为大众标准时间，采用特殊工艺的装修除外。</strong>
		<b class="uleiline"></b>
		<ul class="eightlist clearfix">
			<li>
				<a href="design.html">
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
				<a href="eight_02.html">
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
				<a href="eight_03.html">
					<p class="a03">
						<b>隐蔽工程</b>
					</p>
					<span class="a03">
						<b>房型改造，排管布线<br />
							水电定位，必备材料
						</b>
					</span>
				</a>
			</li>
			<li>
				<a href="eight_04.html">
					<p class="a04">
						<b>瓦木工程 </b>
					</p>
					<span class="a04">
						<b>防水墙地面处理，瓷砖铺贴<br />
							木工木制作，必备材料
						</b>
					</span>
				</a>
			</li>
			<li>
				<a href="eight_05.html">
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
				<a href="eight_06.html">
					<p class="a06">
						<b>成品安装</b>
					</p>
					<span class="a06">
						<b>地板安装，卫浴安装<br />
							定制商品安装，必备材料
						</b>
					</span>
				</a>
			</li>
			<li>
				<a href="eight_07.html" class="current">
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
				<a href="eight_08.html">
					<p class="a08">
						<b>软装入住</b>
					</p>
					<span class="a08">
						<b>电器入场 <br />
							家具入场<br />
							家居装饰品入场</b>
					</span>
				</a>
			</li>
		</ul>
	</div>
	<div class="contxt">
		<p class="designtopbg clearfix">
			<strong><img src="images/photo/designtit07.gif" /></strong>
			<b class="designdown"><a href="#"><img src="images/photo/down01.jpg" /></a></b>
			<span class="dottline clorhl">
			新家刚刚装修完毕，各种家具挥发的气体，以及装修中使用的涂料等等都有可能成为污染源，所以装修完毕最好进行一次装修污染检测，确定室内环境质量。
			</span>
			<img src="images/photo/desiphoto66.jpg" class="mt20" />
			<br class="clear" />
			<img src="images/photo/desiphoto67.jpg" class="fl mt10" />
			<span class="fr mt10" style="width:500px;">
					<em class="clorge">氡：是一种放射性惰性气体，无色无味。存在于在水泥、砂石中</em><br />
					危害：室内污染物氡污染仅次于吸烟，列肺癌诱因第二。<br />
					<em class="clorge">甲醛: 具有强烈气味。人造板材使用了粘合剂，而含有甲醛。</em><br />
					危害：吸入高浓度甲醛后，会出现呼吸道的严重刺激。皮肤直接接触甲醛引起皮炎。<br />
					<em class="clorge">苯: 苯是一种无色、具有特殊芳香气味的液体。</em><br />
					危害：长期吸入苯能导致再生障碍性贫血。<br />
					<em class="clorge">TVOC: 总挥发性有机化合物(TVOC)， 主要来源于涂料、粘合剂等 </em><br />
					危害：TVOC能引起头晕、头痛、嗜睡、无力、胸闷等症状<br />
					<em class="clorge">氨： 氨气极易溶于水，对眼、喉、上呼吸道作用快，刺激性强</em><br />
					危害：长时间接触低浓度氨，引起喉炎、声音嘶哑、肺水肿。<br />
			</span>
		</p>
		<p class="mt10 clearfix">
			<span class="fl" style="width:480px;">
				<img src="images/photo/desiphoto68.jpg" class="mb10" />
				建筑工程室内环境污染物浓度限量
			</span>
			<span class="fr" style="width:480px;">
				<img src="images/photo/desiphoto69.jpg" class="mb10" />
				氡、氨、甲醛、苯、TVOC 单价(300元/点/项) 五项合计：1500元
			</span>
		</p>
		<p class="mt10 clearfix">
			<span class="fl" style="width:480px;">
				<img src="images/photo/desiphoto70.jpg" class="mb10" />
				须在装修完成自然通风7天后进行各项检测。氨、甲醛、苯、总挥发性有机物TVOC浓度检测，应在门窗关闭1小时后立即进行。氡浓度检测时，应在外门窗关闭24小时后进行。
			</span>
			<span class="fr" style="width:480px;">
				<img src="images/photo/desiphoto71.jpg" class="mb10" />
				一个采样点需要是30分钟到一两个小时等待检测报告。
			</span>
		</p>
		<p class="mt10 clearfix">
			<span class="fl" style="width:560px;">
				<img src="images/photo/desiphoto72.jpg" class="mb10" /> <br />
				1、应该尽量采用使用大芯板、三合板、装修胶等用量少的设计方案，因为这些易造成装修污染；少用这些材料能够减少装修污染。在选购装修材料的时候应该尽量选择经过权威部门检测合格的环保产品，避免使用低质材料，造成不必要的装修污染治理。<br />
				2、装修过程中，装修污染如何治理是个很关键的步骤，例如在装修过程中主要是对板材<大芯板、三合板>等进行除甲醛处理：在板材刷油漆之前在板材正反两面用甲醛清除剂进行涂刷处理，能够非常有效的清除板材中的游离甲醛 ，注意在儿童和老年人居住的房间内，装修时应减少或避免使用油漆，儿童房可使用儿童漆或水性漆。避免油漆释放的甲醛，苯等物质带来的室内装修污染。<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;比如在铺地板前地龙里应放一些木炭(竹炭也可) ，在装修油漆过程中，家具的端口也要刷油漆，起到封闭作用。<br />
				3、装修好以后，一定要空置2--3个月，且开窗通风。放置一些绿色植物。前提是装修材料必须是环保的。在污染源放置一些活性炭。污染源一般是暖气罩、抽屉、衣柜、书柜、床箱等人造板材使用量大的地方。放入活性炭后，家具一定要关严，释放出来的甲醛等有害气体就会被活性炭吸附，从而避免污染。
			</span>
			<span class="fr" style="width400px;">
				<img src="images/photo/desiphoto73.jpg" />
			</span>
		</p>
	</div>
</div>
@stop