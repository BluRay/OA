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
<div class="container" id="cpcontainer"><div class="itemtitle"><h3>部门选择</h3></div>
<table class="tb tb2 " id="tips">
<tr><th  class="partition"><a href="javascript:;" onclick="show_all()">全部展开</a> | <a href="javascript:;" onclick="hide_all()">全部折叠</a> </th></tr></table>

<form name="cpform" method="post" autocomplete="off" action="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&do=save" >
<!--menu star-->
<table class="tb tb2 ">
<!--title-->
<tr class="header"><th></th><th>名称</th><th>操作</th></tr>
<!--one-->
<?php
global $db;
$query = $db->query("SELECT * FROM ".DB_TABLEPRE."department where father='0'  ORDER BY id Asc");
	while ($row = $db->fetch_array($query)) {
?>
<tr class="hover">
<td onclick="toggle_group('group_<?php echo trim($row[id])?>', $('a_group_<?php echo trim($row[id])?>'))" width="20">
<a href="javascript:;" id="a_group_<?php echo trim($row[id])?>">[-]</a></td>
			<td width="400"><?php echo trim($row[name])?></td>
		</td>
			<td width="50"><a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&do=add&id=<?php echo trim($row[id])?>&name=<?php echo trim($row[name])?>&inputname=<?php echo trim($_GET[inputname])?>" class="act">+选择</a></td>
			</tr>
			
<!--view-->

<?php
public_list($row['id'],0,0,$ac,$fileurl);
?>

			
<?php
}
?>		

			
			
			
			<script type="text/JavaScript">_attachEvent(document.documentElement, 'keydown', function (e) { entersubmit(e, 'editsubmit'); });</script></table>
</form>
 
</div>
</body>
</html>
