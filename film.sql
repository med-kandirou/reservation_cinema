-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 04 fév. 2023 à 13:21
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
-- Base de données : `cinema`
--

-- --------------------------------------------------------

--
-- Structure de la table `film`
--

CREATE TABLE `film` (
  `id_f` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `image` varchar(225) DEFAULT NULL,
  `date_f` date NOT NULL,
  `id_s` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `film`
--

INSERT INTO `film` (`id_f`, `nom`, `image`, `date_f`, `id_s`) VALUES
(2, 'spider man', '[value-3]', '2023-02-04', 1),
(3, 'super man', '[value-3]', '2023-02-04', 2),
(4, 'marvel', '[value-3]', '2023-02-04', 3);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id_f`),
  ADD KEY `id_s` (`id_s`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `film`
--
ALTER TABLE `film`
  MODIFY `id_f` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `film`
--
ALTER TABLE `film`
  ADD CONSTRAINT `film_ibfk_1` FOREIGN KEY (`id_s`) REFERENCES `salle` (`id_s`),
  ADD CONSTRAINT `fk_id_s` FOREIGN KEY (`id_s`) REFERENCES `salle` (`id_s`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_s` FOREIGN KEY (`id_s`) REFERENCES `salle` (`id_s`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
