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
<script language="javascript" type="text/javascript" src="__PUBLIC__/js/jquery.min.js"></script>
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
<form action="<?php echo U('Game/card_edit');?>" method="post" id="myform" enctype="multipart/form-data">
<table width="100%" class="table_form">
  <tbody>
 
  	<tr>
						<th width="120">所属游戏：</th>        
						<td><?php echo ($gamename); ?>--<?php echo ($servername); ?></td>
					
  <tr>
    <th width="120">新手卡名称</th>
    <td class="y-bg"><input type="text" class="input-text" value="<?php echo ($info["name"]); ?>" name="name" id="name" size="30" >&nbsp;&nbsp;&nbsp;&nbsp;<font color="gray">输入新手卡名称</font></td>
  </tr>

   <tr>
    <th width="120">是否可以领取</th>
    <td class="y-bg">
    <input name="status" value="0" type="radio" <?php if(($info["status"]) == "0"): ?>checked<?php endif; ?>> 可以&nbsp;&nbsp;&nbsp;&nbsp;
	<input name="status" value="1" type="radio" <?php if(($info["status"]) == "1"): ?>checked<?php endif; ?>> 不可以
  &nbsp;&nbsp;&nbsp;&nbsp;<font color="gray">是否可以领取</font></td>
  </tr>
  <tr>
    <th width="120">新手卡</th>
    <td class="y-bg"><textarea name="card" id="card" cols="50" rows="6"><?php echo ($info["card"]); ?></textarea>&nbsp;&nbsp;&nbsp;&nbsp;<font color="gray"> 新手卡一行为一个新手卡号</font></td>
  </tr>
 
  <tr>
    <th width="120">领取开始时间</th>
<td class="y-bg">
<input name="start_time" id="start_time" value="<?php echo (date('Y-m-d H:i:s',$info["start_time"])); ?>"  size="20" class="date input-text" readonly="" type="text">&nbsp;<script type="text/javascript">
			Calendar.setup({
			weekNumbers: true,
		    inputField : "start_time",
		    trigger    : "start_time",
		    dateFormat: "%Y-%m-%d %H:%M:%S",
		    showTime: true,
		    minuteStep: 1,
		    onSelect   : function() {this.hide();}
			});
        </script> 
</td>
  </tr>
     
</tbody></table>
</div>

<div class="bk15"></div>
<input value="<?php echo ($id); ?>" name="id" type="hidden">
<input value="<?php echo ($info["gid"]); ?>" name="gid" type="hidden">
<input value="<?php echo ($info["sid"]); ?>" name="sid" type="hidden">
<input name="dosubmit" type="submit" value="提交" class="button">
</form>
</div>



</body></html>