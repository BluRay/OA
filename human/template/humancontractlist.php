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
			<h2 class="ui-tit-page">人事合同信息列表</h2>
			
			<div class="record-tit-amount">
				<p>总共有<span class="number"><?php echo public_number('humancontract')?></span>条数据
              </p>
			</div>
		</div>
		
		<!-- 过滤表单 -->
		<form method="get" action="admin.php" name="save" class="ui-grid-21 ui-grid-right ui-form">
		<input type="hidden" name="ischeck" value="<?php echo $ischeck?>" />
		<input type="hidden" name="ac" value="<?php echo $ac?>" />
		<input type="hidden" name="do" value="list" />
		<input type="hidden" name="fileurl" value="<?php echo $fileurl?>" />
		<input type="hidden" name="vuidtype" value="<?php echo $vuidtype?>" />
		<div class="ui-grid-21 ui-grid-right record-search">
		
			<div id="J-advanced-filter-option" class="">
				<div class="record-search-time fn-clear">
					<div class="ui-form-item ui-form-item-time">
						<label class="ui-form-label" for="J-start">单位员工：</label>
						<div class="ui-form-content">
						<?php
						  get_pubuser(1,"user","","+选择人员",70,20)
						  ?>
							
						</div>
						<label class="ui-form-label" for="J-start">合同编号：</label>
						<div class="ui-form-content">
						<input type="text" value="<?php echo urldecode($number)?>" name="number" class="ui-input search-keyword" id="J-keyword">
						</div>
						<label class="ui-form-label" for="J-start">合同类型：</label>
						<div class="ui-form-content">
						<select name="type" class="BigStatic">
						<option value="0" selected="selected">请选择类型</option>
						<?php echo get_typelist($type,14)?>
						</select>
						</div>
						<label class="ui-form-label" for="J-start">合同状态：</label>
						<div class="ui-form-content">
						<select name="ckey" class="BigStatic">
			<option value="0" selected="selected" >请选择状态</option>
			<?php echo get_typelist($ckey,15)?>
			</select>
						</div>
						<br><br>
						<label class="ui-form-label" for="J-start">签订日期：</label>
						<div class="ui-form-content">
						<input type="text" value="<?php echo $signdate?>"  class="ui-input i-date" readonly="readonly"  onClick="WdatePicker();" name='signdate' > 
						</div>
						
						<label class="ui-form-label" for="J-start" style="width:100px;">试用生效日期：</label>
						<div class="ui-form-content">
						<input type="text" value="<?php echo $testdate?>"  class="ui-input i-date" readonly="readonly"  onClick="WdatePicker();" name='testdate' > 
						</div>
						
						<label class="ui-form-label" for="J-start" style="width:100px;">试用到期日期：</label>
						<div class="ui-form-content">
						<input type="text" value="<?php echo $testenddate?>"  class="ui-input i-date" readonly="readonly"  onClick="WdatePicker();" name='testenddate' > 
						</div>
						
						<label class="ui-form-label" for="J-start" style="width:100px;">合同到期日期：</label>
						<div class="ui-form-content">
						<input type="text" value="<?php echo $signenddate?>"  class="ui-input i-date" readonly="readonly"  onClick="WdatePicker();" name='signenddate' > 
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
                                            <td width="9%" align="right" style="padding-right:10px;"><input type="button" value="发布信息" class="BigButtonBHover" onClick="javascript:window.location='admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&do=add'"></td>
                                          </tr>
                                        </table>
		  
										

	  </div>
	</div>
	<form name="excel" method="post" action="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>">
		<input type="hidden" name="do" value="excel" />
		<input type="hidden" name="ischeck" value="<?php echo $ischeck?>" />
		<input type="hidden" name="userid" value="<?php echo $userid?>" />
		<input type="hidden" name="number" value="<?php echo $number?>" />
		<input type="hidden" name="type" value="<?php echo $type?>" />
		<input type="hidden" name="ckey" value="<?php echo $ckey?>" />
		<input type="hidden" name="signdate" value="<?php echo $signdate?>" />
		<input type="hidden" name="testdate" value="<?php echo $testdate?>" />
		<input type="hidden" name="testenddate" value="<?php echo $testenddate?>" />
		<input type="hidden" name="signenddate" value="<?php echo $signenddate?>" />
		<input type="hidden" name="vuidtype" value="<?php echo $vuidtype?>" />
	</form>
	<form name="update" method="post" action="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>">
		<input type="hidden" name="do" value="update" />
		<div class="ui-grid-21 ui-grid-right fn-clear" id="J-table-consume" coor="consumelist">
			<div class="ui-tab">
												<div class="ui-tab-trigger"> 
					<ul class="fn-clear"> 
<li class="ui-tab-trigger-item<?php echo $_check['ischeck']?>">
<a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>" class="ui-tab-trigger-text">所有合同信息</a></li>					
</ul>
				</div>
 
				<div class="ui-tab-container" id="myScene">
					<div class="ui-tab-container-item ui-tab-container-item-current">
<div class="amount-scheme-a fn-clear">
<div class="fn-left"><?php echo get_usershow('-1','admin.php?ac='.$ac.'&fileurl='.$fileurl.'&ischeck='.$ischeck.'&userid='.$userid.'&number='.$number.'&type='.$type.'&ckey='.$ckey.'&signdate='.$signdate.'&testdate='.$testdate.'&testenddate='.$testenddate.'&signenddate='.$signenddate.'')?></div>
<div class="fn-right">
<?php echo get_exceldown('excel_30')?></div>
</div>
						<table id="tradeRecordsIndex" class="ui-table">

							<thead>
								<tr>
									<th class="checkbox">
									<input type="checkbox" class="checkbox" value="1" name="chkall" onClick="check_all(this)" /></th>
									<th class="info">合同编号</th>
									<th class="info">单位员工</th>
									<th class="info">合同类型</th>
									<th class="info">合同状态</th>
									<th class="info">合同签订日期</th>
									<th class="info">合同到期日期</th>
									<th class="info">签约次数</th>
									<th class="info">发布人</th>
									<th class="action">操作</th>
								</tr>
							</thead>
							
							
							
							
							<tbody>
<?foreach ($result as $row) {?>
																																								
<tr <?php if($result%2==0){?>class="split" <?php }?>>
<td class="checkbox">
<?php echo get_boxlistkey("id[]",$row['id'],$row['uid'],$_USER->id)?></td>
<td class="info">
<a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&do=views&id=<?php echo $row['id']?>"><?php echo $row['number']?></a>
</td>
<td class="info"><?php echo get_realname($row['userid'])?></td>
<td class="info"><?php echo get_typename($row["type"])?></td>
<td class="info"><?php echo get_typename($row["ckey"])?></td>
<td class="info"><?php echo $row['signdate']?></td>
<td class="info"><?php echo $row['signenddate']?></td>
<td class="info"><?php echo $row['signnum']?></td>
<td class="info"><?php echo get_realname($row['uid'])?></td>
<td class="action">
<?php get_urlkey("编辑","admin.php?ac=".$ac."&fileurl=".$fileurl."&do=add&id=".$row['id']."","".$row['uid']!=$_USER->id)?>
</td>
									
</tr>
<?}?>			
																									
</tbody>
		</table>
 
</div>
					
					<div class="fn-clear">
						<!-- 图释 -->
					  <div class="iconTip fn-left" style="padding-left:15px;">
					<input type="checkbox" class="checkbox" value="1" name="chkall" onClick="check_all(this)" /> 全选 &nbsp;
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
 

