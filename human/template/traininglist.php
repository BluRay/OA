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
			<h2 class="ui-tit-page">培训计划信息列表</h2>
			
			<div class="record-tit-amount">
				<p>总共有<span class="number"><?php echo public_number('training')?></span>条数据
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
		
			<div id="J-advanced-filter-option" class="">
				<div class="record-search-time fn-clear">
					<div class="ui-form-item ui-form-item-time">
					<label class="ui-form-label" for="J-start">培训编号：</label>
						<div class="ui-form-content">
							<input type="text" value="<?php echo urldecode($number)?>" name="number" class="ui-input search-keyword" id="J-keyword">
						</div>
						<label class="ui-form-label" for="J-start">培训名称：</label>
						<div class="ui-form-content">
							<input type="text" value="<?php echo urldecode($name)?>" name="name" class="ui-input search-keyword" id="J-keyword">
						</div>
						<label class="ui-form-label" for="J-start">培训类型：</label>
						<div class="ui-form-content">
							<select name="channel" class="BigStatic">
			<option value="0" selected="selected">请选择类型</option>
			<?php echo get_typelist($channel,17)?>
			</select>
						</div>
						<label class="ui-form-label" for="J-start">培训形式：</label>
						<div class="ui-form-content">
							<select name="trform" class="BigStatic">
			<option value="0" selected="selected">请选择形式</option>
			<?php echo get_typelist($trform,18)?>
			</select>
						</div>
						<br><br>
						<label class="ui-form-label" for="J-start">培训周期：</label>
						<div class="ui-form-content">
						<input type="text" value="<?php echo $vstartdate?>"  class="ui-input i-date" readonly="readonly"  onClick="WdatePicker();" name='vstartdate' > - <input type="text" value="<?php echo $venddate?>"  class="ui-input i-date" readonly="readonly"  onClick="WdatePicker();" name='venddate' >
						</div>
						
						
						<div class="submit-time-container ">
							<div class="submit-time ui-button ui-button-sorange">
								<input type="submit" class="ui-button-text"id="J-submit-time" value="查 找"/>
							</div>
						</div>
						<div id="J-set-date" class="quick-link-date  blue-links  ">
							
							<a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&ischeck=1&userkeytype=<?php echo $userkeytype?>" seed="CR-today" id="J-today" >今天</a>
							<a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&ischeck=2&userkeytype=<?php echo $userkeytype?>" seed="CR-sevenday" id="J-seven-day">昨天</a>
							<a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&ischeck=3&userkeytype=<?php echo $userkeytype?>" seed="CR-month" id="J-a-month" >1周内</a>
							<a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&ischeck=4&userkeytype=<?php echo $userkeytype?>" seed="CR-month" id="J-a-month" >1个月内</a>
							<a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&ischeck=5&userkeytype=<?php echo $userkeytype?>" seed="CR-month" id="J-a-month" >6个月内</a>
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
                                            <td width="9%" align="right" style="padding-right:10px;"><input type="button" value="发布信息" class="BigButtonBHover" onClick="javascript:window.location='admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&do=add'"></td>
                                          </tr>
                                        </table>
		  
										

	  </div>
	</div>
	<form name="excel" method="post" action="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>">
		<input type="hidden" name="do" value="excel" />
		<input type="hidden" name="name" value="<?php echo $name?>" />
		<input type="hidden" name="number" value="<?php echo $number?>" />
		<input type="hidden" name="trform" value="<?php echo $trform?>" />
		<input type="hidden" name="channel" value="<?php echo $channel?>" />
		<input type="hidden" name="vstartdate" value="<?php echo $vstartdate?>" />
		<input type="hidden" name="venddate" value="<?php echo $venddate?>" />
		<input type="hidden" name="ischeck" value="<?php echo $ischeck?>" />
		<input type="hidden" name="type" value="<?php echo $_GET['type']?>" />
		<input type="hidden" name="vuidtype" value="<?php echo $vuidtype?>" />
		</form>
	<form name="update" method="post" action="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>">
		<input type="hidden" name="do" value="update" />
		<div class="ui-grid-21 ui-grid-right fn-clear" id="J-table-consume" coor="consumelist">
			<div class="ui-tab">
												<div class="ui-tab-trigger"> 
					<ul class="fn-clear"> 
