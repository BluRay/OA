<?php
error_reporting(7);
set_magic_quotes_runtime(0);
define('IN_TOA',true);
define('TOA_ROOT',str_replace('\\','/',substr(dirname(__FILE__),0,-7)));
header('Content-Type: text/html; charset=utf-8');

if ( get_magic_quotes_gpc() ) {
	strip_slashes($_GET);
	strip_slashes($_POST);
}

if ( !ini_get('register_globals') ) {
	@extract($_POST, EXTR_SKIP);
	@extract($_GET, EXTR_SKIP);
}

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

function strip_slashes(&$array) {
	return is_array($array) ? array_map("strip_slashes", $array) : stripslashes($array);
}

function result($result = 1, $output = 1) {
	if($result) {
		$text = ' ... <span style="color:blue">OK</span><br />';
		if(!$output) {
			return $text;
		}
		echo $text;
	} else {
		$text = ' ... <span style="color:red">Failed</span><br />';
		if(!$output) {
			return $text;
		}
		echo $text;
	}
}

function writeable($var) {
	$result = false;
	if ( !is_dir($var) ) {
		@mkdir($var, 0777);
	}
	if ( is_dir($var) ) {
		$var .= 'temp.txt';
		if ( ($fp=@fopen($var, 'wb')) && (@fwrite($fp, 'TOA')) ) {
			@fclose($fp);
			@unlink($var);
			$result = true;
		}
	}
	return $result;
}


function runquery($sql) {
	global $db;
	$sql = str_replace("\r", "\n", str_replace(' toa_', ' '.DB_TABLEPRE, $sql));
	$ret = array();
	$num = 0;
	foreach(explode(";\n", trim($sql)) as $query) {
		$queries = explode("\n", trim($query));
		foreach($queries as $query) {
			$ret[$num] .= $query[0] == '#' ? '' : $query;
		}
		$num++;
	}
	unset($sql);

	foreach($ret as $query) {
		$query = trim($query);
		if($query) {
			if(substr($query, 0, 12) == 'CREATE TABLE') {
				$name = preg_replace("/CREATE TABLE ([a-z0-9_]+) .*/is", "\\1", $query);
				echo '创建表 '.$name.' ... <span style="color:blue">成功</span><br />';
				$db->query(createtable($query));
				$tablenum++;
			} else {
				$db->query($query);
			}
		}
	}
}

function createtable($sql) {
	$type = strtoupper(preg_replace("/^\s*CREATE TABLE\s+.+\s+\(.+?\).*(ENGINE|TYPE)\s*=\s*([a-z]+?).*$/isU", "\\2", $sql));
	$type = in_array($type, array('MYISAM', 'HEAP')) ? $type : 'MYISAM';
	return preg_replace("/^\s*(CREATE TABLE\s+.+\s+\(.+?\)).*$/isU", "\\1", $sql).
		(mysql_get_server_info() > '4.1' ? " ENGINE=$type DEFAULT CHARSET=".str_replace('-','',TOA_CHARSET) : " TYPE=$type");
}

$error = false;
$message = '';
$lockfile = TOA_ROOT.'./cache/install.lock';
$sqlfile = TOA_ROOT.'./install/toa.sql';
$sqlconfile = TOA_ROOT.'./install/config.sql';
$confile = TOA_ROOT.'./config.php';
$_SERVERS['vurl']="m.515158.com";
$php_self = $_SERVER['PHP_SELF'] ? $_SERVER['PHP_SELF'] : $_SERVER['SCRIPT_NAME']; 

require(TOA_ROOT.'./include/function_version.php');
require(TOA_ROOT.'./include/class_mysql.php');

$step = isset($step) ? intval($step) : 1;

