<?php
/*
	[Office 515158] (C) 2009-2012 天生创想 Inc.
	$Id: mana_plugin.php 1209087 2012-01-08 08:58:28Z baiwei.jiang $
*/
(!defined('IN_TOA') || !defined('IN_ADMIN')) && exit('Access Denied!');
get_key("config_inc");
empty($do) && $do = 'list';
if ($do == 'list') {
	$page = max(1, getGP('page','G','int'));
	$pagesize = $_CONFIG->config_data('pagenum');
	$offset = ($page - 1) * $pagesize;
	$url = 'admin.php?ac='.$ac.'&fileurl='.$fileurl;
	$num = $db->result("SELECT COUNT(*) AS num FROM ".DB_TABLEPRE."plugin order by id asc");
	$sql = "SELECT * FROM ".DB_TABLEPRE."plugin order by id asc LIMIT $offset, $pagesize";
	$result = $db->fetch_all($sql);
	include_once('template/plugin.php');
} 
?>