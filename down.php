<?php
//下载文件
define('IN_ADMIN',True);
require_once('include/common.php');
get_login($_USER->id);
$filename=$_GET['urls'];
$phps=explode('/',$filename);
if($phps[0]!='data'){
	echo '下载失败！';
	exit;
}
header("Content-Type: application/force-download");
header("Content-Disposition: attachment; filename=".basename($filename));  
readfile($filename);
?>

