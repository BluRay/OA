<?php
/*
	[Office 515158] (C) 2009-2012 天生创想 Inc.
	$Id: mod_registration 1209087 2012-01-08 08:58:28Z baiwei.jiang $
*/
(!defined('IN_TOA') || !defined('IN_ADMIN')) && exit('Access Denied!');
empty($do) && $do = 'list';
if($_GET['type']=='1'){
	$_check['ischeck1']='  ui-tab-trigger-item-current';
}else{
	$_check['ischeck']='  ui-tab-trigger-item-current';
}
get_key("registration_");
	//获取打卡次数
	$sworknum=$_CONFIG->config_data('sworknum');
	$swork=$_CONFIG->config_data('swork');
	$ework=$_CONFIG->config_data('ework');
	$sworkex=explode(':',$swork);
	$eworkex=explode(':',$ework);
	if($sworknum=='0'){
		$swork1=$_CONFIG->config_data('swork1');
		$ework1=$_CONFIG->config_data('ework1');
		$swork1ex=explode(':',$swork1);
		$ework1ex=explode(':',$ework1);
	}
if ($do == 'list') {
	//列表信息 
	$wheresql = '';
	$page = max(1, getGP('page','G','int'));
	$pagesize = $_CONFIG->config_data('pagenum');
	$offset = ($page - 1) * $pagesize;
	$url = 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'';
	if ($user = getGP('user','G')) {
		$wheresql .= " AND name ='".$user."'";
		$url .= '&user='.rawurlencode($user);
	}
	//时间
	$vstartdate = getGP('vstartdate','G');
	$venddate = getGP('venddate','G');
	if ($vstartdate!='' && $venddate!='') {
		$wheresql .= " AND (date>='".$vstartdate."' and date<='".$venddate."')";
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
	$num = $db->result("SELECT COUNT(*) AS num FROM ".DB_TABLEPRE."registration WHERE 1 $wheresql ORDER BY id desc");
    $sql = "SELECT * FROM ".DB_TABLEPRE."registration WHERE 1 $wheresql ORDER BY id desc LIMIT $offset, $pagesize";
	$result = $db->fetch_all($sql);
	include_once('template/registrationlist.php');

}elseif ($do == 'update') {
	
	get_key("registration_");
	$idarr = getGP('id','P','array');
	foreach ($idarr as $id) {
		$db->query("DELETE FROM ".DB_TABLEPRE."registration WHERE id = '$id'");
		$db->query("DELETE FROM ".DB_TABLEPRE."registration_log WHERE rid = '$id'");
	}
	$content=serialize($idarr);
	$title='清理考勤信息';
	get_logadd($id,$content,$title,7,$_USER->id);
	show_msg('考勤信息清理成功！', 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'');

}elseif ($do == 'add') {
	
	if($_POST['view']!=''){
		$id = getGP('id','P','int');
		if($id!=''){
			$name = check_str(getGP('user','P'));
			$uid = check_str(getGP('userid','P'));
			$startdate = getGP('startdate','P')." ".getGP('starth','P').":".getGP('starti','P').":00";
			$enddate = getGP('enddate','P')." ".getGP('endh','P').":".getGP('endi','P').":00";
			$startnote = check_str(getGP('startnote','P'));
			$endnote = check_str(getGP('endnote','P'));
			$date = check_str(getGP('date','P'));
			$startyype = check_str(getGP('startyype','P'));
			$endtype = check_str(getGP('endtype','P'));
			$registration = array(
				'name' => $name,
				'startdate' => $startdate,
				'enddate' => $enddate,
				'startnote' => $startnote,
				'endnote' => $endnote,
				'uid' => $uid,
				'startyype' => $startyype,
				'endtype' => $endtype,
				'date' => $date
			);
			update_db('registration',$registration, array('id' => $id));
			$content='';
			$content=serialize($registration);
			$title='编辑考勤信息';
			get_logadd($id,$content,$title,7,$_USER->id);
			
		}else{
			$name = check_str(getGP('user','P'));
			$uid = check_str(getGP('userid','P'));
			$startdate = getGP('startdate','P')." ".getGP('starth','P').":".getGP('starti','P').":00";
			$enddate = getGP('enddate','P')." ".getGP('endh','P').":".getGP('endi','P').":00";
			$startnote = check_str(getGP('startnote','P'));
			$endnote = check_str(getGP('endnote','P'));
			$date = check_str(getGP('date','P'));
			$startyype = check_str(getGP('startyype','P'));
			$endtype = check_str(getGP('endtype','P'));
			$registration = array(
				'name' => $name,
				'startdate' => $startdate,
				'enddate' => $enddate,
				'startnote' => $startnote,
				'endnote' => $endnote,
				'uid' => $uid,
				'startyype' => $startyype,
				'endtype' => $endtype,
				'date' => $date
			);
			insert_db('registration',$registration);
			$id=$db->insert_id();
			$content=serialize($registration);
			$title='录入考勤信息';
			get_logadd($id,$content,$title,7,$_USER->id);
		}
		show_msg('考勤信息操作成功！', 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'');
	}else{
		$id = getGP('id','G','int');
		if($id!=''){
			$user = $db->fetch_one_array("SELECT * FROM ".DB_TABLEPRE."registration  WHERE id = '$id'  ");
			$startdate=explode(' ',$user['startdate']);
			$starttime=explode(':',$startdate[1]);
			$enddate=explode(' ',$user['enddate']);
			$endtime=explode(':',$enddate[1]);
			$_title['name']='更改';
		}else{ 
			$startdate=explode(' ',get_date('Y-m-d H:i:s',PHP_TIME));
			$starttime=explode(':',$startdate[1]);
			$starttime[0]='08';
			$starttime[1]='50';
			$enddate=explode(' ',get_date('Y-m-d H:i:s',PHP_TIME));
			$endtime=explode(':',$enddate[1]);
			$endtime[0]='18';
			$endtime[1]='10';
			$user['startyype']='0';
			$user['startyype']='0';
			$_title['name']='录入';
		}
		include_once('template/registrationadd.php');
	}
}elseif ($do == 'excel') {
		function reg_excel($rid=0){
			global $db;
			$sql = "SELECT note FROM ".DB_TABLEPRE."registration_log WHERE rid='".$rid."' order by lid asc";
			$query = $db->query($sql);
			while ($row = $db->fetch_array($query)) {
				$html.= $row['note'].'<br>';
			}
			return $html;
		}
		$datename="registration_".get_date('YmdHis',PHP_TIME);
		$outputFileName = 'data/excel/'.$datename.'.xls';
		$content = array();
		$archive=array("日期","姓名","退到/次","早退/次","总时长","原因");
		$content[] = $archive;
		$wheresql = '';
		if ($user = getGP('user','P')) {
			$wheresql .= " AND name ='".$user."'";
		}
		//时间
		$vstartdate = getGP('vstartdate','P');
		$venddate = getGP('venddate','P');
		if ($vstartdate!='' && $venddate!='') {
			$wheresql .= " AND (date>='".$vstartdate."' and date<='".$venddate."')";
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
		$sql = "SELECT * FROM ".DB_TABLEPRE."registration WHERE 1 $wheresql  ORDER BY id desc";
		$result = $db->query($sql);
		while ($row = $db->fetch_array($result)) {
			$num1 = $db->result("SELECT COUNT(*) AS num1 FROM ".DB_TABLEPRE."registration_log WHERE rid='".$row[id]."' and type=1");
			$num2 = $db->result("SELECT COUNT(*) AS num2 FROM ".DB_TABLEPRE."registration_log WHERE rid='".$row[id]."' and type=2");
			$num3 = $db->result("SELECT sum(number) AS num3 FROM ".DB_TABLEPRE."registration_log WHERE rid='".$row[id]."'");	
			$archive = array(
				"".str_replace("-",".",$row[date])."",
				"".$row[name]."",
				"".$num1."",
				"".$num2."",
				"".$num3."",
				"".reg_excel($row[id]).""
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