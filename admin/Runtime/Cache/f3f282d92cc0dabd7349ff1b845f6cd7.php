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
<script language="javascript" type="text/javascript" src="__PUBLIC__/admin/js/jquery-1.8.0.min.js"></script>
<script language="javascript" type="text/javascript" src="__PUBLIC__/admin/js/admin_common.js"></script>
<script language="javascript" type="text/javascript" src="__PUBLIC__/admin/js/styleswitch.js"></script>
</head>
<body>
<div class="subnav">
    <div class="content-menu ib-a blue line-x">
    </div>
<style type="text/css">
	html{_overflow-y:scroll}
</style><div class="pad-lr-10">
<form name="searchform" action="<?php echo U('Ad/ad_link');?>" method="post">
<table class="search-form" cellspacing="0" width="100%">
    <tbody>
		<tr>
		<td>
		<div class="explain-col"> 
状态：  <select name="passed" id="passed">


<option value="1" <?php if($passed =='1'){echo 'selected';} ?>>通过</option>
<option value="0"<?php if($passed=='0'){echo 'selected';} ?>>未通过</option>
</select>

<input name="search" class="button" value="搜索" type="submit">
	</div>
		</td>
		</tr>
    </tbody>
</table>
</form>

<form name="myform" action="__URL__/ad_linkdelete" method="post">
<div class="table-list">
<table cellspacing="0" width="100%">
	<thead>
		<tr>
			<th align="left" width="20"><input value="" id="check_box" onclick="selectall('linkid[]');" type="checkbox"></th>
			<th align="left"></th>
			<th align="left">ID</th>
			<th align="left">网站名称</th>
			<th align="left">网站联系人</th>
			<th align="left">链接类型</th>
			<th align="left">申请时间</th>
			<th align="left">状 态</th>
			<th align="center">管理操作</th>

		</tr>
	</thead>
<tbody>
<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
		<td align="left"><input value="<?php echo ($vo["linkid"]); ?>" name="linkid[]" type="checkbox"></td>
		<td align="left"></td>
		<td align="left"><?php echo ($vo["linkid"]); ?></td>
		<td align="left"><?php echo ($vo["name"]); ?></td>
		<td align="left"><?php echo ($vo["username"]); ?></td>
		<td align="left">文字链接</td>
	    <td align="left"><?php echo (date("y-m-d",$vo["addtime"])); ?></td>
		<td align="left"><?php if($vo["passed"] == 1): ?>通过

<?php else: ?> 未通过<?php endif; ?>
</td>
		
		
		<td align="center">
			<a href="__URL__/ad_linkedit/linkid/<?php echo ($vo["linkid"]); ?>">修改</a> | <a  href="__URL__/ad_linkdelete/linkid/<?php echo ($vo["linkid"]); ?>">删除</a>
		</td>
    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
</tbody>
</table>
    <div class="btn"><label for="check_box">全选/取消</label>
		<input class="button" value="删除"    type="submit">
			</div>

<div align="right"><?php echo ($page); ?></div>
</div>
</form>
<script type="text/javascript"> 

function confirm_delete(){
	if(confirm('确认删除吗？')) $('#myform').submit();
}

</script>
</div>
</body></html>