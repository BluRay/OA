<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
<link rel="stylesheet" type="text/css" href="template/default/content/css/style.css">
<script language="javascript" type="text/javascript" src="DatePicker/WdatePicker.js"></script>
<script src="template/default/tree/js/admincp.js?SES" type="text/javascript"></script>
<script charset="utf-8" src="eweb/kindeditor.js"></script>

<title>Office 515158 2011 OA办公系统</title>
 
</head>
<body>
<table width="90%" border="0" align="center" cellpadding="3" cellspacing="0" class="small">
  <tr>
    <td class="Big"><img src="template/default/content/images/notify_new.gif" align="absmiddle"><span class="big3"> 发送手机短信</span>&nbsp;&nbsp;&nbsp;&nbsp;
	<span style="font-size:12px;">
	
	<a href="admin.php?ac=smsindex&fileurl=<?php echo $fileurl?>" style="font-size:12px;">返回列表页</a><img src="template/default/content/images/f_ico.png" align="absmiddle"></span>
    </td>
  </tr>
</table>
<script type="text/javascript">
function checkLength(which) {
var maxChars = 68;
if (which.value.length > maxChars)
which.value = which.value.substring(0,maxChars);
var curr = maxChars - which.value.length;
document.getElementById("chLeft").innerHTML = curr.toString();
}
</script>
<script Language="JavaScript"> 
function CheckForm()
{
   if(document.save.receivephone.value=="")
   { alert("接收人手机号码不能为空！");
     document.save.receivephone.focus();
     return (false);
   }
   if(document.save.content.value=="")
   { alert("内容不能为空！");
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
<form name="save" method="post" action="?ac=smsadd&do=save&fileurl=sms">
	<input type="hidden" name="savetype" value="add" />
<table class="TableBlock" border="0" width="90%" align="center" style="border-bottom:#4686c6 solid 0px;">
    <tr>
      <td nowrap class="TableContent" width="15%"> 接收人：<? get_helps()?></td>
      <td class="TableData">
	  <input type="hidden" name="receiveid" value="" />
        <input type="text" name="receive" class="disabledInput" size="50" value="<?php if($_GET["name"]==''){?>请选择人员<?php }else{ echo $_GET["name"]; }?>" />&nbsp;&nbsp;<a href="#" onClick="window.open ('admin.php?ac=user_checkbox&fileurl=public&inputname=receive', 'newwindow', 'height=500, width=500, top=50, left=100, toolbar=no, menubar=no, scrollbars=yes, resizable=no,location=no, status=no')" class="FuncBtn">+选 择</a> 
		 </td>
    </tr>
    <tr>
      <td nowrap class="TableContent"> 接收人手机号码：<? get_helps()?></td>
      <td class="TableData">
        <textarea name="receivephone" cols="60" rows="4" class="disabledInput"><?php echo $_GET["phone"]?></textarea>
	  <br>注：多个手机号码请用英文","号隔开
      </td>
    </tr>
    <tr>
      <td nowrap class="TableContent">内容：<? get_helps()?></td>
      <td class="TableData"><textarea name="content" cols="70" rows="5" class="InputAreaStyle" id="youbian" onkeyup="checkLength(this);"></textarea>
      <br>
	  最长可输入68个汉字，您还可以输入
	  <span id="chLeft" style="color:red;">68</span>个汉字
      </td>
    </tr>
   
 
    <tr align="center" class="TableControl">
      <td colspan="2" nowrap height="35">
		<input type="button" name="Submit" value="发送短信" class="BigButton" onclick="sendForm();">
      </td>
    </tr>
  </table>
</form>
 
 
</body>
</html>
