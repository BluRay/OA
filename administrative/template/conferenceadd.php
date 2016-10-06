<html>
<head>
<title>信息添加编辑</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="template/default/content/css/style.css">
<script language="javascript" type="text/javascript" src="DatePicker/WdatePicker.js"></script>
<script charset="utf-8" src="eweb/kindeditor.js"></script>
</head>
<body class="bodycolor">
<table width="90%" border="0" align="center" cellpadding="3" cellspacing="0" class="small">
  <tr>
    <td class="Big"><img src="template/default/content/images/notify_new.gif" align="absmiddle"><span class="big3">会议信息<?php echo $_title['name']?></span>&nbsp;&nbsp;&nbsp;&nbsp;
	<span style="font-size:12px;">
	
	<a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>" style="font-size:12px;">返回列表页</a><img src="template/default/content/images/f_ico.png" align="absmiddle"></span>
    </td>
  </tr>
</table>
<script Language="JavaScript"> 
function CheckForm()
{
   if(document.save.startdate.value=="")
   { alert("开始时间不能为空！");
     document.save.startdate.focus();
     return (false);
   }
   if(document.save.enddate.value=="")
   { alert("结束时间不能为空！");
     document.save.enddate.focus();
     return (false);
   }
   <? if($user['id']==''){?>
   if(document.save.appperson.value=="")
   { alert("申请人不能为空！");
     document.save.appperson.focus();
     return (false);
   }
   if(document.save.recorduser.value=="")
   { alert("会议记录员不能为空！");
     document.save.recorduser.focus();
     return (false);
   }
   <? }?>
   if(document.save.participation.value=="")
   { alert("出席人员不能为空！");
     document.save.participation.focus();
     return (false);
   }
   <? if($user['id']==''){?>
   if(document.save.staffid.value=="")
   { alert("审批人员不能为空！");
     document.save.staffid.focus();
     return (false);
   }
   <? }?>
   if(document.save.title.value=="")
   { alert("会议名称不能为空！");
     document.save.title.focus();
     return (false);
   }
   if(document.save.content.value=="")
   { alert("描述不能为空！");
     document.save.content.focus();
     return (false);
   }
   if(document.save.conferenceroom.value=="")
   { alert("会议室不能为空！");
     document.save.conferenceroom.focus();
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
      <td nowrap class="TableContent" width="100"> 开始时间：<? get_helps()?></td>
      <td class="TableData">
	  日期：<input type="text" name="startdate" class="BigInput" size="20"  onClick="WdatePicker();" value="<?php echo $startdate[0]?>" />		时间：
			  <select name="starttime1" class="BigStatic">
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
		      </select>点
			  <select name="starttime2" class="BigStatic">
			    <option value="0" selected="selected"></option>
				<?php
				for($i=0;$i<=59;$i++){
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
      <td nowrap class="TableContent"> 结束时间：<? get_helps()?></td>
      <td class="TableData">
日期：<input type="text" name="enddate" class="BigInput" size="20" onClick="WdatePicker();" value="<?php echo $enddate[0]?>" />		时间：
			  <select name="endtime1" class="BigStatic">
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
		      </select>点
			  <select name="endtime2" class="BigStatic">
			    <option value="0" selected="selected"></option>
				<?php
				for($i=0;$i<=59;$i++){
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
	<?if($user['id']==''){?>
	<tr>
      <td nowrap class="TableContent" width="100"> 申请人：<? get_helps()?></td>
      <td class="TableData">
	  <?php
	  get_pubuser(1,"appperson","","+选择申请人",60,20)
	  ?>
	  &nbsp;&nbsp;&nbsp;&nbsp;<?php get_smsbox("申请人","appperson")?>
			</td>
    </tr>
	
	<tr>
      <td nowrap class="TableContent" width="100"> 会议记录人员：<? get_helps()?></td>
      <td class="TableData">
	  <?php
	  get_pubuser(1,"recorduser","","+选择记录员",60,20)
	  ?>
			</td>
    </tr>
	<?}?>
	
	<tr>
      <td nowrap class="TableContent" width="100"> 出席人员：<? get_helps()?></td>
      <td class="TableData">
	  <?php
	  get_pubuser(2,"participation",$user['attendance'],"+选择出席人",60,4)
	  ?>
	  <?if($user['id']==''){?>
	  <br>
	  <?php get_smsbox("出席人员","participation")?>
	  <?}?>
	  </td>
    </tr>
	<?if($user['id']==''){?>
	<tr>
      <td nowrap class="TableContent" width="100"> 审批人员：<? get_helps()?></td>
      <td class="TableData">	
	 <?php
	  get_pubuser(1,"staffid","","+选择审批人",60,20)
	  ?>
	  &nbsp;&nbsp;&nbsp;&nbsp;<?php get_smsbox("审批人","staffid")?>
	 </td>
    </tr>

	<?}?>
	 <tr>
      <td nowrap class="TableContent"> 会议名称：<? get_helps()?></td>
      <td class="TableData">
	   <input name="title" type="text" class="BigInput" id="title" value="<?php echo $user['title']?>" size="60" />
      </td>
    </tr>
	<tr>
      <td nowrap class="TableContent"> 会议主题：</td>
      <td class="TableData">
	   <input name="subject" type="text" class="BigInput" id="subject" value="<?php echo $user['subject']?>" size="60" />
      </td>
    </tr>
	
	
	 <tr>
      <td nowrap class="TableContent" width="100"> 会议室：<? get_helps()?></td>
      <td class="TableData">
	   <select name="conferenceroom" id="conferenceroom" class="BigStatic">
			<option value=" " selected="selected">默认会议室</option>
			<?php echo get_typelist($user['conferenceroom'],1)?>
		</select></td>
    </tr>
	<tr>
      <td nowrap class="TableContent"> 会议类别：</td>
      <td class="TableData">
	   <select name="otype" class="BigStatic">
			<option value=" " selected="selected">默认会议类别</option>
			<?php echo get_typelist($user['otype'],2)?>
	  </select></td>
    </tr>
		
	
	</table>	
	<table  width="90%" style="border-left:#4686c6 solid 1px;border-right:#4686c6 solid 1px;" align="center">	
		<tr>
			<td nowrap class="TableContent" width="104" style="border-right:#cccccc solid 1px;">描述：<? get_helps()?></td>
			  <td class="TableData" style="padding-top:10px; padding-bottom:10px; padding-left:3px;">
			  
			  <script>
        KE.show({
                id : 'content'
        });
</script>
				<textarea name="content" rows="5" cols="60" style="width:600px;height:300px;"><?php echo $user['content']?></textarea>
			</td>
		</tr>
		</table>
  <table class="TableBlock" border="0" width="90%" align="center" style="border-top:#4686c6 solid 0px;">
		
		<tr align="center" class="TableControl">
			<td colspan="2" nowrap>
			<input type="button" value="保存" class="BigButtonBHover" onClick="sendForm();">&nbsp;	    </td>
	  </tr>
	 </table>
  
</form>

 
</body>
</html>
