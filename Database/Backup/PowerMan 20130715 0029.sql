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
  `start_time` datetime default NULL,
  `end_time` datetime default NULL,
  `pcon` double default NULL,
  `lock` tinyint(4) default NULL,
  `locktime` datetime default NULL,
  `status` tinyint(4) default NULL,
  `created_by` int(11) default NULL,
  `created_on` datetime default NULL,
  `modified_by` int(11) default NULL,
  `modified_on` datetime default NULL,
  `power_user_device_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`,`power_user_device_id`),
  KEY `fk_power_device_powerlog_power_user_device1_idx` (`power_user_device_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `powerman`.`power_device_powerlog`
--

/*!40000 ALTER TABLE `power_device_powerlog` DISABLE KEYS */;
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
  `lock` tinyint(4) default NULL,
  `status` tinyint(4) default NULL,
  `created_by` int(11) default NULL,
  `created_on` datetime default NULL,
  `modified_by` int(11) default NULL,
  `modified_on` datetime default NULL,
  `power_user_subdevices_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`,`power_user_subdevices_id`),
  KEY `fk_power_subdevice_control_power_user_subdevices1_idx` (`power_user_subdevices_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `powerman`.`power_subdevice_control`
--

/*!40000 ALTER TABLE `power_subdevice_control` DISABLE KEYS */;
/*!40000 ALTER TABLE `power_subdevice_control` ENABLE KEYS */;


--
-- Table structure for table `powerman`.`power_subdevice_log`
--

DROP TABLE IF EXISTS `power_subdevice_log`;
CREATE TABLE `power_subdevice_log` (
  `id` int(11) NOT NULL auto_increment,
  `control_status` tinyint(4) default NULL,
  `remark` varchar(255) default NULL,
  `log_user` int(11) default NULL,
  `log_on` datetime default NULL,
  `lock` tinyint(4) default NULL,
  `locktime` time default NULL,
  `status` tinyint(4) default NULL,
  `created_on` int(11) default NULL,
  `created_by` datetime default NULL,
  `modified_on` int(11) default NULL,
  `modified_by` datetime default NULL,
  `power_user_subdevices_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`,`power_user_subdevices_id`),
  KEY `fk_power_subdevice_log_power_user_subdevices1_idx` (`power_user_subdevices_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `powerman`.`power_subdevice_log`
--

/*!40000 ALTER TABLE `power_subdevice_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `power_subdevice_log` ENABLE KEYS */;


--
-- Table structure for table `powerman`.`power_user_device`
--

DROP TABLE IF EXISTS `power_user_device`;
CREATE TABLE `power_user_device` (
  `id` int(11) NOT NULL auto_increment,
  `device_description` varchar(255) default NULL,
  `device_telno` varchar(100) default NULL,
  `device_serialno` varchar(100) default NULL,
  `lock` tinyint(4) default NULL,
  `locktime` time default NULL,
  `status` tinyint(4) default NULL,
  `created_by` int(11) default NULL,
  `created_on` datetime default NULL,
  `modified_by` int(11) default NULL,
  `modified_on` datetime default NULL,
  `power_users_id` int(11) NOT NULL,
  `power_device_id` int(11) NOT NULL,
  `power_images_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`,`power_users_id`,`power_device_id`,`power_images_id`),
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
  `device_description` varchar(255) default NULL,
  `device_serialno` varchar(100) default NULL,
  `lock` tinyint(4) default NULL,
  `locktime` time default NULL,
  `status` tinyint(4) default NULL,
  `created_by` int(11) default NULL,
  `created_on` datetime default NULL,
  `modified_by` int(11) default NULL,
  `modified_on` datetime default NULL,
  `power_user_device_power_users_id` int(11) NOT NULL,
  `power_user_device_power_device_id` int(11) NOT NULL,
  `power_images_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`,`power_user_device_power_users_id`,`power_user_device_power_device_id`,`power_images_id`),
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
-- Dumping data for table `powerman`.`power_users`
--

/*!40000 ALTER TABLE `power_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `power_users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
