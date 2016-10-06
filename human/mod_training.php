<?php
/*
	[Office 515158] (C) 2009-2012 天生创想 Inc.
	$Id: mod_training 1209087 2012-01-08 08:58:28Z baiwei.jiang $
*/
(!defined('IN_TOA') || !defined('IN_ADMIN')) && exit('Access Denied!');
empty($do) && $do = 'list';
if($_GET['type']!=''){
	$_check['ischeck'.$_GET['type'].'']='  ui-tab-trigger-item-current';
}else{
	$_check['ischeck']='  ui-tab-trigger-item-current';
}
get_key("training_");
if ($do == 'list') {
	//列表信息 
	$wheresql = '';
	$page = max(1, getGP('page','G','int'));
	$pagesize = $_CONFIG->config_data('pagenum');
	$offset = ($page - 1) * $pagesize;
	$url = 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'';
	if ($name = getGP('name','G')) {
		$wheresql .= " AND name LIKE '%$name%'";
		$url .= '&name='.rawurlencode($name);
	}
	if ($number = getGP('number','G')) {
		$wheresql .= " AND number='".$number."'";
		$url .= '&number='.rawurlencode($number);
	}
	$url .= '&type='.rawurlencode($_GET['type']);
	if ($_GET['type']=='1') {
		$wheresql .= " AND responsible LIKE '%".get_realname($_USER->id)."%'";
	}
	if ($_GET['type']=='2') {
		$wheresql .= " AND user LIKE '%".get_realname($_USER->id)."%'";
	}
	if ($_GET['type']=='3') {
		$wheresql .= " AND type='1'";
	}
	if ($trform = getGP('trform','G')) {
		$wheresql .= " AND trform='".$trform."'";
		$url .= '&trform='.rawurlencode($trform);
	}
	if ($channel = getGP('channel','G')) {
		$wheresql .= " AND channel='".$channel."'";
		$url .= '&channel='.rawurlencode($channel);
	}
	//时间
	$vstartdate = getGP('vstartdate','G');
	$venddate = getGP('venddate','G');
	if ($vstartdate!='' && $venddate!='') {
		$wheresql .= " AND (startdate<='".$vstartdate."' and enddate>='".$venddate."')";
		$url .= '&vstartdate='.$vstartdate.'&venddate='.$venddate;
	}
	$ischeck = getGP('ischeck','G');
	$url .= '&ischeck='.$ischeck;
	if ($ischeck=='1') {
		$wheresql .= " AND date ='".get_date('Y-m-d',PHP_TIME)."' ";	
	}
	if ($ischeck=='2') {
		$getdate=get_date('Y-m',PHP_TIME)."-".(get_date('d',PHP_TIME)-1);
		$wheresql .= " AND date ='".$getdate."' ";	
	}
	if ($ischeck=='3') {
		$wheresql .= " AND DATE_SUB(CURDATE(), INTERVAL 7 DAY)<=date(date) ";	
	}
	if ($ischeck=='4') {
		$wheresql .= " AND DATE_SUB(CURDATE(),INTERVAL 1 MONTH)<=date(date) ";	
	}
	if ($ischeck=='5') {
		$wheresql .= " AND DATE_SUB(CURDATE(),INTERVAL 6 MONTH)<=date(date) ";	
	}
	$vuidtype = getGP('vuidtype','G');
	if ($vuidtype!='') {
		if($vuidtype=='-1'){
				$wheresql .= get_subordinate($_USER->id,'uid');
			}else{
				$wheresql .= " and uid='".$vuidtype."'";
			}
	}
	$num = $db->result("SELECT COUNT(*) AS num FROM ".DB_TABLEPRE."training WHERE 1 $wheresql ORDER BY id desc");
    $sql = "SELECT * FROM ".DB_TABLEPRE."training WHERE 1 $wheresql ORDER BY id desc LIMIT $offset, $pagesize";
	$result = $db->fetch_all($sql);
	include_once('template/traininglist.php');

}elseif ($do == 'update') {
	
	$idarr = getGP('id','P','array');
	foreach ($idarr as $id) {
		$db->query("DELETE FROM ".DB_TABLEPRE."training WHERE id = '$id'  ");
		$db->query("DELETE FROM ".DB_TABLEPRE."training_record WHERE trainingid = '$id'  ");
	}
	$content=serialize($idarr);
	$title='删除培训信息';
	get_logadd($id,$content,$title,28,$_USER->id);
	show_msg('培训信息删除成功！', 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'');

}elseif ($do == 'add') {
	
	if($_POST['view']!=''){
		$id = getGP('id','P','int');
		if($id!=''){
			$number = check_str(getGP('number','P'));
			$name = check_str(getGP('name','P'));
			$channel = check_str(getGP('channel','P'));
			$trform = check_str(getGP('trform','P'));
			$sponsor = check_str(getGP('sponsor','P'));
			$responsible = check_str(getGP('responsible','P'));
			$participation = check_str(getGP('participation','P'));
			$address = check_str(getGP('address','P'));
			$organization = check_str(getGP('organization','P'));
			$orgperson = check_str(getGP('orgperson','P'));
			$curriculum = check_str(getGP('curriculum','P'));
			$classhour = check_str(getGP('classhour','P'));
			$startdate = check_str(getGP('startdate','P'));
			$enddate = check_str(getGP('enddate','P'));
			$price = check_str(getGP('price','P'));
			$examination = getGP('examination','P');
			$examinationdate = check_str(getGP('examinationdate','P'));
			$department = check_str(getGP('department','P'));
			$user = getGP('user','P');
			$organizationinfo = check_str(getGP('organizationinfo','P'));
			$contactperson = check_str(getGP('contactperson','P'));
			$request = check_str(getGP('request','P'));
			$appendix = check_str(getGP('appendix','P'));
			$content = getGP('content','P');
			$training = array(
				'number' => $number,
				'name' => $name,
				'channel' => $channel,
				'trform' => $trform,
				'sponsor' => $sponsor,
				'responsible' => $responsible,
				'participation' => $participation,
				'address' => $address,
				'organization' => $organization,
				'orgperson' => $orgperson,
				'curriculum' => $curriculum,
				'classhour' => $classhour,
				'startdate' => $startdate,
				'enddate' => $enddate,
				'price' => $price,
				'examination' => $examination,
				'department' => $department,
				'user' => $user,
				'organizationinfo' => $organizationinfo,
				'contactperson' => $contactperson,
				'request' => $request,
				'appendix' => $appendix,
				'content' => $content
			);
			update_db('training',$training, array('id' => $id));
			$content=serialize($training);
			$title='编辑培训计划';
			get_logadd($id,$content,$title,28,$_USER->id);
			
		}else{
			$number = check_str(getGP('number','P'));
			$name = check_str(getGP('name','P'));
			$channel = check_str(getGP('channel','P'));
			$trform = check_str(getGP('trform','P'));
			$sponsor = check_str(getGP('sponsor','P'));
			$responsible = check_str(getGP('responsible','P'));
			$participation = check_str(getGP('participation','P'));
			$address = check_str(getGP('address','P'));
			$organization = check_str(getGP('organization','P'));
			$orgperson = check_str(getGP('orgperson','P'));
			$curriculum = check_str(getGP('curriculum','P'));
			$classhour = check_str(getGP('classhour','P'));
			$startdate = getGP('startdate','P');
			$enddate = getGP('enddate','P');
			$price = getGP('price','P');
			$examination = check_str(getGP('examination','P'));
			$department = check_str(getGP('department','P'));
			$user = getGP('user','P');
			$organizationinfo = check_str(getGP('organizationinfo','P'));
			$contactperson = check_str(getGP('contactperson','P'));
			$request = check_str(getGP('request','P'));
			$appendix = getGP('appendix','P');
			$content = getGP('content','P');
			$uid = $_USER->id;
			$date=get_date('Y-m-d H:i:s',PHP_TIME);
			$training = array(
				'number' => $number,
				'name' => $name,
				'channel' => $channel,
				'trform' => $trform,
				'sponsor' => $sponsor,
				'responsible' => $responsible,
				'participation' => $participation,
				'address' => $address,
				'organization' => $organization,
				'orgperson' => $orgperson,
				'curriculum' => $curriculum,
				'classhour' => $classhour,
				'startdate' => $startdate,
				'enddate' => $enddate,
				'price' => $price,
				'examination' => $examination,
				'department' => $department,
				'user' => $user,
				'organizationinfo' => $organizationinfo,
				'contactperson' => $contactperson,
				'request' => $request,
				'appendix' => $appendix,
				'content' => $content,
				'uid' => $uid,
				'type' => 1,
				'date' => $date
			);
			//写入主表信息
			insert_db('training',$training);
			$id=$db->insert_id();
			$content=serialize($training);
			$title='添加培训计划';
			get_logadd($id,$content,$title,28,$_USER->id);
		}
		show_msg('培训计划信息操作成功！', 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'');
	}else{
		$id = getGP('id','G','int');
		if($id!=''){
			$user = $db->fetch_one_array("SELECT * FROM ".DB_TABLEPRE."training  WHERE id = '$id'  ");
			get_key("training_");
			$_title['name']='编辑';
		}else{ 
			get_key("training_");
			$user['number']=get_date('YmdHis',PHP_TIME);
			$_title['name']='发布';
		}
		include_once('template/trainingadd.php');
	}
}elseif ($do == 'views') {
		$id = getGP('id','G','int');
		if($_POST['view']!=''){
			
			$id = getGP('id','P');
			$type = getGP('type','P');
			//主表信息
			$training = array(
				'type' => $type,
				'examinationdate' => get_date('Y-m-d H:i:s',PHP_TIME)
			);
			update_db('training',$training, array('id' => $id));
			$content=serialize($training);
			$title='审批培训计划';
			get_logadd($id,$content,$title,28,$_USER->id);
			show_msg('审批培训计划成功！', 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'&do=views&id='.$id);
		}else{
			if($id!=''){
				if($_GET["keys"]=='1'){
					$blog = $db->fetch_one_array("SELECT * FROM ".DB_TABLEPRE."training  WHERE id = '$id' and examination='".get_realname($_USER->id)."'  ");
					if ($blog["examination"]==''){
						show_msg('对不起，你没有权限执行本操作！', 'home.php');
					}
				}else{
					$blog = $db->fetch_one_array("SELECT * FROM ".DB_TABLEPRE."training  WHERE id = '$id' ");
				}
				$_title['name']='信息浏览';
			}
		}
		include_once('template/trainingviews.php');
}elseif ($do == 'excel') {
	$datename="training_".get_date('YmdHis',PHP_TIME);
	$outputFileName = 'data/excel/'.$datename.'.xls';
		$content = array();
		$archive=array("培训编号","培训名称","培训类型","培训形式","主办部门","负责人","计划参与培训人数","培训地点","培训机构名称","培训机构联系人","培训课程名称","总课时","开课日期","结课日期","培训预算","审批人员","参与培训部门","参与培训人员","培训机构相关信息","培训机构联系人相关信息","培训要求","培训内容");
		$content[] = $archive;
		$wheresql = '';
		if ($name = getGP('name','P')) {
			$wheresql .= " AND name LIKE '%$name%'";
		}
		if ($number = getGP('number','P')) {
			$wheresql .= " AND number='".$number."'";
		}
		if ($trform = getGP('trform','P')) {
			$wheresql .= " AND trform='".$trform."'";
		}
		if ($channel = getGP('channel','P')) {
			$wheresql .= " AND channel='".$channel."'";
		}
		//时间
		$vstartdate = getGP('vstartdate','P');
		$venddate = getGP('venddate','P');
		if ($vstartdate!='' && $venddate!='') {
			$wheresql .= " AND (startdate<='".$vstartdate."' and enddate>='".$venddate."')";
		}
		$ischeck = getGP('ischeck','P');
		if ($ischeck=='1') {
			$wheresql .= " AND date ='".get_date('Y-m-d',PHP_TIME)."' ";	
		}
		if ($ischeck=='2') {
			$getdate=get_date('Y-m',PHP_TIME)."-".(get_date('d',PHP_TIME)-1);
			$wheresql .= " AND date ='".$getdate."' ";	
		}
		if ($ischeck=='3') {
			$wheresql .= " AND DATE_SUB(CURDATE(), INTERVAL 7 DAY)<=date(date) ";	
		}
		if ($ischeck=='4') {
			$wheresql .= " AND DATE_SUB(CURDATE(),INTERVAL 1 MONTH)<=date(date) ";	
		}
		if ($ischeck=='5') {
			$wheresql .= " AND DATE_SUB(CURDATE(),INTERVAL 6 MONTH)<=date(date) ";	
		}
		if ($_POST['type']=='1') {
		$wheresql .= " AND responsible LIKE '%".get_realname($_USER->id)."%'";
		}
		if ($_POST['type']=='2') {
			$wheresql .= " AND user LIKE '%".get_realname($_USER->id)."%'";
		}
		if ($_POST['type']=='3') {
			$wheresql .= " AND type='1'";
		}
		$vuidtype = getGP('vuidtype','P');
		if ($vuidtype!='') {
			if($vuidtype=='-1'){
				$wheresql .= get_subordinate($_USER->id,'uid');
			}else{
				$wheresql .= " and uid='".$vuidtype."'";
			}
		}
		
		
		$sql = "SELECT * FROM ".DB_TABLEPRE."training WHERE 1 $wheresql  ORDER BY id desc";
		$result = $db->query($sql);
		while ($row = $db->fetch_array($result)) {	
			$archive = array(
				"".$row[number]."",
				"".$row[name]."",
				"".get_typename($row["channel"])."",
				"".get_typename($row["trform"])."",
				"".$row[sponsor]."",
				"".$row[responsible]."",
				"".$row[participation]."",
				"".$row[address]."",
				"".$row[organization]."",
				"".$row[orgperson]."",
				"".$row[curriculum]."",
				"".$row[classhour]."",
				"".str_replace("-",".",$row[startdate])."",
				"".str_replace("-",".",$row[enddate])."",
				"".$row[price]."",
				"".$row[examination]."",
				"".$row[department]."",
				"".$row[user]."",
				"".$row[organizationinfo]."",
				"".$row[contactperson]."",
				"".$row[request]."",
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