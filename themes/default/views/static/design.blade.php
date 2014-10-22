@extends('layouts.main')

@section('content')
<!--con-->
<div id="main" class="w1000 mt20 clearfix">
	<ul class="activetit clearfix">
		<li><a href="{{ route('design') }}" class="current">装修指南</a></li>
		<li><a href="{{ route('team') }}">设计团队</a></li>
		<li><a href="#">装修案例</a></li>
	</ul>
	<!-- eight -->
	<div id="eight" class="w90 mt10">
		<h2 class="eightit"><img src="assets/eight.gif" alt="只8步，马上了解全程家装全部!" /></h2>
		<strong class="designote">注：以下步骤为大众标准时间，采用特殊工艺的装修除外。</strong>
		<b class="uleiline"></b>
		<ul class="eightlist clearfix">
			<li>
				<a href="design.html" class="current">
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
				<a href="eight_07.html">
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
		<p class="designtitbg">
			<b class="designdown"><a href="#"><img src="assets/photo/down01.jpg" /></a></b>
			<span class="dottline">对于首次装修房子的人来说，装修第一步就是选择哪种装修方式，清包&半包&全包，几种模式各有优缺点，无非是根据自家情况来决定，合适的才是最好的。
			</span>
			<b>一、清包模式：装修过程等于再上一次大学</b>
			清包是指业主自行购买所有装修主材辅料，而装饰公司只负责施工。       清包的好处：装修材料品质自己掌握，费用更易控制，避免装饰公司从材料中赚差价。
			清包的坏处：不仅要有闲更要懂行！ 
		</p>
		<p class="linedown clearfix">
			<b>新手攻略3招：</b>
			<span class="fl" style="width:700px;">
			（1）业主要很好的掌控施工进度，确定各个环节的施工时间和施工标准，提前做好装修材料的购买准备，避免在装修过程中重新调整，拖延工期。 <br />
			（2）所有材料标明品牌、型号、颜色，谨防装修队偷梁换柱，尽量在正规卖场以保证材料质量，避免因材料问题与施工方扯皮。<br />
			（3）把握好各个关键节点的验收和付款环节，在每次验收和付款时，必须本人到场。此外，还可以聘请独立监理，监督工程队的各项工作。
			</span>
			<img src="assets/photo/star01.jpg" class="fr" />
		</p>
		<p class="linedown clearfix">
			<b>二、半包模式：紧抓主材不放松，谨防辅料扯皮</b>
			半包指业主自己采购主材，装饰公司负责施工和采购部分辅材。          半包的好处：主材品质自己掌握，种类繁杂的辅料由装饰公司采购，比较省事。
