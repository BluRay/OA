DROP TABLE IF EXISTS toa_ads;
CREATE TABLE `toa_ads` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `adsurl` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS toa_app;
CREATE TABLE `toa_app` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `user` text,
  `number` varchar(20) DEFAULT NULL,
  `untildate` datetime DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `uid` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS toa_app_log;
CREATE TABLE `toa_app_log` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `app_id` varchar(20) DEFAULT NULL,
  `app_option_id` varchar(20) DEFAULT NULL,
  `user` varchar(20) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS toa_app_option;
CREATE TABLE `toa_app_option` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `app_id` varchar(20) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `number` varchar(20) DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS toa_bbs;
CREATE TABLE `toa_bbs` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `bbsclass` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `author` varchar(60) DEFAULT NULL,
  `origin` varchar(255) DEFAULT NULL,
  `content` text,
  `issuedate` datetime DEFAULT NULL,
  `readnum` varchar(60) DEFAULT NULL,
  `enddate` datetime DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL,
  `uid` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS toa_bbs_log;
CREATE TABLE `toa_bbs_log` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `bbsid` varchar(20) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `author` varchar(60) DEFAULT NULL,
  `content` text,
  `enddate` datetime DEFAULT NULL,
  `uid` varchar(20) DEFAULT NULL,
  `type` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS toa_bbsclass;
CREATE TABLE `toa_bbsclass` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `classadmin` varchar(255) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `uid` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS toa_blog;
CREATE TABLE `toa_blog` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(80) DEFAULT NULL,
  `content` text,
  `number` int(10) DEFAULT NULL,
  `categoryid` varchar(10) DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `uid` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS toa_communication;
CREATE TABLE `toa_communication` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `person` varchar(20) DEFAULT NULL,
  `tel` varchar(80) DEFAULT NULL,
  `phone` varchar(40) DEFAULT NULL,
  `fax` varchar(40) DEFAULT NULL,
  `mail` varchar(80) DEFAULT NULL,
  `zipcode` varchar(10) DEFAULT NULL,
  `address` varchar(40) DEFAULT NULL,
  `position` varchar(20) DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `msn` varchar(50) DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `uid` varchar(10) DEFAULT NULL,
  `company` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS toa_conference;
CREATE TABLE `toa_conference` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(80) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `content` text,
  `appperson` varchar(10) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `attendance` text,
  `startdate` datetime DEFAULT NULL,
  `enddate` datetime DEFAULT NULL,
  `conferenceroom` varchar(10) DEFAULT NULL,
  `type` varchar(2) DEFAULT NULL,
  `uid` varchar(10) DEFAULT NULL,
  `otype` varchar(10) DEFAULT NULL,
  `staffid` varchar(50) DEFAULT NULL,
  `recorduser` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS toa_conference_record;
