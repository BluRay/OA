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
    <td class="Big"><img src="template/default/content/images/notify_new.gif" align="absmiddle"><span class="big3">人事合同信息<?php echo $_title['name']?></span>&nbsp;&nbsp;&nbsp;&nbsp;
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
   if(document.save.number.value=="")
   { alert("合同编号不能为空！");
     document.save.number.focus();
     return (false);
   }
   if(document.save.signdate.value=="")
   { alert("合同签订日期不能为空！");
     document.save.signdate.focus();
     return (false);
   }
   if(document.save.testdate.value=="")
   { alert("试用生效日期不能为空！");
     document.save.testdate.focus();
     return (false);
   }
   if(document.save.testday.value=="")
   { alert("试用天数不能为空！");
     document.save.testday.focus();
     return (false);
   }
   if(document.save.testenddate.value=="")
   { alert("试用到期日期不能为空！");
     document.save.testenddate.focus();
     return (false);
   }
   if(document.save.signnum.value=="")
   { alert("签约次数不能为空！");
     document.save.signnum.focus();
     return (false);
   }
   if(document.save.signenddate.value=="")
   { alert("合同到期日期不能为空！");
     document.save.signenddate.focus();
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
	<input type="hidden" name="id" value="<?php echo $blog['id']?>" />
	 <table class="TableBlock" border="0" width="90%" align="center" style="border-bottom:#4686c6 solid 0px;">
	 
    <tr>
      <td nowrap class="TableContent" width="130"> 单位员工：<? get_helps()?></td>
      <td class="TableData">
      
	  <?php
	  get_pubuser(1,"user",get_realname($blog['userid']),"+选择人员",70,20)
	  ?>
	  </td>
    </tr>
	<tr>
      <td nowrap class="TableContent" width="130"> 合同编号：<? get_helps()?></td>
      <td class="TableData">
      <input type="text" name="number" class="BigInput" size="40" value="<?php echo $blog['number']?>" /></td>
    </tr>
	<tr>
      <td nowrap class="TableContent" width="130"> 合同类型：</td>
      <td class="TableData">
      <select name="type" class="BigStatic">
			<option value="0" selected="selected">请选择类型</option>
			<?php echo get_typelist($blog['type'],14)?>
			</select></td>
    </tr>
	<tr>
      <td nowrap class="TableContent" width="130"> 合同状态：</td>
      <td class="TableData">
      <select name="ckey" class="BigStatic">
			<option value="0" selected="selected">请选择状态</option>
			<?php echo get_typelist($blog['ckey'],15)?>
			</select></td>
    </tr>
	<tr>
      <td nowrap class="TableContent" width="130"> 合同签订日期：<? get_helps()?></td>
      <td class="TableData">
      <input type="text" name="signdate" class="BigInput" style="width:168px;" size="20" value="<?php echo $blog['signdate']?>" onClick="WdatePicker();" /></td>
    </tr>
	<tr>
      <td nowrap class="TableContent" width="130"> 试用生效日期：<? get_helps()?></td>
      <td class="TableData">
      <input type="text" name="testdate" class="BigInput" size="20" style="width:168px;" value="<?php echo $blog['testdate']?>" onClick="WdatePicker();" /></td>
    </tr>
	<tr>
      <td nowrap class="TableContent" width="130"> 试用天数：<? get_helps()?></td>
      <td class="TableData">
      <input type="text" name="testday" class="BigInput" size="15" value="<?php echo $blog['testday']?>"  onKeyUp="value=value.replace(/[^0-9^.]/g,'');" /> 天</td>
    </tr>
	<tr>
      <td nowrap class="TableContent" width="130"> 试用到期日期：<? get_helps()?></td>
      <td class="TableData">
      <input type="text" name="testenddate" class="BigInput" style="width:168px;" value="<?php echo $blog['testenddate']?>" onClick="WdatePicker();" /></td>
    </tr>
	<tr>
      <td nowrap class="TableContent" width="130"> 签约次数：<? get_helps()?></td>
      <td class="TableData">
      <input type="text" name="signnum" class="BigInput" size="15" value="<?php echo $blog['signnum']?>"  onKeyUp="value=value.replace(/[^0-9^.]/g,'');" /> 次</td>
    </tr>
    <tr>
      <td nowrap class="TableContent"> 合同到期日期：<? get_helps()?></td>
      <td class="TableData">
<input type="text" name="signenddate" class="BigInput" style="width:168px;"  value="<?php echo $blog['signenddate']?>" onClick="WdatePicker();"/>
      </td>
    </tr>
	<tr>
      <td nowrap class="TableContent"> 附件文档：</td>
      <td class="TableData">
	<?php echo public_upload('appendix',$blog['appendix'])?>
      </td>
    </tr>
	</table>	
	<table  width="90%" style="border-left:#4686c6 solid 1px;border-right:#4686c6 solid 1px;" align="center">	
		<tr>
			<td nowrap class="TableContent" width="134" style="border-right:#cccccc solid 1px;">备注：<? get_helps()?></td>
			  <td class="TableData" style="padding-top:10px; padding-bottom:10px; padding-left:3px;">
			  
			  <script>
        KE.show({
                id : 'content'
        });
</script>
				<textarea name="content" rows="5" cols="60" style="width:600px;height:300px;"><?php echo $blog['content']?></textarea>
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
