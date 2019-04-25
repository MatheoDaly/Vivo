-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 25 avr. 2019 à 21:38
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
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(50) NOT NULL,
  `Url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `Nom`, `Url`) VALUES
(1, 'Mite sur la consomation de proteine', 'https://www.santenatureinnovation.com/proteines-mauvais-pour-sante/'),
(2, '5 signes que vous manquez de protéines', 'https://www.santemagazine.fr/alimentation/nutriments/proteines-et-acides-amines/5-signes-que-vous-manquez-de-proteines-188689'),
(3, 'Besoins énergétiques de chacun', 'https://www.sante-sur-le-net.com/nutrition-bien-etre/nutrition/besoins-energetiques/');

-- --------------------------------------------------------

--
-- Structure de la table `concentration`
--

DROP TABLE IF EXISTS `concentration`;
CREATE TABLE IF NOT EXISTS `concentration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(30) NOT NULL,
  `ChampsAliment` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `concentration`
--

INSERT INTO `concentration` (`id`, `Nom`, `ChampsAliment`) VALUES
(1, 'Glucide', 'Glucides_g100g'),
(2, 'Protéine', 'Protéines_g100g'),
(3, 'Alcool', 'Alcool_g100g'),
(5, 'Calorie', 'Energie_Règlement_UE_N°_11692011_kcal100g');

-- --------------------------------------------------------

--
-- Structure de la table `historique_aliment`
--

DROP TABLE IF EXISTS `historique_aliment`;
CREATE TABLE IF NOT EXISTS `historique_aliment` (
  `Repas` int(11) NOT NULL COMMENT 'C''est une heure ex: 15 pour le repas de 15 heures',
  `ID_ingredient` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `ID_Profil` int(11) NOT NULL,
  `Date` date NOT NULL,
  KEY `ID_Profil` (`ID_Profil`),
  KEY `ID_ingredient` (`ID_ingredient`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `objectif`
--

DROP TABLE IF EXISTS `objectif`;
CREATE TABLE IF NOT EXISTS `objectif` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `objectif`
--

INSERT INTO `objectif` (`id`, `type`) VALUES
(1, 'poids');

-- --------------------------------------------------------

--
-- Structure de la table `objectif_profil`
--

DROP TABLE IF EXISTS `objectif_profil`;
CREATE TABLE IF NOT EXISTS `objectif_profil` (
  `id_Profil` int(11) NOT NULL,
  `id_Objectif` int(11) NOT NULL,
  `valeur_type` int(11) NOT NULL,
  KEY `fk_profil_Dbl` (`id_Profil`),
  KEY `fk_objectif_Dbl` (`id_Objectif`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `objectif_profil`
--

INSERT INTO `objectif_profil` (`id_Profil`, `id_Objectif`, `valeur_type`) VALUES
(1, 1, 123),
(13, 1, 2),
(14, 1, 2),
(15, 1, 2),
(16, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `profil`
--

DROP TABLE IF EXISTS `profil`;
CREATE TABLE IF NOT EXISTS `profil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prenom` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `poids` int(11) NOT NULL,
  `taille` int(11) NOT NULL,
  `NiveauSportif` tinyint(1) NOT NULL,
  `url_photo` varchar(255) NOT NULL,
  `utilisateur` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `DateActue` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Prend la dernier date d''actualisation pour savoir si statistique peut etre modifier',
  `mdp` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `genre` varchar(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `profil`
--

INSERT INTO `profil` (`id`, `prenom`, `email`, `poids`, `taille`, `NiveauSportif`, `url_photo`, `utilisateur`, `DateActue`, `mdp`, `genre`) VALUES
(1, 'Visiteur', 'visiteur@vivo.fr', 80, 170, 120, '', 'Visiteur', '2019-04-25 23:30:24', 'MDP', 'M');

-- --------------------------------------------------------

--
-- Structure de la table `seuil`
--

DROP TABLE IF EXISTS `seuil`;
CREATE TABLE IF NOT EXISTS `seuil` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Groupe` int(11) DEFAULT NULL,
  `InfSup` varchar(1) NOT NULL,
  `Taux` int(11) NOT NULL,
  `Id_Concentration` tinyint(3) NOT NULL,
  `Risque` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `seuil`
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

-- --------------------------------------------------------

--
-- Structure de la table `seuil_article`
--

DROP TABLE IF EXISTS `seuil_article`;
CREATE TABLE IF NOT EXISTS `seuil_article` (
  `id_seuil` int(11) NOT NULL,
  `article` int(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `seuil_article`
--

INSERT INTO `seuil_article` (`id_seuil`, `article`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 2),
(5, 3),
(6, 2),
(7, 3);

-- --------------------------------------------------------

--
-- Structure de la table `statistique`
--

DROP TABLE IF EXISTS `statistique`;
CREATE TABLE IF NOT EXISTS `statistique` (
  `type` int(11) NOT NULL,
  `NumRepas` tinyint(4) DEFAULT NULL,
  `id_Concentration` tinyint(4) NOT NULL,
  `TauxCumule` int(11) NOT NULL,
  `date` date NOT NULL,
  `ID_Profil` int(11) NOT NULL,
  KEY `ID_Profil` (`ID_Profil`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
