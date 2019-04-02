-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3307
-- Généré le :  mar. 02 avr. 2019 à 17:03
-- Version du serveur :  10.3.12-MariaDB
-- Version de PHP :  7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `demo`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categorie` varchar(255) COLLATE utf8_bin NOT NULL,
  `id_regle` int(11) NOT NULL,
  `commentaire` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `categorie`, `id_regle`, `commentaire`) VALUES
(1, '1', 1, 'Engins de moins de 6 tonnes'),
(2, '2', 1, NULL),
(3, '3', 1, NULL),
(4, '4', 1, NULL),
(5, '5', 1, NULL),
(6, '6', 1, NULL),
(7, '7', 1, NULL),
(8, '8', 1, NULL),
(9, '9', 1, NULL),
(10, '10', 1, NULL),
(11, 'GMA', 2, NULL),
(12, 'GME', 2, NULL),
(13, 'A', 3, NULL),
(14, 'B', 3, NULL),
(15, '1', 4, NULL),
(16, '2', 4, NULL),
(17, '3', 4, NULL),
(18, '4', 4, NULL),
(19, '5', 4, NULL),
(20, 'bras', 8, NULL),
(21, 'Avec Telecommande', 5, NULL),
(22, 'Sans Telecommande', 5, NULL),
(23, 'porte', 10, NULL),
(24, 'pont roulant a telecommande filaire', 6, NULL),
(25, 'pont roulant a telecommande non filaire', 6, NULL),
(26, 'pont roulant sans telecommande', 6, NULL),
(27, 'Benne a Ordures Menageres', 7, NULL),
(28, 'Hayon Repliable', 9, NULL),
(29, 'Hayon rétractable', 9, NULL),
(30, 'Hayon Rabattable', 9, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

DROP TABLE IF EXISTS `question`;
CREATE TABLE IF NOT EXISTS `question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(255) COLLATE utf8_bin NOT NULL,
  `verif` varchar(50) COLLATE utf8_bin NOT NULL,
  `id_titre` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `question`
--

