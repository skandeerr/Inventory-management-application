-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : dim. 12 juin 2022 à 23:27
-- Version du serveur : 5.7.33
-- Version de PHP : 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `pfa`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `nom` varchar(200) DEFAULT NULL,
  `photo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `nom`, `photo`) VALUES
(5, 'ElectromÃ©nager', 'Prix-Ã©lectromÃ©nager-en-Tunisie.jpg'),
(6, 'Technologiques', 'Ventes-Produit-Technologique-DRC-1.jpg'),
(7, 'Nettoyage', 'download.jpg'),
(9, 'Eau ', '561_news.jpg'),
(10, 'Boissons', 'bottles.webp');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id` int(11) NOT NULL,
  `fournisseur` int(11) DEFAULT NULL,
  `nom_produit` int(255) DEFAULT NULL,
  `quantite` int(255) DEFAULT NULL,
  `date_demande` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id`, `fournisseur`, `nom_produit`, `quantite`, `date_demande`) VALUES
(1, 8, 16, 50, '2022-05-25'),
(3, 8, 25, 200, '2022-05-25');

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

CREATE TABLE `fournisseur` (
  `id` int(11) NOT NULL,
  `nom_prenom` varchar(50) DEFAULT NULL,
  `adresse` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telephone` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `fournisseur`
--

INSERT INTO `fournisseur` (`id`, `nom_prenom`, `adresse`, `email`, `telephone`) VALUES
(8, 'skander', 'sfax', 'skanderbensalem29@gmail.com', '28881661'),
(9, 'ahmed', 'tunis', 'ahmed@gmail.com', '254526');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id` int(11) NOT NULL,
  `nom_produit` varchar(255) NOT NULL,
  `code_barre` float NOT NULL,
  `stock` float NOT NULL,
  `categorie` int(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `prix` float NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `stock_limit` float DEFAULT NULL,
  `commande` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `nom_produit`, `code_barre`, `stock`, `categorie`, `image`, `prix`, `description`, `stock_limit`, `commande`) VALUES
(3, 'Eau minÃ©rale PRIMAQUA ', 3245410000000, 100, 9, '2010100036753-1.jpg', 4750, 'La bombone de 19L SANS CONSIGNE', NULL, 0),
(13, 'Eau minÃ©rale TIJEN 0.5L', 625155000, 300, 9, '6191475200027-1_1_1.jpg', 410, 'La bouteille de 0.5L', 30, 0),
(14, 'Eau minÃ©rale TIJEN 1.5L', 6165530000, 120, 9, '6191475200010-1_1.jpg', 620, 'La bouteille de 1.5L', 70, 0),
(15, 'Eau minÃ©rale JEKTISS 1L', 616412000, 200, 9, '6194005660414-1_5.jpg', 520, 'La bouteille de 1L', 40, 0),
(16, 'Eau pomme DÃ‰LICE', 6281590000, 250, 9, '6191534802483-1_1.jpg', 785, 'La bouteille de 25cl', 60, 0),
(17, 'Eau gazÃ©ifiÃ©e DÃ©lio pÃªche DÃ‰LICE', 6251110000, 300, 9, '6191534802476-1_1.jpg', 785, 'La bouteille de 25cl', 40, 0),
(18, 'Eau minÃ©rale DÃ‰LICE 1.5L', 62515800, 500, 9, '6191496000026-1_1.jpg', 590, 'La bouteille de 1.5L', 80, 0),
(19, 'FANTA citron', 61515200, 500, 10, '54492493-1_1.jpg', 1200, 'La bouteille de 0.5L', 70, 0),
(20, 'PUNCH Ã  la pulpe ', 6258420000, 400, 10, '6191534802322-1.jpg', 2440, 'La bouteille de 1L', 70, 0),
(21, 'FANTA pomme', 61518700, 10, 10, '90494499-1.jpg', 1290, 'La bouteille de 0.5L', 50, 0),
(22, 'SCHWEPPES Tonic', 6155130000, 420, 10, '50112265-1_3.jpg', 1590, 'La bouteille de 0.5L', 50, 0),
(23, 'BOGA lim sans sucre', 615612000, 500, 10, '6194019602448-1.jpg', 1000, 'La canette de 24cl', 60, 0),
(24, 'VIVA pÃªche', 614515000, 800, 10, '6194007891090-1_1.jpg', 2250, 'La bouteille de 1L', 100, 0),
(25, 'Sprite', 654545000, 449, 10, '5449000226686.jpg', 1010, 'La canette de 24cl', 30, 0),
(26, 'FANTA orange', 615422000, 600, 10, '5449000226679-1.jpg', 990, 'La canette de 24cl', 90, 0),
(27, 'Boga cidre', 62512700, 600, 10, '6194019602424.jpg', 1010, 'La canette de 24cl', 90, 0),
(28, 'COCA COLA', 615549000, 700, 10, '5449000226662-1.jpg', 1010, 'La canette de 24cl', 70, 0),
(29, 'BOGA menthe', 621522000, 550, 10, '6194019607030_-1.jpg', 2180, 'La bouteille de 1L', 50, 0),
(30, 'VIVA citron', 61547900, 650, 10, '6194007890314-1.jpg', 1140, 'La canette de 33cl', 70, 0),
(31, 'ORANGINA', 615479000, 450, 10, '6191525200205-1_1.jpg', 3280, 'La bouteille de 1.5L', 50, 0),
(32, 'ORANGINA', 61547900, 250, 10, '6191525200182-1_2_1.jpg', 1260, 'La canette de 33cl', 30, 0),
(33, 'FANTA orange', 621453000, 350, 10, '5449000006271-1_2.jpg', 2620, 'La bouteille de 1.5L', 40, 0),
(39, 'ElectromÃ©nager', 616253000, 1000, 5, 'electro.jpg', 500, 'produit electromÃ©nager', 100, 0),
(40, 'Cif', 62515200, 500, 7, 'cif.jpg', 2, 'produit de nettoyage', 50, 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
