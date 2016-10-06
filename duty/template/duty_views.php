<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
<link rel="stylesheet" type="text/css" href="template/default/content/css/style.css">
<script language="javascript" type="text/javascript" src="DatePicker/WdatePicker.js"></script>
<script src="template/default/tree/js/admincp.js?SES" type="text/javascript"></script>
<script charset="utf-8" src="eweb/kindeditor.js"></script>

<title>Office 515158 2011 OA办公系统</title>
 
</head>
<body class="bodycolor">
<table width="90%" border="0" align="center" cellpadding="3" cellspacing="0" class="small">
  <tr>
    <td class="Big"><img src="template/default/content/images/notify_new.gif" align="absmiddle"><span class="big3"> 查看任务</span>&nbsp;&nbsp;&nbsp;&nbsp;
	<span style="font-size:12px;">
	
	<a href="admin.php?ac=duty&fileurl=<?php echo $fileurl?>" style="font-size:12px;">返回列表页</a><img src="template/default/content/images/f_ico.png" align="absmiddle"></span>
    </td>
  </tr>
</table>
<form name="save" method="post" action="#">
<table class="TableBlock" border="0" width="90%" align="center" style="border-bottom:#4686c6 solid 0px;">
<tr>
      <td nowrap class="TableContent" width="15%"> 任务完成进度：</td>
      <td class="TableData">
	  <?php
	  $key1 = $db->fetch_one_array("SELECT sum(progress) as progress FROM ".DB_TABLEPRE."project_duty_log WHERE dutyid='".$did."'  ");
	 // echo $key1["progress"];
	 if($key1["progress"]<='100'){
	 echo '<div style="width:100px; background-color:#CCCCCC;">';
	 echo '<div style="width:';
	 if($key1["progress"]!=''){
	 echo $key1["progress"];
	 }else{
	 echo '2';
	 }
	 echo 'px; background-color:#006600;">
	  &nbsp;
	  </div>
	  </div>';
	 }else{
	 echo "任务己完成，但己超出来完成进度！";
	 }
	 echo $key1["progress"]."%";
	  ?>
	  
	  
	  
	  </td>
    </tr>
	<tr>
      <td nowrap class="TableContent" width="15%"> 任务编号：</td>
      <td class="TableData">
      <?php echo $blog["number"]?></td>
    </tr>
	
	<tr>
      <td nowrap class="TableContent" width="15%"> 任务名称：</td>
      <td class="TableData"><?php echo $blog["title"]?></td>
    </tr>
	<tr>
      <td nowrap class="TableContent" width="15%"> 任务开始时间：</td>
      <td class="TableData"><?php echo $blog["startdate"]?>
      </td>
    </tr>
	<tr>
      <td nowrap class="TableContent" width="15%"> 任务结束时间：</td>
      <td class="TableData"><?php echo $blog["enddate"]?>
      </td>
    </tr>
	
	<tr>
      <td nowrap class="TableContent" width="15%"> 执行人：</td>
      <td class="TableData"><?php echo $blog["user"]?>
	  
     </td>
    </tr>
	<tr>
      <td nowrap class="TableContent"> 附件文档：</td>
      <td class="TableData">
<? if($blog['appendix']!=''){?>
<a href="down.php?urls=<?php echo $blog['appendix']?>">下载附件</a>
<? }else{?>
无附件
<? }?>
      </td>
    </tr>
	
	<tr>
      <td nowrap class="TableContent" width="15%"> 备注：</td>
      <td class="TableData"><?php echo $blog["note"]?>
        </td>
    </tr>
	<tr>
      <td nowrap class="TableContent" width="15%"> 任务描述：</td>
      <td class="TableData"><?php echo $blog["content"]?>
        </td>
    </tr>
	
	
  </table>
</form>
 
</body>
</html>
