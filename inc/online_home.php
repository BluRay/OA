 <?php
 /*
	[Office 515158] (C) 2009-2012 天生创想 Inc.
	$Id: online.php 1209087 2012-01-08 08:58:28Z baiwei.jiang $
*/
define('IN_ADMIN',True);
require_once('../include/common.php');
get_login($_USER->id);
?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<script language="javascript" type="text/javascript" src="../template/default/js/jquery.min.js"></script>
<script type="text/javascript">
online_count()
function online_count()
{
   jQuery.ajax({
      type: 'GET',
      url: 'user_online.php?date='+new Date(),
      success: function(data){
	  //alert(data)
	  //$('user_online').innerHTML = data;
	  $('#user_online').html(data);
      }
   });

   window.setTimeout(online_count,50*5*1000);
}
/////////////////////////////////////////////////////
function show_userback(type,user,phone)
{
   mytop=(screen.availHeight-370)/2;
   myleft=(screen.availWidth-682)/1;
   window.open("../admin.php?ac="+type+"&fileurl=sms&user="+user+"&phone="+phone,"","height=300,width=300,status=0,toolbar=no,menubar=no,location=no,scrollbars=yes,top="+mytop+",left="+myleft+",resizable=yes");
}
//function show_userback()
//{
 //  mytop=(screen.availHeight-370)/2;
 //  myleft=(screen.availWidth-682)/1;
 //  window.open("../admin.php?ac=sms_online&fileurl=sms","","height=300,width=300,status=0,toolbar=no,menubar=no,location=no,scrollbars=yes,top="+mytop+",left="+myleft+",resizable=yes");
//}
</script>

<title>OA在线用户</title>
<style type="text/css">
*{padding:0;margin:0}
body{background:#fff;font-family:'lucida grande',tahoma,helvetica,arial,'bitstream vera sans',sans-serif;font-size:12px;text-align:center;-webkit-text-size-adjust:none}
input,textarea{font-size:12px;padding:3px}
table,td{border:0;padding:0;border-collapse:collapse;font-size:12px}
select{font-size:12px}
div{line-height:19px;text-align:left;word-break:break-all;word-wrap:break-word}
img{border:0}
a{color:#000}
a:hover{color:#36c}
.l{float:left}
.r{float:right;clear:right}
.c{clear:both}
.r_float{float:right}
.tal{text-align:left}
.tar{text-align:right}
.tac{text-align:center}
.tar_right{text-align:right;padding:50px 0 10px}
.c0,a.c0{color:#000;font-family:Arial}
.c6,a.c6{color:#666;font-family:Arial}
.c9,a.c9{color:#999;font-family:Arial}
.cc,a.cc{color:#ccc;font-family:Arial}
.cd,a.cd{color:#ddd;font-family:Arial}
.ce,a.ce{color:#eee;font-family:Arial}
a.ce:hover{color:#fff;font-family:Arial}
.co,a.co{color:#f90;font-family:Arial}
.cr,a.cr{color:#f00;font-family:Arial}
.cf,a.cf{color:#fff;text-decoration:none;font-family:Arial}
a.cf:hover{color:#fff;text-decoration:underline;font-family:Arial}
.sl,a.sl{color:#369;font-family:Arial}
a.sl:hover{color:#36c;font-family:Arial}
.cl,a.cl{color:#3c0;font-family:Arial}
a.cl:hover{color:#36c;font-family:Arial}
.bqc_bg{height:29px;overflow:hidden;background:url(../template/default/images/bqc_bg.gif) top repeat-x;margin-bottom:10px;font-size:14px}
.bqc_on,.bqc_of,.bqc_of_mo,.bqc_of1,.bqc_of1_mo{float:left;width:115px;height:23px;padding-top:6px;overflow:hidden;text-align:center;background:url(../template/default/images/bqc_on.gif) no-repeat}
.bqc_of,.bqc_of_mo{background:url(../template/default/images/bqc_of.gif) no-repeat;cursor:pointer}
.bqc_of1,.bqc_of1_mo{background:url(../template/default/images/bqc_of1.gif) no-repeat;cursor:pointer}
.bqc_of_mo,.bqc_of1_mo{color:#36c;text-decoration:underline}
.bqe_bg{height:29px;overflow:hidden;background:url(../template/default/images/bqc_bg.gif) top repeat-x;margin-bottom:10px;font-size:14px}
.frd_list li{padding:6px 0 5px 5px;border-bottom:1px #dedede dashed;margin-bottom:-1px;}
.frd_list li.last{border-bottom:none}
.frd_list .ele_user{margin-right:10px}
.frd_list{margin-bottom:15px;overflow-y:hidden}
.ele_user:after{content:".";height:0;visibility:hidden;display:block;clear:both}
.ele_user{padding-left:65px;zoom:1;_padding-left:62px}
.ele_user_pic{background:url("../template/default/images/l50_bg_s.gif") no-repeat scroll 0 0 transparent;min-height:43px;_height:43px;padding-top:5px;text-align:center;width:48px}
.ele_user_pic a{text-decoration:none;vertical-align:middle}
.ele_user_pic a:hover{text-decoration:underline}
.ele_user_pic p{margin-top:5px;_margin-top:8px}
.ele_user .ele_user_pic{margin-left:-68px;float:left;_display:inline}
.ele_user .hy_dl{margin-right:6px}
.ele_user_rel{color:#999;float:right;position:relative;z-index:10}
.ele_user_rel a{color:#999}.ele_user_txt .hy_dl img{margin-top:-3px\0}
.join_group{width:8px;height:8px;background-position:-25px 0;position:absolute;top:5px;margin-left:2px}
.dotvline{margin:0 3px;margin:0 7px\9;color:#ddd}
.frd_list .ele_user_txt p.mt5{width:300px}
.popbox{position:relative;padding:0 0 33px;zoom:1}
.hy_dl{color:#999;line-height:15px}
</style>
</head>
<body>

<div style="padding-left: 5px; height:29px;" id="bar1">

<ul class="frd_list">
<div id="user_online"></div>
</ul>
</div>
</body>
</html>

