@extends('layouts.main')

@section('content')
<!--con-->
<div id="main" class="w1000 mt20 clearfix">
	<ul class="activetit clearfix">
		<li><a href="{{ route('service') }}" class="current">家居乐12项服务</a></li>
		<li><a href="{{ route('question') }}">家居乐相关问答Q&A</a></li>
		<li><a href="#">门店地址</a></li>
	</ul>
	<ul class="serlist mt10">
		<li>
			<img src="assets/photo/ser01.jpg" />
			<p>
				<strong>以旧换新服务</strong>
				<span>家里的橱柜、卫生间用久了总有一些不顺心，橱柜门坏了，座厕漏水了，龙头滴水了，下水堵了……如果您有此类烦恼，为何不交给家居乐解决？<br />
				家居乐能为您提供以旧换新和拆装服务，即可让您轻松旧貌焕新颜！<br />
				服务详情及收费标准请至家居乐超市咨询工作人员。</span>
			</p>
			<br class="clear" />
		</li>
		<li>
			<img src="assets/photo/ser02.jpg" />
			<p>
				<strong>全年保持低价服务</strong>
				<span>有没有办法保证我购买的每个商品都是最实惠的！有！<br />
				只要您在家居乐购买的商品，家居乐承诺同期当地市场价格最低。14天内，只要发现所购商品价格高，您将获得200%的差价返还。
			</span>
			</p>
			<br class="clear" />
		</li>
		<li>
			<img src="assets/photo/ser03.jpg" />
			<p>
				<strong>送货服务</strong>
				<span>选择我们所提供的这项服务，您将感受到它为您带来的省时和省力。您只要将您所需要送货的产品告知家居乐的相关工作人员，我们便会在您所需要的送货的时间，将您所需要产品送到您的家中，尽可能减少您的等待时间。在家居乐，运费从未被加进您购买商品的售价中。只要您需要，我们会提供第三方送货服务，只收取合理费用。如果您购买的商品达到一定金额标准，我们将为您提供免费送货服务。送货时间和费用，请咨询当地家居乐服务台。</span>
			</p>
			<br class="clear" />
		</li>
		<li>
			<img src="assets/photo/ser04.jpg" />
			<p>
				<strong>订制类商品测量及安装服务</strong>
				<span>橱柜、移门衣帽间、门窗等订制类商品，涉及测量、设计、安装等一系列技术活儿，若想简单搞定，您可以找家居乐。我们指定的专业服务人员可以根据您的需求，为您提供专业的量身订制服务，可以为您节省很多宝贵时间和费用。详细信息，请咨询家居乐服务台。</span>
			</p>
			<br class="clear" />
		</li>
		<li>
			<img src="assets/photo/ser05.jpg" />
			<p>
				<strong>免费测量服务</strong>
				<span>如果您担心需要购买的商品数量是否合适？您可以与家居乐工作人员预约上门测量服务！不管是瓷砖、地板、橱柜、木门、吊顶等哪类商品，我们都会为您准确计算产品所需要的数量，尽量减少损失和浪费。当然，即使有少量节余，您也可以全价退还家居乐。</span>
			</p>
			<br class="clear" />
		</li>
		<li>
			<img src="assets/photo/ser06.jpg" />
			<p>
				<strong>免费设计预算服务</strong>
				<span>如果您有装修设计方面的需要，把您和家人的想法和需求告诉我们的设计师，他们就会为您量身设计您的梦想之家，为您提供免费的装修设计服务，免费出具装修预算！</span>
			</p>
			<br class="clear" />
		</li>
		<li>
			<img src="assets/photo/ser07.jpg" />
			<p>
				<strong>全程自主体验式购物</strong>
				<span>在家居乐，您可以自由选择、比较、感受产品！所有关于产品的信息都在价格标签上！我们的店员只在您咨询的时候提供商品的专业识知供您判断，让您全程自由、自助购物。</span>
			</p>
			<br class="clear" />
		</li>
		<li>
			<img src="assets/photo/ser08.jpg" />
			<p>
				<strong>小区团购集采服务</strong>
				<span>如果您的小区内有超过10户以上需要装修买材料，请打电话给我们，我们的小区团购部将为您提供专享团购集采服务，专车免费接送，店内专人全程导购服务。</span>
			</p>
			<br class="clear" />
		</li>
		<li>
			<img src="assets/photo/ser09.jpg" />
			<p>
				<strong>家居乐会员卡</strong>
				<span>家居乐实行全会员制服务，在家居乐购物一定别忘了使用我们的会员卡。您的所有购物信息、送货服务预约等都能通过会员卡进行查询，就这么简单！家居乐还会定期针对会员推出一些免费体验服务、日常维修服务……所有服务您都要凭卡享受，千万记得要保存好您的会员卡！</span>
			</p>
			<br class="clear" />
		</li>
		<li>
			<img src="assets/photo/ser10.jpg" />
			<p>
				<strong>退换货政策</strong>
				<span>改变主意了?没关系！不喜欢了？也没关系！家居乐给您设置最为宽松的退货条件：只要您的商品不影响第二次销售，您可以30天内凭有效凭证（小票及发票）进行无理由退换货。很抱歉：处理商品，定制商品、电器商品以及被切割、裁剪和油漆过的产品，不适用于以上条例。</span>
			</p>
			<br class="clear" />
		</li>
		<li>
			<img src="assets/photo/ser11.jpg" />
			<p>
				<strong>顾客服务热线</strong>
				<span>在您访问家居乐商场前，您可登陆家居乐网站（www.jiajule.com.cn）或拨打顾客服务热线（400-990-6061 早9：00 - 晚 9：00），了解商场内产品的存货情况、营业时间、超市活动、交通线路、付款方式和售后服务等。</span>
			</p>
			<br class="clear" />
		</li>
		<li>
			<img src="assets/photo/ser12.jpg" />
			<p>
				<strong>付款方式</strong>
				<span>在家居乐超市内您可用喜欢的方式付款。我们接受现金、转账支票及有银联、VISA和MASTER标记的储蓄卡、借记卡、信用卡，以及家居乐会员卡。付款方式的具体使用细节，请咨询当地家居乐超市内的服务人员。</span>
			</p>
			<br class="clear" />
		</li>
	</ul>
</div>
@stop
