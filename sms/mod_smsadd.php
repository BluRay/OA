<?php
(!defined('IN_TOA') || !defined('IN_ADMIN')) && exit('Access Denied!');
get_key("office_sms_Increase");
empty($do) && $do = 'list';
if ($do == 'list') {
	include_once('template/smsadd.php');

} elseif ($do == 'save') {
	
	$savetype = getGP('savetype','P');
	$content=trim(preg_replace("/[\s]+/",'',getGP('content','P')));
	PHONE_ADD_POST(getGP('receivephone','P'),$content,getGP('receive','P'),0,0,$_USER->id);
	$content=getGP('receivephone','P').get_log(1).getGP('content','P').get_log(1).getGP('receive','P').get_log(1).$_USER->id;
	$title='发送手机短信';
	get_logadd($id,$content,$title,6,$_USER->id);
	show_msg('手机短信发送成功！', 'admin.php?ac=smsindex&fileurl=sms');
}
?>