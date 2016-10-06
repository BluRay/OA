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
<link rel="StyleSheet" href="template/default/css/dtree.css" type="text/css" />
<script type="text/javascript" src="template/default/js/dtree.js"></script>
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
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
  <td  width="220"  valign="top">
<div class="ui-grid-4 ui-grid-right record-aside" coor="aside" style="border-bottom:1px #CCCCCC solid;">
		<div class="ui-grid-4 ui-grid-right">
			<div class="ui-box module-recommend-perfer">
				<div class="ui-box-title">
					<div class="ui-box-title-border sl-linear">
						<h3><?php echo $_title['title']?>文件夹</h3><span style="float:right;"><a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&type=<?php echo $_GET['type']?>&do=documenttype">管理</a></span>
</div>
				</div>
				<div class="ui-box-container">
				<div class="mkt-img" >
				<table width="206" border="0" cellspacing="0" cellpadding="0">
        <tr>
		  <td width="29%" align="right" style="font-size:12px;color:#124164;"><a href="javascript: a.openAll();">展开</a> | <a href="javascript: a.closeAll();">收缩</a></td>
        </tr>
      </table>
					</div>
					<div class="mkt-img">
<div style="float:left; width:205px; background-color:#FFFFFF;height:325px;overflow:auto;overflow-y:scroll;">
	  <table width="200" border="0" cellspacing="0" cellpadding="0" >
        <tr>
          <td align="left"><div class="dtree">
	<script type="text/javascript">
		<!--
		a = new dTree('a');
		a.add(0,-1,'文件夹列表','#');	
		   <?php
		    if($_GET[type]=='1'){
				$wheresql=" and uid='".$_USER->id."'";
			}else{
				$wheresql='';
			}
	        $query = $db->query("SELECT * FROM ".DB_TABLEPRE."document_type where father='0' and type='".$_GET[type]."' $wheresql  ORDER BY id Asc  ");
			while ($row = $db->fetch_array($query)) {
			$rsfnow = $db->fetch_one_array("SELECT * FROM ".DB_TABLEPRE."document_type where father='".$row[id]."' and type='".$_GET[type]."'  ORDER BY id desc limit 0,1");

			?>
		   a.add(<?php echo $row[id]?>,0,'<?php echo $row[title]?>','admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&type=<?php echo $_GET[type]?>&documentid=<?php echo $row[id]?>');
		
		   
		   <?php 
		   //调用下级文件夹
		   if($rsfnow[id]!=''){
				get_document_list($row['id'],0,0,$ac,$fileurl);
	       }

		   ?>
		   
		   
		   
		
<?php }?>
			
		
		a.add(19,0,'查看所有文件','admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&type=<?php echo $_GET[type]?>','','','template/default/images/trash.gif');
		document.write(a);


		//-->
	</script>
</div></td>
        </tr>
      </table>  
</div>
						
						
						
						
						
					</div>
					
				</div>
			</div>
		</div><!-- .ui-grid-4 -->
		
	</div>

</td>
    <td style="padding-left:10px;" valign="top">
<div id="content" class="ui-content fn-clear" coor="default" coor-rate="0.02">
	<div class="ui-grid-21" coor="content">
		<div class="ui-grid-21 ui-grid-right record-tit" coor="title">
			<h2 class="ui-tit-page"><?php echo $_title['title']?>列表</h2>
			
			<div class="record-tit-amount">
				<p>总共有<span class="number"><?php echo public_number('document')?></span>条数据
              </p>
			</div>
		</div>
		
		<!-- 过滤表单 -->
		<form method="get" action="admin.php" name="topSearchForm" class="ui-grid-21 ui-grid-right ui-form">
		<input type="hidden" name="ischeck" value="<?php echo $ischeck?>" />
		<input type="hidden" name="ac" value="<?php echo $ac?>" />
		<input type="hidden" name="type" value="<?php echo $_GET['type']?>" />
		<input type="hidden" name="do" value="list" />
		<input type="hidden" name="fileurl" value="<?php echo $fileurl?>" />
		<input type="hidden" name="vuidtype" value="<?php echo $vuidtype?>" />
		<div class="ui-grid-21 ui-grid-right record-search">
		
			<div id="J-advanced-filter-option" class="">
				<div class="record-search-time fn-clear">
					<div class="ui-form-item ui-form-item-time">
						<label class="ui-form-label" for="J-start">文件名称：</label>
						<div class="ui-form-content">
							<input type="text" value="<?php echo urldecode($title)?>" name="title" class="ui-input search-keyword" id="J-keyword" style="width:260px;">
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
                                            <td width="9%" align="right" style="padding-right:10px;"><input type="button" value="发布信息" class="BigButtonBHover" onClick="javascript:window.location='admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&do=add&type=<?php echo $_GET['type']?>'"></td>
                                          </tr>
                                        </table>
		  
										

	  </div>
	</div>
	<form name="update" method="post" action="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&type=<?php echo $_GET['type']?>">
		<input type="hidden" name="do" value="update" />
		<div class="ui-grid-21 ui-grid-right fn-clear" id="J-table-consume" coor="consumelist">
			<div class="ui-tab">
												<div class="ui-tab-trigger"> 
					<ul class="fn-clear"> 
