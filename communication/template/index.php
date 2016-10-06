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

function show_userback(type,user,phone)
{
   mytop=(screen.availHeight-370)/2;
   myleft=(screen.availWidth-682)/1;
   window.open("admin.php?ac="+type+"&fileurl=sms&user="+user+"&phone="+phone,"","height=300,width=300,status=0,toolbar=no,menubar=no,location=no,scrollbars=yes,top="+mytop+",left="+myleft+",resizable=yes");
}
</script>
</head>
<!--[if lt IE 7]><body class="ie6"><![endif]--><!--[if IE 7]><body class="ie7"><![endif]--><!--[if IE 8]><body class="ie8"><![endif]--><!--[if !IE]><!--><body><!--<![endif]-->
<div id="container" class="ui-container">
 
<div id="content" class="ui-content fn-clear" coor="default" coor-rate="0.02">
	<div class="ui-grid-21" coor="content">
		<div class="ui-grid-21 ui-grid-right record-tit" coor="title">
			<h2 class="ui-tit-page">通讯录信息列表</h2>
			
			<div class="record-tit-amount">
				<p>总共有<span class="number"><?php echo public_number('communication')?></span>条数据
              </p>
			</div>
		</div>
		
		<!-- 过滤表单 -->
		<form method="get" action="admin.php" name="topSearchForm" class="ui-grid-21 ui-grid-right ui-form">
		<input type="hidden" name="ischeck" value="<?php echo $ischeck?>" />
		<input type="hidden" name="ac" value="<?php echo $ac?>" />
		<input type="hidden" name="do" value="list" />
		<input type="hidden" name="fileurl" value="<?php echo $fileurl?>" />
		<input type="hidden" name="type" value="<?php echo $_GET[type]?>" />
		<div class="ui-grid-21 ui-grid-right record-search">
		
			<div id="J-advanced-filter-option" class="">
				<div class="record-search-time fn-clear">
					<div class="ui-form-item ui-form-item-time">
						<label class="ui-form-label" for="J-start">关键词：</label>
						<div class="ui-form-content">
							<input type="text" value="<?php echo urldecode($keyword)?>" name="keyword" class="ui-input search-keyword" id="J-keyword">
						</div>
						
						<label class="ui-form-label" for="J-start">选项：</label>
						<div class="ui-form-content">
						<select name="ttype" class="BigStatic">
						 <option value="" selected="selected"></option>
						  <option value="company" <?php if ($ttype=='company'){?>selected="selected"<?php }?>>公司名称</option>
						  <option value="person" <?php if ($ttype=='person'){?>selected="selected"<?php }?>>联系人</option>
						  <option value="position" <?php if ($ttype=='position'){?>selected="selected"<?php }?>>职位</option>
						  <option value="tel" <?php if ($ttype=='tel'){?>selected="selected"<?php }?>>联系电话</option>
						  <option value="phone" <?php if ($ttype=='phone'){?>selected="selected"<?php }?>>手机</option>
						  <option value="fax" <?php if ($ttype=='fax'){?>selected="selected"<?php }?>>传真</option>
						  <option value="address" <?php if ($ttype=='address'){?>selected="selected"<?php }?>>地址</option>
		              </select>
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
                                            <td width="9%" align="right" style="padding-right:10px;"><input type="button" value="新增通迅录" class="BigButtonBHover" onClick="javascript:window.location='admin.php?ac=add&fileurl=communication&type=<?php echo $_GET[type]?>'"></td>
                                          </tr>
                                        </table>
		  
										

	  </div>
	</div>
	<form name="phone" method="post" action="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>">
	<?foreach ($result as $row) {?>
	<input type="hidden" name="phone[]" value="<?php echo $row[phone]?>" />
	<?}?>
		<input type="hidden" name="do" value="phone" />
		</form>
	<form name="update" method="post" action="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>">
		<input type="hidden" name="do" value="update" />
		<div class="ui-grid-21 ui-grid-right fn-clear" id="J-table-consume" coor="consumelist">
			<div class="ui-tab">
												<div class="ui-tab-trigger"> 
					<ul class="fn-clear"> 
<li class="ui-tab-trigger-item <?php if($_GET[type]=='1'){?>ui-tab-trigger-item-current<?php }?>">
<a href="admin.php?ac=index&fileurl=communication&type=1" class="ui-tab-trigger-text">个人通迅录</a></li>	
<li class="ui-tab-trigger-item <?php if($_GET[type]=='2'){?>ui-tab-trigger-item-current<?php }?>">
<a href="admin.php?ac=index&fileurl=communication&type=2" class="ui-tab-trigger-text">公共通迅录</a></li>
<li class="ui-tab-trigger-item">
<a href="admin.php?ac=user&fileurl=communication" class="ui-tab-trigger-text">公司通迅录</a></li>					
</ul>
				</div>
 
				<div class="ui-tab-container" id="myScene">
					<div class="ui-tab-container-item ui-tab-container-item-current">

					
					
						<table id="tradeRecordsIndex" class="ui-table">

							<thead>
								<tr>
									<th class="checkbox">
									<input type="checkbox" class="checkbox" value="1" name="chkall" onClick="check_all(this)" /></th>
									<th class="title">公司名称</th>
									<th width="60">联系人</th>
									<th width="50">性别</th>
									<th width="70">职位</th>
									<th width="90">联系电话</th>
									<th width="90">手机</th>
									<th width="90">传真</th>
									<th class="info">电子邮件</th>
									<th width="50">发布人</th>
									<th width="50">操作</th>
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
<a href="<?php if($row['uid']==$_USER->id){?>admin.php?ac=edit&fileurl=communication&do=edit&id=<?php echo $row['id']?>&type=<?php echo $_GET[type]?><?php }else{?>#<?php }?>"><?php echo $row['company']?></a><a href="javascript:;" onClick="show_userback('phone_online','<?php echo $row['person']?>','<?php echo $row['phone']?>')" class="sl zoom"  ><img src="template/default/images/phone.gif" width="16" height="16" alt="发送手机短信" border="0"></a></td>
<td width="60"><?php echo $row['person']?></td>
<td width="50"><?php echo $row['sex']?></td>
<td width="70"><?php echo $row['position']?></td>
<td width="90"><?php echo $row['tel']?></td>
<td width="90"><?php echo $row['phone']?></td>
<td width="90"><?php echo $row['fax']?></td>
<td class="info"><?php echo $row['mail']?></td>
<td width="50"><?php echo get_realname($row['uid'])?></td>
<td width="50"><?php get_urlkey("编辑","admin.php?ac=edit&fileurl=communication&do=edit&type=".$_GET[type]."&id=".$row['id']."","".$row['uid']!=$_USER->id)?>
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
						   &nbsp;
						  <img src="template/default/images/phone.gif" width="16" height="16" alt="发送手机短信" border="0"><a href="javascript:document:phone.submit();">群发短信</a>
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
 

