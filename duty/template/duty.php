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
			<h2 class="ui-tit-page">任务信息列表</h2>
			
			<div class="record-tit-amount">
				<p>总共有<span class="number"><?php echo public_number('project_duty')?></span>条数据
              </p>
			</div>
		</div>

 <!-- 过滤表单 -->
<form method="get" action="admin.php" name="save" class="ui-grid-21 ui-grid-right ui-form">
		<input type="hidden" name="ac" value="<?php echo $ac?>" />
		<input type="hidden" name="do" value="list" />
		<input type="hidden" name="fileurl" value="<?php echo $fileurl?>" />
		<input type="hidden" name="vuidtype" value="<?php echo $vuidtype?>" />
		<div class="ui-grid-21 ui-grid-right record-search">
			<div id="J-advanced-filter-option" class="">
				<div class="record-search-time fn-clear">
					<div class="ui-form-item ui-form-item-time">
					
					<label class="ui-form-label" for="keyword">编号：</label>
							<div id="J-keyword-type-select" class="ui-form-select-shell">
								<input type="text" value="<?php echo urldecode($number)?>" name="number" class="ui-input search-keyword" id="J-keyword">
							</div>
					
					<label class="ui-form-label" for="keyword">名称：</label>
							<div id="J-keyword-type-select" class="ui-form-select-shell">
								<input type="text" value="<?php echo urldecode($title)?>" name="title" class="ui-input search-keyword" id="J-keyword">
							</div>
						<label class="ui-form-label" for="J-start">起止日期：</label>
						<div class="ui-form-content">
							<input type="text" value="<?php echo $vstartdate?>"  class="ui-input i-date" readonly="readonly"  onClick="WdatePicker();" name='vstartdate' > - <input type="text" value="<?php echo $venddate?>"  class="ui-input i-date" readonly="readonly"  onClick="WdatePicker();" name='venddate' >
						</div>
						<div class="submit-time-container ">
							<div class="submit-time ui-button ui-button-sorange">
								<input type="submit" class="ui-button-text"id="J-submit-time" value="查 找"/>
							</div>
						</div>
						
					</div>
					
									</div>
				
			
			</div>
		</div><!-- .record-search -->
		</form>

		<div class="ui-grid-21 ui-grid-right fn-clear" coor="total">
		   <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                          <tr>
                                            <td width="91%">
											<?php echo showpage($num,$pagesize,$page,$url)?></td>
                                            <td width="9%" align="right" style="padding-right:10px;"><input type="button" value="分配新任务" class="BigButtonBHover" onClick="javascript:window.location='admin.php?ac=duty_add&fileurl=duty'"></td>
                                          </tr>
                                        </table>
		  
										

	  </div>
	</div>
	<form name="excel" method="post" action="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>">
		<input type="hidden" name="do" value="excel" />
		<input type="hidden" name="ischeck" value="<?php echo $ischeck?>" />
		<input type="hidden" name="number" value="<?php echo urldecode($number)?>" />
		<input type="hidden" name="title" value="<?php echo urldecode($title)?>" />
		<input type="hidden" name="vstartdate" value="<?php echo urldecode($vstartdate)?>" />
		<input type="hidden" name="venddate" value="<?php echo urldecode($venddate)?>" />
		<input type="hidden" name="vuidtype" value="<?php echo urldecode($userkeytype)?>" />
		</form>
	<form name="update" method="post" action="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>">
		<input type="hidden" name="do" value="update" />
		<div class="ui-grid-21 ui-grid-right fn-clear" id="J-table-consume" coor="consumelist">
			<div class="ui-tab">
												<div class="ui-tab-trigger"> 
					<ul class="fn-clear"> 
<li class="ui-tab-trigger-item <? if($ischeck==''){?> ui-tab-trigger-item-current<? }?>">
<a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>" class="ui-tab-trigger-text">所有任务管理</a></li>	
<li class="ui-tab-trigger-item <? if($ischeck=='1'){?> ui-tab-trigger-item-current<? }?>">
<a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&ischeck=1" class="ui-tab-trigger-text">我分配的任务</a></li>
<li class="ui-tab-trigger-item <? if($ischeck=='2'){?> ui-tab-trigger-item-current<? }?>">
<a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&ischeck=2" class="ui-tab-trigger-text">我执行的任务</a></li>					
</ul>
				</div>
 
				<div class="ui-tab-container" id="myScene">
					<div class="ui-tab-container-item ui-tab-container-item-current">
					<div class="amount-scheme-a fn-clear">
<div class="fn-left"><?php echo get_usershow('-1','admin.php?ac='.$ac.'&fileurl='.$fileurl.'&ischeck='.$ischeck.'&vstartdate='.$vstartdate.'&venddate='.$venddate.'&number='.$number.'&title='.$title.'')?></div>
<div class="fn-right">
<?php echo get_exceldown('excel_1')?>
<!--<img class="v-al-middle" src="template/default/images/2EDkuGH6eX.gif" />
										<a id="J-show-amount"  unselectable="on" onselectstart="return false;" href="javascript:;" seed="CR-statistical-top">统计报表</a> --></div>
</div>
					
					
					
						<table id="tradeRecordsIndex" class="ui-table">

							<thead>
								<tr>
									<th class="checkbox">
									<input type="checkbox" class="checkbox" value="1" name="chkall" onClick="check_all(this)" /></th>
									<th class="info">任务编号</th>
									<th class="title">任务名称</th>
									<th class="info">执行人</th>
									<th class="info">执行周期</th>
									<th class="info">状态</th>
									<th class="info">发布时间</th>
									<th class="info">发布人</th>
									<th class="action">操作</th>
								</tr>
							</thead>
							
							
							
							
							<tbody>
<?foreach ($result as $row) {?>
<?php
$key1 = $db->fetch_one_array("SELECT sum(progress) as progress FROM ".DB_TABLEPRE."project_duty_log WHERE dutyid='".$row['id']."'   ");
	if($key1["progress"]>='100'){
		$db->query("UPDATE ".DB_TABLEPRE."project_duty SET dkey=3 WHERE id = '".$row['id']."'  ");
	}
	if($row['enddate']<get_date('Y-m-d',PHP_TIME) && $key1["progress"]<'100'){
    	$db->query("UPDATE ".DB_TABLEPRE."project_duty SET dkey=2 WHERE id = '".$row['id']."'  ");
	}
?>																																						
<tr <?php if($result%2==0){?>class="split" <?php }?>>
<td class="checkbox">
<?php
get_boxlistkey("id[]",$row['id'],$row['uid'],$_USER->id);
?></td>
<td class="info"><?php echo $row['number']?></td>
<td class="title">
<a href="admin.php?ac=duty_views&fileurl=duty&did=<?php echo $row['id']?>"><?php echo $row['title']?></a>
</td>
<td class="info"><?php echo $row['user']?></td>
<td class="info"><?php echo $row['startdate']?>至<?php echo $row['enddate']?></td>
<td class="info"><?php if($row['dkey']=='1'){echo "进行中";}elseif($row['dkey']=='2'){echo "<font color=red>未完成</font>";}else{echo "<font color=#006600>己完成</font>";}?></td>
<td class="info"><?php echo $row['date']?></td>
<td class="info"><?php echo get_realname($row['uid'])?></td>
<td  width="150">
<?php get_urlkey("任务进度管理","admin.php?ac=duty_log&fileurl=duty&did=".$row['id']."","".$row['uid']!=$_USER->id && $row['user']!=get_realname($_USER->id))?>
 | <a href="admin.php?ac=duty_views&fileurl=duty&did=<?php echo $row['id']?>">查看任务</a></td>
									
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
 

