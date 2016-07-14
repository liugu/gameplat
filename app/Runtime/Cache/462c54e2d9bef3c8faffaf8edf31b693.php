<?php if (!defined('THINK_PATH')) exit();?>
<link href="__TMPL__<?php echo ($config["THEME"]); ?>/css/games.css" rel="stylesheet" type="text/css" />
<link href="__TMPL__<?php echo ($config["THEME"]); ?>/css/user.css" rel="stylesheet" type="text/css" />
<style>
.title {font-size:22px;font-weight:bold;}
.alert-info {
color: #3a87ad;
background-color: #d9edf7;
border-color: #bce8f1;
}
.content{width:700px;}
.content img {max-width:700px;}
</style>
<!--header-->
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
    <h3>文章详情</h3>
    <div class="bor">
      <div>
          <center><span class="title"><font color="<?php echo ($info["titlecorlor"]); ?>"><?php echo ($info["title"]); ?></font></span></center><br/>
          <center><span>作者:<?php echo ($info["author"]); ?> | 点击量: <?php echo ($info["hits"]); ?>次  | 发布时间:<?php echo (date('Y年m月d日 H:i',$info["addtime"])); ?> | 来源： <?php echo ($info["from"]); ?> </span></center>
        <style>
            .share { width:450px; margin:0px auto; }
</style>  
         <br/>
         <div class="share">
          <!-- JiaThis Button BEGIN -->
<div class="jiathis_style">
	<span class="jiathis_txt">分享到：</span>
	<a class="jiathis_button_qzone">QQ空间</a>
	<a class="jiathis_button_tsina">新浪微博</a>
	<a class="jiathis_button_tqq">腾讯微博</a>
	<a class="jiathis_button_renren">人人网</a>
	<a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jiathis_separator jtico jtico_jiathis" target="_blank">更多</a>
	<a class="jiathis_counter_style"></a>
</div>
<script type="text/javascript" src="http://v3.jiathis.com/code/jia.js?uid=1359685667340851" charset="utf-8"></script>
<!-- JiaThis Button END -->
         </div>
           <br/>
          <br/>
          
          <div class="alert alert-info">
		      内容缩略： <?php echo ($info["description"]); ?>
		  </div>
		  <br/>
		  <div class="content">
		  <?php echo ($info["content"]); ?>
		  </div>
		  
      </div>
    </div>
  </div>
  <div class="cl"></div>
</div>
<script type="text/javascript" src="__TMPL__<?php echo ($config["THEME"]); ?>/js/jquery-1.4.2.js"></script>