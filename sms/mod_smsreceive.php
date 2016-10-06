<?php
(!defined('IN_TOA') || !defined('IN_ADMIN')) && exit('Access Denied!');
if(!is_superadmin()){
prompt('对不起，你没有权限执行本操作！');
}
get_key("office_sms_read");
empty($do) && $do = 'list';
if ($do == 'list') { 
	global $db;
	$blog = $db->fetch_one_array("SELECT * FROM ".DB_TABLEPRE."phone_channel where id=1 and pkey='1' and (type='2' or type='3')   order by id desc");
	//获取账户信息
	$username=$blog["username"];
	$password=$blog["password"];
	$connection=explode('#515158#',$blog["connection"]);
	$sms_add=explode('#01',$connection[3]);
	$phoneurl=$sms_add[0].trim($username).$sms_add[1].trim($password);
	$res = Utility::HttpRequest($phoneurl);
	$rqnum=explode('||',$res);
	for($i=0;$i<sizeof($rqnum);$i++)
	{   $revalue=explode('#',$rqnum[$i]);
	    if($rqnum[$i]!=''){
		$phone_receive = array(
		'content' =>u8gb($revalue[1]),
		'sendphone' =>$revalue[0],
		'date' =>$revalue[2]
	);
	//接收消息表
	insert_db('phone_receive',$phone_receive);
	}
	}
	//////////////////////////////////////////////
	//读数据
	//列表信息 
	$wheresql = '';
	$page = max(1, getGP('page','G','int'));
	$pagesize = 20;
	$offset = ($page - 1) * $pagesize;
	$url = 'admin.php?ac=smsreceive&fileurl=sms';
	
	
	$num = $db->result("SELECT COUNT(*) AS num FROM ".DB_TABLEPRE."phone_receive WHERE 1 $wheresql ");
    $sql = "SELECT * FROM ".DB_TABLEPRE."phone_receive WHERE 1 $wheresql ORDER BY id desc LIMIT $offset, $pagesize";
	$result = $db->fetch_all($sql);

	include_once('template/smsreceive.php');

} elseif ($do == '删 除') {
	
   get_key("office_sms_delete");
	$idarr = getGP('id','P','array');
	foreach ($idarr as $id) {
	$db->query("DELETE FROM ".DB_TABLEPRE."phone_receive WHERE id = '$id'  ");
	//db->query("DELETE FROM ".DB_TABLEPRE."user_view WHERE uid = '$id'");
		
	}
	goto_page('admin.php?ac=smsreceive&fileurl=sms&message=1');

} 
?>