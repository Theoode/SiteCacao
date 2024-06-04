-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 04 juin 2024 à 07:46
-- Version du serveur : 8.3.0
-- Version de PHP : 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de données : `sitecacao`
--
CREATE DATABASE IF NOT EXISTS `sitecacao` DEFAULT CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci;
USE `sitecacao`;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id_client` int NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `age` int NOT NULL,
  `email` varchar(50) NOT NULL,
  `tel` varchar(50) NOT NULL,
  `date_inscription` datetime DEFAULT NULL,
  `motdepasse` varchar(50) NOT NULL,
  `Sexe` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_client`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id_commande` int NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  `date_commande` datetime DEFAULT NULL,
  `adr_livraison` varchar(50) DEFAULT NULL,
  `adr_facturation` varchar(50) DEFAULT NULL,
  `code_postal` int DEFAULT NULL,
  `code_postal_facturation` int DEFAULT NULL,
  `id_client` int DEFAULT NULL,
  `id_panier` int NOT NULL,
  PRIMARY KEY (`id_commande`),
  UNIQUE KEY `id_panier` (`id_panier`),
  KEY `id_client` (`id_client`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `paiement`
--

DROP TABLE IF EXISTS `paiement`;
CREATE TABLE IF NOT EXISTS `paiement` (
  `id_paiement` int NOT NULL,
  `date_paiement` datetime DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `id_commande` int NOT NULL,
  PRIMARY KEY (`id_paiement`),
  UNIQUE KEY `id_commande` (`id_commande`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id_produit` int NOT NULL AUTO_INCREMENT,
  `description` varchar(500) DEFAULT NULL,
  `prix` double DEFAULT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `photo` text,
  `detail` text,
  PRIMARY KEY (`id_produit`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id_produit`, `description`, `prix`, `nom`, `photo`, `detail`) VALUES
(1, 'cacao trinitario', 12, 'Trinitario', 'https://img-3.journaldesfemmes.fr/MQayPLMxDLSVhYxdSpOegdtP7eQ=/1500x/smart/0f46149452e249c19853cb26272846b0/ccmcms-jdf/36993172.jpg', 'pas de detail'),
(2, 'cacao forastero', 10, 'Forastero', 'https://cdn.futura-sciences.com/sources/images/dossier/753/3-753.jpg', 'aucun'),
(3, 'criolo', 25, 'criolo', 'https://www.malindo.fr/cdn/shop/articles/les-bienfaits-de-la-feve-de-cacao-382430_1000x1000.jpg?v=1670618539', 'criolo'),
(4, 'classic', 5, 'classic', 'https://shouka-chamonix.fr/wp-content/uploads/2021/01/Cabosses-scaled.jpg', 'classic');
COMMIT;