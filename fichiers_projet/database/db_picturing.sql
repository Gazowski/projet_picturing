-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 12, 2020 at 02:19 AM
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
  `location` varchar(250) DEFAULT NULL,
  `title` varchar(250) DEFAULT NULL,
  `description` text,
  `price` varchar(50) DEFAULT NULL,
  `photo` varchar(250) NOT NULL,
  `open_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `close_date` datetime NULL DEFAULT NULL,
  `owner` int(11) NOT NULL,
  PRIMARY KEY (`id_ad`),
  UNIQUE KEY `title` (`title`),
  KEY `owner` (`owner`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `banishement`
--

DROP TABLE IF EXISTS `banishement`;
CREATE TABLE IF NOT EXISTS `banishement` (
  `id_banishement` int(11) NOT NULL AUTO_INCREMENT,
  `banished_member` int(11) NOT NULL,
  `admin_member` int(11) NOT NULL,
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
  `name` varchar(50) NOT NULL,
  `ad` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  PRIMARY KEY (`id_category`),
  UNIQUE KEY `name` (`name`),
  KEY `ad` (`ad`),
  KEY `created_by` (`created_by`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

DROP TABLE IF EXISTS `members`;
CREATE TABLE IF NOT EXISTS `members` (
  `id_members` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `entreprise_name` varchar(50) DEFAULT NULL,
  `entreprise_number` varchar(50) DEFAULT NULL,
  `address` varchar(50) NOT NULL,
  `tel` int(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `website_link` varchar(50) DEFAULT NULL,
  `social_networks_link` varchar(50) DEFAULT NULL,
  `role` varchar(50) NOT NULL,
  `provider_profil` varchar(50) DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `inscription_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `validation_date` datetime NOT NULL,
  `approved_by` int(11) NOT NULL,
  PRIMARY KEY (`id_members`),
  UNIQUE KEY `email` (`email`),
  KEY `approved_by` (`approved_by`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `writer` int(11) NOT NULL,
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
  `rated_user` int(11) NOT NULL,
  `rater_user` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `rating` int(11) NOT NULL,
  PRIMARY KEY (`id_rating`),
  KEY `rated_user` (`rated_user`),
  KEY `rater_user` (`rater_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ad`
--
ALTER TABLE `ad`
  ADD CONSTRAINT `ad_ibfk_2` FOREIGN KEY (`owner`) REFERENCES `members` (`id_members`);

--
-- Constraints for table `banishement`
--
ALTER TABLE `banishement`
  ADD CONSTRAINT `banishement_ibfk_1` FOREIGN KEY (`banished_member`) REFERENCES `members` (`id_members`),
  ADD CONSTRAINT `banishement_ibfk_2` FOREIGN KEY (`admin_member`) REFERENCES `members` (`id_members`);

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`ad`) REFERENCES `ad` (`id_ad`),
  ADD CONSTRAINT `category_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `members` (`id_members`);

--
-- Constraints for table `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `members_ibfk_2` FOREIGN KEY (`approved_by`) REFERENCES `members` (`id_members`);

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`writer`) REFERENCES `members` (`id_members`),
  ADD CONSTRAINT `message_ibfk_3` FOREIGN KEY (`ad`) REFERENCES `ad` (`id_ad`);

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`rated_user`) REFERENCES `members` (`id_members`),
  ADD CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`rater_user`) REFERENCES `members` (`id_members`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
