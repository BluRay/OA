
<?php
(!defined('IN_TOA') || !defined('IN_ADMIN')) && exit('Access Denied!');

get_key("office_sms_Increase");
empty($do) && $do = 'list';
if ($do == 'list') {
	include_once('template/phone_online_add.php');

} elseif ($do == 'save') {
	
    echo '<script language="javascript"> function winclose(){window.close();}</script>';
    $content=trim(preg_replace("/[\s]+/",'',getGP('content','P')));
	//for($i=1;$i<=10;$i++){
	PHONE_ADD_POST(getGP('receivephone','P'),$content,getGP('receiveperson','P'),0,0,$_USER->id);
	//}
	$content=getGP('receivephone','P').get_log(1).getGP('content','P').get_log(1).getGP('receiveperson','P').get_log(1).$_USER->id;
	$title='发送手机短信';
	get_logadd($id,$content,$title,6,$_USER->id);
	echo "手机短信己发出，3秒后窗口自动关闭！";
	echo '<script language="JavaScript">window.setTimeout(winclose,1*3*1000);</script>';
	//echo '<script language="JavaScript">window.close()/script>';

} 
?>