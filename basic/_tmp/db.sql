-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.22-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for news
CREATE DATABASE IF NOT EXISTS `news` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `news`;

-- Dumping structure for table news.category
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(254) NOT NULL DEFAULT '0',
  `description` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table news.category: ~2 rows (approximately)
DELETE FROM `category`;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` (`id`, `title`, `description`) VALUES
	(5, 'Dogs', 'About dogs description'),
	(6, 'Cats', 'About cats');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;

-- Dumping structure for table news.news
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(254) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `date` timestamp NULL DEFAULT current_timestamp(),
  `category_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `FK_news_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table news.news: ~12 rows (approximately)
DELETE FROM `news`;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` (`id`, `title`, `description`, `date`, `category_id`) VALUES
	(6, 'About Cats', '<p>Cats description</p>\r\n', '2022-02-11 01:00:00', 6),
	(7, 'Dogs News', '<p>About Dogs Description</p>\r\n', '2022-02-12 01:00:00', 5),
	(8, 'Cats2', '<p>Catssasdasdsa as<strong><em>dsa</em></strong><s>dasd</s></p>\r\n', '2022-02-18 01:00:00', 6),
	(9, 'Cats2', '<p>Catssasdasdsa as<strong><em>dsa</em></strong><s>dasd</s></p>\r\n', '2022-02-18 01:00:00', 6),
	(10, 'Cats2', '<p>Catssasdasdsa as<strong><em>dsa</em></strong><s>dasd</s></p>\r\n', '2022-02-18 01:00:00', 6),
	(11, 'Cats2', '<p>Catssasdasdsa as<strong><em>dsa</em></strong><s>dasd</s></p>\r\n', '2022-02-18 01:00:00', 6),
	(12, 'Cats2', '<p>Catssasdasdsa as<strong><em>dsa</em></strong><s>dasd</s></p>\r\n', '2022-02-18 01:00:00', 6),
	(13, 'Cats2', '<p>Catssasdasdsa as<strong><em>dsa</em></strong><s>dasd</s></p>\r\n', '2022-02-18 01:00:00', 6),
	(14, 'Cats2', '<p>Catssasdasdsa as<strong><em>dsa</em></strong><s>dasd</s></p>\r\n', '2022-02-18 01:00:00', 6),
	(15, 'Cats2', '<p>Catssasdasdsa as<strong><em>dsa</em></strong><s>dasd</s></p>\r\n', '2022-02-18 01:00:00', 6),
	(16, 'Cats2', '<p>Catssasdasdsa as<strong><em>dsa</em></strong><s>dasd</s></p>\r\n', '2022-02-18 01:00:00', 6),
	(17, 'Newest', '<p>Test</p>\r\n', '2023-04-14 02:00:00', 5),
	(18, 'Test 2024', '<p>asdasdasdasdasdsadasdasdasdsadsadsad</p>\r\n', '2021-09-22 02:00:00', 5);
/*!40000 ALTER TABLE `news` ENABLE KEYS */;

-- Dumping structure for table news.news_images
CREATE TABLE IF NOT EXISTS `news_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `news_id` int(11) DEFAULT NULL,
  `url` text DEFAULT NULL,
  `is_cover` tinyint(4) DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `blog_id` (`news_id`),
  CONSTRAINT `FK__news` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table news.news_images: ~7 rows (approximately)
DELETE FROM `news_images`;
/*!40000 ALTER TABLE `news_images` DISABLE KEYS */;
INSERT INTO `news_images` (`id`, `news_id`, `url`, `is_cover`) VALUES
	(11, NULL, 'uploads/cea156f3e3.jpg', NULL),
	(16, 6, 'uploads/e38d7d01bb.jpg', 0),
	(17, 6, 'uploads/f5bd4b5b68.jpg', 1),
	(18, 7, 'uploads/8739591782.jpg', 0),
	(19, 7, 'uploads/1d24d38e35.jpg', 1),
	(20, 8, 'uploads/81bf8e05b0.jpg', 1),
	(22, 17, 'uploads/c601c19d1e.jpg', 1),
	(25, 18, 'uploads/4bd6c68d1a.jpg', 0);
/*!40000 ALTER TABLE `news_images` ENABLE KEYS */;

-- Dumping structure for table news.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `password` varchar(255) NOT NULL,
  `access_token` varchar(100) DEFAULT NULL,
  `role` enum('Admin','User') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table news.user: ~2 rows (approximately)
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `username`, `auth_key`, `password`, `access_token`, `role`) VALUES
	(3, 'admin', 'asd', 'c3284d0f94606de1fd2af172aba15bf3', NULL, 'Admin'),
	(4, 'user', 'asd', 'c3284d0f94606de1fd2af172aba15bf3', NULL, 'User');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
