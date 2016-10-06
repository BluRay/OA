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

INSERT INTO toa_keytable VALUES ('1','ϵͳ����Ȩ������','config_inc','1','1','1','1','0');
INSERT INTO toa_keytable VALUES ('2','ϵͳ����','config_inc','1','1','1','999','1');
INSERT INTO toa_keytable VALUES ('3','����','config_inc','1','1','1','1','2');
INSERT INTO toa_keytable VALUES ('4','��ֹ','config_inc','0','2','1','2','2');
INSERT INTO toa_keytable VALUES ('5','Ȩ��������','input_name','0','1','1','999','1');
INSERT INTO toa_keytable VALUES ('6','����','config_usergroup','1','1','1','1','5');
INSERT INTO toa_keytable VALUES ('7','��ֹ','config_usergroup','0','2','1','2','5');
INSERT INTO toa_keytable VALUES ('8','���','config_usergroup_Increase','1','1','2','3','5');
INSERT INTO toa_keytable VALUES ('9','�༭','config_usergroup_edit','1','1','2','4','5');
INSERT INTO toa_keytable VALUES ('10','ɾ��','config_usergroup_delete','1','1','2','5','5');
INSERT INTO toa_keytable VALUES ('11','�˺�����','input_name','0','1','1','999','1');
INSERT INTO toa_keytable VALUES ('12','����','config_user','1','1','1','1','11');
INSERT INTO toa_keytable VALUES ('13','��ֹ','config_user','0','2','1','2','11');
INSERT INTO toa_keytable VALUES ('14','���','config_user_Increase','1','1','2','3','11');
INSERT INTO toa_keytable VALUES ('15','�༭','config_user_edit','1','1','2','4','11');
INSERT INTO toa_keytable VALUES ('16','ɾ��','config_user_delete','1','1','2','5','11');
INSERT INTO toa_keytable VALUES ('17','ϵͳά��','input_name','0','1','1','999','1');
INSERT INTO toa_keytable VALUES ('18','����','config_log','1','1','1','1','17');
INSERT INTO toa_keytable VALUES ('19','��ֹ','config_log','0','2','1','2','17');
INSERT INTO toa_keytable VALUES ('20','����','config_log_delete','1','1','2','3','17');
INSERT INTO toa_keytable VALUES ('21','���ݱ���','config_db','0','1','1','999','1');
INSERT INTO toa_keytable VALUES ('22','������','config_db','1','1','2','1','21');
INSERT INTO toa_keytable VALUES ('23','����ԭ','config_db_old','1','1','2','2','21');
INSERT INTO toa_keytable VALUES ('24','����̨','input_name','0','1','1','2','0');
INSERT INTO toa_keytable VALUES ('361','�����칫','input_name','0','1','1','4','357');
INSERT INTO toa_keytable VALUES ('362','������Դ','input_name','0','1','1','5','357');
INSERT INTO toa_keytable VALUES ('30','����Ϣ','input_name','0','1','1','1','24');
INSERT INTO toa_keytable VALUES ('31','����','office_info','1','1','1','1','30');
INSERT INTO toa_keytable VALUES ('32','��ֹ','office_info','0','2','1','2','30');
INSERT INTO toa_keytable VALUES ('33','����','office_info_Increase','1','1','2','3','30');
INSERT INTO toa_keytable VALUES ('34','ɾ��','office_info_delete','1','1','2','4','30');
INSERT INTO toa_keytable VALUES ('35','�ֻ�����','input_name','0','1','1','2','24');
INSERT INTO toa_keytable VALUES ('36','����','office_sms','1','1','1','1','35');
INSERT INTO toa_keytable VALUES ('37','��ֹ','office_sms','0','2','1','2','35');
INSERT INTO toa_keytable VALUES ('38','������','office_sms_Increase','1','1','2','3','35');
INSERT INTO toa_keytable VALUES ('39','�ն���','office_sms_read','1','1','2','4','35');
INSERT INTO toa_keytable VALUES ('40','ɾ��','office_sms_delete','1','1','2','5','35');
INSERT INTO toa_keytable VALUES ('41','�ճ̰���','input_name','0','1','1','3','24');
INSERT INTO toa_keytable VALUES ('42','����','date_workdate','1','1','1','1','41');
INSERT INTO toa_keytable VALUES ('43','��ֹ','date_workdate','0','2','1','2','41');
INSERT INTO toa_keytable VALUES ('44','���','date_workdate_Increase','1','1','2','3','41');
INSERT INTO toa_keytable VALUES ('45','�༭','date_workdate_edit','1','1','2','4','41');
INSERT INTO toa_keytable VALUES ('46','ɾ��','date_workdate_delete','1','1','2','5','41');
INSERT INTO toa_keytable VALUES ('47','�����ռ�','input_name','0','1','1','4','24');
INSERT INTO toa_keytable VALUES ('48','����','date_blog','1','1','1','1','47');
INSERT INTO toa_keytable VALUES ('49','��ֹ','date_blog','0','2','1','2','47');
INSERT INTO toa_keytable VALUES ('50','���','date_blog_Increase','1','1','2','3','47');
INSERT INTO toa_keytable VALUES ('51','�༭','date_blog_edit','1','1','2','4','47');
INSERT INTO toa_keytable VALUES ('52','ɾ��','date_blog_delete','1','1','2','5','47');
INSERT INTO toa_keytable VALUES ('53','�����ƻ�','input_name','0','1','1','5','24');
INSERT INTO toa_keytable VALUES ('54','����','date_plan','1','1','1','1','53');
INSERT INTO toa_keytable VALUES ('55','��ֹ','date_plan','0','2','1','2','53');
INSERT INTO toa_keytable VALUES ('56','���','date_plan_Increase','1','1','2','3','53');
INSERT INTO toa_keytable VALUES ('57','�༭','date_plan_edit','1','1','2','4','53');
INSERT INTO toa_keytable VALUES ('58','ɾ��','date_plan_delete','1','1','2','5','53');
INSERT INTO toa_keytable VALUES ('59','ͨѶ¼','input_name','0','1','1','6','24');
INSERT INTO toa_keytable VALUES ('60','����','office_communication','1','1','1','1','59');
INSERT INTO toa_keytable VALUES ('61','��ֹ','office_communication','0','2','1','2','59');
INSERT INTO toa_keytable VALUES ('62','���','office_communication_Increase','1','1','2','3','59');
INSERT INTO toa_keytable VALUES ('63','�༭','office_communication_edit','1','1','2','4','59');
INSERT INTO toa_keytable VALUES ('64','ɾ��','office_communication_delete','1','1','2','5','59');
INSERT INTO toa_keytable VALUES ('65','�����ļ���','input_name','0','1','1','7','24');
INSERT INTO toa_keytable VALUES ('66','����','office_document_1','1','1','1','1','65');
INSERT INTO toa_keytable VALUES ('67','��ֹ','office_document_1','0','2','1','2','65');
INSERT INTO toa_keytable VALUES ('68','���','office_document_Increase_1','1','1','2','3','65');
INSERT INTO toa_keytable VALUES ('69','�༭','office_document_edit_1','1','1','2','4','65');
INSERT INTO toa_keytable VALUES ('70','ɾ��','office_document_delete_1','1','1','2','5','65');
INSERT INTO toa_keytable VALUES ('344','�޸�ͶƱ','app_update','1','1','2','4','234');
INSERT INTO toa_keytable VALUES ('103','֪ʶ��','input_name','0','1','1','9','0');
INSERT INTO toa_keytable VALUES ('104','֪ʶ����','input_name','0','1','1','1','103');
INSERT INTO toa_keytable VALUES ('105','����','knowledge_Increase','1','1','2','1','104');
INSERT INTO toa_keytable VALUES ('106','�༭','knowledge_read','1','1','2','2','104');
INSERT INTO toa_keytable VALUES ('107','ɾ��','knowledge_delete','1','1','2','3','104');
INSERT INTO toa_keytable VALUES ('108','���ع���','input_name','0','1','1','2','103');
INSERT INTO toa_keytable VALUES ('109','�ļ��й���','office_document_type_4','1','1','2','6','108');
INSERT INTO toa_keytable VALUES ('110','���ط���','office_document_Increase_4','1','1','2','3','108');
INSERT INTO toa_keytable VALUES ('111','���ر༭','office_document_edit_4','1','1','2','4','108');
INSERT INTO toa_keytable VALUES ('112','����ɾ��','office_document_delete_4','1','1','2','5','108');
INSERT INTO toa_keytable VALUES ('113','�����ƶ�','input_name','0','1','1','3','103');
INSERT INTO toa_keytable VALUES ('114','Ŀ¼����','office_document_type_5','1','1','2','6','113');
INSERT INTO toa_keytable VALUES ('115','��Ϣ����','office_document_Increase_5','1','1','2','3','113');
INSERT INTO toa_keytable VALUES ('116','��Ϣ�༭','office_document_edit_5','1','1','2','4','113');
INSERT INTO toa_keytable VALUES ('117','��Ϣɾ��','office_document_delete_5','1','1','2','5','113');
INSERT INTO toa_keytable VALUES ('118','�����ڿ�','input_name','0','1','1','4','103');
INSERT INTO toa_keytable VALUES ('119','����','news_periodical','1','1','1','1','118');
INSERT INTO toa_keytable VALUES ('120','��ֹ','news_periodical','0','2','1','2','118');
INSERT INTO toa_keytable VALUES ('121','���','news_periodical_Increase','1','1','2','3','118');
INSERT INTO toa_keytable VALUES ('122','�༭','news_periodical_edit','1','1','2','4','118');
INSERT INTO toa_keytable VALUES ('123','ɾ��','news_periodical_delete','1','1','2','5','118');
INSERT INTO toa_keytable VALUES ('124','��������','news_periodical_type','1','1','2','6','118');
INSERT INTO toa_keytable VALUES ('125','�����ļ���','input_name','0','1','1','5','103');
INSERT INTO toa_keytable VALUES ('126','�ļ��й���','office_document_type_2','1','1','2','6','125');
INSERT INTO toa_keytable VALUES ('127','�ļ��ϴ�','office_document_Increase_2','1','1','2','3','125');
INSERT INTO toa_keytable VALUES ('128','�ļ��޸�','office_document_edit_2','1','1','2','4','125');
INSERT INTO toa_keytable VALUES ('129','�ļ�ɾ��','office_document_delete_2','1','1','2','5','125');
INSERT INTO toa_keytable VALUES ('130','����Ӳ��','input_name','0','1','1','6','103');
INSERT INTO toa_keytable VALUES ('131','�ļ��й���','office_document_type_3','1','1','2','6','130');
INSERT INTO toa_keytable VALUES ('132','�ļ��ϴ�','office_document_Increase_3','1','1','2','3','130');
INSERT INTO toa_keytable VALUES ('133','�ļ��༭','office_document_edit_3','1','1','2','4','130');
INSERT INTO toa_keytable VALUES ('134','�ļ�ɾ��','office_document_delete_3','1','1','2','5','130');
INSERT INTO toa_keytable VALUES ('135','�������','input_name','0','1','1','7','103');
INSERT INTO toa_keytable VALUES ('136','�������','office_document_type_6','1','1','2','6','135');
INSERT INTO toa_keytable VALUES ('137','�����ϴ�','office_document_Increase_6','1','1','2','3','135');
INSERT INTO toa_keytable VALUES ('138','����༭','office_document_edit_6','1','1','2','4','135');
INSERT INTO toa_keytable VALUES ('139','����ɾ��','office_document_delete_6','1','1','2','5','135');
INSERT INTO toa_keytable VALUES ('140','�����칫','input_name','0','1','1','3','0');
INSERT INTO toa_keytable VALUES ('141','���¼�','input_name','0','1','1','5','140');
INSERT INTO toa_keytable VALUES ('142','����','news_chronicle','1','1','1','1','141');
INSERT INTO toa_keytable VALUES ('143','��ֹ','news_chronicle','0','2','1','2','141');
INSERT INTO toa_keytable VALUES ('144','���','news_chronicle_Increase','1','1','2','3','141');
INSERT INTO toa_keytable VALUES ('145','�༭','news_chronicle_edit','1','1','2','4','141');
INSERT INTO toa_keytable VALUES ('146','ɾ��','news_chronicle_delete','1','1','2','5','141');
INSERT INTO toa_keytable VALUES ('147','��������','news_chronicle_type','1','1','2','6','141');
INSERT INTO toa_keytable VALUES ('148','����','input_name','0','1','1','6','140');
INSERT INTO toa_keytable VALUES ('149','����','news_new','1','1','1','1','148');
INSERT INTO toa_keytable VALUES ('150','��ֹ','news_new','0','2','1','2','148');
INSERT INTO toa_keytable VALUES ('151','���','news_new_Increase','1','1','2','3','148');
INSERT INTO toa_keytable VALUES ('152','�༭','news_new_edit','1','1','2','4','148');
INSERT INTO toa_keytable VALUES ('153','ɾ��','news_new_delete','1','1','2','5','148');
INSERT INTO toa_keytable VALUES ('154','��������','news_new_type','1','1','2','6','148');
INSERT INTO toa_keytable VALUES ('155','֪ͨ','input_name','0','1','1','7','140');
INSERT INTO toa_keytable VALUES ('156','����','news_notice','1','1','1','1','155');
INSERT INTO toa_keytable VALUES ('157','��ֹ','news_notice','0','2','1','2','155');
INSERT INTO toa_keytable VALUES ('158','���','news_notice_Increase','1','1','2','3','155');
INSERT INTO toa_keytable VALUES ('159','�༭','news_notice_edit','1','1','2','4','155');
INSERT INTO toa_keytable VALUES ('160','ɾ��','news_notice_delete','1','1','2','5','155');
INSERT INTO toa_keytable VALUES ('161','��������','news_notice_type','1','1','2','6','155');
INSERT INTO toa_keytable VALUES ('162','����','input_name','0','1','1','8','140');
INSERT INTO toa_keytable VALUES ('164','����','news_cement','1','1','1','1','162');
INSERT INTO toa_keytable VALUES ('165','��ֹ','news_cement','0','2','1','2','162');
INSERT INTO toa_keytable VALUES ('166','���','news_cement_Increase','1','1','2','3','162');
INSERT INTO toa_keytable VALUES ('167','�༭','news_cement_edit','1','1','2','4','162');
INSERT INTO toa_keytable VALUES ('168','ɾ��','news_cement_delete','1','1','2','5','162');
INSERT INTO toa_keytable VALUES ('169','��������','news_cement_type','1','1','2','6','162');
INSERT INTO toa_keytable VALUES ('181','�������','input_name','0','1','1','3','140');
INSERT INTO toa_keytable VALUES ('182','����','istration_conference','1','1','1','1','181');
INSERT INTO toa_keytable VALUES ('183','��ֹ','istration_conference','0','2','1','2','181');
INSERT INTO toa_keytable VALUES ('184','��������','istration_conference_Increase','1','1','2','3','181');
INSERT INTO toa_keytable VALUES ('185','����༭','istration_conference_edit','1','1','2','4','181');
INSERT INTO toa_keytable VALUES ('186','����ɾ��','istration_conference_delete','1','1','2','5','181');
INSERT INTO toa_keytable VALUES ('366','֪ʶ��','input_name','0','1','1','9','357');
INSERT INTO toa_keytable VALUES ('367','���߽���','input_name','0','1','1','10','357');
INSERT INTO toa_keytable VALUES ('368','�����ƻ�','excel_6','1','1','2','6','358');
INSERT INTO toa_keytable VALUES ('369','ͨѸ¼','excel_7','1','1','2','7','358');
INSERT INTO toa_keytable VALUES ('190','����������','istration_conference_type_sce','1','1','2','9','181');
INSERT INTO toa_keytable VALUES ('191','������������','istration_conference_type_type','1','1','2','10','181');
INSERT INTO toa_keytable VALUES ('192','������Դ','input_name','0','1','1','5','0');
INSERT INTO toa_keytable VALUES ('193','���Ź���','department_','1','1','1','7','1');
INSERT INTO toa_keytable VALUES ('194','����','department_','1','1','1','1','193');
INSERT INTO toa_keytable VALUES ('195','��ֹ','department_','0','2','1','2','193');
INSERT INTO toa_keytable VALUES ('196','��λ����','position_','1','1','1','8','1');
INSERT INTO toa_keytable VALUES ('197','����','position_','1','1','1','1','196');
INSERT INTO toa_keytable VALUES ('198','��ֹ','position_','0','2','1','2','196');
INSERT INTO toa_keytable VALUES ('357','����Ȩ������','input_name','0','1','1','12','0');
INSERT INTO toa_keytable VALUES ('358','����̨','input_name','0','1','1','1','357');
INSERT INTO toa_keytable VALUES ('202','���º�ͬ','input_name','0','1','1','5','192');
INSERT INTO toa_keytable VALUES ('203','���','humancontract_i','1','2','2','3','202');
INSERT INTO toa_keytable VALUES ('204','�༭','humancontract_e','1','2','2','4','202');
INSERT INTO toa_keytable VALUES ('205','ɾ��','humancontract_d','1','2','2','5','202');
INSERT INTO toa_keytable VALUES ('206','����','humancontract_','1','1','1','1','202');
INSERT INTO toa_keytable VALUES ('207','��ֹ','humancontract_','0','2','1','2','202');
INSERT INTO toa_keytable VALUES ('213','��ѵ����','input_name','0','1','1','2','192');
INSERT INTO toa_keytable VALUES ('214','��ѵ����','training_','1','2','2','1','213');
INSERT INTO toa_keytable VALUES ('215','��ѵ��¼','training_record','1','2','2','2','213');
INSERT INTO toa_keytable VALUES ('216','���͹���','input_name','0','1','1','3','192');
INSERT INTO toa_keytable VALUES ('217','����','rewards_','1','1','1','1','216');
INSERT INTO toa_keytable VALUES ('218','��ֹ','rewards_','0','2','1','2','216');
INSERT INTO toa_keytable VALUES ('219','���ڹ���','input_name','0','1','1','4','192');
INSERT INTO toa_keytable VALUES ('220','����','registration_','1','1','1','1','219');
INSERT INTO toa_keytable VALUES ('221','��ֹ','registration_','0','2','1','2','219');
INSERT INTO toa_keytable VALUES ('222','��������','registration_excel','1','2','2','3','219');
INSERT INTO toa_keytable VALUES ('223','�����������','input_name','0','1','1','9','192');
INSERT INTO toa_keytable VALUES ('224','����','office_type_r','1','1','1','1','223');
INSERT INTO toa_keytable VALUES ('225','��ֹ','office_type_r','0','2','1','2','223');
INSERT INTO toa_keytable VALUES ('226','���߽���','input_name','0','1','1','11','0');
INSERT INTO toa_keytable VALUES ('227','��̳','input_name','0','1','1','1','226');
INSERT INTO toa_keytable VALUES ('228','��̳�������','bbsclass_','1','2','2','5','227');
INSERT INTO toa_keytable VALUES ('229','��̳ʹ��','bbs_','1','2','2','4','227');
INSERT INTO toa_keytable VALUES ('230','��������','bbs_key','1','2','2','3','227');
INSERT INTO toa_keytable VALUES ('231','����','bbs_add','1','2','2','1','227');
INSERT INTO toa_keytable VALUES ('232','ɾ��','bbs_delete','1','2','2','6','227');
INSERT INTO toa_keytable VALUES ('233','�༭','bbs_edit','1','2','2','2','227');
INSERT INTO toa_keytable VALUES ('234','ͶƱ','input_name','0','1','1','2','226');
INSERT INTO toa_keytable VALUES ('235','����','app_','1','1','1','1','234');
INSERT INTO toa_keytable VALUES ('236','��ֹ','app_','0','2','1','2','234');
INSERT INTO toa_keytable VALUES ('237','����ͶƱ','app_add','1','2','2','3','234');
INSERT INTO toa_keytable VALUES ('238','�˵�����','input_name','0','1','1','999','1');
INSERT INTO toa_keytable VALUES ('239','����','config_menu','1','1','1','1','238');
INSERT INTO toa_keytable VALUES ('240','�ܾ�','config_menu','0','2','1','2','238');
INSERT INTO toa_keytable VALUES ('241','Ȩ�޹���','input_name','0','1','1','999','1');
INSERT INTO toa_keytable VALUES ('242','����','config_keytable','1','1','1','1','241');
INSERT INTO toa_keytable VALUES ('243','�ܾ�','config_keytable','0','2','1','2','241');
INSERT INTO toa_keytable VALUES ('244','�����˺�','office_sms_channel','1','1','2','6','35');
INSERT INTO toa_keytable VALUES ('245','�������','input_name','0','1','1','8','24');
INSERT INTO toa_keytable VALUES ('246','����','office_duty','1','1','1','1','245');
INSERT INTO toa_keytable VALUES ('247','�ܾ�','office_duty','0','2','1','2','245');
INSERT INTO toa_keytable VALUES ('248','���񷢲�','office_duty_add','1','1','2','3','245');
INSERT INTO toa_keytable VALUES ('249','����鿴','office_duty_reda','1','1','2','4','245');
INSERT INTO toa_keytable VALUES ('250','������־','office_duty_sum','1','1','2','5','245');
INSERT INTO toa_keytable VALUES ('251','�������','office_document_type_1','1','1','2','6','65');
INSERT INTO toa_keytable VALUES ('252','����','office_document_4','1','1','1','1','108');
INSERT INTO toa_keytable VALUES ('253','�ܾ�','office_document_4','0','2','1','2','108');
INSERT INTO toa_keytable VALUES ('254','����','office_document_5','1','1','1','1','113');
INSERT INTO toa_keytable VALUES ('255','�ܾ�','office_document_5','0','2','1','2','113');
INSERT INTO toa_keytable VALUES ('256','����','office_document_2','1','1','1','1','125');
INSERT INTO toa_keytable VALUES ('257','�ܾ�','office_document_2','0','2','1','2','125');
INSERT INTO toa_keytable VALUES ('258','����','office_document_3','1','1','1','1','130');
INSERT INTO toa_keytable VALUES ('259','�ܾ�','office_document_3','0','2','1','2','130');
INSERT INTO toa_keytable VALUES ('260','����','office_document_6','1','1','1','1','135');
INSERT INTO toa_keytable VALUES ('261','�ܾ�','office_document_6','0','2','1','2','135');
INSERT INTO toa_keytable VALUES ('345','ɾ��ͶƱ','app_del','1','1','2','5','234');
INSERT INTO toa_keytable VALUES ('370','�������','excel_8','1','1','2','8','358');
INSERT INTO toa_keytable VALUES ('371','�������','excel_1','1','1','2','1','358');
INSERT INTO toa_keytable VALUES ('372','�ֻ�����','excel_2','1','1','2','2','358');
INSERT INTO toa_keytable VALUES ('373','����Ϣ','excel_3','1','1','2','3','358');
INSERT INTO toa_keytable VALUES ('374','�ճ̰���','excel_4','1','1','2','4','358');
INSERT INTO toa_keytable VALUES ('375','�����ռ�','excel_5','1','1','2','5','358');
INSERT INTO toa_keytable VALUES ('393','���ڹ���','excel_25','1','1','2','1','362');
INSERT INTO toa_keytable VALUES ('398','���º�ͬ','excel_30','1','1','2','6','362');
INSERT INTO toa_keytable VALUES ('399','��ѵ','excel_31','1','1','2','7','362');
INSERT INTO toa_keytable VALUES ('400','����','excel_32','1','1','2','8','362');
INSERT INTO toa_keytable VALUES ('407','֪ʶ','excel_39','1','1','2','1','366');
INSERT INTO toa_keytable VALUES ('408','ͶƱ','excel_40','1','1','2','1','367');
INSERT INTO toa_keytable VALUES ('409','��Ϣ����','excel_41','0','1','2','6','361');

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

