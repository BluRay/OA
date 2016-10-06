<?php
/*
	[Office 515158] (C) 2009-2012 天生创想 Inc.
	$Id: mod_humancontract 1209087 2012-01-08 08:58:28Z baiwei.jiang $
*/
(!defined('IN_TOA') || !defined('IN_ADMIN')) && exit('Access Denied!');
empty($do) && $do = 'list';
if($_GET['ischeck']!=''){
	$_check['ischeck'.$_GET['ischeck'].'']='  ui-tab-trigger-item-current';
}else{
	$_check['ischeck']='  ui-tab-trigger-item-current';
}
get_key("humancontract_");
if ($do == 'list') {
	//列表信息 
	$wheresql = '';
	$page = max(1, getGP('page','G','int'));
	$pagesize = $_CONFIG->config_data('pagenum');
	$offset = ($page - 1) * $pagesize;
	$url = 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'';
	if ($userid = getGP('userid','G')) {
		$wheresql .= " AND userid ='".$userid."'";
		$url .= '&userid='.rawurlencode($userid);
	}
	if ($number = getGP('number','G')) {
		$wheresql .= " AND number ='".$number."'";
		$url .= '&number='.rawurlencode($number);
	}
	if ($type = getGP('type','G')) {
		$wheresql .= " AND type ='".$type."'";
		$url .= '&type='.rawurlencode($type);
	}
	if ($ckey = getGP('ckey','G')) {
		$wheresql .= " AND ckey ='".$ckey."'";
		$url .= '&ckey='.rawurlencode($ckey);
	}
	if ($signdate = getGP('signdate','G')) {
		$wheresql .= " AND signdate ='".$signdate."'";
		$url .= '&signdate='.rawurlencode($signdate);
	}
	if ($testdate = getGP('testdate','G')) {
		$wheresql .= " AND testdate ='".$testdate."'";
		$url .= '&testdate='.rawurlencode($testdate);
	}
	if ($testenddate = getGP('testenddate','G')) {
		$wheresql .= " AND testenddate ='".$testenddate."'";
		$url .= '&testenddate='.rawurlencode($testenddate);
	}
	if ($signenddate = getGP('signenddate','G')) {
		$wheresql .= " AND signenddate ='".$signenddate."'";
		$url .= '&signenddate='.rawurlencode($signenddate);
	}
	$vuidtype = getGP('vuidtype','G');
	if ($vuidtype!='') {
		if($vuidtype=='-1'){
				$wheresql .= get_subordinate($_USER->id,'uid');
			}else{
				$wheresql .= " and uid='".$vuidtype."'";
			}
	}
	
	

	$num = $db->result("SELECT COUNT(*) AS num FROM ".DB_TABLEPRE."humancontract WHERE 1 $wheresql ORDER BY id desc");
    $sql = "SELECT * FROM ".DB_TABLEPRE."humancontract WHERE 1 $wheresql ORDER BY id desc LIMIT $offset, $pagesize";
	$result = $db->fetch_all($sql);
	include_once('template/humancontractlist.php');

}elseif ($do == 'update') {
	
	get_key("humancontract_d");
	$idarr = getGP('id','P','array');
	foreach ($idarr as $id) {
		$db->query("DELETE FROM ".DB_TABLEPRE."humancontract WHERE id = '$id'  ");
	}
	$content=serialize($idarr);
	$title='删除人事合同信息';
	get_logadd($id,$content,$title,26,$_USER->id);
	show_msg('人事合同信息删除成功！', 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'');

}elseif ($do == 'add') {
	
	if($_POST['view']!=''){
		$id = getGP('id','P','int');
		if($id!=''){
			$userid = getGP('userid','P');
			$number = check_str(getGP('number','P'));
			$type = getGP('type','P');
			$ckey = getGP('ckey','P');
			$signdate = getGP('signdate','P');
			$testdate = getGP('testdate','P');
			$testday = getGP('testday','P');
			$testenddate = getGP('testenddate','P');
			$signnum = getGP('signnum','P');
			$appendix = getGP('appendix','P');
			$content = getGP('content','P');
			$signenddate = getGP('signenddate','P');
			$humancontract = array(
				'userid' => $userid,
				'number' => $number,
				'type' => $type,
				'ckey' => $ckey,
				'signdate' => $signdate,
				'testdate' => $testdate,
				'testday' => $testday,
				'testenddate' => $testenddate,
				'signnum' => $signnum,
				'appendix' => $appendix,
				'content' => $content,
				'signenddate' => $signenddate
			);
			update_db('humancontract',$humancontract, array('id' => $id));
			$content=serialize($humancontract);
			$title='修改人事合同';
			get_logadd($id,$content,$title,26,$_USER->id);
			
		}else{
			$userid = getGP('userid','P');
			$number = getGP('number','P');
			$type = getGP('type','P');
			$ckey = getGP('ckey','P');
			$signdate = getGP('signdate','P');
			$testdate = getGP('testdate','P');
			$testday = getGP('testday','P');
			$testenddate = getGP('testenddate','P');
			$signnum = getGP('signnum','P');
			$appendix = getGP('appendix','P');
			$content = getGP('content','P');
			$signenddate = getGP('signenddate','P');
			$udate=get_date('Y-m-d H:i:s',PHP_TIME);
			$humancontract = array(
				'userid' => $userid,
				'number' => $number,
				'type' => $type,
				'ckey' => $ckey,
				'signdate' => $signdate,
				'testdate' => $testdate,
				'testday' => $testday,
				'testenddate' => $testenddate,
				'signnum' => $signnum,
				'appendix' => $appendix,
				'content' => $content,
				'signenddate' => $signenddate,
				'date' => $udate,
				'uid' => $_USER->id
			);
			//写入主表信息
			insert_db('humancontract',$humancontract);
			$id=$db->insert_id();
			$content=serialize($humancontract);
			$title='添加新人事合同';
			get_logadd($id,$content,$title,26,$_USER->id);
		}
		show_msg('人事合同信息操作成功！', 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'');
	}else{
		$id = getGP('id','G','int');
		if($id!=''){
			$blog = $db->fetch_one_array("SELECT * FROM ".DB_TABLEPRE."humancontract  WHERE id = '$id'  ");
			get_key("humancontract_e");
			$_title['name']='编辑';
		}else{ 
			get_key("humancontract_i");
			$blog['number']=get_date('YmdHis',PHP_TIME);
			$_title['name']='发布';
		}
		include_once('template/humancontractadd.php');
	}
}elseif ($do == 'views') {
			$id = getGP('id','G','int');
			if($id!=''){
				$blog = $db->fetch_one_array("SELECT * FROM ".DB_TABLEPRE."humancontract  WHERE id = '$id'");
				$_title['name']='信息浏览';
			}
		include_once('template/humancontractviews.php');
}elseif ($do == 'excel') {
	$datename="humancontract_".get_date('YmdHis',PHP_TIME);
	$outputFileName = 'data/excel/'.$datename.'.xls';
		$content = array();
		$archive=array("单位员工","合同编号","合同类型","合同状态","合同签订日期","试用生效日期","试用天数","试用到期日期","签约次数","合同到期日期","备注");
		$content[] = $archive;
		$wheresql = '';
		if ($userid = getGP('userid','P')) {
		$wheresql .= " AND userid ='".$userid."'";
		}
		if ($number = getGP('number','P')) {
			$wheresql .= " AND number ='".$number."'";
		}
		if ($type = getGP('type','P')) {
			$wheresql .= " AND type ='".$type."'";
		}
		if ($ckey = getGP('ckey','P')) {
			$wheresql .= " AND ckey ='".$ckey."'";
		}
		if ($signdate = getGP('signdate','P')) {
			$wheresql .= " AND signdate ='".$signdate."'";
		}
		if ($testdate = getGP('testdate','P')) {
			$wheresql .= " AND testdate ='".$testdate."'";
		}
		if ($testenddate = getGP('testenddate','P')) {
			$wheresql .= " AND testenddate ='".$testenddate."'";
		}
		if ($signenddate = getGP('signenddate','P')) {
			$wheresql .= " AND signenddate ='".$signenddate."'";
		}
		$vuidtype = getGP('vuidtype','P');
		if ($vuidtype!='') {
			if($vuidtype=='-1'){
				$wheresql .= get_subordinate($_USER->id,'uid');
			}else{
				$wheresql .= " and uid='".$vuidtype."'";
			}
		}
		
		
		$sql = "SELECT * FROM ".DB_TABLEPRE."humancontract WHERE 1 $wheresql   ORDER BY id desc";
		$result = $db->query($sql);
		while ($row = $db->fetch_array($result)) {	
			$archive = array(
				"".get_realname($row['userid'])."",
				"".$row[number]."",
				"".get_typename($row["type"])."",
				"".get_typename($row["ckey"])."",
				"".str_replace("-",".",$row['signdate'])."",
				"".str_replace("-",".",$row['testdate'])."",
				"".$row[testday]."",
				"".str_replace("-",".",$row['testenddate'])."",
				"".$row[signnum]."",
				"".str_replace("-",".",$row['signenddate'])."",
				"".$row['content'].""
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