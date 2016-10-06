<?php
/*
	[Office 515158] (C) 2009-2012 天生创想 Inc.
	$Id: mod_app 1209087 2012-01-08 08:58:28Z baiwei.jiang $
*/
(!defined('IN_TOA') || !defined('IN_ADMIN')) && exit('Access Denied!');
get_key("app_");
empty($do) && $do = 'list';
if($ischeck=getGP('ischeck','G')){
	$_check['ischeck'.getGP('ischeck','G').'']='  ui-tab-trigger-item-current';
}else{
	$_check['ischeck']='  ui-tab-trigger-item-current';
}
if ($do == 'list') {
	//$word=new word;
	//$word->start();
	//列表信息 
	$wheresql = '';
	$page = max(1, getGP('page','G','int'));
	$pagesize = $_CONFIG->config_data('pagenum');
	$offset = ($page - 1) * $pagesize;
	$url = 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'&ischeck='.$ischeck.'';
	if ($title = getGP('title','G')) {
		$wheresql .= " AND title LIKE '%$title%'";
		$url .= '&title='.rawurlencode($title);
	}
	//时间
	if ($vstartdate = getGP('vstartdate','G')) {
		$wheresql .= " AND untildate>='".$vstartdate."'";
		$url .= '&vstartdate='.$vstartdate;
	}
	if($ischeck=='1'){
		$wheresql .= " AND untildate>='".get_date('Y-m-d H:i:s',PHP_TIME)."'";
	}
	if($ischeck=='2'){
		$wheresql .= " AND untildate<='".get_date('Y-m-d H:i:s',PHP_TIME)."'";
	}
	if($ischeck=='3'){
		$wheresql .= " AND uid='".$_USER->id."'";
	}
	if($ischeck=='4'){
		$wheresql .= " and (user like '%".get_realname($_USER->id)."%' or user='')";
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
	
	$num = $db->result("SELECT COUNT(*) AS num FROM ".DB_TABLEPRE."app WHERE 1 $wheresql ORDER BY id desc");
    $sql = "SELECT * FROM ".DB_TABLEPRE."app WHERE 1 $wheresql ORDER BY id desc LIMIT $offset, $pagesize";
	$result = $db->fetch_all($sql);
	include_once('template/app.php');
	//$word->save("excel/data.doc");

} elseif ($do == 'update') {
	
	get_key("app_del");
	$idarr = getGP('id','P','array');
	foreach ($idarr as $id) {
		$db->query("DELETE FROM ".DB_TABLEPRE."app WHERE id = '$id' ");
		$db->query("DELETE FROM ".DB_TABLEPRE."app_option WHERE app_id = '$id' ");
		$db->query("DELETE FROM ".DB_TABLEPRE."app_log WHERE app_id = '$id' ");
	}
	$content=serialize($idarr);
	$title='删除投票';
	get_logadd($id,$content,$title,31,$_USER->id);
	show_msg('投票信息删除成功！', 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'');

} elseif ($do == 'excel') {
	$datename="app_".get_date('YmdHis',PHP_TIME);
	$outputFileName = 'data/excel/'.$datename.'.xls';
		$content = array();
		$archive=array("主题","描述","截止日期","发布时间","发布人","允许投票人员");
		$content[] = $archive;
		$wheresql = '';
		if ($title = getGP('title','P')) {
		$wheresql .= " AND title LIKE '%$title%'";
		}
		//时间
		if ($vstartdate = getGP('vstartdate','P')) {
			$wheresql .= " AND untildate>='".$vstartdate."'";
		}
		if(getGP('ischeck','P')=='1'){
			$wheresql .= " AND untildate>='".get_date('Y-m-d H:i:s',PHP_TIME)."'";
		}
		if(getGP('ischeck','P')=='2'){
			$wheresql .= " AND untildate<='".get_date('Y-m-d H:i:s',PHP_TIME)."'";
		}
		if(getGP('ischeck','P')=='3'){
			$wheresql .= " AND uid='".$_USER->id."'";
		}
		if(getGP('ischeck','P')=='4'){
			$wheresql .= " and user like '%".get_realname($_USER->id)."%'";
		}
		$vuidtype = getGP('vuidtype','P');
		if ($vuidtype!='') {
			if($vuidtype=='-1'){
				$wheresql .= get_subordinate($_USER->id,'uid');
			}else{
				$wheresql .= " and uid='".$vuidtype."'";
			}
		}
		
		$sql = "SELECT * FROM ".DB_TABLEPRE."app WHERE 1 $wheresql ORDER BY id desc";
		$result = $db->query($sql);
		while ($row = $db->fetch_array($result)) {	
			$archive = array(
				"".$row[title]."",
				"".$row[content]."",
				"".str_replace('-','.',$row[untildate])."",
				"".str_replace('-','.',$row[date])."",
				"".get_realname($row['uid'])."",
				"".$row[user].""
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
}elseif ($do == 'add') {
	
	if($_POST['view']!=''){
		$id = getGP('id','P','int');
		if($id!=''){
			$title = getGP('title','P');
			$content = getGP('content','P');
			$user = getGP('user','P');
			$untildate = getGP('enddate','P')." ".getGP('endh','P').":".getGP('endi','P').":00";
			$app = array(
				'title' => $title,
				'content' => $content,
				'user' => $user,
				'untildate' => $untildate
			);
			update_db('app',$app, array('id' => $id));
			$content=serialize($app);
			$title='编辑投票';
			get_logadd($id,$content,$title,31,$_USER->id);
			$idarr = getGP('option_id','P','array');
			$option = getGP('option','P','array');
			foreach ($idarr as $option_id) {
				$db->query("UPDATE ".DB_TABLEPRE."app_option SET title='".$option[$option_id]."' WHERE id = '$option_id' ");
			}
			
			$new_option = '';
			foreach (getGP('new_option','P','array') as $name) {
				$new_option.=$name.',';
			}
			$new_option=explode(',',substr($new_option, 0, -1));
			for($i=0;$i<sizeof($new_option);$i++){
				if($new_option[$i]!=''){
					$app_option = array(
						'app_id' => $id,
						'title' => $new_option[$i],
						'number' => 0,
						'type' => 1
					);
					insert_db('app_option',$app_option);
				}
			}
			
		}else{
			$title = getGP('title','P');
			$content = getGP('content','P');
			$user = getGP('user','P');
			$untildate = getGP('enddate','P')." ".getGP('endh','P').":".getGP('endi','P').":00";
			$app = array(
				'title' => $title,
				'content' => $content,
				'user' => $user,
				'number' => 0,
				'untildate' => $untildate,
				'date' => get_date('Y-m-d H:i:s',PHP_TIME),
				'uid' => $_USER->id
			);
			insert_db('app',$app);
			$id=$db->insert_id();
			if(getGP('option','P')!=''){
					$app_option = array(
						'app_id' => $id,
						'title' => getGP('option','P'),
						'number' => 0,
						'type' => 1
					);
					insert_db('app_option',$app_option);
				}
			$new_option = '';
			foreach (getGP('new_option','P','array') as $name) {
				$new_option.=$name.',';
			}
			$new_option=explode(',',substr($new_option, 0, -1));
			for($i=0;$i<sizeof($new_option);$i++){
				if($new_option[$i]!=''){
					$app_option = array(
						'app_id' => $id,
						'title' => $new_option[$i],
						'number' => 0,
						'type' => 1
					);
					insert_db('app_option',$app_option);
				}
			}
			$content=serialize($app).serialize($app_option);
			$title='发布投票';
			get_logadd($id,$content,$title,31,$_USER->id);
		}
		show_msg('投票信息操作成功！', 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'');
	}else{
		$id = getGP('id','G','int');
		if($id!=''){
			$user = $db->fetch_one_array("SELECT * FROM ".DB_TABLEPRE."app  WHERE id = '$id' ");
				$enddate=explode(' ',$user['untildate']); 
			get_key("app_update");
			$_title['name']='编辑';
			$sql = "SELECT * FROM ".DB_TABLEPRE."app_option WHERE app_id='".$id."'  ORDER BY id asc";
			$result = $db->fetch_all($sql);
		}else{
			$enddate=explode(' ',get_date('Y-m-d H:i:s',PHP_TIME)); 
			get_key("app_add");
			$_title['name']='发布';
		}
		$endh=explode(':',$enddate[1]); 
		include_once('template/appadd.php');
		
	}
	
}elseif ($do == 'views') {
	if(getGP('view','P')=='save'){
		
		$app_id = getGP('app_id','P');
		$app_option_id = getGP('app_option_id','P');
		$user = $_USER->id;
		$content = getGP('content','P');
		$date = get_date('Y-m-d H:i:s',PHP_TIME);
		if(!getGP('app_option_id','P')){
			show_msg('投票选项不能为空！', 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'&do=views&id='.$app_id.'');
		}
		$app_log = array(
			'app_id' => $app_id,
			'app_option_id' => $app_option_id,
			'user' => $user,
			'content' => $content,
			'date' => $date
		);
		insert_db('app_log',$app_log);
		$id=$db->insert_id();
		$content=serialize($app_log);
		$title='参与投票';
		get_logadd($id,$content,$title,31,$_USER->id);
		show_msg('你己成功参与 "'.get_inc_app_types($app_id).'"的投票！', 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'&do=views&id='.$app_id.'');
	}else{
		$app_id = getGP('id','G','int');
		global $db;
		
		$sql="SELECT * FROM ".DB_TABLEPRE."app_log  WHERE app_id = '".$app_id."' and user='".$_USER->id."' ";
		$app_log = $db->fetch_one_array($sql);
		if($app_log["user"]==''){
			$name='在线投票 "'.get_inc_app_types($app_id).'"';
		}else{
			$name='查看 "'.get_inc_app_types($app_id).'"投票记录';
		}
		$sql = "SELECT * FROM ".DB_TABLEPRE."app_option where app_id='".$app_id."'  ORDER BY id Asc";
		$result = $db->fetch_all($sql);
		$sql = "SELECT * FROM ".DB_TABLEPRE."app_log where app_id='".$app_id."'  ORDER BY id Asc";
		$relog = $db->fetch_all($sql);
		$appadmin = $db->fetch_one_array("SELECT id FROM ".DB_TABLEPRE."app  WHERE id = '".$app_id."' and (user like '%".get_realname($_USER->id)."%' or user='') ");
		include_once('template/views.php');
	}
}elseif ($do == 'app_log') {
	$app_id = getGP('app_id','G','int');
	$wheresql = '';
	$page = max(1, getGP('page','G','int'));
	$pagesize = $_CONFIG->config_data('pagenum');
	$offset = ($page - 1) * $pagesize;
	$url = 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'&do=app_log';
	$wheresql .= " AND app_id='".$app_id."'";
	
	
	$num = $db->result("SELECT COUNT(*) AS num FROM ".DB_TABLEPRE."app_log WHERE 1 $wheresql ORDER BY id desc");
    $sql = "SELECT * FROM ".DB_TABLEPRE."app_log WHERE 1 $wheresql ORDER BY id desc LIMIT $offset, $pagesize";
	$result = $db->fetch_all($sql);
	include_once('template/app_log.php');
}

?>