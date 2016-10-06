<?php
(!defined('IN_TOA') || !defined('IN_ADMIN')) && exit('Access Denied!');

get_key("office_info_Increase");
empty($do) && $do = 'list';
if ($do == 'list') {
	include_once('template/add.php');

} elseif ($do == 'save') {
	
	$savetype = getGP('savetype','P');
	$receiveperson = getGP('receiveperson','P');
	if(getGP('appendix','P')!=''){
		$appendix='<a href="'.getGP('appendix','P').'" target="_blank">附件下载</a>';
	}
	$content = getGP('content','P').$appendix;
	
	//发送消息表
	$sms_send = array(
		'receiveperson' => $receiveperson,
		'content' => $content,
		'uid' => $_USER->id,
		'date' => get_date('y-m-d H:i:s',PHP_TIME)
	);
	insert_db('sms_send',$sms_send);
	$id=$db->insert_id();
	//获取字符串
	$receivepersonarr=explode(',',$receiveperson); 
	//发送消息表
	
	for($i=0;$i<sizeof($receivepersonarr);$i++)
	{
	//接收消息表
	$sms_receive = array(
		'sendperson' => $_USER->id,
		'date' => get_date('y-m-d H:i:s',PHP_TIME),
		'content' => $content,
		'receiveperson' => get_userid($receivepersonarr[$i]),
		'type' => '2',
		'smskey' => '1',
		'sendid'=>$id
	);
	//接收消息表
	insert_db('sms_receive',$sms_receive);
	}

	if($id!='')
	{
   $oalog = array(
		'uid' => $_USER->id,
		'content' => $content.get_log(1).$receiveperson,
		'title' => '发布短消息',
		'startdate' => get_date('Y-m-d H:i:s',PHP_TIME),
		'contentid' => $id,
		'type' => '4'
	);
	insert_db('oalog',$oalog);
	
	}
	show_msg('短消息发送成功！', 'admin.php?ac=index&fileurl=sms');

}
?>