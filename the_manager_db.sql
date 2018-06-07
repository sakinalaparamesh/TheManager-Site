-- --------------------------------------------------------
-- Host:                         166.62.6.66
-- Server version:               5.6.39-cll-lve - MySQL Community Server (GPL)
-- Server OS:                    Linux
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for Prv_Dev_TheManager
CREATE DATABASE IF NOT EXISTS `Prv_Dev_TheManager` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `Prv_Dev_TheManager`;

-- Dumping structure for table Prv_Dev_TheManager.access
CREATE TABLE IF NOT EXISTS `access` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(40) NOT NULL DEFAULT '',
  `all_access` tinyint(1) NOT NULL DEFAULT '0',
  `controller` varchar(50) NOT NULL DEFAULT '',
  `date_created` datetime DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table Prv_Dev_TheManager.access: ~2 rows (approximately)
/*!40000 ALTER TABLE `access` DISABLE KEYS */;
INSERT INTO `access` (`id`, `key`, `all_access`, `controller`, `date_created`, `date_modified`) VALUES
	(1, 'gowc4c80owwc8cc00w44004o4c08cs4o448wsg0s', 1, 'RemsApi', NULL, '2018-06-06 02:41:24'),
	(2, 'ossw44sgokk0okw84o44og4okoo8g8os0c44oks0', 1, 'DcApi', NULL, '2018-06-06 02:37:44');
/*!40000 ALTER TABLE `access` ENABLE KEYS */;

-- Dumping structure for table Prv_Dev_TheManager.keys
CREATE TABLE IF NOT EXISTS `keys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `key` varchar(40) NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL DEFAULT '0',
  `is_private_key` tinyint(1) NOT NULL DEFAULT '0',
  `ip_addresses` text,
  `date_created` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table Prv_Dev_TheManager.keys: ~2 rows (approximately)
/*!40000 ALTER TABLE `keys` DISABLE KEYS */;
INSERT INTO `keys` (`id`, `user_id`, `key`, `level`, `ignore_limits`, `is_private_key`, `ip_addresses`, `date_created`) VALUES
	(1, 0, 'gowc4c80owwc8cc00w44004o4c08cs4o448wsg0s', 1, 1, 0, NULL, 1527832407),
	(2, 0, 'ossw44sgokk0okw84o44og4okoo8g8os0c44oks0', 1, 1, 0, NULL, 1527832508);
/*!40000 ALTER TABLE `keys` ENABLE KEYS */;

-- Dumping structure for table Prv_Dev_TheManager.logs
CREATE TABLE IF NOT EXISTS `logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uri` varchar(255) NOT NULL,
  `method` varchar(6) NOT NULL,
  `params` text,
  `api_key` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `time` int(11) NOT NULL,
  `rtime` float DEFAULT NULL,
  `authorized` varchar(1) NOT NULL,
  `response_code` smallint(3) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table Prv_Dev_TheManager.logs: ~0 rows (approximately)
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
/*!40000 ALTER TABLE `logs` ENABLE KEYS */;

-- Dumping structure for table Prv_Dev_TheManager.menu_role_mapping
CREATE TABLE IF NOT EXISTS `menu_role_mapping` (
  `mapping_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `effective_from` datetime DEFAULT NULL,
  `effective_to` datetime DEFAULT NULL,
  `isactive` varchar(50) DEFAULT 'Y',
  `created_by` int(11) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  PRIMARY KEY (`mapping_id`)
) ENGINE=InnoDB AUTO_INCREMENT=655 DEFAULT CHARSET=latin1;

-- Dumping data for table Prv_Dev_TheManager.menu_role_mapping: ~30 rows (approximately)
/*!40000 ALTER TABLE `menu_role_mapping` DISABLE KEYS */;
INSERT INTO `menu_role_mapping` (`mapping_id`, `menu_id`, `role_id`, `effective_from`, `effective_to`, `isactive`, `created_by`, `created_on`, `updated_by`, `updated_on`) VALUES
	(550, 13, 11, NULL, NULL, 'Y', 8, '2018-04-12 11:16:10', NULL, NULL),
	(551, 12, 11, NULL, NULL, 'Y', 8, '2018-04-12 11:16:10', NULL, NULL),
	(552, 15, 11, NULL, NULL, 'Y', 8, '2018-04-12 11:16:10', NULL, NULL),
	(553, 14, 11, NULL, NULL, 'Y', 8, '2018-04-12 11:16:10', NULL, NULL),
	(554, 17, 11, NULL, NULL, 'Y', 8, '2018-04-12 11:16:10', NULL, NULL),
	(555, 16, 11, NULL, NULL, 'Y', 8, '2018-04-12 11:16:10', NULL, NULL),
	(556, 19, 11, NULL, NULL, 'Y', 8, '2018-04-12 11:16:10', NULL, NULL),
	(557, 18, 11, NULL, NULL, 'Y', 8, '2018-04-12 11:16:10', NULL, NULL),
	(558, 0, 11, NULL, NULL, 'Y', 8, '2018-04-12 11:16:10', NULL, NULL),
	(634, 2, 5, NULL, NULL, 'Y', 8, '2018-05-09 14:29:21', NULL, NULL),
	(635, 1, 5, NULL, NULL, 'Y', 8, '2018-05-09 14:29:21', NULL, NULL),
	(636, 7, 5, NULL, NULL, 'Y', 8, '2018-05-09 14:29:21', NULL, NULL),
	(637, 4, 5, NULL, NULL, 'Y', 8, '2018-05-09 14:29:21', NULL, NULL),
	(638, 9, 5, NULL, NULL, 'Y', 8, '2018-05-09 14:29:21', NULL, NULL),
	(639, 8, 5, NULL, NULL, 'Y', 8, '2018-05-09 14:29:21', NULL, NULL),
	(640, 11, 5, NULL, NULL, 'Y', 8, '2018-05-09 14:29:21', NULL, NULL),
	(641, 10, 5, NULL, NULL, 'Y', 8, '2018-05-09 14:29:21', NULL, NULL),
	(642, 13, 5, NULL, NULL, 'Y', 8, '2018-05-09 14:29:21', NULL, NULL),
	(643, 12, 5, NULL, NULL, 'Y', 8, '2018-05-09 14:29:21', NULL, NULL),
	(644, 15, 5, NULL, NULL, 'Y', 8, '2018-05-09 14:29:21', NULL, NULL),
	(645, 14, 5, NULL, NULL, 'Y', 8, '2018-05-09 14:29:21', NULL, NULL),
	(646, 17, 5, NULL, NULL, 'Y', 8, '2018-05-09 14:29:21', NULL, NULL),
	(647, 16, 5, NULL, NULL, 'Y', 8, '2018-05-09 14:29:21', NULL, NULL),
	(648, 19, 5, NULL, NULL, 'Y', 8, '2018-05-09 14:29:21', NULL, NULL),
	(649, 18, 5, NULL, NULL, 'Y', 8, '2018-05-09 14:29:21', NULL, NULL),
	(650, 23, 5, NULL, NULL, 'Y', 8, '2018-05-09 14:29:21', NULL, NULL),
	(651, 24, 5, NULL, NULL, 'Y', 8, '2018-05-09 14:29:21', NULL, NULL),
	(652, 22, 5, NULL, NULL, 'Y', 8, '2018-05-09 14:29:22', NULL, NULL),
	(653, 21, 5, NULL, NULL, 'Y', 8, '2018-05-09 14:29:22', NULL, NULL),
	(654, 0, 5, NULL, NULL, 'Y', 8, '2018-05-09 14:29:22', NULL, NULL);
/*!40000 ALTER TABLE `menu_role_mapping` ENABLE KEYS */;

