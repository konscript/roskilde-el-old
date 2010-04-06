-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 06, 2010 at 08:35 PM
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=90 ;

--
-- Dumping data for table `acos`
--

INSERT INTO `acos` VALUES(1, NULL, NULL, NULL, 'Application', 1, 160);
INSERT INTO `acos` VALUES(2, 1, NULL, NULL, 'Controllers', 2, 131);
INSERT INTO `acos` VALUES(3, 1, NULL, NULL, 'Content', 132, 159);
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
INSERT INTO `acos` VALUES(75, 71, 'Project', 1, NULL, 147, 148);
INSERT INTO `acos` VALUES(19, 2, NULL, NULL, 'Items', 29, 40);
INSERT INTO `acos` VALUES(20, 19, NULL, NULL, 'index', 30, 31);
INSERT INTO `acos` VALUES(21, 19, NULL, NULL, 'view', 32, 33);
INSERT INTO `acos` VALUES(22, 19, NULL, NULL, 'add', 34, 35);
INSERT INTO `acos` VALUES(23, 19, NULL, NULL, 'edit', 36, 37);
INSERT INTO `acos` VALUES(24, 19, NULL, NULL, 'delete', 38, 39);
INSERT INTO `acos` VALUES(74, 70, 'Group', 4, NULL, 142, 145);
INSERT INTO `acos` VALUES(26, 2, NULL, NULL, 'ProjectItems', 41, 52);
INSERT INTO `acos` VALUES(27, 26, NULL, NULL, 'index', 42, 43);
INSERT INTO `acos` VALUES(28, 26, NULL, NULL, 'view', 44, 45);
INSERT INTO `acos` VALUES(29, 26, NULL, NULL, 'add', 46, 47);
INSERT INTO `acos` VALUES(30, 26, NULL, NULL, 'edit', 48, 49);
INSERT INTO `acos` VALUES(31, 26, NULL, NULL, 'delete', 50, 51);
INSERT INTO `acos` VALUES(73, 70, 'Group', 3, NULL, 136, 141);
INSERT INTO `acos` VALUES(33, 2, NULL, NULL, 'Projects', 53, 68);
INSERT INTO `acos` VALUES(34, 33, NULL, NULL, 'index', 54, 55);
INSERT INTO `acos` VALUES(35, 33, NULL, NULL, 'view', 56, 57);
INSERT INTO `acos` VALUES(36, 33, NULL, NULL, 'add', 58, 59);
INSERT INTO `acos` VALUES(37, 33, NULL, NULL, 'edit', 60, 61);
INSERT INTO `acos` VALUES(38, 33, NULL, NULL, 'delete', 62, 63);
INSERT INTO `acos` VALUES(72, 70, 'Group', 2, NULL, 134, 135);
INSERT INTO `acos` VALUES(40, 2, NULL, NULL, 'Roles', 69, 80);
INSERT INTO `acos` VALUES(41, 40, NULL, NULL, 'index', 70, 71);
INSERT INTO `acos` VALUES(42, 40, NULL, NULL, 'view', 72, 73);
INSERT INTO `acos` VALUES(43, 40, NULL, NULL, 'add', 74, 75);
INSERT INTO `acos` VALUES(44, 40, NULL, NULL, 'edit', 76, 77);
INSERT INTO `acos` VALUES(45, 40, NULL, NULL, 'delete', 78, 79);
INSERT INTO `acos` VALUES(71, 70, 'Group', 1, NULL, 146, 157);
INSERT INTO `acos` VALUES(47, 2, NULL, NULL, 'Sections', 81, 92);
INSERT INTO `acos` VALUES(48, 47, NULL, NULL, 'index', 82, 83);
INSERT INTO `acos` VALUES(49, 47, NULL, NULL, 'view', 84, 85);
INSERT INTO `acos` VALUES(50, 47, NULL, NULL, 'add', 86, 87);
INSERT INTO `acos` VALUES(51, 47, NULL, NULL, 'edit', 88, 89);
INSERT INTO `acos` VALUES(52, 47, NULL, NULL, 'delete', 90, 91);
INSERT INTO `acos` VALUES(54, 2, NULL, NULL, 'Users', 93, 110);
INSERT INTO `acos` VALUES(55, 54, NULL, NULL, 'login', 94, 95);
INSERT INTO `acos` VALUES(56, 54, NULL, NULL, 'logout', 96, 97);
INSERT INTO `acos` VALUES(57, 54, NULL, NULL, 'index', 98, 99);
INSERT INTO `acos` VALUES(58, 54, NULL, NULL, 'view', 100, 101);
INSERT INTO `acos` VALUES(59, 54, NULL, NULL, 'add', 102, 103);
INSERT INTO `acos` VALUES(60, 54, NULL, NULL, 'edit', 104, 105);
INSERT INTO `acos` VALUES(61, 54, NULL, NULL, 'delete', 106, 107);
INSERT INTO `acos` VALUES(70, 3, 'Section', 1, NULL, 133, 158);
INSERT INTO `acos` VALUES(63, 2, NULL, NULL, 'Setup', 111, 130);
INSERT INTO `acos` VALUES(64, 63, NULL, NULL, 'aco_build_controlleractions', 112, 113);
INSERT INTO `acos` VALUES(65, 63, NULL, NULL, 'add', 114, 115);
INSERT INTO `acos` VALUES(66, 63, NULL, NULL, 'edit', 116, 117);
INSERT INTO `acos` VALUES(67, 63, NULL, NULL, 'index', 118, 119);
INSERT INTO `acos` VALUES(68, 63, NULL, NULL, 'view', 120, 121);
INSERT INTO `acos` VALUES(69, 63, NULL, NULL, 'delete', 122, 123);
INSERT INTO `acos` VALUES(76, 71, 'Project', 2, NULL, 149, 150);
INSERT INTO `acos` VALUES(77, 74, 'Project', 3, NULL, 143, 144);
INSERT INTO `acos` VALUES(79, 33, NULL, NULL, 'createRandomPassword', 64, 65);
INSERT INTO `acos` VALUES(80, 33, NULL, NULL, 'createProject', 66, 67);
INSERT INTO `acos` VALUES(81, 63, NULL, NULL, 'permissions_assign_controlleractions', 124, 125);
INSERT INTO `acos` VALUES(82, 63, NULL, NULL, 'permissions_assign_content', 126, 127);
INSERT INTO `acos` VALUES(83, 63, NULL, NULL, 'permissions_check', 128, 129);
INSERT INTO `acos` VALUES(84, 54, NULL, NULL, 'profile', 108, 109);
INSERT INTO `acos` VALUES(85, 73, 'Project', 4, NULL, 137, 138);
INSERT INTO `acos` VALUES(86, 73, 'Project', 5, NULL, 139, 140);
INSERT INTO `acos` VALUES(87, 71, 'Project', 6, NULL, 151, 152);
INSERT INTO `acos` VALUES(88, 71, 'Project', 7, NULL, 153, 154);
INSERT INTO `acos` VALUES(89, 71, 'Project', 8, NULL, 155, 156);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `aros`
--

