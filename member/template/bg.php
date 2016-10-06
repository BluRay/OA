<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html>
<head>
<title>信息添加编辑</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="template/default/content/css/style.css">

</head>
<body class="bodycolor">
<table width="90%" border="0" align="center" cellpadding="3" cellspacing="0" class="small">
  <tr>
    <td class="Big"><img src="template/default/content/images/notify_new.gif" align="absmiddle"><span class="big3"> 桌面背景设置</span>&nbsp;&nbsp;&nbsp;&nbsp;
	<span style="float:right; margin-right:50px;">
	<a href="home.php?mid=<?php echo $_GET['mid']?>" style="font-size:12px;"><<返回桌面</a>
	</span>
    </td>
  </tr>
</table>
<script Language="JavaScript"> 
function CheckForm()
{
   if(document.save.bg.value=="")
   { alert("背景不能为空！");
     document.save.bg.focus();
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
<form name="save" method="post" action="?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&do=bg">
<input type="hidden" name="view" value="edit" />
<table class="TableBlock" border="0" width="90%" align="center">
  	<tr>
  		<td nowrap class="TableHeader">壁纸</td> 	  	
	</tr>
 </table>
 <table class="TableBlock" border="0" width="90%" align="center">
  	<tr>
	<?php 
	for($i=1;$i<=20;$i++){
	?>
  	  <td align="center" valign="middle" style="height:105px;">
  	    <a href="?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&do=bg&view=edit&value=template/default/bg/01/<?php echo $i?>.jpg&mid=<?php echo $_GET['mid']?>" title="点击将背景设为桌面"><img src="template/default/bg/01/thumb_<?php echo $i?>.jpg" width="200" height="84" border="0" /></a> </td>  
	<?php
	if($i%5==0){
		echo '</tr><tr>';
	}
	}
	?>	  	
	</tr>
 </table>
 <table class="TableBlock" border="0" width="90%" align="center">
  	<tr>
  		<td nowrap class="TableHeader">汽车</td> 	  	
	</tr>
 </table>
 <table class="TableBlock" border="0" width="90%" align="center">
  	<tr>
	<?php 
	for($i=1;$i<=20;$i++){
	?>
  	  <td align="center" valign="middle" style="height:105px;">
  	    <a href="?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&do=bg&view=edit&value=template/default/bg/02/<?php echo $i?>.jpg&mid=<?php echo $_GET['mid']?>" title="点击将背景设为桌面"><img src="template/default/bg/02/thumb_<?php echo $i?>.jpg" width="200" height="84" border="0" /></a> </td>  
	<?php
	if($i%5==0){
		echo '</tr><tr>';
	}
	}
	?>	  	
	</tr>
 </table>
 <table class="TableBlock" border="0" width="90%" align="center">
  	<tr>
  		<td nowrap class="TableHeader">美女</td> 	  	
	</tr>
 </table>
 <table class="TableBlock" border="0" width="90%" align="center">
  	<tr>
	<?php 
	for($i=1;$i<=20;$i++){
	?>
  	  <td align="center" valign="middle" style="height:105px;">
  	    <a href="?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&do=bg&view=edit&value=template/default/bg/03/<?php echo $i?>.jpg&mid=<?php echo $_GET['mid']?>" title="点击将背景设为桌面"><img src="template/default/bg/03/thumb_<?php echo $i?>.jpg" width="200" height="84" border="0" /></a> </td>  
	<?php
	if($i%5==0){
		echo '</tr><tr>';
	}
	}
	?>	  	
	</tr>
 </table>  
</form>

 
</body>
</html>
