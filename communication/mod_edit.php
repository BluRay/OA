<?php
(!defined('IN_TOA') || !defined('IN_ADMIN')) && exit('Access Denied!');

get_key("office_communication_edit");
empty($do) && $do = 'list';
if ($do == 'edit') {
	$id = getGP('id','G','int');
	$communication = $db->fetch_one_array("SELECT * FROM ".DB_TABLEPRE."communication  WHERE id = '$id' ");
	include_once('template/edit.php');

} elseif ($do == 'save') {
	
	$savetype = getGP('savetype','P');
	$id = getGP('id','P','int');
	$company = getGP('company','P');
	$person = getGP('person','P');
	$tel = getGP('tel','P');
	$phone = getGP('phone','P');
	$fax = getGP('fax','P');
	$mail = getGP('mail','P');
	$zipcode = getGP('zipcode','P');
	$address = getGP('address','P');
	$position = getGP('position','P');
	$sex = getGP('sex','P');
	$msn = getGP('msn','P');
	$date = get_date('Y-m-d h:i:s',PHP_TIME);
	$type = getGP('type','P');
	$uid=$_USER->id;
	$communication = array(
		'company' => $company,
		'person' => $person,
		'tel' => $tel,
		'phone' => $phone,
		'fax' => $fax,
		'mail' => $mail,
		'zipcode' => $zipcode,
		'address' => $address,
		'position' => $position,
		'sex' => $sex,
		'msn' => $msn
	);
	update_db('communication',$communication, array('id' => $id));
	$content=serialize($communication);
	$title='编辑通迅录';
	get_logadd($id,$content,$title,9,$_USER->id);
	show_msg('编辑通迅录成功！', 'admin.php?ac=index&fileurl=communication&type='.$type.'');	
	

}

?>