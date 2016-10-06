<?php
(!defined('IN_TOA') || !defined('IN_ADMIN')) && exit('Access Denied!');
get_key("office_duty_reda");

empty($do) && $do = 'list';
if ($do == 'list') {
	$id = getGP('id','G','int');
	$did = getGP('did','G','int');
	$blog = $db->fetch_one_array("SELECT * FROM ".DB_TABLEPRE."project_duty  WHERE id = '$did'");
	include_once('template/duty_views.php');

}
?>