-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 15, 2024 at 06:00 PM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlineshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorys`
--

DROP TABLE IF EXISTS `categorys`;
CREATE TABLE IF NOT EXISTS `categorys` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `date_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `stock_product` int NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categorys`
--

INSERT INTO `categorys` (`ID`, `name`, `date_at`, `stock_product`) VALUES
(1, 'ساعت', '2024-05-10 12:42:39', 0),
(3, 'موبایل', '2024-05-10 13:51:15', 0);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `product_id` int NOT NULL,
  `comment` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`ID`, `user_id`, `user_name`, `product_id`, `comment`) VALUES
(20, 46, 'sina', 11, 'کالای جالبیه'),
(23, 36, 'hossein', 15, 'راضی بودم');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `product_id` int NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `order_stock` int NOT NULL,
  `price` int NOT NULL,
  `receive_location` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`ID`, `user_id`, `user_name`, `product_id`, `product_name`, `order_stock`, `price`, `receive_location`) VALUES
(4, 46, 'sina', 9, 'msi', 5, 450000000, 'karaj'),
(5, 46, 'sina', 10, 'macbook', 5, 600000000, 'karaj'),
(3, 46, 'sina', 11, 'apple watch', 1, 6000000, 'karaj');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `stock` int NOT NULL,
  `price` int NOT NULL,
  `off_price` int DEFAULT NULL,
  `caption` text NOT NULL,
  `image` varchar(300) NOT NULL,
  `category_id` int NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ID`, `name`, `stock`, `price`, `off_price`, `caption`, `image`, `category_id`) VALUES
(15, 'iphone 6s', 17, 7000000, NULL, 'iphone 6s', 'iphone6s1715616623.jpg', 0),
(10, 'macbook', 10, 120000000, NULL, 'لپتاپ فوق اورجینال شرکت اپل', 'laptop21715358002.jpg', 0),
(9, 'msi', 22, 100000000, 90000000, 'لپتاپ با کیفیت از شرکت msi', 'msi11715357855.jpg', 0),
(8, 'iphone 13', 45, 50000000, NULL, 'ایفون از کوروش کمپانی', 'iphone13mini1715357523.jpg', 0),
(11, 'apple watch', 50, 6000000, NULL, 'اپل واج ارجینال دارای ترک فعالیت های بدن', 'watch31715358093.jpg', 0),
(12, 'eirpods', 24, 3000000, NULL, 'ایرپاد سری 3 اپل', 'airpodpro31715358151.jpg', 0),
(13, 'mi band', 67, 2000000, NULL, 'دستبند هوشمند مقرون به صرفه شیائومی', 'miband1715358213.jpg', 0),
(14, 'headphone onikuma', 34, 8000000, NULL, 'بهترین صدا مال این هدفونه', 'onikuma-k101715362250.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL,
  `last_name` varchar(20) COLLATE utf8mb4_persian_ci DEFAULT NULL,
  `gmail` varchar(90) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `phone_number` varchar(11) COLLATE utf8mb4_persian_ci DEFAULT NULL,
  `user_name` varchar(15) COLLATE utf8mb4_persian_ci DEFAULT NULL,
  `passwordd` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `addres` text COLLATE utf8mb4_persian_ci,
  `is_admin` tinyint NOT NULL DEFAULT '0',
  `image` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `gmail` (`gmail`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `first_name`, `last_name`, `gmail`, `phone_number`, `user_name`, `passwordd`, `date`, `addres`, `is_admin`, `image`) VALUES
(36, 'hossein', 'masoopour', 'hossein@gmail.com', '09367865498', 'hossein', '$2y$10$CgoXj/XWPuoK9GcR8N1EGujvGpiib4YqiPEByEJ9ZkJ49KQyGWyxq', '2024-05-10 20:28:32', 'hesarak', 1, 'photo99702983191721066335.jpg'),
(46, 'sina', 'Majnooni', 'sinamajnoni.85@gmail.com', '09920686587', 'sina_majnooni', '$2y$10$KjgxEtHkx3xFqZqTsdQNau9286FzVSCwn.s7EzqJgQODYWiZ8zPeK', '2024-05-13 12:41:37', 'karaj', 0, 'photo1031360740611721065321.jpg'),
(48, 'mehrab', 'hakimi', 'mehrab@gmail.com', '', 'mehrab', '$2y$10$aepOoaB/PDHSqLNcH2ThxuKiGZBFXEBA66FvZHWOT9pm7YcfYYOO.', '2024-05-14 05:39:06', 'hesarak', 1, 'photo99702983191721066240.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
