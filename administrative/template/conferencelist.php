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
			<h2 class="ui-tit-page">会议信息列表</h2>
			
			<div class="record-tit-amount">
				<p>总共有<span class="number"><?php echo public_number('conference')?></span>条数据
              </p>
			</div>
		</div>
		
		<!-- 过滤表单 -->
		<form method="get" action="admin.php" name="topSearchForm" class="ui-grid-21 ui-grid-right ui-form">
		<input type="hidden" name="ischeck" value="<?php echo $ischeck?>" />
		<input type="hidden" name="ac" value="<?php echo $ac?>" />
		<input type="hidden" name="do" value="list" />
		<input type="hidden" name="fileurl" value="<?php echo $fileurl?>" />
		<input type="hidden" name="vuidtype" value="<?php echo $vuidtype?>" />
		<div class="ui-grid-21 ui-grid-right record-search">
		
		<div class="record-search-cate">
				<div class="ui-form-item">
					<div class="ui-form-item-content record-type-list blue-links  blue-links-min " style="width:98%;">按类型：
<?foreach ($result1 as $row) {?>
	<a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&otype=<?php echo $row['oid']?>&userkeytype=<?php echo $userkeytype?>" <? if($_GET['otype']==$row['oid']){?> class="active" <? }?>><?php echo $row['oname']?></a>
<?}?>						
					</div>
<div class="ui-form-item-content record-type-list blue-links  blue-links-min " style="width:98%;margin-top:5px;">
按会议室：
<?foreach ($result2 as $row) {?>
	<a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&conferenceroom=<?php echo $row['oid']?>&userkeytype=<?php echo $userkeytype?>" <? if($_GET['conferenceroom']==$row['oid']){?> class="active" <? }?>><?php echo $row['oname']?></a>
<?}?>						
					</div>
				</div>
							</div>
		
		
			<div id="J-advanced-filter-option" class="">
				<div class="record-search-time fn-clear">
					<div class="ui-form-item ui-form-item-time">
						<label class="ui-form-label" for="J-start">会议主题：</label>
						<div class="ui-form-content">
							<input type="text" value="<?php echo urldecode($title)?>" name="title" class="ui-input search-keyword" id="J-keyword">
						</div>
						
						<label class="ui-form-label" for="J-start">发布日期：</label>
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
                                            <td width="9%" align="right" style="padding-right:10px;"><input type="button" value="会议申请" class="BigButtonBHover" onClick="javascript:window.location='admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&do=add'"></td>
                                          </tr>
                                        </table>
		  
										

	  </div>
	</div>
	<form name="excel" method="post" action="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>">
	<input type="hidden" name="vuidtype" value="<?php echo $vuidtype?>" />
	<input type="hidden" name="title" value="<?php echo $title?>" />
	<input type="hidden" name="vstartdate" value="<?php echo $vstartdate?>" />
	<input type="hidden" name="venddate" value="<?php echo $venddate?>" />
	<input type="hidden" name="ischeck" value="<?php echo $ischeck?>" />
	<input type="hidden" name="otype" value="<?php echo $otype?>" />
	<input type="hidden" name="conferenceroom" value="<?php echo $conferenceroom?>" />
		<input type="hidden" name="do" value="excel" />
		</form>
	<form name="update" method="post" action="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>">
		<input type="hidden" name="do" value="update" />
		<div class="ui-grid-21 ui-grid-right fn-clear" id="J-table-consume" coor="consumelist">
			<div class="ui-tab">
												<div class="ui-tab-trigger"> 
					<ul class="fn-clear"> 
