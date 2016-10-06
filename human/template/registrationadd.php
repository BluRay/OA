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
    <td class="Big"><img src="template/default/content/images/notify_new.gif" align="absmiddle"><span class="big3">考勤信息<?php echo $_title['name']?></span>&nbsp;&nbsp;&nbsp;&nbsp;
	<span style="font-size:12px;">
	
	<a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>" style="font-size:12px;">返回列表页</a><img src="template/default/content/images/f_ico.png" align="absmiddle"></span>
    </td>
  </tr>
</table>
<script Language="JavaScript"> 
function CheckForm()
{
   if(document.save.user.value=="")
   { alert("考勤人员不能为空！");
     document.save.user.focus();
     return (false);
   }
   if(document.save.startdate.value=="")
   { alert("上班时间不能为空！");
     document.save.startdate.focus();
     return (false);
   }
   if(document.save.enddate.value=="")
   { alert("下班时间不能为空！");
     document.save.enddate.focus();
     return (false);
   }
   if(document.save.date.value=="")
   { alert("考勤日期不能为空！");
     document.save.date.focus();
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
			<td nowrap class="TableContent" width="100">考勤人员：<? get_helps()?></td>
			  <td class="TableData"><?php
						  get_pubuser(1,"user",$user['name'],"+选择人员",70,20)
						  ?></td>
			<td class="TableContent" width="100">考勤时间：<? get_helps()?></td>
			  <td class="TableData">
					<input type="text" value="<?php echo $user['date']?>"  class="ui-input i-date" readonly="readonly" style="width:180px;"  onClick="WdatePicker();" name='date' >
				</td>  	
	    </tr>
		
		<tr>
			<td nowrap class="TableContent" width="100">上班时间：<? get_helps()?></td>
			  <td class="TableData"><input type="text" name="startdate" class="BigInput" size="15" value="<?php echo $startdate[0]?>" onClick="WdatePicker();"/> 时间：<select name="starth">
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
			  <td class="TableContent" width="100">下班时间:<? get_helps()?></td>
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
				</select>分</td>  	  	
		</tr>
		
		<tr>
			<td nowrap class="TableContent" width="100">迟到原因：</td>
			  <td class="TableData"><textarea name="startnote" cols="30" rows="5" class="BigInput"><?php echo $user['startnote']?></textarea>			</td>
			  <td class="TableContent" width="100">早退原因：</td>
			  <td class="TableData">
					<textarea name="endnote" cols="30" rows="5" class="BigInput"><?php echo $user['endnote']?></textarea></td>  	  	
		</tr>
		
		<tr>
			<td nowrap class="TableContent" width="100">迟到状态：<? get_helps()?></td>
			  <td class="TableData">
			  <input name="startyype" type="radio" style="border:0;" value="0" <? if($user['startyype']=='0'){?>checked="checked"<? }?> />
      正常
			<input name="startyype" type="radio" style="border:0;" value="1" <? if($user['startyype']=='1'){?>checked="checked"<? }?> />
			迟到
				
      
			  </td>
			  <td class="TableContent" width="100">早退状态：<? get_helps()?></td>
			  <td class="TableData">
					<input name="endtype" type="radio" style="border:0;" value="0" <? if($user['startyype']=='0'){?>checked="checked"<? }?> />
      正常
			<input name="endtype" type="radio" style="border:0;" value="1" <? if($user['startyype']=='1'){?>checked="checked"<? }?> />
			早退
				</td>  	  	
		</tr>
		
		<tr align="center" class="TableControl">
			<td colspan="4" nowrap>
			<input type="button" value="保存" class="BigButtonBHover" onClick="sendForm();">&nbsp;	    </td>
	  </tr>
  </table>
  
</form>

 
</body>
</html>
