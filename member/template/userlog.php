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
			<h2 class="ui-tit-page">系统日志列表</h2>
			
			<div class="record-tit-amount">
				<p>总共有<span class="number"><?php echo public_number('oalog')?></span>条数据
              </p>
			</div>
		</div>
		
		<!-- 过滤表单 -->
		<form method="get" action="admin.php" name="topSearchForm" class="ui-grid-21 ui-grid-right ui-form">
		<input type="hidden" name="ac" value="<?php echo $ac?>" />
		<input type="hidden" name="do" value="loglist" />
		<input type="hidden" name="fileurl" value="<?php echo $fileurl?>" />
		<div class="ui-grid-21 ui-grid-right record-search">
		<div class="record-search-cate">
				<div class="ui-form-item">
					
					<div class="ui-form-item-content record-type-list blue-links"  style="width:98%;">
					类型：
<a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&do=loglist&vstartdate=<?php echo $vstartdate?>&venddate=<?php echo $venddate?>&name=<?php echo urldecode($name)?>&type=1" <?php echo ($_GET['type'] == '1' ? 'class="active"' : '')?>>系统设置</a>
<a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&do=loglist&vstartdate=<?php echo $vstartdate?>&venddate=<?php echo $venddate?>&name=<?php echo urldecode($name)?>&type=2" <?php echo ($_GET['type'] == '2' ? 'class="active"' : '')?> >权限组设置</a>
<a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&do=loglist&vstartdate=<?php echo $vstartdate?>&venddate=<?php echo $venddate?>&name=<?php echo urldecode($name)?>&type=3"  <?php echo ($_GET['type'] == '3' ? 'class="active"' : '')?> >帐号</a>
<a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&do=loglist&vstartdate=<?php echo $vstartdate?>&venddate=<?php echo $venddate?>&name=<?php echo urldecode($name)?>&type=4"  <?php echo ($_GET['type'] == '4' ? 'class="active"' : '')?> >短消息</a>
<a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&do=loglist&vstartdate=<?php echo $vstartdate?>&venddate=<?php echo $venddate?>&name=<?php echo urldecode($name)?>&type=6"  <?php echo ($_GET['type'] == '6' ? 'class="active"' : '')?> >短信</a>
<a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&do=loglist&vstartdate=<?php echo $vstartdate?>&venddate=<?php echo $venddate?>&name=<?php echo urldecode($name)?>&type=9"  <?php echo ($_GET['type'] == '9' ? 'class="active"' : '')?> >通讯录</a>
<a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&do=loglist&vstartdate=<?php echo $vstartdate?>&venddate=<?php echo $venddate?>&name=<?php echo urldecode($name)?>&type=10"  <?php echo ($_GET['type'] == '10' ? 'class="active"' : '')?> >日程</a>
<a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&do=loglist&vstartdate=<?php echo $vstartdate?>&venddate=<?php echo $venddate?>&name=<?php echo urldecode($name)?>&type=11"  <?php echo ($_GET['type'] == '11' ? 'class="active"' : '')?> >日记</a>
<a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&do=loglist&vstartdate=<?php echo $vstartdate?>&venddate=<?php echo $venddate?>&name=<?php echo urldecode($name)?>&type=12"  <?php echo ($_GET['type'] == '12' ? 'class="active"' : '')?> >计划</a>
<a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&do=loglist&vstartdate=<?php echo $vstartdate?>&venddate=<?php echo $venddate?>&name=<?php echo urldecode($name)?>&type=13"  <?php echo ($_GET['type'] == '13' ? 'class="active"' : '')?> >新闻</a>
<a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&do=loglist&vstartdate=<?php echo $vstartdate?>&venddate=<?php echo $venddate?>&name=<?php echo urldecode($name)?>&type=14"  <?php echo ($_GET['type'] == '14' ? 'class="active"' : '')?> >发文</a>
<a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&do=loglist&vstartdate=<?php echo $vstartdate?>&venddate=<?php echo $venddate?>&name=<?php echo urldecode($name)?>&type=15"  <?php echo ($_GET['type'] == '15' ? 'class="active"' : '')?> >收文</a>
<a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&do=loglist&vstartdate=<?php echo $vstartdate?>&venddate=<?php echo $venddate?>&name=<?php echo urldecode($name)?>&type=17"  <?php echo ($_GET['type'] == '17' ? 'class="active"' : '')?> >知识</a>
<a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&do=loglist&vstartdate=<?php echo $vstartdate?>&venddate=<?php echo $venddate?>&name=<?php echo urldecode($name)?>&type=18"  <?php echo ($_GET['type'] == '18' ? 'class="active"' : '')?> >部门</a>
<a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&do=loglist&vstartdate=<?php echo $vstartdate?>&venddate=<?php echo $venddate?>&name=<?php echo urldecode($name)?>&type=19"  <?php echo ($_GET['type'] == '19' ? 'class="active"' : '')?> >会议</a>
<a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&do=loglist&vstartdate=<?php echo $vstartdate?>&venddate=<?php echo $venddate?>&name=<?php echo urldecode($name)?>&type=20"  <?php echo ($_GET['type'] == '20' ? 'class="active"' : '')?> >档案</a>
<a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&do=loglist&vstartdate=<?php echo $vstartdate?>&venddate=<?php echo $venddate?>&name=<?php echo urldecode($name)?>&type=22"  <?php echo ($_GET['type'] == '22' ? 'class="active"' : '')?> >图书</a>
<a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&do=loglist&vstartdate=<?php echo $vstartdate?>&venddate=<?php echo $venddate?>&name=<?php echo urldecode($name)?>&type=23"  <?php echo ($_GET['type'] == '23' ? 'class="active"' : '')?> >办公用品</a>
<a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&do=loglist&vstartdate=<?php echo $vstartdate?>&venddate=<?php echo $venddate?>&name=<?php echo urldecode($name)?>&type=24"  <?php echo ($_GET['type'] == '24' ? 'class="active"' : '')?> >固定资产</a>
<a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&do=loglist&vstartdate=<?php echo $vstartdate?>&venddate=<?php echo $venddate?>&name=<?php echo urldecode($name)?>&type=27"  <?php echo ($_GET['type'] == '27' ? 'class="active"' : '')?> >招聘</a>
<a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&do=loglist&vstartdate=<?php echo $vstartdate?>&venddate=<?php echo $venddate?>&name=<?php echo urldecode($name)?>&type=28"  <?php echo ($_GET['type'] == '28' ? 'class="active"' : '')?> >培训</a>
<a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&do=loglist&vstartdate=<?php echo $vstartdate?>&venddate=<?php echo $venddate?>&name=<?php echo urldecode($name)?>&type=32"  <?php echo ($_GET['type'] == '32' ? 'class="active"' : '')?> >项目</a>
<a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&do=loglist&vstartdate=<?php echo $vstartdate?>&venddate=<?php echo $venddate?>&name=<?php echo urldecode($name)?>&type=35"  <?php echo ($_GET['type'] == '35' ? 'class="active"' : '')?> >工作流</a>
<a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&do=loglist&vstartdate=<?php echo $vstartdate?>&venddate=<?php echo $venddate?>&name=<?php echo urldecode($name)?>&type=34"  <?php echo ($_GET['type'] == '34' ? 'class="active"' : '')?> >文档</a>
<a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&do=loglist&vstartdate=<?php echo $vstartdate?>&venddate=<?php echo $venddate?>&name=<?php echo urldecode($name)?>&type=33"  <?php echo ($_GET['type'] == '33' ? 'class="active"' : '')?> >任务管理</a>
<a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&do=loglist&vstartdate=<?php echo $vstartdate?>&venddate=<?php echo $venddate?>&name=<?php echo urldecode($name)?>&type=31"  <?php echo ($_GET['type'] == '31' ? 'class="active"' : '')?> >投票</a>
<a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&do=loglist&vstartdate=<?php echo $vstartdate?>&venddate=<?php echo $venddate?>&name=<?php echo urldecode($name)?>&type=30"  <?php echo ($_GET['type'] == '30' ? 'class="active"' : '')?> >论坛</a>
<a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&do=loglist&vstartdate=<?php echo $vstartdate?>&venddate=<?php echo $venddate?>&name=<?php echo urldecode($name)?>&type=29"  <?php echo ($_GET['type'] == '29' ? 'class="active"' : '')?> >奖惩记录</a>
<a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&do=loglist&vstartdate=<?php echo $vstartdate?>&venddate=<?php echo $venddate?>&name=<?php echo urldecode($name)?>&type=26"  <?php echo ($_GET['type'] == '26' ? 'class="active"' : '')?> >人事合同</a>
<a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&do=loglist&vstartdate=<?php echo $vstartdate?>&venddate=<?php echo $venddate?>&name=<?php echo urldecode($name)?>&type=25"  <?php echo ($_GET['type'] == '25' ? 'class="active"' : '')?> >岗位</a>

					</div>
				</div>
							</div>
			<div id="J-advanced-filter-option" class="">
				<div class="record-search-time fn-clear">
					<div class="ui-form-item ui-form-item-time">
						<label class="ui-form-label" for="J-start">日期：</label>
						<div class="ui-form-content">
							<input type="text" value="<?php echo $vstartdate?>"  class="ui-input i-date" readonly="readonly"  onClick="WdatePicker();" name='vstartdate' ><span class="ui-separator-pd">-</span><input type="text" value="<?php echo $venddate?>"  class="ui-input i-date" name="venddate" readonly="readonly"  onClick="WdatePicker();">
						</div>
						
						<label class="ui-form-label" for="J-start">主题：</label>
						<div class="ui-form-content">
							<input type="text" value="<?php echo urldecode($name)?>" name="name" class="ui-input i-date" id="J-start">
						</div>
						
						
						<div class="submit-time-container ">
							<div class="submit-time ui-button ui-button-sorange">
								<input type="submit" class="ui-button-text"id="J-submit-time" value="搜 索"/>
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
                                            <td width="9%" align="right" style="padding-right:10px;"></td>
                                          </tr>
                                        </table>
		  
										

	  </div>
	</div>
	
	<form name="excel" method="post" action="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>">
		<input type="hidden" name="vstartdate" value="<?php echo urldecode($vstartdate)?>" />
		<input type="hidden" name="name" value="<?php echo urldecode($name)?>" />
        <input type="hidden" name="venddate" value="<?php echo $_GET[venddate]?>" />
		<input type="hidden" name="type" value="<?php echo $_GET[type]?>" />
		<input type="hidden" name="do" value="userexcel" />
		</form>
	<form name="update" method="post" action="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>">
		<input type="hidden" name="do" value="userupdate" />
		<div class="ui-grid-21 ui-grid-right fn-clear" id="J-table-consume" coor="consumelist">
			<div class="ui-tab">
												<div class="ui-tab-trigger"> 
					<ul class="fn-clear"> 
