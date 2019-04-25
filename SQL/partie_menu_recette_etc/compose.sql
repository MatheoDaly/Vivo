-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 25, 2019 at 04:21 PM
-- Server version: 5.6.34-log
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vivo`
--

-- --------------------------------------------------------

--
-- Table structure for table `compose`
--

CREATE TABLE `compose` (
  `id_menu` int(11) DEFAULT NULL,
  `id_recette` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `compose`
--
ALTER TABLE `compose`
  ADD KEY `FK_Recette_Compose` (`id_recette`),
  ADD KEY `compose_ibfk_2` (`id_menu`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `compose`
--
ALTER TABLE `compose`
  ADD CONSTRAINT `FK_Recette_Compose` FOREIGN KEY (`id_recette`) REFERENCES `recette_plat` (`Id_Recette`),
  ADD CONSTRAINT `compose_ibfk_2` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`Id_Menu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
