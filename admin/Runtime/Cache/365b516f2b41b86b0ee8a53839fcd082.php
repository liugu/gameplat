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
<form action="<?php echo U('Other/menu_add');?>" method="post" id="myform" enctype="multipart/form-data">
<table width="100%" class="table_form">
  <tbody>
 
  	<tr>
						<th width="120">上级菜单：</th>        
						<td><span class="select_game" onmouseover= "focus_style('contro_bg3');"onmouseout="onblur_style('contro_bg3');check_pro_city();">
        <select name="fid" id="fid"  class="select">     
	      <option value="0">--一级栏目--</option>
	     <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["category"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
	       </select>
	       
	       </span>&nbsp;&nbsp;&nbsp;&nbsp;</td>
					
  <tr>
    <th width="120">栏目名：</th>
    <td class="y-bg"><input type="text" class="input-text" name="category" id="category" size="30" >&nbsp;&nbsp;&nbsp;&nbsp;<font color="gray">输入栏目名称</font></td>
  </tr>

  <tr>
    <th width="120">方法名：</th>
    <td class="y-bg"><input type="text" class="input-text" name="module_alias" id="module_alias" size="20" >&nbsp;&nbsp;&nbsp;&nbsp;<font color="gray">输入方法名</font></td>
  </tr>
  <tr>
    <th width="120">是否显示菜单</th>
    <td class="y-bg">
    <input name="hidden" value="0" type="radio" > 显示&nbsp;&nbsp;&nbsp;&nbsp;
	<input name="hidden" value="1" type="radio" checked> 不显示
  </td>
  </tr>
   <tr>
    <th width="120">排序：</th>
    <td class="y-bg"><input type="text" class="input-text" value="0" name="listorder" id="listorder" size="5" >&nbsp;&nbsp;&nbsp;&nbsp;<font color="gray">排序</font></td>
  </tr>
  
     
</tbody></table>
</div>

<div class="bk15"></div>

<input name="dosubmit" type="submit" value="提交" class="button">
</form>
</div>



</body></html>