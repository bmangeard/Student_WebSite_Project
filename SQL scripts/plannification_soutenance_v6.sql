-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 24 Novembre 2017 à 14:22
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `plannification_soutenance`
--

-- --------------------------------------------------------

--
-- Structure de la table `enseignant`
--

CREATE TABLE `enseignant` (
  `ID_ENS` int(11) NOT NULL,
  `EMAIL_ENS` varchar(100) NOT NULL,
  `MDP_ENS` varchar(60) NOT NULL,
  `PRENOM_ENS` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `enseignant`
--

INSERT INTO `enseignant` (`ID_ENS`, `EMAIL_ENS`, `MDP_ENS`, `PRENOM_ENS`) VALUES
(1, 'jean.pleure@esigelec.fr', '$2y$10$7lxfqhhvztlnNMtf4/rNUe13HV3CDz3PoKx2BDVJYPWxWCicPM3t2', 'jean'),
(2, 'un.deux@esigelec.fr', '$2y$10$1FreeFYx6Qz9Se/NbT/z4exHEj11Fwwj2Jn0EnO.yhoFLdgSkBpAC', 'un');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `ID_ETU` int(11) NOT NULL,
  `PRENOM_ETU` varchar(50) NOT NULL,
  `NOM_ETU` varchar(50) NOT NULL,
  `EMAIL_ETU` varchar(100) NOT NULL,
  `MDP_ETU` varchar(60) NOT NULL,
  `GROUP_ETU` int(11) NOT NULL,
  `CLASS_ETU` varchar(20) NOT NULL,
  `ID_SOU_ETU` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `etudiant`
--

INSERT INTO `etudiant` (`ID_ETU`, `PRENOM_ETU`, `NOM_ETU`, `EMAIL_ETU`, `MDP_ETU`, `GROUP_ETU`, `CLASS_ETU`, `ID_SOU_ETU`) VALUES
(1, '0', '0', '0', '0', 0, '0', 0),
(2, '0', '0', '0', '0', 0, '0', 0),
(3, '0', '0', '0', '0', 0, '0', 0),
(4, '0', '0', '0', '0', 0, '0', 0),
(5, '0', '0', '0', '0', 0, '0', 0),
(6, '0', '0', '0', '0', 0, '0', 0),
(7, '0', '0', '0', '0', 0, '0', 0),
(8, '0', '0', '0', '0', 0, '0', 0),
(9, '0', '0', '0', '0', 0, '0', 0),
(10, '0', '0', '0', '0', 0, '0', 0),
(11, '0', '0', '0', '0', 0, '0', 0),
(12, '0', '0', '0', '0', 0, '0', 0),
(13, '0', '0', '0', '0', 0, '0', 0),
(14, '0', '0', '0', '0', 0, '0', 0),
(15, '0', '0', '0', '0', 0, '0', 0),
(16, '0', '0', '0', '0', 0, '0', 0),
(17, '0', '0', '0', '0', 0, '0', 0),
(18, '0', '0', '0', '0', 0, '0', 0),
(19, '0', '0', '0', '0', 0, '0', 0),
(20, '0', '0', '0', '0', 0, '0', 0),
(21, '0', '0', '0', '0', 0, '0', 0),
(22, '0', '0', '0', '0', 0, '0', 0),
(23, '0', '0', '0', '0', 0, '0', 0),
(24, '0', '0', '0', '0', 0, '0', 0);

-- --------------------------------------------------------

--
-- Structure de la table `soutenance`
--

CREATE TABLE `soutenance` (
  `ID_SOU` int(11) NOT NULL,
  `NOM_SOU` varchar(60) NOT NULL,
  `DATE_SOU` date NOT NULL,
  `HEURE_SOU` time NOT NULL,
  `LIMITE_SOU` date NOT NULL,
  `CHOIX_SOU` tinyint(1) NOT NULL,
  `GROUPE_SOU` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `soutenance`
--

INSERT INTO `soutenance` (`ID_SOU`, `NOM_SOU`, `DATE_SOU`, `HEURE_SOU`, `LIMITE_SOU`, `CHOIX_SOU`, `GROUPE_SOU`) VALUES
(1, '0', '2000-01-01', '00:00:00', '2000-01-01', 0, 0),
(2, '0', '2000-01-01', '00:00:00', '2000-01-01', 0, 0),
(3, '0', '2000-01-01', '00:00:00', '2000-01-01', 0, 0),
(4, '0', '2000-01-01', '00:00:00', '2000-01-01', 0, 0),
(5, '0', '2000-01-01', '00:00:00', '2000-01-01', 0, 0),
(6, '0', '2000-01-01', '00:00:00', '2000-01-01', 0, 0),
(7, '0', '2000-01-01', '00:00:00', '2000-01-01', 0, 0),
(8, '0', '2000-01-01', '00:00:00', '2000-01-01', 0, 0),
(9, '0', '2000-01-01', '00:00:00', '2000-01-01', 0, 0),
(10, '0', '2000-01-01', '00:00:00', '2000-01-01', 0, 0),
(11, '0', '2000-01-01', '00:00:00', '2000-01-01', 0, 0),
(12, '0', '2000-01-01', '00:00:00', '2000-01-01', 0, 0);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `enseignant`
--
ALTER TABLE `enseignant`
  ADD PRIMARY KEY (`ID_ENS`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`ID_ETU`);

--
-- Index pour la table `soutenance`
--
ALTER TABLE `soutenance`
  ADD PRIMARY KEY (`ID_SOU`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `enseignant`
--
ALTER TABLE `enseignant`
  MODIFY `ID_ENS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `ID_ETU` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT pour la table `soutenance`
--
ALTER TABLE `soutenance`
  MODIFY `ID_SOU` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
