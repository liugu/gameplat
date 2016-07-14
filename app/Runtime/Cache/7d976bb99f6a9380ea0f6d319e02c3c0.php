<?php if (!defined('THINK_PATH')) exit();?>
<!-- loading start-->
<div class="game-loading" style="display:none;"></div>
<!-- loading end -->
<div class="game-container more-list m_center">
	<h4 class="module-title">
		<i class="icon-index icon-news"></i>
		新闻列表
		<!--<a href="javascript:;" target="_blank" title="更多开服列表" class="more">更多 &gt;</a>-->
		<span class="line"></span>
	</h4>
	<ul class="more-news clearfix">
		<?php if(is_array($list1)): $i = 0; $__LIST__ = $list1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
				<a class="fl" href="<?php echo ($vo["redirect"]); ?>"><?php echo ($vo["title"]); ?></a>
				<em class="fr"><?php echo (date('Y-m-d',$vo["addtime"])); ?></em>
			</li><?php endforeach; endif; else: echo "" ;endif; ?>
	</ul>
	<div class="page-num">
		<!--<a class="first" href="javascript:;">2/7</a>
		<a href="javascript:;">1</a>
		<a href="javascript:;">2</a>
		<a href="javascript:;">3</a>
		<a href="javascript:;">4</a>
		<a href="javascript:;">5</a>
		<a class="last" href="javascript:;">>></a>-->
		<?php echo ($page); ?>
	</div>
</div>