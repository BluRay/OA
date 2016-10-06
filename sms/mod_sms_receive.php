<?php
(!defined('IN_TOA') || !defined('IN_ADMIN')) && exit('Access Denied!');

get_key("office_info");
empty($do) && $do = 'list';
if ($do == 'list') {
    //$db->query("UPDATE ".DB_TABLEPRE."sms_receive SET online='1'");
	$sms_receive = array(
		'online' => '1'
	);
	update_db('sms_receive',$sms_receive, array('receiveperson' => $_USER->id));
	$wheresql = '';
	$page = max(1, getGP('page','G','int'));
	$pagesize = 20;
	$offset = ($page - 1) * $pagesize;
	$url = 'admin.php?ac=sms_receive&fileurl=sms';
	$wheresql .= " AND receiveperson='".$_USER->id."'";
	if ($type = getGP('type','G')) {
		$wheresql .= " AND type ='".$_GET["type"]."'";
		$url .= '&type='.rawurlencode($type);
	}
	

	$num = $db->result("SELECT COUNT(*) AS num FROM ".DB_TABLEPRE."sms_receive WHERE 1 $wheresql and smskey='1' ORDER BY smskey asc, id desc");
     $sql = "SELECT * FROM ".DB_TABLEPRE."sms_receive WHERE 1 $wheresql and smskey='1' ORDER BY smskey asc, id desc LIMIT $offset, $pagesize";
	 $result = $db->fetch_all($sql);

	include_once('template/sms_receive.php');

} elseif ($do == '删 除') {
	
    get_key("office_info_delete");
	$idarr = getGP('id','P','array');
	foreach ($idarr as $id) {
	$db->query("DELETE FROM ".DB_TABLEPRE."sms_receive WHERE id = '$id'  ");
	//db->query("DELETE FROM ".DB_TABLEPRE."user_view WHERE uid = '$id'");
		
	}
	goto_page('admin.php?ac=sms_receive&fileurl=sms&message=1&type='.$_GET["type"].'');

}
elseif ($do == '标志为己读') {
	
    $idarr = getGP('id','P','array');
	foreach ($idarr as $id) {
	$sms_receive = array(
		'smskey' => 2
	);
	update_db('sms_receive',$sms_receive, array('id' => $id));
	}
	goto_page('admin.php?ac=sms_receive&fileurl=sms&message=1&type='.$_GET["type"].'');

}


?>