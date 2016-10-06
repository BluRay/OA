<html>
<head>
<title>系统信息配置</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="template/default/content/css/style.css">
</head>
<body class="bodycolor" <?php if($_CONFIG->config_data('sworknum')=='0'){?>onLoad="toggle2('div1');"<?php }?>>
<table width="90%" border="0" align="center" cellpadding="3" cellspacing="0" class="small">
  <tr>
    <td class="Big"><img src="template/default/content/images/notify_new.gif" align="absmiddle"><span class="big3"> 系统信息配置</span>
    </td>
  </tr>
</table>
<script Language="JavaScript"> 
function CheckForm()
{
   if(document.save.savetype.value=="")
   { alert("公司名称不能为空！");
     document.save.savetype.focus();
     return (false);
   }
   return true;
}
function sendForm()
{
   if(CheckForm())
      document.save.submit();
}
 function toggle(targetid){
     if (document.getElementById){
         target=document.getElementById(targetid);
             if (target.style.display=="block"){
                 target.style.display="none";
             } else {
                 target.style.display="none";
             }
     }
}
function toggle2(targetid){
     if (document.getElementById){
         target=document.getElementById(targetid);
             if (target.style.display=="none"){
                 target.style.display="block";
             } else {
                 target.style.display="block";
             }
     }
}

</script>
<style type="text/css"> 
#div1{
display:none;
margin-top:5px;}
</style>