INSERT INTO `aros` VALUES(1, NULL, 'Role', 1, NULL, 3, 6);
INSERT INTO `aros` VALUES(2, NULL, 'Role', 2, NULL, 7, 10);
INSERT INTO `aros` VALUES(3, NULL, 'Role', 3, NULL, 11, 16);
INSERT INTO `aros` VALUES(4, NULL, 'Role', 4, NULL, 17, 30);
INSERT INTO `aros` VALUES(10, 2, 'User', 6, NULL, 8, 9);
INSERT INTO `aros` VALUES(9, 1, 'User', 5, NULL, 4, 5);
INSERT INTO `aros` VALUES(11, 3, 'User', 7, NULL, 12, 13);
INSERT INTO `aros` VALUES(12, 4, 'User', 8, NULL, 18, 19);
INSERT INTO `aros` VALUES(13, 4, 'User', 9, NULL, 20, 21);
INSERT INTO `aros` VALUES(14, 3, 'User', 10, NULL, 14, 15);
INSERT INTO `aros` VALUES(15, NULL, NULL, NULL, 'Requesters', 1, 2);
INSERT INTO `aros` VALUES(17, 4, 'User', 12, NULL, 24, 25);
INSERT INTO `aros` VALUES(16, 4, 'User', 11, NULL, 22, 23);
INSERT INTO `aros` VALUES(18, 4, 'User', 13, NULL, 26, 27);
INSERT INTO `aros` VALUES(19, 4, 'User', 14, NULL, 28, 29);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

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
INSERT INTO `aros_acos` VALUES(25, 13, 77, '-1', '-1', '-1', '-1');
INSERT INTO `aros_acos` VALUES(26, 13, 76, '-1', '-1', '-1', '-1');
INSERT INTO `aros_acos` VALUES(27, 14, 74, '1', '1', '1', '1');
INSERT INTO `aros_acos` VALUES(28, 2, 12, '1', '1', '1', '1');
INSERT INTO `aros_acos` VALUES(29, 2, 41, '1', '1', '1', '1');
INSERT INTO `aros_acos` VALUES(30, 2, 42, '1', '1', '1', '1');
INSERT INTO `aros_acos` VALUES(31, 3, 20, '1', '1', '1', '1');
INSERT INTO `aros_acos` VALUES(32, 3, 21, '1', '1', '1', '1');
INSERT INTO `aros_acos` VALUES(33, 15, 5, '1', '1', '1', '1');
INSERT INTO `aros_acos` VALUES(34, 16, 85, '1', '1', '1', '1');
INSERT INTO `aros_acos` VALUES(35, 17, 86, '1', '1', '1', '1');
INSERT INTO `aros_acos` VALUES(36, 18, 87, '1', '1', '1', '1');
INSERT INTO `aros_acos` VALUES(37, 19, 88, '1', '1', '1', '1');
INSERT INTO `aros_acos` VALUES(38, 12, 89, '1', '1', '1', '1');

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

