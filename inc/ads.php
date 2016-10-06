 <?php
 /*
	[Office 515158] (C) 2009-2012 天生创想 Inc.
	$Id: ads.php 1209087 2012-01-08 08:58:28Z baiwei.jiang $
*/
define('IN_ADMIN',True);
require_once('../include/common.php');
global $db;
$config = $db->fetch_one_array("SELECT * FROM ".DB_TABLEPRE."config  WHERE id ='1'  ");
if(getGP('number','G')==$config['com_number']){
	//$_ADS=new ads();
	$code=new ugcode();
	if(getGP('delete','G')!=''){
		$_ADS->ads_connection(2,0,0,getGP('cid','G'),0,0);
	}else{
		//$ad_add->ads_connection(2,0,0,0,0,0);
		$_ADS->ads_connection(1,$code->ugcode_vod(2,getGP('title','G')),getGP('adsurl','G'),getGP('cid','G'),0,getGP('color','G'));
	}
	
}
?> 
