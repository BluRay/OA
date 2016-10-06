<?php
/*
	[Office 515158] (C) 2009-2012 天生创想 Inc.
	$Id: mod_know 1209087 2012-01-08 08:58:28Z baiwei.jiang $
*/
(!defined('IN_TOA') || !defined('IN_ADMIN')) && exit('Access Denied!');
empty($do) && $do = 'list';
$_check['ischeck']='  ui-tab-trigger-item-current';
if ($do == 'list') {
	//列表信息 
	$wheresql = '';
	$page = max(1, getGP('page','G','int'));
	$pagesize = $_CONFIG->config_data('pagenum');
	$offset = ($page - 1) * $pagesize;
	$url = 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'';
	if ($categoryid = getGP('categoryid','G')) {
		$wheresql .= " AND categoryid = '".$categoryid."'";
		$url .= '&categoryid='.$categoryid;	
	}
	if ($title = getGP('title','G')) {
		$wheresql .= " AND title LIKE '%$title%'";
		$url .= '&title='.rawurlencode($title);
	}
	$vuidtype = getGP('vuidtype','G');
	if ($vuidtype!='') {
		if($vuidtype=='-1'){
				$wheresql .= get_subordinate($_USER->id,'uid');
			}else{
				$wheresql .= " and uid='".$vuidtype."'";
			}
		$url .= '&vuidtype='.rawurlencode($vuidtype);
	}
	if(!is_superadmin() && $vuidtype==''){
		$wheresql .= " AND (type ='2' or uid = $_USER->id)";
	}
	//时间
	$venddate = getGP('venddate','G');
	$vstartdate = getGP('vstartdate','G');
	if ($vstartdate!='' && $venddate!='') {
		$wheresql .= " AND (date>='".$vstartdate."' and date<='".$venddate."')";
		$url .= '&vstartdate='.$vstartdate.'&venddate='.$venddate;
	}
	
	$num = $db->result("SELECT COUNT(*) AS num FROM ".DB_TABLEPRE."knowledge WHERE 1 $wheresql ORDER BY id desc");
    $sql = "SELECT * FROM ".DB_TABLEPRE."knowledge WHERE 1 $wheresql ORDER BY id desc LIMIT $offset, $pagesize";
	$result = $db->fetch_all($sql);
	include_once('template/knowlist.php');

}elseif ($do == 'update') {
	
	get_key("knowledge_delete");
	$idarr = getGP('id','P','array');
	foreach ($idarr as $id) {
		$db->query("DELETE FROM ".DB_TABLEPRE."knowledge WHERE id = '$id' ");
		$db->query("DELETE FROM ".DB_TABLEPRE."bbs_log WHERE bbsid = '$id' and type='2' ");
	}
	$content=serialize($idarr);
	$title='删除内容';
	get_logadd($id,$content,$title,17,$_USER->id);
	show_msg('知识信息删除成功！', 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'');

}elseif ($do == 'add') {
	if($_POST['view']!=''){
		$id = getGP('id','P','int');
		if($id!=''){
			$categoryid = 0;
			$title = check_str(getGP('title','P'));
			$content = getGP('content','P');
			$type = getGP('type','P');
			$knowledge = array(
				'title' => $title,
				'content' => $content,
				'categoryid' => $categoryid,
				'type' => $type
			);
			update_db('knowledge',$knowledge, array('id' => $id));
			$content=serialize($knowledge);
			$title='编辑知识';
			get_logadd($id,$content,$title,17,$_USER->id);
		}else{
			$categoryid = 0;
			$title = check_str(getGP('title','P'));
			$content = getGP('content','P');
			$number = 0;
			$type = getGP('type','P');
			$udate=get_date('Y-m-d H:i:s',PHP_TIME);
			$knowledge = array(
				'title' => $title,
				'content' => $content,
				'number' => $number,
				'categoryid' => $categoryid,
				'type' => $type,
				'date' => $udate,
				'uid' => $_USER->id
			);
			insert_db('knowledge',$knowledge);
			$id=$db->insert_id();
			$content=serialize($knowledge);
			$title='新增知识';
			get_logadd($id,$content,$title,17,$_USER->id);
		}
		show_msg('知识信息操作成功！', 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'');
	}else{
		$id = getGP('id','G','int');
		if($id!=''){
			$user = $db->fetch_one_array("SELECT * FROM ".DB_TABLEPRE."knowledge  WHERE id = '$id' ");
			get_key("knowledge_read");
			$_title['name']='编辑';
		}else{ 
			get_key("knowledge_Increase");
			$_title['name']='发布';
		}
		include_once('template/knowadd.php');
		
	}
	
}elseif ($do == 'views') {
		$id = getGP('id','G','int');
		if($_POST['view']!=''){
			$bbsid = getGP('bbsid','P');
			$title = getGP('title','P');
			$author = getGP('author','P');
			$content = getGP('content','P');
			$enddate = get_date('Y-m-d H:i:s',PHP_TIME);
			$uid = $_USER->id;
			//主表信息
			$bbs_log = array(
				'bbsid' => $bbsid,
				'title' => $title,
				'author' => $author,
				'content' => $content,
				'enddate' => $enddate,
				'type'=>2,
				'uid' => $uid
			);
			insert_db('bbs_log',$bbs_log);
			$content=serialize($bbs_log);
			$title='回复信息';
			get_logadd($id,$content,$title,17,$_USER->id);
			show_msg('评论发布成功！', 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'&do=views&id='.$bbsid);
		}else{
			if($id!=''){
				$db->query("UPDATE ".DB_TABLEPRE."knowledge SET number = number + 1 WHERE id = '$id'");
				$blog = $db->fetch_one_array("SELECT * FROM ".DB_TABLEPRE."knowledge  WHERE id = '$id'");
				$_title['name']='信息浏览';
			}
		}
		include_once('template/knowviews.php');
}elseif ($do == 'excel') {
	$datename="knowledge_".get_date('YmdHis',PHP_TIME);
	$outputFileName = 'data/excel/'.$datename.'.xls';
		$content = array();
		$archive=array("标题","查看次数","类型","发布时间","发布人","内容");
		$content[] = $archive;
		$wheresql = '';
		if ($title = getGP('title','P')) {
			$wheresql .= " AND title LIKE '%$title%'";
		}
		$vuidtype = getGP('vuidtype','P');
		if ($vuidtype!='') {
			if($vuidtype=='-1'){
				$wheresql .= get_subordinate($_USER->id,'uid');
			}else{
				$wheresql .= " and uid='".$vuidtype."'";
			}
		}
		if(!is_superadmin() && $vuidtype==''){
			$wheresql .= " AND (type ='2' or uid = $_USER->id)";
		}
		//时间
		$venddate = getGP('venddate','P');
		$vstartdate = getGP('vstartdate','P');
		if ($vstartdate!='' && $venddate!='') {
			$wheresql .= " AND (date>='".$vstartdate."' and date<='".$venddate."')";
		}
		
		$sql = "SELECT * FROM ".DB_TABLEPRE."knowledge WHERE 1 $wheresql  ORDER BY id desc";
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