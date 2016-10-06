<?php
/*
	[Office 515158] (C) 2009-2012 天生创想 Inc.
	$Id: function_knowledge.php 1209087 2012-01-08 08:58:28Z baiwei.jiang $
*/
!defined('IN_TOA') && exit('Access Denied!');
function get_oalog_type($type){
	switch ($type)
	{
		case 1:
		  echo "系统设置";
		  break;
		case 2:
		  echo "权限组设置";
		  break;
		case 3:
		  echo "用户帐号";
		  break;
		case 4:
		  echo "短消息";
		  break;
		case 5:
		  echo "电子邮件";
		  break;
		case 6:
		  echo "手机短信";
		  break;
		case 7:
		  echo "个人考勤";
		  break;
		case 8:
		  echo "个人假条";
		  break;
		case 9:
		  echo "通讯录";
		  break;
		case 10:
		  echo "工作日程";
		  break;
		case 11:
		  echo "工作日记";
		  break;
		case 12:
		  echo "工作计划";
		  break;
		case 13:
		  echo "新闻";
		  break;
		case 14:
		  echo "发文";
		  break;
		case 15:
		  echo "收文";
		  break;
		case 16:
		  echo "传真";
		  break;
		case 17:
		  echo "知识";
		  break;
		case 18:
		  echo "部门";
		  break;
		case 19:
		  echo "会议";
		  break;
		case 20:
		  echo "档案";
		  break;
		case 21:
		  echo "收藏";
		  break;
		case 22:
		  echo "图书";
		  break;
		case 23:
		  echo "办公用品";
		  break;
		case 24:
		  echo "固定资产";
		  break;
		case 25:
		  echo "岗位";
		  break;
		case 26:
		  echo "人事合同";
		  break;
		case 27:
		  echo "招聘管理";
		  break;
		case 28:
		  echo "培训计划";
		  break;
		case 29:
		  echo "奖惩记录";
		  break;
		case 30:
		  echo "论坛";
		  break;
		case 31:
		  echo "投票";
		  break;
		case 32:
		  echo "项目管理";
		  break;
		case 33:
		  echo "任务管理";
		  break;
		case 34:
		  echo "文档管理";
		  break;
		case 35:
		  echo "工作流";
		  break;
		default:
		  echo "错误类型";
	}
	return ;
}
function get_inc_app_types($fid=0){
    global $db;
	$html='';
	$sql="SELECT title FROM ".DB_TABLEPRE."app where id='".$fid."' ";
    $rowuser = $db->fetch_one_array($sql);
		$html .= $rowuser[title];
	return $html;
}
function get_inc_app_option_types($fid=0){
	global $db;
	$html='';
	$sql="SELECT title FROM ".DB_TABLEPRE."app_option where id='".$fid."'";
    $rowuser = $db->fetch_one_array($sql);
		$html .= $rowuser[title];
	return $html;
}
function get_inc_bbs_type($selid = 0) {
	global $db;
	$html = '';
	$sql = "SELECT id,name FROM ".DB_TABLEPRE."bbsclass";
	$query = $db->query($sql);
	while ($row = $db->fetch_array($query)) {
		$selstr = $row['id'] == $selid ? 'selected="selected"' : '';
		$html .= '<option value="'.$row['id'].'" '.$selstr.' >'.$row['name'].'</option>';
	}
	return $html;
}

