-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 28 Août 2015 à 01:27
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `hightechonline`
--
CREATE DATABASE IF NOT EXISTS `hightechonline` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `hightechonline`;

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `img` varchar(255) NOT NULL,
  `prix` float NOT NULL,
  `stock` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `actif` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `articles`
--

INSERT INTO `articles` (`id`, `name`, `description`, `img`, `prix`, `stock`, `category_id`, `created_at`, `updated_at`, `actif`) VALUES
(1, 'Volkswagen Tiguan', 'Marque : 	Volkswagen\r\nModèle : 	Tiguan\r\nAnnée-modèle : 	2011\r\nKilométrage : 	210 000 KM\r\nCarburant : 	Diesel\r\nBoîte de vitesse : 	Manuelle\r\nRéférence : 	rs2074278321', 'volkswagen-tiguan', 12350, 1, 1, '2015-08-26 07:48:47', '2015-08-27 21:50:12', 1),
(2, 'Audi q5', 'Marque : 	Audi\r\nModèle : 	Q5\r\nAnnée-modèle : 	2014\r\nKilométrage : 	20 250 KM\r\nCarburant : 	Diesel\r\nBoîte de vitesse : 	Automatique', 'audi-q5', 56500, 5, 1, '2015-08-26 07:48:47', NULL, 1),
(5, '600 CBR Honda', 'Vends 600 CBR de 97 pc31A avec 59800km.\r\nJe possède cette moto depuis 7 ans, très bien entretenue et aucun soucis avec. Cet été j''ai fait 3 journées pistes (environ 400km), j''ai chuté côté gauche au circuit carole, la fourche présente une légère déformation et la fixation avant gauche du moteur est cassée (voir photo) peut être ressoudée par un pro. Lors de cette chute la moto avait des polys, donc les carénages d''origine ne sont pas cassé mais ne sont pas nickel nonplus.\r\nLe moteur tourne parfaitement et tout fonctionne parfaitement', '600-cbr', 1000, 2, 2, '2015-08-26 08:02:21', '2015-08-27 15:08:59', 1),
(6, 'XMAX ABS 125 ', 'Vends XMAX 125 ABS année 2012 (cause obtention permis moto) - 16 700 kms avec jupe de protection,top case, poignées chauffantes et support chargeur GPS ', 'yamaha-xmax-125-abs', 2990, 4, 2, '2015-08-26 08:02:21', '2015-08-27 22:56:40', 1),
(7, 'SONY VAIO I CORE 7', 'PC Portable Sony VAIO Haut de gamme I7 SVS1311D4E\r\nPc remis à neuf par un professionnel et près à l''emploi.\r\nIl fonctionne très bien sous windows 7 64Bits Originale\r\nJe rajoute le pack office 2007 et l''antivirus\r\nAinsi que les logiciels: VLC, Adobe reader DC, Google Chrome, 7Zip.\r\nExcellent confort d''utilisation.', 'sony-vaio', 600, 12, 3, '2015-08-26 08:12:58', NULL, 1),
(8, 'Apple iMac Intel Quad Core i5 à 2,66 GHz 27', 'vend Imac bon état général.\r\nDatant de 2009 il a été amélioré via l''augmentation de la mémoire vive à 8Go (au lieu de 4)\r\nDéfaut : le lecteur CD n''est plus fonctionnel ', 'apple-imac-intel-core-2', 1000, 4, 3, '2015-08-26 08:12:58', NULL, 1),
(9, 'Samsung s4', 'Bonjour je mais en vente mon Samsung s4 encore GARANTIE 1moi facture avec , en très bonne état pas de rayure sur l''écran.\r\n\r\nchargeur fournis avec chargeur neuf encore dans sa boite .\r\n\r\nemei du téléphone disponible sur demande .\r\n\r\n190euro prix fixe .\r\ncordialement . ', 'samsung-s4', 190, 20, 4, '2015-08-26 08:18:01', NULL, 1),
(10, 'iPhone 6 blanc 64Go', 'Très bon état. Débloqué.\r\nVendu complet dans sa boîte. Câble + prise secteur + EarPods non ouverts.\r\nGarantie jusqu''au 31/12/15. ', 'iphone6', 600, 17, 4, '2015-08-26 08:18:01', '2015-08-27 14:06:44', 1),
(11, 'LG g3', 'Bonjour,\r\nlg g3 très propre, zéro rayures, zéro égratignures débloqué et compatible 4g avec une mémoire de 16go.\r\nVendu avec boîte, chargeur et kit main libre ', 'lg-g3', 259, 11, 4, '2015-08-26 08:22:58', NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`id`, `title`) VALUES
(1, 'voitures'),
(2, 'motos'),
(3, 'informatique'),
(4, 'téléphonie');

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

