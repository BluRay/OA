<?php
/*
	[Office 515158] (C) 2009-2012 天生创想 Inc.
	$Id: oa 1209087 2012-01-08 08:58:28Z baiwei.jiang $
*/

(!defined('IN_TOA') || !defined('IN_ADMIN')) && exit('Access Denied!');

//if ( !is_superadmin() && !check_purview('manage_link') ) prompt('对不起，你没有权限执行本操作！');

empty($do) && $do = 'list';
if ($do == 'list') {
	$userview=$_GET['user'].',515158.com';
	include_once('template/user_checkbox.php');

}elseif($do == 'add'){
	global $db;
	$values=explode(',',str_replace('department,','',$_GET['value']));
	for($i=0;$i<sizeof($values);$i++){
		if(trim($values[$i])!=''){
			$sql="SELECT name,phone,id FROM ".DB_TABLEPRE."user a,".DB_TABLEPRE."user_view b WHERE a.id=b.uid and a.id = '".$values[$i]."'";
			$blog = $db->fetch_one_array($sql);
			$html.=$blog['name'].',';
			$phone.=$blog['phone'].',';
			$id.=$blog['id'].',';
		}
	}
	echo substr($html, 0, -1).'|'.substr($phone, 0, -1).'|'.substr($id, 0, -1);
}
//获取二级
function dep_data($fid=0,$userview){
	global $db;
	$query = $db->query("SELECT * FROM ".DB_TABLEPRE."department where father='$fid' ORDER BY id Asc");
	$html='';
	while ($row = $db->fetch_array($query)) {
		$blog = $db->fetch_one_array("SELECT * FROM ".DB_TABLEPRE."department where father='".$row['id']."'   ORDER BY id Asc");
		$user = $db->fetch_one_array("SELECT * FROM ".DB_TABLEPRE."user WHERE departmentid ='".$row['id']."'");
		//$html.= 'var subarr'.$fid.' = [];'.chr(13).chr(10);
		$html.= 'subarr'.$fid.'.push( {'.chr(13).chr(10); 
		$html.= ' "id" : "1'.$row['id'].'",'.chr(13).chr(10);
		$html.= '  "text" : "'.$row['name'].'",'.chr(13).chr(10);
		$html.= '  "value" : "department",'.chr(13).chr(10);
		$html.= '  "showcheck" : true,'.chr(13).chr(10); 
		$html.= '  complete : true,'.chr(13).chr(10); 
		$html.= '  "isexpand" : false,'.chr(13).chr(10); 
		$html.= '  "checkstate" : 0,'.chr(13).chr(10); 
		if($blog['id']!='' || $user['id']!=''){
			$html.= '  "hasChildren" : true,'.chr(13).chr(10);
			$html.= '  "ChildNodes" : subarr'.$row[id].''.chr(13).chr(10);
		}else{
			$html.= '  "hasChildren" : false'.chr(13).chr(10);
		}
		$html.= '  });'.chr(13).chr(10);
		if($blog['id']!='' || $user['id']!=''){ 
			echo 'var subarr'.$row['id'].' = [];'.chr(13).chr(10);
			if($blog['id']!=''){
				dep_data($row['id'],$userview);
			}
			if($user['id']!=''){
				dep_data_user($row['id'],$userview);
			}
		}
		
	}
	echo $html; 
}
//获取成员
function dep_data_user($fid=0,$userview){
	global $db;
	$query = $db->query("SELECT * FROM ".DB_TABLEPRE."user a,".DB_TABLEPRE."user_view b WHERE a.id=b.uid and a.departmentid = '$fid' order by a.numbers asc");
	$html='';
	while ($row = $db->fetch_array($query)) {
		
		$html.= 'subarr'.$fid.'.push( {'.chr(13).chr(10); 
		$html.= ' "id" : "2'.$row['id'].'",'.chr(13).chr(10);
		$html.= '  "text" : "'.$row['name'].'",'.chr(13).chr(10);
		$html.= '  "value" : "'.$row['id'].'",'.chr(13).chr(10);
		$html.= '  "showcheck" : true,'.chr(13).chr(10); 
		$html.= '  complete : true,'.chr(13).chr(10); 
		$html.= '  "isexpand" : false,'.chr(13).chr(10);
		if(get_subcontent($userview, $row['name'], '515158.com')!=''){
			$html.= '  "checkstate" : 1,'.chr(13).chr(10); 
		}else{
			$html.= '  "checkstate" : 0,'.chr(13).chr(10);
		}
		$html.= '  "hasChildren" : false'.chr(13).chr(10); 
		$html.= '  });'.chr(13).chr(10); 
		
	}
	echo $html; 
}
?>
