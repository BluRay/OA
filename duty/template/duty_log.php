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
function show_help()
{
   mytop=(screen.availHeight-430)/2;
   myleft=(screen.availWidth-800)/2;
   window.open("admin.php?ac=view&fileurl=help&helpid=<?php echo $fileurl?>","","height=470,width=800,status=0,toolbar=no,menubar=no,location=no,scrollbars=yes,top="+mytop+",left="+myleft+",resizable=yes");
}
</script>
</head>
<!--[if lt IE 7]><body class="ie6"><![endif]--><!--[if IE 7]><body class="ie7"><![endif]--><!--[if IE 8]><body class="ie8"><![endif]--><!--[if !IE]><!--><body><!--<![endif]-->
<div id="container" class="ui-container">
 
<div id="content" class="ui-content fn-clear" coor="default" coor-rate="0.02">
	<div class="ui-grid-21" coor="content">
		<div class="ui-grid-21 ui-grid-right record-tit" coor="title">
			<h2 class="ui-tit-page">任务进度信息列表</h2>
			
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
                                            <td width="9%" align="right" style="padding-right:10px;"><input type="button" value="新建进度表" class="BigButtonBHover" onClick="javascript:window.location='admin.php?ac=duty_log_add&fileurl=duty&did=<?php echo $_GET["did"]?>'"></td>
                                          </tr>
                                        </table>
		  
										

	  </div>
	</div>
	<form name="update" method="post" action="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>">
		<input type="hidden" name="do" value="update" />
		<input type="hidden" name="did" value="<?php echo $_GET["did"]?>" />
		<div class="ui-grid-21 ui-grid-right fn-clear" id="J-table-consume" coor="consumelist">
			<div class="ui-tab">
												<div class="ui-tab-trigger"> 
					<ul class="fn-clear"> 
<li class="ui-tab-trigger-item">
<a href="admin.php?ac=duty&fileurl=duty" class="ui-tab-trigger-text">任务管理</a></li>	
<li class="ui-tab-trigger-item ui-tab-trigger-item-current">
<a href="admin.php?ac=duty_log&fileurl=duty&did=<?php echo $_GET["did"]?>" class="ui-tab-trigger-text">任务进度管理</a></li>					
</ul>
				</div>
 
				<div class="ui-tab-container" id="myScene">
					<div class="ui-tab-container-item ui-tab-container-item-current">
					
					
					
					
						<table id="tradeRecordsIndex" class="ui-table">

							<thead>
								<tr>
									<th class="checkbox">
									<input type="checkbox" class="checkbox" value="1" name="chkall" onClick="check_all(this)" /></th>
									<th class="info">任务名称</th>
									<th class="title">完成内容</th>
									<th class="info">完成进度</th>
									<th class="info">附件</th>
									<th class="info">备注</th>
									<th class="info">发布时间</th>
									<th class="info">发布人</th>
								</tr>
							</thead>
							
							
							
							
							<tbody>
<?foreach ($result as $row) {?>																																						
<tr <?php if($result%2==0){?>class="split" <?php }?>>
<td class="checkbox">
<?php
global $db;
$blog = $db->fetch_one_array("SELECT uid FROM ".DB_TABLEPRE."project_duty  WHERE id = '".$row["dutyid"]."'  ");
get_boxlistkey("id[]",$row['id'],$blog['uid'],$_USER->id)
?>

</td>
<td class="info">
  <a href="admin.php?ac=duty_views&fileurl=duty&did=<?php echo $row['dutyid']?>"><?php echo get_reallists($row['dutyid'])?></a></td>
<td class="title"><?php echo $row['content']?>
</td>
<td class="info"><?php echo $row['progress']?>%</td>
<td class="info">
<? if($row['appendix']!=''){?>
<a href="down.php?urls=<?php echo $row['appendix']?>">下载附件</a>
<? }else{?>
无附件
<? }?>
</td>
<td class="info"><?php echo $row['note']?></td>
<td class="info"><?php echo $row['date']?></td>
<td class="info"><?php echo get_realname($row['uid'])?>
</td>
									
</tr>
<?}?>			
																									
</tbody>
		</table>
 
											</div>
					
					<div class="fn-clear">
						<!-- 图释 -->
					  <div class="iconTip fn-left" style="padding-left:15px;">
					<input type="checkbox" class="checkbox" value="1" name="chkall" onClick="check_all(this)" /> 全选
						  &nbsp;
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
 

