<?php
/*
	[Office 515158] (C) 2009-2012 天生创想 Inc.
	$Id: function_help.php 1209087 2012-01-08 08:58:28Z baiwei.jiang $
*/
!defined('IN_TOA') && exit('Access Denied!');

function helpids(){
	$helpid='registration,在线考勤|duty,任务管理|sms,手机短信';
	return $helpid;
}
//下拉
function help_type($value=''){
	$helpid=explode('|',helpids()); 
	for($i=0;$i<sizeof($helpid);$i++){
		$help=explode(',',$helpid[$i]); 
		$selstr = $help[0] == $value ? 'selected="selected"' : '';
		$htmlstr .= '<option value="'.$help[0].'"  '.$selstr.'>'.$help[1].'</option>';
	}
	return $htmlstr;
			
}
//名称
function help_type_name($value=''){
	$helpid=explode('|',helpids()); 
	for($i=0;$i<sizeof($helpid);$i++){
		$help=explode(',',$helpid[$i]); 
		if(trim($help[0]) == trim($value)){
			$htmlstr = $help[1];
		}
	}
	return $htmlstr;
			
}
?>