<html>
<head>
<title>信息添加编辑</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="template/default/content/css/style.css">
<script language="javascript" type="text/javascript" src="DatePicker/WdatePicker.js"></script>
<script src="template/default/tree/js/admincp.js?SES" type="text/javascript"></script>
<script type="text/javascript"> 

</script>
<script Language="JavaScript"> 
function CheckForm()
{
   if(document.save.app_option_id.value=="")
   { alert("投票选项不能为空！");
     document.save.app_option_id.focus();
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
</head>
<body class="bodycolor">
<table width="90%" border="0" align="center" cellpadding="3" cellspacing="0" class="small" style="margin-top:30px;">
  <tr>
    <td class="Big"><img src="template/default/content/images/notify_new.gif" align="absmiddle"><span class="big3"> <?php echo $name?></span>&nbsp;&nbsp;&nbsp;&nbsp;
	<span style="font-size:12px;">
	
	<a href="admin.php?ac=app&fileurl=knowledge" style="font-size:12px;">返回列表页</a><img src="template/default/content/images/f_ico.png" align="absmiddle"></span>
    </td>
  </tr>
</table>

<?php if($app_log["user"]==''){?>
<form name="save" method="post" action="?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&do=views">
	<input type="hidden" name="view" value="save" />
	<input type="hidden" name="app_id" value="<?php echo $app_id?>" />
	 <table class="TableBlock" border="0" width="90%" align="center">
		
		<tr>
			<td nowrap class="TableContent">评论：</td>
			  <td class="TableData">
				<textarea name="content" rows="5" cols="60"></textarea>
			</td>
		</tr>

		<tr>
			<td nowrap class="TableContent">投票选项：</td>
		  <td class="TableData">
		 
		   <table width="100%">
		   <?foreach ($result as $row) {?>
			<tr>
				<td  height="30">	  
					<input type="radio" name="app_option_id" value="<?php echo $row["id"]?>" /><?php echo $row["title"]?>
				</td>
			</tr>
			<?}?>
				</table>
		  
		  
			</td>	  	
		</tr>
		
		
		
		<tr align="center" class="TableControl">
			<td colspan="2" nowrap>
			<?if($appadmin["id"]!=''){?><input type="button" value="开始投票" class="BigButtonBHover" onClick="sendForm();">&nbsp;<?}else{?><span class="big3"> 你无权参与此次投票，请与发起人联系！</span>	<?}?></td>
	  </tr>
	 </table>
  
</form>
<?}else{?>
 
 
 	 <table class="TableBlock" border="0" width="90%" align="center">
		<tr>
			<td nowrap class="TableContent" width="40"><span class="big3" style="line-height:150%;">投<br>票<br>记<br>录</span></td>
		  <td class="TableData">
		 
		   <table width="100%">
		   <?php
		   foreach ($result as $row) {
			   $ksql="SELECT COUNT(*) as app_option_id FROM ".DB_TABLEPRE."app_log";
			   $ksql.=" WHERE app_option_id='".$row["id"]."' ";
			   $key1 = $db->fetch_one_array($ksql);
			   $ksql2="SELECT COUNT(*) as app_id FROM ".DB_TABLEPRE."app_log ";
			   $ksql2.=" WHERE app_id='".$row["app_id"]."' ";
			   $key2 = $db->fetch_one_array($ksql2);
			   $appnumber=2;
			   $appnum=$key1['app_option_id']/$key2['app_id']*100;
		   ?>
			<tr>
				<td  height="30">	  
					<img src="template/default/images/app.gif" style="width:<?php echo $appnumber+$appnum?>px;height:18px; margin:0px;" border="0" /><span style="font-size:24px; font-weight:bold; color:#FF0000;"><?php echo $key1[app_option_id]?></span>&nbsp;&nbsp;<?php echo $row["title"]?>
				</td>
			</tr>
			<?}?>
				</table>
		  
		  
			</td>	  	
		</tr>
	 </table>
	 
	 <table width="90%" border="0" align="center" cellpadding="3" cellspacing="0" class="small" style="margin-top:40px;">
  <tr>
    <td class="Big"><img src="template/default/content/images/notify_new.gif" align="absmiddle"><span class="big3">大家对“<?php echo get_inc_app_types($app_id)?>”投票的评论</span>
    </td>
  </tr>
</table>

 <table class="TableBlock" border="0" width="90%" align="center">
		<tr>
			<td nowrap class="TableContent" width="40"></td>
		  <td class="TableData">
		 
		   <table width="100%">
		   <?foreach ($relog as $row) {?>
		   <?php if($row['content']!=''){?>
			<tr>
				<td  height="30">	  
					<b style="color:red;"><?php echo get_realname($row['user'])?></b>说：<?php echo $row['content']?>
				</td>
			</tr>
			<? } }?>
				</table>
		  
		  
			</td>	  	
		</tr>
	 </table>
	 
	 
	 
 
<?}?>
</body>
</html>