INSERT INTO toa_menu VALUES ('3','���˰칫','home.php?mid=3','0','0','1','1');
INSERT INTO toa_menu VALUES ('9','֪ʶ����','home.php?mid=9','0','0','9','1');
INSERT INTO toa_menu VALUES ('10','�����칫','home.php?mid=10','0','0','4','1');
INSERT INTO toa_menu VALUES ('11','������Դ','home.php?mid=11','0','0','5','1');
INSERT INTO toa_menu VALUES ('17','����Ϣ','admin.php?ac=receive&fileurl=sms','3','2','4','0');
INSERT INTO toa_menu VALUES ('18','�ֻ�����','admin.php?ac=smsindex&fileurl=sms','3','2','3','0');
INSERT INTO toa_menu VALUES ('19','���߿���','admin.php?ac=registration&fileurl=workbench','3','2','1','0');
INSERT INTO toa_menu VALUES ('20','�ճ̰���','admin.php?ac=workdate&fileurl=workbench','3','2','5','0');
INSERT INTO toa_menu VALUES ('21','�����ռ�','admin.php?ac=blog&fileurl=workbench','3','2','6','0');
INSERT INTO toa_menu VALUES ('22','�����ƻ�','admin.php?ac=plan&fileurl=workbench','3','2','7','0');
INSERT INTO toa_menu VALUES ('23','ͨѸ¼','admin.php?ac=index&fileurl=communication&type=1','3','2','9','');
INSERT INTO toa_menu VALUES ('24','�����ļ���','admin.php?ac=document&fileurl=knowledge&type=1','3','2','8','0');
INSERT INTO toa_menu VALUES ('25','�������','admin.php?ac=conference&fileurl=administrative','3','2','10','0');
INSERT INTO toa_menu VALUES ('26','����','admin.php?ac=news&fileurl=workbench&type=1','3','2','14','0');
INSERT INTO toa_menu VALUES ('27','����','admin.php?ac=news&fileurl=workbench&type=3','3','2','11','0');
INSERT INTO toa_menu VALUES ('28','֪ͨ','admin.php?ac=news&fileurl=workbench&type=4','3','2','12','0');
INSERT INTO toa_menu VALUES ('29','���¼�','admin.php?ac=news&fileurl=workbench&type=5','3','2','13','0');
INSERT INTO toa_menu VALUES ('30','�����ڿ�','admin.php?ac=news&fileurl=workbench&type=6','3','2','15','0');
INSERT INTO toa_menu VALUES ('31','�������','admin.php?ac=duty&fileurl=duty','3','2','2','0');
INSERT INTO toa_menu VALUES ('56','���߽���','home.php?mid=56','0','0','10','0');
INSERT INTO toa_menu VALUES ('57','��������','admin.php?ac=user&fileurl=member','3','0','11','');
INSERT INTO toa_menu VALUES ('58','ϵͳ����','home.php?mid=58','0','0','12','');
INSERT INTO toa_menu VALUES ('64','֪ʶ����','admin.php?ac=know&fileurl=knowledge','9','2','1','');
INSERT INTO toa_menu VALUES ('65','���ع���','admin.php?ac=document&fileurl=knowledge&type=4','9','2','2','');
INSERT INTO toa_menu VALUES ('66','�����ƶ�','admin.php?ac=document&fileurl=knowledge&type=5','9','2','5','');
INSERT INTO toa_menu VALUES ('67','�����ڿ�','admin.php?ac=news&fileurl=administrative&type=6','9','2','6','');
INSERT INTO toa_menu VALUES ('68','���¼ǹ���','admin.php?ac=news&fileurl=administrative&type=5','10','2','8','');
INSERT INTO toa_menu VALUES ('69','���Ź���','admin.php?ac=news&fileurl=administrative&type=1','10','2','7','');
INSERT INTO toa_menu VALUES ('70','֪ͨ����','admin.php?ac=news&fileurl=administrative&type=4','10','2','6','');
INSERT INTO toa_menu VALUES ('71','�������','admin.php?ac=news&fileurl=administrative&type=3','10','2','5','');
INSERT INTO toa_menu VALUES ('75','�������뼰����','admin.php?ac=conference&fileurl=administrative','10','0','4','0');
INSERT INTO toa_menu VALUES ('80','���º�ͬ','admin.php?ac=humancontract&fileurl=human','11','2','2','0');
INSERT INTO toa_menu VALUES ('82','��ѵ����','admin.php?ac=training&fileurl=human','11','2','4','0');
INSERT INTO toa_menu VALUES ('83','���ͼ�¼','admin.php?ac=rewards&fileurl=human','11','2','5','0');
INSERT INTO toa_menu VALUES ('84','���ڹ���','admin.php?ac=registration&fileurl=human','11','2','0','');
INSERT INTO toa_menu VALUES ('86','������Ϣ','admin.php?ac=user&fileurl=member','57','2','1','');
INSERT INTO toa_menu VALUES ('87','�����޸�','admin.php?ac=password&fileurl=member','57','2','2','');
INSERT INTO toa_menu VALUES ('88','�����ղ�','admin.php?ac=eweb&fileurl=member','57','2','3','');
INSERT INTO toa_menu VALUES ('89','����ϵͳ��־','admin.php?ac=log&fileurl=member','57','2','4','');
INSERT INTO toa_menu VALUES ('90','ϵͳ����','admin.php?ac=config&fileurl=mana','58','2','1','');
INSERT INTO toa_menu VALUES ('91','Ȩ������','admin.php?ac=usergroup&fileurl=mana','58','2','2','');
INSERT INTO toa_menu VALUES ('92','�˻�����','admin.php?ac=user&fileurl=mana','58','2','5','');
INSERT INTO toa_menu VALUES ('93','ϵͳά��','admin.php?ac=log&fileurl=mana','58','2','8','');
INSERT INTO toa_menu VALUES ('94','���ݱ���','admin.php?ac=data&fileurl=mana','58','2','9','');
INSERT INTO toa_menu VALUES ('96','��̳','admin.php?ac=bbs&fileurl=knowledge','56','2','2','0');
INSERT INTO toa_menu VALUES ('97','ͶƱ','admin.php?ac=app&fileurl=knowledge','56','2','1','0');
INSERT INTO toa_menu VALUES ('107','�����ļ���','admin.php?ac=document&fileurl=knowledge&type=2','9','2','3','');
INSERT INTO toa_menu VALUES ('109','����Ӳ��','admin.php?ac=document&fileurl=knowledge&type=3','9','2','4','');
INSERT INTO toa_menu VALUES ('110','�������','admin.php?ac=document&fileurl=knowledge&type=6','9','2','7','');
INSERT INTO toa_menu VALUES ('111','�˵�����','admin.php?ac=menu&fileurl=mana','58','2','6','');
INSERT INTO toa_menu VALUES ('128','Ȩ�޹���','admin.php?ac=keytable&fileurl=mana','58','2','7','0');
INSERT INTO toa_menu VALUES ('133','�����������','admin.php?ac=type&fileurl=office&otype=9&muid=133&numberid=134','11','0','8','0');
INSERT INTO toa_menu VALUES ('232','��Ʒ��Ȩ','admin.php?ac=version&fileurl=mana','58','2','10','0');
INSERT INTO toa_menu VALUES ('139','���º�ͬ����','admin.php?ac=officeclass&fileurl=mana&do=bbsclass&otype=14','133','0','6','0');
INSERT INTO toa_menu VALUES ('140','���º�ͬ״̬','admin.php?ac=officeclass&fileurl=mana&do=bbsclass&otype=15','133','0','7','0');
INSERT INTO toa_menu VALUES ('145','��Ƹ����','admin.php?ac=officeclass&fileurl=mana&do=bbsclass&otype=16','133','0','8','0');
INSERT INTO toa_menu VALUES ('146','��ѵ����','admin.php?ac=officeclass&fileurl=mana&do=bbsclass&otype=17','133','0','9','0');
INSERT INTO toa_menu VALUES ('147','��ѵ��ʽ','admin.php?ac=officeclass&fileurl=mana&do=bbsclass&otype=18','133','0','10','0');
INSERT INTO toa_menu VALUES ('148','������Ŀ','admin.php?ac=officeclass&fileurl=mana&do=bbsclass&otype=19','133','0','11','0');
INSERT INTO toa_menu VALUES ('149','��̳�������','admin.php?ac=bbs&do=bbsclass&fileurl=knowledge','96','0','4','0');
INSERT INTO toa_menu VALUES ('150','�����б�','admin.php?ac=bbs&fileurl=knowledge','96','0','2','0');
INSERT INTO toa_menu VALUES ('151','��������','admin.php?ac=bbs&do=add&fileurl=knowledge','96','0','1','0');
INSERT INTO toa_menu VALUES ('152','��������','admin.php?ac=bbs&fileurl=knowledge&ischeck=2','96','0','3','0');
INSERT INTO toa_menu VALUES ('197','��������','admin.php?ac=department&fileurl=mana','58','2','3','0');
INSERT INTO toa_menu VALUES ('198','��λ����','admin.php?ac=position&fileurl=mana','58','2','4','0');
INSERT INTO toa_menu VALUES ('208','������Ϣ','admin.php?ac=document&fileurl=knowledge&do=add&type=5','66','0','1','0');
INSERT INTO toa_menu VALUES ('199','�ļ��й���','admin.php?ac=document&fileurl=knowledge&type=4&do=documenttype','65','0','3','0');
INSERT INTO toa_menu VALUES ('200','����������Ϣ','admin.php?ac=document&fileurl=knowledge&do=add&type=4','65','0','1','0');
INSERT INTO toa_menu VALUES ('201','������Ϣ�б�','admin.php?ac=document&fileurl=knowledge&type=4','65','0','2','0');
INSERT INTO toa_menu VALUES ('202','��Ϣ�б�','admin.php?ac=document&fileurl=knowledge&type=2','107','0','2','0');
INSERT INTO toa_menu VALUES ('203','������Ϣ','admin.php?ac=document&fileurl=knowledge&do=add&type=2','107','0','1','0');
INSERT INTO toa_menu VALUES ('204','�ļ��й���','admin.php?ac=document&fileurl=knowledge&type=2&do=documenttype','107','0','3','0');
INSERT INTO toa_menu VALUES ('205','������Ϣ','admin.php?ac=document&fileurl=knowledge&do=add&type=3','109','0','1','0');
INSERT INTO toa_menu VALUES ('206','��Ϣ�б�','admin.php?ac=document&fileurl=knowledge&type=3','109','0','2','0');
INSERT INTO toa_menu VALUES ('207','�ļ��й���','admin.php?ac=document&fileurl=knowledge&type=3&do=documenttype','109','0','3','0');
INSERT INTO toa_menu VALUES ('209','��Ϣ�б�','admin.php?ac=document&fileurl=knowledge&type=5','66','0','2','0');
INSERT INTO toa_menu VALUES ('210','�ļ��й���','admin.php?ac=document&fileurl=knowledge&type=5&do=documenttype','66','0','3','0');
INSERT INTO toa_menu VALUES ('211','��������','admin.php?ac=document&fileurl=knowledge&do=add&type=6','110','0','1','0');
INSERT INTO toa_menu VALUES ('212','��Ϣ�б�','admin.php?ac=document&fileurl=knowledge&type=6','110','0','2','0');
INSERT INTO toa_menu VALUES ('213','�ļ��й���','admin.php?ac=document&fileurl=knowledge&type=6&do=documenttype','110','0','3','0');
INSERT INTO toa_menu VALUES ('218','����������','admin.php?ac=officeclass&fileurl=mana&do=bbsclass&otype=1','75','2','3','0');
INSERT INTO toa_menu VALUES ('219','�����б�����','admin.php?ac=conference&fileurl=administrative','75','2','2','0');
INSERT INTO toa_menu VALUES ('220','��������','admin.php?ac=conference&fileurl=administrative&do=add','75','2','1','0');
INSERT INTO toa_menu VALUES ('221','�����������','admin.php?ac=officeclass&fileurl=mana&do=bbsclass&otype=2','75','2','4','0');
INSERT INTO toa_menu VALUES ('234','ѧ��','admin.php?ac=officeclass&fileurl=mana&do=bbsclass&otype=10','133','0','12','0');
INSERT INTO toa_menu VALUES ('235','ӡ������','admin.php?ac=seal&fileurl=member','57','2','5','0');
INSERT INTO toa_menu VALUES ('282','�������','admin.php?ac=plugin&fileurl=mana','58','0','11','0');
INSERT INTO toa_menu VALUES ('236','��ͷ�ļ�����','admin.php?ac=hongtou&fileurl=member','57','2','999','0');
INSERT INTO toa_menu VALUES ('284','�ֻ�����','admin.php?ac=mobile&fileurl=mana','58','0','12','0');

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

