<?php
/*
	[Office 515158] (C) 2009-2012 天生创想 Inc.
	$Id: mod_workdate 1209087 2012-01-08 08:58:28Z baiwei.jiang $
*/
(!defined('IN_TOA') || !defined('IN_ADMIN')) && exit('Access Denied!');
empty($do) && $do = 'list';
if($_GET['type']=='公开'){
	$_check['ischeck1']='  ui-tab-trigger-item-current';
}else{
	$_check['ischeck']='  ui-tab-trigger-item-current';
}
get_key("date_workdate");
if ($do == 'list') {
	//列表信息 
	$wheresql = '';
	$page = max(1, getGP('page','G','int'));
	$pagesize = $_CONFIG->config_data('pagenum');
	$offset = ($page - 1) * $pagesize;
	$url = 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'';
	if ($title = getGP('title','G')) {
		$wheresql .= " AND title LIKE '%$title%'";
		$url .= '&title='.rawurlencode($title);
	}
	//时间
	$vstartdate = getGP('vstartdate','G');
	$venddate = getGP('venddate','G');
	if ($vstartdate!='' && $venddate!='') {
		$wheresql .= " AND (startdate>='".$vstartdate."' and enddate<='".$venddate."')";
		$url .= '&vstartdate='.$vstartdate.'&venddate='.$venddate;
	}
	$ischeck = getGP('ischeck','G');
	if ($ischeck=='1') {
		$wheresql .= " AND completiondate !='' ";	
	}
	if ($ischeck=='2') {
		$wheresql .= " and enddate>'".get_date('Y-m-d H:i:s',PHP_TIME)."' ";	
	}
	if ($ischeck=='3') {
		$wheresql .= " and enddate<'".get_date('Y-m-d H:i:s',PHP_TIME)."' ";	
	}
	$url .= '&ischeck='.$ischeck;
	$vuidtype = getGP('vuidtype','G');
	if(!is_superadmin() && $vuidtype==''){
		if (getGP('type','G')!='公开') {
			$wheresql .= " AND uid = $_USER->id";	
		}else{
			$wheresql .= " AND type ='公开' and uid != $_USER->id";	
		}
		$url .= '&type='.getGP('type','G','int');
	}
	
	if ($vuidtype!='') {
		if (getGP('type','G')!='公开') {
			if($vuidtype=='-1'){
				$wheresql .= get_subordinate($_USER->id,'uid');
			}else{
				$wheresql .= " and uid='".$vuidtype."'";
			}
		}else{
			$wheresql .=" AND type ='公开'".get_subordinate($_USER->id,'uid');
		}
		$url .= '&vuidtype='.$vuidtype;
	}
	
	
	$num = $db->result("SELECT COUNT(*) AS num FROM ".DB_TABLEPRE."workdate WHERE 1 $wheresql ORDER BY id desc");
    $sql = "SELECT * FROM ".DB_TABLEPRE."workdate WHERE 1 $wheresql ORDER BY id desc LIMIT $offset, $pagesize";
	$result = $db->fetch_all($sql);
	include_once('template/workdatelist.php');

}elseif ($do == 'update') {
	
	get_key("date_workdate_delete");
	$idarr = getGP('id','P','array');
	foreach ($idarr as $id) {
		$db->query("DELETE FROM ".DB_TABLEPRE."workdate WHERE id = '$id'  ");
		$db->query("DELETE FROM ".DB_TABLEPRE."bbs_log WHERE bbsid = '$id' and type='8'  ");
	}
	$content=serialize($idarr);
	$title='删除日程信息';
	get_logadd($id,$content,$title,10,$_USER->id);
	show_msg('日程信息删除成功！', 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'');

}elseif ($do == 'enddate') {
	
	get_key("date_workdate_delete");
	$date = get_date('Y-m-d H:i:s',PHP_TIME);
	$workdate = array(
		'completiondate' => $date
	);
	update_db('workdate',$workdate, array('id' => $_GET['id']));
	show_msg('日程信息操作成功！', 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'');

}elseif ($do == 'add') {
	
	if($_POST['view']!=''){
		$id = getGP('id','P','int');
		if($id!=''){
			$otype = check_str(getGP('otype','P'));
			$title = check_str(getGP('title','P'));
			$startdate = getGP('startdate','P')." ".getGP('starth','P').":".getGP('starti','P').":00";
			$enddate = getGP('enddate','P')." ".getGP('endh','P').":".getGP('endi','P').":00";
			$contents = getGP('content','P');
			$type = check_str(getGP('type','P'));
			$workdate = array(
				'title' => $title,
				'otype' => $otype,
				'startdate' => $startdate,
				'enddate' => $enddate,
				'content' => $contents,
				'type' => $type
			);
			update_db('workdate',$workdate, array('id' => $id));
			$content='';
			$content=serialize($workdate);
			$title='结束日程信息';
			get_logadd($id,$content,$title,10,$_USER->id);
			
		}else{
			$otype = check_str(getGP('otype','P'));
			$title = check_str(getGP('title','P'));
			$startdate = getGP('startdate','P')." ".getGP('starth','P').":".getGP('starti','P').":00";
			$enddate = getGP('enddate','P')." ".getGP('endh','P').":".getGP('endi','P').":00";
			$contents = getGP('content','P');
			$date = get_date('Y-m-d H:i:s',PHP_TIME);
			$type = check_str(getGP('type','P'));
			$uid=$_USER->id;
			$workdate = array(
				'title' => $title,
				'otype' => $otype,
				'startdate' => $startdate,
				'enddate' => $enddate,
				'content' => $contents,
				'date' => $date,
				'type' => $type,
				'uid' => $uid
			);
			insert_db('workdate',$workdate);
			$id=$db->insert_id();
			$content=serialize($workdate);
			$title='新建日程信息';
			get_logadd($id,$content,$title,10,$_USER->id);
		}
		show_msg('日程信息操作成功！', 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'');
	}else{
		$id = getGP('id','G','int');
		if($id!=''){
			$user = $db->fetch_one_array("SELECT * FROM ".DB_TABLEPRE."workdate  WHERE id = '$id'  ");
			get_key(date_workdate_edit);
			$startdate=explode(' ',$user['startdate']);
			$starttime=explode(':',$startdate[1]);
			$enddate=explode(' ',$user['enddate']);
			$endtime=explode(':',$enddate[1]);
			$_title['name']='编辑';
		}else{ 
			get_key(date_workdate_Increase);
			$startdate=explode(' ',get_date('Y-m-d H:i:s',PHP_TIME));
			$starttime=explode(':',$startdate[1]);
			$enddate=explode(' ',get_date('Y-m-d H:i:s',PHP_TIME));
			$endtime=explode(':',$enddate[1]);
			$user['type']='私人';
			$_title['name']='发布';
		}
		include_once('template/workdateadd.php');
	}
}elseif ($do == 'views') {
		$id = getGP('id','G','int');
		if($_POST['view']!=''){
			
			$bbsid = getGP('bbsid','P');
			$title = check_str(getGP('title','P'));
			$author = getGP('author','P');
			$content = getGP('content','P');
			$type = getGP('type','P');
			$enddate = get_date('Y-m-d H:i:s',PHP_TIME);
			$uid = $_USER->id;
			//主表信息
			$bbs_log = array(
				'bbsid' => $bbsid,
				'title' => $title,
				'author' => $author,
				'content' => $content,
				'enddate' => $enddate,
				'type'=>8,
				'uid' => $uid
			);
			insert_db('bbs_log',$bbs_log);
			$content=serialize($bbs_log);
			$title='回复信息';
			get_logadd($id,$content,$title,10,$_USER->id);
			show_msg('评论发布成功！', 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'&do=views&id='.$bbsid);
		}else{
			if($id!=''){
				$blog = $db->fetch_one_array("SELECT * FROM ".DB_TABLEPRE."workdate  WHERE id = '$id'");
				$_title['name']='信息浏览';
			}
		}
		include_once('template/workdateviews.php');
}elseif ($do == 'excel') {
	$datename="workdate_".get_date('YmdHis',PHP_TIME);
	$outputFileName = 'data/excel/'.$datename.'.xls';
		$content = array();
		$archive=array("主题","开始时间","结束时间","完成时间","类型","发布人","内容");
		$content[] = $archive;
		$wheresql = '';
		if ($title = getGP('title','P')) {
			$wheresql .= " AND title LIKE '%$title%'";
		}
		//时间
		$vstartdate = getGP('vstartdate','P');
		$venddate = getGP('venddate','P');
		if ($vstartdate!='' && $venddate!='') {
			$wheresql .= " AND (startdate>='".$vstartdate."' and enddate<='".$venddate."')";
		}
		$ischeck = getGP('ischeck','P');
		if ($ischeck=='1') {
			$wheresql .= " AND completiondate !='' ";	
		}
		if ($ischeck=='2') {
			$wheresql .= " and enddate>'".get_date('Y-m-d H:i:s',PHP_TIME)."' ";	
		}
		if ($ischeck=='3') {
			$wheresql .= " and enddate<'".get_date('Y-m-d H:i:s',PHP_TIME)."' ";	
		}
		$vuidtype = getGP('vuidtype','P');
		if(!is_superadmin() && $vuidtype==''){
			if (getGP('type','P')!='公开') {
				$wheresql .= " AND uid = $_USER->id";	
			}else{
				$wheresql .= " AND type ='公开' and uid != $_USER->id";	
			}
		}
		
		if ($vuidtype!='') {
			if (getGP('type','P')!='公开') {
				if($vuidtype=='-1'){
				$wheresql .= get_subordinate($_USER->id,'uid');
			}else{
				$wheresql .= " and uid='".$vuidtype."'";
			}
			}else{
				$wheresql .=" AND type ='公开'".get_subordinate($_USER->id,'uid');
			}
		}
		$sql = "SELECT * FROM ".DB_TABLEPRE."workdate WHERE 1 $wheresql   ORDER BY id desc";
		$result = $db->query($sql);
		while ($row = $db->fetch_array($result)) {	
			$archive = array(
				"".$row[title]."",
				"".str_replace("-",".",$row[startdate])."",
				"".str_replace("-",".",$row[enddate])."",
				"".str_replace("-",".",$row[completiondate])."",
				"".$row['type']."","".get_realname($row['uid'])."",
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