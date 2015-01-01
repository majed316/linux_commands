-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2014 at 01:39 AM
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

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `cat_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `image` tinytext NOT NULL,
  `cat_color` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `name`, `image`, `cat_color`) VALUES
(1, 'معلومات النظام', 'systeminfo.png', 6671554),
(2, 'التعامل مع الملفات', 'files.png', 13135472),
(3, 'تعلم الأوامر', 'commands.png', 6671501),
(4, 'البحث', 'search.png', 8349132),
(5, 'التعامل مع القرص الصلب ', 'harddisk.png', 4084131),
(6, 'الشبكات', 'networks.png', 1393006);

-- --------------------------------------------------------

--
-- Table structure for table `command`
--

DROP TABLE IF EXISTS `command`;
CREATE TABLE IF NOT EXISTS `command` (
  `command_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `command_name` varchar(45) DEFAULT NULL,
  `command_description` varchar(500) DEFAULT NULL,
  `command_form` varchar(500) DEFAULT NULL,
  `category_cat_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`command_id`),
  KEY `fk_command_category_idx` (`category_cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=54 ;

--
-- Dumping data for table `command`
--

INSERT INTO `command` (`command_id`, `command_name`, `command_description`, `command_form`, `category_cat_id`) VALUES
(6, 'date', 'عرض التاريخ والوقت الحالي', 'date', 1),
(7, 'cal', 'عرض التقويم', 'cal', 1),
(8, 'uptime', 'عرض الوقت الذي بقيه النظام شغالاً', 'uptime', 1),
(9, 'w', 'عرض من متصل الآن', 'w', 1),
(10, 'whoami', 'عرض المستخدم الذي تم تسجيل الدخول به', 'whoami', 1),
(11, 'ls', 'عرض جميع الملفات والأدلة في الدليل الحالي أو دليل معين', 'ls [option] dir', 2),
(12, 'cd', 'تغيير الدليل الحالي', 'cd dir', 2),
(13, 'rm', 'حذف الملفات والأدلة', 'rm [dir|file]', 2),
(14, 'cp', 'نسخ الملفات والأدلة', 'cp file1 file2', 2),
(16, 'apropos', 'البحث عن أمر معين بوصفه', 'apropos command', 3),
(17, 'man', 'عرض صفحة تعليمات الأوامر', 'man command', 3),
(18, 'which', 'عرض المسار الكامل لأمر معين', 'which command', 3),
(26, 'grep', 'البحث عن نص أو نمط داخل الملفات', 'grep keyword file', 4),
(27, 'locate', 'البحث عن الملفات', 'locate filename', 4),
(29, 'updatedb', 'تحديث قاعدة بيانات بجميع أسماء الملفات والأدلة بدءاً من دليل الجذر', 'updatedb', 4),
(30, 'fdisk ', 'عرض أقسام القرص الصلب ', 'fdisk -l ', 5),
(31, 'ifconfig', 'عرض معلومات بطاقة الشبكات وعنوان الشبكة', 'ifconfig', 6),
(32, 'mv', 'نقل الملفات والأدلة', 'mv [file|dir] destination', 2),
(33, 'pwd', 'عرض مسار الدليل المتواجد فيه حالياً', 'pwd', 2),
(34, 'mkdir', 'إنشاء مجلد جديد', 'mkdir [dirname]', 2),
(35, 'rmdir', 'حذف مجلد', 'rmdir [dirname]', 2),
(37, 'ngix', 'أمر يستخدم لمراقبة الشبكة', 'ngix netCard', 1),
(39, 'whatis', 'عرض ملخص من سطر واحد يشرح وظيفة الأمر', 'whatis command', 3),
(40, 'info', 'عرض معلومات تفصيلية عن أمر معين', 'info command', 3),
(41, 'whereis', 'تحديد مكان الملف التنفيذي والكود المصدري وملف التعليمات التابعة لأمر معين', 'whereis command', 3),
(42, 'ps', 'عرض كافة العمليات والبرامج التي تعمل في الجهاز', 'ps', 1),
(43, 'kill', 'إنهاء أي عملية عن طريق رقم التعريف الخاص بها', 'kill pid', 1),
(44, 'top', 'عرض العمليات التي تعمل على الجهاز بشكل وتحديثها بشكل آني', 'top', 1),
(45, 'find', 'البحث عن الملفات والمجلدات', 'find keyword', 4),
(46, 'iwconfig', 'عرض معلومات بطاقات الشبكة اللاسلكية', 'iwconfig', 6),
(47, 'ping', 'للتأكد من اتصال طرف بعيد بالشبكة كموقع أو عنوان ', 'ping www.website.com', 6),
(48, 'ifup', 'يستخدم للتنسيط بطاقة الشبكة', 'ifup eth0', 6),
(49, 'ifdown', 'يستخدم لتعطيل بطاقة الشبكة', 'ifdown eth0', 6),
(50, 'df', 'عرض أحجام أقسام القرص الصلب', 'df', 5),
(51, 'mount', 'توصيل وحدة تخزين خارجية بالنظام', 'mount device dir', 5),
(52, 'du', 'عرض حجم الملفات والمجلدات الموجودة في مجلد معين', 'du dir', 5),
(53, 'dd', 'لعمل استنساخ من قرص إلى قرص آخر', 'dd disk disk', 5);

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

