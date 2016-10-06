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
    <td class="Big"><img src="template/default/content/images/notify_new.gif" align="absmiddle"><span class="big3"> <?php echo $_title['title']?>信息<?php echo $_title['name']?></span>&nbsp;&nbsp;&nbsp;&nbsp;
	<span style="font-size:12px;">
	
	<a href="admin.php?ac=<?php echo $ac?>&fileurl=knowledge&type=<?php echo $_GET['type']?>" style="font-size:12px;">返回列表页</a><img src="template/default/content/images/f_ico.png" align="absmiddle"></span>
    </td>
  </tr>
</table>
<script Language="JavaScript"> 
function CheckForm()
{
   if(document.save.title.value=="")
   { alert("文件名称不能为空！");
     document.save.title.focus();
     return (false);
   }
   if(document.save.documentid.value=="")
   { alert("文件夹不能为空！");
     document.save.documentid.focus();
     return (false);
   }
   if(document.save.annex.value=="")
   { alert("附件不能为空！");
     document.save.annex.focus();
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

<form name="save" method="post" action="?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&do=add&type=<?php echo $_GET[type]?>">
	<input type="hidden" name="view" value="edit" />
	<input type="hidden" name="id" value="<?php echo $user['id']?>" />
	<input type="hidden" name="type" value="<?php echo $_GET[type]?>" />
	 <table class="TableBlock" border="0" width="90%" align="center" style="border-bottom:#4686c6 solid 0px;">
		<tr>
			<td nowrap class="TableContent" width="90">文件名称：<? get_helps()?></td>
			  <td class="TableData">
					<input type="text" class="BigInput" name="title" value="<?php echo $user['title']?>" size=50 >
				</td>  	  	
		</tr>
		
		<tr>
      <td nowrap class="TableContent"> 文件夹：<? get_helps()?></td>
      <td class="TableData">
							  <select class="SelectStyle" name="documentid">
										<option value="" >无目录</option>
										<?php GET_document_PUBLIC_LIST(0,$user['documentid'],0,0,$_USER->id)?>
										</select></td>
    </tr>
		<tr>
      <td nowrap class="TableContent"> 附件：<? get_helps()?></td>
      <td class="TableData">
	  <?php echo public_upload('annex',$user['annex'])?>
	  </td>
    </tr>
	<?php if($_GET["type"]!='1'){?>
		<tr>
      <td nowrap class="TableContent"> 指定阅读人：<? get_helps()?></td>
      <td class="TableData"><?php
	  get_pubuser(2,"readuser",$user['readuser'],"+选择阅读人",60,4)
	  ?>
	  &nbsp;&nbsp;&nbsp;&nbsp;<?php get_smsbox("阅读人","readuser")?>	</td>
    </tr>
	<?php }?>
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
