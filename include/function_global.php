<?php
/*
	[Office 515158] (C) 2009-2012 天生创想 Inc.
	$Id: function_global.php 1209087 2012-01-08 08:58:28Z baiwei.jiang $
*/

!defined('IN_TOA') && exit('Access Denied!');

if (!function_exists('file_put_contents')) {
	function file_put_contents($file, $data, $append = false) {
		$mode = $append ? 'ab' : 'wb';
		$fp = @fopen($file,$mode) or die("can not open file $file !");
		flock($fp, LOCK_EX);
		$len = fwrite($fp, $data);
		flock($fp, LOCK_UN);
		@fclose($fp);
		return $len;
	}
}

if ( !function_exists('file_get_contents') ) {
	function file_get_contents($file) {
		$fp = @fopen($file,'rb') or die("can not open file $file!");
		flock($fp, LOCK_SH);
		$content = fread($fp, filesize($file));
		flock($fp, LOCK_UN);
		@fclose($fp);
		return $content;
	}
}

if (!function_exists('json_encode')) {
	function json_encode ($a=false) {
		if (is_null($a)) return 'null';
		if ($a === false) return 'false';
		if ($a === true) return 'true';
		if (is_scalar($a)) {
			if (is_float($a)) {
				return floatval(str_replace(",", ".", strval($a)));
			}
			if (is_string($a)) {
				static $jsonReplaces = array(array("\\", "/", "\n", "\t", "\r", "\b", "\f", '"'), array('\\\\', '\\/', '\\n', '\\t', '\\r', '\\b', '\\f', '\"'));
				return '"' . str_replace($jsonReplaces[0], $jsonReplaces[1], $a) . '"';
			} else {
				return $a;
			}
		}
		$isList = true;
		for ($i = 0, reset($a); $i < count($a); $i++, next($a)) {
			if (key($a) !== $i) {
				$isList = false;
				break;
			}
		}
		$result = array();
		if ($isList) {
			foreach ($a as $v) $result[] = json_encode($v);
			return '[' . join(',', $result) . ']';
		} else {
			foreach ($a as $k => $v) $result[] = json_encode($k).':'.json_encode($v);
			return '{' . join(',', $result) . '}';
		}
	}
}
//设置系统时间
function get_date($format, $timestamp = '') {
	$timezone = 8;
	empty($timestamp) && $timestamp = PHP_TIME;
	return gmdate($format, $timestamp + intval($timezone) * 3600);
}

function str_to_time($timestr) {
	$timezone = get_config('TOA','timezone');
	return function_exists('date_default_timezone_set') ? (strtotime($timestr) - 3600 * $timezone) : strtotime($timestr);
}

//页面跳转,不提示
function goto_page($url) {
	echo '<html><head></head><body><script type="text/javascript">window.location=\''.$url.'\'</script></body></html>';
	//echo $url;
	exit;
}

//获取配置信息
function get_config($group, $key) {
	return $GLOBALS['_CACHE']['config'][$group][$key];
}

//获取客户端IP
function get_onlineip() {
	if ($_SERVER['HTTP_X_FORWARDED_FOR']) {
		$onlineip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	} elseif ($_SERVER['HTTP_CLIENT_IP']) {
		$onlineip = $_SERVER['HTTP_CLIENT_IP'];
	} else {
		$onlineip = $_SERVER['REMOTE_ADDR'];
	}
	return preg_match("/^([0-9]{1,3}\.){3}[0-9]{1,3}$/",$onlineip) ? $onlineip : 'unknown';	
}
//addslashes
function add_slashes($string) {
	if (!is_array($string)) return addslashes($string);
	foreach ($string as $key => $val) {
		$string[$key] = add_slashes($val);
	}
	return $string;
}

function del_slashes($string) {
	if (!is_array($string)) return stripslashes($string);
	foreach ($string as $key => $val) {
		$string[$key] = del_slashes($val);
	}
	return $string;
}

//ob_start
function obstart() {
	if ( get_config('TOA','obstart') && function_exists('ob_gzhandler') ) {
		ob_start('ob_gzhandler');
	} else {
		ob_start();
	}
}
//ob_end_clean
function obclean() {
	ob_end_clean();
	obstart();
}

//检查提交
function check_submit($action) {
	if (isset($_POST[$action]) && $_SERVER['REQUEST_METHOD'] == 'POST') {
		return true;
	}
	return false;
}

