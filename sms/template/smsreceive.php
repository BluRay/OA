<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
<link href="themes01/default/clientPublic.css" rel="stylesheet" type="text/css"/>
<link href="themes01/default/codeMgr.css" rel="stylesheet" type="text/css"/>
<link href="themes01/default/tabSwitch.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="javascripts01/jquery.js"></script>
<script type="text/javascript" src="javascripts01/common.js"></script>
<script language="javascript" type="text/javascript" src="DatePicker/WdatePicker.js"></script>
<title>Office 515158 2011 OA办公系统</title>
 
</head>
<body>
<div id="Holder">
<div id="MainPage">

 
 
<div id="Subnav">
 
<ul>
<?php
$nums=18;
global $db;
$query = $db->query("SELECT * FROM ".DB_TABLEPRE."menu where fatherid='3' and menutype='0'   ORDER BY menunum Asc");
	while ($row = $db->fetch_array($query)) {
?>
<li><a href="<?php echo $row[menuurl]?>"  <? if($nums==$row[menuid]){?> id="Subnavb"<? }?>><?php echo $row[menuname]?></a></li>
<?php
	}
?>


</ul>
</div>
<div id="MainBody">
<form name="update" method="post" action="admin.php?ac=smsreceive&fileurl=sms">
<div id="CodeWrap">
<div id="TabSwitch">
<ul>

<li><a href="admin.php?ac=smsindex&fileurl=sms">已发短信</a></li>
<li class="active"><a href="admin.php?ac=smsreceive&fileurl=sms">短信收取</a></li>
<li><a href="admin.php?ac=channel_edit&fileurl=sms">接口配置</a></li>
<li>
<img src="themes01/default/images/addicon.gif" width="10" height="10" />&nbsp;<a href="admin.php?ac=smsadd&fileurl=sms">发送短信</a></li></ul>

 
</div>
<div id="CodeShowBlockWrap">
<div id="QueryBar">
<div id="FilterWrap">
<label for="FilterStatus"><table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
  <tr>
    <td width="15%"><input type="checkbox" class="checkbox" value="1" name="chkall" onClick="check_all(this)" /><b>全选</b>&nbsp;&nbsp;<input type="submit" name="do" id="button" value="删 除"/></td>
    <td width="85%" align="left" class="multipage"><?php echo showpage($num,$pagesize,$page,$url)?></td>
  </tr>
</table>
</label>
</div>
</div>

<div id="CodeShowBlock">
<table cellpadding="0" cellspacing="0" class="data-box"><thead>
<tr class="border-in"><th width="36"><div>选项</div></th><th class="title"><div>发送人手机</div></th><th class="status"><div>接收时间</div></th><th class="scale"><div>内容</div></th>
</tr>
</thead><tbody>

<?foreach ($result as $row) {?>
<tr class="data-box-row"><td width="36" align="center"><input type="checkbox" name="id[]" value="<?php echo $row['id']?>" class="checkbox" /></td>
<td class="title"><?php echo $row['sendphone']?></td><td class="status"><?php echo $row['date']?></td>

<td width="600"><?php echo $row['content']?></td></tr>
<?}?>


</tbody></table>
 
</div>
<div id="PageControl">
<div class="page-control">
<div class="border-in">
<table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
  <tr>
    <td width="15%">&nbsp;&nbsp;<input type="checkbox" class="checkbox" value="1" name="chkall" onClick="check_all(this)" /><b>全选</b>&nbsp;&nbsp;<input type="submit" name="do" id="button" value="删 除"/></td>
    <td width="85%" align="left" class="multipage"><?php echo showpage($num,$pagesize,$page,$url)?></td>
  </tr>
</table>
  

</div>
</div>
</div>
</div>
</div>
 </form>
</div>
</div>
</div>
 
<script language="javascript" src="javascripts01/tangram-1.3.1.js" type="text/javascript"></script>
<script language="javascript" src="javascripts01/elf.js" type="text/javascript"></script>
<script language="javascript" src="javascripts01/union.js" type="text/javascript"></script>
<script language="javascript" src="javascripts01/codeMgr.js" type="text/javascript"></script>
 
</body>
</html>
