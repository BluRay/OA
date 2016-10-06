<?php
/*
	[Office 515158] (C) 2009-2012 天生创想 Inc.
	$Id: mod_eweb 1209087 2012-01-08 08:58:28Z baiwei.jiang $
*/
(!defined('IN_TOA') || !defined('IN_ADMIN')) && exit('Access Denied!');

empty($do) && $do = 'list';
if ($do == 'list') {
	//列表信息 
	$wheresql = '';
	$page = max(1, getGP('page','G','int'));
	$pagesize = $_CONFIG->config_data('pagenum');
	$offset = ($page - 1) * $pagesize;
	$url = 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'';
	$num = $db->result("SELECT COUNT(*) AS num FROM ".DB_TABLEPRE."web  where uid='".$_USER->id."' ");
    $sql = "SELECT * FROM ".DB_TABLEPRE."web  where uid='".$_USER->id."'  ORDER BY id desc LIMIT $offset, $pagesize";
	$result = $db->fetch_all($sql);
	include_once('template/eweb.php');

} elseif ($do == 'update') {
	$idarr = getGP('id','P','array');
	foreach ($idarr as $id) {
		$db->query("DELETE FROM ".DB_TABLEPRE."web WHERE id = '$id' ");	
	}
	$content=serialize($idarr);
	$title='删除收藏信息';
	get_logadd($id,$content,$title,21,$_USER->id);
	show_msg('收藏信息删除成功！', 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'');

} elseif ($do == 'add') {
	if($_POST['view']!=''){
		$id = getGP('id','P','int');
		if($id!=''){
			$title = check_str(getGP('title','P'));
			$weburl = check_str(getGP('weburl','P'));
			$content = check_str(getGP('content','P'));
			$web = array(
				'title' => $title,
				'weburl' => $weburl,
				'content' => $content
			);
			update_db('web',$web, array('id' => $id));
			$content=serialize($web);
			$title='编辑收藏信息';
			get_logadd($id,$content,$title,21,$_USER->id);
		}else{
			$title = check_str(getGP('title','P'));
			$weburl = check_str(getGP('weburl','P'));
			$content = check_str(getGP('content','P'));
			$web = array(
				'title' => $title,
				'weburl' => $weburl,
				'content' => $content,
				'date' => get_date('Y-m-d H:i:s',PHP_TIME),
				'uid'=>$_USER->id
			);
			insert_db('web',$web);
			$id=$db->insert_id();
			$content=serialize($web);
			$title='添加收藏信息';
			get_logadd($id,$content,$title,21,$_USER->id);
		}
		show_msg('收藏信息操作成功！', 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'');
	}else{
		$id = getGP('id','G','int');
		if($id!=''){
			$user = $db->fetch_one_array("SELECT * FROM ".DB_TABLEPRE."web WHERE id = '$id' ");
			$_title['name']='编辑';
		}else{
			$_title['name']='发布';
		}
		include_once('template/ewebadd.php');
		
	}
	
}

?>