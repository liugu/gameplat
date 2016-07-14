<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="zh-CN" lang="zh-CN">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>正在进入支付页面</title>
</head>
<body onLoad="document.yeepay.submit();">
<br />
<center>正在进入支付页面，请不要关闭和刷新浏览器</center>
<form name='yeepay' action='https://www.yeepay.com/app-merchant-proxy/node' method='post'>
<input type='hidden' name='p0_Cmd' value='<?php echo ($data["p0_Cmd"]); ?>'>
<input type='hidden' name='p1_MerId' value='<?php echo ($data["p1_MerId"]); ?>'>
<input type='hidden' name='p2_Order' value='<?php echo ($data["p2_Order"]); ?>'>
<input type='hidden' name='p3_Amt' value='<?php echo ($data["p3_Amt"]); ?>'>
<input type='hidden' name='p4_Cur' value='<?php echo ($data["p4_Cur"]); ?>'>
<input type='hidden' name='p5_Pid' value='<?php echo ($data["p5_Pid"]); ?>'>
<input type='hidden' name='p6_Pcat' value='<?php echo ($data["p6_Pcat"]); ?>'>
<input type='hidden' name='p7_Pdesc' value='<?php echo ($data["p7_Pdesc"]); ?>'>
<input type='hidden' name='p8_Url' value='<?php echo ($data["p8_Url"]); ?>'>
<input type='hidden' name='p9_SAF' value='<?php echo ($data["p9_SAF"]); ?>'>
<input type='hidden' name='pa_MP' value='<?php echo ($data["pa_MP"]); ?>'>
<input type='hidden' name='pd_FrpId' value='<?php echo ($data["pd_FrpId"]); ?>'>
<input type='hidden' name='pr_NeedResponse'	value='<?php echo ($data["pr_NeedResponse"]); ?>'>
<input type='hidden' name='hmac' value='<?php echo ($data["hmac"]); ?>'>
</form>
</body>
</html>