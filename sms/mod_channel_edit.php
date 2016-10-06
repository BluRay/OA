<?php
(!defined('IN_TOA') || !defined('IN_ADMIN')) && exit('Access Denied!');
get_key("office_sms_channel");

empty($do) && $do = 'list';
if ($do == 'list') {
    $blog = $db->fetch_one_array("SELECT * FROM ".DB_TABLEPRE."phone_channel  order by id desc");
	include_once('template/channel_edit.php');

} elseif ($do == 'save') {
	
	$savetype = getGP('savetype','P');

	//发送消息表
	$phone_channel = array(
		'username' => getGP('username','P'),
		'password' => getGP('password','P')
	);
	update_db('phone_channel',$phone_channel, array('id' => 1));
	//insert_db('channel_edit',$channel_edit);
	show_msg('信息更新成功！', 'admin.php?ac=channel_edit&fileurl=sms');
}
?>