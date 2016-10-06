<?php
(!defined('IN_TOA') || !defined('IN_ADMIN')) && exit('Access Denied!');

//if ( !is_superadmin() && !check_purview('manage_link') ) prompt('对不起，你没有权限执行本操作！');

empty($do) && $do = 'list';
if ($do == 'list') {
	//列表信息 
	$wheresql = '';
	$url = getGP('weburl','P');
	$keyword=$_POST[keyword];
	$department=$_POST[department];
	if ($keyword !='') {
		$wheresql .= " AND a.name LIKE '%$keyword%'";
		$url .= '&keyword='.rawurlencode($keyword);
	}
	if ($department!='') {
		$wheresql .= " AND b.departmentid = '".$department."'";
		$url .= '&department='.$department;	
	}
	

    $sql = "SELECT * FROM ".DB_TABLEPRE."user_view a,".DB_TABLEPRE."user b WHERE a.uid=b.id $wheresql and a.phone!=''  ORDER BY a.uid asc";
	$result = $db->fetch_all($sql);
	//公司通讯录
	if ($keyword !='') {
		$wheresql2 .= " AND ( person LIKE '%$keyword%' or company LIKE '%$keyword%')";
		$url .= '&keyword='.rawurlencode($keyword);
	}


    $sql = "SELECT * FROM ".DB_TABLEPRE."communication WHERE phone!='' ORDER BY id asc";
	$communication2 = $db->fetch_all($sql);

	include_once('template/phonesms.php');

}

?>
