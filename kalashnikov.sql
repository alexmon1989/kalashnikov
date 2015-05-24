/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50624
Source Host           : localhost:3306
Source Database       : kalashnikov

Target Server Type    : MYSQL
Target Server Version : 50624
File Encoding         : 65001

Date: 2015-05-23 17:56:26
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for articles
-- ----------------------------
DROP TABLE IF EXISTS `articles`;
CREATE TABLE `articles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `full_text` text COLLATE utf8_unicode_ci,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `articles_type_unique` (`type`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of articles
-- ----------------------------
INSERT INTO `articles` VALUES ('1', 'Миссии компании', '<ul class=\"list-unstyled\">\r\n                    <li><i class=\"fa fa-check color-green\"></i> Расширение ассортиментного ряда компании;</li>\r\n                    <li><i class=\"fa fa-check color-green\"></i> Полный охват всех торговых точек РСО-Алания;</li>\r\n                    <li><i class=\"fa fa-check color-green\"></i> Не останавливаться на достигнутом.</li>\r\n                </ul>', 'service_left', '2015-05-23 16:52:06', '2015-05-23 16:52:06');
INSERT INTO `articles` VALUES ('2', 'Принципы работы', '<ul class=\"list-unstyled\">\r\n                    <li><i class=\"fa fa-check color-green\"></i> Стабильность;</li>\r\n                    <li><i class=\"fa fa-check color-green\"></i> Надёжность;</li>\r\n                    <li><i class=\"fa fa-check color-green\"></i> Качество;</li>\r\n                    <li><i class=\"fa fa-check color-green\"></i> Честность;</li>\r\n                    <li><i class=\"fa fa-check color-green\"></i> Заинтересованность во всех клиентах;</li>\r\n                    <li><i class=\"fa fa-check color-green\"></i> Уважение к каждому клиенту.</li>\r\n                </ul>', 'service_middle', '2015-05-23 16:52:07', '2015-05-23 16:52:07');
INSERT INTO `articles` VALUES ('3', 'Текущие вакансии', '<p>На данный момент открыта вакансия:</p>\r\n                <ul class=\"list-unstyled\">\r\n                    <li><i class=\"fa fa-check color-green\"></i> Экономист.</li>\r\n                </ul>', 'service_right', '2015-05-23 16:52:07', '2015-05-23 16:52:07');
INSERT INTO `articles` VALUES ('4', 'Обращение директора', '<p>Praesent aliquet vitae massa nec porta. Nulla facilisi. Pellentesque vitae ipsum purus. Nullam aliquam imperdiet quam id maximus. Phasellus porttitor nulla nec mattis lobortis. Nullam nec metus congue, interdum leo et, pretium diam. Aliquam porta feugiat tincidunt. Praesent pharetra massa et turpis lacinia volutpat. Aliquam bibendum orci id justo ornare fringilla. In at eros id nisi pulvinar placerat. Phasellus pellentesque massa vitae justo volutpat, et fermentum nisi gravida. </p>\r\n                <p>Praesent aliquet vitae massa nec porta. Nulla facilisi. Pellentesque vitae ipsum purus. Nullam aliquam imperdiet quam id maximus. Phasellus porttitor nulla nec mattis lobortis. Nullam nec metus congue, interdum leo et, pretium diam.</p>', 'main_article', '2015-05-23 16:52:07', '2015-05-23 16:52:07');
INSERT INTO `articles` VALUES ('5', null, 'Компания основана в 1992 году. На момент основания компании мы имели очень слабые ресурсы, как складские, так и офисные. Однако на протяжении последующих 18 лет руководитель компании прилагал максимальные усилия для ее развития.', 'footer_about', '2015-05-23 16:52:07', '2015-05-23 16:52:07');
INSERT INTO `articles` VALUES ('6', null, '<i>Директор:</i> <br>\r\n                        КАЛАШНИКОВ Виталий Александрович <br>\r\n                        тел: 8 (8672) 56-11-50, доп. 101 <br>\r\n                        8 (8672) 44-08-39, 8 (928) 928-24-64 <br>\r\n                        Email: <a class=\"\" href=\"mailto:kalashnikov@kalashnikovcom.ru\">kalashnikov@kalashnikovcom.ru</a>\r\n\r\n                        <br><br>\r\n                        <i>Коммерческий директор:</i> <br>\r\n                        ЦЕБОЕВ Сосланбек Солтанбекович <br>\r\n                        тел: 8 (8672) 56-11-50, доп. 105 <br>\r\n                        94-50-82, 8 (918) 824-50-82 <br>\r\n                        Email: <a class=\"\" href=\"mailto:tceboev_s@kalashnikovcom.ru\">tceboev_s@kalashnikovcom.ru</a>', 'footer_contacts', '2015-05-23 16:52:07', '2015-05-23 16:52:07');
INSERT INTO `articles` VALUES ('7', 'О компании', '<p>Praesent aliquet vitae massa nec porta. Nulla facilisi. Pellentesque vitae ipsum purus. Nullam aliquam imperdiet quam id maximus. Phasellus porttitor nulla nec mattis lobortis. Nullam nec metus congue, interdum leo et, pretium diam. Aliquam porta feugiat tincidunt. Praesent pharetra massa et turpis lacinia volutpat. Aliquam bibendum orci id justo ornare fringilla. In at eros id nisi pulvinar placerat. Phasellus pellentesque massa vitae justo volutpat, et fermentum nisi gravida. </p>\r\n                <p>Praesent aliquet vitae massa nec porta. Nulla facilisi. Pellentesque vitae ipsum purus. Nullam aliquam imperdiet quam id maximus. Phasellus porttitor nulla nec mattis lobortis. Nullam nec metus congue, interdum leo et, pretium diam.</p>', 'about', '2015-05-23 16:52:07', '2015-05-23 16:52:07');
INSERT INTO `articles` VALUES ('8', 'Контакты', '<p>Praesent aliquet vitae massa nec porta. Nulla facilisi. Pellentesque vitae ipsum purus. Nullam aliquam imperdiet quam id maximus. Phasellus porttitor nulla nec mattis lobortis. Nullam nec metus congue, interdum leo et, pretium diam. Aliquam porta feugiat tincidunt. Praesent pharetra massa et turpis lacinia volutpat. Aliquam bibendum orci id justo ornare fringilla. In at eros id nisi pulvinar placerat. Phasellus pellentesque massa vitae justo volutpat, et fermentum nisi gravida. </p>\r\n                <p>Praesent aliquet vitae massa nec porta. Nulla facilisi. Pellentesque vitae ipsum purus. Nullam aliquam imperdiet quam id maximus. Phasellus porttitor nulla nec mattis lobortis. Nullam nec metus congue, interdum leo et, pretium diam.</p>', 'contacts_article', '2015-05-23 16:52:07', '2015-05-23 16:52:07');
INSERT INTO `articles` VALUES ('9', null, '<ul class=\"list-unstyled who margin-bottom-30\">\r\n                    <li><a href=\"#\"><i class=\"fa fa-home\"></i>5B Streat, City 50987 New Town US</a></li>\r\n                    <li><a href=\"#\"><i class=\"fa fa-envelope\"></i>info@example.com</a></li>\r\n                    <li><a href=\"#\"><i class=\"fa fa-phone\"></i>1(222) 5x86 x97x</a></li>\r\n                    <li><a href=\"#\"><i class=\"fa fa-globe\"></i>http://www.example.com</a></li>\r\n                </ul>', 'contacts_widget', '2015-05-23 16:52:07', '2015-05-23 16:52:07');

-- ----------------------------
-- Table structure for clients
-- ----------------------------
DROP TABLE IF EXISTS `clients`;
CREATE TABLE `clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of clients
-- ----------------------------
INSERT INTO `clients` VALUES ('1', 'Магнит', '1.jpg', '1', '2015-05-23 16:52:09', '2015-05-23 16:52:09');
INSERT INTO `clients` VALUES ('2', 'Забава', '2.jpg', '1', '2015-05-23 16:52:09', '2015-05-23 16:52:09');
INSERT INTO `clients` VALUES ('3', 'Стэйтон', '3.jpg', '1', '2015-05-23 16:52:09', '2015-05-23 16:52:09');
INSERT INTO `clients` VALUES ('4', 'Лента', '4.jpg', '1', '2015-05-23 16:52:10', '2015-05-23 16:52:10');
INSERT INTO `clients` VALUES ('5', 'Ашан', '5.jpg', '1', '2015-05-23 16:52:10', '2015-05-23 16:52:10');
INSERT INTO `clients` VALUES ('6', 'Метро', '6.jpg', '1', '2015-05-23 16:52:10', '2015-05-23 16:52:10');
INSERT INTO `clients` VALUES ('7', 'О\'кей', '7.jpg', '1', '2015-05-23 16:52:11', '2015-05-23 16:52:11');
INSERT INTO `clients` VALUES ('8', 'Пятёрочка', '8.jpg', '1', '2015-05-23 16:52:11', '2015-05-23 16:52:11');

