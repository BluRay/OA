<?php
(!defined('IN_TOA') || !defined('IN_ADMIN')) && exit('Access Denied!');
get_key("office_duty");
empty($do) && $do = 'list';
if ($do == 'list') {
    $id = getGP('id','G','int');
	//列表信息 
	$wheresql = '';
	$page = max(1, getGP('page','G','int'));
	$pagesize = $_CONFIG->config_data('pagenum');
	$offset = ($page - 1) * $pagesize;
	$url = 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'';
	$ischeck = getGP('ischeck','G');
	$vuidtype = getGP('vuidtype','G');
	if(!is_superadmin() && $ischeck=='' && $vuidtype==''){
		$wheresql = "and (user='".get_realname($_USER->id)."' or uid='".$_USER->id."')";
	}
	if ($vuidtype!='') {
		if($ischeck=='1'){
			if($vuidtype=='-1'){
				$wheresql .= get_subordinate($_USER->id,'uid');
			}else{
				$wheresql .= " and uid='".$vuidtype."'";
			}
		}elseif($ischeck=='2'){
			$wheresql .= get_suborname($_USER->id,'user');
		}else{
			if($vuidtype=='-1'){
				$wheresql .= get_subordinate($_USER->id,'uid');
			}else{
				$wheresql .= " and uid='".$vuidtype."'";
			}
			$wheresql .= get_suborname($_USER->id,'user');
		}
		$url .= '&vuidtype='.rawurlencode($vuidtype);
	}

	if ($number = getGP('number','G')) {
		$wheresql .= " AND number=".$number."";
		$url .= '&number='.rawurlencode($number);
	}
	if ($title = getGP('title','G')) {
		$wheresql .= " AND title LIKE '%$title%'";
		$url .= '&title='.rawurlencode($title);
	}
	//时间
	$vstartdate = getGP('vstartdate','G');
	$venddate = getGP('venddate','G');
	if ($vstartdate!='' && $venddate!='') {
		$wheresql .= " AND (startdate<='".$vstartdate."' and enddate>='".$venddate."')";
		$url .= '&vstartdate='.$vstartdate.'&venddate='.$venddate;
	}
	$url .= '&ischeck='.$ischeck;
	if ($ischeck=='1' && $vuidtype=='') {
		$wheresql .= " AND uid='".$_USER->id."'";		
	}
	if ($ischeck=='2' && $vuidtype=='') {
		$wheresql .= " AND user='".get_realname($_USER->id)."'";		
	}
	$num = $db->result("SELECT COUNT(*) AS num FROM ".DB_TABLEPRE."project_duty WHERE 1 $wheresql and type='2'");
    $sql = "SELECT * FROM ".DB_TABLEPRE."project_duty WHERE 1 $wheresql and type='2' ORDER BY id desc LIMIT $offset, $pagesize";
	$result = $db->fetch_all($sql);
	include_once('template/duty.php');

} elseif ($do == 'update') {
	$idarr = getGP('id','P','array');
	foreach ($idarr as $id) {
		$db->query("DELETE FROM ".DB_TABLEPRE."project_duty WHERE id= '$id'  ");	
	}
	$content=serialize($idarr);
	$title='删除任务信息';
	get_logadd($id,$content,$title,33,$_USER->id);
	show_msg('删除任务信息成功！', 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'');

}  elseif ($do == 'excel') {
	$datename="duty_".get_date('YmdHis',PHP_TIME);
	$outputFileName = 'data/excel/'.$datename.'.xls';
	//生成数据
    $content = array();
	$archive=array("任务编号","任务名称","执行人","任务开始时间","任务结束时间","任务描述","备注","任务状态","任务分配人");
	$content[] = $archive;
	$wheresql = '';
	//根据条件导出
	$ischeck = getGP('ischeck','P');
	$vuidtype = getGP('vuidtype','P');
	if(!is_superadmin() && $ischeck=='' && $vuidtype==''){
		$wheresql = "and (user='".get_realname($_USER->id)."' or uid='".$_USER->id."')";
	}
	if ($vuidtype!='') {
		if($ischeck=='1'){
			if($vuidtype=='-1'){
				$wheresql .= get_subordinate($_USER->id,'uid');
			}else{
				$wheresql .= " and uid='".$vuidtype."'";
			}
		}elseif($ischeck=='2'){
			$wheresql .= get_suborname($_USER->id,'user');
		}else{
			if($vuidtype=='-1'){
				$wheresql .= get_subordinate($_USER->id,'uid');
			}else{
				$wheresql .= " and uid='".$vuidtype."'";
			}
			$wheresql .= get_suborname($_USER->id,'user');
		}
	}

	if ($number = getGP('number','P')) {
		$wheresql .= " AND number=".$number."";
	}
	if ($title = getGP('title','P')) {
		$wheresql .= " AND title LIKE '%$title%'";
	}
	//时间
	$vstartdate = getGP('vstartdate','P');
	$venddate = getGP('venddate','P');
	if ($vstartdate!='' && $venddate!='') {
		$wheresql .= " AND (startdate<='".$vstartdate."' and enddate>='".$venddate."')";
	}
	if ($ischeck=='1' && $vuidtype=='') {
		$wheresql .= " AND uid='".$_USER->id."'";		
	}
	if ($ischeck=='2' && $vuidtype=='') {
		$wheresql .= " AND user='".get_realname($_USER->id)."'";		
	}
	//SQL查询要导出的内容
	$sql = "SELECT * FROM ".DB_TABLEPRE."project_duty WHERE 1 $wheresql and type='2' ORDER BY id desc";
	$result = $db->query($sql);
	while ($row = $db->fetch_array($result)) {	
	if($row['dkey']=='1'){
		$dkey='进行中';
	}elseif($row['dkey']=='2'){
		$dkey='未完成';
	}elseif($row['dkey']=='3'){
		$dkey='己完成';
	}
	//将数据传递给数组
	$archive = array("".$row[number]."","".$row[title]."","".$row[user]."","".str_replace("-",".",$row['startdate'])."","".str_replace("-",".",$row['enddate'])."","".$row[content]."","".$row[note]."","".$dkey."","".get_realname($row['uid'])."");
	//初使化数组数据
	$content[] = $archive;
	}
//$myArr=$content;
$excel = new ExcelWriter($outputFileName);
if($excel==false) 
echo $excel->error; 
foreach($content as $v){
$excel->writeLine($v);
}
$excel->sendfile($outputFileName);
} 

?>