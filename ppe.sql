-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 07 avr. 2021 à 17:59
-- Version du serveur :  10.4.18-MariaDB
-- Version de PHP : 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

 DROP DATABASE IF EXISTS PPE;
 CREATE DATABASE PPE;
 USE PPE;
--
-- Base de données : `ppe`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `pass` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `pass`) VALUES
(1, 'Delacroix', 'ad.dela75020@gmail.com', '4f9996ad3b634ef65d772b702509236456662a35'),
(2, 'admin', 'admin@admin.fr', 'd033e22ae348aeb5660fc2140aec35850c4da997');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id_categorie` int(11) NOT NULL,
  `nom_categorie` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `nom_categorie`) VALUES
(1, 'Voiture'),
(2, 'Accessoires'),
(3, 'Bus'),
(4, 'Camion');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `ref_com` int(11) NOT NULL,
  `date_commande` date NOT NULL,
  `id_u` int(11) NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`ref_com`, `date_commande`, `id_u`, `total`) VALUES
(9, '2021-04-07', 1, 0),
(10, '2021-04-07', 1, 0),
(11, '2021-04-07', 1, 0),
(12, '2021-04-07', 1, 0),
(13, '2021-04-07', 1, 0),
(14, '2021-04-07', 1, 0),
(15, '2021-04-07', 15, 815.95);

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE `image` (
  `id_image` int(11) NOT NULL,
  `nom_image` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `image`
--

INSERT INTO `image` (`id_image`, `nom_image`) VALUES
(1, 'moteurAudi.jpg'),
(2, 'retro.jpg'),
(3, 'VolantVoiture.jpg'),
(4, 'downpipe.jpg'),
(5, 'jante.jpg'),
(6, 'pessi.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE `panier` (
  `id_produit` int(11) NOT NULL,
  `ref_com` int(11) NOT NULL,
  `qte` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `panier`
--

INSERT INTO `panier` (`id_produit`, `ref_com`, `qte`) VALUES
(1, 13, 2),
(1, 14, 1),
(2, 13, 1),
(4, 14, 1);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id_produit` int(11) NOT NULL,
  `nom_produit` varchar(128) NOT NULL,
  `p_motscles` varchar(280) NOT NULL,
  `description` varchar(255) NOT NULL,
  `qteProduit` int(6) NOT NULL,
  `prix` float NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `id_image` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id_produit`, `nom_produit`, `p_motscles`, `description`, `qteProduit`, `prix`, `id_categorie`, `id_image`) VALUES
(1, 'Moteur de Voiture Audi A3', 'Moteur;Voiture;Audi;A3;', 'Ceci est un moteur blablabla ', 1, 799, 1, 1),
(2, 'Rétroviseur Renault ', '', 'Rétroviseur de la marque Renault avec une tes grande flexibilité ', 100, 39, 2, 2),
(4, 'Volant GT sport +', 'volant, voiture, sport', 'Un volant en carbone de wish qui pèse environ 361 kg ce qui va te donner l\'impression de conduire un camtar', 200, 29, 1, 3),
(6, 'downpipe Scania V8', 'scania, camion, downpipe, V8', 'Downpipe pour Scania V8 5ème génération, idéal pour une reprogrammation moteur', 0, 299.99, 4, 4),
(7, 'jante pour bus', 'jante, bus,', 'jante en aluminium allégée', 0, 128.99, 3, 5),
(8, 'un truc qui coute cher ', 'voiture, ', 'Ce truc vaut une blinde ', 10, 1599, 2, 5);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(70) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `adresse` varchar(128) DEFAULT NULL,
  `email` varchar(70) NOT NULL,
  `pass` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `tel`, `adresse`, `email`, `pass`) VALUES
(1, 'steve', '0684753214', 'Place de la barbacane ', 'stevizou@g.com', '9ce5770b3bb4b2a1d59be2d97e34379cd192299f'),
(2, 'Adrien', '0674321465', '', 'ad.dela75020@gmail.com', '4493b1a16b57a2f7a66df59c1ab825911f69562d'),
(4, 'Adrien', '0155467323', '', 'momo@yahoo.com', '52036e5a96b401419e3b870bb3859828b111afd2'),
(7, 'chouaki', '2147483647', '150 rue jean jaures', 'aze@azer.fr', '9cf95dacd226dcf43da376cdb6cbba7035218921'),
(8, 'adrien', '2147483647', '12 rue jean jaurès', 'adrien.doll@gmail.com', '9cf95dacd226dcf43da376cdb6cbba7035218921'),
(11, 'Adrien', '0865432176', NULL, 'azerty@gmail.com', NULL),
(13, 'azerty', '0688367843', NULL, 'azerty123@gmail.com', NULL),
(14, 'Delacroix', '0765389201', NULL, 'audd@pnl.com', NULL),
(15, 'Mark', '0674661496', '8 rue Vaugirard', 'idlx@hotmail.com', '9cf95dacd226dcf43da376cdb6cbba7035218921'),
(16, 'user', '07080901020', 'rue jean moulin', 'user@gmail.com', '107d348bff437c999a9ff192adcb78cb03b8ddc6');
--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`ref_com`),
  ADD KEY `id_u` (`id_u`);

--
-- Index pour la table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id_image`);

--
-- Index pour la table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`id_produit`,`ref_com`),
  ADD KEY `ref_com` (`ref_com`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id_produit`),
  ADD KEY `id_categorie` (`id_categorie`),
  ADD KEY `id_image` (`id_image`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `ref_com` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `image`
--
ALTER TABLE `image`
  MODIFY `id_image` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id_produit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`id_u`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `panier_ibfk_1` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id_produit`),
  ADD CONSTRAINT `panier_ibfk_2` FOREIGN KEY (`ref_com`) REFERENCES `commande` (`ref_com`);

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id_categorie`),
  ADD CONSTRAINT `produit_ibfk_2` FOREIGN KEY (`id_image`) REFERENCES `image` (`id_image`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
