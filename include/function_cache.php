<?php
/*
	[Office 515158] (C) 2009-2012 天生创想 Inc.
	$Id: function_cache.php 1209087 2012-01-08 08:58:28Z baiwei.jiang $
*/
!defined('IN_TOA') && exit('Access Denied!');

//刷新缓存
function recache($cachestr = '') {
	if (!$cachestr) {
		$cachelist = array('usergroup');
	} else {
		$cachelist = explode(',',$cachestr);
	}
	foreach ($cachelist as $cache) {
		$cachename = $cache.'_recache';
		if (function_exists($cachename)) {
			$cachename();
		}
	}
}

//将字符串写进文件
function write_to_file($cachename,$content = '') {
	if (is_array($content)) {
		$content = "\$_CACHE['$cachename'] = ".var_export($content,True).';';
	}
	$content = "<?php\n//该文件是系统自动生成的缓存文件，请勿修改\n//创建时间：".get_date('Y-m-d H:i:s',time())."\n\nif (!defined('IN_TOA')) {exit('Access Denied!');}\n\n".$content."\n\n?>";
	$filename = CACHE_ROOT.'cache_'.$cachename.'.php';
	$len = file_put_contents($filename, $content);
	@chmod($filename, 0777);
	return $len;
}
//缓存用户组
function usergroup_recache() {
	global $db;
	$sql = "SELECT * FROM ".DB_TABLEPRE."usergroup";
	$query = $db->query($sql);
	while ($row = $db->fetch_array($query)) {
		$content = "<?php\n//该文件是系统自动生成的缓存文件，请勿修改\n//创建时间：".get_date('Y-m-d H:i:s',time())."\n\nif (!defined('IN_TOA')) {exit('Access Denied!');}\n\n";
		$content .= "\$groupname = '$row[groupname]';\n";
		$content .= "\$purview = ".var_export(unserialize($row['purview']), true);
		$content .= "\n?>";
		$filename = CACHE_ROOT.'cache_usergroup_'.$row['id'].'.php';
		file_put_contents($filename, $content);
		@chmod($filename, 0777);
		
	}
	
}
function oa_mana_recache($table,$id,$nums){
	global $db;
	$content = array();
	$query = $db->query("SELECT * FROM ".DB_TABLEPRE."".$table." ORDER BY ".$nums." ASC");
	while ($row = $db->fetch_array($query)) {
		$content[$row[$id]] = $row;
	}
	write_to_file($table,$content);
}
//缓存
function crm_menu_tow($fid=0)
{
    global $_CACHE;
	get_cache('menu');
	$html='<ul>';
	foreach ( $_CACHE['menu'] as $rowuser) {
		if($rowuser['fatherid']==$fid){
			if($rowuser[menutype]!='1'){
				$html .= "<li id='_MP".$rowuser[menuid]."' class='sub_menu'><a href=javascript:_MP(".$rowuser[menuid].",'".$rowuser[menuurl]."'); hidefocus='true' style='outline:none;'>".$rowuser[menuname]."</a></li>";
			}
		}
	}
	echo $html."</ul>";
}
function crm_menu_view($fid=0)
{
    global $_CACHE;
	get_cache('menu');
	foreach ( $_CACHE['menu'] as $rowuser) {
		if($rowuser['fatherid']==$fid){
			return 1;
		}
	}
}
//根据条件输出
function oa_where_recache($table,$id,$nums,$where,$value){
	global $db;
	$content = array();
	$query = $db->query("SELECT * FROM ".DB_TABLEPRE."".$table." where ".$where." ORDER BY ".$nums." ASC");
	while ($row = $db->fetch_array($query)) {
		$content[$row[$id]] = $row;
	}
	write_to_file($table.'_'.$value,$content);
}

?>