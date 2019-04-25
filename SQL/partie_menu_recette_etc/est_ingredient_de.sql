-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 25, 2019 at 04:20 PM
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
-- Table structure for table `est_ingredient_de`
--

CREATE TABLE `est_ingredient_de` (
  `id_recette` int(11) NOT NULL,
  `id_aliment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `est_ingredient_de`
--
ALTER TABLE `est_ingredient_de`
  ADD KEY `est_ingredient_de_ibfk_1` (`id_recette`),
  ADD KEY `id_aliment` (`id_aliment`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `est_ingredient_de`
--
ALTER TABLE `est_ingredient_de`
  ADD CONSTRAINT `est_ingredient_de_ibfk_1` FOREIGN KEY (`id_recette`) REFERENCES `recette_plat` (`Id_Recette`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
