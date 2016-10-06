<?php
(!defined('IN_TOA') || !defined('IN_ADMIN')) && exit('Access Denied!');
get_key("office_duty_sum");
function get_reallists($fid=0)
{
    global $db;
	$html='';
	$query = $db->query("SELECT title FROM ".DB_TABLEPRE."project_duty where id='".$fid."'   ORDER BY id desc limit 0,1");
	while ($rowuser = $db->fetch_array($query)) {
	$html .= $rowuser[title];
	}
	return $html;
}

empty($do) && $do = 'list';
if ($do == 'list') {
    $id = getGP('id','G','int');
	//列表信息 
	$wheresql = '';
	$page = max(1, getGP('page','G','int'));
	$pagesize = $_CONFIG->config_data('pagenum');
	$offset = ($page - 1) * $pagesize;
	$url = 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'';
	if (getGP('did','G')!='') {
		$wheresql .= " AND dutyid='".getGP('did','G')."'";
		$url .= '&did='.rawurlencode(getGP('did','G'));
	}
	
	
	$num = $db->result("SELECT COUNT(*) AS num FROM ".DB_TABLEPRE."project_duty_log WHERE 1 $wheresql ");
     $sql = "SELECT * FROM ".DB_TABLEPRE."project_duty_log WHERE 1 $wheresql  ORDER BY id desc LIMIT $offset, $pagesize";
	$result = $db->fetch_all($sql);

	include_once('template/duty_log.php');

} elseif ($do == 'update') {
	
	$idarr = getGP('id','P','array');
	foreach ($idarr as $id) {
		$db->query("DELETE FROM ".DB_TABLEPRE."project_duty_log WHERE id= '$id'  ");	
	}
	$content=serialize($idarr);
	$title='删除任务进度信息';
	get_logadd($id,$content,$title,33,$_USER->id);
	show_msg('删除任务进度信息成功！', 'admin.php?ac=duty_log&fileurl=duty&did='.getGP('did','P').'');

} 
?>