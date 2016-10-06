<?php
/*
	[Office 515158] (C) 2009-2012 天生创想 Inc.
	$Id: oa 1209087 2012-01-08 08:58:28Z baiwei.jiang $
*/

(!defined('IN_TOA') || !defined('IN_ADMIN')) && exit('Access Denied!');

//if ( !is_superadmin() && !check_purview('manage_link') ) prompt('对不起，你没有权限执行本操作！');

empty($do) && $do = 'list';
if ($do == 'list') {
	include_once('template/project.php');

}elseif($do == 'add'){
	global $db;
	$values=explode(',',$_GET['value']);
	if($_GET['protype']=='mana'){
		for($i=0;$i<sizeof($values);$i++){
			if($values[$i]!=''){
				$sql="SELECT number,id FROM ".DB_TABLEPRE."project where number='".$values[$i]."'";
				$blog = $db->fetch_one_array($sql);
				$html.=$blog['number'].',';
				$htmlurl.='admin.php?ac=list&do=view&fileurl=project&projectid='.$blog['id'].',';
			}
		}
	}else{
		for($i=0;$i<sizeof($values);$i++){
			if($values[$i]!=''){
				$sql="SELECT * FROM ".DB_TABLEPRE."project_log where number='".$values[$i]."'";
				$blog = $db->fetch_one_array($sql);
				$sql1="SELECT * FROM ".DB_TABLEPRE."project_model where mid='".$blog['modid']."'";
				$mod = $db->fetch_one_array($sql1);
				if($mod['key3']=='0'){
					$htmlurl.='admin.php?ac=modlist&do=view&fileurl=project&lid='.$blog['lid'].'&modid='.$blog['modid'].'&projectid='.$blog['projectid'].'&typeid='.$blog['typeid'].',';
				}else{
					$htmlurl.='admin.php?ac=tpllist&do=view&fileurl=project&lid='.$blog['lid'].'&modid='.$blog['modid'].'&projectid='.$blog['projectid'].'&typeid='.$blog['typeid'].'&tplid='.$blog['tplid'].',';
				}
				$html.=$blog['number'].',';
				
			}
		}
	}
	echo substr($html, 0, -1).'|'.substr($htmlurl, 0, -1);
	//echo $_GET['value'];
}
//获取二级
function dep_data_mod($typeid,$modid,$projectid){
	global $db;
	$query = $db->query("SELECT * FROM ".DB_TABLEPRE."project_log where typeid='".$typeid."' and modid='".$modid."' and projectid='".$projectid."'  ORDER BY lid desc");
	$html='';
	while ($row = $db->fetch_array($query)) {
		$html.= 'subarr1'.$modid.'.push( {'.chr(13).chr(10); 
		$html.= ' "id" : "2'.$row['lid'].'",'.chr(13).chr(10);
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

function dep_data_tpl($typeid,$modid,$projectid){
	global $db;
	$query = $db->query("SELECT * FROM ".DB_TABLEPRE."project_template where typeid='".$typeid."' and modid='".$modid."' ORDER BY tplid asc limit 0,30");
	$html='';
	while ($row = $db->fetch_array($query)) {
		$html.= 'subarr2'.$modid.'.push( {'.chr(13).chr(10); 
		$html.= ' "id" : "3'.$row['tplid'].'",'.chr(13).chr(10);
		$html.= '  "text" : "'.$row['title'].'",'.chr(13).chr(10);
		$html.= '  "value" : "'.$row['tplid'].'",'.chr(13).chr(10);
		$html.= '  "showcheck" : false,'.chr(13).chr(10); 
		$html.= '  complete : true,'.chr(13).chr(10); 
		$html.= '  "isexpand" : false,'.chr(13).chr(10); 
		$html.= '  "checkstate" : 0,'.chr(13).chr(10); 
		$blog = $db->fetch_one_array("SELECT * FROM ".DB_TABLEPRE."project_log where typeid='".$typeid."' and modid='".$modid."' and projectid='".$projectid."' and tplid='".$row['tplid']."'  ORDER BY lid desc");
		if($blog['lid']!=''){
			$html.= '  "hasChildren" : true,'.chr(13).chr(10);
			$html.= '  "ChildNodes" : subarr3'.$row['tplid'].''.chr(13).chr(10);
		}else{
			$html.= '  "hasChildren" : false'.chr(13).chr(10);
		} 
		$html.= '  });'.chr(13).chr(10);
		if($blog['lid']!=''){
			echo  'var subarr3'.$row['tplid'].' = [];'.chr(13).chr(10);
			dep_data_tpllist($typeid,$modid,$projectid,$row['tplid']);
		} 
		
	}
	echo $html; 
}
function dep_data_tpllist($typeid,$modid,$projectid,$tplid){
	global $db;
	$query = $db->query("SELECT * FROM ".DB_TABLEPRE."project_log where typeid='".$typeid."' and modid='".$modid."' and projectid='".$projectid."' and tplid='".$tplid."'  ORDER BY lid desc");
	$html='';
	while ($row = $db->fetch_array($query)) {
		$html.= 'subarr3'.$tplid.'.push( {'.chr(13).chr(10); 
		$html.= ' "id" : "4'.$row['lid'].'",'.chr(13).chr(10);
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
