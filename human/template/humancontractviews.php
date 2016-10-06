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
    <td class="Big"><img src="template/default/content/images/notify_new.gif" align="absmiddle"><span class="big3"> <?php echo get_realname($blog["userid"])?>&nbsp;&nbsp;人事合同<?php echo $_title['name']?>&nbsp;&nbsp;&nbsp;&nbsp;</span>
	
	<a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>" style="font-size:12px;">返回列表页</a><img src="template/default/content/images/f_ico.png" align="absmiddle">
    </td>
  </tr>
</table>

<form name="save" method="post" action="?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&do=views">
	<table class="TableBlock" border="0" width="90%" align="center" style="border-bottom:#4686c6 solid 0px;">
	 
    <tr>
      <td nowrap class="TableContent" width="130"> 单位员工：</td>
      <td class="TableData">
      
	  <?php echo get_realname($blog['userid'])?>	  </td>
    </tr>
	<tr>
      <td nowrap class="TableContent" width="130"> 合同编号：</td>
      <td class="TableData">
     <?php echo $blog['number']?></td>
    </tr>
	<tr>
      <td nowrap class="TableContent" width="130"> 合同类型：</td>
      <td class="TableData"><?php echo get_typename($blog["type"])?></td>
    </tr>
	<tr>
      <td nowrap class="TableContent" width="130"> 合同状态：</td>
      <td class="TableData"><?php echo get_typename($blog["ckey"])?></td>
    </tr>
	<tr>
      <td nowrap class="TableContent" width="130"> 合同签订日期：</td>
      <td class="TableData">
      <?php echo $blog['signdate']?></td>
    </tr>
	<tr>
      <td nowrap class="TableContent" width="130"> 试用生效日期：</td>
      <td class="TableData">
      <?php echo $blog['testdate']?></td>
    </tr>
	<tr>
      <td nowrap class="TableContent" width="130"> 试用天数：</td>
      <td class="TableData">
      <?php echo $blog['testday']?></td>
    </tr>
	<tr>
      <td nowrap class="TableContent" width="130"> 试用到期日期：</td>
      <td class="TableData"><?php echo $blog['testenddate']?></td>
    </tr>
	<tr>
      <td nowrap class="TableContent" width="130"> 签约次数：</td>
      <td class="TableData">
      <?php echo $blog['signnum']?>次</td>
    </tr>
    <tr>
      <td nowrap class="TableContent"> 合同到期日期：</td>
      <td class="TableData"><?php echo $blog['signenddate']?>      </td>
    </tr>
	<tr>
      <td nowrap class="TableContent"> 附件文档：</td>
      <td class="TableData">
	<a href="down.php?urls=<?php echo $blog['appendix']?>" target="_blank">下载附件</a>      </td>
    </tr>
	<tr>
      <td colspan="2" nowrap class="TableData"> 
        <?php echo $blog['content']?>      </td>
      </tr>
	</table>
  
</form>

 
</body>
</html>
