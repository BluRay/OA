<?php
/*
	[Office 515158] (C) 2009-2012 天生创想 Inc.
	$Id: mod_log 1209087 2012-01-08 08:58:28Z baiwei.jiang $
*/

(!defined('IN_TOA') || !defined('IN_ADMIN')) && exit('Access Denied!');

get_key("config_log");
empty($do) && $do = 'list';
if($do=='list'){
	$_check['ischeck']='  ui-tab-trigger-item-current';
}
if($do=='loglist'){
	$_check['ischeck1']='  ui-tab-trigger-item-current';
}

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
	//时间
	$vstartdate = getGP('vstartdate','G');
	$venddate = getGP('venddate','G');
	if ($vstartdate!='' && $venddate!='') {
	$wheresql .= " AND (logindate>'".$vstartdate."' and logindate<'".$venddate."')";
	$url .= '&vstartdate='.$vstartdate.'&venddate='.$venddate;
	}
	$num = $db->result("SELECT COUNT(*) AS num FROM ".DB_TABLEPRE."loginlog WHERE 1 $wheresql");
     $sql = "SELECT * FROM ".DB_TABLEPRE."loginlog WHERE 1 $wheresql ORDER BY id desc LIMIT $offset, $pagesize";
	 $result = $db->fetch_all($sql);
     include_once('template/log.php');
	 
}elseif ($do == 'update') {
	
    get_key("config_log_delete");
	$idarr = getGP('id','P','array');
	foreach ($idarr as $id) {
	$db->query("DELETE FROM ".DB_TABLEPRE."loginlog WHERE id = '$id' ");
	
	}
	show_msg('登录日志删除成功！', 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'');

}elseif ($do == 'userupdate') {
	
    get_key("config_log_delete");
	$idarr = getGP('id','P','array');
	foreach ($idarr as $id) {
	$db->query("DELETE FROM ".DB_TABLEPRE."oalog WHERE id = '$id' ");
	
	}
	show_msg('操作日志删除成功！', 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'&do=loglist');

}elseif ($do == 'excel') {
	$datename="log_".get_date('YmdHis',PHP_TIME);
	$outputFileName = 'data/excel/'.$datename.'.xls';
	//生成数据
		$content = array();
		$archive=array("姓名","IP","登录时间","退出时间");
		$content[] = $archive;
		$wheresql = '';
		//根据条件导出
		if ($name = getGP('name','P')) {
			$wheresql .= " AND name LIKE '%$name%'";
		}
		//时间
		$vstartdate = getGP('vstartdate','P');
		$venddate = getGP('venddate','P');
		if ($vstartdate!='' && $venddate!='') {
			$wheresql .= " AND (logindate>'".$vstartdate."' and logindate<'".$venddate."')";
		}
		if ( $unionadmin = getGP('unionadmin','P') ) {
			$wheresql .= " AND unionid='".$unionadmin."'";
		}else{
			$wheresql .= " ";
		}
		$sql = "SELECT * FROM ".DB_TABLEPRE."loginlog WHERE 1 $wheresql ORDER BY id desc";
		$result = $db->query($sql);
		while ($row = $db->fetch_array($result)) {	
			$archive = array(
				"".$row[name]."",
				"".$row[ip]."",
				"".str_replace('-','.',$row[logindate])."",
				"".str_replace('-','.',$row[enddate]).""
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
} elseif ($do == 'loglist') {
	//列表信息 
	$wheresql = '';
	$page = max(1, getGP('page','G','int'));
	$pagesize = $_CONFIG->config_data('pagenum');
	$offset = ($page - 1) * $pagesize;
	$url = 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'&do=loglist';

	if ($name = getGP('name','G')) {
		$wheresql .= " AND title LIKE '%$name%'";
		$url .= '&name='.rawurlencode($name);
	}
	if ($type = getGP('type','G')) {
		$wheresql .= " AND type='".$type."'";
		$url .= '&type='.rawurlencode($type);
	}
	//时间
	$vstartdate = getGP('vstartdate','G');
	$venddate = getGP('venddate','G');
	if ($vstartdate!='' && $venddate!='') {
	$wheresql .= " AND (startdate>'".$vstartdate."' and startdate<'".$venddate."')";
	$url .= '&vstartdate='.$vstartdate.'&venddate='.$venddate;
	}
	
	$num = $db->result("SELECT COUNT(*) AS num FROM ".DB_TABLEPRE."oalog WHERE 1 $wheresql");
     $sql = "SELECT * FROM ".DB_TABLEPRE."oalog WHERE 1 $wheresql ORDER BY id desc LIMIT $offset, $pagesize";
	 $result = $db->fetch_all($sql);
     include_once('template/userlog.php');
	 
}elseif ($do == 'userexcel') {

	$datename="log_".get_date('YmdHis',PHP_TIME);
	$outputFileName = 'data/excel/'.$datename.'.xls';
	//生成数据
		$content = array();
		$archive=array("主题","用户","内容","操作时间","类型");
		$content[] = $archive;
		$wheresql = '';
		//根据条件导出
		if ($name = getGP('name','G')) {
			$wheresql .= " AND title LIKE '%$name%'";
		}
		if ($type = getGP('type','G')) {
			$wheresql .= " AND type='".$type."'";
		}
		//时间
		$vstartdate = getGP('vstartdate','G');
		$venddate = getGP('venddate','G');
		if ($vstartdate!='' && $venddate!='') {
			$wheresql .= " AND (startdate>'".$vstartdate."' and startdate<'".$venddate."')";
		}
		$sql = "SELECT * FROM ".DB_TABLEPRE."oalog WHERE 1 $wheresql ORDER BY id desc";
		$result = $db->query($sql);
		while ($row = $db->fetch_array($result)) {
			$content=explode('|515158.com|',$row[content]); 
			$contentdata="";
			for($i=0;$i<sizeof($content);$i++)
			{
				if($content[$i]!=''){
				$contentdata=$contentdata.$content[$i];
				}
			}
			$archive = array(
				"".$row[title]."",
				"".get_realname($row['uid'])."",
				"".$contentdata."",
				"".str_replace('-','.',$row[startdate])."",
				"".get_oalog_type($row['type']).""
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