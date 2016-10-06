<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
<link href="themes01/default/clientPublic.css" rel="stylesheet" type="text/css"/>
<link href="themes01/default/codeMgr.css" rel="stylesheet" type="text/css"/>
<link href="themes01/default/tabSwitch.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="javascripts01/jquery.js"></script>
<script type="text/javascript" src="javascripts01/common.js"></script>
<title>Office 515158 2011 OA办公系统</title>
 
</head>
<body>
<div id="MainBody" style="width:680px;float:left;height:300px;overflow:hidden;overflow-y:scroll;">
<form name="update" method="post" action="admin.php?ac=sms_receive&fileurl=sms&type=<?php echo $_GET["type"]?>">
<div id="CodeWrap" style="width:640px;">
<div id="TabSwitch" style="width:640px;">
<ul>
<li <?php if($_GET["type"]==''){?>class="active"<?php }?>><a href="admin.php?ac=sms_receive&fileurl=sms">所有消息</a></li>
<li <?php if($_GET["type"]=='1'){?>class="active"<?php }?>><a href="admin.php?ac=sms_receive&fileurl=sms&type=1">系统提示</a></li>
<li <?php if($_GET["type"]=='2'){?>class="active"<?php }?>><a href="admin.php?ac=sms_receive&fileurl=sms&type=2">短消息</a></li>
</ul>

 
</div>
<div id="CodeShowBlockWrap" style="width:640px;">

<div id="CodeShowBlock" style="width:640px;">
<table cellpadding="0" cellspacing="0" class="data-box">
<thead>

<tr><th colspan="4" bgcolor="#FFFFFF">&nbsp;&nbsp;<input type="submit" name="do" id="button" value="标志为己读"/>&nbsp;&nbsp;<input type="submit" name="do" id="button" value="删 除"/></th>
</tr>

<tr class="border-in"><th width="18"><div><input type="checkbox" class="checkbox" value="1" name="chkall" onClick="check_all(this)" /></div></th>
<th width="60"><div>发送人</div></th>
<th width="80"><div>发送时间</div></th>
<th width="480"><div>内容</div></th>
</tr>



</thead><tbody>

<?foreach ($result as $row) {?>
<tr class="data-box-row"><td width="18"><input type="checkbox" name="id[]" value="<?php echo $row['id']?>" class="checkbox" /></td>
<td width="60"><?php echo get_realname($row['sendperson'])?></td>
<td width="80"><?php echo $row['date']?></td>
<td width="480"><?php echo $row['content']?></td>
</tr>
<?}?>


</tbody></table>
 
</div>
<div id="PageControl">
<div class="page-control">
<div class="border-in" style="width:640px;">
<table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
  <tr>
    <td width="45%" align="left"><input type="checkbox" class="checkbox" value="1" name="chkall" onClick="check_all(this)" /><b>全选</b>&nbsp;&nbsp;<input type="submit" name="do" id="button" value="标志为己读"/>&nbsp;&nbsp;<input type="submit" name="do" id="button" value="删 除"/></td>
    <td width="55%" align="left"></td>
  </tr>
</table>
  

</div>
</div>
</div>
</div>
</div>
 </form>
</div>

 
<script language="javascript" src="javascripts01/tangram-1.3.1.js" type="text/javascript"></script>
<script language="javascript" src="javascripts01/elf.js" type="text/javascript"></script>
<script language="javascript" src="javascripts01/union.js" type="text/javascript"></script>
<script language="javascript" src="javascripts01/codeMgr.js" type="text/javascript"></script>
 
</body>
</html>