<li class="ui-tab-trigger-item<?php echo $_check['ischeck']?>">
<a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>" class="ui-tab-trigger-text">信息列表</a></li>
<li class="ui-tab-trigger-item<?php echo $_check['ischeck1']?>">
<a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&ischeck=1" class="ui-tab-trigger-text">待我参加会议</a></li>	
<li class="ui-tab-trigger-item<?php echo $_check['ischeck2']?>">
<a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&ischeck=2" class="ui-tab-trigger-text">我已参加会议</a></li>	
<li class="ui-tab-trigger-item<?php echo $_check['ischeck3']?>">
<a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&ischeck=3" class="ui-tab-trigger-text">待开会议</a></li>	
<li class="ui-tab-trigger-item<?php echo $_check['ischeck4']?>">
<a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&ischeck=4" class="ui-tab-trigger-text">已开会议</a></li>						
</ul>
				</div>
 
				<div class="ui-tab-container" id="myScene">
					<div class="ui-tab-container-item ui-tab-container-item-current">
<div class="amount-scheme-a fn-clear">
<div class="fn-left"><?php echo get_usershow('-1','admin.php?ac='.$ac.'&fileurl='.$fileurl.'&ischeck='.$ischeck.'&vstartdate='.$vstartdate.'&venddate='.$venddate.'&title='.$title.'')?></div>
<div class="fn-right">
<?php echo get_exceldown('excel_8')?></div>
</div>
					
						<table id="tradeRecordsIndex" class="ui-table">

							<thead>
								<tr>
									<th class="checkbox">
									<input type="checkbox" class="checkbox" value="1" name="chkall" onClick="check_all(this)" /></th>
									<th class="title">会议名称</th>
									<th class="info">申请人</th>
									<th class="info">申请时间</th>
									<th class="info">会议时间</th>
									<th class="info">会议室</th>
									<th class="info">状态</th>
									<th class="info">发布人</th>
									<th class="info">操作</th>
								</tr>
							</thead>
							
							
							
							
							<tbody>
<?foreach ($result as $row) {?>
																																								
<tr <?php if($result%2==0){?>class="split" <?php }?>>
<td class="checkbox">
<?php echo get_boxlistkey("id[]",$row['id'],$row['uid'],$_USER->id)?></td>
<td class="title">
<a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&do=views&id=<?php echo $row['id']?>"><?php echo $row['title']?></a>
</td>
<td class="info"><?php echo get_realname($row['appperson'])?></td>
<td class="info"><?php
					$date=explode(' ',$row['date']);
					$startdate=explode(' ',$row['startdate']);
					$enddate=explode(' ',$row['enddate']);
					?>
					<?php echo $date[0]."<br>".$date[1]?></td>
<td class="info"><?php echo $startdate[0]."<br>".$startdate[1]."至".$enddate[1]?></td>
<td class="info"><?php if($row['conferenceroom']!=''){?>
					<?php echo get_typename($row['conferenceroom'])?>
					<?php }?></td>
<td class="info"><?php
					if($row['type']=='1'){
					echo "<font color=#003300>待批</font>";
					}
					if($row['type']=='2'){
					echo "<font color=red>己批</font>";
					}
					if($row['type']=='3'){
					echo "<font color=#cccccc>拒绝</font>";
					}
					?></td>
<td class="info"><?php echo get_realname($row['uid'])?></td>
<td class="info">
<?php if($row['type']=='1' && $_USER->id==$row['staffid']){?>
<a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&do=keys&id=<?php echo $row['id']?>&type=2">审批</a>|
<a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&do=keys&id=<?php echo $row['id']?>&type=3">拒绝</a>|
<?php }?>
<?php
if($row['type']=='1'){
get_urlkey("编辑","admin.php?ac=".$ac."&fileurl=".$fileurl."&do=add&type=".$_GET['type']."&id=".$row['id']."","".$row['uid']!=$_USER->id);
}else{
	echo '编辑';
}?>
<? if($row['recorduser']==$_USER->id){?>
|<a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&do=record&cid=<?php echo $row['id']?>">会议记录</a><? }?>
</td>
									
</tr>
<?}?>			
																									
</tbody>
		</table>
 
											</div>
					
					<div class="fn-clear">
						<!-- 图释 -->
					  <div class="iconTip fn-left"  style="padding-left:16px;">
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
 