INSERT INTO `items` VALUES(1, 'Fryser', 'Kold kold fryser', 900, '2010-03-22 10:46:10', '2010-03-27 18:29:17');
INSERT INTO `items` VALUES(2, 'KÃ¸leskab', 'VÃ¦rre kulde end nordpolen', 600, '2010-03-22 10:46:24', '2010-03-27 18:29:53');
INSERT INTO `items` VALUES(3, 'Fjernsyn', 'Stort LCD, Ã¦der forfÃ¦rdelig meget strÃ¸m', 300, '2010-03-22 10:46:51', '2010-03-27 18:30:16');
INSERT INTO `items` VALUES(4, 'Blender', 'Sexy lille blender', 120, '2010-03-22 10:47:00', '2010-03-27 18:30:25');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `body` text,
  `total_power_usage` int(11) DEFAULT NULL,
  `total_power_allowance` int(11) DEFAULT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` VALUES(1, 'Sandwich Boden', 'Vi sÃ¦lger skÃ¸nne sandwiches! ;)', 123, 923, '2010-03-18 21:42:00', '2010-03-18 21:42:00', '2010-03-18 21:42:00', '2010-03-18 21:42:00', 1, 1, 8, '2010-03-18 21:42:54', '2010-03-22 16:26:45');
INSERT INTO `projects` VALUES(2, 'Gogo Bar', 'SpÃ¦ndende strip for fÃ¥ penge', 234, 923, '2010-03-18 21:42:00', '2010-03-18 21:42:00', '2010-03-18 21:42:00', '2010-03-18 21:42:00', 1, 1, 8, '2010-03-18 21:43:25', '2010-03-22 16:26:57');
INSERT INTO `projects` VALUES(3, 'Skateboard Parken', 'Chill out i vest!', 600, 800, '2010-03-22 02:09:00', '2010-03-22 02:09:00', '2010-03-22 02:09:00', '2010-03-22 02:09:00', 0, 4, 9, '2010-03-22 02:10:51', '2010-03-22 16:34:19');
INSERT INTO `projects` VALUES(4, 'Stripklub', 'Direkte fra downtown Amsterdam', 0, 1231, NULL, NULL, NULL, NULL, 0, 3, 11, '2010-04-06 15:02:09', '2010-04-06 15:02:09');
INSERT INTO `projects` VALUES(5, 'Pornobiks', 'LÃ¦kkert bebs', 0, 5432, NULL, NULL, NULL, NULL, 0, 3, 12, '2010-04-06 15:13:00', '2010-04-06 15:13:00');
INSERT INTO `projects` VALUES(6, 'Surfer Shop', 'Surfin USA!', 0, 432, NULL, NULL, NULL, NULL, 0, 1, 13, '2010-04-06 15:15:09', '2010-04-06 15:15:09');
INSERT INTO `projects` VALUES(7, 'Tester ', 'hey yo!', 0, 324, NULL, NULL, NULL, NULL, 0, 1, 14, '2010-04-06 15:20:32', '2010-04-06 15:20:32');
INSERT INTO `projects` VALUES(8, 'adsdasda', '', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 8, '2010-04-06 19:47:18', '2010-04-06 19:47:18');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `project_items`
--

INSERT INTO `project_items` VALUES(4, 'Neonskilt', '2 x 3 meters grÃ¸nt neonskilt', 700, NULL, 1, '2010-03-22 11:10:41', '2010-03-22 11:10:41');
INSERT INTO `project_items` VALUES(5, NULL, NULL, NULL, 1, 1, NULL, NULL);
INSERT INTO `project_items` VALUES(6, NULL, NULL, NULL, 2, 1, NULL, NULL);
INSERT INTO `project_items` VALUES(7, NULL, NULL, NULL, 2, 2, NULL, NULL);
INSERT INTO `project_items` VALUES(8, '', '', NULL, 4, 2, '2010-03-27 22:48:55', '2010-03-27 22:48:55');
INSERT INTO `project_items` VALUES(10, 'Something dogg 1', 'Yeah baby', 9123, NULL, 1, '2010-03-27 23:36:04', '2010-03-27 23:36:04');
INSERT INTO `project_items` VALUES(11, '', '', NULL, 3, 1, '2010-03-27 23:41:45', '2010-03-27 23:41:45');

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

INSERT INTO `roles` VALUES(1, 'Administrator', '2010-03-18 20:27:56', '2010-03-30 18:29:27');
INSERT INTO `roles` VALUES(2, 'Sektionsleder', '2010-03-18 20:28:12', '2010-03-30 18:29:20');
INSERT INTO `roles` VALUES(3, 'Gruppeleder', '2010-03-18 20:28:19', '2010-03-30 18:29:37');
INSERT INTO `roles` VALUES(4, 'Projektleder', '2010-03-18 20:28:28', '2010-03-30 18:29:48');

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
  `title` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` char(40) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` VALUES(5, '', 'admin', '080e8122480a972ec29561e7466539745ed9d223', 1, '2010-03-18 20:59:20', '2010-03-31 02:26:52');
INSERT INTO `users` VALUES(6, '', 'sectiondude', '080e8122480a972ec29561e7466539745ed9d223', 2, '2010-03-18 21:03:45', '2010-03-18 21:03:45');
INSERT INTO `users` VALUES(7, '', 'groupdude', '080e8122480a972ec29561e7466539745ed9d223', 3, '2010-03-18 21:04:01', '2010-03-18 21:04:01');
INSERT INTO `users` VALUES(8, '', 'projectdude', '080e8122480a972ec29561e7466539745ed9d223', 4, '2010-03-18 21:04:15', '2010-03-18 21:04:15');
INSERT INTO `users` VALUES(9, '', 'projectmatey', '080e8122480a972ec29561e7466539745ed9d223', 4, '2010-03-22 17:14:04', '2010-03-31 03:04:49');
INSERT INTO `users` VALUES(10, '', 'groupmate', '080e8122480a972ec29561e7466539745ed9d223', 3, '2010-03-22 19:40:44', '2010-03-22 19:40:44');
INSERT INTO `users` VALUES(11, 'Lasse Boisen Andersen', 'la@laander.com', '080e8122480a972ec29561e7466539745ed9d223', 4, '2010-04-06 15:02:09', '2010-04-06 20:14:52');
INSERT INTO `users` VALUES(12, '', 'soerenlouv@gmail.com', '98e9426b6521c563c64e9c7968265b1f5b235e69', 4, '2010-04-06 15:13:00', '2010-04-06 15:13:00');
INSERT INTO `users` VALUES(13, '', 'sorenlouv@gmail.com', '67802966e274673be7f056728b005a67b0aeefe3', 4, '2010-04-06 15:15:09', '2010-04-06 15:15:09');
INSERT INTO `users` VALUES(14, '', 'lasseandersen1901@hotmail.com', 'd30e4bff61ca48314b7d7092800bb0b321013e84', 4, '2010-04-06 15:20:32', '2010-04-06 15:20:32');
