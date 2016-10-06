<?php
/*
	[Office 515158] (C) 2009-2012 天生创想 Inc.
	$Id: oa 1209087 2012-01-08 08:58:28Z baiwei.jiang $
*/

(!defined('IN_TOA') || !defined('IN_ADMIN')) && exit('Access Denied!');

//if ( !is_superadmin() && !check_purview('manage_link') ) prompt('对不起，你没有权限执行本操作！');

empty($do) && $do = 'list';
if ($do == 'list') {
	//列表信息 
	$wheresql = '';
	$url = getGP('weburl','P');
	$keyword=$_POST[keyword];
	$department=$_POST[department];
	if($_GET['user']!=''){
		$user=$_GET['user'];
	}else{
		$user=$_POST['user'];
	}
	if($user!=''){
		$users="'".str_replace(",","','",$user)."'";
	}
	if ($user !='') {
		$wheresql .= " AND a.name in(".$users.")";
	}
	if ($keyword !='') {
		$wheresql .= " AND a.name LIKE '%$keyword%'";
		$url .= '&keyword='.rawurlencode($keyword);
	}
	if ($department!='') {
		$wheresql .= " AND b.departmentid = '".$department."'";
		$url .= '&department='.$department;	
	}
	$wheresql .= " ";
    $sql = "SELECT * FROM ".DB_TABLEPRE."user_view a,".DB_TABLEPRE."user b WHERE a.uid=b.id $wheresql  ORDER BY b.numbers asc";
	$result = $db->fetch_all($sql);
	include_once('template/user_radio.php');

}elseif($do='add'){
	if(getGP('inputname','P')!=''){
		$participation=getGP('inputname','P');
	}else{
		$participation='participation';
	}
	$puboaid="0";
	$puboaname="0";
	$puboaphone="0";
	$department = $_POST['vid'];   
	for($i=0;$i<count($department);$i++){
		$puboaid=$puboaid.",".$_POST['oaid'.$department[$i].''];
		$puboaname=$puboaname.",".$_POST['oaname'.$department[$i].''];
		$puboaphone=$puboaphone.",".$_POST['oaphone'.$department[$i].''];
	}
	echo "<script>window.opener.document.save.".$participation.".value='".str_replace("0,"," ",$puboaname)."';</script>";
	echo "<script>window.opener.document.save.".$participation."id.value='".str_replace("0,"," ",$puboaid)."';</script>";
	echo "<script>window.opener.document.save.".$participation."phone.value='".str_replace("0,"," ",$puboaphone)."';</script>";
	echo '<script language="JavaScript">window.close()</script>';
}

?>