INSERT INTO toa_mobile_model VALUES ('10001','������','work/work.html?','999','10001.png','menu','1');
INSERT INTO toa_mobile_model VALUES ('10002','���ķ���','app/approval.html?','999','10002.png','menu','1');
INSERT INTO toa_mobile_model VALUES ('10003','��������','app/attachment.html?','999','10003.png','menu','1');
INSERT INTO toa_mobile_model VALUES ('10004','����鿴','administrative/conference.html?','999','10004.png','menu','1');
INSERT INTO toa_mobile_model VALUES ('10005','ͨѸ¼','communication.html?','999','10005.png','menu','1');
INSERT INTO toa_mobile_model VALUES ('10006','��Ŀ����','project/prolist.html?','999','10006.png','menu','1');
INSERT INTO toa_mobile_model VALUES ('10007','����','workbench/news.html?type=3','999','10007.png','menu','1');
INSERT INTO toa_mobile_model VALUES ('10008','֪ͨ','workbench/news.html?type=4','999','10008.png','menu','1');
INSERT INTO toa_mobile_model VALUES ('10009','���¼�','workbench/news.html?type=5','999','10009.png','menu','1');
INSERT INTO toa_mobile_model VALUES ('10010','����','workbench/news.html?type=1','999','10010.png','menu','1');
INSERT INTO toa_mobile_model VALUES ('10012','�ٶ�','http://www.baidu.com/','999','10012.png','model','1');
INSERT INTO toa_mobile_model VALUES ('10013','����','http://www.sina.com.cn','999','10013.png','model','1');

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

