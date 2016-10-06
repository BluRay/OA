<html>
<head>
<title>信息添加编辑</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="template/default/content/css/style.css">
<script language="javascript" type="text/javascript" src="DatePicker/WdatePicker.js"></script>
<script src="template/default/tree/js/admincp.js?SES" type="text/javascript"></script>
<script type="text/javascript"> 

</script>
</head>
<body class="bodycolor">
<table width="90%" border="0" align="center" cellpadding="3" cellspacing="0" class="small">
  <tr>
    <td class="Big"><img src="template/default/content/images/notify_new.gif" align="absmiddle"><span class="big3"> 投票”<?php echo get_inc_app_types($app_id)?>“明细列表</span>&nbsp;&nbsp;&nbsp;&nbsp;
	<span style="font-size:12px;">
	
	<a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>" style="font-size:12px;">返回列表页</a><img src="template/default/content/images/f_ico.png" align="absmiddle"></span>
    </td>
  </tr>
</table>

<form name="save" method="post" action="?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&do=add">
	<input type="hidden" name="view" value="edit" />
	<input type="hidden" name="id" value="<?php echo $user['id']?>" />
	 <table class="TableBlock" border="0" width="90%" align="center">
		<tr>
			<td width="72" align="center" nowrap class="TableHeader">编号</td>
			  <td width="395" align="center" class="TableHeader">投票选项</td>
			  <td width="144" align="center" class="TableHeader">投票人</td>
			  <td width="197" align="center" class="TableHeader">投票时间</td>
			  <td width="355" align="center" class="TableHeader">评论</td>  	  	
		</tr>
		<?foreach ($result as $row){?>
		<tr>
			<td align="center" nowrap class="TableContent"><?php echo $row['id']?></td>
			  <td align="center" class="TableData"><?php echo get_inc_app_option_types($row['app_option_id'])?></td>
			  <td align="center" class="TableData"><?php echo get_realname($row['user'])?></td>
			  <td align="center" class="TableData"><?php echo $row['date']?></td>
			  <td align="center" class="TableData"><?php echo $row['content']?></td>
		</tr>
		<?}?>
	 </table>
  
</form>

 
</body>
</html>
