-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 20 fév. 2023 à 16:45
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `real_estate_agency`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonce`
--

CREATE TABLE `annonce` (
  `ad_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `publication_date` date NOT NULL,
  `last_modification_date` date NOT NULL,
  `address` varchar(200) NOT NULL,
  `City` varchar(50) NOT NULL,
  `Contry` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `client_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `annonce`
--

INSERT INTO `annonce` (`ad_id`, `title`, `price`, `publication_date`, `last_modification_date`, `address`, `City`, `Contry`, `category`, `type`, `client_id`) VALUES
(2, 'villa moahed ', 6600000, '2023-02-20', '2023-02-20', 'tanger,morocco', 'tanger', 'morocco', 'villa', 'sale', 1);

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `client_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`client_id`, `first_name`, `last_name`, `email`, `password`, `phone_number`) VALUES
(1, 'ilias', 'anouar', 'ilas.anouar.solicode@gmail.com', 'ilias080701', '0626916989');

-- --------------------------------------------------------

--
-- Structure de la table `image_d_annonce`
--

CREATE TABLE `image_d_annonce` (
  `Id_Image_d_annonce` int(11) NOT NULL,
  `image_url` varchar(200) DEFAULT NULL,
  `Is_principale` tinyint(1) NOT NULL,
  `ad_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `image_d_annonce`
--

INSERT INTO `image_d_annonce` (`Id_Image_d_annonce`, `image_url`, `Is_principale`, `ad_id`) VALUES
(1, 'C:fakepathighouse.jpg', 1, 2),
(2, 'C:fakepathighouse1.jpg', 0, 2),
(3, 'C:fakepathighouse2.jpg', 0, 2),
(4, 'C:fakepathighouse3.jpg', 0, 2),
(5, 'C:fakepathighouse4.jpg', 0, 2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `annonce`
--
ALTER TABLE `annonce`
  ADD PRIMARY KEY (`ad_id`),
  ADD KEY `client_id` (`client_id`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`);

--
-- Index pour la table `image_d_annonce`
--
ALTER TABLE `image_d_annonce`
  ADD PRIMARY KEY (`Id_Image_d_annonce`),
  ADD KEY `ad_id` (`ad_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `annonce`
--
ALTER TABLE `annonce`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `image_d_annonce`
--
ALTER TABLE `image_d_annonce`
  MODIFY `Id_Image_d_annonce` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `annonce`
--
ALTER TABLE `annonce`
  ADD CONSTRAINT `annonce_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `client` (`client_id`);

--
-- Contraintes pour la table `image_d_annonce`
--
ALTER TABLE `image_d_annonce`
  ADD CONSTRAINT `image_d_annonce_ibfk_1` FOREIGN KEY (`ad_id`) REFERENCES `annonce` (`ad_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
