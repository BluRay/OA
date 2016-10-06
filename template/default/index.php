<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" class="off">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<title>协同网络办公系统</title>
<link href="template/default/css/reset.css" rel="stylesheet" type="text/css" />
<link href="template/default/css/zh-cn-system.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="template/default/js/jquery.min.js"></script>
<script language="javascript" type="text/javascript" src="template/default/js/styleswitch.js"></script>
<link rel="stylesheet" type="text/css" href="template/default/css/style/zh-cn-styles1.css" title="styles1" media="screen" />
<link rel="alternate stylesheet" type="text/css" href="template/default/css/style/zh-cn-styles2.css" title="styles2" media="screen" />
<link rel="alternate stylesheet" type="text/css" href="template/default/css/style/zh-cn-styles3.css" title="styles3" media="screen" />
<link rel="alternate stylesheet" type="text/css" href="template/default/css/style/zh-cn-styles4.css" title="styles4" media="screen" />
<script type="text/javascript"> 
var pc_hash =''
</script>
<style type="text/css"> 
.objbody{overflow:hidden;}
.btns{background-color:#666;}
.btns{position: absolute; top:116px; right:30px; z-index:1000; opacity:0.6;}
.btns2{background-color:rgba(0,0,0,0.5); color:#fff; padding:2px; border-radius:3px; box-shadow:0px 0px 2px #333; padding:0px 6px; border:1px solid #ddd;}
.btns:hover{opacity:1;}
.btns h6{padding:4px; border-bottom:1px solid #666; text-shadow: 0px 0px 2px #000;}
.btns .pd4{ padding-top:4px; border-top:1px solid #999;}
.pd4 li{border-radius:0px 6spx 0px 6px; margin-top:2px; margin-bottom:3px; padding:2px 0px;}
.btns .pd4 li span{padding:0px 6px;}
.pd{padding:4px;}
.ac{background-color:#333; color:#fff;}
.hvs{background-color:#555; cursor: pointer;}
.bg_btn{background: url(template/default/hoem_text/images/icon2.jpg) no-repeat; width:28px; height:28px;}
</style>
</head>
<body scroll="no" class="objbody">


<div class="header">
	<div class="logo lf"><a href="#" target="_blank"><span class="invisible">协同网络办公系统</span></a></div>
    <div class="rt-col">
    	<div class="tab_style white cut_line text-r"><a href="javascript:;" onClick="show_userback()"><img src="template/default/images/u_zx1.gif"> 聊天</a><span>|</span><a href="desk.php">桌面快捷方式</a><span>|</span><a href="javascript:;" onClick="show_config()">授权</a><span>|</span><a href="../erp/index.php/home/index" target="_blank">ERP仓储系统</a>
 <ul id="Skin">
		<li class="s1 styleswitch" rel="styles1"></li>
		<li class="s2 styleswitch" rel="styles2"></li>
		<li class="s3 styleswitch" rel="styles3"></li>
        <li class="s4 styleswitch" rel="styles4"></li>
	</ul>
        </div>
    </div>
    <div class="col-auto">
    	<div class="log white cut_line">您好！<?php echo get_realname($_USER->id)?>  [<?php echo $_USER->groupname?>]<span>|</span><a href="login.php?do=logout">[退出]</a>
    	</div>
        <ul class="nav white" id="top_menu">
		<li id="_M0" class="on top_menu"><a href="javascript:_M(0,'home.php')" hidefocus="true" style="outline:none;">个人桌面</a></li>
		<?php foreach ( $_CACHE['menu'] as $row) {?>
			<?php if($row['fatherid']=='0' && $row[menutype]!='1'){?>
				<li id="_M<?php echo $row[menuid]?>" class="top_menu"><a href="javascript:_M(<?php echo $row[menuid]?>,'<?php echo $row[menuurl]?>')" hidefocus="true" style="outline:none;"><?php echo $row[menuname]?></a></li>
			<?php }?>
		<?php }?>
		
		    <!--<li class="tab_web"><a href="javascript:;"><span>收藏</span></a></li> -->
        </ul>
    </div>
</div>

<div id="content">
	<div class="col-left left_menu">
    	<div id="Scroll"><div id="leftMain" style="padding-bottom:20px;"></div></div>
        <a href="javascript:;" id="openClose" style="outline-style: none; outline-color: invert; outline-width: medium;" hideFocus="hidefocus" class="open" title="展开与关闭左侧菜单"><span class="hidden">展开</span></a>
    </div>
	<div class="col-1 lf cat-menu" id="display_center_id" style="display:none" height="100%">
	<div class="content">
        	<iframe name="center_frame" id="center_frame" src="" frameborder="false" scrolling="auto" style="border:none" width="100%" height="auto" allowtransparency="true"></iframe>
            </div>
			
        </div>
    <div class="col-auto mr8">
    <div class="crumbs">
    <div class="shortcut cu-span">
	<a href="#" onClick="show_userback()" title="点开可查看所有在线成员">在线(<span style="color:red; font-size:14px; font-weight:bold;" id="user_count"></span>)人</a>&nbsp;&nbsp;&nbsp;&nbsp;|<a href="javascript:_MP(214,'admin.php?ac=receive&fileurl=sms&menuid=214');" hidefocus='true' style='outline:none;'><span id="sms_count"></span> 短消息(<span style="color:red; font-size:14px; font-weight:bold;" id="sms_num"></span>)</a> 
	</div>
    当前位置：<span id="current_pos"></span></div>
    	<div class="col-1">
        	<div class="content" style="position:relative; overflow:hidden; width:100%;">
                <iframe name="right" id="rightMain" frameborder="false" src="home.php" scrolling="auto" style="border:none;" width="100%" height="auto" allowtransparency="true"></iframe>
				
                <!--<div class="fav-nav">
					<div id="panellist">
					<?php echo $_CONFIG->config_url_view('copyright')?></div>
                    <div class="fav-help">
					<div id="status_text">
			<?php
			echo $_ADS->ads_list();
			?>
			</div>
					</div>
				</div> -->
        	</div>
        </div>
    </div>
</div>
<!--<ul class="tab-web-panel hidden" style="position:absolute; z-index:999; background:#fff">
	
<li style="margin:0"><a href="" target="_blank"></a></li>

</ul> -->
<div class="scroll"><a href="javascript:;" class="per" title="使用鼠标滚轴滚动侧栏" onclick="menuScroll(1);"></a><a href="javascript:;" class="next" title="使用鼠标滚轴滚动侧栏" onclick="menuScroll(2);"></a></div>

<script type="text/javascript"> 
if(!Array.prototype.map)
Array.prototype.map = function(fn,scope) {
  var result = [],ri = 0;
  for (var i = 0,n = this.length; i < n; i++){
	if(i in this){
	  result[ri++]  = fn.call(scope ,this[i],i,this);
	}
  }
return result;
};
 
var getWindowSize = function(){
return ["Height","Width"].map(function(name){
  return window["inner"+name] ||
	document.compatMode === "CSS1Compat" && document.documentElement[ "client" + name ] || document.body[ "client" + name ]
});
}
window.onload = function (){
	if(!+"\v1" && !document.querySelector) { // for IE6 IE7
	  document.body.onresize = resize;
	} else { 
	  window.onresize = resize;
	}
	function resize() {
		wSize();
		return false;
	}
}
function wSize(){
	//这是一字符串
	var str=getWindowSize();
	var strs= new Array(); //定义一数组
	strs=str.toString().split(","); //字符分割
	var heights = strs[0]-120,Body = $('body');$('#rightMain').height(heights);   
	//iframe.height = strs[0]-46;
	if(strs[1]<980){
		$('.header').css('width',980+'px');
		$('#content').css('width',980+'px');
		Body.attr('scroll','');
		Body.removeClass('objbody');
	}else{
		$('.header').css('width','auto');
		$('#content').css('width','auto');
		Body.attr('scroll','no');
		Body.addClass('objbody');
	}
	
	var openClose = $("#rightMain").height()+39;
	$('#center_frame').height(openClose+9);
	$("#openClose").height(openClose);	
	$("#Scroll").height(openClose-20);
	windowW();
}
wSize();
function windowW(){
	if($('#Scroll').height()<$("#leftMain").height()){
		$(".scroll").show();
	}else{
		$(".scroll").hide();
	}
}
windowW();
//站点下拉菜单
$(function(){
	var offset = $(".tab_web").offset();
	$(".tab_web").mouseover(function(){
			$(".tab-web-panel").css({ "left": +offset.left+4, "top": +offset.top+$('.tab_web').height()+2});
			$(".tab-web-panel").show();
		});
	$(".tab_web span").mouseout(function(){hidden_site_list_1()});
	$(".tab-web-panel").mouseover(function(){clearh();$('.tab_web a').addClass('on')}).mouseout(function(){hidden_site_list_1();$('.tab_web a').removeClass('on')});
	//默认载入左侧菜单
	//$("#leftMain").load("inc/lmenu.php");
	

})

//隐藏站点下拉。
var s = 0;
var h;
function hidden_site_list() {
	s++;
	if(s>=3) {
		$('.tab-web-panel').hide();
		clearInterval(h);
		s = 0;
	}
}
function clearh(){
	if(h)clearInterval(h);
}
function hidden_site_list_1() {
	h = setInterval("hidden_site_list()", 1);
}
 
//左侧开关
$("#openClose").click(function(){
	if($(this).data('clicknum')==1) {
		$("html").removeClass("on");
		$(".left_menu").removeClass("left_menu_on");
		$(this).removeClass("close");
		$(this).data('clicknum', 0);
		$(".scroll").show();
	} else {
		$(".left_menu").addClass("left_menu_on");
		$(this).addClass("close");
		$("html").addClass("on");
		$(this).data('clicknum', 1);
		$(".scroll").hide();
	}
	return false;
});
 
function _M(menuid,targetUrl) {
	$("#menuid").val(menuid);
	$("#bigid").val(menuid);
	$("#paneladd").html('<a class="panel-add" href="javascript:add_panel();"><em>添加</em></a>');
	
		$("#leftMain").load("inc/lmenu.php?menuid="+menuid, {limit: 25}, function(){
		   windowW();
		 });
	$("#rightMain").attr('src', targetUrl);
	$('.top_menu').removeClass("on");
	$('#_M'+menuid).addClass("on");
	$.get("inc/tmenu.php?table=menu&name=menuname&menuid="+menuid, function(data){
		$("#current_pos").html(data);
	});
	//当点击顶部菜单后，隐藏中间的框架
	$('#display_center_id').css('display','none');
	//显示左侧菜单，当点击顶部时，展开左侧
	$(".left_menu").removeClass("left_menu_on");
	$("#openClose").removeClass("close");
	$("html").removeClass("on");
	$("#openClose").data('clicknum', 0);
	$("#current_pos").data('clicknum', 1);
	if(menuid==0){
		$(".left_menu").addClass("left_menu_on");
		$(this).addClass("close");
		$("html").addClass("on");
		$(this).data('clicknum', 1);
		$(".scroll").hide();
		$('#btnx').css('display','block');
	}else{
		$('#btnx').css('display','none');
	}
}
_M(0,'home.php');
function _MP(menuid,targetUrl) {
	$("#menuid").val(menuid);
	$("#paneladd").html('<a class="panel-add" href="javascript:add_panel();"><em>添加</em></a>');
 
	$("#rightMain").attr('src', targetUrl+'&menuid='+menuid);
	$('.sub_menu').removeClass("on fb blue");
	$('#_MP'+menuid).addClass("on fb blue");
	$.get("inc/tmenu.php?table=menu&name=menuname&menuid="+menuid, function(data){
		$("#current_pos").html(data+'<span id="current_pos_attr"></span>');
	});
	$("#current_pos").data('clicknum', 1);
	//show_help(targetUrl);
}
function menuScroll(num){
	var Scroll = document.getElementById('Scroll');
	if(num==1){
		Scroll.scrollTop = Scroll.scrollTop - 60;
	}else{
		Scroll.scrollTop = Scroll.scrollTop + 60;
	}
}

function show_config()
{
   mytop=(screen.availHeight-430)/2;
   myleft=(screen.availWidth-600)/2;
   window.open("inc/config.php","","height=450,width=600,status=0,toolbar=no,menubar=no,location=no,scrollbars=yes,top="+mytop+",left="+myleft+",resizable=yes");
}
function show_feedback()
{
   mytop=(screen.availHeight-430)/2;
   myleft=(screen.availWidth-600)/2;
   window.open("inc/Message.php","","height=450,width=600,status=0,toolbar=no,menubar=no,location=no,scrollbars=yes,top="+mytop+",left="+myleft+",resizable=yes");
}
function show_userback()
{
   mytop=(screen.availHeight-370)/2;
   myleft=(screen.availWidth-312)/1;
   window.open("inc/online.php","","height=490,width=300,status=0,toolbar=no,menubar=no,location=no,scrollbars=yes,top="+mytop+",left="+myleft+",resizable=yes");
}
online_mon();
//-- 在线人员 --
function online_mon()
{
   jQuery.ajax({
      type: 'GET',
      url: 'inc/user_count.php?date='+new Date(),
      success: function(data){
	  //$('user_count').innerHTML = data;
	  $("#user_count").html(data);
      }
   });
   window.setTimeout(online_mon,120*5*1000);
}
//消息提示,设定标题提示
var newSmsSoundHtml = "<object id='sms_sound' classid='clsid:D27CDB6E-AE6D-11cf-96B8-444553540000' codebase='template/default/swf/swflash.cab' width='0' height='0'><param name='movie' value='template/default/swf/9.swf'><param name=quality value=high><embed id='sms_sound' src='template/default/swf/9.swf' width='0' height='0' quality='autohigh' wmode='opaque' type='application/x-shockwave-flash' plugspace='http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash'></embed></object>";

sms_count();
function sms_count(type)
{
   jQuery.ajax({
      type: 'GET',
      url: 'inc/sms_count.php?date='+new Date(),
      success: function(data){
	  	if(data=='1'){
	  		//jQuery('#shortcut').click();
	  		$('#sms_count').html('<img src="template/default/images/xin.gif">');
	  		$('#sms_sound').html(newSmsSoundHtml);
			//$("#sms_num").html(data);
			//alert(data);
	  	}else{
	 		 $('#sms_count').html('  ');
	  	}
      }
   });

   window.setTimeout(sms_count,10*5*1000);
}
sms_num();
function sms_num(type)
{
   jQuery.ajax({
      type: 'GET',
      url: 'inc/sms_count_num.php?date='+new Date(),
      success: function(data){
	  	$("#sms_num").html(data);
      }
   });

   window.setTimeout(sms_num,10*5*1000);
}
//-- 免费版本广告 --
function StatusTextScroll()
{
   var obj = jQuery('#status_text');
   var scrollTo = obj.scrollTop() + obj.height();
   if(scrollTo >= obj.attr('scrollHeight'))
      scrollTo = 0;
   obj.animate({scrollTop: scrollTo}, 300);
}
window.setInterval(StatusTextScroll,2000);
</script>
<?php echo '<div style="display:none;">
<script type="text/javascript">
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src=" + _bdhmProtocol + "hm.baidu.com/h.js%3F569322d6eae0bb12f168b4701cc26f09 type=text/javascript %3E%3C/script%3E"));
</script></div>';?>
<div id="sms_sound"></div>
</body>
</html>
