<?php
/*
	[Office 515158] (C) 2009-2012 天生创想 Inc.
	$Id: mod_plan 1209087 2012-01-08 08:58:28Z baiwei.jiang $
*/
(!defined('IN_TOA') || !defined('IN_ADMIN')) && exit('Access Denied!');
empty($do) && $do = 'list';
$ischeck = getGP('ischeck','G');
if($ischeck=='1' || $ischeck=='2' || $ischeck=='8'){
	$_check['ischeck'.$ischeck.'']='  ui-tab-trigger-item-current';
}else{
	$_check['ischeck']='  ui-tab-trigger-item-current';
}
get_key("date_plan");
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
	$vuidtype = getGP('vuidtype','G');
	if(!is_superadmin() && $ischeck!='1' && $ischeck!='2' && $vuidtype==''){
		$wheresql .= " AND uid = $_USER->id";
	}
	if ($vuidtype!='') {
		if($vuidtype=='-1'){
				$wheresql .= get_subordinate($_USER->id,'uid');
			}else{
				$wheresql .= " and uid='".$vuidtype."'";
			}
		$url .= '&vuidtype='.$vuidtype;
	}
	if ($ischeck=='1' && $vuidtype=='') {
		$wheresql .= " AND participation LIKE '%".get_realname($_USER->id)."%' ";	
	}
	if ($ischeck=='2' && $vuidtype=='') {
		$wheresql .= " AND person LIKE '%".get_realname($_USER->id)."%' ";	
	}
	if ($ischeck=='8' ) {
		$wheresql .= " AND completiondate!='' AND (person LIKE '%".get_realname($_USER->id)."%' or participation LIKE '%".get_realname($_USER->id)."%')";	
	}
	if ($ischeck=='3') {
		$wheresql .= " AND DATE_SUB(CURDATE(), INTERVAL 1 DAY)<=date(date) ";	
	}
	if ($ischeck=='4') {
		$wheresql .= " AND DATE_SUB(CURDATE(), INTERVAL 3 DAY)<=date(date) ";	
	}
	if ($ischeck=='5') {
		$wheresql .= " AND DATE_SUB(CURDATE(), INTERVAL 7 DAY)<=date(date) ";	
	}
	if ($ischeck=='6') {
		$wheresql .= " AND DATE_SUB(CURDATE(),INTERVAL 1 MONTH)<=date(date) ";	
	}
	if ($ischeck=='7') {
		$wheresql .= " AND DATE_SUB(CURDATE(),INTERVAL 6 MONTH)<=date(date) ";	
	}
	$url .= '&ischeck='.$ischeck;
	
	
	$num = $db->result("SELECT COUNT(*) AS num FROM ".DB_TABLEPRE."plan WHERE 1 $wheresql ORDER BY id desc");
    $sql = "SELECT * FROM ".DB_TABLEPRE."plan WHERE 1 $wheresql ORDER BY id desc LIMIT $offset, $pagesize";
	$result = $db->fetch_all($sql);
	include_once('template/planlist.php');

}elseif ($do == 'enddate') {
	
	get_key("date_workdate_delete");
	$date = get_date('Y-m-d H:i:s',PHP_TIME);
	$plan = array(
		'completiondate' => $date
	);
	update_db('plan',$plan, array('id' => $_GET['id']));
	show_msg('计划信息操作成功！', 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'');

}elseif ($do == 'update') {
	
	get_key("date_plan_delete");
	$idarr = getGP('id','P','array');
	foreach ($idarr as $id) {
		$db->query("DELETE FROM ".DB_TABLEPRE."plan WHERE id = '$id' ");
		$db->query("DELETE FROM ".DB_TABLEPRE."bbs_log WHERE bbsid = '$id' and type='10' ");
	}
	$content=serialize($idarr);
	$title='删除计划信息';
	get_logadd($id,$content,$title,12,$_USER->id);
	show_msg('计划信息删除成功！', 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'');

}elseif ($do == 'add') {
	
	if($_POST['view']!=''){
		$id = getGP('id','P','int');
		if($id!=''){
			$title = check_str(getGP('title','P'));
			$content = getGP('content','P');
			$startdate = getGP('startdate','P')." ".getGP('starth','P').":".getGP('starti','P').":00";
			$enddate = getGP('enddate','P')." ".getGP('endh','P').":".getGP('endi','P').":00";
			$otype = getGP('otype','P');
			$department = getGP('department','P');
			$participation = getGP('participation','P');
			$person = getGP('person','P');
			$note = check_str(getGP('note','P'));
			$type = getGP('type','P');
			$plan = array(
				'title' => $title,
				'content' => $content,
				'startdate' => $startdate,
				'enddate' => $enddate,
				'otype' => $otype,
				'department' => $department,
				'participation' => $participation,
				'person' => $person,
				'note' => $note,
				'type' => $type
			);
			update_db('plan',$plan, array('id' => $id));
			if(getGP('sms_info_box_person','P')!=''){
				$content='您有一个计划需要执行,计划主题为：'.$title.';请进行处理!<a href="admin.php?ac='.$ac.'&fileurl='.$fileurl.'&do=views&id='.$id.'">点击查看>></a>';
				SMS_ADD_POST($person,$content,0,0,$_USER->id);
			}
			if(getGP('sms_phone_box_person','P')!=''){
				$content='您有一个计划需要执行,请登录OA进行处理!';
				PHONE_ADD_POST(getGP('personphone','P'),$content,$person,0,0,$_USER->id);
			}
			//////////////////////////////////////////////////
			if(getGP('sms_info_box_participation','P')!=''){
				$content='您有一个计划需要参与,计划主题为：'.$title.';请进行处理!<a href="admin.php?ac='.$ac.'&fileurl='.$fileurl.'&do=views&id='.$id.'">点击查看>></a>';
				SMS_ADD_POST($participation,$content,0,0,$_USER->id);
			}
			//手机短信
			if(getGP('sms_phone_box_participation','P')!=''){
				$content='您有一个计划需要参与,请登录OA进行处理!';
				PHONE_ADD_POST(getGP('participationphone','P'),$content,$participation,0,0,$_USER->id);
			}
			$content=serialize($plan);
			$title='修改工作计划';
			get_logadd($id,$content,$title,12,$_USER->id);
			
		}else{
			$title = getGP('title','P');
			$content = getGP('content','P');
			$startdate = getGP('startdate','P')." ".getGP('starth','P').":".getGP('starti','P').":00";
			$enddate = getGP('enddate','P')." ".getGP('endh','P').":".getGP('endi','P').":00";
			$otype = getGP('otype','P');
			$department = getGP('department','P');
			$participation = getGP('participation','P');
			$person = getGP('person','P');
			$note = getGP('note','P');
			$date = get_date('Y-m-d H:i:s',PHP_TIME);
			$type = getGP('type','P');
			$uid=$_USER->id;
			$plan = array(
				'title' => $title,
				'content' => $content,
				'startdate' => $startdate,
				'enddate' => $enddate,
				'otype' => $otype,
				'department' => $department,
				'participation' => $participation,
				'person' => $person,
				'note' => $note,
				'date' => $date,
				'type' => $type,
				'uid' => $uid
			);
			insert_db('plan',$plan);
			$id=$db->insert_id();
			if(getGP('sms_info_box_person','P')!=''){
				$content='您有一个计划需要执行,计划主题为：'.$title.';请进行处理!<a href="admin.php?ac='.$ac.'&fileurl='.$fileurl.'&do=views&id='.$id.'">点击查看>></a>';
				//接收人；内容；类型（1：有返回回值;0：无返回值）;URL
				SMS_ADD_POST($person,$content,0,0,$_USER->id);
			}
			//手机短信
			if(getGP('sms_phone_box_person','P')!=''){
				$content='您有一个计划需要执行,请登录OA进行处理!';
				PHONE_ADD_POST(getGP('personphone','P'),$content,$person,0,0,$_USER->id);
			}
			//////////////////////////////////////////////////
			if(getGP('sms_info_box_participation','P')!=''){
				$content='您有一个计划需要参与,计划主题为：'.$title.';请进行处理!<a href="admin.php?ac='.$ac.'&fileurl='.$fileurl.'&do=views&id='.$id.'">点击查看>></a>';
				SMS_ADD_POST($participation,$content,0,0,$_USER->id);
			}
			//手机短信
			if(getGP('sms_phone_box_participation','P')!=''){
				$content='您有一个计划需要参与,请登录OA进行处理!';
				PHONE_ADD_POST(getGP('participationphone','P'),$content,$participation,0,0,$_USER->id);
			}
			$content=serialize($plan);
			$title='新增工作计划';
			get_logadd($id,$content,$title,12,$_USER->id);
		}
		show_msg('计划信息操作成功！', 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'');
	}else{
		$id = getGP('id','G','int');
		if($id!=''){
			$user = $db->fetch_one_array("SELECT * FROM ".DB_TABLEPRE."plan  WHERE id = '$id'  ");
			get_key('date_plan_edit');
			$startdate=explode(' ',$user['startdate']);
			$starttime=explode(':',$startdate[1]);
			$enddate=explode(' ',$user['enddate']);
			$endtime=explode(':',$enddate[1]);
			$_title['name']='编辑';
		}else{ 
			get_key('date_plan_Increase');
			$startdate=explode(' ',get_date('Y-m-d H:i:s',PHP_TIME));
			$starttime=explode(':',$startdate[1]);
			$enddate=explode(' ',get_date('Y-m-d H:i:s',PHP_TIME));
			$endtime=explode(':',$enddate[1]);
			$user['type']='个人';
			$_title['name']='发布';
		}
		include_once('template/planadd.php');
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
				'type'=>10,
				'uid' => $uid
			);
			insert_db('bbs_log',$bbs_log);
			$content=serialize($bbs_log);
			$title='回复信息';
			get_logadd($id,$content,$title,12,$_USER->id);
			show_msg('评论发布成功！', 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'&do=views&id='.$bbsid);
		}else{
			if($id!=''){
				$plan = $db->fetch_one_array("SELECT * FROM ".DB_TABLEPRE."plan  WHERE id = '$id' ");
				$_title['name']='信息浏览';
			}
		}
		include_once('template/planviews.php');
}elseif ($do == 'excel') {
	$datename="plan_".get_date('YmdHis',PHP_TIME);
	$outputFileName = 'data/excel/'.$datename.'.xls';
		$content = array();
		$archive=array("名称","有效期（开始）","有效期（结束）","发布范围（部门）","参与人","负责人","备注","完成时间","发布人","类型","内容");
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
		$vuidtype = getGP('vuidtype','P');
		if(!is_superadmin() && $ischeck!='1' && $ischeck!='2' && $vuidtype==''){
			$wheresql .= " AND uid = $_USER->id";
		}
		if ($vuidtype!='') {
			if($vuidtype=='-1'){
				$wheresql .= get_subordinate($_USER->id,'uid');
			}else{
				$wheresql .= " and uid='".$vuidtype."'";
			}
		}
		if ($ischeck=='1' && $vuidtype=='') {
			$wheresql .= " AND participation LIKE '%".get_realname($_USER->id)."%' ";	
		}
		if ($ischeck=='2' && $vuidtype=='') {
			$wheresql .= " AND person LIKE '%".get_realname($_USER->id)."%' ";	
		}
		if ($ischeck=='8' ) {
			$wheresql .= " AND completiondate!='' AND (person LIKE '%".get_realname($_USER->id)."%' or participation LIKE '%".get_realname($_USER->id)."%')";	
		}
		if ($ischeck=='3') {
			$wheresql .= " AND DATE_SUB(CURDATE(), INTERVAL 1 DAY)<=date(date) ";	
		}
		if ($ischeck=='4') {
			$wheresql .= " AND DATE_SUB(CURDATE(), INTERVAL 3 DAY)<=date(date) ";	
		}
		if ($ischeck=='5') {
			$wheresql .= " AND DATE_SUB(CURDATE(), INTERVAL 7 DAY)<=date(date) ";	
		}
		if ($ischeck=='6') {
			$wheresql .= " AND DATE_SUB(CURDATE(),INTERVAL 1 MONTH)<=date(date) ";	
		}
		if ($ischeck=='7') {
			$wheresql .= " AND DATE_SUB(CURDATE(),INTERVAL 6 MONTH)<=date(date) ";	
		}
		
		$sql = "SELECT * FROM ".DB_TABLEPRE."plan WHERE 1 $wheresql ORDER BY id desc";
		$result = $db->query($sql);
		while ($row = $db->fetch_array($result)) {	
			$archive = array(
				"".$row[title]."",
				"".str_replace("-",".",$row[startdate])."",
				"".str_replace("-",".",$row[enddate])."",
				"".$row['department']."",
				"".$row['participation']."",
				"".$row['person']."",
				"".$row['note']."",
				"".str_replace("-",".",$row[completiondate])."",
				"".get_realname($row['uid'])."",
				"".$row['type']."",
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