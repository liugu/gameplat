<?php if (!defined('THINK_PATH')) exit();?>
	<!-- s/幻灯片区域开始 -->
	<div class="game-ad" id="game_ad">
		<span class="tab-btn prev-btn"></span>
		<span class="tab-btn next-btn"></span>
		<div class="login-module">
			<h3 class="top-tit"><span>用户登录</span></h3>
			<div id="login_loading" class="login-loading">
				<span class="tips">正在登录，请稍后...</span>
			</div>
			<div class="login-inp">
				<div class="error-tips"></div>
				<form id="login_form"  method="post" action="#">
					<p class="normal-box"><input name="user_name" placeholder="请输入昵称" type="text" /></p>
					<p class="normal-box"><input name="user_pwd" placeholder="请输入密码" type="password" /></p>
					<p class="normal-box inp-code">
						<input name="user_verify" class="fl" placeholder="请输入验证码" type="text" maxlength="4" onkeydown="XT.login.keyDownLogin('go_login1',event);" />
						<input type="hidden" name="type" value="1"  />
						<input type="hidden" name="user_url" value="<?php echo ($url); ?>" />
						<img class="code-img approve-img fl" src="/Public/verify/" onclick="XT.tool.refreshCode(this);"  />
					</p>
				</form>
				<p class="normal-text tr"><a target="_blank" href="http://www.0058.com/servicecore?t=pwd_find">忘记密码？</a></p>
				<p class="normal-box login-ctrl">
					<a id="go_login1" class="go-login fl" href="javascript:void(0);" onclick="XT.login.enter('login_form',1);">登录</a>
					<a class="go-reg fr" href="javascript:;" onclick="XT.login.show('reg');">注册</a>
				</p>
				<p class="normal-box last-inp">
					<span>其他登录：</span>
					<a href="javascript:alert('敬请期待');" class="icon-log icon-weixin"></a>
					<a href="javascript:alert('敬请期待');" class="icon-log icon-qq"></a>
					<a href="javascript:alert('敬请期待');" class="icon-log icon-sina"></a>
				</p>
			</div>
			<div class="loginok-box">
				<p class="normal-box name-tips">
					<span class="fl">您好：<a class="name" href="javascript:;"><?php echo ($userinfo["nickname"]); ?></a></span>
					<span class="fr"><a class="out" href="<?php echo U('accounts/loginout');?>">[退出]</a></span>
				</p>
				<p class="normal-box user-ctrl">
					<a class="paycenter" href="<?php echo U('pay/index');?>">充值中心</a>
					<a class="usercenter" href="<?php echo U('members/index');?>">用户中心</a>
				</p>
				<p class="normal-box fb normal-txt">推荐您进入：</p>
				<ul class="rec-games fb clearfix">
					<?php if(is_array($history)): $i = 0; $__LIST__ = $history;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$g_history): $mod = ($i % 2 );++$i;?><li>
							<div class="cell fl">
								<img class="fl g-icon" src="/Public/Uploads/images/<?php echo ($g_history["smallpic"]); ?>"  />
								<a class="fl g-tit" href="javascript:;"><?php echo ($g_history["gamename"]); ?></a>
							</div>
							<div class="cell fr">
								<a href="javascript:;"><?php echo ($g_history["sid"]); ?>服</a>&nbsp;&nbsp;
								<a href="javascript:;"><?php echo ($g_history["servername"]); ?></a>
							</div>
						</li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
		</div>
		<ul class="ad-list">
			<?php if(is_array($ad_list)): $i = 0; $__LIST__ = $ad_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$flv_ad): $mod = ($i % 2 );++$i;?><li><a title="<?php echo ($flv_ad["title"]); ?>"  data-img="/Public/Uploads/images/<?php echo ($flv_ad["content"]); ?>" href="<?php echo ($flv_ad["url"]); ?>"></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
		</ul>
		<div class="sort-dot"></div>
	</div>
	<!-- e/幻灯片区域结束 -->

	<!-- s/主体区域 start-->
	<div class="game-container pb20_ie7 m_center">
		<div class="hot-game">
			<ul>
				<?php if(is_array($ad_list2)): $i = 0; $__LIST__ = $ad_list2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$flv_ad2): $mod = ($i % 2 );++$i;?><li>
						<a href="<?php echo ($flv_ad2["url"]); ?>">
							<img src="/Public/Uploads/images/<?php echo ($flv_ad2["content"]); ?>" />
						</a>
						<div class="hot-mask">
							<div class="game-tit fl">
								<h4><?php echo ($flv_ad2["title"]); ?></h4>
								<p>官网 | 礼包</p>
							</div>
							<div class="game-play fr">
								<a href="<?php echo ($flv_ad2["url"]); ?>">进去新区</a>
								<a href="<?php echo ($flv_ad2["url"]); ?>">服务器列表</a>
							</div>
						</div>
					</li><?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
		</div>
		<div class="game-list clearfix">
			<div class="g-col-small fl">
				<h4 class="module-title">
					<i class="icon-index icon-server"></i>
					开服列表
					<a href="/serverlist/" target="_blank" title="更多开服列表" class="more">更多 &gt;</a>
					<span class="line"></span>
				</h4>
				<ul class="server-list clearfix">
					<?php $_result=D('GameView')->order('server.start_time desc')->limit(12)->select(); if ($_result): $i=0;foreach($_result as $key=>$game):++$i;$mod = ($i % 2 );?><li>
							<div class="col-1 fl">
								<img class="thumb-img fl" src="/Public/Uploads/images/<?php echo ($game["smallpic"]); ?>"  />
								<a href="javascript:;" class="g-tit fl"><?php echo ($game["gamename"]); ?></a>
							</div>
							<div class="col-2 fl">
								<span class="time"><?php echo (date('m/d H:i',$game["start_time"])); ?></span>
							</div>
							<div class="col-3 fl">
								<a class="place" href="javascript:;"><?php echo ($game["servername"]); ?></a>
							</div>
						</li><?php endforeach; endif;?>
				</ul>
				<div class="small-ad">
					<?php if(is_array($ad_list3)): $i = 0; $__LIST__ = $ad_list3;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$flv_ad3): $mod = ($i % 2 );++$i;?><a title="<?php echo ($flv_ad3["title"]); ?>" href="<?php echo ($flv_ad3["url"]); ?>">
							<img src="/Public/Uploads/images/<?php echo ($flv_ad3["content"]); ?>"  />
						</a><?php endforeach; endif; else: echo "" ;endif; ?>
				</div>
				<div class="game-news">
					<h4 class="module-title">
						<i class="icon-index icon-news"></i>
						新闻公告
						<a href="/article/" title="更多开服列表" class="more">更多 &gt;</a>
						<span class="line"></span>
					</h4>
					<ul class="news-list">
						<?php if(is_array($news)): $i = 0; $__LIST__ = $news;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$news): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($news["redirect"]); ?>" title="<?php echo ($news["title"]); ?>" target="_blank"><?php echo ($news["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</div>
			</div>
			<div class="g-col-big fr">
				<h4 class="module-title">
					<i class="icon-index icon-first"></i>
					推荐游戏
					<a href="/hall" title="更多开服列表" class="more">更多 &gt;</a>
					<span class="line"></span>
				</h4>
				<ul class="reco-list clearfix">
					<?php if(is_array($games_list)): $i = 0; $__LIST__ = $games_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><li>
							<div class="img-link">
								<a href="<?php echo ($list["game_web"]); ?>">
									<img src="/Public/Uploads/images/<?php echo ($list["gamepic"]); ?>" alt="<?php echo ($list["gamename"]); ?>"  />
									<?php if(($list["ishot"]) == "1"): ?><span class="icon-index icon-hot"></span>
									<?php else: ?>
										<span class="icon-index icon-new"></span><?php endif; ?>
								</a>
							</div>
							<div class="reco-desc">
								<a href="<?php echo ($list["game_web"]); ?>" class="link-tit fl"><?php echo ($list["gamename"]); ?></a>
								<span class="tags fr clearfix">
									<a href="<?php echo ($list["game_web"]); ?>" target="_blank" class="link-tag">官网</a>
									<a href="/hall" target="_blank" class="link-tag">开始游戏</a>
								</span>
							</div>
						</li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
		</div>
	</div>
	<!-- e/主体区域end -->