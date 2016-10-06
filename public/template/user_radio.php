<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
<link rel="stylesheet" type="text/css" href="template/default/content/css/style.css">
<title>人员选择</title>
 
</head>
<body>

<table width="95%" border="0" align="center" cellpadding="3" cellspacing="0" class="small">
  <tr>
    <td class="Big" style="padding-left:10px;"><img src="template/default/content/images/notify_new.gif" align="absmiddle"><span class="big3">人员选择</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style=" margin-left:230px;"><input type="button" value="确认选择" class="BigButtonBHover" onClick="javascript:actForm.submit();"></span>
    </td>
  </tr>
</table>
<form method="post" name="actForm" action="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&do=add">
  <input type="hidden" name="inputname" value="<?php echo $_GET[inputname]?>">	 
	 <table class="TableBlock" border="0" width="98%" align="center">
		<tr>
			<td nowrap class="TableHeader" width="30"></td>
			  <td width="100" class="TableHeader">姓名</td>
			  <td class="TableHeader">岗位</td>
			  <td width="100" align="center" class="TableHeader">手机</td>
	    </tr>
		<?foreach ($result as $row) {?>
		<input type="hidden" name="oaid<?php echo $row['vid']?>" value="<?php echo $row['uid']?>" />
		<input type="hidden" name="oaname<?php echo $row['vid']?>" value="<?php echo $row['name']?>" />
		<input type="hidden" name="oaphone<?php echo $row['vid']?>" value="<?php echo $row['phone']?>" />
			<tr>
      <td nowrap class="TableContent">
	  <input type="radio" name="vid[]" value="<?php echo $row['vid']?>" style="border:0px;" /></td>
      <td class="TableData"><?php echo $row['name']?></td>
      <td class="TableData"><?php echo get_postname($row['positionid'])?></td>
      <td align="center" class="TableData"><?php echo $row['phone']?></td>
      </tr>
	<?}?>
	
			
		
  </table>
  
</form>	
</body>
</html>

