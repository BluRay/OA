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
    <td class="Big"><img src="template/default/content/images/notify_new.gif" align="absmiddle"><span class="big3">培训计划<?php echo $_title['name']?></span>&nbsp;&nbsp;&nbsp;&nbsp;
	<span style="font-size:12px;">
	
	<a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>" style="font-size:12px;">返回列表页</a><img src="template/default/content/images/f_ico.png" align="absmiddle"></span>
    </td>
  </tr>
</table>
<script Language="JavaScript"> 
function CheckForm()
{
   if(document.save.number.value=="")
   { alert("培训编号不能为空！");
     document.save.number.focus();
     return (false);
   }
   if(document.save.name.value=="")
   { alert("培训名称不能为空！");
     document.save.name.focus();
     return (false);
   }
   if(document.save.responsible.value=="")
   { alert("负责人不能为空！");
     document.save.responsible.focus();
     return (false);
   }
   if(document.save.participation.value=="")
   { alert("计划参与培训人数不能为空！");
     document.save.participation.focus();
     return (false);
   }
   if(document.save.startdate.value=="")
   { alert("开课日期不能为空！");
     document.save.startdate.focus();
     return (false);
   }
   if(document.save.enddate.value=="")
   { alert("结课日期不能为空！");
     document.save.enddate.focus();
     return (false);
   }
   if(document.save.examination.value=="")
   { alert("审批人员不能为空！");
     document.save.examination.focus();
     return (false);
   }
   if(document.save.user.value=="")
   { alert("参与培训人员不能为空！");
     document.save.user.focus();
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
			<td nowrap class="TableContent" width="150">培训编号：<? get_helps()?></td>
			  <td class="TableData"><input type="text" name="number" class="BigInput" size="20" value="<?php echo $user['number']?>" /></td>
			  <td class="TableContent" width="150">培训名称：<? get_helps()?></td>
			  <td class="TableData"><input type="text" name="name" class="BigInput" style="width:268px;" size="20" value="<?php echo $user['name']?>" /></td>  	  	
		</tr>
		
		<tr>
			<td nowrap class="TableContent" width="150">培训类型：</td>
			  <td class="TableData"><select name="channel" class="BigStatic">
			<option value="0" selected="selected">请选择类型</option>
			<?php echo get_typelist($user['channel'],17)?>
			</select></td>
			  <td class="TableContent" width="150">培训形式：</td>
			  <td class="TableData"><select name="trform" class="BigStatic">
			<option value="0" selected="selected">请选择形式</option>
			<?php echo get_typelist($user['trform'],18)?>
			</select></td>  	  	
		</tr>
		<tr>
			<td nowrap class="TableContent" width="150">主办部门：</td>
			  <td class="TableData"><?php
	  get_depabox(2,"sponsor",$user['sponsor'],"+选择部门",30,4)
	  ?></td>
			  <td class="TableContent" width="150">负责人：<? get_helps()?></td>
			  <td class="TableData"><?php
	  get_pubuser(2,"responsible",$user['responsible'],"+选择负责人",30,4)
	  ?>	</td>  	  	
		</tr>
		<tr>
			<td nowrap class="TableContent" width="150">计划参与培训人数：<? get_helps()?></td>
			  <td class="TableData"><input type="text" name="participation" class="BigInput" size="15" value="<?php echo $user['participation']?>" onKeyUp="value=value.replace(/[^0-9^.]/g,'');" /> 人</td>
			  <td class="TableContent" width="150">培训地点：</td>
			  <td class="TableData"><input type="text" name="address" class="BigInput" style="width:368px;" size="20" value="<?php echo $user['address']?>" /></td>  	  	
		</tr>
		<tr>
			<td nowrap class="TableContent" width="150">培训机构名称：</td>
			  <td class="TableData"><input type="text" name="organization" class="BigInput" style="width:268px;" size="20" value="<?php echo $user['organization']?>" /></td>
			  <td class="TableContent" width="150">培训机构联系人：</td>
			  <td class="TableData"><input type="text" name="orgperson" class="BigInput" style="width:268px;" size="20" value="<?php echo $user['orgperson']?>" /></td>  	  	
		</tr>
		
		<tr>
			<td nowrap class="TableContent" width="150">培训课程名称：</td>
			  <td class="TableData"><input type="text" name="curriculum" class="BigInput" style="width:268px;" size="20" value="<?php echo $user['curriculum']?>" /></td>
			  <td class="TableContent" width="150">总课时：</td>
			  <td class="TableData"><input type="text" name="classhour" class="BigInput" size="15" value="<?php echo $user['classhour']?>" /> 小时</td>  	  	
		</tr>
		
		<tr>
			<td nowrap class="TableContent" width="150">开课日期：<? get_helps()?></td>
			  <td class="TableData"><input type="text" name="startdate" class="BigInput" style="width:168px;" size="20" value="<?php echo $user['startdate']?>" onClick="WdatePicker();" /></td>
			  <td class="TableContent" width="150">结课日期：<? get_helps()?></td>
			  <td class="TableData"><input type="text" name="enddate" class="BigInput" size="20" style="width:168px;" value="<?php echo $user['enddate']?>" onClick="WdatePicker();" /></td>  	  	
		</tr>
		<tr>
			<td nowrap class="TableContent" width="150">培训预算：</td>
			  <td class="TableData"><input type="text" name="price" class="BigInput" size="15" value="<?php echo $user['price']?>"  onKeyUp="value=value.replace(/[^0-9^.]/g,'');"/> RMB		</td>
			  <td class="TableContent" width="150">审批人员：<? get_helps()?></td>
			  <td class="TableData"><?php
	  get_pubuser(1,"examination",$user['examination'],"+选择审批人员",80,25)
	  ?>	</td>  	  	
		</tr>
		
		<tr>
			<td nowrap class="TableContent" width="150">参与培训部门：</td>
			  <td class="TableData"><?php
	  get_depabox(2,"department",$user['department'],"+选择部门",30,4)
	  ?>	</td>
			  <td class="TableContent" width="150">参与培训人员：<? get_helps()?></td>
			  <td class="TableData"><?php
	  get_pubuser(2,"user",$user['user'],"+选择参与人员",30,4)
	  ?>	</td>  	  	
		</tr>
		
		
		<tr>
			<td nowrap class="TableContent" width="150">培训机构相关信息：</td>
			  <td colspan="3" class="TableData">
			    <textarea name="organizationinfo" cols="60" rows="4" class="BigInput"><?php echo $user['organizationinfo']?></textarea>				</td>
	    </tr>
		<tr>
			<td nowrap class="TableContent" width="150">培训机构联系人相关信息：</td>
			  <td colspan="3" class="TableData">
<textarea name="contactperson" cols="60" rows="4" class="BigInput"><?php echo $user['contactperson']?></textarea>				</td>
	    </tr>
<tr>
			<td nowrap class="TableContent" width="150">培训要求：</td>
			  <td colspan="3" class="TableData">
<textarea name="request" cols="60" rows="4" class="BigInput"><?php echo $user['request']?></textarea>				</td>
	    </tr>
		<tr>
			<td nowrap class="TableContent" width="150">附件文档：</td>
			  <td colspan="3" class="TableData">
			    <?php echo public_upload('appendix',$user['appendix'])?>				</td>
	    </tr>
	</table>	
	<table  width="90%" style="border-left:#4686c6 solid 1px;border-right:#4686c6 solid 1px;" align="center">	
		<tr>
			<td nowrap class="TableContent" width="154" style="border-right:#cccccc solid 1px;">培训内容：<? get_helps()?></td>
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
