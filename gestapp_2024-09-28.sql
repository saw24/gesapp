-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 28 sep. 2024 à 20:47
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestapp`
--

-- --------------------------------------------------------

--
-- Structure de la table `t_categories`
--

DROP TABLE IF EXISTS `t_categories`;
CREATE TABLE IF NOT EXISTS `t_categories` (
  `code` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  PRIMARY KEY (`code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `t_communes`
--

DROP TABLE IF EXISTS `t_communes`;
CREATE TABLE IF NOT EXISTS `t_communes` (
  `code` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  PRIMARY KEY (`code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `t_corps`
--

DROP TABLE IF EXISTS `t_corps`;
CREATE TABLE IF NOT EXISTS `t_corps` (
  `code` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  PRIMARY KEY (`code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `t_departement`
--

DROP TABLE IF EXISTS `t_departement`;
CREATE TABLE IF NOT EXISTS `t_departement` (
  `code` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  PRIMARY KEY (`code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `t_ecoles`
--

DROP TABLE IF EXISTS `t_ecoles`;
CREATE TABLE IF NOT EXISTS `t_ecoles` (
  `code` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `correspondant` varchar(50) NOT NULL,
  `tel_ecole` varchar(50) NOT NULL,
  `email_ecole` varchar(50) NOT NULL,
  `adre_ecole` varchar(100) NOT NULL,
  PRIMARY KEY (`code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_ecoles`
--

INSERT INTO `t_ecoles` (`code`, `nom`, `correspondant`, `tel_ecole`, `email_ecole`, `adre_ecole`) VALUES
('1425', 'ENESP Zinder', 'Damoure', '12345678', 'infos@gmail.com', 'Niamey'),
('202409131207407029', 'IPSP', 'Maiga', '12345678', 'infos@ipsp.ne', 'Niamey'),
('202409131212206518', 'ENESP NIAMEY', 'Amadou', '987456', 'info@gmail.com', 'Niamey'),
('202409191710584504', 'ISS', '7856', '78965', 'abdoulwahabous@gmail.com', 'Niamey'),
('202409211334156205', 'test ecol', '', '', '', ''),
('202409211338301013', 'AUTRE', '', '', '', ''),
('202409211342302954', 'ECOLE AZ', '', '', '', ''),
('202409211350433974', 'TESKER', '', '', '', ''),
('202409211356405822', 'dan zama', '', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `t_filieres`
--

DROP TABLE IF EXISTS `t_filieres`;
CREATE TABLE IF NOT EXISTS `t_filieres` (
  `code` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  PRIMARY KEY (`code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_filieres`
--

INSERT INTO `t_filieres` (`code`, `nom`) VALUES
('202409202107195197', 'MEDECINE GENERALE'),
('1478', 'ASB'),
('202409201302457601', 'SFDE'),
('202409202107502508', 'TSSO'),
('202409202108081692', 'TSSI'),
('202409202108181652', 'TSL'),
('202409202108382593', 'TSAR'),
('202409211341008778', 'AUTRE'),
('202409211350562241', 'GAZER');

-- --------------------------------------------------------

--
-- Structure de la table `t_fonctions`
--

DROP TABLE IF EXISTS `t_fonctions`;
CREATE TABLE IF NOT EXISTS `t_fonctions` (
  `code` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  PRIMARY KEY (`code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `t_niveaux_etudiant`
--

DROP TABLE IF EXISTS `t_niveaux_etudiant`;
CREATE TABLE IF NOT EXISTS `t_niveaux_etudiant` (
  `code` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  PRIMARY KEY (`code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_niveaux_etudiant`
--

INSERT INTO `t_niveaux_etudiant` (`code`, `nom`) VALUES
('7845', 'MOYEN'),
('1478', 'SUPERIEUR'),
('202409211351117231', 'PRIMAIRE');

-- --------------------------------------------------------

--
-- Structure de la table `t_passages_services`
--

DROP TABLE IF EXISTS `t_passages_services`;
CREATE TABLE IF NOT EXISTS `t_passages_services` (
  `code_passage` varchar(50) NOT NULL,
  `code_stage` varchar(50) NOT NULL,
  `code_service` varchar(50) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `evaluation` text,
  PRIMARY KEY (`code_passage`),
  KEY `code_stage` (`code_stage`),
  KEY `code_service` (`code_service`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `t_pays`
--

DROP TABLE IF EXISTS `t_pays`;
CREATE TABLE IF NOT EXISTS `t_pays` (
  `code` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  PRIMARY KEY (`code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_pays`
--

INSERT INTO `t_pays` (`code`, `nom`) VALUES
('7845', 'NIGER'),
('1478', 'MALI'),
('2578', 'BURKINA'),
('2596', 'TOGO'),
('202409211330568512', 'BENIN'),
('202409211332126928', 'BENIN'),
('202409211332311760', 'BENIN2'),
('202409211338025314', 'AUTRE'),
('202409211341585235', 'NIGERIA'),
('202409211342417485', 'LOME'),
('202409211350313792', 'KAKAKAK'),
('202409211351413163', 'LONDON'),
('202409211352464385', 'POPO'),
('202409211353048127', 'ORA'),
('202409211356106303', 'europe');

-- --------------------------------------------------------

--
-- Structure de la table `t_regions`
--

DROP TABLE IF EXISTS `t_regions`;
CREATE TABLE IF NOT EXISTS `t_regions` (
  `code` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  PRIMARY KEY (`code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `t_services`
--

DROP TABLE IF EXISTS `t_services`;
CREATE TABLE IF NOT EXISTS `t_services` (
  `code` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  PRIMARY KEY (`code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_services`
--

INSERT INTO `t_services` (`code`, `nom`) VALUES
('202409130916393602', 'Gynecologie'),
('202409130917059459', 'BLOC OP'),
('202409130917282046', 'Nouveau BLOC OP'),
('202409130944379467', 'Obstetrique'),
('7845', 'INFORMATIQUE'),
('1478', 'GRH');

-- --------------------------------------------------------

--
-- Structure de la table `t_stages`
--

DROP TABLE IF EXISTS `t_stages`;
CREATE TABLE IF NOT EXISTS `t_stages` (
  `code` varchar(50) NOT NULL,
  `code_stagiaire` varchar(50) NOT NULL,
  `date_debut` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL,
  `objectif_stage` text NOT NULL,
  `statut` enum('En cours','Terminé','Annulé') NOT NULL DEFAULT 'En cours',
  PRIMARY KEY (`code`),
  KEY `code_stagiaire` (`code_stagiaire`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_stages`
--

INSERT INTO `t_stages` (`code`, `code_stagiaire`, `date_debut`, `date_fin`, `objectif_stage`, `statut`) VALUES
('STG-20240923-794', '202409201747038187', '2024-09-23', NULL, 'err', 'En cours'),
('STG-20240923-660', '202409231315505217', '2024-09-23', NULL, 'gjjskjdjshdjsd\r\nhgjhsdiojsjk\r\njhgihsojdsokld', 'En cours');

-- --------------------------------------------------------

--
-- Structure de la table `t_stagiaires`
--

DROP TABLE IF EXISTS `t_stagiaires`;
CREATE TABLE IF NOT EXISTS `t_stagiaires` (
  `code` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `sexe` varchar(50) DEFAULT NULL,
  `date_nsce` date DEFAULT NULL,
  `lieu_nsce` varchar(50) DEFAULT NULL,
  `nationalite` varchar(50) DEFAULT NULL,
  `ecole` varchar(50) DEFAULT NULL,
  `filiere` varchar(50) DEFAULT NULL,
  `niveau` varchar(50) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_stagiaires`
--

INSERT INTO `t_stagiaires` (`code`, `nom`, `sexe`, `date_nsce`, `lieu_nsce`, `nationalite`, `ecole`, `filiere`, `niveau`, `type`) VALUES
('7845', 'JOHN Doe', 'Homme', '2024-09-01', 'USA', '7845', '202409131212206518', '202409201302457601', '7845', '202409202105555616'),
('2596', 'KAKALE Guidan Ider', 'Homme', '2024-01-01', 'Niamey', '1478', '202409131207407029', '202409202107195197', '1478', '1478'),
('202409201747038187', 'Ibrahim GI', 'Homme', '2018-12-31', 'Guidans', '2596', '202409191710584504', '202409202107502508', '1478', '7845'),
('202409202200175420', 'AISSA GOULBI', 'Femme', '2004-12-27', 'DANTCHANDOU', '7845', '1425', '202409202108181652', '7845', '202409202105555616'),
('202409211414532646', 'Azerty', 'Homme', '2021-01-01', 'Kizguikistan', '7845', '202409211342302954', '202409202107195197', '1478', '1478'),
('202409230751421149', 'king le roi', 'Homme', '2014-07-01', 'libertÃ©', '202409211338025314', '202409211342302954', '202409202107195197', '1478', '7845'),
('202409231315505217', 'Hlima maman', 'Femme', '2024-09-23', 'Niamey', '7845', '202409191710584504', '202409202108382593', '7845', '1478');

-- --------------------------------------------------------

--
-- Structure de la table `t_types_etudiant`
--

DROP TABLE IF EXISTS `t_types_etudiant`;
CREATE TABLE IF NOT EXISTS `t_types_etudiant` (
  `code` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  PRIMARY KEY (`code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_types_etudiant`
--

INSERT INTO `t_types_etudiant` (`code`, `nom`) VALUES
('7845', 'MEDECIN'),
('1478', 'ETUDIANT'),
('202409211337308908', 'AUTRE'),
('202409202105555616', 'ELEVE'),
('202409211351224354', 'TYPAGE');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
