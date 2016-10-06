<?php
/*
	[Office 515158] (C) 2009-2012 天生创想 Inc.
	$Id: mod_bbs 1209087 2012-01-08 08:58:28Z baiwei.jiang $
*/
(!defined('IN_TOA') || !defined('IN_ADMIN')) && exit('Access Denied!');
get_key("bbs_");
empty($do) && $do = 'list';
if($ischeck=getGP('ischeck','G')){
	$_check['ischeck'.getGP('ischeck','G').'']='  ui-tab-trigger-item-current';
}else{
	$_check['ischeck']='  ui-tab-trigger-item-current';
}
if ($do == 'list') {
	//列表信息 
	$wheresql = '';
	$page = max(1, getGP('page','G','int'));
	$pagesize = $_CONFIG->config_data('pagenum');
	$offset = ($page - 1) * $pagesize;
	$url = 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'&ischeck='.$ischeck.'';
	if ($bbsclass = getGP('bbsclass','G')) {
		$wheresql .= " AND bbsclass = '".$bbsclass."'";
		$url .= '&bbsclass='.$bbsclass;	
	}
	if ($title = getGP('title','G')) {
		$wheresql .= " AND title LIKE '%$title%'";
		$url .= '&title='.rawurlencode($title);
	}
	//时间
	$venddate = getGP('venddate','G');
	$vstartdate = getGP('vstartdate','G');
	if ($vstartdate!='' && $venddate!='') {
		$wheresql .= " AND (issuedate>='".$vstartdate."' and issuedate<='".$venddate."')";
		$url .= '&vstartdate='.$vstartdate.'&venddate='.$venddate;
	}
	if($ischeck=='1'){
		$wheresql .= " AND uid='".$_USER->id."'";
	}
	if($ischeck=='2'){
		$sql="SELECT classadmin FROM ".DB_TABLEPRE."bbsclass  WHERE classadmin like '%".get_realname($_USER->id)."%' ";
		$type_bbsclass = $db->fetch_one_array($sql);
		if($type_bbsclass["classadmin"]!=''){
				$wheresql .= " AND type = '1'";
		}	
	}else{
		if($ischeck!='1'){
			$wheresql .= " AND (type = '2' or type='3')";
		}
	}
	$vuidtype = getGP('vuidtype','G');
	if ($vuidtype!='') {
		if($vuidtype=='-1'){
				$wheresql .= get_subordinate($_USER->id,'uid');
			}else{
				$wheresql .= " and uid='".$vuidtype."'";
			}
		$url .= '&vuidtype='.$vuidtype;
	}
	
	
	$num = $db->result("SELECT COUNT(*) AS num FROM ".DB_TABLEPRE."bbs WHERE 1 $wheresql ORDER BY id desc");
    $sql = "SELECT * FROM ".DB_TABLEPRE."bbs WHERE 1 $wheresql ORDER BY id desc LIMIT $offset, $pagesize";
	$result = $db->fetch_all($sql);
	$bbsclasslist = array();
	$sql = "SELECT * FROM ".DB_TABLEPRE."bbsclass  ORDER BY id asc";
	$query = $db->query($sql);
	while ($row = $db->fetch_array($query)) {
		$bbsclasslist[] = $row;
	}
	include_once('template/bbslist.php');

}elseif ($do == 'keys') {
	
	get_key("bbs_key");
    $id=$_GET["id"];
	$bbs = array(
		'type' => 2
	);
	update_db('bbs',$bbs, array('id' => $id));
	show_msg('贴子信息审批成功！', 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'&ischeck=2');

}/*elseif ($do == '置 顶') {//新版功能被去掉了，不知道什么时候可以再还原
	get_key("bbs_type_");
	$idarr = getGP('id','P','array');
	$bbs = array(
		'type' => 3
	);
	foreach ($idarr as $id) {
	update_db('bbs',$bbs, array('id' => $id));
	}
	goto_page('admin.php?ac=index&fileurl=bbs');

}*/elseif ($do == 'update') {
	
	get_key("bbs_delete");
	$idarr = getGP('id','P','array');
	foreach ($idarr as $id) {
		$db->query("DELETE FROM ".DB_TABLEPRE."bbs WHERE id = '$id' ");
		$db->query("DELETE FROM ".DB_TABLEPRE."bbs_log WHERE bbsid = '$id' ");
	}
	$content=serialize($idarr);
	$title='删除贴子';
	get_logadd($id,$content,$title,30,$_USER->id);
	show_msg('贴子信息删除成功！', 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'');

}elseif ($do == 'add') {
	
	if($_POST['view']!=''){
		$id = getGP('id','P','int');
		if($id!=''){
			$bbsclass = getGP('bbsclass','P');
			$title = check_str(getGP('title','P'));
			$author = check_str(getGP('author','P'));
			$origin = check_str(getGP('origin','P'));
			$content = trim(getGP('content','P'));
			$bbsclass = getGP('bbsclass','P');
			$bbstyle = $db->fetch_one_array("SELECT * FROM ".DB_TABLEPRE."bbsclass  WHERE id = '$bbsclass' ");
			if($bbstyle["type"]=='1'){
				$type =2;
			}else{
				$type =1;
			}	
			$bbs = array(
				'bbsclass' => $bbsclass,
				'title' => $title,
				'author' => $author,
				'origin' => $origin,
				'content' => $content,
				'readnum' => $readnum,
				'type' => $type
			);
			update_db('bbs',$bbs, array('id' => $id));
			$content=serialize($bbs);
			$title='编辑贴子';
			get_logadd($id,$content,$title,30,$_USER->id);
			
		}else{
			$title = check_str(getGP('title','P'));
			$author = check_str(getGP('author','P'));
			$origin = check_str(getGP('origin','P'));
			$content = trim(getGP('content','P'));
			$bbsclass = getGP('bbsclass','P');
			$bbstyle = $db->fetch_one_array("SELECT * FROM ".DB_TABLEPRE."bbsclass  WHERE id = '$bbsclass' ");
			if($bbstyle["type"]=='1'){
				$type =2;
			}else{
				$type =1;
			}
			$issuedate = get_date('Y-m-d H:i:s',PHP_TIME);
			$readnum = 0;
			$uid = $_USER->id;
			$bbs = array(
				'bbsclass' => $bbsclass,
				'title' => $title,
				'author' => $author,
				'origin' => $origin,
				'content' => $content,
				'issuedate' => $issuedate,
				'readnum' => $readnum,
				'type' => $type,
				'uid' => $uid
			);
			insert_db('bbs',$bbs);
			$id=$db->insert_id();
			$content=serialize($bbs);
			$title='发布贴子';
			get_logadd($id,$content,$title,30,$_USER->id);
		}
		show_msg('贴子信息操作成功！', 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'');
	}else{
		$id = getGP('id','G','int');
		if($id!=''){
			$user = $db->fetch_one_array("SELECT * FROM ".DB_TABLEPRE."bbs  WHERE id = '$id' ");
			get_key("bbs_edit");
			$_title['name']='编辑';
		}else{
			get_key("bbs_add");
			$_title['name']='发布';
		}
		include_once('template/bbsadd.php');
	}
	
}elseif ($do == 'bbsclass') {
	if(getGP('view','P')=='save'){
		$idarr = getGP('id','P','array');
		$name = getGP('name','P','array');
		$classadmin = getGP('classadmin','P','array');
		$type = getGP('type','P','array');
		foreach ($idarr as $id) {
			if($name[$id]=='')$name[$id]='新版块名称';
			$bbsclass = array(
				'name' => $name[$id],
				'classadmin' => $classadmin[$id],
				'type' => $type[$id],
				'uid' => $_USER->id
			);
			update_db('bbsclass',$bbsclass, array('id' => $id));
		}
		$newname = '';
		foreach (getGP('newname','P','array') as $name) {
			$newname.=$name.',';
		}
		$newtype = '';
		foreach (getGP('newtype','P','array') as $name) {
			$newtype.=$name.',';
		}
		$newname=explode(',',substr($newname, 0, -1));
		$newtype=explode(',',substr($newtype, 0, -1));
		if($newname!=''){
			for($i=0;$i<sizeof($newname);$i++){
				if($newname[$i]!=''){
					if($newname[$i]=='')$newname[$i]='新版块名称';
					$bbsclass = array(
						'name' => $newname[$i],
						'type' => $newtype[$i],
						'uid' => $_USER->id
					);
					insert_db('bbsclass',$bbsclass);
					$id=$db->insert_id();
					$content=serialize($bbsclass);
					$title='添加版块';
					get_logadd($id,$content,$title,30,$_USER->id);
				}
			}
		}
		show_msg('版块信息操作成功！', 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'&do=bbsclass');
	}elseif(getGP('id','G')!=''){
		$db->query("DELETE FROM ".DB_TABLEPRE."bbsclass WHERE id = '".getGP('id','G')."' ");
		$db->query("DELETE FROM ".DB_TABLEPRE."bbs WHERE bbsclass = '".getGP('id','G')."' ");
		$content=getGP('id','G').get_log(1).$_USER->id;
		$title='删除版块';
		get_logadd(getGP('id','G'),$content,$title,30,$_USER->id);
		show_msg('版块信息删除成功！', 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'&do=bbsclass');
	}else{
		get_key("bbsclass_");
		$sql = "SELECT * FROM ".DB_TABLEPRE."bbsclass  ORDER BY id asc";
		$result = $db->fetch_all($sql);
		include_once('template/bbsclass.php');
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
				'type'=>1,
				'uid' => $uid
			);
			insert_db('bbs_log',$bbs_log);
			$id=$db->insert_id();
			$bbs = array(
				'enddate' => $enddate
			);
			update_db('bbs',$bbs, array('id' => $bbsid));
			$content=serialize($bbs_log);
			$title='回复贴子';
			get_logadd($id,$content,$title,30,$_USER->id);
			show_msg('贴子回复成功！', 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'&do=views&id='.$bbsid);
		}else{
			if($id!=''){
				$db->query("UPDATE ".DB_TABLEPRE."bbs SET readnum = readnum + 1 WHERE id = '$id' ");
				
				$blog = $db->fetch_one_array("SELECT * FROM ".DB_TABLEPRE."bbs  WHERE id = '$id' ");
				$_title['name']='贴子浏览';
			}
		}
		include_once('template/bbsviews.php');
}
?>