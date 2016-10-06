<html>
<head>
<title>信息添加编辑</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="template/default/content/css/style.css">
<script language="javascript" type="text/javascript" src="DatePicker/WdatePicker.js"></script>
<script charset="utf-8" src="eweb/kindeditor.js"></script>
</head>
<body class="bodycolor">
<table width="90%" border="0" align="center" cellpadding="3" cellspacing="0" class="small">
  <tr>
    <td class="Big"><img src="template/default/content/images/notify_new.gif" align="absmiddle"><span class="big3">会议记录信息<?php echo $_title['name']?></span>&nbsp;&nbsp;&nbsp;&nbsp;
	<span style="font-size:12px;">
	
	<a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>" style="font-size:12px;">返回列表页</a><img src="template/default/content/images/f_ico.png" align="absmiddle"></span>
    </td>
  </tr>
</table>
<script Language="JavaScript"> 
function CheckForm()
{
   if(document.save.attendance.value=="")
   { alert("出席人员不能为空！");
     document.save.attendance.focus();
     return (false);
   }
   if(document.save.conferenceroom.value=="")
   { alert("会议室不能为空！");
     document.save.conferenceroom.focus();
     return (false);
   }

   if(document.save.content.value=="")
   { alert("描述不能为空！");
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

<form name="save" method="post" action="?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&do=record&cid=<?php echo $cid?>">
	<input type="hidden" name="view" value="edit" />
	<input type="hidden" name="conferenceid" value="<?php echo $cid?>" />
	<input type="hidden" name="id" value="<?php echo $user['rid']?>" />
	 <table class="TableBlock" border="0" width="90%" align="center" style="border-bottom:#4686c6 solid 0px;">
	
	<tr>
      <td nowrap class="TableContent" width="100"> 出席人员：<? get_helps()?></td>
      <td class="TableData">
	  <?php
	  if($user['rid']==''){
	  	global $db;
	  	$conf = $db->fetch_one_array("SELECT attendance,conferenceroom FROM ".DB_TABLEPRE."conference  WHERE id = ".$cid." ");
	  	$attendance=$conf['attendance'];
		$conferenceroom=$conf['conferenceroom'];
	  }else{
	  	$attendance=$user['attendance'];
		$conferenceroom=$user['conferenceroom'];
	  }
	  get_pubuser(2,"attendance",$attendance,"+选择出席人",60,4)
	  ?>
	  </td>
    </tr>
	 <tr>
      <td nowrap class="TableContent" width="100"> 会议室：<? get_helps()?></td>
      <td class="TableData">
	   <select name="conferenceroom" id="conferenceroom" class="BigStatic">
			<option value=" " selected="selected">默认会议室</option>
			<?php echo get_typelist($conferenceroom,1)?>
		</select></td>
    </tr>
	
	<tr>
      <td nowrap class="TableContent" width="100"> 附件：</td>
      <td class="TableData">
	  <?php echo public_upload('appendix',$user['appendix'])?>
	  </td>
    </tr>
	
	</table>	
	<table  width="90%" style="border-left:#4686c6 solid 1px;border-right:#4686c6 solid 1px;" align="center">	
		<tr>
			<td nowrap class="TableContent" width="104" style="border-right:#cccccc solid 1px;">描述：<? get_helps()?></td>
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