-- ----------------------------
-- Table structure for gallery_categories
-- ----------------------------
DROP TABLE IF EXISTS `gallery_categories`;
CREATE TABLE `gallery_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of gallery_categories
-- ----------------------------
INSERT INTO `gallery_categories` VALUES ('1', 'Фотоотчёт 11.05.2015', 'Фотоотчёт 11.05.2015', '2015-05-23 16:52:08', '2015-05-23 16:52:08');
INSERT INTO `gallery_categories` VALUES ('2', 'Фотоотчёт 12.05.2015', 'Фотоотчёт 12.05.2015', '2015-05-23 16:52:08', '2015-05-23 16:52:08');

-- ----------------------------
-- Table structure for gallery_images
-- ----------------------------
DROP TABLE IF EXISTS `gallery_images`;
CREATE TABLE `gallery_images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(10) unsigned NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_on_main` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `gallery_images_category_id_foreign` (`category_id`),
  CONSTRAINT `gallery_images_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `gallery_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of gallery_images
-- ----------------------------
INSERT INTO `gallery_images` VALUES ('1', '1', 'Фотоотчёт 11.05.2015', '1.jpg', '1', '2015-05-23 16:52:08', '2015-05-23 16:52:08');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('2013_04_11_233631_orchestra_memory_create_options_table', '1');
INSERT INTO `migrations` VALUES ('2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('2015_05_04_184548_create_news_table', '1');
INSERT INTO `migrations` VALUES ('2015_05_10_184231_create_articles_table', '1');
INSERT INTO `migrations` VALUES ('2015_05_11_170556_create_gallery_categories_table', '1');
INSERT INTO `migrations` VALUES ('2015_05_11_170642_create_gallery_images_table', '1');
INSERT INTO `migrations` VALUES ('2015_05_12_154933_create_sliders_table', '1');
INSERT INTO `migrations` VALUES ('2015_05_13_100357_create_clients_table', '1');
INSERT INTO `migrations` VALUES ('2015_05_13_142233_create_votes_table', '1');
INSERT INTO `migrations` VALUES ('2015_05_15_134215_create_product_categories_table', '1');
INSERT INTO `migrations` VALUES ('2015_05_18_132414_create_product_providers_table', '1');
INSERT INTO `migrations` VALUES ('2015_05_18_132428_create_product_manufacturers_table', '1');
INSERT INTO `migrations` VALUES ('2015_05_18_170213_create_products_table', '1');
INSERT INTO `migrations` VALUES ('2015_05_18_223026_create_product_images_table', '1');

-- ----------------------------
-- Table structure for news
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `full_text` text COLLATE utf8_unicode_ci,
  `preview_text_small` text COLLATE utf8_unicode_ci,
  `preview_text_mid` text COLLATE utf8_unicode_ci,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_on_main` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of news
