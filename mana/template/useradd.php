<html>
<head>
<title>信息添加编辑</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="template/default/content/css/style.css">

</head>
<body class="bodycolor" <?php if($user['keytype']=='1'){?>onLoad="toggle2('div1');"<?php }?>>
<table width="90%" border="0" align="center" cellpadding="3" cellspacing="0" class="small">
  <tr>
    <td class="Big"><img src="template/default/content/images/notify_new.gif" align="absmiddle"><span class="big3"> 账户信息<?php echo $_title['name']?></span>&nbsp;&nbsp;&nbsp;&nbsp;
	<span style="font-size:12px;">
	
	<a href="admin.php?ac=user&fileurl=mana" style="font-size:12px;">返回列表页</a><img src="template/default/content/images/f_ico.png" align="absmiddle"></span>
    </td>
  </tr>
</table>
<script Language="JavaScript"> 
function CheckForm()
{
   if(document.save.username.value=="")
   { alert("用户名不能为空！");
     document.save.username.focus();
     return (false);
   }
   if(document.save.groupid.value=="")
   { alert("权限组不能为空！");
     document.save.groupid.focus();
     return (false);
   }
   <?php if($id==''){?>
   if(document.save.password.value=="")
   { alert("密码不能为空！");
     document.save.password.focus();
     return (false);
   }
   <?php }?>
   if(document.save.departmentid.value=="")
   { alert("所属部门不能为空！");
     document.save.departmentid.focus();
     return (false);
   }
   if(document.save.positionid.value=="")
   { alert("岗位不能为空！");
     document.save.positionid.focus();
     return (false);
   }
   if(document.save.name.value=="")
   { alert("姓名不能为空！");
     document.save.name.focus();
     return (false);
   }
   var New=document.getElementsByName("keytype");
   var strNew;
   for(var i=0;i<New.length;i++)
   {
     if(New.item(i).checked){
		 strNew=New.item(i).getAttribute("value");  
		 break;
	  }else{
		 continue;
	  }
   }
   if(strNew=="1" && document.save.keytypeuser.value=="")
   { alert("下属成员不能为空！");
     document.save.keytypeuser.focus();
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
	<input type="hidden" name="id" value="<?php echo $user['uid']?>" />
	<input type="hidden" name="oldpassword" value="<?php echo $user['password']?>" />
 <table class="TableBlock" border="0" width="90%" align="center">
  	<tr>
  		<td nowrap class="TableContent" width="90">用户名：<? get_helps()?></td>
  	  <td class="TableData">
  	  	<input type="text" class="BigInput" name="username" value="<?php echo $user['username']?>" size=20 <?php if($id!=''){?>disabled="disabled"<?php }?>>
  	  </td>  	  	
  		<td nowrap class="TableContent" width="90">密码：<?php if($id==''){?><? get_helps()?><?php }?></td>
  	  <td class="TableData"><input type="text" class="BigInput" name="password" value="" size=30>  
  	  <?php if($id!=''){?>不修改请留空<?php }?></td>  	  	
  	</tr>
    <tr>
  		<td nowrap class="TableContent">权限组：<? get_helps()?></td>
  	  <td class="TableData">
		<select name="groupid"><?php echo get_grouplist($user['groupid'])?></select> 
		
  	  </td>
  		<td nowrap class="TableContent">所属部门：<? get_helps()?></td>
  	  <td class="TableData"> 
  	    <select class="SelectStyle" name="departmentid">
											<option value="0" ></option>
											<?php get_realdepalist(0,$user['departmentid'])?>
										</select>   
     
      </td>
  	</tr>
  	<tr>
  		<td nowrap class="TableContent">岗位：<? get_helps()?></td>
  	  <td class="TableData">
		<select class="SelectStyle" name="positionid">
											<option value="0" ></option>
											<?php get_postlist(0,$user['positionid'])?>
										</select>    </td>	  	
     <td nowrap class="TableContent">姓名：<? get_helps()?></td>
     <td nowrap class="TableData">
     	<input type="text" class="BigInput" name="name" value="<?php echo $user['name']?>" size=20>
     </td>
  	</tr>
  	
  	
    <tr>
  		<td nowrap class="TableContent">状态：<? get_helps()?></td>
  	  <td class="TableData" colspan="3">
      <input type="radio" name="ischeck" id="ischeck" value="1" <? if ($user['ischeck']=="1"){?>checked="checked" <? } ?> class="checkbox" />正常 <input type="radio" name="ischeck" id="ischeck" value="0" <? if ($user['ischeck']=="0"){?>checked="checked" <? } ?> class="checkbox" />禁用   
  	  </td>
  	</tr>
     <tr>
  		<td nowrap class="TableContent">允许登录IP：</td>
  	  <td class="TableData" colspan="3">
<textarea name="loginip" rows="5" cols="50"><?php echo $user['loginip']?></textarea>
<br>多个请用英文“,” 号分隔 ，留空为不限制   
  	  </td>
  	</tr>
	
    <tr>
  		<td nowrap class="TableContent" width="100">是否允许管理下级人员信息：<? get_helps()?></td>
  	  <td class="TableData" colspan="3">
      <input type="radio" name="keytype" id="keytype" value="1" <? if ($user['keytype']=="1"){?>checked="checked" <? } ?> class="checkbox" onClick="toggle2('div1')" />允许 <input type="radio" name="keytype" id="keytype" value="2" <? if ($user['keytype']=="2"){?>checked="checked" <? } ?> class="checkbox"  onclick="toggle('div1')" />不允许   
  	  </td>
  	</tr>
     <tr  id="div1">
  		<td nowrap class="TableContent">设置人员：</td>
  	  <td class="TableData" colspan="3">
	  <?php
	  get_pubuser(2,"keytypeuser",$user['keytypeuser'],"+选择人员",60,4)
	  ?>
<br>设置可管理的下属人员，设置成功后这些人员发布的信息将会被“<?php echo $user['name']?>”看到
  	  </td>
  	</tr>
	
    <tr align="center" class="TableControl">
    	<td colspan="4" nowrap>
    	<input type="button" value="保存" class="BigButtonBHover" onClick="sendForm();">&nbsp;
 
	    </td>
  </tr>
 </table>
  
</form>

 
</body>
</html>
