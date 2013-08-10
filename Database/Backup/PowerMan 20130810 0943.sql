-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.0.45-community-nt-log


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema powerman
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ powerman;
USE powerman;

--
-- Table structure for table `powerman`.`power_device`
--

DROP TABLE IF EXISTS `power_device`;
CREATE TABLE `power_device` (
  `id` int(11) NOT NULL,
  `device_type` varchar(255) default NULL,
  `description` varchar(255) default NULL,
  `ins_url` varchar(255) default NULL,
  `image_path` varchar(255) default NULL,
  `lock` tinyint(4) default NULL,
  `lock_time` time default NULL,
  `status` tinyint(4) default NULL,
  `created_by` int(11) default NULL,
  `created_on` datetime default NULL,
  `modified_by` int(11) default NULL,
  `modified_on` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `powerman`.`power_device`
--

/*!40000 ALTER TABLE `power_device` DISABLE KEYS */;
/*!40000 ALTER TABLE `power_device` ENABLE KEYS */;


--
-- Table structure for table `powerman`.`power_device_powerlog`
--

DROP TABLE IF EXISTS `power_device_powerlog`;
CREATE TABLE `power_device_powerlog` (
  `id` int(11) NOT NULL auto_increment,
  `pcon` double default NULL,
  `log_on` datetime default NULL,
  `log_user` varchar(10) default NULL,
  `device_id` varchar(100) default NULL,
  `mac` varchar(100) default NULL,
  `lock` tinyint(4) default NULL,
  `locktime` datetime default NULL,
  `status` tinyint(4) default NULL,
  `created_by` int(11) default NULL,
  `created_on` datetime default NULL,
  `modified_by` int(11) default NULL,
  `modified_on` datetime default NULL,
  `power_user_device_id` int(11) default NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_power_device_powerlog_power_user_device1_idx` (`power_user_device_id`)
) ENGINE=InnoDB AUTO_INCREMENT=270 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `powerman`.`power_device_powerlog`
--

/*!40000 ALTER TABLE `power_device_powerlog` DISABLE KEYS */;
INSERT INTO `power_device_powerlog` (`id`,`pcon`,`log_on`,`log_user`,`device_id`,`mac`,`lock`,`locktime`,`status`,`created_by`,`created_on`,`modified_by`,`modified_on`,`power_user_device_id`) VALUES 
 (98,711,'2013-08-06 13:00:50','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:29:51',NULL,NULL,NULL),
 (99,703,'2013-08-06 13:01:00','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:30:01',NULL,NULL,NULL),
 (100,721,'2013-08-06 13:01:10','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:30:11',NULL,NULL,NULL),
 (101,719,'2013-08-06 13:01:20','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:30:21',NULL,NULL,NULL),
 (102,728,'2013-08-06 13:01:30','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:30:31',NULL,NULL,NULL),
 (103,740,'2013-08-06 13:01:40','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:30:41',NULL,NULL,NULL),
 (104,726,'2013-08-06 13:01:50','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:30:51',NULL,NULL,NULL),
 (105,729,'2013-08-06 13:02:00','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:31:01',NULL,NULL,NULL);
INSERT INTO `power_device_powerlog` (`id`,`pcon`,`log_on`,`log_user`,`device_id`,`mac`,`lock`,`locktime`,`status`,`created_by`,`created_on`,`modified_by`,`modified_on`,`power_user_device_id`) VALUES 
 (106,738,'2013-08-06 13:02:10','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:31:11',NULL,NULL,NULL),
 (107,741,'2013-08-06 13:02:20','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:31:21',NULL,NULL,NULL),
 (108,718,'2013-08-06 13:02:30','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:31:31',NULL,NULL,NULL),
 (109,715,'2013-08-06 13:02:40','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:31:41',NULL,NULL,NULL),
 (110,702,'2013-08-06 13:02:50','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:31:51',NULL,NULL,NULL),
 (111,733,'2013-08-06 13:03:00','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:32:01',NULL,NULL,NULL),
 (112,730,'2013-08-06 13:03:10','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:32:11',NULL,NULL,NULL),
 (113,721,'2013-08-06 13:03:20','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:32:21',NULL,NULL,NULL);
INSERT INTO `power_device_powerlog` (`id`,`pcon`,`log_on`,`log_user`,`device_id`,`mac`,`lock`,`locktime`,`status`,`created_by`,`created_on`,`modified_by`,`modified_on`,`power_user_device_id`) VALUES 
 (114,713,'2013-08-06 13:03:30','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:32:31',NULL,NULL,NULL),
 (115,712,'2013-08-06 13:03:40','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:32:41',NULL,NULL,NULL),
 (116,717,'2013-08-06 13:03:50','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:32:51',NULL,NULL,NULL),
 (117,728,'2013-08-06 13:04:00','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:33:01',NULL,NULL,NULL),
 (118,734,'2013-08-06 13:04:10','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:33:11',NULL,NULL,NULL),
 (119,725,'2013-08-06 13:04:20','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:33:21',NULL,NULL,NULL),
 (120,733,'2013-08-06 13:04:30','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:33:31',NULL,NULL,NULL),
 (121,714,'2013-08-06 13:04:40','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:33:41',NULL,NULL,NULL);
INSERT INTO `power_device_powerlog` (`id`,`pcon`,`log_on`,`log_user`,`device_id`,`mac`,`lock`,`locktime`,`status`,`created_by`,`created_on`,`modified_by`,`modified_on`,`power_user_device_id`) VALUES 
 (122,716,'2013-08-06 13:04:50','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:33:51',NULL,NULL,NULL),
 (123,716,'2013-08-06 13:05:00','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:34:01',NULL,NULL,NULL),
 (124,717,'2013-08-06 13:05:10','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:34:11',NULL,NULL,NULL),
 (125,714,'2013-08-06 13:05:20','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:34:21',NULL,NULL,NULL),
 (126,723,'2013-08-06 13:05:30','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:34:31',NULL,NULL,NULL),
 (127,724,'2013-08-06 13:05:40','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:34:41',NULL,NULL,NULL),
 (128,720,'2013-08-06 13:05:50','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:34:51',NULL,NULL,NULL),
 (129,732,'2013-08-06 13:06:00','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:35:01',NULL,NULL,NULL);
INSERT INTO `power_device_powerlog` (`id`,`pcon`,`log_on`,`log_user`,`device_id`,`mac`,`lock`,`locktime`,`status`,`created_by`,`created_on`,`modified_by`,`modified_on`,`power_user_device_id`) VALUES 
 (130,725,'2013-08-06 13:06:10','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:35:11',NULL,NULL,NULL),
 (131,725,'2013-08-06 13:06:20','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:35:21',NULL,NULL,NULL),
 (132,720,'2013-08-06 13:06:30','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:35:31',NULL,NULL,NULL),
 (133,721,'2013-08-06 13:06:40','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:35:41',NULL,NULL,NULL),
 (134,715,'2013-08-06 13:06:50','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:35:51',NULL,NULL,NULL),
 (135,714,'2013-08-06 13:07:00','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:36:01',NULL,NULL,NULL),
 (136,718,'2013-08-06 13:07:10','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:36:11',NULL,NULL,NULL),
 (137,714,'2013-08-06 13:07:20','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:36:21',NULL,NULL,NULL);
INSERT INTO `power_device_powerlog` (`id`,`pcon`,`log_on`,`log_user`,`device_id`,`mac`,`lock`,`locktime`,`status`,`created_by`,`created_on`,`modified_by`,`modified_on`,`power_user_device_id`) VALUES 
 (138,719,'2013-08-06 13:07:30','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:36:31',NULL,NULL,NULL),
 (139,718,'2013-08-06 13:07:40','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:36:41',NULL,NULL,NULL),
 (140,721,'2013-08-06 13:07:50','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:36:51',NULL,NULL,NULL),
 (141,710,'2013-08-06 13:08:00','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:37:01',NULL,NULL,NULL),
 (142,710,'2013-08-06 13:08:10','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:37:11',NULL,NULL,NULL),
 (143,722,'2013-08-06 13:08:20','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:37:21',NULL,NULL,NULL),
 (144,729,'2013-08-06 13:08:30','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:37:31',NULL,NULL,NULL),
 (145,740,'2013-08-06 13:08:40','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:37:41',NULL,NULL,NULL);
INSERT INTO `power_device_powerlog` (`id`,`pcon`,`log_on`,`log_user`,`device_id`,`mac`,`lock`,`locktime`,`status`,`created_by`,`created_on`,`modified_by`,`modified_on`,`power_user_device_id`) VALUES 
 (146,740,'2013-08-06 13:08:50','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:37:51',NULL,NULL,NULL),
 (147,721,'2013-08-06 13:09:00','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:38:01',NULL,NULL,NULL),
 (148,727,'2013-08-06 13:09:10','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:38:11',NULL,NULL,NULL),
 (149,709,'2013-08-06 13:09:20','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:38:21',NULL,NULL,NULL),
 (150,720,'2013-08-06 13:09:30','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:38:31',NULL,NULL,NULL),
 (151,705,'2013-08-06 13:09:40','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:38:41',NULL,NULL,NULL),
 (152,702,'2013-08-06 13:09:50','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:38:51',NULL,NULL,NULL),
 (153,703,'2013-08-06 13:10:00','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:39:01',NULL,NULL,NULL);
INSERT INTO `power_device_powerlog` (`id`,`pcon`,`log_on`,`log_user`,`device_id`,`mac`,`lock`,`locktime`,`status`,`created_by`,`created_on`,`modified_by`,`modified_on`,`power_user_device_id`) VALUES 
 (154,706,'2013-08-06 13:10:10','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:39:11',NULL,NULL,NULL),
 (155,720,'2013-08-06 13:10:20','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:39:21',NULL,NULL,NULL),
 (156,722,'2013-08-06 13:10:30','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:39:31',NULL,NULL,NULL),
 (157,711,'2013-08-06 13:10:40','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:39:41',NULL,NULL,NULL),
 (158,703,'2013-08-06 13:10:50','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:39:51',NULL,NULL,NULL),
 (159,688,'2013-08-06 13:11:00','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:40:01',NULL,NULL,NULL),
 (160,717,'2013-08-06 13:11:10','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:40:11',NULL,NULL,NULL),
 (161,715,'2013-08-06 13:11:20','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:40:21',NULL,NULL,NULL);
INSERT INTO `power_device_powerlog` (`id`,`pcon`,`log_on`,`log_user`,`device_id`,`mac`,`lock`,`locktime`,`status`,`created_by`,`created_on`,`modified_by`,`modified_on`,`power_user_device_id`) VALUES 
 (162,707,'2013-08-06 13:11:30','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:40:31',NULL,NULL,NULL),
 (163,715,'2013-08-06 13:11:40','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:40:41',NULL,NULL,NULL),
 (164,717,'2013-08-06 13:11:50','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:40:51',NULL,NULL,NULL),
 (165,713,'2013-08-06 13:12:00','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:41:01',NULL,NULL,NULL),
 (166,713,'2013-08-06 13:12:10','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:41:11',NULL,NULL,NULL),
 (167,724,'2013-08-06 13:12:20','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:41:21',NULL,NULL,NULL),
 (168,724,'2013-08-06 13:12:30','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:41:31',NULL,NULL,NULL),
 (169,736,'2013-08-06 13:12:40','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:41:41',NULL,NULL,NULL);
INSERT INTO `power_device_powerlog` (`id`,`pcon`,`log_on`,`log_user`,`device_id`,`mac`,`lock`,`locktime`,`status`,`created_by`,`created_on`,`modified_by`,`modified_on`,`power_user_device_id`) VALUES 
 (170,734,'2013-08-06 13:12:50','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:41:51',NULL,NULL,NULL),
 (171,731,'2013-08-06 13:13:00','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:42:01',NULL,NULL,NULL),
 (172,728,'2013-08-06 13:13:10','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:42:11',NULL,NULL,NULL),
 (173,736,'2013-08-06 13:13:20','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:42:21',NULL,NULL,NULL),
 (174,732,'2013-08-06 13:13:30','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:42:31',NULL,NULL,NULL),
 (175,738,'2013-08-06 13:13:40','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:42:41',NULL,NULL,NULL),
 (176,739,'2013-08-06 13:13:50','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:42:51',NULL,NULL,NULL),
 (177,710,'2013-08-06 13:14:00','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:43:01',NULL,NULL,NULL);
INSERT INTO `power_device_powerlog` (`id`,`pcon`,`log_on`,`log_user`,`device_id`,`mac`,`lock`,`locktime`,`status`,`created_by`,`created_on`,`modified_by`,`modified_on`,`power_user_device_id`) VALUES 
 (178,732,'2013-08-06 13:14:10','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:43:11',NULL,NULL,NULL),
 (179,735,'2013-08-06 13:14:20','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:43:21',NULL,NULL,NULL),
 (180,736,'2013-08-06 13:14:30','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:43:31',NULL,NULL,NULL),
 (181,741,'2013-08-06 13:14:40','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:43:41',NULL,NULL,NULL),
 (182,710,'2013-08-06 13:14:50','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:43:51',NULL,NULL,NULL),
 (183,714,'2013-08-06 13:15:00','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:44:01',NULL,NULL,NULL),
 (184,693,'2013-08-06 13:15:10','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:44:11',NULL,NULL,NULL),
 (185,708,'2013-08-06 13:15:20','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:44:21',NULL,NULL,NULL);
INSERT INTO `power_device_powerlog` (`id`,`pcon`,`log_on`,`log_user`,`device_id`,`mac`,`lock`,`locktime`,`status`,`created_by`,`created_on`,`modified_by`,`modified_on`,`power_user_device_id`) VALUES 
 (186,716,'2013-08-06 13:15:30','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:44:31',NULL,NULL,NULL),
 (187,728,'2013-08-06 13:15:40','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:44:41',NULL,NULL,NULL),
 (188,715,'2013-08-06 13:15:50','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:44:51',NULL,NULL,NULL),
 (189,708,'2013-08-06 13:16:00','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:45:01',NULL,NULL,NULL),
 (190,716,'2013-08-06 13:16:10','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:45:11',NULL,NULL,NULL),
 (191,710,'2013-08-06 13:16:20','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:45:21',NULL,NULL,NULL),
 (192,706,'2013-08-06 13:16:30','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:45:31',NULL,NULL,NULL),
 (193,710,'2013-08-06 13:16:40','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:45:41',NULL,NULL,NULL);
INSERT INTO `power_device_powerlog` (`id`,`pcon`,`log_on`,`log_user`,`device_id`,`mac`,`lock`,`locktime`,`status`,`created_by`,`created_on`,`modified_by`,`modified_on`,`power_user_device_id`) VALUES 
 (194,707,'2013-08-06 13:16:50','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:45:51',NULL,NULL,NULL),
 (195,689,'2013-08-06 13:17:00','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:46:01',NULL,NULL,NULL),
 (196,713,'2013-08-06 13:17:10','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:46:11',NULL,NULL,NULL),
 (197,721,'2013-08-06 13:17:20','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:46:21',NULL,NULL,NULL),
 (198,708,'2013-08-06 13:17:30','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:46:31',NULL,NULL,NULL),
 (199,714,'2013-08-06 13:17:40','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:46:41',NULL,NULL,NULL),
 (200,722,'2013-08-06 13:17:50','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:46:51',NULL,NULL,NULL),
 (201,712,'2013-08-06 13:18:00','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:47:01',NULL,NULL,NULL);
INSERT INTO `power_device_powerlog` (`id`,`pcon`,`log_on`,`log_user`,`device_id`,`mac`,`lock`,`locktime`,`status`,`created_by`,`created_on`,`modified_by`,`modified_on`,`power_user_device_id`) VALUES 
 (202,707,'2013-08-06 13:18:10','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:47:11',NULL,NULL,NULL),
 (203,721,'2013-08-06 13:18:20','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:47:21',NULL,NULL,NULL),
 (204,719,'2013-08-06 13:18:30','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:47:31',NULL,NULL,NULL),
 (205,716,'2013-08-06 13:18:40','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:47:41',NULL,NULL,NULL),
 (206,709,'2013-08-06 13:18:50','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:47:51',NULL,NULL,NULL),
 (207,703,'2013-08-06 13:19:00','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:48:01',NULL,NULL,NULL),
 (208,704,'2013-08-06 13:19:10','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:48:11',NULL,NULL,NULL),
 (209,712,'2013-08-06 13:19:20','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:48:21',NULL,NULL,NULL);
INSERT INTO `power_device_powerlog` (`id`,`pcon`,`log_on`,`log_user`,`device_id`,`mac`,`lock`,`locktime`,`status`,`created_by`,`created_on`,`modified_by`,`modified_on`,`power_user_device_id`) VALUES 
 (210,708,'2013-08-06 13:19:30','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:48:31',NULL,NULL,NULL),
 (211,706,'2013-08-06 13:19:40','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:48:41',NULL,NULL,NULL),
 (212,704,'2013-08-06 13:19:50','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:48:51',NULL,NULL,NULL),
 (213,714,'2013-08-06 13:20:00','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:49:01',NULL,NULL,NULL),
 (214,717,'2013-08-06 13:20:10','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:49:11',NULL,NULL,NULL),
 (215,719,'2013-08-06 13:20:20','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:49:21',NULL,NULL,NULL),
 (216,722,'2013-08-06 13:20:30','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:49:31',NULL,NULL,NULL),
 (217,727,'2013-08-06 13:20:40','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:49:41',NULL,NULL,NULL);
INSERT INTO `power_device_powerlog` (`id`,`pcon`,`log_on`,`log_user`,`device_id`,`mac`,`lock`,`locktime`,`status`,`created_by`,`created_on`,`modified_by`,`modified_on`,`power_user_device_id`) VALUES 
 (218,738,'2013-08-06 13:20:50','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:49:51',NULL,NULL,NULL),
 (219,717,'2013-08-06 13:21:00','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:50:01',NULL,NULL,NULL),
 (220,710,'2013-08-06 13:21:10','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:50:11',NULL,NULL,NULL),
 (221,698,'2013-08-06 13:21:20','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:50:21',NULL,NULL,NULL),
 (222,698,'2013-08-06 13:21:30','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:50:31',NULL,NULL,NULL),
 (223,708,'2013-08-06 13:21:40','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:50:41',NULL,NULL,NULL),
 (224,713,'2013-08-06 13:21:50','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:50:51',NULL,NULL,NULL),
 (225,733,'2013-08-06 13:22:00','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:51:01',NULL,NULL,NULL);
INSERT INTO `power_device_powerlog` (`id`,`pcon`,`log_on`,`log_user`,`device_id`,`mac`,`lock`,`locktime`,`status`,`created_by`,`created_on`,`modified_by`,`modified_on`,`power_user_device_id`) VALUES 
 (226,725,'2013-08-06 13:22:10','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:51:11',NULL,NULL,NULL),
 (227,730,'2013-08-06 13:22:20','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:51:21',NULL,NULL,NULL),
 (228,737,'2013-08-06 13:22:30','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:51:31',NULL,NULL,NULL),
 (229,738,'2013-08-06 13:22:40','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:51:41',NULL,NULL,NULL),
 (230,716,'2013-08-06 13:22:50','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:51:51',NULL,NULL,NULL),
 (231,723,'2013-08-06 13:23:00','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:52:01',NULL,NULL,NULL),
 (232,702,'2013-08-06 13:23:10','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:52:11',NULL,NULL,NULL),
 (233,710,'2013-08-06 13:23:20','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:52:21',NULL,NULL,NULL);
INSERT INTO `power_device_powerlog` (`id`,`pcon`,`log_on`,`log_user`,`device_id`,`mac`,`lock`,`locktime`,`status`,`created_by`,`created_on`,`modified_by`,`modified_on`,`power_user_device_id`) VALUES 
 (234,705,'2013-08-06 13:23:30','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:52:31',NULL,NULL,NULL),
 (235,699,'2013-08-06 13:23:40','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:52:41',NULL,NULL,NULL),
 (236,706,'2013-08-06 13:23:50','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:52:51',NULL,NULL,NULL),
 (237,708,'2013-08-06 13:24:00','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:53:01',NULL,NULL,NULL),
 (238,706,'2013-08-06 13:24:10','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:53:11',NULL,NULL,NULL),
 (239,716,'2013-08-06 13:24:20','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:53:21',NULL,NULL,NULL),
 (240,719,'2013-08-06 13:24:30','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:53:31',NULL,NULL,NULL),
 (241,733,'2013-08-06 13:24:40','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:53:41',NULL,NULL,NULL);
INSERT INTO `power_device_powerlog` (`id`,`pcon`,`log_on`,`log_user`,`device_id`,`mac`,`lock`,`locktime`,`status`,`created_by`,`created_on`,`modified_by`,`modified_on`,`power_user_device_id`) VALUES 
 (242,722,'2013-08-06 13:24:50','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:53:51',NULL,NULL,NULL),
 (243,742,'2013-08-06 13:25:00','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:54:01',NULL,NULL,NULL),
 (244,736,'2013-08-06 13:25:10','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:54:11',NULL,NULL,NULL),
 (245,728,'2013-08-06 13:25:20','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:54:21',NULL,NULL,NULL),
 (246,727,'2013-08-06 13:25:30','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:54:31',NULL,NULL,NULL),
 (247,708,'2013-08-06 13:25:40','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:54:41',NULL,NULL,NULL),
 (248,719,'2013-08-06 13:25:50','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:54:51',NULL,NULL,NULL),
 (249,714,'2013-08-06 13:26:00','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:55:01',NULL,NULL,NULL);
INSERT INTO `power_device_powerlog` (`id`,`pcon`,`log_on`,`log_user`,`device_id`,`mac`,`lock`,`locktime`,`status`,`created_by`,`created_on`,`modified_by`,`modified_on`,`power_user_device_id`) VALUES 
 (250,723,'2013-08-06 13:26:10','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:55:11',NULL,NULL,NULL),
 (251,725,'2013-08-06 13:26:20','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:55:21',NULL,NULL,NULL),
 (252,722,'2013-08-06 13:26:30','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:55:31',NULL,NULL,NULL),
 (253,716,'2013-08-06 13:26:40','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:55:41',NULL,NULL,NULL),
 (254,709,'2013-08-06 13:26:50','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:55:51',NULL,NULL,NULL),
 (255,706,'2013-08-06 13:27:00','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:56:01',NULL,NULL,NULL),
 (256,718,'2013-08-06 13:27:10','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:56:11',NULL,NULL,NULL),
 (257,727,'2013-08-06 13:27:20','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:56:21',NULL,NULL,NULL);
INSERT INTO `power_device_powerlog` (`id`,`pcon`,`log_on`,`log_user`,`device_id`,`mac`,`lock`,`locktime`,`status`,`created_by`,`created_on`,`modified_by`,`modified_on`,`power_user_device_id`) VALUES 
 (258,720,'2013-08-06 13:27:30','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:56:31',NULL,NULL,NULL),
 (259,733,'2013-08-06 13:27:40','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:56:41',NULL,NULL,NULL),
 (260,726,'2013-08-06 13:27:50','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:56:51',NULL,NULL,NULL),
 (261,736,'2013-08-06 13:28:00','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:57:01',NULL,NULL,NULL),
 (262,741,'2013-08-06 13:28:10','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:57:11',NULL,NULL,NULL),
 (263,720,'2013-08-06 13:28:20','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:57:21',NULL,NULL,NULL),
 (264,719,'2013-08-06 13:28:30','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:57:31',NULL,NULL,NULL),
 (265,710,'2013-08-06 13:28:40','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:57:41',NULL,NULL,NULL);
INSERT INTO `power_device_powerlog` (`id`,`pcon`,`log_on`,`log_user`,`device_id`,`mac`,`lock`,`locktime`,`status`,`created_by`,`created_on`,`modified_by`,`modified_on`,`power_user_device_id`) VALUES 
 (266,709,'2013-08-06 13:28:50','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:57:51',NULL,NULL,NULL),
 (267,719,'2013-08-06 13:29:00','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:58:01',NULL,NULL,NULL),
 (268,729,'2013-08-06 13:29:10','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:58:11',NULL,NULL,NULL),
 (269,702,'2013-08-06 13:29:20','s1','SES001','0004A3CCC9F9',NULL,NULL,NULL,10,'2013-08-06 13:58:21',NULL,NULL,NULL);
/*!40000 ALTER TABLE `power_device_powerlog` ENABLE KEYS */;


--
-- Table structure for table `powerman`.`power_images`
--

DROP TABLE IF EXISTS `power_images`;
CREATE TABLE `power_images` (
  `id` int(11) NOT NULL,
  `description` varchar(255) default NULL,
  `path` varchar(255) default NULL,
  `category` tinyint(4) default NULL,
  `status` tinyint(4) default NULL,
  `created_by` int(11) default NULL,
  `created_on` datetime default NULL,
  `modified_by` int(11) default NULL,
  `modified_on` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `powerman`.`power_images`
--

/*!40000 ALTER TABLE `power_images` DISABLE KEYS */;
/*!40000 ALTER TABLE `power_images` ENABLE KEYS */;


--
-- Table structure for table `powerman`.`power_packges`
--

DROP TABLE IF EXISTS `power_packges`;
CREATE TABLE `power_packges` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) default NULL,
  `description` varchar(255) default NULL,
  `sms_amount` int(11) default NULL,
  `duration` int(11) default NULL,
  `expire_duration` datetime default NULL,
  `lock` tinyint(4) default NULL,
  `lock_time` time default NULL,
  `status` tinyint(4) default NULL,
  `created_by` int(11) default NULL,
  `created_on` datetime default NULL,
  `modified_by` int(11) default NULL,
  `modified_on` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `powerman`.`power_packges`
--

/*!40000 ALTER TABLE `power_packges` DISABLE KEYS */;
/*!40000 ALTER TABLE `power_packges` ENABLE KEYS */;


--
-- Table structure for table `powerman`.`power_roles`
--

DROP TABLE IF EXISTS `power_roles`;
CREATE TABLE `power_roles` (
  `id` int(11) NOT NULL auto_increment,
  `role_type` varchar(255) default NULL,
  `description` varchar(255) default NULL,
  `lock` tinyint(4) default NULL,
  `lock_time` time default NULL,
  `status` tinyint(4) default NULL,
  `created_by` int(11) default NULL,
  `created_on` datetime default NULL,
  `modified_by` int(11) default NULL,
  `modified_on` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `powerman`.`power_roles`
--

/*!40000 ALTER TABLE `power_roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `power_roles` ENABLE KEYS */;


--
-- Table structure for table `powerman`.`power_schedule`
--

DROP TABLE IF EXISTS `power_schedule`;
CREATE TABLE `power_schedule` (
  `id` int(11) NOT NULL auto_increment,
  `device_id` int(11) default NULL,
  `subdevice_id` int(11) default NULL,
  `triggerstart_time` datetime default NULL,
  `triggerend_time` datetime default NULL,
  `trigger_duration` double default NULL,
  `lock` tinyint(4) default NULL,
  `locktime` time default NULL,
  `status` tinyint(4) default NULL,
  `workstatus` tinyint(4) default NULL,
  `created_by` int(11) default NULL,
  `created_on` datetime default NULL,
  `modified_by` int(11) default NULL,
  `modified_on` datetime default NULL,
  `power_users_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`,`power_users_id`),
  KEY `fk_power_schedule_power_users1_idx` (`power_users_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `powerman`.`power_schedule`
--

/*!40000 ALTER TABLE `power_schedule` DISABLE KEYS */;
/*!40000 ALTER TABLE `power_schedule` ENABLE KEYS */;


--
-- Table structure for table `powerman`.`power_subdevice_control`
--

DROP TABLE IF EXISTS `power_subdevice_control`;
CREATE TABLE `power_subdevice_control` (
  `id` int(11) NOT NULL auto_increment,
  `control_status` tinyint(4) default NULL,
  `control_on` datetime default NULL,
  `lock` tinyint(4) default NULL,
  `status` tinyint(4) default NULL,
  `created_by` int(11) default NULL,
  `created_on` datetime default NULL,
  `modified_by` int(11) default NULL,
  `modified_on` datetime default NULL,
  `device_id` varchar(100) default NULL,
  `power_user_subdevices_id` int(11) default NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_power_subdevice_control_power_user_subdevices1_idx` (`power_user_subdevices_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `powerman`.`power_subdevice_control`
--

/*!40000 ALTER TABLE `power_subdevice_control` DISABLE KEYS */;
INSERT INTO `power_subdevice_control` (`id`,`control_status`,`control_on`,`lock`,`status`,`created_by`,`created_on`,`modified_by`,`modified_on`,`device_id`,`power_user_subdevices_id`) VALUES 
 (1,1,'2013-08-04 18:24:03',NULL,NULL,1,'2013-08-04 18:24:19',NULL,NULL,'48575E6E',NULL),
 (2,3,'2013-08-04 17:24:42',NULL,NULL,1,'2013-08-04 18:24:51',NULL,NULL,'1A247C62',NULL),
 (3,1,'2013-08-06 06:18:55',NULL,NULL,1,'2013-08-06 06:19:04',NULL,NULL,'51731376',NULL);
/*!40000 ALTER TABLE `power_subdevice_control` ENABLE KEYS */;


--
-- Table structure for table `powerman`.`power_subdevice_powerlog`
--

DROP TABLE IF EXISTS `power_subdevice_powerlog`;
CREATE TABLE `power_subdevice_powerlog` (
  `id` int(11) NOT NULL auto_increment,
  `pcon` double(4,0) default NULL,
  `temp` double default NULL,
  `device_id` varchar(100) default NULL,
  `log_on` datetime default NULL,
  `log_user` varchar(10) default NULL,
  `control_status` tinyint(4) default NULL,
  `remark` varchar(255) default NULL,
  `lock` tinyint(4) default NULL,
  `locktime` time default NULL,
  `status` tinyint(4) default NULL,
  `created_on` datetime default NULL,
  `created_by` int(11) default NULL,
  `modified_on` datetime default NULL,
  `modified_by` int(11) default NULL,
  `power_user_subdevices_id` int(11) default NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_power_subdevice_log_power_user_subdevices1_idx` (`power_user_subdevices_id`)
) ENGINE=InnoDB AUTO_INCREMENT=739 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `powerman`.`power_subdevice_powerlog`
--

/*!40000 ALTER TABLE `power_subdevice_powerlog` DISABLE KEYS */;
INSERT INTO `power_subdevice_powerlog` (`id`,`pcon`,`temp`,`device_id`,`log_on`,`log_user`,`control_status`,`remark`,`lock`,`locktime`,`status`,`created_on`,`created_by`,`modified_on`,`modified_by`,`power_user_subdevices_id`) VALUES 
 (226,702,0,'48575E6E','2013-08-06 13:01:00','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:30:01',10,NULL,NULL,NULL),
 (227,0,0,'1A247C62','2013-08-06 13:01:00','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:30:01',10,NULL,NULL,NULL),
 (228,1,0,'51731376','2013-08-06 13:01:00','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:30:01',10,NULL,NULL,NULL),
 (229,721,0,'48575E6E','2013-08-06 13:01:10','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:30:11',10,NULL,NULL,NULL),
 (230,0,0,'1A247C62','2013-08-06 13:01:10','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:30:11',10,NULL,NULL,NULL),
 (231,0,0,'51731376','2013-08-06 13:01:10','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:30:11',10,NULL,NULL,NULL),
 (232,718,0,'48575E6E','2013-08-06 13:01:20','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:30:21',10,NULL,NULL,NULL),
 (233,0,0,'1A247C62','2013-08-06 13:01:20','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:30:21',10,NULL,NULL,NULL);
INSERT INTO `power_subdevice_powerlog` (`id`,`pcon`,`temp`,`device_id`,`log_on`,`log_user`,`control_status`,`remark`,`lock`,`locktime`,`status`,`created_on`,`created_by`,`modified_on`,`modified_by`,`power_user_subdevices_id`) VALUES 
 (234,1,0,'51731376','2013-08-06 13:01:20','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:30:21',10,NULL,NULL,NULL),
 (235,727,0,'48575E6E','2013-08-06 13:01:30','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:30:31',10,NULL,NULL,NULL),
 (236,0,0,'1A247C62','2013-08-06 13:01:30','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:30:31',10,NULL,NULL,NULL),
 (237,1,0,'51731376','2013-08-06 13:01:30','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:30:31',10,NULL,NULL,NULL),
 (238,739,0,'48575E6E','2013-08-06 13:01:40','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:30:41',10,NULL,NULL,NULL),
 (239,0,0,'1A247C62','2013-08-06 13:01:40','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:30:41',10,NULL,NULL,NULL),
 (240,1,0,'51731376','2013-08-06 13:01:40','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:30:41',10,NULL,NULL,NULL),
 (241,725,0,'48575E6E','2013-08-06 13:01:50','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:30:51',10,NULL,NULL,NULL);
INSERT INTO `power_subdevice_powerlog` (`id`,`pcon`,`temp`,`device_id`,`log_on`,`log_user`,`control_status`,`remark`,`lock`,`locktime`,`status`,`created_on`,`created_by`,`modified_on`,`modified_by`,`power_user_subdevices_id`) VALUES 
 (242,0,0,'1A247C62','2013-08-06 13:01:50','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:30:51',10,NULL,NULL,NULL),
 (243,1,0,'51731376','2013-08-06 13:01:50','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:30:51',10,NULL,NULL,NULL),
 (244,728,0,'48575E6E','2013-08-06 13:02:00','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:31:01',10,NULL,NULL,NULL),
 (245,0,0,'1A247C62','2013-08-06 13:02:00','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:31:01',10,NULL,NULL,NULL),
 (246,1,0,'51731376','2013-08-06 13:02:00','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:31:01',10,NULL,NULL,NULL),
 (247,737,0,'48575E6E','2013-08-06 13:02:10','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:31:11',10,NULL,NULL,NULL),
 (248,0,0,'1A247C62','2013-08-06 13:02:10','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:31:11',10,NULL,NULL,NULL),
 (249,1,0,'51731376','2013-08-06 13:02:10','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:31:11',10,NULL,NULL,NULL);
INSERT INTO `power_subdevice_powerlog` (`id`,`pcon`,`temp`,`device_id`,`log_on`,`log_user`,`control_status`,`remark`,`lock`,`locktime`,`status`,`created_on`,`created_by`,`modified_on`,`modified_by`,`power_user_subdevices_id`) VALUES 
 (250,740,0,'48575E6E','2013-08-06 13:02:20','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:31:21',10,NULL,NULL,NULL),
 (251,0,0,'1A247C62','2013-08-06 13:02:20','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:31:21',10,NULL,NULL,NULL),
 (252,1,0,'51731376','2013-08-06 13:02:20','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:31:21',10,NULL,NULL,NULL),
 (253,717,0,'48575E6E','2013-08-06 13:02:30','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:31:31',10,NULL,NULL,NULL),
 (254,0,0,'1A247C62','2013-08-06 13:02:30','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:31:31',10,NULL,NULL,NULL),
 (255,1,0,'51731376','2013-08-06 13:02:30','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:31:31',10,NULL,NULL,NULL),
 (256,714,0,'48575E6E','2013-08-06 13:02:40','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:31:41',10,NULL,NULL,NULL),
 (257,0,0,'1A247C62','2013-08-06 13:02:40','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:31:41',10,NULL,NULL,NULL);
INSERT INTO `power_subdevice_powerlog` (`id`,`pcon`,`temp`,`device_id`,`log_on`,`log_user`,`control_status`,`remark`,`lock`,`locktime`,`status`,`created_on`,`created_by`,`modified_on`,`modified_by`,`power_user_subdevices_id`) VALUES 
 (258,1,0,'51731376','2013-08-06 13:02:40','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:31:41',10,NULL,NULL,NULL),
 (259,702,0,'48575E6E','2013-08-06 13:02:50','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:31:51',10,NULL,NULL,NULL),
 (260,0,0,'1A247C62','2013-08-06 13:02:50','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:31:51',10,NULL,NULL,NULL),
 (261,0,0,'51731376','2013-08-06 13:02:50','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:31:51',10,NULL,NULL,NULL),
 (262,732,0,'48575E6E','2013-08-06 13:03:00','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:32:01',10,NULL,NULL,NULL),
 (263,0,0,'1A247C62','2013-08-06 13:03:00','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:32:01',10,NULL,NULL,NULL),
 (264,1,0,'51731376','2013-08-06 13:03:00','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:32:01',10,NULL,NULL,NULL),
 (265,729,0,'48575E6E','2013-08-06 13:03:10','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:32:11',10,NULL,NULL,NULL);
INSERT INTO `power_subdevice_powerlog` (`id`,`pcon`,`temp`,`device_id`,`log_on`,`log_user`,`control_status`,`remark`,`lock`,`locktime`,`status`,`created_on`,`created_by`,`modified_on`,`modified_by`,`power_user_subdevices_id`) VALUES 
 (266,0,0,'1A247C62','2013-08-06 13:03:10','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:32:11',10,NULL,NULL,NULL),
 (267,1,0,'51731376','2013-08-06 13:03:10','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:32:11',10,NULL,NULL,NULL),
 (268,720,0,'48575E6E','2013-08-06 13:03:20','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:32:21',10,NULL,NULL,NULL),
 (269,0,0,'1A247C62','2013-08-06 13:03:20','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:32:21',10,NULL,NULL,NULL),
 (270,1,0,'51731376','2013-08-06 13:03:20','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:32:21',10,NULL,NULL,NULL),
 (271,712,0,'48575E6E','2013-08-06 13:03:30','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:32:31',10,NULL,NULL,NULL),
 (272,0,0,'1A247C62','2013-08-06 13:03:30','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:32:31',10,NULL,NULL,NULL),
 (273,1,0,'51731376','2013-08-06 13:03:30','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:32:31',10,NULL,NULL,NULL);
INSERT INTO `power_subdevice_powerlog` (`id`,`pcon`,`temp`,`device_id`,`log_on`,`log_user`,`control_status`,`remark`,`lock`,`locktime`,`status`,`created_on`,`created_by`,`modified_on`,`modified_by`,`power_user_subdevices_id`) VALUES 
 (274,711,0,'48575E6E','2013-08-06 13:03:40','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:32:41',10,NULL,NULL,NULL),
 (275,0,0,'1A247C62','2013-08-06 13:03:40','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:32:41',10,NULL,NULL,NULL),
 (276,1,0,'51731376','2013-08-06 13:03:40','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:32:41',10,NULL,NULL,NULL),
 (277,716,0,'48575E6E','2013-08-06 13:03:50','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:32:51',10,NULL,NULL,NULL),
 (278,0,0,'1A247C62','2013-08-06 13:03:50','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:32:51',10,NULL,NULL,NULL),
 (279,1,0,'51731376','2013-08-06 13:03:50','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:32:51',10,NULL,NULL,NULL),
 (280,728,0,'48575E6E','2013-08-06 13:04:00','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:33:01',10,NULL,NULL,NULL),
 (281,0,0,'1A247C62','2013-08-06 13:04:00','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:33:01',10,NULL,NULL,NULL);
INSERT INTO `power_subdevice_powerlog` (`id`,`pcon`,`temp`,`device_id`,`log_on`,`log_user`,`control_status`,`remark`,`lock`,`locktime`,`status`,`created_on`,`created_by`,`modified_on`,`modified_by`,`power_user_subdevices_id`) VALUES 
 (282,0,0,'51731376','2013-08-06 13:04:00','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:33:01',10,NULL,NULL,NULL),
 (283,734,0,'48575E6E','2013-08-06 13:04:10','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:33:11',10,NULL,NULL,NULL),
 (284,0,0,'1A247C62','2013-08-06 13:04:10','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:33:11',10,NULL,NULL,NULL),
 (285,0,0,'51731376','2013-08-06 13:04:10','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:33:11',10,NULL,NULL,NULL),
 (286,725,0,'48575E6E','2013-08-06 13:04:20','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:33:21',10,NULL,NULL,NULL),
 (287,0,0,'1A247C62','2013-08-06 13:04:20','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:33:21',10,NULL,NULL,NULL),
 (288,0,0,'51731376','2013-08-06 13:04:20','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:33:21',10,NULL,NULL,NULL),
 (289,733,0,'48575E6E','2013-08-06 13:04:30','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:33:31',10,NULL,NULL,NULL);
INSERT INTO `power_subdevice_powerlog` (`id`,`pcon`,`temp`,`device_id`,`log_on`,`log_user`,`control_status`,`remark`,`lock`,`locktime`,`status`,`created_on`,`created_by`,`modified_on`,`modified_by`,`power_user_subdevices_id`) VALUES 
 (290,0,0,'1A247C62','2013-08-06 13:04:30','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:33:31',10,NULL,NULL,NULL),
 (291,0,0,'51731376','2013-08-06 13:04:30','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:33:31',10,NULL,NULL,NULL),
 (292,713,0,'48575E6E','2013-08-06 13:04:40','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:33:41',10,NULL,NULL,NULL),
 (293,0,0,'1A247C62','2013-08-06 13:04:40','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:33:41',10,NULL,NULL,NULL),
 (294,1,0,'51731376','2013-08-06 13:04:40','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:33:41',10,NULL,NULL,NULL),
 (295,716,0,'48575E6E','2013-08-06 13:04:50','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:33:51',10,NULL,NULL,NULL),
 (296,0,0,'1A247C62','2013-08-06 13:04:50','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:33:51',10,NULL,NULL,NULL),
 (297,0,0,'51731376','2013-08-06 13:04:50','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:33:51',10,NULL,NULL,NULL);
INSERT INTO `power_subdevice_powerlog` (`id`,`pcon`,`temp`,`device_id`,`log_on`,`log_user`,`control_status`,`remark`,`lock`,`locktime`,`status`,`created_on`,`created_by`,`modified_on`,`modified_by`,`power_user_subdevices_id`) VALUES 
 (298,716,0,'48575E6E','2013-08-06 13:05:00','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:34:01',10,NULL,NULL,NULL),
 (299,0,0,'1A247C62','2013-08-06 13:05:00','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:34:01',10,NULL,NULL,NULL),
 (300,0,0,'51731376','2013-08-06 13:05:00','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:34:01',10,NULL,NULL,NULL),
 (301,716,0,'48575E6E','2013-08-06 13:05:10','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:34:11',10,NULL,NULL,NULL),
 (302,0,0,'1A247C62','2013-08-06 13:05:10','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:34:11',10,NULL,NULL,NULL),
 (303,1,0,'51731376','2013-08-06 13:05:10','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:34:11',10,NULL,NULL,NULL),
 (304,714,0,'48575E6E','2013-08-06 13:05:20','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:34:21',10,NULL,NULL,NULL),
 (305,0,0,'1A247C62','2013-08-06 13:05:20','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:34:21',10,NULL,NULL,NULL);
INSERT INTO `power_subdevice_powerlog` (`id`,`pcon`,`temp`,`device_id`,`log_on`,`log_user`,`control_status`,`remark`,`lock`,`locktime`,`status`,`created_on`,`created_by`,`modified_on`,`modified_by`,`power_user_subdevices_id`) VALUES 
 (306,0,0,'51731376','2013-08-06 13:05:20','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:34:21',10,NULL,NULL,NULL),
 (307,722,0,'48575E6E','2013-08-06 13:05:30','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:34:31',10,NULL,NULL,NULL),
 (308,0,0,'1A247C62','2013-08-06 13:05:30','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:34:31',10,NULL,NULL,NULL),
 (309,1,0,'51731376','2013-08-06 13:05:30','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:34:31',10,NULL,NULL,NULL),
 (310,723,0,'48575E6E','2013-08-06 13:05:40','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:34:41',10,NULL,NULL,NULL),
 (311,0,0,'1A247C62','2013-08-06 13:05:40','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:34:41',10,NULL,NULL,NULL),
 (312,1,0,'51731376','2013-08-06 13:05:40','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:34:41',10,NULL,NULL,NULL),
 (313,719,0,'48575E6E','2013-08-06 13:05:50','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:34:51',10,NULL,NULL,NULL);
INSERT INTO `power_subdevice_powerlog` (`id`,`pcon`,`temp`,`device_id`,`log_on`,`log_user`,`control_status`,`remark`,`lock`,`locktime`,`status`,`created_on`,`created_by`,`modified_on`,`modified_by`,`power_user_subdevices_id`) VALUES 
 (314,0,0,'1A247C62','2013-08-06 13:05:50','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:34:51',10,NULL,NULL,NULL),
 (315,1,0,'51731376','2013-08-06 13:05:50','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:34:51',10,NULL,NULL,NULL),
 (316,731,0,'48575E6E','2013-08-06 13:06:00','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:35:01',10,NULL,NULL,NULL),
 (317,0,0,'1A247C62','2013-08-06 13:06:00','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:35:01',10,NULL,NULL,NULL),
 (318,1,0,'51731376','2013-08-06 13:06:00','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:35:01',10,NULL,NULL,NULL),
 (319,724,0,'48575E6E','2013-08-06 13:06:10','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:35:11',10,NULL,NULL,NULL),
 (320,0,0,'1A247C62','2013-08-06 13:06:10','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:35:11',10,NULL,NULL,NULL),
 (321,1,0,'51731376','2013-08-06 13:06:10','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:35:11',10,NULL,NULL,NULL);
INSERT INTO `power_subdevice_powerlog` (`id`,`pcon`,`temp`,`device_id`,`log_on`,`log_user`,`control_status`,`remark`,`lock`,`locktime`,`status`,`created_on`,`created_by`,`modified_on`,`modified_by`,`power_user_subdevices_id`) VALUES 
 (322,724,0,'48575E6E','2013-08-06 13:06:20','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:35:21',10,NULL,NULL,NULL),
 (323,0,0,'1A247C62','2013-08-06 13:06:20','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:35:21',10,NULL,NULL,NULL),
 (324,1,0,'51731376','2013-08-06 13:06:20','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:35:21',10,NULL,NULL,NULL),
 (325,720,0,'48575E6E','2013-08-06 13:06:30','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:35:31',10,NULL,NULL,NULL),
 (326,0,0,'1A247C62','2013-08-06 13:06:30','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:35:31',10,NULL,NULL,NULL),
 (327,0,0,'51731376','2013-08-06 13:06:30','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:35:31',10,NULL,NULL,NULL),
 (328,721,0,'48575E6E','2013-08-06 13:06:40','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:35:41',10,NULL,NULL,NULL),
 (329,0,0,'1A247C62','2013-08-06 13:06:40','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:35:41',10,NULL,NULL,NULL);
INSERT INTO `power_subdevice_powerlog` (`id`,`pcon`,`temp`,`device_id`,`log_on`,`log_user`,`control_status`,`remark`,`lock`,`locktime`,`status`,`created_on`,`created_by`,`modified_on`,`modified_by`,`power_user_subdevices_id`) VALUES 
 (330,0,0,'51731376','2013-08-06 13:06:40','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:35:41',10,NULL,NULL,NULL),
 (331,714,0,'48575E6E','2013-08-06 13:06:50','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:35:51',10,NULL,NULL,NULL),
 (332,0,0,'1A247C62','2013-08-06 13:06:50','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:35:51',10,NULL,NULL,NULL),
 (333,1,0,'51731376','2013-08-06 13:06:50','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:35:51',10,NULL,NULL,NULL),
 (334,714,0,'48575E6E','2013-08-06 13:07:00','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:36:01',10,NULL,NULL,NULL),
 (335,0,0,'1A247C62','2013-08-06 13:07:00','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:36:01',10,NULL,NULL,NULL),
 (336,0,0,'51731376','2013-08-06 13:07:00','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:36:01',10,NULL,NULL,NULL),
 (337,718,0,'48575E6E','2013-08-06 13:07:10','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:36:11',10,NULL,NULL,NULL);
INSERT INTO `power_subdevice_powerlog` (`id`,`pcon`,`temp`,`device_id`,`log_on`,`log_user`,`control_status`,`remark`,`lock`,`locktime`,`status`,`created_on`,`created_by`,`modified_on`,`modified_by`,`power_user_subdevices_id`) VALUES 
 (338,0,0,'1A247C62','2013-08-06 13:07:10','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:36:11',10,NULL,NULL,NULL),
 (339,0,0,'51731376','2013-08-06 13:07:10','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:36:11',10,NULL,NULL,NULL),
 (340,713,0,'48575E6E','2013-08-06 13:07:20','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:36:21',10,NULL,NULL,NULL),
 (341,0,0,'1A247C62','2013-08-06 13:07:20','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:36:21',10,NULL,NULL,NULL),
 (342,1,0,'51731376','2013-08-06 13:07:20','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:36:21',10,NULL,NULL,NULL),
 (343,718,0,'48575E6E','2013-08-06 13:07:30','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:36:31',10,NULL,NULL,NULL),
 (344,0,0,'1A247C62','2013-08-06 13:07:30','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:36:31',10,NULL,NULL,NULL),
 (345,1,0,'51731376','2013-08-06 13:07:30','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:36:31',10,NULL,NULL,NULL);
INSERT INTO `power_subdevice_powerlog` (`id`,`pcon`,`temp`,`device_id`,`log_on`,`log_user`,`control_status`,`remark`,`lock`,`locktime`,`status`,`created_on`,`created_by`,`modified_on`,`modified_by`,`power_user_subdevices_id`) VALUES 
 (346,717,0,'48575E6E','2013-08-06 13:07:40','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:36:41',10,NULL,NULL,NULL),
 (347,0,0,'1A247C62','2013-08-06 13:07:40','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:36:41',10,NULL,NULL,NULL),
 (348,1,0,'51731376','2013-08-06 13:07:40','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:36:41',10,NULL,NULL,NULL),
 (349,720,0,'48575E6E','2013-08-06 13:07:50','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:36:51',10,NULL,NULL,NULL),
 (350,0,0,'1A247C62','2013-08-06 13:07:50','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:36:51',10,NULL,NULL,NULL),
 (351,1,0,'51731376','2013-08-06 13:07:50','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:36:51',10,NULL,NULL,NULL),
 (352,709,0,'48575E6E','2013-08-06 13:08:00','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:37:01',10,NULL,NULL,NULL),
 (353,0,0,'1A247C62','2013-08-06 13:08:00','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:37:01',10,NULL,NULL,NULL);
INSERT INTO `power_subdevice_powerlog` (`id`,`pcon`,`temp`,`device_id`,`log_on`,`log_user`,`control_status`,`remark`,`lock`,`locktime`,`status`,`created_on`,`created_by`,`modified_on`,`modified_by`,`power_user_subdevices_id`) VALUES 
 (354,1,0,'51731376','2013-08-06 13:08:00','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:37:01',10,NULL,NULL,NULL),
 (355,709,0,'48575E6E','2013-08-06 13:08:10','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:37:11',10,NULL,NULL,NULL),
 (356,0,0,'1A247C62','2013-08-06 13:08:10','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:37:11',10,NULL,NULL,NULL),
 (357,1,0,'51731376','2013-08-06 13:08:10','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:37:11',10,NULL,NULL,NULL),
 (358,721,0,'48575E6E','2013-08-06 13:08:20','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:37:21',10,NULL,NULL,NULL),
 (359,0,0,'1A247C62','2013-08-06 13:08:20','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:37:21',10,NULL,NULL,NULL),
 (360,1,0,'51731376','2013-08-06 13:08:20','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:37:21',10,NULL,NULL,NULL),
 (361,728,0,'48575E6E','2013-08-06 13:08:30','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:37:31',10,NULL,NULL,NULL);
INSERT INTO `power_subdevice_powerlog` (`id`,`pcon`,`temp`,`device_id`,`log_on`,`log_user`,`control_status`,`remark`,`lock`,`locktime`,`status`,`created_on`,`created_by`,`modified_on`,`modified_by`,`power_user_subdevices_id`) VALUES 
 (362,0,0,'1A247C62','2013-08-06 13:08:30','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:37:31',10,NULL,NULL,NULL),
 (363,1,0,'51731376','2013-08-06 13:08:30','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:37:31',10,NULL,NULL,NULL),
 (364,739,0,'48575E6E','2013-08-06 13:08:40','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:37:41',10,NULL,NULL,NULL),
 (365,0,0,'1A247C62','2013-08-06 13:08:40','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:37:41',10,NULL,NULL,NULL),
 (366,1,0,'51731376','2013-08-06 13:08:40','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:37:41',10,NULL,NULL,NULL),
 (367,739,0,'48575E6E','2013-08-06 13:08:50','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:37:51',10,NULL,NULL,NULL),
 (368,0,0,'1A247C62','2013-08-06 13:08:50','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:37:51',10,NULL,NULL,NULL),
 (369,1,0,'51731376','2013-08-06 13:08:50','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:37:51',10,NULL,NULL,NULL);
INSERT INTO `power_subdevice_powerlog` (`id`,`pcon`,`temp`,`device_id`,`log_on`,`log_user`,`control_status`,`remark`,`lock`,`locktime`,`status`,`created_on`,`created_by`,`modified_on`,`modified_by`,`power_user_subdevices_id`) VALUES 
 (370,720,0,'48575E6E','2013-08-06 13:09:00','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:38:01',10,NULL,NULL,NULL),
 (371,0,0,'1A247C62','2013-08-06 13:09:00','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:38:01',10,NULL,NULL,NULL),
 (372,1,0,'51731376','2013-08-06 13:09:00','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:38:01',10,NULL,NULL,NULL),
 (373,726,0,'48575E6E','2013-08-06 13:09:10','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:38:11',10,NULL,NULL,NULL),
 (374,0,0,'1A247C62','2013-08-06 13:09:10','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:38:11',10,NULL,NULL,NULL),
 (375,1,0,'51731376','2013-08-06 13:09:10','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:38:11',10,NULL,NULL,NULL),
 (376,708,0,'48575E6E','2013-08-06 13:09:20','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:38:21',10,NULL,NULL,NULL),
 (377,0,0,'1A247C62','2013-08-06 13:09:20','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:38:21',10,NULL,NULL,NULL);
INSERT INTO `power_subdevice_powerlog` (`id`,`pcon`,`temp`,`device_id`,`log_on`,`log_user`,`control_status`,`remark`,`lock`,`locktime`,`status`,`created_on`,`created_by`,`modified_on`,`modified_by`,`power_user_subdevices_id`) VALUES 
 (378,1,0,'51731376','2013-08-06 13:09:20','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:38:21',10,NULL,NULL,NULL),
 (379,719,0,'48575E6E','2013-08-06 13:09:30','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:38:31',10,NULL,NULL,NULL),
 (380,0,0,'1A247C62','2013-08-06 13:09:30','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:38:31',10,NULL,NULL,NULL),
 (381,1,0,'51731376','2013-08-06 13:09:30','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:38:31',10,NULL,NULL,NULL),
 (382,705,0,'48575E6E','2013-08-06 13:09:40','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:38:41',10,NULL,NULL,NULL),
 (383,0,0,'1A247C62','2013-08-06 13:09:40','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:38:41',10,NULL,NULL,NULL),
 (384,0,0,'51731376','2013-08-06 13:09:40','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:38:41',10,NULL,NULL,NULL),
 (385,702,0,'48575E6E','2013-08-06 13:09:50','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:38:51',10,NULL,NULL,NULL);
INSERT INTO `power_subdevice_powerlog` (`id`,`pcon`,`temp`,`device_id`,`log_on`,`log_user`,`control_status`,`remark`,`lock`,`locktime`,`status`,`created_on`,`created_by`,`modified_on`,`modified_by`,`power_user_subdevices_id`) VALUES 
 (386,0,0,'1A247C62','2013-08-06 13:09:50','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:38:51',10,NULL,NULL,NULL),
 (387,0,0,'51731376','2013-08-06 13:09:50','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:38:51',10,NULL,NULL,NULL),
 (388,702,0,'48575E6E','2013-08-06 13:10:00','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:39:01',10,NULL,NULL,NULL),
 (389,0,0,'1A247C62','2013-08-06 13:10:00','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:39:01',10,NULL,NULL,NULL),
 (390,1,0,'51731376','2013-08-06 13:10:00','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:39:01',10,NULL,NULL,NULL),
 (391,706,0,'48575E6E','2013-08-06 13:10:10','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:39:11',10,NULL,NULL,NULL),
 (392,0,0,'1A247C62','2013-08-06 13:10:10','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:39:11',10,NULL,NULL,NULL),
 (393,0,0,'51731376','2013-08-06 13:10:10','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:39:11',10,NULL,NULL,NULL);
INSERT INTO `power_subdevice_powerlog` (`id`,`pcon`,`temp`,`device_id`,`log_on`,`log_user`,`control_status`,`remark`,`lock`,`locktime`,`status`,`created_on`,`created_by`,`modified_on`,`modified_by`,`power_user_subdevices_id`) VALUES 
 (394,720,0,'48575E6E','2013-08-06 13:10:20','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:39:21',10,NULL,NULL,NULL),
 (395,0,0,'1A247C62','2013-08-06 13:10:20','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:39:21',10,NULL,NULL,NULL),
 (396,0,0,'51731376','2013-08-06 13:10:20','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:39:21',10,NULL,NULL,NULL),
 (397,721,0,'48575E6E','2013-08-06 13:10:30','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:39:31',10,NULL,NULL,NULL),
 (398,0,0,'1A247C62','2013-08-06 13:10:30','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:39:31',10,NULL,NULL,NULL),
 (399,1,0,'51731376','2013-08-06 13:10:30','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:39:31',10,NULL,NULL,NULL),
 (400,710,0,'48575E6E','2013-08-06 13:10:40','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:39:41',10,NULL,NULL,NULL),
 (401,0,0,'1A247C62','2013-08-06 13:10:40','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:39:41',10,NULL,NULL,NULL);
INSERT INTO `power_subdevice_powerlog` (`id`,`pcon`,`temp`,`device_id`,`log_on`,`log_user`,`control_status`,`remark`,`lock`,`locktime`,`status`,`created_on`,`created_by`,`modified_on`,`modified_by`,`power_user_subdevices_id`) VALUES 
 (402,1,0,'51731376','2013-08-06 13:10:40','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:39:41',10,NULL,NULL,NULL),
 (403,702,0,'48575E6E','2013-08-06 13:10:50','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:39:51',10,NULL,NULL,NULL),
 (404,0,0,'1A247C62','2013-08-06 13:10:50','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:39:51',10,NULL,NULL,NULL),
 (405,1,0,'51731376','2013-08-06 13:10:50','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:39:51',10,NULL,NULL,NULL),
 (406,687,0,'48575E6E','2013-08-06 13:11:00','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:40:01',10,NULL,NULL,NULL),
 (407,0,0,'1A247C62','2013-08-06 13:11:00','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:40:01',10,NULL,NULL,NULL),
 (408,1,0,'51731376','2013-08-06 13:11:00','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:40:01',10,NULL,NULL,NULL),
 (409,716,0,'48575E6E','2013-08-06 13:11:10','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:40:11',10,NULL,NULL,NULL);
INSERT INTO `power_subdevice_powerlog` (`id`,`pcon`,`temp`,`device_id`,`log_on`,`log_user`,`control_status`,`remark`,`lock`,`locktime`,`status`,`created_on`,`created_by`,`modified_on`,`modified_by`,`power_user_subdevices_id`) VALUES 
 (410,0,0,'1A247C62','2013-08-06 13:11:10','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:40:11',10,NULL,NULL,NULL),
 (411,1,0,'51731376','2013-08-06 13:11:10','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:40:11',10,NULL,NULL,NULL),
 (412,714,0,'48575E6E','2013-08-06 13:11:20','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:40:21',10,NULL,NULL,NULL),
 (413,0,0,'1A247C62','2013-08-06 13:11:20','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:40:21',10,NULL,NULL,NULL),
 (414,1,0,'51731376','2013-08-06 13:11:20','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:40:21',10,NULL,NULL,NULL),
 (415,706,0,'48575E6E','2013-08-06 13:11:30','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:40:31',10,NULL,NULL,NULL),
 (416,0,0,'1A247C62','2013-08-06 13:11:30','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:40:31',10,NULL,NULL,NULL),
 (417,1,0,'51731376','2013-08-06 13:11:30','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:40:31',10,NULL,NULL,NULL);
INSERT INTO `power_subdevice_powerlog` (`id`,`pcon`,`temp`,`device_id`,`log_on`,`log_user`,`control_status`,`remark`,`lock`,`locktime`,`status`,`created_on`,`created_by`,`modified_on`,`modified_by`,`power_user_subdevices_id`) VALUES 
 (418,714,0,'48575E6E','2013-08-06 13:11:40','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:40:41',10,NULL,NULL,NULL),
 (419,0,0,'1A247C62','2013-08-06 13:11:40','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:40:41',10,NULL,NULL,NULL),
 (420,1,0,'51731376','2013-08-06 13:11:40','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:40:41',10,NULL,NULL,NULL),
 (421,716,0,'48575E6E','2013-08-06 13:11:50','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:40:51',10,NULL,NULL,NULL),
 (422,0,0,'1A247C62','2013-08-06 13:11:50','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:40:51',10,NULL,NULL,NULL),
 (423,1,0,'51731376','2013-08-06 13:11:50','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:40:51',10,NULL,NULL,NULL),
 (424,712,0,'48575E6E','2013-08-06 13:12:00','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:41:01',10,NULL,NULL,NULL),
 (425,0,0,'1A247C62','2013-08-06 13:12:00','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:41:01',10,NULL,NULL,NULL);
INSERT INTO `power_subdevice_powerlog` (`id`,`pcon`,`temp`,`device_id`,`log_on`,`log_user`,`control_status`,`remark`,`lock`,`locktime`,`status`,`created_on`,`created_by`,`modified_on`,`modified_by`,`power_user_subdevices_id`) VALUES 
 (426,1,0,'51731376','2013-08-06 13:12:00','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:41:01',10,NULL,NULL,NULL),
 (427,712,0,'48575E6E','2013-08-06 13:12:10','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:41:11',10,NULL,NULL,NULL),
 (428,0,0,'1A247C62','2013-08-06 13:12:10','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:41:11',10,NULL,NULL,NULL),
 (429,1,0,'51731376','2013-08-06 13:12:10','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:41:11',10,NULL,NULL,NULL),
 (430,723,0,'48575E6E','2013-08-06 13:12:20','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:41:21',10,NULL,NULL,NULL),
 (431,0,0,'1A247C62','2013-08-06 13:12:20','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:41:21',10,NULL,NULL,NULL),
 (432,1,0,'51731376','2013-08-06 13:12:20','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:41:21',10,NULL,NULL,NULL),
 (433,724,0,'48575E6E','2013-08-06 13:12:30','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:41:31',10,NULL,NULL,NULL);
INSERT INTO `power_subdevice_powerlog` (`id`,`pcon`,`temp`,`device_id`,`log_on`,`log_user`,`control_status`,`remark`,`lock`,`locktime`,`status`,`created_on`,`created_by`,`modified_on`,`modified_by`,`power_user_subdevices_id`) VALUES 
 (434,0,0,'1A247C62','2013-08-06 13:12:30','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:41:31',10,NULL,NULL,NULL),
 (435,0,0,'51731376','2013-08-06 13:12:30','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:41:31',10,NULL,NULL,NULL),
 (436,736,0,'48575E6E','2013-08-06 13:12:40','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:41:41',10,NULL,NULL,NULL),
 (437,0,0,'1A247C62','2013-08-06 13:12:40','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:41:41',10,NULL,NULL,NULL),
 (438,0,0,'51731376','2013-08-06 13:12:40','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:41:41',10,NULL,NULL,NULL),
 (439,733,0,'48575E6E','2013-08-06 13:12:50','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:41:51',10,NULL,NULL,NULL),
 (440,0,0,'1A247C62','2013-08-06 13:12:50','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:41:51',10,NULL,NULL,NULL),
 (441,1,0,'51731376','2013-08-06 13:12:50','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:41:51',10,NULL,NULL,NULL);
INSERT INTO `power_subdevice_powerlog` (`id`,`pcon`,`temp`,`device_id`,`log_on`,`log_user`,`control_status`,`remark`,`lock`,`locktime`,`status`,`created_on`,`created_by`,`modified_on`,`modified_by`,`power_user_subdevices_id`) VALUES 
 (442,730,0,'48575E6E','2013-08-06 13:13:00','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:42:01',10,NULL,NULL,NULL),
 (443,0,0,'1A247C62','2013-08-06 13:13:00','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:42:01',10,NULL,NULL,NULL),
 (444,1,0,'51731376','2013-08-06 13:13:00','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:42:01',10,NULL,NULL,NULL),
 (445,727,0,'48575E6E','2013-08-06 13:13:10','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:42:11',10,NULL,NULL,NULL),
 (446,0,0,'1A247C62','2013-08-06 13:13:10','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:42:11',10,NULL,NULL,NULL),
 (447,1,0,'51731376','2013-08-06 13:13:10','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:42:11',10,NULL,NULL,NULL),
 (448,735,0,'48575E6E','2013-08-06 13:13:20','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:42:21',10,NULL,NULL,NULL),
 (449,0,0,'1A247C62','2013-08-06 13:13:20','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:42:21',10,NULL,NULL,NULL);
INSERT INTO `power_subdevice_powerlog` (`id`,`pcon`,`temp`,`device_id`,`log_on`,`log_user`,`control_status`,`remark`,`lock`,`locktime`,`status`,`created_on`,`created_by`,`modified_on`,`modified_by`,`power_user_subdevices_id`) VALUES 
 (450,1,0,'51731376','2013-08-06 13:13:20','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:42:21',10,NULL,NULL,NULL),
 (451,732,0,'48575E6E','2013-08-06 13:13:30','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:42:31',10,NULL,NULL,NULL),
 (452,0,0,'1A247C62','2013-08-06 13:13:30','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:42:31',10,NULL,NULL,NULL),
 (453,0,0,'51731376','2013-08-06 13:13:30','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:42:31',10,NULL,NULL,NULL),
 (454,737,0,'48575E6E','2013-08-06 13:13:40','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:42:41',10,NULL,NULL,NULL),
 (455,0,0,'1A247C62','2013-08-06 13:13:40','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:42:41',10,NULL,NULL,NULL),
 (456,1,0,'51731376','2013-08-06 13:13:40','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:42:41',10,NULL,NULL,NULL),
 (457,739,0,'48575E6E','2013-08-06 13:13:50','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:42:51',10,NULL,NULL,NULL);
INSERT INTO `power_subdevice_powerlog` (`id`,`pcon`,`temp`,`device_id`,`log_on`,`log_user`,`control_status`,`remark`,`lock`,`locktime`,`status`,`created_on`,`created_by`,`modified_on`,`modified_by`,`power_user_subdevices_id`) VALUES 
 (458,0,0,'1A247C62','2013-08-06 13:13:50','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:42:51',10,NULL,NULL,NULL),
 (459,0,0,'51731376','2013-08-06 13:13:50','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:42:51',10,NULL,NULL,NULL),
 (460,709,0,'48575E6E','2013-08-06 13:14:00','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:43:01',10,NULL,NULL,NULL),
 (461,0,0,'1A247C62','2013-08-06 13:14:00','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:43:01',10,NULL,NULL,NULL),
 (462,1,0,'51731376','2013-08-06 13:14:00','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:43:01',10,NULL,NULL,NULL),
 (463,731,0,'48575E6E','2013-08-06 13:14:10','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:43:11',10,NULL,NULL,NULL),
 (464,0,0,'1A247C62','2013-08-06 13:14:10','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:43:11',10,NULL,NULL,NULL),
 (465,1,0,'51731376','2013-08-06 13:14:10','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:43:11',10,NULL,NULL,NULL);
INSERT INTO `power_subdevice_powerlog` (`id`,`pcon`,`temp`,`device_id`,`log_on`,`log_user`,`control_status`,`remark`,`lock`,`locktime`,`status`,`created_on`,`created_by`,`modified_on`,`modified_by`,`power_user_subdevices_id`) VALUES 
 (466,735,0,'48575E6E','2013-08-06 13:14:20','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:43:21',10,NULL,NULL,NULL),
 (467,0,0,'1A247C62','2013-08-06 13:14:20','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:43:21',10,NULL,NULL,NULL),
 (468,0,0,'51731376','2013-08-06 13:14:20','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:43:21',10,NULL,NULL,NULL),
 (469,735,0,'48575E6E','2013-08-06 13:14:30','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:43:31',10,NULL,NULL,NULL),
 (470,0,0,'1A247C62','2013-08-06 13:14:30','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:43:31',10,NULL,NULL,NULL),
 (471,1,0,'51731376','2013-08-06 13:14:30','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:43:31',10,NULL,NULL,NULL),
 (472,740,0,'48575E6E','2013-08-06 13:14:40','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:43:41',10,NULL,NULL,NULL),
 (473,0,0,'1A247C62','2013-08-06 13:14:40','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:43:41',10,NULL,NULL,NULL);
INSERT INTO `power_subdevice_powerlog` (`id`,`pcon`,`temp`,`device_id`,`log_on`,`log_user`,`control_status`,`remark`,`lock`,`locktime`,`status`,`created_on`,`created_by`,`modified_on`,`modified_by`,`power_user_subdevices_id`) VALUES 
 (474,1,0,'51731376','2013-08-06 13:14:40','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:43:41',10,NULL,NULL,NULL),
 (475,709,0,'48575E6E','2013-08-06 13:14:50','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:43:51',10,NULL,NULL,NULL),
 (476,0,0,'1A247C62','2013-08-06 13:14:50','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:43:51',10,NULL,NULL,NULL),
 (477,1,0,'51731376','2013-08-06 13:14:50','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:43:51',10,NULL,NULL,NULL),
 (478,713,0,'48575E6E','2013-08-06 13:15:00','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:44:01',10,NULL,NULL,NULL),
 (479,0,0,'1A247C62','2013-08-06 13:15:00','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:44:01',10,NULL,NULL,NULL),
 (480,1,0,'51731376','2013-08-06 13:15:00','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:44:01',10,NULL,NULL,NULL),
 (481,693,0,'48575E6E','2013-08-06 13:15:10','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:44:11',10,NULL,NULL,NULL);
INSERT INTO `power_subdevice_powerlog` (`id`,`pcon`,`temp`,`device_id`,`log_on`,`log_user`,`control_status`,`remark`,`lock`,`locktime`,`status`,`created_on`,`created_by`,`modified_on`,`modified_by`,`power_user_subdevices_id`) VALUES 
 (482,0,0,'1A247C62','2013-08-06 13:15:10','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:44:11',10,NULL,NULL,NULL),
 (483,0,0,'51731376','2013-08-06 13:15:10','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:44:11',10,NULL,NULL,NULL),
 (484,708,0,'48575E6E','2013-08-06 13:15:20','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:44:21',10,NULL,NULL,NULL),
 (485,0,0,'1A247C62','2013-08-06 13:15:20','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:44:21',10,NULL,NULL,NULL),
 (486,0,0,'51731376','2013-08-06 13:15:20','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:44:21',10,NULL,NULL,NULL),
 (487,715,0,'48575E6E','2013-08-06 13:15:30','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:44:31',10,NULL,NULL,NULL),
 (488,0,0,'1A247C62','2013-08-06 13:15:30','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:44:31',10,NULL,NULL,NULL),
 (489,1,0,'51731376','2013-08-06 13:15:30','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:44:31',10,NULL,NULL,NULL);
INSERT INTO `power_subdevice_powerlog` (`id`,`pcon`,`temp`,`device_id`,`log_on`,`log_user`,`control_status`,`remark`,`lock`,`locktime`,`status`,`created_on`,`created_by`,`modified_on`,`modified_by`,`power_user_subdevices_id`) VALUES 
 (490,727,0,'48575E6E','2013-08-06 13:15:40','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:44:41',10,NULL,NULL,NULL),
 (491,0,0,'1A247C62','2013-08-06 13:15:40','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:44:41',10,NULL,NULL,NULL),
 (492,1,0,'51731376','2013-08-06 13:15:40','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:44:41',10,NULL,NULL,NULL),
 (493,714,0,'48575E6E','2013-08-06 13:15:50','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:44:51',10,NULL,NULL,NULL),
 (494,0,0,'1A247C62','2013-08-06 13:15:50','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:44:51',10,NULL,NULL,NULL),
 (495,1,0,'51731376','2013-08-06 13:15:50','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:44:51',10,NULL,NULL,NULL),
 (496,708,0,'48575E6E','2013-08-06 13:16:00','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:45:01',10,NULL,NULL,NULL),
 (497,0,0,'1A247C62','2013-08-06 13:16:00','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:45:01',10,NULL,NULL,NULL);
INSERT INTO `power_subdevice_powerlog` (`id`,`pcon`,`temp`,`device_id`,`log_on`,`log_user`,`control_status`,`remark`,`lock`,`locktime`,`status`,`created_on`,`created_by`,`modified_on`,`modified_by`,`power_user_subdevices_id`) VALUES 
 (498,0,0,'51731376','2013-08-06 13:16:00','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:45:01',10,NULL,NULL,NULL),
 (499,715,0,'48575E6E','2013-08-06 13:16:10','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:45:11',10,NULL,NULL,NULL),
 (500,0,0,'1A247C62','2013-08-06 13:16:10','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:45:11',10,NULL,NULL,NULL),
 (501,1,0,'51731376','2013-08-06 13:16:10','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:45:11',10,NULL,NULL,NULL),
 (502,709,0,'48575E6E','2013-08-06 13:16:20','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:45:21',10,NULL,NULL,NULL),
 (503,0,0,'1A247C62','2013-08-06 13:16:20','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:45:21',10,NULL,NULL,NULL),
 (504,1,0,'51731376','2013-08-06 13:16:20','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:45:21',10,NULL,NULL,NULL),
 (505,706,0,'48575E6E','2013-08-06 13:16:30','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:45:31',10,NULL,NULL,NULL);
INSERT INTO `power_subdevice_powerlog` (`id`,`pcon`,`temp`,`device_id`,`log_on`,`log_user`,`control_status`,`remark`,`lock`,`locktime`,`status`,`created_on`,`created_by`,`modified_on`,`modified_by`,`power_user_subdevices_id`) VALUES 
 (506,0,0,'1A247C62','2013-08-06 13:16:30','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:45:31',10,NULL,NULL,NULL),
 (507,0,0,'51731376','2013-08-06 13:16:30','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:45:31',10,NULL,NULL,NULL),
 (508,710,0,'48575E6E','2013-08-06 13:16:40','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:45:41',10,NULL,NULL,NULL),
 (509,0,0,'1A247C62','2013-08-06 13:16:40','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:45:41',10,NULL,NULL,NULL),
 (510,0,0,'51731376','2013-08-06 13:16:40','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:45:41',10,NULL,NULL,NULL),
 (511,707,0,'48575E6E','2013-08-06 13:16:50','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:45:51',10,NULL,NULL,NULL),
 (512,0,0,'1A247C62','2013-08-06 13:16:50','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:45:51',10,NULL,NULL,NULL),
 (513,0,0,'51731376','2013-08-06 13:16:50','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:45:51',10,NULL,NULL,NULL);
INSERT INTO `power_subdevice_powerlog` (`id`,`pcon`,`temp`,`device_id`,`log_on`,`log_user`,`control_status`,`remark`,`lock`,`locktime`,`status`,`created_on`,`created_by`,`modified_on`,`modified_by`,`power_user_subdevices_id`) VALUES 
 (514,689,0,'48575E6E','2013-08-06 13:17:00','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:46:01',10,NULL,NULL,NULL),
 (515,0,0,'1A247C62','2013-08-06 13:17:00','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:46:01',10,NULL,NULL,NULL),
 (516,0,0,'51731376','2013-08-06 13:17:00','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:46:01',10,NULL,NULL,NULL),
 (517,712,0,'48575E6E','2013-08-06 13:17:10','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:46:11',10,NULL,NULL,NULL),
 (518,0,0,'1A247C62','2013-08-06 13:17:10','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:46:11',10,NULL,NULL,NULL),
 (519,1,0,'51731376','2013-08-06 13:17:10','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:46:11',10,NULL,NULL,NULL),
 (520,720,0,'48575E6E','2013-08-06 13:17:20','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:46:21',10,NULL,NULL,NULL),
 (521,0,0,'1A247C62','2013-08-06 13:17:20','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:46:21',10,NULL,NULL,NULL);
INSERT INTO `power_subdevice_powerlog` (`id`,`pcon`,`temp`,`device_id`,`log_on`,`log_user`,`control_status`,`remark`,`lock`,`locktime`,`status`,`created_on`,`created_by`,`modified_on`,`modified_by`,`power_user_subdevices_id`) VALUES 
 (522,1,0,'51731376','2013-08-06 13:17:20','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:46:21',10,NULL,NULL,NULL),
 (523,707,0,'48575E6E','2013-08-06 13:17:30','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:46:31',10,NULL,NULL,NULL),
 (524,0,0,'1A247C62','2013-08-06 13:17:30','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:46:31',10,NULL,NULL,NULL),
 (525,1,0,'51731376','2013-08-06 13:17:30','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:46:31',10,NULL,NULL,NULL),
 (526,713,0,'48575E6E','2013-08-06 13:17:40','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:46:41',10,NULL,NULL,NULL),
 (527,0,0,'1A247C62','2013-08-06 13:17:40','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:46:41',10,NULL,NULL,NULL),
 (528,1,0,'51731376','2013-08-06 13:17:40','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:46:41',10,NULL,NULL,NULL),
 (529,721,0,'48575E6E','2013-08-06 13:17:50','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:46:51',10,NULL,NULL,NULL);
INSERT INTO `power_subdevice_powerlog` (`id`,`pcon`,`temp`,`device_id`,`log_on`,`log_user`,`control_status`,`remark`,`lock`,`locktime`,`status`,`created_on`,`created_by`,`modified_on`,`modified_by`,`power_user_subdevices_id`) VALUES 
 (530,0,0,'1A247C62','2013-08-06 13:17:50','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:46:51',10,NULL,NULL,NULL),
 (531,1,0,'51731376','2013-08-06 13:17:50','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:46:51',10,NULL,NULL,NULL),
 (532,712,0,'48575E6E','2013-08-06 13:18:00','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:47:01',10,NULL,NULL,NULL),
 (533,0,0,'1A247C62','2013-08-06 13:18:00','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:47:01',10,NULL,NULL,NULL),
 (534,0,0,'51731376','2013-08-06 13:18:00','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:47:01',10,NULL,NULL,NULL),
 (535,707,0,'48575E6E','2013-08-06 13:18:10','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:47:11',10,NULL,NULL,NULL),
 (536,0,0,'1A247C62','2013-08-06 13:18:10','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:47:11',10,NULL,NULL,NULL),
 (537,0,0,'51731376','2013-08-06 13:18:10','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:47:11',10,NULL,NULL,NULL);
INSERT INTO `power_subdevice_powerlog` (`id`,`pcon`,`temp`,`device_id`,`log_on`,`log_user`,`control_status`,`remark`,`lock`,`locktime`,`status`,`created_on`,`created_by`,`modified_on`,`modified_by`,`power_user_subdevices_id`) VALUES 
 (538,720,0,'48575E6E','2013-08-06 13:18:20','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:47:21',10,NULL,NULL,NULL),
 (539,0,0,'1A247C62','2013-08-06 13:18:20','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:47:21',10,NULL,NULL,NULL),
 (540,1,0,'51731376','2013-08-06 13:18:20','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:47:21',10,NULL,NULL,NULL),
 (541,719,0,'48575E6E','2013-08-06 13:18:30','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:47:31',10,NULL,NULL,NULL),
 (542,0,0,'1A247C62','2013-08-06 13:18:30','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:47:31',10,NULL,NULL,NULL),
 (543,0,0,'51731376','2013-08-06 13:18:30','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:47:31',10,NULL,NULL,NULL),
 (544,716,0,'48575E6E','2013-08-06 13:18:40','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:47:41',10,NULL,NULL,NULL),
 (545,0,0,'1A247C62','2013-08-06 13:18:40','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:47:41',10,NULL,NULL,NULL);
INSERT INTO `power_subdevice_powerlog` (`id`,`pcon`,`temp`,`device_id`,`log_on`,`log_user`,`control_status`,`remark`,`lock`,`locktime`,`status`,`created_on`,`created_by`,`modified_on`,`modified_by`,`power_user_subdevices_id`) VALUES 
 (546,0,0,'51731376','2013-08-06 13:18:40','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:47:41',10,NULL,NULL,NULL),
 (547,708,0,'48575E6E','2013-08-06 13:18:50','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:47:51',10,NULL,NULL,NULL),
 (548,0,0,'1A247C62','2013-08-06 13:18:50','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:47:51',10,NULL,NULL,NULL),
 (549,1,0,'51731376','2013-08-06 13:18:50','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:47:51',10,NULL,NULL,NULL),
 (550,703,0,'48575E6E','2013-08-06 13:19:00','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:48:01',10,NULL,NULL,NULL),
 (551,0,0,'1A247C62','2013-08-06 13:19:00','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:48:01',10,NULL,NULL,NULL),
 (552,0,0,'51731376','2013-08-06 13:19:00','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:48:01',10,NULL,NULL,NULL),
 (553,704,0,'48575E6E','2013-08-06 13:19:10','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:48:11',10,NULL,NULL,NULL);
INSERT INTO `power_subdevice_powerlog` (`id`,`pcon`,`temp`,`device_id`,`log_on`,`log_user`,`control_status`,`remark`,`lock`,`locktime`,`status`,`created_on`,`created_by`,`modified_on`,`modified_by`,`power_user_subdevices_id`) VALUES 
 (554,0,0,'1A247C62','2013-08-06 13:19:10','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:48:11',10,NULL,NULL,NULL),
 (555,0,0,'51731376','2013-08-06 13:19:10','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:48:11',10,NULL,NULL,NULL),
 (556,711,0,'48575E6E','2013-08-06 13:19:20','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:48:21',10,NULL,NULL,NULL),
 (557,0,0,'1A247C62','2013-08-06 13:19:20','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:48:21',10,NULL,NULL,NULL),
 (558,1,0,'51731376','2013-08-06 13:19:20','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:48:21',10,NULL,NULL,NULL),
 (559,707,0,'48575E6E','2013-08-06 13:19:30','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:48:31',10,NULL,NULL,NULL),
 (560,0,0,'1A247C62','2013-08-06 13:19:30','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:48:31',10,NULL,NULL,NULL),
 (561,1,0,'51731376','2013-08-06 13:19:30','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:48:31',10,NULL,NULL,NULL);
INSERT INTO `power_subdevice_powerlog` (`id`,`pcon`,`temp`,`device_id`,`log_on`,`log_user`,`control_status`,`remark`,`lock`,`locktime`,`status`,`created_on`,`created_by`,`modified_on`,`modified_by`,`power_user_subdevices_id`) VALUES 
 (562,706,0,'48575E6E','2013-08-06 13:19:40','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:48:41',10,NULL,NULL,NULL),
 (563,0,0,'1A247C62','2013-08-06 13:19:40','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:48:41',10,NULL,NULL,NULL),
 (564,0,0,'51731376','2013-08-06 13:19:40','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:48:41',10,NULL,NULL,NULL),
 (565,704,0,'48575E6E','2013-08-06 13:19:50','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:48:51',10,NULL,NULL,NULL),
 (566,0,0,'1A247C62','2013-08-06 13:19:50','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:48:51',10,NULL,NULL,NULL),
 (567,0,0,'51731376','2013-08-06 13:19:50','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:48:51',10,NULL,NULL,NULL),
 (568,713,0,'48575E6E','2013-08-06 13:20:00','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:49:01',10,NULL,NULL,NULL),
 (569,0,0,'1A247C62','2013-08-06 13:20:00','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:49:01',10,NULL,NULL,NULL);
INSERT INTO `power_subdevice_powerlog` (`id`,`pcon`,`temp`,`device_id`,`log_on`,`log_user`,`control_status`,`remark`,`lock`,`locktime`,`status`,`created_on`,`created_by`,`modified_on`,`modified_by`,`power_user_subdevices_id`) VALUES 
 (570,1,0,'51731376','2013-08-06 13:20:00','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:49:01',10,NULL,NULL,NULL),
 (571,716,0,'48575E6E','2013-08-06 13:20:10','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:49:11',10,NULL,NULL,NULL),
 (572,0,0,'1A247C62','2013-08-06 13:20:10','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:49:11',10,NULL,NULL,NULL),
 (573,1,0,'51731376','2013-08-06 13:20:10','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:49:11',10,NULL,NULL,NULL),
 (574,719,0,'48575E6E','2013-08-06 13:20:20','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:49:21',10,NULL,NULL,NULL),
 (575,0,0,'1A247C62','2013-08-06 13:20:20','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:49:21',10,NULL,NULL,NULL),
 (576,0,0,'51731376','2013-08-06 13:20:20','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:49:21',10,NULL,NULL,NULL),
 (577,721,0,'48575E6E','2013-08-06 13:20:30','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:49:31',10,NULL,NULL,NULL);
INSERT INTO `power_subdevice_powerlog` (`id`,`pcon`,`temp`,`device_id`,`log_on`,`log_user`,`control_status`,`remark`,`lock`,`locktime`,`status`,`created_on`,`created_by`,`modified_on`,`modified_by`,`power_user_subdevices_id`) VALUES 
 (578,0,0,'1A247C62','2013-08-06 13:20:30','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:49:31',10,NULL,NULL,NULL),
 (579,1,0,'51731376','2013-08-06 13:20:30','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:49:31',10,NULL,NULL,NULL),
 (580,726,0,'48575E6E','2013-08-06 13:20:40','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:49:41',10,NULL,NULL,NULL),
 (581,0,0,'1A247C62','2013-08-06 13:20:40','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:49:41',10,NULL,NULL,NULL),
 (582,1,0,'51731376','2013-08-06 13:20:40','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:49:41',10,NULL,NULL,NULL),
 (583,737,0,'48575E6E','2013-08-06 13:20:50','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:49:51',10,NULL,NULL,NULL),
 (584,0,0,'1A247C62','2013-08-06 13:20:50','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:49:51',10,NULL,NULL,NULL),
 (585,1,0,'51731376','2013-08-06 13:20:50','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:49:51',10,NULL,NULL,NULL);
INSERT INTO `power_subdevice_powerlog` (`id`,`pcon`,`temp`,`device_id`,`log_on`,`log_user`,`control_status`,`remark`,`lock`,`locktime`,`status`,`created_on`,`created_by`,`modified_on`,`modified_by`,`power_user_subdevices_id`) VALUES 
 (586,716,0,'48575E6E','2013-08-06 13:21:00','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:50:01',10,NULL,NULL,NULL),
 (587,0,0,'1A247C62','2013-08-06 13:21:00','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:50:01',10,NULL,NULL,NULL),
 (588,1,0,'51731376','2013-08-06 13:21:00','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:50:01',10,NULL,NULL,NULL),
 (589,709,0,'48575E6E','2013-08-06 13:21:10','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:50:11',10,NULL,NULL,NULL),
 (590,0,0,'1A247C62','2013-08-06 13:21:10','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:50:11',10,NULL,NULL,NULL),
 (591,1,0,'51731376','2013-08-06 13:21:10','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:50:11',10,NULL,NULL,NULL),
 (592,698,0,'48575E6E','2013-08-06 13:21:20','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:50:21',10,NULL,NULL,NULL),
 (593,0,0,'1A247C62','2013-08-06 13:21:20','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:50:21',10,NULL,NULL,NULL);
INSERT INTO `power_subdevice_powerlog` (`id`,`pcon`,`temp`,`device_id`,`log_on`,`log_user`,`control_status`,`remark`,`lock`,`locktime`,`status`,`created_on`,`created_by`,`modified_on`,`modified_by`,`power_user_subdevices_id`) VALUES 
 (594,0,0,'51731376','2013-08-06 13:21:20','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:50:21',10,NULL,NULL,NULL),
 (595,698,0,'48575E6E','2013-08-06 13:21:30','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:50:31',10,NULL,NULL,NULL),
 (596,0,0,'1A247C62','2013-08-06 13:21:30','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:50:31',10,NULL,NULL,NULL),
 (597,0,0,'51731376','2013-08-06 13:21:30','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:50:31',10,NULL,NULL,NULL),
 (598,708,0,'48575E6E','2013-08-06 13:21:40','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:50:41',10,NULL,NULL,NULL),
 (599,0,0,'1A247C62','2013-08-06 13:21:40','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:50:41',10,NULL,NULL,NULL),
 (600,0,0,'51731376','2013-08-06 13:21:40','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:50:41',10,NULL,NULL,NULL),
 (601,713,0,'48575E6E','2013-08-06 13:21:50','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:50:51',10,NULL,NULL,NULL);
INSERT INTO `power_subdevice_powerlog` (`id`,`pcon`,`temp`,`device_id`,`log_on`,`log_user`,`control_status`,`remark`,`lock`,`locktime`,`status`,`created_on`,`created_by`,`modified_on`,`modified_by`,`power_user_subdevices_id`) VALUES 
 (602,0,0,'1A247C62','2013-08-06 13:21:50','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:50:51',10,NULL,NULL,NULL),
 (603,0,0,'51731376','2013-08-06 13:21:50','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:50:51',10,NULL,NULL,NULL),
 (604,733,0,'48575E6E','2013-08-06 13:22:00','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:51:01',10,NULL,NULL,NULL),
 (605,0,0,'1A247C62','2013-08-06 13:22:00','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:51:01',10,NULL,NULL,NULL),
 (606,0,0,'51731376','2013-08-06 13:22:00','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:51:01',10,NULL,NULL,NULL),
 (607,724,0,'48575E6E','2013-08-06 13:22:10','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:51:11',10,NULL,NULL,NULL),
 (608,0,0,'1A247C62','2013-08-06 13:22:10','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:51:11',10,NULL,NULL,NULL),
 (609,1,0,'51731376','2013-08-06 13:22:10','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:51:11',10,NULL,NULL,NULL);
INSERT INTO `power_subdevice_powerlog` (`id`,`pcon`,`temp`,`device_id`,`log_on`,`log_user`,`control_status`,`remark`,`lock`,`locktime`,`status`,`created_on`,`created_by`,`modified_on`,`modified_by`,`power_user_subdevices_id`) VALUES 
 (610,729,0,'48575E6E','2013-08-06 13:22:20','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:51:21',10,NULL,NULL,NULL),
 (611,0,0,'1A247C62','2013-08-06 13:22:20','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:51:21',10,NULL,NULL,NULL),
 (612,1,0,'51731376','2013-08-06 13:22:20','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:51:21',10,NULL,NULL,NULL),
 (613,736,0,'48575E6E','2013-08-06 13:22:30','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:51:31',10,NULL,NULL,NULL),
 (614,0,0,'1A247C62','2013-08-06 13:22:30','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:51:31',10,NULL,NULL,NULL),
 (615,1,0,'51731376','2013-08-06 13:22:30','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:51:31',10,NULL,NULL,NULL),
 (616,738,0,'48575E6E','2013-08-06 13:22:40','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:51:41',10,NULL,NULL,NULL),
 (617,0,0,'1A247C62','2013-08-06 13:22:40','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:51:41',10,NULL,NULL,NULL);
INSERT INTO `power_subdevice_powerlog` (`id`,`pcon`,`temp`,`device_id`,`log_on`,`log_user`,`control_status`,`remark`,`lock`,`locktime`,`status`,`created_on`,`created_by`,`modified_on`,`modified_by`,`power_user_subdevices_id`) VALUES 
 (618,0,0,'51731376','2013-08-06 13:22:40','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:51:41',10,NULL,NULL,NULL),
 (619,715,0,'48575E6E','2013-08-06 13:22:50','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:51:51',10,NULL,NULL,NULL),
 (620,0,0,'1A247C62','2013-08-06 13:22:50','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:51:51',10,NULL,NULL,NULL),
 (621,1,0,'51731376','2013-08-06 13:22:50','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:51:51',10,NULL,NULL,NULL),
 (622,722,0,'48575E6E','2013-08-06 13:23:00','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:52:01',10,NULL,NULL,NULL),
 (623,0,0,'1A247C62','2013-08-06 13:23:00','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:52:01',10,NULL,NULL,NULL),
 (624,1,0,'51731376','2013-08-06 13:23:00','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:52:01',10,NULL,NULL,NULL),
 (625,702,0,'48575E6E','2013-08-06 13:23:10','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:52:11',10,NULL,NULL,NULL);
INSERT INTO `power_subdevice_powerlog` (`id`,`pcon`,`temp`,`device_id`,`log_on`,`log_user`,`control_status`,`remark`,`lock`,`locktime`,`status`,`created_on`,`created_by`,`modified_on`,`modified_by`,`power_user_subdevices_id`) VALUES 
 (626,0,0,'1A247C62','2013-08-06 13:23:10','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:52:11',10,NULL,NULL,NULL),
 (627,0,0,'51731376','2013-08-06 13:23:10','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:52:11',10,NULL,NULL,NULL),
 (628,709,0,'48575E6E','2013-08-06 13:23:20','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:52:21',10,NULL,NULL,NULL),
 (629,0,0,'1A247C62','2013-08-06 13:23:20','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:52:21',10,NULL,NULL,NULL),
 (630,1,0,'51731376','2013-08-06 13:23:20','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:52:21',10,NULL,NULL,NULL),
 (631,704,0,'48575E6E','2013-08-06 13:23:30','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:52:31',10,NULL,NULL,NULL),
 (632,0,0,'1A247C62','2013-08-06 13:23:30','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:52:31',10,NULL,NULL,NULL),
 (633,1,0,'51731376','2013-08-06 13:23:30','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:52:31',10,NULL,NULL,NULL);
INSERT INTO `power_subdevice_powerlog` (`id`,`pcon`,`temp`,`device_id`,`log_on`,`log_user`,`control_status`,`remark`,`lock`,`locktime`,`status`,`created_on`,`created_by`,`modified_on`,`modified_by`,`power_user_subdevices_id`) VALUES 
 (634,698,0,'48575E6E','2013-08-06 13:23:40','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:52:41',10,NULL,NULL,NULL),
 (635,0,0,'1A247C62','2013-08-06 13:23:40','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:52:41',10,NULL,NULL,NULL),
 (636,1,0,'51731376','2013-08-06 13:23:40','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:52:41',10,NULL,NULL,NULL),
 (637,705,0,'48575E6E','2013-08-06 13:23:50','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:52:51',10,NULL,NULL,NULL),
 (638,0,0,'1A247C62','2013-08-06 13:23:50','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:52:51',10,NULL,NULL,NULL),
 (639,1,0,'51731376','2013-08-06 13:23:50','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:52:51',10,NULL,NULL,NULL),
 (640,707,0,'48575E6E','2013-08-06 13:24:00','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:53:01',10,NULL,NULL,NULL),
 (641,0,0,'1A247C62','2013-08-06 13:24:00','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:53:01',10,NULL,NULL,NULL);
INSERT INTO `power_subdevice_powerlog` (`id`,`pcon`,`temp`,`device_id`,`log_on`,`log_user`,`control_status`,`remark`,`lock`,`locktime`,`status`,`created_on`,`created_by`,`modified_on`,`modified_by`,`power_user_subdevices_id`) VALUES 
 (642,1,0,'51731376','2013-08-06 13:24:00','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:53:01',10,NULL,NULL,NULL),
 (643,705,0,'48575E6E','2013-08-06 13:24:10','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:53:11',10,NULL,NULL,NULL),
 (644,0,0,'1A247C62','2013-08-06 13:24:10','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:53:11',10,NULL,NULL,NULL),
 (645,1,0,'51731376','2013-08-06 13:24:10','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:53:11',10,NULL,NULL,NULL),
 (646,715,0,'48575E6E','2013-08-06 13:24:20','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:53:21',10,NULL,NULL,NULL),
 (647,0,0,'1A247C62','2013-08-06 13:24:20','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:53:21',10,NULL,NULL,NULL),
 (648,1,0,'51731376','2013-08-06 13:24:20','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:53:21',10,NULL,NULL,NULL),
 (649,718,0,'48575E6E','2013-08-06 13:24:30','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:53:31',10,NULL,NULL,NULL);
INSERT INTO `power_subdevice_powerlog` (`id`,`pcon`,`temp`,`device_id`,`log_on`,`log_user`,`control_status`,`remark`,`lock`,`locktime`,`status`,`created_on`,`created_by`,`modified_on`,`modified_by`,`power_user_subdevices_id`) VALUES 
 (650,0,0,'1A247C62','2013-08-06 13:24:30','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:53:31',10,NULL,NULL,NULL),
 (651,1,0,'51731376','2013-08-06 13:24:30','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:53:31',10,NULL,NULL,NULL),
 (652,733,0,'48575E6E','2013-08-06 13:24:40','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:53:41',10,NULL,NULL,NULL),
 (653,0,0,'1A247C62','2013-08-06 13:24:40','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:53:41',10,NULL,NULL,NULL),
 (654,0,0,'51731376','2013-08-06 13:24:40','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:53:41',10,NULL,NULL,NULL),
 (655,721,0,'48575E6E','2013-08-06 13:24:50','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:53:51',10,NULL,NULL,NULL),
 (656,0,0,'1A247C62','2013-08-06 13:24:50','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:53:51',10,NULL,NULL,NULL),
 (657,1,0,'51731376','2013-08-06 13:24:50','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:53:51',10,NULL,NULL,NULL);
INSERT INTO `power_subdevice_powerlog` (`id`,`pcon`,`temp`,`device_id`,`log_on`,`log_user`,`control_status`,`remark`,`lock`,`locktime`,`status`,`created_on`,`created_by`,`modified_on`,`modified_by`,`power_user_subdevices_id`) VALUES 
 (658,741,0,'48575E6E','2013-08-06 13:25:00','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:54:01',10,NULL,NULL,NULL),
 (659,0,0,'1A247C62','2013-08-06 13:25:00','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:54:01',10,NULL,NULL,NULL),
 (660,1,0,'51731376','2013-08-06 13:25:00','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:54:01',10,NULL,NULL,NULL),
 (661,736,0,'48575E6E','2013-08-06 13:25:10','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:54:11',10,NULL,NULL,NULL),
 (662,0,0,'1A247C62','2013-08-06 13:25:10','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:54:11',10,NULL,NULL,NULL),
 (663,0,0,'51731376','2013-08-06 13:25:10','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:54:11',10,NULL,NULL,NULL),
 (664,728,0,'48575E6E','2013-08-06 13:25:20','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:54:21',10,NULL,NULL,NULL),
 (665,0,0,'1A247C62','2013-08-06 13:25:20','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:54:21',10,NULL,NULL,NULL);
INSERT INTO `power_subdevice_powerlog` (`id`,`pcon`,`temp`,`device_id`,`log_on`,`log_user`,`control_status`,`remark`,`lock`,`locktime`,`status`,`created_on`,`created_by`,`modified_on`,`modified_by`,`power_user_subdevices_id`) VALUES 
 (666,0,0,'51731376','2013-08-06 13:25:20','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:54:21',10,NULL,NULL,NULL),
 (667,727,0,'48575E6E','2013-08-06 13:25:30','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:54:31',10,NULL,NULL,NULL),
 (668,0,0,'1A247C62','2013-08-06 13:25:30','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:54:31',10,NULL,NULL,NULL),
 (669,0,0,'51731376','2013-08-06 13:25:30','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:54:31',10,NULL,NULL,NULL),
 (670,707,0,'48575E6E','2013-08-06 13:25:40','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:54:41',10,NULL,NULL,NULL),
 (671,0,0,'1A247C62','2013-08-06 13:25:40','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:54:41',10,NULL,NULL,NULL),
 (672,1,0,'51731376','2013-08-06 13:25:40','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:54:41',10,NULL,NULL,NULL),
 (673,718,0,'48575E6E','2013-08-06 13:25:50','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:54:51',10,NULL,NULL,NULL);
INSERT INTO `power_subdevice_powerlog` (`id`,`pcon`,`temp`,`device_id`,`log_on`,`log_user`,`control_status`,`remark`,`lock`,`locktime`,`status`,`created_on`,`created_by`,`modified_on`,`modified_by`,`power_user_subdevices_id`) VALUES 
 (674,0,0,'1A247C62','2013-08-06 13:25:50','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:54:51',10,NULL,NULL,NULL),
 (675,1,0,'51731376','2013-08-06 13:25:50','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:54:51',10,NULL,NULL,NULL),
 (676,714,0,'48575E6E','2013-08-06 13:26:00','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:55:01',10,NULL,NULL,NULL),
 (677,0,0,'1A247C62','2013-08-06 13:26:00','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:55:01',10,NULL,NULL,NULL),
 (678,0,0,'51731376','2013-08-06 13:26:00','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:55:01',10,NULL,NULL,NULL),
 (679,722,0,'48575E6E','2013-08-06 13:26:10','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:55:11',10,NULL,NULL,NULL),
 (680,0,0,'1A247C62','2013-08-06 13:26:10','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:55:11',10,NULL,NULL,NULL),
 (681,1,0,'51731376','2013-08-06 13:26:10','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:55:11',10,NULL,NULL,NULL);
INSERT INTO `power_subdevice_powerlog` (`id`,`pcon`,`temp`,`device_id`,`log_on`,`log_user`,`control_status`,`remark`,`lock`,`locktime`,`status`,`created_on`,`created_by`,`modified_on`,`modified_by`,`power_user_subdevices_id`) VALUES 
 (682,724,0,'48575E6E','2013-08-06 13:26:20','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:55:21',10,NULL,NULL,NULL),
 (683,0,0,'1A247C62','2013-08-06 13:26:20','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:55:21',10,NULL,NULL,NULL),
 (684,1,0,'51731376','2013-08-06 13:26:20','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:55:21',10,NULL,NULL,NULL),
 (685,722,0,'48575E6E','2013-08-06 13:26:30','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:55:31',10,NULL,NULL,NULL),
 (686,0,0,'1A247C62','2013-08-06 13:26:30','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:55:31',10,NULL,NULL,NULL),
 (687,0,0,'51731376','2013-08-06 13:26:30','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:55:31',10,NULL,NULL,NULL),
 (688,715,0,'48575E6E','2013-08-06 13:26:40','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:55:41',10,NULL,NULL,NULL),
 (689,0,0,'1A247C62','2013-08-06 13:26:40','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:55:41',10,NULL,NULL,NULL);
INSERT INTO `power_subdevice_powerlog` (`id`,`pcon`,`temp`,`device_id`,`log_on`,`log_user`,`control_status`,`remark`,`lock`,`locktime`,`status`,`created_on`,`created_by`,`modified_on`,`modified_by`,`power_user_subdevices_id`) VALUES 
 (690,1,0,'51731376','2013-08-06 13:26:40','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:55:41',10,NULL,NULL,NULL),
 (691,708,0,'48575E6E','2013-08-06 13:26:50','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:55:51',10,NULL,NULL,NULL),
 (692,0,0,'1A247C62','2013-08-06 13:26:50','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:55:51',10,NULL,NULL,NULL),
 (693,1,0,'51731376','2013-08-06 13:26:50','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:55:51',10,NULL,NULL,NULL),
 (694,706,0,'48575E6E','2013-08-06 13:27:00','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:56:01',10,NULL,NULL,NULL),
 (695,0,0,'1A247C62','2013-08-06 13:27:00','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:56:01',10,NULL,NULL,NULL),
 (696,0,0,'51731376','2013-08-06 13:27:00','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:56:01',10,NULL,NULL,NULL),
 (697,718,0,'48575E6E','2013-08-06 13:27:10','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:56:11',10,NULL,NULL,NULL);
INSERT INTO `power_subdevice_powerlog` (`id`,`pcon`,`temp`,`device_id`,`log_on`,`log_user`,`control_status`,`remark`,`lock`,`locktime`,`status`,`created_on`,`created_by`,`modified_on`,`modified_by`,`power_user_subdevices_id`) VALUES 
 (698,0,0,'1A247C62','2013-08-06 13:27:10','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:56:11',10,NULL,NULL,NULL),
 (699,0,0,'51731376','2013-08-06 13:27:10','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:56:11',10,NULL,NULL,NULL),
 (700,727,0,'48575E6E','2013-08-06 13:27:20','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:56:21',10,NULL,NULL,NULL),
 (701,0,0,'1A247C62','2013-08-06 13:27:20','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:56:21',10,NULL,NULL,NULL),
 (702,0,0,'51731376','2013-08-06 13:27:20','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:56:21',10,NULL,NULL,NULL),
 (703,720,0,'48575E6E','2013-08-06 13:27:30','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:56:31',10,NULL,NULL,NULL),
 (704,0,0,'1A247C62','2013-08-06 13:27:30','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:56:31',10,NULL,NULL,NULL),
 (705,0,0,'51731376','2013-08-06 13:27:30','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:56:31',10,NULL,NULL,NULL);
INSERT INTO `power_subdevice_powerlog` (`id`,`pcon`,`temp`,`device_id`,`log_on`,`log_user`,`control_status`,`remark`,`lock`,`locktime`,`status`,`created_on`,`created_by`,`modified_on`,`modified_by`,`power_user_subdevices_id`) VALUES 
 (706,733,0,'48575E6E','2013-08-06 13:27:40','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:56:41',10,NULL,NULL,NULL),
 (707,0,0,'1A247C62','2013-08-06 13:27:40','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:56:41',10,NULL,NULL,NULL),
 (708,0,0,'51731376','2013-08-06 13:27:40','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:56:41',10,NULL,NULL,NULL),
 (709,726,0,'48575E6E','2013-08-06 13:27:50','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:56:51',10,NULL,NULL,NULL),
 (710,0,0,'1A247C62','2013-08-06 13:27:50','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:56:51',10,NULL,NULL,NULL),
 (711,0,0,'51731376','2013-08-06 13:27:50','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:56:51',10,NULL,NULL,NULL),
 (712,736,0,'48575E6E','2013-08-06 13:28:00','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:57:01',10,NULL,NULL,NULL),
 (713,0,0,'1A247C62','2013-08-06 13:28:00','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:57:01',10,NULL,NULL,NULL);
INSERT INTO `power_subdevice_powerlog` (`id`,`pcon`,`temp`,`device_id`,`log_on`,`log_user`,`control_status`,`remark`,`lock`,`locktime`,`status`,`created_on`,`created_by`,`modified_on`,`modified_by`,`power_user_subdevices_id`) VALUES 
 (714,0,0,'51731376','2013-08-06 13:28:00','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:57:01',10,NULL,NULL,NULL),
 (715,740,0,'48575E6E','2013-08-06 13:28:10','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:57:11',10,NULL,NULL,NULL),
 (716,0,0,'1A247C62','2013-08-06 13:28:10','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:57:11',10,NULL,NULL,NULL),
 (717,1,0,'51731376','2013-08-06 13:28:10','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:57:11',10,NULL,NULL,NULL),
 (718,719,0,'48575E6E','2013-08-06 13:28:20','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:57:21',10,NULL,NULL,NULL),
 (719,0,0,'1A247C62','2013-08-06 13:28:20','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:57:21',10,NULL,NULL,NULL),
 (720,1,0,'51731376','2013-08-06 13:28:20','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:57:21',10,NULL,NULL,NULL),
 (721,718,0,'48575E6E','2013-08-06 13:28:30','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:57:31',10,NULL,NULL,NULL);
INSERT INTO `power_subdevice_powerlog` (`id`,`pcon`,`temp`,`device_id`,`log_on`,`log_user`,`control_status`,`remark`,`lock`,`locktime`,`status`,`created_on`,`created_by`,`modified_on`,`modified_by`,`power_user_subdevices_id`) VALUES 
 (722,0,0,'1A247C62','2013-08-06 13:28:30','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:57:31',10,NULL,NULL,NULL),
 (723,1,0,'51731376','2013-08-06 13:28:30','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:57:31',10,NULL,NULL,NULL),
 (724,709,0,'48575E6E','2013-08-06 13:28:40','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:57:41',10,NULL,NULL,NULL),
 (725,0,0,'1A247C62','2013-08-06 13:28:40','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:57:41',10,NULL,NULL,NULL),
 (726,1,0,'51731376','2013-08-06 13:28:40','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:57:41',10,NULL,NULL,NULL),
 (727,709,0,'48575E6E','2013-08-06 13:28:50','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:57:51',10,NULL,NULL,NULL),
 (728,0,0,'1A247C62','2013-08-06 13:28:50','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:57:51',10,NULL,NULL,NULL),
 (729,0,0,'51731376','2013-08-06 13:28:50','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:57:51',10,NULL,NULL,NULL);
INSERT INTO `power_subdevice_powerlog` (`id`,`pcon`,`temp`,`device_id`,`log_on`,`log_user`,`control_status`,`remark`,`lock`,`locktime`,`status`,`created_on`,`created_by`,`modified_on`,`modified_by`,`power_user_subdevices_id`) VALUES 
 (730,718,0,'48575E6E','2013-08-06 13:29:00','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:58:01',10,NULL,NULL,NULL),
 (731,0,0,'1A247C62','2013-08-06 13:29:00','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:58:01',10,NULL,NULL,NULL),
 (732,1,0,'51731376','2013-08-06 13:29:00','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:58:01',10,NULL,NULL,NULL),
 (733,729,0,'48575E6E','2013-08-06 13:29:10','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:58:11',10,NULL,NULL,NULL),
 (734,0,0,'1A247C62','2013-08-06 13:29:10','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:58:11',10,NULL,NULL,NULL),
 (735,0,0,'51731376','2013-08-06 13:29:10','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:58:11',10,NULL,NULL,NULL),
 (736,702,0,'48575E6E','2013-08-06 13:29:20','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:58:21',10,NULL,NULL,NULL),
 (737,0,0,'1A247C62','2013-08-06 13:29:20','s1',3,NULL,NULL,NULL,NULL,'2013-08-06 13:58:21',10,NULL,NULL,NULL);
INSERT INTO `power_subdevice_powerlog` (`id`,`pcon`,`temp`,`device_id`,`log_on`,`log_user`,`control_status`,`remark`,`lock`,`locktime`,`status`,`created_on`,`created_by`,`modified_on`,`modified_by`,`power_user_subdevices_id`) VALUES 
 (738,0,0,'51731376','2013-08-06 13:29:20','s1',1,NULL,NULL,NULL,NULL,'2013-08-06 13:58:21',10,NULL,NULL,NULL);
/*!40000 ALTER TABLE `power_subdevice_powerlog` ENABLE KEYS */;


--
-- Table structure for table `powerman`.`power_user_device`
--

DROP TABLE IF EXISTS `power_user_device`;
CREATE TABLE `power_user_device` (
  `id` int(11) NOT NULL auto_increment,
  `device_telno` varchar(100) default NULL,
  `device_serialno` varchar(100) default NULL,
  `device_id` varchar(100) default NULL,
  `mac` varchar(100) default NULL,
  `port` int(5) default NULL,
  `ip` varchar(100) default NULL,
  `server_port` int(5) default NULL,
  `version` varchar(50) default NULL,
  `device_description` varchar(255) default NULL,
  `lock` tinyint(4) default NULL,
  `locktime` time default NULL,
  `status` tinyint(4) default NULL,
  `created_by` int(11) default NULL,
  `created_on` datetime default NULL,
  `modified_by` int(11) default NULL,
  `modified_on` datetime default NULL,
  `power_users_id` int(11) default NULL,
  `power_device_id` int(11) default NULL,
  `power_images_id` int(11) default NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_power_user_device_power_users1_idx` (`power_users_id`),
  KEY `fk_power_user_device_power_device1_idx` (`power_device_id`),
  KEY `fk_power_user_device_power_images1_idx` (`power_images_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `powerman`.`power_user_device`
--

/*!40000 ALTER TABLE `power_user_device` DISABLE KEYS */;
/*!40000 ALTER TABLE `power_user_device` ENABLE KEYS */;


--
-- Table structure for table `powerman`.`power_user_order`
--

DROP TABLE IF EXISTS `power_user_order`;
CREATE TABLE `power_user_order` (
  `id` int(11) NOT NULL,
  `package_id` int(11) default NULL,
  `device_id` varchar(45) default NULL,
  `start_on` datetime default NULL,
  `expire_on` datetime default NULL,
  `warn_on` datetime default NULL,
  `lock` tinyint(4) default NULL,
  `lock_time` time default NULL,
  `status` tinyint(4) default NULL,
  `work_status` tinyint(4) default NULL,
  `created_by` int(11) default NULL,
  `created_on` datetime default NULL,
  `modified_by` int(11) default NULL,
  `modified_on` datetime default NULL,
  `power_users_id` int(11) NOT NULL,
  `power_packges_id` int(11) NOT NULL,
  `power_user_payment_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`,`power_users_id`,`power_packges_id`,`power_user_payment_id`),
  KEY `fk_power_user_order_power_users1_idx` (`power_users_id`),
  KEY `fk_power_user_order_power_packges1_idx` (`power_packges_id`),
  KEY `fk_power_user_order_power_user_payment1_idx` (`power_user_payment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `powerman`.`power_user_order`
--

/*!40000 ALTER TABLE `power_user_order` DISABLE KEYS */;
/*!40000 ALTER TABLE `power_user_order` ENABLE KEYS */;


--
-- Table structure for table `powerman`.`power_user_payment`
--

DROP TABLE IF EXISTS `power_user_payment`;
CREATE TABLE `power_user_payment` (
  `id` int(11) NOT NULL auto_increment,
  `users_id` int(11) default NULL,
  `payment` double default NULL,
  `start_date` datetime default NULL,
  `end_date` datetime default NULL,
  `lock` tinyint(4) default NULL,
  `lock_time` time default NULL,
  `status` tinyint(4) default NULL,
  `created_by` int(11) default NULL,
  `created_on` datetime default NULL,
  `modified_by` int(11) default NULL,
  `modified_on` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `powerman`.`power_user_payment`
--

/*!40000 ALTER TABLE `power_user_payment` DISABLE KEYS */;
/*!40000 ALTER TABLE `power_user_payment` ENABLE KEYS */;


--
-- Table structure for table `powerman`.`power_user_roles`
--

DROP TABLE IF EXISTS `power_user_roles`;
CREATE TABLE `power_user_roles` (
  `id` int(11) NOT NULL auto_increment,
  `lock_time` time default NULL,
  `lock` tinyint(4) default NULL,
  `status` tinyint(4) default NULL,
  `created_by` int(11) default NULL,
  `created_on` datetime default NULL,
  `modified_by` int(11) default NULL,
  `modified_on` datetime default NULL,
  `power_users_id` int(11) NOT NULL,
  `power_roles_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`,`power_users_id`,`power_roles_id`),
  KEY `fk_power_user_roles_power_users_idx` (`power_users_id`),
  KEY `fk_power_user_roles_power_roles1_idx` (`power_roles_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `powerman`.`power_user_roles`
--

/*!40000 ALTER TABLE `power_user_roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `power_user_roles` ENABLE KEYS */;


--
-- Table structure for table `powerman`.`power_user_smscounter`
--

DROP TABLE IF EXISTS `power_user_smscounter`;
CREATE TABLE `power_user_smscounter` (
  `id` int(11) NOT NULL auto_increment,
  `users_id` int(11) default NULL,
  `device_id` int(11) default NULL,
  `start_date` datetime default NULL,
  `end_date` datetime default NULL,
  `description` varchar(255) default NULL,
  `lock` tinyint(4) default NULL,
  `lock_time` time default NULL,
  `status` tinyint(4) default NULL,
  `created_by` int(11) default NULL,
  `created_on` datetime default NULL,
  `modified_by` int(11) default NULL,
  `modified_on` datetime default NULL,
  `power_users_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`,`power_users_id`),
  KEY `fk_power_user_smscounter_power_users1_idx` (`power_users_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `powerman`.`power_user_smscounter`
--

/*!40000 ALTER TABLE `power_user_smscounter` DISABLE KEYS */;
/*!40000 ALTER TABLE `power_user_smscounter` ENABLE KEYS */;


--
-- Table structure for table `powerman`.`power_user_subdevices`
--

DROP TABLE IF EXISTS `power_user_subdevices`;
CREATE TABLE `power_user_subdevices` (
  `id` int(11) NOT NULL auto_increment,
  `device_id` varchar(100) default NULL,
  `device_description` varchar(255) default NULL,
  `device_serialno` varchar(100) default NULL,
  `lock` tinyint(4) default NULL,
  `locktime` time default NULL,
  `status` tinyint(4) default NULL,
  `created_by` int(11) default NULL,
  `created_on` datetime default NULL,
  `modified_by` int(11) default NULL,
  `modified_on` datetime default NULL,
  `power_user_device_power_users_id` int(11) default NULL,
  `power_user_device_power_device_id` int(11) default NULL,
  `power_images_id` int(11) default NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_power_user_subdevices_power_user_device1_idx` (`power_user_device_power_users_id`,`power_user_device_power_device_id`),
  KEY `fk_power_user_subdevices_power_images1_idx` (`power_images_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `powerman`.`power_user_subdevices`
--

/*!40000 ALTER TABLE `power_user_subdevices` DISABLE KEYS */;
/*!40000 ALTER TABLE `power_user_subdevices` ENABLE KEYS */;


--
-- Table structure for table `powerman`.`power_users`
--

DROP TABLE IF EXISTS `power_users`;
CREATE TABLE `power_users` (
  `id` int(11) NOT NULL auto_increment,
  `fname` varchar(255) default NULL,
  `lname` varchar(255) default NULL,
  `street` varchar(100) default NULL,
  `city` varchar(100) default NULL,
  `phoneno` varchar(100) default NULL,
  `email` varchar(255) default NULL,
  `password` varchar(255) default NULL,
  `role` tinyint(4) default NULL,
  `lock` tinyint(4) default NULL,
  `lock_time` time default NULL,
  `status` tinyint(4) default '1',
  `adminstatus` tinyint(4) default NULL,
  `change_pass` tinyint(4) default '0',
  `validate_email` tinyint(4) default '0',
  `validate_phone` tinyint(4) default '0',
  `registerstatus` tinyint(4) default '0',
  `email_code` varchar(100) default NULL,
  `phone_code` int(11) default NULL,
  `created_by` int(11) default NULL,
  `created_on` datetime default NULL,
  `modified_by` int(11) default NULL,
  `modified_on` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `powerman`.`power_users`
--

/*!40000 ALTER TABLE `power_users` DISABLE KEYS */;
INSERT INTO `power_users` (`id`,`fname`,`lname`,`street`,`city`,`phoneno`,`email`,`password`,`role`,`lock`,`lock_time`,`status`,`adminstatus`,`change_pass`,`validate_email`,`validate_phone`,`registerstatus`,`email_code`,`phone_code`,`created_by`,`created_on`,`modified_by`,`modified_on`) VALUES 
 (1,'Hasitha','Gamage','Katandola','Ratnapura',NULL,'admin@gmail.com','202cb962ac59075b964b07152d234b70',1,NULL,NULL,1,1,1,1,0,0,'sfgst45fsw54y65',34254,NULL,NULL,NULL,NULL),
 (2,'Hasitha','Gamage','Katandola','Ratnapura',NULL,'hasitha@gmail.com','202cb962ac59075b964b07152d234b70',2,NULL,NULL,1,1,0,0,0,0,'frg5632tgy64ge423',54265,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `power_users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
