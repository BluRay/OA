<?php
/*
	[Office 515158] (C) 2009-2012 天生创想 Inc.
	$Id: mod_registration 1209087 2012-01-08 08:58:28Z baiwei.jiang $
*/
(!defined('IN_TOA') || !defined('IN_ADMIN')) && exit('Access Denied!');
empty($do) && $do = 'list';
$_check['ischeck']='  ui-tab-trigger-item-current';
	//获取打卡次数
	$sworknum=$_CONFIG->config_data('sworknum');
	$swork=$_CONFIG->config_data('swork');
	$ework=$_CONFIG->config_data('ework');
	$sworkex=explode(':',$swork);
	$eworkex=explode(':',$ework);
	if($sworknum=='0'){
		$swork1=$_CONFIG->config_data('swork1');
		$ework1=$_CONFIG->config_data('ework1');
		$swork1ex=explode(':',$swork1);
		$ework1ex=explode(':',$ework1);
	}
if ($do == 'list') {
	//列表信息 
	$wheresql = '';
	$page = max(1, getGP('page','G','int'));
	$pagesize = $_CONFIG->config_data('pagenum');
	$offset = ($page - 1) * $pagesize;
	$url = 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'';
	$num = $db->result("SELECT COUNT(*) AS num FROM ".DB_TABLEPRE."registration WHERE uid='".$_USER->id."' ORDER BY id desc");
    $sql = "SELECT * FROM ".DB_TABLEPRE."registration WHERE uid='".$_USER->id."' ORDER BY id desc LIMIT $offset, $pagesize";
	$result = $db->fetch_all($sql);
	//生成打卡记录
	$user = $db->fetch_one_array("SELECT * FROM ".DB_TABLEPRE."registration  WHERE date='".get_date('Y-m-d',PHP_TIME)."'  and uid='".$_USER->id."' ");
	if($user['id']==''){
		$registration = array(
				'name' => get_realname($_USER->id),
				'uid' => $_USER->id,
				'date' => get_date('Y-m-d',PHP_TIME),
				'year' => get_date('Y',PHP_TIME),
				'month' => get_date('m',PHP_TIME),
				'day' => get_date('d',PHP_TIME)
		);
		insert_db('registration',$registration);
	}
	$rows = $db->fetch_one_array("SELECT * FROM ".DB_TABLEPRE."registration  WHERE date='".get_date('Y-m-d',PHP_TIME)."'  and uid='".$_USER->id."' ");
	include_once('template/registrationlist.php');
}elseif ($do == 'add') {
	$rows = $db->fetch_one_array("SELECT * FROM ".DB_TABLEPRE."registration  WHERE date='".get_date('Y-m-d',PHP_TIME)."'  and uid='".$_USER->id."' ");
	$nums = $db->result("SELECT COUNT(*) AS num FROM ".DB_TABLEPRE."registration_log WHERE rid='".$rows['id']."' ORDER BY lid desc");
	$rid=$rows['id'];
	if($nums<1){
		if(get_date('Hi',PHP_TIME)<str_replace(":","",$ework)){
			$hour=get_date('H:i',PHP_TIME);
			if(get_date('Hi',PHP_TIME)>str_replace(":","",$swork)){
				$dates=get_date('H',PHP_TIME)*60+get_date('i',PHP_TIME);
				$datee=$sworkex[0]*60+$sworkex[1];
				$number=$dates-$datee;
				$type=1;
			}else{
				$number=0;
				$type=0;
			}
			workbench_registadd($rid,$hour,$number,$type);
		}else{
			workbench_registadd($rid,'',0,'');
		}
		show_msg('成功更新考勤信息！', 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'');
	}elseif($nums<2 && $nums>0 && get_date('Hi',PHP_TIME)>str_replace(":","",$swork)){
		if($sworknum=='0'){
			if(get_date('Hi',PHP_TIME)>str_replace(":","",$swork1)){
				workbench_registadd($rid,'',0,'');
			}else{
				$hour=get_date('H:i',PHP_TIME);
				if(get_date('Hi',PHP_TIME)<str_replace(":","",$ework)){
					$dates=get_date('H',PHP_TIME)*60+get_date('i',PHP_TIME);
					$datee=$eworkex[0]*60+$eworkex[1];
					$number=$datee-$dates;
					$type=2;
				}else{
					$number=0;
					$type=0;
				}
				workbench_registadd($rid,$hour,$number,$type);
			}
		}else{
			$hour=get_date('H:i',PHP_TIME);
			if(get_date('Hi',PHP_TIME)<str_replace(":","",$ework)){
				$dates=get_date('H',PHP_TIME)*60+get_date('i',PHP_TIME);
				$datee=$eworkex[0]*60+$eworkex[1];
				$number=$datee-$dates;
				$type=2;
				if($_GET['typeshow']==''){
					show_msg_type('还没有到下班时间，您确定要执行早退吗！', 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'&typeshow=1&do=add');
					exit;
				}
			}else{
				$number=0;
				$type=0;
			}
			workbench_registadd($rid,$hour,$number,$type);
		}
		show_msg('成功更新考勤信息！', 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'');
	}elseif($sworknum=='0'){
		if($nums<3 && $nums>=2 && get_date('Hi',PHP_TIME)>str_replace(":","",$ework)){
			if(get_date('Hi',PHP_TIME)<str_replace(":","",$ework1)){
				$hour=get_date('H:i',PHP_TIME);
				if(get_date('Hi',PHP_TIME)>str_replace(":","",$swork1)){
					$dates=get_date('H',PHP_TIME)*60+get_date('i',PHP_TIME);
					$datee=$swork1ex[0]*60+$swork1ex[1];
					$number=$dates-$datee;
					$type=1;
				}else{
					$number=0;
					$type=0;
				}
				workbench_registadd($rid,$hour,$number,$type);
			}else{
				workbench_registadd($rid,'',0,'');
			}
			show_msg('成功更新考勤信息！', 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'');
		}elseif($nums<4 && get_date('Hi',PHP_TIME)>str_replace(":","",$swork1)){
			$hour=get_date('H:i',PHP_TIME);
			if(get_date('Hi',PHP_TIME)<str_replace(":","",$ework1)){
				$dates=get_date('H',PHP_TIME)*60+get_date('i',PHP_TIME);
				$datee=$ework1ex[0]*60+$ework1ex[1];
				$number=$datee-$dates;
				$type=2;
				if($_GET['typeshow']==''){
					show_msg_type('还没有到下班时间，您确定要执行早退吗！', 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'&typeshow=1&do=add');
					exit;
				}
			}else{
				$number=0;
				$type=0;
			}
			workbench_registadd($rid,$hour,$number,$type);
			show_msg('成功更新考勤信息！', 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'');
		}else{
			show_msg('请不要重复打卡！', 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'');
		}
	}else{
		show_msg('请不要重复打卡！', 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'');
	}

}elseif ($do == 'update') {
		$lidarr = getGP('lid','P','array');
		$notearr = getGP('note','P','array');
		foreach ($lidarr as $id) {
			$registration_log = array(
				'note' => $notearr[$id]
			);
			update_db('registration_log',$registration_log, array('lid' => $id));
		}
		show_msg('成功更新考勤原因！', 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'');
}
?>