INSERT INTO toa_office_type VALUES ('54','�����ͬ','14','1');
INSERT INTO toa_office_type VALUES ('55','���ܺ�ͬ','14','1');
INSERT INTO toa_office_type VALUES ('56','����','14','1');
INSERT INTO toa_office_type VALUES ('57','������','15','1');
INSERT INTO toa_office_type VALUES ('58','��ת֤','15','1');
INSERT INTO toa_office_type VALUES ('59','�����','15','1');
INSERT INTO toa_office_type VALUES ('60','������Ƹ','16','1');
INSERT INTO toa_office_type VALUES ('61','��Ƹ��','16','1');
INSERT INTO toa_office_type VALUES ('62','ְ��','16','1');
INSERT INTO toa_office_type VALUES ('63','�ڲ���ѵ','17','1');
INSERT INTO toa_office_type VALUES ('64','�ⲿ��ѵ','17','1');
INSERT INTO toa_office_type VALUES ('65','����','18','1');
INSERT INTO toa_office_type VALUES ('66','����','18','1');
INSERT INTO toa_office_type VALUES ('67','����','18','1');
INSERT INTO toa_office_type VALUES ('68','�ٵ�','19','1');
INSERT INTO toa_office_type VALUES ('69','����','19','1');
INSERT INTO toa_office_type VALUES ('70','����ԭ��','19','1');
INSERT INTO toa_office_type VALUES ('71','���󴦷�','19','1');
INSERT INTO toa_office_type VALUES ('72','ҵ������','19','1');
INSERT INTO toa_office_type VALUES ('73','����','19','1');

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