-- ----------------------------
INSERT INTO `news` VALUES ('1', 'Мы обновили наш сайт', 'Завершились работы по редизайну сайта ИП Калашников.', 'Завершились работы по редизайну сайта ИП Калашников.', 'Завершились работы по редизайну сайта ИП Калашников.', 'news-1.jpg', '1', '2015-05-23 16:52:04', '2015-05-23 16:52:04');
INSERT INTO `news` VALUES ('2', 'Совместная промо-акция с магазинами «Магнит»', 'Получите скидку на молочную продукцию в магазинах сети «Магнит», предъявив карту покупателя ИП Калашников.', 'Получите скидку на молочную продукцию в магазинах сети «Магнит».', 'Получите скидку на молочную продукцию в магазинах сети «Магнит».', 'news-2.jpg', '1', '2015-05-23 16:52:04', '2015-05-23 16:52:04');
INSERT INTO `news` VALUES ('3', 'Открыта вакансия экономиста', 'Компании ИП Калашников требуется опытный экономист. Присылайте свои резюме.', 'Компании ИП Калашников требуется опытный экономист.', 'Компании ИП Калашников требуется опытный экономист.', 'news-3.jpg', '1', '2015-05-23 16:52:04', '2015-05-23 16:52:04');
INSERT INTO `news` VALUES ('4', 'В ассортименте компании появилась паста фирмы Bellisimo', 'ИП Калашников эксклюзивно поставляет итальянские макароны высочайшего качества от компании Bellisimo.', 'ИП Калашников эксклюзивно поставляет макароны Bellisimo.', 'ИП Калашников эксклюзивно поставляет макароны Bellisimo.', 'news-4.jpg', '1', '2015-05-23 16:52:05', '2015-05-23 16:52:05');

