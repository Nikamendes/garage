-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 01 juil. 2023 à 13:17
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `garage`
--

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `message` text NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `phone`, `message`, `created_at`) VALUES
(1, 'Oliveira Claude', 'test@test.test', '0623132516', 'Prend rendez-vous ', '2023-06-30 18:43:04');

-- --------------------------------------------------------

--
-- Structure de la table `temoignages`
--

CREATE TABLE `temoignages` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `commentaire` text NOT NULL,
  `note` int(11) NOT NULL,
  `approuve` tinyint(1) NOT NULL DEFAULT 0,
  `date_creation` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `temoignages`
--

INSERT INTO `temoignages` (`id`, `nom`, `commentaire`, `note`, `approuve`, `date_creation`) VALUES
(1, 'Judite', 'Très bon garage ', 5, 0, '2023-06-30 14:22:24');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`) VALUES
(1, 'John Does', 'johndoe@example.com'),
(2, 'Jane Smith', 'janesmith@example.com'),
(5, 'Patricia Silva', 'silva@test.test'),
(6, 'Jonh Olivier', 'test@test.test');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `date_inscription` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `email`, `mot_de_passe`, `date_inscription`) VALUES
(1, 'John Doe', 'john.doe@example.com', 'motdepasse123', '2023-06-29 10:12:45'),
(2, 'Dubois', 'exemple@gmail.com', '12345', '2023-06-30 13:01:39');

-- --------------------------------------------------------

--
-- Structure de la table `voitures`
--

CREATE TABLE `voitures` (
  `id` int(11) NOT NULL,
  `marque` varchar(255) DEFAULT NULL,
  `modèle` varchar(255) DEFAULT NULL,
  `année` int(11) DEFAULT NULL,
  `prix` decimal(10,2) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `voitures`
--

INSERT INTO `voitures` (`id`, `marque`, `modèle`, `année`, `prix`, `image`) VALUES
(1, 'Renault', 'Scenic', 2018, '15000.00', 'https://www.revia-multiservices.fr/wp-content/uploads/2020/06/APVyVoiture-occasion-monospace-7-places-dieselafc062ba81032a6d3e55349294ebcfb5.jpg'),
(2, 'Peugeot', '308', 2017, '12000.00', 'https://www.carre-expert-auto.org/photos/expertises/1938_1.jpg'),
(3, 'Citroen', 'Berlingo', 2016, '10000.00', 'https://th.bing.com/th?id=OIP.n4mWlZ3yt7jPtFkH6KxLSwHaEK&w=333&h=187&c=8&rs=1&qlt=90&o=6&dpr=1.5&pid=3.1&rm=2'),
(5, 'CITROEN C4', 'PICASSO', 2014, '10500.00', 'https://cdn.carizy.com/carphotos/4050/wide/citroen-c4-picasso-occasion-2014-avant-gauche.jpg'),
(6, ' Peugeot', ' 206', 2005, '4500.00', 'https://www.france-troc.com/ImgUsers/annonces/2016/05/834762/zbroeinnjp.jpg'),
(7, 'FIAT', '500', 2017, '14.00', 'https://media.autosphere.fr/vo/P--V--O--3--9--2--9--1--1--5--2/C1BWTzM5MjkxMTUyAiADWAIAAQAAAABkgLmg7w/PVO39291152-002.jpg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `temoignages`
--
ALTER TABLE `temoignages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `voitures`
--
ALTER TABLE `voitures`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `temoignages`
--
ALTER TABLE `temoignages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `voitures`
--
ALTER TABLE `voitures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
