-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2020 at 04:40 PM
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id_members`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `approved_by` (`approved_by`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id_members` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `members_ibfk_2` FOREIGN KEY (`approved_by`) REFERENCES `members` (`id_members`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