<li class="ui-tab-trigger-item<?php echo $_check['ischeck']?>">
<a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&type=<?php echo $_GET['type']?>" class="ui-tab-trigger-text">信息列表</a></li>						
</ul>
				</div>
 
				<div class="ui-tab-container" id="myScene">
					<div class="ui-tab-container-item ui-tab-container-item-current">
<div class="amount-scheme-a fn-clear">
<div class="fn-left"><?php echo get_usershow('-1','admin.php?ac='.$ac.'&fileurl='.$fileurl.'&ischeck='.$ischeck.'&vstartdate='.$vstartdate.'&venddate='.$venddate.'&title='.$title.'&type='.$_GET['type'].'')?></div>
<div class="fn-right">
</div>
</div>
						<table id="tradeRecordsIndex" class="ui-table">

							<thead>
								<tr>
									<th class="checkbox">
									<input type="checkbox" class="checkbox" value="1" name="chkall" onClick="check_all(this)" /></th>
									<th class="title">文件名称</th>
									<th class="info">文件夹</th>
									<th class="info">附件下载</th>
									<th class="info">发布人</th>
									<th class="info">上传时间</th>
									<th class="action">操作</th>
								</tr>
							</thead>
							
							
							
							
							<tbody>
<?foreach ($result as $row) {?>
																																								
<tr <?php if($result%2==0){?>class="split" <?php }?>>
<td class="checkbox">
<?php
get_boxlistkey("id[]",$row['id'],$row['uid'],$_USER->id)
?></td>
<td class="title">
<a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&do=views&id=<?php echo $row['id']?>&type=<?php echo $_GET['type']?>"><?php echo $row['title']?></a>
</td>
<td class="info">
<?php
$document=explode(',',$row['documentid']);
$docid=sizeof($document)-1;
?>
<?php echo GET_INC_document_type_USER_NAME($document[$docid])?>
</td>
<td class="info">
<?php if($row['annex']!=''){?>
<a href="down.php?urls=<?php echo $row['annex']?>" target="_blank">下 载</a>
<?php }?>

</td>
<td class="info"><?php echo get_realname($row['uid'])?></td>
<td class="info"><?php echo $row['date']?></td>
<td class="action">
<?php get_urlkey("编辑","admin.php?ac=".$ac."&fileurl=".$fileurl."&do=add&type=".$_GET['type']."&id=".$row['id']."","".$row['uid']!=$_USER->id)?>
</td>
									
</tr>
<?}?>			
																									
</tbody>
		</table>
 
											</div>
					
					<div class="fn-clear">
						<!-- 图释 -->
					  <div class="iconTip fn-left">
						&nbsp;<input type="checkbox" class="checkbox" value="1" name="chkall" onClick="check_all(this)" /> 全选 &nbsp;&nbsp;
						  <!--<a class="ico-rmb"><span>导出数据</span></a>
						  <a href="javascript:document:excel.submit();">导出数据</a> -->
						  &nbsp;&nbsp;
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
 
 
 
 
 
 
	
</div></td>
    
  </tr>
</table>




</div>

  

</body>
</html>
 

