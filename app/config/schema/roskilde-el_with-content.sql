-- phpMyAdmin SQL Dump
-- version 3.1.5
-- http://www.phpmyadmin.net
--
-- Vært: mysql1046.servage.net
-- Genereringstid: 02. 04 2011 kl. 19:20:47
-- Serverversion: 5.0.85
-- PHP-version: 5.2.42-servage15

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `roskilde-el`
--

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `acos`
--

CREATE TABLE IF NOT EXISTS `acos` (
  `id` int(10) NOT NULL auto_increment,
  `parent_id` int(10) default NULL,
  `model` varchar(255) default NULL,
  `foreign_key` int(10) default NULL,
  `alias` varchar(255) default NULL,
  `lft` int(10) default NULL,
  `rght` int(10) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=108 ;

--
-- Data dump for tabellen `acos`
--

INSERT INTO `acos` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, NULL, NULL, 'Application', 1, 185),
(2, 1, NULL, NULL, 'Controllers', 2, 127),
(3, 1, NULL, NULL, 'Content', 127, 184),
(4, 2, NULL, NULL, 'Pages', 3, 16),
(5, 4, NULL, NULL, 'display', 4, 5),
(6, 4, NULL, NULL, 'add', 6, 7),
(7, 4, NULL, NULL, 'edit', 8, 9),
(8, 4, NULL, NULL, 'index', 10, 11),
(9, 4, NULL, NULL, 'view', 12, 13),
(10, 4, NULL, NULL, 'delete', 14, 15),
(11, 2, NULL, NULL, 'Users', 17, 34),
(12, 11, NULL, NULL, 'login', 18, 19),
(13, 11, NULL, NULL, 'logout', 20, 21),
(14, 11, NULL, NULL, 'index', 22, 23),
(15, 11, NULL, NULL, 'view', 24, 25),
(16, 11, NULL, NULL, 'add', 26, 27),
(17, 11, NULL, NULL, 'edit', 28, 29),
(18, 11, NULL, NULL, 'profile', 30, 31),
(19, 11, NULL, NULL, 'delete', 32, 33),
(20, 2, NULL, NULL, 'Projects', 35, 48),
(21, 20, NULL, NULL, 'createExcel', 36, 37),
(22, 20, NULL, NULL, 'index', 38, 39),
(23, 20, NULL, NULL, 'view', 40, 41),
(24, 20, NULL, NULL, 'add', 42, 43),
(25, 20, NULL, NULL, 'edit', 44, 45),
(26, 20, NULL, NULL, 'delete', 46, 47),
(27, 2, NULL, NULL, 'ProjectItems', 49, 60),
(28, 27, NULL, NULL, 'index', 50, 51),
(29, 27, NULL, NULL, 'view', 52, 53),
(30, 27, NULL, NULL, 'add', 54, 55),
(31, 27, NULL, NULL, 'edit', 56, 57),
(32, 27, NULL, NULL, 'delete', 58, 59),
(33, 2, NULL, NULL, 'Items', 61, 72),
(34, 33, NULL, NULL, 'index', 62, 63),
(35, 33, NULL, NULL, 'view', 64, 65),
(36, 33, NULL, NULL, 'add', 66, 67),
(37, 33, NULL, NULL, 'edit', 68, 69),
(38, 33, NULL, NULL, 'delete', 70, 71),
(39, 2, NULL, NULL, 'Sections', 73, 84),
(40, 39, NULL, NULL, 'index', 74, 75),
(41, 39, NULL, NULL, 'view', 76, 77),
(42, 39, NULL, NULL, 'add', 78, 79),
(43, 39, NULL, NULL, 'edit', 80, 81),
(44, 39, NULL, NULL, 'delete', 82, 83),
(45, 2, NULL, NULL, 'Groups', 85, 96),
(46, 45, NULL, NULL, 'index', 86, 87),
(47, 45, NULL, NULL, 'view', 88, 89),
(48, 45, NULL, NULL, 'add', 90, 91),
(49, 45, NULL, NULL, 'edit', 92, 93),
(50, 45, NULL, NULL, 'delete', 94, 95),
(51, 2, NULL, NULL, 'Setup', 97, 114),
(52, 51, NULL, NULL, 'permissions_assign_controlleractions', 98, 99),
(53, 51, NULL, NULL, 'permissions_check', 100, 101),
(54, 51, NULL, NULL, 'aco_build_controlleractions', 102, 103),
(55, 51, NULL, NULL, 'add', 104, 105),
(56, 51, NULL, NULL, 'edit', 106, 107),
(57, 51, NULL, NULL, 'index', 108, 109),
(58, 51, NULL, NULL, 'view', 110, 111),
(59, 51, NULL, NULL, 'delete', 112, 113),
(60, 2, NULL, NULL, 'Roles', 115, 126),
(61, 60, NULL, NULL, 'index', 116, 117),
(62, 60, NULL, NULL, 'view', 118, 119),
(63, 60, NULL, NULL, 'add', 120, 121),
(64, 60, NULL, NULL, 'edit', 122, 123),
(65, 60, NULL, NULL, 'delete', 124, 125),
(69, 3, 'Section', 2, NULL, 128, 183),
(76, 69, 'Group', 2, NULL, 129, 130),
(96, 81, 'Project', 18, NULL, 176, 177),
(83, 80, 'Project', 6, NULL, 162, 163),
(84, 79, 'Project', 7, NULL, 136, 137),
(78, 69, 'Group', 3, NULL, 131, 134),
(79, 69, 'Group', 4, NULL, 135, 160),
(80, 69, 'Group', 5, NULL, 161, 168),
(81, 69, 'Group', 6, NULL, 169, 178),
(82, 78, 'Project', 5, NULL, 132, 133),
(91, 79, 'Project', 14, NULL, 138, 139),
(86, 80, 'Project', 9, NULL, 164, 165),
(87, 80, 'Project', 10, NULL, 166, 167),
(88, 81, 'Project', 11, NULL, 170, 171),
(89, 81, 'Project', 12, NULL, 172, 173),
(90, 81, 'Project', 13, NULL, 174, 175),
(92, 79, 'Project', 15, NULL, 140, 141),
(93, NULL, 'Project', 16, NULL, 186, 187),
(94, NULL, 'Project', 17, NULL, 188, 189),
(97, 79, 'Project', 19, NULL, 142, 143),
(98, 79, 'Project', 20, NULL, 144, 145),
(99, 79, 'Project', 21, NULL, 146, 147),
(100, 79, 'Project', 22, NULL, 148, 149),
(101, 79, 'Project', 23, NULL, 150, 151),
(102, 79, 'Project', 24, NULL, 152, 153),
(103, 79, 'Project', 25, NULL, 154, 155),
(104, 79, 'Project', 26, NULL, 156, 157),
(105, 69, 'Group', 7, NULL, 179, 182),
(106, 105, 'Project', 27, NULL, 180, 181),
(107, 79, 'Project', 28, NULL, 158, 159);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `aros`
--

