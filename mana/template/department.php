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
<div class="container" id="cpcontainer"><div class="itemtitle"><h3>部门设置</h3></div>
<table class="tb tb2 " id="tips">
<tr><th  class="partition"><a href="javascript:;" onclick="show_all()">全部展开</a> | <a href="javascript:;" onclick="hide_all()">全部折叠</a> </th></tr></table>
<script type="text/JavaScript"> 
var forumselect = '<?php echo get_department_newinherited(0,0,0)?>';
var rowtypedata = [
	[[1, ''], [1,'<input type="text" class="txt" name="newpersno[]" value="" />', 'td25'], [5, '<div><input name="newname[]" value="顶级部门名称" size="20" type="text" class="txt" /><input type="hidden" name="newid[]" value="1" /><a href="javascript:;" class="deleterow" onClick="deleterow(this)">删除</a></div>']],
	[[1, ''], [1,'<input type="text" class="txt" name="newpersno[]" value="" />', 'td25'], [5, '<div class="board"><input name="newname[]" value="部门名称" size="20" type="text" class="txt" /><input type="hidden" name="newids[]" value="2" /><a href="javascript:;" class="deleterow" onClick="deleterow(this)">删除</a><select name="newinherited[]"><option value="">指定上级部门</option>' + forumselect + '</select></div>']],
	[[1, ''], [1,'<input type="text" class="txt" name="newpersno[]" value="" />', 'td25'], [5, '<div class="board"><input name="newname[]" value="部门名称" size="20" type="text" class="txt" /><input type="hidden" name="newids[]" value="2" /><a href="javascript:;" class="deleterow" onClick="deleterow(this)">删除</a><select name="newinherited[]"><option value="">指定上级部门</option>' + forumselect + '</select></div>']],
];
</script>
<form name="cpform" method="post" autocomplete="off" action="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&do=save" >
<!--menu star-->
<table class="tb tb2 ">
<!--title-->
<tr class="header"><th></th><th>负责人</th><th>名称</th><th></th><th>日期</th><th>操作</th></tr>
<!--one-->
<?php
global $db;
$query = $db->query("SELECT * FROM ".DB_TABLEPRE."department where father='0'  ORDER BY id Asc");
	while ($row = $db->fetch_array($query)) {
?>
<tr class="hover">
<td class="td25" onclick="toggle_group('group_<?php echo trim($row[id])?>', $('a_group_<?php echo trim($row[id])?>'))">
<a href="javascript:;" id="a_group_<?php echo trim($row[id])?>">[-]</a></td>
			<td class="td25"><input type="hidden" name="id[]" value="<?php echo trim($row[id])?>" /><input type="text" class="txt" name="persno[<?php echo trim($row[id])?>]" style="width:80px;" value="<?php echo trim($row[persno])?>" /></td>
			<td><div class="parentboard"><input type="text" style="width:160px;" name="name[<?php echo trim($row[id])?>]" value="<?php echo trim($row[name])?>" class="txt" /></div></td>
			<td class="td25 lightfont">(<?php echo trim($row[id])?>)</td>
			<td class="td23"><?php echo trim($row['date'])?>
		</td>
			<td width="160"><a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&do=update&id=<?php echo trim($row[id])?>&fid=<?php echo trim($row[father])?>" class="act">删除</a></td>
			</tr>
			
<!--view-->

<?php
get_department_list_save($row['id'],0,0,$ac,$fileurl);
?>


<!--add-->
			<tr><td></td><td colspan="4"><div class="lastboard"><a href="###" onclick="addrow(this, 1, 1)" class="addtr">添加新部门</a></div></td><td>&nbsp;</td></tr>
			
<?php
}
?>		
			
			
			
			
			
			
			
			
			<tr><td></td><td colspan="4"><div><a href="###" onclick="addrow(this, 0)" class="addtr">添加顶级部门</a></div></td><td class="bold"></td></tr><tr><td colspan="15"><div class="fixsel"><input type="submit" class="btn" id="submit_editsubmit" name="editsubmit" title="按 Enter 键可随时提交你的修改" value="提交" /></div></td></tr>
			
			
			
			<script type="text/JavaScript">_attachEvent(document.documentElement, 'keydown', function (e) { entersubmit(e, 'editsubmit'); });</script></table>
</form>
 
</div>
</body>
</html>
