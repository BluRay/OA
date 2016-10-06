<?php
/*
	[Office 515158] (C) 2009-2012 天生创想 Inc.
	$Id: mod_training_record 1209087 2012-01-08 08:58:28Z baiwei.jiang $
*/
(!defined('IN_TOA') || !defined('IN_ADMIN')) && exit('Access Denied!');
empty($do) && $do = 'list';
if($_GET['type']=='1'){
	$_check['ischeck1']='  ui-tab-trigger-item-current';
}else{
	$_check['ischeck']='  ui-tab-trigger-item-current';
}
get_key("training_record");
if ($do == 'list') {
	//列表信息
	$id= getGP('id','G','int');
	$wheresql = '';
	$page = max(1, getGP('page','G','int'));
	$pagesize = $_CONFIG->config_data('pagenum');
	$offset = ($page - 1) * $pagesize;
	$url = 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'';
	if ($user = getGP('user','G')) {
		$wheresql .= " AND user LIKE '%$user%'";
		$url .= '&user='.rawurlencode($user);
	}
	if ($price = getGP('price','G')) {
		$wheresql .= " AND price LIKE '%$price%'";
		$url .= '&price='.rawurlencode($price);
	}
	if ($organization = getGP('organization','G')) {
		$wheresql .= " AND organization LIKE '%$organization%'";
		$url .= '&organization='.rawurlencode($organization);
	}
	//时间
	$vstartdate = getGP('vstartdate','G');
	$venddate = getGP('venddate','G');
	if ($vstartdate!='' && $venddate!='') {
		$wheresql .= " AND (date>='".$vstartdate."' and date<='".$venddate."')";
		$url .= '&vstartdate='.$vstartdate.'&venddate='.$venddate;
	}
	$vuidtype = getGP('vuidtype','G');
	if ($vuidtype!='') {
		if($vuidtype=='-1'){
				$wheresql .= get_subordinate($_USER->id,'uid');
			}else{
				$wheresql .= " and uid='".$vuidtype."'";
			}
	}
	
	
	$num = $db->result("SELECT COUNT(*) AS num FROM ".DB_TABLEPRE."training_record WHERE 1 $wheresql and trainingid='".$id."' ORDER BY id desc");
    $sql = "SELECT * FROM ".DB_TABLEPRE."training_record WHERE 1 $wheresql and trainingid='".$id."' ORDER BY id desc LIMIT $offset, $pagesize";
	$result = $db->fetch_all($sql);
	include_once('template/training_recordlist.php');

}elseif ($do == 'update') {
	$idarr = getGP('id','P','array');
	foreach ($idarr as $id) {
		$db->query("DELETE FROM ".DB_TABLEPRE."training_record WHERE id = '$id'");
	}
	$content=serialize($idarr);
	$title='删除培训记录';
	get_logadd($id,$content,$title,28,$_USER->id);
	show_msg('培训记录信息删除成功！', 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'&id='.$_POST['id'].'');

}elseif ($do == 'add') {
	if($_POST['view']!=''){
		$id = getGP('id','P','int');
		if($id!=''){
			$user = check_str(getGP('user','P'));
			$trainingid = getGP('trainingid','P');
			$price = check_str(getGP('price','P'));
			$organization = check_str(getGP('organization','P'));
			$training = check_str(getGP('training','P'));
			$training_record = array(
				'user' => $user,
				'trainingid' => $trainingid,
				'price' => $price,
				'organization' => $organization,
				'training' => $training
			);
			update_db('training_record',$training_record, array('id' => $id));
			$content=serialize($training_record);
			$title='编辑培训记录';
			get_logadd($id,$content,$title,28,$_USER->id);
			
		}else{
			$user = check_str(getGP('user','P'));
			$trainingid = getGP('trainingid','P');
			$price = check_str(getGP('price','P'));
			$organization = check_str(getGP('organization','P'));
			$training = check_str(getGP('training','P'));
			$date=get_date('Y-m-d H:i:s',PHP_TIME);
			//主表信息
			$training_record = array(
				'user' => $user,
				'trainingid' => $trainingid,
				'price' => $price,
				'organization' => $organization,
				'training' => $training,
				'date' => $date,
				'uid' => $_USER->id
			);
			//写入主表信息
			insert_db('training_record',$training_record);
			$id=$db->insert_id();
			$content=serialize($training_record);
			$title='新增培训记录';
			get_logadd($id,$content,$title,28,$_USER->id);
		}
		show_msg('培训记录信息操作成功！', 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'&id='.$trainingid);
	}else{
		$id = getGP('id','G','int');
		if($id!=''){
			$user = $db->fetch_one_array("SELECT * FROM ".DB_TABLEPRE."training_record  WHERE id = '$id'  ");
			$date=$user['date'];
			$_title['name']='编辑';
		}else{ 
			$_title['name']='发布';
		}
		include_once('template/training_recordadd.php');
	}
}elseif ($do == 'views') {
			$id = getGP('id','G','int');
			if($id!=''){
				$blog = $db->fetch_one_array("SELECT * FROM ".DB_TABLEPRE."training_record  WHERE id = '$id'");
				$_title['name']='培训记录浏览';
			}
		include_once('template/training_recordviews.php');
}elseif ($do == 'excel') {
	$datename="training_".get_date('YmdHis',PHP_TIME);
	$outputFileName = 'data/excel/'.$datename.'.xls';
		$content = array();
		$archive=array("受培训人员","培训计划名称","培训费用","培训机构","培训时间","发布人");
		$content[] = $archive;
		$wheresql = '';
		if ($user = getGP('user','P')) {
			$wheresql .= " AND user LIKE '%$user%'";
			$url .= '&user='.rawurlencode($user);
		}
		if ($price = getGP('price','P')) {
			$wheresql .= " AND price LIKE '%$price%'";
			$url .= '&price='.rawurlencode($price);
		}
		if ($organization = getGP('organization','P')) {
			$wheresql .= " AND organization LIKE '%$organization%'";
			$url .= '&organization='.rawurlencode($organization);
		}
		//时间
		$vstartdate = getGP('vstartdate','P');
		$venddate = getGP('venddate','P');
		if ($vstartdate!='' && $venddate!='') {
			$wheresql .= " AND (date>='".$vstartdate."' and date<='".$venddate."')";
			$url .= '&vstartdate='.$vstartdate.'&venddate='.$venddate;
		}
		$vuidtype = getGP('vuidtype','P');
		if ($vuidtype!='') {
			if($vuidtype=='-1'){
				$wheresql .= get_subordinate($_USER->id,'uid');
			}else{
				$wheresql .= " and uid='".$vuidtype."'";
			}
		}
		$sql = "SELECT * FROM ".DB_TABLEPRE."training_record WHERE 1 $wheresql   ORDER BY id desc";
		$result = $db->query($sql);
		while ($row = $db->fetch_array($result)) {	
			$archive = array(
				"".$row[user]."",
				"".GET_INC_TRAINING_RECOR_NAME($row[trainingid])."",
				"".$row[price]."",
				"".$row[organization]."",
				"".str_replace("-",".",$row[training])."",
				"".get_realname($row['uid']).""
			);
			$content[] = $archive;
		}
	$excel = new ExcelWriter($outputFileName);
	if($excel==false) 
		echo $excel->error; 
	foreach($content as $v){
		$excel->writeLine($v);
	}
	$excel->sendfile($outputFileName);
}
?>