CREATE TABLE IF NOT EXISTS `aros` (
  `id` int(10) NOT NULL auto_increment,
  `parent_id` int(10) default NULL,
  `model` varchar(255) default NULL,
  `foreign_key` int(10) default NULL,
  `alias` varchar(255) default NULL,
  `lft` int(10) default NULL,
  `rght` int(10) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=55 ;

--
-- Data dump for tabellen `aros`
--

INSERT INTO `aros` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, NULL, NULL, 'Requesters', 1, 72),
(2, 1, 'Role', 1, NULL, 2, 19),
(3, 1, 'Role', 2, NULL, 20, 23),
(4, 1, 'Role', 3, NULL, 24, 39),
(5, 1, 'Role', 4, NULL, 40, 71),
(6, 2, 'User', 1, NULL, 3, 4),
(7, 2, 'User', 2, NULL, 5, 6),
(21, 3, 'User', 13, NULL, 21, 22),
(37, 5, 'User', 29, NULL, 47, 48),
(36, 5, 'User', 28, NULL, 45, 46),
(25, 2, 'User', 17, NULL, 7, 8),
(45, 5, 'User', 37, NULL, 59, 60),
(44, 2, 'User', 36, NULL, 11, 12),
(34, 4, 'User', 26, NULL, 35, 36),
(28, 4, 'User', 20, NULL, 25, 26),
(27, 5, 'User', 19, NULL, 41, 42),
(29, 4, 'User', 21, NULL, 27, 28),
(30, 4, 'User', 22, NULL, 29, 30),
(31, 4, 'User', 23, NULL, 31, 32),
(32, 4, 'User', 24, NULL, 33, 34),
(33, 5, 'User', 25, NULL, 43, 44),
(38, 5, 'User', 30, NULL, 49, 50),
(39, 5, 'User', 31, NULL, 51, 52),
(40, 5, 'User', 32, NULL, 53, 54),
(41, 2, 'User', 33, NULL, 9, 10),
(42, 5, 'User', 34, NULL, 55, 56),
(43, 5, 'User', 35, NULL, 57, 58),
(46, 5, 'User', 38, NULL, 61, 62),
(47, 5, 'User', 39, NULL, 63, 64),
(48, 5, 'User', 40, NULL, 65, 66),
(49, 4, 'User', 41, NULL, 37, 38),
(50, 5, 'User', 42, NULL, 67, 68),
(51, 5, 'User', 43, NULL, 69, 70),
(52, 2, 'User', 44, NULL, 13, 14),
(53, 2, 'User', 45, NULL, 15, 16),
(54, 2, 'User', 46, NULL, 17, 18);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `aros_acos`
--

