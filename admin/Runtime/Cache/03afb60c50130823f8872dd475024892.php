<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>无标题文档</title>
<link href="__PUBLIC__/admin/css/reset.css" rel="stylesheet" type="text/css">
<link href="__PUBLIC__/admin/css/zh-cn-system.css" rel="stylesheet" type="text/css">
<link href="__PUBLIC__/admin/css/table_form.css" rel="stylesheet" type="text/css">
<link href="__PUBLIC__/admin/css/Admin_css.css" type=text/css rel=stylesheet>
<script src="__PUBLIC__/admin/js/jquery.min.js"></script>
<script src="__PUBLIC__/admin/editor/kindeditor.js"></script>
<script src="__PUBLIC__/admin/editor/lang/zh_CN.js"></script>
<script>
        var editor;
        KindEditor.ready(function(K) {
                editor = K.create('#description');
        });

		$(document).ready(
		  function()
		  {
		      $("#ch").click(function (){ $(".b11_1").hide();})

			  $("#no").click(function (){ $(".b11_1").show()})

			  $("#aa").click(function () { $(".xss").hide()})

              $("#aaa").click(function () { $(".xss").show()})

		  }
		)

</script>
</head>
<body>
<script>
function chk(){
if(document.getElementById("typename").value==""){
	alert("栏目名称不能为空!");
	document.getElementById("typename").focus();
	return false;
}
}
</script>

<div class="pad-10">
<div class="col-tab">
<div id="div_setting_1" class="contentList pad-10" style="">
<table width="100%" class="table_form">
<form action="__URL__/doedit_cat" method="post" id="myform" onSubmit="return chk();">
<input type="hidden" name="typeid" value="<?php echo ($list["typeid"]); ?>"/>
<tr>
 <th width="160">栏目名称</th>
 <td width="890" class="y-bg"><input type="text" name="typename" size="30" value="<?php echo ($list["typename"]); ?>" maxlength="20" id="typename">&nbsp;&nbsp;&nbsp;&nbsp;<font color="gray">输入栏目名称</font></td>
  </tr>
  <tr class="xss">
  <th width="160">上级栏目</th>
  <td colspan=4 class="y-bg"><select ID="TopID" name="fid">
 <option value=" "> 顶级栏目</option>
 <?php if(is_array($option)): $i = 0; $__LIST__ = $option;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value="<?php echo ($v["typeid"]); ?>" <?php if($v['typeid']==$list['fid']){echo 'selected';} ?> ><?php echo ($v["cname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
</select></td>
</tr>
<tr class="xss">
  <th width="160" align="right">是否启用自定义模板</th>
  <td colspan=4 ><input name="show" type="radio" class="noborder" value="1" id="aa">
    是
      <input name="show" type="radio" class="noborder" value="0" id="aaa" checked>
      否  <font color="gray"> (模板名称必须遵循 show_栏目ID.html 这个规则)</font></td>
</tr>

<tr>
   <th width="160">外部链接</th>
  <td colspan=4 ><input name="url" type="text" id="url" value="<?php echo ($list["url"]); ?>" size="40">
		  <select name="islink" type="text">
		<option value="1" <?php if(($list["islink"]) == "1"): ?>selected<?php endif; ?>>启用</option><option value="0" <?php if(($list["islink"]) == "0"): ?>selected<?php endif; ?>>不启用</option>
		 </select>
      </td>
</tr>

<tr>

   <th width="160">栏目关键字</th>
  <td colspan=4 ><input name="keywords" type="text" id="keyword" value="<?php echo ($list["keywords"]); ?>" size="40">
    <span class="note"><font color="gray">针对搜索引擎关键字设置,多个用英文逗号隔开</font></span></td>
</tr>
<tr>

   <th width="160">是否单页面新闻</th>
  <td colspan=4 ><?php switch($list["is_showdesc"]): case "1": ?><input name="is_showdesc" type="radio" class="noborder" value="1" checked  id="ch">
    是
      <input name="is_showdesc" type="radio" class="noborder" value="0" id="no">
      否   <font color="gray">(如果是单页面新闻,请在栏目描述中添加内容,常用于学校简介等栏目)</font><?php break;?>
  <?php case "0": break; endswitch;?></td>
</tr>
<tr>
   <th width="160">栏目描述</th>
  <td colspan=4 ><textarea id="description" name="description" cols="50" rows="6"><?php echo ($list["description"]); ?></textarea></td>
</tr>

</tr>
<tr>
   <th width="160">打开方式</th>
  <td colspan=4 ><select name="target" id="target">
       <?php if(($list["target"]) == "1"): ?><option value="1" selected>原窗口</option><option value="0">新窗口</option><?php endif; ?>
       <?php if(($list["target"]) == "0"): ?><option value="0" selected>新窗口</option><option value="1">原窗口</option><?php endif; ?>
    </select></td>
</tr>
<tr>
   <th width="160">导航栏是否显示</th>
  <td colspan=4 ><input name="ismenu" onClick="if(this.checked){
			  laoy4.style.display = '';
		  }" type="radio" class="noborder" value="1">
    是
      <input name="ismenu" onClick="if(this.checked){
			  laoy4.style.display = 'none';
		  }" type="radio" class="noborder" value="0" checked>
      否</td>
</tr>
<tr id="laoy4">
   <th width="160">导航排序</th>
  <td colspan=4><input name="drank" type="text" size="4" value="<?php echo ($list["drank"]); ?>" maxlength="2"></td>
</tr>




<tr> 
<td width="160"></td>
<td colspan=4><input name="Submit" type="submit" class="" value="修改">&nbsp;&nbsp;<input type="button" onClick="history.go(-1);" class="" value="返 回"></td>
</tr>
</form>
</table> 
</div>
</body>
</html>