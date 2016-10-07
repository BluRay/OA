-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-10-07 02:13:45
-- 服务器版本： 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `doa`
--

-- --------------------------------------------------------

--
-- 表的结构 `toa_ads`
--

CREATE TABLE IF NOT EXISTS `toa_ads` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `adsurl` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `toa_app`
--

CREATE TABLE IF NOT EXISTS `toa_app` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `user` text,
  `number` varchar(20) DEFAULT NULL,
  `untildate` datetime DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `uid` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `toa_app_log`
--

CREATE TABLE IF NOT EXISTS `toa_app_log` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `app_id` varchar(20) DEFAULT NULL,
  `app_option_id` varchar(20) DEFAULT NULL,
  `user` varchar(20) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `toa_app_option`
--

CREATE TABLE IF NOT EXISTS `toa_app_option` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `app_id` varchar(20) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `number` varchar(20) DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `toa_bbs`
--

CREATE TABLE IF NOT EXISTS `toa_bbs` (
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `toa_bbsclass`
--

CREATE TABLE IF NOT EXISTS `toa_bbsclass` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `classadmin` varchar(255) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `uid` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `toa_bbs_log`
--

CREATE TABLE IF NOT EXISTS `toa_bbs_log` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `bbsid` varchar(20) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `author` varchar(60) DEFAULT NULL,
  `content` text,
  `enddate` datetime DEFAULT NULL,
  `uid` varchar(20) DEFAULT NULL,
  `type` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `toa_blog`
--

CREATE TABLE IF NOT EXISTS `toa_blog` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(80) DEFAULT NULL,
  `content` text,
  `number` int(10) DEFAULT NULL,
  `categoryid` varchar(10) DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `uid` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `toa_communication`
--

CREATE TABLE IF NOT EXISTS `toa_communication` (
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `toa_conference`
--

CREATE TABLE IF NOT EXISTS `toa_conference` (
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `toa_conference_record`
--

CREATE TABLE IF NOT EXISTS `toa_conference_record` (
  `rid` int(10) NOT NULL AUTO_INCREMENT,
  `conferenceid` varchar(10) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `attendance` text,
  `conferenceroom` varchar(10) DEFAULT NULL,
  `recordperson` varchar(10) DEFAULT NULL,
  `appendix` varchar(200) DEFAULT NULL,
  `content` text,
  PRIMARY KEY (`rid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `toa_config`
--

CREATE TABLE IF NOT EXISTS `toa_config` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `value` text,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- 转存表中的数据 `toa_config`
--

INSERT INTO `toa_config` (`id`, `value`, `name`) VALUES
(1, 'OA', 'name'),
(2, 'http://127.0.0.1/OA', 'web'),
(3, '20', 'pagenum'),
(4, '0', 'opendate'),
(5, '24', 'enddate'),
(6, '1', 'sworknum'),
(7, '9:00', 'swork'),
(8, '17:30', 'ework'),
(9, '14:30', 'swork1'),
(10, '18:30', 'ework1'),
(11, '1', 'configwork'),
(12, '0', 'configoffice'),
(13, '1', 'configinfo'),
(14, '0', 'configsms'),
(15, '1', 'configflag'),
(16, '1', 'mobile1'),
(19, 'www.831209.com|www.515158.com|m.515158.com', 'oaurl'),
(20, '0', 'usernum'),
(21, 'V2.0.20131008', 'com_editionnum'),
(22, '2016-09-20 09:48:47', 'crmdate'),
(18, '0', 'configinfoview'),
(23, '', 'closereason');

-- --------------------------------------------------------

--
-- 表的结构 `toa_department`
--

CREATE TABLE IF NOT EXISTS `toa_department` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `persno` varchar(40) DEFAULT NULL,
  `name` varchar(40) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `father` varchar(10) DEFAULT NULL,
  `uid` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `toa_department`
--

INSERT INTO `toa_department` (`id`, `persno`, `name`, `date`, `father`, `uid`) VALUES
(1, '', '行政部', '2016-08-30 14:31:54', '0', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `toa_document`
--

CREATE TABLE IF NOT EXISTS `toa_document` (
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `toa_document_type`
--

CREATE TABLE IF NOT EXISTS `toa_document_type` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `father` varchar(10) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `uid` varchar(10) DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `toa_fileoffice`
--

CREATE TABLE IF NOT EXISTS `toa_fileoffice` (
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `toa_humancontract`
--

CREATE TABLE IF NOT EXISTS `toa_humancontract` (
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `toa_keytable`
--

CREATE TABLE IF NOT EXISTS `toa_keytable` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `inputname` varchar(255) DEFAULT NULL,
  `inputvalue` varchar(255) DEFAULT NULL,
  `inputchecked` varchar(5) DEFAULT NULL,
  `type` varchar(5) DEFAULT NULL,
  `number` int(10) DEFAULT NULL,
  `fatherid` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=410 ;

--
-- 转存表中的数据 `toa_keytable`
--

INSERT INTO `toa_keytable` (`id`, `name`, `inputname`, `inputvalue`, `inputchecked`, `type`, `number`, `fatherid`) VALUES
(1, '系统管理权限设置', 'config_inc', '1', '1', '1', 1, '0'),
(2, '系统设置', 'config_inc', '1', '1', '1', 999, '1'),
(3, '允许', 'config_inc', '1', '1', '1', 1, '2'),
(4, '禁止', 'config_inc', '0', '2', '1', 2, '2'),
(5, '权限组设置', 'input_name', '0', '1', '1', 999, '1'),
(6, '允许', 'config_usergroup', '1', '1', '1', 1, '5'),
(7, '禁止', 'config_usergroup', '0', '2', '1', 2, '5'),
(8, '添加', 'config_usergroup_Increase', '1', '1', '2', 3, '5'),
(9, '编辑', 'config_usergroup_edit', '1', '1', '2', 4, '5'),
(10, '删除', 'config_usergroup_delete', '1', '1', '2', 5, '5'),
(11, '账号设置', 'input_name', '0', '1', '1', 999, '1'),
(12, '允许', 'config_user', '1', '1', '1', 1, '11'),
(13, '禁止', 'config_user', '0', '2', '1', 2, '11'),
(14, '添加', 'config_user_Increase', '1', '1', '2', 3, '11'),
(15, '编辑', 'config_user_edit', '1', '1', '2', 4, '11'),
(16, '删除', 'config_user_delete', '1', '1', '2', 5, '11'),
(17, '系统维护', 'input_name', '0', '1', '1', 999, '1'),
(18, '允许', 'config_log', '1', '1', '1', 1, '17'),
(19, '禁止', 'config_log', '0', '2', '1', 2, '17'),
(20, '清理', 'config_log_delete', '1', '1', '2', 3, '17'),
(21, '数据备份', 'config_db', '0', '1', '1', 999, '1'),
(22, '允许备份', 'config_db', '1', '1', '2', 1, '21'),
(23, '允许还原', 'config_db_old', '1', '1', '2', 2, '21'),
(24, '工作台', 'input_name', '0', '1', '1', 2, '0'),
(361, '行政办公', 'input_name', '0', '1', '1', 4, '357'),
(362, '人力资源', 'input_name', '0', '1', '1', 5, '357'),
(30, '短消息', 'input_name', '0', '1', '1', 1, '24'),
(31, '允许', 'office_info', '1', '1', '1', 1, '30'),
(32, '禁止', 'office_info', '0', '2', '1', 2, '30'),
(33, '发送', 'office_info_Increase', '1', '1', '2', 3, '30'),
(34, '删除', 'office_info_delete', '1', '1', '2', 4, '30'),
(35, '手机短信', 'input_name', '0', '1', '1', 2, '24'),
(36, '允许', 'office_sms', '1', '1', '1', 1, '35'),
(37, '禁止', 'office_sms', '0', '2', '1', 2, '35'),
(38, '发短信', 'office_sms_Increase', '1', '1', '2', 3, '35'),
(39, '收短信', 'office_sms_read', '1', '1', '2', 4, '35'),
(40, '删除', 'office_sms_delete', '1', '1', '2', 5, '35'),
(41, '日程安排', 'input_name', '0', '1', '1', 3, '24'),
(42, '允许', 'date_workdate', '1', '1', '1', 1, '41'),
(43, '禁止', 'date_workdate', '0', '2', '1', 2, '41'),
(44, '添加', 'date_workdate_Increase', '1', '1', '2', 3, '41'),
(45, '编辑', 'date_workdate_edit', '1', '1', '2', 4, '41'),
(46, '删除', 'date_workdate_delete', '1', '1', '2', 5, '41'),
(47, '工作日记', 'input_name', '0', '1', '1', 4, '24'),
(48, '允许', 'date_blog', '1', '1', '1', 1, '47'),
(49, '禁止', 'date_blog', '0', '2', '1', 2, '47'),
(50, '添加', 'date_blog_Increase', '1', '1', '2', 3, '47'),
(51, '编辑', 'date_blog_edit', '1', '1', '2', 4, '47'),
(52, '删除', 'date_blog_delete', '1', '1', '2', 5, '47'),
(53, '工作计划', 'input_name', '0', '1', '1', 5, '24'),
(54, '允许', 'date_plan', '1', '1', '1', 1, '53'),
(55, '禁止', 'date_plan', '0', '2', '1', 2, '53'),
(56, '添加', 'date_plan_Increase', '1', '1', '2', 3, '53'),
(57, '编辑', 'date_plan_edit', '1', '1', '2', 4, '53'),
(58, '删除', 'date_plan_delete', '1', '1', '2', 5, '53'),
(59, '通讯录', 'input_name', '0', '1', '1', 6, '24'),
(60, '允许', 'office_communication', '1', '1', '1', 1, '59'),
(61, '禁止', 'office_communication', '0', '2', '1', 2, '59'),
(62, '添加', 'office_communication_Increase', '1', '1', '2', 3, '59'),
(63, '编辑', 'office_communication_edit', '1', '1', '2', 4, '59'),
(64, '删除', 'office_communication_delete', '1', '1', '2', 5, '59'),
(65, '个人文件柜', 'input_name', '0', '1', '1', 7, '24'),
(66, '允许', 'office_document_1', '1', '1', '1', 1, '65'),
(67, '禁止', 'office_document_1', '0', '2', '1', 2, '65'),
(68, '添加', 'office_document_Increase_1', '1', '1', '2', 3, '65'),
(69, '编辑', 'office_document_edit_1', '1', '1', '2', 4, '65'),
(70, '删除', 'office_document_delete_1', '1', '1', '2', 5, '65'),
(344, '修改投票', 'app_update', '1', '1', '2', 4, '234'),
(103, '知识库', 'input_name', '0', '1', '1', 9, '0'),
(104, '知识管理', 'input_name', '0', '1', '1', 1, '103'),
(105, '发布', 'knowledge_Increase', '1', '1', '2', 1, '104'),
(106, '编辑', 'knowledge_read', '1', '1', '2', 2, '104'),
(107, '删除', 'knowledge_delete', '1', '1', '2', 3, '104'),
(108, '下载管理', 'input_name', '0', '1', '1', 2, '103'),
(109, '文件夹管理', 'office_document_type_4', '1', '1', '2', 6, '108'),
(110, '下载发布', 'office_document_Increase_4', '1', '1', '2', 3, '108'),
(111, '下载编辑', 'office_document_edit_4', '1', '1', '2', 4, '108'),
(112, '下载删除', 'office_document_delete_4', '1', '1', '2', 5, '108'),
(113, '规章制度', 'input_name', '0', '1', '1', 3, '103'),
(114, '目录管理', 'office_document_type_5', '1', '1', '2', 6, '113'),
(115, '信息发布', 'office_document_Increase_5', '1', '1', '2', 3, '113'),
(116, '信息编辑', 'office_document_edit_5', '1', '1', '2', 4, '113'),
(117, '信息删除', 'office_document_delete_5', '1', '1', '2', 5, '113'),
(118, '电子期刊', 'input_name', '0', '1', '1', 4, '103'),
(119, '允许', 'news_periodical', '1', '1', '1', 1, '118'),
(120, '禁止', 'news_periodical', '0', '2', '1', 2, '118'),
(121, '添加', 'news_periodical_Increase', '1', '1', '2', 3, '118'),
(122, '编辑', 'news_periodical_edit', '1', '1', '2', 4, '118'),
(123, '删除', 'news_periodical_delete', '1', '1', '2', 5, '118'),
(124, '分类设置', 'news_periodical_type', '1', '1', '2', 6, '118'),
(125, '公共文件柜', 'input_name', '0', '1', '1', 5, '103'),
(126, '文件夹管理', 'office_document_type_2', '1', '1', '2', 6, '125'),
(127, '文件上传', 'office_document_Increase_2', '1', '1', '2', 3, '125'),
(128, '文件修改', 'office_document_edit_2', '1', '1', '2', 4, '125'),
(129, '文件删除', 'office_document_delete_2', '1', '1', '2', 5, '125'),
(130, '网络硬盘', 'input_name', '0', '1', '1', 6, '103'),
(131, '文件夹管理', 'office_document_type_3', '1', '1', '2', 6, '130'),
(132, '文件上传', 'office_document_Increase_3', '1', '1', '2', 3, '130'),
(133, '文件编辑', 'office_document_edit_3', '1', '1', '2', 4, '130'),
(134, '文件删除', 'office_document_delete_3', '1', '1', '2', 5, '130'),
(135, '报表管理', 'input_name', '0', '1', '1', 7, '103'),
(136, '分类管理', 'office_document_type_6', '1', '1', '2', 6, '135'),
(137, '报表上传', 'office_document_Increase_6', '1', '1', '2', 3, '135'),
(138, '报表编辑', 'office_document_edit_6', '1', '1', '2', 4, '135'),
(139, '报表删除', 'office_document_delete_6', '1', '1', '2', 5, '135'),
(140, '行政办公', 'input_name', '0', '1', '1', 3, '0'),
(141, '大事记', 'input_name', '0', '1', '1', 5, '140'),
(142, '允许', 'news_chronicle', '1', '1', '1', 1, '141'),
(143, '禁止', 'news_chronicle', '0', '2', '1', 2, '141'),
(144, '添加', 'news_chronicle_Increase', '1', '1', '2', 3, '141'),
(145, '编辑', 'news_chronicle_edit', '1', '1', '2', 4, '141'),
(146, '删除', 'news_chronicle_delete', '1', '1', '2', 5, '141'),
(147, '分类设置', 'news_chronicle_type', '1', '1', '2', 6, '141'),
(148, '新闻', 'input_name', '0', '1', '1', 6, '140'),
(149, '允许', 'news_new', '1', '1', '1', 1, '148'),
(150, '禁止', 'news_new', '0', '2', '1', 2, '148'),
(151, '添加', 'news_new_Increase', '1', '1', '2', 3, '148'),
(152, '编辑', 'news_new_edit', '1', '1', '2', 4, '148'),
(153, '删除', 'news_new_delete', '1', '1', '2', 5, '148'),
(154, '分类设置', 'news_new_type', '1', '1', '2', 6, '148'),
(155, '通知', 'input_name', '0', '1', '1', 7, '140'),
(156, '允许', 'news_notice', '1', '1', '1', 1, '155'),
(157, '禁止', 'news_notice', '0', '2', '1', 2, '155'),
(158, '添加', 'news_notice_Increase', '1', '1', '2', 3, '155'),
(159, '编辑', 'news_notice_edit', '1', '1', '2', 4, '155'),
(160, '删除', 'news_notice_delete', '1', '1', '2', 5, '155'),
(161, '分类设置', 'news_notice_type', '1', '1', '2', 6, '155'),
(162, '公告', 'input_name', '0', '1', '1', 8, '140'),
(164, '允许', 'news_cement', '1', '1', '1', 1, '162'),
(165, '禁止', 'news_cement', '0', '2', '1', 2, '162'),
(166, '添加', 'news_cement_Increase', '1', '1', '2', 3, '162'),
(167, '编辑', 'news_cement_edit', '1', '1', '2', 4, '162'),
(168, '删除', 'news_cement_delete', '1', '1', '2', 5, '162'),
(169, '分类设置', 'news_cement_type', '1', '1', '2', 6, '162'),
(181, '会议管理', 'input_name', '0', '1', '1', 3, '140'),
(182, '允许', 'istration_conference', '1', '1', '1', 1, '181'),
(183, '禁止', 'istration_conference', '0', '2', '1', 2, '181'),
(184, '会议申请', 'istration_conference_Increase', '1', '1', '2', 3, '181'),
(185, '会议编辑', 'istration_conference_edit', '1', '1', '2', 4, '181'),
(186, '会议删除', 'istration_conference_delete', '1', '1', '2', 5, '181'),
(366, '知识库', 'input_name', '0', '1', '1', 9, '357'),
(367, '在线交流', 'input_name', '0', '1', '1', 10, '357'),
(368, '工作计划', 'excel_6', '1', '1', '2', 6, '358'),
(369, '通迅录', 'excel_7', '1', '1', '2', 7, '358'),
(190, '会议室设置', 'istration_conference_type_sce', '1', '1', '2', 9, '181'),
(191, '会议类型设置', 'istration_conference_type_type', '1', '1', '2', 10, '181'),
(192, '人力资源', 'input_name', '0', '1', '1', 5, '0'),
(193, '部门管理', 'department_', '1', '1', '1', 7, '1'),
(194, '允许', 'department_', '1', '1', '1', 1, '193'),
(195, '禁止', 'department_', '0', '2', '1', 2, '193'),
(196, '岗位设置', 'position_', '1', '1', '1', 8, '1'),
(197, '允许', 'position_', '1', '1', '1', 1, '196'),
(198, '禁止', 'position_', '0', '2', '1', 2, '196'),
(357, '报表权限设置', 'input_name', '0', '1', '1', 12, '0'),
(358, '工作台', 'input_name', '0', '1', '1', 1, '357'),
(202, '人事合同', 'input_name', '0', '1', '1', 5, '192'),
(203, '添加', 'humancontract_i', '1', '2', '2', 3, '202'),
(204, '编辑', 'humancontract_e', '1', '2', '2', 4, '202'),
(205, '删除', 'humancontract_d', '1', '2', '2', 5, '202'),
(206, '允许', 'humancontract_', '1', '1', '1', 1, '202'),
(207, '禁止', 'humancontract_', '0', '2', '1', 2, '202'),
(213, '培训管理', 'input_name', '0', '1', '1', 2, '192'),
(214, '培训管理', 'training_', '1', '2', '2', 1, '213'),
(215, '培训记录', 'training_record', '1', '2', '2', 2, '213'),
(216, '奖惩管理', 'input_name', '0', '1', '1', 3, '192'),
(217, '允许', 'rewards_', '1', '1', '1', 1, '216'),
(218, '禁止', 'rewards_', '0', '2', '1', 2, '216'),
(219, '考勤管理', 'input_name', '0', '1', '1', 4, '192'),
(220, '允许', 'registration_', '1', '1', '1', 1, '219'),
(221, '禁止', 'registration_', '0', '2', '1', 2, '219'),
(222, '导出报表', 'registration_excel', '1', '2', '2', 3, '219'),
(223, '基础类别设置', 'input_name', '0', '1', '1', 9, '192'),
(224, '允许', 'office_type_r', '1', '1', '1', 1, '223'),
(225, '禁止', 'office_type_r', '0', '2', '1', 2, '223'),
(226, '在线交流', 'input_name', '0', '1', '1', 11, '0'),
(227, '论坛', 'input_name', '0', '1', '1', 1, '226'),
(228, '论坛版块设置', 'bbsclass_', '1', '2', '2', 5, '227'),
(229, '论坛使用', 'bbs_', '1', '2', '2', 4, '227'),
(230, '贴子审批', 'bbs_key', '1', '2', '2', 3, '227'),
(231, '发贴', 'bbs_add', '1', '2', '2', 1, '227'),
(232, '删除', 'bbs_delete', '1', '2', '2', 6, '227'),
(233, '编辑', 'bbs_edit', '1', '2', '2', 2, '227'),
(234, '投票', 'input_name', '0', '1', '1', 2, '226'),
(235, '允许', 'app_', '1', '1', '1', 1, '234'),
(236, '禁止', 'app_', '0', '2', '1', 2, '234'),
(237, '发起投票', 'app_add', '1', '2', '2', 3, '234'),
(238, '菜单设置', 'input_name', '0', '1', '1', 999, '1'),
(239, '允许', 'config_menu', '1', '1', '1', 1, '238'),
(240, '拒绝', 'config_menu', '0', '2', '1', 2, '238'),
(241, '权限管理', 'input_name', '0', '1', '1', 999, '1'),
(242, '允许', 'config_keytable', '1', '1', '1', 1, '241'),
(243, '拒绝', 'config_keytable', '0', '2', '1', 2, '241'),
(244, '短信账号', 'office_sms_channel', '1', '1', '2', 6, '35'),
(245, '任务管理', 'input_name', '0', '1', '1', 8, '24'),
(246, '允许', 'office_duty', '1', '1', '1', 1, '245'),
(247, '拒绝', 'office_duty', '0', '2', '1', 2, '245'),
(248, '任务发布', 'office_duty_add', '1', '1', '2', 3, '245'),
(249, '任务查看', 'office_duty_reda', '1', '1', '2', 4, '245'),
(250, '任务日志', 'office_duty_sum', '1', '1', '2', 5, '245'),
(251, '分类管理', 'office_document_type_1', '1', '1', '2', 6, '65'),
(252, '允许', 'office_document_4', '1', '1', '1', 1, '108'),
(253, '拒绝', 'office_document_4', '0', '2', '1', 2, '108'),
(254, '允许', 'office_document_5', '1', '1', '1', 1, '113'),
(255, '拒绝', 'office_document_5', '0', '2', '1', 2, '113'),
(256, '允许', 'office_document_2', '1', '1', '1', 1, '125'),
(257, '拒绝', 'office_document_2', '0', '2', '1', 2, '125'),
(258, '允许', 'office_document_3', '1', '1', '1', 1, '130'),
(259, '拒绝', 'office_document_3', '0', '2', '1', 2, '130'),
(260, '允许', 'office_document_6', '1', '1', '1', 1, '135'),
(261, '拒绝', 'office_document_6', '0', '2', '1', 2, '135'),
(345, '删除投票', 'app_del', '1', '1', '2', 5, '234'),
(370, '会议管理', 'excel_8', '1', '1', '2', 8, '358'),
(371, '任务管理', 'excel_1', '1', '1', '2', 1, '358'),
(372, '手机短信', 'excel_2', '1', '1', '2', 2, '358'),
(373, '短消息', 'excel_3', '1', '1', '2', 3, '358'),
(374, '日程安排', 'excel_4', '1', '1', '2', 4, '358'),
(375, '工作日记', 'excel_5', '1', '1', '2', 5, '358'),
(393, '考勤管理', 'excel_25', '1', '1', '2', 1, '362'),
(398, '人事合同', 'excel_30', '1', '1', '2', 6, '362'),
(399, '培训', 'excel_31', '1', '1', '2', 7, '362'),
(400, '奖惩', 'excel_32', '1', '1', '2', 8, '362'),
(407, '知识', 'excel_39', '1', '1', '2', 1, '366'),
(408, '投票', 'excel_40', '1', '1', '2', 1, '367'),
(409, '信息发布', 'excel_41', '0', '1', '2', 6, '361');

-- --------------------------------------------------------

--
-- 表的结构 `toa_knowledge`
--

CREATE TABLE IF NOT EXISTS `toa_knowledge` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(80) DEFAULT NULL,
  `content` text,
  `number` int(10) DEFAULT NULL,
  `categoryid` varchar(10) DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `uid` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `toa_loginlog`
--

CREATE TABLE IF NOT EXISTS `toa_loginlog` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uid` int(10) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `ip` varchar(50) DEFAULT NULL,
  `logindate` datetime DEFAULT NULL,
  `enddate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- 转存表中的数据 `toa_loginlog`
--

INSERT INTO `toa_loginlog` (`id`, `uid`, `name`, `ip`, `logindate`, `enddate`) VALUES
(1, 1, 'admin', '127.0.0.1', '2016-08-27 10:42:00', '2016-08-27 10:42:00'),
(2, 1, 'admin', '10.23.163.56', '2016-08-27 11:05:42', '2016-08-27 11:05:42'),
(3, 1, 'admin', '127.0.0.1', '2016-08-28 20:19:45', '2016-08-28 20:19:45'),
(4, 1, 'admin', '127.0.0.1', '2016-08-29 11:16:40', '2016-08-29 11:16:40'),
(5, 1, 'admin', '127.0.0.1', '2016-08-30 12:44:24', '2016-08-30 12:45:26'),
(6, 1, 'admin', '127.0.0.1', '2016-08-30 12:45:38', '2016-08-30 12:45:38'),
(7, 1, 'admin', '127.0.0.1', '2016-08-31 15:49:11', '2016-08-31 15:49:11'),
(8, 1, 'admin', '127.0.0.1', '2016-09-03 11:17:27', '2016-09-03 11:17:27'),
(9, 2, 'yangke', '10.23.163.56', '2016-09-03 11:19:53', '2016-09-03 11:23:24'),
(10, 1, 'admin', '127.0.0.1', '2016-09-05 15:42:08', '2016-09-05 15:42:08'),
(11, 1, 'admin', '127.0.0.1', '2016-09-13 11:08:47', '2016-09-13 11:08:47');

-- --------------------------------------------------------

--
-- 表的结构 `toa_menu`
--

CREATE TABLE IF NOT EXISTS `toa_menu` (
  `menuid` int(10) NOT NULL AUTO_INCREMENT,
  `menuname` varchar(255) DEFAULT NULL,
  `menuurl` varchar(255) DEFAULT NULL,
  `fatherid` varchar(10) DEFAULT NULL,
  `menutype` varchar(10) DEFAULT NULL,
  `menunum` int(25) DEFAULT '9999',
  `menukey` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`menuid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=285 ;

--
-- 转存表中的数据 `toa_menu`
--

INSERT INTO `toa_menu` (`menuid`, `menuname`, `menuurl`, `fatherid`, `menutype`, `menunum`, `menukey`) VALUES
(3, '个人办公', 'home.php?mid=3', '0', '0', 1, '1'),
(9, '知识管理', 'home.php?mid=9', '0', '0', 9, '1'),
(10, '行政办公', 'home.php?mid=10', '0', '0', 4, '1'),
(11, '人力资源', 'home.php?mid=11', '0', '0', 5, '1'),
(17, '短消息', 'admin.php?ac=receive&fileurl=sms', '3', '2', 4, '0'),
(18, '手机短信', 'admin.php?ac=smsindex&fileurl=sms', '3', '2', 3, '0'),
(19, '在线考勤', 'admin.php?ac=registration&fileurl=workbench', '3', '2', 1, '0'),
(20, '日程安排', 'admin.php?ac=workdate&fileurl=workbench', '3', '2', 5, '0'),
(21, '工作日记', 'admin.php?ac=blog&fileurl=workbench', '3', '2', 6, '0'),
(22, '工作计划', 'admin.php?ac=plan&fileurl=workbench', '3', '2', 7, '0'),
(23, '通迅录', 'admin.php?ac=index&fileurl=communication&type=1', '3', '2', 9, ''),
(24, '个人文件柜', 'admin.php?ac=document&fileurl=knowledge&type=1', '3', '2', 8, '0'),
(25, '会议管理', 'admin.php?ac=conference&fileurl=administrative', '3', '2', 10, '0'),
(26, '新闻', 'admin.php?ac=news&fileurl=workbench&type=1', '3', '2', 14, '0'),
(27, '公告', 'admin.php?ac=news&fileurl=workbench&type=3', '3', '2', 11, '0'),
(28, '通知', 'admin.php?ac=news&fileurl=workbench&type=4', '3', '2', 12, '0'),
(29, '大事记', 'admin.php?ac=news&fileurl=workbench&type=5', '3', '2', 13, '0'),
(30, '电子期刊', 'admin.php?ac=news&fileurl=workbench&type=6', '3', '2', 15, '0'),
(31, '任务管理', 'admin.php?ac=duty&fileurl=duty', '3', '2', 2, '0'),
(56, '在线交流', 'home.php?mid=56', '0', '0', 10, '0'),
(57, '个人设置', 'admin.php?ac=user&fileurl=member', '3', '0', 11, ''),
(58, '系统设置', 'home.php?mid=58', '0', '0', 12, ''),
(64, '知识管理', 'admin.php?ac=know&fileurl=knowledge', '9', '2', 1, ''),
(65, '下载管理', 'admin.php?ac=document&fileurl=knowledge&type=4', '9', '2', 2, ''),
(66, '规章制度', 'admin.php?ac=document&fileurl=knowledge&type=5', '9', '2', 5, ''),
(67, '电子期刊', 'admin.php?ac=news&fileurl=administrative&type=6', '9', '2', 6, ''),
(68, '大事记管理', 'admin.php?ac=news&fileurl=administrative&type=5', '10', '2', 8, ''),
(69, '新闻管理', 'admin.php?ac=news&fileurl=administrative&type=1', '10', '2', 7, ''),
(70, '通知管理', 'admin.php?ac=news&fileurl=administrative&type=4', '10', '2', 6, ''),
(71, '公告管理', 'admin.php?ac=news&fileurl=administrative&type=3', '10', '2', 5, ''),
(75, '会议申请及安排', 'admin.php?ac=conference&fileurl=administrative', '10', '0', 4, '0'),
(80, '人事合同', 'admin.php?ac=humancontract&fileurl=human', '11', '2', 2, '0'),
(82, '培训管理', 'admin.php?ac=training&fileurl=human', '11', '2', 4, '0'),
(83, '奖惩记录', 'admin.php?ac=rewards&fileurl=human', '11', '2', 5, '0'),
(84, '考勤管理', 'admin.php?ac=registration&fileurl=human', '11', '2', 0, ''),
(86, '个人信息', 'admin.php?ac=user&fileurl=member', '57', '2', 1, ''),
(87, '密码修改', 'admin.php?ac=password&fileurl=member', '57', '2', 2, ''),
(88, '个人收藏', 'admin.php?ac=eweb&fileurl=member', '57', '2', 3, ''),
(89, '个人系统日志', 'admin.php?ac=log&fileurl=member', '57', '2', 4, ''),
(90, '系统设置', 'admin.php?ac=config&fileurl=mana', '58', '2', 1, ''),
(91, '权限设置', 'admin.php?ac=usergroup&fileurl=mana', '58', '2', 2, ''),
(92, '账户设置', 'admin.php?ac=user&fileurl=mana', '58', '2', 5, ''),
(93, '系统维护', 'admin.php?ac=log&fileurl=mana', '58', '2', 8, ''),
(94, '数据备份', 'admin.php?ac=data&fileurl=mana', '58', '2', 9, ''),
(96, '论坛', 'admin.php?ac=bbs&fileurl=knowledge', '56', '2', 2, '0'),
(97, '投票', 'admin.php?ac=app&fileurl=knowledge', '56', '2', 1, '0'),
(107, '公共文件柜', 'admin.php?ac=document&fileurl=knowledge&type=2', '9', '2', 3, ''),
(109, '网络硬盘', 'admin.php?ac=document&fileurl=knowledge&type=3', '9', '2', 4, ''),
(110, '报表管理', 'admin.php?ac=document&fileurl=knowledge&type=6', '9', '2', 7, ''),
(111, '菜单设置', 'admin.php?ac=menu&fileurl=mana', '58', '2', 6, ''),
(128, '权限管理', 'admin.php?ac=keytable&fileurl=mana', '58', '2', 7, '0'),
(133, '基础类别设置', 'admin.php?ac=type&fileurl=office&otype=9&muid=133&numberid=134', '11', '0', 8, '0'),
(232, '产品授权', 'admin.php?ac=version&fileurl=mana', '58', '2', 10, '0'),
(139, '人事合同类型', 'admin.php?ac=officeclass&fileurl=mana&do=bbsclass&otype=14', '133', '0', 6, '0'),
(140, '人事合同状态', 'admin.php?ac=officeclass&fileurl=mana&do=bbsclass&otype=15', '133', '0', 7, '0'),
(145, '招聘渠道', 'admin.php?ac=officeclass&fileurl=mana&do=bbsclass&otype=16', '133', '0', 8, '0'),
(146, '培训类型', 'admin.php?ac=officeclass&fileurl=mana&do=bbsclass&otype=17', '133', '0', 9, '0'),
(147, '培训形式', 'admin.php?ac=officeclass&fileurl=mana&do=bbsclass&otype=18', '133', '0', 10, '0'),
(148, '奖惩项目', 'admin.php?ac=officeclass&fileurl=mana&do=bbsclass&otype=19', '133', '0', 11, '0'),
(149, '论坛版块设置', 'admin.php?ac=bbs&do=bbsclass&fileurl=knowledge', '96', '0', 4, '0'),
(150, '贴子列表', 'admin.php?ac=bbs&fileurl=knowledge', '96', '0', 2, '0'),
(151, '发布贴子', 'admin.php?ac=bbs&do=add&fileurl=knowledge', '96', '0', 1, '0'),
(152, '贴子审批', 'admin.php?ac=bbs&fileurl=knowledge&ischeck=2', '96', '0', 3, '0'),
(197, '部门设置', 'admin.php?ac=department&fileurl=mana', '58', '2', 3, '0'),
(198, '岗位设置', 'admin.php?ac=position&fileurl=mana', '58', '2', 4, '0'),
(208, '新增信息', 'admin.php?ac=document&fileurl=knowledge&do=add&type=5', '66', '0', 1, '0'),
(199, '文件夹管理', 'admin.php?ac=document&fileurl=knowledge&type=4&do=documenttype', '65', '0', 3, '0'),
(200, '新增下载信息', 'admin.php?ac=document&fileurl=knowledge&do=add&type=4', '65', '0', 1, '0'),
(201, '下载信息列表', 'admin.php?ac=document&fileurl=knowledge&type=4', '65', '0', 2, '0'),
(202, '信息列表', 'admin.php?ac=document&fileurl=knowledge&type=2', '107', '0', 2, '0'),
(203, '新增信息', 'admin.php?ac=document&fileurl=knowledge&do=add&type=2', '107', '0', 1, '0'),
(204, '文件夹管理', 'admin.php?ac=document&fileurl=knowledge&type=2&do=documenttype', '107', '0', 3, '0'),
(205, '新增信息', 'admin.php?ac=document&fileurl=knowledge&do=add&type=3', '109', '0', 1, '0'),
(206, '信息列表', 'admin.php?ac=document&fileurl=knowledge&type=3', '109', '0', 2, '0'),
(207, '文件夹管理', 'admin.php?ac=document&fileurl=knowledge&type=3&do=documenttype', '109', '0', 3, '0'),
(209, '信息列表', 'admin.php?ac=document&fileurl=knowledge&type=5', '66', '0', 2, '0'),
(210, '文件夹管理', 'admin.php?ac=document&fileurl=knowledge&type=5&do=documenttype', '66', '0', 3, '0'),
(211, '新增报表', 'admin.php?ac=document&fileurl=knowledge&do=add&type=6', '110', '0', 1, '0'),
(212, '信息列表', 'admin.php?ac=document&fileurl=knowledge&type=6', '110', '0', 2, '0'),
(213, '文件夹管理', 'admin.php?ac=document&fileurl=knowledge&type=6&do=documenttype', '110', '0', 3, '0'),
(218, '会议室设置', 'admin.php?ac=officeclass&fileurl=mana&do=bbsclass&otype=1', '75', '2', 3, '0'),
(219, '会议列表及审批', 'admin.php?ac=conference&fileurl=administrative', '75', '2', 2, '0'),
(220, '会议申请', 'admin.php?ac=conference&fileurl=administrative&do=add', '75', '2', 1, '0'),
(221, '会议类别设置', 'admin.php?ac=officeclass&fileurl=mana&do=bbsclass&otype=2', '75', '2', 4, '0'),
(234, '学历', 'admin.php?ac=officeclass&fileurl=mana&do=bbsclass&otype=10', '133', '0', 12, '0'),
(235, '印鉴管理', 'admin.php?ac=seal&fileurl=member', '57', '2', 5, '0'),
(282, '组件管理', 'admin.php?ac=plugin&fileurl=mana', '58', '0', 11, '0'),
(236, '红头文件管理', 'admin.php?ac=hongtou&fileurl=member', '57', '2', 999, '0'),
(284, '手机设置', 'admin.php?ac=mobile&fileurl=mana', '58', '0', 12, '0');

-- --------------------------------------------------------

--
-- 表的结构 `toa_mobile_model`
--

CREATE TABLE IF NOT EXISTS `toa_mobile_model` (
  `mid` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(32) DEFAULT NULL,
  `linkurl` varchar(255) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `ico` varchar(64) DEFAULT NULL,
  `type` varchar(16) NOT NULL,
  `type1` varchar(16) NOT NULL,
  PRIMARY KEY (`mid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10014 ;

--
-- 转存表中的数据 `toa_mobile_model`
--

INSERT INTO `toa_mobile_model` (`mid`, `title`, `linkurl`, `number`, `ico`, `type`, `type1`) VALUES
(10001, '工作流', 'work/work.html?', 999, '10001.png', 'menu', '1'),
(10002, '公文发文', 'app/approval.html?', 999, '10002.png', 'menu', '1'),
(10003, '公文收文', 'app/attachment.html?', 999, '10003.png', 'menu', '1'),
(10004, '会议查看', 'administrative/conference.html?', 999, '10004.png', 'menu', '1'),
(10005, '通迅录', 'communication.html?', 999, '10005.png', 'menu', '1'),
(10006, '项目管理', 'project/prolist.html?', 999, '10006.png', 'menu', '1'),
(10007, '公告', 'workbench/news.html?type=3', 999, '10007.png', 'menu', '1'),
(10008, '通知', 'workbench/news.html?type=4', 999, '10008.png', 'menu', '1'),
(10009, '大事记', 'workbench/news.html?type=5', 999, '10009.png', 'menu', '1'),
(10010, '新闻', 'workbench/news.html?type=1', 999, '10010.png', 'menu', '1'),
(10012, '百度', 'http://www.baidu.com/', 999, '10012.png', 'model', '1'),
(10013, '新浪', 'http://www.sina.com.cn', 999, '10013.png', 'model', '1');

-- --------------------------------------------------------

--
-- 表的结构 `toa_news`
--

CREATE TABLE IF NOT EXISTS `toa_news` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `toa_news`
--

INSERT INTO `toa_news` (`id`, `category`, `receive`, `phonereceive`, `subject`, `content`, `appendix`, `type`, `date`, `uid`, `pic`) VALUES
(1, '0', '0', NULL, '网约车尚未正式合法 私家车拉活仍违规', '<div>北京晚报8月26日报道 本周二晚上，市交通执法大队4个小时扣了38辆“黑车”。交通部门表示，在网约车细则发布前，私家车从事网约拉活行为仍属违规，按“黑车”处理，将面临2万元以下的罚款。</div>\r\n<div>今年7月底，交通运输部等七部门公布了《网络预约出租汽车经营服务管理暂行办法》，明确私家车符合条件通过合法程序可转化为网约车运营。各城市将出台实施细则。按规定，网约车新政将于11月1日起实施，所以各地细则势必在此之前出台。</div>\r\n<div>多地交通部门已发表了过渡期内的执法规定。济南市交通部门曾向媒体透露，在政策落地前，仍将按照现有法律法规查处非法营运。2015年至2016年7月7日，济南已查扣近400辆网约车。山东淄博、广西南宁、江西南昌等地交通执法部门也曾公开表示，地方细则出台前，专车还是“黑车”。</div>\r\n<div>北京市交通委运输局透露，本市正在研究制定实施细则，将会按照网约车与巡游出租车融合发展的方向制定细则。</div>', '', '1', '2016-08-27 11:52:51', '1', '0'),
(2, '0', '0', NULL, 'OA上线试运行', 'OA上线试运行', '', '3', '2016-08-27 11:53:24', '1', '0');

-- --------------------------------------------------------

--
-- 表的结构 `toa_news_read`
--

CREATE TABLE IF NOT EXISTS `toa_news_read` (
  `rid` int(10) NOT NULL AUTO_INCREMENT,
  `uid` varchar(30) DEFAULT NULL,
  `disdate` datetime DEFAULT NULL,
  `viewdate` datetime DEFAULT NULL,
  `evaluation` varchar(200) DEFAULT NULL,
  `dkey` varchar(10) DEFAULT NULL,
  `newsid` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`rid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `toa_news_type`
--

CREATE TABLE IF NOT EXISTS `toa_news_type` (
  `nid` int(10) NOT NULL AUTO_INCREMENT,
  `ntitle` varchar(60) DEFAULT NULL,
  `uid` varchar(10) DEFAULT NULL,
  `ntype` varchar(10) DEFAULT NULL,
  `ndate` datetime DEFAULT NULL,
  PRIMARY KEY (`nid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `toa_ntkohtmlfile`
--

CREATE TABLE IF NOT EXISTS `toa_ntkohtmlfile` (
  `id` mediumint(10) NOT NULL AUTO_INCREMENT,
  `filename` varchar(256) DEFAULT NULL,
  `filepath` varchar(256) DEFAULT NULL,
  `filesize` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `toa_ntkoofficefile`
--

CREATE TABLE IF NOT EXISTS `toa_ntkoofficefile` (
  `id` mediumint(10) NOT NULL AUTO_INCREMENT,
  `filename` varchar(256) DEFAULT NULL,
  `filesize` mediumint(10) DEFAULT NULL,
  `otherdata` varchar(128) DEFAULT NULL,
  `filetype` varchar(64) DEFAULT NULL,
  `filenamedisk` varchar(256) DEFAULT NULL,
  `attachfilenamedisk` varchar(256) DEFAULT NULL,
  `attachfiledescribe` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `toa_ntkopdffile`
--

CREATE TABLE IF NOT EXISTS `toa_ntkopdffile` (
  `id` mediumint(10) NOT NULL AUTO_INCREMENT,
  `pdffilename` varchar(256) DEFAULT NULL,
  `pdffilepath` varchar(256) DEFAULT NULL,
  `filesize` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `toa_oalog`
--

CREATE TABLE IF NOT EXISTS `toa_oalog` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uid` varchar(20) DEFAULT NULL,
  `content` text,
  `title` varchar(255) DEFAULT NULL,
  `startdate` datetime DEFAULT NULL,
  `contentid` varchar(20) DEFAULT NULL,
  `type` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- 转存表中的数据 `toa_oalog`
--

INSERT INTO `toa_oalog` (`id`, `uid`, `content`, `title`, `startdate`, `contentid`, `type`) VALUES
(1, '1', '您有一条新的新闻需要阅读,请点击查看!<a href="admin.php?ac=news&fileurl=administrative&do=views&id=1&type=1">点击阅读>></a>|515158.com|0', '发布短消息', '2016-08-27 11:52:51', '1', '4'),
(2, '1', 'a:9:{s:8:"category";i:0;s:7:"receive";s:1:"0";s:7:"subject";s:52:"网约车尚未正式合法 私家车拉活仍违规";s:7:"content";s:1158:"<div>北京晚报8月26日报道 本周二晚上，市交通执法大队4个小时扣了38辆“黑车”。交通部门表示，在网约车细则发布前，私家车从事网约拉活行为仍属违规，按“黑车”处理，将面临2万元以下的罚款。</div>\r\n<div>今年7月底，交通运输部等七部门公布了《网络预约出租汽车经营服务管理暂行办法》，明确私家车符合条件通过合法程序可转化为网约车运营。各城市将出台实施细则。按规定，网约车新政将于11月1日起实施，所以各地细则势必在此之前出台。</div>\r\n<div>多地交通部门已发表了过渡期内的执法规定。济南市交通部门曾向媒体透露，在政策落地前，仍将按照现有法律法规查处非法营运。2015年至2016年7月7日，济南已查扣近400辆网约车。山东淄博、广西南宁、江西南昌等地交通执法部门也曾公开表示，地方细则出台前，专车还是“黑车”。</div>\r\n<div>北京市交通委运输局透露，本市正在研究制定实施细则，将会按照网约车与巡游出租车融合发展的方向制定细则。</div>";s:8:"appendix";s:0:"";s:4:"type";s:1:"1";s:4:"date";s:19:"2016-08-27 11:52:51";s:3:"pic";s:1:"0";s:3:"uid";s:1:"1";}', '新增新闻', '2016-08-27 11:52:51', '1', '13'),
(3, '1', '您有一条新的公告需要阅读,请点击查看!<a href="admin.php?ac=news&fileurl=administrative&do=views&id=2&type=3">点击阅读>></a>|515158.com|0', '发布短消息', '2016-08-27 11:53:24', '2', '4'),
(4, '1', 'a:9:{s:8:"category";i:0;s:7:"receive";s:1:"0";s:7:"subject";s:17:"OA上线试运行";s:7:"content";s:17:"OA上线试运行";s:8:"appendix";s:0:"";s:4:"type";s:1:"3";s:4:"date";s:19:"2016-08-27 11:53:24";s:3:"pic";s:1:"0";s:3:"uid";s:1:"1";}', '新增公告', '2016-08-27 11:53:24', '2', '13'),
(5, '1', '消息测试|515158.com|管理员', '发布短消息', '2016-08-29 12:24:27', '3', '4'),
(6, '1', 'a:1:{i:0;s:1:"1";}', '清理考勤信息', '2016-08-29 12:30:17', '1', '7'),
(7, '1', 'a:2:{s:4:"name";s:11:"closereason";s:5:"value";s:0:"";}', '系统设置', '2016-08-29 12:31:02', '1', '1'),
(8, '1', 'a:8:{s:8:"password";s:32:"20a9e23a326bf90c53d49445eaf0f3fe";s:7:"groupid";s:1:"1";s:7:"ischeck";s:1:"1";s:12:"departmentid";s:1:"0";s:10:"positionid";s:1:"0";s:7:"loginip";s:0:"";s:7:"keytype";s:0:"";s:11:"keytypeuser";s:0:"";}a:1:{s:4:"name";s:9:"管理员";}', '修改用户信息管理员', '2016-08-30 12:45:22', '1', '3'),
(9, '1', 'a:8:{s:5:"title";s:11:"OA试运行";s:5:"otype";s:0:"";s:9:"startdate";s:19:"2016-09-01 08:30:00";s:7:"enddate";s:19:"2016-09-30 17:01:00";s:7:"content";s:11:"OA试运行";s:4:"date";s:19:"2016-08-30 13:28:30";s:4:"type";s:6:"公开";s:3:"uid";s:1:"1";}', '新建日程信息', '2016-08-30 13:28:30', '1', '10'),
(10, '1', 'a:2:{s:9:"groupname";s:9:"用户组";s:7:"purview";s:2630:"a:82:{s:11:"department_";s:1:"0";s:9:"position_";s:1:"0";s:10:"config_inc";s:1:"0";s:16:"config_usergroup";s:1:"0";s:11:"config_user";s:1:"0";s:10:"config_log";s:1:"0";s:11:"config_menu";s:1:"0";s:15:"config_keytable";s:1:"0";s:11:"office_info";s:1:"1";s:20:"office_info_Increase";s:1:"1";s:10:"office_sms";s:1:"0";s:19:"office_sms_Increase";s:1:"1";s:15:"office_sms_read";s:1:"1";s:13:"date_workdate";s:1:"1";s:22:"date_workdate_Increase";s:1:"1";s:18:"date_workdate_edit";s:1:"1";s:9:"date_blog";s:1:"1";s:18:"date_blog_Increase";s:1:"1";s:14:"date_blog_edit";s:1:"1";s:9:"date_plan";s:1:"1";s:18:"date_plan_Increase";s:1:"1";s:14:"date_plan_edit";s:1:"1";s:20:"office_communication";s:1:"1";s:29:"office_communication_Increase";s:1:"1";s:25:"office_communication_edit";s:1:"1";s:17:"office_document_1";s:1:"1";s:26:"office_document_Increase_1";s:1:"1";s:22:"office_document_edit_1";s:1:"1";s:11:"office_duty";s:1:"1";s:15:"office_duty_add";s:1:"1";s:16:"office_duty_reda";s:1:"1";s:15:"office_duty_sum";s:1:"1";s:20:"istration_conference";s:1:"1";s:29:"istration_conference_Increase";s:1:"1";s:25:"istration_conference_edit";s:1:"1";s:14:"news_chronicle";s:1:"1";s:23:"news_chronicle_Increase";s:1:"1";s:19:"news_chronicle_edit";s:1:"1";s:8:"news_new";s:1:"1";s:17:"news_new_Increase";s:1:"1";s:13:"news_new_edit";s:1:"1";s:11:"news_notice";s:1:"1";s:20:"news_notice_Increase";s:1:"1";s:16:"news_notice_edit";s:1:"1";s:11:"news_cement";s:1:"1";s:20:"news_cement_Increase";s:1:"1";s:16:"news_cement_edit";s:1:"1";s:9:"training_";s:1:"1";s:15:"training_record";s:1:"1";s:8:"rewards_";s:1:"1";s:13:"registration_";s:1:"0";s:14:"humancontract_";s:1:"1";s:15:"humancontract_i";s:1:"1";s:15:"humancontract_e";s:1:"1";s:13:"office_type_r";s:1:"0";s:18:"knowledge_Increase";s:1:"1";s:14:"knowledge_read";s:1:"1";s:17:"office_document_4";s:1:"1";s:26:"office_document_Increase_4";s:1:"1";s:22:"office_document_edit_4";s:1:"1";s:17:"office_document_5";s:1:"1";s:26:"office_document_Increase_5";s:1:"1";s:22:"office_document_edit_5";s:1:"1";s:15:"news_periodical";s:1:"1";s:24:"news_periodical_Increase";s:1:"1";s:20:"news_periodical_edit";s:1:"1";s:17:"office_document_2";s:1:"1";s:26:"office_document_Increase_2";s:1:"1";s:22:"office_document_edit_2";s:1:"1";s:17:"office_document_3";s:1:"1";s:26:"office_document_Increase_3";s:1:"1";s:22:"office_document_edit_3";s:1:"1";s:17:"office_document_6";s:1:"1";s:26:"office_document_Increase_6";s:1:"1";s:22:"office_document_edit_6";s:1:"1";s:7:"bbs_add";s:1:"1";s:8:"bbs_edit";s:1:"1";s:7:"bbs_key";s:1:"1";s:4:"bbs_";s:1:"1";s:4:"app_";s:1:"1";s:7:"app_add";s:1:"1";s:8:"excel_41";s:1:"0";}";}', '修改用户组', '2016-08-30 16:40:07', '3', '2'),
(11, '1', 'a:2:{i:0;s:1:"3";i:1;s:1:"2";}', '清理考勤信息', '2016-08-31 17:37:47', '2', '7'),
(12, '1', 'a:1:{s:5:"value";s:0:"";}', '系统设置', '2016-08-31 17:37:57', '1', '1'),
(13, '1', 'a:8:{s:8:"username";s:6:"yangke";s:8:"password";s:32:"d3a366ae17bfad46f574797ac33ff83b";s:7:"groupid";s:1:"3";s:7:"ischeck";s:1:"1";s:12:"departmentid";s:1:"1";s:10:"positionid";s:1:"0";s:7:"loginip";s:0:"";s:4:"date";s:17:"16-09-03 11:19:30";}a:2:{s:4:"name";s:6:"杨科";s:3:"uid";i:2;}', '添加新用户yangke', '2016-09-03 11:19:30', '2', '3'),
(14, '2', 'hello~~\r\n超级大气、小清新、高仿福州户外网全手工div+css模板|515158.com|管理员', '发布短消息', '2016-09-03 11:20:23', '4', '4'),
(15, '1', 'a:6:{s:5:"title";s:11:"OA试运行";s:5:"otype";s:0:"";s:9:"startdate";s:19:"2016-09-01 08:30:00";s:7:"enddate";s:19:"2016-09-30 17:01:00";s:7:"content";s:11:"OA试运行";s:4:"type";s:6:"公开";}', '结束日程信息', '2016-09-03 11:30:12', '1', '10');

-- --------------------------------------------------------

--
-- 表的结构 `toa_office_type`
--

CREATE TABLE IF NOT EXISTS `toa_office_type` (
  `oid` int(10) NOT NULL AUTO_INCREMENT,
  `oname` varchar(255) DEFAULT NULL,
  `otype` varchar(10) DEFAULT NULL,
  `uid` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`oid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=74 ;

--
-- 转存表中的数据 `toa_office_type`
--

INSERT INTO `toa_office_type` (`oid`, `oname`, `otype`, `uid`) VALUES
(54, '劳务合同', '14', '1'),
(55, '保密合同', '14', '1'),
(56, '其它', '14', '1'),
(57, '试用期', '15', '1'),
(58, '己转证', '15', '1'),
(59, '己解除', '15', '1'),
(60, '网络招聘', '16', '1'),
(61, '招聘会', '16', '1'),
(62, '职介', '16', '1'),
(63, '内部培训', '17', '1'),
(64, '外部培训', '17', '1'),
(65, '面授', '18', '1'),
(66, '涵受', '18', '1'),
(67, '其它', '18', '1'),
(68, '迟到', '19', '1'),
(69, '早退', '19', '1'),
(70, '工作原因', '19', '1'),
(71, '错误处份', '19', '1'),
(72, '业绩奖励', '19', '1'),
(73, '奖金', '19', '1');

-- --------------------------------------------------------

--
-- 表的结构 `toa_online`
--

CREATE TABLE IF NOT EXISTS `toa_online` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `startdate` datetime DEFAULT NULL,
  `uid` varchar(20) DEFAULT NULL,
  `enddate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `toa_online`
--

INSERT INTO `toa_online` (`id`, `startdate`, `uid`, `enddate`) VALUES
(1, '2016-09-13 11:29:11', '1', '2016-09-13 11:39:11'),
(2, '2016-09-03 11:19:54', '2', '2016-09-03 11:23:24');

-- --------------------------------------------------------

--
-- 表的结构 `toa_phone_channel`
--

CREATE TABLE IF NOT EXISTS `toa_phone_channel` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `toa_phone_channel`
--

INSERT INTO `toa_phone_channel` (`id`, `company`, `price`, `content`, `connection`, `remainsum`, `type`, `connectionid`, `pkey`, `username`, `password`, `toaid`, `date`) VALUES
(1, '天生创想增值服务平台', '0.1', '短信发送成功率98%，发送速度即时发送!', '0#515158#http://service.winic.org/webservice/public/remoney.asp?uid=#01&pwd=#01#515158#http://service.winic.org/sys_port/gateway/?id=#01&pwd=#01&to=#01&content=#01&encode=#01&time=#01#515158#http://service.winic.org/sys_port/Gateway/mo2.asp?id=#01&pwd=#01', '0', '3', '1', '1', '', '', NULL, '2011-06-30 15:16:58');

-- --------------------------------------------------------

--
-- 表的结构 `toa_phone_receive`
--

CREATE TABLE IF NOT EXISTS `toa_phone_receive` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `content` varchar(500) DEFAULT NULL,
  `sendphone` varchar(30) DEFAULT NULL,
  `date` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `toa_phone_send`
--

CREATE TABLE IF NOT EXISTS `toa_phone_send` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `content` varchar(500) DEFAULT NULL,
  `receivephone` varchar(30) DEFAULT NULL,
  `sendperson` varchar(10) DEFAULT NULL,
  `receiveperson` varchar(30) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `type` varchar(5) DEFAULT NULL,
  `channelid` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `toa_plan`
--

CREATE TABLE IF NOT EXISTS `toa_plan` (
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `toa_plugin`
--

CREATE TABLE IF NOT EXISTS `toa_plugin` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `title` varchar(64) DEFAULT NULL,
  `company` varchar(32) DEFAULT NULL,
  `version` varchar(16) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `update` datetime DEFAULT NULL,
  `type` varchar(2) DEFAULT NULL,
  `filename` varchar(16) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10011 ;

--
-- 转存表中的数据 `toa_plugin`
--

INSERT INTO `toa_plugin` (`id`, `title`, `company`, `version`, `date`, `update`, `type`, `filename`) VALUES
(10001, '工作流', '天生创想', 'v2.0', NULL, NULL, '1', 'workclass'),
(10002, 'CRM系统', '天生创想', 'v2.0', NULL, NULL, '1', 'crm'),
(10003, '办公用品', '天生创想', 'v2.0', NULL, NULL, '1', 'goods'),
(10004, '图书管理', '天生创想', 'v2.0', NULL, NULL, '1', 'book'),
(10005, '固定资产', '天生创想', 'v2.0', NULL, NULL, '1', 'property'),
(10006, '招聘管理', '天生创想', 'v2.0', NULL, NULL, '1', 'jobs'),
(10007, '人事管理', '天生创想', 'v2.0', NULL, NULL, '1', 'human'),
(10008, '公文系统', '天生创想', 'v2.0', NULL, NULL, '1', 'app'),
(10009, '档案系统', '天生创想', 'v2.0', NULL, NULL, '1', 'file'),
(10010, '项目管理', '天生创想', 'v2.0', NULL, NULL, '1', 'project');

-- --------------------------------------------------------

--
-- 表的结构 `toa_position`
--

CREATE TABLE IF NOT EXISTS `toa_position` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `content` text,
  `father` varchar(20) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `toa_project_duty`
--

CREATE TABLE IF NOT EXISTS `toa_project_duty` (
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `toa_project_duty_log`
--

CREATE TABLE IF NOT EXISTS `toa_project_duty_log` (
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `toa_registration`
--

CREATE TABLE IF NOT EXISTS `toa_registration` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `uid` varchar(10) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `year` varchar(8) NOT NULL,
  `month` varchar(8) NOT NULL,
  `day` varchar(8) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `toa_registration`
--

INSERT INTO `toa_registration` (`id`, `name`, `uid`, `date`, `year`, `month`, `day`) VALUES
(4, '管理员', '1', '2016-08-31', '2016', '08', '31');

-- --------------------------------------------------------

--
-- 表的结构 `toa_registration_log`
--

CREATE TABLE IF NOT EXISTS `toa_registration_log` (
  `lid` int(11) NOT NULL AUTO_INCREMENT,
  `rid` varchar(16) DEFAULT NULL,
  `hour` varchar(16) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `number` varchar(16) DEFAULT NULL,
  `type` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`lid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `toa_registration_log`
--

INSERT INTO `toa_registration_log` (`lid`, `rid`, `hour`, `note`, `number`, `type`) VALUES
(3, '4', '', NULL, '0', ''),
(4, '4', '17:38', NULL, '0', '0');

-- --------------------------------------------------------

--
-- 表的结构 `toa_rewards`
--

CREATE TABLE IF NOT EXISTS `toa_rewards` (
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `toa_seal`
--

CREATE TABLE IF NOT EXISTS `toa_seal` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `sealurl` varchar(255) DEFAULT NULL,
  `sealtitle` varchar(255) DEFAULT NULL,
  `uid` varchar(16) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `unionid` varchar(16) NOT NULL,
  `sealtype` varchar(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `toa_session`
--

CREATE TABLE IF NOT EXISTS `toa_session` (
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL DEFAULT '',
  `groupid` smallint(5) unsigned NOT NULL DEFAULT '3',
  `ip` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `toa_session`
--

INSERT INTO `toa_session` (`uid`, `username`, `password`, `groupid`, `ip`) VALUES
(1, 'admin', 'c15e65c67cdd02708b4268d868de897a', 1, 2130706433),
(2, 'yangke', '3a2fa9e8b532b3eb00f5a984985b492f', 3, 169321272);

-- --------------------------------------------------------

--
-- 表的结构 `toa_sms_receive`
--

CREATE TABLE IF NOT EXISTS `toa_sms_receive` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `toa_sms_receive`
--

INSERT INTO `toa_sms_receive` (`id`, `sendperson`, `date`, `content`, `receiveperson`, `type`, `smskey`, `readdate`, `sendid`, `online`) VALUES
(1, '1', '2016-08-27 11:52:51', '您有一条新的新闻需要阅读,请点击查看!<a href="admin.php?ac=news&fileurl=administrative&do=views&id=1&type=1">点击阅读>></a>', '', '2', '2', NULL, '1', '0'),
(2, '1', '2016-08-27 11:53:24', '您有一条新的公告需要阅读,请点击查看!<a href="admin.php?ac=news&fileurl=administrative&do=views&id=2&type=3">点击阅读>></a>', '', '2', '2', NULL, '2', '0'),
(3, '1', '2016-08-29 12:24:27', '消息测试', '1', '2', '2', NULL, '3', '1'),
(4, '2', '2016-09-03 11:20:23', 'hello~~\r\n超级大气、小清新、高仿福州户外网全手工div+css模板', '1', '2', '1', NULL, '4', '1');

-- --------------------------------------------------------

--
-- 表的结构 `toa_sms_send`
--

CREATE TABLE IF NOT EXISTS `toa_sms_send` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `receiveperson` text,
  `content` text,
  `uid` varchar(20) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `toa_sms_send`
--

INSERT INTO `toa_sms_send` (`id`, `receiveperson`, `content`, `uid`, `date`) VALUES
(1, '0', '您有一条新的新闻需要阅读,请点击查看!<a href="admin.php?ac=news&fileurl=administrative&do=views&id=1&type=1">点击阅读>></a>', '1', '2016-08-27 11:52:51'),
(2, '0', '您有一条新的公告需要阅读,请点击查看!<a href="admin.php?ac=news&fileurl=administrative&do=views&id=2&type=3">点击阅读>></a>', '1', '2016-08-27 11:53:24'),
(3, '管理员', '消息测试', '1', '2016-08-29 12:24:27'),
(4, '管理员', 'hello~~\r\n超级大气、小清新、高仿福州户外网全手工div+css模板', '2', '2016-09-03 11:20:23');

-- --------------------------------------------------------

--
-- 表的结构 `toa_training`
--

CREATE TABLE IF NOT EXISTS `toa_training` (
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `toa_training_record`
--

CREATE TABLE IF NOT EXISTS `toa_training_record` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` text,
  `trainingid` varchar(20) DEFAULT NULL,
  `price` varchar(60) DEFAULT NULL,
  `organization` varchar(255) DEFAULT NULL,
  `training` varchar(30) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `uid` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `toa_upload`
--

CREATE TABLE IF NOT EXISTS `toa_upload` (
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `toa_user`
--

CREATE TABLE IF NOT EXISTS `toa_user` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `toa_user`
--

INSERT INTO `toa_user` (`id`, `username`, `password`, `departmentid`, `flag`, `date`, `ischeck`, `userkey`, `groupid`, `positionid`, `loginip`, `online`, `keytype`, `keytypeuser`, `numbers`) VALUES
(1, 'admin', '20a9e23a326bf90c53d49445eaf0f3fe', '0', '1', '2016-08-27 04:41:23', '1', NULL, '1', '0', '', '1', '', '', 999),
(2, 'yangke', 'd3a366ae17bfad46f574797ac33ff83b', '1', NULL, '2016-09-03 11:19:30', '1', NULL, '3', '0', '', '0', NULL, NULL, 999);

-- --------------------------------------------------------

--
-- 表的结构 `toa_usergroup`
--

CREATE TABLE IF NOT EXISTS `toa_usergroup` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `groupname` varchar(100) NOT NULL,
  `purview` text NOT NULL,
  `type` enum('system','user') NOT NULL DEFAULT 'user',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `toa_usergroup`
--

INSERT INTO `toa_usergroup` (`id`, `groupname`, `purview`, `type`) VALUES
(1, '系统管理组', 'a:142:{s:11:"department_";s:1:"1";s:9:"position_";s:1:"1";s:10:"config_inc";s:1:"1";s:16:"config_usergroup";s:1:"1";s:25:"config_usergroup_Increase";s:1:"1";s:21:"config_usergroup_edit";s:1:"1";s:23:"config_usergroup_delete";s:1:"1";s:11:"config_user";s:1:"1";s:20:"config_user_Increase";s:1:"1";s:16:"config_user_edit";s:1:"1";s:18:"config_user_delete";s:1:"1";s:10:"config_log";s:1:"1";s:17:"config_log_delete";s:1:"1";s:9:"config_db";s:1:"1";s:13:"config_db_old";s:1:"1";s:11:"config_menu";s:1:"1";s:15:"config_keytable";s:1:"1";s:11:"office_info";s:1:"1";s:20:"office_info_Increase";s:1:"1";s:18:"office_info_delete";s:1:"1";s:10:"office_sms";s:1:"1";s:19:"office_sms_Increase";s:1:"1";s:15:"office_sms_read";s:1:"1";s:17:"office_sms_delete";s:1:"1";s:18:"office_sms_channel";s:1:"1";s:13:"date_workdate";s:1:"1";s:22:"date_workdate_Increase";s:1:"1";s:18:"date_workdate_edit";s:1:"1";s:20:"date_workdate_delete";s:1:"1";s:9:"date_blog";s:1:"1";s:18:"date_blog_Increase";s:1:"1";s:14:"date_blog_edit";s:1:"1";s:16:"date_blog_delete";s:1:"1";s:9:"date_plan";s:1:"1";s:18:"date_plan_Increase";s:1:"1";s:14:"date_plan_edit";s:1:"1";s:16:"date_plan_delete";s:1:"1";s:20:"office_communication";s:1:"1";s:29:"office_communication_Increase";s:1:"1";s:25:"office_communication_edit";s:1:"1";s:27:"office_communication_delete";s:1:"1";s:17:"office_document_1";s:1:"1";s:26:"office_document_Increase_1";s:1:"1";s:22:"office_document_edit_1";s:1:"1";s:24:"office_document_delete_1";s:1:"1";s:22:"office_document_type_1";s:1:"1";s:11:"office_duty";s:1:"1";s:15:"office_duty_add";s:1:"1";s:16:"office_duty_reda";s:1:"1";s:15:"office_duty_sum";s:1:"1";s:20:"istration_conference";s:1:"1";s:29:"istration_conference_Increase";s:1:"1";s:25:"istration_conference_edit";s:1:"1";s:27:"istration_conference_delete";s:1:"1";s:29:"istration_conference_type_sce";s:1:"1";s:30:"istration_conference_type_type";s:1:"1";s:14:"news_chronicle";s:1:"1";s:23:"news_chronicle_Increase";s:1:"1";s:19:"news_chronicle_edit";s:1:"1";s:21:"news_chronicle_delete";s:1:"1";s:19:"news_chronicle_type";s:1:"1";s:8:"news_new";s:1:"1";s:17:"news_new_Increase";s:1:"1";s:13:"news_new_edit";s:1:"1";s:15:"news_new_delete";s:1:"1";s:13:"news_new_type";s:1:"1";s:11:"news_notice";s:1:"1";s:20:"news_notice_Increase";s:1:"1";s:16:"news_notice_edit";s:1:"1";s:18:"news_notice_delete";s:1:"1";s:16:"news_notice_type";s:1:"1";s:11:"news_cement";s:1:"1";s:20:"news_cement_Increase";s:1:"1";s:16:"news_cement_edit";s:1:"1";s:18:"news_cement_delete";s:1:"1";s:16:"news_cement_type";s:1:"1";s:9:"training_";s:1:"1";s:15:"training_record";s:1:"1";s:8:"rewards_";s:1:"1";s:13:"registration_";s:1:"1";s:18:"registration_excel";s:1:"1";s:14:"humancontract_";s:1:"1";s:15:"humancontract_i";s:1:"1";s:15:"humancontract_e";s:1:"1";s:15:"humancontract_d";s:1:"1";s:13:"office_type_r";s:1:"1";s:18:"knowledge_Increase";s:1:"1";s:14:"knowledge_read";s:1:"1";s:16:"knowledge_delete";s:1:"1";s:17:"office_document_4";s:1:"1";s:26:"office_document_Increase_4";s:1:"1";s:22:"office_document_edit_4";s:1:"1";s:24:"office_document_delete_4";s:1:"1";s:22:"office_document_type_4";s:1:"1";s:17:"office_document_5";s:1:"1";s:26:"office_document_Increase_5";s:1:"1";s:22:"office_document_edit_5";s:1:"1";s:24:"office_document_delete_5";s:1:"1";s:22:"office_document_type_5";s:1:"1";s:15:"news_periodical";s:1:"1";s:24:"news_periodical_Increase";s:1:"1";s:20:"news_periodical_edit";s:1:"1";s:22:"news_periodical_delete";s:1:"1";s:20:"news_periodical_type";s:1:"1";s:17:"office_document_2";s:1:"1";s:26:"office_document_Increase_2";s:1:"1";s:22:"office_document_edit_2";s:1:"1";s:24:"office_document_delete_2";s:1:"1";s:22:"office_document_type_2";s:1:"1";s:17:"office_document_3";s:1:"1";s:26:"office_document_Increase_3";s:1:"1";s:22:"office_document_edit_3";s:1:"1";s:24:"office_document_delete_3";s:1:"1";s:22:"office_document_type_3";s:1:"1";s:17:"office_document_6";s:1:"1";s:26:"office_document_Increase_6";s:1:"1";s:22:"office_document_edit_6";s:1:"1";s:24:"office_document_delete_6";s:1:"1";s:22:"office_document_type_6";s:1:"1";s:7:"bbs_add";s:1:"1";s:8:"bbs_edit";s:1:"1";s:7:"bbs_key";s:1:"1";s:4:"bbs_";s:1:"1";s:9:"bbsclass_";s:1:"1";s:10:"bbs_delete";s:1:"1";s:4:"app_";s:1:"1";s:7:"app_add";s:1:"1";s:7:"excel_1";s:1:"1";s:7:"excel_2";s:1:"1";s:7:"excel_3";s:1:"1";s:7:"excel_4";s:1:"1";s:7:"excel_5";s:1:"1";s:7:"excel_6";s:1:"1";s:7:"excel_7";s:1:"1";s:7:"excel_8";s:1:"1";s:8:"excel_41";s:1:"0";s:8:"excel_25";s:1:"1";s:8:"excel_30";s:1:"1";s:8:"excel_31";s:1:"1";s:8:"excel_32";s:1:"1";s:8:"excel_39";s:1:"1";s:8:"excel_40";s:1:"1";}', 'system'),
(2, '管理组', 'a:134:{s:11:"department_";s:1:"0";s:9:"position_";s:1:"0";s:10:"config_inc";s:1:"0";s:16:"config_usergroup";s:1:"0";s:11:"config_user";s:1:"1";s:20:"config_user_Increase";s:1:"1";s:16:"config_user_edit";s:1:"1";s:10:"config_log";s:1:"0";s:11:"config_menu";s:1:"0";s:15:"config_keytable";s:1:"0";s:11:"office_info";s:1:"1";s:20:"office_info_Increase";s:1:"1";s:18:"office_info_delete";s:1:"1";s:10:"office_sms";s:1:"1";s:19:"office_sms_Increase";s:1:"1";s:15:"office_sms_read";s:1:"1";s:17:"office_sms_delete";s:1:"1";s:13:"date_workdate";s:1:"1";s:22:"date_workdate_Increase";s:1:"1";s:18:"date_workdate_edit";s:1:"1";s:20:"date_workdate_delete";s:1:"1";s:9:"date_blog";s:1:"1";s:18:"date_blog_Increase";s:1:"1";s:14:"date_blog_edit";s:1:"1";s:16:"date_blog_delete";s:1:"1";s:9:"date_plan";s:1:"1";s:18:"date_plan_Increase";s:1:"1";s:14:"date_plan_edit";s:1:"1";s:16:"date_plan_delete";s:1:"1";s:20:"office_communication";s:1:"1";s:29:"office_communication_Increase";s:1:"1";s:25:"office_communication_edit";s:1:"1";s:27:"office_communication_delete";s:1:"1";s:17:"office_document_1";s:1:"1";s:26:"office_document_Increase_1";s:1:"1";s:22:"office_document_edit_1";s:1:"1";s:24:"office_document_delete_1";s:1:"1";s:22:"office_document_type_1";s:1:"1";s:11:"office_duty";s:1:"1";s:15:"office_duty_add";s:1:"1";s:16:"office_duty_reda";s:1:"1";s:15:"office_duty_sum";s:1:"1";s:20:"istration_conference";s:1:"1";s:29:"istration_conference_Increase";s:1:"1";s:25:"istration_conference_edit";s:1:"1";s:27:"istration_conference_delete";s:1:"1";s:29:"istration_conference_type_sce";s:1:"1";s:30:"istration_conference_type_type";s:1:"1";s:14:"news_chronicle";s:1:"1";s:23:"news_chronicle_Increase";s:1:"1";s:19:"news_chronicle_edit";s:1:"1";s:21:"news_chronicle_delete";s:1:"1";s:19:"news_chronicle_type";s:1:"1";s:8:"news_new";s:1:"1";s:17:"news_new_Increase";s:1:"1";s:13:"news_new_edit";s:1:"1";s:15:"news_new_delete";s:1:"1";s:13:"news_new_type";s:1:"1";s:11:"news_notice";s:1:"1";s:20:"news_notice_Increase";s:1:"1";s:16:"news_notice_edit";s:1:"1";s:18:"news_notice_delete";s:1:"1";s:16:"news_notice_type";s:1:"1";s:11:"news_cement";s:1:"1";s:20:"news_cement_Increase";s:1:"1";s:16:"news_cement_edit";s:1:"1";s:18:"news_cement_delete";s:1:"1";s:16:"news_cement_type";s:1:"1";s:9:"training_";s:1:"1";s:15:"training_record";s:1:"1";s:8:"rewards_";s:1:"1";s:13:"registration_";s:1:"1";s:18:"registration_excel";s:1:"1";s:14:"humancontract_";s:1:"1";s:15:"humancontract_i";s:1:"1";s:15:"humancontract_e";s:1:"1";s:15:"humancontract_d";s:1:"1";s:13:"office_type_r";s:1:"1";s:18:"knowledge_Increase";s:1:"1";s:14:"knowledge_read";s:1:"1";s:16:"knowledge_delete";s:1:"1";s:17:"office_document_4";s:1:"1";s:26:"office_document_Increase_4";s:1:"1";s:22:"office_document_edit_4";s:1:"1";s:24:"office_document_delete_4";s:1:"1";s:22:"office_document_type_4";s:1:"1";s:17:"office_document_5";s:1:"1";s:26:"office_document_Increase_5";s:1:"1";s:22:"office_document_edit_5";s:1:"1";s:24:"office_document_delete_5";s:1:"1";s:22:"office_document_type_5";s:1:"1";s:15:"news_periodical";s:1:"1";s:24:"news_periodical_Increase";s:1:"1";s:20:"news_periodical_edit";s:1:"1";s:22:"news_periodical_delete";s:1:"1";s:20:"news_periodical_type";s:1:"1";s:17:"office_document_2";s:1:"1";s:26:"office_document_Increase_2";s:1:"1";s:22:"office_document_edit_2";s:1:"1";s:24:"office_document_delete_2";s:1:"1";s:22:"office_document_type_2";s:1:"1";s:17:"office_document_3";s:1:"1";s:26:"office_document_Increase_3";s:1:"1";s:22:"office_document_edit_3";s:1:"1";s:24:"office_document_delete_3";s:1:"1";s:22:"office_document_type_3";s:1:"1";s:17:"office_document_6";s:1:"1";s:26:"office_document_Increase_6";s:1:"1";s:22:"office_document_edit_6";s:1:"1";s:24:"office_document_delete_6";s:1:"1";s:22:"office_document_type_6";s:1:"1";s:7:"bbs_add";s:1:"1";s:8:"bbs_edit";s:1:"1";s:7:"bbs_key";s:1:"1";s:4:"bbs_";s:1:"1";s:9:"bbsclass_";s:1:"1";s:10:"bbs_delete";s:1:"1";s:4:"app_";s:1:"1";s:7:"app_add";s:1:"1";s:7:"excel_1";s:1:"1";s:7:"excel_2";s:1:"1";s:7:"excel_3";s:1:"1";s:7:"excel_4";s:1:"1";s:7:"excel_5";s:1:"1";s:7:"excel_6";s:1:"1";s:7:"excel_7";s:1:"1";s:7:"excel_8";s:1:"1";s:8:"excel_41";s:1:"0";s:8:"excel_25";s:1:"1";s:8:"excel_30";s:1:"1";s:8:"excel_31";s:1:"1";s:8:"excel_32";s:1:"1";s:8:"excel_39";s:1:"1";s:8:"excel_40";s:1:"1";}', 'system'),
(3, '用户组', 'a:82:{s:11:"department_";s:1:"0";s:9:"position_";s:1:"0";s:10:"config_inc";s:1:"0";s:16:"config_usergroup";s:1:"0";s:11:"config_user";s:1:"0";s:10:"config_log";s:1:"0";s:11:"config_menu";s:1:"0";s:15:"config_keytable";s:1:"0";s:11:"office_info";s:1:"1";s:20:"office_info_Increase";s:1:"1";s:10:"office_sms";s:1:"0";s:19:"office_sms_Increase";s:1:"1";s:15:"office_sms_read";s:1:"1";s:13:"date_workdate";s:1:"1";s:22:"date_workdate_Increase";s:1:"1";s:18:"date_workdate_edit";s:1:"1";s:9:"date_blog";s:1:"1";s:18:"date_blog_Increase";s:1:"1";s:14:"date_blog_edit";s:1:"1";s:9:"date_plan";s:1:"1";s:18:"date_plan_Increase";s:1:"1";s:14:"date_plan_edit";s:1:"1";s:20:"office_communication";s:1:"1";s:29:"office_communication_Increase";s:1:"1";s:25:"office_communication_edit";s:1:"1";s:17:"office_document_1";s:1:"1";s:26:"office_document_Increase_1";s:1:"1";s:22:"office_document_edit_1";s:1:"1";s:11:"office_duty";s:1:"1";s:15:"office_duty_add";s:1:"1";s:16:"office_duty_reda";s:1:"1";s:15:"office_duty_sum";s:1:"1";s:20:"istration_conference";s:1:"1";s:29:"istration_conference_Increase";s:1:"1";s:25:"istration_conference_edit";s:1:"1";s:14:"news_chronicle";s:1:"1";s:23:"news_chronicle_Increase";s:1:"1";s:19:"news_chronicle_edit";s:1:"1";s:8:"news_new";s:1:"1";s:17:"news_new_Increase";s:1:"1";s:13:"news_new_edit";s:1:"1";s:11:"news_notice";s:1:"1";s:20:"news_notice_Increase";s:1:"1";s:16:"news_notice_edit";s:1:"1";s:11:"news_cement";s:1:"1";s:20:"news_cement_Increase";s:1:"1";s:16:"news_cement_edit";s:1:"1";s:9:"training_";s:1:"1";s:15:"training_record";s:1:"1";s:8:"rewards_";s:1:"1";s:13:"registration_";s:1:"0";s:14:"humancontract_";s:1:"1";s:15:"humancontract_i";s:1:"1";s:15:"humancontract_e";s:1:"1";s:13:"office_type_r";s:1:"0";s:18:"knowledge_Increase";s:1:"1";s:14:"knowledge_read";s:1:"1";s:17:"office_document_4";s:1:"1";s:26:"office_document_Increase_4";s:1:"1";s:22:"office_document_edit_4";s:1:"1";s:17:"office_document_5";s:1:"1";s:26:"office_document_Increase_5";s:1:"1";s:22:"office_document_edit_5";s:1:"1";s:15:"news_periodical";s:1:"1";s:24:"news_periodical_Increase";s:1:"1";s:20:"news_periodical_edit";s:1:"1";s:17:"office_document_2";s:1:"1";s:26:"office_document_Increase_2";s:1:"1";s:22:"office_document_edit_2";s:1:"1";s:17:"office_document_3";s:1:"1";s:26:"office_document_Increase_3";s:1:"1";s:22:"office_document_edit_3";s:1:"1";s:17:"office_document_6";s:1:"1";s:26:"office_document_Increase_6";s:1:"1";s:22:"office_document_edit_6";s:1:"1";s:7:"bbs_add";s:1:"1";s:8:"bbs_edit";s:1:"1";s:7:"bbs_key";s:1:"1";s:4:"bbs_";s:1:"1";s:4:"app_";s:1:"1";s:7:"app_add";s:1:"1";s:8:"excel_41";s:1:"0";}', 'system');

-- --------------------------------------------------------

--
-- 表的结构 `toa_user_view`
--

CREATE TABLE IF NOT EXISTS `toa_user_view` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `toa_user_view`
--

INSERT INTO `toa_user_view` (`vid`, `name`, `uid`, `number`, `sex`, `birthdate`, `participationwork`, `tel`, `phone`, `fax`, `email`, `address`, `qq`, `contact`, `homemana`, `homebg`, `pic`, `home_txt`, `hometype`) VALUES
(1, '管理员', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'template/default/bg/01/3.jpg', NULL, '', NULL),
(2, '杨科', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `toa_web`
--

CREATE TABLE IF NOT EXISTS `toa_web` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(60) DEFAULT NULL,
  `weburl` varchar(120) DEFAULT NULL,
  `content` varchar(120) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `uid` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `toa_workdate`
--

CREATE TABLE IF NOT EXISTS `toa_workdate` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `toa_workdate`
--

INSERT INTO `toa_workdate` (`id`, `title`, `otype`, `startdate`, `enddate`, `content`, `date`, `type`, `uid`, `completiondate`) VALUES
(1, 'OA试运行', '', '2016-09-01 08:30:00', '2016-09-30 17:01:00', 'OA试运行', '2016-08-30 13:28:30', '公开', '1', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
