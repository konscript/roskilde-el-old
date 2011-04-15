-- phpMyAdmin SQL Dump
-- version 3.3.7deb5build0.10.10.1
-- http://www.phpmyadmin.net
--
-- Vært: localhost
-- Genereringstid: 15. 04 2011 kl. 20:15:42
-- Serverversion: 5.1.49
-- PHP-version: 5.3.3-1ubuntu9.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `roskilde-el`
--

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `acos`
--

CREATE TABLE IF NOT EXISTS `acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=143 ;

--
-- Data dump for tabellen `acos`
--

INSERT INTO `acos` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, NULL, NULL, 'Application', 1, 201),
(2, 1, NULL, NULL, 'Controllers', 2, 139),
(3, 1, NULL, NULL, 'Content', 139, 200),
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
(69, 3, 'Section', 2, NULL, 140, 189),
(76, 69, 'Group', 2, NULL, 141, 152),
(96, 81, 'Project', 18, NULL, 186, 187),
(83, 76, 'Project', 6, NULL, 144, 145),
(84, 76, 'Project', 7, NULL, 146, 147),
(78, 69, 'Group', 3, NULL, 153, 154),
(79, 69, 'Group', 4, NULL, 155, 178),
(80, 108, 'Group', 5, NULL, 191, 194),
(81, 69, 'Group', 6, NULL, 179, 188),
(82, 76, 'Project', 5, NULL, 142, 143),
(91, 79, 'Project', 14, NULL, 156, 157),
(86, 76, 'Project', 9, NULL, 148, 149),
(87, 80, 'Project', 10, NULL, 192, 193),
(88, 81, 'Project', 11, NULL, 180, 181),
(89, 81, 'Project', 12, NULL, 182, 183),
(90, 81, 'Project', 13, NULL, 184, 185),
(92, 79, 'Project', 15, NULL, 158, 159),
(93, NULL, 'Project', 16, NULL, 202, 203),
(94, NULL, 'Project', 17, NULL, 204, 205),
(97, 79, 'Project', 19, NULL, 160, 161),
(98, 79, 'Project', 20, NULL, 162, 163),
(99, 79, 'Project', 21, NULL, 164, 165),
(100, 79, 'Project', 22, NULL, 166, 167),
(101, 79, 'Project', 23, NULL, 168, 169),
(102, 79, 'Project', 24, NULL, 170, 171),
(103, 79, 'Project', 25, NULL, 172, 173),
(104, 79, 'Project', 26, NULL, 174, 175),
(105, 108, 'Group', 7, NULL, 195, 198),
(106, 105, 'Project', 27, NULL, 196, 197),
(107, 79, 'Project', 28, NULL, 176, 177),
(108, 3, 'Section', 3, NULL, 190, 199),
(109, 2, NULL, NULL, 'ItemsProjects', 127, 138),
(110, 109, NULL, NULL, 'index', 128, 129),
(111, 109, NULL, NULL, 'view', 130, 131),
(112, 109, NULL, NULL, 'add', 132, 133),
(113, 109, NULL, NULL, 'edit', 134, 135),
(114, 109, NULL, NULL, 'delete', 136, 137),
(115, 76, 'Project', 29, NULL, 150, 151),
(116, NULL, 'Project', 30, NULL, 206, 207),
(117, NULL, 'Project', 31, NULL, 208, 209),
(118, NULL, 'Project', 32, NULL, 210, 211),
(119, NULL, 'Project', 33, NULL, 212, 213),
(120, NULL, 'Project', 34, NULL, 214, 215),
(121, NULL, 'Project', 35, NULL, 216, 217),
(122, NULL, 'Project', 36, NULL, 218, 219),
(123, NULL, 'Project', 37, NULL, 220, 221),
(124, NULL, 'Project', 38, NULL, 222, 223),
(125, NULL, 'Project', 39, NULL, 224, 225),
(126, NULL, 'Project', 40, NULL, 226, 227),
(127, NULL, 'Project', 41, NULL, 228, 229),
(128, NULL, 'Project', 42, NULL, 230, 231),
(129, NULL, 'Project', 43, NULL, 232, 233),
(130, NULL, 'Project', 44, NULL, 234, 235),
(131, NULL, 'Project', 45, NULL, 236, 237),
(132, NULL, 'Project', 46, NULL, 238, 239),
(133, NULL, 'Project', 47, NULL, 240, 241),
(134, NULL, 'Project', 48, NULL, 242, 243),
(135, NULL, 'Project', 49, NULL, 244, 245),
(136, NULL, 'Project', 50, NULL, 246, 247),
(137, NULL, 'Project', 51, NULL, 248, 249),
(138, NULL, 'Project', 52, NULL, 250, 251),
(139, NULL, 'Project', 53, NULL, 252, 253),
(140, NULL, 'Project', 54, NULL, 254, 255),
(141, NULL, 'Project', 55, NULL, 256, 257),
(142, NULL, 'Project', 56, NULL, 258, 259);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `aros`
--

CREATE TABLE IF NOT EXISTS `aros` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `foreign_key` (`foreign_key`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=59 ;

--
-- Data dump for tabellen `aros`
--

INSERT INTO `aros` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, NULL, NULL, 'Requesters', 1, 80),
(2, 1, 'Role', 1, NULL, 2, 19),
(3, 1, 'Role', 2, NULL, 20, 25),
(4, 1, 'Role', 3, NULL, 26, 43),
(5, 1, 'Role', 4, NULL, 44, 79),
(6, 2, 'User', 1, NULL, 3, 4),
(7, 2, 'User', 2, NULL, 5, 6),
(21, 3, 'User', 13, NULL, 21, 22),
(37, 5, 'User', 29, NULL, 51, 52),
(36, 5, 'User', 28, NULL, 49, 50),
(25, 2, 'User', 17, NULL, 7, 8),
(45, 5, 'User', 37, NULL, 63, 64),
(44, 2, 'User', 36, NULL, 11, 12),
(34, 4, 'User', 26, NULL, 37, 38),
(28, 4, 'User', 20, NULL, 27, 28),
(27, 5, 'User', 19, NULL, 45, 46),
(29, 4, 'User', 21, NULL, 29, 30),
(30, 4, 'User', 22, NULL, 31, 32),
(31, 4, 'User', 23, NULL, 33, 34),
(32, 4, 'User', 24, NULL, 35, 36),
(33, 5, 'User', 25, NULL, 47, 48),
(38, 5, 'User', 30, NULL, 53, 54),
(39, 5, 'User', 31, NULL, 55, 56),
(40, 5, 'User', 32, NULL, 57, 58),
(41, 2, 'User', 33, NULL, 9, 10),
(42, 5, 'User', 34, NULL, 59, 60),
(43, 5, 'User', 35, NULL, 61, 62),
(46, 5, 'User', 38, NULL, 65, 66),
(47, 5, 'User', 39, NULL, 67, 68),
(48, 5, 'User', 40, NULL, 69, 70),
(49, 4, 'User', 41, NULL, 39, 40),
(50, 5, 'User', 42, NULL, 71, 72),
(51, 5, 'User', 43, NULL, 73, 74),
(52, 2, 'User', 44, NULL, 13, 14),
(53, 2, 'User', 45, NULL, 15, 16),
(54, 2, 'User', 46, NULL, 17, 18),
(55, 5, 'User', 47, NULL, 75, 76),
(56, 3, 'User', 48, NULL, 23, 24),
(57, 4, 'User', 49, NULL, 41, 42),
(58, 5, 'User', 50, NULL, 77, 78);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `aros_acos`
--

CREATE TABLE IF NOT EXISTS `aros_acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `aro_id` int(10) NOT NULL,
  `aco_id` int(10) NOT NULL,
  `_create` varchar(2) NOT NULL DEFAULT '0',
  `_read` varchar(2) NOT NULL DEFAULT '0',
  `_update` varchar(2) NOT NULL DEFAULT '0',
  `_delete` varchar(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ARO_ACO_KEY` (`aro_id`,`aco_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=81 ;

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
(35, 28, 76, '-1', '-1', '-1', '-1'),
(56, 46, 96, '-1', '-1', '-1', '-1'),
(37, 29, 78, '1', '1', '1', '1'),
(38, 30, 79, '1', '1', '1', '1'),
(39, 31, 80, '1', '1', '1', '1'),
(40, 32, 81, '1', '1', '1', '1'),
(41, 33, 82, '-1', '-1', '-1', '-1'),
(47, 38, 86, '-1', '-1', '-1', '-1'),
(48, 39, 87, '1', '1', '1', '1'),
(49, 40, 88, '1', '1', '1', '1'),
(51, 42, 89, '-1', '-1', '-1', '-1'),
(50, 28, 79, '-1', '-1', '-1', '-1'),
(52, 43, 90, '1', '1', '1', '1'),
(57, 47, 97, '1', '1', '1', '1'),
(54, 37, 92, '1', '1', '1', '1'),
(58, 47, 98, '1', '1', '1', '1'),
(59, 47, 99, '1', '1', '1', '1'),
(60, 47, 100, '1', '1', '1', '1'),
(61, 47, 101, '1', '1', '1', '1'),
(62, 47, 102, '-1', '-1', '-1', '-1'),
(63, 47, 103, '1', '1', '1', '1'),
(64, 48, 104, '1', '1', '1', '1'),
(66, 50, 106, '1', '1', '1', '1'),
(67, 51, 107, '1', '1', '1', '1'),
(68, 55, 82, '1', '1', '1', '1'),
(69, 57, 76, '1', '1', '1', '1'),
(70, 55, 86, '-1', '-1', '-1', '-1'),
(71, 56, 108, '1', '1', '1', '1'),
(72, 55, 96, '-1', '-1', '-1', '-1'),
(73, 55, 89, '1', '1', '1', '1'),
(74, 5, 34, '1', '1', '1', '1'),
(75, 5, 35, '1', '1', '1', '1'),
(76, 5, 21, '1', '1', '1', '1'),
(77, 3, 21, '1', '1', '1', '1'),
(78, 4, 21, '1', '1', '1', '1'),
(79, 58, 102, '1', '1', '1', '1'),
(80, 55, 115, '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL,
  `section_id` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Data dump for tabellen `groups`
--

INSERT INTO `groups` (`id`, `title`, `section_id`, `user_id`, `created`, `modified`) VALUES
(2, 'Nico testgruppe', 2, 49, '2010-04-19 19:49:24', '2010-04-19 19:49:24'),
(3, 'Produktionsgruppen', 2, 21, '2010-04-19 20:01:59', '2010-04-19 20:01:59'),
(4, 'Indre Plads Ã˜st', 2, 22, '2010-04-19 20:03:21', '2010-04-19 20:03:21'),
(5, 'Indre Plads Vest', 3, 23, '2010-04-19 20:04:48', '2010-04-19 20:04:48'),
(6, 'Ydre Plads', 2, 24, '2010-04-19 20:06:24', '2010-04-19 20:06:24'),
(7, 'Samarbejdspartnere og Medieby', 3, 41, '2010-05-18 23:41:10', '2010-05-18 23:41:10');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL,
  `description` text NOT NULL,
  `power_usage` int(11) NOT NULL,
  `template` tinyint(1) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=81 ;

--
-- Data dump for tabellen `items`
--

INSERT INTO `items` (`id`, `title`, `description`, `power_usage`, `template`, `created`, `modified`) VALUES
(2, 'Jeg tester ny enhed', 'hahaah   gff', 300, 0, '2010-04-16 09:22:59', '2011-04-15 13:16:13'),
(3, 'LyskÃ¦de (25 m) m. sparepÃ¦rer', 'Watt-forbrug for lyskÃ¦de med sparepÃ¦rer (pr. 10 meter)', 30, 0, '2010-04-16 09:24:19', '2010-05-18 23:48:05'),
(4, 'KÃ¸leskab', '', 150, 0, '2010-04-16 09:25:55', '2010-04-16 09:25:55'),
(5, 'Kaffemaskine lille', '', 1100, 0, '2010-04-16 09:29:11', '2010-04-16 09:29:11'),
(6, 'Kaffemaskine stor', '', 2025, 0, '2010-04-16 09:29:41', '2010-04-16 09:29:41'),
(7, 'El-kedel', '', 122, 0, '2010-04-16 09:30:09', '2011-04-13 03:23:33'),
(8, 'Computer (stationÃ¦r) m. skÃ¦rm', 'StationÃ¦r computer med skÃ¦rm', 750, 0, '2010-04-16 09:30:53', '2010-04-16 10:02:24'),
(9, 'Printer', '', 500, 0, '2010-04-16 09:31:18', '2010-04-16 09:31:18'),
(10, 'Kasseapparat', '', 1035, 0, '2010-04-16 09:32:13', '2010-04-16 09:32:13'),
(11, 'Dankort-terminal', '', 350, 0, '2010-04-16 09:32:58', '2010-04-16 09:32:58'),
(12, 'Stiksav', '', 530, 0, '2010-04-16 09:36:25', '2010-04-16 09:36:25'),
(13, 'Rundsav', '', 1000, 0, '2010-04-16 09:36:43', '2010-04-16 09:36:43'),
(14, 'BrÃ¸drister', '', 1000, 0, '2010-04-16 09:37:32', '2010-04-16 09:37:32'),
(15, 'TV', 'Almindeligt fjernsyn som det kendes hjemme i stuen', 120, 0, '2010-04-16 09:38:08', '2010-04-16 10:04:24'),
(16, 'Skruemaskiner 12V/18V (opladere)', 'Opladere til 12V/18V skruemaskiner', 200, 0, '2010-04-16 10:07:19', '2010-04-28 04:53:52'),
(17, 'Mobiloplader', '', 5, 0, '2010-04-16 10:08:07', '2010-05-20 21:03:25'),
(18, 'BÃ¦rbar computer, oplader til', 'Oplader til bÃ¦rbar computer', 180, 0, '2010-04-16 10:09:26', '2010-04-16 10:09:26'),
(19, 'Arbejdslampe', '', 300, 0, '2010-05-06 00:17:23', '2010-05-06 00:17:23'),
(20, 'HÃ¥rtÃ¸rrer', '', 1800, 0, '2010-05-11 19:16:06', '2010-05-11 19:16:06'),
(21, 'Gyngestativ', 'asdas', 3, 0, '2011-04-12 00:54:19', '2011-04-12 00:54:19'),
(22, 'Ny enhed', 'Dette er en ny enhed', 33, 0, '2011-04-12 20:18:29', '2011-04-12 20:18:29'),
(23, 'Pikkemand!', 'asdsad', 333, 0, '2011-04-12 20:28:13', '2011-04-12 20:28:50'),
(24, 'asds', 'asddsa', 33, 0, '2011-04-13 03:35:17', '2011-04-13 03:35:17'),
(25, 'Ny enhed', 'saaa', 444, 1, '2011-04-13 12:39:42', '2011-04-13 12:39:42'),
(26, 'Ny enhed', 'saaa', 444, 1, '2011-04-13 12:39:46', '2011-04-13 12:39:46'),
(27, 'Ny enhed', 'saaa', 444, 1, '2011-04-13 12:40:53', '2011-04-13 12:40:53'),
(28, 'Jeg tester ny enhed', 'hahaah', 300, 0, '2011-04-13 12:58:24', '2011-04-13 12:58:24'),
(29, '', '', 0, 0, '2011-04-13 15:40:00', '2011-04-13 15:40:00'),
(30, 'dssdf', 'asds', 323, 0, '2011-04-13 15:43:01', '2011-04-13 15:43:01'),
(31, 'test', 'tadad', 234, 0, '2011-04-13 15:50:15', '2011-04-13 15:50:15'),
(32, 'Dette er en ny item!', 'Jeg er ny her', 33, 0, '2011-04-15 16:46:46', '2011-04-15 16:46:46'),
(33, 'Dette er en ny item!', 'Jeg er ny her', 33, 0, '2011-04-15 16:47:03', '2011-04-15 16:47:03'),
(34, 'Endnu nye', 'nu med quant', 500, 0, '2011-04-15 16:48:51', '2011-04-15 16:48:51'),
(35, 'asdsa', 'asdads', 33, 0, '2011-04-15 16:49:30', '2011-04-15 16:49:30'),
(36, 'asdsa', 'asdads', 33, 0, '2011-04-15 16:50:12', '2011-04-15 16:50:12'),
(37, 'asdsa', 'asad', 3, 0, '2011-04-15 17:37:43', '2011-04-15 17:37:43'),
(38, 'asdsa', 'asad', 3, 0, '2011-04-15 17:37:59', '2011-04-15 17:37:59'),
(39, 'asdsa', 'asad', 3, 0, '2011-04-15 17:38:46', '2011-04-15 17:38:46'),
(40, 'asdsa', 'asad', 3, 0, '2011-04-15 17:39:08', '2011-04-15 17:39:08'),
(41, 'asdsa', 'asad', 3, 0, '2011-04-15 17:39:20', '2011-04-15 17:39:20'),
(42, 'asdsa', 'asad', 3, 0, '2011-04-15 17:39:23', '2011-04-15 17:39:23'),
(43, 'asdsa', 'asad', 3, 0, '2011-04-15 17:39:58', '2011-04-15 17:39:58'),
(44, 'asdsa', 'asad', 3, 0, '2011-04-15 17:41:48', '2011-04-15 17:41:48'),
(45, 'asdsa', 'asad', 3, 0, '2011-04-15 17:59:17', '2011-04-15 17:59:17'),
(46, 'asdsa', 'asad', 3, 0, '2011-04-15 17:59:34', '2011-04-15 17:59:34'),
(47, 'asdsa', 'asad', 3, 0, '2011-04-15 18:07:58', '2011-04-15 18:07:58'),
(48, 'asdsa', 'asad', 3, 0, '2011-04-15 18:08:05', '2011-04-15 18:08:05'),
(49, 'asdsa', 'asad', 3, 0, '2011-04-15 18:08:51', '2011-04-15 18:08:51'),
(50, 'asdsa', 'asad', 3, 0, '2011-04-15 18:09:43', '2011-04-15 18:09:43'),
(51, 'asdsa', 'asad', 3, 0, '2011-04-15 18:09:49', '2011-04-15 18:09:49'),
(52, 'asdsa', 'asad', 3, 0, '2011-04-15 18:10:07', '2011-04-15 18:10:07'),
(53, 'asdsa', 'asad', 3, 0, '2011-04-15 18:10:14', '2011-04-15 18:10:14'),
(54, 'asdsa', 'asad', 3, 0, '2011-04-15 18:10:21', '2011-04-15 18:10:21'),
(55, 'asdsa', 'asad', 3, 0, '2011-04-15 18:10:39', '2011-04-15 18:10:39'),
(56, 'asdsa', 'asad', 3, 0, '2011-04-15 18:11:10', '2011-04-15 18:11:10'),
(57, 'asdsa', 'asad', 3, 0, '2011-04-15 18:11:22', '2011-04-15 18:11:22'),
(58, 'asdsa', 'asad', 3, 0, '2011-04-15 18:11:35', '2011-04-15 18:11:35'),
(59, 'asdsa', 'asad', 3, 0, '2011-04-15 18:11:39', '2011-04-15 18:11:39'),
(60, 'asdsa', 'asad', 3, 0, '2011-04-15 18:12:27', '2011-04-15 18:12:27'),
(61, 'asdsa', 'asad', 3, 0, '2011-04-15 18:13:11', '2011-04-15 18:13:11'),
(62, 'asdsa', 'asad', 3, 0, '2011-04-15 18:14:06', '2011-04-15 18:14:06'),
(63, 'asdsa', 'asad', 3, 0, '2011-04-15 18:22:34', '2011-04-15 18:22:34'),
(64, 'asdsa', 'asad', 3, 0, '2011-04-15 18:22:44', '2011-04-15 18:22:44'),
(65, 'asdsa', 'asad', 3, 0, '2011-04-15 18:22:49', '2011-04-15 18:22:49'),
(66, 'asdsa', 'asad', 3, 0, '2011-04-15 18:22:54', '2011-04-15 18:22:54'),
(67, 'asdsa', 'asad', 3, 0, '2011-04-15 18:23:08', '2011-04-15 18:23:08'),
(68, 'asdsa', 'asad', 3, 0, '2011-04-15 18:23:15', '2011-04-15 18:23:15'),
(69, 'asdsa', 'asad', 3, 0, '2011-04-15 18:28:17', '2011-04-15 18:28:17'),
(70, 'asdsa', 'asad', 3, 0, '2011-04-15 18:28:21', '2011-04-15 18:28:21'),
(71, 'asdsa', 'asad', 3, 0, '2011-04-15 18:28:36', '2011-04-15 18:28:36'),
(72, 'asdsa', 'asad', 3, 0, '2011-04-15 18:28:38', '2011-04-15 18:28:38'),
(73, 'asdsa', 'asad', 3, 0, '2011-04-15 18:28:39', '2011-04-15 18:28:39'),
(74, 'asdsa', 'asad', 3, 0, '2011-04-15 18:29:17', '2011-04-15 18:29:17'),
(75, 'FÃ¸rste test', 'adasdads', 1, 0, '2011-04-15 18:32:57', '2011-04-15 18:32:57'),
(76, 'Ny enhed', 'asdas', 33, 0, '2011-04-15 18:36:13', '2011-04-15 18:36:13'),
(77, 'Dette er en standard enhed', 'asdssad', 44, 1, '2011-04-15 19:22:50', '2011-04-15 19:22:50'),
(78, 'Dette er ikke en standard enhed', 'asasd', 333, 0, '2011-04-15 19:23:10', '2011-04-15 19:23:10'),
(79, 'Enheden Tomas', 'Fin enhed', 1337, 1, '2011-04-15 19:45:27', '2011-04-15 19:47:28'),
(80, 'awq', '', 78, 0, '2011-04-15 20:09:17', '2011-04-15 20:09:17');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `items_projects`
--

CREATE TABLE IF NOT EXISTS `items_projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `project_id` (`project_id`),
  KEY `item_id` (`item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Data dump for tabellen `items_projects`
--

INSERT INTO `items_projects` (`id`, `item_id`, `project_id`, `quantity`) VALUES
(1, 77, 5, 0),
(2, 78, 5, 0),
(3, 27, 5, 50),
(4, 25, 5, 1337),
(5, 25, 5, 33),
(6, 25, 5, 44),
(7, 25, 5, 44),
(8, 26, 5, 33),
(9, 25, 5, 44),
(10, 77, 5, 333),
(17, 79, 5, 0),
(18, 79, 7, 0),
(19, 79, 10, 0),
(20, 79, 11, 0),
(21, 79, 14, 0),
(22, 80, 5, 0);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `body` text,
  `total_power_usage` int(11) DEFAULT NULL,
  `total_power_allowance` int(11) DEFAULT NULL,
  `build_start` datetime DEFAULT NULL,
  `build_end` datetime DEFAULT NULL,
  `items_start` datetime DEFAULT NULL,
  `items_end` datetime DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `file_path` varchar(255) NOT NULL,
  `group_id` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=57 ;

--
-- Data dump for tabellen `projects`
--

INSERT INTO `projects` (`id`, `title`, `body`, `total_power_usage`, `total_power_allowance`, `build_start`, `build_end`, `items_start`, `items_end`, `status`, `file_path`, `group_id`, `user_id`, `created`, `modified`, `created_by`, `modified_by`) VALUES
(5, 'UHS Base', 'De eksisterende installationer i alle 4H bygningerne skal tilsluttes, sÃ¥ de er brugbare, men vi kan ogsÃ¥ lige snakke om, vi selv skal gÃ¸re det\r\nDet tilladte elforbrug er det nederstÃ¥ende. Der kan frit distribueres strÃ¸m sÃ¥ lÃ¦nge det ikke overstiger det tilladte.asd\r\nasdasdasdasdadssfsdaasdasdasd', 37880, 39597, '2010-04-27 00:00:00', '2010-04-27 00:00:00', '2010-06-18 00:00:00', '2010-07-08 00:00:00', 0, '4da38230-1378-451d-950c-7b73ae57fd02.jpg', 2, 47, '2010-04-19 20:16:17', '2011-04-13 11:57:33', 13, 2),
(6, 'Roskilde Retro / Ex-Astoria', 'Social Zone hylder RF''s 40 Ã¥rs jubilÃ¦um med diverse aktiviteter og events.\r\nDet tilladte elforbrug er det nederstÃ¥ende. Der kan frit distribueres strÃ¸m sÃ¥ lÃ¦nge det ikke overstiger det tilladte.', 62400, 62400, '2010-06-20 00:00:00', '2010-06-30 00:00:00', '2010-06-24 00:00:00', '2010-07-05 00:00:00', 0, '4c20b308-0fa8-48c8-b0c0-6a920a021f01.jpg', 2, 28, '2010-04-27 08:50:01', '2010-06-21 13:22:20', 23, 2),
(7, 'Kultur Zonen - bjerget', 'Det tilladte elforbrug er det nederstÃ¥ende. Der kan frit distribueres strÃ¸m sÃ¥ lÃ¦nge det ikke overstiger det tilladte.', 2700, 2700, '2010-06-19 00:00:00', '2010-07-06 00:00:00', '2010-06-23 00:00:00', '2010-07-05 00:00:00', 0, '4c1fc657-72c8-43d9-9f3a-2f540a021f03.jpg', 2, 29, '2010-04-27 15:06:38', '2010-05-08 14:26:55', 22, 2),
(9, 'Odeon', 'Ideen er, at der vil vÃ¦re to ens siddeinstallationer, hvor den Ã¸verste skal drives af ''almindelig'' strÃ¸m, mens den nederste vil blive koblet til 4-6 cykler og publikum derfor selv skal producere strÃ¸mmen. SÃ¥ ja, det er den Ã¸verste firkant (5x5 m) der skal have strÃ¸m fra el-gruppen. Og det er den der er bestilt strÃ¸m til.\r\nDet tilladte elforbrug er det nederstÃ¥ende. Der kan frit distribueres strÃ¸m sÃ¥ lÃ¦nge det ikke overstiger det tilladte.\r\nasasdd', 36900, 3600, '2010-06-19 00:00:00', '2010-06-30 00:00:00', '2010-06-30 00:00:00', '2010-07-05 00:00:00', 0, '4c20c97d-2570-4603-834f-2ba00a021f02.jpg', 2, 47, '2010-04-27 19:49:19', '2011-04-08 17:19:52', 23, 47),
(10, 'Cosmopol', 'Det tilladte elforbrug er det nederstÃ¥ende. Der kan frit distribueres strÃ¸m sÃ¥ lÃ¦nge det ikke overstiger det tilladte.', 57000, 57000, '2010-06-18 00:00:00', '2010-04-28 00:00:00', '2010-04-28 00:00:00', '2010-04-28 00:00:00', 0, '4c1a038f-edd4-4e0e-9c24-10c80a021f03.jpg', 5, 31, '2010-04-27 19:50:55', '2010-05-08 14:54:26', 23, 36),
(11, 'Climate Community', 'Et omrÃ¥de pÃ¥ camping med sÃ¦rlig fokus pÃ¥ bÃ¦redygtighed.\r\n\r\nHovedtavle trÃ¦kkes til ''Kambyrator''\r\nDet tilladte elforbrug er det nederstÃ¥ende. Der kan frit distribueres strÃ¸m sÃ¥ lÃ¦nge det ikke overstiger det tilladte.', 17730, 17730, '2010-06-19 00:00:00', '2010-06-25 00:00:00', '2010-06-25 00:00:00', '2010-07-05 00:00:00', 0, '4c20b3f0-4258-4320-9c28-27b50a021f02.jpg', 6, 32, '2010-04-27 22:27:11', '2010-06-21 22:23:41', 24, 36),
(12, 'Agora M - Expression', 'Det tilladte elforbrug er det nederstÃ¥ende. Der kan frit distribueres strÃ¸m sÃ¥ lÃ¦nge det ikke overstiger det tilladte. assadasdads ad', 32099, 32099, '2010-06-19 00:00:00', '2010-06-26 00:00:00', '2010-06-24 00:00:00', '2010-07-05 00:00:00', 0, '4c20aef4-6c14-4b04-ab1c-3e9f0a021f01.jpg', 6, 47, '2010-04-29 18:18:49', '2010-06-22 14:40:38', 24, 47),
(13, 'Cinema', 'Det tilladte elforbrug er det nederstÃ¥ende. Der kan frit distribueres strÃ¸m sÃ¥ lÃ¦nge det ikke overstiger det tilladte.', 108690, 108690, '2010-06-24 00:00:00', '2010-06-27 00:00:00', '2010-06-27 00:00:00', '2010-07-05 00:00:00', 0, '', 6, 35, '2010-04-29 18:25:20', '2010-06-01 22:53:19', 24, 36),
(14, 'Kultur Zonen - gyngen', 'Det tilladte elforbrug er det nederstÃ¥ende. Der kan frit distribueres strÃ¸m sÃ¥ lÃ¦nge det ikke overstiger det tilladte.', 6000, 6000, '2010-06-19 00:00:00', '2010-07-01 00:00:00', '2010-06-27 00:00:00', '2010-07-05 00:00:00', 0, '4c1fc11b-0344-4881-abd3-76de0a021f03.jpg', 4, 29, '2010-05-08 14:29:11', '2010-05-08 14:31:14', 17, 36),
(15, 'Kultur Zonen - Dansk Arkitektur Center', '', 4000, 4000, '2010-05-08 00:00:00', '2010-05-08 00:00:00', '2010-06-27 00:00:00', '2010-07-05 00:00:00', 0, '4c20a2b7-feb0-4132-a40b-4a5c0a021f04.jpg', 4, 29, '2010-05-08 14:38:18', '2010-06-26 15:03:36', 17, 36),
(18, 'VM Agora', 'SkÃ¦rm:  380V/63A CEEd\r\nLydanlÃ¦g i forbindelse med skÃ¦rm: 16A CEE\r\nVi planlÃ¦gger at lave en kommentatorboks i forbindelse med skÃ¦rmen, hvortil der skal bruges: mixer, lys, kamera og hvad det ellers krÃ¦ver.\r\nDerudover er det tanken at der skal holdes FIFA-soccer konkurrence pÃ¥ skÃ¦rmen, hvilket krÃ¦ver strÃ¸m til Xbox, mm.\r\n\r\nSensational Street Soccer :\r\n400 W CE (pc, kaffemaskine, hÃ¸jtaler mm. De har et stort omrÃ¥de)\r\nMajken fra Sensational Street Soccer har fÃ¥et tilsendt en El-skema fra Rene, hvorudfra hun har udregnet deres behov. Jeg har ikke kunne nÃ¥ at tjekke op pÃ¥ om det er passende.\r\n\r\nSex og Samfund:\r\nHar brug for strÃ¸m til kaffemaskine, hÃ¸jtalere, anlÃ¦g. (jeg regner med at kunne arrangere det sÃ¥ de kan dele det med Sensational Soccer\r\n\r\nDet tilladte elforbrug er det nederstÃ¥ende. Der kan frit distribueres strÃ¸m sÃ¥ lÃ¦nge det ikke overstiger det tilladte.', 57535, 57535, '2010-06-19 00:00:00', '2010-06-27 00:00:00', '2010-06-24 00:00:00', '2010-07-05 00:00:00', 0, '4c0a85c1-dba4-4652-8242-63ce0a021f01.jpg', 6, 47, '2010-05-11 17:23:40', '2010-06-05 19:11:32', 24, 47),
(19, 'Port 7', 'Port fra Ydre Plads til Indre Plads.\r\n\r\nDe lysende tal skal vende mod Ã¸st, nord og syd (9 rÃ¸r gange 3) - 36 W lysstofrÃ¸r => 27 * 36 W = 972 W\r\n\r\nDet tilladte elforbrug er det nederstÃ¥ende. Der kan frit distribueres strÃ¸m sÃ¥ lÃ¦nge det ikke overstiger det tilladte.', 972, 972, '2010-05-14 00:00:00', '2010-05-14 00:00:00', '2010-06-24 00:00:00', '2010-07-05 00:00:00', 0, '', 4, 39, '2010-05-14 11:04:53', '2010-05-17 01:01:45', 17, 36),
(20, 'SejloverdÃ¦kningen', 'Det tilladte elforbrug er det nederstÃ¥ende. Der kan frit distribueres strÃ¸m sÃ¥ lÃ¦nge det ikke overstiger det tilladte.', 2400, 2400, '2010-05-17 00:00:00', '2010-05-17 00:00:00', '2010-06-28 00:00:00', '2010-07-05 00:00:00', 0, '', 4, 39, '2010-05-14 11:06:03', '2010-05-17 01:21:06', 17, 36),
(21, 'Entrance East', 'Der skal bruge der som Michael kalder "sorte spots" - jeg gÃ¥r ud fra at det er arbejdslamper pÃ¥ 300 W.\r\n\r\nSpots''ne skal lyse op pÃ¥ et banner, som Christian Dam designer. De skal bare lÃ¦gges ovenpÃ¥ billetcontainerne. Et banner pr. indgang\r\n\r\nDet tilladte elforbrug er det nederstÃ¥ende. Der kan frit distribueres strÃ¸m sÃ¥ lÃ¦nge det ikke overstiger det tilladte.', 3000, 3000, '2010-05-17 00:00:00', '2010-05-17 00:00:00', '2010-06-24 00:00:00', '2010-07-05 00:00:00', 0, '', 4, 39, '2010-05-14 11:09:14', '2010-05-17 01:16:45', 17, 36),
(22, 'Entrance West', 'Der skal bruge der som Michael kalder "sorte spots" - jeg gÃ¥r ud fra at det er arbejdslamper pÃ¥ 300 W.\r\n\r\nSpots''ne skal lyse op pÃ¥ et banner, som Christian Dam designer. De skal bare lÃ¦gges ovenpÃ¥ billetcontainerne. Et banner pr. indgang\r\n\r\nDet tilladte elforbrug er det nederstÃ¥ende. Der kan frit distribueres strÃ¸m sÃ¥ lÃ¦nge det ikke overstiger det tilladte.', 1800, 1800, '2010-05-17 00:00:00', '2010-05-17 00:00:00', '2010-06-24 00:00:00', '2010-07-05 00:00:00', 0, '', 4, 39, '2010-05-14 11:09:43', '2010-05-17 01:18:19', 17, 36),
(23, 'TrinbrÃ¦ttet', 'Der skal bruge der som Michael kalder "sorte spots" - jeg gÃ¥r ud fra at det er arbejdslamper pÃ¥ 300 W.\r\n\r\nSpots''ne skal lyse op pÃ¥ et banner, som Christian Dam designer. De skal bare lÃ¦gges ovenpÃ¥ billetcontainerne. Et banner pr. indgang', 1200, 1200, '2010-05-17 00:00:00', '2010-05-17 00:00:00', '2010-06-24 00:00:00', '2010-07-05 00:00:00', 0, '', 4, 39, '2010-05-14 11:10:37', '2010-05-17 01:14:23', 17, 36),
(24, 'Port 10', 'Port fra Ydre Plads til Indre Plads\r\nPort 10 - nord syd (20 gange 2) - 36 W lysstofrÃ¸r => 40 * 36 W = 1440 W\r\nDet tilladte elforbrug er det nederstÃ¥ende. Der kan frit distribueres strÃ¸m sÃ¥ lÃ¦nge det ikke overstiger det tilladte.asdasdd', 1758, 1440, '2010-05-17 00:00:00', '2010-05-17 00:00:00', '2010-06-24 00:00:00', '2010-07-05 00:00:00', 0, '', 4, 50, '2010-05-14 11:13:05', '2011-04-12 01:00:22', 17, 50),
(25, 'Port 19', 'Port fra Ydre Plads til Indre Plads\r\nPort 19 - kun vest (21 gange 1) - 36 W lysstofrÃ¸r => 21 * 36 W = 756 W\r\nDet tilladte elforbrug er det nederstÃ¥ende. Der kan frit distribueres strÃ¸m sÃ¥ lÃ¦nge det ikke overstiger det tilladte.', 756, 756, '2010-05-17 00:00:00', '2010-05-17 00:00:00', '2010-06-24 00:00:00', '2010-07-05 00:00:00', 0, '', 4, 39, '2010-05-14 11:13:35', '2010-05-17 01:11:08', 17, 36),
(26, 'Arena', 'El - Der skal sÃ¦ttes lysstofrÃ¸r op i trÃ¦er i det nye hjÃ¸rne â€“ tre pr. trÃ¦ 9 trÃ¦er i alt = 27 lysstofrÃ¸r med to armaturer i hver. => 36 W * 2 * 27 = 1.944 W. Det skal trÃ¦kkes fra bagomrÃ¥det (gÃ¥r ud fra at det er scenens bagomrÃ¥de), men skal alligevel bestilles hos Peter og Camilla. El skal trÃ¦kke kabler op i trÃ¦erne (siger Dam).\r\n\r\nDet tilladte elforbrug er det nederstÃ¥ende. Der kan frit distribueres strÃ¸m sÃ¥ lÃ¦nge det ikke overstiger det tilladte.', 2376, 2376, '2010-05-17 00:00:00', '2010-05-17 00:00:00', '2010-06-27 00:00:00', '2010-07-05 00:00:00', 0, '', 4, 40, '2010-05-17 02:26:47', '2010-06-21 13:33:43', 17, 36),
(27, 'Graffiti', 'Det tilladte elforbrug er det nederstÃ¥ende. Der kan frit distribueres strÃ¸m sÃ¥ lÃ¦nge det ikke overstiger det tilladte.', 6155, 6155, '2010-05-18 00:00:00', '2010-05-18 00:00:00', '2010-06-21 00:00:00', '2010-07-07 00:00:00', 0, '4bf30aa0-55c0-47ac-a19b-249d0a021f03.jpg', 7, 42, '2010-05-18 23:42:37', '2010-06-05 17:29:57', 17, 36),
(28, 'Ventilen', 'HyggeomrÃ¥de for kunstnere', 2150, 2150, '2010-06-22 00:00:00', '2010-06-22 00:00:00', '2010-06-29 00:00:00', '2010-07-05 00:00:00', 0, '', 4, 43, '2010-06-22 13:07:55', '2010-06-22 13:14:24', 36, 36),
(29, 'Test projekt', 'Dette er et nyt porjekt', 0, 0, NULL, NULL, NULL, NULL, 0, '', 2, 47, '2011-04-12 20:17:35', '2011-04-12 20:17:35', 2, 2);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Data dump for tabellen `sections`
--

INSERT INTO `sections` (`id`, `title`, `user_id`, `created`, `modified`) VALUES
(2, 'Underholdningssektionen', 13, '2010-04-17 17:34:24', '2010-04-17 17:34:24'),
(3, 'GÃ¸glersektionen', 48, '2011-04-02 21:42:45', '2011-04-02 21:42:45');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `users`
--

CREATE TABLE IF NOT EXISTS `users` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

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
(46, 'Tomas Lieberkind', 't.lieberkind@gmail.com', '7ac71354a6cba26aac5d97dafb4ea45af09f662a', 1, '2011-04-02 16:54:48', '2011-04-02 16:54:48'),
(47, 'user', 'user@user.com', '0d0ecdb90dfd6235e9c89e76ee96cdb1afaae983', 4, '2011-04-02 21:13:12', '2011-04-02 21:14:14'),
(48, 'Section demo', 'section@user.com', '7143c7a1661fa4e8f991c15d7b69643dc43a0438', 2, '2011-04-02 21:21:44', '2011-04-02 21:21:44'),
(49, 'Group demo', 'group@user.com', '7ad8dcb6142a0f7efc3feaab6000de3e54376bdc', 3, '2011-04-02 21:22:07', '2011-04-02 21:22:07'),
(50, 'test2', 'test@konscript.dk', 'a7de292d5c234ccaa28f99638428afd1b25ccc9b', 4, '2011-04-11 23:47:12', '2011-04-11 23:47:12');
