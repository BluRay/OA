<?php
 /*
	[Office 515158] (C) 2009-2012 天生创想 Inc.
	$Id: user_count.php 1209087 2012-01-08 08:58:28Z baiwei.jiang $
*/
define('IN_ADMIN',True);
require_once('../include/common.php');
get_login($_USER->id);
//更新在线数据到数据库中
$blog = $db->fetch_one_array("SELECT * FROM ".DB_TABLEPRE."online where uid='".$_USER->id."'  ");
	if($blog["uid"]!=''){
		$online = array(
			'startdate' => get_date('Y-m-d H:i:s',PHP_TIME),
			'enddate' => get_date('Y-m-d H:i:s',PHP_TIME+600)
		);
		update_db('online',$online, array('uid' => $_USER->id));
	}else{
		$online = array(
			'uid' => $_USER->id,
			'startdate' => get_date('Y-m-d H:i:s',PHP_TIME),
			'enddate' => get_date('Y-m-d H:i:s',PHP_TIME+600)
		);
		insert_db('online',$online);
	}
//更新在线状态
global $db;
$query = $db->query("SELECT * FROM ".DB_TABLEPRE."online   order by id desc");
	while ($row = $db->fetch_array($query)) {
		$uid=$row['uid'];
		if($row["enddate"]>=get_date('Y-m-d H:i:s',PHP_TIME)){
			$user  = array(
				'online' => 1
			);
			update_db('user',$user , array('id' => $uid));
		}else{
			$user  = array(
				'online' => 0
			);
			update_db('user',$user , array('id' => $uid));
		}
	}
//更新数据后取出当前总在线人数
$blog = $db->fetch_one_array("SELECT COUNT(*) as online FROM ".DB_TABLEPRE."user WHERE online='1'  ");
echo $blog["online"];
exit;
?>