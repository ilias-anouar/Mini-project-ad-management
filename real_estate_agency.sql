-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 21 fév. 2023 à 09:26
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
(2, 'villa moahed ', 6600000, '2023-02-20', '2023-02-20', 'tanger,morocco', 'tanger', 'morocco', 'villa', 'sale', 1),
(3, 'khadija office', 5500, '2023-02-21', '2023-02-21', 'casablanca,morocco', 'casablanca', 'morocco', 'office', 'rent', 1),
(4, 'Yasmine house', 3000000, '2023-02-21', '2023-02-21', 'tanger,morocco', 'tanger', 'morocco', 'apartment', 'sale', 1),
(5, 'grand villa hassan', 50000000, '2023-02-21', '2023-02-21', 'safe,morocco', 'safe', 'morocco', 'villa', 'rent', 1),
(6, 'Yassine yamama office', 6000, '2023-02-21', '2023-02-21', 'Rabat,morocco', 'Rabat', 'morocco', 'office', 'rent', 1),
(7, 'region lands', 55000000, '2023-02-21', '2023-02-21', 'tanger,morocco', 'tanger', 'morocco', 'land', 'sale', 1),
(8, 'al khire appartments', 2400000, '2023-02-21', '2023-02-21', 'Zagoura,morocco', 'Zagoura', 'morocco', 'apartment', 'sale', 1),
(9, 'zaani villa', 50000000, '2023-02-21', '2023-02-21', 'tanger,morocco', 'tanger', 'morocco', 'villa', 'sale', 2),
(10, 'hamza offices', 4500, '2023-02-21', '2023-02-21', 'tanger,morocco', 'tanger', 'morocco', 'office', 'rent', 2),
(11, 'big lands', 670000, '2023-02-21', '2023-02-21', 'beni mellal,morocco', 'beni mellal', 'morocco', 'land', 'sale', 2);

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
(1, 'ilias', 'anouar', 'ilas.anouar.solicode@gmail.com', 'ilias080701', '0626916989'),
(2, 'hamza', 'zaani', 'zaani.hamza.solicode@gmail.com', 'hamza.zaani01', '0600000000');

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
(5, 'C:fakepathighouse4.jpg', 0, 2),
(6, 'C:fakepathhouse.jpg', 1, 3),
(7, 'C:fakepathhouse1.jpg', 0, 3),
(8, 'C:fakepathhouse3.jpg', 0, 3),
(9, 'C:fakepathhouse4.jpg', 0, 3),
(10, 'C:fakepathhouse2.jpg', 0, 3),
(11, 'C:fakepathimagereader (1).jfif', 1, 4),
(12, 'C:fakepathimagereader (1).webp', 0, 4),
(13, 'C:fakepathimagereader (2).jfif', 0, 4),
(14, 'C:fakepathimagereader (3).jfif', 0, 4),
(15, 'C:fakepathimagereader (3).webp', 0, 4),
(16, 'C:fakepathighouse.jpg', 1, 5),
(17, 'C:fakepathighouse1.jpg', 0, 5),
(18, 'C:fakepathighouse2.jpg', 0, 5),
(19, 'C:fakepathighouse3.jpg', 0, 5),
(20, 'C:fakepathighouse4.jpg', 0, 5),
(21, 'C:fakepathimagereader31.JPG', 1, 6),
(22, 'C:fakepathimagereader32.JPG', 0, 6),
(23, 'C:fakepathimagereader33.JPG', 0, 6),
(24, 'C:fakepathimagereader34.JPG', 0, 6),
(25, 'C:fakepathimagereader35.JPG', 0, 6),
(26, 'C:fakepathimagereader41.JPG', 0, 7),
(27, 'C:fakepathighouse.jpg', 1, 7),
(28, 'C:fakepathighouse1.jpg', 0, 7),
(29, 'C:fakepathimagereader31.JPG', 0, 7),
(30, 'C:fakepathimagereader21.JPG', 0, 7),
(31, 'C:fakepathhouse.jpg', 1, 8),
(32, 'C:fakepathhouse1.jpg', 0, 8),
(33, 'C:fakepathhouse2.jpg', 0, 8),
(34, 'C:fakepathhouse3.jpg', 0, 8),
(35, 'C:fakepathhouse4.jpg', 0, 8),
(36, 'C:fakepathvilla.jpg', 1, 9),
(37, 'C:fakepathvilla1.jpg', 0, 9),
(38, 'C:fakepathvilla2.jpg', 0, 9),
(39, 'C:fakepathvilla3.jpg', 0, 9),
(40, 'C:fakepathvilla4.jpg', 0, 9),
(41, 'C:fakepathimagereader41.JPG', 1, 10),
(42, 'C:fakepathimagereader42.JPG', 0, 10),
(43, 'C:fakepathimagereader43.JPG', 0, 10),
(44, 'C:fakepathimagereader44.JPG', 0, 10),
(45, 'C:fakepathimagereader45.JPG', 0, 10),
(46, 'C:fakepathimagereader21.JPG', 1, 11),
(47, 'C:fakepathimagereader (1).jfif', 0, 11),
(48, 'C:fakepathimagereader.jpg', 0, 11),
(49, 'C:fakepathimagereader.webp', 0, 11),
(50, 'C:fakepathimagereader11.JPG', 0, 11);

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
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `image_d_annonce`
--
ALTER TABLE `image_d_annonce`
  MODIFY `Id_Image_d_annonce` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

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
