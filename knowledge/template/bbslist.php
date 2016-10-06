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
			<h2 class="ui-tit-page">贴子信息列表</h2>
			
			<div class="record-tit-amount">
				<p>总共有<span class="number"><?php echo public_number('bbs')?></span>条数据
              </p>
			</div>
		</div>
		
		<!-- 过滤表单 -->
		<form method="get" action="admin.php" name="topSearchForm" class="ui-grid-21 ui-grid-right ui-form">
		<input type="hidden" name="ischeck" value="<?php echo $ischeck?>" />
		<input type="hidden" name="ac" value="<?php echo $ac?>" />
		<input type="hidden" name="do" value="list" />
		<input type="hidden" name="fileurl" value="<?php echo $fileurl?>" />
		<input type="hidden" name="bbsclass" value="<?php echo $bbsclass?>" />
		<input type="hidden" name="vuidtype" value="<?php echo $vuidtype?>" />
		<div class="ui-grid-21 ui-grid-right record-search">
		
		<div class="record-search-cate">
				<div class="ui-form-item">
					
					<div class="ui-form-item-content record-type-list blue-links"  style="width:98%;">
					按版块：
<?foreach ($bbsclasslist as $row) {?>
<a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&bbsclass=<?php echo $row[id]?>&ischeck=<?php echo $ischeck?>&userkeytype=<?php echo $userkeytype?>" <?php if(trim($bbsclass)==trim($row[id])){?>class="active"<? }?> ><?php echo $row[name]?></a>
<?}?>
					</div>
				</div>
							</div>
		
		
			<div id="J-advanced-filter-option" class="">
				<div class="record-search-time fn-clear">
					<div class="ui-form-item ui-form-item-time">
						<label class="ui-form-label" for="J-start">主题：</label>
						<div class="ui-form-content">
							<input type="text" value="<?php echo urldecode($title)?>" name="title" class="ui-input search-keyword" id="J-keyword" style="width:260px;">
						</div>
						
						<label class="ui-form-label" for="J-start">发贴日期：</label>
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
                                            <td width="9%" align="right" style="padding-right:10px;"><input type="button" value="发布新贴" class="BigButtonBHover" onClick="javascript:window.location='admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&do=add'"></td>
                                          </tr>
                                        </table>
		  
										

	  </div>
	</div>
	<form name="update" method="post" action="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>">
		<input type="hidden" name="do" value="update" />
		<div class="ui-grid-21 ui-grid-right fn-clear" id="J-table-consume" coor="consumelist">
			<div class="ui-tab">
												<div class="ui-tab-trigger"> 
					<ul class="fn-clear"> 
<li class="ui-tab-trigger-item<?php echo $_check['ischeck']?>">
<a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>" class="ui-tab-trigger-text">所有贴子</a></li>						
<li class="ui-tab-trigger-item<?php echo $_check['ischeck1']?> "><a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&ischeck=1" class="ui-tab-trigger-text">我发布的贴子</a></li>
<li class="ui-tab-trigger-item<?php echo $_check['ischeck2']?> "><a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&ischeck=2" class="ui-tab-trigger-text">待我审批的贴子</a></li>
</ul>
				</div>
 
				<div class="ui-tab-container" id="myScene">
					<div class="ui-tab-container-item ui-tab-container-item-current">
<div class="fn-left"><?php echo get_usershow('-1','admin.php?ac='.$ac.'&fileurl='.$fileurl.'&ischeck='.$ischeck.'&vstartdate='.$vstartdate.'&venddate='.$venddate.'&title='.$title.'&bbsclass='.$bbsclass.'')?></div>
<div class="fn-right">
</div>
</div>
						<table id="tradeRecordsIndex" class="ui-table">

							<thead>
								<tr>
									<th class="checkbox">
									<input type="checkbox" class="checkbox" value="1" name="chkall" onClick="check_all(this)" /></th>
									<th class="title">主题</th>
									<th class="info">作者</th>
									<th class="info">来源</th>
									<th class="status">阅读次数</th>
									<th class="info">发布时间</th>
									<th class="info">状态</th>
									<th class="info">发贴人</th>
									<th class="info">版主</th>
									<th class="action">操作</th>
								</tr>
							</thead>
							
							
							
							
							<tbody>
<?php
foreach ($result as $row) {
global $db;
$bbsclassadmin = $db->fetch_one_array("SELECT * FROM ".DB_TABLEPRE."bbsclass  WHERE id = '".$row["bbsclass"]."' and classadmin like '%".get_realname($_USER->id)."%' ");
if($_USER->id==$row['uid'] && $bbsclassadmin["classadmin"]==''){
	$disabled='';
}elseif($bbsclassadmin["classadmin"]!=''){
	$disabled='';
}else{
	$disabled='disabled';
}
?>
																																								
<tr <?php if($result%2==0){?>class="split" <?php }?>>
<td class="checkbox"><input type="checkbox" name="id[]" value="<?php echo $row['id']?>" class="checkbox" <?php echo $disabled?> /></td>
<td class="title">
<a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&do=views&id=<?php echo $row['id']?>"><?php echo $row['title']?></a>
</td>
<td class="info"><?php echo $row['author']?></td>
<td class="info"><?php echo $row['origin']?></td>
<td class="status"><span class="amount-pay amount-pay-out"><?php echo $row['readnum']?></span>次</td>
<td class="info"><?php echo $row['issuedate']?></td>
<td class="info"><?php if($row['type']=='1'){echo "<font color=#006600>待审</font>";}elseif($row['type']=='2'){echo "正常";}else{echo "<font color=red>置顶</font>";}?></td>
<td class="info"><?php echo get_realname($row['uid'])?></td>
<td class="info"><?php
global $db;
$bbsclass = $db->fetch_one_array("SELECT * FROM ".DB_TABLEPRE."bbsclass  WHERE id = '".$row["bbsclass"]."' ");
echo $bbsclass["classadmin"];
?></td>
<td class="action">
<?php
if($_USER->id==$row['uid'] && $bbsclassadmin["classadmin"]==''){
	echo '<a href="admin.php?ac='.$ac.'&fileurl='.$fileurl.'&do=add&id='.$row['id'].'">编辑</a>';
}elseif($bbsclassadmin["classadmin"]!=''){
	if($row["type"]=='1'){
	echo '<a href="admin.php?ac='.$ac.'&fileurl='.$fileurl.'&do=keys&id='.$row['id'].'">审批</a> | ';
	}
echo '<a href="admin.php?ac='.$ac.'&fileurl='.$fileurl.'&do=add&id='.$row['id'].'">编辑</a>';
}
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
		<!-- /交易记录-->
 </form>		
	</div>
 
 
	
</div>


</div>

                            

</body>
</html>
 