INSERT INTO `question` (`id`, `question`, `verif`, `id_titre`) VALUES
(1, 'M&eacute;cano-soudure', 'V', 4),
(2, 'Boulonnerie', 'V', 4),
(3, 'Articulations', 'V', 4),
(4, 'V&amp;eacute;rin(s) de direction', 'V', 4),
(5, 'V&amp;eacute;rin(s) de stabilisation', 'V', 4),
(6, 'Patins de stabilisation', 'V', 4),
(7, 'Pneumatiques (conformit&amp;eacute; constat&amp;eacute;e)', 'V', 38),
(8, 'Jantes', 'V', 38),
(9, 'Train de roulement complet', 'V', 38),
(10, 'Ponts diff&amp;eacute;rentiels', 'V', 37),
(11, 'Freins- dispositifs d\'arr&amp;ecirc;t', 'V', 37),
(12, 'Cardans', 'V', 37),
(13, 'Freins- dispositif d\'arr&amp;ecirc;t', 'V', 37),
(14, 'Boite de transfert', 'V', 37),
(15, 'M&amp;eacute;cano-soudure', 'V', 14),
(16, 'Articulations axes bagues', 'V', 14),
(17, 'Boulonnerie', 'V', 14),
(18, 'V&amp;eacute;rin(s) d\'&amp;eacute;quipement', 'V', 14),
(19, 'Liaison raccordements', 'V', 14),
(20, 'Outils', 'V', 14),
(21, 'Fixation de l\'outil', 'V', 14),
(22, 'Protection', 'V', 14),
(23, 'Couronne d\'orientation', 'VF', 20),
(24, 'Syst&amp;egrave;me d\'orientation', 'VF', 20),
(25, 'Immobilisation tourelle', 'VF', 20),
(26, 'Garde-corps', 'VF', 20),
(27, 'Protections ( capotages)', 'VF', 18),
(28, 'Isolation phonique', 'VF', 18),
(29, 'Moteur(s) thermiques(s)', 'VF', 18),
(30, 'Moyen d\'acces', 'VF', 29),
(31, 'Contacteur de d&amp;eacute;marrage', 'VF', 23),
(32, 'Frein de service', 'VF', 23),
(33, 'Fixations', 'VF', 13),
(34, ' structure de protection en cas de retournement ', 'VF', 13),
(35, 'Structure de protection contre les chutes ...', 'VF', 13),
(36, 'Batterie(s)', 'VF', 12),
(37, 'Arr&amp;ecirc;t d\'urgence', 'VF', 12),
(38, 'Chassis, capots, &amp;eacute;clairage, &amp;eacute;chappement...', 'VL', 1),
(39, 'Poste de conduite(si&amp;egrave;ge, prot&amp;egrave;ge conducteur,', 'VL', 1),
(40, ' dispositif de remplissage carburant et/;ou ;r&amp;eacute;cipient gpl...', 'VF.L', 1),
(41, 'Dispositifs de coupure sur circuit gpl&amp;hellip;', 'VF.L', 1),
(42, 'Consignes de s&amp;eacute;curit&amp;eacute;&amp;hellip;', 'VF.L', 1),
(43, ' m&amp;eacute;canisme, m&amp;acirc;t, fl&amp;egrave;che, galets....', 'VF.L', 35),
(44, 'C&amp;acirc;bles, chaines...', 'VF.L', 35),
(45, 'Poulies...', 'VF.L', 35),
(46, ' circuits hydrauliques', 'VF.L', 35),
(47, ' tablier (taquets, but&amp;eacute;es)..', 'VF.L', 35),
(48, ' dispositif de pr&amp;eacute;hension suivant options (fourches et/ou &amp;eacute;quipement)..', 'VF.L', 35),
(49, ' protections contre les chutes de charges (dosseret)', 'VF.L', 35),
(50, ' moteur (propret&amp;eacute;)&amp;hellip;', 'VF.L', 30),
(51, 'Batteries de traction ou de d&amp;eacute;marrage', 'VF.L', 30),
(52, 'Niveaux', 'VF.L', 30),
(53, '&amp;eacute;quipement divers (filtre, alternateur, &amp;eacute;chappement&amp;hellip;)', 'VF.L', 30),
(54, 'Consignes de s&amp;eacute;curit&amp;eacute;', 'VF.L', 29),
(55, ' plaque de charge', 'VF.L', 29),
(56, 'Dispositif d&amp;acute;arr&amp;ecirc;t', 'VF.L', 29),
(57, 'Voyants, indicateurs, manom&amp;egrave;tres', 'VF.L', 29),
(58, ' horam&amp;egrave;tre', 'VF.L', 29),
(59, 'Avertisseur', 'VF.L', 29),
(60, 'Commandes (pictogrammes, jeu, retour neutre)', 'VF.L', 29),
(61, 'Arr&amp;ecirc;t d&amp;acute;urgence', 'VF.L', 29),
(62, 'Coupe batterie', 'VF.L', 29),
(63, '&amp;eacute;clairage (fonctionnement)&amp;hellip;', 'VF.L', 29),
(64, ' ceinture de s&amp;eacute;curit&amp;eacute;', 'VF.L', 29),
(65, 'Marche avant, marche arri&amp;egrave;re, transmission', 'VF.L', 15),
(66, 'Frein de stationnement', 'VF.L', 15),
(67, 'Frein &amp;agrave; pied', 'VF.L', 15),
(68, ' frein d&amp;acute;approche', 'VF.L', 15),
(69, 'Direction (ou timon)', 'VF.L', 15),
(70, 'Dispositif de s&amp;eacute;curit&amp;eacute; (homme mort)', 'VF.L', 15),
(71, 'Fonctionnement du syst&amp;egrave;me de levage', 'VF.L', 15),
(72, 'Limiteur de course', 'VF.L', 15),
(73, 'Indicateur de surcharge', 'VF.L', 15),
(74, 'Limiteur de charge', 'VF.L', 15),
(75, 'Limiteur de descente', 'VF.L', 15),
(76, 'Fonctionnement des options', 'VF.L', 15),
(77, 'Essais d&amp;acute;affaissement', 'VF.L', 15);

-- --------------------------------------------------------

--
-- Structure de la table `questionnaire`
--

