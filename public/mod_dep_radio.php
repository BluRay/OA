<?php
/*
	[Office 515158] (C) 2009-2012 天生创想 Inc.
	$Id: oa 1209087 2012-01-08 08:58:28Z baiwei.jiang $
*/

(!defined('IN_TOA') || !defined('IN_ADMIN')) && exit('Access Denied!');

//if ( !is_superadmin() && !check_purview('manage_link') ) prompt('对不起，你没有权限执行本操作！');

empty($do) && $do = 'list';
if ($do == 'list') {

	include_once('template/dep_radio.php');

}elseif($do='add'){
	if(getGP('inputname','G')!=''){
		$participation=getGP('inputname','G');
	}else{
		$participation='participation';
	}
	echo "<script>window.opener.document.save.".$participation.".value='".$_GET[name]."';</script>";
	echo "<script>window.opener.document.save.".$participation."id.value='".$_GET[id]."';</script>";
	echo '<script language="JavaScript">window.close()</script>';
}
//读取部门
function public_list($fatherid=0,$selid=0,$layer=0,$ac,$fileurl){
    global $db;
	$sql="SELECT * FROM ".DB_TABLEPRE."department where father='$fatherid' ORDER BY id Asc";
	$query = $db->query($sql);
	echo '<tbody id="group_'.trim($fatherid).'">';
	if(count($query)>0){
		while ($row = $db->fetch_array($query)) {
			$rsfno = $db->fetch_one_array("SELECT * FROM ".DB_TABLEPRE."department where father='".$row[id]."' ORDER BY id asc limit 0,1");
			echo '<tr class="hover">';
			echo '<td width="20"></td>';
			echo '<td width="400"><div class="board">'.trim($row[name]).'</span></td>';
			echo '<td width="50"><a href="admin.php?ac='.$ac.'&fileurl='.$fileurl.'&do=add&id='.trim($row[id]).'&name='.trim($row[name]).'&inputname='.trim($_GET[inputname]).'" class="act">+选择</a></td></tr>';
	
			if($rsfno[id]!=''){
				public_view($row['id'],$selid,$layer+1,$ac,$fileurl);
			}
		}
	}
   echo '</tbody>';
   return ;

}
function public_view($fatherid=0,$selid=0,$layer=0,$ac,$fileurl){
    global $db;
	$sql="SELECT * FROM ".DB_TABLEPRE."department where father='$fatherid' ORDER BY id Asc";
	$query = $db->query($sql);
	if(count($query)>0){
		for($i=0;$i<$layer;$i++){
		   $str.="&nbsp;&nbsp;&nbsp;&nbsp;";
		   }
		while ($row = $db->fetch_array($query)) {
			$rsfno = $db->fetch_one_array("SELECT * FROM ".DB_TABLEPRE."department where father='".$row[id]."' ORDER BY id asc limit 0,1");
			echo'<tr class="hover"><td width="20"></td>';
			echo'<td width="400"><div id="cb_'.trim($row[id]).'" class="childboard">';
			echo''.$str.trim($row[name]).'</div></td>';
			echo'<td width="50">';
			echo'<a href="admin.php?ac='.$ac.'&fileurl='.$fileurl.'&do=add&id='.trim($row[id]).'&name='.trim($row[name]).'&inputname='.trim($_GET[inputname]).'" class="act">+选择</a></td></tr>';
			if($rsfno[id]!=''){
				public_view($row['id'],$selid,$layer+1,$ac,$fileurl);
			}
			
		}
	}
   return ;

}
?>
