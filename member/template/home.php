 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="x-ua-compatible" content="ie=7" />
<link href="template/default/tree/images/admincp.css?SES" rel="stylesheet" type="text/css" />
</head>
<body>
<script src="template/default/tree/js/common.js?SES" type="text/javascript"></script>
<script src="template/default/tree/js/admincp.js?SES" type="text/javascript"></script>
<div id="append_parent"></div>
<div class="container" id="cpcontainer"><div class="itemtitle"><h3>桌面设置</h3></div>
<table class="tb tb2 " id="tips">
<tr><th  class="partition"><a href="javascript:;" onclick="show_all()">全部展开</a> | <a href="javascript:;" onclick="hide_all()">全部折叠</a> </th></tr></table>
<form name="cpform" method="post" autocomplete="off" action="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&do=home&view=edit" >
<!--menu star-->
<table class="tb tb2 ">
<!--title-->
<tr class="header"><th></th><th>选项</th><th>名称</th></tr>
<!--one-->
<?php
global $db;
$query = $db->query("SELECT * FROM ".DB_TABLEPRE."menu where fatherid='0' and menutype!='1'  ORDER BY menunum Asc  ");
	while ($row = $db->fetch_array($query)) {
?>
<tr class="hover">
<td class="td25" onclick="toggle_group('group_<?php echo trim($row[menuid])?>', $('a_group_<?php echo trim($row[menuid])?>'))">
<a href="javascript:;" id="a_group_<?php echo trim($row[menuid])?>">[-]</a></td>
			<td class="td25">
			<?php if($row['menutype']==2){?>
			<input type="checkbox" name="id[]" value="<?php echo trim($row[menuid])?>" style="border:0px;"/>
			<?php }?>
			</td>
			<td><div class="parentboard"><?php echo trim($row[menuname])?></div></td>
			</tr>
<?php
get_menu_list($row['menuid'],0,0,$ac,$fileurl,$bghome['homemana']);
?>


<!--add-->
			
			
<?php
}
?>		
			<tr><td colspan="15"><div class="fixsel"><input type="submit" class="btn" id="submit_editsubmit" name="editsubmit" title="按 Enter 键可随时提交你的修改" value="提交桌面设置" /></div></td></tr>
			
			
			
			<script type="text/JavaScript">_attachEvent(document.documentElement, 'keydown', function (e) { entersubmit(e, 'editsubmit'); });</script></table>
</form>
 
</div>
</body>
</html>
