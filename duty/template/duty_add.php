<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
<link rel="stylesheet" type="text/css" href="template/default/content/css/style.css">
<script language="javascript" type="text/javascript" src="DatePicker/WdatePicker.js"></script>
<script charset="utf-8" src="eweb/kindeditor.js"></script>

<title>Office 515158 2011 OA办公系统</title>
 
</head>
<body class="bodycolor">
<table width="90%" border="0" align="center" cellpadding="3" cellspacing="0" class="small">
  <tr>
    <td class="Big"><img src="template/default/content/images/notify_new.gif" align="absmiddle"><span class="big3"> 新增任务</span>&nbsp;&nbsp;&nbsp;&nbsp;
	<span style="font-size:12px;">
	
	<a href="admin.php?ac=duty&fileurl=<?php echo $fileurl?>" style="font-size:12px;">返回列表页</a><img src="template/default/content/images/f_ico.png" align="absmiddle"></span>
    </td>
  </tr>
</table>
<script Language="JavaScript"> 
function CheckForm()
{
   if(document.save.number.value=="")
   { alert("任务编号不能为空！");
     document.save.number.focus();
     return (false);
   }
   if(document.save.title.value=="")
   { alert("任务名称不能为空！");
     document.save.title.focus();
     return (false);
   }
   if(document.save.startdate.value=="")
   { alert("任务开始时间不能为空！");
     document.save.startdate.focus();
     return (false);
   }
   if(document.save.enddate.value=="")
   { alert("任务结束时间不能为空！");
     document.save.enddate.focus();
     return (false);
   }
   if(document.save.user.value=="")
   { alert("执行人不能为空！");
     document.save.user.focus();
     return (false);
   }
   if(document.save.content.value=="")
   { alert("任务描述不能为空！");
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
<form name="save" method="post" action="?ac=duty_add&do=save&fileurl=duty">
	<input type="hidden" name="savetype" value="add" />
<table class="TableBlock" border="0" width="90%" align="center" style="border-bottom:#4686c6 solid 0px;">

	<tr>
      <td nowrap class="TableContent" width="15%"> 任务编号：<? get_helps()?></td>
      <td class="TableData"><input type="text" name="number" class="BigInput" size="20" value="<?php echo get_date('YmdHis',PHP_TIME)?>" /></td>
      <td class="TableContent">任务名称：<? get_helps()?></td>
      <td class="TableData"><input type="text" name="title" class="BigInput" style="width:268px;" size="20" value="" /></td>
    </tr>
	
	<tr>
      <td nowrap class="TableContent" width="15%">任务开始时间：<? get_helps()?></td>
      <td class="TableData"><input type="text" name="startdate" class="BigInput" style="width:168px;" size="20" value="" onClick="WdatePicker();" /></td>
      <td class="TableContent">任务结束时间：<? get_helps()?></td>
      <td class="TableData"><input type="text" name="enddate" class="BigInput" size="20" style="width:168px;" value="" onClick="WdatePicker();" />      </td>
    </tr>


	<tr>
      <td nowrap class="TableContent" width="15%"> 执行人：<? get_helps()?></td>
      <td class="TableData"><?php
	  get_pubuser(1,"user","","+选择执行人",60,20)
	  ?>
	  &nbsp;&nbsp;&nbsp;&nbsp;<?php get_smsbox("执行人","user")?></td>
      <td class="TableContent">附件文档：</td>
      <td class="TableData"><?php echo public_upload('appendix','')?>	  	  </td>
    </tr>
	
	<tr>
      <td nowrap class="TableContent" width="15%"> 备注：</td>
      <td colspan="3" class="TableData">
      <textarea name="note" cols="60" rows="5" class="BigInput"></textarea></td>
    </tr>
	</table>
<table  width="90%" style="border-left:#4686c6 solid 1px;border-right:#4686c6 solid 1px;" align="center">	
    <tr>
      <td width="15%"  style="border-right:#CCCCCC solid 1px;" class="TableContent">&nbsp;任务描述：<? get_helps()?></td>
      <td width="85%" style="padding-top:10px; padding-bottom:10px; padding-left:3px;">
<script>
        KE.show({
                id : 'content'
        });
</script>
		<textarea name="content" cols="70" rows="12" class="input" style="width:600px;height:300px;"></textarea>	 
      </td>
    </tr>
</table>
<table class="TableBlock" border="0" width="90%" align="center" style="border-bottom:#4686c6 solid 0px;">
    <tr align="center" class="TableControl">
      <td colspan="2" nowrap height="35">

		<input type="button" name="Submit" value="保存信息" class="BigButton" onclick="sendForm();"> 
        
      </td>
    </tr>
  </table>
</form>
 
</body>
</html>
