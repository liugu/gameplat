<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="keywords" content="<?php if($info[0]['keywords'] ==''){echo $config['KEYWORDS'];}else{echo $info_a['title'];echo $info[0]['keywords'];}?>">
		<meta name="description" content="<?php if($info[0]['description'] ==''){echo $config['DESCRIPTIONS'];}else{echo $info_a['description'];echo $info[0]['description'];}?>">
		<meta property="qc:admins" content="72316162757631716636" />
		<link rel="shortcut icon" href="__TMPL__<?php echo ($config["THEME"]); ?>/images/favicon.ico" />
		<link rel="stylesheet" type="text/css" href="__TMPL__<?php echo ($config["THEME"]); ?>/css/public.css"/>
		<link rel="stylesheet" type="text/css" href="__TMPL__<?php echo ($config["THEME"]); ?>/css/game_index.css"/>
		<script src="__TMPL__<?php echo ($config["THEME"]); ?>/js/jquery-1.9.1.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="__TMPL__<?php echo ($config["THEME"]); ?>/js/appDef.js" type="text/javascript" charset="utf-8"></script>
		<script src="__TMPL__<?php echo ($config["THEME"]); ?>/js/appGame.js" type="text/javascript" charset="utf-8"></script>
		<script src="__TMPL__<?php echo ($config["THEME"]); ?>/js/game-1.0.js" type="text/javascript" charset="utf-8"></script>
		<title><?php echo ($config["SITENAME"]); ?>-<?php echo ($info_a["title"]); ?>  <?php echo ($info[0]["keywords"]); ?>-<?php echo ($config["KEYWORDS"]); ?></title>
	</head>
	<body>
		<div class="g-content m_center">
			<!-- s/头部导航区域 -->
			<div class="game-nav">
				<div class="nav-c m_center">
					<div class="nav-logo fl">
						<a class="logo-link" href="/">
							<img class="logo-img" src="__TMPL__<?php echo ($config["THEME"]); ?>/images/game/logo.png" alt="logo" />
						</a>
					</div>
					<div class="nav-ul fl">
						<a class="<?php if($str == 'index'){echo 'on';}else{echo '';} ?>" href="/">首页</a>
					    <?php if(is_array($category)): $i = 0; $__LIST__ = $category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; switch($vo["islink"]): case "0": ?><a class="<?php if($vo['url1']==$str){echo 'on';}else{echo '';} ?>" href="/<?php echo (url(lists,$vo["typeid"])); ?>" target="_self"><?php echo ($vo["typename"]); echo ($vo["url1"]); ?></a><?php break;?>
							    <?php default: ?>  
							    	<a class="<?php if($vo['url1']==$str){echo 'on';}else{echo '';} ?>" href="<?php echo ($vo["url"]); ?>" target="_self"><?php echo ($vo["typename"]); ?></a><?php endswitch; endforeach; endif; else: echo "" ;endif; ?>
					    <a href="http://www.0058.com/servicecore/index" target="_blank">客服中心</a>
					</div>
					<div class="nav-other fr">
						<div class="nav-fav fl">
							<a class="s-desk" href="javascript:;" onclick="XT.tool.saveDesk();">
								<i class="icon-base"></i>保存桌面
							</a>
							<a class="s-collect" href="javascript:;" onclick="XT.tool.addFavorite('中视游戏互动平台',location.href);">
								<i class="icon-base"></i>收藏首页
							</a>
						</div>
						<div class="nav-login fl">
							<a href="javascript:;" onclick="XT.login.show('login');">登录</a>
							<span>|</span>
							<a href="javascript:;" onclick="XT.login.show('reg');">注册</a>
						</div>
						<div class="nav-info fl">
							<img class="fl userimg" src="http://uc.douyutv.com/upload/avatar/face/201606/20/fc75a95d639426b4093a2791e7ab07d3_small.jpg" width="36" height="36" alt="" id="navInfoImg">							
							<a id="nav_username" class="fl username txt_overflow" href="javascript:;" title="<?php echo ($userinfo["nickname"]); ?>">
								<?php echo ($userinfo["nickname"]); ?>
								<span class="icon-arrow"></span>
							</a>
						</div>
						<div class="detail-info" id="detail_info">
							<i class="tip-up">◆</i>
							<dl class="info-data">
								<dt>
									<a href="javascript:;"><?php echo ($userinfo["nickname"]); ?></a>
								</dt>
								<dd>
									<a href="<?php echo U('members/index');?>">
										<i class="icon-base icon-person"></i>
										个人中心
									</a>
								</dd>
								<dd>
									<a href="<?php echo U('pay/index');?>">
										<i class="icon-base icon-pay"></i>
										充值中心
									</a>
								</dd>
								<dd>
									<a href="<?php echo U('accounts/loginout');?>">
										<i class="icon-base icon-exit"></i>
										退出
									</a>
								</dd>
							</dl>
						</div>
					</div>
				</div>
			</div>
			<!-- e/头部导航区域 -->