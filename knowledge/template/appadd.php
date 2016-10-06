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
    <td class="Big"><img src="template/default/content/images/notify_new.gif" align="absmiddle"><span class="big3"> 投票信息<?php echo $_title['name']?></span>&nbsp;&nbsp;&nbsp;&nbsp;
	<span style="font-size:12px;">
	
	<a href="admin.php?ac=app&fileurl=knowledge" style="font-size:12px;">返回列表页</a><img src="template/default/content/images/f_ico.png" align="absmiddle"></span>
    </td>
  </tr>
</table>
<script Language="JavaScript"> 
function CheckForm()
{
   if(document.save.title.value=="")
   { alert("主题不能为空！");
     document.save.title.focus();
     return (false);
   }
   
   return true;
}
function sendForm()
{
   if(CheckForm())
      document.save.submit();
}
var rowtypedata = [
	[ [5, '<div>选项：<input name="new_option[]" type="text" class="BigInput" value="" size="60" />   <a href="javascript:;" style="font-size:12px;" onClick="deleterow(this)">删除此项</a></div>']],
];
</script>

<form name="save" method="post" action="?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&do=add">
	<input type="hidden" name="view" value="edit" />
	<input type="hidden" name="id" value="<?php echo $user['id']?>" />
	 <table class="TableBlock" border="0" width="90%" align="center">
		<tr>
			<td nowrap class="TableContent" width="90">主题：<? get_helps()?></td>
			  <td class="TableData">
					<input type="text" class="BigInput" name="title" value="<?php echo $user['title']?>" size=50 >
				</td>  	  	
		</tr>
		
		<tr>
			<td nowrap class="TableContent">描述：</td>
			  <td class="TableData">
				<textarea name="content" rows="5" cols="60"><?php echo $user['content']?></textarea>
			</td>
		</tr>
		
		<tr>
			<td nowrap class="TableContent">允许投票人员：<? get_helps()?></td>
		  <td class="TableData">
			<?php
		  get_pubuser(2,"user",$user['user'],"+选择投票人员",40,4)
		  ?>
			</td>	  	
		</tr>
		
		<tr>
			<td nowrap class="TableContent">投票截止日期：<? get_helps()?></td>
		  <td class="TableData">
			<input type="text" name="enddate" class="BigInput" style="width:180px;" size="15" value="<?php echo $enddate[0]?>" onClick="WdatePicker();"/> 
			时间：
			<select name="endh">
					
					<?php
					for($i=1;$i<=23;$i++){
					if (strlen($i)<2){
					$j="0".$i;
					}else{
					$j=$i;
					}
					?>
					<option value="<?php echo $j?>" <?php if($endh[0]==$j){?>selected="selected"<?php }?>><?php echo $j?></option>
					<?php } ?>
					</select>
					点
					：
					<select name="endi">
				   
					<?php
					for($i=1;$i<=59;$i++){
					if (strlen($i)<2){
					$j="0".$i;
					}else{
					$j=$i;
					}
					?>
					<option value="<?php echo $j?>" <?php if($endh[1]==$j){?>selected="selected"<?php }?>><?php echo $j?></option>
					<?php } ?>
					</select>
			分</td>	  	
		</tr>
		
		<tr>
			<td nowrap class="TableContent">设置投票选项：<? get_helps()?></td>
		  <td class="TableData">
		 
		   <table width="100%">
		   <?php if($id!=''){?>
		   <?foreach ($result as $row) {?>
		   <input type="hidden" name="option_id[]" value="<?php echo $row['id']?>" />
			<tr>
				<td  height="30" colspan="7">	  
					选项：<input name="option[<?php echo $row['id']?>]" type="text" class="BigInput" value="<?php echo $row['title']?>" size="60" />
				</td>
			</tr>
			<?}?>
			<?php }else{?>
				<tr>
					<td  height="30" colspan="7">	  
						选项：<input name="option" type="text" class="BigInput" value="" size="60" />
					</td>
				</tr>
			<?php }?>
		   
	
				<tr><td colspan="7"><div><a href="###" onClick="addrow(this, 0)" class="addtr">+增加更多选项</a></div></td></tr>
				</table>
		  
		  
			</td>	  	
		</tr>
		
		
		
		<tr align="center" class="TableControl">
			<td colspan="2" nowrap>
			<input type="button" value="保存" class="BigButtonBHover" onClick="sendForm();">&nbsp;	    </td>
	  </tr>
	 </table>
  
</form>

 
</body>
</html>
