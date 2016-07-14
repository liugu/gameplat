<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title><?php echo ($data["sitename"]); ?>-系统后台管理</title>
		<link rel="stylesheet" href="__PUBLIC__/images/login.css" type="text/css">
	</head>
	<body>
		<div class="admin-login">
			<h2 class="login-title"></h2>
			<form id="login_form" class="login-form m-center" action="<?php echo ($action); ?>" method="post">
				<div id="error-tips" class="cell-block error-tips"></div>
				<div class="cell-block bgfff">
					<span>账号：</span>
					<input class="input-text" name="loginname" type="text" maxlength="30" />
				</div>
				<div class="cell-block bgfff">
					<span>密码：</span>
					<input class="input-text" name="loginpwd" type="password"  maxlength="20" />
				</div>
				<div class="cell-block pt10">
					<input type="submit" class="login-btn m-center" value="登 录" />
				</div>
			</form>
		</div>
	</body>
	<script type="text/javascript">
	(function(){
		var oForm = document.getElementById('login_form');
		var oError = document.getElementById('error-tips');
		oForm.onsubmit = function(){
			var username = oForm.loginname.value;
			var userpwd = oForm.loginpwd.value;
			oError.innerHTML = '';
			if(username=='' || userpwd==''){
				oError.innerHTML = '请输入正确的账号或者密码！';
				return false;
			}

		}
	})();
	</script>
</html>