INSERT INTO toa_phone_channel VALUES ('1','����������ֵ����ƽ̨','0.1','���ŷ��ͳɹ���98%�������ٶȼ�ʱ����!','0#515158#http://service.winic.org/webservice/public/remoney.asp?uid=#01&pwd=#01#515158#http://service.winic.org/sys_port/gateway/?id=#01&pwd=#01&to=#01&content=#01&encode=#01&time=#01#515158#http://service.winic.org/sys_port/Gateway/mo2.asp?id=#01&pwd=#01','0','3','1','1','','','','2011-06-30 15:16:58');

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

INSERT INTO toa_plugin VALUES ('10001','������','��������','v2.0','','','1','workclass');
INSERT INTO toa_plugin VALUES ('10002','CRMϵͳ','��������','v2.0','','','1','crm');
INSERT INTO toa_plugin VALUES ('10003','�칫��Ʒ','��������','v2.0','','','1','goods');
INSERT INTO toa_plugin VALUES ('10004','ͼ�����','��������','v2.0','','','1','book');
INSERT INTO toa_plugin VALUES ('10005','�̶��ʲ�','��������','v2.0','','','1','property');
INSERT INTO toa_plugin VALUES ('10006','��Ƹ����','��������','v2.0','','','1','jobs');
INSERT INTO toa_plugin VALUES ('10007','���¹���','��������','v2.0','','','1','human');
INSERT INTO toa_plugin VALUES ('10008','����ϵͳ','��������','v2.0','','','1','app');
INSERT INTO toa_plugin VALUES ('10009','����ϵͳ','��������','v2.0','','','1','file');
INSERT INTO toa_plugin VALUES ('10010','��Ŀ����','��������','v2.0','','','1','project');

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

