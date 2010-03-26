-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 24, 2010 at 10:09 PM
-- Server version: 5.1.37
-- PHP Version: 5.2.11

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `roskilde`
--

-- --------------------------------------------------------

--
-- Table structure for table `acos`
--

CREATE TABLE `acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=79 ;

--
-- Dumping data for table `acos`
--

INSERT INTO `acos` VALUES(1, NULL, NULL, NULL, 'Application', 1, 138);
INSERT INTO `acos` VALUES(2, 1, NULL, NULL, 'Controllers', 2, 119);
INSERT INTO `acos` VALUES(3, 1, NULL, NULL, 'Content', 120, 137);
INSERT INTO `acos` VALUES(4, 2, NULL, NULL, 'Pages', 3, 16);
INSERT INTO `acos` VALUES(5, 4, NULL, NULL, 'display', 4, 5);
INSERT INTO `acos` VALUES(7, 4, NULL, NULL, 'add', 6, 7);
INSERT INTO `acos` VALUES(8, 4, NULL, NULL, 'edit', 8, 9);
INSERT INTO `acos` VALUES(9, 4, NULL, NULL, 'index', 10, 11);
INSERT INTO `acos` VALUES(10, 4, NULL, NULL, 'view', 12, 13);
INSERT INTO `acos` VALUES(11, 4, NULL, NULL, 'delete', 14, 15);
INSERT INTO `acos` VALUES(12, 2, NULL, NULL, 'Groups', 17, 28);
INSERT INTO `acos` VALUES(13, 12, NULL, NULL, 'index', 18, 19);
INSERT INTO `acos` VALUES(14, 12, NULL, NULL, 'view', 20, 21);
INSERT INTO `acos` VALUES(15, 12, NULL, NULL, 'add', 22, 23);
INSERT INTO `acos` VALUES(16, 12, NULL, NULL, 'edit', 24, 25);
INSERT INTO `acos` VALUES(17, 12, NULL, NULL, 'delete', 26, 27);
INSERT INTO `acos` VALUES(75, 71, 'Project', 1, NULL, 131, 132);
INSERT INTO `acos` VALUES(19, 2, NULL, NULL, 'Items', 29, 40);
INSERT INTO `acos` VALUES(20, 19, NULL, NULL, 'index', 30, 31);
INSERT INTO `acos` VALUES(21, 19, NULL, NULL, 'view', 32, 33);
INSERT INTO `acos` VALUES(22, 19, NULL, NULL, 'add', 34, 35);
INSERT INTO `acos` VALUES(23, 19, NULL, NULL, 'edit', 36, 37);
INSERT INTO `acos` VALUES(24, 19, NULL, NULL, 'delete', 38, 39);
INSERT INTO `acos` VALUES(74, 70, 'Group', 4, NULL, 126, 129);
INSERT INTO `acos` VALUES(26, 2, NULL, NULL, 'ProjectItems', 41, 52);
INSERT INTO `acos` VALUES(27, 26, NULL, NULL, 'index', 42, 43);
INSERT INTO `acos` VALUES(28, 26, NULL, NULL, 'view', 44, 45);
INSERT INTO `acos` VALUES(29, 26, NULL, NULL, 'add', 46, 47);
INSERT INTO `acos` VALUES(30, 26, NULL, NULL, 'edit', 48, 49);
INSERT INTO `acos` VALUES(31, 26, NULL, NULL, 'delete', 50, 51);
INSERT INTO `acos` VALUES(73, 70, 'Group', 3, NULL, 124, 125);
INSERT INTO `acos` VALUES(33, 2, NULL, NULL, 'Projects', 53, 64);
INSERT INTO `acos` VALUES(34, 33, NULL, NULL, 'index', 54, 55);
INSERT INTO `acos` VALUES(35, 33, NULL, NULL, 'view', 56, 57);
INSERT INTO `acos` VALUES(36, 33, NULL, NULL, 'add', 58, 59);
INSERT INTO `acos` VALUES(37, 33, NULL, NULL, 'edit', 60, 61);
INSERT INTO `acos` VALUES(38, 33, NULL, NULL, 'delete', 62, 63);
INSERT INTO `acos` VALUES(72, 70, 'Group', 2, NULL, 122, 123);
INSERT INTO `acos` VALUES(40, 2, NULL, NULL, 'Roles', 65, 76);
INSERT INTO `acos` VALUES(41, 40, NULL, NULL, 'index', 66, 67);
INSERT INTO `acos` VALUES(42, 40, NULL, NULL, 'view', 68, 69);
INSERT INTO `acos` VALUES(43, 40, NULL, NULL, 'add', 70, 71);
INSERT INTO `acos` VALUES(44, 40, NULL, NULL, 'edit', 72, 73);
INSERT INTO `acos` VALUES(45, 40, NULL, NULL, 'delete', 74, 75);
INSERT INTO `acos` VALUES(71, 70, 'Group', 1, NULL, 130, 135);
INSERT INTO `acos` VALUES(47, 2, NULL, NULL, 'Sections', 77, 88);
INSERT INTO `acos` VALUES(48, 47, NULL, NULL, 'index', 78, 79);
INSERT INTO `acos` VALUES(49, 47, NULL, NULL, 'view', 80, 81);
INSERT INTO `acos` VALUES(50, 47, NULL, NULL, 'add', 82, 83);
INSERT INTO `acos` VALUES(51, 47, NULL, NULL, 'edit', 84, 85);
INSERT INTO `acos` VALUES(52, 47, NULL, NULL, 'delete', 86, 87);
INSERT INTO `acos` VALUES(54, 2, NULL, NULL, 'Users', 89, 104);
INSERT INTO `acos` VALUES(55, 54, NULL, NULL, 'login', 90, 91);
INSERT INTO `acos` VALUES(56, 54, NULL, NULL, 'logout', 92, 93);
INSERT INTO `acos` VALUES(57, 54, NULL, NULL, 'index', 94, 95);
INSERT INTO `acos` VALUES(58, 54, NULL, NULL, 'view', 96, 97);
INSERT INTO `acos` VALUES(59, 54, NULL, NULL, 'add', 98, 99);
INSERT INTO `acos` VALUES(60, 54, NULL, NULL, 'edit', 100, 101);
INSERT INTO `acos` VALUES(61, 54, NULL, NULL, 'delete', 102, 103);
INSERT INTO `acos` VALUES(70, 3, 'Section', 1, NULL, 121, 136);
INSERT INTO `acos` VALUES(63, 2, NULL, NULL, 'Setup', 105, 118);
INSERT INTO `acos` VALUES(64, 63, NULL, NULL, 'aco_build_controlleractions', 106, 107);
INSERT INTO `acos` VALUES(65, 63, NULL, NULL, 'add', 108, 109);
INSERT INTO `acos` VALUES(66, 63, NULL, NULL, 'edit', 110, 111);
INSERT INTO `acos` VALUES(67, 63, NULL, NULL, 'index', 112, 113);
INSERT INTO `acos` VALUES(68, 63, NULL, NULL, 'view', 114, 115);
INSERT INTO `acos` VALUES(69, 63, NULL, NULL, 'delete', 116, 117);
INSERT INTO `acos` VALUES(76, 71, 'Project', 2, NULL, 133, 134);
INSERT INTO `acos` VALUES(77, 74, 'Project', 3, NULL, 127, 128);

-- --------------------------------------------------------

--
-- Table structure for table `aros`
--

CREATE TABLE `aros` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `aros`
--

INSERT INTO `aros` VALUES(1, NULL, 'Role', 1, NULL, 1, 4);
INSERT INTO `aros` VALUES(2, NULL, 'Role', 2, NULL, 5, 8);
INSERT INTO `aros` VALUES(3, NULL, 'Role', 3, NULL, 9, 14);
INSERT INTO `aros` VALUES(4, NULL, 'Role', 4, NULL, 15, 20);
INSERT INTO `aros` VALUES(10, 2, 'User', 6, NULL, 6, 7);
INSERT INTO `aros` VALUES(9, 1, 'User', 5, NULL, 2, 3);
INSERT INTO `aros` VALUES(11, 3, 'User', 7, NULL, 10, 11);
INSERT INTO `aros` VALUES(12, 4, 'User', 8, NULL, 16, 17);
INSERT INTO `aros` VALUES(13, 4, 'User', 9, NULL, 18, 19);
INSERT INTO `aros` VALUES(14, 3, 'User', 10, NULL, 12, 13);

-- --------------------------------------------------------

--
-- Table structure for table `aros_acos`
--

CREATE TABLE `aros_acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `aro_id` int(10) NOT NULL,
  `aco_id` int(10) NOT NULL,
  `_create` varchar(2) NOT NULL DEFAULT '0',
  `_read` varchar(2) NOT NULL DEFAULT '0',
  `_update` varchar(2) NOT NULL DEFAULT '0',
  `_delete` varchar(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ARO_ACO_KEY` (`aro_id`,`aco_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `aros_acos`
--

INSERT INTO `aros_acos` VALUES(1, 1, 1, '1', '1', '1', '1');
INSERT INTO `aros_acos` VALUES(2, 2, 54, '1', '1', '1', '1');
INSERT INTO `aros_acos` VALUES(3, 2, 33, '1', '1', '1', '1');
INSERT INTO `aros_acos` VALUES(4, 2, 26, '1', '1', '1', '1');
INSERT INTO `aros_acos` VALUES(5, 2, 19, '1', '1', '1', '1');
INSERT INTO `aros_acos` VALUES(6, 3, 1, '-1', '-1', '-1', '-1');
INSERT INTO `aros_acos` VALUES(7, 3, 33, '1', '1', '1', '1');
INSERT INTO `aros_acos` VALUES(8, 3, 26, '1', '1', '1', '1');
INSERT INTO `aros_acos` VALUES(9, 4, 1, '-1', '-1', '-1', '-1');
INSERT INTO `aros_acos` VALUES(10, 4, 34, '1', '1', '1', '1');
INSERT INTO `aros_acos` VALUES(11, 4, 35, '1', '1', '1', '1');
INSERT INTO `aros_acos` VALUES(12, 4, 37, '1', '1', '1', '1');
INSERT INTO `aros_acos` VALUES(13, 4, 26, '1', '1', '1', '1');
INSERT INTO `aros_acos` VALUES(14, 2, 1, '-1', '-1', '-1', '-1');
INSERT INTO `aros_acos` VALUES(15, 9, 3, '1', '1', '1', '1');
INSERT INTO `aros_acos` VALUES(16, 10, 70, '1', '1', '1', '1');
INSERT INTO `aros_acos` VALUES(17, 11, 71, '1', '1', '1', '1');
INSERT INTO `aros_acos` VALUES(18, 12, 75, '1', '1', '1', '1');
INSERT INTO `aros_acos` VALUES(23, 12, 77, '-1', '-1', '-1', '-1');
INSERT INTO `aros_acos` VALUES(22, 11, 77, '-1', '-1', '-1', '-1');
INSERT INTO `aros_acos` VALUES(24, 12, 76, '1', '1', '1', '1');
INSERT INTO `aros_acos` VALUES(25, 13, 77, '1', '1', '1', '1');
INSERT INTO `aros_acos` VALUES(26, 13, 76, '-1', '-1', '-1', '-1');
INSERT INTO `aros_acos` VALUES(27, 14, 74, '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL,
  `section_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` VALUES(1, 'Nord-Vest', 1, 7, '2010-03-22 11:12:41', '2010-03-22 13:18:23');
INSERT INTO `groups` VALUES(2, 'Nord-Ã˜st', 1, 0, '2010-03-22 11:12:53', '2010-03-22 11:12:53');
INSERT INTO `groups` VALUES(3, 'Syd-Vest', 1, 0, '2010-03-22 11:13:00', '2010-03-22 11:13:00');
INSERT INTO `groups` VALUES(4, 'Syd-Ã˜st', 1, 10, '2010-03-22 11:13:11', '2010-03-22 11:13:11');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL,
  `description` text NOT NULL,
  `power_usage` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `items`
--

INSERT INTO `items` VALUES(1, 'Fryser', '', 900, '2010-03-22 10:46:10', '2010-03-22 10:46:10');
INSERT INTO `items` VALUES(2, 'KÃ¸leskab', '', 600, '2010-03-22 10:46:24', '2010-03-22 10:46:24');
INSERT INTO `items` VALUES(3, 'Fjernsyn', '', 300, '2010-03-22 10:46:51', '2010-03-22 10:46:51');
INSERT INTO `items` VALUES(4, 'Blender', '', 120, '2010-03-22 10:47:00', '2010-03-22 10:47:00');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `body` text,
  `total_power_usage` int(11) NOT NULL,
  `total_power_allowance` int(11) NOT NULL,
  `build_start` datetime DEFAULT NULL,
  `build_end` datetime DEFAULT NULL,
  `items_start` datetime DEFAULT NULL,
  `items_end` datetime DEFAULT NULL,
  `status` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` VALUES(1, 'Sandwich Boden', 'Vi sÃ¦lger skÃ¸nne sandwiches!', 123, 923, '2010-03-18 21:42:00', '2010-03-18 21:42:00', '2010-03-18 21:42:00', '2010-03-18 21:42:00', 1, 1, 8, '2010-03-18 21:42:54', '2010-03-22 16:26:45');
INSERT INTO `projects` VALUES(2, 'Gogo Bar', 'SpÃ¦ndende strip for fÃ¥ penge', 234, 923, '2010-03-18 21:42:00', '2010-03-18 21:42:00', '2010-03-18 21:42:00', '2010-03-18 21:42:00', 1, 1, 8, '2010-03-18 21:43:25', '2010-03-22 16:26:57');
INSERT INTO `projects` VALUES(3, 'Skateboard Parken', 'Chill out i vest', 600, 800, '2010-03-22 02:09:00', '2010-03-22 02:09:00', '2010-03-22 02:09:00', '2010-03-22 02:09:00', 0, 4, 9, '2010-03-22 02:10:51', '2010-03-22 16:34:19');

-- --------------------------------------------------------

--
-- Table structure for table `project_items`
--

CREATE TABLE `project_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` char(100) DEFAULT NULL,
  `description` text,
  `power_usage` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `project_id` (`project_id`),
  KEY `item_id` (`item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `project_items`
--

INSERT INTO `project_items` VALUES(1, '', '', NULL, 1, 1, '2010-03-22 10:57:15', '2010-03-22 10:57:15');
INSERT INTO `project_items` VALUES(2, '', '', NULL, 2, 1, '2010-03-22 10:57:23', '2010-03-22 10:57:23');
INSERT INTO `project_items` VALUES(3, '', '', NULL, 2, 2, '2010-03-22 10:57:30', '2010-03-22 10:57:30');
INSERT INTO `project_items` VALUES(4, 'Neonskilt', '2 x 3 meters grÃ¸nt neonskilt', 700, NULL, 1, '2010-03-22 11:10:41', '2010-03-22 11:10:41');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` VALUES(1, 'Administrators', '2010-03-18 20:27:56', '2010-03-22 17:50:36');
INSERT INTO `roles` VALUES(2, 'Section Managers', '2010-03-18 20:28:12', '2010-03-22 17:50:44');
INSERT INTO `roles` VALUES(3, 'Group Managers', '2010-03-18 20:28:19', '2010-03-22 17:50:52');
INSERT INTO `roles` VALUES(4, 'Project Managers', '2010-03-18 20:28:28', '2010-03-22 17:50:59');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` VALUES(1, 'Underholdning', 6, '2010-03-22 11:11:40', '2010-03-22 11:11:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` char(40) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` VALUES(5, 'admin', '080e8122480a972ec29561e7466539745ed9d223', 1, '2010-03-18 20:59:20', '2010-03-18 20:59:20');
INSERT INTO `users` VALUES(6, 'sectiondude', '080e8122480a972ec29561e7466539745ed9d223', 2, '2010-03-18 21:03:45', '2010-03-18 21:03:45');
INSERT INTO `users` VALUES(7, 'groupdude', '080e8122480a972ec29561e7466539745ed9d223', 3, '2010-03-18 21:04:01', '2010-03-18 21:04:01');
INSERT INTO `users` VALUES(8, 'projectdude', '080e8122480a972ec29561e7466539745ed9d223', 4, '2010-03-18 21:04:15', '2010-03-18 21:04:15');
INSERT INTO `users` VALUES(9, 'projectmate', '080e8122480a972ec29561e7466539745ed9d223', 4, '2010-03-22 17:14:04', '2010-03-22 17:14:04');
INSERT INTO `users` VALUES(10, 'groupmate', '080e8122480a972ec29561e7466539745ed9d223', 3, '2010-03-22 19:40:44', '2010-03-22 19:40:44');
