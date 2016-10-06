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
<body class="bodycolor" <?php if($user['id']!='' && $user['type']=='部门'){?>onLoad="toggle2('div1');"<?php }?>>
<table width="90%" border="0" align="center" cellpadding="3" cellspacing="0" class="small">
  <tr>
    <td class="Big"><img src="template/default/content/images/notify_new.gif" align="absmiddle"><span class="big3">计划信息<?php echo $_title['name']?></span>&nbsp;&nbsp;&nbsp;&nbsp;
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
   { alert("计划主题不能为空！");
     document.save.title.focus();
     return (false);
   }
   if(document.save.content.value=="")
   { alert("内容不能为空！");
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
function toggle(targetid){
     if (document.getElementById){
         target=document.getElementById(targetid);
             if (target.style.display=="block"){
                 target.style.display="none";
             } else {
                 target.style.display="none";
             }
     }
}
function toggle2(targetid){
     if (document.getElementById){
         target=document.getElementById(targetid);
             if (target.style.display=="none"){
                 target.style.display="block";
             } else {
                 target.style.display="block";
             }
     }
}
</script>
<style type="text/css">
#div1{display:none;}
#div2{display:block;}
</style>
<form name="save" method="post" action="?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&do=add">
	<input type="hidden" name="view" value="edit" />
	<input type="hidden" name="id" value="<?php echo $user['id']?>" />
	 <table class="TableBlock" border="0" width="90%" align="center" style="border-bottom:#4686c6 solid 0px;">
	 
    
	
		<tr>
			<td nowrap class="TableContent" width="100">主题：<? get_helps()?></td>
			  <td class="TableData">
					<input type="text" class="BigInput" name="title" value="<?php echo $user['title']?>" size=50 >
				</td>  	  	
		</tr>
	
		<tr>
      <td nowrap class="TableContent"> 计划设置：</td>
      <td class="TableData">
	  <input name="type" type="radio" style="border:0;" value="个人" <? if($user['type']=='个人'){?>checked="checked"<? }?> onclick="toggle('div1')"/>
      个人
			<input name="type" type="radio" style="border:0;" value="部门" <? if($user['type']=='部门'){?>checked="checked"<? }?> onclick="toggle2('div1')" />
			部门
				
      </td>
    </tr>
	<tr id="div1">
      <td nowrap class="TableContent"> 发布部门：</td>
      <td class="TableData">
	  <?php
	  get_depabox(2,"department",$user['department'],"+选择部门",60,3)
	  ?>
	  </td>
    </tr>
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
      <td nowrap class="TableContent"> 负责人：</td>
      <td class="TableData">
	  <?php
	  get_pubuser(2,"person",$user['person'],"+选择负责人",60,3)
	  ?>
	  &nbsp;&nbsp;&nbsp;&nbsp;<?php get_smsbox("负责人","person")?>
	  
	  </td>
    </tr>
	<tr>
      <td nowrap class="TableContent"> 参与人员：</td>
      <td class="TableData">
	  <?php
	  get_pubuser(2,"participation",$user['participation'],"+选择人员",60,3)
	  ?>
	  &nbsp;&nbsp;&nbsp;&nbsp;<?php get_smsbox("参与人员","participation")?>
	  </td>
    </tr>
 	<tr>
      <td nowrap class="TableContent"> 备注：</td>
      <td class="TableData"><textarea name="note" cols="70" rows="5" class="BigInput"><?php echo $user['note']?></textarea></td>
    </tr>
	</table>	
	<table  width="90%" style="border-left:#4686c6 solid 1px;border-right:#4686c6 solid 1px;" align="center">	
		<tr>
			<td nowrap class="TableContent" width="104" style="border-right:#cccccc solid 1px;">内容：<? get_helps()?></td>
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
