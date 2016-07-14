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
<form action="<?php echo U('Ad/edit');?>" method="post" id="myform" enctype="multipart/form-data">
<table width="100%" class="table_form">
  <tbody>

  <tr>
    <th width="120">广告名称</th>
    <td class="y-bg"><input type="text" class="input-text" name="title" value="<?php echo ($list["title"]); ?>"id="title" size="30" >&nbsp;&nbsp;&nbsp;&nbsp;<font color="gray">广告名称</font></td>
  </tr>
 <tr>
    <th width="120">广告类型</th>
    <td class="y-bg">
    <select id="type" name="type">
     <?php if(is_array($where_list)): $i = 0; $__LIST__ = $where_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>"<?php if($vo['id']==$list['type'])echo "selected";?>><?php echo ($vo["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
	
		
</select>
  &nbsp;&nbsp;&nbsp;&nbsp;<font color="gray">广告类型</font></td>
  </tr>
   <tr>
    <th width="120">是否显示</th>
    <td class="y-bg">
    <input name="status" value="0" type="radio" <?php if(($list["status"]) == "0"): ?>checked<?php endif; ?>> 显示&nbsp;&nbsp;&nbsp;&nbsp;
	<input name="status" value="1" type="radio" <?php if(($list["status"]) == "1"): ?>checked<?php endif; ?>> 不显示
  &nbsp;&nbsp;&nbsp;&nbsp;<font color="gray">是否显示</font></td>
  </tr>
    <tr>
    <th width="120">广告名称</th>
    <td class="y-bg"><input type="text" class="input-text" name="url" value="<?php echo ($list["url"]); ?>"id="title" size="30" >&nbsp;&nbsp;&nbsp;&nbsp;<font color="gray">广告外链</font></td>
  </tr>
  <tr>
  <th width="120">图片</th>
    <td class="y-bg"><input type="file"  name=”content”>

&nbsp;&nbsp;&nbsp;&nbsp;<font color="gray"> </font></td>
  </tr>
    <th width="120">描述</th>
    <td class="y-bg"><textarea name="description" id="description" cols="50" rows="6"><?php echo ($list["description"]); ?></textarea>

&nbsp;&nbsp;&nbsp;&nbsp;<font color="gray"> </font></td>
  </tr>
 
  <tr>
    <th width="120">有效期至：</th>
<td class="y-bg">
<input name="end_time" id="end_time" value="<?php if($list['end_time']=='0'){echo " ";}else{echo date('Y-m-d H:i:s',$list['end_time']);}?>"  size="20" class="date input-text" readonly="" type="text">&nbsp;<script type="text/javascript">
			Calendar.setup({
			weekNumbers: true,
		    inputField : "end_time",
		    trigger    : "end_time",
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
<input value="<?php echo ($list["id"]); ?>" name="id" type="hidden">
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