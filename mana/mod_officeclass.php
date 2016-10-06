<?php
/*
	[Office 515158] (C) 2009-2012 天生创想 Inc.
	$Id: mod_officeclass 1209087 2012-01-08 08:58:28Z baiwei.jiang $
*/
(!defined('IN_TOA') || !defined('IN_ADMIN')) && exit('Access Denied!');
$otype=$_GET['otype'];
function typeclass($name,$typeid,$class){
	$_links['title']='<a ';
		if($class!=''){
			$_links['title'].=' class="active"';
		}
	$_links['title'].=' href="admin.php?ac=officeclass&fileurl=mana&do=bbsclass&otype='.$typeid.'"><span> '.$name.'</span></a>';
	 return $_links['title'];
}
$_cname['class']='';
if($otype=='1' || $otype=='2'){
	if($otype=='1'){
		$_cname['name']='会议室';
		$_cname['class']='class="active"';
	}else{
		$_cname['name']='会议类别';
		$_cname['class']='class="active"';
	}
	$_links['title']='<a ';
		if($otype=='1'){
			$_links['title'].=$_cname['class'];
		}
	$_links['title'].=' href="admin.php?ac=officeclass&fileurl=mana&do=bbsclass&otype=1"><span> 会议室设置</span></a>';
	$_links['title'].='<a ';
		if($otype=='2'){
			$_links['title'].=$_cname['class'];
		}
	$_links['title'].='  href="admin.php?ac=officeclass&fileurl=mana&do=bbsclass&otype=2"><span> 会议类别设置</span></a>';
	$_links['title'].='<a href="admin.php?ac=conference&fileurl=administrative"><span> 会议列表</span></a>';
}else{
	 if($otype=='14'){
		$_cname['name']='人事合同类型';
		$_links['title'].=typeclass('人事合同类型',14,'1');
		$_links['title'].=typeclass('人事合同状态',15,'');
		$_links['title'].=typeclass('招聘渠道',16,'');
		$_links['title'].=typeclass('培训类型',17,'');
		$_links['title'].=typeclass('培训形式',18,'');
		$_links['title'].=typeclass('奖惩项目',19,'');
		$_links['title'].=typeclass('学历',10,'');
		
	}elseif($otype=='15'){
		$_cname['name']='人事合同状态';
		$_links['title'].=typeclass('人事合同类型',14,'');
		$_links['title'].=typeclass('人事合同状态',15,'1');
		$_links['title'].=typeclass('招聘渠道',16,'');
		$_links['title'].=typeclass('培训类型',17,'');
		$_links['title'].=typeclass('培训形式',18,'');
		$_links['title'].=typeclass('奖惩项目',19,'');
		$_links['title'].=typeclass('学历',10,'');
		
	}elseif($otype=='16'){
		$_cname['name']='招聘渠道';
		$_links['title'].=typeclass('人事合同类型',14,'');
		$_links['title'].=typeclass('人事合同状态',15,'');
		$_links['title'].=typeclass('招聘渠道',16,'1');
		$_links['title'].=typeclass('培训类型',17,'');
		$_links['title'].=typeclass('培训形式',18,'');
		$_links['title'].=typeclass('奖惩项目',19,'');
		$_links['title'].=typeclass('学历',10,'');
		
	}elseif($otype=='17'){
		$_cname['name']='培训类型';
		$_links['title'].=typeclass('人事合同类型',14,'');
		$_links['title'].=typeclass('人事合同状态',15,'');
		$_links['title'].=typeclass('招聘渠道',16,'');
		$_links['title'].=typeclass('培训类型',17,'1');
		$_links['title'].=typeclass('培训形式',18,'');
		$_links['title'].=typeclass('奖惩项目',19,'');
		$_links['title'].=typeclass('学历',10,'');
		
	}elseif($otype=='18'){
		$_cname['name']='培训形式';
		$_links['title'].=typeclass('人事合同类型',14,'');
		$_links['title'].=typeclass('人事合同状态',15,'');
		$_links['title'].=typeclass('招聘渠道',16,'');
		$_links['title'].=typeclass('培训类型',17,'');
		$_links['title'].=typeclass('培训形式',18,'1');
		$_links['title'].=typeclass('奖惩项目',19,'');
		$_links['title'].=typeclass('学历',10,'');
		
	}elseif($otype=='19'){
		$_cname['name']='奖惩项目';
		$_links['title'].=typeclass('人事合同类型',14,'');
		$_links['title'].=typeclass('人事合同状态',15,'');
		$_links['title'].=typeclass('招聘渠道',16,'');
		$_links['title'].=typeclass('培训类型',17,'');
		$_links['title'].=typeclass('培训形式',18,'');
		$_links['title'].=typeclass('奖惩项目',19,'1');
		$_links['title'].=typeclass('学历',10,'');
		
	}elseif($otype=='10'){
		$_cname['name']='学历';
		$_links['title'].=typeclass('人事合同类型',14,'');
		$_links['title'].=typeclass('人事合同状态',15,'');
		$_links['title'].=typeclass('招聘渠道',16,'');
		$_links['title'].=typeclass('培训类型',17,'');
		$_links['title'].=typeclass('培训形式',18,'');
		$_links['title'].=typeclass('奖惩项目',19,'');
		$_links['title'].=typeclass('学历',10,'1');
		
	}
	
}

	if($otype=='1'){
		get_key("istration_conference_type_sce");
	}elseif($otype=='2'){
		get_key("istration_conference_type_type");
	}elseif($otype>='10' && $otype<='19'){
		get_key("office_type_r");
	}else{
	}
empty($do) && $do = 'bbsclass';
if($do == 'bbsclass') {
	if(getGP('view','P')=='save'){
		
		$idarr = getGP('id','P','array');
		$name = getGP('name','P','array');
		foreach ($idarr as $id) {
			if($name[$id]=='')$name[$id]='新'.$_cname['name'];
			$office_type = array(
				'oname' => $name[$id]
			);
			update_db('office_type',$office_type, array('oid' => $id));
		}
		$newname = '515158';
		foreach (getGP('newname','P','array') as $name) {
			$newname.=',,'.$name;
		}
		$newname=explode(',,',str_replace('515158,,','',$newname));
		if($newname!=''){
			for($i=0;$i<sizeof($newname);$i++){
				if(str_replace('515158','',$newname[$i])!=''){
					if(str_replace('515158','',$newname[$i])=='')$newname[$i]='新'.$_cname['name'];
					$office_type = array(
						'oname' => str_replace('515158','',$newname[$i]),
						'otype' => $otype,
						'uid' => $_USER->id
					);
					insert_db('office_type',$office_type);
				}
			}
		}
		show_msg($_cname['name'].'信息操作成功！', 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'&do=bbsclass&otype='.$otype);
	}elseif(getGP('id','G')!=''){
		
		$db->query("DELETE FROM ".DB_TABLEPRE."office_type WHERE oid = '".getGP('id','G')."' ");
		/*$content=getGP('id','G').get_log(1).$_USER->id;
		$title='删除'.$_cname['name'];
		get_logadd(getGP('id','G'),$content,$title,30,$_USER->id);*/
		//都写了日志，唯这个还没有写
		show_msg($_cname['name'].'信息删除成功！', 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'&do=bbsclass&otype='.$otype);
	}else{
		
		$sql = "SELECT * FROM ".DB_TABLEPRE."office_type where otype='".$otype."'  ORDER BY oid asc";
		$result = $db->fetch_all($sql);
		include_once('template/officeclass.php');
	}
}
?>