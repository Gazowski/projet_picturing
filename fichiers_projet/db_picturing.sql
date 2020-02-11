-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 11 fév. 2020 à 18:38
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `db_picturing`
--

-- --------------------------------------------------------

--
-- Structure de la table `announcement`
--

DROP TABLE IF EXISTS `announcement`;
CREATE TABLE IF NOT EXISTS `announcement` (
  `id_announcement` int(11) NOT NULL AUTO_INCREMENT,
  `location` varchar(250) DEFAULT NULL,
  `title` varchar(250) DEFAULT NULL,
  `description` text,
  `price` varchar(50) DEFAULT NULL,
  `photo` varchar(250) NOT NULL,
  `open_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `close_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_announcement`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id_category` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id_category`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `members`
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
  PRIMARY KEY (`id_members`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id_message` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `text_message` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id_message`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
