<?php
/*
	[Office 515158] (C) 2009-2012 天生创想 Inc.
	$Id: mod_rewards 1209087 2012-01-08 08:58:28Z baiwei.jiang $
*/
(!defined('IN_TOA') || !defined('IN_ADMIN')) && exit('Access Denied!');
empty($do) && $do = 'list';
if($_GET['rewardskey']!=''){
	$_check['ischeck'.$_GET['rewardskey'].'']='  ui-tab-trigger-item-current';
}else{
	$_check['ischeck']='  ui-tab-trigger-item-current';
}
get_key("rewards_");
if ($do == 'list') {
	//列表信息 
	$wheresql = '';
	$page = max(1, getGP('page','G','int'));
	$pagesize = $_CONFIG->config_data('pagenum');
	$offset = ($page - 1) * $pagesize;
	$url = 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'';
	if ($user = getGP('user','G')) {
		$wheresql .= " AND user='".$user."'";
		$url .= '&user='.rawurlencode($user);
	}
	if ($rewardskey = getGP('rewardskey','G')) {
		$wheresql .= " AND rewardskey='".$rewardskey."'";
		$url .= '&rewardskey='.rawurlencode($rewardskey);
	}
	//时间
	$vstartdate = getGP('vstartdate','G');
	$venddate = getGP('venddate','G');
	if ($vstartdate!='' && $venddate!='') {
		$wheresql .= " AND (rewardsdate>='".$vstartdate."' and rewardsdate<='".$venddate."')";
		$url .= '&vstartdate='.$vstartdate.'&venddate='.$venddate;
	}
	$ischeck = getGP('ischeck','G');
	$url .= '&ischeck='.$ischeck;
	if ($ischeck=='1') {
		$wheresql .= " AND rewardsdate ='".get_date('Y-m-d',PHP_TIME)."' ";	
	}
	if ($ischeck=='2') {
		$getdate=get_date('Y-m',PHP_TIME)."-".(get_date('d',PHP_TIME)-1);
		$wheresql .= " AND rewardsdate ='".$getdate."' ";	
	}
	if ($ischeck=='3') {
		$wheresql .= " AND DATE_SUB(CURDATE(), INTERVAL 7 DAY)<=date(rewardsdate) ";	
	}
	if ($ischeck=='4') {
		$wheresql .= " AND DATE_SUB(CURDATE(),INTERVAL 1 MONTH)<=date(rewardsdate) ";	
	}
	if ($ischeck=='5') {
		$wheresql .= " AND DATE_SUB(CURDATE(),INTERVAL 6 MONTH)<=date(rewardsdate) ";	
	}
	$vuidtype = getGP('vuidtype','G');
	if ($vuidtype!='') {
		if($vuidtype=='-1'){
				$wheresql .= get_subordinate($_USER->id,'uid');
			}else{
				$wheresql .= " and uid='".$vuidtype."'";
			}
	}
	
	
	$num = $db->result("SELECT COUNT(*) AS num FROM ".DB_TABLEPRE."rewards WHERE 1 $wheresql ORDER BY id desc");
    $sql = "SELECT * FROM ".DB_TABLEPRE."rewards WHERE 1 $wheresql ORDER BY id desc LIMIT $offset, $pagesize";
	$result = $db->fetch_all($sql);
	include_once('template/rewardslist.php');

}elseif ($do == 'update') {
	
	get_key("date_blog_delete");
	$idarr = getGP('id','P','array');
	foreach ($idarr as $id) {
		$db->query("DELETE FROM ".DB_TABLEPRE."rewards WHERE id = '$id'  ");
	}
	$content=serialize($idarr);
	$title='删除奖惩记录信息';
	get_logadd($id,$content,$title,29,$_USER->id);
	show_msg('删除奖惩记录信息成功！', 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'');

}elseif ($do == 'add') {
	
	if($_POST['view']!=''){
		$id = getGP('id','P','int');
		if($id!=''){
			$user = check_str(getGP('user','P'));
			$project = check_str(getGP('project','P'));
			$rewardsdate = check_str(getGP('rewardsdate','P'));
			$wagesmonth = getGP('wagesmonth_year','P')."-".getGP('wagesmonth_month','P');
			$rewardskey = getGP('rewardskey','P');
			$price = getGP('price','P');
			$content = check_str(getGP('content','P'));
			$rewards = array(
				'user' => $user,
				'project' => $project,
				'rewardsdate' => $rewardsdate,
				'wagesmonth' => $wagesmonth,
				'rewardskey' => $rewardskey,
				'price' => $price,
				'content' => $content
			);
			update_db('rewards',$rewards, array('id' => $id));
			$content=serialize($rewards);
			$title='编辑奖惩记录';
			get_logadd($id,$content,$title,29,$_USER->id);
			
		}else{
			$user = check_str(getGP('user','P'));
			$project = getGP('project','P');
			$rewardsdate = check_str(getGP('rewardsdate','P'));
			$wagesmonth = getGP('wagesmonth_year','P')."-".getGP('wagesmonth_month','P');
			$rewardskey = getGP('rewardskey','P');
			$price = getGP('price','P');
			$content = check_str(getGP('content','P'));
			$uid = $_USER->id;
			$date=get_date('Y-m-d H:i:s',PHP_TIME);
			$rewards = array(
				'user' => $user,
				'project' => $project,
				'rewardsdate' => $rewardsdate,
				'wagesmonth' => $wagesmonth,
				'rewardskey' => $rewardskey,
				'price' => $price,
				'content' => $content,
				'uid' => $uid,
				'date' => $date
			);
			insert_db('rewards',$rewards);
			$id=$db->insert_id();
			$content=serialize($rewards);
			$title='添加奖惩记录';
			get_logadd($id,$content,$title,29,$_USER->id);
		}
		show_msg('奖惩信息操作成功！', 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'');
	}else{
		$id = getGP('id','G','int');
		if($id!=''){
			$user = $db->fetch_one_array("SELECT * FROM ".DB_TABLEPRE."rewards  WHERE id = '$id'  ");
			get_key("rewards_");
			$startdate=explode('-',$user['wagesmonth']); 
			$_title['name']='编辑';
		}else{ 
			get_key("rewards_");
			$startdate=explode('-',get_date('Y-m-d',PHP_TIME)); 
			$user['rewardskey']='1';
			$_title['name']='发布';
		}
		include_once('template/rewardsadd.php');
	}
}elseif ($do == 'excel') {
	$datename="rewards_".get_date('YmdHis',PHP_TIME);
	$outputFileName = 'data/excel/'.$datename.'.xls';
		$content = array();
		$archive=array("单位员工","奖惩项目","奖惩日期","工资月份","奖惩属性","奖惩金额","备注","发布人","发布日期");
		$content[] = $archive;
		$wheresql = '';
		if ($user = getGP('user','P')) {
			$wheresql .= " AND user='".$user."'";
		}
		if ($rewardskey = getGP('rewardskey','P')) {
			$wheresql .= " AND rewardskey='".$rewardskey."'";
		}
		//时间
		$vstartdate = getGP('vstartdate','P');
		$venddate = getGP('venddate','P');
		if ($vstartdate!='' && $venddate!='') {
			$wheresql .= " AND (rewardsdate>='".$vstartdate."' and rewardsdate<='".$venddate."')";
		}
		$ischeck = getGP('ischeck','P');
		$url .= '&ischeck='.$ischeck;
		if ($ischeck=='1') {
			$wheresql .= " AND rewardsdate ='".get_date('Y-m-d',PHP_TIME)."' ";	
		}
		if ($ischeck=='2') {
			$getdate=get_date('Y-m',PHP_TIME)."-".(get_date('d',PHP_TIME)-1);
			$wheresql .= " AND rewardsdate ='".$getdate."' ";	
		}
		if ($ischeck=='3') {
			$wheresql .= " AND DATE_SUB(CURDATE(), INTERVAL 7 DAY)<=date(rewardsdate) ";	
		}
		if ($ischeck=='4') {
			$wheresql .= " AND DATE_SUB(CURDATE(),INTERVAL 1 MONTH)<=date(rewardsdate) ";	
		}
		if ($ischeck=='5') {
			$wheresql .= " AND DATE_SUB(CURDATE(),INTERVAL 6 MONTH)<=date(rewardsdate) ";	
		}
		$vuidtype = getGP('vuidtype','P');
		if ($vuidtype!='') {
			if($vuidtype=='-1'){
				$wheresql .= get_subordinate($_USER->id,'uid');
			}else{
				$wheresql .= " and uid='".$vuidtype."'";
			}
		}
		
		
		$sql = "SELECT * FROM ".DB_TABLEPRE."rewards WHERE 1 $wheresql  ORDER BY id desc";
		$result = $db->query($sql);
		while ($row = $db->fetch_array($result)) {
			if($row[rewardskey]=='1'){
				$rewardskey='奖励';
			}else{
				$rewardskey='惩罚';
			}	
			$archive = array(
				"".$row[user]."",
				"".get_typename($row["project"])."",
				"".str_replace("-",".",$row['rewardsdate'])."",
				"".str_replace("-",".",$row['wagesmonth'])."",
				"".$rewardskey."",
				"".$row['price']."RMB",
				"".$row['content']."",
				"".get_realname($row['uid'])."",
				"".str_replace("-",".",$row[date]).""
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