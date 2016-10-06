<html>
<head>
<title>基本信息</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="template/default/content/css/style.css">
<script language="javascript" type="text/javascript" src="DatePicker/WdatePicker.js"></script>
</head>
<body class="bodycolor">
<table width="90%" border="0" align="center" cellpadding="3" cellspacing="0" class="small">
  <tr>
    <td class="Big"><img src="template/default/content/images/notify_new.gif" align="absmiddle"><span class="big3"> 密码修改</span>
    </td>
  </tr>
</table>
<script Language="JavaScript"> 
function CheckForm()
{
   if(document.save.oldpassword.value=="")
   { alert("旧密码不能为空！");
     document.save.oldpassword.focus();
     return (false);
   }
   if(document.save.password.value=="")
   { alert("新输入新密码！");
     document.save.password.focus();
     return (false);
   }
   if(document.save.password.value!=document.save.ppassword.value)
   { alert("两次输入的密码不一致，请重新输入！");
     document.save.ppassword.focus();
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
<form name="save" method="post" action="?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&do=save">
<input type="hidden" name="savetype" value="edit" />
 <table class="TableBlock" border="0" width="90%" align="center">
  	<tr>
  		<td nowrap class="TableContent" width="150">请输入旧密码：<? get_helps()?></td>
  	  <td class="TableData">
  	  	<input type="text" class="BigInput" name="oldpassword" value="" size=30>  	  </td>  	  	
	</tr>
	<tr>
  		<td nowrap class="TableContent" width="150">请输入新密码：<? get_helps()?></td>
  	  <td class="TableData">
  	  	<input type="text" class="BigInput" name="password" value="" size=30>  	  </td>  	  	
	</tr>
	<tr>
  		<td nowrap class="TableContent" width="150">请重复输入新密码：<? get_helps()?></td>
  	  <td class="TableData">
  	  	<input type="text" class="BigInput" name="ppassword" value="" size=30>  	  </td>  	  	
	</tr>
	





    
    <tr align="center" class="TableControl">
    	<td colspan="2" nowrap>
    	<input type="button" value="保存" class="BigButtonBHover" onClick="sendForm();">&nbsp;	    </td>
  </tr>
 </table>
  
</form>

 
</body>
</html>
