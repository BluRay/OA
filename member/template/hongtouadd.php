<html>
<head>
<title>信息添加编辑</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="template/default/content/css/style.css">

</head>
<body class="bodycolor">
<table width="90%" border="0" align="center" cellpadding="3" cellspacing="0" class="small">
  <tr>
    <td class="Big"><img src="template/default/content/images/notify_new.gif" align="absmiddle"><span class="big3"> 红头文件信息<?php echo $_title['name']?></span>&nbsp;&nbsp;&nbsp;&nbsp;
	<span style="font-size:12px;">
	
	<a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>" style="font-size:12px;">返回列表页</a><img src="template/default/content/images/f_ico.png" align="absmiddle"></span>
    </td>
  </tr>
</table>
<script Language="JavaScript"> 
function CheckForm()
{
   if(document.save.title.value=="")
   { alert("红头文件不能为空！");
     document.save.title.focus();
     return (false);
   }
   if(document.save.sealurl.value=="")
   { alert("红头文件不能为空！");
     document.save.sealurl.focus();
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
<form name="save" method="post" action="?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&do=add">
<input type="hidden" name="view" value="edit" />
	<input type="hidden" name="id" value="<?php echo $user['id']?>" />
 <table class="TableBlock" border="0" width="90%" align="center">
  	<tr>
  		<td nowrap class="TableContent" width="120">红头文件名称：<? get_helps()?></td>
  	  <td class="TableData">
  	  	<input type="text" class="BigInput" name="sealtitle" value="<?php echo $user['sealtitle']?>" size=30 >  	  </td>  	  	
	</tr>
	
	<tr>
  		<td nowrap class="TableContent" width="120">上传红头文件：<? get_helps()?></td>
  	  <td class="TableData">
  	  	<?php echo public_upload('sealurl',$user['sealurl'])?>  </td>  	  	
	</tr>
     
    <tr align="center" class="TableControl">
    	<td colspan="2" nowrap>
    	<input type="button" value="保存" class="BigButtonBHover" onClick="sendForm();">&nbsp;	    </td>
  </tr>
 </table>
  
</form>

 
</body>
</html>
