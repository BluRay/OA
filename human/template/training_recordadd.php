<html>
<head>
<title>信息添加编辑</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="template/default/content/css/style.css">
<script language="javascript" type="text/javascript" src="DatePicker/WdatePicker.js"></script>
<script charset="utf-8" src="eweb/kindeditor.js"></script>
<script type="text/javascript"> 

</script>
</head>
<body class="bodycolor">
<table width="90%" border="0" align="center" cellpadding="3" cellspacing="0" class="small">
  <tr>
    <td class="Big"><img src="template/default/content/images/notify_new.gif" align="absmiddle"><span class="big3">培训记录信息<?php echo $_title['name']?></span>&nbsp;&nbsp;&nbsp;&nbsp;
	<span style="font-size:12px;">
	
	<a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&id=<?php echo $_GET['rid']?>" style="font-size:12px;">返回列表页</a><img src="template/default/content/images/f_ico.png" align="absmiddle"></span>
    </td>
  </tr>
</table>
<script Language="JavaScript"> 
function CheckForm()
{
   if(document.save.user.value=="")
   { alert("受培训人员不能为空！");
     document.save.user.focus();
     return (false);
   }
   if(document.save.trainingid.value=="")
   { alert("培训计划名称不能为空！");
     document.save.trainingid.focus();
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
	<input type="hidden" name="trainingid" value="<?php echo $_GET['rid']?>" />
	 <table class="TableBlock" border="0" width="90%" align="center" style="border-bottom:#4686c6 solid 0px;">
	 
    
	
		<tr>
			<td nowrap class="TableContent" width="100">受培训人员：<? get_helps()?></td>
			  <td class="TableData">
					<?php
	  get_pubuser(2,"user",$user['user'],"+选择受培训人员",50,4)
	  ?>
				</td>  	  	
		</tr>
	
		<tr>
      <td nowrap class="TableContent"> 培训费用：</td>
      <td class="TableData">
	  <input type="text" name="price" class="BigInput" size="20" value="<?php echo $user['price']?>" />
      </td>
    </tr>
	
	<tr>
			<td nowrap class="TableContent" width="100">培训机构：</td>
			  <td class="TableData">
		<input type="text" name="organization" value="<?php echo $user['organization']?>" class="BigInput" size="40">
				</td>  	  	
		</tr>
	
<tr>
			<td nowrap class="TableContent" width="100">培训时间：</td>
			  <td class="TableData">
		<input type="text" name="training" class="BigInput" style="width:180px;" size="20" value="<?php echo $user['training']?>" onClick="WdatePicker();" />
				</td>  	  	
		</tr>
		
		<tr align="center" class="TableControl">
			<td colspan="2" nowrap>
			<input type="button" value="保存" class="BigButtonBHover" onClick="sendForm();">&nbsp;	    </td>
	  </tr>
	 </table>
  
</form>

 
</body>
</html>
