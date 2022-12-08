-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 09 déc. 2022 à 00:38
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `and1`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `pwd` varchar(50) NOT NULL,
  `img` varchar(100) NOT NULL,
  `date_naissance` date NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `nom`, `prenom`, `pwd`, `img`, `date_naissance`, `email`) VALUES
(2, 'Ayari', 'Oussema', '12345678', 'images/default.jpg', '2004-05-05', 'oussema.ayari2020@gmail.com'),
(6, 'Doe', 'Jhon', '12345678', 'images/default.jpg', '2004-05-04', 'jackson.malek@hotmail.fr'),
(7, 'Ayari', 'Oussema', '12345678', 'images/Oussema.png', '2004-06-14', 'oussama.ayari1@esprit.tn');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id_commande` int(50) NOT NULL,
  `id_client` int(50) NOT NULL,
  `dscrp` varchar(1000) NOT NULL,
  `Price_Command` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id_commande`, `id_client`, `dscrp`, `Price_Command`) VALUES
(2, 2, 'Kobe 12 ', 167);

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE `product` (
  `id` int(50) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Price` double NOT NULL,
  `img` varchar(100) NOT NULL,
  `Cover_Name` varchar(100) NOT NULL,
  `color_front` varchar(100) NOT NULL,
  `backimg` varchar(100) NOT NULL,
  `color_back` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`id`, `Name`, `Price`, `img`, `Cover_Name`, `color_front`, `backimg`, `color_back`) VALUES
(1, 'Kobe 12', 160, 'images/kobe1.png', 'Nike', '#f94a45,#e8e0f5', 'images/kobe2.png', '#8d8d99,#ebeaf8'),
(2, 'Lebron 18', 69.97, 'images/lebron18.png', 'Nike', '#3d29a6,#ff4745', 'images/lebron182.png', '#ca2f51,#d5d1ec'),
(3, 'Air Jordan', 239, 'images/jordan1.png', 'Nike', '#514279,#222220', 'images/jordan2.png', '#edb139,#e7e7e7'),
(4, 'Stephen Curry', 79.99, 'images/Curry.png', 'Curry', '#374172,#fabc2b', '', ''),
(5, 'Lebron James', 119.99, 'images/Lakers6.png', 'James', '#ffc118,#563c86', '', ''),
(6, 'Lebron James', 89.99, 'images/Lakers23.png', 'James', '#252628,#ffc507', '', ''),
(7, 'Denver Nuggets', 80, 'images/80$.png', 'Denver', '#ddc352,#3a4362', '', ''),
(8, 'Lakers', 79.99, 'images/LakerShorts.png', 'Lakers', '#543c86,#fcc625', '', ''),
(9, 'Brooklyn Nets', 89.99, 'images/short.png', 'Nike', '#c70c29,#132d60', '', ''),
(10, 'Nike Ball', 89.99, 'images/ball1.png', 'Nike', '#c94b57,#0b0c11', '', ''),
(11, 'Spalding Ball', 89.99, 'images/ball2.png', 'Spalding', '#3474b4,#fbfcfe', '', ''),
(12, 'Molten Ball', 79.99, 'images/ball3.png', 'Molten', '#c76a58,#f0eec7', '', ''),
(13, 'Garlando Hoop', 225.99, 'images/panneau1.png', 'Garlando', '#cf282d,#cecece', '', ''),
(14, 'Basket-ball Hoop', 89.99, 'images/panneau2.png', 'Hoop', '#eb7220,#090909', '', ''),
(15, 'Basket-ball Hoop (Kids)', 225.99, 'images/panneau3.png', 'Hoop', '#e95800,#059daa', '', '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id_commande`),
  ADD KEY `client_commande_fk` (`id_client`);

--
-- Index pour la table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id_commande` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `client_commande_fk` FOREIGN KEY (`id_client`) REFERENCES `client` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