<li class="ui-tab-trigger-item<?php echo $_check['ischeck']?>">
<a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>" class="ui-tab-trigger-text">登录日志列表</a></li>						
<li class="ui-tab-trigger-item<?php echo $_check['ischeck1']?> "><a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&do=loglist" class="ui-tab-trigger-text">操作日志列表</a></li>
</ul>
				</div>
 
				<div class="ui-tab-container" id="myScene">
					<div class="ui-tab-container-item ui-tab-container-item-current">
						<table id="tradeRecordsIndex" class="ui-table">

							<thead>
								<tr>
									<th class="checkbox">
									<input type="checkbox" class="checkbox" value="1" name="chkall" onClick="check_all(this)" /></th>
									
									<th class="title">主题</th>
									<th class="name">用户</th>
									<th>内容</th>
									<th class="info">操作时间</th>
									<th class="info">类型</th>
								</tr>
							</thead>
							
							
							
							
							<tbody>
<?foreach ($result as $row) {?>
																																								
<tr <?php if($result%2==0){?>class="split" <?php }?>>
<td class="checkbox"><input type="checkbox" name="id[]" value="<?php echo $row['id']?>" class="checkbox" /></td>
<td class="title">
<?php echo $row['title']?>
</td>
<td class="name"><?php echo get_realname($row['uid'])?></td>
<td>
<?php
$content=explode('|515158.com|',$row[content]); 
$contentdata="";
for($i=0;$i<sizeof($content);$i++)
{
	if($content[$i]!=''){
	$contentdata=$contentdata.$content[$i];
	}
}
?>
<a href="#" title="<?php echo $contentdata?>"><?php echo substr($contentdata,0,80)?></a>
</td>
<td class="info"><?php echo $row['startdate']?></td>	
<td class="info"><?php echo get_oalog_type($row['type'])?></td>						
</tr>
<?}?>			
																									
</tbody>
		</table>
 
											</div>
					
					<div class="fn-clear">
						<!-- 图释 -->
					  <div class="iconTip fn-left">
						&nbsp;<input type="checkbox" class="checkbox" value="1" name="chkall" onClick="check_all(this)" /> 全选 &nbsp;&nbsp;
						  <a class="ico-rmb"><span>导出数据</span></a>
						  <a href="javascript:document:excel.submit();">导出数据</a>
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
 
 
	
</div>


</div>

                            

</body>
</html>
 

