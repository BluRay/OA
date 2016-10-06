<?php
/*
	[Office 515158] (C) 2009-2012 天生创想 Inc.
	$Id: mod_user.php 1209087 2012-01-08 08:58:28Z baiwei.jiang $
*/
(!defined('IN_TOA') || !defined('IN_ADMIN')) && exit('Access Denied!');
empty($do) && $do = 'list';

if ($do == 'list') {
	if ($result = $db->fetch_one_array("SELECT * FROM ".DB_TABLEPRE."user a,".DB_TABLEPRE."user_view b WHERE a.id=b.uid and a.id = '$_USER->id' ")) {
		include_once('template/user.php');
	} else {
		prompt('信息不存在。');
	}
}elseif ($do == 'home') {
 print_r(strpos($biuuu,$search));
	$sqls = "SELECT homemana FROM ".DB_TABLEPRE."user_view  WHERE uid='".$_USER->id."'";
	$bghome = $db->fetch_one_array($sqls);
	if($_GET['view']!=''){
		$idarr = getGP('id','P','array');
		//substr($html, 0, -1)
		foreach ($idarr as $id) {
			$html.=$id.',';	
		}
		$user_view = array(
			'homemana' => check_str($html)
		);
		update_db('user_view',$user_view, array('uid'=>$_USER->id));
		header('Location: home.php');
		//show_msg('背景设置成功！', 'home.php?mid='.$_GET['mid']);
	}
	include_once('template/home.php');
} elseif ($do == 'bg') {
	if($_GET['view']!=''){
		$user_view = array(
			'homebg' => check_str(getGP('value','G'))
		);
		update_db('user_view',$user_view, array('uid'=>$_USER->id));
		header('Location: home.php?mid='.$_GET['mid']);
		//show_msg('背景设置成功！', 'home.php?mid='.$_GET['mid']);
	}
	include_once('template/bg.php');
} elseif ($do == 'save') {
	$savetype = getGP('savetype','P');
	$uid = getGP('uid','P','int');
	$user_view = array(
		'pic' => check_str(getGP('pic','P')),
		'birthdate' => getGP('birthdate','P'),
		'sex' => getGP('sex','P'),
		'phone' => getGP('phone','P'),
		'tel' => check_str(getGP('tel','P')),
		'fax' => getGP('fax','P','int'),
		'email' => check_str(getGP('email','P')),
		'qq' => check_str(getGP('qq','P')),
		'contact' => check_str(getGP('contact','P')),
		'address' => check_str(getGP('address','P'))
	);
	update_db('user_view',$user_view, array('uid'=>$uid));
	show_msg('个人信息更新成功！', 'admin.php?ac='.$ac.'&fileurl='.$fileurl.'');	

} elseif ($do == 'home_txt') {
	print_r(strpos($biuuu,$search));
	$txt='home_workclass,home_news_34,home_news_1,home_news_6,home_news_5,home_app,home_workdate,home_plan,home_duty,home_blog,home_document_1,home_document_2,home_document_3,home_document_4,home_document_5,home_document_6,home_knowledge,home_app1,home_bbs,home_file,home_project,home_training,home_book,home_goods,home_conference,home_company,home_care,home_service,home_complaints,home_offer,home_program,home_contract,home_order,home_price,home_payment,home_supplier,home_purchase,home_business';
	$txtname='工作流,公告,新闻,电子期刊,大事记,公文审批,日程安排,工作计划,我的任务,工作日记,个人文件柜,公共文件柜,网络硬盘,下载管理,规章制度,报表管理,知识阅读,投票,论坛,档案管理,项目审批,培训管理,图书管理,办公用品,会议管理,客户信息,客户关怀,客户回访,客户投诉,报价单,解决方案,合同,订单,收款单,付款单,供应商信息,采购信息,代理商信息';
	$txt=explode(',',$txt); 
	$txtname=explode(',',$txtname); 
	$sqls = "SELECT home_txt FROM ".DB_TABLEPRE."user_view  WHERE uid='".$_USER->id."'";
	$bghome = $db->fetch_one_array($sqls);
	if($_GET['view']!=''){
		$home_txt = getGP('home_txt','G');
		$user_view = array(
			'home_txt' => check_str($home_txt)
		);
		update_db('user_view',$user_view, array('uid'=>$_USER->id));
		header('Location: home.php');
		//show_msg('背景设置成功！', 'home.php?mid='.$_GET['mid']);
	}
	include_once('template/home_txt.php');
}
function home_txt($type){
	switch ($type)
	{
		case 'home_workclass':
		  echo "工作流";
		  break;
		case 'home_news_34':
		  echo "公告";
		  break;
		case 'home_news_1':
		  echo "新闻";
		  break;
		case 'home_news_6':
		  echo "电子期刊";
		  break;
		case 'home_news_5':
		  echo "大事记";
		  break;
		case 'home_app':
		  echo "公文审批";
		  break;
		case 'home_workdate':
		  echo "日程安排";
		  break;
		case 'home_plan':
		  echo "工作计划";
		  break;
		case 'home_duty':
		  echo "我的任务";
		  break;
		case 'home_blog':
		  echo "工作日记";
		  break;
		case 'home_document_1':
		  echo "个人文件柜";
		  break;
		case 'home_document_2':
		  echo "公共文件柜";
		  break;
		case 'home_document_3':
		  echo "网络硬盘";
		  break;
		case 'home_document_4':
		  echo "下载管理";
		  break;
		case 'home_document_5':
		  echo "规章制度";
		  break;
		case 'home_document_6':
		  echo "报表管理";
		  break;
		case 'home_knowledge':
		  echo "知识阅读";
		  break;
		case 'home_app1':
		  echo "投票";
		  break;
		case 'home_bbs':
		  echo "论坛";
		  break;
		case 'home_file':
		  echo "档案管理";
		  break;
		case 'home_project':
		  echo "项目审批";
		  break;
		case 'home_training':
		  echo "培训管理";
		  break;
		case 'home_book':
		  echo "图书管理";
		  break;
		case 'home_goods':
		  echo "办公用品";
		  break;
		case 'home_conference':
		  echo "会议管理";
		  break;
		case 'home_company':
		  echo "客户信息";
		  break;
		case 'home_care':
		  echo "客户关怀";
		  break;
		case 'home_service':
		  echo "客户回访";
		  break;
		case 'home_complaints':
		  echo "客户投诉";
		  break;
		case 'home_offer':
		  echo "报价单";
		  break;
		case 'home_program':
		  echo "解决方案";
		  break;
		case 'home_contract':
		  echo "合同";
		  break;
		case 'home_order':
		  echo "订单";
		  break;
		case 'home_price':
		  echo "收款单";
		  break;
		case 'home_payment':
		  echo "付款单";
		  break;
		case 'home_supplier':
		  echo "供应商信息";
		  break;
		case 'home_purchase':
		  echo "采购信息";
		  break;
		case 'home_business':
		  echo "代理商信息";
		  break;
		default:
		  echo "还没有选择数据";
	}
	return ;
}
?>