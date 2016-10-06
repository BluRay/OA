<?php
/*
	[Office 515158] (C) 2009-2012 天生创想 Inc.
	$Id: mod_document 1209087 2012-01-08 08:58:28Z baiwei.jiang $
*/
(!defined('IN_TOA') || !defined('IN_ADMIN')) && exit('Access Denied!');
empty($do) && $do = 'list';
if ($_GET[type]=='1'){
	$_title['title']='个人文件柜';
}elseif($_GET[type]=='2'){
	$_title['title']='公共文件柜';
}elseif($_GET[type]=='3'){
	$_title['title']='网络硬盘';
}elseif($_GET[type]=='4'){
	$_title['title']='下载';
}elseif($_GET[type]=='5'){
	$_title['title']='规章制度';
}elseif($_GET[type]=='6'){
	$_title['title']='报表中心';
}
get_key("office_document_".getGP('type','G')."");
$_check['ischeck']='  ui-tab-trigger-item-current';
if ($do == 'list') {
	//列表信息 
	$wheresql = '';
	$page = max(1, getGP('page','G','int'));
	$pagesize = $_CONFIG->config_data('pagenum');
	$offset = ($page - 1) * $pagesize;
	$url = 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'&type='.$_GET['type'].'';
	if ($documentid = getGP('documentid','G')) {
		$wheresql .= " AND documentid like '%,".$documentid."%'";
		$url .= '&documentid='.$documentid;	
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
	if(getGP('type','G')!='1'){
		if(!is_superadmin() && $vuidtype==''){
			$wheresql .= "  and (readuser LIKE'%".get_realname($_USER->id)."%' or uid='".$_USER->id."' or readuser='全体人员')";
		}
	}else{
		if(user_union_id=='' && $vuidtype==''){
			$wheresql .= "  and uid='".$_USER->id."'";
		}
	}
	if ($title = getGP('title','G')) {
		$wheresql .= " AND title LIKE '%$title%'";
		$url .= '&title='.rawurlencode($title);
	}
	//时间
	$venddate = getGP('venddate','G');
	$vstartdate = getGP('vstartdate','G');
	if ($vstartdate!='' && $venddate!='') {
		$wheresql .= " AND (date>='".$vstartdate."' and date<='".$venddate."')";
		$url .= '&vstartdate='.$vstartdate.'&venddate='.$venddate;
	}
	
	$num = $db->result("SELECT COUNT(*) AS num FROM ".DB_TABLEPRE."document WHERE 1 $wheresql and type = '".getGP('type','G')."' ORDER BY id desc");
    $sql = "SELECT * FROM ".DB_TABLEPRE."document WHERE 1 $wheresql and type = '".getGP('type','G')."' ORDER BY id desc LIMIT $offset, $pagesize";
	$result = $db->fetch_all($sql);
	include_once('template/documentlist.php');

}elseif ($do == 'update') {
	
	get_key("office_document_delete_".getGP('type','P')."");
	$idarr = getGP('id','P','array');
	foreach ($idarr as $id) {
		$db->query("DELETE FROM ".DB_TABLEPRE."document WHERE id = '$id'  ");
		
	}
	$content=serialize($idarr);
	$title=$_title['title'].'删除内容';
	get_logadd($id,$content,$title,34,$_USER->id);
	show_msg($_title['title'].'信息删除成功！', 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'&type='.$_GET['type'].'');

}elseif ($do == 'add') {
	
	if($_POST['view']!=''){
		$id = getGP('id','P','int');
		if($id!=''){
			$type = getGP('type','P');
			$title = getGP('title','P');
			$content = getGP('content','P');
			$date = get_date('Y-m-d H:i:s',PHP_TIME);
			$documentid = getGP('documentid','P');
			$annex = getGP('annex','P');
			$uid=$_USER->id;
			if(getGP('readuser','P')!=''){
				$readuser = getGP('readuser','P');
			}else{
				$readuser ="全体人员";
			}
			$document = array(
				'title' => $title,
				'content' => $content,
				'documentid' => $documentid,
				'annex' => $annex,
				'readuser' => $readuser
			);
			update_db('document',$document, array('id' => $id));
			//短消息
			if(getGP('sms_info_box_readuser','P')!=''){
				$content=$readuser.':您有一个文件需要阅读,名称为：'.$title.';请进行查看!<a href="admin.php?ac=views&fileurl=document&do=edit&id='.$id.'&type='.$type.'">点击查看>></a>';
				SMS_ADD_POST($readuser,$content,0,0,$_USER->id);
			}
			//手机短信
			if(getGP('sms_phone_box_readuser','P')!=''){
				$content=$readuser.':您有一个文件需要阅读,请登录OA进行查看!';
				PHONE_ADD_POST(getGP('readuserphone','P'),$content,$readuser,0,0,$_USER->id);
			}
			$content=serialize($document);
			$title='发布'.$_title['title'].'信息';
			get_logadd($id,$content,$title,34,$_USER->id);
			
		}else{
			$type = getGP('type','P');
			$title = getGP('title','P');
			$content = getGP('content','P');
			$date = get_date('Y-m-d H:i:s',PHP_TIME);
			$documentid = getGP('documentid','P');
			$annex = getGP('annex','P');
			$uid=$_USER->id;
			if(getGP('readuser','P')!=''){
			$readuser = getGP('readuser','P');
			}else{
			$readuser ="全体人员";
			}
			$document = array(
				'title' => $title,
				'content' => $content,
				'documentid' => $documentid,
				'annex' => $annex,
				'readuser' => $readuser,
				'type' => $type,
				'uid' => $uid,
				'date' => $date,
				'key' => 0
			);
			insert_db('document',$document);
			$id=$db->insert_id();
			//短消息
			if(getGP('sms_info_box_readuser','P')!=''){
				$content=$readuser.':您有一个文件需要阅读,名称为：'.$title.';请进行查看!<a href="admin.php?ac=views&fileurl='.$fileurl.'&do=edit&id='.$id.'&type='.$type.'">点击查看>></a>';
				SMS_ADD_POST($readuser,$content,0,0,$_USER->id);
			}
			//手机短信
			if(getGP('sms_phone_box_readuser','P')!=''){
				$content=$readuser.':您有一个文件需要阅读,请登录OA进行查看!';
				PHONE_ADD_POST(getGP('readuserphone','P'),$content,$readuser,0,0,$_USER->id);
			}
			$content=serialize($document);
			$title='新增'.$_title['title'].'信息';
			get_logadd($id,$content,$title,34,$_USER->id);
		}
		show_msg($_title['title'].'信息操作成功！', 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'&type='.$type.'');
	}else{
		$id = getGP('id','G','int');
		if($id!=''){
			$user = $db->fetch_one_array("SELECT * FROM ".DB_TABLEPRE."document  WHERE id = '$id'  ");
			get_key("office_document_edit_".getGP('type','G')."");
			$_title['name']='编辑';
		}else{ 
			get_key("office_document_Increase_".getGP('type','G')."");
			$_title['name']='发布';
		}
		include_once('template/documentadd.php');
		
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
				'type'=>4,
				'uid' => $uid
			);
			insert_db('bbs_log',$bbs_log);
			$content=serialize($bbs_log);
			$title='回复信息';
			get_logadd($id,$content,$title,34,$_USER->id);
			show_msg('评论发布成功！', 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'&do=views&type='.$_GET['type'].'&id='.$bbsid);
		}else{
			if($id!=''){
				$blog = $db->fetch_one_array("SELECT * FROM ".DB_TABLEPRE."document  WHERE id = '$id'");
				$_title['name']=$_title['title'].'信息浏览';
			}
		}
		include_once('template/documentviews.php');
}elseif($do == 'documenttype') {
	get_key("office_document_type_".getGP('type','G')."");
		$type = getGP('type','G','int');
		if($_POST['view']=='save'){
			$idarr = getGP('id','P','array');
			$name = getGP('name','P','array');
			$date = get_date('Y-m-d H:i:s',PHP_TIME);
			foreach ($idarr as $id) {
				if($name[$id]=='')$name[$id]='新文件夹名称';
				$document_type = array(
					'title' => $name[$id]
				);
				update_db('document_type',$document_type, array('id' => $id));
			}
			if(getGP('newid','P','array')!='' || getGP('newids','P','array')!=''){
				$newname = '';
				foreach (getGP('newname','P','array') as $name) {
					$newname.=$name.',';
				}
				$newinherited = '';
				foreach (getGP('newinherited','P','array') as $name) {
					$newinherited.=$name.',';
				}
				$newname=explode(',',substr($newname, 0, -1));
				$newinherited=explode(',',substr($newinherited, 0, -1));
				if($newname!=''){
					for($i=0;$i<sizeof($newname);$i++){
						if($newname[$i]!=''){
							if($newname[$i]=='')$newname[$i]='新文件夹名称';
							if($newinherited[$i]!=''){
								$fatherid=$newinherited[$i];
							}else{
								$fatherid='0';
							}
							$document_type = array(
								'title' => $newname[$i],
								'father'=>$fatherid,
								'date'=>$date,
								'type'=>$_GET['type'],
								'uid'=>$_USER->id
								
							);
							insert_db('document_type',$document_type);
						}
					}
				}
				$str=',新增了<font color=red>'.sizeof($newname).'</font>条信息';
			}
			show_msg('批量文件夹信息更新成功'.$str.'！', 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'&do=documenttype&type='.$_GET['type'].'');
		}elseif ($_GET['view'] == 'typeupdate') {
			
			$db->query("DELETE FROM ".DB_TABLEPRE."document_type WHERE id = '".$_GET[id]."'  ");
			$db->query("UPDATE ".DB_TABLEPRE."document_type set father='".$_GET['fid']."' WHERE father = '".$_GET[id]."'  ");
			show_msg('文件夹信息删除成功！', 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'&do=documenttype&type='.$_GET['type'].'');
		}
		include_once('template/documenttype.php');
}
?>