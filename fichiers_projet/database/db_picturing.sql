-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2020 at 07:55 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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

CREATE TABLE `ad` (
  `id_ad` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `location` varchar(250) DEFAULT NULL,
  `title` varchar(250) DEFAULT NULL,
  `description` text,
  `price` varchar(50) DEFAULT NULL,
  `photo` varchar(250) NOT NULL,
  `open_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `close_date` datetime DEFAULT NULL,
  `owner` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ad`
--

INSERT INTO `ad` (`id_ad`, `category`, `location`, `title`, `description`, `price`, `photo`, `open_date`, `close_date`, `owner`) VALUES
(1, 11, NULL, 'appareil photo neuf', 'joli appareil photo neuf pas cher', '1000', 'assets/img/fujifilm_s1500.png', '2020-02-13 11:39:38', NULL, 2),
(2, 12, NULL, 'appareil photo usagé', 'appareil reflex peu', '333', 'assets/img/nikon_d5600.png', '2020-02-13 11:39:38', NULL, 2),
(3, 21, NULL, 'reparation zoom', 'réparation de tout vos zoom', '100', 'assets/img/reparation.png', '2020-02-13 11:39:38', NULL, 2),
(4, 22, NULL, 'photo corporative', 'une seance de photo au sein de votre entreprise', '500', 'assets/img/tirage_photos.png', '2020-02-13 11:39:38', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `banishement`
--

CREATE TABLE `banishement` (
  `id_banishement` int(11) NOT NULL,
  `banished_member` int(11) NOT NULL,
  `admin_member` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id_category` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id_category`, `name`, `created_by`) VALUES
(11, 'appareil photo neuf', 1),
(12, 'appareil photo usagé', 1),
(21, 'réparation', 1),
(22, 'seance photo', 1);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id_members` int(11) NOT NULL,
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
  `approved_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id_members`, `password`, `first_name`, `last_name`, `entreprise_name`, `entreprise_number`, `address`, `tel`, `email`, `website_link`, `social_networks_link`, `role`, `provider_profil`, `status`, `inscription_date`, `validation_date`, `approved_by`) VALUES
(1, 'admin', 'admin', 'admin', NULL, NULL, 'adresse de l\'admin', 1234, 'email@admin.com', NULL, NULL, 'admin', NULL, 'valid', '2020-02-13 09:52:28', '2020-02-13 09:52:28', 1),
(2, '1234', 'salah', 'salhi', NULL, NULL, 'laval', 1234, 'salah@email.com', NULL, NULL, 'supplier', '1', 'valid', '2020-02-13 10:36:33', '2020-02-13 10:36:33', 1);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id_message` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `text_message` varchar(250) DEFAULT NULL,
  `writer` int(11) NOT NULL,
  `ad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id_rating` int(11) NOT NULL,
  `rated_user` int(11) NOT NULL,
  `rater_user` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ad`
--
ALTER TABLE `ad`
  ADD PRIMARY KEY (`id_ad`),
  ADD UNIQUE KEY `title` (`title`),
  ADD KEY `owner` (`owner`),
  ADD KEY `category` (`category`);

--
-- Indexes for table `banishement`
--
ALTER TABLE `banishement`
  ADD PRIMARY KEY (`id_banishement`),
  ADD KEY `banished_member` (`banished_member`),
  ADD KEY `admin_member` (`admin_member`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id_members`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `approved_by` (`approved_by`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id_message`),
  ADD KEY `writer` (`writer`),
  ADD KEY `ad` (`ad`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id_rating`),
  ADD KEY `rated_user` (`rated_user`),
  ADD KEY `rater_user` (`rater_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ad`
--
ALTER TABLE `ad`
  MODIFY `id_ad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `banishement`
--
ALTER TABLE `banishement`
  MODIFY `id_banishement` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id_members` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id_message` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id_rating` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `ad`
--
ALTER TABLE `ad`
  ADD CONSTRAINT `ad_ibfk_1` FOREIGN KEY (`category`) REFERENCES `category` (`id_category`),
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