//document_type
function get_document_type_list_save($fatherid=0,$selid=0,$layer=0,$ac,$fileurl,$type){
    global $db;
	$sql="SELECT * FROM ".DB_TABLEPRE."document_type where father='$fatherid' and type='".$type."' ORDER BY id Asc";
	$query = $db->query($sql);
	echo '<tbody id="group_'.trim($fatherid).'">';
	if(count($query)>0){
		while ($row = $db->fetch_array($query)) {
			$rsfno = $db->fetch_one_array("SELECT * FROM ".DB_TABLEPRE."document_type where father='".$row[id]."' and type='".$type."' ORDER BY id asc limit 0,1");
			echo '<tr class="hover">';
			echo '<td class="td25"></td>';
			echo '<td class="td25"><input type="hidden" name="id[]" value="'.trim($row[id]).'" />'.trim($row[id]).'</td>';
			echo '<td><div class="board"><input type="text" name="name['.trim($row[id]).']" ';
			echo 'value="'.trim($row[title]).'" style="width:160px;" class="txt" />';
			echo '  <a href="###" onclick="addrowdirect = 1;addrow(this, 2, 2)" ';
			echo 'class="addchildboard">添加下级文件夹</a></div></td>';
			echo '<td class="td25 lightfont"></td>';
			echo '<td class="td23">'.trim($row['date']).'</td>';
			echo '<td width="160"><a href="admin.php?ac='.$ac.'&fileurl='.$fileurl.'&do=documenttype&view=typeupdate&id='.trim($row[id]).'&fid='.trim($row[father]).'&type='.$type.'" class="act">删除</a></td></tr>';
	
			if($rsfno[id]!=''){
				get_document_type_list_save_view($row['id'],$selid,$layer+1,$ac,$fileurl,$type);
			}
		}
	}
   echo '</tbody>';
   return ;

}
function get_document_type_list_save_view($fatherid=0,$selid=0,$layer=0,$ac,$fileurl,$type){
    global $db;
	$sql="SELECT * FROM ".DB_TABLEPRE."document_type where father='$fatherid' and type='".$type."' ORDER BY id Asc";
	$query = $db->query($sql);
	if(count($query)>0){
		for($i=0;$i<$layer;$i++){
		   $str.="&nbsp;&nbsp;&nbsp;&nbsp;";
		   }
		while ($row = $db->fetch_array($query)) {
			$rsfno = $db->fetch_one_array("SELECT * FROM ".DB_TABLEPRE."document_type where father='".$row[id]."' and type='".$type."' ORDER BY id asc limit 0,1");
			echo'<tr class="hover"><td class="td25"></td>';
			echo'<td class="td25"><input type="hidden" name="id[]" value="'.trim($row[id]).'" />'.trim($row[id]).'</td>';
			echo'<td><div id="cb_'.trim($row[id]).'" class="childboard">';
			echo''.$str.'<input type="text" name="name['.trim($row[id]).']" ';
			echo 'value="'.trim($row[title]).'" style="width:160px;" class="txt" />';
			echo '</div></td>';
			echo'<td class="td25 lightfont"></td>';
			echo '<td class="td23">'.trim($row['date']).'</td>';
			echo'<td width="160">';
			echo'<a href="admin.php?ac='.$ac.'&fileurl='.$fileurl.'&do=documenttype&view=typeupdate&id='.trim($row[id]).'&fid='.trim($row[father]).'&type='.$type.'" class="act">删除</a></td></tr>';
			if($rsfno[id]!=''){
				get_document_type_list_save_view($row['id'],$selid,$layer+1,$ac,$fileurl,$type);
			}
			
		}
	}
   return ;

}
function get_document_type_newinherited($fatherid=0,$selid=0,$layer=0,$type){
	$str="";
    global $db;
	$query = $db->query("SELECT * FROM ".DB_TABLEPRE."document_type where father='$fatherid' and type='".$type."' ORDER BY id Asc");
	if(count($query)>0){
	   for($i=0;$i<$layer;$i++){
	   
	   $str.="├";
	   }
		while ($row = $db->fetch_array($query)) {
			$selstr = $row['id'] == $selid ? 'selected="selected"' : '';
			$htmlstr= '<option value="'.$row['id'].'"  '.$selstr.'>'.$str.$row['title'].'</option>';
			echo $htmlstr;
				get_document_type_newinherited($row['id'],$selid,$layer+1,$type);
		}

	}
   return ;

}
function get_document_list($fatherid=0,$selid=0,$layer=0,$ac,$fileurl)
{

    
    global $db;
	$query = $db->query("SELECT * FROM ".DB_TABLEPRE."document_type where father='$fatherid' and type='".$_GET[type]."' ORDER BY id Asc  ");
	
	if(count($query)>0){
	   //for($i=0;$i<$layer;$i++){
	   
	   //$str.="<TD class=MemoTD width=20>&nbsp;</TD>";
	   
	   //}
	while ($row = $db->fetch_array($query)) {
	$rsfno = $db->fetch_one_array("SELECT * FROM ".DB_TABLEPRE."document_type where father='".$row[id]."' and type='".$_GET[type]."'  ORDER BY id desc limit 0,1");

	echo "a.add(".$row[id].",".$fatherid.",'".$row[title]."','admin.php?ac=".$ac."&fileurl=".$fileurl."&type=".$_GET[type]."&documentid=".$row[id]."');";

	if($rsfno[id]!=''){
	get_document_list($row['id'],$selid,$layer+1,$ac,$fileurl);
	}
	}
	}
	
   return ;

}
//读取文件夹
function GET_INC_document_type_USER_NAME($fid=0)
{
    global $db;
	$html='';
	$query = $db->query("SELECT title FROM ".DB_TABLEPRE."document_type where id='".$fid."'   ORDER BY id desc limit 0,1");
	while ($rowuser = $db->fetch_array($query)) {
		$html .= $rowuser[title];
	}
	return $html;
}
function GET_document_PUBLIC_LIST($fatherid=0,$selid=0,$layer=0,$strid=0,$uid=0)
{

	if($_GET[type]=='1'){
			$wheresql=" and uid='".$uid."'";
	}
	$str="";
    global $db;
	$query = $db->query("SELECT * FROM ".DB_TABLEPRE."document_type where father='$fatherid' and type='".$_GET["type"]."' $wheresql ORDER BY id Asc  ");
	
	if(count($query)>0){
	   for($i=0;$i<$layer;$i++){
	   
	   $str.="├";
	   }
	while ($row = $db->fetch_array($query)) {
	
	if($strid!='0'){
		$strnum=$strid.",".$row['id'];
		$strnumselect="0,".$strid.",".$row['id'];
	}
	else{
		$strnum=$row['id'];
		$strnumselect="0,".$row['id'];
	}

	$selstr = $strnumselect == $selid ? 'selected="selected"' : '';
	
	$htmlstr= '<option value="0,'.$strnum.'"  '.$selstr.'>'.$str.$row['title'].'</option>';
	
	echo $htmlstr;
    
	GET_document_PUBLIC_LIST($row['id'],$selid,$layer+1,$strnum);
	
	}

	}
	
   return ;

}
?>