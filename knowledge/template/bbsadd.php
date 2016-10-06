<html>
<head>
<title>信息添加编辑</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="template/default/content/css/style.css">
<script language="javascript" type="text/javascript" src="DatePicker/WdatePicker.js"></script>
<script src="template/default/tree/js/admincp.js?SES" type="text/javascript"></script>
<script charset="utf-8" src="eweb/kindeditor.js"></script>
<script type="text/javascript"> 

</script>
</head>
<body class="bodycolor">
<table width="90%" border="0" align="center" cellpadding="3" cellspacing="0" class="small">
  <tr>
    <td class="Big"><img src="template/default/content/images/notify_new.gif" align="absmiddle"><span class="big3"> 贴子信息<?php echo $_title['name']?></span>&nbsp;&nbsp;&nbsp;&nbsp;
	<span style="font-size:12px;">
	
	<a href="admin.php?ac=<?php echo $ac?>&fileurl=knowledge" style="font-size:12px;">返回列表页</a><img src="template/default/content/images/f_ico.png" align="absmiddle"></span>
    </td>
  </tr>
</table>
<script Language="JavaScript"> 
function CheckForm()
{
<?php if($user["bbsclass"]==''){?>
   if(document.save.bbsclass.value=="")
   { alert("版块不能为空！");
     document.save.bbsclass.focus();
     return (false);
   }
<?php }?>
   if(document.save.title.value=="")
   { alert("标题不能为空！");
     document.save.title.focus();
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

<form name="save" method="post" action="?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&do=add">
	<input type="hidden" name="view" value="edit" />
	<input type="hidden" name="id" value="<?php echo $user['id']?>" />
	 <table class="TableBlock" border="0" width="90%" align="center" style="border-bottom:#4686c6 solid 0px;">
	 <?php if($user["bbsclass"]==''){?>
		<tr>
			<td nowrap class="TableContent" width="90">版块：<? get_helps()?></td>
			  <td class="TableData">
			<select name="bbsclass" class="BigStatic">
			<option value="" selected="selected">请选择版块</option>
			<?php echo get_inc_bbs_type(0,17)?>
			</select>
				</td>  	  	
		</tr>
		<?php }else{?>
		<input type="hidden" name="bbsclass" value="<?php echo $user["bbsclass"]?>" />
		<?php }?>
		<tr>
			<td nowrap class="TableContent" width="90">主题：<? get_helps()?></td>
			  <td class="TableData">
					<input type="text" class="BigInput" name="title" value="<?php echo $user['title']?>" size=50 >
				</td>  	  	
		</tr>
		
		<tr>
      <td nowrap class="TableContent"> 作者：</td>
      <td class="TableData">
      <input type="text" name="author" class="BigInput" style="width:168px;" size="20" value="<?php if($user['author']!=''){echo $user['author'];}else{echo get_realname($_USER->id);}?>" /></td>
    </tr>
	<tr>
      <td nowrap class="TableContent"> 来源：</td>
      <td class="TableData">
      <input type="text" name="origin" class="BigInput" style="width:168px;" size="20" value="<?php echo $user['origin']?>" /></td>
    </tr>
	</table>	
	<table  width="90%" style="border-left:#4686c6 solid 1px;border-right:#4686c6 solid 1px;" align="center">	
		<tr>
			<td nowrap class="TableContent" width="94" style="border-right:#cccccc solid 1px;">内容：</td>
			  <td class="TableData" style="padding-top:10px; padding-bottom:10px; padding-left:3px;">
			  
			  <script>
        KE.show({
                id : 'content'
        });
</script>
				<textarea name="content" rows="5" cols="60" style="width:600px;height:300px;"><?php echo $user['content']?></textarea>
			</td>
		</tr>
		</table>
  <table class="TableBlock" border="0" width="90%" align="center" style="border-top:#4686c6 solid 0px;">
		
		<tr align="center" class="TableControl">
			<td colspan="2" nowrap>
			<input type="button" value="保存" class="BigButtonBHover" onClick="sendForm();">&nbsp;	    </td>
	  </tr>
	 </table>
  
</form>

 
</body>
</html>
