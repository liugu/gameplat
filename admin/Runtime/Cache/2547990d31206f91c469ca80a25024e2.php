<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>31wan - 后台管理中心</title>
<link href="__PUBLIC__/admin/css/reset.css" rel="stylesheet" type="text/css">
<link href="__PUBLIC__/admin/css/zh-cn-system.css" rel="stylesheet" type="text/css">
<link href="__PUBLIC__/admin/css/table_form.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="__PUBLIC__/admin/css/style/zh-cn-styles1.css" title="styles1" media="screen">
<link rel="alternate stylesheet" type="text/css" href="__PUBLIC__/admin/css/style/zh-cn-styles2.css" title="styles2" media="screen">
<link rel="alternate stylesheet" type="text/css" href="__PUBLIC__/admin/css/style/zh-cn-styles3.css" title="styles3" media="screen">
<link rel="alternate stylesheet" type="text/css" href="__PUBLIC__/admin/css/style/zh-cn-styles4.css" title="styles4" media="screen">
<script language="javascript" type="text/javascript" src="__PUBLIC__/admin/js/jquery.min.js"></script>
<script language="javascript" type="text/javascript" src="__PUBLIC__/admin/js/admin_common.js"></script>
<script language="javascript" type="text/javascript" src="__PUBLIC__/admin/js/styleswitch.js"></script>
<script src="__PUBLIC__/js/dialog/plugins/iframeTools.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/js/calendar/jscal2.css">
			<link rel="stylesheet" type="text/css" href="__PUBLIC__/js/calendar/border-radius.css">
			<link rel="stylesheet" type="text/css" href="__PUBLIC__/js/calendar/win2k.css">
			<script type="text/javascript" src="__PUBLIC__/js/calendar/calendar.js"></script>
			<script type="text/javascript" src="__PUBLIC__/js/calendar/lang/en.js"></script>

</head>
<body>
<style type="text/css">
	html{_overflow-y:scroll}
</style>
<script>
</script>

<div class="pad-10">
<div class="col-tab">

<div id="div_setting_1" class="contentList pad-10" style="">
<form action="<?php echo U('Game/gametype_edit');?>" method="post" id="myform" enctype="multipart/form-data">
<table width="100%" class="table_form">
  <tbody>
  <tr>
    <th width="120">游戏类型</th>
    <td class="y-bg"><input type="text" class="input-text" name="typename" id="typename" size="30" value="<?php echo ($info["typename"]); ?>" >&nbsp;&nbsp;&nbsp;&nbsp;<font color="gray">输入游戏类型</font></td>
  </tr>
</tbody></table>
</div>
<div class="bk15"></div>
<input value="<?php echo ($id); ?>" name="id" type="hidden">
<input name="dosubmit" type="submit" value="提交" class="button">
</form>
</div>
</body></html>