# ************************************************************
# Sequel Pro SQL dump
# Version 4529
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.6.38)
# Database: hermo
# Generation Time: 2019-04-08 00:51:04 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table categories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `cat_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;

INSERT INTO `categories` (`cat_id`, `name`, `desc`, `img`, `status`, `created_at`, `updated_at`)
VALUES
	(1,'Skin','','','1',NULL,NULL),
	(2,'Make Up','','','',NULL,NULL),
	(3,'Bath & Body','','','',NULL,NULL),
	(4,'Hair','','','',NULL,NULL);

/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table customers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `customers`;

CREATE TABLE `customers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ship_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;

INSERT INTO `customers` (`id`, `name`, `tel`, `email`, `password`, `ship_address`, `billing_address`, `created_at`, `updated_at`)
VALUES
	(1,'Amy','0123456789','amy@abc.com','098f6bcd4621d373cade4e832627b4f6','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi dapibus maximus sem non maximus.','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi dapibus maximus sem non maximus.',NULL,NULL),
	(2,'Luke Skywalker','0123456789','luke@abc.com','098f6bcd4621d373cade4e832627b4f6','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi dapibus maximus sem non maximus.','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi dapibus maximus sem non maximus.',NULL,NULL),
	(3,'Chuck','0123456789','chuck@abc.com','098f6bcd4621d373cade4e832627b4f6','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi dapibus maximus sem non maximus.','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi dapibus maximus sem non maximus.',NULL,NULL);

/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES
	(1,'2019_04_01_072327_create_categories',1),
	(2,'2019_04_01_072344_create_customers',1),
	(3,'2019_04_01_072407_create_vouchers',1),
	(4,'2019_04_01_072419_create_products',1),
	(5,'2019_04_01_072425_create_product_images',1),
	(6,'2019_04_01_072434_create_orders',1),
	(7,'2019_04_01_072444_create_order_details',1);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table order_details
# ------------------------------------------------------------

DROP TABLE IF EXISTS `order_details`;

CREATE TABLE `order_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `order_details` WRITE;
/*!40000 ALTER TABLE `order_details` DISABLE KEYS */;

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `created_at`, `updated_at`)
VALUES
	(1,1,1,'2019-04-01 00:00:01','2019-04-01 00:00:01'),
	(2,2,2,'2019-04-01 00:00:01','2019-04-01 00:00:01'),
	(3,3,3,'2019-04-01 00:00:01','2019-04-01 00:00:01'),
	(4,1,1,'2019-04-01 00:00:01','2019-04-01 00:00:01'),
	(5,3,3,'2019-04-01 00:00:01','2019-04-01 00:00:01'),
	(6,2,2,'2019-04-01 00:00:01','2019-04-01 00:00:01');

/*!40000 ALTER TABLE `order_details` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table orders
# ------------------------------------------------------------

DROP TABLE IF EXISTS `orders`;

CREATE TABLE `orders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `payment_status` enum('Failed','Paid','Cancelled','Pending') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_amount` double NOT NULL,
  `paid_amount` double NOT NULL,
  `voucher_used` int(11) NOT NULL,
  `cust_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;

INSERT INTO `orders` (`id`, `payment_status`, `total_amount`, `paid_amount`, `voucher_used`, `cust_id`, `created_at`, `updated_at`)
VALUES
	(1,'Pending',200,0,1,1,'2019-04-01 00:00:01','2019-04-01 00:00:01'),
	(2,'Paid',200,0,0,2,'2019-04-02 00:00:01','2019-04-02 00:00:01'),
	(3,'Paid',200,0,0,2,'2019-04-03 00:00:01','2019-04-03 00:00:01');

/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table product_images
# ------------------------------------------------------------

DROP TABLE IF EXISTS `product_images`;

CREATE TABLE `product_images` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `img_path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `product_images` WRITE;
/*!40000 ALTER TABLE `product_images` DISABLE KEYS */;

INSERT INTO `product_images` (`id`, `img_path`, `prod_id`, `created_at`, `updated_at`)
VALUES
	(1,'Path 1',1,NULL,NULL),
	(2,'Path 2',2,NULL,NULL),
	(3,'Path 3',3,NULL,NULL);

/*!40000 ALTER TABLE `product_images` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table products
# ------------------------------------------------------------

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `prod_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `sku_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` bigint(11) DEFAULT NULL,
  `sell_price` double NOT NULL,
  `cost_price` double NOT NULL,
  `tray_loc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `on_sale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`prod_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;

INSERT INTO `products` (`prod_id`, `sku_code`, `name`, `desc`, `quantity`, `sell_price`, `cost_price`, `tray_loc`, `on_sale`, `created_at`, `updated_at`)
VALUES
	(1,'001','Product A','',100,100,80,'','',NULL,NULL),
	(2,'002','Product B','',100,100,80,'','',NULL,NULL),
	(3,'003','Product C','',100,100,80,'','',NULL,NULL);

/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table vouchers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `vouchers`;

CREATE TABLE `vouchers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `disc_value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `disc_type` enum('Amount','Percentage') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `min_purchase` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `vouchers` WRITE;
/*!40000 ALTER TABLE `vouchers` DISABLE KEYS */;

INSERT INTO `vouchers` (`id`, `code`, `start_date`, `end_date`, `disc_value`, `disc_type`, `min_purchase`, `created_at`, `updated_at`)
VALUES
	(1,'20FORME','2019-04-01','2019-04-30','20','Percentage',100,NULL,NULL);

/*!40000 ALTER TABLE `vouchers` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
