<?php
/*
	[Office 515158] (C) 2009-2012 天生创想 Inc.
	$Id: mod_department 1209087 2012-01-08 08:58:28Z baiwei.jiang $
*/

(!defined('IN_TOA') || !defined('IN_ADMIN')) && exit('Access Denied!');
get_key("department_");
empty($do) && $do = 'list';
if ($do == 'list') {
	include_once('template/department.php');

}elseif ($do == 'save') {
	$idarr = getGP('id','P','array');
	$persno = getGP('persno','P','array');
	$name = getGP('name','P','array');
	$date = get_date('Y-m-d H:i:s',PHP_TIME);
	foreach ($idarr as $id) {
		if($name[$id]=='')$name[$id]='新部门名称';
		if($persno[$id]=='')$persno[$id]='负责人为空?';
		$department = array(
			'name' => $name[$id],
			'persno' => $persno[$id]
		);
		update_db('department',$department, array('id' => $id));
	}
	if(getGP('newid','P','array')!='' || getGP('newids','P','array')!=''){
		$newname = '';
		foreach (getGP('newname','P','array') as $name) {
			$newname.=$name.',';
		}
		$newpersno = '';
		foreach (getGP('newpersno','P','array') as $name) {
			$newpersno.=$name.',';
		}
		$newinherited = '';
		foreach (getGP('newinherited','P','array') as $name) {
			$newinherited.=$name.',';
		}
		$newname=substr($newname, 0, -1);
		$newpersno=substr($newpersno, 0, -1);
		$newinherited=substr($newinherited, 0, -1);
		$newname=explode(',',$newname);
		$newpersno=explode(',',$newpersno);
		$newinherited=explode(',',$newinherited);
		if($newname!=''){
			for($i=0;$i<sizeof($newname);$i++){
				if($newname[$i]!=''){
					if($newinherited[$i]!=''){
						$fatherid=trim($newinherited[$i]);
					}else{
						$fatherid='0';
					}
					$department = array(
						'name' => $newname[$i],
						'persno' => $newpersno[$i],
						'father'=>$fatherid,
						'date'=>$date
					);
					insert_db('department',$department);
				}
			}
		}
		$str=',新增了<font color=red>'.sizeof($newname).'</font>条信息';
	}
	$content=serialize($idarr).serialize($persno).serialize($name);
	$title='部门信息';
	get_logadd($id,$content,$title,18,$_USER->id);
	oa_mana_recache('department','id','id');
	show_msg('批量部门信息更新成功'.$str.'！', 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'');
}elseif ($_GET['do'] == 'update') {
	$db->query("DELETE FROM ".DB_TABLEPRE."department WHERE id = '".$_GET[id]."' ");
	$db->query("UPDATE ".DB_TABLEPRE."department set father='".$_GET['fid']."' WHERE father = '".$_GET[id]."' ");
	oa_mana_recache('department','id','id');
	show_msg('部门信息删除成功！', 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'');
} 

?>