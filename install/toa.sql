DROP TABLE IF EXISTS toa_ads;
CREATE TABLE toa_ads (
  id int(10) NOT NULL AUTO_INCREMENT,
  title varchar(255) DEFAULT NULL,
  date datetime DEFAULT NULL,
  adsurl text,
  PRIMARY KEY (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS toa_app;
CREATE TABLE toa_app (
  id int(10) NOT NULL AUTO_INCREMENT,
  title varchar(255) DEFAULT NULL,
  content text,
  user text,
  number varchar(20) DEFAULT NULL,
  untildate datetime DEFAULT NULL,
  date datetime DEFAULT NULL,
  uid varchar(20) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS toa_app_log;
CREATE TABLE toa_app_log (
  id int(10) NOT NULL AUTO_INCREMENT,
  app_id varchar(20) DEFAULT NULL,
  app_option_id varchar(20) DEFAULT NULL,
  user varchar(20) DEFAULT NULL,
  date datetime DEFAULT NULL,
  content varchar(255) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS toa_app_option;
CREATE TABLE toa_app_option (
  id int(10) NOT NULL AUTO_INCREMENT,
  app_id varchar(20) DEFAULT NULL,
  title varchar(255) DEFAULT NULL,
  number varchar(20) DEFAULT NULL,
  type varchar(10) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS toa_bbs;
CREATE TABLE toa_bbs (
  id int(10) NOT NULL AUTO_INCREMENT,
  bbsclass varchar(255) DEFAULT NULL,
  title varchar(255) DEFAULT NULL,
  author varchar(60) DEFAULT NULL,
  origin varchar(255) DEFAULT NULL,
  content text,
  issuedate datetime DEFAULT NULL,
  readnum varchar(60) DEFAULT NULL,
  enddate datetime DEFAULT NULL,
  type varchar(10) DEFAULT NULL,
  uid varchar(20) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS toa_bbsclass;
CREATE TABLE toa_bbsclass (
  id int(10) NOT NULL AUTO_INCREMENT,
  name varchar(255) DEFAULT NULL,
  classadmin varchar(255) DEFAULT NULL,
  type varchar(20) DEFAULT NULL,
  uid varchar(10) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS toa_bbs_log;
CREATE TABLE toa_bbs_log (
  id int(10) NOT NULL AUTO_INCREMENT,
  bbsid varchar(20) DEFAULT NULL,
  title varchar(255) DEFAULT NULL,
  author varchar(60) DEFAULT NULL,
  content text,
  enddate datetime DEFAULT NULL,
  uid varchar(20) DEFAULT NULL,
  type varchar(2) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS toa_blog;
CREATE TABLE toa_blog (
  id int(10) NOT NULL AUTO_INCREMENT,
  title varchar(80) DEFAULT NULL,
  content text,
  number int(10) DEFAULT NULL,
  categoryid varchar(10) DEFAULT NULL,
  type varchar(10) DEFAULT NULL,
  date date DEFAULT NULL,
  uid varchar(10) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS toa_communication;
CREATE TABLE toa_communication (
  id int(8) NOT NULL AUTO_INCREMENT,
  person varchar(20) DEFAULT NULL,
  tel varchar(80) DEFAULT NULL,
  phone varchar(40) DEFAULT NULL,
  fax varchar(40) DEFAULT NULL,
  mail varchar(80) DEFAULT NULL,
  zipcode varchar(10) DEFAULT NULL,
  address varchar(40) DEFAULT NULL,
  position varchar(20) DEFAULT NULL,
  sex varchar(10) DEFAULT NULL,
  msn varchar(50) DEFAULT NULL,
  type varchar(10) DEFAULT NULL,
  date datetime DEFAULT NULL,
  uid varchar(10) DEFAULT NULL,
  company varchar(60) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS toa_conference;
CREATE TABLE toa_conference (
  id int(10) NOT NULL AUTO_INCREMENT,
  title varchar(80) DEFAULT NULL,
  subject varchar(100) DEFAULT NULL,
  content text,
  appperson varchar(10) DEFAULT NULL,
  date datetime DEFAULT NULL,
  attendance text,
  startdate datetime DEFAULT NULL,
  enddate datetime DEFAULT NULL,
  conferenceroom varchar(10) DEFAULT NULL,
  type varchar(2) DEFAULT NULL,
  uid varchar(10) DEFAULT NULL,
  otype varchar(10) DEFAULT NULL,
  staffid varchar(50) DEFAULT NULL,
  recorduser varchar(20) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS toa_conference_record;
CREATE TABLE toa_conference_record (
  rid int(10) NOT NULL AUTO_INCREMENT,
  conferenceid varchar(10) DEFAULT NULL,
  date datetime DEFAULT NULL,
  attendance text,
  conferenceroom varchar(10) DEFAULT NULL,
  recordperson varchar(10) DEFAULT NULL,
  appendix varchar(200) DEFAULT NULL,
  content text,
  PRIMARY KEY (rid)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS toa_config;
CREATE TABLE toa_config (
  id int(10) NOT NULL AUTO_INCREMENT,
  value text,
  name varchar(50) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS toa_department;
CREATE TABLE toa_department (
  id int(11) NOT NULL AUTO_INCREMENT,
  persno varchar(40) DEFAULT NULL,
  name varchar(40) DEFAULT NULL,
  date datetime DEFAULT NULL,
  father varchar(10) DEFAULT NULL,
  uid varchar(10) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS toa_document;
CREATE TABLE toa_document (
 id int(10) NOT NULL AUTO_INCREMENT,
  title varchar(255) DEFAULT NULL,
  content text,
  documentid varchar(50) DEFAULT NULL,
  annex varchar(255) DEFAULT NULL,
  `key` varchar(16) DEFAULT NULL,
  type varchar(10) DEFAULT NULL,
  uid varchar(16) DEFAULT NULL,
  date datetime DEFAULT NULL,
  readuser text,
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS toa_document_type;
CREATE TABLE toa_document_type (
  id int(10) NOT NULL AUTO_INCREMENT,
  father varchar(10) DEFAULT NULL,
  title varchar(255) DEFAULT NULL,
  date datetime DEFAULT NULL,
  uid varchar(10) DEFAULT NULL,
  type varchar(10) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS toa_fileoffice;
CREATE TABLE toa_fileoffice (
  id int(8) NOT NULL AUTO_INCREMENT,
  number varchar(32) DEFAULT NULL,
  fileid varchar(64) DEFAULT NULL,
  filetype varchar(2) DEFAULT NULL,
  officetype varchar(2) DEFAULT NULL,
  officeid varchar(64) DEFAULT NULL,
  filename varchar(255) DEFAULT NULL,
  fileaddr varchar(255) DEFAULT NULL,
  uid varchar(32) DEFAULT NULL,
  date datetime DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS toa_humancontract;
CREATE TABLE toa_humancontract (
  id int(10) NOT NULL AUTO_INCREMENT,
  userid varchar(20) DEFAULT NULL,
  number varchar(60) DEFAULT NULL,
  type varchar(10) DEFAULT NULL,
  ckey varchar(10) DEFAULT NULL,
  signdate varchar(60) DEFAULT NULL,
  testdate varchar(60) DEFAULT NULL,
  testday varchar(30) DEFAULT NULL,
  testenddate varchar(60) DEFAULT NULL,
  signnum varchar(30) DEFAULT NULL,
  appendix varchar(255) DEFAULT NULL,
  content text,
  uid varchar(20) DEFAULT NULL,
  date datetime DEFAULT NULL,
  signenddate varchar(60) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS toa_keytable;
CREATE TABLE toa_keytable (
  id int(10) NOT NULL AUTO_INCREMENT,
  name varchar(255) DEFAULT NULL,
  inputname varchar(255) DEFAULT NULL,
  inputvalue varchar(255) DEFAULT NULL,
  inputchecked varchar(5) DEFAULT NULL,
  type varchar(5) DEFAULT NULL,
  number int(10) DEFAULT NULL,
  fatherid varchar(10) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS toa_knowledge;
CREATE TABLE toa_knowledge (
  id int(10) NOT NULL AUTO_INCREMENT,
  title varchar(80) DEFAULT NULL,
  content text,
  number int(10) DEFAULT NULL,
  categoryid varchar(10) DEFAULT NULL,
  type varchar(10) DEFAULT NULL,
  date datetime DEFAULT NULL,
  uid varchar(10) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS toa_loginlog;
CREATE TABLE toa_loginlog (
  id int(10) NOT NULL AUTO_INCREMENT,
  uid int(10) DEFAULT NULL,
  name varchar(20) DEFAULT NULL,
  ip varchar(50) DEFAULT NULL,
  logindate datetime DEFAULT NULL,
  enddate datetime DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS toa_menu;
CREATE TABLE toa_menu (
  menuid int(10) NOT NULL AUTO_INCREMENT,
  menuname varchar(255) DEFAULT NULL,
  menuurl varchar(255) DEFAULT NULL,
  fatherid varchar(10) DEFAULT NULL,
  menutype varchar(10) DEFAULT NULL,
  menunum int(25) DEFAULT '9999',
  menukey varchar(10) DEFAULT NULL,
  PRIMARY KEY (menuid)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS toa_news;
CREATE TABLE toa_news (
  id int(10) NOT NULL AUTO_INCREMENT,
  category varchar(10) DEFAULT NULL,
  receive text,
  phonereceive varchar(200) DEFAULT NULL,
  subject varchar(120) DEFAULT NULL,
  content text,
  appendix varchar(120) DEFAULT NULL,
  type varchar(10) DEFAULT NULL,
  date datetime DEFAULT NULL,
  uid varchar(10) DEFAULT NULL,
  pic varchar(120) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS toa_news_read;
CREATE TABLE toa_news_read (
  rid int(10) NOT NULL AUTO_INCREMENT,
  uid varchar(30) DEFAULT NULL,
  disdate datetime DEFAULT NULL,
  viewdate datetime DEFAULT NULL,
  evaluation varchar(200) DEFAULT NULL,
  dkey varchar(10) DEFAULT NULL,
  newsid varchar(10) DEFAULT NULL,
  PRIMARY KEY (rid)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS toa_news_type;
CREATE TABLE toa_news_type (
  nid int(10) NOT NULL AUTO_INCREMENT,
  ntitle varchar(60) DEFAULT NULL,
  uid varchar(10) DEFAULT NULL,
  ntype varchar(10) DEFAULT NULL,
  ndate datetime DEFAULT NULL,
  PRIMARY KEY (nid)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS toa_ntkohtmlfile;
CREATE TABLE toa_ntkohtmlfile (
  id mediumint(10) NOT NULL AUTO_INCREMENT,
  filename varchar(256) DEFAULT NULL,
  filepath varchar(256) DEFAULT NULL,
  filesize varchar(10) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS toa_ntkoofficefile;
CREATE TABLE toa_ntkoofficefile (
  id mediumint(10) NOT NULL AUTO_INCREMENT,
  filename varchar(256) DEFAULT NULL,
  filesize mediumint(10) DEFAULT NULL,
  otherdata varchar(128) DEFAULT NULL,
  filetype varchar(64) DEFAULT NULL,
  filenamedisk varchar(256) DEFAULT NULL,
  attachfilenamedisk varchar(256) DEFAULT NULL,
  attachfiledescribe varchar(256) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS toa_ntkopdffile;
CREATE TABLE toa_ntkopdffile (
  id mediumint(10) NOT NULL AUTO_INCREMENT,
  pdffilename varchar(256) DEFAULT NULL,
  pdffilepath varchar(256) DEFAULT NULL,
  filesize varchar(256) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS toa_oalog;
CREATE TABLE toa_oalog (
  id int(10) NOT NULL AUTO_INCREMENT,
  uid varchar(20) DEFAULT NULL,
  content text,
  title varchar(255) DEFAULT NULL,
  startdate datetime DEFAULT NULL,
  contentid varchar(20) DEFAULT NULL,
  type varchar(5) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS toa_office_type;
CREATE TABLE toa_office_type (
  oid int(10) NOT NULL AUTO_INCREMENT,
  oname varchar(255) DEFAULT NULL,
  otype varchar(10) DEFAULT NULL,
  uid varchar(10) DEFAULT NULL,
  PRIMARY KEY (oid)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS toa_online;
CREATE TABLE toa_online (
  id int(10) NOT NULL AUTO_INCREMENT,
  startdate datetime DEFAULT NULL,
  uid varchar(20) DEFAULT NULL,
  enddate datetime DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS toa_phone_channel;
CREATE TABLE toa_phone_channel (
  id int(10) NOT NULL AUTO_INCREMENT,
  company varchar(255) DEFAULT NULL,
  price varchar(255) DEFAULT NULL,
  content varchar(255) DEFAULT NULL,
  connection text,
  remainsum varchar(30) DEFAULT NULL,
  type varchar(5) DEFAULT NULL,
  connectionid varchar(255) DEFAULT NULL,
  pkey varchar(5) DEFAULT NULL,
  username varchar(255) DEFAULT NULL,
  password varchar(255) DEFAULT NULL,
  toaid varchar(255) DEFAULT NULL,
  date datetime DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS toa_phone_receive;
CREATE TABLE toa_phone_receive (
  id int(8) NOT NULL AUTO_INCREMENT,
  content varchar(500) DEFAULT NULL,
  sendphone varchar(30) DEFAULT NULL,
  date varchar(30) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS toa_phone_send;
CREATE TABLE toa_phone_send (
  id int(10) NOT NULL AUTO_INCREMENT,
  content varchar(500) DEFAULT NULL,
  receivephone varchar(30) DEFAULT NULL,
  sendperson varchar(10) DEFAULT NULL,
  receiveperson varchar(30) DEFAULT NULL,
  date datetime DEFAULT NULL,
  type varchar(5) DEFAULT NULL,
  channelid varchar(10) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS toa_plan;
CREATE TABLE toa_plan (
  id int(10) NOT NULL AUTO_INCREMENT,
  title varchar(80) DEFAULT NULL,
  content text,
  startdate datetime DEFAULT NULL,
  enddate datetime DEFAULT NULL,
  otype varchar(10) DEFAULT NULL,
  department varchar(255) DEFAULT NULL,
  participation varchar(255) DEFAULT NULL,
  person varchar(255) DEFAULT NULL,
  note varchar(500) DEFAULT NULL,
  type varchar(10) DEFAULT NULL,
  date datetime DEFAULT NULL,
  uid varchar(10) DEFAULT NULL,
  completiondate datetime DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS toa_position;
CREATE TABLE toa_position (
  id int(10) NOT NULL AUTO_INCREMENT,
  name varchar(255) DEFAULT NULL,
  content text,
  father varchar(20) DEFAULT NULL,
  date datetime DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS toa_project_duty;
CREATE TABLE toa_project_duty (
  id int(8) NOT NULL AUTO_INCREMENT,
  number varchar(255) DEFAULT NULL,
  title varchar(255) DEFAULT NULL,
  user varchar(255) DEFAULT NULL,
  startdate varchar(30) DEFAULT NULL,
  enddate varchar(30) DEFAULT NULL,
  content text,
  appendix varchar(255) DEFAULT NULL,
  note varchar(255) DEFAULT NULL,
  dkey varchar(5) DEFAULT NULL,
  type varchar(5) DEFAULT NULL,
  date datetime DEFAULT NULL,
  uid varchar(10) DEFAULT NULL,
  project varchar(20) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS toa_project_duty_log;
CREATE TABLE toa_project_duty_log (
  id int(8) NOT NULL AUTO_INCREMENT,
  dutyid varchar(255) DEFAULT NULL,
  content text,
  progress varchar(30) DEFAULT NULL,
  appendix varchar(255) DEFAULT NULL,
  note varchar(255) DEFAULT NULL,
  date datetime DEFAULT NULL,
  uid varchar(20) DEFAULT NULL,
  project varchar(20) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS toa_registration;
CREATE TABLE toa_registration (
  id int(10) NOT NULL AUTO_INCREMENT,
  name varchar(20) DEFAULT NULL,
  uid varchar(10) DEFAULT NULL,
  date date DEFAULT NULL,
  year varchar(8) NOT NULL,
  month varchar(8) NOT NULL,
  day varchar(8) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS toa_registration_log;
CREATE TABLE toa_registration_log (
  lid int(11) NOT NULL AUTO_INCREMENT,
  rid varchar(16) DEFAULT NULL,
  hour varchar(16) DEFAULT NULL,
  note varchar(255) DEFAULT NULL,
  number varchar(16) DEFAULT NULL,
  type varchar(2) DEFAULT NULL,
  PRIMARY KEY (lid)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS toa_rewards;
CREATE TABLE toa_rewards (
  id int(10) NOT NULL AUTO_INCREMENT,
  user varchar(255) DEFAULT NULL,
  project varchar(10) DEFAULT NULL,
  rewardsdate varchar(30) DEFAULT NULL,
  wagesmonth varchar(30) DEFAULT NULL,
  rewardskey varchar(10) DEFAULT NULL,
  price varchar(30) DEFAULT NULL,
  content varchar(255) DEFAULT NULL,
  uid varchar(10) DEFAULT NULL,
  date datetime DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS toa_seal;
CREATE TABLE toa_seal (
  id int(10) NOT NULL AUTO_INCREMENT,
  sealurl varchar(255) DEFAULT NULL,
  sealtitle varchar(255) DEFAULT NULL,
  uid varchar(16) DEFAULT NULL,
  date datetime DEFAULT NULL,
  unionid varchar(16) NOT NULL,
  sealtype varchar(2) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS toa_session;
CREATE TABLE toa_session (
  uid mediumint(8) unsigned NOT NULL DEFAULT '0',
  username varchar(20) NOT NULL,
  password varchar(32) NOT NULL DEFAULT '',
  groupid smallint(5) unsigned NOT NULL DEFAULT '3',
  ip int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (uid)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS toa_sms_receive;
CREATE TABLE toa_sms_receive (
  id int(10) NOT NULL AUTO_INCREMENT,
  sendperson varchar(20) DEFAULT NULL,
  date datetime DEFAULT NULL,
  content text,
  receiveperson varchar(10) DEFAULT NULL,
  type varchar(10) DEFAULT NULL,
  smskey varchar(10) DEFAULT NULL,
  readdate datetime DEFAULT NULL,
  sendid varchar(10) DEFAULT NULL,
  online varchar(5) DEFAULT '0',
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS toa_sms_send;
CREATE TABLE toa_sms_send (
  id int(10) NOT NULL AUTO_INCREMENT,
  receiveperson text,
  content text,
  uid varchar(20) DEFAULT NULL,
  date datetime DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS toa_training;
CREATE TABLE toa_training (
  id int(10) NOT NULL AUTO_INCREMENT,
  number varchar(255) DEFAULT NULL,
  name varchar(255) DEFAULT NULL,
  channel varchar(10) DEFAULT NULL,
  trform varchar(10) DEFAULT NULL,
  sponsor varchar(255) DEFAULT NULL,
  responsible varchar(255) DEFAULT NULL,
  participation varchar(50) DEFAULT NULL,
  address varchar(255) DEFAULT NULL,
  organization varchar(255) DEFAULT NULL,
  orgperson varchar(255) DEFAULT NULL,
  curriculum varchar(255) DEFAULT NULL,
  classhour varchar(30) DEFAULT NULL,
  startdate varchar(30) DEFAULT NULL,
  enddate varchar(30) DEFAULT NULL,
  price varchar(50) DEFAULT NULL,
  examination varchar(255) DEFAULT NULL,
  examinationdate datetime DEFAULT NULL,
  department text,
  user text,
  organizationinfo text,
  contactperson text,
  request text,
  appendix varchar(255) DEFAULT NULL,
  content text,
  type varchar(10) DEFAULT NULL,
  uid varchar(10) DEFAULT NULL,
  date datetime DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS toa_training_record;
CREATE TABLE toa_training_record (
  id int(11) NOT NULL AUTO_INCREMENT,
  user text,
  trainingid varchar(20) DEFAULT NULL,
  price varchar(60) DEFAULT NULL,
  organization varchar(255) DEFAULT NULL,
  training varchar(30) DEFAULT NULL,
  date datetime DEFAULT NULL,
  uid varchar(10) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS toa_upload;
CREATE TABLE toa_upload (
  id int(10) unsigned NOT NULL AUTO_INCREMENT,
  aid int(10) unsigned NOT NULL DEFAULT '0',
  uid mediumint(8) unsigned NOT NULL DEFAULT '0',
  username varchar(20) NOT NULL DEFAULT '',
  originalname varchar(100) NOT NULL DEFAULT '',
  filepath varchar(255) NOT NULL DEFAULT '',
  thumb varchar(255) NOT NULL DEFAULT '',
  filesize int(10) unsigned NOT NULL DEFAULT '0',
  filetype varchar(50) NOT NULL DEFAULT '',
  fileext char(10) NOT NULL DEFAULT '',
  dateline int(10) unsigned NOT NULL DEFAULT '0',
  downloads mediumint(8) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (id),
  KEY aid (aid)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS toa_user;
CREATE TABLE toa_user (
  id int(11) NOT NULL AUTO_INCREMENT,
  username varchar(40) DEFAULT NULL,
  password varchar(40) DEFAULT NULL,
  departmentid varchar(10) DEFAULT NULL,
  flag varchar(2) DEFAULT NULL,
  date datetime DEFAULT NULL,
  ischeck varchar(2) DEFAULT NULL,
  userkey varchar(20) DEFAULT NULL,
  groupid varchar(2) DEFAULT NULL,
  positionid varchar(20) DEFAULT NULL,
  loginip text,
  online varchar(2) DEFAULT '0',
  keytype varchar(2) DEFAULT NULL,
  keytypeuser text,
  numbers int(11) DEFAULT '999',
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS toa_usergroup;
CREATE TABLE toa_usergroup (
  id smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  groupname varchar(100) NOT NULL,
  purview text NOT NULL,
  type enum('system','user') NOT NULL DEFAULT 'user',
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS toa_user_view;
CREATE TABLE toa_user_view (
  vid int(10) NOT NULL AUTO_INCREMENT,
  name varchar(255) DEFAULT NULL,
  uid varchar(10) DEFAULT NULL,
  number varchar(60) DEFAULT NULL,
  sex varchar(20) DEFAULT NULL,
  birthdate date DEFAULT NULL,
  participationwork varchar(60) DEFAULT NULL,
  tel varchar(60) DEFAULT NULL,
  phone varchar(60) DEFAULT NULL,
  fax varchar(60) DEFAULT NULL,
  email varchar(255) DEFAULT NULL,
  address varchar(255) DEFAULT NULL,
  qq varchar(255) DEFAULT NULL,
  contact varchar(255) DEFAULT NULL,
  homemana text DEFAULT NULL,
  homebg varchar(64) DEFAULT NULL,
  pic varchar(255) DEFAULT NULL,
  home_txt text DEFAULT NULL,
  hometype varchar(2) DEFAULT NULL,
  PRIMARY KEY (vid)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS toa_web;
CREATE TABLE toa_web (
  id int(10) NOT NULL AUTO_INCREMENT,
  title varchar(60) DEFAULT NULL,
  weburl varchar(120) DEFAULT NULL,
  content varchar(120) DEFAULT NULL,
  date datetime DEFAULT NULL,
  uid varchar(10) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS toa_workdate;
CREATE TABLE toa_workdate (
  id int(11) NOT NULL AUTO_INCREMENT,
  title varchar(50) DEFAULT NULL,
  otype varchar(10) DEFAULT NULL,
  startdate datetime DEFAULT NULL,
  enddate datetime DEFAULT NULL,
  content varchar(1000) DEFAULT NULL,
  date datetime DEFAULT NULL,
  type varchar(10) DEFAULT NULL,
  uid varchar(10) DEFAULT NULL,
  completiondate datetime DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS toa_plugin;
CREATE TABLE toa_plugin (
  id int(8) NOT NULL AUTO_INCREMENT,
  title varchar(64) DEFAULT NULL,
  company varchar(32) DEFAULT NULL,
  version varchar(16) DEFAULT NULL,
  date datetime DEFAULT NULL,
  `update` datetime DEFAULT NULL,
  type varchar(2) DEFAULT NULL,
  filename varchar(16) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10000 ;
DROP TABLE IF EXISTS toa_mobile_model;
CREATE TABLE toa_mobile_model (
  mid int(11) NOT NULL AUTO_INCREMENT,
  title varchar(32) DEFAULT NULL,
  linkurl varchar(255) DEFAULT NULL,
  number int(11) DEFAULT NULL,
  ico varchar(64) DEFAULT NULL,
  type varchar(16) NOT NULL,
  type1 varchar(16) NOT NULL,
  PRIMARY KEY (mid)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10000 ;