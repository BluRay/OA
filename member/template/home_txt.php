<html>
<head>
<title>模块设置</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="template/default/content/css/style.css">
<script language="javascript" type="text/javascript" src="DatePicker/WdatePicker.js"></script>
</head>
<body class="bodycolor">
<table width="50%" border="0" align="center" cellpadding="3" cellspacing="0" class="small">
  <tr>
    <td class="Big"><img src="template/default/content/images/notify_new.gif" align="absmiddle"><span class="big3"> 模块设置</span>
    </td>
  </tr>
</table>
<script> 
function func_insert()
{
 for (i=0; i<document.form1.select2.options.length; i++)
 {
   if(document.form1.select2.options[i].selected)
   {
     option_text=document.form1.select2.options[i].text;
     option_value=document.form1.select2.options[i].value;
     option_style_color=document.form1.select2.options[i].style.color;
 
     var my_option = document.createElement("OPTION");
     my_option.text=option_text;
     my_option.value=option_value;
     my_option.style.color=option_style_color;
 
     pos=document.form1.select2.options.length;
     document.form1.select1.options.add(my_option,pos);
     document.form1.select2.remove(i);
     i--;
  }
 }//for
}
 
function func_delete()
{
 for (i=0;i<document.form1.select1.options.length;i++)
 {
   if(document.form1.select1.options[i].selected)
   {
     option_text=document.form1.select1.options[i].text;
     option_value=document.form1.select1.options[i].value;
 
     var my_option = document.createElement("OPTION");
     my_option.text=option_text;
     my_option.value=option_value;
 
     if(option_text.indexOf("[必选]")>0)
        continue;//  return;
     pos=document.form1.select2.options.length;
     document.form1.select2.options.add(my_option,pos);
     document.form1.select1.remove(i);
     i--;
  }
 }//for
}
 
function func_select_all1()
{
 for (i=document.form1.select1.options.length-1; i>=0; i--)
   document.form1.select1.options[i].selected=true;
}
 
function func_select_all2()
{
 for (i=document.form1.select2.options.length-1; i>=0; i--)
   document.form1.select2.options[i].selected=true;
}
 
function func_up()
{
  sel_count=0;
  for (i=document.form1.select1.options.length-1; i>=0; i--)
  {
    if(document.form1.select1.options[i].selected)
       sel_count++;
  }
 
  if(sel_count==0)
  {
     alert("调整桌面模块的顺序时，请选择其中一项！");
     return;
  }
  else if(sel_count>1)
  {
     alert("调整桌面模块的顺序时，只能选择其中一项！");
     return;
  }
 
  i=document.form1.select1.selectedIndex;
 
  if(i!=0)
  {
    var my_option = document.createElement("OPTION");
    my_option.text=document.form1.select1.options[i].text;
    my_option.value=document.form1.select1.options[i].value;
 
    document.form1.select1.options.add(my_option,i-1);
    document.form1.select1.remove(i+1);
    document.form1.select1.options[i-1].selected=true;
  }
}
 
function func_down()
{
  sel_count=0;
  for (i=document.form1.select1.options.length-1; i>=0; i--)
  {
    if(document.form1.select1.options[i].selected)
       sel_count++;
  }
 
  if(sel_count==0)
  {
     alert("调整桌面模块的顺序时，请选择其中一项！");
     return;
  }
  else if(sel_count>1)
  {
     alert("调整桌面模块的顺序时，只能选择其中一项！");
     return;
  }
 
  i=document.form1.select1.selectedIndex;
 
  if(i!=document.form1.select1.options.length-1)
  {
    var my_option = document.createElement("OPTION");
    my_option.text=document.form1.select1.options[i].text;
    my_option.value=document.form1.select1.options[i].value;
 
    document.form1.select1.options.add(my_option,i+2);
    document.form1.select1.remove(i);
    document.form1.select1.options[i+1].selected=true;
  }
}
 
function mysubmit()
{
   fld_str="";
   for (i=0; i< document.form1.select1.options.length; i++)
   {
      options_value=document.form1.select1.options[i].value;
      fld_str+=options_value+",";
    }
 
   location="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&do=home_txt&view=edit&home_txt=" + fld_str;
}
</script>

<form name="form1" method="post" action="?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&do=save">
<table class="TableBlock" border="0" width="50%" align="center" style="margin-top:20px;">
	<tr>
      <td width="10%" align="center" nowrap class="TableHeader"> 
      排序按钮    </td>
      <td width="40%" align="center" class="TableHeader">己选内容</td>
      <td width="10%" align="center" class="TableHeader">
	  操作按钮	  </td>
      <td width="40%" align="center" class="TableHeader">备选内容</td>
    </tr>
	<tr>
      <td width="10%" align="center" nowrap class="TableContent"> 
       <input type="button" value=" ↑ " onClick="func_up();" style="font-size:26px; height:60px;">
      <br>
      <br>
      <input type="button" style="font-size:26px; height:60px;" value=" ↓ " onClick="func_down();">    </td>
      <td width="40%" align="center" class="TableData"><select  name="select1" ondblclick="func_delete();" MULTIPLE style="width:200;height:280">
	  <?php
	  if($bghome['home_txt']!=''){
		  $_txt=substr($bghome['home_txt'], 0, -1);
		  $_txt=explode(',',$_txt); 
		  for($i=0;$i<sizeof($_txt);$i++){
		  ?>
		   <option value="<?php echo $_txt[$i];?>"><?php echo home_txt($_txt[$i]);?></option>
		  <?php
		  }
	  }
	  ?>
    </select>
    <!--<input type="button" value=" 全选 " onClick="func_select_all1();" class="SmallButton"> --></td>
      <td width="10%" align="center" class="TableContent">
	  <input type="button" style="font-size:26px; height:40px;" value=" ← " onClick="func_insert();">
      <br><br>
      <input type="button" style="font-size:26px; height:40px;" value=" → " onClick="func_delete();">	  </td>
      <td width="40%" align="center" class="TableData"><select  name="select2" ondblclick="func_insert();" MULTIPLE style="width:200;height:280">
	  <?php
	  for($i=0;$i<sizeof($txt);$i++){
		  if(sizeof(explode($txt[$i],$bghome['home_txt']))==1){
		  ?>
		   <option value="<?php echo $txt[$i];?>"><?php echo $txtname[$i];?></option>
		  <?php 
		  }
	  }?>
    </select></td>
    </tr>
	
	<tr>
      <td colspan="4" align="center" nowrap class="TableContent"><input type="button" class="BigButton" value="保存设置" onClick="mysubmit();">
</td>
    </tr>
</table>
  
</form>

 
</body>
</html>
