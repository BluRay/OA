<?php
/*
	[Office 515158] (C) 2009-2012 天生创想 Inc.
	$Id: mod_news 1209087 2012-01-08 08:58:28Z baiwei.jiang $
*/
(!defined('IN_TOA') || !defined('IN_ADMIN')) && exit('Access Denied!');
empty($do) && $do = 'list';
$_check['ischeck']='  ui-tab-trigger-item-current';
if($_GET[type]!=''){
	$_GET[type]=$_GET[type];
}else{
	$_GET[type]=$_POST[type];
}
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
get_key($keynews);

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
	$vuidtype = getGP('vuidtype','G');
	//权限
	if(!is_superadmin() && $vuidtype==''){
		$wheresql .= " AND (receive like'%".get_realname($_USER->id)."%' or receive='0' or uid='".$_USER->id."')";
	}
	if ($vuidtype!='') {
		if($vuidtype=='-1'){
				$wheresql .= get_subordinate($_USER->id,'uid');
			}else{
				$wheresql .= " and uid='".$vuidtype."'";
			}
		$url .= '&vuidtype='.$vuidtype;
	}
	$num = $db->result("SELECT COUNT(*) AS num FROM ".DB_TABLEPRE."news WHERE 1 $wheresql ORDER BY id desc");
    $sql = "SELECT * FROM ".DB_TABLEPRE."news WHERE 1 $wheresql ORDER BY id desc LIMIT $offset, $pagesize";
	$result = $db->fetch_all($sql);
	include_once('template/newslist.php');

}elseif ($do == 'update') {
	get_key($keynews.'_delete');
	//get_key("newsledge_delete");
	$idarr = getGP('id','P','array');
	foreach ($idarr as $id) {
		$db->query("DELETE FROM ".DB_TABLEPRE."news WHERE id = '$id' ");
		$db->query("DELETE FROM ".DB_TABLEPRE."bbs_log WHERE bbsid = '$id' and type='3' ");
	}
	$content=serialize($idarr);
	$title='删除'.$_news['title'].'内容';
	get_logadd($id,$content,$title,13,$_USER->id);
	show_msg($_news['title'].'信息删除成功！', 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'&type='.$_POST['type']);

}elseif ($do == 'add') {
	
	if($_POST['view']!=''){
		$id = getGP('id','P','int');
		if($id!=''){
			$categoryid = 0;
			$subject = check_str(getGP('subject','P'));
			$content = getGP('content','P');
			$type = getGP('type','P');
			$appendix = getGP('appendix','P');
			if($type=='2'){
				$pic = getGP('pic','P');
			}else{
				$pic='0';
			}
			$news = array(
				'subject' => $subject,
				'content' => $content,
				'appendix' => $appendix,
				'pic' => $pic
			);
			update_db('news',$news, array('id' => $id));
			$content='';
			$content=serialize($news);
			$title='编辑'.$_news['title'];
			get_logadd($id,$content,$title,13,$_USER->id);
			
		}else{
			$category = 0;
			$subject = check_str(getGP('subject','P'));
			if(getGP('shownamemaster','P')!=''){
				$receive = check_str(getGP('shownamemaster','P'));
			}else{
				$receive ='0';
			}
			$content = getGP('content','P');
			$appendix = getGP('appendix','P');
			$type = getGP('type','P');
			if($type=='2'){
				$pic = getGP('pic','P');
			}else{
				$pic='0';
			}
			$uid=$_USER->id;
			$udate=get_date('Y-m-d H:i:s',PHP_TIME);
			$news = array(
				'category' => $category,
				'receive' => $receive,
				'subject' => $subject,
				'content' => $content,
				'appendix' => $appendix,
				'type' => $type,
				'date' => $udate,
				'pic' => $pic,
				'uid' => $uid
			);
			insert_db('news',$news);
			$id=$db->insert_id();
			if(getGP('shownamemasterid','P')!=''){
				$shownamemaster=explode(',',getGP('shownamemasterid','P')); 
				for($i=0;$i<sizeof($shownamemaster);$i++){
					$news_read = array(
						'disdate' => $udate,
						'uid' => $shownamemaster[$i],
						'dkey' => '0',
						'newsid'=>$id
					);
					insert_db('news_read',$news_read);
				}
			}
			if(getGP('sms_info_box_shownamemaster','P')!=''){
				$content='';
				$content='您有一条新的'.$_news['title'].'需要阅读,请点击查';
				$content.='看!<a href="admin.php?ac=news&fileurl=administrative&do=views';
				$content.='&id='.$id.'&type='.$type.'">点击阅读>></a>';
				SMS_ADD_POST($receive,$content,0,0,$_USER->id);
			}
			//手机短信
			if(getGP('sms_phone_box_shownamemaster','P')!=''){
				$content='';
				$content='您有一新企业消息['.$_news['title'].']需要阅读;请登录OA进行阅读!';
				PHONE_ADD_POST(getGP('shownamemasterphone','P'),$content,$receive,0,0,$_USER->id);
			}
			$content='';
			$content=serialize($news);
			$title='新增'.$_news['title'];
			get_logadd($id,$content,$title,13,$_USER->id);
		}
		show_msg($_news['title'].'信息操作成功！', 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'&type='.$type);
	}else{
		$id = getGP('id','G','int');
		if($id!=''){
			$user = $db->fetch_one_array("SELECT * FROM ".DB_TABLEPRE."news  WHERE id = '$id' ");
			get_key($keynews.'_edit');
			$_title['name']='编辑';
		}else{ 
			get_key($keynews.'_Increase');
			$_title['name']='发布';
		}
		include_once('template/newsadd.php');
		
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
}elseif ($do == 'excel') {
	$datename="news_".get_date('YmdHis',PHP_TIME);
	$outputFileName = 'data/excel/'.$datename.'.xls';
		$content = array();
		$archive=array("主题","内容","附件","发布日期","发布人","阅读人");
		$content[] = $archive;
		$wheresql = '';
		if ($type = getGP('type','P')) {
			$wheresql .= " AND type = '".$type."'";
		}
		if ($title = getGP('title','P')) {
			$wheresql .= " AND subject LIKE '%$title%'";
		}
		//时间
		$venddate = getGP('venddate','P');
		$vstartdate = getGP('vstartdate','P');
		if ($vstartdate!='' && $venddate!='') {
			$wheresql .= " AND (date>='".$vstartdate."' and date<='".$venddate."')";
		}
		$vuidtype = getGP('vuidtype','P');
		//权限
		if(!is_superadmin() && $vuidtype==''){
			$wheresql .= " AND (receive like'%".get_realname($_USER->id)."%' or receive='0' or uid='".$_USER->id."')";
		}
		if ($vuidtype!='') {
			if($vuidtype=='-1'){
				$wheresql .= get_subordinate($_USER->id,'uid');
			}else{
				$wheresql .= " and uid='".$vuidtype."'";
			}
			$url .= '&vuidtype='.$vuidtype;
		}
		
		$sql = "SELECT * FROM ".DB_TABLEPRE."news WHERE 1 $wheresql  ORDER BY id desc";
		$result = $db->query($sql);
		while ($row = $db->fetch_array($result)) {	
			$archive = array(
				"".$row[subject]."",
				"".$row[content]."",
				"".$row[appendix]."",
				"".str_replace("-",".",$row[date])."",
				"".get_realname($row['uid'])."",
				"".$row['receive'].""
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