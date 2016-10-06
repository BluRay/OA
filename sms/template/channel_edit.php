<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
<link rel="stylesheet" type="text/css" href="template/default/content/css/style.css">
<script language="javascript" type="text/javascript" src="DatePicker/WdatePicker.js"></script>
<script src="template/default/tree/js/admincp.js?SES" type="text/javascript"></script>
<script charset="utf-8" src="eweb/kindeditor.js"></script>

<?php
global $db;
	$sms = $db->fetch_one_array("SELECT * FROM ".DB_TABLEPRE."phone_channel where pkey='1' and (type='2' or type='3')  order by id desc");
	//获取账户信息
	$username=$sms["username"];
	$password=$sms["password"];
	$connection=explode('#515158#',$blog["connection"]);
	$sms_add=explode('#01',$connection[1]);
	$phoneurl=$sms_add[0].trim($username).$sms_add[1].trim($password);
	$res = Utility::HttpRequest($phoneurl);
	//$res_add=explode('&',$ress);
	//$res_2=explode('=',$res_add[1]);
	//$res=$res_2[1];
?>

<title>Office 515158 2011 OA办公系统</title>
 
</head>
<body>
<table width="90%" border="0" align="center" cellpadding="3" cellspacing="0" class="small">
  <tr>
    <td class="Big"><img src="template/default/content/images/notify_new.gif" align="absmiddle"><span class="big3"> 手机短信接口配置</span>&nbsp;&nbsp;&nbsp;&nbsp;
	<span style="font-size:12px;">
	<a href="http://bbs.515158.com/" target="_blank" style="font-size:12px;">使用遇到问题？</a></span>
    </td>
  </tr>
</table>
<form name="save" method="post" action="?ac=channel_edit&do=save&fileurl=sms">
	<input type="hidden" name="savetype" value="add" />
<table class="TableBlock" border="0" width="90%" align="center" style="border-bottom:#4686c6 solid 0px;">
 <tr>
      <td nowrap class="TableContent" width="15%" style="font-size:18px;font-weight:bold;"> 提示：</td>
      <td class="TableData" style="font-size:18px;font-weight:bold; color:#006600; line-height:150%;">如果您还没有开通短信平台的用户名和密码，请登录官方网站开通<br>开通后将官网提供的账号和密码输入后并保存，具体咨费以官网为主,详情请致电400-618-6615<br>
	  官方网址：<a href="http://www.515158.com" target="_blank">http://www.515158.com</a>	 接口申请：<a href="http://bbs.515158.com/forum.php?mod=viewthread&tid=109&extra=page%3D1" target="_blank">http://bbs.515158.com</a>	  </td>
    </tr>
 <tr>
      <td nowrap class="TableContent" width="15%"> 用户名：</td>
      <td class="TableData">
     <input name="username" type="text" class="BigInput" value="<?php echo $blog["username"]?>" id="username" style="width: 200px;" maxlength="100" /></td>
    </tr>
	<tr>
      <td nowrap class="TableContent" width="15%"> 密码：</td>
      <td class="TableData">
     <input name="password" type="password" class="BigInput" value="<?php echo $blog["password"]?>" id="password" style="width: 200px;" maxlength="100" /></td>
    </tr>
    <tr>
      <td nowrap class="TableContent" width="15%"> 企业名称：</td>
      <td class="TableData">
     <?php echo $blog["company"]?></td>
    </tr>
	<tr>
      <td nowrap class="TableContent" width="15%"> 备注：</td>
      <td class="TableData">
     <?php echo $blog["content"]?></td>
    </tr>
	<tr>
      <td nowrap class="TableContent" width="15%"> 可用余额：</td>
      <td class="TableData"><?php if($blog["username"]!=''){?><span style="font-size:18px; color:#FF0000; font-weight:bold;"><?php echo $res?></span>RMB<?php }?></td>
    </tr>

 
    <tr align="center" class="TableControl">
      <td colspan="2" nowrap height="35">
        <input type="submit" value="保存信息" class="BigButton">
      </td>
    </tr>
  </table>
</form>
</body>
</html>