INSERT INTO toa_registration VALUES ('1','����Ա','1','2016-08-27','2016','08','27');

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

INSERT INTO toa_user_view VALUES ('1','����Ա','1','','','','','','','','','','','','','template/default/bg/01/3.jpg','','','');

DROP TABLE IF EXISTS toa_usergroup;
CREATE TABLE `toa_usergroup` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `groupname` varchar(100) NOT NULL,
  `purview` text NOT NULL,
  `type` enum('system','user') NOT NULL DEFAULT 'user',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO toa_usergroup VALUES ('1','ϵͳ������','a:142:{s:11:\"department_\";s:1:\"1\";s:9:\"position_\";s:1:\"1\";s:10:\"config_inc\";s:1:\"1\";s:16:\"config_usergroup\";s:1:\"1\";s:25:\"config_usergroup_Increase\";s:1:\"1\";s:21:\"config_usergroup_edit\";s:1:\"1\";s:23:\"config_usergroup_delete\";s:1:\"1\";s:11:\"config_user\";s:1:\"1\";s:20:\"config_user_Increase\";s:1:\"1\";s:16:\"config_user_edit\";s:1:\"1\";s:18:\"config_user_delete\";s:1:\"1\";s:10:\"config_log\";s:1:\"1\";s:17:\"config_log_delete\";s:1:\"1\";s:9:\"config_db\";s:1:\"1\";s:13:\"config_db_old\";s:1:\"1\";s:11:\"config_menu\";s:1:\"1\";s:15:\"config_keytable\";s:1:\"1\";s:11:\"office_info\";s:1:\"1\";s:20:\"office_info_Increase\";s:1:\"1\";s:18:\"office_info_delete\";s:1:\"1\";s:10:\"office_sms\";s:1:\"1\";s:19:\"office_sms_Increase\";s:1:\"1\";s:15:\"office_sms_read\";s:1:\"1\";s:17:\"office_sms_delete\";s:1:\"1\";s:18:\"office_sms_channel\";s:1:\"1\";s:13:\"date_workdate\";s:1:\"1\";s:22:\"date_workdate_Increase\";s:1:\"1\";s:18:\"date_workdate_edit\";s:1:\"1\";s:20:\"date_workdate_delete\";s:1:\"1\";s:9:\"date_blog\";s:1:\"1\";s:18:\"date_blog_Increase\";s:1:\"1\";s:14:\"date_blog_edit\";s:1:\"1\";s:16:\"date_blog_delete\";s:1:\"1\";s:9:\"date_plan\";s:1:\"1\";s:18:\"date_plan_Increase\";s:1:\"1\";s:14:\"date_plan_edit\";s:1:\"1\";s:16:\"date_plan_delete\";s:1:\"1\";s:20:\"office_communication\";s:1:\"1\";s:29:\"office_communication_Increase\";s:1:\"1\";s:25:\"office_communication_edit\";s:1:\"1\";s:27:\"office_communication_delete\";s:1:\"1\";s:17:\"office_document_1\";s:1:\"1\";s:26:\"office_document_Increase_1\";s:1:\"1\";s:22:\"office_document_edit_1\";s:1:\"1\";s:24:\"office_document_delete_1\";s:1:\"1\";s:22:\"office_document_type_1\";s:1:\"1\";s:11:\"office_duty\";s:1:\"1\";s:15:\"office_duty_add\";s:1:\"1\";s:16:\"office_duty_reda\";s:1:\"1\";s:15:\"office_duty_sum\";s:1:\"1\";s:20:\"istration_conference\";s:1:\"1\";s:29:\"istration_conference_Increase\";s:1:\"1\";s:25:\"istration_conference_edit\";s:1:\"1\";s:27:\"istration_conference_delete\";s:1:\"1\";s:29:\"istration_conference_type_sce\";s:1:\"1\";s:30:\"istration_conference_type_type\";s:1:\"1\";s:14:\"news_chronicle\";s:1:\"1\";s:23:\"news_chronicle_Increase\";s:1:\"1\";s:19:\"news_chronicle_edit\";s:1:\"1\";s:21:\"news_chronicle_delete\";s:1:\"1\";s:19:\"news_chronicle_type\";s:1:\"1\";s:8:\"news_new\";s:1:\"1\";s:17:\"news_new_Increase\";s:1:\"1\";s:13:\"news_new_edit\";s:1:\"1\";s:15:\"news_new_delete\";s:1:\"1\";s:13:\"news_new_type\";s:1:\"1\";s:11:\"news_notice\";s:1:\"1\";s:20:\"news_notice_Increase\";s:1:\"1\";s:16:\"news_notice_edit\";s:1:\"1\";s:18:\"news_notice_delete\";s:1:\"1\";s:16:\"news_notice_type\";s:1:\"1\";s:11:\"news_cement\";s:1:\"1\";s:20:\"news_cement_Increase\";s:1:\"1\";s:16:\"news_cement_edit\";s:1:\"1\";s:18:\"news_cement_delete\";s:1:\"1\";s:16:\"news_cement_type\";s:1:\"1\";s:9:\"training_\";s:1:\"1\";s:15:\"training_record\";s:1:\"1\";s:8:\"rewards_\";s:1:\"1\";s:13:\"registration_\";s:1:\"1\";s:18:\"registration_excel\";s:1:\"1\";s:14:\"humancontract_\";s:1:\"1\";s:15:\"humancontract_i\";s:1:\"1\";s:15:\"humancontract_e\";s:1:\"1\";s:15:\"humancontract_d\";s:1:\"1\";s:13:\"office_type_r\";s:1:\"1\";s:18:\"knowledge_Increase\";s:1:\"1\";s:14:\"knowledge_read\";s:1:\"1\";s:16:\"knowledge_delete\";s:1:\"1\";s:17:\"office_document_4\";s:1:\"1\";s:26:\"office_document_Increase_4\";s:1:\"1\";s:22:\"office_document_edit_4\";s:1:\"1\";s:24:\"office_document_delete_4\";s:1:\"1\";s:22:\"office_document_type_4\";s:1:\"1\";s:17:\"office_document_5\";s:1:\"1\";s:26:\"office_document_Increase_5\";s:1:\"1\";s:22:\"office_document_edit_5\";s:1:\"1\";s:24:\"office_document_delete_5\";s:1:\"1\";s:22:\"office_document_type_5\";s:1:\"1\";s:15:\"news_periodical\";s:1:\"1\";s:24:\"news_periodical_Increase\";s:1:\"1\";s:20:\"news_periodical_edit\";s:1:\"1\";s:22:\"news_periodical_delete\";s:1:\"1\";s:20:\"news_periodical_type\";s:1:\"1\";s:17:\"office_document_2\";s:1:\"1\";s:26:\"office_document_Increase_2\";s:1:\"1\";s:22:\"office_document_edit_2\";s:1:\"1\";s:24:\"office_document_delete_2\";s:1:\"1\";s:22:\"office_document_type_2\";s:1:\"1\";s:17:\"office_document_3\";s:1:\"1\";s:26:\"office_document_Increase_3\";s:1:\"1\";s:22:\"office_document_edit_3\";s:1:\"1\";s:24:\"office_document_delete_3\";s:1:\"1\";s:22:\"office_document_type_3\";s:1:\"1\";s:17:\"office_document_6\";s:1:\"1\";s:26:\"office_document_Increase_6\";s:1:\"1\";s:22:\"office_document_edit_6\";s:1:\"1\";s:24:\"office_document_delete_6\";s:1:\"1\";s:22:\"office_document_type_6\";s:1:\"1\";s:7:\"bbs_add\";s:1:\"1\";s:8:\"bbs_edit\";s:1:\"1\";s:7:\"bbs_key\";s:1:\"1\";s:4:\"bbs_\";s:1:\"1\";s:9:\"bbsclass_\";s:1:\"1\";s:10:\"bbs_delete\";s:1:\"1\";s:4:\"app_\";s:1:\"1\";s:7:\"app_add\";s:1:\"1\";s:7:\"excel_1\";s:1:\"1\";s:7:\"excel_2\";s:1:\"1\";s:7:\"excel_3\";s:1:\"1\";s:7:\"excel_4\";s:1:\"1\";s:7:\"excel_5\";s:1:\"1\";s:7:\"excel_6\";s:1:\"1\";s:7:\"excel_7\";s:1:\"1\";s:7:\"excel_8\";s:1:\"1\";s:8:\"excel_41\";s:1:\"0\";s:8:\"excel_25\";s:1:\"1\";s:8:\"excel_30\";s:1:\"1\";s:8:\"excel_31\";s:1:\"1\";s:8:\"excel_32\";s:1:\"1\";s:8:\"excel_39\";s:1:\"1\";s:8:\"excel_40\";s:1:\"1\";}','system');
