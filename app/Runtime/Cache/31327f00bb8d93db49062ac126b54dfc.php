<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo ($config["SITENAME"]); ?> - <?php echo ($type["typename"]); ?></title>
<meta name="keywords" content="<?php echo ($config["KEYWORDS"]); ?>">
<meta name="description" content="<?php echo ($config["DESCRIPTIONS"]); ?>">
<link href="__TMPL__<?php echo ($config["THEME"]); ?>/css/games.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="<?php echo ($config["FAVICON"]); ?>" />
</head>
<body>
<link href="__TMPL__<?php echo ($config["THEME"]); ?>/css/total.css" rel="stylesheet" type="text/css" />
<div class="header">
<div class="topban">
  <div class="ban">
    <div class="news">
                    <a href="#" target="_blank" title="三国快，31wan三国快打首服服火爆登场">三国快，31wan三国快打首服服火爆登场</a>
             
    </div>
    <div class="links"><a href="/31wan网页游戏.url">把<?php echo ($config["SITENAME"]); ?>网页游戏放到桌面</a> | <a href="#" onClick="setHomepage('http://www.31wan.com/?f=home');return false;">设为首页</a> | <a href="#" onclick="AddFavorite('http://www.31wan.com/?f=fav', '31wan网页游戏');return false;">加入收藏</a></div>
    <div class="s_games">
    <a class="tit">网页游戏全目录</a>
      <div class="g_list">
        <ul>
        </ul>
        <div class="bg"></div>
      </div><!--g_list-->
    </div><!--s_games-->
  </div>
</div>
<div class="top">
  <div class="logo"><a href="/"><img src="<?php echo ($config["LOGO"]); ?>" alt="<?php echo ($config["SITENAME"]); ?>" width="226" height="66" /></a></div>
  <div class="banner">
    <embed class="banner_embed1" menu="" loop="" play="" scale="" quality="high" wmode="transparent" src="http://img.31wan.com/stage/swf/webtop1.swf?v=2" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" height="66" width="680" style="display:none;">
    <embed class="banner_embed2" menu="" loop="" play="" scale="" quality="high" wmode="transparent" src="http://img.31wan.com/stage/swf/webtop_sgkd.swf?v=2" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" height="66" width="680" style="display:block;">
  </div>
</div>
<div class="nav">
  <ul>
<li class="on"><a href="/" target="_self">首  页</a></li>
    <?php if(is_array($category)): $i = 0; $__LIST__ = $category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?> 
    <li class="nor"><a href="<?php if(($vo["islink"]) == "0"): ?>/<?php echo (url(lists,$vo["typeid"])); else: echo ($vo["url"]); endif; ?>"><?php echo ($vo["typename"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
  </ul>
  <div class="tj"><strong>热门推荐：</strong> <p>
	<a href="http://txj.31wan.com/" target="_blank" title="天行剑">天行剑</a> | <a href="http://sjsg.31wan.com" target="_blank" title="神将三国">神将三国</a> | <a href="http://cy.31wan.com" target="_blank" title="赤月">赤月</a> | <a href="http://zxy.31wan.com" target="_blank" title="醉西游">醉西游</a> | <a href="http://qsqy.31wan.com" target="_blank" title="倾世情缘">倾世情缘</a> | <a href="http://mhfx.31wan.com/" target="_blank" title="梦幻飞仙">梦幻飞仙</a> | <a href="http://smxj.31wan.com/" target="_blank" title="神魔仙界">神魔仙界</a> | <a href="http://xlfc.31wan.com/" target="_blank" title="仙落凡尘">仙落凡尘</a> | <a href="http://frxz2.31wan.com/" target="_blank" title="凡人修真2">凡人修真2</a> | <a href="http://smzt.31wan.com/" target="_blank" title="神魔遮天">神魔遮天</a> | <a href="http://sgkd.31wan.com/" target="_blank" title="三国快打">三国快打</a> | <a href="http://www.31wan.com/hall.html">更多&gt;&gt;</a> 
</p></div>
  <div class="n_l"></div>
  <div class="n_r"></div>
</div>
</div><!--header-->
<script type="text/javascript">
    setInterval('showBanner()',15000);

function showBanner(){
    $(".banner_embed1").toggle();
    $(".banner_embed2").toggle();
}
</script><div class="main">
  <div class="l">
    <div class="date time">
        <h3>最新开服</h3>
        <div class="date_s time_s">
            <table cellspacing="0" border="0" id="server_list">
            <tbody>
                <tr>
                <th>游戏</th>
                <th>时间</th>
                <th>服务器</th>
                </tr>
                 <?php $_result=D('GameView')->order('server.start_time desc')->select(); if ($_result): $i=0;foreach($_result as $key=>$game):++$i;$mod = ($i % 2 );?><tr>
                <th><a href="<?php echo U('game/login');?>?game=<?php echo ($game["gid"]); ?>&server=<?php echo ($game["sid"]); ?>" target="_blank" title="登陆游戏"><?php echo ($game["gamename"]); ?></a></th>
                <th><a href="<?php echo U('game/login');?>?game=<?php echo ($game["gid"]); ?>&server=<?php echo ($game["sid"]); ?>" target="_blank" title="登陆游戏"><?php echo (date('m/d h:i',$game["start_time"])); ?></a></th>
                <th><a href="<?php echo U('game/login');?>?game=<?php echo ($game["gid"]); ?>&server=<?php echo ($game["sid"]); ?>" target="_blank" title="登陆游戏"><?php echo ($game["servername"]); ?></a></th>
                </tr><?php endforeach; endif;?>
            </tbody>
            </table>
        </div>
    </div><!--date-->
    <div class="help">
        <h3>在线客服</h3>
        <div class="help_s">
        <p>游戏客服热线：400-9966-163 
            <a class="b1" target="_blank" href="/kefu/online.html">游戏客服</a>
            <a class="b2" target="_blank" href="/kefu/online/pay.html">充值客服</a> 
        </p>
        </div>
    </div><!--help-->
</div><!--l-->  <div class="news">
    <h3><?php echo ($type); ?></h3>
    <div class="bor">
   
      <div>
        <ul class="news_list">
           <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><span><?php echo (date($vo["addtime"],'m/d')); ?></span><h4><a href="<?php echo U('article/read');?>?aid=<?php echo ($vo["aid"]); ?>" title="<?php echo ($vo["title"]); ?>"><strong style="color:<?php echo ($vo["titlecorlor"]); ?>"><?php echo ($vo["title"]); ?></strong></a></h4></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
        <div class="pages"><?php echo ($page); ?></div>
      </div>
    </div>
  </div>
  <div class="cl"></div>
</div>
<script type="text/javascript" src="__TMPL__<?php echo ($config["THEME"]); ?>/js/jquery-1.4.2.js"></script>