if ( file_exists($lockfile) ) {
	$error = true;
	$message = '<p>天生创想OA似乎已经安装过了，请删除 install 文件夹下的所有文件。<br /><br />如果你想重新安装本程序，请先删除 cache 文件夹下的 install.lock 文件，再运行安装程序。</p>';
}
if ( !ini_get('short_open_tag') ) {
	$error = true;
	$message = '<p>对不起，请将 php.ini 中的 short_open_tag 设置为 On，否则程序无法正常运行。</p><p style="color:red">请解决上述问题后再继续安装。</p>';
}
?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta http-equiv="Content-Language" content="zh-CN" />
	<title>天生创想OA办公系统-安装程序</title>
	<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<div id="wrap">
	<form name="form" method="post" action="install.php">
	<table class="main">
		<caption>天生创想OA办公系统 安装程序</caption>

	<?php if ( $error ) : ?>
		<tr><td>
		<?php echo $message;?>
		</td></tr>
		</table>
		</div>
		</body></html>
	<?php
		exit; endif;
	?>
	<?php if ( $step == 1 ) :?>

		<tr><th>第一步：安装许可协议<hr noshade="noshade" ></th></tr>
		<tr>
			<td align="center">
			<textarea class="textarea" readonly="readonly" cols="50">
版权所有 (C) 2009-2013，515158.com 保留所有权利。

天生创想OA办公系统(简称TOA)是由北京天生创想信息技术有限公司(OA研发组)独立开发的基于PHP+MySQL的OA系统。天生创想OA办公系统为开放式管理系统，免费供大家使用，学习，交流， 任何人都可以从互联网上免费下载，并可以在不违反本协议规定和非商业用途的前提下进行使用。
开发商：北京天生创想信息技术有限公司
官方网址： www.515158.com  
开发团队：OA研发组

为了使你正确并合法的使用本软件，请你在使用前务必阅读清楚下面的协议条款：

一、本授权协议适用且仅适用于TOA任何版本，TOA官方拥有对本授权协议的最终解释权和修改权。

二、协议许可的权利和限制
1、您可以在完全遵守本最终用户授权协议的基础上，将本软件应用于非商业用途，而不必支付软件版权授权费用，但我们也不承诺对个人用户提供任何形式的技术支持。
2、您可以在协议规定的约束和限制范围内修改TOA源代码或界面风格以适应您的系统要求。
3、您拥有使用本软件构建的OFFICE全部内容所有权，并独立承担与这些内容的相关法律义务。
4、未经商业授权，不得将本软件用于商业用途(企业应用或以盈利性为目的的经营性销售)，否则我们将保留追究的权力。

