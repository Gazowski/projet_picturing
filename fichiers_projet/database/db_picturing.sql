-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 17, 2020 at 02:41 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_picturing`
--

-- --------------------------------------------------------

--
-- Table structure for table `ad`
--

DROP TABLE IF EXISTS `ad`;
CREATE TABLE IF NOT EXISTS `ad` (
  `id_ad` int(11) NOT NULL AUTO_INCREMENT,
  `category` int(11) NOT NULL,
  `location` varchar(250) DEFAULT NULL,
  `title` varchar(250) DEFAULT NULL,
  `description` text,
  `price` varchar(50) DEFAULT NULL,
  `photo` varchar(250) NOT NULL,
  `open_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `close_date` datetime DEFAULT NULL,
  `owner` int(11) UNSIGNED NOT NULL,
  `active` int NOT NULL,
  PRIMARY KEY (`id_ad`),
  UNIQUE KEY `title` (`title`),
  KEY `category` (`category`),
  KEY `owner` (`owner`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ad`
--

INSERT INTO `ad` (`id_ad`, `category`, `location`, `title`, `description`, `price`, `photo`, `open_date`, `close_date`, `owner`) VALUES
(1, 1, NULL, 'appareil photo neuf', 'joli appareil photo neuf pas cher', '1000', 'assets/img/fujifilm_s1500.png', '2020-02-13 11:39:38', NULL, 2),
(2, 2, NULL, 'appareil photo usagé', 'appareil reflex peu', '333', 'assets/img/nikon_d5600.png', '2020-02-13 11:39:38', NULL, 2),
(3, 3, NULL, 'reparation zoom', 'réparation de tout vos zoom', '100', 'assets/img/reparation.png', '2020-02-13 11:39:38', NULL, 2),
(4, 4, NULL, 'photo corporative', 'une seance de photo au sein de votre entreprise', '500', 'assets/img/tirage_photos.png', '2020-02-13 11:39:38', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `banishement`
--

DROP TABLE IF EXISTS `banishement`;
CREATE TABLE IF NOT EXISTS `banishement` (
  `id_banishement` int(11) NOT NULL AUTO_INCREMENT,
  `banished_member` int(11) UNSIGNED NOT NULL,
  `admin_member` int(11) UNSIGNED NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_banishement`),
  KEY `banished_member` (`banished_member`),
  KEY `admin_member` (`admin_member`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id_category` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_by` int(11) NOT NULL,
  PRIMARY KEY (`id_category`),
  UNIQUE KEY `name` (`name`),
  KEY `created_by` (`created_by`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id_category`, `category`, `name`, `created_by`) VALUES
(1, 'produit', 'appareil photo neuf', 1),
(2, 'produit', 'appareil photo usagé', 1),
(3, 'service', 'réparation', 1),
(4, 'service', 'seance photo', 1);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User'),
(3, 'client', 'membre qui désire acheter un service ou un produit'),
(4, 'Fournisseur', 'membre qui désire vendre des services ou des produits');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

DROP TABLE IF EXISTS `login_attempts`;
CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id_message` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `text_message` varchar(250) DEFAULT NULL,
  `writer` int(11) UNSIGNED NOT NULL,
  `ad` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_message`),
  KEY `writer` (`writer`),
  KEY `ad` (`ad`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

DROP TABLE IF EXISTS `rating`;
CREATE TABLE IF NOT EXISTS `rating` (
  `id_rating` int(11) NOT NULL AUTO_INCREMENT,
  `rated_user` int(11) UNSIGNED NOT NULL,
  `rater_user` int(11) UNSIGNED NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `rating` int(11) NOT NULL,
  PRIMARY KEY (`id_rating`),
  KEY `rated_user` (`rated_user`),
  KEY `rater_user` (`rater_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `company_number` int(11) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `website` varchar(250) DEFAULT NULL,
  `social_network` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_email` (`email`),
  UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  UNIQUE KEY `uc_remember_selector` (`remember_selector`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `company_number`, `address`, `phone`, `website`, `social_network`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$12$yHML2PEkkL35NkGWKV.nVevBdB8aiebuOAD6.4.2ru7HoNiqW.6.y', 'admin@admin.com', NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1581895883, 1, 'Admin', 'istrator', 'ADMIN', NULL, NULL, '0', NULL, NULL),
(2, '1.0.0.127', 'billy', '1234', 'bill.baroud@bill.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1234, NULL, 1, 'bill', 'baroud', 'maisonneuve', NULL, NULL, NULL, NULL, NULL),
(3, '::1', 'robert@bidochon.com', '$2y$10$0zhTu/7nKvxZY0J1NUuFFelzWXJXn0P1Q2cMimQwgIj2AqM.mC.Pa', 'robert@bidochon.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1581901478, 1581906620, 1, 'robert', 'bidochon', 'les bidochon', NULL, NULL, '1234', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

DROP TABLE IF EXISTS `users_groups`;
CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 3, 4);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ad`
--
ALTER TABLE `ad`
  ADD CONSTRAINT `ad_ibfk_1` FOREIGN KEY (`category`) REFERENCES `category` (`id_category`),
  ADD CONSTRAINT `ad_ibfk_2` FOREIGN KEY (`owner`) REFERENCES `users` (`id`);

--
-- Constraints for table `banishement`
--
ALTER TABLE `banishement`
  ADD CONSTRAINT `banishement_ibfk_1` FOREIGN KEY (`admin_member`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `banishement_ibfk_2` FOREIGN KEY (`banished_member`) REFERENCES `users` (`id`);

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`ad`) REFERENCES `ad` (`id_ad`),
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`writer`) REFERENCES `users` (`id`);

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`rated_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`rater_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
