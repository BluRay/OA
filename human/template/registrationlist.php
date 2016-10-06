<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html>
<head>
<title>信息添加编辑</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="template/default/content/css/style.css">
<script language="javascript" type="text/javascript" src="DatePicker/WdatePicker.js"></script>
<script language="javascript" type="text/javascript" src="template/default/js/jquery.min.js"></script>
<script language="javascript" type="text/javascript" src="template/default/content/js/common.js"></script>
</head>
<body class="bodycolor">
<div id="navPanel">
<form method="get" action="admin.php" name="topSearchForm"  style=" margin-top:3px;">
		<input type="hidden" name="ac" value="<?php echo $ac?>" />
		<input type="hidden" name="do" value="list" />
		<input type="hidden" name="fileurl" value="<?php echo $fileurl?>" />
	姓名： <?php
		  get_pubuser(1,"user",$user,"+选择人员",70,18)
		  ?>&nbsp;&nbsp;
	考勤周期： <input type="text" value="<?php echo $vstartdate?>"  style="width:80px;"  readonly="readonly"  onClick="WdatePicker();" name='vstartdate' > - <input type="text" value="<?php echo $venddate?>"  style="width:80px;"  readonly="readonly"  onClick="WdatePicker();" name='venddate' >&nbsp;&nbsp;	
		<a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&ischeck=1" seed="CR-today" style="<?php if($ischeck==1){ ?>color:#FF0000;<?php }?> margin-left:8px;">今天</a>
		<a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&ischeck=2" seed="CR-sevenday" style="<?php if($ischeck==2){ ?>color:#FF0000;<?php }?> margin-left:8px;">昨天</a>
		<a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&ischeck=3" seed="CR-month" style="<?php if($ischeck==3){ ?>color:#FF0000;<?php }?> margin-left:8px;">7天以内</a>
		<a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&ischeck=4" seed="CR-month" style="<?php if($ischeck==4){ ?>color:#FF0000;<?php }?> margin-left:8px;" >1个月内</a>
		<a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&ischeck=5" seed="CR-month" style="<?php if($ischeck==5){ ?>color:#FF0000;<?php }?> margin-left:8px;" >6个月内</a>&nbsp;&nbsp;<input
	type="submit" value="查 询" class="SmallButton" />


 </form>
</div>

	 <table width="90%" border="0" align="center" cellpadding="3" cellspacing="0" class="small">
  <tr>
    <td class="Big"><img src="template/default/content/images/notify_new.gif" align="absmiddle"><span class="big3">所有考勤记录</span>
    </td>
  </tr>
</table>
<form name="update" method="post" action="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>">
		<input type="hidden" name="do" value="update" />
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
      <td nowrap class="TableContent"><input type="checkbox" name="id[]" value="<?php echo trim($row['id'])?>" class="checkbox" /></td>
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
			<td colspan="7" align="left" nowrap>
			  <input type="checkbox" class="checkbox" value="1" name="chkall" onClick="check_all(this)" /> 全选
						  &nbsp;&nbsp;&nbsp;&nbsp;
						  <img src="template/default/content/images/ico-1.png" align="absmiddle">
						  <a href="javascript:document:update.submit();">清理数据</a>
						  &nbsp;&nbsp;
						  <?php echo get_exceldown('excel_25')?>
			<?php echo showpage($num,$pagesize,$page,$url)?> 
	  </td>
	  </tr>
	</table>
  
</form>
 <form name="excel" method="post" action="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>">
		<input type="hidden" name="do" value="excel" />
		<input type="hidden" name="user" value="<?php echo $user?>" />
		<input type="hidden" name="vstartdate" value="<?php echo $vstartdate?>" />
		<input type="hidden" name="venddate" value="<?php echo $venddate?>" />
		<input type="hidden" name="ischeck" value="<?php echo $ischeck?>" />		
		</form>
</body>
</html>
