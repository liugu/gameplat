<?php if (!defined('THINK_PATH')) exit();?><html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equtv="Content-Type" content="text/html; charset=utf-8" />
<title>网站后台管理</title>
<link href="__PUBLIC__/admin/css/bootstrap.min.css" type="text/css" rel="stylesheet">
<link href="__PUBLIC__/admin/css/style.css" type="text/css" rel="stylesheet">
<script type="text/javascript" src="__PUBLIC__/admin/js/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/admin/js/bootstrap.min.js"></script>
<script src="__PUBLIC__/admin/js/admin.js"></script>
</head>
<body>
<form name="myform" method="POST" action="__URL__/delall">
<table width="100%" border="0"  align=center cellpadding="3" cellspacing="2" bgcolor="#FFFFFF" class="table table-condensed table-striped admintable">
<tr> 
  <td colspan="6" align=left class="admintitle">数据库恢复 <a href="__URL__/upload">上传备份文件</a></td>
</tr>
    <tr style="font-weight:bold;">
    <td width="8%" height="30" align="center" class="ButtonList">编号</td>
    <td width="10%" align="center" class="ButtonList">文件名</td>
	<td width="5%" align="center" class="ButtonList">卷号</td>
	<td width="5%" align="center" class="ButtonList">大小</td>
	<td width="10%" align="center" class="ButtonList">备份时间</td>
	<td width="10%" align="center" class="ButtonList">相关操作</td>
    </tr>
	<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
    <td height="40" align="center"><?php echo ($i); ?>.&nbsp;
      <input type="checkbox" value="<?php echo ($vo["filename"]); ?>" name="ids[]" onClick="unselectall(this.form)" style="border:0;"></td>
    <td><?php echo ($vo["filename"]); ?></td>
	<td><?php echo ($vo["number"]); ?></td>
	<td><?php echo ($vo["filesize"]); ?> M</td>
	<td><?php echo ($vo["maketime"]); ?></td>
	<td><a href="<?php echo U('Other/back');?>?id=<?php echo ($vo["pre"]); ?>" onClick="return confirm('导入数据会删除现在数据库的所有信息,请确定是否导入?')"><font color="#000000">导入</font></a>| <a href="<?php echo U('Other/del');?>?id=<?php echo ($vo["filename"]); ?>" onClick="return confirm('确定删除?')"><font color="#000000">删除</font></a>| <a href="<?php echo U('Other/down');?>?id=<?php echo ($vo["filename"]); ?>"><font color="#000000">下载</font></a></td>
    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
<tr><td align="center">全选:<input name="Action" type="hidden"  value="Del"><input name="chkAll" type="checkbox" id="chkAll" onClick=CheckAll(this.form) value="checkbox" style="border:0"></td>
  <td colspan="5">
  <input name="Del" type="submit" id="Del" value="删除"> <font color="#666666">只需要点击任意一个文件的导入链接，程序会自动导入剩余文件!</font></td>
  </tr><tr><td colspan="6">
</td></tr></table>
</form>
<div style="text-align:center;margin:10px;">
<hr>
</div>
</body>
</html>