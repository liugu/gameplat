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
<form name="searchform" action="<?php echo U('Game/card_list');?>" method="post">
<table class="search-form" cellspacing="0" width="100%">
    <tbody>
		<tr>
		<td>
		<div class="explain-col">
			新手卡名称：  <input value="<?php echo ($name); ?>" class="input-text" name="name" type="text">  
 所属游戏：<select name="gid" id="gid" onChange="changepro('sid','gid');" class="select">     
	      <option value="0">请选择游戏</option>
	     <?php if(is_array($game_list)): $i = 0; $__LIST__ = $game_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["gid"]); ?>"<?php if($vo['gid']==$gid){echo 'selected';} ?>><?php echo ($vo["gamename"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
	       </select>
	      
<input name="search" class="button" value="搜索" type="submit">
	
	</div>
		</td>
		</tr>
    </tbody>
</table>
</form>

<form name="myform" action="__URL__/card_delete" method="post">
<div class="table-list">
<table cellspacing="0" width="100%">
	<thead>
		<tr>
			<th align="left" width="20"><input value="" id="check_box" onclick="selectall('cid[]');" type="checkbox"></th>
			<th align="left"></th>
			<th align="left">ID</th>
			<th align="left">游戏名称</th>
			<th align="left">服务器名称</th>
			<th align="left">新手卡名称</th>
			<th align="left">总数/剩余</th>
			<th align="left">开始领取时间</th>
			<th align="center">操作</th>
		</tr>
	</thead>
<tbody>
<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
		<td align="left"><input value="<?php echo ($vo["id"]); ?>" name="cid[]" type="checkbox"></td>
		<td align="left"></td>
		<td align="left"><?php echo ($vo["id"]); ?></td>
		<td align="left"><?php echo ($vo["gamename"]); ?></td>
		<td align="left"><?php echo ($vo["servername"]); ?></td>
		<td align="left"><?php echo ($vo["name"]); ?></td>
		<td align="left"><?php echo ($vo["total"]); ?>/<?php echo ($vo["remain"]); ?></td>
		<td align="left"><?php echo (date("y-m-d",$vo["start_time"])); ?></td>
		<td align="center">
			<a href="__URL__/card_edit/id/<?php echo ($vo["id"]); ?>">修改</a> | <a href="__URL__/card_delete/cid/<?php echo ($vo["id"]); ?>">删除</a>
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
</div>

<script language="javascript">
sch=new Array();
<?php if(is_array($game_list)): $k = 0; $__LIST__ = $game_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?>sch[<?php echo ($k); ?>]=new Array("<?php echo ($vo["gamename"]); ?>","<?php echo ($vo["gid"]); ?>");<?php endforeach; endif; else: echo "" ;endif; ?>
	
//var schcount=1;
lm=new Array();
<?php if(is_array($server_list)): $k = 0; $__LIST__ = $server_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?>lm[<?php echo ($k); ?>]=new Array("<?php echo ($vo["sid"]); ?>","<?php echo ($vo["servername"]); ?>","<?php echo ($vo["gid"]); ?>");<?php endforeach; endif; else: echo "" ;endif; ?>

var lmcount=<?php echo ($num); ?>;

function changepro(city,pro)
{
var pro_v=document.getElementById(pro).value;

var i;
document.getElementById(city).options.length=1;
	for (i=1;i<=lmcount;i++){
		
		if (lm[i][2]==pro_v){ 
		document.getElementById(city).options.add(new Option(lm[i][1],lm[i][0])); 
		}        
	}

}

</script>  
</body></html>