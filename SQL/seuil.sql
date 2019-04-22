-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 22, 2019 at 07:03 PM
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
-- Table structure for table `seuil`
--

CREATE TABLE `seuil` (
  `ID` int(11) NOT NULL,
  `ID_Groupe` int(11) DEFAULT NULL,
  `InfSup` varchar(1) NOT NULL,
  `Taux` int(11) NOT NULL,
  `Id_Concentration` tinyint(3) NOT NULL,
  `Risque` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seuil`
--

INSERT INTO `seuil` (`ID`, `ID_Groupe`, `InfSup`, `Taux`, `Id_Concentration`, `Risque`) VALUES
(1, NULL, 'I', 70, 2, 'Une faiblesse ou une douleur au niveau des muscles et des articulations'),
(2, NULL, 'I', 70, 2, 'probleme pour réguler le taux de sucre dans le sang'),
(3, NULL, 'I', 70, 2, 'Les problèmes de cheveux, d’ongles et de peau'),
(4, NULL, 'S', 300, 1, 'obesite'),
(5, NULL, 'S', 300, 1, 'diabete de type 2'),
(6, NULL, 'I', 180, 1, 'Trouble cardiaque'),
(7, NULL, 'I', 1700, 5, 'l’hypoglycémie'),
(8, NULL, 'I', 1700, 5, 'diminution de la secretion d\'enzymes, hormones, spermatozoïdes et sperme, anticorps'),
(9, NULL, 'I', 1700, 5, 'malnutrition calorique');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `seuil`
--
ALTER TABLE `seuil`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `seuil`
--
ALTER TABLE `seuil`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
