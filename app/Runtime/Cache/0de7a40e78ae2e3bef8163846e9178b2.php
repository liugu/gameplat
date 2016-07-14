<?php if (!defined('THINK_PATH')) exit();?>
<div class="login-page">
	<div class="page-c m_center">
		<div class="login-module">
			<h3 class="top-tit"><span>用户登录</span></h3>
			<div id="login_loading" class="login-loading">
				<span class="tips">正在登录，请稍后...</span>
			</div>
			<div class="login-inp">
				<div class="error-tips"></div>
				<form id="login_form2"  method="post" action="#">
					<p class="normal-box"><input name="user_name" placeholder="请输入昵称" type="text" /></p>
					<p class="normal-box"><input name="user_pwd" placeholder="请输入密码" type="password" /></p>
					<p class="normal-box inp-code">
						<input name="user_verify" class="fl" placeholder="请输入验证码" type="text" maxlength="4" onkeydown="XT.login.keyDownLogin('go_login2',event);" />
						<input type="hidden" name="type" value="1"  />
						<input type="hidden" name="user_url" value="<?php echo ($url); ?>" />
						<img class="code-img approve-img fl" src="/Public/verify/" onclick="XT.tool.refreshCode(this);" />
					</p>
				</form>
				<p class="normal-text tr"><a target="_blank" href="<?php echo U('accounts/forget_password');?>">忘记密码？</a></p>
				<p class="normal-box login-ctrl">
					<a id="go_login2" class="go-login fl" href="javascript:void(0);" onclick="XT.login.enter('login_form2',1);">登录</a>
				</p>
				<p class="normal-text tc"><a href="javascript:void(0);" onclick="XT.login.show('reg');">还没有账号？立即注册</a></p>
				<p class="normal-box last-inp">
					<span>其他登录：</span>
					<a href="javascript:alert('敬请期待');" class="icon-log icon-weixin"></a>
					<a href="javascript:alert('敬请期待');" class="icon-log icon-qq" target="_blank" href="<?php echo U('open/index');?>"></a>
					<a href="javascript:alert('敬请期待');" class="icon-log icon-sina"></a>
				</p>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	<?php if(($userinfo["username"]) != ""): ?>window.location.href = '/members/';<?php endif; ?>
</script>