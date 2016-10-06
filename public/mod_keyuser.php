<?php
/*
	[Office 515158] (C) 2009-2012 天生创想 Inc.
	$Id: oa 1209087 2012-01-08 08:58:28Z baiwei.jiang $
*/
(!defined('IN_TOA') || !defined('IN_ADMIN')) && exit('Access Denied!');

//if ( !is_superadmin() && !check_purview('manage_link') ) prompt('对不起，你没有权限执行本操作！');

empty($do) && $do = 'list';
if ($do == 'list') {
	//列表信息 
	$wheresql = '';
	$sql = "SELECT keytypeuser,keytype FROM ".DB_TABLEPRE."user where id='".$_USER->id."' and keytype!='2'";
	if($rows = $db->fetch_one_array($sql)){
		$keytype=$rows['keytype'];
		$keytypeuser=$rows['keytypeuser'];
	}
	if($keytype!='3'){
		$wheresql .= " AND b.name in('".str_replace(",","','",$keytypeuser)."')";
	}
	if ($name = getGP('name','G')) {
		$wheresql .= " AND b.name LIKE'%".$name."%'";
	}
    $sql = "SELECT a.id,b.name FROM ".DB_TABLEPRE."user a,".DB_TABLEPRE."user_view b  WHERE 1 $wheresql  and a.id=b.uid ORDER BY numbers asc LIMIT 600";
	$result = $db->fetch_all($sql);
	include_once('template/keyuser.php');

}elseif($do='add'){
	$idarr = getGP('uid','P','array');
	foreach ($idarr as $id) {
		global $db;
		$sql = "SELECT name,uid FROM ".DB_TABLEPRE."user_view where uid='".$id."'";
		if($row = $db->fetch_one_array($sql)){
			$uid.=$row['uid'].',';
			$name.=$row['name'].',';
		}
	}
	echo "<script>window.opener.document.save.ui.value='".substr($uid, 0, -1)."';</script>";
	echo "<script>window.opener.document.save.un.value='".substr($name, 0, -1)."';</script>";
	echo '<script language="JavaScript">window.close()</script>';
}
?>
