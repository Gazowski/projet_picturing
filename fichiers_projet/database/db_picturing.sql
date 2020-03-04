-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 03, 2020 at 05:57 PM
-- Server version: 5.7.28
-- PHP Version: 7.3.12

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
  `title` varchar(250) NOT NULL,
  `description` text,
  `price` varchar(50) DEFAULT NULL,
  `photo` varchar(250) NOT NULL,
  `open_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `close_date` datetime DEFAULT NULL,
  `owner` int(11) UNSIGNED NOT NULL,
  `active` int(11) NOT NULL,
  PRIMARY KEY (`id_ad`),
  KEY `category` (`category`),
  KEY `owner` (`owner`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ad`
--

INSERT INTO `ad` (`id_ad`, `category`, `location`, `title`, `description`, `price`, `photo`, `open_date`, `close_date`, `owner`, `active`) VALUES
(1, 1, NULL, 'appareil photo neuf', 'joli appareil photo neuf pas cher', '1000', 'assets/img/fujifilm_s1500.png', '2020-02-13 11:39:38', NULL, 2, 1),
(2, 2, NULL, 'appareil photo usagé', 'appareil reflex peu', '333', 'assets/img/nikon_d5600.png', '2020-02-13 11:39:38', NULL, 2, 1),
(3, 3, NULL, 'reparation zoom', 'réparation de tout vos zoom', '100', 'assets/img/reparation.png', '2020-02-13 11:39:38', NULL, 2, 1),
(4, 4, NULL, 'photo corporative', 'une seance de photo au sein de votre entreprise', '500', 'assets/img/tirage_photos.png', '2020-02-13 11:39:38', NULL, 2, 1),
(8, 1, '', 'essai ajout', 'un nouvel appareil neuf', '3000', '', '2020-02-18 08:34:55', NULL, 1, 0),
(10, 3, '', 'essai ajout #2', 'un nouveau service de réparation', '3000', '', '2020-02-18 08:37:36', NULL, 1, 0),
(30, 4, NULL, 'photo corporative', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta. Mauris massa. Vestibulum lacinia arcu eget nulla. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Curabitur sodales ligula in libero. Sed dignissim lacinia nunc.', '500', 'assets/img/tirage_photos.png', '2020-02-25 08:18:43', NULL, 2, 1),
(31, 1, NULL, 'clic clax', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta. Mauris massa. Vestibulum lacinia arcu eget nulla. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Curabitur sodales ligula in libero. Sed dignissim lacinia nunc.', '1000 CAD$', 'assets/img/fujifilm_s1500.png', '2020-02-25 08:18:43', NULL, 3, 1),
(32, 3, NULL, '. Curabitur sodales ligula', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta. Mauris massa. Vestibulum lacinia arcu eget nulla. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Curabitur sodales ligula in libero. Sed dignissim lacinia nunc.', '333', 'assets/img/nikon_d5600.png', '2020-02-25 08:18:43', NULL, 5, 1),
(33, 4, NULL, 'Vestibulum lacinia', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta. Mauris massa. Vestibulum lacinia arcu eget nulla. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Curabitur sodales ligula in libero. Sed dignissim lacinia nunc.', '100', 'assets/img/reparation.png', '2020-02-25 08:18:43', NULL, 4, 1),
(34, 1, NULL, 'Mauris mass', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta. Mauris massa. Vestibulum lacinia arcu eget nulla. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Curabitur sodales ligula in libero. Sed dignissim lacinia nunc.', '500', 'assets/img/tirage_photos.png', '2020-02-25 08:18:43', NULL, 6, 1),
(35, 3, NULL, '. Curabitur sodales ligula', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta. Mauris massa. Vestibulum lacinia arcu eget nulla. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Curabitur sodales ligula in libero. Sed dignissim lacinia nunc.', '333', 'assets/img/nikon_d5600.png', '2020-02-25 08:18:43', NULL, 5, 1),
(36, 2, NULL, 'Vestibulum lacinia', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta. Mauris massa. Vestibulum lacinia arcu eget nulla. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Curabitur sodales ligula in libero. Sed dignissim lacinia nunc.', '100', 'assets/img/reparation.png', '2020-02-25 08:18:43', NULL, 4, 1),
(37, 3, NULL, '. Curabitur sodales ligula', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta. Mauris massa. Vestibulum lacinia arcu eget nulla. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Curabitur sodales ligula in libero. Sed dignissim lacinia nunc.', '333', 'assets/img/nikon_d5600.png', '2020-02-25 08:18:43', NULL, 5, 1),
(38, 3, NULL, 'Vestibulum lacinia', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta. Mauris massa. Vestibulum lacinia arcu eget nulla. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Curabitur sodales ligula in libero. Sed dignissim lacinia nunc.', '100', 'assets/img/reparation.png', '2020-02-25 08:18:43', NULL, 4, 1),
(39, 1, NULL, 'inceptos himenaeos', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta. Mauris massa. Vestibulum lacinia arcu eget nulla. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Curabitur sodales ligula in libero. Sed dignissim lacinia nunc.', '1000', 'assets/img/fujifilm_s1500.png', '2020-02-25 08:18:43', NULL, 3, 1),
(40, 3, NULL, '. Curabitur sodales ligula', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta. Mauris massa. Vestibulum lacinia arcu eget nulla. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Curabitur sodales ligula in libero. Sed dignissim lacinia nunc.', '333', 'assets/img/nikon_d5600.png', '2020-02-25 08:18:43', NULL, 5, 1),
(41, 3, NULL, 'Mauris mass', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta. Mauris massa. Vestibulum lacinia arcu eget nulla. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Curabitur sodales ligula in libero. Sed dignissim lacinia nunc.', '500', 'assets/img/tirage_photos.png', '2020-02-25 08:18:43', NULL, 6, 1),
(42, 3, NULL, '. Curabitur sodales ligula', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta. Mauris massa. Vestibulum lacinia arcu eget nulla. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Curabitur sodales ligula in libero. Sed dignissim lacinia nunc.', '333', 'assets/img/nikon_d5600.png', '2020-02-25 08:18:43', NULL, 5, 1),
(43, 2, NULL, 'Vestibulum lacinia', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta. Mauris massa. Vestibulum lacinia arcu eget nulla. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Curabitur sodales ligula in libero. Sed dignissim lacinia nunc.', '100', 'assets/img/reparation.png', '2020-02-25 08:18:43', NULL, 4, 1),
(44, 3, NULL, '. Curabitur sodales ligula', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta. Mauris massa. Vestibulum lacinia arcu eget nulla. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Curabitur sodales ligula in libero. Sed dignissim lacinia nunc.', '333', 'assets/img/nikon_d5600.png', '2020-02-25 08:18:43', NULL, 5, 1),
(45, 3, NULL, 'Vestibulum lacinia', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta. Mauris massa. Vestibulum lacinia arcu eget nulla. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Curabitur sodales ligula in libero. Sed dignissim lacinia nunc.', '100', 'assets/img/reparation.png', '2020-02-25 08:18:43', NULL, 4, 1),
(46, 1, NULL, 'Mauris mass', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta. Mauris massa. Vestibulum lacinia arcu eget nulla. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Curabitur sodales ligula in libero. Sed dignissim lacinia nunc.', '500', 'assets/img/tirage_photos.png', '2020-02-25 08:18:43', NULL, 6, 0),
(47, 3, NULL, '. Curabitur sodales ligula', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta. Mauris massa. Vestibulum lacinia arcu eget nulla. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Curabitur sodales ligula in libero. Sed dignissim lacinia nunc.', '333', 'assets/img/nikon_d5600.png', '2020-02-25 08:18:43', NULL, 5, 0),
(48, 2, NULL, 'Vestibulum lacinia', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta. Mauris massa. Vestibulum lacinia arcu eget nulla. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Curabitur sodales ligula in libero. Sed dignissim lacinia nunc.', '100', 'assets/img/reparation.png', '2020-02-25 08:18:43', NULL, 4, 0),
(49, 1, '', 'nouvelle annonce', 'un nouvel appareil neuf', '100', 'assets/img/sacoche1.png,assets/img/fujifilm_ef5001.png,assets/img/tirage_photos1.png', '2020-03-02 09:29:05', NULL, 3, 1),
(50, 3, '', 'ajout photo', 'un nouvel appareil neuf', '3000', 'assets/img/fujifilm_ef5001.png', '2020-03-03 09:21:40', NULL, 1, 0);

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
  PRIMARY KEY (`id_category`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id_category`, `category`, `name`) VALUES
(1, 'produit', 'appareil photo neuf'),
(2, 'produit', 'appareil photo usagé'),
(3, 'service', 'réparation'),
(4, 'service', 'seance photo');

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(3, 'Client', 'membre qui désire acheter un service ou un produit'),
(4, 'Fournisseur', 'membre qui désire vendre des services ou des produits'),
(5, 'Fournisseur Or', 'fournisseur avec droits supérieur'),
(6, 'Superviseur', 'assistant administrateur');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Table structure for table `msg_messages`
--

DROP TABLE IF EXISTS `msg_messages`;
CREATE TABLE IF NOT EXISTS `msg_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `thread_id` int(11) NOT NULL,
  `body` text NOT NULL,
  `priority` int(2) NOT NULL DEFAULT '0',
  `sender_id` int(11) NOT NULL,
  `cdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `msg_messages`
--

INSERT INTO `msg_messages` (`id`, `thread_id`, `body`, `priority`, `sender_id`, `cdate`) VALUES
(1, 1, 'je suis un message de soumission', 0, 1, '2020-03-03 15:18:30');

-- --------------------------------------------------------

--
-- Table structure for table `msg_participants`
--

DROP TABLE IF EXISTS `msg_participants`;
CREATE TABLE IF NOT EXISTS `msg_participants` (
  `user_id` int(11) NOT NULL,
  `thread_id` int(11) NOT NULL,
  `cdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`,`thread_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `msg_participants`
--

INSERT INTO `msg_participants` (`user_id`, `thread_id`, `cdate`) VALUES
(1, 1, '2020-03-03 15:18:30'),
(31, 1, '2020-03-03 15:18:30');

-- --------------------------------------------------------

--
-- Table structure for table `msg_status`
--

DROP TABLE IF EXISTS `msg_status`;
CREATE TABLE IF NOT EXISTS `msg_status` (
  `message_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`message_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `msg_status`
--

INSERT INTO `msg_status` (`message_id`, `user_id`, `status`) VALUES
(1, 1, 1),
(1, 31, 0);

-- --------------------------------------------------------

--
-- Table structure for table `msg_threads`
--

DROP TABLE IF EXISTS `msg_threads`;
CREATE TABLE IF NOT EXISTS `msg_threads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `msg_threads`
--

INSERT INTO `msg_threads` (`id`, `subject`) VALUES
(1, '31');

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
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `company_number`, `address`, `phone`, `website`, `social_network`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$12$yHML2PEkkL35NkGWKV.nVevBdB8aiebuOAD6.4.2ru7HoNiqW.6.y', 'admin@admin.com', NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1583245267, 1, 'Admin', 'istrator', 'ADMIN', NULL, 'nouvelle adresse', '0', NULL, NULL),
(2, '1.0.0.127', 'billy', '1234', 'bill.baroud@bill.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1234, NULL, 1, 'bill', 'baroud', 'maisonneuve', NULL, NULL, NULL, NULL, NULL),
(3, '::1', 'robert@bidochon.com', '$2y$10$0zhTu/7nKvxZY0J1NUuFFelzWXJXn0P1Q2cMimQwgIj2AqM.mC.Pa', 'robert@bidochon.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1581901478, 1583159432, 1, 'robert', 'bidochon', 'les bidochon', NULL, NULL, '1234', NULL, NULL),
(4, '::1', 'gael@gael.com', '$2y$10$v/sakCF4JqKmfIb4JKZ9g.ErxtnkMhDRZmkfXPpyv/pUTePsoEHcC', 'gael@gael.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1582204232, NULL, 0, 'gael', 'comeau', 'college', 1234, 'chez nous', '1234', '', ''),
(5, '::1', 'salah@salah.com', '$2y$10$kN3B0Jac.1Yfb7ZjvpRsCe1drphYa5aS5MHzDIOK5JO/uNQNgrUvm', 'salah@salah.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1582205922, NULL, 1, 'salah', 'salhi', 'laval inc.', 1234, 'laval', '1234', '', ''),
(6, '::1', 'olivier@olivier.com', '$2y$10$6i3JjNfLAYjNTsmcmFbvAehc0PsMBkHIRYiOgTi.RrBHLAFJ7/lw6', 'olivier@olivier.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1582206222, NULL, 1, 'olivier', 'raude', 'deLorimier inc', 1234, 'montreal', '1234', '', ''),
(7, '::1', 'kervens@kervens.com', '$2y$10$.5bn217iCyqO3XmivOmejegCVBbVZWSXk7XLEC/EUOrCQ7JD7AY2q', 'kervens@kervens.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1582206572, 1582921582, 1, 'kervens', 'antoine', 'haiti inc', 1234, 'brossard', '1234', '', ''),
(8, '::1', 'gael_04@gael.com', '$2y$10$cwA0Lb9V4ezEm2n28etXZ.tVd8L11YwpZHkBAXBq9pIXggQhllOkG', 'gael_04@gael.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1582211065, NULL, 0, 'gael', 'gael', 'college', 1234, '', '1234', '', ''),
(9, '::1', 'gael_05@gael.com', '$2y$10$gb.iZqUPOVOVLr7KJF0ISeIrleRnEwwfeUCC1ErvLxC6XrE6HdKLi', 'gael_05@gael.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1582211201, NULL, 0, 'gael', 'gael', 'college', 1234, 'chez nous', '1234', '', ''),
(10, '::1', 'gael_6@gael.com', '$2y$10$1PBnrh/rxQENo35/MqxAduKGdxoVq6NBy4ABPvIXXN5Vhg0ocA/We', 'gael_6@gael.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1582211322, NULL, 0, 'gael', 'gael', 'college', 1234, 'ici', '1234', '', ''),
(11, '::1', 'polo@polo.com', '$2y$10$3joqYxky3fP3ZlQkRXs05u0cdCeKi0K0lxJmXHhNQyZBMAvDqh5A.', 'polo@polo.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1582567761, NULL, 0, 'hello', 'yO', 'POLOP', 1234, 'chez polo', '1234', '', ''),
(21, '::1', 'g@g.com', '$2y$10$JV59sbudMJ6l3QHTTxo/i.8JG5XrmyfXyLbmDV1ttQqkLY.VfUqAG', 'g@g.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1583173122, NULL, 0, 'gael', 'comeau', 'college', 0, 'chez nous', '1234', '', ''),
(22, '::1', 'c@c.com', '$2y$10$eX9.ZjSiJ4WvkNVdTZWtUeFXTxL43QXdj.iLT4vRCwfwQu3n9.RIW', 'c@c.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1583173370, NULL, 0, 'gael', 'comeau', 'college', 1234, 'chez nous', '1234', '', ''),
(23, '::1', 'd@d.d', '$2y$10$/w1iuLMmz20qeahDKnPHAe3GvUKyyA4/2Bjbc.AVKIfp.X7I7i1Cq', 'd@d.d', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1583175239, NULL, 0, 'gael', 'comeau', 'college', 1234, 'chez nous', '1234', '', ''),
(24, '::1', 'g.g@c.com', '$2y$10$/qCyJyGVei6p7a9cqvALkeUK4hjAZ7mVd3Cayh2oIs.s8TjvwmkFK', 'g.g@c.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1583175445, NULL, 1, 'gael', 'comeau', 'college', 1234, 'chez nous', '1234', '', ''),
(25, '::1', 'w@w.com', '$2y$10$uXd3e.OU0G8HAINLjdFGieDWpMllAdO1TGmRoajnELTPuAMSLoqQW', 'w@w.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1583175705, NULL, 1, 'gael', 'comeau', 'college', 1234, 'chez nous', '1234', '', ''),
(26, '::1', 't@t.com', '$2y$10$a6ETSa3cpKUihvd7XMSHQuUWdyszlcuCaI1T9kzs3xD7AAAkTR5ny', 't@t.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1583175759, NULL, 1, 'gael', 'comeau', 'college', 1234, 'chez nous', '1234', '', '');

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
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(3, 3, 4),
(15, 4, 4),
(13, 5, 4),
(12, 6, 4),
(14, 7, 3),
(16, 12, 3),
(17, 13, 3),
(18, 14, 3),
(19, 15, 3),
(20, 16, 3),
(21, 17, 3),
(22, 18, 3),
(23, 19, 3),
(24, 20, 3),
(25, 21, 3),
(26, 22, 3),
(27, 23, 4),
(28, 24, 4),
(29, 25, 5),
(30, 26, 3);

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
