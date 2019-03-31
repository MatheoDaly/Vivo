-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 31, 2019 at 12:45 PM
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
-- Table structure for table `recette_plat`
--

CREATE TABLE `recette_plat` (
  `Id_Recette` int(11) NOT NULL,
  `nom` varchar(20) DEFAULT NULL,
  `instructions` text,
  `kcal` float DEFAULT NULL,
  `protéines` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recette_plat`
--

INSERT INTO `recette_plat` (`Id_Recette`, `nom`, `instructions`, `kcal`, `protéines`) VALUES
(0, 'Oeuf au plat', '1. Mettre de l\'huile dans une poêle à feu moyen 2. Casser un oeuf et le mettre dans la poêle 3. Attendre 3 minutes et c\'est prêt !', 180, 13.8),
(1, 'Tomates farcies', '1.Préchauffer pendant 10 minutes le four a 200° 2.Découper les tomates sur le dessus en forme de rond et les vider. 1.Garnir les tomates avec la viande hachée et de l\'ail 3.Enfourner les tomates garnies pendant 30 à 40 minutes 4.Assaisoner, c\'est prêt !,', 123, 5.84),
(2, 'Salade de concombre', '1.Laver le concombre et l\'éplucher en rondelle 2.Versez la crème dans un saladier. 3. Ajoutez du jus de citron, de lhuile d\'olive et du persil. 4.Salez, poivrez et mélangez. 5. Incorporez les rondelles de concombre 6.Mélangez à nouveau le tout de façon à ce que la sauce enveloppe bien le concombre. 7. Réserver au frais et c\'est prêt', 27, 16.26);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `recette_plat`
--
ALTER TABLE `recette_plat`
  ADD PRIMARY KEY (`Id_Recette`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
