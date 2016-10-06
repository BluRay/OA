 <?php
	  /*
		[Office 515158] (C) 2009-2012 天生创想 Inc.
		$Id: tmenu.php 1209087 2012-01-08 08:58:28Z baiwei.jiang $
	*/
	define('IN_ADMIN',True);
	require_once('../include/common.php');
	get_login($_USER->id);
	function crm_topmenu_2($fid=0)
	{
		global $_CACHE;
		get_cache('menu');
		foreach ( $_CACHE['menu'] as $rowuser) {
			if($rowuser['menuid']==$fid){
				return $rowuser['menuname'];
			}
		}
	}
	global $_CACHE;
	get_cache('menu');
	foreach ( $_CACHE['menu'] as $blog) {
		if($blog["menuid"]==$_GET["menuid"]){
			if($blog["fatherid"]!='0'){
				foreach ( $_CACHE['menu'] as $blog1) {
					if($blog1["menuid"]==$blog["fatherid"]){
						if($blog1["fatherid"]!='0'){
							$html2=" > ".crm_topmenu_2($blog1["fatherid"]);
							$html1=" > ".$blog1["menuname"];
						}else{
							$html1=" > ".$blog1["menuname"];
						}
					}
				}
				$html=" > ".$blog["menuname"];
			}else{
				$html=" > ".$blog["menuname"];
			}
		}
	}
	echo '首页'.$html2.$html1.$html;
	
?>