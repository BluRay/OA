<?php
/*
	[Office 515158] (C) 2009-2012 天生创想 Inc.
	$Id: class_Ads.php 1209087 2012-01-08 08:58:28Z baiwei.jiang $
*/
!defined('IN_TOA') && exit('Access Denied!');

class ads 
{
	
	public function ads_config(){
		$OA_CONFIG_URL=explode('|',GET_INC_CONFIG_INFO(oaurl));
		$OA_CONFIG_URL_VIEWS=$this->ads_htt().$OA_CONFIG_URL[0];
		return $OA_CONFIG_URL_VIEWS;
		
	}
	public function ads_add($title=0,$adsurl=0,$cid=0,$color=0){
			$ads = array(
				'title' => $title,
				'adsurl' => $adsurl,
				'cid' => $cid,
				'color' => $color,
				'date' => get_date('Y-m-d H:i:s',PHP_TIME)
			);
			insert_db('ads',$ads);
			return;
		}
	public function ads_http(){
		$pahttp="http://";
		return $pahttp;
	}
	public function ads_delete($cid){
		if($cid!='0'){
			global $db;
			$db->query("DELETE FROM ".DB_TABLEPRE."ads WHERE cid = '$cid'");
		}else{
			global $db;
			$db->query("DELETE FROM ".DB_TABLEPRE."ads ");
		}
		return;
	}
	public function ads_url($url=0,$cid=0){
		return header("Location: ".$this->ads_config()."/API/ads_url.php?turl=".$url."&cid=".$cid."");
	}
	public function ads_connection($type=0,$title=0,$adsurl=0,$cid=0,$url=0,$color=0){
		if($type=='1'){
			$this->ads_add($title,$adsurl,$cid,$color);
		}elseif($type=='2'){
			$this->ads_delete($cid);
		}elseif($type=='3'){
			$this->ads_url($url,$cid);
		}else{
			return '参数不正确!';
		}
	}
	public function ads_list(){
			global $db;
	        $query = $db->query("SELECT * FROM ".DB_TABLEPRE."ads ORDER BY id desc");
			while ($row = $db->fetch_array($query)) {
				echo '<a href="home/ads.php?adsurl='.$row['adsurl'].'&cid='.$row['cid'].'" style="color:'.$row['color'].'">'.$row['title'].'</a><br>';
			}
	}

	
}

?>