<?php
(!defined('IN_TOA') || !defined('IN_ADMIN')) && exit('Access Denied!');

get_key("office_info");
empty($do) && $do = 'list';
if ($do == 'list') {
   $sms_receive = array(
		'online' => '1'
	);
	update_db('sms_receive',$sms_receive, array('receiveperson' => $_USER->id));
	$wheresql = '';
	$page = max(1, getGP('page','G','int'));
	$pagesize = $_CONFIG->config_data('pagenum');
	$offset = ($page - 1) * $pagesize;
	$vuidtype = getGP('vuidtype','G');
	$url = 'admin.php?ac=receive&fileurl=sms&userkeytype='.$userkeytype;
	if(!is_superadmin() && $vuidtype==''){
		$wheresql .= " AND receiveperson ='".$_USER->id."'";
	}
	if ($vuidtype!='') {
		$wheresql .= get_subordinate($_USER->id,'receiveperson');
	}
	

     $num = $db->result("SELECT COUNT(*) AS num FROM ".DB_TABLEPRE."sms_receive WHERE 1 $wheresql ORDER BY smskey asc, id desc");
     $sql = "SELECT * FROM ".DB_TABLEPRE."sms_receive WHERE 1 $wheresql ORDER BY smskey asc, id desc LIMIT $offset, $pagesize";
	 $result = $db->fetch_all($sql);

	include_once('template/receive.php');

} elseif ($do == 'update') {
	
    get_key("office_info_delete");
	$idarr = getGP('id','P','array');
	foreach ($idarr as $id) {
	$db->query("DELETE FROM ".DB_TABLEPRE."sms_receive WHERE id = '$id'  ");
	//db->query("DELETE FROM ".DB_TABLEPRE."user_view WHERE uid = '$id'");
		
	}
	show_msg('短消息删除成功！', 'admin.php?ac=receive&fileurl=sms&userkeytype='.getGP('userkeytype','P').'');

}elseif ($do == 'smskey') {
	
    $idarr = getGP('id','G');
	//foreach ($idarr as $id) {
	$sms_receive = array(
		'smskey' => 2
	);
	update_db('sms_receive',$sms_receive, array('id' => $idarr));
	//}
	goto_page('admin.php?ac=receive&fileurl=sms&userkeytype='.$_GET['userkeytype']);

}elseif ($do == 'smskeymana') {
	
    $idarr = getGP('id','G');
	$sms_receive = array(
		'smskey' => 2
	);
	update_db('sms_receive',$sms_receive, array('id' => $idarr));
	goto_page("admin.php?ac=".str_replace('-',"&",getGP('urls','G')));

}elseif ($do == 'excel') {
	$datename="sms_".get_date('YmdHis',PHP_TIME);
	$outputFileName = 'data/excel/'.$datename.'.xls';
		$content = array();
		$archive=array("状态","发送人","发送时间","内容");
		$content[] = $archive;
		$wheresql = '';
		$vuidtype = getGP('vuidtype','P');
		if(!is_superadmin() && $vuidtype==''){
			$wheresql .= " AND receiveperson ='".$_USER->id."'";
		}
		if ($vuidtype!='') {
			$wheresql .= get_subordinate($_USER->id,'receiveperson');
		}
		
		$sql = "SELECT * FROM ".DB_TABLEPRE."sms_receive WHERE 1 $wheresql  ORDER BY id desc";
		$result = $db->query($sql);
		while ($row = $db->fetch_array($result)) {
			if($row[smskey]=='1'){
				$type='己读';
			}else{
				$type='未读';
			}	
			$archive = array(
				"".$type."",
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