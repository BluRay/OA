<?php

/*
	[Office 515158] (C) 2009-2012 天生创想 Inc.
	$Id: mod_data 1209087 2012-01-08 08:58:28Z baiwei.jiang $
*/
(!defined('IN_TOA') || !defined('IN_ADMIN')) && exit('Access Denied!');

empty($do) && $do = 'list';
//初使化数据库
$dbhost = DB_HOST;		// 数据库服务器
$dbuser = DB_USER;			// 数据库用户名
$dbpwd = DB_PWD;				// 数据库密码
$dbname = DB_NAME;		// 数据库名
include("include/dbbackup.class.php");
include("include/msg.class.php");
$dbbackup = new dbbackup($dbhost, $dbuser, $dbpwd, $dbname);
$msg = new msg();
$tbs = $dbbackup->get_tb();
$bakfile = $dbbackup->get_backup();
if ($do == 'list') {
	get_key("config_db");
	include_once('template/data.php');
} elseif ($do == 'save') {

	$data = $dbbackup->get_backupdata($_POST['choice']);	//获取备份数据
			if($dbbackup->export($data)){							//导入数据
				$bakfn = $msg->get_fn($dbbackup->bakfn);			//取得备份文件名
				show_msg('恭喜您备份成功,备份文件保存在data/db目录下！', 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'&do=data_import');
			}
		

}elseif($do == 'data_import') {
	get_key("config_db_old");
	include_once('template/data_import.php');
}elseif($do == 'import_save') {
	if($dbbackup->import($_GET['fn'])){				//导入数据
	
			show_msg('恭喜您备份还原成功！', 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'&do=data_import');
		}
}elseif($do == 'update') {
	echo $dbbackup->del($_POST['choice'])? show_msg('备份删除成功！', 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'&do=data_import'): show_msg('备份删除失败！', 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'&do=data_import');
}
?>