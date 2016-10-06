<?php
/*
	[Office 515158] (C) 2009-2012 天生创想 Inc.
	$Id: mod_usergroup 1209087 2012-01-08 08:58:28Z baiwei.jiang $
*/
(!defined('IN_TOA') || !defined('IN_ADMIN')) && exit('Access Denied!');
get_key("config_usergroup");
empty($do) && $do = 'list';
$message = array(
	1 => '成功添加一个用户组。',
	2 => '成功编辑一个用户组。',
	3 => '成功删除选中的用户组。',
	4 => '请选择要删除的用户组。',
);
$_check['ischeck']='  ui-tab-trigger-item-current';
if ($do == 'list') {

	$wheresql = '';
	if ( $keyword = getGP('keyword','G') ) {
		$wheresql .= " AND groupname LIKE '%$keyword%'";
		$url .= '&keyword='.rawurlencode($keyword);
	}
	
	$sql = "SELECT * FROM ".DB_TABLEPRE."usergroup WHERE 1 $wheresql ";
	$query = $db->query($sql);
	$result = array();
	while ($row = $db->fetch_array($query)) {
		$row['usercount'] = $db->result("SELECT COUNT(*) AS num FROM ".DB_TABLEPRE."user WHERE groupid = '$row[id]'");
		$result[] = $row;
	}
	include_once('template/usergroup.php');

}elseif ($do == 'edit') {
	
	get_key("config_usergroup_edit");
	$id = getGP('id','G','int');
	$usergroup = $db->fetch_one_array("SELECT * FROM ".DB_TABLEPRE."usergroup WHERE id = '$id' ");
	$purview = unserialize($usergroup['purview']);
	function checked($pv, $n) {
		global $purview;
		if (array_key_exists($pv, $purview) && $purview[$pv]) {
			echo $n == 1 ? 'checked="checked"' : '';
		} else {
			echo $n == 0 ? 'checked="checked"' : '';
		}
	}
	$_title['name']='编辑';
	include_once('template/usergroupadd.php');

} elseif ($do == 'save') {
	
	$id = getGP('id','P','int');
	$savetype = getGP('savetype','P');
	$name = getGP('groupname','P');
	$purview = getGP('purview','P','array');
	$usergroup = array(
		'groupname' => $name,
		'purview' => serialize($purview)
	);
	if ($savetype == 'new') {
		
	} elseif ($savetype == 'edit') {
		update_db('usergroup',$usergroup, array('id' => $id));
		usergroup_recache();
		if($id!=''){
			$content=serialize($usergroup);
			$title='修改用户组';
			get_logadd($id,$content,$title,2,$_USER->id);
		}
		show_msg('权限组信息操作成功！', 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'');
	}

} elseif ($do == 'update') {
	
	get_key("config_usergroup_delete");
	$idarr = getGP('id','P','array');
	if (count($idarr)) {
		foreach ($idarr as $id) {
			$db->query("DELETE FROM ".DB_TABLEPRE."usergroup WHERE `type` = 'user' AND id = '$id' ");
		}
	} else {
		prompt($message[4]);
	}
	usergroup_recache();
	if($id!=''){
		$content=serialize($idarr);
		$title='删除用户组';
		get_logadd($id,$content,$title,2,$_USER->id);
	}
	show_msg('权限组信息删除成功！', 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'');

}