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
    <td class="Big"><img src="template/default/content/images/notify_new.gif" align="absmiddle"><span class="big3">日程信息<?php echo $_title['name']?></span>&nbsp;&nbsp;&nbsp;&nbsp;
	<span style="font-size:12px;">
	
	<a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>" style="font-size:12px;">返回列表页</a><img src="template/default/content/images/f_ico.png" align="absmiddle"></span>
    </td>
  </tr>
</table>
<script Language="JavaScript"> 
function CheckForm()
{
   if(document.save.startdate.value=="")
   { alert("开始日期不能为空！");
     document.save.startdate.focus();
     return (false);
   }
   if(document.save.enddate.value=="")
   { alert("结束日期不能为空！");
     document.save.enddate.focus();
     return (false);
   }
   if(document.save.title.value=="")
   { alert("事务主题不能为空！");
     document.save.title.focus();
     return (false);
   }
   if(document.save.content.value=="")
   { alert("事务内容不能为空！");
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
<form name="save" method="post" action="?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&do=add">
	<input type="hidden" name="view" value="edit" />
	<input type="hidden" name="id" value="<?php echo $user['id']?>" />
	 <table class="TableBlock" border="0" width="90%" align="center" style="border-bottom:#4686c6 solid 0px;">
	 
    <tr>
      <td nowrap class="TableContent" width="100"> 开始日期：<? get_helps()?></td>
      <td class="TableData">
	  <input type="text" name="startdate" class="BigInput" size="15" value="<?php echo $startdate[0]?>" onClick="WdatePicker();"/> 时间：<select name="starth">
			    <option value="0" selected="selected"></option>
			    <?php
				for($i=1;$i<=23;$i++){
				if (strlen($i)<2){
				$j="0".$i;
				}else{
				$j=$i;
				}
				?>
				<option value="<?php echo $j?>" <?php if($starttime[0]==$j){?>selected="selected"<?php }?>><?php echo $j?></option>
				<?php } ?>
				</select>
				点
				：<select name="starti">
			    <option value="0" selected="selected"></option>
			    <?php
				for($i=1;$i<=59;$i++){
				if (strlen($i)<2){
				$j="0".$i;
				}else{
				$j=$i;
				}
				?>
				<option value="<?php echo $j?>" <?php if($starttime[1]==$j){?>selected="selected"<?php }?>><?php echo $j?></option>
				<?php } ?>
				</select>分	</td>
    </tr>
	<tr>
			<td nowrap class="TableContent" width="100">结束日期：<? get_helps()?></td>
			  <td class="TableData">
					<input type="text" name="enddate" class="BigInput" size="15" value="<?php echo $enddate[0]?>" onClick="WdatePicker();"/> 时间：<select name="endh">
			    <option value="0" selected="selected"></option>
			    <?php
				for($i=1;$i<=23;$i++){
				if (strlen($i)<2){
				$j="0".$i;
				}else{
				$j=$i;
				}
				?>
				<option value="<?php echo $j?>" <?php if($endtime[0]==$j){?>selected="selected"<?php }?>><?php echo $j?></option>
				<?php } ?>
				</select>
				点
				：<select name="endi">
			    <option value="0" selected="selected"></option>
			    <?php
				for($i=1;$i<=59;$i++){
				if (strlen($i)<2){
				$j="0".$i;
				}else{
				$j=$i;
				}
				?>
				<option value="<?php echo $j?>" <?php if($endtime[1]==$j){?>selected="selected"<?php }?>><?php echo $j?></option>
				<?php } ?>
				</select>分
				</td>  	  	
		</tr>
		<tr>
			<td nowrap class="TableContent" width="100">事务主题：<? get_helps()?></td>
			  <td class="TableData">
					<input type="text" class="BigInput" name="title" value="<?php echo $user['title']?>" size=50 >
				</td>  	  	
		</tr>
	
		<tr>
      <td nowrap class="TableContent"> 事务设置：</td>
      <td class="TableData">
	  <input name="type" type="radio" style="border:0;" value="私人" <? if($user['type']=='私人'){?>checked="checked"<? }?> />
      私人
			<input name="type" type="radio" style="border:0;" value="公开" <? if($user['type']=='公开'){?>checked="checked"<? }?> />
			公开	
      </td>
    </tr>
	
	<tr>
      <td nowrap class="TableContent" width="100"> 事务内容：<? get_helps()?></td>
      <td class="TableData"><textarea name="content" cols="70" rows="5" class="BigInput"><?php echo $user['content']?></textarea> </td>
    </tr>
		
	
	
		
		<tr align="center" class="TableControl">
			<td colspan="2" nowrap>
			<input type="button" value="保存" class="BigButtonBHover" onClick="sendForm();">&nbsp;	    </td>
	  </tr>
	 </table>
  
</form>

 
</body>
</html>
