-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 14 mars 2019 à 20:44
-- Version du serveur :  5.7.21
-- Version de PHP :  5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `vivo`
--

-- --------------------------------------------------------

--
-- Structure de la table `statistique`
--

DROP TABLE IF EXISTS `statistique`;
CREATE TABLE IF NOT EXISTS `statistique` (
  `type` int(11) NOT NULL,
  `NumRepas` tinyint(4) DEFAULT NULL,
  `Nom` varchar(20) NOT NULL,
  `TauxCumule` int(11) NOT NULL,
  `date` date NOT NULL,
  `ID_Profil` int(11) NOT NULL,
  KEY `ID_Profil` (`ID_Profil`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `statistique`
--

INSERT INTO `statistique` (`type`, `NumRepas`, `Nom`, `TauxCumule`, `date`, `ID_Profil`) VALUES
(5, NULL, 'Proteine', 567, '2019-03-14', 1),
(5, NULL, 'Lidipe', 567, '2019-03-14', 1),
(5, NULL, 'Glucide', 567, '2019-03-14', 1),
(5, NULL, 'Calorie', 567, '2019-03-14', 1),
(4, NULL, 'Proteine', 600, '2019-04-03', 1),
(4, NULL, 'Lidipe', 600, '2019-04-03', 1),
(4, NULL, 'Glucide', 600, '2019-04-03', 1),
(4, NULL, 'Calorie', 600, '2019-04-03', 1),
(4, NULL, 'Proteine', 534, '2019-03-14', 1),
(4, NULL, 'Lidipe', 534, '2019-03-14', 1),
(4, NULL, 'Glucide', 534, '2019-03-14', 1),
(4, NULL, 'Calorie', 534, '2019-03-14', 1),
(3, NULL, 'Proteine', 600, '2019-04-03', 1),
(3, NULL, 'Lidipe', 600, '2019-04-03', 1),
(3, NULL, 'Glucide', 600, '2019-04-03', 1),
(3, NULL, 'Calorie', 600, '2019-04-03', 1),
(3, NULL, 'Proteine', 600, '2019-03-18', 1),
(3, NULL, 'Lidipe', 600, '2019-03-18', 1),
(3, NULL, 'Glucide', 600, '2019-03-18', 1),
(3, NULL, 'Calorie', 600, '2019-03-18', 1),
(3, NULL, 'Proteine', 467, '2019-03-14', 1),
(3, NULL, 'Lidipe', 467, '2019-03-14', 1),
(3, NULL, 'Glucide', 467, '2019-03-14', 1),
(3, NULL, 'Calorie', 467, '2019-03-14', 1),
(2, NULL, 'Proteine', 600, '2019-04-03', 1),
(2, NULL, 'Lidipe', 600, '2019-04-03', 1),
(2, NULL, 'Glucide', 600, '2019-04-03', 1),
(2, NULL, 'Calorie', 600, '2019-04-03', 1),
(2, NULL, 'Proteine', 600, '2019-03-20', 1),
(2, NULL, 'Lidipe', 600, '2019-03-20', 1),
(2, NULL, 'Glucide', 600, '2019-03-20', 1),
(2, NULL, 'Calorie', 600, '2019-03-20', 1),
(2, NULL, 'Proteine', 600, '2019-03-18', 1),
(2, NULL, 'Lidipe', 600, '2019-03-18', 1),
(2, NULL, 'Glucide', 600, '2019-03-18', 1),
(2, NULL, 'Calorie', 600, '2019-03-18', 1),
(2, NULL, 'Proteine', 600, '2019-03-16', 1),
(2, NULL, 'Lidipe', 600, '2019-03-16', 1),
(2, NULL, 'Glucide', 600, '2019-03-16', 1),
(2, NULL, 'Calorie', 600, '2019-03-16', 1),
(2, NULL, 'Proteine', 600, '2019-03-14', 1),
(2, NULL, 'Lidipe', 600, '2019-03-14', 1),
(2, NULL, 'Glucide', 600, '2019-03-14', 1),
(2, NULL, 'Calorie', 600, '2019-03-14', 1),
(2, NULL, 'Calorie', 200, '2019-03-14', 1),
(2, NULL, 'Lidipe', 200, '2019-03-14', 1),
(2, NULL, 'Glucide', 200, '2019-03-14', 1),
(2, NULL, 'Proteine', 200, '2019-03-14', 1),
(1, 3, 'Calorie', 200, '2019-04-03', 1),
(1, 3, 'Lidipe', 200, '2019-04-03', 1),
(1, 3, 'Glucide', 200, '2019-04-03', 1),
(1, 3, 'Proteine', 200, '2019-04-03', 1),
(1, 2, 'Calorie', 200, '2019-04-03', 1),
(1, 2, 'Lidipe', 200, '2019-04-03', 1),
(1, 2, 'Glucide', 200, '2019-04-03', 1),
(1, 2, 'Proteine', 200, '2019-04-03', 1),
(1, 1, 'Calorie', 200, '2019-04-03', 1),
(1, 1, 'Lidipe', 200, '2019-04-03', 1),
(1, 1, 'Glucide', 200, '2019-04-03', 1),
(1, 1, 'Proteine', 200, '2019-04-03', 1),
(1, 3, 'Calorie', 200, '2019-03-20', 1),
(1, 3, 'Lidipe', 200, '2019-03-20', 1),
(1, 3, 'Glucide', 200, '2019-03-20', 1),
(1, 3, 'Proteine', 200, '2019-03-20', 1),
(1, 2, 'Calorie', 200, '2019-03-20', 1),
(1, 2, 'Lidipe', 200, '2019-03-20', 1),
(1, 2, 'Glucide', 200, '2019-03-20', 1),
(1, 2, 'Proteine', 200, '2019-03-20', 1),
(1, 1, 'Calorie', 200, '2019-03-20', 1),
(1, 1, 'Lidipe', 200, '2019-03-20', 1),
(1, 1, 'Glucide', 200, '2019-03-20', 1),
(1, 1, 'Proteine', 200, '2019-03-20', 1),
(1, 3, 'Calorie', 200, '2019-03-18', 1),
(1, 3, 'Lidipe', 200, '2019-03-18', 1),
(1, 3, 'Glucide', 200, '2019-03-18', 1),
(1, 3, 'Proteine', 200, '2019-03-18', 1),
(1, 2, 'Calorie', 200, '2019-03-18', 1),
(1, 2, 'Lidipe', 200, '2019-03-18', 1),
(1, 2, 'Glucide', 200, '2019-03-18', 1),
(1, 2, 'Proteine', 200, '2019-03-18', 1),
(1, 1, 'Calorie', 200, '2019-03-18', 1),
(1, 1, 'Lidipe', 200, '2019-03-18', 1),
(1, 1, 'Glucide', 200, '2019-03-18', 1),
(1, 1, 'Proteine', 200, '2019-03-18', 1),
(1, 3, 'Calorie', 200, '2019-03-16', 1),
(1, 3, 'Lidipe', 200, '2019-03-16', 1),
(1, 3, 'Glucide', 200, '2019-03-16', 1),
(1, 3, 'Proteine', 200, '2019-03-16', 1),
(1, 2, 'Calorie', 200, '2019-03-16', 1),
(1, 2, 'Lidipe', 200, '2019-03-16', 1),
(1, 2, 'Glucide', 200, '2019-03-16', 1),
(1, 2, 'Proteine', 200, '2019-03-16', 1),
(1, 1, 'Calorie', 200, '2019-03-16', 1),
(1, 1, 'Lidipe', 200, '2019-03-16', 1),
(1, 1, 'Glucide', 200, '2019-03-16', 1),
(1, 1, 'Proteine', 200, '2019-03-16', 1),
(1, 3, 'Calorie', 200, '2019-03-14', 1),
(1, 3, 'Lidipe', 200, '2019-03-14', 1),
(1, 3, 'Glucide', 200, '2019-03-14', 1),
(1, 3, 'Proteine', 200, '2019-03-14', 1),
(1, 2, 'Calorie', 200, '2019-03-14', 1),
(1, 2, 'Lidipe', 200, '2019-03-14', 1),
(1, 2, 'Glucide', 200, '2019-03-14', 1),
(1, 2, 'Proteine', 200, '2019-03-14', 1),
(1, 1, 'Calorie', 200, '2019-03-14', 1),
(1, 1, 'Lidipe', 200, '2019-03-14', 1),
(1, 1, 'Glucide', 200, '2019-03-14', 1),
(1, 1, 'Proteine', 200, '2019-03-14', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