-- Dumping structure for table Prv_Dev_TheManager.tbl_clientbranchcontactdetails
CREATE TABLE IF NOT EXISTS `tbl_clientbranchcontactdetails` (
  `branchcontactid` int(11) NOT NULL AUTO_INCREMENT,
  `clientbranchid` int(11) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `personname` text NOT NULL,
  `designation` varchar(100) DEFAULT NULL,
  `phonenumber` varchar(20) DEFAULT NULL,
  `mobilenumber` varchar(20) NOT NULL,
  `email` text NOT NULL,
  `comments` text,
  `profilepic` varchar(255) DEFAULT NULL,
  `isbillingcontact` varchar(1) DEFAULT NULL,
  `greetings` varchar(255) DEFAULT NULL,
  `effectivefrom` datetime DEFAULT NULL,
  `effectiveto` datetime DEFAULT NULL COMMENT 'this will be deactivated date. from this date onward contact person is not available.',
  `isactive` varchar(1) NOT NULL COMMENT 'Y for active , N for inactive',
  `createdby` int(11) DEFAULT NULL,
  `createdon` datetime DEFAULT NULL,
  `updatedby` int(11) DEFAULT NULL,
  `updatedon` datetime DEFAULT NULL,
  PRIMARY KEY (`branchcontactid`),
  KEY `fk_clientbranch_contactdetails` (`clientbranchid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table Prv_Dev_TheManager.tbl_clientbranchcontactdetails: ~3 rows (approximately)
/*!40000 ALTER TABLE `tbl_clientbranchcontactdetails` DISABLE KEYS */;
INSERT INTO `tbl_clientbranchcontactdetails` (`branchcontactid`, `clientbranchid`, `title`, `personname`, `designation`, `phonenumber`, `mobilenumber`, `email`, `comments`, `profilepic`, `isbillingcontact`, `greetings`, `effectivefrom`, `effectiveto`, `isactive`, `createdby`, `createdon`, `updatedby`, `updatedon`) VALUES
	(1, 7, 'Mrs.', 'Naveen', 'Branch Head', NULL, '8341504428', 'krishnareddy.sanivarapu@provalley.net ', 'Rajesh Contact details', '', '', 'Deepavali', NULL, NULL, 'Y', 1, '2018-03-09 13:33:27', 8, '2018-05-31 06:12:46'),
	(2, 7, 'Mr', 'Rohit Reddy', 'Manager', NULL, '8341504429', 'nagamurali.garisapati@provalley.net', '', '', '', 'Chinese New Year', NULL, NULL, 'Y', 1, '2018-03-09 14:09:18', 8, '2018-04-13 06:46:13'),
	(3, 3, NULL, 'Manohar', 'Branch Incharge', NULL, '83415296', 'manohar@gmail.com', 'Manohar Comments', '', '', 'Chinese New Year', NULL, NULL, 'Y', 1, '2018-03-10 09:04:06', 1, '2018-03-12 11:42:41'),
	(4, 12, 'Mr.', 'Sri Kumar', 'Manager', NULL, '', 'srikumar.sanjamgari@gmail.com', '', '', '', 'Hari Raya', NULL, NULL, 'Y', 8, '2018-03-19 11:29:50', 8, '2018-04-17 12:54:28'),
	(5, 9, 'Ms', 'Sruthi', 'UI', NULL, '78956464', 'sruthi.kunam@provalley.net', 'hi', '', '', 'Hari Raya', NULL, NULL, 'Y', 8, '2018-04-16 10:08:03', NULL, NULL);
/*!40000 ALTER TABLE `tbl_clientbranchcontactdetails` ENABLE KEYS */;

-- Dumping structure for table Prv_Dev_TheManager.tbl_client_product_mapping
CREATE TABLE IF NOT EXISTS `tbl_client_product_mapping` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clientid` int(11) NOT NULL DEFAULT '0',
  `productid` int(11) NOT NULL DEFAULT '0',
  `isactive` varchar(1) NOT NULL DEFAULT 'Y',
  `createdby` int(11) NOT NULL DEFAULT '0',
  `createdon` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedby` int(11) NOT NULL DEFAULT '0',
  `updatedon` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- Dumping data for table Prv_Dev_TheManager.tbl_client_product_mapping: ~2 rows (approximately)
/*!40000 ALTER TABLE `tbl_client_product_mapping` DISABLE KEYS */;
INSERT INTO `tbl_client_product_mapping` (`id`, `clientid`, `productid`, `isactive`, `createdby`, `createdon`, `updatedby`, `updatedon`) VALUES
	(18, 29, 5, 'Y', 8, '2018-03-19 04:56:07', 0, '0000-00-00 00:00:00'),
	(19, 29, 8, 'Y', 8, '2018-03-19 04:56:07', 0, '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `tbl_client_product_mapping` ENABLE KEYS */;

-- Dumping structure for table Prv_Dev_TheManager.tbl_email_reports
CREATE TABLE IF NOT EXISTS `tbl_email_reports` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `template_id` varchar(255) NOT NULL,
  `clientid` int(11) NOT NULL,
  `branchid` int(11) NOT NULL,
  `contactid` int(11) NOT NULL,
  `to_email` varchar(255) DEFAULT NULL,
  `sent_on` datetime NOT NULL,
  `sent_by` int(11) NOT NULL,
  `sent_status` int(11) NOT NULL COMMENT '0-not sent, 1-sent',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=90 DEFAULT CHARSET=latin1;

-- Dumping data for table Prv_Dev_TheManager.tbl_email_reports: 89 rows
/*!40000 ALTER TABLE `tbl_email_reports` DISABLE KEYS */;
INSERT INTO `tbl_email_reports` (`id`, `template_id`, `clientid`, `branchid`, `contactid`, `to_email`, `sent_on`, `sent_by`, `sent_status`) VALUES
	(1, 'REMS_INTRO', 29, 9, 0, 'jayaberi@gmail.com', '2018-03-16 13:11:14', 8, 0),
	(2, 'REMS_INTRO', 13, 8, 0, 'jogendhra@gmail.com', '2018-03-16 13:11:14', 8, 0),
	(3, 'REMS_INTRO', 11, 7, 1, 'rajesh@gmail.com', '2018-03-16 13:11:14', 8, 0),
	(4, 'REMS_INTRO', 11, 7, 2, 'rohit@gmail.com', '2018-03-16 13:11:14', 8, 0),
	(5, 'REMS_INTRO', 2, 5, 0, 'mahender@gmail.com', '2018-03-16 13:11:15', 8, 0),
	(6, 'DIGITAL_CONDO_INTRO', 29, 9, 0, 'jayaberi@gmail.com', '2018-03-16 13:12:48', 8, 0),
	(7, 'DIGITAL_CONDO_INTRO', 13, 8, 0, 'jogendhra@gmail.com', '2018-03-16 13:12:48', 8, 0),
	(8, 'DIGITAL_CONDO_INTRO', 11, 7, 1, 'rajesh@gmail.com', '2018-03-16 13:12:48', 8, 0),
	(9, 'DIGITAL_CONDO_INTRO', 11, 7, 2, 'rohit@gmail.com', '2018-03-16 13:12:48', 8, 0),
	(10, 'DIGITAL_CONDO_INTRO', 2, 5, 0, 'mahender@gmail.com', '2018-03-16 13:12:49', 8, 0),
	(11, 'DIGITAL_CONDO_INTRO', 7, 10, 0, 'abc@gmail.com', '2018-03-16 13:12:49', 8, 0),
	(12, 'DIGITAL_CONDO_INTRO', 14, 6, 0, 'mukesh@gmail.com', '2018-03-16 13:12:49', 8, 0),
	(13, 'REMS_INTRO', 29, 9, 0, 'jayaberi@gmail.com', '2018-03-19 11:58:45', 8, 0),
	(14, 'REMS_INTRO', 13, 8, 0, 'jogendhra@gmail.com', '2018-03-19 11:58:45', 8, 0),
	(15, 'REMS_INTRO', 29, 9, 0, 'jayaberi@gmail.com', '2018-03-19 12:10:40', 8, 0),
	(16, 'REMS_INTRO', 33, 12, 0, 'skreddy@saffroninfosys.net', '2018-03-19 11:11:34', 8, 0),
	(17, 'REMS_INTRO', 33, 12, 0, 'skreddy@saffroninfosys.net', '2018-03-19 11:13:12', 8, 0),
	(18, 'REMS_INTRO', 29, 9, 0, 'jayaberi@gmail.com', '2018-03-19 12:15:38', 8, 0),
	(19, 'REMS_INTRO', 33, 12, 0, 'skreddy@saffroninfosys.net', '2018-03-19 11:16:15', 8, 0),
	(20, 'REMS_INTRO', 29, 9, 0, 'jayaberi@gmail.com', '2018-03-19 12:18:18', 8, 0),
	(21, 'REMS_INTRO', 33, 12, 0, 'skreddy@saffroninfosys.net', '2018-03-19 11:19:37', 8, 0),
	(22, 'REMS_INTRO', 33, 12, 0, 'skreddy@saffroninfosys.net', '2018-03-19 11:20:16', 8, 0),
	(23, 'REMS_INTRO', 33, 12, 0, 'skreddy@saffroninfosys.net', '2018-03-19 11:22:39', 8, 0),
	(24, 'REMS_INTRO', 33, 12, 0, 'skreddy@saffroninfosys.net', '2018-03-19 11:25:19', 8, 0),
	(25, 'REMS_INTRO', 33, 12, 4, 'srikumar.sanjamgari@gmail.com', '2018-03-19 11:30:18', 8, 0),
	(26, 'REMS_INTRO', 17, 13, 0, 'prvnarenderreddyvanga@gmail.com', '2018-03-21 13:05:25', 8, 1),
	(27, 'REMS_INTRO', 33, 12, 4, 'srikumar.sanjamgari@gmail.com', '2018-03-21 13:06:13', 8, 1),
	(28, 'REMS_INTRO', 17, 13, 0, 'narenderreddy.vanga@provalley.net', '2018-03-21 13:07:30', 8, 1),
	(29, 'REMS_INTRO', 11, 7, 1, 'narenderreddy.vanga@provalley.net', '2018-03-21 13:09:38', 8, 1),
	(30, '5ad03c9f75c6c', 29, 9, 0, 'jayaberi@gmail.com', '2018-04-13 07:44:06', 8, 0),
	(31, '5ad03c9f75c6c', 29, 9, 0, 'jayaberi@gmail.com', '2018-04-13 07:45:02', 8, 0),
	(32, '5ad03c9f75c6c', 29, 9, 0, 'jayaberi@gmail.com', '2018-04-13 07:54:37', 8, 0),
	(33, '5ad03c9f75c6c', 13, 8, 0, 'jogendhra@gmail.com', '2018-04-13 07:54:38', 8, 0),
	(34, '5ad03c9f75c6c', 11, 7, 1, 'narenderreddy.vanga@provalley.net', '2018-04-13 07:54:39', 8, 0),
	(35, '5ad03c9f75c6c', 29, 9, 0, 'jayaberi@gmail.com', '2018-04-13 06:08:53', 8, 1),
	(36, '5ad049e50a2fc', 29, 9, 0, 'jayaberi@gmail.com', '2018-04-13 06:13:30', 8, 1),
	(37, '5ad049e50a2fc', 29, 9, 0, 'jayaberi@gmail.com', '2018-04-13 06:37:04', 8, 1),
	(38, '5ad049e50a2fc', 11, 7, 1, 'nandharam.naveen@provalley.net', '2018-04-13 06:46:25', 8, 0),
	(39, '5ad049e50a2fc', 11, 7, 2, 'nagamurali.garisapati@provalley.net', '2018-04-13 06:46:25', 8, 0),
	(40, '5ad049e50a2fc', 11, 7, 1, 'nandharam.naveen@provalley.net', '2018-04-13 06:49:52', 8, 1),
	(41, '5ad049e50a2fc', 11, 7, 2, 'nagamurali.garisapati@provalley.net', '2018-04-13 06:49:52', 8, 1),
	(42, '5ad049e50a2fc', 11, 7, 1, 'nandharam.naveen@provalley.net', '2018-04-13 06:58:38', 8, 1),
	(43, '5ad049e50a2fc', 11, 7, 2, 'nagamurali.garisapati@provalley.net', '2018-04-13 06:58:38', 8, 1),
	(44, '5ad464697b8d8', 11, 7, 1, 'nandharam.naveen@provalley.net', '2018-04-16 09:02:06', 8, 1),
	(45, '5ad464697b8d8', 11, 7, 2, 'nagamurali.garisapati@provalley.net', '2018-04-16 09:02:06', 8, 1),
	(46, '5ad46caef098e', 11, 7, 1, 'nandharam.naveen@provalley.net', '2018-04-16 09:31:51', 8, 1),
	(47, '5ad46caef098e', 11, 7, 2, 'nagamurali.garisapati@provalley.net', '2018-04-16 09:31:51', 8, 1),
	(48, '5ad46caef098e', 11, 7, 1, 'nandharam.naveen@provalley.net', '2018-04-16 09:33:36', 8, 1),
	(49, '5ad46caef098e', 11, 7, 1, 'nandharam.naveen@gmail.com', '2018-04-16 09:35:19', 8, 1),
	(50, '5ad4702c35b08', 11, 7, 1, 'nandharam.naveen@gmail.com', '2018-04-16 09:47:05', 8, 1),
	(51, '5ad4702c35b08', 11, 7, 2, 'nagamurali.garisapati@provalley.net', '2018-04-16 09:47:05', 8, 1),
	(52, '5ad4702c35b08', 11, 7, 1, 'nandharam.naveen@gmail.com', '2018-04-16 09:48:54', 8, 1),
	(53, '5ad4702c35b08', 11, 7, 2, 'nagamurali.garisapati@provalley.net', '2018-04-16 09:48:54', 8, 1),
	(54, '5ad472f01b7b8', 11, 7, 1, 'nandharam.naveen@gmail.com', '2018-04-16 10:03:16', 8, 1),
	(55, '5ad472f01b7b8', 11, 7, 2, 'nagamurali.garisapati@provalley.net', '2018-04-16 10:03:16', 8, 1),
	(56, '5ad472f01b7b8', 11, 7, 1, 'nandharam.naveen@gmail.com', '2018-04-16 10:04:32', 8, 1),
	(57, '5ad472f01b7b8', 11, 7, 2, 'nagamurali.garisapati@provalley.net', '2018-04-16 10:04:32', 8, 1),
	(58, '5ad472f01b7b8', 29, 9, 5, 'sruthi.kunam@provalley.net', '2018-04-16 10:08:13', 8, 1),
	(59, '5ad464697b8d8', 29, 9, 5, 'sruthi.kunam@provalley.net', '2018-04-16 10:12:00', 8, 1),
	(60, '5ad479954c133', 29, 9, 5, 'sruthi.kunam@provalley.net', '2018-04-16 10:55:12', 8, 1),
	(61, '5ad48239bf429', 29, 9, 5, 'sruthi.kunam@provalley.net', '2018-04-16 11:07:41', 8, 1),
	(62, '5ad48239bf429', 11, 7, 1, 'nandharam.naveen@provalley.net', '2018-04-16 11:15:12', 8, 1),
	(63, '5ad479954c133', 11, 7, 1, 'nandharam.naveen@provalley.net', '2018-04-16 11:15:22', 8, 1),
	(64, '5ad464697b8d8', 11, 7, 1, 'nandharam.naveen@provalley.net', '2018-04-17 12:42:45', 8, 1),
	(65, '5ad464697b8d8', 11, 7, 2, 'nagamurali.garisapati@provalley.net', '2018-04-17 12:42:45', 8, 1),
	(66, '5ad464697b8d8', 11, 7, 1, 'nandharam.naveen@provalley.net', '2018-04-17 12:43:43', 8, 1),
	(67, '5ad464697b8d8', 11, 7, 2, 'nagamurali.garisapati@provalley.net', '2018-04-17 12:43:43', 8, 1),
	(68, '5ad464697b8d8', 11, 7, 1, 'nandharam.naveen@provalley.net', '2018-04-17 12:45:10', 8, 1),
	(69, '5ad464697b8d8', 33, 12, 4, 'srikumar.sanjamgari@gmail.com', '2018-04-17 12:46:02', 8, 1),
	(70, '5ad464697b8d8', 33, 12, 4, 'sri@provalley.net', '2018-04-17 12:47:43', 8, 1),
	(71, '5ad049e50a2fc', 11, 7, 1, 'nandharam.naveen@provalley.net', '2018-04-17 12:47:57', 8, 1),
	(72, '5ad46caef098e', 11, 7, 1, 'nandharam.naveen@provalley.net', '2018-04-17 12:48:22', 8, 1),
	(73, '5ad049e50a2fc', 11, 7, 1, 'nandharam.naveen@provalley.net', '2018-04-17 12:48:46', 8, 1),
	(74, '5ad4702c35b08', 11, 7, 1, 'nandharam.naveen@provalley.net', '2018-04-17 12:49:14', 8, 1),
	(75, '5ad472f01b7b8', 11, 7, 1, 'nandharam.naveen@provalley.net', '2018-04-17 12:49:29', 8, 1),
	(76, '5ad472f01b7b8', 33, 12, 4, 'sri@provalley.net', '2018-04-17 12:50:15', 8, 1),
	(77, '5ad479954c133', 11, 7, 1, 'nandharam.naveen@provalley.net', '2018-04-17 12:50:40', 8, 1),
	(78, '5ad479954c133', 33, 12, 4, 'sri@provalley.net', '2018-04-17 12:51:07', 8, 1),
	(79, '5ad479954c133', 33, 12, 4, 'srikumar.sanjamgari@gmail.com', '2018-04-17 12:51:40', 8, 1),
	(80, '5ad48239bf429', 11, 7, 1, 'nandharam.naveen@provalley.net', '2018-04-17 12:51:49', 8, 1),
	(81, '5ad4702c35b08', 33, 12, 4, 'srikumar.sanjamgari@gmail.com', '2018-04-17 12:53:19', 8, 1),
	(82, '5ad4702c35b08', 33, 12, 4, 'sri@provalley.net', '2018-04-17 12:54:15', 8, 1),
	(83, '5ad4702c35b08', 33, 12, 4, 'srikumar.sanjamgari@gmail.com', '2018-04-17 12:54:37', 8, 1),
	(84, '5ad464697b8d8', 11, 7, 1, 'nandharam.naveen@provalley.net', '2018-05-30 04:44:05', 8, 1),
	(85, '5ad464697b8d8', 11, 7, 2, 'nagamurali.garisapati@provalley.net', '2018-05-30 04:44:05', 8, 1),
	(86, '5ad464697b8d8', 11, 7, 1, 'nandharam.naveen@provalley.net', '2018-05-30 04:46:30', 8, 1),
	(87, '5ad464697b8d8', 11, 7, 1, 'nandharam.naveen@provalley.net', '2018-05-30 04:48:15', 8, 1),
	(88, '5ad464697b8d8', 11, 7, 2, 'nagamurali.garisapati@provalley.net', '2018-05-30 04:48:15', 8, 1),
	(89, '5ad464697b8d8', 11, 7, 1, 'krishnareddy.sanivarapu@provalley.net ', '2018-05-31 06:13:08', 8, 1);
/*!40000 ALTER TABLE `tbl_email_reports` ENABLE KEYS */;

-- Dumping structure for table Prv_Dev_TheManager.tbl_email_templates
CREATE TABLE IF NOT EXISTS `tbl_email_templates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `template_id` varchar(255) NOT NULL,
  `template_title` text NOT NULL,
  `subject` text NOT NULL,
  `message` longtext NOT NULL,
  `template_type` varchar(255) NOT NULL COMMENT 'product or general or greetings',
  `productids` varchar(255) NOT NULL,
  `email_status` int(11) DEFAULT '0' COMMENT '100:draft;101:submited',
  `isactive` varchar(1) NOT NULL DEFAULT 'Y',
  `createdby` int(11) NOT NULL,
  `createdon` datetime NOT NULL,
  `updatedby` int(11) NOT NULL,
  `updatedon` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

-- Dumping data for table Prv_Dev_TheManager.tbl_email_templates: ~9 rows (approximately)
/*!40000 ALTER TABLE `tbl_email_templates` DISABLE KEYS */;
INSERT INTO `tbl_email_templates` (`id`, `template_id`, `template_title`, `subject`, `message`, `template_type`, `productids`, `email_status`, `isactive`, `createdby`, `createdon`, `updatedby`, `updatedon`) VALUES
	(3, '5ad03c9f75c6c', 'SAMPLE TEST', 'SAMPLE TEST', '5ad03c9f75c6c', 'general', '', 101, 'Y', 8, '2018-04-13 07:14:07', 8, '2018-05-30 05:05:45'),
	(4, '5ad049e50a2fc', 'Digital Condo App Promotion', 'Digital Condo App Promotion', '5ad049e50a2fc', 'product', '11', 101, 'Y', 8, '2018-04-13 06:10:45', 8, '2018-04-16 09:09:21'),
	(5, '5ad464697b8d8', 'About REMS', 'About REMS', '5ad464697b8d8', 'product', '5', 101, 'Y', 8, '2018-04-16 08:52:57', 8, '2018-04-17 12:44:59'),
	(6, '5ad46caef098e', 'News Letter', 'News Letter', '5ad46caef098e', 'product', '5', 101, 'Y', 8, '2018-04-16 09:28:14', 8, '2018-04-16 09:31:13'),
	(7, '5ad4702c35b08', 'Best Properties', 'Best Properties', '5ad4702c35b08', 'product', '5', 101, 'Y', 8, '2018-04-16 09:43:08', 8, '2018-04-16 09:48:44'),
	(8, '5ad472f01b7b8', 'Manage your client and work with one click', ' Manage your client and work with one click', '5ad472f01b7b8', 'product', '11', 101, 'Y', 8, '2018-04-16 09:54:56', 8, '2018-04-18 03:35:32'),
	(9, '5ad479954c133', 'Now manage our office work', 'Now manage our office work', '5ad479954c133', 'general', '', 101, 'Y', 8, '2018-04-16 10:23:17', 8, '2018-04-16 10:53:34'),
	(11, '5ad48239bf429', 'All In One App', 'All In One App', '5ad48239bf429', 'general', '', 101, 'Y', 8, '2018-04-16 11:00:09', 8, '2018-04-17 11:00:00'),
	(21, '5b0f96146791a', 'provalleyemail', 'provalleyemail', '5b0f96146791a', '', '', 101, 'Y', 8, '2018-05-31 06:28:36', 8, '2018-05-31 06:29:51'),
	(24, '5b1672bc82bc3', 'asdas', 'sddds', '5b1672bc82bc3', 'general', '', 101, 'Y', 8, '2018-06-05 13:23:40', 8, '2018-06-05 13:24:37'),
	(25, '5b1672fb40905', '', '', '', '', '', 100, 'Y', 8, '2018-06-05 13:24:43', 0, '0000-00-00 00:00:00'),
	(26, '5b1672fb40905', '', '', '', '', '', 100, 'Y', 10, '2018-06-05 13:24:43', 0, '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `tbl_email_templates` ENABLE KEYS */;

-- Dumping structure for table Prv_Dev_TheManager.tbl_mng_agentmaster
CREATE TABLE IF NOT EXISTS `tbl_mng_agentmaster` (
  `agentid` int(11) NOT NULL AUTO_INCREMENT,
  `agentname` varchar(200) NOT NULL,
  `ic/passportnumber` varchar(100) DEFAULT NULL,
  `company` varchar(500) DEFAULT NULL,
  `exclusieveagent` varchar(200) DEFAULT NULL,
  `contactno` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(1000) DEFAULT NULL,
  `comments` varchar(2000) DEFAULT NULL,
  `profilepic` varchar(2000) DEFAULT NULL,
  `isactive` varchar(1) DEFAULT NULL,
  `effectivefrom` datetime DEFAULT NULL,
  `effectiveto` datetime DEFAULT NULL,
  `createdby` int(11) DEFAULT NULL,
  `createdon` datetime DEFAULT NULL,
  `updatedby` int(11) DEFAULT NULL,
  `updatedon` datetime DEFAULT NULL,
  PRIMARY KEY (`agentid`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- Dumping data for table Prv_Dev_TheManager.tbl_mng_agentmaster: 4 rows
/*!40000 ALTER TABLE `tbl_mng_agentmaster` DISABLE KEYS */;
INSERT INTO `tbl_mng_agentmaster` (`agentid`, `agentname`, `ic/passportnumber`, `company`, `exclusieveagent`, `contactno`, `email`, `address`, `comments`, `profilepic`, `isactive`, `effectivefrom`, `effectiveto`, `createdby`, `createdon`, `updatedby`, `updatedon`) VALUES
	(10, 'Mahesah', '', '', 'on', '', '', '', '', '', 'Y', NULL, NULL, NULL, '2018-03-10 05:58:40', NULL, NULL),
	(11, 'Rjahess', '', '', 'on', '', '', '', '', '', 'Y', NULL, NULL, NULL, '2018-03-10 05:58:57', NULL, NULL),
	(12, 'Raja', '123445', 'Provalley', 'on', '9542179180', 'mail@mail.com', 'KP', 'One of the best', '', 'Y', NULL, NULL, NULL, '2018-03-10 06:19:13', NULL, NULL),
	(14, 'Raj', '32525254', 'Raj Company', 'on', '9948589966', 'raj@gmail.com', 'Raj address', 'Raj comments', '', 'Y', NULL, NULL, NULL, '2018-03-10 07:30:20', NULL, NULL);
/*!40000 ALTER TABLE `tbl_mng_agentmaster` ENABLE KEYS */;

-- Dumping structure for table Prv_Dev_TheManager.tbl_mng_clientbranchmaster
CREATE TABLE IF NOT EXISTS `tbl_mng_clientbranchmaster` (
  `branchid` int(11) NOT NULL AUTO_INCREMENT,
  `clientid` int(11) DEFAULT NULL,
  `location` text NOT NULL,
  `address` text NOT NULL,
  `phonenumber` varchar(20) NOT NULL,
  `faxnumber` varchar(20) NOT NULL,
  `email` text NOT NULL,
  `weburl` varchar(255) NOT NULL,
  `createdby` int(11) DEFAULT NULL,
  `createdon` datetime DEFAULT NULL,
  `updatedby` int(11) DEFAULT NULL,
  `updatedon` datetime DEFAULT NULL,
  `effectivefrom` datetime DEFAULT NULL,
  `effectiveto` datetime DEFAULT NULL,
  `isactive` varchar(1) NOT NULL COMMENT 'Y for active , N for inactive',
  PRIMARY KEY (`branchid`),
  KEY `fk_client_branchmaster` (`clientid`),
  CONSTRAINT `fk_client_branchmaster` FOREIGN KEY (`clientid`) REFERENCES `tbl_mng_clientmaster` (`clientid`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Dumping data for table Prv_Dev_TheManager.tbl_mng_clientbranchmaster: ~9 rows (approximately)
/*!40000 ALTER TABLE `tbl_mng_clientbranchmaster` DISABLE KEYS */;
INSERT INTO `tbl_mng_clientbranchmaster` (`branchid`, `clientid`, `location`, `address`, `phonenumber`, `faxnumber`, `email`, `weburl`, `createdby`, `createdon`, `updatedby`, `updatedon`, `effectivefrom`, `effectiveto`, `isactive`) VALUES
	(2, NULL, 'sdf', 'sdf', 'sdf', '', 'sdfs@sdf', '', NULL, '2018-03-08 13:05:23', NULL, NULL, NULL, NULL, 'Y'),
	(3, 30, 'Kukatpally', 'Kukatpally, Hyderabad, Telangana', '9948580090', '040-98877777', 'ambhani@gmail.com', '', 1, '2018-03-09 11:19:08', NULL, NULL, NULL, NULL, 'Y'),
	(4, 19, 'Begumpet', 'Begumpet, Hyderabad', '8341504429', '040-45678', 'janath@gmail.com', '', 1, '2018-03-09 11:23:29', NULL, NULL, NULL, NULL, 'Y'),
	(5, 2, 'Ameerpet', 'Ameerpet, Hyderabad', '040-344456', '040-345345', 'mahender@gmail.com', '', 1, '2018-03-09 11:26:09', NULL, '2018-03-15 08:23:56', NULL, NULL, 'Y'),
	(6, 14, 'Panjagutta', 'Panjagutta, Hyderabad', '040-667677', '040-6433456', 'mukesh@gmail.com', '', 1, '2018-03-09 11:27:37', NULL, NULL, NULL, NULL, 'Y'),
	(7, 11, 'Vizag', 'Vizag, Andhrapradesh', '040-23423432', '040-432423423', 'navyasrinandyala.tester@gmail.com', '', 1, '2018-03-09 11:29:48', 8, '2018-04-17 11:49:13', NULL, NULL, 'Y'),
	(8, 13, 'Secunderabad', 'Secunderabad, Hyderabad, Telangana', '040-4523423', '040-45435435', 'jogendhra@gmail.com', '', 1, '2018-03-09 11:32:20', NULL, NULL, NULL, NULL, 'Y'),
	(9, 29, 'Amaravathi', 'Amaravathi, Andhrapradesh', '040-34324234', '040-23423432', 'jayaberi@gmail.com', 'http://themanager.provalley.net', 1, '2018-03-13 07:04:02', 1, '2018-03-13 07:17:11', NULL, NULL, 'Y'),
	(10, 7, 'Kuala Lumpur', 'Bandar Tasik Selatan, 57100 Kuala Lumpur, Federal Territory of Kuala Lumpur, Malaysia', '', '', 'abc@gmail.com', '', 1, '2018-03-13 07:14:04', NULL, '2018-03-16 07:56:38', NULL, NULL, 'Y'),
	(11, 29, 'Vijayawada', 'Vijayawada, Andhrapradesh, Telangana', '', '', '', '', 1, '2018-03-13 07:17:52', NULL, NULL, NULL, NULL, 'Y'),
	(12, 33, 'Kuala Lumpur', 'No. 6-2, 2nd Floor, Block K, Jalan GC 14, Glomac Cyberjaya,, Cyber 4, 63000 Cyberjaya, Selangor, Malaysia', '', '', 'skreddy@saffroninfosys.net', '', 8, '2018-03-19 10:48:16', NULL, NULL, NULL, NULL, 'Y'),
	(13, 17, 'Kukatpally', 'Kukatpally, Hyderabad, Telangana', '', '', 'narenderreddy.vanga@provalley.net', '', 8, '2018-03-21 11:11:16', 8, '2018-03-21 13:07:20', NULL, NULL, 'Y');
/*!40000 ALTER TABLE `tbl_mng_clientbranchmaster` ENABLE KEYS */;

-- Dumping structure for table Prv_Dev_TheManager.tbl_mng_clientmaster
CREATE TABLE IF NOT EXISTS `tbl_mng_clientmaster` (
  `clientid` int(11) NOT NULL AUTO_INCREMENT,
  `client_type` int(11) NOT NULL,
  `clientname` text NOT NULL,
  `clientdescription` text,
  `clientcode` varchar(50) DEFAULT NULL,
  `is_individual` varchar(1) NOT NULL DEFAULT 'N',
  `isactive` varchar(1) NOT NULL,
  `createdby` int(11) DEFAULT NULL,
  `createdon` datetime DEFAULT NULL,
  `updatedby` int(11) DEFAULT NULL,
  `updatedon` datetime DEFAULT NULL,
  PRIMARY KEY (`clientid`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

-- Dumping data for table Prv_Dev_TheManager.tbl_mng_clientmaster: ~30 rows (approximately)
/*!40000 ALTER TABLE `tbl_mng_clientmaster` DISABLE KEYS */;
INSERT INTO `tbl_mng_clientmaster` (`clientid`, `client_type`, `clientname`, `clientdescription`, `clientcode`, `is_individual`, `isactive`, `createdby`, `createdon`, `updatedby`, `updatedon`) VALUES
	(1, 0, 'Naren Soft Sol', 'Naren Soft Sol desc', 'NSS001', 'N', 'Y', 1, '2018-03-07 09:04:31', NULL, NULL),
	(2, 0, 'Mahender soft sol', 'Mahender soft sol desc', 'MSS001', 'N', 'Y', 1, '2018-03-07 10:57:03', NULL, NULL),
	(3, 0, 'Surender Soft Solutions', '', '', 'N', 'Y', 1, '2018-03-07 11:07:49', NULL, NULL),
	(4, 0, 'Pankaj Solutions', '', '', 'N', 'Y', 1, '2018-03-07 11:13:42', NULL, NULL),
	(5, 0, 'Sri Rama Enterprises', '', '', 'N', 'Y', 1, '2018-03-07 11:15:45', NULL, NULL),
	(6, 0, 'Sunrise solutions', '', '', 'N', 'Y', 1, '2018-03-07 11:16:35', NULL, NULL),
	(7, 0, 'Mahesh Solutions', '', '', 'N', 'Y', 1, '2018-03-07 11:40:37', NULL, NULL),
	(8, 0, 'Suresh Soft Sol', '', '', 'N', 'Y', 1, '2018-03-07 11:44:37', NULL, NULL),
	(9, 0, 'Suresh Enteprises', '', '', 'N', 'Y', 1, '2018-03-07 11:46:38', NULL, NULL),
	(10, 0, 'Sukumar Solutions', '', '', 'N', 'Y', 1, '2018-03-07 11:47:53', NULL, NULL),
	(11, 0, 'Josh Academy', '', '', 'N', 'Y', 1, '2018-03-07 11:51:11', NULL, NULL),
	(12, 0, 'The Great Malaysia Company', '', '', 'N', 'Y', 1, '2018-03-07 11:53:39', NULL, NULL),
	(13, 0, 'Jogendhra Soft Sol', '', '', 'N', 'Y', 1, '2018-03-07 11:54:52', NULL, NULL),
	(14, 0, 'Mukesh Solutions', '', '', 'N', 'Y', 1, '2018-03-07 11:57:43', NULL, NULL),
	(15, 0, 'Sunder Solutions', '', '', 'N', 'Y', 1, '2018-03-07 12:00:40', NULL, NULL),
	(16, 0, 'Rajesh Solutions', '', '', 'N', 'Y', 1, '2018-03-07 12:01:53', NULL, NULL),
	(17, 0, 'Sagar Solutions', '', '', 'N', 'Y', 1, '2018-03-07 12:02:28', NULL, NULL),
	(18, 0, 'Jagan Mohan Solutions', 'Jagan Mohan Solutions descr', 'JMS001', 'N', 'N', 1, '2018-03-07 12:02:55', 1, '2018-03-08 10:55:18'),
	(19, 0, 'Janatha Solutions', '', '', 'N', 'N', 1, '2018-03-07 12:04:18', 1, '2018-03-08 10:54:03'),
	(20, 0, 'Panchamuka Solutions', '', '', 'N', 'Y', 1, '2018-03-07 12:26:54', NULL, NULL),
	(21, 0, 'Raja Solutions', '', '', 'N', 'Y', 1, '2018-03-07 12:27:23', NULL, NULL),
	(22, 0, 'Umesh Builders', '', '', 'N', 'Y', 1, '2018-03-07 13:55:37', NULL, NULL),
	(23, 0, 'Srujan Solutions', '', '', 'N', 'Y', 1, '2018-03-07 14:00:02', NULL, NULL),
	(24, 0, 'Parivar Solutions', '', '', 'N', 'Y', 1, '2018-03-07 14:01:13', NULL, NULL),
	(25, 0, 'Manohar Solutions', '', '', 'N', 'Y', 1, '2018-03-07 14:05:11', NULL, NULL),
	(26, 0, 'Naren Soft Sol', '', '', 'N', 'Y', 1, '2018-03-07 14:05:30', NULL, NULL),
	(27, 0, 'Rudhra Solutions', '', '', 'N', 'Y', 1, '2018-03-07 14:09:28', NULL, NULL),
	(28, 0, 'TEST', '', '', 'N', 'Y', 1, '2018-03-07 14:13:28', NULL, NULL),
	(29, 0, 'Jayaberi Industries', '', '', 'N', 'Y', 1, '2018-03-07 14:15:31', NULL, NULL),
	(30, 0, 'Ambhani Buulders', 'Ambhani Buulders desc', 'AB0001', 'N', 'N', 1, '2018-03-08 05:33:22', 1, '2018-03-08 11:12:14'),
	(31, 1, 'Ram Gopal', 'Ram Gopal Desc', 'RM001', 'Y', 'Y', 1, '2018-03-12 11:13:23', NULL, NULL),
	(32, 1, 'Sumanth', 'Sumanth desc', 'SM002', 'N', 'Y', 1, '2018-03-12 11:16:33', NULL, NULL),
	(33, 5, 'Saffron Info Systems Sdn Bhd', '', '', 'N', 'Y', 8, '2018-03-19 10:46:41', NULL, NULL);
/*!40000 ALTER TABLE `tbl_mng_clientmaster` ENABLE KEYS */;

-- Dumping structure for table Prv_Dev_TheManager.tbl_mng_configuration_master
CREATE TABLE IF NOT EXISTS `tbl_mng_configuration_master` (
  `configuration_id` int(11) NOT NULL AUTO_INCREMENT,
  `configuration_name` text,
  `configuration_key` text,
  `configuration_description` text,
  `isactive` varchar(50) DEFAULT 'Y',
  `createdby` int(11) DEFAULT NULL,
  `updatedby` int(11) DEFAULT NULL,
  `createdon` datetime DEFAULT CURRENT_TIMESTAMP,
  `updatedon` datetime DEFAULT NULL,
  PRIMARY KEY (`configuration_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Dumping data for table Prv_Dev_TheManager.tbl_mng_configuration_master: ~12 rows (approximately)
/*!40000 ALTER TABLE `tbl_mng_configuration_master` DISABLE KEYS */;
INSERT INTO `tbl_mng_configuration_master` (`configuration_id`, `configuration_name`, `configuration_key`, `configuration_description`, `isactive`, `createdby`, `updatedby`, `createdon`, `updatedon`) VALUES
	(1, 'Malaysia', 'COUNTRIES', NULL, 'Y', NULL, NULL, '2018-03-10 13:14:23', NULL),
	(2, 'India', 'COUNTRIES', NULL, 'y', NULL, NULL, '2018-03-10 13:14:25', NULL),
	(3, 'PHP', 'SKILLSET', NULL, 'y', NULL, NULL, '2018-03-10 00:52:46', NULL),
	(4, '.NET', 'SKILLSET', NULL, 'Y', NULL, NULL, '2018-03-10 02:29:21', NULL),
	(5, 'Incharge', 'CLIENTTYPE', 'Incharge', 'Y', NULL, NULL, '2018-03-19 06:08:58', NULL),
	(6, 'Agent', 'CLIENTTYPE', 'Incharge', 'Y', NULL, NULL, '2018-03-19 06:08:58', NULL),
	(7, '6', 'DC_ID', NULL, 'Y', NULL, NULL, '2018-06-05 23:29:45', NULL),
	(8, '2', 'DC_URL', NULL, 'Y', NULL, NULL, '2018-06-05 23:29:45', NULL),
	(9, '2', 'REMS_URL', NULL, 'Y', NULL, NULL, '2018-06-05 23:29:45', NULL),
	(10, '2', 'REMS_KEY', NULL, 'Y', NULL, NULL, '2018-06-05 23:29:45', NULL),
	(11, '2', 'DC_KEY', NULL, 'Y', NULL, NULL, '2018-06-05 23:29:45', NULL),
	(12, '2', 'REMS_ID', NULL, 'Y', NULL, NULL, '2018-06-05 23:29:45', NULL);
/*!40000 ALTER TABLE `tbl_mng_configuration_master` ENABLE KEYS */;

-- Dumping structure for table Prv_Dev_TheManager.tbl_mng_controlleractionmaster
CREATE TABLE IF NOT EXISTS `tbl_mng_controlleractionmaster` (
  `actionid` int(11) NOT NULL AUTO_INCREMENT,
  `controllerid` int(11) DEFAULT NULL,
  `controlleractionname` varchar(300) NOT NULL,
  `actioncodename` varchar(200) DEFAULT NULL,
  `actiondisplayname` varchar(200) DEFAULT NULL,
  `isactive` varchar(1) DEFAULT NULL,
  `effectevefrom` datetime DEFAULT NULL,
  `effecteveto` datetime DEFAULT NULL,
  `createdby` int(11) DEFAULT NULL,
  `createdon` datetime DEFAULT NULL,
  `updatedby` int(11) DEFAULT NULL,
  `updatedon` datetime DEFAULT NULL,
  PRIMARY KEY (`actionid`),
  KEY `FK_tbl_mng_controlleractionmaster_tbl_mng_controllermaster` (`controllerid`),
  CONSTRAINT `FK_tbl_mng_controlleractionmaster_tbl_mng_controllermaster` FOREIGN KEY (`controllerid`) REFERENCES `tbl_mng_controllermaster` (`controllerid`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

-- Dumping data for table Prv_Dev_TheManager.tbl_mng_controlleractionmaster: ~11 rows (approximately)
/*!40000 ALTER TABLE `tbl_mng_controlleractionmaster` DISABLE KEYS */;
INSERT INTO `tbl_mng_controlleractionmaster` (`actionid`, `controllerid`, `controlleractionname`, `actioncodename`, `actiondisplayname`, `isactive`, `effectevefrom`, `effecteveto`, `createdby`, `createdon`, `updatedby`, `updatedon`) VALUES
	(1, 2, 'Add', 'addOrEdit', 'Add', 'Y', NULL, NULL, NULL, '2018-03-14 12:25:56', NULL, NULL),
	(2, 2, 'delete', 'delete', 'delete', 'Y', NULL, NULL, NULL, '2018-03-15 10:27:49', NULL, NULL),
	(14, 3, 'addOrEdit', 'addOrEdit', 'Role Add', 'Y', NULL, NULL, NULL, '2018-03-16 08:28:31', NULL, NULL),
	(15, 5, 'clientTypes', 'clientTypes', 'clientTypes', 'Y', NULL, NULL, NULL, '2018-03-16 15:24:35', NULL, NULL),
	(16, 1, 'menuForm', 'menuForm', 'menuForm', 'Y', NULL, NULL, NULL, '2018-03-16 18:13:35', NULL, NULL),
	(17, 1, 'saveMenu', 'saveMenu', 'saveMenu', 'Y', NULL, NULL, NULL, '2018-03-16 18:14:02', NULL, NULL),
	(18, 1, 'menuList', 'menuList', 'menuList', 'Y', NULL, NULL, NULL, '2018-03-16 18:14:40', NULL, NULL),
	(19, 1, 'getAllMenus', 'getAllMenus', 'getAllMenus', 'Y', NULL, NULL, NULL, '2018-03-16 18:15:03', NULL, NULL),
	(20, 7, 'addOrEdit', 'addOrEdit', 'addOrEdit', 'Y', NULL, NULL, NULL, '2018-03-16 18:17:48', NULL, NULL),
	(21, 7, 'saveAgent', 'saveAgent', 'saveAgent', 'Y', NULL, NULL, NULL, '2018-03-16 18:19:54', NULL, NULL),
	(22, 7, 'agents', 'agents', 'agents', 'Y', NULL, NULL, NULL, '2018-03-16 18:20:16', NULL, NULL),
	(23, 7, 'getAllAgents', 'getAllAgents', 'getAllAgents', 'Y', NULL, NULL, NULL, '2018-03-16 18:20:54', NULL, NULL);
/*!40000 ALTER TABLE `tbl_mng_controlleractionmaster` ENABLE KEYS */;

-- Dumping structure for table Prv_Dev_TheManager.tbl_mng_controllermaster
CREATE TABLE IF NOT EXISTS `tbl_mng_controllermaster` (
  `controllerid` int(11) NOT NULL AUTO_INCREMENT,
  `controllername` varchar(300) NOT NULL,
  `displayname` tinytext,
  `description` text,
  `isactive` varchar(1) DEFAULT NULL,
  `effectivefrom` datetime DEFAULT NULL,
  `effectiveto` datetime DEFAULT NULL,
  `createdby` int(11) DEFAULT NULL,
  `createdon` datetime DEFAULT NULL,
  `updatedby` int(11) DEFAULT NULL,
  `updatedon` datetime DEFAULT NULL,
  PRIMARY KEY (`controllerid`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- Dumping data for table Prv_Dev_TheManager.tbl_mng_controllermaster: ~17 rows (approximately)
/*!40000 ALTER TABLE `tbl_mng_controllermaster` DISABLE KEYS */;
INSERT INTO `tbl_mng_controllermaster` (`controllerid`, `controllername`, `displayname`, `description`, `isactive`, `effectivefrom`, `effectiveto`, `createdby`, `createdon`, `updatedby`, `updatedon`) VALUES
	(1, 'administration', 'Admin', 'Admin Adds Users', 'Y', NULL, NULL, NULL, '2018-05-02 11:35:57', 8, NULL),
	(2, 'Department', 'Department', 'Department', 'Y', NULL, NULL, NULL, '2018-03-14 12:25:09', NULL, NULL),
	(3, 'Role', 'Role', 'Role', 'Y', NULL, NULL, NULL, '2018-03-16 12:56:14', NULL, NULL),
	(5, 'Clients', 'Clients', 'Clients', 'Y', NULL, NULL, NULL, '2018-03-16 15:23:54', NULL, NULL),
	(6, 'mngcontroller', 'mngcontroller', 'mngcontroller', 'Y', NULL, NULL, NULL, '2018-03-16 18:14:55', NULL, NULL),
	(7, 'Agent', 'Agent info', 'Agent', 'Y', NULL, NULL, NULL, '2018-03-19 10:00:24', 8, NULL),
	(8, 'Branches', 'Branches', 'Branches', 'Y', NULL, NULL, NULL, '2018-03-16 18:12:13', NULL, NULL),
	(9, 'User', 'User', 'User', 'Y', NULL, NULL, NULL, '2018-03-16 18:14:29', NULL, NULL),
	(10, 'Role', 'Role', 'Role', 'Y', NULL, NULL, NULL, '2018-03-16 18:15:58', NULL, NULL),
	(11, 'Product', 'Product', 'Product', 'Y', NULL, NULL, NULL, '2018-03-16 18:16:51', NULL, NULL),
	(12, 'Jobs', 'Jobs', 'Jobs', 'Y', NULL, NULL, NULL, '2018-03-16 18:17:57', NULL, NULL),
	(13, 'test', 'test', '', 'Y', NULL, NULL, 8, '2018-03-19 12:38:01', NULL, NULL),
	(14, 'asf', 'asd', 'asdf', 'Y', NULL, NULL, 8, '2018-03-19 12:41:05', NULL, NULL),
	(15, 'asg', 'asdfg', 'asdfg', 'Y', NULL, NULL, 8, '2018-03-19 12:44:00', NULL, NULL),
	(16, 'zs', 'asdf', 'asdf', 'Y', NULL, NULL, 8, '2018-03-19 12:44:28', NULL, NULL),
	(17, 'as', 'as', 'as', 'Y', NULL, NULL, 8, '2018-03-19 12:47:36', NULL, NULL),
	(19, 'hd', 'dfg', 'dfg', '1', NULL, NULL, 8, '2018-04-12 12:38:19', NULL, NULL);
/*!40000 ALTER TABLE `tbl_mng_controllermaster` ENABLE KEYS */;

-- Dumping structure for table Prv_Dev_TheManager.tbl_mng_departmentmaster
CREATE TABLE IF NOT EXISTS `tbl_mng_departmentmaster` (
  `departmentid` int(11) NOT NULL AUTO_INCREMENT,
  `departmentname` text NOT NULL,
  `departmentdescription` text,
  `departmentcode` varchar(50) DEFAULT NULL,
  `isactive` varchar(1) NOT NULL COMMENT 'Y -- Active , N in active',
  `createdby` int(11) DEFAULT NULL,
  `createdon` datetime DEFAULT NULL,
  `updatedby` int(11) DEFAULT NULL,
  `updatedon` datetime DEFAULT NULL,
  PRIMARY KEY (`departmentid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COMMENT='This table is used to store deparment information';

-- Dumping data for table Prv_Dev_TheManager.tbl_mng_departmentmaster: ~2 rows (approximately)
/*!40000 ALTER TABLE `tbl_mng_departmentmaster` DISABLE KEYS */;
INSERT INTO `tbl_mng_departmentmaster` (`departmentid`, `departmentname`, `departmentdescription`, `departmentcode`, `isactive`, `createdby`, `createdon`, `updatedby`, `updatedon`) VALUES
	(1, 'Marketing & Sales Department', 'Marketing & Sales Department', 'Marketing & Sales Department', 'Y', NULL, '2018-03-19 06:35:02', NULL, NULL),
	(2, 'Sales', 'Sales', 'Sales', 'Y', NULL, '2018-05-10 07:32:26', 8, NULL);
/*!40000 ALTER TABLE `tbl_mng_departmentmaster` ENABLE KEYS */;

-- Dumping structure for table Prv_Dev_TheManager.tbl_mng_enquiries
CREATE TABLE IF NOT EXISTS `tbl_mng_enquiries` (
  `enquiries_id` int(11) NOT NULL AUTO_INCREMENT,
  `enquiries_product_id` int(11) DEFAULT NULL,
  `enquiries_name` varchar(50) DEFAULT NULL,
  `enquiries_company` varchar(50) DEFAULT NULL,
  `enquiries_email` varchar(50) DEFAULT NULL,
  `enquiries_phone` varchar(50) DEFAULT NULL,
  `enquiries_message` text,
  `designation` text,
  `address` text,
  `contact_no` varchar(50) DEFAULT NULL,
  `no_of_users` int(11) DEFAULT NULL,
  `enquiries_type` int(11) DEFAULT '0' COMMENT '1:enquery;2:registration',
  `created_on` datetime DEFAULT NULL,
  PRIMARY KEY (`enquiries_id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

-- Dumping data for table Prv_Dev_TheManager.tbl_mng_enquiries: 28 rows
/*!40000 ALTER TABLE `tbl_mng_enquiries` DISABLE KEYS */;
INSERT INTO `tbl_mng_enquiries` (`enquiries_id`, `enquiries_product_id`, `enquiries_name`, `enquiries_company`, `enquiries_email`, `enquiries_phone`, `enquiries_message`, `designation`, `address`, `contact_no`, `no_of_users`, `enquiries_type`, `created_on`) VALUES
	(1, NULL, 'digital', 'digital', 'digital@digital.com', '84654641', 'digital', NULL, NULL, NULL, NULL, 0, '2018-04-13 15:15:38'),
	(2, NULL, 'skdjf', 'KSHFS', 'SDF@GKSJ.COM', '2873423', 'DJHFWSJD', NULL, NULL, NULL, NULL, 0, '2018-04-17 11:59:24'),
	(3, NULL, 'dfg', 'df', 'dsf@fsd.com', '3333333333', 'gh', NULL, NULL, NULL, NULL, 0, '2018-04-18 12:13:23'),
	(4, NULL, 'adfsd', 'sdf', 'sdf@fsdfs.com', '3333333', 'sdf', NULL, NULL, NULL, NULL, 0, '2018-04-18 12:14:46'),
	(5, NULL, 'werw', 'sdfs', 'aa@adsas.com', '3333333333', 'dfgdfgd', NULL, NULL, NULL, NULL, 0, '2018-04-18 12:22:14'),
	(6, NULL, 'krishna reddy', 'provalley', 'krishnareddysanivarapu@gmail.com', '9700815228', '', NULL, NULL, NULL, NULL, 0, '2018-04-18 12:33:47'),
	(7, NULL, 'krishna reddy', 'provalley', 'krishnareddysanivarapu@gmail.com', '9700815228', '', NULL, NULL, NULL, NULL, 0, '2018-04-18 12:33:51'),
	(8, NULL, 'krishna reddy', 'provalley', 'krishnareddysanivarapu@gmail.com', '9700815228', '', NULL, NULL, NULL, NULL, 0, '2018-04-18 12:33:52'),
	(9, NULL, 'krishna reddy', 'provalley', 'krishnareddysanivarapu@gmail.com', '9700815228', '', NULL, NULL, NULL, NULL, 0, '2018-04-18 12:33:52'),
	(10, NULL, 'krishna reddy', 'provalley', 'krishnareddysanivarapu@gmail.com', '9700815228', '', NULL, NULL, NULL, NULL, 0, '2018-04-18 12:33:52'),
	(11, NULL, 'sdfsd', 'sdfs', 'sdf@sdgfsd.com', '78899999', 'asfsdf', NULL, NULL, NULL, NULL, 0, '2018-04-18 17:22:09'),
	(12, NULL, 'gvx', 'xcv', 'xcv@gsdgvds.com', '78954555', 'xgvf', NULL, NULL, NULL, NULL, 0, '2018-04-18 17:22:48'),
	(13, NULL, 'gvx', 'xcv', 'xcv@gsdgvds.com', '78954555', 'xgvf', NULL, NULL, NULL, NULL, 0, '2018-04-18 17:22:52'),
	(14, NULL, 'gvx', 'xcv', 'xcv@gsdgvds.com', '78954555', 'xgvf', NULL, NULL, NULL, NULL, 0, '2018-04-18 17:22:54'),
	(15, NULL, 'gvx', 'xcv', 'xcv@gsdgvds.com', '78954555', 'xgvf', NULL, NULL, NULL, NULL, 0, '2018-04-18 17:22:55'),
	(16, NULL, 'gvx', 'xcv', 'xcv@gsdgvds.com', '78954555', 'xgvf', NULL, NULL, NULL, NULL, 0, '2018-04-18 17:22:55'),
	(17, NULL, 'sdfsd', 'sdf', 'sdf@sdfsd.com', '7899888', 'sdfsdf', NULL, NULL, NULL, NULL, 0, '2018-04-18 17:26:29'),
	(18, NULL, 'sdfsd', 'sdf', 'sdf@fsdfsd.com', '878588888', 'sdfsd', NULL, NULL, NULL, NULL, 0, '2018-04-18 17:27:37'),
	(19, NULL, 'dgfd', 'dfg', 'dfg@sdj.com', '7898999', 'sdkfjsd', NULL, NULL, NULL, NULL, 0, '2018-04-18 17:28:56'),
	(20, NULL, 'asdas', 'asdas', 'asd@adsfd.com', '3333333', 'sdfsd', NULL, NULL, NULL, NULL, 0, '2018-04-18 17:36:46'),
	(21, NULL, 'asdas', 'asdas', 'asd@adsfd.com', '3333333', 'sdfsd', NULL, NULL, NULL, NULL, 0, '2018-04-18 17:36:51'),
	(22, NULL, 'asdas', 'asdas', 'asd@adsfd.com', '3333333', 'sdfsd', NULL, NULL, NULL, NULL, 0, '2018-04-18 17:37:03'),
	(23, NULL, 'sdf', 'sdf', 'sdf@sdfsd.com', '4444444', 'sdf', NULL, NULL, NULL, NULL, 0, '2018-04-18 17:38:29'),
	(24, NULL, 'sdf', 'sdf', 'sdf@sdfsd.com', '4444444', 'sdf', NULL, NULL, NULL, NULL, 0, '2018-04-18 17:38:31'),
	(25, NULL, 'asd', 'asd', 'asd@sdfd.com', '3444444444', 'dfgdfg', NULL, NULL, NULL, NULL, 0, '2018-04-18 17:39:34'),
	(26, NULL, 'asd', 'asd', 'asd@sdfd.com', '3444444444', 'dfgdfg', NULL, NULL, NULL, NULL, 0, '2018-04-18 17:39:48'),
	(27, 8, 'murali', 'murali', 'murali@murali.com', '7777777', '7777777', NULL, NULL, NULL, NULL, 0, '2018-04-20 11:02:20'),
	(28, 0, 'contact us', 'contact us', 'contact_us@gmail.com', '8787999', 'wsdfsdf', NULL, NULL, NULL, NULL, 0, '2018-04-20 11:03:15');
/*!40000 ALTER TABLE `tbl_mng_enquiries` ENABLE KEYS */;

-- Dumping structure for table Prv_Dev_TheManager.tbl_mng_jobs
CREATE TABLE IF NOT EXISTS `tbl_mng_jobs` (
  `jobs_id` int(11) NOT NULL AUTO_INCREMENT,
  `jobs_title` varchar(100) DEFAULT NULL,
  `jobs_experience` varchar(100) DEFAULT NULL,
  `jobs_contact_email` varchar(100) DEFAULT NULL,
  `jobs_skillset` varchar(100) DEFAULT NULL,
  `jobs_position` varchar(100) DEFAULT NULL,
  `jobs_numberofposition` varchar(100) DEFAULT NULL,
  `jobs_joiningdate` date DEFAULT NULL,
  `jobs_position_startdate` date DEFAULT NULL,
  `jobs_position_enddate` date DEFAULT NULL,
  `jobs_country` int(11) DEFAULT NULL,
  `jobs_description` text,
  `jobs_eligibilitycriteria` text,
  `jobs_disable_comment` text,
  `isactive` varchar(1) NOT NULL DEFAULT 'Y' COMMENT 'Y:active;N:inactive',
  `createdby` int(11) DEFAULT NULL,
  `createdon` datetime NOT NULL,
  `updatedby` int(11) NOT NULL,
  `updatedon` datetime NOT NULL,
  PRIMARY KEY (`jobs_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

-- Dumping data for table Prv_Dev_TheManager.tbl_mng_jobs: ~9 rows (approximately)
/*!40000 ALTER TABLE `tbl_mng_jobs` DISABLE KEYS */;
INSERT INTO `tbl_mng_jobs` (`jobs_id`, `jobs_title`, `jobs_experience`, `jobs_contact_email`, `jobs_skillset`, `jobs_position`, `jobs_numberofposition`, `jobs_joiningdate`, `jobs_position_startdate`, `jobs_position_enddate`, `jobs_country`, `jobs_description`, `jobs_eligibilitycriteria`, `jobs_disable_comment`, `isactive`, `createdby`, `createdon`, `updatedby`, `updatedon`) VALUES
	(14, 'Android Developer ', '4-6', 'sreedhar.pothuraju@provalley.net', '', 'Sr.Android Developer ', '1', '2018-04-18', '2018-04-18', '2018-04-18', 2, 'We are seeking for an Android Developer with more than 4 to 6 years experience who can lead and develop mobile applications for the Android Platform.', '<p><strong>Experience </strong>: 4 - 6 Years.</p>\n\n<p><strong>Education</strong> : Any Graduate with good logical &amp; Analytical skill.</p>\n\n<p><strong>Key Skills</strong> : Proficiency in Core Java, API Development added,Command on Google APS, Social Media Interation, Working on third party libraries, Version Controls, Fire Base cloud integration, Knowledge in UI Design for mobile apps, Google Volley, Retrofit,Facebook etc.</p>\n\n<p>For further information or to apply, please contact or send your resume to&nbsp;<strong>sreedhar.pothuraju@provalley.net .&nbsp;</strong>Screening of applications begins immediately and will continue until the search is completed.</p>\n', NULL, 'Y', 8, '2018-04-18 06:29:36', 0, '0000-00-00 00:00:00'),
	(15, 'Android Developer', '2-3', 'sreedhar.pothuraju@provalley.net', '', 'jr.Android Developer', '1', '1970-01-01', '1970-01-01', '1970-01-01', 2, 'We are seeking for an Jr.Android Developer with 2 - 3 years experience.', '<p><strong>Experience</strong> : 2 - 3 Years.</p>\n\n<p><strong>Education </strong>: Any Graduate with good logical &amp; Analytical skill.</p>\n\n<p><strong>Key Skills</strong> : Proficiency in Core Java, API Development added,Command on Google APS, Social Media Interation, Working on third party libraries, Version Controls, Fire Base cloud integration, Knowledge in UI Design for mobile apps, Google Volley, Retrofit,Facebook etc.</p>\n\n<p>For further information or to apply, please contact or send your resume to&nbsp;<strong>sreedhar.pothuraju@provalley.net</strong>&nbsp;. Screening of applications begins immediately and will continue until the search is completed.</p>\n', 'hi', 'N', 8, '2018-04-18 05:11:32', 0, '0000-00-00 00:00:00'),
	(16, 'IOS Developer', '4-6', 'sreedhar.pothuraju@provalley.net', '', 'IOS Developer', '1', '2018-04-18', '2018-04-18', '2018-04-18', 2, 'We are seeking for an IOS Developer with 4 - 6 years experience.', '<p><strong>Experience</strong> : 4 - 6 Years.</p>\n\n<p><strong>Education</strong> : Any Graduate with good logical &amp; Analytical skill.</p>\n\n<p><strong>Key Skills</strong> : Proficiency in Core Data,Swift 3,4, Xml parsing, Json parsing, Social Network Integration, Third Party libraries,push notifications, Atleast one app should be lived in App Store. Capbility to lead the team</p>\n\n<p>For further information or to apply, please contact or send your resume to<strong>&nbsp;sreedhar.pothuraju@provalley.net</strong>&nbsp;. Screening of applications begins immediately and will continue until the search is completed.</p>\n', NULL, 'Y', 8, '2018-04-18 06:29:52', 0, '0000-00-00 00:00:00'),
	(17, 'PHP Developer ', '4-6', 'sreedhar.pothuraju@provalley.net', '3', 'Sr PHP Developer ', '1', '1970-01-01', '1970-01-01', '1970-01-01', 2, 'We are seeking for PHP Developer with 4 - 6 years experience, who can lead the team.', '<p><strong>Experience</strong> : 4 - 6 Years.</p>\n\n<p><strong>Education</strong> : Any Graduate with good logical &amp; Analytical skill.</p>\n\n<p><strong>Key Skills</strong> : Proficiency in PHP/ MySQL or equivalent database, PHP Frameworks(codignator),AJAX Apache, Joomla, Wordpress, Jquery, CSS, HTML/DHTML, JavaScript, and Angular JS.</p>\n\n<p>Having good experience in documentations, understanding the requirements and implementing business logics, able to provide optimize solutions on business needs.&nbsp;</p>\n\n<p>For further information or to apply, please contact or send your resume to&nbsp;<strong>sreedhar.pothuraju@provalley.net .&nbsp;</strong>Screening of applications begins immediately and will continue until the search is completed.</p>\n', NULL, 'Y', 8, '2018-04-18 05:11:55', 0, '0000-00-00 00:00:00'),
	(18, 'PHP Developer', '3-5', 'sreedhar.pothuraju@provalley.net', '3', 'PHP Developer', '1', '1970-01-01', '1970-01-01', '1970-01-01', 2, 'We are seeking for PHP Developer with 3-5 years experience', '<p><strong>Experience</strong> : 3 - 5 Years.</p>\n\n<p><strong>Education</strong> : Any Graduate with good logical &amp; Analytical skill.</p>\n\n<p><strong>Key Skills</strong> : Proficiency in PHP/ MySQL or equivalent database, PHP Frameworks(codignator), Joomla, Wordpress, Jquery, CSS, HTML/DHTML, JavaScript, and Angular JS.</p>\n\n<p>For further information or to apply, please contact or send your resume to&nbsp;<strong>sreedhar.pothuraju@provalley.net</strong>&nbsp;. Screening of applications begins immediately and will continue until the search is completed</p>\n', NULL, 'Y', 8, '2018-04-18 05:12:20', 0, '0000-00-00 00:00:00'),
	(19, '.Net Developer', '4-6', 'sreedhar.pothuraju@provalley.net', '4', 'Sr .Net Developer', '1', '1970-01-01', '1970-01-01', '1970-01-01', 2, 'We are seeking for .Net Developer with 4 - 6 years experience.', '<p><strong>Experience</strong> : 4 - 6 Years.</p>\n\n<p><strong>Education </strong>: Any Graduate with good logical &amp; Analytical skill.</p>\n\n<p><strong>Key Skills</strong> : Proficiency in Asp.Net, MVC,Web API Development, OOPS Knowledge, C# .Net, Entity Frame work, Linq, HTML, CSS3, Bootstrap, JQuery,Angular Js, SQL Server.</p>\n\n<p>For further information or to apply, please contact or send your resume to&nbsp;<strong>sreedhar.pothuraju@provalley.net .&nbsp;</strong>Screening of applications begins immediately and will continue until the search is completed.</p>\n', NULL, 'Y', 8, '2018-04-18 05:12:30', 0, '0000-00-00 00:00:00'),
	(20, '.Net Developer ', '3-5', 'sreedhar.pothuraju@provalley.net', '4', '.Net Developer ', '1', '1970-01-01', '1970-01-01', '1970-01-01', 2, 'We are seeking for .Net Developer with 3-5 years experience.', '<p><strong>Experience </strong>: 3 - 5 Years .</p>\n\n<p><strong>Education</strong> : Any Graduate with good logical &amp; Analytical skill.</p>\n\n<p><strong>Key Skills </strong>: Proficiency in Asp .Net, MVC, Web API Development, Linq, OOPS Knowledge, C# .Net, Entity Frame Work, HTML, CSS3, Bootstrap, Java Script, JQuery, Angular Js.</p>\n\n<p>For further information or to apply, please contact or send your resume to&nbsp;<strong>sreedhar.pothuraju@provalley.net .&nbsp;</strong>Screening of applications begins immediately and will continue until the search is completed.</p>\n', NULL, 'Y', 8, '2018-04-18 05:12:42', 0, '0000-00-00 00:00:00'),
	(21, '.net developer', '2-4', 'navyasrinandyala.tester@gmail.com', '4', 'Software Engineer', '5', '2018-05-24', '2018-03-08', '2019-03-14', 1, 'sufficient knowledge is needed', '<p>trained&nbsp;</p>\n', NULL, 'Y', 8, '2018-04-19 04:26:55', 0, '0000-00-00 00:00:00'),
	(22, 'programmmer', '2-3', 'navyasrinandyala.tester@gmail.com', '4', 'developer', '3', '1901-03-08', '2018-04-19', '2018-05-05', 1, 'software engineer', '<p>jhjajkjkkjklkl</p>\n', NULL, 'Y', 8, '2018-04-19 04:36:05', 0, '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `tbl_mng_jobs` ENABLE KEYS */;

-- Dumping structure for table Prv_Dev_TheManager.tbl_mng_job_application_details
CREATE TABLE IF NOT EXISTS `tbl_mng_job_application_details` (
  `job_application_details_id` int(11) NOT NULL AUTO_INCREMENT,
  `job_application_details_name` varchar(50) DEFAULT NULL,
  `job_application_details_email` varchar(50) DEFAULT NULL,
  `job_application_details_hr_email` varchar(50) DEFAULT NULL,
  `job_application_details_phone` varchar(50) DEFAULT NULL,
  `job_application_details_application_status` int(11) DEFAULT NULL COMMENT '100:application',
  `job_application_details_resume` varchar(50) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  PRIMARY KEY (`job_application_details_id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- Dumping data for table Prv_Dev_TheManager.tbl_mng_job_application_details: 25 rows
/*!40000 ALTER TABLE `tbl_mng_job_application_details` DISABLE KEYS */;
INSERT INTO `tbl_mng_job_application_details` (`job_application_details_id`, `job_application_details_name`, `job_application_details_email`, `job_application_details_hr_email`, `job_application_details_phone`, `job_application_details_application_status`, `job_application_details_resume`, `created_on`) VALUES
	(1, 'ram', 'krishnareddysanivarapu@gmail.com', 'info@provalley.net', '9700', 100, NULL, '2018-04-17 08:55:16'),
	(2, 'ram', 'krishnareddysanivarapu@gmail.com', 'info@provalley.net', '9700', 100, NULL, '2018-04-17 08:55:26'),
	(3, 'navya', 'navya@gmail.com', 'navya@gmail', '0', 100, NULL, '2018-04-17 11:20:49'),
	(4, 'navya', 'navyasrinandyala.tester@gmail.com', 'navya@gmail', '944174490400000', 100, NULL, '2018-04-17 11:22:05'),
	(5, 'navya', 'navyasrinandyala.tester@gmail.com', 'navya@gmail', '944174490400000', 100, NULL, '2018-04-17 11:23:18'),
	(6, 'navya', 'navyasrinandyala.tester@gmail.com', 'navya@gmail', '90102001020200', 100, NULL, '2018-04-17 11:27:17'),
	(7, 'navya', 'navyasrinandyala.tester@gmail.com', 'navya@gmail', '90102001020200', 100, '2a7524c75be1b6f432f74779db6ca6ec.jpg', '2018-04-17 11:27:28'),
	(8, 'raji', 'navyasrinandyala.tester@gmail.com', 'navyasrinandyala.tester@gmail.com', '9999', 100, '1bd0795689ae9a95eac2d9d2a8ebb414.docx', '2018-04-17 11:31:39'),
	(9, 'nagamurali', 'nagamurali.garisapati@provalley.net', '', '1234567899', 100, NULL, '2018-04-17 11:35:28'),
	(10, 'ghjg', 'dsgf@gdsfgf.com', '', '45645645645', 100, NULL, '2018-04-17 11:39:28'),
	(11, 'ghjg', 'dsgf@gdsfgf.com', '', '45645645645', 100, NULL, '2018-04-17 11:40:23'),
	(12, 'ghjg', 'dsgf@gdsfgf.com', '', '45645645645', 100, NULL, '2018-04-17 11:41:03'),
	(13, 'sdfs', 'sdfsd@sdfsd.com', '', '2342342', 100, NULL, '2018-04-17 11:41:23'),
	(14, 'sfd', 'sdfs@wefsdf.com', '', '2342342342', 100, NULL, '2018-04-17 11:46:56'),
	(15, 'sfd', 'sdfs@wefsdf.com', '', '2342342342', 100, NULL, '2018-04-17 11:48:40'),
	(16, 'sdfs', 'nagamurali.garisapati@provalley.net', '', '1234566', 100, NULL, '2018-04-17 11:49:20'),
	(17, 'dfgd', 'navyasrinandyala.tester@gmail.com', '', '234234234', 100, NULL, '2018-04-17 11:51:51'),
	(18, 'asdas', 'nagamurali.garisapati@gmail.com', '', '789456123', 100, NULL, '2018-04-17 11:54:19'),
	(19, 'dfgdf', 'nagamurali.garisapati@gmail.com', 'nagamurali.garisapati@gmail.com', '87979453443', 100, NULL, '2018-04-17 11:56:05'),
	(20, 'asfsad', 'nagamurali.garisapati@gmail.com', 'nagamurali.garisapati@gmail.com', '234234234', 100, NULL, '2018-04-17 11:56:36'),
	(21, 'sdfsd', 'nagamurali.garisapati@gmail.com', 'nagamurali.garisapati@gmail.com', '23423423', 100, NULL, '2018-04-17 11:58:07'),
	(22, 'ravi', 'navyasrinandyala.tester@gmail.com', 'navyasrinandyala.tester@gmail.com', '33', 100, NULL, '2018-04-17 12:01:27'),
	(23, 'ravi', 'navyasrinandyala.tester@gmail.com', 'navyasrinandyala.tester@gmail.com', '33', 100, NULL, '2018-04-17 12:04:41'),
	(24, 'ravi', 'navyasrinandyala.tester@gmail.com', 'navyasrinandyala.tester@gmail.com', '33', 100, NULL, '2018-04-17 12:04:46'),
	(25, 'nagamurali', 'nagamurali.garisapati@provalley.com', 'sreedhar.pothuraju@provalley.net', '9874562315', 100, '7fbed36aa5d141d480f4c8d35833c83c.doc', '2018-04-18 05:47:30');
/*!40000 ALTER TABLE `tbl_mng_job_application_details` ENABLE KEYS */;

-- Dumping structure for table Prv_Dev_TheManager.tbl_mng_menu
CREATE TABLE IF NOT EXISTS `tbl_mng_menu` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `isparent` tinyint(2) DEFAULT NULL COMMENT '1:parent;2:child',
  `parent_id` int(11) DEFAULT NULL,
  `role_id` varchar(100) DEFAULT NULL,
  `menu_name` varchar(50) DEFAULT NULL,
  `display_name` varchar(200) DEFAULT NULL,
  `description` text,
  `menu_url` text,
  `menu_icon` text,
  `menu_order` varchar(50) DEFAULT NULL,
  `menu_color` varchar(50) DEFAULT NULL,
  `createdon` datetime DEFAULT NULL,
  `createdby` int(11) DEFAULT NULL,
  `updatedon` datetime DEFAULT NULL,
  `updatedby` int(11) DEFAULT NULL,
  `isactive` varchar(50) DEFAULT 'Y',
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

-- Dumping data for table Prv_Dev_TheManager.tbl_mng_menu: ~19 rows (approximately)
/*!40000 ALTER TABLE `tbl_mng_menu` DISABLE KEYS */;
INSERT INTO `tbl_mng_menu` (`menu_id`, `isparent`, `parent_id`, `role_id`, `menu_name`, `display_name`, `description`, `menu_url`, `menu_icon`, `menu_order`, `menu_color`, `createdon`, `createdby`, `updatedon`, `updatedby`, `isactive`) VALUES
	(1, 1, 0, '1,2,3,5', 'Department', 'Department', 'Department', '', NULL, '0', '', '2018-03-14 07:40:35', NULL, NULL, NULL, 'Y'),
	(2, 0, 1, '2,3,5', 'Departments', 'Departments', 'Departments', 'Department', 'fa fa-list', '1', 'black', '2018-03-15 06:52:36', NULL, NULL, NULL, 'Y'),
	(4, 1, 0, '5', 'Menu', 'Menu', 'Menu', '', 'fa fa-list', '0', 'asd', '2018-03-15 07:21:09', NULL, NULL, NULL, 'Y'),
	(6, 0, 4, '5', 'Menu Add or Edit', 'Menu Add or Edit', 'Menu Add or Edit', 'Administration/menuForm', 'fa fa-list', '4', 'black', '2018-03-15 07:52:06', NULL, NULL, NULL, 'N'),
	(7, 0, 4, '5', 'Menu List', 'Menu List', 'Menu List', 'Administration/menuList', 'fa fa-list', '6', 'black', '2018-03-15 07:53:06', NULL, NULL, NULL, 'Y'),
	(8, 1, 0, '10', 'Role', 'Role', 'Role', 'Role', '', '2', '', '2018-03-16 08:30:55', NULL, NULL, NULL, 'Y'),
	(9, 0, 8, '10', 'Role', 'Role', 'Role', 'Role', 'fa fa-list', '8', 'black', '2018-03-16 08:34:24', NULL, NULL, NULL, 'Y'),
	(10, 1, 0, '5', 'Settings', 'Settings', 'All master data will goes here', '', 'fa fa-cog', '0', 'black', '2018-03-16 10:16:56', NULL, NULL, NULL, 'Y'),
	(11, 0, 10, '5', 'Client Type', 'Client Type', 'Client Type', 'Clients/clientTypes', 'fa fa-list', '10', 'black', '2018-03-16 10:19:03', NULL, NULL, NULL, 'Y'),
	(12, 1, 0, '5', 'Clients', 'Clients', '', '', 'fa fa-user', '0', 'green', '2018-03-16 13:39:43', NULL, NULL, NULL, 'Y'),
	(13, 0, 12, '5', 'Clients List', 'Clients', 'Sub menu', 'clients', 'fa fa-user', '12', 'green', '2018-03-16 13:41:55', NULL, NULL, NULL, 'Y'),
	(14, 1, 0, '5', 'Emails', 'Emails', 'Emails Main menu', '', 'fa fa-envelope', '13', 'blue', '2018-03-16 13:46:49', NULL, NULL, NULL, 'Y'),
	(15, 0, 14, '5', 'Email Templates', 'Email Templates', 'Email Templates List Sub menu', 'EmailTemplates', 'fa fa-envelope', '14', 'blue', '2018-03-16 13:48:21', NULL, NULL, NULL, 'Y'),
	(16, 1, 0, '5', 'Job', 'Jobs', 'Jobs', '', '', '12', '', '2018-03-16 13:54:43', NULL, NULL, NULL, 'Y'),
	(17, 0, 16, '5', 'Jobs', 'Jobs', 'Jobs', 'Jobs', 'fa fa-list', '16', '', '2018-03-16 13:56:14', NULL, NULL, NULL, 'Y'),
	(18, 1, 0, '5', 'Product', 'Products', 'Products', '', 'fa fa-list', '16', 'black', '2018-03-16 13:57:49', NULL, NULL, NULL, 'Y'),
	(19, 0, 18, '5', 'Products', 'Products', 'Products', 'Product', 'fa fa-list', '18', 'black', '2018-03-16 13:58:37', NULL, NULL, NULL, 'Y'),
	(21, 1, 0, '5', 'Controllers', 'Controllers', '', '', 'fa fa-user', '0', 'green', '2018-03-19 07:49:45', NULL, NULL, NULL, 'Y'),
	(22, 0, 21, '5', 'Controllers List', 'Controllers ', '', 'mngcontroller', 'fa fa-user', '21', 'blue', '2018-03-19 07:51:41', NULL, NULL, NULL, 'Y'),
	(23, 0, 18, NULL, 'Product Subscription', 'Product Subscription', 'Product Subscription', 'ProductSubscriptions', 'fa fa-list', '19', 'black', '2018-05-09 08:37:19', 8, NULL, NULL, 'Y'),
	(24, 0, 18, NULL, 'Enquiries', 'Enquiries', 'Enquiries', 'administration/enquiries', 'fa fa-list', '19', 'black', '2018-05-09 14:28:30', 8, NULL, NULL, 'Y');
/*!40000 ALTER TABLE `tbl_mng_menu` ENABLE KEYS */;

-- Dumping structure for table Prv_Dev_TheManager.tbl_mng_productmaster
CREATE TABLE IF NOT EXISTS `tbl_mng_productmaster` (
  `productid` int(11) NOT NULL AUTO_INCREMENT,
  `productname` text NOT NULL,
  `productcode` varchar(50) DEFAULT NULL,
  `product_url` varchar(50) DEFAULT NULL,
  `product_id` varchar(50) DEFAULT NULL,
  `productdescription` text NOT NULL,
  `product_logo` varchar(1000) DEFAULT NULL,
  `product_gallery` text,
  `effectivefrom` datetime DEFAULT NULL,
  `effectiveto` datetime DEFAULT NULL,
  `isactive` varchar(1) NOT NULL DEFAULT 'Y',
  `createdby` int(11) DEFAULT NULL,
  `createdon` datetime DEFAULT NULL,
  `updatedby` int(11) DEFAULT NULL,
  `updatedon` datetime DEFAULT NULL,
  PRIMARY KEY (`productid`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- Dumping data for table Prv_Dev_TheManager.tbl_mng_productmaster: ~9 rows (approximately)
/*!40000 ALTER TABLE `tbl_mng_productmaster` DISABLE KEYS */;
INSERT INTO `tbl_mng_productmaster` (`productid`, `productname`, `productcode`, `product_url`, `product_id`, `productdescription`, `product_logo`, `product_gallery`, `effectivefrom`, `effectiveto`, `isactive`, `createdby`, `createdon`, `updatedby`, `updatedon`) VALUES
	(5, 'REMS', 'REMS ', 'http://rems.net.my/', 'REMS ', 'At Provalley, Real Estate Management System is a complete digital solution for the property agents, tenants, owners and real estate agencies. REMS is an online portal that manages the overall operational activity of the property, starting from the registration of the property in real estate agency, to agents, clients, and financial transactions.\r\n\r\nIt is a one point solution for managing multiple properties, payments & monitoring activities happening at a different level. It gives 360-degree transparency and visibility to the agents and owner about the updated status of their property. It also provides an overview with respect to sales occurring, cost analysis & real-time data. It is accessible at any time & from anywhere across the globe, which helps in expanding services to multiple locations.\r\n\r\nIts unique features provide many facilities, few are listed below:\r\nManagement Dashboard - It provides an overview of the entire project in terms of, Booking, sale, Payment, documentation or transfer of ownership of properties on a single screen.\r\nAutomated Notifications -Each client has a unique and different requirement. Property agents analyze and understand the clients need an update on the REMS Portal. So in case any property registered in REMS matches the client\'s requirements, sends a notification to the client.\r\nAuto Commission Calculation – It provides hassle-free commission distribution. Each agent’s commission against property is calculated and credited automatically to agents account via REMS portal.', 'b36d129a95289d7221e1da260ac59eb8.png', '5ad5e83b7aabc.jpg,5ad5e83b7ae5b.jpg,5ad5e83b7b0ad.jpg', NULL, NULL, 'Y', 1, '2018-03-14 11:32:28', 8, '2018-04-17 12:27:39'),
	(6, 'DIGITAL CONDO', 'DC', 'http://digitalcondo.provalley.net/', 'DC', 'This is completely condominium management solution for the property managers and self managed associations. Our centralized application designed to manage condo easier.\r\n\r\nDigital condo is first of its kind can provides a digital value-added services for the successful property managers and Committee members.\r\n\r\nYou can manage single association or group of communities in your portfolio, Digital condo can provide the tools you need for the success.', 'ea4bfb3102711e157a79cc25d26bc358.png', '5ad5e7f324924.jpg,5ad5e7f324b44.jpg,5ad5e7f324f8a.jpg', NULL, NULL, 'Y', 1, '2018-03-14 11:33:54', 8, '2018-04-17 12:26:27'),
	(7, 'DIGITAL SCHOOLS ', 'DS', 'http://digitalschool.com.my/', 'DS', 'Digital School is management software for primary to high school, and it\'s affordable for the school management with the user-friendly application for the teachers and parents among the organization, and its relations.\r\nThe evolution of Digital technology is connecting people, facilitating better communication and it has been creating new for the brands to reach their target audience in a better way.\r\nNew tools and processes are making the daily function smooth.The application can use by anyone; every device can support in all formats.', 'fc064d44f1354b3f49631199b2c335cf.png', '5ad5e8e69718d.jpg,5ad5e8e6974b8.jpg,5ad5e8e6978a2.jpg', NULL, NULL, 'Y', 1, '2018-03-14 11:34:53', 8, '2018-04-17 12:30:30'),
	(8, 'EPVS 3.0', 'EPVS', 'http://epvs.my/', 'EPVS', 'Electronic Property Valuation System (EPVS) is an online system that makes a validation easier and accurate - Government\'s published data is easily imported and organized which help analyses sales price histories for comparable properties in any given area, and adjust for distinguishing characteristics of the target property to estimate its market value.\r\n\r\nWe have developed this EPVS application that helps in valuation commercial and residential properties for all purposes like purchase of the property, securing loans, insurance and the likes.\r\n\r\nThe application provides expert valuation and consultancy services for all types of property. The electronic reports produced by the EPVS application are very comprehensive, providing all the information based on the valuation.', '28e474eeae75073c7188996bb7c033c4.png', '5ad5e9ac18175.jpg,5ad5e9ac1833b.jpg,5ad5e9ac18560.jpg', NULL, NULL, 'Y', 1, '2018-03-14 11:46:03', 8, '2018-04-17 12:33:48'),
	(9, 'Digital School ', 'software', '', 'ss', 'School Mgmnt Software', '4238c1b60c2f7f6f0cd9abdbf254b3af.png', '5ad08b302f332.jpg,5ad08b302f4ef.png', NULL, NULL, 'Y', NULL, '2018-03-19 04:39:52', 8, '2018-04-13 13:09:05'),
	(11, 'Digital Condo 1', 'software', '', '', 'School Management Software ', 'fe8b6dfc0a3581e929db998d9e6182bb.png', '5ad08b302f332.jpg,5ad08b302f4ef.png,', NULL, NULL, 'Y', 8, '2018-04-13 13:05:03', 8, '2018-04-17 12:24:32'),
	(12, 'Testing', 'test', 'http://protest.provalley.net/', 'test', 'test', 'ffd3bf0dc6037e8c62699207ce35bdf1.png', '5ad0b29283887.jpg,5ad0b29283ae7.png,5ad0b29283bcf.jpg,', NULL, NULL, 'Y', 8, '2018-04-13 13:37:22', 8, '2018-04-16 06:25:22'),
	(13, 'Provalley', 'Provalley', 'Provalley.COM', 'Provalley', 'Provalley', '48d4a9453f163f2de8da1f89cbb9b6dc.png', '5ad5e3a3c7598.jpg,5ad5e3a3c76e5.jpg,', NULL, NULL, 'Y', 8, '2018-04-17 12:03:34', 8, '2018-04-17 12:08:34'),
	(14, 'prv', 'prv', 'prv.net', 'prv', 'Prv Desc ', 'a18211d287997008adf53c2aa007e5ae.png', '5ad5e429788fd.png,5ad5e42979333.jpg,5ad5e42979551.jpg', NULL, NULL, 'Y', 8, '2018-04-17 12:10:17', NULL, NULL);
/*!40000 ALTER TABLE `tbl_mng_productmaster` ENABLE KEYS */;

-- Dumping structure for table Prv_Dev_TheManager.tbl_mng_rolemaster
CREATE TABLE IF NOT EXISTS `tbl_mng_rolemaster` (
  `roleid` int(11) NOT NULL AUTO_INCREMENT,
  `departmentid` int(11) DEFAULT NULL,
  `rolename` varchar(300) NOT NULL,
  `roledescription` text,
  `displayname` tinytext,
  `role_allowreporting` varchar(50) DEFAULT 'N' COMMENT 'Y:report;N:no report',
  `isactive` varchar(1) DEFAULT NULL,
  `effectivefrom` datetime DEFAULT NULL,
  `effectiveto` datetime DEFAULT NULL,
  `createdby` int(11) DEFAULT NULL,
  `createdon` datetime DEFAULT NULL,
  `updatedby` int(11) DEFAULT NULL,
  `updatedon` datetime DEFAULT NULL,
  PRIMARY KEY (`roleid`),
  KEY `FK_tbl_mng_rolemaster_tbl_mng_departmentmaster` (`departmentid`),
  CONSTRAINT `FK_tbl_mng_rolemaster_tbl_mng_departmentmaster` FOREIGN KEY (`departmentid`) REFERENCES `tbl_mng_departmentmaster` (`departmentid`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Dumping data for table Prv_Dev_TheManager.tbl_mng_rolemaster: ~5 rows (approximately)
/*!40000 ALTER TABLE `tbl_mng_rolemaster` DISABLE KEYS */;
INSERT INTO `tbl_mng_rolemaster` (`roleid`, `departmentid`, `rolename`, `roledescription`, `displayname`, `role_allowreporting`, `isactive`, `effectivefrom`, `effectiveto`, `createdby`, `createdon`, `updatedby`, `updatedon`) VALUES
	(1, 1, 'Marketing Head', 'Marketing Head', 'HOD', 'Y', 'Y', '2018-03-12 12:45:30', NULL, NULL, NULL, NULL, NULL),
	(2, 1, 'Exclusive Agent', 'Exclusive Agent', 'Agent', 'Y', 'Y', '2018-03-12 12:46:21', NULL, NULL, NULL, NULL, NULL),
	(3, 1, 'Sub Agent', 'Sub Agent', 'Sub Agent', 'N', 'Y', '2018-03-12 12:46:54', NULL, NULL, NULL, NULL, NULL),
	(5, 1, 'Admin', 'Admin', 'Admin', 'N', 'Y', '2018-03-15 12:29:20', NULL, NULL, '2018-03-13 06:13:32', 8, '2018-05-09 14:29:20'),
	(9, 1, 'Add', NULL, NULL, 'N', 'Y', NULL, NULL, NULL, '2018-03-15 13:13:42', NULL, NULL),
	(10, 1, 'Allow roles', NULL, NULL, 'N', 'Y', NULL, NULL, NULL, '2018-03-16 08:29:05', NULL, NULL),
	(11, NULL, 'Agent', NULL, NULL, 'N', 'Y', NULL, NULL, 8, '2018-04-12 11:16:09', NULL, NULL);
/*!40000 ALTER TABLE `tbl_mng_rolemaster` ENABLE KEYS */;

-- Dumping structure for table Prv_Dev_TheManager.tbl_mng_role_privilages
CREATE TABLE IF NOT EXISTS `tbl_mng_role_privilages` (
  `privilages_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL,
  `controller_id` int(11) DEFAULT NULL,
  `action_id` int(11) DEFAULT NULL,
  `isgranted` varchar(50) NOT NULL DEFAULT 'N',
  `isactive` varchar(50) NOT NULL DEFAULT 'N',
  `createdby` int(11) DEFAULT NULL,
  `createdon` datetime DEFAULT NULL,
  `updatedby` int(11) DEFAULT NULL,
  `updatedon` datetime DEFAULT NULL,
  PRIMARY KEY (`privilages_id`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=latin1;

-- Dumping data for table Prv_Dev_TheManager.tbl_mng_role_privilages: ~23 rows (approximately)
/*!40000 ALTER TABLE `tbl_mng_role_privilages` DISABLE KEYS */;
INSERT INTO `tbl_mng_role_privilages` (`privilages_id`, `role_id`, `controller_id`, `action_id`, `isgranted`, `isactive`, `createdby`, `createdon`, `updatedby`, `updatedon`) VALUES
	(4, 6, 2, 1, 'Y', 'Y', NULL, '2018-03-15 10:25:16', NULL, NULL),
	(7, 8, 2, 1, 'Y', 'Y', NULL, '2018-03-15 10:28:30', NULL, NULL),
	(8, 9, 2, 1, 'Y', 'Y', NULL, '2018-03-15 13:13:42', NULL, NULL),
	(9, 10, 3, 14, 'Y', 'Y', NULL, '2018-03-16 08:29:05', NULL, NULL),
	(11, 11, 2, 1, 'Y', 'Y', 8, '2018-04-12 11:16:09', NULL, NULL),
	(12, 11, 2, 2, 'Y', 'Y', 8, '2018-04-12 11:16:09', NULL, NULL),
	(13, 11, 5, 15, 'Y', 'Y', 8, '2018-04-12 11:16:09', NULL, NULL),
	(14, 11, 7, 20, 'Y', 'Y', 8, '2018-04-12 11:16:09', NULL, NULL),
	(15, 11, 7, 21, 'Y', 'Y', 8, '2018-04-12 11:16:09', NULL, NULL),
	(16, 11, 7, 22, 'Y', 'Y', 8, '2018-04-12 11:16:09', NULL, NULL),
	(17, 11, 7, 23, 'Y', 'Y', 8, '2018-04-12 11:16:09', NULL, NULL),
	(66, 5, 1, 16, 'Y', 'Y', 8, '2018-05-09 14:29:20', NULL, NULL),
	(67, 5, 1, 17, 'Y', 'Y', 8, '2018-05-09 14:29:20', NULL, NULL),
	(68, 5, 1, 18, 'Y', 'Y', 8, '2018-05-09 14:29:20', NULL, NULL),
	(69, 5, 1, 19, 'Y', 'Y', 8, '2018-05-09 14:29:20', NULL, NULL),
	(70, 5, 2, 1, 'Y', 'Y', 8, '2018-05-09 14:29:20', NULL, NULL),
	(71, 5, 2, 2, 'Y', 'Y', 8, '2018-05-09 14:29:20', NULL, NULL),
	(72, 5, 3, 14, 'Y', 'Y', 8, '2018-05-09 14:29:20', NULL, NULL),
	(73, 5, 5, 15, 'Y', 'Y', 8, '2018-05-09 14:29:20', NULL, NULL),
	(74, 5, 7, 20, 'Y', 'Y', 8, '2018-05-09 14:29:20', NULL, NULL),
	(75, 5, 7, 21, 'Y', 'Y', 8, '2018-05-09 14:29:20', NULL, NULL),
	(76, 5, 7, 22, 'Y', 'Y', 8, '2018-05-09 14:29:20', NULL, NULL),
	(77, 5, 7, 23, 'Y', 'Y', 8, '2018-05-09 14:29:21', NULL, NULL);
/*!40000 ALTER TABLE `tbl_mng_role_privilages` ENABLE KEYS */;

-- Dumping structure for table Prv_Dev_TheManager.tbl_mng_subscriptions
CREATE TABLE IF NOT EXISTS `tbl_mng_subscriptions` (
  `subscriptions_id` int(11) NOT NULL AUTO_INCREMENT,
  `subscriptions_code` varchar(50) DEFAULT NULL,
  `subscriptions_prd_id` int(11) DEFAULT NULL,
  `subscriptions_status` int(11) DEFAULT NULL COMMENT '1:Just Subscribed;2:In progress;3:Ready for activate',
  `subscriptions_central_code` varchar(100) DEFAULT NULL,
  `subscriptions_created_by` tinyint(4) DEFAULT NULL COMMENT '1:the manager;2:rems;3:dc',
  `date_of_subscription` datetime DEFAULT NULL,
  `effective_from` datetime DEFAULT NULL,
  `effective_to` datetime DEFAULT NULL,
  `isactive` varchar(50) DEFAULT 'N',
  `created_by_name` varchar(50) DEFAULT 'N',
  `createdby` int(11) DEFAULT NULL,
  `createdon` datetime DEFAULT NULL,
  `updatedby` int(11) DEFAULT NULL,
  `updatedon` datetime DEFAULT NULL,
  `filled_status` int(11) DEFAULT NULL COMMENT '100:intial;101:filled',
  PRIMARY KEY (`subscriptions_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table Prv_Dev_TheManager.tbl_mng_subscriptions: ~5 rows (approximately)
/*!40000 ALTER TABLE `tbl_mng_subscriptions` DISABLE KEYS */;
INSERT INTO `tbl_mng_subscriptions` (`subscriptions_id`, `subscriptions_code`, `subscriptions_prd_id`, `subscriptions_status`, `subscriptions_central_code`, `subscriptions_created_by`, `date_of_subscription`, `effective_from`, `effective_to`, `isactive`, `created_by_name`, `createdby`, `createdon`, `updatedby`, `updatedon`, `filled_status`) VALUES
	(1, 'AAAAA00001', 5, 1, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 8, '0000-00-00 00:00:00', 8, '0000-00-00 00:00:00', 101),
	(3, 'AAAAA00002', 6, 1, '1', NULL, NULL, NULL, NULL, 'N', 'N', NULL, '1970-01-01 00:00:00', NULL, NULL, 101),
	(4, 'AAAAA00003', 5, 1, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 8, '0000-00-00 00:00:00', 8, '0000-00-00 00:00:00', 101),
	(5, 'AAAAA00004', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 8, '0000-00-00 00:00:00', NULL, NULL, 100),
	(6, 'AAAAA00005', 6, 1, NULL, NULL, NULL, NULL, NULL, 'N', 'N', NULL, '0000-00-00 00:00:00', NULL, NULL, 101);
/*!40000 ALTER TABLE `tbl_mng_subscriptions` ENABLE KEYS */;

-- Dumping structure for table Prv_Dev_TheManager.tbl_mng_subscriptions_companies
CREATE TABLE IF NOT EXISTS `tbl_mng_subscriptions_companies` (
  `companies_id` int(11) NOT NULL AUTO_INCREMENT,
  `subscription_id` int(11) DEFAULT NULL,
  `company_title` varchar(50) DEFAULT NULL,
  `company_name` varchar(50) DEFAULT NULL,
  `company_reg_number` varchar(50) DEFAULT NULL,
  `companies_email` varchar(50) DEFAULT NULL,
  `companies_phone` varchar(50) DEFAULT NULL,
  `companies_fax` varchar(50) DEFAULT NULL,
  `subscriptions_cmp_type` int(11) DEFAULT NULL COMMENT '1:individual;2:group',
  `subscriptions_cmp_innertype` int(11) DEFAULT NULL COMMENT '1:company;2:condo',
  `subscriptions_cmp_parent` int(11) DEFAULT NULL,
  `subscriptions_cmp_address` tinytext,
  `created_by` int(11) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  PRIMARY KEY (`companies_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table Prv_Dev_TheManager.tbl_mng_subscriptions_companies: 2 rows
/*!40000 ALTER TABLE `tbl_mng_subscriptions_companies` DISABLE KEYS */;
INSERT INTO `tbl_mng_subscriptions_companies` (`companies_id`, `subscription_id`, `company_title`, `company_name`, `company_reg_number`, `companies_email`, `companies_phone`, `companies_fax`, `subscriptions_cmp_type`, `subscriptions_cmp_innertype`, `subscriptions_cmp_parent`, `subscriptions_cmp_address`, `created_by`, `created_on`, `updated_by`, `updated_on`) VALUES
	(2, 4, NULL, 'website', 'website', 'website@website.com', '56555555', 'website', 2, 1, 29, 'website', 8, '0000-00-00 00:00:00', NULL, NULL),
	(3, 6, NULL, 'tedt', 'sdfs4444', 'teest@gmail.com', '232342342', '2342342', 1, 1, 23, 'dasdas', NULL, '0000-00-00 00:00:00', NULL, NULL);
/*!40000 ALTER TABLE `tbl_mng_subscriptions_companies` ENABLE KEYS */;

-- Dumping structure for table Prv_Dev_TheManager.tbl_mng_subscriptions_poc
CREATE TABLE IF NOT EXISTS `tbl_mng_subscriptions_poc` (
  `poc_id` int(11) NOT NULL AUTO_INCREMENT,
  `subscription_id` int(11) DEFAULT NULL,
  `companies_id` int(11) DEFAULT NULL,
  `poc_name` varchar(50) DEFAULT NULL,
  `poc_email` varchar(50) DEFAULT NULL,
  `poc_phone` varchar(50) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  PRIMARY KEY (`poc_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table Prv_Dev_TheManager.tbl_mng_subscriptions_poc: 2 rows
/*!40000 ALTER TABLE `tbl_mng_subscriptions_poc` DISABLE KEYS */;
INSERT INTO `tbl_mng_subscriptions_poc` (`poc_id`, `subscription_id`, `companies_id`, `poc_name`, `poc_email`, `poc_phone`, `created_by`, `created_on`, `updated_by`, `updated_on`) VALUES
	(2, 4, 2, 'website', 'website@website.com', '55525413', 8, '0000-00-00 00:00:00', NULL, NULL),
	(3, 6, 3, 'test', 'teest@gmail.com', '23423424234', NULL, '0000-00-00 00:00:00', NULL, NULL);
/*!40000 ALTER TABLE `tbl_mng_subscriptions_poc` ENABLE KEYS */;

-- Dumping structure for table Prv_Dev_TheManager.tbl_mng_subscription_ad
CREATE TABLE IF NOT EXISTS `tbl_mng_subscription_ad` (
  `scrb_act_or_de_ad_id` int(11) NOT NULL AUTO_INCREMENT,
  `scrb_id` int(11) DEFAULT NULL,
  `scrb_act_date` datetime DEFAULT NULL,
  `scrb_deact_date` datetime DEFAULT NULL,
  `scrb_act_or_de_paid_amt` varchar(50) DEFAULT NULL,
  `scrb_act_or_de_paymethod` int(11) DEFAULT NULL COMMENT '1:cash;2:check;3:online',
  `scrb_cheque_no` varchar(50) DEFAULT NULL,
  `scrb_bank_name` varchar(50) DEFAULT NULL,
  `scrb_act_or_de_trn_ref_num` varchar(50) DEFAULT NULL,
  `scrb_act_or_de_pay_received_by` varchar(50) DEFAULT NULL,
  `scrb_act_or_de_paid_on` datetime DEFAULT NULL,
  `scrb_act_or_de_comments` text,
  `scrb_act_or_de_state` int(11) DEFAULT '0' COMMENT '1:activation;2:deactive',
  `isactive` varchar(50) DEFAULT 'N',
  `createdby` int(11) DEFAULT NULL,
  `createdon` datetime DEFAULT NULL,
  `updatedby` int(11) DEFAULT NULL,
  `updatedon` datetime DEFAULT NULL,
  PRIMARY KEY (`scrb_act_or_de_ad_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table Prv_Dev_TheManager.tbl_mng_subscription_ad: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_mng_subscription_ad` DISABLE KEYS */;
INSERT INTO `tbl_mng_subscription_ad` (`scrb_act_or_de_ad_id`, `scrb_id`, `scrb_act_date`, `scrb_deact_date`, `scrb_act_or_de_paid_amt`, `scrb_act_or_de_paymethod`, `scrb_cheque_no`, `scrb_bank_name`, `scrb_act_or_de_trn_ref_num`, `scrb_act_or_de_pay_received_by`, `scrb_act_or_de_paid_on`, `scrb_act_or_de_comments`, `scrb_act_or_de_state`, `isactive`, `createdby`, `createdon`, `updatedby`, `updatedon`) VALUES
	(2, 1, '2018-05-21 00:00:00', '1970-01-01 00:00:00', '5', 1, NULL, '', '', 'sdf', '2018-05-14 00:00:00', '', 2, 'Y', 8, '0000-00-00 00:00:00', 8, '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `tbl_mng_subscription_ad` ENABLE KEYS */;

-- Dumping structure for table Prv_Dev_TheManager.tbl_mng_subscription_billing
CREATE TABLE IF NOT EXISTS `tbl_mng_subscription_billing` (
  `sub_billing_id` int(11) NOT NULL AUTO_INCREMENT,
  `bill_subscriptions_id` int(11) DEFAULT NULL,
  `sub_billing_measuring_units` float(10,2) DEFAULT NULL,
  `sub_billing_recurrign_duration` int(11) DEFAULT NULL COMMENT '1:yearly;2:monthly',
  `sub_billing_type` int(11) DEFAULT NULL COMMENT '1:fixed;2slab',
  `sub_billing_amount` int(11) DEFAULT NULL,
  `sub_billing_slabs` text,
  `sub_billing_effective_from` datetime DEFAULT NULL,
  `sub_billing_currency` varchar(50) DEFAULT NULL,
  `isactive` varchar(50) DEFAULT 'Y',
  `createdby` int(11) DEFAULT NULL,
  `createdon` datetime DEFAULT NULL,
  `updatedby` int(11) DEFAULT NULL,
  `updatedon` datetime DEFAULT NULL,
  PRIMARY KEY (`sub_billing_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table Prv_Dev_TheManager.tbl_mng_subscription_billing: 1 rows
/*!40000 ALTER TABLE `tbl_mng_subscription_billing` DISABLE KEYS */;
INSERT INTO `tbl_mng_subscription_billing` (`sub_billing_id`, `bill_subscriptions_id`, `sub_billing_measuring_units`, `sub_billing_recurrign_duration`, `sub_billing_type`, `sub_billing_amount`, `sub_billing_slabs`, `sub_billing_effective_from`, `sub_billing_currency`, `isactive`, `createdby`, `createdon`, `updatedby`, `updatedon`) VALUES
	(1, 1, NULL, 2, 2, 0, '[{"s_from":"2","s_to":"3","s_rate":"4"},{"s_from":"2","s_to":"3","s_rate":"4"},{"s_from":"3","s_to":"5","s_rate":"6"},{"s_from":"78","s_to":"98","s_rate":"98"},{"s_from":"","s_to":"","s_rate":""}]', '2018-05-16 00:00:00', 'ml', 'Y', 8, '2018-05-21 12:30:32', 8, '2018-05-21 14:03:12');
/*!40000 ALTER TABLE `tbl_mng_subscription_billing` ENABLE KEYS */;

-- Dumping structure for table Prv_Dev_TheManager.tbl_mng_template_images
CREATE TABLE IF NOT EXISTS `tbl_mng_template_images` (
  `template_images_id` int(11) NOT NULL AUTO_INCREMENT,
  `email_template_id` int(11) DEFAULT NULL,
  `template_images_name` text,
  `created_on` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`template_images_id`),
  KEY `FK_tbl_mng_template_images_tbl_email_templates` (`email_template_id`),
  CONSTRAINT `FK_tbl_mng_template_images_tbl_email_templates` FOREIGN KEY (`email_template_id`) REFERENCES `tbl_email_templates` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

-- Dumping data for table Prv_Dev_TheManager.tbl_mng_template_images: ~23 rows (approximately)
/*!40000 ALTER TABLE `tbl_mng_template_images` DISABLE KEYS */;
INSERT INTO `tbl_mng_template_images` (`template_images_id`, `email_template_id`, `template_images_name`, `created_on`, `created_by`, `updated_on`, `updated_by`) VALUES
	(1, 3, '5ad03ce221e73.png', '2018-04-13 07:15:14', 8, NULL, NULL),
	(2, 4, '5ad04b05cc4ed.png', '2018-04-13 06:15:33', 8, NULL, NULL),
	(3, 4, '5ad04b05ce79c.jpg', '2018-04-13 06:15:33', 8, NULL, NULL),
	(4, 4, '5ad04b05ceb25.jpg', '2018-04-13 06:15:33', 8, NULL, NULL),
	(30, 5, '5ad464987bc24.jpg', '2018-04-16 08:53:44', 8, NULL, NULL),
	(31, 5, '5ad46572d0fcb.png', '2018-04-16 08:57:22', 8, NULL, NULL),
	(32, 6, '5ad46d3dc9fef.jpg', '2018-04-16 09:30:37', 8, NULL, NULL),
	(33, 7, '5ad470545b401.jpeg', '2018-04-16 09:43:48', 8, NULL, NULL),
	(34, 7, '5ad47061e474b.jpeg', '2018-04-16 09:44:01', 8, NULL, NULL),
	(35, 7, '5ad4715a05e26.jpg', '2018-04-16 09:48:10', 8, NULL, NULL),
	(36, 8, '5ad473b0e36f5.jpg', '2018-04-16 09:58:08', 8, NULL, NULL),
	(37, 8, '5ad47431ccd51.jpg', '2018-04-16 10:00:17', 8, NULL, NULL),
	(39, 9, '5ad47baf02ed1.jpg', '2018-04-16 10:32:15', 8, NULL, NULL),
	(40, 9, '5ad47dedb534f.png', '2018-04-16 10:41:49', 8, NULL, NULL),
	(41, 9, '5ad47e3c1e74c.png', '2018-04-16 10:43:08', 8, NULL, NULL),
	(42, 9, '5ad47ea6a2f6c.png', '2018-04-16 10:44:54', 8, NULL, NULL),
	(43, 9, '5ad47f3c55506.png', '2018-04-16 10:47:31', 8, NULL, NULL),
	(44, 9, '5ad47f916ded8.png', '2018-04-16 10:48:49', 8, NULL, NULL),
	(45, 11, '5ad482870939f.png', '2018-04-16 11:01:27', 8, NULL, NULL),
	(46, 11, '5ad483377613a.jpg', '2018-04-16 11:04:23', 8, NULL, NULL),
	(50, 8, '5ad6bd01da74b.jpg', '2018-04-18 03:35:29', 8, NULL, NULL);
/*!40000 ALTER TABLE `tbl_mng_template_images` ENABLE KEYS */;

-- Dumping structure for table Prv_Dev_TheManager.tdl_mng_usermaster
CREATE TABLE IF NOT EXISTS `tdl_mng_usermaster` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) DEFAULT NULL,
  `user_email` varchar(100) DEFAULT NULL,
  `user_mobilenumber` varchar(100) DEFAULT NULL,
  `user_address` varchar(100) DEFAULT NULL,
  `user_profilepic` varchar(100) DEFAULT NULL,
  `user_countryid` int(11) DEFAULT NULL,
  `icr_passportnumber` varchar(50) DEFAULT NULL,
  `user_agentcompany` varchar(200) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `date_of_joining` date DEFAULT NULL,
  `reporting_to` int(11) DEFAULT NULL,
  `user_comments` text,
  `isemployee` varchar(50) DEFAULT NULL COMMENT 'U:User',
  `isactive` varchar(50) DEFAULT NULL COMMENT 'V:verification pending;Y:active;N:inactive',
  `current_password` varchar(100) DEFAULT NULL,
  `temparary_password` varchar(100) DEFAULT NULL,
  `createdby` int(11) DEFAULT NULL,
  `createdon` datetime DEFAULT NULL,
  `updatedby` int(11) DEFAULT NULL,
  `updatedon` datetime DEFAULT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- Dumping data for table Prv_Dev_TheManager.tdl_mng_usermaster: ~6 rows (approximately)
/*!40000 ALTER TABLE `tdl_mng_usermaster` DISABLE KEYS */;
INSERT INTO `tdl_mng_usermaster` (`userid`, `user_name`, `user_email`, `user_mobilenumber`, `user_address`, `user_profilepic`, `user_countryid`, `icr_passportnumber`, `user_agentcompany`, `date_of_birth`, `date_of_joining`, `reporting_to`, `user_comments`, `isemployee`, `isactive`, `current_password`, `temparary_password`, `createdby`, `createdon`, `updatedby`, `updatedon`) VALUES
	(1, 'Srikumar', 'sri@provalley.net', '879845612', 'Kukatpally,Hyderabad', NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, 'Y', 'Y', NULL, NULL, NULL, NULL, NULL, NULL),
	(6, 'murali', 'dsdds@de.com', '234', 'dad', NULL, 1, '2342', 'murali', NULL, NULL, NULL, 'asd', NULL, 'Y', NULL, NULL, NULL, '2018-03-12 12:01:14', NULL, NULL),
	(7, 'murali2', 'dsdds@de.com', '234', 'murali2', 'ce7665e5fdb8b9a416aecab77c73f31f.png', 1, '23423', 'murali2', NULL, NULL, NULL, 'murali2', NULL, 'Y', NULL, NULL, NULL, '2018-03-12 12:07:41', NULL, NULL),
	(8, 'Provalley', 'provalley@gmail.com', '99999999', 'kukatpally', NULL, 2, '123454', 'Provalley', NULL, NULL, NULL, 'Above Hdfc bank', NULL, 'Y', 'e10adc3949ba59abbe56e057f20f883e', 'e10adc3949ba59abbe56e057f20f883e', 1, '2018-03-12 12:27:47', NULL, NULL),
	(15, 'sagr', 'kajk@gmail.com', '346467', 'sdfg', 'ed1f126268410d00c982291cfc54a16b.jpeg', 1, 'w54t645y', 'sh', NULL, NULL, NULL, 'sdg', NULL, 'Y', NULL, NULL, NULL, '2018-03-16 13:25:00', NULL, NULL),
	(16, 'Provally', 'Provally@gmail.com', '99999999', 'xfhs', '7ce5ed2eda14dda3fb38695470c037a2.jpeg', 1, '134436', 'Provally', NULL, NULL, NULL, 'sgh', NULL, 'Y', NULL, NULL, NULL, '2018-03-16 13:30:11', NULL, NULL),
	(17, 'user', 'provalley@gmaial.com', '9996996969', 'kp', '205940636f0989e2f8f21922a189bcc0.jpeg', 1, '1324235', 'user', NULL, NULL, NULL, 'kp', NULL, 'Y', NULL, NULL, NULL, '2018-03-16 13:34:29', NULL, NULL);
/*!40000 ALTER TABLE `tdl_mng_usermaster` ENABLE KEYS */;

-- Dumping structure for table Prv_Dev_TheManager.tdl_mng_user_roles
CREATE TABLE IF NOT EXISTS `tdl_mng_user_roles` (
  `user_role_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `isactive` varchar(50) DEFAULT NULL,
  `effective_from` date DEFAULT NULL,
  `effective_to` date DEFAULT NULL,
  `createdby` int(11) DEFAULT NULL,
  `createdon` datetime DEFAULT NULL,
  `updatedby` int(11) DEFAULT NULL,
  `updatedon` datetime DEFAULT NULL,
  PRIMARY KEY (`user_role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- Dumping data for table Prv_Dev_TheManager.tdl_mng_user_roles: ~17 rows (approximately)
/*!40000 ALTER TABLE `tdl_mng_user_roles` DISABLE KEYS */;
INSERT INTO `tdl_mng_user_roles` (`user_role_id`, `user_id`, `role_id`, `department_id`, `isactive`, `effective_from`, `effective_to`, `createdby`, `createdon`, `updatedby`, `updatedon`) VALUES
	(1, 1, 1, 1, 'Y', '2018-03-12', NULL, NULL, '2018-03-12 13:10:49', NULL, NULL),
	(2, 2, 1, 1, 'Y', NULL, NULL, NULL, '2018-03-12 08:47:08', NULL, NULL),
	(3, 3, 1, 1, 'Y', NULL, NULL, NULL, '2018-03-12 10:26:41', NULL, NULL),
	(4, 4, 1, 1, 'Y', NULL, NULL, NULL, '2018-03-12 11:09:21', NULL, NULL),
	(5, 5, 1, 1, 'Y', NULL, NULL, NULL, '2018-03-12 11:59:20', NULL, NULL),
	(6, 6, 1, 1, 'Y', NULL, NULL, NULL, '2018-03-12 12:01:14', NULL, NULL),
	(7, 7, 1, 1, 'Y', NULL, NULL, NULL, '2018-03-12 12:07:41', NULL, NULL),
	(8, 8, 5, 1, 'Y', NULL, NULL, 1, '2018-03-12 12:27:47', NULL, NULL),
	(9, 8, 2, 1, 'Y', NULL, NULL, NULL, '2018-03-12 12:28:41', NULL, NULL),
	(10, 8, 10, 1, 'Y', NULL, NULL, NULL, '2018-03-12 12:33:10', NULL, NULL),
	(11, 11, 1, 1, 'Y', NULL, NULL, 1, '2018-03-12 12:45:28', NULL, NULL),
	(12, 12, 1, 1, 'Y', NULL, NULL, NULL, '2018-03-12 13:10:09', NULL, NULL),
	(13, 13, 1, 1, 'Y', NULL, NULL, 1, '2018-03-12 13:24:05', NULL, NULL),
	(14, 14, 5, 1, 'Y', NULL, NULL, 1, '2018-03-14 11:47:53', NULL, NULL),
	(15, 15, 1, 1, 'Y', NULL, NULL, NULL, '2018-03-16 13:25:00', NULL, NULL),
	(16, 16, 1, 1, 'Y', NULL, NULL, NULL, '2018-03-16 13:30:11', NULL, NULL),
	(17, 17, 1, 1, 'Y', NULL, NULL, NULL, '2018-03-16 13:34:29', NULL, NULL);
/*!40000 ALTER TABLE `tdl_mng_user_roles` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
