<?php
(!defined('IN_TOA') || !defined('IN_ADMIN')) && exit('Access Denied!');

get_key("office_communication");
empty($do) && $do = 'list';
if ($do == 'list') {
	//列表信息 
	$wheresql = '';
	$page = max(1, getGP('page','G','int'));
	$pagesize = $_CONFIG->config_data('pagenum');
	$offset = ($page - 1) * $pagesize;
	$url = 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'';
	if ($keyword = getGP('keyword','G')) {
		$wheresql .= " AND (b.name LIKE '%$keyword%' OR a.username LIKE '%$keyword%')";
		$url .= '&keyword='.rawurlencode($keyword);
	}
	if ($department = getGP('department','G','int')) {
		$wheresql .= " AND a.departmentid = $department";
		$url .= '&department='.$department;	
	}
	if ($usergroup = getGP('usergroup','G','int')) {
		$wheresql .= " AND a.groupid = $usergroup";
		$url .= '&usergroup='.$usergroup;	
	}
	$num = $db->result("SELECT COUNT(*) AS num FROM ".DB_TABLEPRE."user a,".DB_TABLEPRE."user_view b WHERE a.id=b.uid $wheresql");
     $sql = "SELECT * FROM ".DB_TABLEPRE."user a,".DB_TABLEPRE."user_view b WHERE a.id=b.uid $wheresql ORDER BY a.id ASC LIMIT $offset, $pagesize";
	$result = $db->fetch_all($sql);
	include_once('template/user.php');
} 

//读取上级部门
function get_father($fid)
{
    global $db;
	$query = $db->query("SELECT name FROM ".DB_TABLEPRE."department where id='".$fid."'  ORDER BY id desc limit 0,1");
	while ($rowuser = $db->fetch_array($query)) {
	$html .= $rowuser[name];
	}
	return $html;
}
//汇总下级部门
function get_father_sum($fid)
{
    global $db;
	$query = $db->query("SELECT COUNT(*) AS num FROM ".DB_TABLEPRE."department where father='$fid' ");
	while ($rowuser = $db->fetch_array($query)) {
	$html .= $rowuser[num];
	}
	return $html;
}

?>