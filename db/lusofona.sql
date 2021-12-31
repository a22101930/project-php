-- Adminer 4.8.1 MySQL 5.5.5-10.3.32-MariaDB-0ubuntu0.20.04.1 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `brand`;
CREATE TABLE `brand` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `brand` (`id`, `name`) VALUES
(1,	'Dell'),
(2,	'HP'),
(3,	'Apple');

DROP TABLE IF EXISTS `gestao_soft`;
CREATE TABLE `gestao_soft` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `machine_id` int(11) NOT NULL,
  `software_id` int(11) NOT NULL,
  `soft_version_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `machine_id` (`machine_id`),
  KEY `software_id` (`software_id`),
  KEY `soft_version_id` (`soft_version_id`),
  CONSTRAINT `gestao_soft_ibfk_1` FOREIGN KEY (`machine_id`) REFERENCES `machine` (`id`),
  CONSTRAINT `gestao_soft_ibfk_2` FOREIGN KEY (`software_id`) REFERENCES `software` (`id`),
  CONSTRAINT `gestao_soft_ibfk_3` FOREIGN KEY (`soft_version_id`) REFERENCES `soft_version` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `gestao_soft` (`id`, `machine_id`, `software_id`, `soft_version_id`) VALUES
(1,	1,	3,	1),
(2,	2,	3,	1),
(3,	3,	3,	1),
(4,	1,	4,	3),
(5,	1,	8,	4),
(6,	2,	8,	4),
(7,	1,	12,	18),
(8,	2,	12,	19),
(9,	2,	4,	3),
(10,	1,	5,	17),
(11,	3,	5,	16),
(12,	2,	5,	16),
(13,	1,	9,	11),
(14,	3,	9,	11),
(15,	3,	4,	3),
(16,	1,	7,	14),
(17,	3,	6,	12),
(18,	3,	11,	10),
(19,	1,	2,	20),
(20,	1,	10,	9),
(21,	3,	10,	9),
(22,	1,	10,	9);

DROP TABLE IF EXISTS `machine`;
CREATE TABLE `machine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `serial_number` varchar(20) NOT NULL,
  `status_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `model_id` int(11) NOT NULL,
  `operative_system_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `status_id` (`status_id`),
  KEY `brand_id` (`brand_id`),
  KEY `model_id` (`model_id`),
  KEY `operative_system_id` (`operative_system_id`),
  CONSTRAINT `machine_ibfk_2` FOREIGN KEY (`model_id`) REFERENCES `model` (`id`),
  CONSTRAINT `machine_ibfk_3` FOREIGN KEY (`operative_system_id`) REFERENCES `operative_system` (`id`),
  CONSTRAINT `machine_ibfk_4` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  CONSTRAINT `machine_ibfk_5` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`),
  CONSTRAINT `machine_ibfk_6` FOREIGN KEY (`model_id`) REFERENCES `model` (`id`),
  CONSTRAINT `machine_ibfk_7` FOREIGN KEY (`operative_system_id`) REFERENCES `operative_system` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `machine` (`id`, `serial_number`, `status_id`, `brand_id`, `model_id`, `operative_system_id`) VALUES
(1,	'111222333',	1,	1,	1,	1),
(2,	'222333444',	2,	3,	2,	7),
(3,	'444555666',	1,	1,	1,	1);

DROP TABLE IF EXISTS `model`;
CREATE TABLE `model` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `brand_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `brand_id` (`brand_id`),
  CONSTRAINT `model_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `model` (`id`, `name`, `brand_id`) VALUES
(1,	'Optiplex 640',	1),
(2,	'MacBookPro Air',	3),
(3,	'Latitude 5400',	1),
(4,	'Latitude 5500',	1);

DROP TABLE IF EXISTS `operative_system`;
CREATE TABLE `operative_system` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `operative_system` (`id`, `name`) VALUES
(1,	'Windows 10'),
(2,	'Windows 11'),
(3,	'Xunbunto 21'),
(4,	'Ms-Dos'),
(5,	'UnixWare'),
(6,	'Linux Debian 6'),
(7,	'Mac OS Catalina');

DROP TABLE IF EXISTS `software`;
CREATE TABLE `software` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `software` (`id`, `name`) VALUES
(1,	'Corel'),
(2,	'Adobe Acrobat Reader'),
(3,	'Office'),
(4,	'Firefox'),
(5,	'Chorme'),
(6,	'Win Zip'),
(7,	'VLC'),
(8,	'Putty'),
(9,	'Notepad ++'),
(10,	'Zoom'),
(11,	'Microsoft Teams'),
(12,	'Dropbox');

DROP TABLE IF EXISTS `soft_version`;
CREATE TABLE `soft_version` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `version` varchar(20) NOT NULL,
  `software_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `software_id` (`software_id`),
  CONSTRAINT `soft_version_ibfk_1` FOREIGN KEY (`software_id`) REFERENCES `software` (`id`),
  CONSTRAINT `soft_version_ibfk_2` FOREIGN KEY (`software_id`) REFERENCES `software` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `soft_version` (`id`, `version`, `software_id`) VALUES
(1,	'365',	3),
(2,	'2010',	3),
(3,	'75',	4),
(4,	'0.70',	8),
(5,	'2019',	3),
(6,	'19',	1),
(7,	'20',	1),
(8,	'21',	1),
(9,	'5.8.7',	10),
(10,	'1.4',	11),
(11,	'8.1.9.3',	9),
(12,	'25',	6),
(13,	'24',	6),
(14,	'3.0.12',	7),
(15,	'3.0.16',	7),
(16,	'96',	5),
(17,	'95',	5),
(18,	'131',	12),
(19,	'110',	12),
(20,	'2020',	2);

DROP TABLE IF EXISTS `status`;
CREATE TABLE `status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `status` (`id`, `name`) VALUES
(1,	'Activo'),
(2,	'Abatido');

DROP VIEW IF EXISTS `top_ten_software_instaled`;
CREATE TABLE `top_ten_software_instaled` (`id` int(11), `name` varchar(20), `SoftCount` bigint(21));


DROP TABLE IF EXISTS `top_ten_software_instaled`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `top_ten_software_instaled` AS select `soft`.`id` AS `id`,`soft`.`name` AS `name`,count(`gs`.`software_id`) AS `SoftCount` from ((`gestao_soft` `gs` join `software` `soft` on(`soft`.`id` = `gs`.`software_id`)) join `machine` `mac` on(`mac`.`id` = `gs`.`machine_id`)) where `mac`.`status_id` = 1 group by `gs`.`software_id` order by count(`gs`.`software_id`) desc limit 10;

-- 2021-12-31 15:28:14
