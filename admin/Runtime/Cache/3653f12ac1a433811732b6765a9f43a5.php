<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
 <head>
  <title>发布文章</title>
  <meta name="Generator" content="EditPlus">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <link href="__PUBLIC__/admin/css/bootstrap.min.css" type="text/css" rel="stylesheet">
  <link href="__PUBLIC__/admin/css/style.css" type="text/css" rel="stylesheet">
  <script type="text/javascript" src="__PUBLIC__/admin/js/jquery-1.8.0.min.js"></script>
  <script type="text/javascript" src="__PUBLIC__/admin/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="__PUBLIC__/admin/js/dialog/jquery.artDialog.js?skin=default"></script>
  <script type="text/javascript" src="__PUBLIC__/admin/js/jquery.colorpicker.js"></script>
  <link rel="stylesheet" type="text/css" href="__PUBLIC__/js/calendar/jscal2.css">
<link rel="stylesheet" type="text/css" href="__PUBLIC__/js/calendar/border-radius.css">
<link rel="stylesheet" type="text/css" href="__PUBLIC__/js/calendar/win2k.css">
<script type="text/javascript" src="__PUBLIC__/js/calendar/calendar.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/calendar/lang/en.js"></script>
  <script type="text/javascript" src="__PUBLIC__/ueditor/editor_config.js"></script>
<script type="text/javascript" src="__PUBLIC__/ueditor/editor_all_min.js"></script> 
<link rel="stylesheet" href="__PUBLIC__/ueditor/themes/default/ueditor.css">
  <style type="text/css">
  input[type="text"]{
    height: 18px;
  }
  </style>
<script>
$(document).ready(
   function(){
	$(".send").click(function(){
	var $title = $("#title").val();
	var $type = $("#typeid").val();
	if($title==""||$type=="")
	{
	   $.dialog({
	   lock:true,
	   icon:'error',
	   content:'提交失败!至少要填写文章标题,所属栏目,文章内容!',
	   title:"提示信息",
	   ok:true,
	   });
	 return false;
	}
	});
	 $("tr:odd").addClass("ev");
	$("tr:even").addClass("ov");
	$("#cp3").colorpicker({
    fillcolor:true,
    success:function(o,color){
        $("#title").css("color",color);
		$("#TitleFontColor").val(color);
    }
});
}
	   
)
	function round()
	{
		
	document.getElementById("Hits").value=Math.ceil(Math.random()*(1000-1)+1);
	}
</script>
 
 </head>
 <body>

 <form action="__URL__/doedit"  name="myform" method="post" id="myform" enctype="multipart/form-data">
<div>
<table width="98%" border="0.2" class="table table-condensed table-striped">
  <tr>
    <input type="hidden" name="aid" value="<?php echo ($list["aid"]); ?>" />
    <td>文章标题:</td>
    <td><input type="text" name="title" id="title" size="20" value="<?php echo ($list["title"]); ?>" /><img src="__PUBLIC__/images/colorpicker.png" id="cp3" style="cursor:pointer; "/><input name="TitleFontColor" type="hidden" id="TitleFontColor" onClick="Getcolor(ColorBG,'TitleFontColor');" Readonly></td>
    <td>来源:</td>
    <td>
    <input name="from" type="text" id="CopyFrom" value="<?php echo ($list["from"]); ?>" size="14" maxlength="60">
    </td>
  </tr>
  <tr>
    <td>自定属性:</td><input type="hidden" name="typename" id="ty" >
    <td>
      推荐
      <input name="ishot" type="checkbox" class="noborder" id="IsHot" value="1" <?php if(($list["ishot"]) == "1"): ?>checked<?php endif; ?>>
      幻灯
      <input name="isflash" type="checkbox" class="noborder" id="IsFlash" value="1" <?php if(($list["isflash"]) == "1"): ?>checked<?php endif; ?>>
	  置顶
	   <input name="istop" type="checkbox" class="noborder" id="istop" value="1" <?php if(($list["istop"]) == "1"): ?>checked<?php endif; ?>>
    </td>
    <td>作者:</td>
    <td><input name="author" type="text" id="Author" value="<?php echo ($list["author"]); ?>" size="20" maxlength="200"></td>
  </tr>
  <tr>
    <td>所属栏目:</td>
    <td> <select id="typeid" name="typeid">
        <?php if(is_array($option)): $i = 0; $__LIST__ = $option;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value="<?php echo ($v["typeid"]); ?>" <?php if($v['typeid']==$atypeid['typeid']){echo 'selected';} ?> ><?php echo ($v["cname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
      </select>
    </td>

    <td>点击数:</td>
    <td><input name="hits" type="text" id="Hits" value="<?php echo ($list["hits"]); ?>" size="6" maxlength="10">&nbsp;&nbsp;<input style="margin-top: -10px;" name="get" type="button" class="btn btn-primary" onClick="round();" value="随机"></td>
  </tr>
  <tr>
    <td>发布日期:</td>
    <td>
      <input name="addtime" id="addtime" value="<?php echo (date('Y-m-d H:i:s',$list["addtime"])); ?>"  size="10" class="date input-text" readonly="" type="text">&nbsp;<script type="text/javascript">
			Calendar.setup({
			weekNumbers: true,
		    inputField : "addtime",
		    trigger    : "addtime",
		    dateFormat: "%Y-%m-%d %H:%M:%S",
		    showTime: false,
		    minuteStep: 1,
		    onSelect   : function() {this.hide();}
			});
        </script> 
    
     &nbsp;&nbsp;&nbsp;标签:&nbsp;&nbsp;<input type="text" name="tags" id="tags" size="30"  value="<?php echo ($list["tags"]); ?>"/></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td>内容简介:</td>
    <td><textarea name="description" id="note"><?php echo ($list["description"]); ?></textarea></td>
    <td>跳转url:</td>
    <td><input name="redirect" type="text" id="redirect" value="<?php echo ($list["redirect"]); ?>" size="20" maxlength="200"></td>

  </tr>
  <tr><td colspan='4'><textarea id="editor_id" name="content" style="width:100%;"><?php echo ($list["content"]); ?>
</textarea></td></tr>
</table>
</div>
<div ><input type="submit" class="btn btn-primary" value="发布"/> <input type="reset" class="btn btn-primary" value="重置" /></div>
</form>
<script type="text/javascript">

    var editor = new UE.ui.Editor({initialContent:''});
    editor.render("editor_id");
</script> 
 </body>
</html>