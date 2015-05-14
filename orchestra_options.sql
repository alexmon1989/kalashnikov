/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50616
Source Host           : localhost:3306
Source Database       : kalashnikov

Target Server Type    : MYSQL
Target Server Version : 50616
File Encoding         : 65001

Date: 2015-05-14 14:44:55
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `orchestra_options`
-- ----------------------------
DROP TABLE IF EXISTS `orchestra_options`;
CREATE TABLE `orchestra_options` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `value` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `orchestra_options_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of orchestra_options
-- ----------------------------
INSERT INTO `orchestra_options` VALUES ('1', 'contacts', 'a:3:{s:8:\"email_to\";s:29:\"kalashnikov@kalashnikovcom.ru\";s:8:\"latitude\";s:11:\"43.02427038\";s:9:\"longitude\";s:11:\"44.67237000\";}');
INSERT INTO `orchestra_options` VALUES ('2', 'footer', 'a:2:{s:5:\"about\";s:422:\"<p>Компания основана в 1992 году. На момент основания компании мы имели очень слабые ресурсы, как складские, так и офисные. Однако на протяжении последующих 18 лет руководитель компании прилагал максимальные усилия для ее развития.</p>\r\n\";s:8:\"contacts\";s:591:\"<p><i>Директор:</i><br />\r\nКАЛАШНИКОВ Виталий Александрович<br />\r\nтел: 8 (8672) 56-11-50, доп. 101<br />\r\n8 (8672) 44-08-39, 8 (928) 928-24-64<br />\r\nEmail: <a href=\"mailto:kalashnikov@kalashnikovcom.ru\">kalashnikov@kalashnikovcom.ru</a><br />\r\n<br />\r\n<i>Коммерческий директор:</i><br />\r\nЦЕБОЕВ Сосланбек Солтанбекович<br />\r\nтел: 8 (8672) 56-11-50, доп. 105<br />\r\n94-50-82, 8 (918) 824-50-82<br />\r\nEmail: <a href=\"mailto:tceboev_s@kalashnikovcom.ru\">tceboev_s@kalashnikovcom.ru</a></p>\r\n\";}');