//字符串过滤
function check_str($string, $isurl = false) {
	$string = preg_replace('/[\\x00-\\x08\\x0B\\x0C\\x0E-\\x1F]/','',$string);
	$string = str_replace(array("\0","%00","\r"),'',$string);
	empty($isurl) && $string = preg_replace("/&(?!(#[0-9]+|[a-z]+);)/si",'&amp;',$string);
	$string = str_replace(array("%3C",'<'),'&lt;',$string);
	$string = str_replace(array("%3E",'>'),'&gt;',$string);
	$string = str_replace(array('"',"'","\t",'  '),array('&quot;','&#39;','    ','&nbsp;&nbsp;'),$string);
	return trim($string);
}

//是否超级管理员
function is_superadmin($uid = '') {
	global $_USER,$superadmin;
	global $db;
	$sql = "SELECT id FROM ".DB_TABLEPRE."user where flag='1' and id='".$_USER->id."'";
	$result = $db->fetch_one_array($sql);
	return $result['id'];
	//empty($uid) && $uid = $_USER->id;
	//return in_array($uid, explode(',',$superadmin));

}

//检查权限
function check_purview($pv) {
	global $_USER;
	return $_USER->get_pv($pv);
}

//设置COOKIE
function set_cookie($var, $val = '', $expire = 0) {
	$expire = $expire > 0 ? PHP_TIME + $expire : (empty($val) ? (PHP_TIME - 3600) : 0);
	$s = $_SERVER['SERVER_PORT'] == 443 ? 1 : 0;
	return setcookie(COOKIE_PRE.$var, $val, $expire, COOKIE_PATH, COOKIE_DOMAIN, $s);
}

//获取COOKIE
function get_cookie($var) {
	$var = COOKIE_PRE.$var;
	return isset($_COOKIE[$var]) ? $_COOKIE[$var] : False;
}

//插入记录
function insert_db($table, $data, $replace = false) {
	global $db;
	$keysql = $valsql = '';
	foreach ($data as $key => $val) {
		$keysql .= empty($keysql) ? "`$key`" : ", `$key`";
		$valsql .= empty($valsql) ? "'$val'" : ", '$val'";
	}
	$method = $replace ? 'REPLACE' : 'INSERT';
	$sql = "$method INTO `".DB_TABLEPRE."$table` ($keysql) VALUES ($valsql)";
	$db->query($sql);
	return $db->insert_id();
}
//插入记录
function insert_smsdb($table, $data, $replace = false) {
	global $db;
	$keysql = $valsql = '';
	foreach ($data as $key => $val) {
		$keysql .= empty($keysql) ? "`$key`" : ", `$key`";
		$valsql .= empty($valsql) ? "'$val'" : ", '$val'";
	}
	$method = $replace ? 'REPLACE' : 'INSERT';
	$sql = "$method INTO `$table` ($keysql) VALUES ($valsql)";
	$db->query($sql);
	return $db->insert_id();
}
//更新记录
function update_db($table, $value, $where) {
	global $db;
	$updatesql = $wheresql = '';
	foreach ($value as $key => $val) {
		$updatesql .= empty($updatesql) ? " `$key` = '$val'" : ", `$key` = '$val'";
	}
	foreach ($where as $key => $val) {
		$wheresql .= empty($wheresql) ? " `$key` = '$val' " : " AND `$key` = '$val'";
	}
	$sql = "UPDATE `".DB_TABLEPRE."$table` SET $updatesql WHERE $wheresql";
	$db->query($sql);
	return $db->affected_rows();
}
function prompt($str){
	echo $str;
	exit;
}
//字符串截取
function cut_str($str, $len = 0, $dot = '...',$encoding = 'utf-8') {
	if (!$len || strlen($str) <= $len) return $str;
	$tempstr = '';
	$str = str_replace(array('&amp;', '&quot;', '&lt;', '&gt;'), array('&', '"', '<', '>'), $str);
	if ($encoding == 'utf-8') {
		$n = $tn = $noc = 0;
		while($n < strlen($str)) {
			$t = ord($str[$n]);
			if($t == 9 || $t == 10 || (32 <= $t && $t <= 126)) {
				$tn = 1; $n++; $noc++;
			} elseif (194 <= $t && $t <= 223) {
				$tn = 2; $n += 2; $noc += 2;
			} elseif (224 <= $t && $t < 239) {
				$tn = 3; $n += 3; $noc += 2;
			} elseif (240 <= $t && $t <= 247) {
				$tn = 4; $n += 4; $noc += 2;
			} elseif (248 <= $t && $t <= 251) {
				$tn = 5; $n += 5; $noc += 2;
			} elseif ($t == 252 || $t == 253) {
				$tn = 6; $n += 6; $noc += 2;
			} else {
				$n++;
			}
			if($noc >= $len) {
				break;
			}
		}
		if($noc > $len) {
			$n -= $tn;
		}
		$tempstr = substr($str, 0, $n);
	} elseif ($encoding == 'gbk') {
		for ($i=0; $i<$len; $i++) {
			$tempstr .= ord($str{$i}) > 127 ? $str{$i}.$str{++$i} : $str{$i};
		}
	}
	$tempstr = str_replace(array('&', '"', '<', '>'), array('&amp;', '&quot;', '&lt;', '&gt;'), $tempstr);
	return $tempstr.$dot;
}

