-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 20 sep. 2024 à 16:54
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
-- Structure de la table `t_stagiaires`
--

DROP TABLE IF EXISTS `t_stagiaires`;
CREATE TABLE IF NOT EXISTS `t_stagiaires` (
  `code` varchar(50) NOT NULL PRIMARY KEY,
  `nom` varchar(50) NOT NULL,
  `sexe` varchar(50) NOT NULL,
  `date_nsce` date NOT NULL,
  `lieu_nsce` varchar(50) NOT NULL,
  `nationalite` varchar(50) NOT NULL,
  `ecole` varchar(50) NOT NULL,
  `filiere` varchar(50) NOT NULL,
  `niveau` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_stagiaires`
--

INSERT INTO `t_stagiaires` (`code`, `nom`, `date_nsce`, `lieu_nsce`, `nationalite`, `ecole`, `filiere`, `niveau`, `type`) VALUES
('7845', 'JOHN Doe', '2024-09-01', 'USA', 'USA', 'ISP', 'IDE', '2', 'eleve'),
('1478', 'KAKALE ', '2024-04-01', 'Niamey', 'NIGER', 'ENESP Niamey', 'TSI', '2 année', 'Etudiant');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
