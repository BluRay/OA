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
    <td class="Big"><img src="template/default/content/images/notify_new.gif" align="absmiddle"><span class="big3">奖惩信息<?php echo $_title['name']?></span>&nbsp;&nbsp;&nbsp;&nbsp;
	<span style="font-size:12px;">
	
	<a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>" style="font-size:12px;">返回列表页</a><img src="template/default/content/images/f_ico.png" align="absmiddle"></span>
    </td>
  </tr>
</table>
<script Language="JavaScript"> 
function CheckForm()
{
   if(document.save.user.value=="")
   { alert("单位员工不能为空！");
     document.save.user.focus();
     return (false);
   }
   if(document.save.project.value=="")
   { alert("奖惩项目不能为空！");
     document.save.project.focus();
     return (false);
   }
   if(document.save.rewardsdate.value=="")
   { alert("奖惩日期不能为空！");
     document.save.rewardsdate.focus();
     return (false);
   }
   if(document.save.rewardskey.value=="")
   { alert("奖惩属性不能为空！");
     document.save.rewardskey.focus();
     return (false);
   }
   if(document.save.price.value=="")
   { alert("奖惩金额不能为空！");
     document.save.price.focus();
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
			<td nowrap class="TableContent" width="100">单位员工：<? get_helps()?></td>
			  <td class="TableData"><?php
	  get_pubuser(1,"user",$user['user'],"+选择人员",70,20)
	  ?></td>
			  <td class="TableContent" width="100">奖惩项目：<? get_helps()?></td>
			  <td class="TableData">
				<select name="project" class="BigStatic">
			<option value="0" selected="selected">请选择项目</option>
			<?php echo get_typelist($user['project'],19)?>
			</select></td>  	  	
		</tr>
		<tr>
			<td nowrap class="TableContent" width="100">奖惩日期：<? get_helps()?></td>
			  <td class="TableData"><input type="text" name="rewardsdate" class="BigInput" style="width:168px;" size="20" value="<?php echo $user['rewardsdate']?>" onClick="WdatePicker();" /></td>
			  <td class="TableContent" width="100">工资月份：</td>
			  <td class="TableData">
      <select name="wagesmonth_year" class="BigStatic">
			    <?php
				for($i=get_date('Y',PHP_TIME)-5;$i<=get_date('Y',PHP_TIME)+5;$i++){
				if (strlen($i)<2){
				$j="0".$i;
				}else{
				$j=$i;
				}
				?>
				<option value="<?php echo $j?>" <?php if($startdate[0]==$j){?>selected="selected"<?php }?>><?php echo $j?></option>
				<?php } ?>
				</select>年<select name="wagesmonth_month" class="BigStatic">
			    <?php
				for($i=1;$i<=12;$i++){
				if (strlen($i)<2){
				$j="0".$i;
				}else{
				$j=$i;
				}
				?>
				<option value="<?php echo $j?>" <?php if($startdate[1]==$j){?>selected="selected"<?php }?>><?php echo $j?></option>
				<?php } ?>
				</select>月</td>  	  	
		</tr>
		
		
		<tr>
			<td nowrap class="TableContent" width="100">奖惩属性：<? get_helps()?></td>
			  <td class="TableData"><input name="rewardskey" type="radio" value="1" <?php if($user['rewardskey']=='1'){?>checked<?php }?> />奖励
	  <input name="rewardskey" type="radio" value="2" <?php if($user['rewardskey']=='2'){?>checked<?php }?> />惩罚</td>
			  <td class="TableContent" width="100">奖惩金额：<? get_helps()?></td>
			  <td class="TableData">
      <input type="text" name="price" class="BigInput" size="15" value="<?php echo $user['price']?>" onKeyUp="value=value.replace(/[^0-9^.]/g,'');" /> RMB</td>  	  	
		</tr>
		
		
		<tr>
			<td nowrap class="TableContent" width="100">备注：</td>
			  <td colspan="3" class="TableData"><textarea name="content" cols="60" rows="4" class="BigInput"><?php echo $user['content']?></textarea></td>
	    </tr>
		
		
	
		
	
		
		<tr align="center" class="TableControl">
			<td colspan="4" nowrap>
			<input type="button" value="保存" class="BigButtonBHover" onClick="sendForm();">&nbsp;	    </td>
	  </tr>
  </table>
  
</form>

 
</body>
</html>
