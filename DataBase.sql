-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2014 at 08:22 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `linux`
--
CREATE DATABASE IF NOT EXISTS `linux` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `linux`;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `cat_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `name`) VALUES
(1, 'معلومات النظام'),
(2, 'التعامل مع الملفات'),
(3, 'تعلم الأوامر'),
(4, 'البحث');

-- --------------------------------------------------------

--
-- Table structure for table `command`
--

CREATE TABLE IF NOT EXISTS `command` (
  `command_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `command_name` varchar(45) DEFAULT NULL,
  `command_discription` varchar(500) DEFAULT NULL,
  `command_form` varchar(500) DEFAULT NULL,
  `category_cat_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`command_id`),
  KEY `fk_command_category_idx` (`category_cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `command`
--

INSERT INTO `command` (`command_id`, `command_name`, `command_discription`, `command_form`, `category_cat_id`) VALUES
(6, 'date', 'عرض التاريخ والوقت الحالي', 'date', 1),
(7, 'cal', 'عرض التقويم', 'cal', 1),
(8, 'uptime', 'عرض الوقت الذي بقيه النظام شغالاً', 'uptime', 1),
(9, 'w', 'عرض من متصل الآن', 'w', 1),
(10, 'whoami', 'عرض المستخدم الذي تم تسجيل الدخول به', 'whoami', 1),
(11, 'ls', 'عرض جميع الملفات والأدلة في الدليل الحالي أو دليل معين', 'ls [option] dir', 2),
(12, 'cd', 'تغيير الدليل الحالي', 'cd dir', 2),
(13, 'rm', 'حذف الملفات والأدلة', 'rm [dir|file]', 2),
(14, 'cp', 'نسخ الملفات والأدلة', 'cp file1 file2', 2),
(15, 'mv', 'نقل الملفات والأدلة', 'mv [file|dir] destination', 2),
(16, 'apropos', 'البحث عن أمر معين بوصفه', 'apropos command', 3),
(17, 'man', 'عرض صفحة تعليمات الأوامر', 'man command', 3),
(18, 'which', 'عرض المسار الكامل لأمر معين', 'which command', 3),
(19, 'time', 'عرض زمن التنفيذ لأمر معين', 'time command', 3),
(20, 'whereis', 'عرض جميع الأماكن المحتملة للملف التنفيذي للأمر', 'whereis command', 3),
(26, 'grep', 'البحث عن نص أو نمط داخل الملفات', 'grep keyword file', 4),
(27, 'locate', 'البحث عن الملفات', 'locate filename', 4),
(28, 'find', 'البحث عن الملفات', 'find -name filename', 4),
(29, 'updatedb', 'تحديث قاعدة بيانات بجميع أسماء الملفات والأدلة بدءاً من دليل الجذر', 'updatedb', 4);

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE IF NOT EXISTS `options` (
  `option_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `option` varchar(255) DEFAULT NULL,
  `option_disc` varchar(500) DEFAULT NULL,
  `command_command_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`option_id`),
  KEY `fk_options_command1_idx` (`command_command_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `uses`
--

CREATE TABLE IF NOT EXISTS `uses` (
  `uses_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `command` varchar(255) DEFAULT NULL,
  `command_discription` varchar(500) DEFAULT NULL,
  `command_command_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`uses_id`),
  KEY `fk_uses_command1_idx` (`command_command_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `command`
--
ALTER TABLE `command`
  ADD CONSTRAINT `fk_command_category` FOREIGN KEY (`category_cat_id`) REFERENCES `category` (`cat_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `options`
--
ALTER TABLE `options`
  ADD CONSTRAINT `fk_options_command1` FOREIGN KEY (`command_command_id`) REFERENCES `command` (`command_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `uses`
--
ALTER TABLE `uses`
  ADD CONSTRAINT `fk_uses_command1` FOREIGN KEY (`command_command_id`) REFERENCES `command` (`command_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
