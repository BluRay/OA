<?php
/*
	[Office 515158] (C) 2009-2012 天生创想 Inc.
	$Id: home.php 1209087 2012-01-08 08:58:28Z baiwei.jiang $
*/
define('IN_ADMIN',True);
require_once('include/common.php');
require_once('include/function_home.php');
get_login($_USER->id);
//重新获取背景
if($_GET['hometype']!=''){
	$db->query("update ".DB_TABLEPRE."user_view set hometype='".$_GET['hometype']."' WHERE uid = '".$_USER->id."' ");
	
}
$sql = "SELECT homemana,homebg,pic,sex,home_txt,hometype FROM ".DB_TABLEPRE."user_view  WHERE uid='".$_USER->id."'";
$bguser = $db->fetch_one_array($sql);
$homemana=$bguser['homemana'];
//处理桌面，以个人设定为先
if($bguser['hometype']!=''){
	$hometype=$bguser['hometype'];
}else{
	$hometype=$_CONFIG->config_data('home');
}
if($hometype==1){

}else{

	if($bguser['homebg']!=''){
		$bg=''.$bguser['homebg'];
	}else{
		$bg='template/default/home/images/wallpaper.jpg';
	}
	if($_GET['mid']==3){
		header('Location: admin.php?ac=workdate&fileurl=workbench');
	}elseif($_GET['mid']==4){
		header('Location: admin.php?ac=list&fileurl=workclass');
	}elseif($_GET['mid']==7){
		header('Location: admin.php?ac=company&fileurl=crm');
	}elseif($_GET['mid']==10){
		header('Location: admin.php?ac=index&fileurl=goods');
	}elseif($_GET['mid']==11){
		header('Location: admin.php?ac=registration&fileurl=human');
	}elseif($_GET['mid']==5){
		header('Location: admin.php?ac=attachment&fileurl=app');
	}elseif($_GET['mid']==6){
		header('Location: admin.php?ac=index&fileurl=file');
	}elseif($_GET['mid']==8){
		header('Location: admin.php?ac=list&fileurl=project');
	}elseif($_GET['mid']==9){
		header('Location: admin.php?ac=know&fileurl=knowledge');
	}elseif($_GET['mid']==56){
		header('Location: admin.php?ac=bbs&fileurl=knowledge');
	}elseif($_GET['mid']==58){
		header('Location: admin.php?ac=config&fileurl=mana');
	}else{
		include_once template.'home_text.php';
	}
}




?>