CREATE TABLE IF NOT EXISTS `commandes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `date_achat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `rue` varchar(255) NOT NULL,
  `code_postal` varchar(5) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `infos` varchar(255) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `montant_total` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `commandes`
--

INSERT INTO `commandes` (`id`, `user_id`, `date_achat`, `rue`, `code_postal`, `ville`, `infos`, `updated_at`, `montant_total`) VALUES
(2, 2, '2015-08-27 13:51:13', '10, avenue de chateau', '94300', 'vincennes', 'Escalier B', NULL, 12350),
(3, 2, '2015-08-27 14:06:44', '15, rue de paris', '93100', 'Montreuil', 'Esacalier C', NULL, 4790),
(4, 2, '2015-08-27 15:08:59', '4, rue de paris', '75005', 'paris', 'escalier F', NULL, 14350),
(5, 2, '2015-08-27 22:56:40', '12 boulevard de Vincennes', '94120', 'Fontenay-sous-bois', '', NULL, 5980);

-- --------------------------------------------------------

--
-- Structure de la table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `date_debut` datetime NOT NULL,
  `date_fin` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `events`
--

INSERT INTO `events` (`id`, `title`, `date_debut`, `date_fin`, `created_at`, `updated_at`) VALUES
(1, 'Auto Moto event', '2015-08-27 00:19:18', '2015-08-28 23:50:00', '2015-08-26 18:29:03', NULL),
(2, 'World Auto event', '2015-08-27 01:18:23', '2015-08-27 17:20:59', '2015-08-26 08:29:03', NULL),
(3, 'Multimedia event', '2015-08-27 09:14:32', '2015-08-27 16:24:38', '2015-08-26 08:36:15', NULL),
(4, 'Allo event', '2015-08-28 12:13:31', '2015-08-28 18:17:13', '2015-08-26 08:36:15', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `event_article`
--

CREATE TABLE IF NOT EXISTS `event_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `event_id` (`event_id`,`article_id`),
  KEY `article_id` (`article_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `event_article`
--

INSERT INTO `event_article` (`id`, `event_id`, `article_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2015-08-26 08:29:51', NULL),
(2, 2, 2, '2015-08-26 08:29:51', NULL),
(3, 1, 5, '2015-08-26 08:31:22', NULL),
(4, 1, 6, '2015-08-26 08:31:22', NULL),
(5, 3, 8, '2015-08-26 08:37:16', NULL),
(6, 4, 9, '2015-08-26 08:37:16', NULL),
(7, 3, 10, '2015-08-26 08:37:37', NULL),
(8, 4, 11, '2015-08-26 08:37:37', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `lignes_commandes`
--

CREATE TABLE IF NOT EXISTS `lignes_commandes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `commande_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `commande_id` (`commande_id`,`article_id`),
  KEY `article_id` (`article_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `lignes_commandes`
--

INSERT INTO `lignes_commandes` (`id`, `commande_id`, `article_id`) VALUES
(1, 2, 1),
(2, 3, 6),
(3, 3, 10),
(4, 4, 1),
(5, 4, 5),
(6, 5, 6);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(60) NOT NULL,
  `is_admin` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `actif` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0 => inactif || 1 => actif',
  `in_newsletter` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `is_admin`, `created_at`, `updated_at`, `actif`, `in_newsletter`) VALUES
(1, 'admin', 'admin@test.fr', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, '2015-08-25 08:21:07', '0000-00-00 00:00:00', 1, 0),
(2, 'user', 'user@test.fr', '12dea96fec20593566ab75692c9949596833adc9', 0, '2015-08-25 08:21:07', '2015-08-27 21:54:43', 1, 0),
(4, 'user3', 'user3@test.fr', '0b7f849446d3383546d15a480966084442cd2193', 0, '2015-08-25 12:15:48', NULL, 1, 0),
(5, 'user4', 'user4@test.fr', '06e6eef6adf2e5f54ea6c43c376d6d36605f810e', 0, '2015-08-25 12:28:33', NULL, 1, 0),
(6, 'user2', 'user2@yahoo.fr', 'a1881c06eec96db9901c7bbfe41c42a3f08e9cb4', 0, '2015-08-25 12:39:02', '2015-08-26 07:27:49', 1, 1);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Contraintes pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `commandes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `event_article`
--
ALTER TABLE `event_article`
  ADD CONSTRAINT `event_article_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`),
  ADD CONSTRAINT `event_article_ibfk_2` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`);

--
-- Contraintes pour la table `lignes_commandes`
--
ALTER TABLE `lignes_commandes`
  ADD CONSTRAINT `lignes_commandes_ibfk_1` FOREIGN KEY (`commande_id`) REFERENCES `commandes` (`id`),
  ADD CONSTRAINT `lignes_commandes_ibfk_2` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
