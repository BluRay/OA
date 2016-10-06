<?php
/*
	[Office 515158] (C) 2009-2012 天生创想 Inc.
	$Id: common.php 1209087 2012-01-08 08:58:28Z baiwei.jiang $
*/
error_reporting(0);
set_magic_quotes_runtime(0);
function_exists('date_default_timezone_set') && date_default_timezone_set('Etc/GMT+0');
$defined_vars = get_defined_vars();
foreach ($defined_vars as $key => $val) {
	if ( !in_array($key, array('_GET', '_POST', '_COOKIE', '_FILES', 'GLOBALS', '_SERVER')) ) {
		${$key} = '';
		unset(${$key});
	}
}
unset($defined_vars);
if (isset($_GET['GLOBALS']) || isset($_POST['GLOBALS']) || isset($_COOKIE['GLOBALS']) || isset($_SERVER['GLOBALS']) || isset($_SESSION['GLOBALS']) || isset($_FILES['GLOBALS'])) {
	exit;
}
define('IN_TOA',True);
define('TOA_ROOT',str_replace('\\','/',substr(dirname(__FILE__),0,-7)));
define('CACHE_ROOT',TOA_ROOT.'cache/');
define('PHP_TIME',time());
@header("content-Type: text/html; charset=utf-8");
$mtime = explode(' ',microtime());
$starttime = $mtime[0] + $mtime[1];
require(TOA_ROOT.'include/function_cache.php');
require(TOA_ROOT.'include/function_version.php');
require(TOA_ROOT.'include/function_global.php');
define('template',TOA_ROOT.'template/default/');
if ( !get_magic_quotes_gpc() ) {
	$_GET = add_slashes($_GET);
	$_POST = add_slashes($_POST);
	$_COOKIE = add_slashes($_COOKIE);
}
$_FILES = add_slashes($_FILES);
!$_SERVER['PHP_SELF'] && $_SERVER['PHP_SELF'] = $_SERVER['SCRIPT_NAME'];
$superadmin = '';
require(TOA_ROOT.'config.php');
require(TOA_ROOT.'include/class_mysql.php');
require(TOA_ROOT.'include/class_user.php');
require(TOA_ROOT.'include/class_config.php');
require(TOA_ROOT.'include/function_common.php');
require(TOA_ROOT.'include/excel_writer.class.php');
require(TOA_ROOT.'include/class_Utility.php');
require(TOA_ROOT.'include/class_ugcode.php');
require(TOA_ROOT.'include/sms.class.php');
require(TOA_ROOT.'include/class_ads.php');
require(TOA_ROOT.'include/word.class.php');
$db = new Mysql();
$db->connect(DB_HOST, DB_USER, DB_PWD, DB_NAME, DB_PCONNECT);
$_CONFIG=new config();
$_ADS=new ads();
$_USER = new User();
$_CACHE = $_FILTER = $_FILTER_SORT = $_ACTION = array();
obstart();
?>