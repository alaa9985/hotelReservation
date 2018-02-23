-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 23 Février 2018 à 21:02
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `hoteldb`
--

-- --------------------------------------------------------

--
-- Structure de la table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` enum('Conference','Seminaire','Mariage') COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `heure` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lieu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Contenu de la table `event`
--

INSERT INTO `event` (`id`, `type`, `date`, `heure`, `lieu`, `description`) VALUES
(2, 'Seminaire', '2016-01-21', '10:00', 'Salle Ibn Badis', 'SÃ©minaire mÃ©dical sur la pÃ©diatrie.'),
(5, 'Conference', '2016-02-10', '16:00', 'Salle Ahmed Bey', 'ConfÃ©rence Fikra sur les nouvelles technologies'),
(8, 'Conference', '2016-02-17', '10:00', 'Salle Ahmed Bey', 'ConfÃ©rence sur l''islam');

-- --------------------------------------------------------

--
-- Structure de la table `room`
--

CREATE TABLE IF NOT EXISTS `room` (
  `room_num` int(11) NOT NULL,
  `roomtype` enum('Deluxe','Double','Triple','Suite','Quadruple') NOT NULL,
  `description` longtext NOT NULL,
  PRIMARY KEY (`room_num`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `room`
--

INSERT INTO `room` (`room_num`, `roomtype`, `description`) VALUES
(1, 'Suite', 'Vue sur mer, Chambre suite,'),
(23, 'Quadruple', 'Vue sur jardin'),
(24, 'Quadruple', 'Vue sur jardin, 1 Lit double, 2 Lit single'),
(111, 'Deluxe', 'Vue sur jardin, Lit double'),
(112, 'Deluxe', 'Vue sur mer, Lit double'),
(113, 'Deluxe', 'Non-fumeur, Lit double'),
(114, 'Deluxe', '2 Lit single'),
(115, 'Deluxe', 'Vue sur jardin, Lit double'),
(116, 'Deluxe', 'Lit double'),
(124, 'Quadruple', 'Vue sur jardin, 1 Lit double, 2 Lit single'),
(145, 'Triple', 'Non-fumeur, Vue sur jardin ');

-- --------------------------------------------------------

--
-- Structure de la table `room_booked`
--

CREATE TABLE IF NOT EXISTS `room_booked` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `room_num` int(11) NOT NULL,
  `dor` date NOT NULL,
  `dco` date NOT NULL,
  `id_client` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `room_num` (`room_num`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=61 ;

--
-- Contenu de la table `room_booked`
--

INSERT INTO `room_booked` (`id`, `room_num`, `dor`, `dco`, `id_client`) VALUES
(2, 114, '2014-06-01', '2014-06-06', '0'),
(3, 116, '2014-06-08', '2014-06-11', '0'),
(19, 116, '2014-06-01', '2014-06-06', '0'),
(20, 115, '2014-06-01', '2014-06-06', '0'),
(21, 112, '2014-06-01', '2014-06-06', '0'),
(22, 111, '2014-06-01', '2014-06-06', '0'),
(23, 113, '2014-06-01', '2014-06-06', '0'),
(24, 116, '2014-06-06', '2014-06-08', '0'),
(25, 111, '2014-06-06', '2014-06-08', '0'),
(26, 114, '2014-06-06', '2014-06-16', '0'),
(27, 115, '2014-06-06', '2014-06-16', '0'),
(28, 112, '2014-06-06', '2014-06-16', '0'),
(29, 113, '2014-06-06', '2014-06-16', '0'),
(30, 111, '2014-06-11', '2014-06-14', '0'),
(31, 116, '2014-06-11', '2014-06-14', '0'),
(32, 111, '2016-02-19', '2016-04-12', '0'),
(33, 113, '2016-01-05', '2016-01-14', '0'),
(34, 116, '2016-01-05', '2016-01-14', '0'),
(50, 145, '2016-02-11', '2016-02-18', 'hakou'),
(51, 24, '2016-02-12', '2016-02-17', 'wissi'),
(52, 124, '2016-02-12', '2016-02-17', 'wissi'),
(54, 23, '2016-02-12', '2016-02-25', 'alilou'),
(55, 24, '2016-02-01', '2016-02-06', 'yasmina'),
(59, 145, '2016-03-27', '2016-03-31', 'douniazed'),
(60, 145, '2016-02-19', '2016-02-26', 'douniazed');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `dateNaissance` date NOT NULL,
  `sexe` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `pays` varchar(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `preferences` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `dateNaissance`, `sexe`, `adresse`, `pays`, `pseudo`, `email`, `password`, `preferences`) VALUES
(4, 'CHEROUANA', 'Wissem', '1993-08-24', 'Femme', 'Constantine', 'DZ', 'wess25', 'cw_cherouana@esi.dz', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '%Non-Fumeur%'),
(5, 'Salah Salah', 'Bochra', '1993-11-04', 'Femme', 'Guelma', 'DZ', 'bochra', 'cb_salah@esi.dz', '70c881d4a26984ddce795f6f71817c9cf4480e79', ''),
(6, 'CHEROUANA', 'Fakhreddine', '1991-12-01', 'Homme', 'Constantine', 'DZ', 'fakhroutiti', 'fakhroutiti@gmail.fr', '6a9e41a071756cab485f6406f381a277ef730207', '%Vue sur jardin%Lit double%'),
(7, 'KHALDI', 'Hadjer', '1994-02-13', 'Femme', 'Kouba', 'DZ', 'hadjouchka', 'ch_khaldi@esi.dz', '70c881d4a26984ddce795f6f71817c9cf4480e79', ''),
(8, 'BOUHANIKA', 'Salima', '1968-08-31', 'Femme', 'Constantine', 'DZ', 'salima25', 'salima25@hotmail.com', '7e240de74fb1ed08fa08d38063f6a6a91462a815', ''),
(11, 'RAFED', 'Wassila', '1993-04-23', 'Femme', 'Bouira', 'DZ', 'sila', 'cw_rafed@esi.dz', 'dde41f08d51c21a9c2774c36c630330f10bc2426', ''),
(14, 'Bahri', 'Abdelhak', '1993-03-12', 'Femme', 'Oran', 'DZ', 'hakou', 'ca_bahri@esi.dz', '122bad0581cf07d09cbee14e7f4c94ee3d4cdf93', '-Non-Fumeur-Vue sur jardin'),
(15, 'CHEROUANA', 'Allaoua', '1954-01-02', 'Homme', 'Constantine', 'DZ', 'alilou', 'all_cherouana@yahoo.fr', '7e240de74fb1ed08fa08d38063f6a6a91462a815', '%Vue sur jardin%'),
(16, 'DJIDEL', 'Yasmina', '1993-03-08', 'Femme', 'Alger', 'DZ', 'yasmina', 'cy_djidel@esi.dz', '606ec6e9bd8a8ff2ad14e5fade3f264471e82251', '%Vue sur jardin%Lit double%'),
(17, 'Nouicer', 'Douniazed', '1993-09-06', 'Femme', 'Constantine', 'DZ', 'douniazed', 'douniazed@hotmail.com', '7e240de74fb1ed08fa08d38063f6a6a91462a815', '%Non-Fumeur%'),
(18, 'HACHANI', 'Ala eddine', '1994-04-28', 'Homme', 'citÃ© ahmed saidi ', 'DZ', 'alaa9985', 'da_hachani@esi.dz', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `room_booked`
--
ALTER TABLE `room_booked`
  ADD CONSTRAINT `room_booked_ibfk_1` FOREIGN KEY (`room_num`) REFERENCES `room` (`room_num`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
