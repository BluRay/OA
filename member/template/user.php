<html>
<head>
<title>基本信息</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="template/default/content/css/style.css">
<script language="javascript" type="text/javascript" src="DatePicker/WdatePicker.js"></script>
</head>
<body class="bodycolor">
<table width="90%" border="0" align="center" cellpadding="3" cellspacing="0" class="small">
  <tr>
    <td class="Big"><img src="template/default/content/images/notify_new.gif" align="absmiddle"><span class="big3"> 个人信息管理</span>
    </td>
  </tr>
</table>
<script Language="JavaScript"> 
function CheckForm()
{
   if(document.save.name.value=="")
   { alert("姓名不能为空！");
     document.save.name.focus();
     return (false);
   }
   if(document.save.phone.value=="")
   { alert("手机不能为空！");
     document.save.phone.focus();
     return (false);
   }
   if(document.save.birthdate.value=="")
   { alert("出身日期不能为空！");
     document.save.birthdate.focus();
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
<form name="save" method="post" action="?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&do=save">
<input type="hidden" name="savetype" value="edit" />
	<input type="hidden" name="uid" value="<?php echo $result['uid']?>" />
 <table class="TableBlock" border="0" width="90%" align="center">
  	<tr>
  		<td nowrap class="TableContent" width="90">用户名：</td>
  	  <td class="TableData">
  	  	<?php echo $result['username']?>  	  </td>  	  	
  		<td nowrap class="TableContent" width="90">姓名：<? get_helps()?></td>
  	    <td class="TableData"><?php echo $result['name']?></td>
  	</tr>
	
	<tr>
  		<td nowrap class="TableContent" width="90">头像：</td>
  	  <td class="TableData">
	  <?php
	  echo public_upload('pic',$result['pic']);
	  ?></td>  	  	
  		<td nowrap class="TableContent" width="90">所属权限组：</td>
  	  <td class="TableData"><?php echo get_groupname($result['groupid'])?></td>  	  	
  	</tr>
	
	<tr>
  		<td nowrap class="TableContent" width="90">所属部门：</td>
  	  <td class="TableData">
  	  	<?php echo get_realdepaname($result['departmentid'])?>  	  </td>  	  	
  		<td nowrap class="TableContent" width="90">所属岗位：</td>
  	  <td class="TableData"><?php echo get_postname($result['positionid'])?></td>  	  	
  	</tr>
	
	<tr>
  		<td nowrap class="TableContent" width="90">出生日期：</td>
  	  <td class="TableData">
  	  	<input type="text" class="BigInput" name="birthdate" style="width:180px;" value="<?php echo $result['birthdate']?>" size=30 readonly="readonly"  onClick="WdatePicker();">  	  </td>  	  	
  		<td nowrap class="TableContent" width="90">性别：</td>
  	  <td class="TableData"><input type="radio" name="sex" id="sex" value="男" <? if ($result['sex']=="男"){?>checked="checked" <? } ?>class="checkbox" />男 <input type="radio" name="sex" id="sex" value="女" <? if ($result['sex']=="女"){?>checked="checked" <? } ?> class="checkbox" />女</td>  	  	
  	</tr>
	
	
    <tr>
  		<td nowrap class="TableContent">手机：<? get_helps()?></td>
  	  <td class="TableData">
		<input type="text" class="BigInput" name="phone" value="<?php echo $result['phone']?>" size=30 onKeyUp="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')">  	  </td>
  		<td nowrap class="TableContent">联系电话：</td>
  	  <td class="TableData"> 
  	   <input type="text" class="BigInput" name="tel" value="<?php echo $result['tel']?>" size=30>      </td>
  	</tr>
  	
  	 <tr>
  		<td nowrap class="TableContent">传真：</td>
  	  <td class="TableData">
		<input type="text" class="BigInput" name="fax" value="<?php echo $result['fax']?>" size=30>  	  </td>
  		<td nowrap class="TableContent">电子邮件：</td>
  	  <td class="TableData"> 
  	   <input type="text" class="BigInput" name="email" value="<?php echo $result['email']?>" size=30>      </td>
  	</tr>
  	
	<tr>
  		<td nowrap class="TableContent">qq/msn：</td>
  	  <td class="TableData">
		<input type="text" class="BigInput" name="qq" value="<?php echo $result['qq']?>" size=30>  	  </td>
  		<td nowrap class="TableContent">联系地址：</td>
  	  <td class="TableData"> 
  	   <input type="text" class="BigInput" name="address" value="<?php echo $result['address']?>" size=40>      </td>
  	</tr>
	
	
    <tr>
  		<td nowrap class="TableContent">个人说明：</td>
  	  <td class="TableData" colspan="3">
<textarea name="contact" rows="5" cols="50"><?php echo $result['contact']?></textarea>  	  </td>
  	</tr>
    
    <tr align="center" class="TableControl">
    	<td colspan="4" nowrap>
    	<input type="button" value="保存" class="BigButtonBHover" onClick="sendForm();">&nbsp;	    </td>
  </tr>
 </table>
  
</form>

 
</body>
</html>
