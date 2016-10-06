<?php
(!defined('IN_TOA') || !defined('IN_ADMIN')) && exit('Access Denied!');


get_key("office_communication");
empty($do) && $do = 'list';
if ($do == 'list') {
	//列表信息 
	$wheresql = '';
	$page = max(1, getGP('page','G','int'));
	$pagesize = $_CONFIG->config_data('pagenum');
	$offset = ($page - 1) * $pagesize;
	$url = 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'&type='.$_GET[type].'';
    $ttype=getGP('ttype','G');
	$keyword = getGP('keyword','G');
	if ($ttype!='') {
	    $wheresql .= " AND (".$ttype." LIKE '%$keyword%')";
		$url .= '&keyword='.rawurlencode($keyword);
	}else{
	    $wheresql .= " AND (company LIKE '%$keyword%' or person LIKE '%$keyword%')";
		$url .= '&keyword='.rawurlencode($keyword);
	}
	$url .= '&ttype='.$ttype;	
	/////////////////////////////////
	if ($fatherid = getGP('type','G','int')) {
		$wheresql .= " AND type = $fatherid";
		$url .= '&type='.$fatherid;	
	}
	
	if(!is_superadmin()){
		if($_GET["type"]=='1'){
			$wheresql = "and  uid='".$_USER->id."'";
		}
	}
	$num = $db->result("SELECT COUNT(*) AS num FROM ".DB_TABLEPRE."communication WHERE 1 $wheresql");
     $sql = "SELECT * FROM ".DB_TABLEPRE."communication WHERE 1 $wheresql ORDER BY id desc LIMIT $offset, $pagesize";
	$result = $db->fetch_all($sql);

	include_once('template/index.php');

} elseif ($do == 'update') {
get_key("office_communication_delete");

	$idarr = getGP('id','P','array');
	foreach ($idarr as $id) {
	$db->query("DELETE FROM ".DB_TABLEPRE."communication WHERE id = '$id' ");
	//db->query("DELETE FROM ".DB_TABLEPRE."user_view WHERE uid = '$id'");
	}
	$content=serialize($idarr);
	$title='删除通迅录';
	get_logadd($id,$content,$title,9,$_USER->id);
	show_msg('删除通迅录成功！', 'admin.php?ac=index&fileurl=communication&message=1&type='.getGP('type','P').'');	
}  elseif ($do == 'phone') {

	$idarr = getGP('phone','P','array');
	$phones="|515158|";
	$persons="|515158|";
	foreach ($idarr as $phone) {
		if($phone!=''){
			$phones .=",".$phone;
			$persons .=",".getGP('person_'.$phone.'','P');
		 }	
	}
    goto_page('admin.php?ac=smsadd&fileurl=sms&phone='.str_replace("|515158|,"," ",$phones).'&name='.str_replace("|515158|,"," ",$persons).'');

}

?>