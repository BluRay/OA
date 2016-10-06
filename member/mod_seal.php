<?php
/*
	[Office 515158] (C) 2009-2012 天生创想 Inc.
	$Id: mod_eseal 1209087 2012-01-08 08:58:28Z baiwei.jiang $
*/
(!defined('IN_TOA') || !defined('IN_ADMIN')) && exit('Access Denied!');

empty($do) && $do = 'list';
if ($do == 'list') {
	//列表信息 
	$wheresql = '';
	$page = max(1, getGP('page','G','int'));
	$pagesize = $_CONFIG->config_data('pagenum');
	$offset = ($page - 1) * $pagesize;
	$url = 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'';
	$num = $db->result("SELECT COUNT(*) AS num FROM ".DB_TABLEPRE."seal where uid='".$_USER->id."' and sealtype='1' ");
    $sql = "SELECT * FROM ".DB_TABLEPRE."seal where uid='".$_USER->id."'  and sealtype='1'  ORDER BY id desc LIMIT $offset, $pagesize";
	$result = $db->fetch_all($sql);
	include_once('template/seal.php');

} elseif ($do == 'update') {
	$idarr = getGP('id','P','array');
	foreach ($idarr as $id) {
		$db->query("DELETE FROM ".DB_TABLEPRE."seal WHERE id = '$id'");	
	}
	
	show_msg('印鉴信息删除成功！', 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'');

} elseif ($do == 'add') {
	if($_POST['view']!=''){
		$id = getGP('id','P','int');
		if($id!=''){
			$sealurl = trim(getGP('sealurl','P'));
			$sealtitle = check_str(getGP('sealtitle','P'));
			$seal = array(
				'sealurl' => $sealurl,
				'sealtitle' => $sealtitle
			);
			update_db('seal',$seal, array('id' => $id));
		}else{
			$sealurl = trim(getGP('sealurl','P'));
			$sealtitle = check_str(getGP('sealtitle','P'));
			$seal = array(
				'sealurl' => $sealurl,
				'sealtitle' => $sealtitle,
				'date' => get_date('Y-m-d H:i:s',PHP_TIME),
				'uid'=>$_USER->id,
				'sealtype' => '1'
			);
			insert_db('seal',$seal);
		}
		show_msg('印鉴信息操作成功！', 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'');
	}else{
		$id = getGP('id','G','int');
		if($id!=''){
			$user = $db->fetch_one_array("SELECT * FROM ".DB_TABLEPRE."seal WHERE id = '$id' ");
			$_title['name']='编辑';
		}else{
			$_title['name']='发布';
		}
		include_once('template/sealadd.php');
		
	}
	
}

?>