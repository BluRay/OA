<?php
/*
	[Office 515158] (C) 2009-2012 天生创想 Inc.
	$Id: login.php 1209087 2012-01-08 08:58:28Z baiwei.jiang $
*/
define('IN_ADMIN',True);
require('include/common.php');
$do = getGP('do','G');

if ( check_submit('dosubmit') ) {
	
	$errmsg = array();
	initGP(array('username', 'password', 'vdcode','remember'), 'P');
	
	if ( strlen($username) < 3 || strlen($username) > 20 ) {
		$errmsg[] = '用户名长度必须在3-20字节之间。';
	} elseif ( !is_username($username) ) {
		$errmsg[] = '用户名中含有非法字符。';
	}
	
	if ( strlen($password) < 6 ) $errmsg[] = '密码长度不能小于6个字节。';
	if ( get_config('user','login_vdcode') ) {
		session_start();
		if ( strtolower($vdcode) != $_SESSION['vdcode'] ) $errmsg[] = '验证码不正确。';
		unset($_SESSION['vdcode']);
	}
	
	if (count($errmsg)) show_msg($errmsg, 'login.php');
	$flag = $_USER->login($username, $password, $remember);
	if ( $flag == 1) {
		goto_page('admin.php');
	} elseif ( $flag == -3 ) {
		show_msg('登录失败，你的帐号尚未通过审核。', 'login.php');
	} elseif ( $flag == -5 ) {
		show_msg('登录失败，你的IP错误。', 'login.php');
	} else {
		show_msg('登录失败，用户名或密码错误。', 'login.php');
	}

}

if ($do == "logout") {

	$_USER->logout();
	show_msg('你已经安全退出登录，现在转到首页...','./');

} else {

	if ( $_USER->id ) {
	goto_page('admin.php');

}
}
include_once template.'login.php';
?>