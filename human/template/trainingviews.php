<html>
<head>
<title>信息添加编辑</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="template/default/content/css/style.css">
<script language="javascript" type="text/javascript" src="DatePicker/WdatePicker.js"></script>
<script src="template/default/tree/js/admincp.js?SES" type="text/javascript"></script>
<script charset="utf-8" src="eweb/kindeditor.js"></script>
<script type="text/javascript"> 

</script>
</head>
<body class="bodycolor">
<table width="90%" border="0" align="center" cellpadding="3" cellspacing="0" class="small" style='margin-top:30px;'>
  <tr>
    <td class="Big"><img src="template/default/content/images/notify_new.gif" align="absmiddle"><span class="big3"> <?php echo $blog['name']?>&nbsp;&nbsp;<?php echo $_title['name']?>
	&nbsp;&nbsp;&nbsp;&nbsp;
	
	<a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>" style="font-size:12px;">返回列表页</a><img src="template/default/content/images/f_ico.png" align="absmiddle">
    </td>
  </tr>
</table>

<form name="save" method="post" action="?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&do=views">
	<input type="hidden" name="view" value="edit" />
	<input type="hidden" name="id" value="<?php echo $blog['id']?>" />
	
	<table class="TableBlock" border="0" width="90%" align="center" style="border-bottom:#4686c6 solid 0px;">
	 
    <?php if($_GET["keys"]=='1'){?>
 <tr>
      <td nowrap class="TableContent" width="150"> 审批状态：</td>
      <td class="TableData" colspan="3"><input name="type" type="radio" value="2" checked="checked" />
        批准
          <input name="type" type="radio" value="3" />
        拒绝</td>
    </tr>
   <tr align="center" class="TableControl">
      <td colspan="4" nowrap height="35">

		<input type="submit" name="Submit" value="审批信息" class="BigButtonBHover">      </td>
    </tr>
	<?php }?>
	
		<tr>
			<td nowrap class="TableContent" width="150">培训编号：</td>
			  <td class="TableData"><?php echo $blog['number']?></td>
			  <td class="TableContent" width="150">培训名称：</td>
			  <td class="TableData"><?php echo $blog['name']?></td>  	  	
		</tr>
		
		<tr>
			<td nowrap class="TableContent" width="150">培训类型：</td>
			  <td class="TableData"><?php echo get_typename($blog["channel"])?></td>
			  <td class="TableContent" width="150">培训形式：</td>
			  <td class="TableData"><?php echo get_typename($blog["trform"])?></td>  	  	
		</tr>
		<tr>
			<td nowrap class="TableContent" width="150">主办部门：</td>
			  <td class="TableData"><div style="width:400px;"><?php echo $blog['sponsor']?></div></td>
			  <td class="TableContent" width="150">负责人：</td>
			  <td class="TableData"><?php echo $blog['responsible']?>	</td>  	  	
		</tr>
		<tr>
			<td nowrap class="TableContent" width="150">计划参与培训人数：</td>
			  <td class="TableData"><?php echo $blog['participation']?></td>
			  <td class="TableContent" width="150">培训地点：</td>
			  <td class="TableData"><?php echo $blog['address']?></td>  	  	
		</tr>
		<tr>
			<td nowrap class="TableContent" width="150">培训机构名称：</td>
			  <td class="TableData"><?php echo $blog['organization']?></td>
			  <td class="TableContent" width="150">培训机构联系人：</td>
			  <td class="TableData"><?php echo $blog['orgperson']?></td>  	  	
		</tr>
		
		<tr>
			<td nowrap class="TableContent" width="150">培训课程名称：</td>
			  <td class="TableData"><?php echo $blog['curriculum']?></td>
			  <td class="TableContent" width="150">总课时：</td>
			  <td class="TableData"><?php echo $blog['classhour']?></td>  	  	
		</tr>
		
		<tr>
			<td nowrap class="TableContent" width="150">开课日期：</td>
			  <td class="TableData"><?php echo $blog['startdate']?></td>
			  <td class="TableContent" width="150">结课日期：</td>
			  <td class="TableData"><?php echo $blog['enddate']?></td>  	  	
		</tr>
		<tr>
			<td nowrap class="TableContent" width="150">培训预算：</td>
			  <td class="TableData"><?php echo $blog['price']?></td>
			  <td class="TableContent" width="150">审批人员：</td>
			  <td class="TableData"><?php echo $blog['examination']?>	</td>  	  	
		</tr>
		
		<tr>
			<td nowrap class="TableContent" width="150">参与培训部门：</td>
			  <td class="TableData"><div style="width:400px;"><?php echo $blog['department']?></div></td>
			  <td class="TableContent" width="150">参与培训人员：</td>
			  <td class="TableData"><div style="width:400px;"><?php echo $blog['user']?></div></td>  	  	
		</tr>
		
		
		<tr>
			<td nowrap class="TableContent" width="150">培训机构相关信息：</td>
			  <td colspan="3" class="TableData">
			    <?php echo $blog['organizationinfo']?></td>
	    </tr>
		<tr>
			<td nowrap class="TableContent" width="150">培训机构联系人相关信息：</td>
			  <td colspan="3" class="TableData"><?php echo $blog['contactperson']?></td>
	    </tr>
<tr>
			<td nowrap class="TableContent" width="150">培训要求：</td>
			  <td colspan="3" class="TableData"><?php echo $blog['request']?></td>
	    </tr>
		<tr>
			<td nowrap class="TableContent" width="150">附件文档：</td>
			  <td colspan="3" class="TableData"><?php echo $blog['appendix']?> <a href="down.php?urls=<?php echo $blog['appendix']?>" target="_blank" >附件下载</a></td>
	    </tr>
		<tr>
			<td colspan="4" nowrap class="TableData">
	        <?php echo $blog['content']?>				</td>
	    </tr>
	</table>

  
</form>

 
</body>
</html>
