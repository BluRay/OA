<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>信息操作页面</title>
<link type="text/css" media="screen" charset="utf-8" rel="stylesheet" href="template/default/content/css/style.account-1.1.css" />
<link charset="utf-8" rel="stylesheet" href="template/default/content/css/personal.record-1.0.css" media="all" />
<style type="text/css"> 
.tip-faq{
	clear:both;
	margin-top:0px;
}
#J-table-consume{
	margin-bottom:40px;
}
.ui-form-tips .m-cue{
	 background-position: -27px -506px;
	 *background-position: -27px -505px;
}
#J-set-date a{
	font-family:宋体;
}
</style>
<script type="text/javascript" charset="utf-8" src="template/default/content/js/arale.js"></script>
<script charset="utf-8" src="template/default/content/js/recordIndex.js?t=20110523"></script>
<script language="javascript" type="text/javascript" src="template/default/js/jquery.min.js"></script>
<script language="javascript" type="text/javascript" src="template/default/content/js/common.js"></script>
<script language="javascript" type="text/javascript" src="DatePicker/WdatePicker.js"></script>
<script type="text/javascript"> 
E.onDOMReady(function() {

	record = new AP.widget.Record({
		dom: {
			queryForm : "queryForm",
			searchForm : "topSearchForm",
			keyword : "J-keyword",
			keywordType : "J-keyword-type"
		}
	});

	//切换高级筛选状态
	E.on('J-filter-link', 'click', record.switchFilter);
});

</script>
</head>
<!--[if lt IE 7]><body class="ie6"><![endif]--><!--[if IE 7]><body class="ie7"><![endif]--><!--[if IE 8]><body class="ie8"><![endif]--><!--[if !IE]><!--><body><!--<![endif]-->
<div id="container" class="ui-container">
 
<div id="content" class="ui-content fn-clear" coor="default" coor-rate="0.02">
	<div class="ui-grid-21" coor="content">
		<div class="ui-grid-21 ui-grid-right record-tit" coor="title">
			<h2 class="ui-tit-page"><img src="template/default/content/images/notify_new.gif" align="absmiddle">短消息列表</h2>
			
			<div class="record-tit-amount">
				<p>
              </p>
			</div>
		</div>

 <!-- 过滤表单 -->


		<div class="ui-grid-21 ui-grid-right fn-clear" coor="total">
		   <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                          <tr>
                                            <td width="91%">
											<?php echo showpage($num,$pagesize,$page,$url)?></td>
                                            <td width="9%" align="right" style="padding-right:10px;"><input type="button" value="发送消息" class="BigButtonBHover" onClick="javascript:window.location='admin.php?ac=add&fileurl=sms'"></td>
                                          </tr>
                                        </table>
		  
										

	  </div>
	</div>
	<form name="excel" method="post" action="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>">
		<input type="hidden" name="do" value="excel" />
		<input type="hidden" name="vuidtype" value="<?php echo urldecode($userkeytype)?>" />
	</form>
	<form name="update" method="post" action="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>">
		<input type="hidden" name="do" value="update" />
		<input type="hidden" name="vuidtype" value="<?php echo urldecode($userkeytype)?>" />
		<div class="ui-grid-21 ui-grid-right fn-clear" id="J-table-consume" coor="consumelist">
			<div class="ui-tab">
												<div class="ui-tab-trigger"> 
					<ul class="fn-clear"> 
<li class="ui-tab-trigger-item ui-tab-trigger-item-current">
<a href="admin.php?ac=receive&fileurl=sms" class="ui-tab-trigger-text">消息接收列表</a></li>	
<li class="ui-tab-trigger-item">
<a href="admin.php?ac=index&fileurl=sms" class="ui-tab-trigger-text">消息发送列表</a></li>					
</ul>
				</div>
 
				<div class="ui-tab-container" id="myScene">
					<div class="ui-tab-container-item ui-tab-container-item-current">
					<div class="amount-scheme-a fn-clear">
<div class="fn-left"><?php echo get_usershow('-1','admin.php?ac='.$ac.'&fileurl='.$fileurl.'')?></div>
<div class="fn-right">
<?php echo get_exceldown('excel_3')?>
<!--<img class="v-al-middle" src="template/default/images/2EDkuGH6eX.gif" />
										<a id="J-show-amount"  unselectable="on" onselectstart="return false;" href="javascript:;" seed="CR-statistical-top">统计报表</a> --></div>
</div>
					
					
					
						<table id="tradeRecordsIndex" class="ui-table">

							<thead>
								<tr>
									<th class="checkbox">
									<input type="checkbox" class="checkbox" value="1" name="chkall" onClick="check_all(this)" /></th>
									<th  width="60">状态</th>
									<th  width="60">发送人</th>
									<th  width="140">发送时间</th>
									<th class="title">内容</th>
								</tr>
							</thead>
							
							
							
							
							<tbody>
<?foreach ($result as $row) {?>																																						
<tr <?php if($result%2==0){?>class="split" <?php }?>>
<td class="checkbox">
<?php echo get_boxlistkey("id[]",$row['id'],$row['receiveperson'],$_USER->id)?></td>
<td  width="60" align="left">
<?php
if($row['smskey']=='1'){
	echo "<font color=#006600>未读</font>";
	if(trim($row['receiveperson'])==trim($_USER->id)){
		echo '<a href="admin.php?ac=receive&fileurl=sms&do=smskey&id='.$row['id'].'&userkeytype='.urldecode($userkeytype).'" title="标志为己读"><img src="template/default/images/2EC5tZlqdV.gif"></a>';
	}
}else{
	echo "己读";
}
?>
</td>
<td  width="60"><?php echo get_realname($row['sendperson'])?></td>
<td  width="140"><?php echo $row['date']?></td>
<td class="title"><? if($row['smskey']=='1'){?><img src="template/default/images/email_open.gif" width="16" height="16"><?}else{?><img src="template/default/images/email_open_new.gif" width="16" height="16"><?}?>   
<?php
//过滤下载
$content=str_replace("uploadfile/","down.php?urls=uploadfile/",$row['content']);
$content=str_replace('target="_blank"',"",$content);
$content=str_replace('<a',"&nbsp;&nbsp;<a",$content);
$content=str_replace('admin.php?',"admin.php?ac=receive&fileurl=sms&do=smskeymana&id=".$row['id']."&urls=".str_replace('&',"-",get_subcontent($content, 'admin.php?ac=', '>')),$content);
echo $content;
?>
</td>
									
</tr>
<?}?>			
																									
</tbody>
		</table>
 
											</div>
					
					<div class="fn-clear">
						<!-- 图释 -->
					  <div class="iconTip fn-left" style="padding-left:15px;">
					<input type="checkbox" class="checkbox" value="1" name="chkall" onClick="check_all(this)" /> 全选&nbsp;
						  <a class="js-add-contact"><span></span></a>
						  <a href="javascript:document:update.submit();">删除数据</a>
</div>
<div class="page page-nobg fn-right">
							<span class="page-link"><?php echo showpage($num,$pagesize,$page,$url)?></span>
						</div>
						<!-- /分页 -->
											</div>
				</div>
			</div>
 
		
		</div>
		
 </form>		
	</div>
 
 
	
</div>


</div>

                            

</body>
</html>
 

