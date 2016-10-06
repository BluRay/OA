<?php
(!defined('IN_TOA') || !defined('IN_ADMIN')) && exit('Access Denied!');
get_key("office_duty_sum");

empty($do) && $do = 'list';
if ($do == 'list') {
	include_once('template/duty_log_add.php');

} elseif ($do == 'save') {
	
	$savetype = getGP('savetype','P');
	$dutyid = getGP('did','P');
	$content = getGP('content','P');
	$progress = getGP('progress','P');
	$appendix = getGP('appendix','P');
	$note = getGP('note','P');
	$date=get_date('Y-m-d H:i:s',PHP_TIME);
	
	
	//主表信息
	$project_duty_log = array(
		'dutyid' => $dutyid,
		'content' => $content,
		'progress' => $progress,
		'appendix' => $appendix,
		'note' => $note,
		'date' => $date,
		'uid' => $_USER->id
	);
	//写入主表信息
	insert_db('project_duty_log',$project_duty_log);
	$id=$db->insert_id();
	$content=serialize($project_duty_log);
	$title='任务进度录入';
	get_logadd($id,$content,$title,33,$_USER->id);
	show_msg('任务进度录入成功！', 'admin.php?ac=duty_log&fileurl=duty&did='.getGP('did','P').'');

}

?>