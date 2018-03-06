-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2018 at 06:19 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `managers`
--

-- --------------------------------------------------------

--
-- Table structure for table `managers_admin`
--

CREATE TABLE `managers_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) DEFAULT NULL,
  `admin_email` varchar(50) DEFAULT NULL,
  `admin_phone` varchar(50) DEFAULT NULL,
  `admin_password` varchar(50) DEFAULT NULL,
  `admin_image` varchar(50) DEFAULT NULL,
  `admin_cr_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `managers_department`
--

CREATE TABLE `managers_department` (
  `department_id` bigint(20) NOT NULL,
  `department_name` varchar(50) DEFAULT NULL,
  `department_code` varchar(50) DEFAULT NULL,
  `department_description` text,
  `departments_status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1:Active;2:inactive',
  `departments_effective_from` datetime DEFAULT NULL,
  `departments_effective_to` datetime DEFAULT NULL,
  `departments_cr_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `managers_role`
--

CREATE TABLE `managers_role` (
  `role_id` bigint(20) NOT NULL,
  `role_departmentid` bigint(20) DEFAULT NULL,
  `role_name` varchar(50) DEFAULT NULL,
  `role_code` varchar(50) DEFAULT NULL,
  `role_description` text,
  `role_status` tinyint(4) DEFAULT '0' COMMENT '1:Active;2:inactive',
  `role_effective_from` datetime DEFAULT NULL,
  `role_effective_to` datetime DEFAULT NULL,
  `role_cr_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `managers_subrole`
--

CREATE TABLE `managers_subrole` (
  `subrole_id` bigint(20) NOT NULL,
  `subrole_roleid` bigint(20) DEFAULT NULL,
  `subrole_name` varchar(50) DEFAULT NULL,
  `subrole_code` varchar(50) DEFAULT NULL,
  `subrole_description` text,
  `subrole_status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1:Active;2:inactive',
  `subrole_effective_from` datetime DEFAULT NULL,
  `role_effective_to` datetime DEFAULT NULL,
  `subrole_cr_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `managers_admin`
--
ALTER TABLE `managers_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `managers_department`
--
ALTER TABLE `managers_department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `managers_role`
--
ALTER TABLE `managers_role`
  ADD PRIMARY KEY (`role_id`),
  ADD KEY `FK_managers_role_managers_department` (`role_departmentid`);

--
-- Indexes for table `managers_subrole`
--
ALTER TABLE `managers_subrole`
  ADD PRIMARY KEY (`subrole_id`),
  ADD KEY `FK_managers_subrole_managers_role` (`subrole_roleid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `managers_admin`
--
ALTER TABLE `managers_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `managers_department`
--
ALTER TABLE `managers_department`
  MODIFY `department_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `managers_role`
--
ALTER TABLE `managers_role`
  MODIFY `role_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `managers_subrole`
--
ALTER TABLE `managers_subrole`
  MODIFY `subrole_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `managers_role`
--
ALTER TABLE `managers_role`
  ADD CONSTRAINT `FK_managers_role_managers_department` FOREIGN KEY (`role_departmentid`) REFERENCES `managers_department` (`department_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `managers_subrole`
--
ALTER TABLE `managers_subrole`
  ADD CONSTRAINT `FK_managers_subrole_managers_role` FOREIGN KEY (`subrole_roleid`) REFERENCES `managers_role` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
