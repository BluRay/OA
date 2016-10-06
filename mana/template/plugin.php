<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
<link rel="stylesheet" type="text/css" href="template/default/content/css/style.css">
<script language="javascript" type="text/javascript" src="template/default/js/jquery.min.js"></script>
<script language="javascript" type="text/javascript" src="template/default/content/js/common.js"></script>
<title>Office 515158 2011 OA办公系统</title>
</head>
<body class="bodycolor">
<table width="90%" border="0" align="center" cellpadding="3" cellspacing="0" class="small">
  <tr>
    <td class="Big" style="font-size:12px;"><img src="template/default/content/images/notify_new.gif" align="absmiddle"><span class="big3">组件管理</span>
    </td>
  </tr>
</table>
<!--
<table class="TableBlock" border="0" width="90%" align="center">
	<tr>
      <td nowrap class="TableHeader" width="50">编号</td>
      <td class="TableHeader">名称</td>
      <td width="130" align="center" class="TableHeader">开发商</td>
      <td width="140" align="center" class="TableHeader">版本号</td>
      <td width="80" align="center" class="TableHeader">安装日期</td>
      <td width="140" class="TableHeader">更新日期</td>
      <td width="150" align="center" class="TableHeader">操作</td>
    </tr>
<?php foreach ($result as $row) {?>
	<tr>
      <td nowrap class="TableContent" width="5%">
	  <?php echo $row['id']?>
</td>
      <td class="TableData"><?php echo $row['title']?></td>
      <td align="center" class="TableData"><?php echo $row['company']?></td>
      <td align="center" class="TableData"><?php echo $row['version']?></td>
      <td align="center" class="TableData"><?php echo $row['date']?></td>
      <td align="left" class="TableData">
	  <?php echo $row['update']?>
	  </td>
      <td align="center" class="TableData">
	  <?php
	  if(file_exists($row['filename']."/install.php")!=''){
		  if($row['type']=='1'){
			  echo '<a href="'.$row['filename'].'/install.php?pid='.$row['id'].'&type=1" style="color:red">安 装</a>';
		  }elseif($row['type']=='2'){
			  echo '己安装 | <a href="'.$row['filename'].'/install.php?pid='.$row['id'].'&type=2">卸 载</a>';
		  }
	  }else{
		  echo '收费组件 | <a href="http://www.515158.com/price_plugin.html" target="_blank">购买>></a>';
	  }
	  ?>
	  </td>
    </tr>
	
<?php }?>	

	
    <tr align="center" class="TableControl">
      <td height="35" colspan="7" align="left" nowrap>
       <?php echo showpage($num,$pagesize,$page,$url)?>
</td>
    </tr>
  </table>
  -->
</form>
 
</body>
</html>
