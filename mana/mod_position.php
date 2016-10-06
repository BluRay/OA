<?php
/*
	[Office 515158] (C) 2009-2012 天生创想 Inc.
	$Id: mod_position 1209087 2012-01-08 08:58:28Z baiwei.jiang $
*/

(!defined('IN_TOA') || !defined('IN_ADMIN')) && exit('Access Denied!');
get_key("position_");
empty($do) && $do = 'list';
if ($do == 'list') {
	include_once('template/position.php');

}elseif ($do == 'save') {
	
	$idarr = getGP('id','P','array');
	$name = getGP('name','P','array');
	$date = get_date('Y-m-d H:i:s',PHP_TIME);
	foreach ($idarr as $id) {
		if($name[$id]=='')$name[$id]='新岗位名称';
		$position = array(
			'name' => $name[$id]
		);
		update_db('position',$position, array('id' => $id));
	}
	if(getGP('newid','P','array')!='' || getGP('newids','P','array')!=''){
		$newname = '';
		foreach (getGP('newname','P','array') as $name) {
			$newname.=$name.',';
		}
		$newinherited = '';
		foreach (getGP('newinherited','P','array') as $name) {
			$newinherited.=$name.',';
		}
		$newname=substr($newname, 0, -1);
		$newinherited=substr($newinherited, 0, -1);
		$newname=explode(',',$newname);
		$newinherited=explode(',',$newinherited);
			for($i=0;$i<sizeof($newname);$i++){
				if($newname[$i]!=''){
					if($newinherited[$i]!=''){
						$fatherid=$newinherited[$i];
					}else{
						$fatherid='0';
					}
					$position = array(
						'name' => $newname[$i],
						'father'=>$fatherid,
						'date'=>$date
					);
					insert_db('position',$position);
				}
			}
		$str=',新增了<font color=red>'.sizeof($newname).'</font>条信息';
	}
	
	oa_mana_recache('position','id','id');
	show_msg('批量岗位信息更新成功'.$str.'！', 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'');
}elseif ($_GET['do'] == 'update') {
	$db->query("DELETE FROM ".DB_TABLEPRE."position WHERE id = '".$_GET[id]."' ");
	$db->query("UPDATE ".DB_TABLEPRE."position set father='".$_GET['fid']."' WHERE father = '".$_GET[id]."' ");
	oa_mana_recache('position','id','id');
	show_msg('岗位信息删除成功！', 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'');
} 

?>