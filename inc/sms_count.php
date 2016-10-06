<?php
 /*
	[Office 515158] (C) 2009-2012 天生创想 Inc.
	$Id: sms_count.php 1209087 2012-01-08 08:58:28Z baiwei.jiang $
*/
define('IN_ADMIN',True);
require_once('../include/common.php');
get_login($_USER->id);
//更新在线数据到数据库中
$blog = $db->fetch_one_array("SELECT receiveperson FROM ".DB_TABLEPRE."sms_receive where receiveperson='".$_USER->id."' and online='0'  ");
	if($blog["receiveperson"]!=''){
		$sms='1';
	}else{
		$sms='0';
	}
echo $sms;
exit;
?>