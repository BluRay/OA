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
    <td class="Big"><img src="template/default/content/images/notify_new.gif" align="absmiddle"><span class="big3"> 发送手机短信</span>
	
    </td>
  </tr>
</table>
<script Language="JavaScript"> 
function CheckForm()
{
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
function checkLength(which) {
var maxChars = 68;
if (which.value.length > maxChars)
which.value = which.value.substring(0,maxChars);
var curr = maxChars - which.value.length;
document.getElementById("chLeft").innerHTML = curr.toString();
}
</script>
<form name="save" method="post" action="?ac=phone_online&do=save&fileurl=sms">
	<input type="hidden" name="savetype" value="add" />
<table class="TableBlock" border="0" width="90%" align="center" style="border-bottom:#4686c6 solid 0px;">
<input type="hidden" name="receiveperson" class="disabledInput" size="50" value="<?php echo $_GET["user"]?>" />
<?php if($_GET["phone"]!=''){?>
<input type="hidden" name="receivephone" value="<?php echo $_GET["phone"]?>" />
<?php }else{?>
<tr>

<td height="30">输入手机号：<input type="text" name="receivephone" value="<?php echo $_GET["phone"]?>" /></td>
</tr>
<?php }?>
<tr>
      <td class="TableData"><textarea name="content" style="width:250px;" rows="6" class="InputAreaStyle" id="youbian" onkeyup="checkLength(this);"></textarea><br>
	  最长可输入68个汉字，您还可以输入
	  <span id="chLeft" style="color:red;">68</span>个汉字</td>
    </tr>
 
    <tr align="center" class="TableControl">
      <td nowrap height="35">
     <input type="button" name="Submit" value="发送手机短信" class="BigButton" onclick="sendForm();">      </td>
    </tr>
  </table>
</form>
</body>
</html>