-- ----------------------------
-- Table structure for orchestra_options
-- ----------------------------
DROP TABLE IF EXISTS `orchestra_options`;
CREATE TABLE `orchestra_options` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `value` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `orchestra_options_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of orchestra_options
-- ----------------------------

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `manufacturer_id` int(10) unsigned NOT NULL,
  `provider_id` int(10) unsigned NOT NULL,
  `packing` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `weight` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `products_category_id_foreign` (`category_id`),
  KEY `products_manufacturer_id_foreign` (`manufacturer_id`),
  KEY `products_provider_id_foreign` (`provider_id`),
  CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `product_categories` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `products_manufacturer_id_foreign` FOREIGN KEY (`manufacturer_id`) REFERENCES `product_manufacturers` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `products_provider_id_foreign` FOREIGN KEY (`provider_id`) REFERENCES `product_providers` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES ('1', 'Три медведя', 'Мороженое \"Три медведя\". Очень вкусное.', '5', '1', '1', 'Обычная упаковка', '1 кг', '1', '2015-05-23 16:52:15', '2015-05-23 16:52:15');
INSERT INTO `products` VALUES ('2', 'Три медведя 2', 'Мороженое \"Три медведя 2\". Очень вкусное.', '5', '1', '1', 'Обычная упаковка', '1 кг', '1', '2015-05-23 16:52:15', '2015-05-23 16:52:15');

-- ----------------------------
-- Table structure for product_categories
-- ----------------------------
DROP TABLE IF EXISTS `product_categories`;
CREATE TABLE `product_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `parent_id` int(10) unsigned DEFAULT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `product_categories_parent_id_foreign` (`parent_id`),
  CONSTRAINT `product_categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `product_categories` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of product_categories
-- ----------------------------
INSERT INTO `product_categories` VALUES ('1', 'Мороженое', 'o0cJXohgMd.jpg', 'Мороженое', null, '1', '2015-05-23 16:52:12', '2015-05-23 16:52:12');
INSERT INTO `product_categories` VALUES ('2', 'Макароны', 'gNcXpdyEFp.jpg', 'Макароны', null, '1', '2015-05-23 16:52:12', '2015-05-23 16:52:12');
INSERT INTO `product_categories` VALUES ('3', 'Чай', 'b2fbr4B4bI.jpg', 'Чай', null, '1', '2015-05-23 16:52:13', '2015-05-23 16:52:13');
INSERT INTO `product_categories` VALUES ('4', 'Консервы', 'nCTVgpUSJI.jpg', 'Консервы', null, '1', '2015-05-23 16:52:13', '2015-05-23 16:52:13');
INSERT INTO `product_categories` VALUES ('5', 'Пломбир', 'no.jpg', 'Пломбир', '1', '1', '2015-05-23 16:52:13', '2015-05-23 16:52:13');

-- ----------------------------
-- Table structure for product_images
-- ----------------------------
DROP TABLE IF EXISTS `product_images`;
CREATE TABLE `product_images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `product_images_product_id_foreign` (`product_id`),
  CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of product_images
