<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>状态提示</title>
	<style type="text/css">
	*{margin:0;padding:0;list-style:none;text-decoration:none;}
	body{font-family:"微软雅黑"}
	.login-out{position:absolute;left:50%;top:50%;width:225px;height:337px;margin:-220px 0 0 -112px;}
	.login-out .out-bg{width:225px;height:221px;background:url('/app/Tpl/default/images/game/tiger.png') no-repeat top center;}
	.login-out .out-tips{width:100%;margin-top:28px;text-align:center;}
	.login-out .tips{padding-bottom:20px;font-size:20px;}
	.login-out .btn-box{width:100%;height:42px;}
	.login-out .btn-box a{display:block;width:160px;height:42px;margin:auto;line-height:42px;font-size:18px;color:#fff;background:#2693ff;border-radius:4px;}
	.login-out .btn-box a:hover{background:#43a1ff;}
	</style>
</head>
<body>
	<div class="login-out">
		<div class="out-bg"></div>
		<div class="out-tips">
			<present name="message">
				<p class="tips"> <?php echo($message); ?></p>
			<else/>
				<p class="tips"><?php echo($error); ?> </p>
			</present>
			<p class="btn-box">
				<a data-wait="<?php echo($waitSecond); ?>" id="jump_url" href="<?php echo($jumpUrl); ?>">手动跳转 <?php echo($waitSecond); ?>s</a>
			</p>
		</div>
	</div>
	<script type="text/javascript">
		(function(){

			var jump_link = document.getElementById('jump_url');
			var iCount = jump_link.getAttribute('data-wait');

			var timer = null;
			clearInterval(timer);
			timer = setInterval(function(){
				iCount--;
				if(iCount<=0){
					iCount=0;
					jump_link.innerHTML = '手动跳转';
					clearInterval(timer);
					window.location.href = jump_link.href;
				}else{
					jump_link.innerHTML = '手动跳转 ' + iCount;
				}


			},1000);


		})()
	</script>
</body>
</html>
