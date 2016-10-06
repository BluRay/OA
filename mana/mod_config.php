<?php
/*
	[Office 515158] (C) 2009-2012 天生创想 Inc.
	$Id: config_index.php 1209087 2012-01-08 08:58:28Z baiwei.jiang $
*/
(!defined('IN_TOA') || !defined('IN_ADMIN')) && exit('Access Denied!');
get_key("config_inc");
empty($do) && $do = 'list';
if ($do == 'list') {
	include_once('template/config.php');
} elseif ($do == 'save') {
	
	get_key("config_inc");
	$namearr = getGP('name','P','array');
	$valuearr = getGP('value','P','array');
	foreach ($namearr as $name) {
		if ($result = $db->fetch_one_array("SELECT * FROM ".DB_TABLEPRE."config WHERE name = '".$name."' ")){
			$config = array(
				'value' => $valuearr[$name]
			);
			update_db('config',$config, array('name'=>$name));
		
		}else{
			$config = array(
				'name' => $name,
				'value' => $valuearr[$name]
			);
			insert_db('config',$config);
		}
	}
	$content=serialize($config);
	$title='系统设置';
	get_logadd(1,$content,$title,1,$_USER->id);
	oa_mana_recache('config','name','name');
	show_msg('配置信息更新成功！', 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'');	

} 
?>