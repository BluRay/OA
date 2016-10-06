<?php
(!defined('IN_TOA') || !defined('IN_ADMIN')) && exit('Access Denied!');

get_key("office_sms");
empty($do) && $do = 'list';
if ($do == 'list') {
	//列表信息 
	$wheresql = '';
	$page = max(1, getGP('page','G','int'));
	$pagesize = $_CONFIG->config_data('pagenum');
	$offset = ($page - 1) * $pagesize;
	$vuidtype = getGP('vuidtype','G');
	$url = 'admin.php?ac=smsindex&fileurl=sms&userkeytype='.$userkeytype;
	//员工
	if(!is_superadmin() && $vuidtype==''){
		$wheresql .= " AND sendperson ='".$_USER->id."'";
	}
	if ($vuidtype!='') {
		$wheresql .= get_subordinate($_USER->id,'sendperson');
	}
	
	
	$num = $db->result("SELECT COUNT(*) AS num FROM ".DB_TABLEPRE."phone_send WHERE 1 $wheresql ");
    $sql = "SELECT * FROM ".DB_TABLEPRE."phone_send WHERE 1 $wheresql ORDER BY id desc LIMIT $offset, $pagesize";
	$result = $db->fetch_all($sql);

	include_once('template/smsindex.php');

}elseif ($do == 'update') {
	
	get_key("office_sms_delete");
	$idarr = getGP('id','P','array');
	foreach ($idarr as $id) {
		$db->query("DELETE FROM ".DB_TABLEPRE."phone_send WHERE id = '$id'  ");	
	}
	show_msg('手机短信删除成功！', 'admin.php?ac=smsindex&fileurl=sms&message=1');

}elseif ($do == 'excel') {
	$datename="sms_".get_date('YmdHis',PHP_TIME);
	$outputFileName = 'data/excel/'.$datename.'.xls';
		$content = array();
		$archive=array("状态","接收手机","接收人","发送人","发送时间","内容");
		$content[] = $archive;
		$wheresql = '';
		$vuidtype = getGP('vuidtype','P');
		//员工
		if(!is_superadmin() && $vuidtype==''){
			$wheresql .= " AND sendperson ='".$_USER->id."'";
		}
		if ($vuidtype!='') {
			$wheresql .= get_subordinate($_USER->id,'sendperson');
		}
		
		
		$sql = "SELECT * FROM ".DB_TABLEPRE."phone_send WHERE 1 $wheresql  ORDER BY id desc";
		$result = $db->query($sql);
		while ($row = $db->fetch_array($result)) {
			if($row[type]=='1'){
				$type='成功';
			}else{
				$type='失败';
			}	
			$archive = array(
				"".$type."",
				"".$row[receivephone]."",
				"".$row[receiveperson]."",
				"".get_realname($row['sendperson'])."",
				"".str_replace("-",".",$row[date])."",
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