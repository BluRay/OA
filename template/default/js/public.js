
var MENU_ITEM_HEIGHT = 30;
var MIN_PNAEL_HEIGHT = 8 * MENU_ITEM_HEIGHT;
var MAX_PNAEL_HEIGHT = 20 * MENU_ITEM_HEIGHT;
var SCROLL_HEIGHT = 4 * MENU_ITEM_HEIGHT;
var bigMenuIcons = [];

//var timer_sms_mon = null;
//var timer_online_tree_ref = null;
//切换变量
var max_portals = 7;
var imgPosition = 0;
var curPosition = 3;
var portalIsRunning = 'udefined';
var portalImgs = null;
var movec = null;
var hide = null;

jQuery.noConflict();

(function($){
   $.fn.addTab = function(id, title, url, closable, selected){
      $('.over-mask-layer').hide();   //如果有切换、常用任务等面板打开，则隐藏之
      $('#overlay_panel').hide();

      if(!id) return;
      closable = (typeof(closable) == 'undefined') ? true : closable;
      selected = (typeof(selected) == 'undefined') ? true : selected;
      $('#tabs_container').tabs('add', {
         id: id,
         title: title,
         closable: closable,
         selected: selected,
         content: '<iframe id="tabs_' + id + '_iframe" name="tabs_' + id + '_iframe" src="' + url + '" onload="IframeLoaded(\'' + id + '\');" border="0" frameborder="0" framespacing="0" marginheight="0" marginwidth="0" style="width:100%;height:100%;"></iframe>'
      });
   };
   $.fn.selectTab = function(id){
      $('#tabs_container').tabs('select', id);
   };
   $.fn.closeTab = function(id){
      $('#tabs_container').tabs('close', id);
   };
   $.fn.getSelected = function(){
      return $('#tabs_container').tabs('selected');
   };

   //切换函数开始
   function roll(direction){
      var length  = portalImgs.length;
      var start   = imgPosition;
      var offset = Math.floor((max_portals - portalImgs.length)/2);

      if('r' == direction){
         for(var i=0; i<length; i++){
            start = start + 1;
            if(start > (length-1))
               start = start - length;
            portalImgs[i].src = portalArray[start+offset].src;
         }

         imgPosition = imgPosition + 1;
         if(imgPosition > (length-1)) {
            imgPosition = imgPosition - length;
         }
      }
      if('l' == direction){
         var a = true;
         for( var i = 0; i < length; i++){
            if(a){
               start = start - 1;
               if(start < 0){
                  start = start + length;
                  a = false;
               }
               if(start < (length-1)){
                  a = false;
               }
            } else {
               start = start + 1;
               if(start > (length-1)){
                  start = start - length;
                  a = true;
               }
            }

            portalImgs[i].src =  portalArray[start+offset].src;
            if(start == (length-1)){
               start = -1;
            }
         }
         imgPosition = imgPosition - 1;
         if(imgPosition < 0)
            imgPosition = imgPosition + length;
      }
   }

   function right(){
      i++;
      var offset = Math.floor((max_portals - portalImgs.length)/2);

      var posArray = [];
      for(var j=0; j < portalImgs.length; j++){
         var left = $(portalImgs[j]).offset().left - $(portalImgs[j].parentNode).offset().left;
         var top  = $(portalImgs[j]).offset().top  - $(portalImgs[j].parentNode).offset().top;
         posArray[j] = [$(portalImgs[j]).width(), $(portalImgs[j]).height(), left, top];
      }

      var diffArray = [[],[-2,-2,-8,1],[-2,-4,-9,1.5],[-2,-5,-10,1.5],[2,4,-11,-1.5],[2,4,-11,-1.5],[2,2,-10,-1]];
      for(var j=1; j < portalImgs.length; j++){
         $(portalImgs[j]).css({width:(posArray[j][0] + diffArray[j+offset][0]), height:(posArray[j][1] + diffArray[j+offset][1]), left:(posArray[j][2] + diffArray[j+offset][2]), top:(posArray[j][3] + diffArray[j+offset][3])});
      }

      if(i>9){
          clearInterval(hide);
          hide = null;
          resetPortalCss();
          roll('r');
          portalIsRunning = 'false';
      }
   }

   function left(){
      i++;
      var offset = Math.floor((max_portals - portalImgs.length)/2);

      var posArray = [];
      for(var j=0; j < portalImgs.length; j++){
         var left = $(portalImgs[j]).offset().left - $(portalImgs[j].parentNode).offset().left;
         var top  = $(portalImgs[j]).offset().top  - $(portalImgs[j].parentNode).offset().top;
         posArray[j] = [$(portalImgs[j]).width(), $(portalImgs[j]).height(), left, top];
      }

      var diffArray = [[9,4,2,-1.5],[2,4,9,-1.5],[2,5,10,-1.5],[-2,-5,11,1.5],[-2,-4,11,1.5],[-2,-2,10,1],[]];
      for(var j=0; j < portalImgs.length-1; j++){
         $(portalImgs[j]).css({width:(posArray[j][0] + diffArray[j+offset][0]), height:(posArray[j][1] + diffArray[j+offset][1]), left:(posArray[j][2] + diffArray[j+offset][2]), top:(posArray[j][3] + diffArray[j+offset][3])});
      }

      if(i>9){
          clearInterval(hide);
          hide = null;
          resetPortalCss();
          roll('l');
          portalIsRunning = 'false';
      }
   }

   function move(direction){
      if(portalIsRunning != 'udefined' && portalIsRunning == 'true'){
         return;
      }

      var frequency = $.browser.msie ? 30 :20;
      var offset = Math.floor((max_portals - portalImgs.length)/2);

      i = 0;
      var lastIndex = portalImgs.length-1;
      var cssIndex = $(portalImgs[lastIndex]).attr('index')

      if(direction == 'r'){
         curPosition = curPosition + 2;
         $(portalImgs[lastIndex]).css({left:portalImgCss[cssIndex].left, top:portalImgCss[cssIndex].top});
         hide = window.setInterval(right, frequency);
         portalIsRunning = 'true';
      }

      if(direction == 'l'){
         curPosition = curPosition - 1;
         $(portalImgs[lastIndex]).css({left:("-"+portalImgCss[cssIndex].left), top:portalImgCss[cssIndex].top});
         /*
         var pos = imgPosition - 1;
         if(pos < 0)
            pos = pos + portalImgs.length;
         portalImgs[lastIndex].src =  portalArray[pos].src;*/
         hide = window.setInterval(left, frequency);
         portalIsRunning = 'true';
      }

      if(curPosition > (portalImgs.length - 1))
         curPosition = 0;
      if(curPosition < 0)
         curPosition = portalImgs.length - 1;
   }

   function moveC(direction){
      if(portalIsRunning != 'true'){
         move(direction);
         clearInterval(movec);
      }
   }

   function openPortal(){
      if(hide){
         window.setTimeout(openPortal, 300);
      }
      else{
         $(portalImgs[Math.floor(portalImgs.length/2)]).triggerHandler('click');
      }
   }

   var portalImgCss = [];

   function resetPortalCss(){
      for(var j=0; j < portalImgs.length; j++){
         $(portalImgs[j]).css(portalImgCss[$(portalImgs[j]).attr('index')]);
      }
   }
   //切换函数结束



   function getSecondMenuHTML(id){
      var html = '';
      for(var i=0; i < second_array[id].length; i++)
      {
         var func_id = 'f' + second_array[id][i];
         var func_name = func_array[func_id][0];
         var func_code = func_array[func_id][1];
         var open_window = func_array[func_id][3] ? func_array[func_id][3] : '';
         var bExpand = func_code.substr(0,1) == "@" && third_array[func_id];
         var onclick = bExpand ? "" : "createTab(" + func_id.substr(1) + ",'" + func_name.replace("'", "\'") + "','" + func_code.replace("'", "\'") + "','" + open_window + "');";

         html += '<li><a id="' + func_id + '" href="javascript:;" onclick="' + onclick + '"' + (bExpand ? ' class="expand"' : '') + ' hidefocus="hidefocus"><span>' + func_name + '</span></a>';
         if(bExpand)
         {
            html += '<ul>';
            for(var j=0; j < third_array[func_id].length; j++)
            {
               var func_id1 = 'f' + third_array[func_id][j];
               var func_name1 = func_array[func_id1][0];
               var func_code1 = func_array[func_id1][1];
               var open_window1 = func_array[func_id1][3] ? func_array[func_id1][3] : '';
               var onclick1 = "createTab(" + func_id1.substr(1) + ",'" + func_name1.replace("'", "\'") + "','" + func_code1.replace("'", "\'") + "','" + open_window1 + "');";
               html += '<li><a id="' + func_id1 + '" href="javascript:;" onclick="' + onclick1 + '" hidefocus="hidefocus"><span>' + func_name1 + '</span></a></li>';
            }
            html += '</ul>';
         }
         html += '</li>';
      }

      return '<ul id="second_menu">' + html + '</ul>';
   };

   function resizeLayout()
   {
      // 主操作区域高度
      var wWidth = (window.innerWidth || (window.document.documentElement.clientWidth || window.document.body.clientWidth));
      var wHeight = (window.innerHeight || (window.document.documentElement.clientHeight || window.document.body.clientHeight));
      var nHeight = $('#north').is(':visible') ? $('#north').outerHeight() : 0;
      var fHeight = $('#funcbar').is(':visible') ? $('#funcbar').outerHeight() : 0;
      $('#center').height(wHeight - nHeight - fHeight - $('#south').outerHeight() - $('#taskbar').outerHeight());

      //一级标签宽度
      var width = wWidth - $('#taskbar_left').outerWidth() - $('#taskbar_right').outerWidth();
      $('#tabs_container').width(width - $('#tabs_left_scroll').outerWidth() - $('#tabs_right_scroll').outerWidth());
      $('#taskbar_center').width(width-1);   //-1是为了兼容iPad

      $('#tabs_container').triggerHandler('_resize');
   };

   //菜单滚动箭头事件,id为first_menu
   function initMenuScroll(id)
   {
      //菜单向上滚动箭头事件
      $('#' + id + ' > .scroll-up:first').hover(
         function(){
            $(this).addClass('scroll-up-hover');
            if(id == 'first_panel')
            {
               $("#first_menu > li > a.active").removeClass('active');   //恢复一级active的菜单为正常
            }
         },
         function(){
            $(this).removeClass('scroll-up-hover');
         }
      );

      //点击向上箭头
      $('#' + id + ' > .scroll-up:first').click(
         function(){
            var ul = $('#' + id + ' > ul:first');
            ul.animate({'scrollTop':(ul.scrollTop()-SCROLL_HEIGHT)}, 600);
         }
      );

      //向下滚动箭头事件
      $('#' + id + ' > .scroll-down:first').hover(
         function(){
            $(this).addClass('scroll-down-hover');
            if(id == 'first_panel')
            {
              $("#first_menu > li > a.active").removeClass('active');   //恢复一级级active的菜单为正常
            }
         },
         function(){
            $(this).removeClass('scroll-down-hover');
         }
      );

      //点击向下箭头
      $('#' + id + ' > .scroll-down:first').click(
         function(){
            var ul = $('#' + id + ' > ul:first');
            ul.animate({'scrollTop':(ul.scrollTop()+SCROLL_HEIGHT)}, 600);
         }
      );
   };

   function initStartMenu()
   {
      //点击页面，隐藏各级菜单面板，并清除二级和三级菜单的active状态
      $('#overlay_startmenu').click(function(){
         if($('#start_menu_panel:visible').length)
         {
            $('#overlay_startmenu').hide();
            $('#start_menu_panel').slideUp(300);
            $('#start_menu').removeClass('active');
         }
      });

      //鼠标点击导航图标按钮弹出菜单面板
      $('#start_menu').bind('click', function(){
         if($('#start_menu_panel:visible').length)
         {
            $('#overlay_startmenu').hide();
            $('#start_menu_panel').slideUp(300);
            $(this).removeClass('active');
         }
         //设置导航图标为active状态
         $(this).addClass('active');

         //遮罩层位置和显示
         $('#overlay_startmenu').show();

         //菜单面板位置
         var top = $('#start_menu').offset().top + $('#start_menu').outerHeight() - 6;
         $('#start_menu_panel').css({top: top});
         $('#start_menu_panel').slideDown('fast');

         ////计算并设置菜单面板的高度,是否显示滚动箭头
         var scrollHeight = $("#first_menu").attr('scrollHeight');
         if($("#first_menu").height() < scrollHeight)
         {
            var height = ($('#south').offset().top - $('#start_menu').offset().top)*0.7;   //可用高度为开始菜单和状态栏高差的70%
            height = height - height % MENU_ITEM_HEIGHT;   //可用高度为 MENU_ITEM_HEIGHT 的整数倍
            //如果可用高度大于允许的最高高度，则限制
            height = height <= MAX_PNAEL_HEIGHT ? height : MAX_PNAEL_HEIGHT;
            //如果可用高度超过scrollHeight，则设置高度为scrollHeight
            height = height > scrollHeight ? scrollHeight : height;
            $('#first_menu').height(height);
         }
         else
         {
            var height = scrollHeight > MIN_PNAEL_HEIGHT ? scrollHeight : MIN_PNAEL_HEIGHT;
            $('#first_menu').height(height);
         }

         if($("#first_menu").height() >= $("#first_menu").attr('scrollHeight'))
         {
            $('#first_panel > .scroll-up:first').hide();
            $('#first_panel > .scroll-down:first').hide();
         }

         //计算并设置二级菜单面板的位置
         var top = $('#first_menu').offset().top - $("#start_menu_panel").offset().top;
         $('#second_panel').css('top', top - 5);
         $('#second_panel > .second-panel-menu').css('height', $('#first_menu').height());

         //第一次打开时设置二级菜单滚动事件
         if($('#second_panel > .second-panel-menu > .jscroll-c').length <= 0)
            $('#second_panel > .second-panel-menu').jscroll();
      });
      
      //生成一级菜单
      var html = "";
      for(var i=0; i<first_array.length; i++)
      {
         var menu_id = first_array[i];
         if(typeof(func_array['m'+menu_id]) != "object")
            continue;
         
         var image = !func_array['m'+menu_id][1] ? 'icon_default' : func_array['m'+menu_id][1];
         html += '<li><a id="m' + menu_id + '" href="javascript:;" hidefocus="hidefocus"><img src="themes01/default/images/' + image + '.png" align="absMiddle" /> ' + func_array['m'+menu_id][0] + '</a></li>';
      }
      $("#first_menu").html(html);
      $("#first_menu").mousewheel(function(){
         $('#first_menu').stop().animate({'scrollTop':($('#first_menu').scrollTop() - this.D)}, 300);
      });

      //一级菜单滚动箭头事件
      initMenuScroll('first_panel');

      //一级菜单hover和click事件
      $("#first_menu > li > a").click(function(){
         //如果当前一级菜单为active，则返回
         if(this.className.indexOf('active') >= 0)
            return;

         $("#second_menu > li > a.expand").removeClass('active');   //恢复二级expand菜单为正常
         $("#first_menu > li > a.active").removeClass('active');   //恢复一级级active的菜单为正常

         //获取当前一级菜单下属二级菜单的HTML代码，并更新二级菜单面板
         $('#second_panel > .second-panel-menu').html(getSecondMenuHTML(this.id));
         $("#" + this.id).addClass('active');   //将当前一级菜单设为active

         //二级级菜单滚动事件
         $('#second_panel > .second-panel-menu').jscroll();

         //二级菜单点击展开三级菜单
         $('#second_menu > li > a.expand').click(function(){
            $(this).toggleClass('active');
            $(this).parent().children('ul').toggle();
            $('#second_panel > .second-panel-menu').jscroll();
         });
      });

      if(menuExpand !="" && typeof(second_array['m'+menuExpand]) == "object")
      {
         //展开定义的二级菜单
         $('#m'+menuExpand).addClass('active');
         $('#second_panel > .second-panel-menu').html(getSecondMenuHTML('m'+menuExpand));
         
         //二级菜单点击展开三级菜单
         $('#second_menu > li > a.expand').click(function(){
            $(this).toggleClass('active');
            $(this).parent().children('ul').toggle();
            $('#second_panel > .second-panel-menu').jscroll();
         });
      }
      else
      {
         //登录时把常用任务菜单项作为二级菜单的内容
         var html = "";
         for(var i=0; i<shortcutArray.length; i++)
         {
            if(typeof(func_array['f'+shortcutArray[i]]) != "object")
               continue;
         
            var func_id = 'f'+shortcutArray[i];
            var func_name = func_array[func_id][0];
            var func_code = func_array[func_id][1];
            var open_window = func_array[func_id][3] ? func_array[func_id][3] : "";
         
            if(func_code.substr(0, 1) == "@")
               continue;
         
            var onclick = "createTab(" + func_id.substr(1) + ",'" + func_name.replace("'", "\'") + "','" + func_code.replace("'", "\'") + "','" + open_window + "');";
            html += '<li><a id="' + func_id + '" href="javascript:;" onclick="' + onclick + '" hidefocus="hidefocus"><span>' + func_name + '</span></a></li>';
         }
         html = '<ul id="second_menu">' + html + '</ul>';
         $('#second_panel > .second-panel-menu').html(html);
      }
      
      $('#second_panel, #second_menu').bind('selectstart', function(){
         return false;
      });
      
   }
  function checkActive(id){
      if($('#'+id+'_panel:hidden').length > 0)
         $('#'+id).removeClass('active');
      else
         window.setTimeout(checkActive, 300, id);
   };
 function initShortcut()
   {
      //消息盒子
      $('#shortcut').bind('click', function(){
		 sms_count();
	     $('#sms_count').innerHTML = '   ';
         if($('#'+this.id+'_panel:visible').length)
         {
            $('#'+this.id+'_panel').animate({top:-$('#'+this.id+'_panel').outerHeight()}, 600, function(){$(this).hide()});
            $('#overlay_panel').hide();
            return;
         }
		 $('#shortcut_block').html('<iframe name="tabs_sms_iframe" src="admin.php?ac=sms_receive&fileurl=sms" border="0" frameborder="0" framespacing="0" marginheight="0" marginwidth="0" style="width:100%;height:100%;"></iframe>');
		 

            
         
         //面板位置
         $('.over-mask-layer').hide();
         $('#overlay_panel').show();
         //$('#overlay_panel').height($('#center').height());
         $('#'+this.id+'_panel').css('left', ($(document).width()-$('#'+this.id+'_panel').width())/2);
         $('#'+this.id+'_panel').css({top: -$('#'+this.id+'_panel').outerHeight()});

         var top = $('#'+this.id+'_panel').outerHeight() > $('#center').outerHeight() ? -10 : 20;
         $('#'+this.id+'_panel').show().animate({top:top}, 600);

         //常用任务图标设为active状态
         $(this).addClass('active');
         window.setTimeout(checkActive, 300, this.id);
      });
 
		 
   }
   
   
   function initTabs()
   {
      //设置标签栏属性
      $('#tabs_container').tabs({
         tabsLeftScroll:'tabs_left_scroll',
         tabsRightScroll:'tabs_right_scroll',
         panelsContainer:'center',
         secondTabsContainer: 'funcbar_left'
      });
   }


   //窗口resize事件
   $(window).resize(function(){resizeLayout();});
   //$(window).bind('beforeunload', function(){exit();});

   $(document).ready(function($){
      $('#loading').remove();

      //调整窗口大小
      resizeLayout();
	  
	  //常用任务
      initShortcut();

      //开始菜单
      initStartMenu();

      //标签栏
      initTabs();
	  
	  

      //加载
      for(var i=0; i < portalLoadArray.length; i++)
      {
         $().addTab('portal_'+portalLoadArray[i], portalArray[portalLoadArray[i]].title, portalArray[portalLoadArray[i]].url, portalArray[portalLoadArray[i]].closable, (i==0));
      }

 

   });
})(jQuery);