<form name="save" method="post" action="?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&do=save">
<input type="hidden" name="savetype" value="edit" />
 <table class="TableBlock" border="0" width="90%" align="center">
  	<tr>
  		<td nowrap class="TableContent" width="90">软件名称：<span style="color:red">(*)</span></td>
  	  <td class="TableData">
  	  	<input type="text" class="BigInput" name="value[name]" value="<?php echo $_CONFIG->config_data('name')?>" size=40>
		<input type="hidden" name="name[]" value="name" />
  	  </td>  	  	
  		<td nowrap class="TableContent" width="90">软件网址：<span style="color:red">(*)</span></td>
  	  <td class="TableData"><input type="text" class="BigInput" name="value[web]" value="<?php echo $_CONFIG->config_data('web')?>" size=30>
	  <input type="hidden" name="name[]" value="web" /></td>  	  	
  	</tr>
    <tr>
  		<td nowrap class="TableContent">显示数量：</td>
  	  <td class="TableData">
		<input type="text" class="BigInput" name="value[pagenum]" value="<?php echo $_CONFIG->config_data('pagenum')?>" size=10 onKeyUp="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')">
		<input type="hidden" name="name[]" value="pagenum" />
		
  	  </td>
  		<td nowrap class="TableContent">系统运行时间：<span style="color:red">(*)</span></td>
  	  <td class="TableData"> 
	  	<input type="hidden" name="name[]" value="opendate" />
  	    <select name="value[opendate]" style="width:80px;">
			<?php 
			for($i=0;$i<=23;$i++)
			{
				echo '<option value="'.$i.'"  ';
				if ($_CONFIG->config_data('opendate')==$i)
				{
				echo 'selected="selected"';
				}
				echo '>'.$i.'</option>';
			}
			?>
			  </select>
       至        <select name="value[enddate]" style="width:80px;">
			<?php 
			for($i=0;$i<=24;$i++)
			{
				echo '<option value="'.$i.'"  ';
				if ($_CONFIG->config_data('enddate')==$i)
				{
				echo 'selected="selected"';
				}
				echo '>'.$i.'</option>';
			}
			?>
			  </select> 点 <span>不选择为24小时开启</span>
			  <input type="hidden" name="name[]" value="enddate" />
     
      </td>
  	</tr>
  	<tr>
  		<td nowrap class="TableContent">签到次数</td>
  	  <td class="TableData">
	  <input type="hidden" name="name[]" value="sworknum" />
		<input type="radio" name="value[sworknum]" id="visible1" value="1" class="checkbox" <?php echo ($_CONFIG->config_data('sworknum') ? 'checked="checked"' : '')?> onClick="toggle('div1')" />二次
		 <input type="radio" name="value[sworknum]" id="sworknum" value="0" class="checkbox" <?php echo (!$_CONFIG->config_data('sworknum') ? 'checked="checked"' : '')?> onClick="toggle2('div1')" />四次</td>	  	
     <td nowrap class="TableContent">工作时间：</td>
     <td nowrap class="TableData">
	 <input type="hidden" name="name[]" value="swork" />
     	 <select name="value[swork]" style="width:80px;">
			<?php 
			for($i=5;$i<=15;$i++)
			{
				echo '<option value="'.$i.':00"  ';
				if ($_CONFIG->config_data('swork')==$i.':00')
				{
				echo 'selected="selected"';
				}
				echo '>'.$i.':00</option>';
				echo '<option value="'.$i.':30"  ';
				if ($_CONFIG->config_data('swork')==$i.':30')
				{
				echo 'selected="selected"';
				}
				echo '>'.$i.':30</option>';
			}
			?>
			  </select>
			到：
			<input type="hidden" name="name[]" value="ework" />
		  <select name="value[ework]" style="width:80px;">
			<?php 
			for($i=11;$i<=23;$i++)
			{
				echo '<option value="'.$i.':00"  ';
				if ($_CONFIG->config_data('ework')==$i.':00')
				{
				echo 'selected="selected"';
				}
				echo '>'.$i.':00</option>';
				echo '<option value="'.$i.':30"  ';
				if ($_CONFIG->config_data('ework')==$i.':30')
				{
				echo 'selected="selected"';
				}
				echo '>'.$i.':30</option>';
			}
			?>
			  </select> 点<br>
			  <span id="div1">
			  <input type="hidden" name="name[]" value="swork1" />
     	 <select name="value[swork1]" style="width:80px;">
			<?php 
			for($i=10;$i<=18;$i++)
			{
				echo '<option value="'.$i.':00"  ';
				if ($_CONFIG->config_data('swork1')==$i.':00'){
					echo 'selected="selected"';
				}
				echo '>'.$i.':00</option>';
				echo '<option value="'.$i.':30"  ';
				if ($_CONFIG->config_data('swork1')==$i.':30'){
					echo 'selected="selected"';
				}
				echo '>'.$i.':30</option>';
			}
			?>
			  </select>
			到：
			<input type="hidden" name="name[]" value="ework1" />
		  <select name="value[ework1]" style="width:80px;">
			<?php 
			for($i=0;$i<=23;$i++)
			{
				echo '<option value="'.$i.':00"  ';
				if ($_CONFIG->config_data('ework1')==$i.':00')
				{
				echo 'selected="selected"';
				}
				echo '>'.$i.':00</option>';
				echo '<option value="'.$i.':30"  ';
				if ($_CONFIG->config_data('ework1')==$i.':30')
				{
				echo 'selected="selected"';
				}
				echo '>'.$i.':30</option>';
			}
			?>
			  </select> 点</span>
			  
			  <span>指公司正常上下班时间，员工打卡就按此时间执行</span>
     </td>
  	</tr>
  	<tr>
  		<td nowrap class="TableContent">工作流：</td>
  	  <td class="TableData">
	  <input type="hidden" name="name[]" value="configwork" />
		<input type="radio" name="value[configwork]"  value="1" class="checkbox" <?php echo ($_CONFIG->config_data('configwork') ? 'checked="checked"' : '')?> />开启 <input type="radio" name="value[configwork]" id="configwork" value="0" class="checkbox" <?php echo (!$_CONFIG->config_data('configwork') ? 'checked="checked"' : '')?> />关闭<br>注：是否开启工作流文本框编辑器，不开启将为文本框</td>	  	
     <td nowrap class="TableContent">OFFICE套件：</td>
     <td nowrap class="TableData">
	  <input type="hidden" name="name[]" value="configoffice" />
		<input type="radio" name="value[configoffice]"  value="1" class="checkbox" <?php echo ($_CONFIG->config_data('configoffice') ? 'checked="checked"' : '')?> />开启 <input type="radio" name="value[configoffice]" id="configoffice" value="0" class="checkbox" <?php echo (!$_CONFIG->config_data('configoffice') ? 'checked="checked"' : '')?> />关闭<br>注：必需在购买了OFFICE办公组件安装成功后才可开启，否则无效
     </td>
  	</tr>
	
	
	<tr>
  		<td nowrap class="TableContent">短消息：</td>
  	  <td class="TableData">
	  审批人员提示：
	  <input type="hidden" name="name[]" value="configinfo" />
		<input type="radio" name="value[configinfo]"  value="1" class="checkbox" <?php echo ($_CONFIG->config_data('configinfo') ? 'checked="checked"' : '')?> />开启 <input type="radio" name="value[configinfo]" id="configinfo" value="0" class="checkbox" <?php echo (!$_CONFIG->config_data('configinfo') ? 'checked="checked"' : '')?> />关闭<br>
		
		其它人员提示：  <input type="hidden" name="name[]" value="configinfoview" />
		<input type="radio" name="value[configinfoview]"  value="1" class="checkbox" <?php echo ($_CONFIG->config_data('configinfoview') ? 'checked="checked"' : '')?> />开启 <input type="radio" name="value[configinfoview]" id="configinfo" value="0" class="checkbox" <?php echo (!$_CONFIG->config_data('configinfoview') ? 'checked="checked"' : '')?> />关闭<br>
		注：关闭后，在提交表单或工作流转时将不出现短消息提示功能<br>
		</td>	  	
     <td nowrap class="TableContent">手机短信：</td>
     <td nowrap class="TableData">
	  <input type="hidden" name="name[]" value="configsms" />
		<input type="radio" name="value[configsms]"  value="1" class="checkbox" <?php echo ($_CONFIG->config_data('configsms') ? 'checked="checked"' : '')?> />开启 <input type="radio" name="value[configsms]" id="configsms" value="0" class="checkbox" <?php echo (!$_CONFIG->config_data('configsms') ? 'checked="checked"' : '')?> />关闭<br>注：关闭后，在提交表单或工作流转时将不出现手机短信提示功能
     </td>
  	</tr>
  	
	<tr>
  		<td nowrap class="TableContent">系统开关：</td>
  	  <td class="TableData"><input type="hidden" name="name[]" value="configflag" />
		<input type="radio" name="value[configflag]" id="visible1" value="1" class="checkbox" <?php echo ($_CONFIG->config_data('configflag') ? 'checked="checked"' : '')?> /><label for="visible1">开启</label> <input type="radio" name="value[configflag]" id="configflag" value="0" class="checkbox" <?php echo (!$_CONFIG->config_data('configflag') ? 'checked="checked"' : '')?> /><label for="visible0">关闭</label>
	  </td>	  	
     <td nowrap class="TableContent"></td>
     <td nowrap class="TableData">
	 
     </td>
  	</tr>
	
	
	
	
    <tr>
  		<td nowrap class="TableContent">关闭原因：</td>
  	  <td class="TableData" colspan="3">
	  <input type="hidden" name="name[]" value="closereason" />
<textarea name="value[closereason]" rows="5" cols="50"><?php echo $_CONFIG->config_data('closereason')?></textarea>
  	  </td>
  	</tr>
    
    <tr align="center" class="TableControl">
    	<td colspan="4" nowrap>
    	<input type="button" value="保存" class="BigButtonBHover" onClick="sendForm();">&nbsp;
 
	    </td>
  </tr>
 </table>
  
</form>

 
</body>
</html>
