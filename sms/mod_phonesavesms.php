<?php
//公司通迅录
$smsname="0";
$smsphone="0";
$department = $_POST['vid'];   
for($i=0;$i<count($department);$i++)
{
$smsname=$smsname.",".$_POST['sms'.$department[$i].''];
$smsphone=$smsphone.",".$_POST['phone'.$department[$i].''];
}
//公共通迅录
$c1smsname="0";
$c1smsphone="0";
$c1department = $_POST['c1vid'];   
for($i=0;$i<count($c1department);$i++)
{
$c1smsname=$c1smsname.",".$_POST['c1sms'.$c1department[$i].''];
$c1smsphone=$c1smsphone.",".$_POST['c1phone'.$c1department[$i].''];
}
//过滤信息
$rename=str_replace("0,"," ",$smsname).",".str_replace("0,"," ",$c1smsname);
$rephone=str_replace("0,"," ",$smsphone).",".str_replace("0,"," ",$c1smsphone);


echo "<script>window.opener.document.save.receiveperson.value='".str_replace(",0"," ",$rename)."';</script>";
echo "<script>window.opener.document.save.receivephone.value='".str_replace(",0"," ",$rephone)."';</script>";
//echo '您选择了'.str_replace("0,"," ",$smsname).'';
echo '<script language="JavaScript">window.close()</script>';
?>
<!--<input type="button" onclick="window.close()"  value="关闭"/> -->
