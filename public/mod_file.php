<?php
/*
	[Office 515158] (C) 2009-2012 天生创想 Inc.
	$Id: oa 1209087 2012-01-08 08:58:28Z baiwei.jiang $
*/
(!defined('IN_TOA') || !defined('IN_ADMIN')) && exit('Access Denied!');
empty($do) && $do = 'list';
if ($do == 'list') {
	if($_GET['officeid']!=''){
		$sql = "SELECT * FROM ".DB_TABLEPRE."fileoffice WHERE officeid='".$_GET['officeid']."' and officetype='".$_GET['officetype']."' and filetype='2' ORDER BY id desc";
	}else{
		$sql = "SELECT * FROM ".DB_TABLEPRE."fileoffice WHERE number='".$_GET['filenumber']."' and officetype='".$_GET['officetype']."' and filetype='2' ORDER BY id desc";
	}
	
	$result = $db->query($sql);
	while ($row = $db->fetch_array($result)) {	
		echo '<a href="down.php?urls='.$row['fileaddr'].'">'.$row['filename'].'</a>&nbsp;&nbsp;&nbsp;&nbsp;上传人：'.get_realname($row['uid']).'&nbsp;&nbsp;&nbsp;&nbsp;上传时间：'.$row['date'].'<br>';
	}
}elseif($do='office'){
	if($_GET['officeid']!=''){
		$sql = "SELECT * FROM ".DB_TABLEPRE."fileoffice WHERE officeid='".$_GET['officeid']."' and officetype='".$_GET['officetype']."' and filetype='1' ORDER BY id desc";
	}else{
		$sql = "SELECT * FROM ".DB_TABLEPRE."fileoffice WHERE number='".$_GET['filenumber']."' and officetype='".$_GET['officetype']."' and filetype='1' ORDER BY id desc";
	}
	
	$result = $db->query($sql);
	while ($row = $db->fetch_array($result)) {	
		echo '<a target="_blank" href="ntko/FileEdit.php?FileId='.$row['fileid'].'&uid='.$_USER->id.'&filenumber='.$row['number'].'&officetype='.$row['officetype'].'&date='.$row['date'].'">'.$row['filename'].'</a>&nbsp;&nbsp;&nbsp;&nbsp;上传人：'.get_realname($row['uid']).'&nbsp;&nbsp;&nbsp;&nbsp;上传时间：'.$row['date'].'<br>';
	}
}

?>
