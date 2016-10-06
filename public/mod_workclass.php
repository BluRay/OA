<?php
/*
	[Office 515158] (C) 2009-2012 天生创想 Inc.
	$Id: oa 1209087 2012-01-08 08:58:28Z baiwei.jiang $
*/

(!defined('IN_TOA') || !defined('IN_ADMIN')) && exit('Access Denied!');

//if ( !is_superadmin() && !check_purview('manage_link') ) prompt('对不起，你没有权限执行本操作！');

empty($do) && $do = 'list';
if ($do == 'list') {
	include_once('template/workclass.php');

}elseif($do == 'add'){
	//global $db;
	//$values=explode(',',$_GET['value']);
	//for($i=0;$i<sizeof($values);$i++){
	//	if($values[$i]!=''){
	//		$sql="SELECT number FROM ".DB_TABLEPRE."workclass where number='".$values[$i]."'";
	//		$blog = $db->fetch_one_array($sql);
	//		$html.=$blog['number'].',';
	//	}
	//}
	//echo substr($html, 0, -1);
	echo $_GET['value'];
}
//获取二级
function dep_data($fid=0){
global $db;
$query = $db->query("SELECT * FROM ".DB_TABLEPRE."workclass_template where typeid='$fid' ORDER BY tplid Asc");
$html='';
while ($row = $db->fetch_array($query)) {
	$blog = $db->fetch_one_array("SELECT * FROM ".DB_TABLEPRE."workclass where tplid='".$row['tplid']."'   ORDER BY id desc");
	//$html.= 'var subarr'.$fid.' = [];'.chr(13).chr(10);
	$html.= 'subarr1'.$fid.'.push( {'.chr(13).chr(10); 
	$html.= ' "id" : "2'.$row['tplid'].'",'.chr(13).chr(10);
	$html.= '  "text" : "'.$row['title'].'",'.chr(13).chr(10);
	$html.= '  "value" : "'.$row['tplid'].'",'.chr(13).chr(10);
	$html.= '  "showcheck" : false,'.chr(13).chr(10); 
	$html.= '  complete : true,'.chr(13).chr(10); 
	$html.= '  "isexpand" : false,'.chr(13).chr(10); 
	$html.= '  "checkstate" : 0,'.chr(13).chr(10); 
	if($blog['id']!=''){ 
		$html.= '  "hasChildren" : true,'.chr(13).chr(10); 
		$html.= '  "ChildNodes" : subarr2'.$row[tplid].''.chr(13).chr(10); 
	}else{
		$html.= '  "hasChildren" : false'.chr(13).chr(10); 
	}
	$html.= '  });'.chr(13).chr(10); 
	if($blog['id']!=''){
		echo 'var subarr2'.$row['tplid'].' = [];'.chr(13).chr(10);
		dep_data1($row['tplid']);
	}
	
}
echo $html; 
}

function dep_data1($fid=0){
global $db;
$query = $db->query("SELECT * FROM ".DB_TABLEPRE."workclass where tplid='".$fid."'   ORDER BY id desc limit 0,30");
$html='';
while ($row = $db->fetch_array($query)) {
	$html.= 'subarr2'.$fid.'.push( {'.chr(13).chr(10); 
	$html.= ' "id" : "'.$row['id'].'",'.chr(13).chr(10);
	$html.= '  "text" : "'.$row['title'].'",'.chr(13).chr(10);
	$html.= '  "value" : "'.$row['number'].'",'.chr(13).chr(10);
	$html.= '  "showcheck" : true,'.chr(13).chr(10); 
	$html.= '  complete : true,'.chr(13).chr(10); 
	$html.= '  "isexpand" : false,'.chr(13).chr(10); 
	$html.= '  "checkstate" : 0,'.chr(13).chr(10); 
	$html.= '  "hasChildren" : false'.chr(13).chr(10); 
	$html.= '  });'.chr(13).chr(10); 
	
}
echo $html; 
}
?>
