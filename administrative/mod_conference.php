<?php
/*
	[Office 515158] (C) 2009-2012 天生创想 Inc.
	$Id: mod_conference 1209087 2012-01-08 08:58:28Z baiwei.jiang $
*/
(!defined('IN_TOA') || !defined('IN_ADMIN')) && exit('Access Denied!');
empty($do) && $do = 'list';
if($ischeck=getGP('ischeck','G')){
	$_check['ischeck'.getGP('ischeck','G').'']='  ui-tab-trigger-item-current';
}else{
	$_check['ischeck']='  ui-tab-trigger-item-current';
}
get_key("istration_conference");
if ($do == 'list') {
	//列表信息 
	$wheresql = '';
	$page = max(1, getGP('page','G','int'));
	$pagesize = $_CONFIG->config_data('pagenum');
	$offset = ($page - 1) * $pagesize;
	$url = 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'';
	if ($title = getGP('title','G')) {
		$wheresql .= " AND (subject LIKE '%$title%' or title LIKE '%$title%')";
		$url .= '&title='.rawurlencode($title);
	}
	if ($otype = getGP('otype','G')) {
		$wheresql .= " AND otype='".$otype."'";
		$url .= '&otype='.$otype;
	}
	if ($conferenceroom = getGP('conferenceroom','G')) {
		$wheresql .= " AND conferenceroom='".$conferenceroom."'";
		$url .= '&conferenceroom='.$conferenceroom;
	}
	//时间
	$venddate = getGP('venddate','G');
	$vstartdate = getGP('vstartdate','G');
	if ($vstartdate!='' && $venddate!='') {
		$wheresql .= " AND (startdate<'".$vstartdate."' and enddate>'".$venddate."')";
		$url .= '&vstartdate='.$vstartdate.'&venddate='.$venddate;
	}
	if($ischeck=='1'){
		$wheresql .= " AND attendance LIKE '%".get_realname($_USER->id)."%'";
	}elseif($ischeck=='2'){
		$wheresql .= " AND attendance LIKE '%".get_realname($_USER->id)."%' and enddate<='".get_date('Y-m-d H:i:s',PHP_TIME)."'";
	}elseif($ischeck=='3'){
		$wheresql .= " AND attendance LIKE '%".get_realname($_USER->id)."%' and startdate>='".get_date('Y-m-d H:i:s',PHP_TIME)."'";
	}elseif($ischeck=='4'){
		$wheresql .= " AND attendance LIKE '%".get_realname($_USER->id)."%' and startdate<='".get_date('Y-m-d H:i:s',PHP_TIME)."'";
	}
	$vuidtype = getGP('vuidtype','G');
	if(!is_superadmin() && $vuidtype=='' && $ischeck==''){
		$wheresql .= " AND uid='".$_USER->id."'";
	}
	if ($vuidtype!='') {
		if($vuidtype=='-1'){
				$wheresql .= get_subordinate($_USER->id,'uid');
			}else{
				$wheresql .= " and uid='".$vuidtype."'";
			}
		$url .= '&vuidtype='.$vuidtype;
	}
	$num = $db->result("SELECT COUNT(*) AS num FROM ".DB_TABLEPRE."conference WHERE 1 $wheresql ORDER BY id desc");
    $sql = "SELECT * FROM ".DB_TABLEPRE."conference WHERE 1 $wheresql ORDER BY id desc LIMIT $offset, $pagesize";
	$result = $db->fetch_all($sql);
	$sql2 = "SELECT * FROM ".DB_TABLEPRE."office_type WHERE otype='2' ORDER BY oid desc";
	$result1 = $db->fetch_all($sql2);
	$sql3 = "SELECT * FROM ".DB_TABLEPRE."office_type WHERE otype='1' ORDER BY oid desc";
	$result2 = $db->fetch_all($sql3);
	include_once('template/conferencelist.php');

}elseif ($do == 'update') {
	
	get_key("istration_conference_delete");
	$idarr = getGP('id','P','array');
	foreach ($idarr as $id) {
		$db->query("DELETE FROM ".DB_TABLEPRE."conference WHERE id = '$id' ");
		$db->query("DELETE FROM ".DB_TABLEPRE."conference_record WHERE conferenceid = '$id' ");
		$db->query("DELETE FROM ".DB_TABLEPRE."bbs_log WHERE bbsid = '$id' and type='7' ");
	}
	$content=serialize($idarr);
	$title='删除会议内容';
	get_logadd($id,$content,$title,19,$_USER->id);
	show_msg('会议信息删除成功！', 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'');

}elseif ($do == 'keys') {
	
	$id = getGP('id','G');
	$type = getGP('type','G');
	$db->query("update ".DB_TABLEPRE."conference set type='".$type."' where id=".$id." ");
	$content=$id;
	$title='审批会议内容';
	get_logadd($id,$content,$title,19,$_USER->id);
	show_msg('会议信息审批成功！', 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'');

}elseif ($do == 'add') {
	
	if($_POST['view']!=''){
		$id = getGP('id','P','int');
		if($id!=''){
			$title = check_str(getGP('title','P'));
			$subject = check_str(getGP('subject','P'));
			$content = getGP('content','P');
			$attendance = getGP('participation','P');
			$startdate = getGP('startdate','P')." ".getGP('starttime1','P').":".getGP('starttime2','P');
			$enddate = getGP('enddate','P')." ".getGP('endtime1','P').":".getGP('endtime2','P');
			$conferenceroom = getGP('conferenceroom','P');
			$otype = getGP('otype','P');
			$staffidsms=getGP('staffid','P');
			$conference = array(
				'title' => $title,
				'subject' => $subject,
				'content' => $content,
				'attendance' => $attendance,
				'startdate' => $startdate,
				'enddate' => $enddate,
				'conferenceroom' => $conferenceroom,
				'otype' => $otype
			);
			update_db('conference',$conference, array('id' => $id));
			$content='';
			$content=serialize($conference);
			$title='编辑会议信息';
			get_logadd($id,$content,$title,19,$_USER->id);
			
		}else{
			$title = check_str(getGP('title','P'));
			$subject = check_str(getGP('subject','P'));
			$content = getGP('content','P');
			$appperson = check_str(getGP('apppersonid','P'));
			$recorduser = check_str(getGP('recorduserid','P'));
			$date = get_date('Y-m-d H:i:s',PHP_TIME);
			$attendance = check_str(getGP('participation','P'));
			$startdate = getGP('startdate','P')." ".getGP('starttime1','P').":".getGP('starttime2','P');
			$enddate = getGP('enddate','P')." ".getGP('endtime1','P').":".getGP('endtime2','P');
			$conferenceroom = check_str(getGP('conferenceroom','P'));
			$type = 1;
			$otype = getGP('otype','P');
			$staffid = getGP('staffidid','P');
			$uid=$_USER->id;
			$apppersonsms=check_str(getGP('appperson','P'));
			$staffidsms=check_str(getGP('staffid','P'));
			$conference = array(
				'title' => $title,
				'subject' => $subject,
				'content' => $content,
				'appperson' => $appperson,
				'recorduser' => $recorduser,
				'date' => $date,
				'attendance' => $attendance,
				'startdate' => $startdate,
				'enddate' => $enddate,
				'conferenceroom' => $conferenceroom,
				'type' => $type,
				'staffid' => $staffid,
				'uid' => $uid,
				'otype' => $otype
			);
			insert_db('conference',$conference);
			$id=$db->insert_id();
			if(getGP('sms_info_box_appperson','P')!=''){
				$content='';
				$content=$apppersonsms.':您申请的会议室己经提交,请注意查看!';
				$content.='<a href="admin.php?ac='.$ac.'&fileurl='.$fileurl.'&do=views';
				$content.='&id='.$id.'">点击查看>></a>';
				SMS_ADD_POST($apppersonsms,$content,0,0,$_USER->id);
			}
			if(getGP('sms_phone_box_appperson','P')!=''){
				$content='';
				$content=$apppersonsms.':您申请的会议室己经提交,请登录OA进行查看!';
				PHONE_ADD_POST(getGP('apppersonphone','P'),$content,$apppersonsms,0,0,$_USER->id);
			}
			//出席人员
			if(getGP('sms_info_box_participation','P')!=''){
				$content='';
				$content='您有一个会议需要出席,申请人是:"'.$apppersonsms.'",请注意查看会议出席时间!<a href="admin.php?ac='.$ac.'&fileurl='.$fileurl.'&do=views&id='.$id.'">点击查看>></a>';
				
				SMS_ADD_POST($attendance,$content,0,0,$_USER->id);
			}
			
			if(getGP('sms_phone_box_participation','P')!=''){
				$content='';
				$content='您有一个会议需要出席,申请人是:"'.$apppersonsms.'",请登录OA查看会议出席时间!';
				PHONE_ADD_POST(getGP('participationphone','P'),$content,$attendance,0,0,$_USER->id);
			}
			//审批人员
			if(getGP('sms_info_box_staffid','P')!=''){
				$content='';
				$content=$staffidsms.':有一个会议申请需要您审批,申请人是:"'.$apppersonsms.'",请进入会议管理进行审批!<a href="admin.php?ac='.$ac.'&fileurl='.$fileurl.'&do=views&id='.$id.'">点击审批>></a>';
				
				SMS_ADD_POST($staffidsms,$content,0,0,$_USER->id);
			}
			
			if(getGP('sms_phone_box_staffid','P')!=''){
				$content='';
				$content=$staffidsms.':有一个会议申请需要您审批,申请人是:"'.$apppersonsms.'",请登录OA进行审批!';
				PHONE_ADD_POST(getGP('staffidphone','P'),$content,$staffidsms,0,0,$_USER->id);
			}
			$content='';
			$content=serialize($conference);
			$title='新增会议信息';
			get_logadd($id,$content,$title,19,$_USER->id);
		}
		show_msg('会议信息操作成功！', 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'');
	}else{
		$id = getGP('id','G','int');
		if($id!=''){
			get_key("istration_conference_edit");
			$user = $db->fetch_one_array("SELECT * FROM ".DB_TABLEPRE."conference  WHERE id = '$id'");
			$startdate=explode(' ',$user['startdate']);
			$starttime=explode(':',$startdate[1]);
			$enddate=explode(' ',$user['enddate']);
			$endtime=explode(':',$enddate[1]);
			$_title['name']='编辑';
		}else{ 
			get_key("istration_conference_Increase");
			$startdate=explode(' ',get_date('Y-m-d H:i:s',PHP_TIME));
			$starttime=explode(':',$startdate[1]);
			$enddate=explode(' ',get_date('Y-m-d H:i:s',PHP_TIME));
			$endtime=explode(':',$enddate[1]);
			$_title['name']='发布';
		}
		include_once('template/conferenceadd.php');
		
	}
}elseif ($do == 'record') {
	if($_POST['view']!=''){
		
		$id = getGP('id','P','int');
		if($id!=''){
			$conferenceid = check_str(getGP('conferenceid','P'));
			$attendance = check_str(getGP('attendance','P'));
			$content = getGP('content','P');
			$conferenceroom = getGP('conferenceroom','P');
			$recordperson = $_USER->id;
			$appendix = check_str(getGP('appendix','P'));
			$conference_record = array(
				'attendance' => $attendance,
				'conferenceroom' => $conferenceroom,
				'appendix' => $appendix,
				'content' => $content
			);
			update_db('conference_record',$conference_record, array('rid' => $id));
			$content='';
			$content=serialize($conference_record);
			$title='编辑会议记录信息';
			get_logadd($id,$content,$title,19,$_USER->id);
			
		}else{
			$conferenceid = check_str(getGP('conferenceid','P'));
			$attendance = check_str(getGP('attendance','P'));
			$content = getGP('content','P');
			$conferenceroom = getGP('conferenceroom','P');
			$recordperson = $_USER->id;
			$appendix = check_str(getGP('appendix','P'));
			$date = get_date('Y-m-d H:i:s',PHP_TIME);
			$conference_record = array(
				'conferenceid' => $conferenceid,
				'date' => $date,
				'attendance' => $attendance,
				'conferenceroom' => $conferenceroom,
				'recordperson' => $recordperson,
				'appendix' => $appendix,
				'content' => $content
			);
			insert_db('conference_record',$conference_record);
			$id=$db->insert_id();
			$content='';
			$content=serialize($conference_record);
			$title='新增会议记录信息';
			get_logadd($id,$content,$title,19,$_USER->id);
		}
		show_msg('会议记录信息操作成功！', 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'&do=views&id='.$conferenceid.'#2');
	}else{
		$cid = getGP('cid','G','int');
		if($cid!=''){
		$user = $db->fetch_one_array("SELECT * FROM ".DB_TABLEPRE."conference_record  WHERE conferenceid = '$cid'");
		}
		include_once('template/recordsave.php');
		
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
				'type'=>7,
				'uid' => $uid
			);
			insert_db('bbs_log',$bbs_log);
			$content=serialize($bbs_log);
			$title='评论信息';
			get_logadd($id,$content,$title,19,$_USER->id);
			show_msg('评论发布成功！', 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'&do=views&id='.$bbsid);
		}else{
			if($id!=''){
				$blog = $db->fetch_one_array("SELECT * FROM ".DB_TABLEPRE."conference  WHERE id = '$id'");
				$record = $db->fetch_one_array("SELECT * FROM ".DB_TABLEPRE."conference_record  WHERE conferenceid = '$id'");
				$_title['name']='[会议信息浏览]';
			}
		}
		include_once('template/conferenceviews.php');
}elseif ($do == 'excel') {
	$datename="conference_".get_date('YmdHis',PHP_TIME);
	$outputFileName = 'data/excel/'.$datename.'.xls';
		$content = array();
		$archive=array("类型","会议名称","主题","开始时间","结束时间","申请人","会议记录人员","出席人员","审批人员","会议室","会议类别","内容","会议总结");
		$content[] = $archive;
		$wheresql = '';
		if ($title = getGP('title','P')) {
			$wheresql .= " AND (subject LIKE '%$title%' or title LIKE '%$title%')";
		}
		if ($otype = getGP('otype','P')) {
			$wheresql .= " AND otype='".$otype."'";
		}
		if ($conferenceroom = getGP('conferenceroom','P')) {
			$wheresql .= " AND conferenceroom='".$conferenceroom."'";
		}
		
		//时间
		$venddate = getGP('venddate','P');
		$vstartdate = getGP('vstartdate','P');
		if ($vstartdate!='' && $venddate!='') {
			$wheresql .= " AND (startdate<'".$vstartdate."' and enddate>'".$venddate."')";
		}
		$ischeck = getGP('ischeck','P');
		if($ischeck=='1'){
			$wheresql .= " AND attendance LIKE '%".get_realname($_USER->id)."%'";
		}elseif($ischeck=='2'){
			$wheresql .= " AND attendance LIKE '%".get_realname($_USER->id)."%' and enddate<='".get_date('Y-m-d H:i:s',PHP_TIME)."'";
		}elseif($ischeck=='3'){
			$wheresql .= " AND attendance LIKE '%".get_realname($_USER->id)."%' and startdate>='".get_date('Y-m-d H:i:s',PHP_TIME)."'";
		}elseif($ischeck=='4'){
			$wheresql .= " AND attendance LIKE '%".get_realname($_USER->id)."%' and startdate<='".get_date('Y-m-d H:i:s',PHP_TIME)."'";
		}
		$vuidtype = getGP('vuidtype','P');
		if(!is_superadmin() && $vuidtype=='' && $ischeck==''){
			$wheresql .= " AND uid='".$_USER->id."'";
		}
		if ($vuidtype!='') {
			if($vuidtype=='-1'){
				$wheresql .= get_subordinate($_USER->id,'uid');
			}else{
				$wheresql .= " and uid='".$vuidtype."'";
			}
		}
		$sql = "SELECT * FROM ".DB_TABLEPRE."conference WHERE 1 $wheresql ORDER BY id desc";
		$result = $db->query($sql);
		while ($row = $db->fetch_array($result)) {
			$record = $db->fetch_one_array("SELECT * FROM ".DB_TABLEPRE."conference_record WHERE conferenceid='".$row[id]."'");
			if($row[type]=='1'){
				$type='待批';
			}elseif($row[type]=='2'){
				$type='己批';
			}else{
				$type='拒绝';
			}	
			$archive = array(
				"".$type."",
				"".$row[title]."",
				"".$row[subject]."",
				"".str_replace("-",".",$row[startdate])."",
				"".str_replace("-",".",$row[enddate])."",
				"".get_realname($row['appperson'])."",
				"".get_realname($row['recorduser'])."",
				"".$row[attendance]."",
				"".get_realname($row['staffid'])."",
				"".get_typename($row['conferenceroom'])."",
				"".get_typename($row['otype'])."",
				"".$row['content']."",
				"".$record['content'].""
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