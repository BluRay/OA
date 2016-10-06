<?php
/*
	[Office 515158] (C) 2009-2012 天生创想 Inc.
	$Id: oa 1209087 2012-01-08 08:58:28Z baiwei.jiang $
*/

(!defined('IN_TOA') || !defined('IN_ADMIN')) && exit('Access Denied!');

//if ( !is_superadmin() && !check_purview('manage_link') ) prompt('对不起，你没有权限执行本操作！');

empty($do) && $do = 'list';
if ($do == 'list') {
	include_once('template/dep_checkbox.php');

}elseif($do == 'add'){
	global $db;
	$values=explode(',',$_GET['value']);
	for($i=0;$i<sizeof($values);$i++){
		if($values[$i]!=''){
			$sql="SELECT name FROM ".DB_TABLEPRE."department where id='".$values[$i]."'";
			$blog = $db->fetch_one_array($sql);
			$html.=$blog['name'].',';
		}
	}
	echo substr($html, 0, -1);
}
//获取二级
function dep_data($fid=0){
global $db;
$query = $db->query("SELECT * FROM ".DB_TABLEPRE."department where father='$fid' ORDER BY id Asc");
$html='';
while ($row = $db->fetch_array($query)) {
	$blog = $db->fetch_one_array("SELECT * FROM ".DB_TABLEPRE."department where father='".$row['id']."'   ORDER BY id Asc");
	//$html.= 'var subarr'.$fid.' = [];'.chr(13).chr(10);
	$html.= 'subarr'.$fid.'.push( {'.chr(13).chr(10); 
	$html.= ' "id" : "'.$row['id'].'",'.chr(13).chr(10);
	$html.= '  "text" : "'.$row['name'].'",'.chr(13).chr(10);
	$html.= '  "value" : "'.$row['id'].'",'.chr(13).chr(10);
	$html.= '  "showcheck" : true,'.chr(13).chr(10); 
	$html.= '  complete : true,'.chr(13).chr(10); 
	$html.= '  "isexpand" : false,'.chr(13).chr(10); 
	$html.= '  "checkstate" : 0,'.chr(13).chr(10); 
	if($blog['id']!=''){ 
		$html.= '  "hasChildren" : true,'.chr(13).chr(10); 
		$html.= '  "ChildNodes" : subarr'.$row[id].''.chr(13).chr(10); 
	}else{
		$html.= '  "hasChildren" : false'.chr(13).chr(10); 
	}
	$html.= '  });'.chr(13).chr(10); 
	if($blog['id']!=''){
		echo 'var subarr'.$row['id'].' = [];'.chr(13).chr(10);
		dep_data($row['id']);
	}
	
}
echo $html; 
}
?>
