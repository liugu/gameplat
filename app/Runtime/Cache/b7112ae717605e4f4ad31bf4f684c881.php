<?php if (!defined('THINK_PATH')) exit();?>
<!-- loading start-->
<div class="game-loading" style="display:none;"></div>
<!-- loading end -->
<div class="user-info">
	<div class="user-c m_center">
		<div class="user-info-l fl">
			<dl class="clearfix">
				<dt class="fl"><img src="http://uc.douyutv.com/upload/avatar/face/201606/20/fc75a95d639426b4093a2791e7ab07d3_middle.jpg" /></dt>
				<dd class="fl">
					<h4>个人中心</h4>
					<p>
						<a href="javascript:;">您好：<?php echo ($info["nickname"]); ?></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo U('accounts/loginout');?>">[退出]</a>
					</p>
				</dd>
			</dl>
		</div>
		<div class="user-info-r fr">
			<h4>最近登录的服务器</h4>
			<ul>
				<?php if(is_array($history)): $i = 0; $__LIST__ = $history;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$g_history): $mod = ($i % 2 );++$i;?><li><a href="javascript:;"> > <?php echo ($g_history["gamename"]); ?>　<?php echo ($g_history["sid"]); ?>服　<?php echo ($g_history["servername"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
		</div>
	</div>
</div>
<div class="game-container mb50 m_center">

	<div class="user-center-bd m_center clearfix">
		<div class="user-center-l clearfix fl">
			<ul class="clearfix">
				<li>
					<a class="active" href="javascript:;">
						<i class="icon-user icon-my-game"></i>
						<span>我的游戏</span>
					</a>
				</li>
				<li>
					<a target="_blank" href="http://www.0058.com/servicecore/index">
						<i class="icon-user icon-info"></i>
						<span>修改个人信息</span>
					</a>
				</li>
				<li>
					<a target="_blank" href="http://www.0058.com/servicecore?t=pwd_find">
						<i class="icon-user icon-pwd"></i>
						<span>修改密码</span>
					</a>
				</li>
				<li>
					<a target="_blank" href="http://www.0058.com/servicecore/index">
						<i class="icon-user icon-indulge"></i>
						<span>防沉迷验证</span>
					</a>
				</li>
			</ul>
		</div>
		<div class="user-center-r m-h-300 fr">
			<p style="display:none;" class="loginout-tips">您还没有登录，请先登录！</p>
			<h3 class="my-game-tit"><span>我的游戏</span></h3>
			<?php if(is_array($mygame)): $i = 0; $__LIST__ = $mygame;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$my_games): $mod = ($i % 2 );++$i;?><dl class="user-center-games">
					<dt class="fl">
						<a href="javascript:;">
							<img src="/Public/Uploads/images/<?php echo ($my_games["gamepic"]); ?>"  />
						</a>
					</dt>
					<dd class="fl">
						<h4 class="g-tit-box">
							<a class="fl small-tit" href="javascript:;"><?php echo ($my_games["gamename"]); ?></a>
							<div class="game-tags fr">
								<a href="javascript:;">新服推荐</a>
								<a href="javascript:;">官网</a>
								<a href="javascript:;">充值</a>
							</div>
						</h4>
						<h5>最近玩过的服：</h5>
						<p class="played-link clearfix">
							<?php if(is_array($my_games["serverlist"])): $i = 0; $__LIST__ = $my_games["serverlist"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$my_servers): $mod = ($i % 2 );++$i;?><a href="javascript:;">> <?php echo ($my_servers["sid"]); ?>服 <?php echo ($my_servers["servername"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
						</p>
					</dd>
				</dl><?php endforeach; endif; else: echo "" ;endif; ?>
		</div>
	</div>

</div>