DROP TABLE IF EXISTS `options`;
CREATE TABLE IF NOT EXISTS `options` (
  `option_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `option` varchar(255) DEFAULT NULL,
  `option_desc` varchar(500) DEFAULT NULL,
  `command_command_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`option_id`),
  KEY `fk_options_command1_idx` (`command_command_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`option_id`, `option`, `option_desc`, `command_command_id`) VALUES
(1, 'date -r [file]', 'عرض تاريخ ووقت آخر تعديل للملف', 6),
(2, 'date -d "12/2/2014"', 'إعطاء التاريخ على شكل نص، وإعادة التاريخ بتنسيق تاريخي', 6),
(3, 'date -d "next mon"', 'معرفة التاريخ النسبي، في هذه الحالة نريد معرفة التاريخ لآخر يوم إثنين', 6),
(4, 'date -s "Sun May 20 21:00:00 AST 2014"', 'إعداد التاريخ والوقت في النظام', 6),
(5, 'date -u', 'عرض الوقت والتاريخ العالمي، جرينتش', 6),
(6, 'date +%a', 'إظهار اسم اليوم بشكل مختصر، مثل Thu', 6),
(7, 'date +%A', 'عرض اسم اليوم بشكل كامل، Thursday', 6),
(8, 'date +%b', 'عرض اسم الشهر بشكل مختصر، مثل Feb', 6),
(9, 'date +%B', 'عرض اسم الشهر بشكل كامل، مثل February', 6),
(10, 'date +%d', 'عرض رقم اليوم في الشهر', 6),
(11, 'date +%D', 'عرض التاريخ فقط بالشكل المختصر، مثل 02/07/13', 6),
(12, 'date +%F', 'عرض التاريخ فقط مع إظهار السنة بالكامل، مثل 07-02-2013', 6),
(13, 'date +%H', 'عرض الوقت بنظام 24 ساعة', 6),
(14, 'date +%I', 'عرض الوقت بنظام 12 ساعة', 6),
(15, 'date +%j', 'عرض رقم اليوم في السنة', 6),
(16, 'date +%m', 'عرض رقم الشهر', 6),
(17, 'date +%M', 'عرض الدقائق', 6),
(18, 'date +%S', 'عرض الثواني', 6),
(19, 'date +%N', 'عرض النانوثانية', 6),
(20, 'date +%T', 'عرض الوقت مفصول بأعمدة، مثل 23:44:17، بنظام 24 ساعة', 6),
(21, 'date +%u', 'عرض رقم اليوم في الاسبوع', 6),
(22, 'date +%U', 'عرض رقم الاسبوع في السنة', 6),
(23, 'date +%Y', 'عرض السنة بالشكل الكامل، مثل 2014', 6),
(24, 'date +%Z', 'عرض المنطقة الزمنية', 6);

-- --------------------------------------------------------

--
-- Table structure for table `uses`
--

DROP TABLE IF EXISTS `uses`;
CREATE TABLE IF NOT EXISTS `uses` (
  `uses_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `command` varchar(255) DEFAULT NULL,
  `command_description` varchar(500) DEFAULT NULL,
  `command_command_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`uses_id`),
  KEY `fk_uses_command1_idx` (`command_command_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `uses`
--

INSERT INTO `uses` (`uses_id`, `command`, `command_description`, `command_command_id`) VALUES
(1, 'date -d "[date]" +%A', 'عرض اسم اليوم في تاريخ معين، فقط استبدل [date] بالتاريخ مثل، date -d "22/12/2014" +%A', 6),
(2, 'date -d "[keyword]" +%D', 'لمعرفة التاريخ في يوم معين، عليك استبدال keyword بكلمة تدل على التاريخ النسبي، كالأمثلة التالية:\r\n"next mon":	 الإثنين القادم\r\n"last mon":	 الاثنين السابق\r\n"last week": 	الاسبوع الفائت\r\n"last year":	السنة الفائتة\r\n"1 day ago":	اليوم المنصرم\r\n"yesterday":	أمس\r\n"1 month ago":	الشهر الماضي\r\n"1 year ago":	السنة الماضية\r\n"next year":	السنة القادمة\r\n"tomorrow":	غداً', 6),
(3, 'touch filename-`date +%F`', 'إنشاء ملف نصي مع إلحاق تاريخ  إنشاء الملف باسم الملف', 6);

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