-- ----------------------------
INSERT INTO `product_images` VALUES ('1', '1.jpg', '1', '2015-05-23 16:52:16', '2015-05-23 16:52:16');
INSERT INTO `product_images` VALUES ('2', '2.jpg', '2', '2015-05-23 16:52:16', '2015-05-23 16:52:16');

-- ----------------------------
-- Table structure for product_manufacturers
-- ----------------------------
DROP TABLE IF EXISTS `product_manufacturers`;
CREATE TABLE `product_manufacturers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of product_manufacturers
-- ----------------------------
INSERT INTO `product_manufacturers` VALUES ('1', 'Производитель 1', '2015-05-23 16:52:14', '2015-05-23 16:52:14');
INSERT INTO `product_manufacturers` VALUES ('2', 'Производитель 2', '2015-05-23 16:52:14', '2015-05-23 16:52:14');
INSERT INTO `product_manufacturers` VALUES ('3', 'Производитель 3', '2015-05-23 16:52:15', '2015-05-23 16:52:15');

-- ----------------------------
-- Table structure for product_providers
-- ----------------------------
DROP TABLE IF EXISTS `product_providers`;
CREATE TABLE `product_providers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of product_providers
-- ----------------------------
INSERT INTO `product_providers` VALUES ('1', 'Поставщик 1', '2015-05-23 16:52:13', '2015-05-23 16:52:13');
INSERT INTO `product_providers` VALUES ('2', 'Поставщик 2', '2015-05-23 16:52:14', '2015-05-23 16:52:14');
INSERT INTO `product_providers` VALUES ('3', 'Поставщик 3', '2015-05-23 16:52:14', '2015-05-23 16:52:14');

-- ----------------------------
-- Table structure for sliders
-- ----------------------------
DROP TABLE IF EXISTS `sliders`;
CREATE TABLE `sliders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description_1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description_2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `btn_text` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order` int(11) NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of sliders
-- ----------------------------
INSERT INTO `sliders` VALUES ('1', 'Cвяжитесь с нами любым удобным способом', 'Звоните, пишите,', 'мы быстро ответим на любой вопрос', '1.jpg', 'http://localhost/kalashnikov/public/contacts', 'Узнать подробнее', '1', '1', '2015-05-23 16:52:08', '2015-05-23 16:52:08');
INSERT INTO `sliders` VALUES ('2', 'Скидки на макароны и мучную продукцию', 'Только в мае! Специальные 20% скидки', 'на макароны ведущих производителей', '2.jpg', 'http://localhost/kalashnikov/public/news/show/4', 'Узнать подробнее', '2', '1', '2015-05-23 16:52:08', '2015-05-23 16:52:08');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'admin', 'admin@admin.com', '$2y$10$2sBirAgU5spVtMXS.gjGueu6jGYgnX8Fb6O4oeaq41XjzQo7C/ogK', null, '2015-05-23 16:52:02', '2015-05-23 16:52:02');

-- ----------------------------
-- Table structure for votes
-- ----------------------------
DROP TABLE IF EXISTS `votes`;
CREATE TABLE `votes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `question` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `answers_json` text COLLATE utf8_unicode_ci NOT NULL,
  `hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_on_main` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of votes
-- ----------------------------
INSERT INTO `votes` VALUES ('1', 'Вопрос 1', '[{\"answer\":\"\\u041e\\u0442\\u0432\\u0435\\u0442 1\",\"count\":5},{\"answer\":\"\\u041e\\u0442\\u0432\\u0435\\u0442 2\",\"count\":10}]', '$2y$10$UKEZTAXSna.DUt/kGLvup.0oXj624d9WaNrfhYaCc1Qudv0Kj3FuK', '1', '2015-05-23 16:52:12', '2015-05-23 16:52:12');
