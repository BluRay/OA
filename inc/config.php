 <?php
/*
	[Office 515158] (C) 2009-2012 天生创想 Inc.
	$Id: config.php 1209087 2012-01-08 08:58:28Z baiwei.jiang $
*/
define('IN_ADMIN',True);
require_once('../include/common.php');
get_login($_USER->id);
?> 
<link rel="stylesheet" type="text/css" href="../template/default/css/pstyle.css" />

<html>
<head>
<title>版权信息 </title>
<META http-equiv=Content-Type content="text/html; charset=utf-8">
</head>
<body class="bodycolor" topmargin="5">
<table class="TableBlock" border="0" width="90%" align="center">
  	<tr>
  		<td nowrap class="TableContent" width="90">授权ID：</td>
  	  <td class="TableData">
  	  	<?php echo $_CONFIG->config_data('com_userid')?></td>  	  	
  		<td nowrap class="TableContent" width="90">序列号：</td>
  	  <td class="TableData"><?php echo $_CONFIG->config_data('com_number')?></td>  	  	
  	</tr>
    
 </table>
 
 <table class="TableBlock" border="0" width="90%" align="center" style="margin-top:10px;">
 <tr align="center" class="TableControl">
    	<td colspan="4" align="left" nowrap>
    	<b>企业信息</b></td>
  </tr>
  	<tr>
  		<td nowrap class="TableContent" width="90">授权企业：</td>
  	  <td class="TableData">
  	  <?php echo $_CONFIG->config_data('com_name')?></td>  	  	
  		<td nowrap class="TableContent" width="90">联系人：</td>
  	  <td class="TableData"><?php echo $_CONFIG->config_data('com_person')?></td>  	  	
  	</tr>
    <tr>
  		<td nowrap class="TableContent" width="90">联系电话：</td>
  	  <td class="TableData"><?php echo $_CONFIG->config_data('com_tel')?></td>  	  	
  		<td nowrap class="TableContent" width="90">手机号码：</td>
  	  <td class="TableData"><?php echo $_CONFIG->config_data('com_phone')?></td>  	  	
  	</tr>
	<tr>
  		<td nowrap class="TableContent" width="90">公司地址：</td>
  	  <td class="TableData"><?php echo $_CONFIG->config_data('com_address')?></td>  	  	
  		<td nowrap class="TableContent" width="90">qq：</td>
  	  <td class="TableData"><?php echo $_CONFIG->config_data('qq')?></td>  	  	
  	</tr>
	<tr>
  		<td nowrap class="TableContent" width="90">email：</td>
  	  <td class="TableData"><?php echo $_CONFIG->config_data('email')?></td>  	  	
  		<td nowrap class="TableContent" width="90">授权OA网址：</td>
  	  <td class="TableData"><?php echo $_CONFIG->config_data('com_url')?></td>  	  	
  	</tr>
    
    
 </table>
 
</body>
</html>