CREATE TABLE `toa_conference_record` (
  `rid` int(10) NOT NULL AUTO_INCREMENT,
  `conferenceid` varchar(10) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `attendance` text,
  `conferenceroom` varchar(10) DEFAULT NULL,
  `recordperson` varchar(10) DEFAULT NULL,
  `appendix` varchar(200) DEFAULT NULL,
  `content` text,
  PRIMARY KEY (`rid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS toa_config;
CREATE TABLE `toa_config` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `value` text,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

INSERT INTO toa_config VALUES ('1','OA','name');
INSERT INTO toa_config VALUES ('2','http://127.0.0.1/OA','web');
INSERT INTO toa_config VALUES ('3','20','pagenum');
INSERT INTO toa_config VALUES ('4','0','opendate');
INSERT INTO toa_config VALUES ('5','24','enddate');
INSERT INTO toa_config VALUES ('6','1','sworknum');
INSERT INTO toa_config VALUES ('7','9:00','swork');
INSERT INTO toa_config VALUES ('8','18:00','ework');
INSERT INTO toa_config VALUES ('9','14:30','swork1');
INSERT INTO toa_config VALUES ('10','18:30','ework1');
INSERT INTO toa_config VALUES ('11','1','configwork');
INSERT INTO toa_config VALUES ('12','0','configoffice');
INSERT INTO toa_config VALUES ('13','1','configinfo');
INSERT INTO toa_config VALUES ('14','1','configsms');
INSERT INTO toa_config VALUES ('15','1','configflag');
INSERT INTO toa_config VALUES ('16','1','mobile1');
INSERT INTO toa_config VALUES ('19','www.831209.com|www.515158.com|m.515158.com','oaurl');
INSERT INTO toa_config VALUES ('20','0','usernum');
INSERT INTO toa_config VALUES ('21','V2.0.20131008','com_editionnum');
INSERT INTO toa_config VALUES ('22','2016-09-03 09:22:00','crmdate');
INSERT INTO toa_config VALUES ('18','0','configinfoview');

DROP TABLE IF EXISTS toa_department;
CREATE TABLE `toa_department` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `persno` varchar(40) DEFAULT NULL,
  `name` varchar(40) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `father` varchar(10) DEFAULT NULL,
  `uid` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS toa_document;
CREATE TABLE `toa_document` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `documentid` varchar(50) DEFAULT NULL,
  `annex` varchar(255) DEFAULT NULL,
  `key` varchar(16) DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL,
  `uid` varchar(16) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `readuser` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS toa_document_type;
CREATE TABLE `toa_document_type` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `father` varchar(10) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `uid` varchar(10) DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS toa_fileoffice;
CREATE TABLE `toa_fileoffice` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `number` varchar(32) DEFAULT NULL,
  `fileid` varchar(64) DEFAULT NULL,
  `filetype` varchar(2) DEFAULT NULL,
  `officetype` varchar(2) DEFAULT NULL,
  `officeid` varchar(64) DEFAULT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `fileaddr` varchar(255) DEFAULT NULL,
  `uid` varchar(32) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS toa_humancontract;
CREATE TABLE `toa_humancontract` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `userid` varchar(20) DEFAULT NULL,
  `number` varchar(60) DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL,
  `ckey` varchar(10) DEFAULT NULL,
  `signdate` varchar(60) DEFAULT NULL,
  `testdate` varchar(60) DEFAULT NULL,
  `testday` varchar(30) DEFAULT NULL,
  `testenddate` varchar(60) DEFAULT NULL,
  `signnum` varchar(30) DEFAULT NULL,
  `appendix` varchar(255) DEFAULT NULL,
  `content` text,
  `uid` varchar(20) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `signenddate` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS toa_keytable;
CREATE TABLE `toa_keytable` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `inputname` varchar(255) DEFAULT NULL,
  `inputvalue` varchar(255) DEFAULT NULL,
  `inputchecked` varchar(5) DEFAULT NULL,
  `type` varchar(5) DEFAULT NULL,
  `number` int(10) DEFAULT NULL,
  `fatherid` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=410 DEFAULT CHARSET=utf8;

INSERT INTO toa_keytable VALUES ('1','系统管理权限设置','config_inc','1','1','1','1','0');
INSERT INTO toa_keytable VALUES ('2','系统设置','config_inc','1','1','1','999','1');
INSERT INTO toa_keytable VALUES ('3','允许','config_inc','1','1','1','1','2');
INSERT INTO toa_keytable VALUES ('4','禁止','config_inc','0','2','1','2','2');
INSERT INTO toa_keytable VALUES ('5','权限组设置','input_name','0','1','1','999','1');
INSERT INTO toa_keytable VALUES ('6','允许','config_usergroup','1','1','1','1','5');
INSERT INTO toa_keytable VALUES ('7','禁止','config_usergroup','0','2','1','2','5');
INSERT INTO toa_keytable VALUES ('8','添加','config_usergroup_Increase','1','1','2','3','5');
INSERT INTO toa_keytable VALUES ('9','编辑','config_usergroup_edit','1','1','2','4','5');
INSERT INTO toa_keytable VALUES ('10','删除','config_usergroup_delete','1','1','2','5','5');
INSERT INTO toa_keytable VALUES ('11','账号设置','input_name','0','1','1','999','1');
INSERT INTO toa_keytable VALUES ('12','允许','config_user','1','1','1','1','11');
INSERT INTO toa_keytable VALUES ('13','禁止','config_user','0','2','1','2','11');
INSERT INTO toa_keytable VALUES ('14','添加','config_user_Increase','1','1','2','3','11');
INSERT INTO toa_keytable VALUES ('15','编辑','config_user_edit','1','1','2','4','11');
INSERT INTO toa_keytable VALUES ('16','删除','config_user_delete','1','1','2','5','11');
INSERT INTO toa_keytable VALUES ('17','系统维护','input_name','0','1','1','999','1');
INSERT INTO toa_keytable VALUES ('18','允许','config_log','1','1','1','1','17');
INSERT INTO toa_keytable VALUES ('19','禁止','config_log','0','2','1','2','17');
INSERT INTO toa_keytable VALUES ('20','清理','config_log_delete','1','1','2','3','17');
INSERT INTO toa_keytable VALUES ('21','数据备份','config_db','0','1','1','999','1');
INSERT INTO toa_keytable VALUES ('22','允许备份','config_db','1','1','2','1','21');
INSERT INTO toa_keytable VALUES ('23','允许还原','config_db_old','1','1','2','2','21');
INSERT INTO toa_keytable VALUES ('24','工作台','input_name','0','1','1','2','0');
INSERT INTO toa_keytable VALUES ('361','行政办公','input_name','0','1','1','4','357');
INSERT INTO toa_keytable VALUES ('362','人力资源','input_name','0','1','1','5','357');
INSERT INTO toa_keytable VALUES ('30','短消息','input_name','0','1','1','1','24');
INSERT INTO toa_keytable VALUES ('31','允许','office_info','1','1','1','1','30');
INSERT INTO toa_keytable VALUES ('32','禁止','office_info','0','2','1','2','30');
INSERT INTO toa_keytable VALUES ('33','发送','office_info_Increase','1','1','2','3','30');
INSERT INTO toa_keytable VALUES ('34','删除','office_info_delete','1','1','2','4','30');
INSERT INTO toa_keytable VALUES ('35','手机短信','input_name','0','1','1','2','24');
INSERT INTO toa_keytable VALUES ('36','允许','office_sms','1','1','1','1','35');
INSERT INTO toa_keytable VALUES ('37','禁止','office_sms','0','2','1','2','35');
INSERT INTO toa_keytable VALUES ('38','发短信','office_sms_Increase','1','1','2','3','35');
INSERT INTO toa_keytable VALUES ('39','收短信','office_sms_read','1','1','2','4','35');
INSERT INTO toa_keytable VALUES ('40','删除','office_sms_delete','1','1','2','5','35');
INSERT INTO toa_keytable VALUES ('41','日程安排','input_name','0','1','1','3','24');
INSERT INTO toa_keytable VALUES ('42','允许','date_workdate','1','1','1','1','41');
INSERT INTO toa_keytable VALUES ('43','禁止','date_workdate','0','2','1','2','41');
INSERT INTO toa_keytable VALUES ('44','添加','date_workdate_Increase','1','1','2','3','41');
INSERT INTO toa_keytable VALUES ('45','编辑','date_workdate_edit','1','1','2','4','41');
INSERT INTO toa_keytable VALUES ('46','删除','date_workdate_delete','1','1','2','5','41');
INSERT INTO toa_keytable VALUES ('47','工作日记','input_name','0','1','1','4','24');
INSERT INTO toa_keytable VALUES ('48','允许','date_blog','1','1','1','1','47');
INSERT INTO toa_keytable VALUES ('49','禁止','date_blog','0','2','1','2','47');
INSERT INTO toa_keytable VALUES ('50','添加','date_blog_Increase','1','1','2','3','47');
INSERT INTO toa_keytable VALUES ('51','编辑','date_blog_edit','1','1','2','4','47');
INSERT INTO toa_keytable VALUES ('52','删除','date_blog_delete','1','1','2','5','47');
INSERT INTO toa_keytable VALUES ('53','工作计划','input_name','0','1','1','5','24');
INSERT INTO toa_keytable VALUES ('54','允许','date_plan','1','1','1','1','53');
INSERT INTO toa_keytable VALUES ('55','禁止','date_plan','0','2','1','2','53');
INSERT INTO toa_keytable VALUES ('56','添加','date_plan_Increase','1','1','2','3','53');
INSERT INTO toa_keytable VALUES ('57','编辑','date_plan_edit','1','1','2','4','53');
INSERT INTO toa_keytable VALUES ('58','删除','date_plan_delete','1','1','2','5','53');
INSERT INTO toa_keytable VALUES ('59','通讯录','input_name','0','1','1','6','24');
INSERT INTO toa_keytable VALUES ('60','允许','office_communication','1','1','1','1','59');
INSERT INTO toa_keytable VALUES ('61','禁止','office_communication','0','2','1','2','59');
INSERT INTO toa_keytable VALUES ('62','添加','office_communication_Increase','1','1','2','3','59');
INSERT INTO toa_keytable VALUES ('63','编辑','office_communication_edit','1','1','2','4','59');
INSERT INTO toa_keytable VALUES ('64','删除','office_communication_delete','1','1','2','5','59');
INSERT INTO toa_keytable VALUES ('65','个人文件柜','input_name','0','1','1','7','24');
INSERT INTO toa_keytable VALUES ('66','允许','office_document_1','1','1','1','1','65');
INSERT INTO toa_keytable VALUES ('67','禁止','office_document_1','0','2','1','2','65');
INSERT INTO toa_keytable VALUES ('68','添加','office_document_Increase_1','1','1','2','3','65');
INSERT INTO toa_keytable VALUES ('69','编辑','office_document_edit_1','1','1','2','4','65');
INSERT INTO toa_keytable VALUES ('70','删除','office_document_delete_1','1','1','2','5','65');
INSERT INTO toa_keytable VALUES ('344','修改投票','app_update','1','1','2','4','234');
INSERT INTO toa_keytable VALUES ('103','知识库','input_name','0','1','1','9','0');
INSERT INTO toa_keytable VALUES ('104','知识管理','input_name','0','1','1','1','103');
INSERT INTO toa_keytable VALUES ('105','发布','knowledge_Increase','1','1','2','1','104');
INSERT INTO toa_keytable VALUES ('106','编辑','knowledge_read','1','1','2','2','104');
INSERT INTO toa_keytable VALUES ('107','删除','knowledge_delete','1','1','2','3','104');
INSERT INTO toa_keytable VALUES ('108','下载管理','input_name','0','1','1','2','103');
INSERT INTO toa_keytable VALUES ('109','文件夹管理','office_document_type_4','1','1','2','6','108');
INSERT INTO toa_keytable VALUES ('110','下载发布','office_document_Increase_4','1','1','2','3','108');
INSERT INTO toa_keytable VALUES ('111','下载编辑','office_document_edit_4','1','1','2','4','108');
INSERT INTO toa_keytable VALUES ('112','下载删除','office_document_delete_4','1','1','2','5','108');
INSERT INTO toa_keytable VALUES ('113','规章制度','input_name','0','1','1','3','103');
INSERT INTO toa_keytable VALUES ('114','目录管理','office_document_type_5','1','1','2','6','113');
INSERT INTO toa_keytable VALUES ('115','信息发布','office_document_Increase_5','1','1','2','3','113');
INSERT INTO toa_keytable VALUES ('116','信息编辑','office_document_edit_5','1','1','2','4','113');
INSERT INTO toa_keytable VALUES ('117','信息删除','office_document_delete_5','1','1','2','5','113');
INSERT INTO toa_keytable VALUES ('118','电子期刊','input_name','0','1','1','4','103');
INSERT INTO toa_keytable VALUES ('119','允许','news_periodical','1','1','1','1','118');
INSERT INTO toa_keytable VALUES ('120','禁止','news_periodical','0','2','1','2','118');
INSERT INTO toa_keytable VALUES ('121','添加','news_periodical_Increase','1','1','2','3','118');
INSERT INTO toa_keytable VALUES ('122','编辑','news_periodical_edit','1','1','2','4','118');
INSERT INTO toa_keytable VALUES ('123','删除','news_periodical_delete','1','1','2','5','118');
INSERT INTO toa_keytable VALUES ('124','分类设置','news_periodical_type','1','1','2','6','118');
INSERT INTO toa_keytable VALUES ('125','公共文件柜','input_name','0','1','1','5','103');
INSERT INTO toa_keytable VALUES ('126','文件夹管理','office_document_type_2','1','1','2','6','125');
INSERT INTO toa_keytable VALUES ('127','文件上传','office_document_Increase_2','1','1','2','3','125');
INSERT INTO toa_keytable VALUES ('128','文件修改','office_document_edit_2','1','1','2','4','125');
INSERT INTO toa_keytable VALUES ('129','文件删除','office_document_delete_2','1','1','2','5','125');
INSERT INTO toa_keytable VALUES ('130','网络硬盘','input_name','0','1','1','6','103');
INSERT INTO toa_keytable VALUES ('131','文件夹管理','office_document_type_3','1','1','2','6','130');
INSERT INTO toa_keytable VALUES ('132','文件上传','office_document_Increase_3','1','1','2','3','130');
INSERT INTO toa_keytable VALUES ('133','文件编辑','office_document_edit_3','1','1','2','4','130');
INSERT INTO toa_keytable VALUES ('134','文件删除','office_document_delete_3','1','1','2','5','130');
INSERT INTO toa_keytable VALUES ('135','报表管理','input_name','0','1','1','7','103');
INSERT INTO toa_keytable VALUES ('136','分类管理','office_document_type_6','1','1','2','6','135');
INSERT INTO toa_keytable VALUES ('137','报表上传','office_document_Increase_6','1','1','2','3','135');
INSERT INTO toa_keytable VALUES ('138','报表编辑','office_document_edit_6','1','1','2','4','135');
INSERT INTO toa_keytable VALUES ('139','报表删除','office_document_delete_6','1','1','2','5','135');
INSERT INTO toa_keytable VALUES ('140','行政办公','input_name','0','1','1','3','0');
INSERT INTO toa_keytable VALUES ('141','大事记','input_name','0','1','1','5','140');
INSERT INTO toa_keytable VALUES ('142','允许','news_chronicle','1','1','1','1','141');
INSERT INTO toa_keytable VALUES ('143','禁止','news_chronicle','0','2','1','2','141');
INSERT INTO toa_keytable VALUES ('144','添加','news_chronicle_Increase','1','1','2','3','141');
INSERT INTO toa_keytable VALUES ('145','编辑','news_chronicle_edit','1','1','2','4','141');
INSERT INTO toa_keytable VALUES ('146','删除','news_chronicle_delete','1','1','2','5','141');
INSERT INTO toa_keytable VALUES ('147','分类设置','news_chronicle_type','1','1','2','6','141');
INSERT INTO toa_keytable VALUES ('148','新闻','input_name','0','1','1','6','140');
INSERT INTO toa_keytable VALUES ('149','允许','news_new','1','1','1','1','148');
INSERT INTO toa_keytable VALUES ('150','禁止','news_new','0','2','1','2','148');
INSERT INTO toa_keytable VALUES ('151','添加','news_new_Increase','1','1','2','3','148');
INSERT INTO toa_keytable VALUES ('152','编辑','news_new_edit','1','1','2','4','148');
INSERT INTO toa_keytable VALUES ('153','删除','news_new_delete','1','1','2','5','148');
INSERT INTO toa_keytable VALUES ('154','分类设置','news_new_type','1','1','2','6','148');
INSERT INTO toa_keytable VALUES ('155','通知','input_name','0','1','1','7','140');
INSERT INTO toa_keytable VALUES ('156','允许','news_notice','1','1','1','1','155');
INSERT INTO toa_keytable VALUES ('157','禁止','news_notice','0','2','1','2','155');
INSERT INTO toa_keytable VALUES ('158','添加','news_notice_Increase','1','1','2','3','155');
INSERT INTO toa_keytable VALUES ('159','编辑','news_notice_edit','1','1','2','4','155');
INSERT INTO toa_keytable VALUES ('160','删除','news_notice_delete','1','1','2','5','155');
INSERT INTO toa_keytable VALUES ('161','分类设置','news_notice_type','1','1','2','6','155');
INSERT INTO toa_keytable VALUES ('162','公告','input_name','0','1','1','8','140');
INSERT INTO toa_keytable VALUES ('164','允许','news_cement','1','1','1','1','162');
INSERT INTO toa_keytable VALUES ('165','禁止','news_cement','0','2','1','2','162');
INSERT INTO toa_keytable VALUES ('166','添加','news_cement_Increase','1','1','2','3','162');
INSERT INTO toa_keytable VALUES ('167','编辑','news_cement_edit','1','1','2','4','162');
INSERT INTO toa_keytable VALUES ('168','删除','news_cement_delete','1','1','2','5','162');
INSERT INTO toa_keytable VALUES ('169','分类设置','news_cement_type','1','1','2','6','162');
INSERT INTO toa_keytable VALUES ('181','会议管理','input_name','0','1','1','3','140');
INSERT INTO toa_keytable VALUES ('182','允许','istration_conference','1','1','1','1','181');
INSERT INTO toa_keytable VALUES ('183','禁止','istration_conference','0','2','1','2','181');
INSERT INTO toa_keytable VALUES ('184','会议申请','istration_conference_Increase','1','1','2','3','181');
INSERT INTO toa_keytable VALUES ('185','会议编辑','istration_conference_edit','1','1','2','4','181');
INSERT INTO toa_keytable VALUES ('186','会议删除','istration_conference_delete','1','1','2','5','181');
INSERT INTO toa_keytable VALUES ('366','知识库','input_name','0','1','1','9','357');
INSERT INTO toa_keytable VALUES ('367','在线交流','input_name','0','1','1','10','357');
INSERT INTO toa_keytable VALUES ('368','工作计划','excel_6','1','1','2','6','358');
INSERT INTO toa_keytable VALUES ('369','通迅录','excel_7','1','1','2','7','358');
INSERT INTO toa_keytable VALUES ('190','会议室设置','istration_conference_type_sce','1','1','2','9','181');
INSERT INTO toa_keytable VALUES ('191','会议类型设置','istration_conference_type_type','1','1','2','10','181');
INSERT INTO toa_keytable VALUES ('192','人力资源','input_name','0','1','1','5','0');
INSERT INTO toa_keytable VALUES ('193','部门管理','department_','1','1','1','7','1');
INSERT INTO toa_keytable VALUES ('194','允许','department_','1','1','1','1','193');
INSERT INTO toa_keytable VALUES ('195','禁止','department_','0','2','1','2','193');
INSERT INTO toa_keytable VALUES ('196','岗位设置','position_','1','1','1','8','1');
INSERT INTO toa_keytable VALUES ('197','允许','position_','1','1','1','1','196');
INSERT INTO toa_keytable VALUES ('198','禁止','position_','0','2','1','2','196');
INSERT INTO toa_keytable VALUES ('357','报表权限设置','input_name','0','1','1','12','0');
INSERT INTO toa_keytable VALUES ('358','工作台','input_name','0','1','1','1','357');
INSERT INTO toa_keytable VALUES ('202','人事合同','input_name','0','1','1','5','192');
INSERT INTO toa_keytable VALUES ('203','添加','humancontract_i','1','2','2','3','202');
INSERT INTO toa_keytable VALUES ('204','编辑','humancontract_e','1','2','2','4','202');
INSERT INTO toa_keytable VALUES ('205','删除','humancontract_d','1','2','2','5','202');
INSERT INTO toa_keytable VALUES ('206','允许','humancontract_','1','1','1','1','202');
INSERT INTO toa_keytable VALUES ('207','禁止','humancontract_','0','2','1','2','202');
INSERT INTO toa_keytable VALUES ('213','培训管理','input_name','0','1','1','2','192');
INSERT INTO toa_keytable VALUES ('214','培训管理','training_','1','2','2','1','213');
INSERT INTO toa_keytable VALUES ('215','培训记录','training_record','1','2','2','2','213');
INSERT INTO toa_keytable VALUES ('216','奖惩管理','input_name','0','1','1','3','192');
INSERT INTO toa_keytable VALUES ('217','允许','rewards_','1','1','1','1','216');
INSERT INTO toa_keytable VALUES ('218','禁止','rewards_','0','2','1','2','216');
INSERT INTO toa_keytable VALUES ('219','考勤管理','input_name','0','1','1','4','192');
INSERT INTO toa_keytable VALUES ('220','允许','registration_','1','1','1','1','219');
INSERT INTO toa_keytable VALUES ('221','禁止','registration_','0','2','1','2','219');
INSERT INTO toa_keytable VALUES ('222','导出报表','registration_excel','1','2','2','3','219');
INSERT INTO toa_keytable VALUES ('223','基础类别设置','input_name','0','1','1','9','192');
INSERT INTO toa_keytable VALUES ('224','允许','office_type_r','1','1','1','1','223');
INSERT INTO toa_keytable VALUES ('225','禁止','office_type_r','0','2','1','2','223');
INSERT INTO toa_keytable VALUES ('226','在线交流','input_name','0','1','1','11','0');
INSERT INTO toa_keytable VALUES ('227','论坛','input_name','0','1','1','1','226');
INSERT INTO toa_keytable VALUES ('228','论坛版块设置','bbsclass_','1','2','2','5','227');
INSERT INTO toa_keytable VALUES ('229','论坛使用','bbs_','1','2','2','4','227');
INSERT INTO toa_keytable VALUES ('230','贴子审批','bbs_key','1','2','2','3','227');
INSERT INTO toa_keytable VALUES ('231','发贴','bbs_add','1','2','2','1','227');
INSERT INTO toa_keytable VALUES ('232','删除','bbs_delete','1','2','2','6','227');
INSERT INTO toa_keytable VALUES ('233','编辑','bbs_edit','1','2','2','2','227');
INSERT INTO toa_keytable VALUES ('234','投票','input_name','0','1','1','2','226');
INSERT INTO toa_keytable VALUES ('235','允许','app_','1','1','1','1','234');
INSERT INTO toa_keytable VALUES ('236','禁止','app_','0','2','1','2','234');
INSERT INTO toa_keytable VALUES ('237','发起投票','app_add','1','2','2','3','234');
INSERT INTO toa_keytable VALUES ('238','菜单设置','input_name','0','1','1','999','1');
INSERT INTO toa_keytable VALUES ('239','允许','config_menu','1','1','1','1','238');
INSERT INTO toa_keytable VALUES ('240','拒绝','config_menu','0','2','1','2','238');
INSERT INTO toa_keytable VALUES ('241','权限管理','input_name','0','1','1','999','1');
INSERT INTO toa_keytable VALUES ('242','允许','config_keytable','1','1','1','1','241');
INSERT INTO toa_keytable VALUES ('243','拒绝','config_keytable','0','2','1','2','241');
INSERT INTO toa_keytable VALUES ('244','短信账号','office_sms_channel','1','1','2','6','35');
INSERT INTO toa_keytable VALUES ('245','任务管理','input_name','0','1','1','8','24');
INSERT INTO toa_keytable VALUES ('246','允许','office_duty','1','1','1','1','245');
INSERT INTO toa_keytable VALUES ('247','拒绝','office_duty','0','2','1','2','245');
INSERT INTO toa_keytable VALUES ('248','任务发布','office_duty_add','1','1','2','3','245');
INSERT INTO toa_keytable VALUES ('249','任务查看','office_duty_reda','1','1','2','4','245');
INSERT INTO toa_keytable VALUES ('250','任务日志','office_duty_sum','1','1','2','5','245');
INSERT INTO toa_keytable VALUES ('251','分类管理','office_document_type_1','1','1','2','6','65');
INSERT INTO toa_keytable VALUES ('252','允许','office_document_4','1','1','1','1','108');
INSERT INTO toa_keytable VALUES ('253','拒绝','office_document_4','0','2','1','2','108');
INSERT INTO toa_keytable VALUES ('254','允许','office_document_5','1','1','1','1','113');
INSERT INTO toa_keytable VALUES ('255','拒绝','office_document_5','0','2','1','2','113');
INSERT INTO toa_keytable VALUES ('256','允许','office_document_2','1','1','1','1','125');
INSERT INTO toa_keytable VALUES ('257','拒绝','office_document_2','0','2','1','2','125');
INSERT INTO toa_keytable VALUES ('258','允许','office_document_3','1','1','1','1','130');
INSERT INTO toa_keytable VALUES ('259','拒绝','office_document_3','0','2','1','2','130');
INSERT INTO toa_keytable VALUES ('260','允许','office_document_6','1','1','1','1','135');
INSERT INTO toa_keytable VALUES ('261','拒绝','office_document_6','0','2','1','2','135');
INSERT INTO toa_keytable VALUES ('345','删除投票','app_del','1','1','2','5','234');
INSERT INTO toa_keytable VALUES ('370','会议管理','excel_8','1','1','2','8','358');
INSERT INTO toa_keytable VALUES ('371','任务管理','excel_1','1','1','2','1','358');
INSERT INTO toa_keytable VALUES ('372','手机短信','excel_2','1','1','2','2','358');
INSERT INTO toa_keytable VALUES ('373','短消息','excel_3','1','1','2','3','358');
INSERT INTO toa_keytable VALUES ('374','日程安排','excel_4','1','1','2','4','358');
INSERT INTO toa_keytable VALUES ('375','工作日记','excel_5','1','1','2','5','358');
INSERT INTO toa_keytable VALUES ('393','考勤管理','excel_25','1','1','2','1','362');
INSERT INTO toa_keytable VALUES ('398','人事合同','excel_30','1','1','2','6','362');
INSERT INTO toa_keytable VALUES ('399','培训','excel_31','1','1','2','7','362');
INSERT INTO toa_keytable VALUES ('400','奖惩','excel_32','1','1','2','8','362');
INSERT INTO toa_keytable VALUES ('407','知识','excel_39','1','1','2','1','366');
INSERT INTO toa_keytable VALUES ('408','投票','excel_40','1','1','2','1','367');
INSERT INTO toa_keytable VALUES ('409','信息发布','excel_41','0','1','2','6','361');

DROP TABLE IF EXISTS toa_knowledge;
CREATE TABLE `toa_knowledge` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(80) DEFAULT NULL,
  `content` text,
  `number` int(10) DEFAULT NULL,
  `categoryid` varchar(10) DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `uid` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS toa_loginlog;
CREATE TABLE `toa_loginlog` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uid` int(10) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `ip` varchar(50) DEFAULT NULL,
  `logindate` datetime DEFAULT NULL,
  `enddate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO toa_loginlog VALUES ('1','1','admin','127.0.0.1','2016-08-27 10:42:00','2016-08-27 10:42:00');
INSERT INTO toa_loginlog VALUES ('2','1','admin','10.23.163.56','2016-08-27 11:05:42','2016-08-27 11:05:42');

DROP TABLE IF EXISTS toa_menu;
CREATE TABLE `toa_menu` (
  `menuid` int(10) NOT NULL AUTO_INCREMENT,
  `menuname` varchar(255) DEFAULT NULL,
  `menuurl` varchar(255) DEFAULT NULL,
  `fatherid` varchar(10) DEFAULT NULL,
  `menutype` varchar(10) DEFAULT NULL,
  `menunum` int(25) DEFAULT '9999',
  `menukey` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`menuid`)
) ENGINE=MyISAM AUTO_INCREMENT=285 DEFAULT CHARSET=utf8;

INSERT INTO toa_menu VALUES ('3','个人办公','home.php?mid=3','0','0','1','1');
INSERT INTO toa_menu VALUES ('9','知识管理','home.php?mid=9','0','0','9','1');
INSERT INTO toa_menu VALUES ('10','行政办公','home.php?mid=10','0','0','4','1');
INSERT INTO toa_menu VALUES ('11','人力资源','home.php?mid=11','0','0','5','1');
INSERT INTO toa_menu VALUES ('17','短消息','admin.php?ac=receive&fileurl=sms','3','2','4','0');
INSERT INTO toa_menu VALUES ('18','手机短信','admin.php?ac=smsindex&fileurl=sms','3','2','3','0');
INSERT INTO toa_menu VALUES ('19','在线考勤','admin.php?ac=registration&fileurl=workbench','3','2','1','0');
INSERT INTO toa_menu VALUES ('20','日程安排','admin.php?ac=workdate&fileurl=workbench','3','2','5','0');
INSERT INTO toa_menu VALUES ('21','工作日记','admin.php?ac=blog&fileurl=workbench','3','2','6','0');
INSERT INTO toa_menu VALUES ('22','工作计划','admin.php?ac=plan&fileurl=workbench','3','2','7','0');
INSERT INTO toa_menu VALUES ('23','通迅录','admin.php?ac=index&fileurl=communication&type=1','3','2','9','');
INSERT INTO toa_menu VALUES ('24','个人文件柜','admin.php?ac=document&fileurl=knowledge&type=1','3','2','8','0');
INSERT INTO toa_menu VALUES ('25','会议管理','admin.php?ac=conference&fileurl=administrative','3','2','10','0');
INSERT INTO toa_menu VALUES ('26','新闻','admin.php?ac=news&fileurl=workbench&type=1','3','2','14','0');
INSERT INTO toa_menu VALUES ('27','公告','admin.php?ac=news&fileurl=workbench&type=3','3','2','11','0');
INSERT INTO toa_menu VALUES ('28','通知','admin.php?ac=news&fileurl=workbench&type=4','3','2','12','0');
INSERT INTO toa_menu VALUES ('29','大事记','admin.php?ac=news&fileurl=workbench&type=5','3','2','13','0');
INSERT INTO toa_menu VALUES ('30','电子期刊','admin.php?ac=news&fileurl=workbench&type=6','3','2','15','0');
INSERT INTO toa_menu VALUES ('31','任务管理','admin.php?ac=duty&fileurl=duty','3','2','2','0');
INSERT INTO toa_menu VALUES ('56','在线交流','home.php?mid=56','0','0','10','0');
INSERT INTO toa_menu VALUES ('57','个人设置','admin.php?ac=user&fileurl=member','3','0','11','');
INSERT INTO toa_menu VALUES ('58','系统设置','home.php?mid=58','0','0','12','');
INSERT INTO toa_menu VALUES ('64','知识管理','admin.php?ac=know&fileurl=knowledge','9','2','1','');
INSERT INTO toa_menu VALUES ('65','下载管理','admin.php?ac=document&fileurl=knowledge&type=4','9','2','2','');
INSERT INTO toa_menu VALUES ('66','规章制度','admin.php?ac=document&fileurl=knowledge&type=5','9','2','5','');
INSERT INTO toa_menu VALUES ('67','电子期刊','admin.php?ac=news&fileurl=administrative&type=6','9','2','6','');
INSERT INTO toa_menu VALUES ('68','大事记管理','admin.php?ac=news&fileurl=administrative&type=5','10','2','8','');
INSERT INTO toa_menu VALUES ('69','新闻管理','admin.php?ac=news&fileurl=administrative&type=1','10','2','7','');
INSERT INTO toa_menu VALUES ('70','通知管理','admin.php?ac=news&fileurl=administrative&type=4','10','2','6','');
INSERT INTO toa_menu VALUES ('71','公告管理','admin.php?ac=news&fileurl=administrative&type=3','10','2','5','');
INSERT INTO toa_menu VALUES ('75','会议申请及安排','admin.php?ac=conference&fileurl=administrative','10','0','4','0');
INSERT INTO toa_menu VALUES ('80','人事合同','admin.php?ac=humancontract&fileurl=human','11','2','2','0');
INSERT INTO toa_menu VALUES ('82','培训管理','admin.php?ac=training&fileurl=human','11','2','4','0');
INSERT INTO toa_menu VALUES ('83','奖惩记录','admin.php?ac=rewards&fileurl=human','11','2','5','0');
INSERT INTO toa_menu VALUES ('84','考勤管理','admin.php?ac=registration&fileurl=human','11','2','0','');
INSERT INTO toa_menu VALUES ('86','个人信息','admin.php?ac=user&fileurl=member','57','2','1','');
INSERT INTO toa_menu VALUES ('87','密码修改','admin.php?ac=password&fileurl=member','57','2','2','');
INSERT INTO toa_menu VALUES ('88','个人收藏','admin.php?ac=eweb&fileurl=member','57','2','3','');
INSERT INTO toa_menu VALUES ('89','个人系统日志','admin.php?ac=log&fileurl=member','57','2','4','');
INSERT INTO toa_menu VALUES ('90','系统设置','admin.php?ac=config&fileurl=mana','58','2','1','');
INSERT INTO toa_menu VALUES ('91','权限设置','admin.php?ac=usergroup&fileurl=mana','58','2','2','');
INSERT INTO toa_menu VALUES ('92','账户设置','admin.php?ac=user&fileurl=mana','58','2','5','');
INSERT INTO toa_menu VALUES ('93','系统维护','admin.php?ac=log&fileurl=mana','58','2','8','');
INSERT INTO toa_menu VALUES ('94','数据备份','admin.php?ac=data&fileurl=mana','58','2','9','');
INSERT INTO toa_menu VALUES ('96','论坛','admin.php?ac=bbs&fileurl=knowledge','56','2','2','0');
INSERT INTO toa_menu VALUES ('97','投票','admin.php?ac=app&fileurl=knowledge','56','2','1','0');
INSERT INTO toa_menu VALUES ('107','公共文件柜','admin.php?ac=document&fileurl=knowledge&type=2','9','2','3','');
INSERT INTO toa_menu VALUES ('109','网络硬盘','admin.php?ac=document&fileurl=knowledge&type=3','9','2','4','');
INSERT INTO toa_menu VALUES ('110','报表管理','admin.php?ac=document&fileurl=knowledge&type=6','9','2','7','');
INSERT INTO toa_menu VALUES ('111','菜单设置','admin.php?ac=menu&fileurl=mana','58','2','6','');
INSERT INTO toa_menu VALUES ('128','权限管理','admin.php?ac=keytable&fileurl=mana','58','2','7','0');
INSERT INTO toa_menu VALUES ('133','基础类别设置','admin.php?ac=type&fileurl=office&otype=9&muid=133&numberid=134','11','0','8','0');
INSERT INTO toa_menu VALUES ('232','产品授权','admin.php?ac=version&fileurl=mana','58','2','10','0');
INSERT INTO toa_menu VALUES ('139','人事合同类型','admin.php?ac=officeclass&fileurl=mana&do=bbsclass&otype=14','133','0','6','0');
INSERT INTO toa_menu VALUES ('140','人事合同状态','admin.php?ac=officeclass&fileurl=mana&do=bbsclass&otype=15','133','0','7','0');
INSERT INTO toa_menu VALUES ('145','招聘渠道','admin.php?ac=officeclass&fileurl=mana&do=bbsclass&otype=16','133','0','8','0');
INSERT INTO toa_menu VALUES ('146','培训类型','admin.php?ac=officeclass&fileurl=mana&do=bbsclass&otype=17','133','0','9','0');
INSERT INTO toa_menu VALUES ('147','培训形式','admin.php?ac=officeclass&fileurl=mana&do=bbsclass&otype=18','133','0','10','0');
INSERT INTO toa_menu VALUES ('148','奖惩项目','admin.php?ac=officeclass&fileurl=mana&do=bbsclass&otype=19','133','0','11','0');
INSERT INTO toa_menu VALUES ('149','论坛版块设置','admin.php?ac=bbs&do=bbsclass&fileurl=knowledge','96','0','4','0');
INSERT INTO toa_menu VALUES ('150','贴子列表','admin.php?ac=bbs&fileurl=knowledge','96','0','2','0');
INSERT INTO toa_menu VALUES ('151','发布贴子','admin.php?ac=bbs&do=add&fileurl=knowledge','96','0','1','0');
INSERT INTO toa_menu VALUES ('152','贴子审批','admin.php?ac=bbs&fileurl=knowledge&ischeck=2','96','0','3','0');
INSERT INTO toa_menu VALUES ('197','部门设置','admin.php?ac=department&fileurl=mana','58','2','3','0');
INSERT INTO toa_menu VALUES ('198','岗位设置','admin.php?ac=position&fileurl=mana','58','2','4','0');
INSERT INTO toa_menu VALUES ('208','新增信息','admin.php?ac=document&fileurl=knowledge&do=add&type=5','66','0','1','0');
INSERT INTO toa_menu VALUES ('199','文件夹管理','admin.php?ac=document&fileurl=knowledge&type=4&do=documenttype','65','0','3','0');
INSERT INTO toa_menu VALUES ('200','新增下载信息','admin.php?ac=document&fileurl=knowledge&do=add&type=4','65','0','1','0');
INSERT INTO toa_menu VALUES ('201','下载信息列表','admin.php?ac=document&fileurl=knowledge&type=4','65','0','2','0');
INSERT INTO toa_menu VALUES ('202','信息列表','admin.php?ac=document&fileurl=knowledge&type=2','107','0','2','0');
INSERT INTO toa_menu VALUES ('203','新增信息','admin.php?ac=document&fileurl=knowledge&do=add&type=2','107','0','1','0');
INSERT INTO toa_menu VALUES ('204','文件夹管理','admin.php?ac=document&fileurl=knowledge&type=2&do=documenttype','107','0','3','0');
INSERT INTO toa_menu VALUES ('205','新增信息','admin.php?ac=document&fileurl=knowledge&do=add&type=3','109','0','1','0');
INSERT INTO toa_menu VALUES ('206','信息列表','admin.php?ac=document&fileurl=knowledge&type=3','109','0','2','0');
INSERT INTO toa_menu VALUES ('207','文件夹管理','admin.php?ac=document&fileurl=knowledge&type=3&do=documenttype','109','0','3','0');
INSERT INTO toa_menu VALUES ('209','信息列表','admin.php?ac=document&fileurl=knowledge&type=5','66','0','2','0');
INSERT INTO toa_menu VALUES ('210','文件夹管理','admin.php?ac=document&fileurl=knowledge&type=5&do=documenttype','66','0','3','0');
INSERT INTO toa_menu VALUES ('211','新增报表','admin.php?ac=document&fileurl=knowledge&do=add&type=6','110','0','1','0');
INSERT INTO toa_menu VALUES ('212','信息列表','admin.php?ac=document&fileurl=knowledge&type=6','110','0','2','0');
INSERT INTO toa_menu VALUES ('213','文件夹管理','admin.php?ac=document&fileurl=knowledge&type=6&do=documenttype','110','0','3','0');
INSERT INTO toa_menu VALUES ('218','会议室设置','admin.php?ac=officeclass&fileurl=mana&do=bbsclass&otype=1','75','2','3','0');
INSERT INTO toa_menu VALUES ('219','会议列表及审批','admin.php?ac=conference&fileurl=administrative','75','2','2','0');
INSERT INTO toa_menu VALUES ('220','会议申请','admin.php?ac=conference&fileurl=administrative&do=add','75','2','1','0');
INSERT INTO toa_menu VALUES ('221','会议类别设置','admin.php?ac=officeclass&fileurl=mana&do=bbsclass&otype=2','75','2','4','0');
INSERT INTO toa_menu VALUES ('234','学历','admin.php?ac=officeclass&fileurl=mana&do=bbsclass&otype=10','133','0','12','0');
INSERT INTO toa_menu VALUES ('235','印鉴管理','admin.php?ac=seal&fileurl=member','57','2','5','0');
INSERT INTO toa_menu VALUES ('282','组件管理','admin.php?ac=plugin&fileurl=mana','58','0','11','0');
INSERT INTO toa_menu VALUES ('236','红头文件管理','admin.php?ac=hongtou&fileurl=member','57','2','999','0');
INSERT INTO toa_menu VALUES ('284','手机设置','admin.php?ac=mobile&fileurl=mana','58','0','12','0');

DROP TABLE IF EXISTS toa_mobile_model;
CREATE TABLE `toa_mobile_model` (
  `mid` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(32) DEFAULT NULL,
  `linkurl` varchar(255) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `ico` varchar(64) DEFAULT NULL,
  `type` varchar(16) NOT NULL,
  `type1` varchar(16) NOT NULL,
  PRIMARY KEY (`mid`)
) ENGINE=MyISAM AUTO_INCREMENT=10014 DEFAULT CHARSET=utf8;

INSERT INTO toa_mobile_model VALUES ('10001','工作流','work/work.html?','999','10001.png','menu','1');
INSERT INTO toa_mobile_model VALUES ('10002','公文发文','app/approval.html?','999','10002.png','menu','1');
INSERT INTO toa_mobile_model VALUES ('10003','公文收文','app/attachment.html?','999','10003.png','menu','1');
INSERT INTO toa_mobile_model VALUES ('10004','会议查看','administrative/conference.html?','999','10004.png','menu','1');
INSERT INTO toa_mobile_model VALUES ('10005','通迅录','communication.html?','999','10005.png','menu','1');
INSERT INTO toa_mobile_model VALUES ('10006','项目管理','project/prolist.html?','999','10006.png','menu','1');
INSERT INTO toa_mobile_model VALUES ('10007','公告','workbench/news.html?type=3','999','10007.png','menu','1');
INSERT INTO toa_mobile_model VALUES ('10008','通知','workbench/news.html?type=4','999','10008.png','menu','1');
INSERT INTO toa_mobile_model VALUES ('10009','大事记','workbench/news.html?type=5','999','10009.png','menu','1');
INSERT INTO toa_mobile_model VALUES ('10010','新闻','workbench/news.html?type=1','999','10010.png','menu','1');
INSERT INTO toa_mobile_model VALUES ('10012','百度','http://www.baidu.com/','999','10012.png','model','1');
INSERT INTO toa_mobile_model VALUES ('10013','新浪','http://www.sina.com.cn','999','10013.png','model','1');

DROP TABLE IF EXISTS toa_news;
CREATE TABLE `toa_news` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `category` varchar(10) DEFAULT NULL,
  `receive` text,
  `phonereceive` varchar(200) DEFAULT NULL,
  `subject` varchar(120) DEFAULT NULL,
  `content` text,
  `appendix` varchar(120) DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `uid` varchar(10) DEFAULT NULL,
  `pic` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS toa_news_read;
CREATE TABLE `toa_news_read` (
  `rid` int(10) NOT NULL AUTO_INCREMENT,
  `uid` varchar(30) DEFAULT NULL,
  `disdate` datetime DEFAULT NULL,
  `viewdate` datetime DEFAULT NULL,
  `evaluation` varchar(200) DEFAULT NULL,
  `dkey` varchar(10) DEFAULT NULL,
  `newsid` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`rid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS toa_news_type;
CREATE TABLE `toa_news_type` (
  `nid` int(10) NOT NULL AUTO_INCREMENT,
  `ntitle` varchar(60) DEFAULT NULL,
  `uid` varchar(10) DEFAULT NULL,
  `ntype` varchar(10) DEFAULT NULL,
  `ndate` datetime DEFAULT NULL,
  PRIMARY KEY (`nid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS toa_ntkohtmlfile;
CREATE TABLE `toa_ntkohtmlfile` (
  `id` mediumint(10) NOT NULL AUTO_INCREMENT,
  `filename` varchar(256) DEFAULT NULL,
  `filepath` varchar(256) DEFAULT NULL,
  `filesize` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS toa_ntkoofficefile;
CREATE TABLE `toa_ntkoofficefile` (
  `id` mediumint(10) NOT NULL AUTO_INCREMENT,
  `filename` varchar(256) DEFAULT NULL,
  `filesize` mediumint(10) DEFAULT NULL,
  `otherdata` varchar(128) DEFAULT NULL,
  `filetype` varchar(64) DEFAULT NULL,
  `filenamedisk` varchar(256) DEFAULT NULL,
  `attachfilenamedisk` varchar(256) DEFAULT NULL,
  `attachfiledescribe` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS toa_ntkopdffile;
CREATE TABLE `toa_ntkopdffile` (
  `id` mediumint(10) NOT NULL AUTO_INCREMENT,
  `pdffilename` varchar(256) DEFAULT NULL,
  `pdffilepath` varchar(256) DEFAULT NULL,
  `filesize` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS toa_oalog;
CREATE TABLE `toa_oalog` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uid` varchar(20) DEFAULT NULL,
  `content` text,
  `title` varchar(255) DEFAULT NULL,
  `startdate` datetime DEFAULT NULL,
  `contentid` varchar(20) DEFAULT NULL,
  `type` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS toa_office_type;
CREATE TABLE `toa_office_type` (
  `oid` int(10) NOT NULL AUTO_INCREMENT,
  `oname` varchar(255) DEFAULT NULL,
  `otype` varchar(10) DEFAULT NULL,
  `uid` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`oid`)
) ENGINE=MyISAM AUTO_INCREMENT=74 DEFAULT CHARSET=utf8;

INSERT INTO toa_office_type VALUES ('54','劳务合同','14','1');
INSERT INTO toa_office_type VALUES ('55','保密合同','14','1');
INSERT INTO toa_office_type VALUES ('56','其它','14','1');
INSERT INTO toa_office_type VALUES ('57','试用期','15','1');
INSERT INTO toa_office_type VALUES ('58','己转证','15','1');
INSERT INTO toa_office_type VALUES ('59','己解除','15','1');
INSERT INTO toa_office_type VALUES ('60','网络招聘','16','1');
INSERT INTO toa_office_type VALUES ('61','招聘会','16','1');
INSERT INTO toa_office_type VALUES ('62','职介','16','1');
INSERT INTO toa_office_type VALUES ('63','内部培训','17','1');
INSERT INTO toa_office_type VALUES ('64','外部培训','17','1');
INSERT INTO toa_office_type VALUES ('65','面授','18','1');
INSERT INTO toa_office_type VALUES ('66','涵受','18','1');
INSERT INTO toa_office_type VALUES ('67','其它','18','1');
INSERT INTO toa_office_type VALUES ('68','迟到','19','1');
INSERT INTO toa_office_type VALUES ('69','早退','19','1');
INSERT INTO toa_office_type VALUES ('70','工作原因','19','1');
INSERT INTO toa_office_type VALUES ('71','错误处份','19','1');
INSERT INTO toa_office_type VALUES ('72','业绩奖励','19','1');
INSERT INTO toa_office_type VALUES ('73','奖金','19','1');

DROP TABLE IF EXISTS toa_online;
CREATE TABLE `toa_online` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `startdate` datetime DEFAULT NULL,
  `uid` varchar(20) DEFAULT NULL,
  `enddate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO toa_online VALUES ('1','2016-08-27 11:22:25','1','2016-08-27 11:32:25');

DROP TABLE IF EXISTS toa_phone_channel;
CREATE TABLE `toa_phone_channel` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `company` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `connection` text,
  `remainsum` varchar(30) DEFAULT NULL,
  `type` varchar(5) DEFAULT NULL,
  `connectionid` varchar(255) DEFAULT NULL,
  `pkey` varchar(5) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `toaid` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO toa_phone_channel VALUES ('1','天生创想增值服务平台','0.1','短信发送成功率98%，发送速度即时发送!','0#515158#http://service.winic.org/webservice/public/remoney.asp?uid=#01&pwd=#01#515158#http://service.winic.org/sys_port/gateway/?id=#01&pwd=#01&to=#01&content=#01&encode=#01&time=#01#515158#http://service.winic.org/sys_port/Gateway/mo2.asp?id=#01&pwd=#01','0','3','1','1','','','','2011-06-30 15:16:58');

DROP TABLE IF EXISTS toa_phone_receive;
CREATE TABLE `toa_phone_receive` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `content` varchar(500) DEFAULT NULL,
  `sendphone` varchar(30) DEFAULT NULL,
  `date` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS toa_phone_send;
CREATE TABLE `toa_phone_send` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `content` varchar(500) DEFAULT NULL,
  `receivephone` varchar(30) DEFAULT NULL,
  `sendperson` varchar(10) DEFAULT NULL,
  `receiveperson` varchar(30) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `type` varchar(5) DEFAULT NULL,
  `channelid` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS toa_plan;
CREATE TABLE `toa_plan` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(80) DEFAULT NULL,
  `content` text,
  `startdate` datetime DEFAULT NULL,
  `enddate` datetime DEFAULT NULL,
  `otype` varchar(10) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `participation` varchar(255) DEFAULT NULL,
  `person` varchar(255) DEFAULT NULL,
  `note` varchar(500) DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `uid` varchar(10) DEFAULT NULL,
  `completiondate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS toa_plugin;
CREATE TABLE `toa_plugin` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `title` varchar(64) DEFAULT NULL,
  `company` varchar(32) DEFAULT NULL,
  `version` varchar(16) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `update` datetime DEFAULT NULL,
  `type` varchar(2) DEFAULT NULL,
  `filename` varchar(16) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10011 DEFAULT CHARSET=utf8;

INSERT INTO toa_plugin VALUES ('10001','工作流','天生创想','v2.0','','','1','workclass');
INSERT INTO toa_plugin VALUES ('10002','CRM系统','天生创想','v2.0','','','1','crm');
INSERT INTO toa_plugin VALUES ('10003','办公用品','天生创想','v2.0','','','1','goods');
INSERT INTO toa_plugin VALUES ('10004','图书管理','天生创想','v2.0','','','1','book');
INSERT INTO toa_plugin VALUES ('10005','固定资产','天生创想','v2.0','','','1','property');
INSERT INTO toa_plugin VALUES ('10006','招聘管理','天生创想','v2.0','','','1','jobs');
INSERT INTO toa_plugin VALUES ('10007','人事管理','天生创想','v2.0','','','1','human');
INSERT INTO toa_plugin VALUES ('10008','公文系统','天生创想','v2.0','','','1','app');
INSERT INTO toa_plugin VALUES ('10009','档案系统','天生创想','v2.0','','','1','file');
INSERT INTO toa_plugin VALUES ('10010','项目管理','天生创想','v2.0','','','1','project');

DROP TABLE IF EXISTS toa_position;
CREATE TABLE `toa_position` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `content` text,
  `father` varchar(20) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS toa_project_duty;
CREATE TABLE `toa_project_duty` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `number` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `user` varchar(255) DEFAULT NULL,
  `startdate` varchar(30) DEFAULT NULL,
  `enddate` varchar(30) DEFAULT NULL,
  `content` text,
  `appendix` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `dkey` varchar(5) DEFAULT NULL,
  `type` varchar(5) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `uid` varchar(10) DEFAULT NULL,
  `project` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS toa_project_duty_log;
CREATE TABLE `toa_project_duty_log` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `dutyid` varchar(255) DEFAULT NULL,
  `content` text,
  `progress` varchar(30) DEFAULT NULL,
  `appendix` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `uid` varchar(20) DEFAULT NULL,
  `project` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS toa_registration;
CREATE TABLE `toa_registration` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `uid` varchar(10) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `year` varchar(8) NOT NULL,
  `month` varchar(8) NOT NULL,
  `day` varchar(8) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO toa_registration VALUES ('1','管理员','1','2016-08-27','2016','08','27');

DROP TABLE IF EXISTS toa_registration_log;
CREATE TABLE `toa_registration_log` (
  `lid` int(11) NOT NULL AUTO_INCREMENT,
  `rid` varchar(16) DEFAULT NULL,
  `hour` varchar(16) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `number` varchar(16) DEFAULT NULL,
  `type` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`lid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO toa_registration_log VALUES ('1','1','11:02','','122','1');

DROP TABLE IF EXISTS toa_rewards;
CREATE TABLE `toa_rewards` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) DEFAULT NULL,
  `project` varchar(10) DEFAULT NULL,
  `rewardsdate` varchar(30) DEFAULT NULL,
  `wagesmonth` varchar(30) DEFAULT NULL,
  `rewardskey` varchar(10) DEFAULT NULL,
  `price` varchar(30) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `uid` varchar(10) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS toa_seal;
CREATE TABLE `toa_seal` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `sealurl` varchar(255) DEFAULT NULL,
  `sealtitle` varchar(255) DEFAULT NULL,
  `uid` varchar(16) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `unionid` varchar(16) NOT NULL,
  `sealtype` varchar(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS toa_session;
CREATE TABLE `toa_session` (
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL DEFAULT '',
  `groupid` smallint(5) unsigned NOT NULL DEFAULT '3',
  `ip` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO toa_session VALUES ('1','admin','4a7a035395ea1ad55f913055cf0d1db3','1','2130706433');

DROP TABLE IF EXISTS toa_sms_receive;
CREATE TABLE `toa_sms_receive` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `sendperson` varchar(20) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `content` text,
  `receiveperson` varchar(10) DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL,
  `smskey` varchar(10) DEFAULT NULL,
  `readdate` datetime DEFAULT NULL,
  `sendid` varchar(10) DEFAULT NULL,
  `online` varchar(5) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS toa_sms_send;
CREATE TABLE `toa_sms_send` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `receiveperson` text,
  `content` text,
  `uid` varchar(20) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS toa_training;
CREATE TABLE `toa_training` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `number` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `channel` varchar(10) DEFAULT NULL,
  `trform` varchar(10) DEFAULT NULL,
  `sponsor` varchar(255) DEFAULT NULL,
  `responsible` varchar(255) DEFAULT NULL,
  `participation` varchar(50) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `organization` varchar(255) DEFAULT NULL,
  `orgperson` varchar(255) DEFAULT NULL,
  `curriculum` varchar(255) DEFAULT NULL,
  `classhour` varchar(30) DEFAULT NULL,
  `startdate` varchar(30) DEFAULT NULL,
  `enddate` varchar(30) DEFAULT NULL,
  `price` varchar(50) DEFAULT NULL,
  `examination` varchar(255) DEFAULT NULL,
  `examinationdate` datetime DEFAULT NULL,
  `department` text,
  `user` text,
  `organizationinfo` text,
  `contactperson` text,
  `request` text,
  `appendix` varchar(255) DEFAULT NULL,
  `content` text,
  `type` varchar(10) DEFAULT NULL,
  `uid` varchar(10) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS toa_training_record;
CREATE TABLE `toa_training_record` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` text,
  `trainingid` varchar(20) DEFAULT NULL,
  `price` varchar(60) DEFAULT NULL,
  `organization` varchar(255) DEFAULT NULL,
  `training` varchar(30) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `uid` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS toa_upload;
CREATE TABLE `toa_upload` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `aid` int(10) unsigned NOT NULL DEFAULT '0',
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `username` varchar(20) NOT NULL DEFAULT '',
  `originalname` varchar(100) NOT NULL DEFAULT '',
  `filepath` varchar(255) NOT NULL DEFAULT '',
  `thumb` varchar(255) NOT NULL DEFAULT '',
  `filesize` int(10) unsigned NOT NULL DEFAULT '0',
  `filetype` varchar(50) NOT NULL DEFAULT '',
  `fileext` char(10) NOT NULL DEFAULT '',
  `dateline` int(10) unsigned NOT NULL DEFAULT '0',
  `downloads` mediumint(8) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `aid` (`aid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS toa_user;
CREATE TABLE `toa_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `departmentid` varchar(10) DEFAULT NULL,
  `flag` varchar(2) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `ischeck` varchar(2) DEFAULT NULL,
  `userkey` varchar(20) DEFAULT NULL,
  `groupid` varchar(2) DEFAULT NULL,
  `positionid` varchar(20) DEFAULT NULL,
  `loginip` text,
  `online` varchar(2) DEFAULT '0',
  `keytype` varchar(2) DEFAULT NULL,
  `keytypeuser` text,
  `numbers` int(11) DEFAULT '999',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO toa_user VALUES ('1','admin','d52e521eeb2050fd62e0d5c24c201c35','','1','2016-08-27 04:41:23','1','','1','','','1','','','999');

DROP TABLE IF EXISTS toa_user_view;
CREATE TABLE `toa_user_view` (
  `vid` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `uid` varchar(10) DEFAULT NULL,
  `number` varchar(60) DEFAULT NULL,
  `sex` varchar(20) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `participationwork` varchar(60) DEFAULT NULL,
  `tel` varchar(60) DEFAULT NULL,
  `phone` varchar(60) DEFAULT NULL,
  `fax` varchar(60) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `qq` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `homemana` text,
  `homebg` varchar(64) DEFAULT NULL,
  `pic` varchar(255) DEFAULT NULL,
  `home_txt` text,
  `hometype` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`vid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO toa_user_view VALUES ('1','管理员','1','','','','','','','','','','','','','template/default/bg/01/3.jpg','','','');

DROP TABLE IF EXISTS toa_usergroup;
CREATE TABLE `toa_usergroup` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `groupname` varchar(100) NOT NULL,
  `purview` text NOT NULL,
  `type` enum('system','user') NOT NULL DEFAULT 'user',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO toa_usergroup VALUES ('1','系统管理组','a:142:{s:11:\"department_\";s:1:\"1\";s:9:\"position_\";s:1:\"1\";s:10:\"config_inc\";s:1:\"1\";s:16:\"config_usergroup\";s:1:\"1\";s:25:\"config_usergroup_Increase\";s:1:\"1\";s:21:\"config_usergroup_edit\";s:1:\"1\";s:23:\"config_usergroup_delete\";s:1:\"1\";s:11:\"config_user\";s:1:\"1\";s:20:\"config_user_Increase\";s:1:\"1\";s:16:\"config_user_edit\";s:1:\"1\";s:18:\"config_user_delete\";s:1:\"1\";s:10:\"config_log\";s:1:\"1\";s:17:\"config_log_delete\";s:1:\"1\";s:9:\"config_db\";s:1:\"1\";s:13:\"config_db_old\";s:1:\"1\";s:11:\"config_menu\";s:1:\"1\";s:15:\"config_keytable\";s:1:\"1\";s:11:\"office_info\";s:1:\"1\";s:20:\"office_info_Increase\";s:1:\"1\";s:18:\"office_info_delete\";s:1:\"1\";s:10:\"office_sms\";s:1:\"1\";s:19:\"office_sms_Increase\";s:1:\"1\";s:15:\"office_sms_read\";s:1:\"1\";s:17:\"office_sms_delete\";s:1:\"1\";s:18:\"office_sms_channel\";s:1:\"1\";s:13:\"date_workdate\";s:1:\"1\";s:22:\"date_workdate_Increase\";s:1:\"1\";s:18:\"date_workdate_edit\";s:1:\"1\";s:20:\"date_workdate_delete\";s:1:\"1\";s:9:\"date_blog\";s:1:\"1\";s:18:\"date_blog_Increase\";s:1:\"1\";s:14:\"date_blog_edit\";s:1:\"1\";s:16:\"date_blog_delete\";s:1:\"1\";s:9:\"date_plan\";s:1:\"1\";s:18:\"date_plan_Increase\";s:1:\"1\";s:14:\"date_plan_edit\";s:1:\"1\";s:16:\"date_plan_delete\";s:1:\"1\";s:20:\"office_communication\";s:1:\"1\";s:29:\"office_communication_Increase\";s:1:\"1\";s:25:\"office_communication_edit\";s:1:\"1\";s:27:\"office_communication_delete\";s:1:\"1\";s:17:\"office_document_1\";s:1:\"1\";s:26:\"office_document_Increase_1\";s:1:\"1\";s:22:\"office_document_edit_1\";s:1:\"1\";s:24:\"office_document_delete_1\";s:1:\"1\";s:22:\"office_document_type_1\";s:1:\"1\";s:11:\"office_duty\";s:1:\"1\";s:15:\"office_duty_add\";s:1:\"1\";s:16:\"office_duty_reda\";s:1:\"1\";s:15:\"office_duty_sum\";s:1:\"1\";s:20:\"istration_conference\";s:1:\"1\";s:29:\"istration_conference_Increase\";s:1:\"1\";s:25:\"istration_conference_edit\";s:1:\"1\";s:27:\"istration_conference_delete\";s:1:\"1\";s:29:\"istration_conference_type_sce\";s:1:\"1\";s:30:\"istration_conference_type_type\";s:1:\"1\";s:14:\"news_chronicle\";s:1:\"1\";s:23:\"news_chronicle_Increase\";s:1:\"1\";s:19:\"news_chronicle_edit\";s:1:\"1\";s:21:\"news_chronicle_delete\";s:1:\"1\";s:19:\"news_chronicle_type\";s:1:\"1\";s:8:\"news_new\";s:1:\"1\";s:17:\"news_new_Increase\";s:1:\"1\";s:13:\"news_new_edit\";s:1:\"1\";s:15:\"news_new_delete\";s:1:\"1\";s:13:\"news_new_type\";s:1:\"1\";s:11:\"news_notice\";s:1:\"1\";s:20:\"news_notice_Increase\";s:1:\"1\";s:16:\"news_notice_edit\";s:1:\"1\";s:18:\"news_notice_delete\";s:1:\"1\";s:16:\"news_notice_type\";s:1:\"1\";s:11:\"news_cement\";s:1:\"1\";s:20:\"news_cement_Increase\";s:1:\"1\";s:16:\"news_cement_edit\";s:1:\"1\";s:18:\"news_cement_delete\";s:1:\"1\";s:16:\"news_cement_type\";s:1:\"1\";s:9:\"training_\";s:1:\"1\";s:15:\"training_record\";s:1:\"1\";s:8:\"rewards_\";s:1:\"1\";s:13:\"registration_\";s:1:\"1\";s:18:\"registration_excel\";s:1:\"1\";s:14:\"humancontract_\";s:1:\"1\";s:15:\"humancontract_i\";s:1:\"1\";s:15:\"humancontract_e\";s:1:\"1\";s:15:\"humancontract_d\";s:1:\"1\";s:13:\"office_type_r\";s:1:\"1\";s:18:\"knowledge_Increase\";s:1:\"1\";s:14:\"knowledge_read\";s:1:\"1\";s:16:\"knowledge_delete\";s:1:\"1\";s:17:\"office_document_4\";s:1:\"1\";s:26:\"office_document_Increase_4\";s:1:\"1\";s:22:\"office_document_edit_4\";s:1:\"1\";s:24:\"office_document_delete_4\";s:1:\"1\";s:22:\"office_document_type_4\";s:1:\"1\";s:17:\"office_document_5\";s:1:\"1\";s:26:\"office_document_Increase_5\";s:1:\"1\";s:22:\"office_document_edit_5\";s:1:\"1\";s:24:\"office_document_delete_5\";s:1:\"1\";s:22:\"office_document_type_5\";s:1:\"1\";s:15:\"news_periodical\";s:1:\"1\";s:24:\"news_periodical_Increase\";s:1:\"1\";s:20:\"news_periodical_edit\";s:1:\"1\";s:22:\"news_periodical_delete\";s:1:\"1\";s:20:\"news_periodical_type\";s:1:\"1\";s:17:\"office_document_2\";s:1:\"1\";s:26:\"office_document_Increase_2\";s:1:\"1\";s:22:\"office_document_edit_2\";s:1:\"1\";s:24:\"office_document_delete_2\";s:1:\"1\";s:22:\"office_document_type_2\";s:1:\"1\";s:17:\"office_document_3\";s:1:\"1\";s:26:\"office_document_Increase_3\";s:1:\"1\";s:22:\"office_document_edit_3\";s:1:\"1\";s:24:\"office_document_delete_3\";s:1:\"1\";s:22:\"office_document_type_3\";s:1:\"1\";s:17:\"office_document_6\";s:1:\"1\";s:26:\"office_document_Increase_6\";s:1:\"1\";s:22:\"office_document_edit_6\";s:1:\"1\";s:24:\"office_document_delete_6\";s:1:\"1\";s:22:\"office_document_type_6\";s:1:\"1\";s:7:\"bbs_add\";s:1:\"1\";s:8:\"bbs_edit\";s:1:\"1\";s:7:\"bbs_key\";s:1:\"1\";s:4:\"bbs_\";s:1:\"1\";s:9:\"bbsclass_\";s:1:\"1\";s:10:\"bbs_delete\";s:1:\"1\";s:4:\"app_\";s:1:\"1\";s:7:\"app_add\";s:1:\"1\";s:7:\"excel_1\";s:1:\"1\";s:7:\"excel_2\";s:1:\"1\";s:7:\"excel_3\";s:1:\"1\";s:7:\"excel_4\";s:1:\"1\";s:7:\"excel_5\";s:1:\"1\";s:7:\"excel_6\";s:1:\"1\";s:7:\"excel_7\";s:1:\"1\";s:7:\"excel_8\";s:1:\"1\";s:8:\"excel_41\";s:1:\"0\";s:8:\"excel_25\";s:1:\"1\";s:8:\"excel_30\";s:1:\"1\";s:8:\"excel_31\";s:1:\"1\";s:8:\"excel_32\";s:1:\"1\";s:8:\"excel_39\";s:1:\"1\";s:8:\"excel_40\";s:1:\"1\";}','system');
INSERT INTO toa_usergroup VALUES ('2','管理组','a:134:{s:11:\"department_\";s:1:\"0\";s:9:\"position_\";s:1:\"0\";s:10:\"config_inc\";s:1:\"0\";s:16:\"config_usergroup\";s:1:\"0\";s:11:\"config_user\";s:1:\"1\";s:20:\"config_user_Increase\";s:1:\"1\";s:16:\"config_user_edit\";s:1:\"1\";s:10:\"config_log\";s:1:\"0\";s:11:\"config_menu\";s:1:\"0\";s:15:\"config_keytable\";s:1:\"0\";s:11:\"office_info\";s:1:\"1\";s:20:\"office_info_Increase\";s:1:\"1\";s:18:\"office_info_delete\";s:1:\"1\";s:10:\"office_sms\";s:1:\"1\";s:19:\"office_sms_Increase\";s:1:\"1\";s:15:\"office_sms_read\";s:1:\"1\";s:17:\"office_sms_delete\";s:1:\"1\";s:13:\"date_workdate\";s:1:\"1\";s:22:\"date_workdate_Increase\";s:1:\"1\";s:18:\"date_workdate_edit\";s:1:\"1\";s:20:\"date_workdate_delete\";s:1:\"1\";s:9:\"date_blog\";s:1:\"1\";s:18:\"date_blog_Increase\";s:1:\"1\";s:14:\"date_blog_edit\";s:1:\"1\";s:16:\"date_blog_delete\";s:1:\"1\";s:9:\"date_plan\";s:1:\"1\";s:18:\"date_plan_Increase\";s:1:\"1\";s:14:\"date_plan_edit\";s:1:\"1\";s:16:\"date_plan_delete\";s:1:\"1\";s:20:\"office_communication\";s:1:\"1\";s:29:\"office_communication_Increase\";s:1:\"1\";s:25:\"office_communication_edit\";s:1:\"1\";s:27:\"office_communication_delete\";s:1:\"1\";s:17:\"office_document_1\";s:1:\"1\";s:26:\"office_document_Increase_1\";s:1:\"1\";s:22:\"office_document_edit_1\";s:1:\"1\";s:24:\"office_document_delete_1\";s:1:\"1\";s:22:\"office_document_type_1\";s:1:\"1\";s:11:\"office_duty\";s:1:\"1\";s:15:\"office_duty_add\";s:1:\"1\";s:16:\"office_duty_reda\";s:1:\"1\";s:15:\"office_duty_sum\";s:1:\"1\";s:20:\"istration_conference\";s:1:\"1\";s:29:\"istration_conference_Increase\";s:1:\"1\";s:25:\"istration_conference_edit\";s:1:\"1\";s:27:\"istration_conference_delete\";s:1:\"1\";s:29:\"istration_conference_type_sce\";s:1:\"1\";s:30:\"istration_conference_type_type\";s:1:\"1\";s:14:\"news_chronicle\";s:1:\"1\";s:23:\"news_chronicle_Increase\";s:1:\"1\";s:19:\"news_chronicle_edit\";s:1:\"1\";s:21:\"news_chronicle_delete\";s:1:\"1\";s:19:\"news_chronicle_type\";s:1:\"1\";s:8:\"news_new\";s:1:\"1\";s:17:\"news_new_Increase\";s:1:\"1\";s:13:\"news_new_edit\";s:1:\"1\";s:15:\"news_new_delete\";s:1:\"1\";s:13:\"news_new_type\";s:1:\"1\";s:11:\"news_notice\";s:1:\"1\";s:20:\"news_notice_Increase\";s:1:\"1\";s:16:\"news_notice_edit\";s:1:\"1\";s:18:\"news_notice_delete\";s:1:\"1\";s:16:\"news_notice_type\";s:1:\"1\";s:11:\"news_cement\";s:1:\"1\";s:20:\"news_cement_Increase\";s:1:\"1\";s:16:\"news_cement_edit\";s:1:\"1\";s:18:\"news_cement_delete\";s:1:\"1\";s:16:\"news_cement_type\";s:1:\"1\";s:9:\"training_\";s:1:\"1\";s:15:\"training_record\";s:1:\"1\";s:8:\"rewards_\";s:1:\"1\";s:13:\"registration_\";s:1:\"1\";s:18:\"registration_excel\";s:1:\"1\";s:14:\"humancontract_\";s:1:\"1\";s:15:\"humancontract_i\";s:1:\"1\";s:15:\"humancontract_e\";s:1:\"1\";s:15:\"humancontract_d\";s:1:\"1\";s:13:\"office_type_r\";s:1:\"1\";s:18:\"knowledge_Increase\";s:1:\"1\";s:14:\"knowledge_read\";s:1:\"1\";s:16:\"knowledge_delete\";s:1:\"1\";s:17:\"office_document_4\";s:1:\"1\";s:26:\"office_document_Increase_4\";s:1:\"1\";s:22:\"office_document_edit_4\";s:1:\"1\";s:24:\"office_document_delete_4\";s:1:\"1\";s:22:\"office_document_type_4\";s:1:\"1\";s:17:\"office_document_5\";s:1:\"1\";s:26:\"office_document_Increase_5\";s:1:\"1\";s:22:\"office_document_edit_5\";s:1:\"1\";s:24:\"office_document_delete_5\";s:1:\"1\";s:22:\"office_document_type_5\";s:1:\"1\";s:15:\"news_periodical\";s:1:\"1\";s:24:\"news_periodical_Increase\";s:1:\"1\";s:20:\"news_periodical_edit\";s:1:\"1\";s:22:\"news_periodical_delete\";s:1:\"1\";s:20:\"news_periodical_type\";s:1:\"1\";s:17:\"office_document_2\";s:1:\"1\";s:26:\"office_document_Increase_2\";s:1:\"1\";s:22:\"office_document_edit_2\";s:1:\"1\";s:24:\"office_document_delete_2\";s:1:\"1\";s:22:\"office_document_type_2\";s:1:\"1\";s:17:\"office_document_3\";s:1:\"1\";s:26:\"office_document_Increase_3\";s:1:\"1\";s:22:\"office_document_edit_3\";s:1:\"1\";s:24:\"office_document_delete_3\";s:1:\"1\";s:22:\"office_document_type_3\";s:1:\"1\";s:17:\"office_document_6\";s:1:\"1\";s:26:\"office_document_Increase_6\";s:1:\"1\";s:22:\"office_document_edit_6\";s:1:\"1\";s:24:\"office_document_delete_6\";s:1:\"1\";s:22:\"office_document_type_6\";s:1:\"1\";s:7:\"bbs_add\";s:1:\"1\";s:8:\"bbs_edit\";s:1:\"1\";s:7:\"bbs_key\";s:1:\"1\";s:4:\"bbs_\";s:1:\"1\";s:9:\"bbsclass_\";s:1:\"1\";s:10:\"bbs_delete\";s:1:\"1\";s:4:\"app_\";s:1:\"1\";s:7:\"app_add\";s:1:\"1\";s:7:\"excel_1\";s:1:\"1\";s:7:\"excel_2\";s:1:\"1\";s:7:\"excel_3\";s:1:\"1\";s:7:\"excel_4\";s:1:\"1\";s:7:\"excel_5\";s:1:\"1\";s:7:\"excel_6\";s:1:\"1\";s:7:\"excel_7\";s:1:\"1\";s:7:\"excel_8\";s:1:\"1\";s:8:\"excel_41\";s:1:\"0\";s:8:\"excel_25\";s:1:\"1\";s:8:\"excel_30\";s:1:\"1\";s:8:\"excel_31\";s:1:\"1\";s:8:\"excel_32\";s:1:\"1\";s:8:\"excel_39\";s:1:\"1\";s:8:\"excel_40\";s:1:\"1\";}','system');
INSERT INTO toa_usergroup VALUES ('3','用户组','a:82:{s:11:\"department_\";s:1:\"0\";s:9:\"position_\";s:1:\"0\";s:10:\"config_inc\";s:1:\"0\";s:16:\"config_usergroup\";s:1:\"0\";s:11:\"config_user\";s:1:\"0\";s:10:\"config_log\";s:1:\"0\";s:11:\"config_menu\";s:1:\"0\";s:15:\"config_keytable\";s:1:\"0\";s:11:\"office_info\";s:1:\"1\";s:20:\"office_info_Increase\";s:1:\"1\";s:10:\"office_sms\";s:1:\"1\";s:19:\"office_sms_Increase\";s:1:\"1\";s:15:\"office_sms_read\";s:1:\"1\";s:13:\"date_workdate\";s:1:\"1\";s:22:\"date_workdate_Increase\";s:1:\"1\";s:18:\"date_workdate_edit\";s:1:\"1\";s:9:\"date_blog\";s:1:\"1\";s:18:\"date_blog_Increase\";s:1:\"1\";s:14:\"date_blog_edit\";s:1:\"1\";s:9:\"date_plan\";s:1:\"1\";s:18:\"date_plan_Increase\";s:1:\"1\";s:14:\"date_plan_edit\";s:1:\"1\";s:20:\"office_communication\";s:1:\"1\";s:29:\"office_communication_Increase\";s:1:\"1\";s:25:\"office_communication_edit\";s:1:\"1\";s:17:\"office_document_1\";s:1:\"1\";s:26:\"office_document_Increase_1\";s:1:\"1\";s:22:\"office_document_edit_1\";s:1:\"1\";s:11:\"office_duty\";s:1:\"1\";s:15:\"office_duty_add\";s:1:\"1\";s:16:\"office_duty_reda\";s:1:\"1\";s:15:\"office_duty_sum\";s:1:\"1\";s:20:\"istration_conference\";s:1:\"1\";s:29:\"istration_conference_Increase\";s:1:\"1\";s:25:\"istration_conference_edit\";s:1:\"1\";s:14:\"news_chronicle\";s:1:\"1\";s:23:\"news_chronicle_Increase\";s:1:\"1\";s:19:\"news_chronicle_edit\";s:1:\"1\";s:8:\"news_new\";s:1:\"1\";s:17:\"news_new_Increase\";s:1:\"1\";s:13:\"news_new_edit\";s:1:\"1\";s:11:\"news_notice\";s:1:\"1\";s:20:\"news_notice_Increase\";s:1:\"1\";s:16:\"news_notice_edit\";s:1:\"1\";s:11:\"news_cement\";s:1:\"1\";s:20:\"news_cement_Increase\";s:1:\"1\";s:16:\"news_cement_edit\";s:1:\"1\";s:9:\"training_\";s:1:\"1\";s:15:\"training_record\";s:1:\"1\";s:8:\"rewards_\";s:1:\"1\";s:13:\"registration_\";s:1:\"0\";s:14:\"humancontract_\";s:1:\"1\";s:15:\"humancontract_i\";s:1:\"1\";s:15:\"humancontract_e\";s:1:\"1\";s:13:\"office_type_r\";s:1:\"0\";s:18:\"knowledge_Increase\";s:1:\"1\";s:14:\"knowledge_read\";s:1:\"1\";s:17:\"office_document_4\";s:1:\"1\";s:26:\"office_document_Increase_4\";s:1:\"1\";s:22:\"office_document_edit_4\";s:1:\"1\";s:17:\"office_document_5\";s:1:\"1\";s:26:\"office_document_Increase_5\";s:1:\"1\";s:22:\"office_document_edit_5\";s:1:\"1\";s:15:\"news_periodical\";s:1:\"1\";s:24:\"news_periodical_Increase\";s:1:\"1\";s:20:\"news_periodical_edit\";s:1:\"1\";s:17:\"office_document_2\";s:1:\"1\";s:26:\"office_document_Increase_2\";s:1:\"1\";s:22:\"office_document_edit_2\";s:1:\"1\";s:17:\"office_document_3\";s:1:\"1\";s:26:\"office_document_Increase_3\";s:1:\"1\";s:22:\"office_document_edit_3\";s:1:\"1\";s:17:\"office_document_6\";s:1:\"1\";s:26:\"office_document_Increase_6\";s:1:\"1\";s:22:\"office_document_edit_6\";s:1:\"1\";s:7:\"bbs_add\";s:1:\"1\";s:8:\"bbs_edit\";s:1:\"1\";s:7:\"bbs_key\";s:1:\"1\";s:4:\"bbs_\";s:1:\"1\";s:4:\"app_\";s:1:\"1\";s:7:\"app_add\";s:1:\"1\";s:8:\"excel_41\";s:1:\"0\";}','system');

DROP TABLE IF EXISTS toa_web;
CREATE TABLE `toa_web` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(60) DEFAULT NULL,
  `weburl` varchar(120) DEFAULT NULL,
  `content` varchar(120) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `uid` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS toa_workdate;
CREATE TABLE `toa_workdate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `otype` varchar(10) DEFAULT NULL,
  `startdate` datetime DEFAULT NULL,
  `enddate` datetime DEFAULT NULL,
  `content` varchar(1000) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL,
  `uid` varchar(10) DEFAULT NULL,
  `completiondate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