CREATE TABLE IF NOT EXISTS `aros_acos` (
  `id` int(10) NOT NULL auto_increment,
  `aro_id` int(10) NOT NULL,
  `aco_id` int(10) NOT NULL,
  `_create` varchar(2) NOT NULL default '0',
  `_read` varchar(2) NOT NULL default '0',
  `_update` varchar(2) NOT NULL default '0',
  `_delete` varchar(2) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `ARO_ACO_KEY` (`aro_id`,`aco_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=68 ;

--
-- Data dump for tabellen `aros_acos`
--

INSERT INTO `aros_acos` (`id`, `aro_id`, `aco_id`, `_create`, `_read`, `_update`, `_delete`) VALUES
(1, 1, 5, '1', '1', '1', '1'),
(2, 2, 1, '1', '1', '1', '1'),
(3, 3, 1, '-1', '-1', '-1', '-1'),
(4, 3, 11, '1', '1', '1', '1'),
(5, 3, 45, '1', '1', '1', '1'),
(6, 3, 61, '1', '1', '1', '1'),
(7, 3, 62, '1', '1', '1', '1'),
(8, 3, 20, '1', '1', '1', '1'),
(9, 3, 27, '1', '1', '1', '1'),
(10, 3, 33, '1', '1', '1', '1'),
(11, 4, 1, '-1', '-1', '-1', '-1'),
(12, 4, 16, '1', '1', '1', '1'),
(13, 4, 20, '1', '1', '1', '1'),
(14, 4, 27, '1', '1', '1', '1'),
(15, 4, 34, '1', '1', '1', '1'),
(16, 4, 35, '1', '1', '1', '1'),
(17, 5, 1, '-1', '-1', '-1', '-1'),
(18, 5, 22, '1', '1', '1', '1'),
(19, 5, 23, '1', '1', '1', '1'),
(20, 5, 25, '1', '1', '1', '1'),
(21, 5, 27, '1', '1', '1', '1'),
(65, 49, 105, '1', '1', '1', '1'),
(45, 37, 84, '1', '1', '1', '1'),
(53, 37, 91, '1', '1', '1', '1'),
(31, 21, 69, '1', '1', '1', '1'),
(44, 36, 83, '1', '1', '1', '1'),
(43, 1, 21, '1', '1', '1', '1'),
(42, 1, 4, '1', '1', '1', '1'),
(35, 28, 76, '1', '1', '1', '1'),
(56, 46, 96, '1', '1', '1', '1'),
(37, 29, 78, '1', '1', '1', '1'),
(38, 30, 79, '1', '1', '1', '1'),
(39, 31, 80, '1', '1', '1', '1'),
(40, 32, 81, '1', '1', '1', '1'),
(41, 33, 82, '1', '1', '1', '1'),
(47, 38, 86, '1', '1', '1', '1'),
(48, 39, 87, '1', '1', '1', '1'),
(49, 40, 88, '1', '1', '1', '1'),
(51, 42, 89, '1', '1', '1', '1'),
(50, 28, 79, '-1', '-1', '-1', '-1'),
(52, 43, 90, '1', '1', '1', '1'),
(57, 47, 97, '1', '1', '1', '1'),
(54, 37, 92, '1', '1', '1', '1'),
(58, 47, 98, '1', '1', '1', '1'),
(59, 47, 99, '1', '1', '1', '1'),
(60, 47, 100, '1', '1', '1', '1'),
(61, 47, 101, '1', '1', '1', '1'),
(62, 47, 102, '1', '1', '1', '1'),
(63, 47, 103, '1', '1', '1', '1'),
(64, 48, 104, '1', '1', '1', '1'),
(66, 50, 106, '1', '1', '1', '1'),
(67, 51, 107, '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL auto_increment,
  `title` char(100) NOT NULL,
  `section_id` int(11) NOT NULL default '0',
  `user_id` int(11) NOT NULL default '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Data dump for tabellen `groups`
--

INSERT INTO `groups` (`id`, `title`, `section_id`, `user_id`, `created`, `modified`) VALUES
(2, 'Nico testgruppe', 2, 20, '2010-04-19 19:49:24', '2010-04-19 19:49:24'),
(3, 'Produktionsgruppen', 2, 21, '2010-04-19 20:01:59', '2010-04-19 20:01:59'),
(4, 'Indre Plads Ã˜st', 2, 22, '2010-04-19 20:03:21', '2010-04-19 20:03:21'),
(5, 'Indre Plads Vest', 2, 23, '2010-04-19 20:04:48', '2010-04-19 20:04:48'),
(6, 'Ydre Plads', 2, 24, '2010-04-19 20:06:24', '2010-04-19 20:06:24'),
(7, 'Samarbejdspartnere og Medieby', 2, 41, '2010-05-18 23:41:10', '2010-05-18 23:41:10');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `id` int(11) NOT NULL auto_increment,
  `title` char(100) NOT NULL,
  `description` text NOT NULL,
  `power_usage` int(11) NOT NULL,
  `created` datetime default NULL,
  `modified` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Data dump for tabellen `items`
--

INSERT INTO `items` (`id`, `title`, `description`, `power_usage`, `created`, `modified`) VALUES
(2, 'LysstofrÃ¸r', '', 36, '2010-04-16 09:22:59', '2010-04-16 09:22:59'),
(3, 'LyskÃ¦de (25 m) m. sparepÃ¦rer', 'Watt-forbrug for lyskÃ¦de med sparepÃ¦rer (pr. 10 meter)', 30, '2010-04-16 09:24:19', '2010-05-18 23:48:05'),
(4, 'KÃ¸leskab', '', 150, '2010-04-16 09:25:55', '2010-04-16 09:25:55'),
(5, 'Kaffemaskine lille', '', 1100, '2010-04-16 09:29:11', '2010-04-16 09:29:11'),
(6, 'Kaffemaskine stor', '', 2025, '2010-04-16 09:29:41', '2010-04-16 09:29:41'),
(7, 'El-kedel', '', 1200, '2010-04-16 09:30:09', '2010-04-16 09:30:09'),
(8, 'Computer (stationÃ¦r) m. skÃ¦rm', 'StationÃ¦r computer med skÃ¦rm', 750, '2010-04-16 09:30:53', '2010-04-16 10:02:24'),
(9, 'Printer', '', 500, '2010-04-16 09:31:18', '2010-04-16 09:31:18'),
(10, 'Kasseapparat', '', 1035, '2010-04-16 09:32:13', '2010-04-16 09:32:13'),
(11, 'Dankort-terminal', '', 350, '2010-04-16 09:32:58', '2010-04-16 09:32:58'),
(12, 'Stiksav', '', 530, '2010-04-16 09:36:25', '2010-04-16 09:36:25'),
(13, 'Rundsav', '', 1000, '2010-04-16 09:36:43', '2010-04-16 09:36:43'),
(14, 'BrÃ¸drister', '', 1000, '2010-04-16 09:37:32', '2010-04-16 09:37:32'),
(15, 'TV', 'Almindeligt fjernsyn som det kendes hjemme i stuen', 120, '2010-04-16 09:38:08', '2010-04-16 10:04:24'),
(16, 'Skruemaskiner 12V/18V (opladere)', 'Opladere til 12V/18V skruemaskiner', 200, '2010-04-16 10:07:19', '2010-04-28 04:53:52'),
(17, 'Mobiloplader', '', 5, '2010-04-16 10:08:07', '2010-05-20 21:03:25'),
(18, 'BÃ¦rbar computer, oplader til', 'Oplader til bÃ¦rbar computer', 180, '2010-04-16 10:09:26', '2010-04-16 10:09:26'),
(19, 'Arbejdslampe', '', 300, '2010-05-06 00:17:23', '2010-05-06 00:17:23'),
(20, 'HÃ¥rtÃ¸rrer', '', 1800, '2010-05-11 19:16:06', '2010-05-11 19:16:06');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(255) NOT NULL,
  `body` text,
  `total_power_usage` int(11) default NULL,
  `total_power_allowance` int(11) default NULL,
  `build_start` datetime default NULL,
  `build_end` datetime default NULL,
  `items_start` datetime default NULL,
  `items_end` datetime default NULL,
  `status` int(11) NOT NULL default '0',
  `file_path` varchar(255) NOT NULL,
  `group_id` int(11) NOT NULL default '0',
  `user_id` int(11) NOT NULL default '0',
  `created` datetime default NULL,
  `modified` datetime default NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Data dump for tabellen `projects`
--

INSERT INTO `projects` (`id`, `title`, `body`, `total_power_usage`, `total_power_allowance`, `build_start`, `build_end`, `items_start`, `items_end`, `status`, `file_path`, `group_id`, `user_id`, `created`, `modified`, `created_by`, `modified_by`) VALUES
(5, 'UHS Base', 'De eksisterende installationer i alle 4H bygningerne skal tilsluttes, sÃ¥ de er brugbare, men vi kan ogsÃ¥ lige snakke om, vi selv skal gÃ¸re det\r\nDet tilladte elforbrug er det nederstÃ¥ende. Der kan frit distribueres strÃ¸m sÃ¥ lÃ¦nge det ikke overstiger det tilladte.', 39597, 39597, '2010-04-27 00:00:00', '2010-04-27 00:00:00', '2010-06-18 00:00:00', '2010-07-08 00:00:00', 0, '4bf090a4-d44c-40a3-95ce-3ca90a021f01.jpg', 3, 25, '2010-04-19 20:16:17', '2010-06-05 15:42:43', 13, 36),
(6, 'Roskilde Retro / Ex-Astoria', 'Social Zone hylder RF''s 40 Ã¥rs jubilÃ¦um med diverse aktiviteter og events.\r\nDet tilladte elforbrug er det nederstÃ¥ende. Der kan frit distribueres strÃ¸m sÃ¥ lÃ¦nge det ikke overstiger det tilladte.', 62400, 62400, '2010-06-20 00:00:00', '2010-06-30 00:00:00', '2010-06-24 00:00:00', '2010-07-05 00:00:00', 0, '4c20b308-0fa8-48c8-b0c0-6a920a021f01.jpg', 5, 28, '2010-04-27 08:50:01', '2010-06-21 13:22:20', 23, 36),
(7, 'Kultur Zonen - bjerget', 'Det tilladte elforbrug er det nederstÃ¥ende. Der kan frit distribueres strÃ¸m sÃ¥ lÃ¦nge det ikke overstiger det tilladte.', 2700, 2700, '2010-06-19 00:00:00', '2010-07-06 00:00:00', '2010-06-23 00:00:00', '2010-07-05 00:00:00', 0, '4c1fc657-72c8-43d9-9f3a-2f540a021f03.jpg', 4, 29, '2010-04-27 15:06:38', '2010-05-08 14:26:55', 22, 36),
(9, 'Odeon', 'Ideen er, at der vil vÃ¦re to ens siddeinstallationer, hvor den Ã¸verste skal drives af ''almindelig'' strÃ¸m, mens den nederste vil blive koblet til 4-6 cykler og publikum derfor selv skal producere strÃ¸mmen. SÃ¥ ja, det er den Ã¸verste firkant (5x5 m) der skal have strÃ¸m fra el-gruppen. Og det er den der er bestilt strÃ¸m til.\r\nDet tilladte elforbrug er det nederstÃ¥ende. Der kan frit distribueres strÃ¸m sÃ¥ lÃ¦nge det ikke overstiger det tilladte.', 3600, 3600, '2010-06-19 00:00:00', '2010-06-30 00:00:00', '2010-06-30 00:00:00', '2010-07-05 00:00:00', 0, '4c20c97d-2570-4603-834f-2ba00a021f02.jpg', 5, 30, '2010-04-27 19:49:19', '2010-06-05 16:09:20', 23, 36),
(10, 'Cosmopol', 'Det tilladte elforbrug er det nederstÃ¥ende. Der kan frit distribueres strÃ¸m sÃ¥ lÃ¦nge det ikke overstiger det tilladte.', 57000, 57000, '2010-06-18 00:00:00', '2010-04-28 00:00:00', '2010-04-28 00:00:00', '2010-04-28 00:00:00', 0, '4c1a038f-edd4-4e0e-9c24-10c80a021f03.jpg', 5, 31, '2010-04-27 19:50:55', '2010-05-08 14:54:26', 23, 36),
(11, 'Climate Community', 'Et omrÃ¥de pÃ¥ camping med sÃ¦rlig fokus pÃ¥ bÃ¦redygtighed.\r\n\r\nHovedtavle trÃ¦kkes til ''Kambyrator''\r\nDet tilladte elforbrug er det nederstÃ¥ende. Der kan frit distribueres strÃ¸m sÃ¥ lÃ¦nge det ikke overstiger det tilladte.', 17730, 17730, '2010-06-19 00:00:00', '2010-06-25 00:00:00', '2010-06-25 00:00:00', '2010-07-05 00:00:00', 0, '4c20b3f0-4258-4320-9c28-27b50a021f02.jpg', 6, 32, '2010-04-27 22:27:11', '2010-06-21 22:23:41', 24, 36),
(12, 'Agora M - Expression', 'Det tilladte elforbrug er det nederstÃ¥ende. Der kan frit distribueres strÃ¸m sÃ¥ lÃ¦nge det ikke overstiger det tilladte.', 32099, 32099, '2010-06-19 00:00:00', '2010-06-26 00:00:00', '2010-06-24 00:00:00', '2010-07-05 00:00:00', 0, '4c20aef4-6c14-4b04-ab1c-3e9f0a021f01.jpg', 6, 34, '2010-04-29 18:18:49', '2010-06-22 14:40:38', 24, 36),
(13, 'Cinema', 'Det tilladte elforbrug er det nederstÃ¥ende. Der kan frit distribueres strÃ¸m sÃ¥ lÃ¦nge det ikke overstiger det tilladte.', 108690, 108690, '2010-06-24 00:00:00', '2010-06-27 00:00:00', '2010-06-27 00:00:00', '2010-07-05 00:00:00', 0, '', 6, 35, '2010-04-29 18:25:20', '2010-06-01 22:53:19', 24, 36),
(14, 'Kultur Zonen - gyngen', 'Det tilladte elforbrug er det nederstÃ¥ende. Der kan frit distribueres strÃ¸m sÃ¥ lÃ¦nge det ikke overstiger det tilladte.', 6000, 6000, '2010-06-19 00:00:00', '2010-07-01 00:00:00', '2010-06-27 00:00:00', '2010-07-05 00:00:00', 0, '4c1fc11b-0344-4881-abd3-76de0a021f03.jpg', 4, 29, '2010-05-08 14:29:11', '2010-05-08 14:31:14', 17, 36),
(15, 'Kultur Zonen - Dansk Arkitektur Center', '', 4000, 4000, '2010-05-08 00:00:00', '2010-05-08 00:00:00', '2010-06-27 00:00:00', '2010-07-05 00:00:00', 0, '4c20a2b7-feb0-4132-a40b-4a5c0a021f04.jpg', 4, 29, '2010-05-08 14:38:18', '2010-06-26 15:03:36', 17, 36),
(16, '', NULL, 0, NULL, NULL, NULL, NULL, NULL, 0, '', 0, 0, '2010-05-08 15:28:30', '2010-05-08 15:28:30', 0, 0),
(17, '', NULL, 0, NULL, NULL, NULL, NULL, NULL, 0, '', 0, 0, '2010-05-08 15:28:30', '2010-05-08 15:28:30', 0, 0),
(18, 'VM Agora', 'SkÃ¦rm:  380V/63A CEE\r\nLydanlÃ¦g i forbindelse med skÃ¦rm: 16A CEE\r\nVi planlÃ¦gger at lave en kommentatorboks i forbindelse med skÃ¦rmen, hvortil der skal bruges: mixer, lys, kamera og hvad det ellers krÃ¦ver.\r\nDerudover er det tanken at der skal holdes FIFA-soccer konkurrence pÃ¥ skÃ¦rmen, hvilket krÃ¦ver strÃ¸m til Xbox, mm.\r\n\r\nSensational Street Soccer :\r\n400 W CE (pc, kaffemaskine, hÃ¸jtaler mm. De har et stort omrÃ¥de)\r\nMajken fra Sensational Street Soccer har fÃ¥et tilsendt en El-skema fra Rene, hvorudfra hun har udregnet deres behov. Jeg har ikke kunne nÃ¥ at tjekke op pÃ¥ om det er passende.\r\n\r\nSex og Samfund:\r\nHar brug for strÃ¸m til kaffemaskine, hÃ¸jtalere, anlÃ¦g. (jeg regner med at kunne arrangere det sÃ¥ de kan dele det med Sensational Soccer\r\n\r\nDet tilladte elforbrug er det nederstÃ¥ende. Der kan frit distribueres strÃ¸m sÃ¥ lÃ¦nge det ikke overstiger det tilladte.', 57535, 57535, '2010-06-19 00:00:00', '2010-06-27 00:00:00', '2010-06-24 00:00:00', '2010-07-05 00:00:00', 0, '4c0a85c1-dba4-4652-8242-63ce0a021f01.jpg', 6, 38, '2010-05-11 17:23:40', '2010-06-05 19:11:32', 24, 36),
(19, 'Port 7', 'Port fra Ydre Plads til Indre Plads.\r\n\r\nDe lysende tal skal vende mod Ã¸st, nord og syd (9 rÃ¸r gange 3) - 36 W lysstofrÃ¸r => 27 * 36 W = 972 W\r\n\r\nDet tilladte elforbrug er det nederstÃ¥ende. Der kan frit distribueres strÃ¸m sÃ¥ lÃ¦nge det ikke overstiger det tilladte.', 972, 972, '2010-05-14 00:00:00', '2010-05-14 00:00:00', '2010-06-24 00:00:00', '2010-07-05 00:00:00', 0, '', 4, 39, '2010-05-14 11:04:53', '2010-05-17 01:01:45', 17, 36),
(20, 'SejloverdÃ¦kningen', 'Det tilladte elforbrug er det nederstÃ¥ende. Der kan frit distribueres strÃ¸m sÃ¥ lÃ¦nge det ikke overstiger det tilladte.', 2400, 2400, '2010-05-17 00:00:00', '2010-05-17 00:00:00', '2010-06-28 00:00:00', '2010-07-05 00:00:00', 0, '', 4, 39, '2010-05-14 11:06:03', '2010-05-17 01:21:06', 17, 36),
(21, 'Entrance East', 'Der skal bruge der som Michael kalder "sorte spots" - jeg gÃ¥r ud fra at det er arbejdslamper pÃ¥ 300 W.\r\n\r\nSpots''ne skal lyse op pÃ¥ et banner, som Christian Dam designer. De skal bare lÃ¦gges ovenpÃ¥ billetcontainerne. Et banner pr. indgang\r\n\r\nDet tilladte elforbrug er det nederstÃ¥ende. Der kan frit distribueres strÃ¸m sÃ¥ lÃ¦nge det ikke overstiger det tilladte.', 3000, 3000, '2010-05-17 00:00:00', '2010-05-17 00:00:00', '2010-06-24 00:00:00', '2010-07-05 00:00:00', 0, '', 4, 39, '2010-05-14 11:09:14', '2010-05-17 01:16:45', 17, 36),
(22, 'Entrance West', 'Der skal bruge der som Michael kalder "sorte spots" - jeg gÃ¥r ud fra at det er arbejdslamper pÃ¥ 300 W.\r\n\r\nSpots''ne skal lyse op pÃ¥ et banner, som Christian Dam designer. De skal bare lÃ¦gges ovenpÃ¥ billetcontainerne. Et banner pr. indgang\r\n\r\nDet tilladte elforbrug er det nederstÃ¥ende. Der kan frit distribueres strÃ¸m sÃ¥ lÃ¦nge det ikke overstiger det tilladte.', 1800, 1800, '2010-05-17 00:00:00', '2010-05-17 00:00:00', '2010-06-24 00:00:00', '2010-07-05 00:00:00', 0, '', 4, 39, '2010-05-14 11:09:43', '2010-05-17 01:18:19', 17, 36),
(23, 'TrinbrÃ¦ttet', 'Der skal bruge der som Michael kalder "sorte spots" - jeg gÃ¥r ud fra at det er arbejdslamper pÃ¥ 300 W.\r\n\r\nSpots''ne skal lyse op pÃ¥ et banner, som Christian Dam designer. De skal bare lÃ¦gges ovenpÃ¥ billetcontainerne. Et banner pr. indgang', 1200, 1200, '2010-05-17 00:00:00', '2010-05-17 00:00:00', '2010-06-24 00:00:00', '2010-07-05 00:00:00', 0, '', 4, 39, '2010-05-14 11:10:37', '2010-05-17 01:14:23', 17, 36),
(24, 'Port 10', 'Port fra Ydre Plads til Indre Plads\r\nPort 10 - nord syd (20 gange 2) - 36 W lysstofrÃ¸r => 40 * 36 W = 1440 W\r\nDet tilladte elforbrug er det nederstÃ¥ende. Der kan frit distribueres strÃ¸m sÃ¥ lÃ¦nge det ikke overstiger det tilladte.', 1440, 1440, '2010-05-17 00:00:00', '2010-05-17 00:00:00', '2010-06-24 00:00:00', '2010-07-05 00:00:00', 0, '', 4, 39, '2010-05-14 11:13:05', '2010-05-17 01:08:57', 17, 36),
(25, 'Port 19', 'Port fra Ydre Plads til Indre Plads\r\nPort 19 - kun vest (21 gange 1) - 36 W lysstofrÃ¸r => 21 * 36 W = 756 W\r\nDet tilladte elforbrug er det nederstÃ¥ende. Der kan frit distribueres strÃ¸m sÃ¥ lÃ¦nge det ikke overstiger det tilladte.', 756, 756, '2010-05-17 00:00:00', '2010-05-17 00:00:00', '2010-06-24 00:00:00', '2010-07-05 00:00:00', 0, '', 4, 39, '2010-05-14 11:13:35', '2010-05-17 01:11:08', 17, 36),
(26, 'Arena', 'El - Der skal sÃ¦ttes lysstofrÃ¸r op i trÃ¦er i det nye hjÃ¸rne â€“ tre pr. trÃ¦ 9 trÃ¦er i alt = 27 lysstofrÃ¸r med to armaturer i hver. => 36 W * 2 * 27 = 1.944 W. Det skal trÃ¦kkes fra bagomrÃ¥det (gÃ¥r ud fra at det er scenens bagomrÃ¥de), men skal alligevel bestilles hos Peter og Camilla. El skal trÃ¦kke kabler op i trÃ¦erne (siger Dam).\r\n\r\nDet tilladte elforbrug er det nederstÃ¥ende. Der kan frit distribueres strÃ¸m sÃ¥ lÃ¦nge det ikke overstiger det tilladte.', 2376, 2376, '2010-05-17 00:00:00', '2010-05-17 00:00:00', '2010-06-27 00:00:00', '2010-07-05 00:00:00', 0, '', 4, 40, '2010-05-17 02:26:47', '2010-06-21 13:33:43', 17, 36),
(27, 'Graffiti', 'Det tilladte elforbrug er det nederstÃ¥ende. Der kan frit distribueres strÃ¸m sÃ¥ lÃ¦nge det ikke overstiger det tilladte.', 6155, 6155, '2010-05-18 00:00:00', '2010-05-18 00:00:00', '2010-06-21 00:00:00', '2010-07-07 00:00:00', 0, '4bf30aa0-55c0-47ac-a19b-249d0a021f03.jpg', 7, 42, '2010-05-18 23:42:37', '2010-06-05 17:29:57', 17, 36),
(28, 'Ventilen', 'HyggeomrÃ¥de for kunstnere', 2150, 2150, '2010-06-22 00:00:00', '2010-06-22 00:00:00', '2010-06-29 00:00:00', '2010-07-05 00:00:00', 0, '', 4, 43, '2010-06-22 13:07:55', '2010-06-22 13:14:24', 36, 36);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `project_items`
--

CREATE TABLE IF NOT EXISTS `project_items` (
  `id` int(11) NOT NULL auto_increment,
  `title` char(100) default NULL,
  `description` text,
  `power_usage` int(11) default NULL,
  `quantity` int(11) NOT NULL,
  `item_id` int(11) default NULL,
  `project_id` int(11) default NULL,
  `created` datetime default NULL,
  `modified` datetime default NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `project_id` (`project_id`),
  KEY `item_id` (`item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=159 ;

--
-- Data dump for tabellen `project_items`
--

INSERT INTO `project_items` (`id`, `title`, `description`, `power_usage`, `quantity`, `item_id`, `project_id`, `created`, `modified`, `created_by`, `modified_by`) VALUES
(12, 'Campingvogn 1 - Spread the Love.', 'opladere mobil tlf. ', 180, 5, NULL, 6, '2010-04-27 10:16:13', '2010-05-08 15:56:55', 28, 36),
(13, 'Campingvogn 2 - Spille vognen', 'mobil tlf. opladning', 180, 5, NULL, 6, '2010-04-27 10:18:04', '2010-05-08 15:57:13', 28, 36),
(14, 'Campingvogn 3 - Massage', 'Mobilopladning, ', 180, 2, NULL, 6, '2010-04-27 10:47:56', '2010-05-08 15:58:41', 28, 36),
(15, 'Campingvogn 4 - STEEL THIS MOVIE.', 'Lys, ', 300, 2, NULL, 6, '2010-04-27 10:49:18', '2010-05-08 16:06:05', 28, 36),
(16, 'Campingvogn 5 - Ler og kartoffeltryk vÃ¦rkstedet', 'Mobil ', 180, 1, NULL, 6, '2010-04-27 10:51:15', '2010-05-08 16:08:55', 28, 36),
(17, 'Campingvogn 6 - Green Peace', 'Mobiloplader', 180, 1, NULL, 6, '2010-04-27 10:53:54', '2010-05-08 16:15:51', 28, 36),
(21, 'Aftenbelysning ved ekstern samarbejdspartner.', '1000 W par 64, IP64\r\n\r\nStrÃ¸m til sammen: 18 x 1000 W\r\nTelefonpÃ¦le til stolperne\r\nVil meget gerne have 1 x 3 x 16 380V CEE', 1000, 18, NULL, 6, '2010-04-27 11:08:30', '2010-05-14 23:41:29', 28, 17),
(22, 'Campingvogn 7 - Samarbejds partner forhandles', 'mobil, lys, ', 1000, 1, NULL, 6, '2010-04-27 11:11:54', '2010-04-27 11:11:54', 28, 28),
(23, 'Campingvogn 8 - Samarbejds partner forhandles', 'Mobil og lys', 800, 1, NULL, 6, '2010-04-27 11:12:46', '2010-04-27 11:12:46', 28, 28),
(24, 'DR - Shipping container med aktivitet.', '6 computere, lys, skÃ¦rme mm. ', 10000, 1, NULL, 6, '2010-04-27 11:14:30', '2010-04-27 11:14:30', 28, 28),
(25, 'Campingvogn 9 - Samarbejds partner forhandles', 'mobil mm. ', 1000, 1, NULL, 6, '2010-04-27 11:15:28', '2010-04-27 11:15:28', 28, 28),
(26, 'Illutron - installation', 'Interaktiv installation.\r\n\r\nVi vil  godt bede om en 400V 3*32A stik uden FI beskyttelse eller med\r\nhÃ¸jest lovlig FI beskyttelse - mÃ¥ske 300 mA\r\n\r\nForventet normalforbrug <6kW\r\nKortvarig maks: 12kW (ved finale, svejsning m.v.)\r\n\r\nVi forbinder en nettilsluttet solcelleanlÃ¦g pÃ¥ <1kW', 13000, 1, NULL, 6, '2010-04-27 11:16:33', '2010-05-11 20:02:51', 28, 17),
(32, 'StrÃ¸m til containerby (nord for scenen)', 'RÃ¸gmaskine\r\n\r\n', 1500, 2, NULL, 10, '2010-04-28 12:37:00', '2010-05-08 14:53:45', 31, 17),
(33, 'StrÃ¸mforbrug i stilladskonstruktion (syd for scenen)', 'smÃ¥ lyskilder\r\n', 100, 8, NULL, 10, '2010-04-28 12:37:40', '2010-05-08 14:54:06', 31, 17),
(34, 'StrÃ¸mforbrug midt for scenen (Ã¸st for scenen)', 'kraftige lyskilder \r\n', 1000, 8, NULL, 10, '2010-04-28 12:38:17', '2010-05-08 14:54:26', 31, 17),
(35, 'Concito', 'StrÃ¸m til partner: Concito', 500, 1, NULL, 11, '2010-05-05 00:05:28', '2010-05-05 00:05:28', 32, 32),
(36, 'GrÃ¸n Vision', 'StÃ¸rm til partner: GrÃ¸n vision', 500, 1, NULL, 11, '2010-05-05 00:05:51', '2010-05-05 00:05:51', 32, 32),
(37, '', '', NULL, 80, 2, 11, '2010-05-05 00:07:20', '2010-05-11 19:53:43', 32, 17),
(38, 'Generel belysning', 'Lysinstallationer', 200, 1, NULL, 11, '2010-05-05 00:08:26', '2010-05-12 00:43:32', 32, 17),
(39, 'Energicontainer', 'Batterilader', 1000, 1, NULL, 11, '2010-05-05 00:09:01', '2010-05-05 00:09:01', 32, 32),
(40, 'Climate Shout Out', '', 500, 1, NULL, 11, '2010-05-05 00:09:21', '2010-05-05 00:09:21', 32, 32),
(43, NULL, NULL, NULL, 12, 19, 9, NULL, '2010-05-06 00:18:02', 0, 17),
(47, 'Containerby fortsat', 'Mindre lyskilder', 500, 20, NULL, 10, '2010-05-08 11:51:48', '2010-05-08 11:51:48', 36, 36),
(48, 'Containerby fortsat', 'Stor Lyskilde', 1000, 10, NULL, 10, '2010-05-08 11:53:17', '2010-05-08 11:53:17', 36, 36),
(49, 'Containerby fortsat', 'Lokale mindre lyskilder', 500, 8, NULL, 10, '2010-05-08 11:54:24', '2010-05-08 11:54:24', 36, 36),
(50, 'Containerby fortsat', 'Toaster', 1000, 1, NULL, 10, '2010-05-08 11:54:48', '2010-05-08 11:54:48', 36, 36),
(51, 'Containerby fortsat', 'elkeddel', 2000, 2, NULL, 10, '2010-05-08 11:55:39', '2010-05-08 11:55:39', 36, 36),
(52, 'Containerby fortsat', 'Opladere', 150, 2, NULL, 10, '2010-05-08 11:56:40', '2010-05-08 11:56:40', 36, 36),
(53, 'Containerby fortsat', 'KÃ¸leskab', 500, 1, NULL, 10, '2010-05-08 11:57:10', '2010-05-08 11:57:10', 36, 36),
(54, 'Stilladskonstruktion fortsat', 'Stor lyskilde', 1000, 12, NULL, 10, '2010-05-08 12:02:35', '2010-05-08 12:02:35', 36, 36),
(55, 'Stilladskonstruktion fortsat', 'UV Lyskilde\r\n', 400, 4, NULL, 10, '2010-05-08 12:04:00', '2010-05-08 12:04:00', 36, 36),
(56, 'Stilladskonstruktion fortsat', 'Projektorer', 500, 2, NULL, 10, '2010-05-08 12:04:38', '2010-05-08 12:04:38', 36, 36),
(57, 'Stilladskonstruktion fortsat', 'Oplader til tlf', 400, 1, NULL, 10, '2010-05-08 12:05:25', '2010-05-08 12:05:25', 36, 36),
(58, 'Stilladskonstruktion fortsat', 'Oplader til Computer', 400, 1, NULL, 10, '2010-05-08 12:05:58', '2010-05-08 12:05:58', 36, 36),
(59, '', '', NULL, 75, 2, 7, '2010-05-08 14:25:35', '2010-05-08 14:26:55', 17, 17),
(60, 'Lysstofarmaturer og lydanlÃ¦g', '', 6000, 1, NULL, 14, '2010-05-08 14:31:14', '2010-05-08 14:31:14', 17, 17),
(61, '', '', NULL, 1, 4, 11, '2010-05-08 15:04:55', '2010-05-08 15:04:55', 32, 32),
(62, 'Campingvogn 1 fortsat', 'Oplader til computer', 180, 1, NULL, 6, '2010-05-08 15:46:57', '2010-05-08 15:57:35', 36, 36),
(64, 'Campingvogn 2 fortsat', 'Lys', 300, 3, NULL, 6, '2010-05-08 16:00:35', '2010-05-08 16:00:35', 36, 36),
(65, 'Campingvogn 3 fortsat', 'LyskÃ¦de', 30, 2, NULL, 6, '2010-05-08 16:01:39', '2010-05-08 16:01:39', 36, 36),
(66, 'Campingvogn 3 fortsat', 'Alm lys', 300, 2, NULL, 6, '2010-05-08 16:02:17', '2010-05-08 16:02:17', 36, 36),
(67, 'Campingvogn 4 fortsat', 'radio', 120, 1, NULL, 6, '2010-05-08 16:06:56', '2010-05-08 16:06:56', 36, 36),
(68, 'Campingvogn 4 fortsat', 'TV', 600, 1, NULL, 6, '2010-05-08 16:07:37', '2010-05-08 16:07:37', 36, 36),
(69, 'Campingvogn 4 fortsat', 'Oplader til computer', 180, 1, NULL, 6, '2010-05-08 16:08:02', '2010-05-08 16:08:02', 36, 36),
(70, 'Campingvogn 5 fortsat', 'Lys', 300, 1, NULL, 6, '2010-05-08 16:09:57', '2010-05-08 16:09:57', 36, 36),
(71, 'Campingvogn 5 fortsat', 'Radio', 120, 1, NULL, 6, '2010-05-08 16:10:24', '2010-05-08 16:10:24', 36, 36),
(72, 'Campingvogn 6 fortsat', 'tv', 120, 1, NULL, 6, '2010-05-08 16:16:27', '2010-05-08 16:16:27', 36, 36),
(73, 'Campingvogn 6 fortsat', 'Lys', 300, 1, NULL, 6, '2010-05-08 16:17:02', '2010-05-08 16:17:02', 36, 36),
(74, '', '', NULL, 1, 4, 12, '2010-05-11 19:12:37', '2010-05-11 19:12:37', 17, 17),
(75, '', '', NULL, 1, 7, 12, '2010-05-11 19:12:50', '2010-05-11 19:12:50', 17, 17),
(76, '', '', NULL, 1, 6, 12, '2010-05-11 19:13:06', '2010-05-11 19:13:06', 17, 17),
(77, '', '', NULL, 4, 2, 12, '2010-05-11 19:13:57', '2010-05-11 19:13:57', 17, 17),
(79, '', '', NULL, 4, 18, 12, '2010-05-11 19:14:51', '2010-05-11 19:14:51', 17, 17),
(80, NULL, NULL, NULL, 1, 20, 12, NULL, '2010-05-11 19:16:25', 0, 17),
(81, 'Lyd og lys til teltet', '3 x KME aktivt lydsystem\r\n1 x afviklingsskab m. Mikser, CD og 2 stk. Mikrofoner\r\n10 x trÃ¥dlÃ¸se bÃ¸jlemikrofoner\r\n6 stk. fresnellamper m. dÃ¦mper til frontlys pÃ¥ scenen\r\n8 stk. LED lamper til belysning af telt generelt\r\n1 stk. rigkonstruktion til lys\r\n1 x komplet kabling af ovenstÃ¥ende\r\n1 x scene pÃ¥ 8 x 6 meter m. sort molton pÃ¥ kanten\r\n\r\nSkulle trÃ¦kke 1x3x63 ampere cee (25200 Watt) ?', 25200, 1, NULL, 12, '2010-05-11 19:17:43', '2010-06-22 14:40:38', 17, 36),
(82, '', '', NULL, 1, 5, 18, '2010-05-11 22:32:26', '2010-06-05 19:02:17', 24, 24),
(83, '', '', NULL, 1, 8, 13, '2010-05-13 12:56:21', '2010-05-13 12:56:21', 35, 35),
(84, '', '', NULL, 1, 4, 13, '2010-05-13 12:56:39', '2010-05-13 12:56:39', 35, 35),
(85, '', '', NULL, 3, 16, 13, '2010-05-13 12:58:12', '2010-05-13 12:58:12', 35, 35),
(87, '', '', NULL, 1, 12, 13, '2010-05-13 12:59:36', '2010-05-13 12:59:36', 35, 35),
(88, '', '', NULL, 1, 13, 13, '2010-05-13 12:59:51', '2010-05-13 12:59:51', 35, 35),
(89, '', '', NULL, 1, 5, 13, '2010-05-13 13:01:50', '2010-05-13 13:01:50', 35, 35),
(90, '', '', NULL, 27, 2, 19, '2010-05-17 01:01:45', '2010-05-17 01:01:45', 17, 17),
(91, '', '', NULL, 40, 2, 24, '2010-05-17 01:08:57', '2010-05-17 01:08:57', 17, 17),
(92, '', '', NULL, 21, 2, 25, '2010-05-17 01:11:08', '2010-05-17 01:11:08', 17, 17),
(93, '', '', NULL, 4, 19, 23, '2010-05-17 01:14:23', '2010-05-17 01:14:23', 17, 17),
(94, '', '', NULL, 10, 19, 21, '2010-05-17 01:16:45', '2010-05-17 01:16:45', 17, 17),
(95, '', '', NULL, 6, 19, 22, '2010-05-17 01:18:19', '2010-05-17 01:18:19', 17, 17),
(96, 'Lamper', '', 150, 16, NULL, 20, '2010-05-17 01:21:06', '2010-05-17 01:21:06', 17, 17),
(97, '', '', NULL, 66, 2, 26, '2010-05-17 02:29:24', '2010-06-21 13:33:43', 17, 36),
(98, '', '', NULL, 2, 7, 5, '2010-05-17 02:44:12', '2010-05-17 02:44:12', 17, 17),
(99, '', '', NULL, 1, 5, 5, '2010-05-17 02:44:30', '2010-05-17 02:44:30', 17, 17),
(100, '', '', NULL, 2, 6, 5, '2010-05-17 02:44:50', '2010-05-17 02:44:50', 17, 17),
(101, '', '', NULL, 1, 4, 5, '2010-05-17 02:45:20', '2010-05-17 02:45:20', 17, 17),
(102, '', '', NULL, 1, 9, 5, '2010-05-17 02:45:45', '2010-05-17 02:45:45', 17, 17),
(103, '', '', NULL, 5, 8, 5, '2010-05-17 02:46:16', '2010-05-17 02:46:16', 17, 17),
(105, 'SkÃ¦rm', '63Amp, rÃ¸d CEE', 40000, 1, NULL, 18, '2010-05-17 18:34:27', '2010-06-05 19:11:32', 17, 24),
(106, 'LydanlÃ¦g i forbindelse med skÃ¦rm', '16Amp, CEE rÃ¸d\r\n\r\nSkÃ¦rm:  380V/63A CEE\r\nLydanlÃ¦g i forbindelse med skÃ¦rm: 16A CEE\r\n', 10000, 1, NULL, 18, '2010-05-17 18:36:07', '2010-06-05 18:54:20', 17, 24),
(107, 'Xbox 360', '', 185, 1, NULL, 18, '2010-05-17 18:41:55', '2010-05-17 18:41:55', 17, 17),
(108, '', '', NULL, 1, 8, 18, '2010-05-17 19:50:11', '2010-05-17 19:50:11', 17, 17),
(109, 'LydanlÃ¦g til Sensational Street Soccer og Sex & Samfund', '', 3000, 1, NULL, 18, '2010-05-17 20:00:12', '2010-05-17 20:03:55', 17, 17),
(110, '', '', NULL, 12, 2, 5, '2010-05-17 22:50:24', '2010-05-17 22:50:24', 17, 17),
(111, '', '', NULL, 15, 18, 5, '2010-05-17 22:51:19', '2010-05-20 21:04:17', 17, 17),
(113, '', '', NULL, 30, 16, 5, '2010-05-17 22:52:39', '2010-05-17 22:52:39', 17, 17),
(114, 'Arbejdsradioer, ladere til', '', 200, 15, NULL, 5, '2010-05-17 22:55:09', '2010-05-17 22:55:09', 17, 17),
(115, 'Bore-skruemaskine 220 V', '', 450, 1, NULL, 5, '2010-05-17 23:23:33', '2010-05-17 23:23:33', 17, 17),
(116, 'Projektor', '', 210, 1, NULL, 5, '2010-05-17 23:24:55', '2010-06-05 15:42:43', 17, 17),
(117, 'DVD-afspiller', '', 200, 1, NULL, 5, '2010-05-17 23:31:36', '2010-05-17 23:31:36', 17, 17),
(118, 'StereoanlÃ¦g', '', 300, 1, NULL, 5, '2010-05-17 23:32:05', '2010-05-17 23:32:05', 17, 17),
(119, 'Gulvlamper', '', 120, 4, NULL, 5, '2010-05-17 23:33:07', '2010-05-17 23:33:07', 17, 17),
(120, 'VarmeblÃ¦ser', '', 2000, 2, NULL, 5, '2010-05-17 23:33:53', '2010-05-20 21:03:56', 17, 17),
(121, 'Fane', '', 200, 2, NULL, 5, '2010-05-17 23:34:12', '2010-05-17 23:34:12', 17, 17),
(122, 'Vandvarmer 30 liter', '', 3600, 1, NULL, 5, '2010-05-17 23:37:31', '2010-05-17 23:37:31', 17, 17),
(123, '', '', NULL, 3, 13, 5, '2010-05-17 23:38:42', '2010-05-17 23:38:42', 17, 17),
(124, '', '', NULL, 5, 12, 5, '2010-05-17 23:39:10', '2010-05-17 23:39:10', 17, 17),
(125, '', '', NULL, 1, 4, 27, '2010-05-18 23:46:39', '2010-05-18 23:46:39', 17, 17),
(126, '', '', NULL, 5, 19, 27, '2010-05-18 23:47:02', '2010-05-18 23:47:02', 17, 17),
(128, NULL, NULL, NULL, 5, 3, 5, NULL, '2010-06-01 21:46:11', 0, 17),
(129, NULL, NULL, NULL, 1, 3, 27, NULL, '2010-06-05 17:29:23', 0, 36),
(130, '', '', NULL, 1, 7, 27, '2010-05-18 23:48:29', '2010-05-18 23:48:29', 17, 17),
(131, 'Kamera-oplader', '', 180, 8, NULL, 27, '2010-05-18 23:48:58', '2010-05-18 23:48:58', 17, 17),
(133, '', '', NULL, 1, 5, 27, '2010-05-18 23:49:32', '2010-05-18 23:49:32', 17, 17),
(134, '', '', NULL, 4, 18, 27, '2010-05-18 23:49:50', '2010-05-18 23:49:50', 17, 17),
(135, 'sminkebord', '', 240, 1, NULL, 12, '2010-05-19 20:25:04', '2010-05-19 20:25:04', 34, 34),
(136, 'lampe', '', 240, 1, NULL, 12, '2010-05-19 20:25:37', '2010-05-19 20:25:37', 34, 34),
(137, 'ekstra lys til scene', 'lyskÃ¦de rund i scenedekoration', 380, 1, NULL, 12, '2010-05-19 20:26:31', '2010-05-19 20:26:31', 34, 34),
(138, NULL, NULL, NULL, 15, 17, 5, NULL, '2010-06-01 21:44:49', 0, 17),
(139, NULL, NULL, NULL, 0, 17, 12, NULL, NULL, 0, 0),
(140, NULL, NULL, NULL, 0, 17, 13, NULL, NULL, 0, 0),
(141, NULL, NULL, NULL, 3, 17, 27, NULL, '2010-06-05 17:29:57', 0, 36),
(142, '', '', NULL, 2, 3, 13, '2010-05-29 16:25:14', '2010-05-29 16:25:14', 36, 36),
(143, 'Lys ude og inde', '3 faser til lyset', 8000, 2, NULL, 13, '2010-05-29 16:27:49', '2010-05-29 16:31:02', 36, 36),
(144, 'Lyd', '3 faser', 8000, 1, NULL, 13, '2010-05-29 16:31:56', '2010-05-29 16:31:56', 36, 36),
(145, 'StrÃ¸m til operatÃ¸r rummet', '', 8000, 1, NULL, 13, '2010-05-29 16:34:58', '2010-05-29 16:34:58', 36, 36),
(146, 'Malaco Lounge (Cinema)', '3 faser til lyd', 8000, 1, NULL, 13, '2010-05-31 14:05:12', '2010-05-31 14:05:12', 36, 36),
(147, 'Malaco Lounge (Cinema)', 'Projektor', 2500, 1, NULL, 13, '2010-05-31 14:05:46', '2010-05-31 14:05:46', 36, 36),
(148, 'StrÃ¸m til storskÃ¦rm', '1 x 3x 32 amp. 380V cee', 62000, 1, NULL, 13, '2010-06-01 22:44:25', '2010-06-01 22:53:19', 36, 36),
(149, 'Campingvogn', 'Det fri gymnasium.\r\n\r\nAnlÃ¦g, dj-udstyr og campingvogn generelt', 2500, 1, NULL, 18, '2010-06-05 18:56:29', '2010-06-05 18:56:29', 24, 24),
(150, 'AVPD', 'Lyssystem + silent disco', 12000, 1, NULL, 6, '2010-06-21 13:22:20', '2010-06-21 13:22:20', 36, 36),
(151, 'Social Lab', 'OmrÃ¥de for sociale medier', 6000, 1, NULL, 11, '2010-06-21 13:42:15', '2010-06-21 13:42:15', 36, 36),
(152, 'Roskilde Social Lab', 'Enhed for sociale medier pÃ¥ Ã¥rets festival', 6000, 1, NULL, 11, '2010-06-21 22:23:41', '2010-06-21 22:23:41', 36, 36),
(153, '', '', NULL, 1, 4, 28, '2010-06-22 13:09:21', '2010-06-22 13:09:21', 36, 36),
(154, '', '', NULL, 1, 7, 28, '2010-06-22 13:12:12', '2010-06-22 13:12:12', 36, 36),
(156, '', '', NULL, 2, 19, 28, '2010-06-22 13:13:07', '2010-06-22 13:13:07', 36, 36),
(157, 'Lys Spots', '', 50, 4, NULL, 28, '2010-06-22 13:14:24', '2010-06-22 13:14:24', 36, 36),
(158, 'StrÃ¸m til lamper', 'Oplyst skilt fra Dansk Arkitektur Center', 4000, 1, NULL, 15, '2010-06-26 15:03:36', '2010-06-26 15:03:36', 36, 36);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL auto_increment,
  `title` char(100) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Data dump for tabellen `roles`
--

INSERT INTO `roles` (`id`, `title`, `created`, `modified`) VALUES
(1, 'Administrator', '2010-03-18 20:27:56', '2010-03-30 18:29:27'),
(2, 'Sektionsleder', '2010-03-18 20:28:12', '2010-03-30 18:29:20'),
(3, 'Gruppeleder', '2010-03-18 20:28:19', '2010-03-30 18:29:37'),
(4, 'Projektleder', '2010-03-18 20:28:28', '2010-03-30 18:29:48');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `sections`
--

CREATE TABLE IF NOT EXISTS `sections` (
  `id` int(11) NOT NULL auto_increment,
  `title` char(100) NOT NULL,
  `user_id` int(11) NOT NULL default '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Data dump for tabellen `sections`
--

INSERT INTO `sections` (`id`, `title`, `user_id`, `created`, `modified`) VALUES
(2, 'Underholdningssektionen', 13, '2010-04-17 17:34:24', '2010-04-17 17:34:24');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` char(40) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created` datetime default NULL,
  `modified` datetime default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Data dump for tabellen `users`
--

INSERT INTO `users` (`id`, `title`, `username`, `password`, `role_id`, `created`, `modified`) VALUES
(1, 'Lasse Boisen Andersen', 'la@laander.com', '29ef208fc02181fa44daef973746f77dd08904e1', 1, '2010-03-18 20:59:20', '2010-04-16 21:30:35'),
(2, 'SÃ¸ren Louv-Jansen', 'sorenlouv@gmail.com', 'b882929f916b1af2644fb02db839bf03023f2624', 1, '2010-04-16 21:32:12', '2010-04-17 10:51:21'),
(13, 'Nicolai S. Degn Johansen', 'nicolai.johansen@roskilde-festival.dk', 'be132f501223222f2893f023b99b1bd0254141f6', 2, '2010-04-18 20:00:53', '2010-04-18 21:46:41'),
(17, 'Nicolai Admin Johansen', 'nico@niconet.dk', '3c13a3d9478a843d03c635080e27138d3c976e13', 1, '2010-04-18 20:31:34', '2010-05-06 16:40:32'),
(19, 'Nico test projektleder', 'billet@niconet.dk', '31f7fa668ba81af8f54593c8a91acc6233f39db7', 4, '2010-04-19 19:45:21', '2010-04-19 19:45:21'),
(20, 'Nico test gruppeleder', 'brugsen@niconet.dk', '7b030de1a68ad5767643b297323b0b6a37a2e0fe', 3, '2010-04-19 19:46:25', '2010-04-19 19:48:54'),
(21, 'Mads Brix Nielsen', 'mads.nielsen@roskilde-festival.dk', '7ac71354a6cba26aac5d97dafb4ea45af09f662a', 3, '2010-04-19 20:01:33', '2010-04-26 23:51:45'),
(22, 'Hans Bjerrum', 'hans.bjerrum@roskilde-festival.dk', '7ac71354a6cba26aac5d97dafb4ea45af09f662a', 3, '2010-04-19 20:02:43', '2010-04-28 17:52:48'),
(23, 'Daniel Toke Hansen', 'daniel.hansen@roskilde-festival.dk', '753a4e0be389f87a9092516548017d83cf6701c6', 3, '2010-04-19 20:04:14', '2010-04-27 08:51:04'),
(24, 'Thomas Lillevang', 'thomas.lillevang@roskilde-festival.dk', 'aec60906cdb41578eaf52dad6dd5ada04b205486', 3, '2010-04-19 20:05:48', '2010-05-11 18:10:06'),
(25, 'Jacob Svensson', 'jacob.svensson@roskilde-festival.dk', '2660e0c2fc51d48f12546bee0098ea66ad82251f', 4, '2010-04-19 20:16:13', '2010-04-20 18:48:19'),
(26, 'Lasse Festival Andersen', 'lasse.andersen@roskilde-festival.dk', '00d4a94a2d9e64fe994b751a54f608dbacd6c8f4', 3, '2010-04-26 22:01:23', '2010-04-26 22:01:23'),
(28, 'David D. Thuesen ', 'david.thuesen@roskilde-festival.dk', '7ac71354a6cba26aac5d97dafb4ea45af09f662a', 4, '2010-04-27 08:49:58', '2010-04-27 08:49:58'),
(29, 'Signe Mathiasen', 'signe.mathiasen@roskilde-festival.dk', '7ac71354a6cba26aac5d97dafb4ea45af09f662a', 4, '2010-04-27 15:06:34', '2010-04-27 15:06:34'),
(30, 'Ida Roed', 'Ida.roed@roskilde-festival.dk', '7ac71354a6cba26aac5d97dafb4ea45af09f662a', 4, '2010-04-27 19:49:15', '2010-04-27 19:49:15'),
(31, 'Nikolaj Rasmussen', 'Nikolaj.Rasmussen@roskilde-festival.dk', '7ac71354a6cba26aac5d97dafb4ea45af09f662a', 4, '2010-04-27 19:50:53', '2010-04-27 19:50:53'),
(32, 'Anja Phigalt', 'Anja.Phigalt@roskilde-festival.dk', '9cc0fb49b569c1a833cfd27e9ad81bd368aabbf2', 4, '2010-04-27 22:27:07', '2010-05-11 19:52:11'),
(33, 'Dorthe Kerschus', 'dorthe.kerschus@roskilde-festival.dk', '7ac71354a6cba26aac5d97dafb4ea45af09f662a', 1, '2010-04-27 23:44:34', '2010-04-27 23:48:12'),
(34, 'Karen Marie Huuse', 'karen.huuse@roskilde-festival.dk', '8d0a609246d04f4447c6d6335eed7692803eb04b', 4, '2010-04-29 18:18:48', '2010-05-19 20:09:46'),
(35, 'Rasmus KarlshÃ¸j Truelsen', 'rasmus.truelsen@roskilde-festival.dk', '036122149fdc298894116dc702e35d5a401cddb8', 4, '2010-04-29 18:25:19', '2010-05-13 12:50:46'),
(36, 'Daniel MÃ¦rsk', 'maersk@roskilde-festival.dk', 'f05bf795d3a2fd7e2969f2a9ca549026edb98832', 1, '2010-05-08 11:23:54', '2010-05-08 11:23:54'),
(37, 'Johannes Grove', 'johannesgrove@gmail.com', '7ac71354a6cba26aac5d97dafb4ea45af09f662a', 4, '2010-05-08 16:20:24', '2010-05-08 16:20:24'),
(38, 'Johannes Grove', 'johannes.grove@roskilde-festival.dk', 'cfa3e5dc1b673d985edeebb3912684aba65b6a05', 4, '2010-05-11 17:23:40', '2010-05-11 18:08:23'),
(39, 'Michael Larsen', 'michael.larsen2@roskilde-festival.dk', '7ac71354a6cba26aac5d97dafb4ea45af09f662a', 4, '2010-05-14 11:04:52', '2010-05-14 11:04:52'),
(40, 'Christian Dam', 'chr.dam@roskilde-festival.dk', '7ac71354a6cba26aac5d97dafb4ea45af09f662a', 4, '2010-05-17 02:26:46', '2010-05-17 02:26:46'),
(41, 'H. C. Smed', 'smed@roskilde-festival.dk', '7ac71354a6cba26aac5d97dafb4ea45af09f662a', 3, '2010-05-18 23:39:37', '2010-05-18 23:39:37'),
(42, 'Lars Pedersen', 'lars.pedersen@roskilde-festival.dk', '7ac71354a6cba26aac5d97dafb4ea45af09f662a', 4, '2010-05-18 23:42:36', '2010-05-18 23:42:36'),
(43, 'Daniel MÃ¦rsk', 'seprmaersk@hotmail.com', '7ac71354a6cba26aac5d97dafb4ea45af09f662a', 4, '2010-06-22 13:07:54', '2010-06-22 13:07:54'),
(44, 'Peter Dilling', 'peter.dilling@roskilde-festival.dk', 'b8dc07c4ca007070a83e526b074fb955755c8163', 1, '2010-10-16 16:55:56', '2010-10-16 16:55:56'),
(45, 'Anders BÃ¸je', 'anders.boje@roskilde-festival.dk', 'adc6d70307c558c4a7d3a15ce0afd19b0a1ede55', 1, '2011-04-02 16:53:33', '2011-04-02 16:55:35'),
(46, 'Tomas Lieberkind', 't.lieberkind@gmail.com', '7ac71354a6cba26aac5d97dafb4ea45af09f662a', 1, '2011-04-02 16:54:48', '2011-04-02 16:54:48');