INSERT INTO toa_usergroup VALUES ('2','������','a:134:{s:11:\"department_\";s:1:\"0\";s:9:\"position_\";s:1:\"0\";s:10:\"config_inc\";s:1:\"0\";s:16:\"config_usergroup\";s:1:\"0\";s:11:\"config_user\";s:1:\"1\";s:20:\"config_user_Increase\";s:1:\"1\";s:16:\"config_user_edit\";s:1:\"1\";s:10:\"config_log\";s:1:\"0\";s:11:\"config_menu\";s:1:\"0\";s:15:\"config_keytable\";s:1:\"0\";s:11:\"office_info\";s:1:\"1\";s:20:\"office_info_Increase\";s:1:\"1\";s:18:\"office_info_delete\";s:1:\"1\";s:10:\"office_sms\";s:1:\"1\";s:19:\"office_sms_Increase\";s:1:\"1\";s:15:\"office_sms_read\";s:1:\"1\";s:17:\"office_sms_delete\";s:1:\"1\";s:13:\"date_workdate\";s:1:\"1\";s:22:\"date_workdate_Increase\";s:1:\"1\";s:18:\"date_workdate_edit\";s:1:\"1\";s:20:\"date_workdate_delete\";s:1:\"1\";s:9:\"date_blog\";s:1:\"1\";s:18:\"date_blog_Increase\";s:1:\"1\";s:14:\"date_blog_edit\";s:1:\"1\";s:16:\"date_blog_delete\";s:1:\"1\";s:9:\"date_plan\";s:1:\"1\";s:18:\"date_plan_Increase\";s:1:\"1\";s:14:\"date_plan_edit\";s:1:\"1\";s:16:\"date_plan_delete\";s:1:\"1\";s:20:\"office_communication\";s:1:\"1\";s:29:\"office_communication_Increase\";s:1:\"1\";s:25:\"office_communication_edit\";s:1:\"1\";s:27:\"office_communication_delete\";s:1:\"1\";s:17:\"office_document_1\";s:1:\"1\";s:26:\"office_document_Increase_1\";s:1:\"1\";s:22:\"office_document_edit_1\";s:1:\"1\";s:24:\"office_document_delete_1\";s:1:\"1\";s:22:\"office_document_type_1\";s:1:\"1\";s:11:\"office_duty\";s:1:\"1\";s:15:\"office_duty_add\";s:1:\"1\";s:16:\"office_duty_reda\";s:1:\"1\";s:15:\"office_duty_sum\";s:1:\"1\";s:20:\"istration_conference\";s:1:\"1\";s:29:\"istration_conference_Increase\";s:1:\"1\";s:25:\"istration_conference_edit\";s:1:\"1\";s:27:\"istration_conference_delete\";s:1:\"1\";s:29:\"istration_conference_type_sce\";s:1:\"1\";s:30:\"istration_conference_type_type\";s:1:\"1\";s:14:\"news_chronicle\";s:1:\"1\";s:23:\"news_chronicle_Increase\";s:1:\"1\";s:19:\"news_chronicle_edit\";s:1:\"1\";s:21:\"news_chronicle_delete\";s:1:\"1\";s:19:\"news_chronicle_type\";s:1:\"1\";s:8:\"news_new\";s:1:\"1\";s:17:\"news_new_Increase\";s:1:\"1\";s:13:\"news_new_edit\";s:1:\"1\";s:15:\"news_new_delete\";s:1:\"1\";s:13:\"news_new_type\";s:1:\"1\";s:11:\"news_notice\";s:1:\"1\";s:20:\"news_notice_Increase\";s:1:\"1\";s:16:\"news_notice_edit\";s:1:\"1\";s:18:\"news_notice_delete\";s:1:\"1\";s:16:\"news_notice_type\";s:1:\"1\";s:11:\"news_cement\";s:1:\"1\";s:20:\"news_cement_Increase\";s:1:\"1\";s:16:\"news_cement_edit\";s:1:\"1\";s:18:\"news_cement_delete\";s:1:\"1\";s:16:\"news_cement_type\";s:1:\"1\";s:9:\"training_\";s:1:\"1\";s:15:\"training_record\";s:1:\"1\";s:8:\"rewards_\";s:1:\"1\";s:13:\"registration_\";s:1:\"1\";s:18:\"registration_excel\";s:1:\"1\";s:14:\"humancontract_\";s:1:\"1\";s:15:\"humancontract_i\";s:1:\"1\";s:15:\"humancontract_e\";s:1:\"1\";s:15:\"humancontract_d\";s:1:\"1\";s:13:\"office_type_r\";s:1:\"1\";s:18:\"knowledge_Increase\";s:1:\"1\";s:14:\"knowledge_read\";s:1:\"1\";s:16:\"knowledge_delete\";s:1:\"1\";s:17:\"office_document_4\";s:1:\"1\";s:26:\"office_document_Increase_4\";s:1:\"1\";s:22:\"office_document_edit_4\";s:1:\"1\";s:24:\"office_document_delete_4\";s:1:\"1\";s:22:\"office_document_type_4\";s:1:\"1\";s:17:\"office_document_5\";s:1:\"1\";s:26:\"office_document_Increase_5\";s:1:\"1\";s:22:\"office_document_edit_5\";s:1:\"1\";s:24:\"office_document_delete_5\";s:1:\"1\";s:22:\"office_document_type_5\";s:1:\"1\";s:15:\"news_periodical\";s:1:\"1\";s:24:\"news_periodical_Increase\";s:1:\"1\";s:20:\"news_periodical_edit\";s:1:\"1\";s:22:\"news_periodical_delete\";s:1:\"1\";s:20:\"news_periodical_type\";s:1:\"1\";s:17:\"office_document_2\";s:1:\"1\";s:26:\"office_document_Increase_2\";s:1:\"1\";s:22:\"office_document_edit_2\";s:1:\"1\";s:24:\"office_document_delete_2\";s:1:\"1\";s:22:\"office_document_type_2\";s:1:\"1\";s:17:\"office_document_3\";s:1:\"1\";s:26:\"office_document_Increase_3\";s:1:\"1\";s:22:\"office_document_edit_3\";s:1:\"1\";s:24:\"office_document_delete_3\";s:1:\"1\";s:22:\"office_document_type_3\";s:1:\"1\";s:17:\"office_document_6\";s:1:\"1\";s:26:\"office_document_Increase_6\";s:1:\"1\";s:22:\"office_document_edit_6\";s:1:\"1\";s:24:\"office_document_delete_6\";s:1:\"1\";s:22:\"office_document_type_6\";s:1:\"1\";s:7:\"bbs_add\";s:1:\"1\";s:8:\"bbs_edit\";s:1:\"1\";s:7:\"bbs_key\";s:1:\"1\";s:4:\"bbs_\";s:1:\"1\";s:9:\"bbsclass_\";s:1:\"1\";s:10:\"bbs_delete\";s:1:\"1\";s:4:\"app_\";s:1:\"1\";s:7:\"app_add\";s:1:\"1\";s:7:\"excel_1\";s:1:\"1\";s:7:\"excel_2\";s:1:\"1\";s:7:\"excel_3\";s:1:\"1\";s:7:\"excel_4\";s:1:\"1\";s:7:\"excel_5\";s:1:\"1\";s:7:\"excel_6\";s:1:\"1\";s:7:\"excel_7\";s:1:\"1\";s:7:\"excel_8\";s:1:\"1\";s:8:\"excel_41\";s:1:\"0\";s:8:\"excel_25\";s:1:\"1\";s:8:\"excel_30\";s:1:\"1\";s:8:\"excel_31\";s:1:\"1\";s:8:\"excel_32\";s:1:\"1\";s:8:\"excel_39\";s:1:\"1\";s:8:\"excel_40\";s:1:\"1\";}','system');
INSERT INTO toa_usergroup VALUES ('3','�û���','a:82:{s:11:\"department_\";s:1:\"0\";s:9:\"position_\";s:1:\"0\";s:10:\"config_inc\";s:1:\"0\";s:16:\"config_usergroup\";s:1:\"0\";s:11:\"config_user\";s:1:\"0\";s:10:\"config_log\";s:1:\"0\";s:11:\"config_menu\";s:1:\"0\";s:15:\"config_keytable\";s:1:\"0\";s:11:\"office_info\";s:1:\"1\";s:20:\"office_info_Increase\";s:1:\"1\";s:10:\"office_sms\";s:1:\"1\";s:19:\"office_sms_Increase\";s:1:\"1\";s:15:\"office_sms_read\";s:1:\"1\";s:13:\"date_workdate\";s:1:\"1\";s:22:\"date_workdate_Increase\";s:1:\"1\";s:18:\"date_workdate_edit\";s:1:\"1\";s:9:\"date_blog\";s:1:\"1\";s:18:\"date_blog_Increase\";s:1:\"1\";s:14:\"date_blog_edit\";s:1:\"1\";s:9:\"date_plan\";s:1:\"1\";s:18:\"date_plan_Increase\";s:1:\"1\";s:14:\"date_plan_edit\";s:1:\"1\";s:20:\"office_communication\";s:1:\"1\";s:29:\"office_communication_Increase\";s:1:\"1\";s:25:\"office_communication_edit\";s:1:\"1\";s:17:\"office_document_1\";s:1:\"1\";s:26:\"office_document_Increase_1\";s:1:\"1\";s:22:\"office_document_edit_1\";s:1:\"1\";s:11:\"office_duty\";s:1:\"1\";s:15:\"office_duty_add\";s:1:\"1\";s:16:\"office_duty_reda\";s:1:\"1\";s:15:\"office_duty_sum\";s:1:\"1\";s:20:\"istration_conference\";s:1:\"1\";s:29:\"istration_conference_Increase\";s:1:\"1\";s:25:\"istration_conference_edit\";s:1:\"1\";s:14:\"news_chronicle\";s:1:\"1\";s:23:\"news_chronicle_Increase\";s:1:\"1\";s:19:\"news_chronicle_edit\";s:1:\"1\";s:8:\"news_new\";s:1:\"1\";s:17:\"news_new_Increase\";s:1:\"1\";s:13:\"news_new_edit\";s:1:\"1\";s:11:\"news_notice\";s:1:\"1\";s:20:\"news_notice_Increase\";s:1:\"1\";s:16:\"news_notice_edit\";s:1:\"1\";s:11:\"news_cement\";s:1:\"1\";s:20:\"news_cement_Increase\";s:1:\"1\";s:16:\"news_cement_edit\";s:1:\"1\";s:9:\"training_\";s:1:\"1\";s:15:\"training_record\";s:1:\"1\";s:8:\"rewards_\";s:1:\"1\";s:13:\"registration_\";s:1:\"0\";s:14:\"humancontract_\";s:1:\"1\";s:15:\"humancontract_i\";s:1:\"1\";s:15:\"humancontract_e\";s:1:\"1\";s:13:\"office_type_r\";s:1:\"0\";s:18:\"knowledge_Increase\";s:1:\"1\";s:14:\"knowledge_read\";s:1:\"1\";s:17:\"office_document_4\";s:1:\"1\";s:26:\"office_document_Increase_4\";s:1:\"1\";s:22:\"office_document_edit_4\";s:1:\"1\";s:17:\"office_document_5\";s:1:\"1\";s:26:\"office_document_Increase_5\";s:1:\"1\";s:22:\"office_document_edit_5\";s:1:\"1\";s:15:\"news_periodical\";s:1:\"1\";s:24:\"news_periodical_Increase\";s:1:\"1\";s:20:\"news_periodical_edit\";s:1:\"1\";s:17:\"office_document_2\";s:1:\"1\";s:26:\"office_document_Increase_2\";s:1:\"1\";s:22:\"office_document_edit_2\";s:1:\"1\";s:17:\"office_document_3\";s:1:\"1\";s:26:\"office_document_Increase_3\";s:1:\"1\";s:22:\"office_document_edit_3\";s:1:\"1\";s:17:\"office_document_6\";s:1:\"1\";s:26:\"office_document_Increase_6\";s:1:\"1\";s:22:\"office_document_edit_6\";s:1:\"1\";s:7:\"bbs_add\";s:1:\"1\";s:8:\"bbs_edit\";s:1:\"1\";s:7:\"bbs_key\";s:1:\"1\";s:4:\"bbs_\";s:1:\"1\";s:4:\"app_\";s:1:\"1\";s:7:\"app_add\";s:1:\"1\";s:8:\"excel_41\";s:1:\"0\";}','system');

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


