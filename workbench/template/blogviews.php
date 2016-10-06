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
<table width="90%" border="0" align="center" cellpadding="3" cellspacing="0" class="small" style='margin-top:30px;'>
  <tr>
    <td class="Big"><img src="template/default/content/images/notify_new.gif" align="absmiddle"><span class="big3"> <?php echo $blog["title"]?>&nbsp;&nbsp;<?php echo $_title['name']?>&nbsp;&nbsp;&nbsp;&nbsp;
	<span style="font-size:12px;">&nbsp;<span style="font-size:34px; font-weight:bold; color:#FF0000;"><?php echo $blog['number']?></span>&nbsp;次</span>&nbsp;&nbsp;&nbsp;&nbsp;
	
	<a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>" style="font-size:12px;">返回列表页</a><img src="template/default/content/images/f_ico.png" align="absmiddle">
    </td>
  </tr>
</table>

<form name="save" method="post" action="?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&do=views">
	<input type="hidden" name="view" value="edit" />
	<input type="hidden" name="bbsid" value="<?php echo $blog['id']?>" />
	<input type="hidden" name="author" value="<?php echo get_realname($_USER->id)?>" />
<table class="TableBlock" border="0" width="90%" align="center" style="border-bottom:#4686c6 solid 0px;">
		<tr>
			<td nowrap class="TableContent" width="90">发布时间：</td>
			  <td class="TableData">
					<?php echo $blog['date']?>				</td>  	  	
		</tr>
		<tr>
			<td nowrap class="TableContent" width="90">主题：</td>
			  <td class="TableData">
					<?php echo $blog['title']?>				</td>  	  	
		</tr>
		
		<tr>
      <td nowrap class="TableContent"> 发布人：</td>
      <td class="TableData"><?php echo get_realname($blog['uid'])?>     </td>
    </tr>
	<tr>
      <td valign="top" nowrap class="TableContent"> 内容：</td>
      <td class="TableData"><?php echo $blog['content']?></td>
    </tr>
	</table>	
	
	
	
<?php
$n=0;
global $db;

$query = $db->query("SELECT * FROM ".DB_TABLEPRE."bbs_log where bbsid='".$blog["id"]."' and type='9'   ORDER BY id Asc");
	while ($row = $db->fetch_array($query)) {
$n++;
?>
	
	<table width="90%" border="0" align="center" cellpadding="3" cellspacing="0" class="small" style='margin-top:10px;'>
  <tr>
    <td class="Big"><img src="template/default/content/images/notify_new.gif" align="absmiddle"><span class="big3"><?php echo $row['title']?></span>&nbsp;&nbsp;&nbsp;&nbsp;
	<span style="font-size:12px;">&nbsp;<span style="font-size:34px; font-weight:bold; color:#FF0000;"><?php echo $n?></span>&nbsp;楼&nbsp;&nbsp;
	<?php if($_USER->id==$row['uid']){?>
	<!--<a href="admin.php?ac=<?php echo $ac?>&fileurl=knowledge&do=views&view=del&id=<?php echo $row['id']?>&bbsid=<?php echo $blog['id']?>" style="font-size:12px;">删除</a> -->
	<? }?>
	</span>
    </td>
  </tr>
</table>
	
	<table class="TableBlock" border="0" width="90%" align="center" style="border-bottom:#4686c6 solid 0px;">
		<tr>
			<td nowrap class="TableContent" width="90">评论时间：</td>
			  <td class="TableData"><?php echo $row['enddate']?></td>  	  	
		</tr>
		
		<tr>
      <td nowrap class="TableContent"> 发布人：</td>
      <td class="TableData"><?php echo $row["author"]?></td>
    </tr>
	</table>	
	<table  width="90%" style="border-left:#4686c6 solid 1px;border-right:#4686c6 solid 1px;border-bottom:#4686c6 solid 1px;" align="center">
	<tr>
      <td colspan="2" bgcolor="#FFFFFF" style="padding:20px 20px 20px 20px;"><?php echo $row['content']?></td>
    </tr>
	</table>	
	
<?php
	}
?>







<table class="TableBlock" border="0" width="90%" align="center" style="border-bottom:#4686c6 solid 0px;margin-top:30px;">
		<tr>
			<td nowrap class="TableContent" width="90">评论主题：<? get_helps()?></td>
			  <td class="TableData">
					<input type="text" name="title" class="BigInput" style="width:368px;" size="20" value="回复:<?php echo $blog["title"]?>" />
				</td>  	  	
		</tr>
		
	
	</table>	
	<table  width="90%" style="border-left:#4686c6 solid 1px;border-right:#4686c6 solid 1px;" align="center">	
		<tr>
			<td nowrap class="TableContent" width="94" style="border-right:#cccccc solid 1px;">评论内容：</td>
			  <td class="TableData" style="padding-top:10px; padding-bottom:10px; padding-left:3px;">
<script>
        KE.show({
                id : 'content'
        });
</script>
		<textarea name="content" cols="70" rows="12" class="input" style="width:600px;height:200px;"></textarea>
			</td>
		</tr>
		</table>
  <table class="TableBlock" border="0" width="90%" align="center" style="border-top:#4686c6 solid 0px;">
		
		<tr align="center" class="TableControl">
			<td colspan="2" nowrap>
			<input type="Submit" value="发起评论" class="BigButtonBHover"></td>
	  </tr>
	 </table>

  
</form>

 
</body>
</html>
