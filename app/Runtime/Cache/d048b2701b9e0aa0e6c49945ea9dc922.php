<?php if (!defined('THINK_PATH')) exit();?>

<!-- s/主体区域 start -->
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
				<?php $_result=D('GameView')->order('server.start_time desc')->limit(10)->select(); if ($_result): $i=0;foreach($_result as $key=>$game):++$i;$mod = ($i % 2 );?><li class="hot-active">
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
					<a href="/article/" target="_blank" title="更多开服列表" class="more">更多 &gt;</a>
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
				游戏列表
				<!--<a href="javascript:;" target="_blank" title="更多开服列表" class="more">更多 &gt;</a>-->
				<span class="line"></span>
			</h4>
			<ul class="reco-list clearfix">
				<?php $_result=D('game')->select(); if ($_result): $i=0;foreach($_result as $key=>$game):++$i;$mod = ($i % 2 );?><li desc="<?php echo ($game["gid"]); ?>">
						<div class="img-link">
							<a href="<?php echo ($game["game_web"]); ?>" title="<?php echo ($game["gamename"]); ?>">
								<img src="/Public/Uploads/images/<?php echo ($game["gamepic"]); ?>" alt="<?php echo ($game["gamename"]); ?>"  />
								<?php if(($list["ishot"]) == "1"): ?><span class="icon-index icon-hot"></span>
								<?php else: ?>
									<span class="icon-index icon-new"></span><?php endif; ?>
							</a>
						</div>
						<div class="reco-desc">
							<a href="<?php echo ($game["game_web"]); ?>" class="link-tit fl"><?php echo ($game["gamename"]); ?></a>
							<span class="tags fr clearfix">
								<a href="<?php echo ($game["game_web"]); ?>" target="_blank" class="link-tag">官网</a>
								<a href="/hall" target="_blank" class="link-tag">开始游戏</a>
							</span>
						</div>
					</li><?php endforeach; endif;?>
			</ul>
		</div>
	</div>
</div>
<!-- e/主体区域 end -->