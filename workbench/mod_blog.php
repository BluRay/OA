<?php
/*
	[Office 515158] (C) 2009-2012 天生创想 Inc.
	$Id: mod_blog 1209087 2012-01-08 08:58:28Z baiwei.jiang $
*/
(!defined('IN_TOA') || !defined('IN_ADMIN')) && exit('Access Denied!');
empty($do) && $do = 'list';
if($_GET['type']=='1'){
	$_check['ischeck1']='  ui-tab-trigger-item-current';
}else{
	$_check['ischeck']='  ui-tab-trigger-item-current';
}
get_key("date_blog");
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
		$wheresql .= " AND (date>='".$vstartdate."' and date<='".$venddate."')";
		$url .= '&vstartdate='.$vstartdate.'&venddate='.$venddate;
	}
	$vuidtype = getGP('vuidtype','G');
	if(!is_superadmin() && $vuidtype==''){
		if (getGP('type','G')!='1') {
			$wheresql .= " AND uid = $_USER->id";	
		}else{
			$wheresql .= " AND type ='2' and uid != $_USER->id";	
		}
		$url .= '&type='.getGP('type','G','int');
	}
	if ($vuidtype!='') {
		if (getGP('type','G')!='1') {
			if($vuidtype=='-1'){
				$wheresql .= get_subordinate($_USER->id,'uid');
			}else{
				$wheresql .= " and uid='".$vuidtype."'";
			}
		}else{
			$wheresql .=" AND type ='2' ".get_subordinate($_USER->id,'uid');
		}
		$url .= '&vuidtype='.$vuidtype;
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
	$num = $db->result("SELECT COUNT(*) AS num FROM ".DB_TABLEPRE."blog WHERE 1 $wheresql ORDER BY id desc");
    $sql = "SELECT * FROM ".DB_TABLEPRE."blog WHERE 1 $wheresql ORDER BY id desc LIMIT $offset, $pagesize";
	$result = $db->fetch_all($sql);
	include_once('template/bloglist.php');

}elseif ($do == 'update') {
	
	get_key("date_blog_delete");
	$idarr = getGP('id','P','array');
	foreach ($idarr as $id) {
		$db->query("DELETE FROM ".DB_TABLEPRE."blog WHERE id = '$id' ");
		$db->query("DELETE FROM ".DB_TABLEPRE."bbs_log WHERE bbsid = '$id' and type='9' ");
	}
	$content=serialize($idarr);
	$title='删除日记信息';
	get_logadd($id,$content,$title,10,$_USER->id);
	show_msg('日记信息删除成功！', 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'');

}elseif ($do == 'add') {
	if($_POST['view']!=''){
		$id = getGP('id','P','int');
		if($id!=''){
			$title = check_str(getGP('title','P'));
			$type = check_str(getGP('type','P'));
			$date = getGP('date','P');
			$contents = getGP('content','P');
			$blog = array(
				'title' => $title,
				'content' => $contents,
				'Categoryid' => 0,
				'type' => $type
			);
			update_db('blog',$blog, array('id' => $id));
			$content='';
			$content=serialize($blog);
			$title='评论日记信息';
			get_logadd($id,$content,$title,11,$_USER->id);
			
		}else{
			$title = check_str(getGP('title','P'));
			$type = check_str(getGP('type','P'));
			$date = getGP('date','P');
			$contents = getGP('content','P');
			$uid=$_USER->id;
			$blog = array(
				'title' => $title,
				'content' => $contents,
				'number' => 0,
				'Categoryid' => 0,
				'type' => $type,
				'date' => $date,
				'uid' => $uid
			);
			insert_db('blog',$blog);
			$id=$db->insert_id();
			$content=serialize($blog);
			$title='新建日记信息';
			get_logadd($id,$content,$title,11,$_USER->id);
		}
		show_msg('日记信息操作成功！', 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'');
	}else{
		$id = getGP('id','G','int');
		if($id!=''){
			$user = $db->fetch_one_array("SELECT * FROM ".DB_TABLEPRE."blog  WHERE id = '$id' ");
			get_key('date_blog_edit');
			$date=$user['date'];
			$_title['name']='编辑';
		}else{ 
			get_key('date_blog_Increase');
			$date=get_date('Y-m-d',PHP_TIME);
			$user['type']='1';
			$_title['name']='发布';
		}
		include_once('template/blogadd.php');
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
				'type'=>9,
				'uid' => $uid
			);
			insert_db('bbs_log',$bbs_log);
			$content=serialize($bbs_log);
			$title='回复信息';
			get_logadd($id,$content,$title,11,$_USER->id);
			show_msg('评论发布成功！', 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'&do=views&id='.$bbsid);
		}else{
			if($id!=''){
				$db->query("UPDATE ".DB_TABLEPRE."blog SET number = number + 1 WHERE id = '$id'");
				$blog = $db->fetch_one_array("SELECT * FROM ".DB_TABLEPRE."blog  WHERE id = '$id'");
				$_title['name']='信息浏览';
			}
		}
		include_once('template/blogviews.php');
}elseif ($do == 'excel') {
	$datename="blog_".get_date('YmdHis',PHP_TIME);
	$outputFileName = 'data/excel/'.$datename.'.xls';
		$content = array();
		$archive=array("标题","查看次数","类型","发布时间","发布人","内容");
		$content[] = $archive;
		$wheresql = '';
		if ($title = getGP('title','P')) {
			$wheresql .= " AND title LIKE '%$title%'";
		}
		//时间
		$vstartdate = getGP('vstartdate','P');
		$venddate = getGP('venddate','P');
		if ($vstartdate!='' && $venddate!='') {
			$wheresql .= " AND (date>='".$vstartdate."' and date<='".$venddate."')";
		}
		$vuidtype = getGP('vuidtype','P');
		if(!is_superadmin() && $vuidtype==''){
			if (getGP('type','P')!='1') {
				$wheresql .= " AND uid = $_USER->id";	
			}else{
				$wheresql .= " AND type ='2' and uid != $_USER->id";	
			}
		}
		if ($vuidtype!='') {
			if (getGP('type','P')!='1') {
				if($vuidtype=='-1'){
				$wheresql .= get_subordinate($_USER->id,'uid');
			}else{
				$wheresql .= " and uid='".$vuidtype."'";
			}
			}else{
				$wheresql .=" AND type ='2' ".get_subordinate($_USER->id,'uid');
			}
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
		$sql = "SELECT * FROM ".DB_TABLEPRE."blog WHERE 1 $wheresql ORDER BY id desc";
		$result = $db->query($sql);
		while ($row = $db->fetch_array($result)) {
			if($row[type]=='1'){
				$type='隐藏';
			}else{
				$type='公开';
			}	
			$archive = array(
				"".$row[title]."",
				"".$row[number]."",
				"".$type."",
				"".str_replace("-",".",$row[date])."",
				"".get_realname($row['uid'])."",
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