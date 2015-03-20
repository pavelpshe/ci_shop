-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2015 at 03:29 PM
-- Server version: 5.5.34
-- PHP Version: 5.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ci_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `machine_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE (`machine_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `machine_name`) VALUES
(1, 'Smart phones', 'nice.jpg', 'smart_phones'),
(2, 'Tablets', 'tablet.jpg', 'tablets');

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE IF NOT EXISTS `content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `article` text NOT NULL,
  `menu_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `title`, `article`, `menu_id`) VALUES
(1, 'About our company', 'text demo', 1),
(2, 'Our services', 'demo text for our services', 2);

-- --------------------------------------------------------

--
-- Table structure for table `id`
--

CREATE TABLE IF NOT EXISTS `id` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `machine_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `title`, `link`, `machine_name`) VALUES
(1, 'About our company', 'About us', 'about'),
(2, 'Our company services', 'Services', 'services'),
(5, 'pituh', 'zver', 'zver'),
(6, 'pituh', 'zver', 'zver'),
(7, 'pituh', 'zver', 'zver');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` text NOT NULL,
  `uid` int(11) NOT NULL,
  `order_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `data`, `uid`, `order_date`) VALUES
(1, '{"c4ca4238a0b923820dcc509a6f75849b":{"rowid":"c4ca4238a0b923820dcc509a6f75849b","id":"1","qty":"1","price":"1600.00","name":"lg g2","subtotal":1600}}', 1, '2015-01-13 12:40:56'),
(2, '{"c4ca4238a0b923820dcc509a6f75849b":{"rowid":"c4ca4238a0b923820dcc509a6f75849b","id":"1","qty":"2","price":"1600.00","name":"lg g2","subtotal":3200},"c81e728d9d4c2f636f067f89cc14862c":{"rowid":"c81e728d9d4c2f636f067f89cc14862c","id":"2","qty":"1","price":"3000.00","name":"Samsung Note4","subtotal":3000}}', 1, '2015-01-13 13:42:03'),
(3, '{"eccbc87e4b5ce2fe28308fd9f2a7baf3":{"rowid":"eccbc87e4b5ce2fe28308fd9f2a7baf3","id":"3","qty":"1","price":"1500.00","name":"nexus","subtotal":1500}}', 1, '2015-01-13 13:43:06');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `categorie_id` int(11) NOT NULL,
  `machine_name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `visibility` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE (`machine_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `categorie_id`, `machine_name`, `image`, `price`, `visibility`) VALUES
(3, 'nexus', 'tablet', 2, 'tablets-1', 'nexus.jpg', '1500.00', 1),
(4, 'lg', 'LG tablet', 2, 'tablets-2', 'lg.jpg', '1300.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `uid` int(25) NOT NULL AUTO_INCREMENT,
  `role` int(255) NOT NULL,
  PRIMARY KEY (`uid`),
  KEY `uid` (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`uid`, `role`) VALUES
(1, 2),
(3, 2),
(4, 1),
(5, 2),
(6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`,`password`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'Vasya', 'vasya@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
(3, 'user', 'user@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
(4, 'admin', 'admin@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
(5, 'gnida', 'vasya2@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(6, 'paul', 'paul@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `roles_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