//数据大小单位转换
function sizecount($byte) {
	if ($byte < 1024) {
		return $byte.'byte';
	} elseif (($size = round($byte/1024,2)) < 1024) {
		return $size.'KB';
	} elseif (($size = round($byte / (1024*1024),2)) < 1024) {
		return $size.'MB';
	} else {
		return round($byte / (1024*1024*1024),2).'GB';
	}
}

//获取$_GET或$_POST值
function getGP($var, $method = 'GP', $type = 'string') {
	if ($method == 'G' || $method != 'P' && isset($_GET[$var])) {
		$gp = &$_GET;
	} else {
		$gp = &$_POST;
	}
	if ($type == 'int') {
		return isset($gp[$var]) ? intval($gp[$var]) : 0;
	} elseif ($type == 'array') {
		return isset($gp[$var]) ? (array)$gp[$var] : array();
	} else {
		return isset($gp[$var]) ? (string)trim($gp[$var]) : '';
	}
}

//初始化GP值为变量
function initGP($keys, $method = 'GP', $type = 'string') {
	!is_array($keys) && $keys = array($keys);
	foreach ($keys as $key) {
		$GLOBALS[$key] = getGP($key, $method, $type);
	}
}
//提示信息
function show_msg_type ($content = '', $url = '') {
		$_ENV['message'] = array();
		$_ENV['message']['content'] = "$content";
		$_ENV['message']['nav'] = "<a href='$url'>是的，我要执行此操作</a>";
		echo '
		<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=7" />
<title>提示信息</title>
<style type="text/css"> 
<!--
*{ padding:0; margin:0; font-size:12px}
a:link,a:visited{text-decoration:none;color:#0068a6}
a:hover,a:active{color:#ff6600;text-decoration: underline}
.showMsg{border: 1px solid #1e64c8; zoom:1; width:450px; height:172px;position:absolute;top:44%;left:50%;margin:-87px 0 0 -225px}
.showMsg h5{background-image: url(template/default/images/admin_img/msg.png);background-repeat: no-repeat; color:#fff; padding-left:35px; height:25px; line-height:26px;*line-height:28px; overflow:hidden; font-size:14px; text-align:left}
.showMsg .content{ padding:46px 12px 10px 45px; font-size:14px; height:64px; text-align:left}
.showMsg .bottom{ background:#e4ecf7; margin: 0 1px 1px 1px;line-height:26px; *line-height:30px; height:26px; text-align:center}
.showMsg .ok,.showMsg .guery{background: url(template/default/images/admin_img/msg_bg.png) no-repeat 0px -560px;}
.showMsg .guery{background-position: left -460px;}
-->
</style>
</head>
<body>
<div class="showMsg" style="text-align:center">
	<h5>提示信息</h5>
    <div class="content guery" style="display:inline-block;display:-moz-inline-stack;zoom:1;*display:inline;max-width:330px">'.$_ENV['message']['content'].'</div>
    <div class="bottom">
    	['.$_ENV['message']['nav'].']
			        </div>
</div>
</body>
</html>';
exit();
}
//提示信息
function show_msg ($content = '', $url = '', $litime = 3000, $ajump = true) {
	$_ENV['message'] = array();
	if (is_array($content)) {
		foreach ($content as $value) $_ENV['message']['content'] .= "$value\n"; 
	} else {
		$_ENV['message']['content'] = "$content\n";
	}
	if ( $ajump ) {
		if ($url == "") {
			$_ENV['message']['nav'] = "<a href='javascript:history.back();'>如果您的浏览器没自动跳转，请点击这里</a>";
			$_ENV['message']['goto'] = "<script>setTimeout(\"history.back();\",{$litime});</script>";
		} else {
			$_ENV['message']['nav'] = "<a href='$url'>如果您的浏览器没自动跳转，请点击这里</a>";
			$_ENV['message']['goto'] = "<script>setTimeout(\"window.location.href='{$url}';\",{$litime});</script>";
		}
	} else {
		$_ENV['message']['nav'] = "<a href='{$url}'>点击这里返回</a>";
	}
	if ( file_exists(THEME_ROOT.'message.php') ) {
		template('message');
	} else {
		echo '
		<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=7" />
<title>提示信息</title>
<style type="text/css"> 
<!--
*{ padding:0; margin:0; font-size:12px}
a:link,a:visited{text-decoration:none;color:#0068a6}
a:hover,a:active{color:#ff6600;text-decoration: underline}
.showMsg{border: 1px solid #1e64c8; zoom:1; width:450px; height:172px;position:absolute;top:44%;left:50%;margin:-87px 0 0 -225px}
.showMsg h5{background-image: url(template/default/images/admin_img/msg.png);background-repeat: no-repeat; color:#fff; padding-left:35px; height:25px; line-height:26px;*line-height:28px; overflow:hidden; font-size:14px; text-align:left}
.showMsg .content{ padding:46px 12px 10px 45px; font-size:14px; height:64px; text-align:left}
.showMsg .bottom{ background:#e4ecf7; margin: 0 1px 1px 1px;line-height:26px; *line-height:30px; height:26px; text-align:center}
.showMsg .ok,.showMsg .guery{background: url(template/default/images/admin_img/msg_bg.png) no-repeat 0px -560px;}
.showMsg .guery{background-position: left -460px;}
-->
</style>
</head>
<body>
<div class="showMsg" style="text-align:center">
	<h5>提示信息</h5>
    <div class="content guery" style="display:inline-block;display:-moz-inline-stack;zoom:1;*display:inline;max-width:330px">'.$_ENV['message']['content'].'</div>
    <div class="bottom">
    	<a href="javascript:history.back();" >['.$_ENV['message']['nav'].']</a>
			        </div>
</div>
'.$_ENV['message']['goto'].'
</body>
</html>';
	}
	exit();
}

//产生随机数
function random($length,$string = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz') {
	$rstr = '';
	$strlen = strlen($string);
	for ($i=0; $i<$length; $i++) {
		$rstr .= $string{mt_rand(0,$strlen-1)};	
	}
	return $rstr;
}

//引入缓存
function get_cache($cachename) {
	global $_CACHE;
	!is_array($cachename) && $cachename = array($cachename);
	foreach ($cachename as $cache) {
		if (isset($_CACHE[$cache])) continue ;
		$cachefile = CACHE_ROOT.'cache_'.$cache.'.php';
		if (!file_exists($cachefile)) {
			require_once(TOA_ROOT.'./include/function_cache.php');
			recache($cache);
		}
		include_once($cachefile);
	}
}
//ubb解码
function ubb_decode($conver_str) {
	global $_CACHE;
	$conver_str = eregi_replace('\[upload=([0-9]+)]',$_CACHE['config']['blog']['url'].'/attachment.php?id=\\1',$conver_str);
	$conver_str = str_replace(array('[b]','[/b]'),array('<b>','</b>'),$conver_str);
	$conver_str = eregi_replace('\[img]([^\[]*)\[/img]','<img src="\\1" onload="resize_img(this)" />',$conver_str);
	$conver_str = eregi_replace('\[url=([^\[]*)]([^\[]*)\[/url]','<a href="\\1" title="\\2" target="_blank">\\2</a>',$conver_str);
	$conver_str = eregi_replace('\[file]([^\[]+)\[/file]','<a href="\\1">点击下载附件</a>',$conver_str);
	return $conver_str;
}

//输出404
function page_not_found() {
	if ( file_exists(THEME_ROOT.'404.php') ) {
		template('404');
	} else {
		header("HTTP/1.1 404 Not Found\n");
		//header("Content-Type: text/html\n");
		header("Date: ".get_date('D, d M Y H:i:s',PHP_TIME)." GMT\n");
		echo '<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN">
<html><head>
<title>404 Not Found</title>
</head><body>
<h1>Not Found</h1>
<p>The requested URL '.$_SERVER['SCRIPT_NAME'].' was not found on this server.</p>
<p>Additionally, a 404 Not Found
error was encountered while trying to use an ErrorDocument to handle the request.</p>
</body>
</html>
';
	}
	exit;
}

//分页
function showpage ($num = 0,$prepage = 10,$curpage = 1,$url = '', $rewritemode = false, $pagenum = 10) {
	$pagestr = '';
	$url .= strspn('?',$url) ? '&' : '?';
	$realpages = 1;

	if ($num > $prepage) {
		$realpages = @ceil($num/$prepage);		
		if ($realpages < $pagenum) {
			$from = 1;
			$to = $realpages;
		} else {
			$offset = 5;
			$from = $curpage - $offset;
			$to = $from + $pagenum;
			if ($from < 1) {
				$from = 1;
				$to = $from + $pagenum - 1;
			} elseif ($to > $realpages) {
				$to = $realpages;
				$from = $realpages - $pagenum + 1;
			}
		}
		$pagestr .= '共'.$num.'条';
		if ($curpage > $pagenum) $pagestr .= '<a href="'.$url.'page=1">1...</a>';
		if ($curpage > 1) $pagestr .= '<a href="'.$url.'page=1" class="page-next form-element"><<  首页</a><a href="'.$url.'page='.($curpage-1).'" class="page-next form-element"><上一页</a>';
		for ($i = $from; $i <= $to; $i++) {
			if ($i == $curpage) {
				$pagestr .= '<a href="#" class="page-next form-element" style="color:#F37800;font-weight:bold;">'.$i.'</a>';
			} else {
				$pagestr .= '<a href="'.$url.'page='.$i.'" class="page-next form-element">'.$i.'</a>';
			}
		}
		if ($curpage < $realpages) $pagestr .= '<a href="'.$url.'page='.($curpage+1).'" class="page-next form-element">下一页&gt;</a><a class="page-end form-element" href="'.$url.'page='.$realpages.'">尾页&gt;&gt;</a>';
		if ($realpages > $to) $pagestr .= '<a href="'.$url.'page='.$realpages.'" class="page-next form-element">'.$realpages.'...</a>';
		//if ($realpages > 1 && !$rewritemode) $pagestr .= '<input type="text" size="3" class="go" onkeydown="if (event.keyCode==13) {window.location=\''.$url.'page=\'+this.value;return false;}" />';
		$pagestr = '<span class="page-link">'.$pagestr.'</span>';
	}
	return $pagestr;
}

function TOA_closed() {
	$reason = get_config('TOA','close_reason');
	$logurl = get_config('TOA','url').'/login.php';
	echo '
	<html>
	<head>
		<title>TOA 提示信息</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<style type="text/css">
		body {background:#F8F8F8;margin-top:150px;font-family:\'Verdana\',\'宋体\';}
		a {color:#175796;text-decoration:none;}
		a:hover {color:red;text-decoration:none;}
		table {background:#fff;border:3px solid #f0f0f0;width:450px;}
		td,th {font-size:14px;color:#000;}
		th {background:#1A5A8D;height:50px;color:#fff;}
		td {padding:5px;}
		</style>
	</head>
	<body>
		<table cellspacing="0" align="center">
			<tr><th>TOA 提示信息</th></tr>
			<tr>
				<td align="left" height="100">'.$reason.'</td>
			</tr>
			<tr>
				<td align="center" style="border-top:1px solid #ccc;color:#666;background:#fbfbfb;padding:10px;"><a href="'.$logurl.'">如果你是管理员，请点击这里进行登录！</a></td>
			</tr>
		</table>
	</body>
	</html>';
exit;
}
function is_email($email) {
	if (preg_match('/^[0-9a-z]+[0-9a-z_\.\-]*@[0-9a-z\-]+(\.[a-z]{2,4}){1,2}$/i',$email)) {
		return true;
	}
	return false;
}

function is_username($username) {
	$badchars = array("\\",'&',' ',"'",'"','/','*',',','<','>',"\r","\t","\n",'#','$','(',')','%','@','+','?',';','^');
	foreach ($badchars as $char) {
		if (strpos($username,$char) !== false) {
			return false;
		}
	}
	return true;
}

function authcode($str, $method = 'ENCODE') {
	return ($method == 'ENCODE' ? base64_encode($str) : base64_decode($str));
}

function my_serialize($data) {
	return add_slashes(serialize(del_slashes($data)));
}
?>