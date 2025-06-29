-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 29, 2025 at 05:13 PM
-- Server version: 9.1.0
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `acoustichaven`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

DROP TABLE IF EXISTS `admin_users`;
CREATE TABLE IF NOT EXISTS `admin_users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$iISR9EkMjgh9UZlSUzTNV.4D/dzyvHjOgUgl8WBwF0bSwlnCaSMOK');

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

DROP TABLE IF EXISTS `contact_messages`;
CREATE TABLE IF NOT EXISTS `contact_messages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(250) NOT NULL,
  `question` text NOT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `reply` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `email`, `question`, `submitted_at`, `reply`) VALUES
(1, 'sahandesilva484@gmail.com', 'is this brand new?', '2025-05-08 20:01:22', 'yes'),
(4, 'nimath@gmail.com', 'Is this still available', '2025-06-20 17:43:05', NULL),
(5, 'pasan@gmail.com', 'Brand new?', '2025-06-22 11:51:12', NULL),
(6, 'tharuka@gmail.com', 'Still available', '2025-06-22 13:20:28', NULL),
(7, 'dilshan@gmail.com', '?????', '2025-06-22 16:52:10', NULL),
(8, 'shehan@gmail.com', 'Available?', '2025-06-23 04:28:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `customer_email` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `address` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_email`, `product_name`, `price`, `order_date`, `address`) VALUES
(29, 'tharuka@gmail.com', 'John Mayor(Signed)', 750000.00, '2025-06-22 13:22:03', 'Colombo'),
(28, 'tharuka@gmail.com', 'Ed Sheeran(Signed)', 850000.00, '2025-06-22 13:22:03', 'Colombo'),
(13, 'nimath@gmail.com', 'Multiply', 445000.00, '2025-06-20 11:19:07', 'Colombo'),
(16, 'nimath@gmail.com', 'Ed Sheeran(Signed)', 850000.00, '2025-06-20 11:19:07', 'Kandy'),
(17, 'sahandesilva484@gmail.com', 'Ed Sheeran(Signed)', 850000.00, '2025-06-20 12:16:06', 'Badulla'),
(27, 'sahandesilva484@gmail.com', 'Ed Sheeran(Signed)', 850000.00, '2025-06-22 12:54:43', 'malabe'),
(30, 'dilshan@gmail.com', 'Ed Sheeran(Signed)', 850000.00, '2025-06-22 16:52:29', 'Mawanalla'),
(31, 'dilshan@gmail.com', 'John Mayor(Signed)', 750000.00, '2025-06-22 16:52:29', 'Mawanalla'),
(32, 'shehan@gmail.com', 'Ed Sheeran(Signed)', 850000.00, '2025-06-23 04:28:58', 'Badulla');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `image`) VALUES
(4, 'Bass Guitar', 'Bass', 2400000.00, 'Bass.png'),
(2, 'Jumbo Size', 'Acoustic', 170000.00, 'GAcoustic.png'),
(9, 'Bob Dylan signature', 'sd', 45000.00, 'bob.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `contact`, `password`) VALUES
(1, 'Sahan', 'sahandesilva484@gmail.com', '0776822240', '$2y$10$j3dcD0K0KAIH3R5hHyT.u.pjhDAQWcWNlvkTq3409q/LlMDbE99bS'),
(2, 'Sahan', 'sahandesilva484@gmail.com', '0776822240', '$2y$10$tgqAVWlvyN/RRKIJEX11uO6cHnWh0RRWR/zx5Q3pvNldExIr3U7MK'),
(3, 'sahan2O4', 'sahandesilva@gmail.com', '0776822245', '$2y$10$QdwYB4xz8z1h0XlBUPpm7uYbCqv8vwV7d7.UP7XEhhkhVZEbD73dK'),
(4, 'Sigma', 'jj@gmail.com', '0776822245', '$2y$10$EZWGZJkXDveKjW.Mvbpc3.S1OguNcDEN2VicVsh4Zat/ebvT5kyc2'),
(5, 'sa24610648', 'sa24610648@my.sliit.lk', '0776822260', '$2y$10$8dJ9yZ6jg2YyqZ3z.08Q7.WRUp5EoR.sFjX7YRH9EfrAraY/jKmIC'),
(6, 'peter', 'Peter@gmail.xom', '0776822247', '$2y$10$.uS2CXRE6VoK34iPxvUqg.jXOzG1NM3oHzAmpwGmrpvNT.nCD5ROC'),
(7, 'sss', 'sahandesilva184@gmail.com', '0776822240', '$2y$10$eJPORk5rBjNxp6Lv0z8bk.t5X9avAU/zG1DbJi/0OcOlsfHTeXQWm'),
(8, 'asenda', 'asenda484@gmail.com', '0776822249', '$2y$10$4uVj3i3zikYz/o/gKcvsi.HESwRYnhkmhBrhpuHwWq08ZENi6C9GO'),
(9, 'Ashendra', 'Ashendra@gmail.com', '0776822277', '$2y$10$uuERCAliRzbOQU9jdWqsPeX4RYHCiHl/JNR/1oE7ijNkTr6a17wd.'),
(10, 'Nimath', 'nimath@gmail.com', '0716588325', '$2y$10$TzfZx2pQOr.7K0vEtEJ7uedUUqRA/1fGZihfo1D08JNss0HIL4vIa'),
(11, 'Pasan', 'pasan@gmail.com', '0716583256', '$2y$10$qLjQ0ifPGxjpzn68v3Xmu.BtviKfdsuqOnb8bDiXTE5YbVS61b8Wy'),
(12, 'admin5', 'admin@gmail.com', '0716589457', '$2y$10$yBFo5jPOA97XLrVnEviYHefQfroW7ZVWuqadddplIb3SK9SNzHNwa'),
(13, 'Tharuka', 'tharuka@gmail.com', '0756559258', '$2y$10$wzrG7uZgzxAgeYSVOL4vRebkWl6H55IY9LNOEkIkV6XekIQmrDm6a'),
(14, 'Dilshan', 'dilshan@gmail.com', '0777682255', '$2y$10$Mxp86LPzMBP2M42OfyjoYORO59o5qjAqcOlqABkv7KKInryqcPjr.'),
(15, 'shehan', 'shehan@gmail.com', '0776822255', '$2y$10$R99/rkYEQnE7gZvpmrVdSeLm2yv12SBCvUre5Bj9ZuICjL4UaF2W.');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
