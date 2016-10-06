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
    <td class="Big"><img src="template/default/content/images/notify_new.gif" align="absmiddle"><span class="big3">在线考勤</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<span style="font-size:12px;"><input type="button" value="在线打卡" class="BigButtonBHover" onClick="javascript:document:addds.submit();">&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="提交备注" class="BigButtonBHover" onClick="javascript:document:update.submit();"></span>
    </td>
  </tr>
</table>

<form name="update" method="post" action="?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&do=update">
	<input type="hidden" name="rid" value="<?php echo $rows['id']?>" />
	 <table class="TableBlock" border="0" width="90%" align="center" style="border-bottom:#4686c6 solid 0px;">
	<?php
	$sql = "SELECT * FROM ".DB_TABLEPRE."registration_log where rid='".$rows['id']."' order by lid asc";
	$query = $db->query($sql);
	while ($row = $db->fetch_array($query)) {
	?>
	<input type="hidden" name="lid[]" value="<?php echo $row['lid']?>"/></
		<tr>
			<td nowrap class="TableControl" colspan="4"><b>&nbsp;打卡时间:</b> <span style="color:#FF0000;"><?php echo $row['hour']?></span></td> 	  	
		</tr>
		<tr>
      <td nowrap class="TableContent" width="12%"> 状态：</td>
      <td width="18%" class="TableData">
	  <?php
	  if($row['type']=='1'){
		  echo '迟到';
	  }elseif($row['type']=='2'){
		  echo '早退';
	  }elseif($row['type']=='0'){
		  echo '正常';
	  }else{
		  echo '未打卡';
	  }
	  ?></td>
      <td class="TableContent" width="11%">备注</td>
      <td width="59%" class="TableData"><input type="text" class="BigInput" name="note[<?php echo $row['lid']?>]" value="<?php echo $row['note']?>" size=50 ></td>
    </tr>
	<?php }?>

	 </table>
	 <table width="90%" border="0" align="center" cellpadding="3" cellspacing="0" class="small">
  <tr>
    <td class="Big"><img src="template/default/content/images/notify_new.gif" align="absmiddle"><span class="big3">历史考勤记录</span>
    </td>
  </tr>
</table>
	 
	 <table class="TableBlock" border="0" width="90%" align="center" style="border-bottom:#4686c6 solid 0px;">
		<tr>
			<td nowrap class="TableHeader" width="30"></td>
			  <td width="90" align="center" class="TableHeader">日期</td>
			  <td class="TableHeader" width="120">姓名</td>
			  <td class="TableHeader" width="180">工作时间</td>
			  <td class="TableHeader">签到记录</td>
			    	  	
		</tr>
	<?foreach ($result as $row) {?>
		<tr>
      <td nowrap class="TableContent"><?php echo get_boxlistkey("id[]",$row['id'],$row['uid'],$_USER->id)?></td>
      <td align="center" class="TableData"><?php echo $row['date']?></td>
      <td class="TableData"><?php echo $row['name']?></td>
      <td class="TableData">
	  <?php 
	  echo $swork.' - '.$ework;
	  echo '<br>';
	  if($sworknum=='0'){
		  echo $swork1.' - '.$ework1;
	  }
	  ?>
	  </td>
      <td>
	  <table class="TableBlock" border="0" width="100%" align="center">
	  <tr>
      <td nowrap class="TableContent" width="12%"> 状态</td>
      <td width="18%" class="TableContent">打卡时间
	  </td>
      <td class="TableContent" width="11%">备注</td>
    </tr>
	<?php
	$sql1 = "SELECT * FROM ".DB_TABLEPRE."registration_log where rid='".$row['id']."' order by lid asc";
	$query = $db->query($sql1);
	while ($rss = $db->fetch_array($query)) {
	?>
	<tr>
      <td nowrap class="TableData" width="15%">
	  <?php
	  if($rss['type']=='1'){
		  echo '迟到';
	  }elseif($rss['type']=='2'){
		  echo '早退';
	  }elseif($rss['type']=='0'){
		  echo '正常';
	  }else{
		  echo '未打卡';
	  }
	  ?></td>
      <td width="18%" class="TableData"><?php echo $rss['hour']?>
	  </td>
      <td class="TableData"><?php echo $rss['note']?></td>
    </tr>
		
	<?php }?>

	 </table>
	  
	  </td>
    
    </tr>
	<?}?>
	<tr align="center" class="TableControl">
			<td colspan="7" nowrap>
			<?php echo showpage($num,$pagesize,$page,$url)?>
			</td>
	  </tr>
	</table>
  
</form>
<form name="addds" method="post" action="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>">
<input type="hidden" name="do" value="add" />
</form>
 
</body>
</html>
