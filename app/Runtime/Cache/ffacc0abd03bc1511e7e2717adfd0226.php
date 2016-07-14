<?php if (!defined('THINK_PATH')) exit();?>
<div class="game-container more-list m_center">
	<div class="start-server mb35" style="display:none;">
		<h4 class="module-title mb4">
			<i class="icon-index icon-server"></i>
			开服预告
			<!-- <a href="javascript:;" target="_blank" title="更多开服列表" class="more">更多 &gt;</a> -->
			<span class="line"></span>
		</h4>
		<h4 class="kf-tit">
			<span class="g-name">游戏名称</span>
			<span class="time">开服时间</span>
			<span class="s-name">服务器名称</span>
			<span class="ctrl">操作</span>
		</h4>
		<dl class="kf-list">
			<dt class="g-name">
				<img src="http://image.wan.douyu.com/www/images/game/mhj/16_16.jpg"  />
				<a href="javascript:;">蓝月传奇</a>
			</dt>
			<dd class="g-time">06-29 10:00</dd>
			<dd class="s-name"><a href="javascript:;">修仙4服 洪荒宇宙</a></dd>
			<dd class="g-ctrl">
				<a href="javascript:;">领取新手卡</a>
				<a href="javascript:;">进入游戏</a>
				<a href="javascript:;">进入官网</a>
			</dd>
		</dl>
		<dl class="kf-list">
			<dt class="g-name">
				<img src="http://image.wan.douyu.com/www/images/game/mhj/16_16.jpg"  />
				<a href="javascript:;">蓝月传奇</a>
			</dt>
			<dd class="g-time">06-29 10:00</dd>
			<dd class="s-name"><a href="javascript:;">修仙4服 洪荒宇宙</a></dd>
			<dd class="g-ctrl">
				<a href="javascript:;">领取新手卡</a>
				<a href="javascript:;">进入游戏</a>
				<a href="javascript:;">进入官网</a>
			</dd>
		</dl>
		<dl class="kf-list">
			<dt class="g-name">
				<img src="http://image.wan.douyu.com/www/images/game/mhj/16_16.jpg"  />
				<a href="javascript:;">蓝月传奇</a>
			</dt>
			<dd class="g-time">06-29 10:00</dd>
			<dd class="s-name"><a href="javascript:;">修仙4服 洪荒宇宙</a></dd>
			<dd class="g-ctrl">
				<a href="javascript:;">领取新手卡</a>
				<a href="javascript:;">进入游戏</a>
				<a href="javascript:;">进入官网</a>
			</dd>
		</dl>
		<dl class="kf-list">
			<dt class="g-name">
				<img src="http://image.wan.douyu.com/www/images/game/mhj/16_16.jpg"  />
				<a href="javascript:;">蓝月传奇</a>
			</dt>
			<dd class="g-time">06-29 10:00</dd>
			<dd class="s-name"><a href="javascript:;">修仙4服 洪荒宇宙</a></dd>
			<dd class="g-ctrl">
				<a href="javascript:;">领取新手卡</a>
				<a href="javascript:;">进入游戏</a>
				<a href="javascript:;">进入官网</a>
			</dd>
		</dl>
	</div>
	<div class="start-server">
		<h4 class="module-title mb4">
			<i class="icon-index icon-server"></i>
			已经开服
			<!-- <a href="javascript:;" target="_blank" title="更多开服列表" class="more">更多 &gt;</a> -->
			<span class="line"></span>
		</h4>
		<h4 class="kf-tit">
			<span class="g-name">游戏名称</span>
			<span class="time">开服时间</span>
			<span class="s-name">服务器名称</span>
			<span class="ctrl">操作</span>
		</h4>
		<?php if(is_array($serverlist)): $i = 0; $__LIST__ = $serverlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$game): $mod = ($i % 2 );++$i;?><dl class="kf-list">
				<dt class="g-name">
					<img src="/Public/Uploads/images/<?php echo ($game["smallpic"]); ?>"  />
					<a href="<?php echo U('game/login');?>?game=<?php echo ($game["gid"]); ?>&server=<?php echo ($game["sid"]); ?>"><?php echo ($game["gamename"]); ?></a>
				</dt>
				<dd class="g-time"><?php echo (date('m/d h:i',$game["start_time"])); ?></dd>
				<dd class="s-name"><a href="javascript:;"><?php echo ($game["servername"]); ?></a></dd>
				<dd class="g-ctrl">
					<a href="javascript:void(0);">领取新手卡</a>
					<a href="<?php echo U('game/login');?>?game=<?php echo ($game["gid"]); ?>&server=<?php echo ($game["sid"]); ?>">进入游戏</a>
					<a href="javascript:void(0);">进入官网</a>
				</dd>
			</dl><?php endforeach; endif; else: echo "" ;endif; ?>
		<div class="page-num">
			<!--<a class="first" href="javascript:;">上一页</a>
			<a href="javascript:;">1</a>
			<a href="javascript:;">2</a>
			<a href="javascript:;">3</a>
			<a href="javascript:;">4</a>
			<a href="javascript:;">5</a>
			<a class="last" href="javascript:;">下一页</a>-->
			<?php echo ($page); ?>
		</div>
	</div>
</div>