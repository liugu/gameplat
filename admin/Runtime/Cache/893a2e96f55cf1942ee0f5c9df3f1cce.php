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
<form action="<?php echo U('Game/card_add');?>" method="post" id="myform" enctype="multipart/form-data">
<table width="100%" class="table_form">
  <tbody>
 
  	<tr>
						<th width="120">请选择游戏：</th>        
						<td><span class="select_game" onmouseover= "focus_style('contro_bg3');"onmouseout="onblur_style('contro_bg3');check_pro_city();">
        <select name="gid" id="gid" onChange="changepro('sid','gid');" class="select">     
	      <option value="0">请选择游戏</option>
	     <?php if(is_array($game_list)): $i = 0; $__LIST__ = $game_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["gid"]); ?>"><?php echo ($vo["gamename"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
	       </select>
	       <select name="sid" id="sid" class="select">
	       <option value="0">请选择服务器</option>
	       </select>
	       </span>&nbsp;&nbsp;&nbsp;&nbsp;<font color="gray">请选择所属游戏</font></td>
					
  <tr>
    <th width="120">新手卡名称</th>
    <td class="y-bg"><input type="text" class="input-text" name="name" id="name" size="30" >&nbsp;&nbsp;&nbsp;&nbsp;<font color="gray">输入新手卡名称</font></td>
  </tr>

   <tr>
    <th width="120">是否可以领取</th>
    <td class="y-bg">
    <input name="status" value="0" type="radio" checked> 可以&nbsp;&nbsp;&nbsp;&nbsp;
	<input name="status" value="1" type="radio" > 不可以
  &nbsp;&nbsp;&nbsp;&nbsp;<font color="gray">是否可以领取</font></td>
  </tr>
  <tr>
    <th width="120">新手卡</th>
    <td class="y-bg"><textarea name="card" id="card" cols="50" rows="6"></textarea>&nbsp;&nbsp;&nbsp;&nbsp;<font color="gray"> 新手卡一行为一个新手卡号</font></td>
  </tr>
 
  <tr>
    <th width="120">领取开始时间</th>
<td class="y-bg">
<input name="start_time" id="start_time" value="" size="20" class="date input-text" readonly="" type="text">&nbsp;<script type="text/javascript">
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

<input name="dosubmit" type="submit" value="提交" class="button">
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