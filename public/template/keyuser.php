<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
<link rel="stylesheet" type="text/css" href="template/default/content/css/style.css">
<title>信息选择</title>
<script type="text/javascript"> 
function infovalue(vid,title)
{
   window.opener.document.save.<?php echo $_GET['name']?>.value=title;
   window.opener.document.save.<?php echo $_GET['id']?>.value=vid;
}
</script>
</head>
<body>

<table width="95%" border="0" align="center" cellpadding="3" cellspacing="0" class="small">
 <form method="get" action="admin.php" name="save" >
		<input type="hidden" name="ac" value="<?php echo $ac?>" />
		<input type="hidden" name="fileurl" value="<?php echo $fileurl?>" />
		<input type="hidden" name="un" value="<?php echo $un?>" />
  <tr>
    <td class="Big" style="padding-left:10px;">
	<div id="navMenu">姓名：<input type="text" value="<?php echo urldecode($name)?>" name="name" style='width:160px;' class="BigInput">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" class="ui-button-text"id="J-submit-time" value="搜 索"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="确认选择" class="BigButtonBHover" onClick="javascript:actForm.submit();"></div>
    </td>
  </tr>
  </form>
</table>


	 <table class="TableBlock" border="0" width="98%" align="center">
	 <form method="post" name="actForm" action="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&do=add" style="margin-top:0px;">
	   	 
	   <tr>
			<td nowrap class="TableHeader" width="10%">选项</td>
			  <td width="40%" class="TableHeader">姓名</td>
			<td nowrap class="TableHeader" width="10%">选项</td>
			  <td width="40%" class="TableHeader">姓名</td>
       </tr>
		<tr>
		<?php
		$i=0;
		foreach ($result as $row) {
		$i++;
		?>	
      <td nowrap class="TableContent">
	  <input name="uid[]" type="checkbox" class="checkbox" value="<?php echo $row['id']?>" <?php if(sizeof(explode($row['name'],$_GET['un']))>1){?>checked="checked"<?php }?> /></td>
      <td class="TableData"><?php echo $row['name']?></td>
     
      
	<?php
	if($i%2==0){
		echo '</tr><tr>';
	}
	}
	?>
	</tr>
			
	</form>		
  </table>
  

</body>
</html>

