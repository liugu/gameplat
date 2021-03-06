<?php if (!defined('THINK_PATH')) exit();?>	
	<div class="game-loading" style="display:none;"></div>
	<div class="game-container m_center">
		<div data-username="" class="pay-account">
			<em>充值账号：</em>
			<span class="acc-text">火花易灭88</span>
			<a class="change-acc" href="javascript:;">［更换］</a>
			<input class="inp-acc" type="text" />
			<a class="acc-ok" href="javascript:;">确定</a>
		</div>
		<div id="pay_core" class="pay-core clearfix">
			<div class="pay-method fl">
				<ul class="met-list clearfix">
					<li data-value="1" class="current">
						<i class="icon-pay-method icon-pay-zfb"></i>
						<span>支付宝</span>
					</li>
					<li data-value="2" data-pay="net_bank">
						<i class="icon-pay-method icon-pay-wyzf"></i>
						<span>网银支付</span>
					</li>
					<li data-value="3">
						<i class="icon-pay-method icon-pay-yl"></i>
						<span>银联在线</span>
					</li>
					<li data-value="4">
						<i class="icon-pay-method icon-pay-weixin"></i>
						<span>微信支付</span>
					</li>
				</ul>
				<ul class="pay-help">
					<li>
						<a href="javascript:;">
							<img src="http://shark.douyucdn.cn/app/douyu/activity/res/37wan/pay/p-ser.jpg?v=v41162.4"  />
						</a>
					</li>
				</ul>
				
			</div>
			<div id="pay_detail" class="pay-detail fr">
				<div class="game-opt">
					<a id="games_detail" data-class="game-current" class="game-opt-btn fl" href="javascript:;">
						<span class="fl">大皇帝</span>
						<i class="icon-sanjiao-down fl"></i>
					</a>
					<a id="servers_detail" data-class="server-current" class="game-opt-btn fr" href="javascript:;">
						<span class="fl">选择游戏服务器</span>
						<i class="icon-sanjiao-down fl"></i>
					</a>
					<div id="game_opt_info" class="game-opt-info">
						<h4 id="game_opt_tit" class="game-opt-tit">
							<a data-id="area_played" class="active" href="javascript:;">最近玩过的游戏</a>
							<a data-id="area_games" href="javascript:;">全部游戏</a>
						</h4>
						<div class="game-opt-cnt">
							<div class="sub-box all-games">
								<div id="area_played" class="area-played">
									<p class="sun-tips">没有最近玩过的游戏</p>
									<ul class="game-con" style="display:none;">
										<li data-id=""><a href="javascript:;">王者中心</a></li>
										<li data-id=""><a href="javascript:;">王者中心</a></li>
										<li data-id=""><a href="javascript:;">王者中心</a></li>
										<li data-id=""><a href="javascript:;">王者中心</a></li>
										<li data-id=""><a href="javascript:;">王者中心</a></li>
										<li data-id=""><a href="javascript:;">王者中心</a></li>
										<li data-id=""><a href="javascript:;">王者中心</a></li>
										<li data-id=""><a href="javascript:;">王者中心</a></li>
										<li data-id=""><a href="javascript:;">王者中心</a></li>
										<li data-id=""><a href="javascript:;">王者中心</a></li>
										<li data-id=""><a href="javascript:;">王者中心</a></li>
										<li data-id=""><a href="javascript:;">王者中心</a></li>
									</ul>
								</div>
								<div id="area_games" class="area-games">
									<ul class="game-con">
										<li data-id=""><a href="javascript:;">全部游戏</a></li>
										<li data-id=""><a href="javascript:;">王者中心</a></li>
										<li data-id=""><a href="javascript:;">王者中心</a></li>
										<li data-id=""><a href="javascript:;">王者中心</a></li>
										<li data-id=""><a href="javascript:;">王者中心</a></li>
										<li data-id=""><a href="javascript:;">王者中心</a></li>
										<li data-id=""><a href="javascript:;">王者中心</a></li>
										<li data-id=""><a href="javascript:;">王者中心</a></li>
										<li data-id=""><a href="javascript:;">王者中心</a></li>
										<li data-id=""><a href="javascript:;">王者中心</a></li>
										<li data-id=""><a href="javascript:;">王者中心</a></li>
										<li data-id=""><a href="javascript:;">王者中心</a></li>
									</ul>
								</div>
							</div>
							<div class="sub-box server-games">
								<ul class="game-con">
									<li><a href="javascript:;">游戏服务</a></li>
									<li><a href="javascript:;">王者中心</a></li>
									<li><a href="javascript:;">王者中心</a></li>
									<li><a href="javascript:;">王者中心</a></li>
									<li><a href="javascript:;">王者中心</a></li>
									<li><a href="javascript:;">王者中心</a></li>
									<li><a href="javascript:;">王者中心</a></li>
									<li><a href="javascript:;">王者中心</a></li>
									<li><a href="javascript:;">王者中心</a></li>
									<li><a href="javascript:;">王者中心</a></li>
									<li><a href="javascript:;">王者中心</a></li>
									<li><a href="javascript:;">王者中心</a></li>
								</ul>
							</div>
						</div>
						<span class="icon-triangle-up"></span>
					</div>
				</div>
				
				
				<div class="pay-money">
					<h4 class="type-tips">请选择充值金额</h4>
					<div id="money_con" class="money-con clearfix">
						<span data-price="10">10元</span>
						<span data-price="20">20元</span>
						<span data-price="30">30元</span>
						<span data-price="50">50元</span>
						<span data-price="100">100元</span>
						<span data-price="300">300元</span>
						<span data-price="500">500元</span>
						<span data-price="800">800元</span>
						<span data-price="1000">1000元</span>
						<span data-price="2000">2000元</span>
						<span data-price="3000">3000元</span>
						<span data-price="5000">5000元</span>
						<span data-price="10000">10000元</span>
						<span data-price="15000">15000元</span>
						<span data-price="30000">30000元</span>
						<span data-price="50000">50000元</span>
					</div>
					<div class="other-pay">
						<span>其他金额：</span>
						<input id="pay_random" type="text"  />
						<span>元</span>
						<em>（请输入10至100000之间的任意整数）</em>
					</div>
					<div id="vista_pay" class="vista-pay">
						<h4 class="type-tips">请选择充值金额</h4>
						<div class="vista-type clearfix">
							<span>
								<i class="icon-bank icon-gongshang"></i>
								<em>工商银行</em>
							</span>
							<span>
								<i class="icon-bank icon-zhaoshang"></i>
								<em>招商银行</em>
							</span>
							<span>
								<i class="icon-bank icon-china"></i>
								<em>中国银行</em>
							</span>
							<span>
								<i class="icon-bank icon-jianshe"></i>
								<em>建设银行</em>
							</span>
							<span>
								<i class="icon-bank icon-nongye"></i>
								<em>农业银行</em>
							</span>
							<span>
								<i class="icon-bank icon-jiaotong"></i>
								<em>交通银行</em>
							</span>
							<span style="display:none;">
								<i class="icon-bank icon-xingye"></i>
								<em>兴业银行</em>
							</span>
							<span style="display:none;">
								<i class="icon-bank icon-guangfa"></i>
								<em>广发银行</em>
							</span>
							<span style="display:none;">
								<i class="icon-bank icon-minsheng"></i>
								<em>民生银行</em>
							</span>
							<span>
								<i class="icon-bank icon-pingan"></i>
								<em>平安银行</em>
							</span>
							<span>
								<i class="icon-bank icon-EMS"></i>
								<em>中国邮政</em>
							</span>
						</div>
					</div>
					<div class="pay-btn">
						<a href="javascript:;" class="go-pay m_center" onclick="XT.pay.gopay();">立即充值</a>
					</div>
				</div>
				
			</div>
			<div class="pay-mask" style="display:none;"></div>
			<div style="display:none;" class="pay-alert" onmousedown="XT.tool.limitDrag(this,event);">
				<h4 class="title">
					<span>订单超额</span>
					<a class="close" href="javascript:;">×</a>
				</h4>
				<div class="tips-cnt">
					<p class="content">您的订单已超出限额，微信支付单笔限额3000.00元</p>
					<p class="s-tips">请选择其他金额，或更换充值方式</p>
					<p class="btn-area">
						<a class="btn-link m_center" href="javascript:;">返回修改</a>
					</p>
				</div>
			</div>
			<div class="ctrl-tips" style="display:none;">请选择游戏服务区</div>
		</div>
	</div>