
<?php
(!defined('IN_TOA') || !defined('IN_ADMIN')) && exit('Access Denied!');

get_key("office_info_Increase");
empty($do) && $do = 'list';
if ($do == 'list') {
	include_once('template/online_add.php');

} elseif ($do == 'save') {
	
    echo '<script language="javascript"> function winclose(){window.close();}</script>';
    $receiveperson = getGP('receiveperson','P');
	$content = getGP('content','P');
	//接收人；内容；类型（1：有返回回值;0：无返回值）;URL
	SMS_ADD_POST($receiveperson,$content,0,0,$_USER->id);
	echo "短消息发送成功，3秒后窗口自动关闭！";
	echo '<script language="JavaScript">window.setTimeout(winclose,1*3*1000);</script>';
	//echo '<script language="JavaScript">window.close()/script>';

} 
?>