半包的坏处：辅料质量不好，后续麻烦一大堆！ 
			<b>新手攻略3招：</b>
			<span class="fl" style="width:700px;">
			（1）事先明确业主和装饰公司各自应尽的职责。比如地板由自己购买、装修队负责安装，
         就要事先明确，搬运费、樟木块、防潮垫等由谁负责。<br />
			（2）对于各自购买的材料，必须在进场时由对方进行验收，认可后才进行施工，谨防扯皮。 　<br />
			（3）主材的购买直接关系装修的舒适和质量，多看多比，价格之外，更关注卖场提供的质量和售后保证。
			</span>
			<img src="assets/photo/star02.jpg" class="fr" />
		</p>
		<p class="linedown clearfix">
			<b>三、全包模式：把好合同关，考虑周全不吃亏</b>
			全包指装修所有材料采购、施工都由装修公司负责。全包的好处：绝对省心省力，业主可安心做“甩手掌柜”。   全包的坏处：不怕花钱。
			<b>新手攻略3招：</b>
			<span class="fl" style="width:700px;">
			（1）把好合同关，除了审核各项费用的合理性，更要对自己需要的主材、辅料标明品牌、型号、颜色、数量、规格等，避免以次代好。除了签订本市统一的装修合同，还可和公司签订补充合同，明确各项权利。 <br />
			（2）把握好各个关键节点的验收和付款环节，在每次验收和付款时，必须本人到场。聘请独立监理，监督工程队的各项工作。<br />
			（3）在装修之前，先行考察一下装修公司所用的施工队。最好能到施工现场看一看，观察其手工是否精细。 
			</span>
			<img src="assets/photo/star03.jpg" class="fr" />
		</p>
		<p class="linedown clearfix">
			<b>四、家居乐模式：融合清包+全包优势，透明更放心</b>
			<img src="assets/photo/star04.jpg" class="fl" />
			<span class="fr" style="width:680px;">
			家居乐模式指由家居乐装饰公司提供设计、施工服务，而所有材料由消费者在家居乐超市自主购买，结合了清包的透明、放心，又整合了全包的省心、省力。清包工的好处：有别于传统家装公司工料混合，采用“工料分离”的报价方式，工归工，料归料；施工、材料都由家居乐全权负责，既可自主选择材料，控制费用，又可避免材料和工程质量扯皮。
			</span>
			<br class="clear" />
			<b>新手攻略3招：</b>
			<span class="fl" style="width:700px;">
			（1）业主在合同中将施工环节的用工用料全部透明呈现，材料费、人工费分离，管理费、税金都要在合同中明示，所有用料明细单详尽到品牌、数量、规格等。<br />
			（2）约定剩余用材（不影响二次销售）可全额退货。<br />
			（3）如果报价中材料的费用高于其他超市，家居乐将双倍补偿业主购物差额。
			</span>
			<img src="assets/photo/star03.jpg" class="fr" />
		</p>
		<img src="assets/photo/star05.jpg" class="mt30" />
		<span class="dottline">
			选择一个靠谱的家装公司，这绝不是碰运气，而是靠眼力！来，看看关于装修的那些事儿，我们一起“涨姿势”！
		</span>
		<p class="linedown clearfix">
			<b> 一、确定设计风格</b>
			我的地盘我做主！既要信任设计师的能力，也不能任设计师“忽悠”，否则要么自家成了设计师的“个人秀场”；要么预算超支，不是“土豪”也住“豪宅”。
			<b>应对方法：</b>
			（1）从家居杂志、网络图片、实地样板房等寻找灵感，大到风格，小到细节，自己家是个什么样儿，业主最清楚。<br />
			（2）与设计师详细说明家庭成员、喜好、生活方式、习惯等，如果家里有老人或小孩，更要特别说明，这样设计才能符合所有家庭成员的喜好。<br />
			（3）先和设计师确定自己装修预算的上限，一个好的设计师不只会设计漂亮房子，更重要的是懂得帮业主省钱，控制预算。
		</p>
		<p class="linedown clearfix">
			<b> 二、确定装修材料：</b>
			选择包工包料时，不正规的施工队会在家装材料的成色、品牌、价格上作文章，虚报高价、欺瞒业主；而卖场中各种品牌、价位的商品让人无从选择，不同材质的材料，虽然外观差别不大，但质量、价格相差很远；有的装修公司与材料商“唱双簧”，高价向业主推销材料，一旦碰到质量问题，又立即撇清推诿。
			<b>应对方法：</b>
			<span class="fl" style="width:500px;">
			（1）多听多看多比，全面了解材料的质量和价格。<br />
			（2）在合同和平面图中标明所用材料品牌、规格、货号和用量。<br />
			（3）尽量选择自己信得过的卖场和品牌，不仅关注价格，更要关注质量和售后。
			</span>
			<img src="assets/photo/star06.jpg" class="fr" />
		</p>
		<p class="linedown clearfix">
			<b> 三、确定工程预算：</b>
			一些不正规的装修公司在开工前会主动向业主提供工程预算清单，这些预算项目往往是装修公司单方面制定。看似详细的报价单，有时会在计算施工面积时有意加大，该剔除的不剔除，或在不规则处按最大尺寸计算面积。报价单上的材料与实际使用不符合，在基层采用伪劣材料，有意加大材料损耗，并在损耗之后加大工程量，或是在大项目上将报价降低，而在小项目上提高，或者只报单价，不报总价。有的还用套餐报价，项目含糊，变相增高造价。
			<b>应对方法：</b>
			（1）与装修公司核对所报项目的真实情况，一定要一项项查对；<br />
			（2）弄清自己所需的材料、施工程序及服务项目。必要时让装饰公司估算出各种装修材料的用量，规定余亏比例，以防施工队偷工减料；<br />
			（3）在施工图上标明详细的施工做法和材料品名、等级，作为合同附件，仔细检查报价单所列项目的名称、数量、单价和总价。
		</p>
		<p class="linedown clearfix">
			<span class="fl" style="width:520px;">
				<b>  四、确定施工合同：</b>
				不签不知道，一签吓一跳！装修合同处处是陷阱！比如买小零碎儿花不少银子、材料上虚高报价、偷工减料暗牟利、条款不详细设置文字陷阱、明知故“漏”、口头协议没有落定……千头万绪，总有一个套上你！
				<b>  应对方法：</b>
				（1）签合同前要心中有数，明确双方材料供应。<br />
				（2）明确施工图纸，明确付款时间，明确奖惩条款。<br />
				（3）合同文件中要注意施工细节，尽量避免做不到的条款，看清楚条文再签合同。<br />
				（4）通过付款方式中牵制。尽量压低首付款，把尾款押在验收后。
			</span>
			<img src="assets/photo/star07.jpg" class="fr" />
		</p>
		<p class="clearfix">
			<span class="fl" style="width:685px;">
				<b>  ● 财运福运桃花运，装修好运道！</b>
				<b>大门风水：</b>
				<span class="dottline">
				大门朝向有利于事业的发展是以“东、南”两个方位为佳。正门向东象征活力朝气，适合人群：生意商人；正门向南代表：坐北为主南面称臣。适合人群：政治家、企业家、宗教家、富商名人等。大门宜新不宜旧，如有破损，应即时更换。</span>
				<b>客厅风水：</b>
				<span class="dottline">
				客厅最好是安置在屋子的伏位、桃花、财位方，如此才最能发挥正面作用。不论是白天或晚上，客厅得保持明亮，否则家人之间易变得冷漠疏离。若客厅狭小，忌摆放大型的沙发、餐桌、书柜、音响器材等，挤迫地摆设家具会致使家人的财连不佳；沙发背后宜有靠山，若沙发的背后是窗户、门户或通道，便会造成散泄之局，难以旺财旺丁。</span>
				<b>阳台风水：</b>
				<span class="dottline">
				阳台关系到居住者的前途与官运：前阳台主官运、后阳台主财运。公职人员选房若没有前阳台，升迁机会相较之下略差。任何房子都要有后阳台，后阳台上晾的衣服，干了就得收下，不可以晾上二、三天，等到要穿时才收下。</span>
			</span>
			<img src="assets/photo/star08.jpg" class="fr" />
			<br class="clear" />
			<b>卧室风水：</b>
			<span class="dottline">
				主卧风水影响主人运势，如果是夫妻的话会影响夫妻之间的关系。一般主卧方位以东方和北方为佳。卧室宜四平八稳，因此卧室以四方形和长方形为佳，设计切忌设计成圆形、三角形等，这些形状对人的健康不利。卧室房门切忌冲床头，切忌床头无靠山。</span>
			<b>儿童房风水：</b>
			<span class="dottline">
				儿童房首选住宅东部或者东南部，这两个方向在早上能够接受阳光的能量，对儿童健康发展有利。男孩和女孩要分别对待，东方为震卦，代表长男，东南为巽卦，代表长女。风水注重长幼有序，不能用成人床代替儿童床，如果家中有两个以上的孩子合住一个房间，切忌将他们的床放置与不同方向，这样容易使他们产生隔阂。儿童房地板不可铺深红色地板或地毯，卧室窗帘的颜色切忌用大红或者黑色，深色系不利于房间的采光，天花板以乳白色为佳，避免使用暗色调。
			</span>
			<b>厨房风水：</b>
			<span class="dottline">
				厨房方位以选东方为吉，东方为木，木生火，比较适合设置厨房。厨房位于南方、西南、西方、北方为凶。厨房是属阴的区域，是家人不经常使用的地方，如果在厨房一角设置餐区，则可增加厨房的阳气，使厨房阴阳平衡。放在厨房的冰箱切忌空空如也，米缸也要随时补满，象征家中衣食无虞。用红包袋装三个钱，放入米缸中，有招财效果。水龙头、下水管绝对要用质量最好的，绝不能漏水！水龙头漏水会使家中无谓开销不断，钱财守不住。
			</span>
			<b>卫生间风水：</b>
			<span class="dottline">
				一般卫生间需要设置在家居的凶方，以压制凶方对家宅的影响，家宅的正西方是住宅子孙运势的地方，绝不能设置卫生间，对屋主直系晚辈的运势会有负面作用。装修卫生间时，只要把握干净、清爽、通风、明亮等重点，对运势就会有加分的效果，违背以上重点则会有负面扣分的结果。厕所门一定要随手关上，否则会换来全屋子的湿气、垢气，当然全家运气就会越来越差。
			</span>
		</p>
	</div>
</div>
@stop