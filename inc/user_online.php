<?php
 /*
	[Office 515158] (C) 2009-2012 天生创想 Inc.
	$Id: user_online.php 1209087 2012-01-08 08:58:28Z baiwei.jiang $
*/
define('IN_ADMIN',True);
require_once('../include/common.php');
get_login($_USER->id);
global $db;
$query = $db->query("SELECT * FROM ".DB_TABLEPRE."user a,".DB_TABLEPRE."user_view b WHERE a.id=b.uid and a.online='1'   ORDER BY a.id ASC");
	while ($row = $db->fetch_array($query)) {
	if($row["sex"]=='男'){
		$sex='01';
	}elseif($row["sex"]=='女'){
		$sex='02';
	}else{
		$sex='02';
	}
?>
<li style="list-style-type:none;">
<div class="ele_user">
<div class="ele_user_pic"><img width="30" height="30" src="../template/default/images/sex<?php echo $sex?>.gif"></div>
<div class="ele_user_txt clearfix">
<div class="ele_user_rel">

</div>
<p><span class="hy_dl"><a href="#"><img src="../template/default/images/u_zx1.gif" style="display:inline-block;margin-bottom:-4px;" title="跟<?php echo $row['name']?>在线聊天" /></a></span><a href="javascript:;" onClick="show_userback('sms_online','<?php echo $row['name']?>','<?php echo $row['phone']?>')" class="sl zoom"  ><?php echo $row['name']?></a><span class="c999 zoom"></span></p>
<p class="mt5"><a href="javascript:;" onClick="show_userback('sms_online','<?php echo $row['name']?>','<?php echo $row['phone']?>')" class="sl zoom"  >发短消息</a><span class="dotvline">┊</span><a href="javascript:;" onClick="show_userback('phone_online','<?php echo $row['name']?>','<?php echo $row['phone']?>')" class="sl zoom"  >发手机短信</a></p>
</div>
</div>
</li>

<?php
}
?>