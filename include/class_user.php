<?php
!defined('IN_TOA') && exit('Access Denied!');

class User {
	
	var $db;
	var $id = 0;
	var $groupid = 3;
	var $name = '';
	var $ip;
	var $referer;
	var $groupname;
	var $purview;
	var $unionid;
	
	function __construct() {
		$this->user();
	}
	
	function User() {
		$this->db = $GLOBALS['db'];
		$this->ip = get_onlineip();
		$this->referer = empty($_SERVER['HTTP_REFERER']) ? '' : $_SERVER['HTTP_REFERER'];
		$this->check_user();
		if ( !@include(CACHE_ROOT.'cache_usergroup_'.$this->groupid.'.php') ) {
			include_once(TOA_ROOT.'include/func_cache.php');
			recache('usergroup');
			//exit('成功缓存用户组信息，请刷新页面！');
		} else {
			$this->groupname = $groupname;
			$this->purview = $purview;
		}
	}
	
	//用户登录
	//返回：1  登录成功, -1 用户不存在, -2 密码错误, -3 未通过审核	
	function login($username, $password, $remember = 0) {
		if ( empty($username) || empty($password) ) return 0;
		$sql = "SELECT * FROM ".DB_TABLEPRE."user WHERE username = '$username'";
		if ( $user = $this->db->fetch_one_array($sql) ) {
			if ( $user['password'] == md5($password) ) {
				if ( !$user['ischeck'] ) return -3;
				if($user[loginip]!=''){
					$sqlip = "SELECT * FROM ".DB_TABLEPRE."user WHERE id=".$user[id]." and loginip like'%".get_onlineip()."%'";
						if ( $userip = $this->db->fetch_one_array($sqlip) ) {
								$userkey = random(10);
								$auth = authcode("$user[id]\t".md5($user['password'].$userkey.$_SERVER['HTTP_USER_AGENT']));
								$expire = $remember ? 86400 * 365 : 0;
								set_cookie('auth', $auth, $expire);
								//setcookie('invitationid','99999');
								//写入登录日记
								 $insertarr = array(
									'uid' => $user[id],
									'name' => $user[username],
									'logindate' => get_date('Y-m-d H:i:s',PHP_TIME),
									'enddate' => get_date('Y-m-d H:i:s',PHP_TIME),
									'ip' => get_onlineip()
								);
								$this->db->insert('loginlog', $insertarr);
								return 1;
							}else{
							return -5;
							}
					}else{
								$userkey = random(10);
								$auth = authcode("$user[id]\t".md5($user['password'].$userkey.$_SERVER['HTTP_USER_AGENT']));
								$expire = $remember ? 86400 * 365 : 0;
								set_cookie('auth', $auth, $expire);
								//写入登录日记
								 $insertarr = array(
									'uid' => $user[id],
									'name' => $user[username],
									'logindate' => get_date('Y-m-d H:i:s',PHP_TIME),
									'enddate' => get_date('Y-m-d H:i:s',PHP_TIME),
									'ip' => get_onlineip()
								);
								$this->db->insert('loginlog', $insertarr);
								return 1;
					
					}
				
				
			}
			return -2;
		}
		return -1;
	}
	
	//检查用户状态
	function check_user() {
		if ( !$auth = get_cookie('auth') ) return false;
		list($uid, $password ) = explode("\t", authcode($auth, 'DECODE'));
		if (is_numeric($uid)){
			$sql = "SELECT * FROM ".DB_TABLEPRE."session WHERE uid = '$uid' AND password = '".addslashes($password)."'";
			if ( $result = $this->db->fetch_one_array($sql) ) {
				$this->id = $result['uid'];
				$this->name = addslashes($result['username']);
				$this->groupid = $result['groupid'];
			}else {
				$sql = "SELECT id AS uid,username,password,groupid,userkey FROM ".DB_TABLEPRE."user WHERE ischeck = 1 AND id = '$uid'";
				if ( $result = $this->db->fetch_one_array($sql) ) {
					$this->id = $result['uid'];
					$this->name = addslashes($result['username']);
					$this->groupid = $result['groupid'];
					$result['password'] = $password;
					unset($result['userkey']);
					$this->add_session($result);
				}
			}
		}
		if (!$this->id ) {
			$this->logout();
		}
		
	}
	
	//更新
	function update($userid, $updatearr) {
		return $this->db->update('user', $updatearr, array('id' => $userid));
	}
	
	function get_pv($key) {
		return $this->purview[$key];
	}

	//退出登录
	function logout() {
		global $db;
		$sql="SELECT * FROM ".DB_TABLEPRE."loginlog where uid='".$this->id."' ORDER BY id desc limit 0,1";
		$query = $db->query($sql);
		while ($rowuser = $db->fetch_array($query)) {
			$html .= $rowuser[id];
		}
		$updatedate = array(
			'enddate' => get_date('Y-m-d H:i:s',PHP_TIME)
		);
		$this->db->update('loginlog',$updatedate, array('id' => $html));
		$updateuser = array(
			'enddate' => get_date('Y-m-d H:i:s',PHP_TIME)
		);
		$this->db->update('online',$updateuser, array('uid' => $this->id));
		$this->id = 0;
		set_cookie('auth');
	}
	
	//插入session
	function add_session($data) {
		$data['ip'] = ip2long(get_onlineip());
		$this->db->insert('session', $data, true);
	}
	
}
?>