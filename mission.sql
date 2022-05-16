-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3303
-- Généré le : lun. 16 mai 2022 à 10:37
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
-- Base de données : `mission`
--

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

DROP TABLE IF EXISTS `membre`;
CREATE TABLE IF NOT EXISTS `membre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `date_naissance` date NOT NULL,
  `nationalite` varchar(50) NOT NULL,
  `code` int(11) NOT NULL,
  `specialite` varchar(50) NOT NULL,
  `mission_attribue` int(11) NOT NULL,
  `categorie` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`id`, `nom`, `prenom`, `date_naissance`, `nationalite`, `code`, `specialite`, `mission_attribue`, `categorie`) VALUES
(1, 'Dupont', 'Damien', '1995-04-20', 'France', 1, 'infiltration', 3, 'cible'),
(2, 'Rodrigez', 'James', '1988-04-05', 'Espagne', 2, 'Aucune', 3, 'contact'),
(3, 'Perez', 'Fabrice', '1988-04-05', 'France', 3, 'Aucune', 3, 'contact'),
(18, 'Vlad', 'Himir', '2022-05-12', 'Russe', 4, 'hackeur', 3, 'agent'),
(19, 'Huk', 'Muller', '2022-05-12', 'Allemand', 5, 'Aucune', 1, 'cible'),
(20, 'Mae', 'Vas', '2022-05-12', 'Allemand', 6, 'sniper', 1, 'agent');

-- --------------------------------------------------------

--
-- Structure de la table `mission`
--

DROP TABLE IF EXISTS `mission`;
CREATE TABLE IF NOT EXISTS `mission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `code` int(11) NOT NULL,
  `pays` varchar(50) NOT NULL,
  `type` varchar(255) NOT NULL,
  `specialite_requis` varchar(50) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `statut` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `mission`
--

INSERT INTO `mission` (`id`, `nom`, `description`, `code`, `pays`, `type`, `specialite_requis`, `date_debut`, `date_fin`, `statut`) VALUES
(1, 'Tuer A', 'Vous devez vous rendre à Rome pour exécuter un contrat de surveillance. Vous devrez rester discret. La cible est un haut personnage de la Mafia italienne. Vous aurez à votre disposition tout les équipements nécessaire.', 1, 'Italie', 'surveillance', 'discretion', '2022-04-08', '2022-04-15', 'termine'),
(2, 'Tuer B', 'Description à venir.', 2, 'Russie', 'système', 'hack', '2022-04-08', '2022-04-15', 'cours'),
(3, 'Tuer C', 'Description à venir.', 3, 'France', 'assasinat', 'sniper', '2022-05-14', '2022-05-22', 'preparation'),
(4, 'Tuer D', 'Description à venir.', 4, 'Ukraine', 'surveillance', 'discretion', '2022-05-14', '2022-05-14', 'cours');

-- --------------------------------------------------------

--
-- Structure de la table `planque`
--

DROP TABLE IF EXISTS `planque`;
CREATE TABLE IF NOT EXISTS `planque` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adresse` varchar(50) NOT NULL,
  `pays` varchar(30) NOT NULL,
  `type` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `mission_attribue` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `planque`
--

INSERT INTO `planque` (`id`, `adresse`, `pays`, `type`, `code`, `mission_attribue`) VALUES
(1, '4 rue du réduit', 'France', 2, 1, 0),
(2, '8 chemin fetaud', 'Italie', 2, 2, 0),
(3, '32 chemin Bordes', 'France', 2, 3, 0),
(4, '7 rue Lefolle', 'Espagne', 2, 4, 0),
(5, 'Rue du 1test', 'France', 2, 5, 0),
(6, 'Rue du test', 'Allemagne', 2, 6, 0),
(7, '55 rue du marcot', 'Espagne', 5, 7, 0);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rang` int(11) NOT NULL,
  `date_creation` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `email`, `password`, `rang`, `date_creation`) VALUES
(1, 'Administrateur', 'Admin', 'admin@admin.fr', '$2y$10$pf5833h1AgSH.WZWH.OdgeDc/fBXRRa/ZWGS67yliDqals3KVBE.K', 2, '2022-05-04');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
