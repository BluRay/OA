<?php
(!defined('IN_TOA') || !defined('IN_ADMIN')) && exit('Access Denied!');

get_key("office_communication_Increase");
empty($do) && $do = 'list';
if ($do == 'list') {
	include_once('template/add.php');

} elseif ($do == 'save') {
	
	$savetype = getGP('savetype','P');
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
	
	
	//主表信息
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
		'msn' => $msn,
		'type' => $type,
		'date' => $date,
		'uid' => $uid
	);
	//写入主表信息
	insert_db('communication',$communication);
	$id=$db->insert_id();
	$content=serialize($communication);
	$title='添加通迅录';
	get_logadd($id,$content,$title,9,$_USER->id);
	show_msg('添加通迅录成功！', 'admin.php?ac=index&fileurl=communication&type='.$type.'');	

}
?>