<li class="ui-tab-trigger-item<?php echo $_check['ischeck']?>">
<a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>" class="ui-tab-trigger-text">所有培训信息</a></li>	
<li class="ui-tab-trigger-item<?php echo $_check['ischeck1']?>">
<a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&type=1" class="ui-tab-trigger-text">我负责的培训</a></li>	
<li class="ui-tab-trigger-item<?php echo $_check['ischeck2']?>">
<a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&type=2" class="ui-tab-trigger-text">我参与的培训</a></li>
<li class="ui-tab-trigger-item<?php echo $_check['ischeck3']?>">
<a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&type=3" class="ui-tab-trigger-text">待审培训</a></li>				
</ul>
				</div>
 
				<div class="ui-tab-container" id="myScene">
					<div class="ui-tab-container-item ui-tab-container-item-current">
<div class="amount-scheme-a fn-clear">
<div class="fn-left"><?php echo get_usershow('-1','admin.php?ac='.$ac.'&fileurl='.$fileurl.'&ischeck='.$ischeck.'&name='.$name.'&number='.$number.'&trform='.$trform.'&channel='.$channel.'&vstartdate='.$vstartdate.'&venddate='.$venddate.'&type='.$_GET['type'].'')?></div>
<div class="fn-right">
<?php echo get_exceldown('excel_31')?></div>
</div>
						<table id="tradeRecordsIndex" class="ui-table">

							<thead>
								<tr>
									<th class="checkbox">
									<input type="checkbox" class="checkbox" value="1" name="chkall" onClick="check_all(this)" /></th>
									<th width="120">培训编号</th>
									<th class="title">培训名称</th>
									<th width="100">培训类型</th>
									<th width="80">培训形式</th>
									<th width="100" style="text-align:center">负责人</th>
									<th width="80">培训预算</th>
									<th width="60" style="text-align:center">状态</th>
									<th width="60" style="text-align:center">审批人</th>
									<th width="60" style="text-align:center">发布人</th>
									<th width="80" style="text-align:center">发布日期</th>
									<th width="130">操作</th>
								</tr>
							</thead>
							
							
							
							
							<tbody>
<?foreach ($result as $row) {?>
																																								
<tr <?php if($result%2==0){?>class="split" <?php }?>>
<td class="checkbox">
<?php echo get_boxlistkey("id[]",$row['id'],$row['uid'],$_USER->id)?></td>
<td><?php echo $row['number']?></td>
<td class="title">
<a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&do=views&id=<?php echo $row['id']?>"><?php echo $row['name']?></a>
</td>
<td><?php echo get_typename($row["channel"])?> </td>
<td><?php echo get_typename($row["trform"])?></td>
<td align="center"><?php echo $row['responsible']?></td>
<td><?php echo $row['price']?></td>
<td align="center"><?php if($row['type']=='1'){echo "<font color=#006600>待审</font>";}elseif($row['type']=='2'){echo "<font color=red>己批</font>";}else{echo "拒绝";}?></td>
<td align="center"><?php echo $row['examination']?></td>
<td align="center" ><?php echo get_realname($row['uid'])?></td>
<td align="center"><?php echo str_replace(' ','<br>',$row['date'])?></td>
<td>
<?php if($row['type']=='1'){ ?>
<?php get_urlkey("编辑","admin.php?ac=".$ac."&fileurl=".$fileurl."&do=add&id=".$row['id']."","".$row['uid']!=$_USER->id)?> | 
<a class="detail" href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&do=views&id=<?php echo $row['id']?>">查看</a> | 
<a class="detail" href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&do=views&id=<?php echo $row['id']?>&keys=1">审批</a>

<?php }else{?>
<a class="detail" href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&do=views&id=<?php echo $row['id']?>">查看</a> | 
<a class="detail" href="admin.php?ac=training_record&fileurl=<?php echo $fileurl?>&id=<?php echo $row['id']?>">培训记录管理</a>
<?php }?>
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
 

