-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2024 at 10:54 AM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `piekarnia`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `categories_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`categories_id`),
  KEY `category_id` (`category_id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categories_id`, `category_id`, `product_id`) VALUES
(1, 28, 31),
(5, 34, 31),
(9, 36, 31),
(10, 29, 31),
(12, 30, 31),
(13, 37, 52);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` char(64) NOT NULL,
  `category_image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_image`) VALUES
(28, 'Wypieki Polskie', 'c01807bb9fa6be277ae24cabed064e27.png'),
(29, 'Wypieki Razowe', 'c2e032ab5062f5acbe28c4907dad22f1.png'),
(30, 'Wypieki Jasne', 'e411bd917c951e3295247e384b9e2b32.png'),
(31, 'Wypiekane na Miejscu', '02b8fdb38eb16dc282fc935d8d4c1d67.png'),
(33, 'Wypieki Pszenne', '73207423acc964bd7aa9dd28c3656d5d.png'),
(34, 'Wypieki Żytnie', 'd30ca821a659cd3cbaa455e3b09d0575.png'),
(36, 'Wypieki Wieloziarniste', '542698fa6b8f5ba0ea9cd497795e7f6f.png'),
(37, 'Cukiernicze', '78493c1ff4ee7c153351d51061694552.webp');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` char(128) NOT NULL,
  `product_price` decimal(10,2) DEFAULT NULL,
  `product_description` text DEFAULT NULL,
  `product_image_1` varchar(255) DEFAULT NULL,
  `product_image_2` varchar(255) DEFAULT NULL,
  `product_image_3` varchar(255) DEFAULT NULL,
  `product_image_4` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_price`, `product_description`, `product_image_1`, `product_image_2`, `product_image_3`, `product_image_4`) VALUES
(31, 'nie chleb', 222.00, '', NULL, NULL, NULL, NULL),
(42, 'aj fikn fenkju mużyn', 21.37, 'papiez - polak', NULL, NULL, NULL, NULL),
(43, 'Andrzej Tejt', 69.00, 'papiez - polak', NULL, NULL, NULL, NULL),
(44, 'dawid jasper jasper dawid', 40.99, 'papiez - polak', NULL, NULL, NULL, NULL),
(46, 'umpa lumpa duba di du', 3.09, 'japierdole nienawidze php ', NULL, NULL, NULL, NULL),
(48, 'dlaczego the living tombsote  robi dobra muzyke?', 21.37, 'papiez - polak', NULL, NULL, NULL, NULL),
(49, 'shini thicccc af', 5.00, 'laki luk', NULL, NULL, NULL, NULL),
(50, 'boze nienawidze php', 420.00, 'ogladam sobie lakiego luka jak to pisze, serio polecam, nienawidze php ale z luky lukiem w tle jakos lepiej sie to pisze', NULL, NULL, NULL, NULL),
(52, 'ciasto z majkraft', 22.00, 'afawfawf', NULL, NULL, NULL, NULL),
(53, 'tadsafsags', 22.00, 'afawfawf', NULL, NULL, NULL, NULL),
(54, 'tadsafsags', 22.00, 'afawfawf', NULL, NULL, NULL, NULL),
(55, 'sex', 22.00, 'afawfawf', NULL, NULL, NULL, NULL),
(57, 'tadsafsags', 22.00, 'afawfawf', NULL, NULL, NULL, NULL),
(58, 'Sigma Chleb', 22.00, 'ttest', NULL, NULL, NULL, NULL),
(60, 'ttest', 22.00, 'ttest', NULL, NULL, NULL, NULL),
(62, 'ttest', 22.00, 'ttest', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(32) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_admin` tinyint(1) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_email`, `user_password`, `user_admin`) VALUES
(1, 'admin', 'admin@admin.xyz', 'admin', 1),
(2, 'nieadmin', 'nieadmin@nieadmin.xyz', 'nieadmin', 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `categories_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