DROP TABLE IF EXISTS `questionnaire`;
CREATE TABLE IF NOT EXISTS `questionnaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8_bin NOT NULL,
  `questions` text COLLATE utf8_bin NOT NULL,
  `id_regle` int(11) NOT NULL,
  `commentaire` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nom` (`nom`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `questionnaire`
--

INSERT INTO `questionnaire` (`id`, `nom`, `questions`, `id_regle`, `commentaire`) VALUES
(5, 'R389', '{\"A\":{\"commentaire\":\"Standard\",\"titre-A\":\"1\",\"question-A1\":\"40\",\"question-A2\":\"38\",\"question-A3\":\"42\",\"question-A4\":\"41\",\"question-A5\":\"39\"},\"B\":{\"titre-B\":\"35\",\"question-B1\":\"46\",\"question-B2\":\"48\",\"question-B3\":\"43\",\"question-B4\":\"49\",\"question-B5\":\"47\",\"question-B6\":\"44\",\"question-B7\":\"45\"},\"C\":{\"titre-C\":\"30\",\"question-C1\":\"50\",\"question-C2\":\"53\",\"question-C3\":\"52\",\"question-C4\":\"51\"},\"D\":{\"titre-D\":\"29\",\"question-D1\":\"64\",\"question-D2\":\"58\",\"question-D3\":\"55\",\"question-D4\":\"63\",\"question-D5\":\"61\",\"question-D6\":\"59\",\"question-D7\":\"60\",\"question-D8\":\"54\",\"question-D9\":\"62\",\"question-D10\":\"56\",\"question-D11\":\"30\",\"question-D12\":\"57\"},\"E\":{\"titre-E\":\"15\",\"question-E1\":\"68\",\"question-E2\":\"69\",\"question-E3\":\"70\",\"question-E4\":\"77\",\"question-E5\":\"76\",\"question-E6\":\"71\",\"question-E7\":\"67\",\"question-E8\":\"66\",\"question-E9\":\"73\",\"question-E10\":\"74\",\"question-E11\":\"72\",\"question-E12\":\"75\",\"question-E13\":\"65\"}}', 4, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `regle`
--

DROP TABLE IF EXISTS `regle`;
CREATE TABLE IF NOT EXISTS `regle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `regle` varchar(255) COLLATE utf8_bin NOT NULL,
  `commentaire` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `regle`
--

INSERT INTO `regle` (`id`, `regle`, `commentaire`) VALUES
(1, 'R372M', 'Engins de Chantiers'),
(2, 'R377', NULL),
(3, 'R386', NULL),
(4, 'R389', NULL),
(5, 'R390', NULL),
(6, 'R423', NULL),
(7, 'R437', NULL),
(8, 'bras', NULL),
(9, 'hayons', NULL),
(10, 'porte', NULL),
(26, 'R383', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `titre`
--

DROP TABLE IF EXISTS `titre`;
CREATE TABLE IF NOT EXISTS `titre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `titre`
--

INSERT INTO `titre` (`id`, `titre`) VALUES
(1, 'ASPECT_EXTERIEUR'),
(2, 'BATI_STRUCTURE'),
(3, 'CABINE PORTEUR'),
(4, 'CHASSIS-TOURELLE'),
(5, 'CHASSIS-TOURELLE-STRUCTURE'),
(6, 'DIMENSIONS '),
(7, 'DISPOSITIF D\'ARRET ET MAINTIEN EN CHARGE'),
(8, 'DISPOSITIF INDICATEUR DE SURCHARGE'),
(9, 'DISPOSITIFS D&acute; ARRET'),
(10, 'DISPOSITIFS DE SECURITE'),
(11, 'DOCUMENTATION'),
(12, 'ELECTRICITE'),
(13, 'ELEMENTS DE PROTECTION'),
(14, 'EQUIPEMENT'),
(15, 'ESSAIS DE FONCTIONNEMENT'),
(16, 'FONCTIONNEMENT'),
(17, 'FONCTIONNEMENT SECURITE'),
(18, 'GROUPE DE PUISSANCE'),
(19, 'IDENTIFICATION PLAQUES '),
(20, 'LIAISON CHASSIS-TOURELLE'),
(21, 'LIAISONS ELECTRIQUES'),
(22, 'MARQUAGE ET NOTICE'),
(23, 'ORGANES DE COMMANDE'),
(24, 'PLAQUES INDICATRICES'),
(25, 'POSTE DE CONDUITE BAS'),
(26, 'POSTE DE CONDUITE HAUT'),
(27, 'POSTE_ARRIERE'),
(28, 'POSTE_DE_COMMANDES'),
(29, 'POSTE_DE_CONDUITE'),
(30, 'SOUS CAPOTS'),
(31, 'SPECIFIQUE AU CHARIOT A POSTE DE CONDUITE ELEVABLE'),
(32, 'STRUCTURE'),
(33, 'SYSTEME DE SECURITE'),
(34, 'SYSTEME_DE_COMPACTAGE'),
(35, 'SYSTEME_DE_LEVAGE'),
(37, 'TRANSMISSION'),
(38, 'TRAIN PORTEUR');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