//修复setTimeout bug，使用window.setTimeout调用
if(!+'\v1') {
    (function(f){
        window.setTimeout =f(window.setTimeout);
        window.setInterval =f(window.setInterval);
    })(function(f){
        return function(c,t){
            var a=[].slice.call(arguments,2);
            return f(function(){
                c.apply(this,a)},t)
            }
    });
}

var $ = function(id) {return document.getElementById(id);};

function HTML2Text(html)
{
   var div = document.createElement('div');
   div.innerHTML = html;
   return div.innerText;
}

function Text2Object(data)
{
   try{
      var func = new Function("return " + data);
      return func();
   }
   catch(ex){
      return '<b>' + ex.description + '</b><br /><br />' + HTML2Text(data) + '';
   }
}

function createTab(id, name, code, open_window)
{
   jQuery('#overlay_startmenu').triggerHandler('click');
   jQuery('#funcbar_left > div.second-tabs-container').hide();
   if(code.indexOf('http://') == 0 || code.indexOf('https://') == 0 || code.indexOf('ftp://') == 0)
   {
      openURL(id, name, code, open_window);
      return;
   }
   else if(code.indexOf('file://') == 0)
   {
      winexe(name, code.substr(7));
      return;
   }

   var url = code;
      // url = 'admin.php?' + code

   //新窗口打开或非OA模块
   if(open_window == "1" || url.indexOf('admin.php?') != 0)
   {
      openURL(id, name, url, open_window);
      return;
   }

   var url2 = 'http://www.515158.com' + url;
   var parse = url2.match(/^(([a-z]+):\/\/)?([^\/\?#]+)\/*([^\?#]*)\??([^#]*)#?(\w*)$/i); //*/
   var path = parse[4];
   var query = parse[5];

   //菜单地址直接定义为具体文件或路径传递参数的模块
   var pos = path.lastIndexOf('/');
   if(pos > 0 && path.substr(pos+1).indexOf('.') > 0 || query != "")
   {
      openURL(id, name, url, open_window);
      return;
   }

   jQuery.ajax({
      type: 'GET',
      url: '  ',
      data: {'FUNC_CODE':escape(url)},
      dataType: 'text',
      success: function(data){
         var array = Text2Object(data);
         if(typeof(array) != "object" || typeof(array.length) != "number" || array.length <= 0)
         {
            openURL(id, name, url, open_window);
            return;
         }

         var index = 0;
         var html = '';
         for(var i=0; i< array.length; i++)
         {
            index = (array[i].active == "1") ? i : index;//默认打开第一个标签页地址
            var className = (array[i].active == "1") ? ' class="active"' : '';
            var href = (url.substr(url.length-1) != "/" && array[i].href.substr(0,1) != "/") ? (url + '/' + array[i].href) : (url + array[i].href);
            html += '<a title="' + array[i].title + '" href="javascript:gotoURL(\'' + id + '\',\'' + href + '\');"' + className + ' hidefocus="hidefocus"><span>' + array[i].text + '</span></a>';
         }

         html = '<div id="second_tabs_' + id + '" class="second-tabs-container">' + html +'</div>';
         jQuery(html).appendTo('#funcbar_left');

         var secondTabs = jQuery('#second_tabs_' + id);
         jQuery('a', secondTabs).click(function(){
            jQuery('a.active', secondTabs).removeClass('active');
            jQuery(this).addClass('active');
         });

         if(jQuery('a.active', secondTabs).length <= 0)
            jQuery('a:first', secondTabs).addClass('active');
         jQuery('a:last', secondTabs).addClass('last');

         jQuery().addTab(id, name, url+"/"+array[index].href, true);
      },
      error: function (request, textStatus, errorThrown){
         openURL(id, name, url, open_window);
      }
   });
   jQuery(document).trigger('click');
}

function closeTab(id)
{
   id = (typeof(id) != 'string') ? jQuery().getSelected() : id;
   jQuery().closeTab(id);
}

function IframeLoaded(id)
{
   var iframe = window.frames['tabs_' + id + '_iframe'];
   if(iframe && $('tabs_link_' + id) && $('tabs_link_' + id).innerText == '')
   {
      $('tabs_link_' + id).innerText = !iframe.document.title ? "无标题" : iframe.document.title;
   }
}

function openURL(id, name, url, open_window, width, height, left, top)
{
   id = !id ? ('w' + (nextTabId++)) : id;
   if(open_window != "1")
   {
      window.setTimeout(function(){jQuery().addTab(id, name, url, true)}, 1);
   }
   else
   {
      width = typeof(width) == "undefined" ? 780 : width;
      height = typeof(height) == "undefined" ? 550 : height;
      left = typeof(left) == "undefined" ? (screen.availWidth-width)/2 : left;
      top = typeof(top) == "undefined" ? (screen.availHeight-height)/2-30 : top;
      window.open(url, id, "height="+height+",width="+width+",status=0,toolbar=no,menubar=yes,location=no,scrollbars=yes,top="+top+",left="+left+",resizable=yes");
   }
   jQuery(document).trigger('click');
}

function gotoURL(id, url)
{
   $('tabs_'+id+"_iframe").src = url;
}

function BlinkTabs(id)
{
}

function getEvent() //同时兼容ie和ff的写法
{
    if(document.all)  return window.event;
    func=getEvent.caller;
    while(func!=null){
        var arg0=func.arguments[0];
        if(arg0)
        {
          if((arg0.constructor==Event || arg0.constructor ==MouseEvent) || (typeof(arg0)=="object" && arg0.preventDefault && arg0.stopPropagation))
          {
          return arg0;
          }
        }
        func=func.caller;
    }
    return null;
}
