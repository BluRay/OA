<?php
/*
	[Office 515158] (C) 2009-2012 天生创想 Inc.
	$Id: mod_news 1209087 2012-01-08 08:58:28Z baiwei.jiang $
*/
(!defined('IN_TOA') || !defined('IN_ADMIN')) && exit('Access Denied!');
empty($do) && $do = 'list';
$_check['ischeck']='  ui-tab-trigger-item-current';

if ($_GET[type]=='1'){
	$_news['title']='新闻';
	$keynews='news_new';
}elseif($_GET[type]=='2'){
	$_news['title']='图片新闻';
	$keynews='news_pic_new';
}elseif($_GET[type]=='3'){
	$_news['title']='公告';
	$keynews='news_cement';
}elseif($_GET[type]=='4'){
	$_news['title']='通知';
	$keynews='news_notice';
}elseif($_GET[type]=='5'){
	$_news['title']='大事记';
	$keynews='news_chronicle';
}elseif($_GET[type]=='6'){
	$_news['title']='电子期刊';
	$keynews='news_periodical';
}
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
	if ($type = getGP('type','G')) {
		$wheresql .= " AND type = '".$type."'";
		$url .= '&type='.$type;	
	}
	if ($title = getGP('title','G')) {
		$wheresql .= " AND subject LIKE '%$title%'";
		$url .= '&title='.rawurlencode($title);
	}
	//时间
	$venddate = getGP('venddate','G');
	$vstartdate = getGP('vstartdate','G');
	if ($vstartdate!='' && $venddate!='') {
		$wheresql .= " AND (date>='".$vstartdate."' and date<='".$venddate."')";
		$url .= '&vstartdate='.$vstartdate.'&venddate='.$venddate;
	}
	//权限
	if(!is_superadmin()){
		$wheresql .= " AND (receive like'%".get_realname($_USER->id)."%' or receive='0')";
	}
	$num = $db->result("SELECT COUNT(*) AS num FROM ".DB_TABLEPRE."news WHERE 1 $wheresql ORDER BY id desc");
    $sql = "SELECT * FROM ".DB_TABLEPRE."news WHERE 1 $wheresql ORDER BY id desc LIMIT $offset, $pagesize";
	$result = $db->fetch_all($sql);
	include_once('template/newslist.php');

}elseif ($do == 'views') {
		$id = getGP('id','G','int');
		if($_POST['view']!=''){
			
			$bbsid = getGP('bbsid','P');
			$title = check_str(getGP('title','P'));
			$author = getGP('author','P');
			$content = getGP('content','P');
			$type = getGP('type','G');
			$enddate = get_date('Y-m-d H:i:s',PHP_TIME);
			$uid = $_USER->id;
			//主表信息
			$bbs_log = array(
				'bbsid' => $bbsid,
				'title' => $title,
				'author' => $author,
				'content' => $content,
				'enddate' => $enddate,
				'type'=>3,
				'uid' => $uid
			);
			insert_db('bbs_log',$bbs_log);
			$content=serialize($bbs_log);
			$title='回复信息';
			get_logadd($id,$content,$title,13,$_USER->id);
			show_msg('评论发布成功！', 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'&do=views&type='.$type.'&id='.$bbsid);
		}else{
			if($id!=''){
				//$db->query("UPDATE ".DB_TABLEPRE."news SET number = number + 1 WHERE id = '$id'");
				$blog = $db->fetch_one_array("SELECT * FROM ".DB_TABLEPRE."news  WHERE id = '$id'");
				$_title['name']='信息浏览';
			}
		}
		include_once('template/newsviews.php');
}
?>