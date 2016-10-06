<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
<link rel="stylesheet" type="text/css" href="template/default/content/css/style.css">
<script language="javascript" type="text/javascript" src="DatePicker/WdatePicker.js"></script>
<script src="template/default/tree/js/admincp.js?SES" type="text/javascript"></script>
<script charset="utf-8" src="eweb/kindeditor.js"></script>

<title>Office 515158 2011 OA办公系统</title>
 
</head>
<body class="bodycolor">
<table width="90%" border="0" align="center" cellpadding="3" cellspacing="0" class="small">
  <tr>
    <td class="Big"><img src="template/default/content/images/notify_new.gif" align="absmiddle"><span class="big3"> 新建进度表</span>&nbsp;&nbsp;&nbsp;&nbsp;
	<span style="font-size:12px;">
	
	<a href="admin.php?ac=duty_log&fileurl=<?php echo $fileurl?>" style="font-size:12px;">返回列表页</a><img src="template/default/content/images/f_ico.png" align="absmiddle"></span>
    </td>
  </tr>
</table>
<script Language="JavaScript"> 
function CheckForm()
{
   if(document.save.progress.value=="")
   { alert("进度不能为空！");
     document.save.progress.focus();
     return (false);
   }
   if(document.save.content.value=="")
   { alert("完成内容不能为空！");
     document.save.content.focus();
     return (false);
   }
   
   return true;
}
function sendForm()
{
   if(CheckForm())
      document.save.submit();
}
</script>
<form name="save" method="post" action="?ac=duty_log_add&do=save&fileurl=duty">
	<input type="hidden" name="savetype" value="add" />
	<input type="hidden" name="did" value="<?php echo $_GET["did"]?>" />
	<?php
	$key1 = $db->fetch_one_array("SELECT dkey FROM ".DB_TABLEPRE."project_duty WHERE id='".$_GET["did"]."'  ");
	if($key1["dkey"]=='1'){
	?>

<table class="TableBlock" border="0" width="90%" align="center" style="border-bottom:#4686c6 solid 0px;">

	<tr>
      <td nowrap class="TableContent" width="15%"> 完成进度：<? get_helps()?></td>
      <td class="TableData">
      <input type="text" name="progress" class="BigInput"  size="15" value="" onKeyUp="value=value.replace(/[^0-9^.]/g,'');" />
      %,注这里填写占总进度的百分之多少</td>
    </tr>
	<tr>
      <td nowrap class="TableContent"> 附件：</td>
      <td class="TableData">
	  <?php echo public_upload('appendix','')?>
      </td>
    </tr>
	<tr>
      <td nowrap class="TableContent" width="15%"> 完成内容：<? get_helps()?></td>
      <td class="TableData">
        <textarea name="content" cols="60" rows="5" class="BigInput"></textarea></td>
    </tr>
	<tr>
      <td nowrap class="TableContent" width="15%"> 备注：</td>
      <td class="TableData">
        <textarea name="note" cols="60" rows="5" class="BigInput"></textarea></td>
    </tr>

    <tr align="center" class="TableControl">
      <td colspan="2" nowrap height="35">

		<input type="button" name="Submit" value="保存信息" class="BigButton" onclick="sendForm();"> 
        
      </td>
    </tr>
	<?php }else{?>
	<table class="TableBlock" border="0" width="90%" align="center" style="border-bottom:#4686c6 solid 0px;">

	<tr>
      <td nowrap class="TableContent" width="15%"> </td>
      <td class="TableData">该任务己完成，不可再输入进度</td>
    </tr>
	<?php }?>
	
  </table>
</form>

 
</body>
</html>
