<?php
(!defined('IN_TOA') || !defined('IN_ADMIN')) && exit('Access Denied!');
get_key("office_duty_add");

empty($do) && $do = 'list';
if ($do == 'list') {
	include_once('template/duty_add.php');

} elseif ($do == 'save') {
	$savetype = getGP('savetype','P');
	$number = getGP('number','P');
	$title = getGP('title','P');
	$user = getGP('user','P');
	$startdate = getGP('startdate','P');
	$enddate = getGP('enddate','P');
	$content = getGP('content','P');
	$appendix = getGP('appendix','P');
	$note = getGP('note','P');
	$date=get_date('Y-m-d H:i:s',PHP_TIME);
	$project_duty = array(
		'number' => $number,
		'title' => $title,
		'user' => $user,
		'startdate' => $startdate,
		'enddate' => $enddate,
		'content' => $content,
		'appendix' => $appendix,
		'note' => $note,
		'dkey' => 1,
		'type' => 2,
		'date' => $date,
		'uid' => $_USER->id
	);
	//写入主表信息
	insert_db('project_duty',$project_duty);
	$id=$db->insert_id();
	//发送提示信息
	//短消息
	if(getGP('sms_info_box_user','P')!=''){
	$content=$user.':您有一个任务需要执行,编号为：'.$number.';请进行处理!<a href="admin.php?ac=duty_views&fileurl=duty&did='.$id.'">点击处理>></a>';
	//接收人；内容；类型（1：有返回回值;0：无返回值）;URL
	SMS_ADD_POST($user,$content,0,0,$_USER->id);
	}
	//手机短信
	if(getGP('sms_phone_box_user','P')!=''){
	$content=$user.':您有一个任务需要执行,编号为：'.$number.';请登录OA进行处理!';
	PHONE_ADD_POST(getGP('userphone','P'),$content,$user,0,0,$_USER->id);
	}
	$content=serialize($project_duty);
	$title='分配任务';
	get_logadd($id,$content,$title,33,$_USER->id);
	show_msg('新任务创建成功！', 'admin.php?ac=duty&fileurl=duty');

}

?>