<?php
//桌面快捷方式
define('IN_ADMIN',True);
require_once('include/common.php');
get_login($_USER->id);
$Shortcut = "[InternetShortcut]
URL=".$_CONFIG->config_data('web')."
IDList=
[{000214A0-0000-0000-C000-000000000046}]
Prop3=19,2
";
Header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=天生创想OA.url;");
echo $Shortcut;
?>