三、免责声明
1、本软件及所附带的文件是作为不提供任何明确的或隐含的赔偿或担保的形式提供的。
2、用户出于自愿而使用本软件，您必须了解使用本软件的风险，任何情况下，程序的质量风险和性能风险完全由您承担。有可能证实该程序存在漏洞，您需要估算与承担所有必需服务，恢复，修正，甚至崩溃所产生的代价！在尚未购买产品技术服务之前，我们不承诺对免费用户提供任何形式的技术支持、使用担保，也不承担任何因使用本软件而产生问题的相关责任。
3、请务必仔细阅读本授权协议，在您同意授权协议的全部条件后，即可继续TOA的安装。即：您一旦开始安装TOA，即被视为完全同意本授权协议的全部内容，如果出现纠纷，我们将根据相关法律和协议条款追究责任。
			</textarea></td>
		</tr>
		<tr>
			<td>
			<input type="radio" name="agree" value="no" id="no" checked="checked" onClick="this.form.submit.disabled='disabled'" /> <label for="no">不同意</label>
			<input type="radio" name="agree" value="yes" id="yes" onClick="this.form.submit.disabled=''" /> <label for="yes">我同意</label>
			</td>
		</tr>
		<tr>
			<td align="right">
			<hr noshade="noshade" >
				<input type="hidden" name="step" value="2" />
				<input type="submit" name="submit" value="下一步 &gt;&gt;" class="button" disabled="disabled" />
				
			</td>
		</tr>
	<?php elseif ( $step == 2 ) :?>
		<tr><th>第二步：检查目录权限<hr noshade="noshade" ></th></tr>
		<tr>
			<td>
			<p style="color:red">录和文件是否可写，如果发生错误，请更改文件/目录属性为 777</p>
			<b>服务器配置</b><br />
			<?php
			echo '操作系统：'.PHP_OS.result(1,0);
			echo 'PHP版本：'.PHP_VERSION;
			if ( PHP_VERSION > 4 ) {
				result(1,1);
			} else {
				result(0,1);
			}
			echo 'MySQL数据库：';
			if ( function_exists("mysql_connect") ) {
				echo '支持'.result(1,0);
			} else {
				echo '不支持'.result(0,0);
			}
			?>

			</td>
		</tr>
		<tr>
			<td>
			<b>目录和文件属性</b><br />
			<?php
			$confilewriteable = './config.php';
			if (is_writable($confile)) {
				$confilewriteable .= result(1,0);
			} else {
				$confilewriteable .= result(0,0);
			}
			echo $confilewriteable;
			$uploaddir = TOA_ROOT.'./data/';
			$cachedir = TOA_ROOT.'./cache/';
			if ( writeable($cachedir) ) {
				echo './cache/'.result(1,0);
			} else {
				echo './cache/'.result(0,0);
			}
			if ( writeable($uploaddir) ) {
				echo './data/'.result(1,0);
			} else {
				echo './data/'.result(0,0);
			}

			?>
			</td>
		</tr>
		<tr>
			<td align="right">
			<hr noshade="noshade" >
				<input type="hidden" name="step" value="3" />
				<input type="button" class="button" onClick="history.back();" value="&lt;&lt; 上一步" style="float:left" />
				<input type="submit" value="下一步 &gt;&gt;" class="button" />
				
			</td>
		</tr>
	
	<?php elseif ( $step == 3 ) :?>
		<tr><th colspan="2">第三步：填写服务器配置信息<hr noshade="noshade" ></th></tr>
		<tr>
			<td align="right">MySQL服务器地址：</td>
			<td><input type="text" name="dbhost" value="localhost" class="input" /> 一般为localhost</td>
		</tr>
		<tr>
			<td align="right">数据库用户名：</td>
			<td><input type="text" name="dbuser" value="" class="input" /></td>
		</tr>
		<tr>
			<td align="right">数据库密码：</td>
			<td><input type="text" name="dbpwd" value="" class="input" /></td>
		</tr>
		<tr>
			<td align="right">数据库名称：</td>
			<td><input type="text" name="dbname" value="" class="input" /></td>
		</tr>
		<tr>
			<td align="right">数据表前缀：</td>
			<td><input type="text" name="dbprefix" value="toa_" class="input" /></td>
		</tr>
		<tr>
			<td colspan="2" align="right">
			<hr noshade="noshade" >
				<input type="hidden" name="step" value="4" />
				<input type="button" class="button" onClick="history.back();" value="&lt;&lt; 上一步" style="float:left" />
				<input type="submit" value="下一步 &gt;&gt;" class="button" />
				
			</td>
		</tr>
	<?php elseif ( $step == 4 ) :?>
		<tr><th colspan="2">第四步：填写企业信息   <span style="font-size:14px; color:#999;">(正确的填写,可获取论坛更及时的后期服务!)</span><hr noshade="noshade" ></th></tr>
		<?php 
		if ( empty($dbhost) || empty($dbuser) || empty($dbname) ) {

			$error = true;
			$message .= '<p>请填写完整配置信息！</p>';

		} else {
			
			if ( !$link = @mysql_connect($dbhost, $dbuser, $dbpwd) ) {
				$error = true;
				$message .= '<p>数据库连接失败，请检查配置信息是否正确！</p>';
			} else {
				if ( !@mysql_select_db($dbname, $link) ) {
					if ( !@mysql_query("CREATE DATABASE `$dbname`", $link) ) {
						$error = true;
						$message .= '<p>数据库 <b>'.$dbname.'</b> 不存在，系统也无法创建，无法继续安装TOA。</p>';
					} else {
						$message .= '<p>成功创建数据库 <b>'.$dbname.'</b>';
					}
				} else {
					$message .= '<p>成功连接到数据库 <b>'.$dbname.'</b>';
				}
				//写入文件
				$fp = fopen($confile, 'rb');
				$content = fread($fp, filesize($confile));
				fclose($fp);
				$content = preg_replace("/define\('DB_HOST','(.*?)'\);/is", "define('DB_HOST','$dbhost');", $content);
				$content = preg_replace("/define\('DB_USER','(.*?)'\);/is", "define('DB_USER','$dbuser');", $content);
				$content = preg_replace("/define\('DB_PWD','(.*?)'\);/is", "define('DB_PWD','$dbpwd');", $content);
				$content = preg_replace("/define\('DB_NAME','(.*?)'\);/is", "define('DB_NAME','$dbname');", $content);
				$content = preg_replace("/define\('DB_TABLEPRE','(.*?)'\);/is", "define('DB_TABLEPRE','$dbprefix');", $content);
				file_put_contents($confile, $content);
			}
		}		
		?>
			<!--<tr><td colspan="2"><?php echo $message?></td></tr> -->
		<?php if ($error) :?>
			<tr><td align="center"><input type="button" class="button" onClick="history.back();" value="返回上一步" /></td></tr>
		<?php else :
		$blogurl = 'http://'.$_SERVER['SERVER_NAME'].substr(dirname($php_self),0,-8);
		?>

			<tr>
				<td align="right">公司名称：</td>
				<td><input type="text" style="width:300px;" name="name" class="input" value="" /></td>
			</tr>
			<tr>
				<td align="right">姓名：</td>
				<td><input type="text" style="width:100px;" name="person" class="input" value="" /></td>
			</tr>
			<tr>
				<td align="right">手机：</td>
				<td><input type="text" style="width:150px;" name="phone" class="input" value="" /></td>
			</tr>
			<tr>
				<td align="right">电话：</td>
				<td><input type="text" name="tel" style="width:220px;" class="input" value="" /></td>
			</tr>
			<tr>
				<td align="right">邮箱：</td>
				<td><input type="text" name="mail" style="width:220px;" class="input" value="" /></td>
			</tr>
			<tr>
				<td align="right">OA访问地址：</td>
				<td><input type="text" name="blogurl" style="width:300px;" class="input" value="<?php echo $blogurl?>" /></td>
			</tr>
			<tr><th colspan="2">第五步：设置管理员帐号<hr noshade="noshade" ></th></tr>
			<tr>
				<td align="right">管理员帐号：</td>
				<td><input type="text" name="username" class="input" value="t515158" /></td>
			</tr>	
			<tr>
				<td align="right">管理员密码：</td>
				<td><input type="text" name="password" class="input" value="12345678" /></td>
			</tr>
			<tr>
				<td align="right">密码确认：</td>
				<td><input type="text" name="password2" class="input" value="12345678" /></td>
			</tr>
			<tr>
				<td colspan="2" align="right">
				<hr noshade="noshade" >
					<input type="hidden" name="step" value="5" />
					<input type="button" class="button" onClick="history.back();" value="&lt;&lt; 上一步" style="float:left" />
					<input type="submit" value="下一步 &gt;&gt;" class="button"  onclick="sendForm();"/>
					
				</td>
			</tr>
		<?php endif;?>

	<?php elseif ( $step == 5 ) :?>
		<tr><th colspan="2">第六步：检查数据合法性<hr noshade="noshade" ></th></tr>
		<?php
			if ( empty($name) || empty($person) || empty($phone) || empty($mail) || empty($username) || empty($blogurl) || empty($password) || empty($password2) ) {
				$error = true;
				$message .= '<p>请将信息填写完整。</p>';
			} elseif ( strlen($username) < 3 || strlen($username) > 30 ) {
				$error = true;
				$message .= '<p>管理员帐号长度必须为3-20个字节。</p>';
			} elseif ( strlen($password) < 6 ) {
				$error = true;
				$message .= '<p>密码长度不能少于6个字节。</p>';
			} elseif ( $password != $password2 ) {
				$error = true;
				$message .= '<p>两次输入的密码不一致。</p>';
			} else {
				$chars = array("\\",'&',' ',"'",'"','/','*',',','<','>',"\r","\t","\n",'#','$','(',')','%','@','+','?',';','^');
				foreach($chars as $value){
					if (strpos($username,$value) !== false){
						$error = true;
						$message .= "<p>用户名包含敏感字符。</p>";
						break;
					}
				}
			}

		?>
		<?php if ( $error ) :?>
			<tr><td><?php echo $message?></td></tr>
			<tr><td align="center"><input type="button" class="button" onClick="history.back();" value="返回上一步" /></td></tr>
		<?php else :?>
			<tr>
				<td>
	
				<p>公司名称：<b><?php echo $name?></b></p>
				<p>姓名：<b><?php echo $person?></b></p>
				<p>手机：<b><?php echo $phone?></b></p>
				<p>电话：<b><?php echo $tel?></b></p>
				<p>邮箱：<b><?php echo $mail?></b></p>
				<p>管理员帐号：<b><?php echo $username?></b></p>
				<p>OA访问地址：<b><?php echo $blogurl?></b></p>
				<p>管理员密码：<b><?php echo $password?></b></p>
				<p>确认无误后点击下一步开始导入数据。
				</td>
			</tr>
			<tr>
				<td colspan="2" align="right">
				<hr noshade="noshade" >
					<input type="hidden" name="name" value="<?php echo $name?>" />
					<input type="hidden" name="person" value="<?php echo $person?>" />
					<input type="hidden" name="phone" value="<?php echo $phone?>" />
					<input type="hidden" name="tel" value="<?php echo $tel?>" />
					<input type="hidden" name="mail" value="<?php echo $mail?>" />
					<input type="hidden" name="username" value="<?php echo $username?>" />
					<input type="hidden" name="blogurl" value="<?php echo $blogurl?>" />
					<input type="hidden" name="password" value="<?php echo $password?>" />
					<input type="hidden" name="step" value="6" />
					<input type="button" class="button" onClick="history.back();" value="&lt;&lt; 上一步" style="float:left" />
					<input type="submit" value="下一步 &gt;&gt;" class="button" />
					
				</td>
			</tr>
		<?php endif;?>

	<?php elseif ( $step == 6 ) :?>
		<tr><th colspan="2">第七步：导入数据，完成安装<hr noshade="noshade" ></th></tr>
		<tr><td>
		<div style="float:left; width:590px; height:200px;overflow:hidden;overflow-y:scroll;">
		<?php
			require($confile);
			$db = new Mysql();
			$db->connect(DB_HOST, DB_USER, DB_PWD, DB_NAME, DB_PCONNECT);
			$fp = fopen($sqlfile, 'rb');
			$sql = fread($fp, filesize($sqlfile));
			fclose($fp);
			runquery($sql);
			//导入系统配置信息
			$fp = fopen($sqlconfile, 'rb');
			$sql = fread($fp, filesize($sqlconfile));
			fclose($fp);
			runquery($sql);
			echo '导入系统配置信息 ... <span style="color:blue">成功</span><br />';
			//添加管理员
			$db->query("INSERT INTO ".DB_TABLEPRE."user (username, password, groupid, date, ischeck,flag) VALUES ('".addslashes(trim($username))."', '".trim(md5($password))."', 1, '".date('y-m-d H:i:s',time())."', 1,1)");
			$id=$db->insert_id();
			$db->query("INSERT INTO `toa_user_view` (`name`, `uid`) VALUES ('管理员','".$id."')");
			$db->query("update ".DB_TABLEPRE."config set value='".$name."' where name='name'");
			$db->query("update ".DB_TABLEPRE."config set value='".$blogurl."' where name='web'");
			$db->query("update ".DB_TABLEPRE."config set value='V2.0.20131008' where name='com_editionnum'");
			$userin=$name."(*)".$person."(*)".$phone."(*)".$tel."(*)".$mail."(*)".$blogurl."(*)A5";
			include_once('../include/class_Utility.php');
			$httpurl='http://'.$_SERVERS['vurl'].'/API/downadd.php?u='.$userin;
			$re_user = Utility::HttpRequest($httpurl);
			echo '创建表管理员帐号 ... <span style="color:blue">成功</span><br />';
			@fopen($lockfile,'wb');

		?></div>
		<hr noshade="noshade" >
		</td></tr>
		<tr>
			<td align="center">
				<p>恭喜，天生创想OA办公系统安装成功！</p>
				<p>管理员帐号：<?php echo $username?> 管理员密码：<?php echo $password?></p>
				<p><a href="../login.php">点击这里进入OA办公系统</a></p>
			</td>
		</tr>
	<?php endif;?>
	</table>
	</form>
</div>
<p id="copyright">Copyright &copy; 2009-2013  <a href="http://www.515158.com" target="_blank">北京天生创想信息技术有限公司</a> All Rights Reserved.</p>
</body>
</html>