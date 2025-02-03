-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : sql212.infinityfree.com
-- Généré le :  ven. 31 jan. 2025 à 03:36
-- Version du serveur :  10.6.19-MariaDB
-- Version de PHP :  7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `if0_38125758_medicalbox`
--

-- --------------------------------------------------------

--
-- Structure de la table `ficheData`
--

CREATE TABLE `ficheData` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `date_naissance` date NOT NULL,
  `nationalite` varchar(100) NOT NULL,
  `sexe` enum('M','F','Autre') NOT NULL,
  `etat_civil` enum('Célibataire','Marié','Divorcé','Veuf') NOT NULL,
  `profession` varchar(100) DEFAULT NULL,
  `telephone` varchar(15) DEFAULT NULL,
  `poids` decimal(5,2) DEFAULT NULL,
  `taille` decimal(5,2) DEFAULT NULL,
  `tour_taille` decimal(5,2) DEFAULT NULL,
  `bmi` decimal(5,2) DEFAULT NULL,
  `motif_consultation` text NOT NULL,
  `hta` varchar(100) DEFAULT '0',
  `obesite` varchar(10) DEFAULT '0',
  `heredite` varchar(10) DEFAULT '0',
  `diabete` varchar(10) DEFAULT '0',
  `tabac` varchar(10) DEFAULT '0',
  `sedentarite` varchar(10) DEFAULT '0',
  `atcd` text DEFAULT NULL,
  `allergie` text DEFAULT NULL,
  `medicaments` text DEFAULT NULL,
  `date_releve` date DEFAULT NULL,
  `pas` int(11) DEFAULT NULL,
  `pad` int(11) DEFAULT NULL,
  `fc` int(11) DEFAULT NULL,
  `temperature` decimal(4,2) DEFAULT NULL,
  `syndrome` text DEFAULT NULL,
  `hypothese_diag` text DEFAULT NULL,
  `ecg` text DEFAULT NULL,
  `echocardio` text DEFAULT NULL,
  `traitement` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `ficheData`
--

INSERT INTO `ficheData` (`id`, `nom`, `prenom`, `date_naissance`, `nationalite`, `sexe`, `etat_civil`, `profession`, `telephone`, `poids`, `taille`, `tour_taille`, `bmi`, `motif_consultation`, `hta`, `obesite`, `heredite`, `diabete`, `tabac`, `sedentarite`, `atcd`, `allergie`, `medicaments`, `date_releve`, `pas`, `pad`, `fc`, `temperature`, `syndrome`, `hypothese_diag`, `ecg`, `echocardio`, `traitement`, `created_at`) VALUES
(1, 'ABESSOLO MBA LAMBERT', 'Bricelle Yann', '2004-04-04', 'Gabonaise', 'M', 'Célibataire', 'etudiant', '', '70.00', '1.70', '0.00', '0.00', 'bras cassÃ©', '0', '0', '0', '0', '0', '0', '', 'aucun', 'aucun', '0000-00-00', 0, 0, 0, '0.00', '', '', '', '', 'platre', '2025-01-19 10:21:29'),
(2, 'ABESSOLO MBA LAMBERT', 'Bricelle Yann', '2004-04-04', 'Gabonaise', 'M', 'Célibataire', 'etudiant', '', '70.00', '1.70', '0.00', '0.00', 'bras cassÃ©', '0', '0', '0', '0', '0', '0', '', 'aucun', 'aucun', '0000-00-00', 0, 0, 0, '0.00', '', '', '', '', 'platre', '2025-01-19 10:21:52'),
(3, 'MOMBO', 'Roland', '2025-01-15', 'Gabonais', 'M', 'Célibataire', 'Etudiant', '', '105.00', '1.84', '45.00', '0.00', 'fatigue', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0000-00-00', 0, 0, 0, '0.00', '', 'aucun', 'rien', 'ras', 'dormir', '2025-01-19 17:22:50'),
(4, 'Ada', 'Angelina', '2025-01-24', 'Gabonaise', 'F', 'Célibataire', 'Etudiant', '077456745', '60.00', '1.76', '0.00', '0.00', 'fatigue', '0', '0', '0', '0', '0', '0', 'ras', 'ras', 'ras', '0000-00-00', 0, 0, 0, '0.00', 'ras', 'ras', 'ras', 'ras', 'manger', '2025-01-19 18:17:37'),
(5, 'blaise', 'pascal', '2003-06-19', 'gabonaise', 'M', 'Célibataire', 'Etudiant', '066567858', '87.00', '1.76', '45.00', '0.00', 'ras', '0', '0', '0', '0', '0', '0', 'ras', 'ras', 'ras', '0000-00-00', 0, 0, 0, '0.00', 'ras', 'ras', 'ras', 'ras', 'sortir', '2025-01-20 12:23:54'),
(6, 'sarah', 'blaise', '2025-01-23', 'gabonaise', 'F', 'Célibataire', 'sans', '065575747', '60.00', '1.60', '12.00', '0.00', 'ras', '0', '0', '0', '0', '0', '0', 'fleur', 'abeille', 'eferalgan', '2025-01-17', 0, 0, 0, '34.00', 'fievre', 'palu', 'ras', 'ras', 'dormir', '2025-01-20 12:41:04'),
(7, 'lesly', 'brice', '2025-01-24', 'Gabonaise', 'F', 'Célibataire', 'etudiant', '055767867', '89.00', '1.49', '23.00', '0.00', 'ras', 'oui', '0', '0', '0', '0', '0', 'ras', 'ras', 'ras', '0000-00-00', 0, 0, 0, '0.00', 'ras', 'eas', 'ras', 'ras', 'ras', '2025-01-20 12:51:30'),
(8, 'valerie', 'pascal', '2025-01-04', 'Gabonaise', 'M', 'Célibataire', 'Etudiant', '870980098', '105.00', '1.89', '56.00', '0.00', '', 'non', 'non', 'non', 'non', 'non', 'non', 'ter', 'ter', 'ter', '0000-00-00', 5, 10, 15, '20.00', 'ter', 'ter', 'ter', 'ter', 'ter', '2025-01-20 13:36:34');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `ficheData`
--
ALTER TABLE `ficheData`
ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `ficheData`
--
ALTER TABLE `ficheData`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
