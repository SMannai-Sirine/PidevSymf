-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 19 avr. 2022 à 13:14
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
-- Base de données : `pialgo`
--

-- --------------------------------------------------------

--
-- Structure de la table `croisiere`
--

CREATE TABLE `croisiere` (
  `idCroisiere` int(11) NOT NULL,
  `refBateau` varchar(30) NOT NULL,
  `compagnieNavigation` varchar(30) NOT NULL,
  `portDepart` varchar(30) NOT NULL,
  `portArrive` varchar(30) NOT NULL,
  `dateDepart` date NOT NULL,
  `dateArrivee` date NOT NULL,
  `nbCabines` int(11) NOT NULL,
  `prixCroisiere` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `croisiere`
--

INSERT INTO `croisiere` (`idCroisiere`, `refBateau`, `compagnieNavigation`, `portDepart`, `portArrive`, `dateDepart`, `dateArrivee`, `nbCabines`, `prixCroisiere`) VALUES
(113, 'semia', 'semia', 'se', 'semia', '2022-03-31', '2022-03-24', 25, 92);

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

CREATE TABLE `evenement` (
  `IdEvent` int(11) NOT NULL,
  `intitule` varchar(20) NOT NULL,
  `paysEvent` varchar(20) NOT NULL,
  `adresse` varchar(20) NOT NULL,
  `dateEvent` date NOT NULL,
  `typeEvent` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `prix` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `evenement`
--

INSERT INTO `evenement` (`IdEvent`, `intitule`, `paysEvent`, `adresse`, `dateEvent`, `typeEvent`, `photo`, `prix`) VALUES
(10, 'Tourous Espagne', 'Espagne', 'Madride', '2022-03-10', 'Course', '675px-Schlosshof_Marchtorauszen.jpg', 12),
(11, 'Event Dance', 'France', 'PAris', '2022-03-02', 'Dance', 'private-party-event-12.jpg', 25.3),
(12, 'coupe de monde', 'Brasil', 'SaoPAlo', '2022-03-10', 'Football', 'Coupe-du-monde-2018-782.jpg', 500),
(13, 'jcc', 'tunisie', 'tunisie', '2022-03-19', 'culture', 'error1', 12);

-- --------------------------------------------------------

--
-- Structure de la table `hotel`
--

CREATE TABLE `hotel` (
  `idhotel` int(11) NOT NULL,
  `nom_hotel` varchar(15) NOT NULL,
  `nbetoile` int(11) NOT NULL,
  `nbchambre` int(11) NOT NULL,
  `nbrestaurant` int(11) NOT NULL,
  `nbpiscine` int(11) NOT NULL,
  `adresse_rest` varchar(30) NOT NULL,
  `villehotel` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `loc_voiture`
--

CREATE TABLE `loc_voiture` (
  `id` int(11) NOT NULL,
  `id_voiture` int(11) NOT NULL,
  `date_res` date NOT NULL,
  `duree_res` int(11) NOT NULL,
  `id_pays` int(11) NOT NULL,
  `remise` tinyint(1) NOT NULL,
  `taux_remise` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `loc_voiture`
--

INSERT INTO `loc_voiture` (`id`, `id_voiture`, `date_res`, `duree_res`, `id_pays`, `remise`, `taux_remise`) VALUES
(1, 4, '2022-03-24', 4, 5, 0, 0),
(5, 7, '2022-03-18', 4, 4, 0, 0),
(8, 12, '2022-03-10', 5, 5, 1, 10),
(9, 12, '2022-03-11', 5, 5, 1, 10);

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE `pays` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `pays`
--

INSERT INTO `pays` (`id`, `nom`) VALUES
(4, 'Tunisie'),
(5, 'Algeria'),
(6, 'franceeee');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `id_res` int(11) NOT NULL,
  `type` tinyint(1) NOT NULL,
  `etat` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`id`, `id_res`, `type`, `etat`) VALUES
(9, 1, 0, 'Confirmée'),
(10, 3, 0, 'Rejetéé'),
(11, 4, 0, 'En Cours'),
(12, 7, 1, 'Rejetéé'),
(13, 5, 0, 'Confirmée'),
(14, 6, 0, 'En Cours'),
(15, 8, 1, 'Confirmée'),
(16, 8, 0, 'En Cours'),
(17, 9, 0, 'En Cours');

-- --------------------------------------------------------

--
-- Structure de la table `reservationagence`
--

CREATE TABLE `reservationagence` (
  `id_reservation` int(11) NOT NULL,
  `nom_hotel_rest` varchar(30) NOT NULL,
  `date_reservation` date NOT NULL,
  `id_hotel_rest` int(11) NOT NULL,
  `idU` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `reservationcroisiere`
--

CREATE TABLE `reservationcroisiere` (
  `IdReservationCroisiere` int(11) NOT NULL,
  `idU` int(11) NOT NULL,
  `IdCroisiere` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reservationcroisiere`
--

INSERT INTO `reservationcroisiere` (`IdReservationCroisiere`, `idU`, `IdCroisiere`) VALUES
(2, 1, 1),
(3, 1, 1),
(4, 1, 1),
(5, 1, 1),
(6, 1, 1),
(7, 1, 1),
(8, 1, 1),
(9, 1, 1),
(10, 1, 1),
(11, 1, 1),
(12, 1, 1),
(13, 1, 1),
(14, 1, 1),
(15, 1, 1),
(16, 1, 1),
(17, 1, 1),
(18, 1, 1),
(19, 1, 1),
(20, 1, 1),
(21, 1, 1),
(22, 1, 1),
(23, 1, 1),
(24, 1, 1),
(25, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `reservationevent`
--

CREATE TABLE `reservationevent` (
  `id` int(11) NOT NULL,
  `idU` int(11) NOT NULL,
  `idEvent` int(11) NOT NULL,
  `dateevent` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `reservationvol`
--

CREATE TABLE `reservationvol` (
  `idReservationVol` int(11) NOT NULL,
  `idU` int(11) NOT NULL,
  `idVol` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reservationvol`
--

INSERT INTO `reservationvol` (`idReservationVol`, `idU`, `idVol`) VALUES
(145, 1, 137),
(149, 1, 141),
(148, 1, 143),
(150, 1, 137);

-- --------------------------------------------------------

--
-- Structure de la table `restaurant`
--

CREATE TABLE `restaurant` (
  `id_rest` int(11) NOT NULL,
  `nom_rest` varchar(15) NOT NULL,
  `numtel_rest` bigint(12) NOT NULL,
  `adresse_rest` varchar(30) NOT NULL,
  `ville_rest` varchar(15) NOT NULL,
  `nbtable_rest` int(11) NOT NULL,
  `type_rest` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `taxi`
--

CREATE TABLE `taxi` (
  `id` int(11) NOT NULL,
  `matricule` varchar(250) NOT NULL,
  `prix` float NOT NULL,
  `id_pays` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `taxi`
--

INSERT INTO `taxi` (`id`, `matricule`, `prix`, `id_pays`) VALUES
(4, '195JMT0860', 12, 4);

-- --------------------------------------------------------

--
-- Structure de la table `taxi_aero`
--

CREATE TABLE `taxi_aero` (
  `id` int(11) NOT NULL,
  `id_taxi` int(11) NOT NULL,
  `id_pays` int(11) NOT NULL,
  `heure` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `taxi_aero`
--

INSERT INTO `taxi_aero` (`id`, `id_taxi`, `id_pays`, `heure`) VALUES
(5, 4, 4, '12'),
(6, 4, 4, '15'),
(7, 4, 4, '12'),
(8, 4, 4, '15');

-- --------------------------------------------------------

--
-- Structure de la table `ticket`
--

CREATE TABLE `ticket` (
  `idticket` int(11) NOT NULL,
  `prix_tick` float NOT NULL,
  `date_tick` varchar(20) NOT NULL,
  `idEvent` int(11) NOT NULL,
  `idU` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `ticket`
--

INSERT INTO `ticket` (`idticket`, `prix_tick`, `date_tick`, `idEvent`, `idU`) VALUES
(2, 12, '2022-03-10', 10, 1),
(3, 25.3, '2022-03-02', 11, 1),
(4, 12, '2022-03-10', 10, 1),
(5, 12, '2022-03-10', 10, 1),
(6, 12, '2022-03-10', 10, 1),
(7, 12, '2022-03-10', 10, 1),
(8, 12, '2022-03-10', 10, 1),
(9, 12, '2022-03-10', 10, 1),
(10, 500, '2022-03-10', 12, 1),
(11, 25.3, '2022-03-02', 11, 1),
(12, 12, '2022-03-10', 10, 1),
(13, 12, '2022-03-10', 10, 1),
(14, 500, '2022-03-10', 12, 1);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `idU` int(11) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `adresse` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `motpasse` varchar(255) NOT NULL,
  `photo` varchar(1000) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idU`, `nom`, `prenom`, `adresse`, `email`, `motpasse`, `photo`, `role`) VALUES
(2, 'sirine', 'mannai', 'Ariana Soghra', 'sirine@sys.com', '$2a$10$CFPwG.Dtz7yd5qhyrXHiLuVsZbj1T8Yp0CZRQbCcEPk2k/DggCqwy', 'photo', 'admin'),
(21, 'ihu', 'hhhh', 'dddd', 'karaoudoumayma@gmail.com', '$2a$10$otfpna.dOZgEBDhHe6szR.Ndz0K8D3zHBj7TrNQNFOGEFuLndSZIy', '585115535_.jpg', 'Client');

-- --------------------------------------------------------

--
-- Structure de la table `voiture`
--

CREATE TABLE `voiture` (
  `id` int(11) NOT NULL,
  `model` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `prix` float NOT NULL,
  `id_pays` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `voiture`
--

INSERT INTO `voiture` (`id`, `model`, `type`, `prix`, `id_pays`) VALUES
(4, 'RangeRover Velar', 'Business', 450, 5),
(5, 'Kia Rio', 'Quotidien', 120, 4),
(6, 'Peugot 206', 'Quotidien', 110, 4),
(7, 'Audi Q7', 'Business', 270, 4),
(8, 'Golf 6', 'Quotidien', 150, 4),
(9, 'Passat CC', 'Business', 450, 6),
(10, 'Audi A6', 'Business', 320, 6),
(11, 'Hyuandai i20', 'Quotidien', 100, 6),
(12, 'Hyuandai i10', 'Quotidien', 110, 5),
(13, 'Golf 7', 'Sport', 160, 5),
(15, 'Peugot 206', 'Sport', 500, 4),
(16, 'Golf 6', 'Sport', 15, 5);

-- --------------------------------------------------------

--
-- Structure de la table `vol`
--

CREATE TABLE `vol` (
  `idVol` int(11) NOT NULL,
  `refAvion` varchar(30) NOT NULL,
  `compagnieAerienne` varchar(30) NOT NULL,
  `aeroDepart` varchar(30) NOT NULL,
  `aeroArrive` varchar(30) NOT NULL,
  `dateDepart` date NOT NULL,
  `duree` float NOT NULL,
  `nbSieges` int(11) NOT NULL,
  `prix` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `vol`
--

INSERT INTO `vol` (`idVol`, `refAvion`, `compagnieAerienne`, `aeroDepart`, `aeroArrive`, `dateDepart`, `duree`, `nbSieges`, `prix`) VALUES
(137, 'tu', 'Tunisair', 'TunisCarthage', 'ParisOrly', '2022-03-22', 50, 24, 120),
(135, 'se', 'Tunisair', 'se', 'se', '2022-03-22', 4444, 4444, 4444),
(136, 'tu', 'Tunisair', 'TunisCarthage', 'ParisOrly', '2022-03-22', 50, 60, 120),
(138, 'f', 'oui', 'oui', 'oui', '2022-03-16', 5, 52, 52),
(139, 'rrr', 'rrr', 'rrr', 'rrr', '2022-03-03', 5, 52, 52),
(141, 'inchallah', 'inchallah', 'inchallah', 'inchallah', '2022-03-17', 12, 22, 25),
(142, '??semia', '????', '?????', '??????', '2022-03-09', 52, 54, 2),
(143, 'SE', 'SE', 'SE', 'SE', '2022-03-17', 25, 61, 25),
(144, 'gd', 'nv', 'gf', 'hg', '2022-03-09', 52, 143, 25),
(145, 'gff', 'Samssoumaairlines', 'gfd', 'jh', '2022-03-16', 52, 25, 25);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `croisiere`
--
ALTER TABLE `croisiere`
  ADD PRIMARY KEY (`idCroisiere`);

--
-- Index pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD PRIMARY KEY (`IdEvent`);

--
-- Index pour la table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`idhotel`);

--
-- Index pour la table `loc_voiture`
--
ALTER TABLE `loc_voiture`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_const_voiture` (`id_voiture`),
  ADD KEY `fk_const_pays` (`id_pays`);

--
-- Index pour la table `pays`
--
ALTER TABLE `pays`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reservationagence`
--
ALTER TABLE `reservationagence`
  ADD PRIMARY KEY (`id_reservation`),
  ADD KEY `fk_res_agence` (`idU`);

--
-- Index pour la table `reservationcroisiere`
--
ALTER TABLE `reservationcroisiere`
  ADD PRIMARY KEY (`IdReservationCroisiere`);

--
-- Index pour la table `reservationevent`
--
ALTER TABLE `reservationevent`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_idEvent` (`idEvent`),
  ADD KEY `fk_idU` (`idU`);

--
-- Index pour la table `reservationvol`
--
ALTER TABLE `reservationvol`
  ADD PRIMARY KEY (`idReservationVol`);

--
-- Index pour la table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`id_rest`);

--
-- Index pour la table `taxi`
--
ALTER TABLE `taxi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fsd` (`id_pays`);

--
-- Index pour la table `taxi_aero`
--
ALTER TABLE `taxi_aero`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_taxi` (`id_taxi`),
  ADD KEY `fk_pays` (`id_pays`);

--
-- Index pour la table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`idticket`),
  ADD KEY `fk_ticket_user` (`idU`),
  ADD KEY `fk_ticket_event` (`idEvent`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`idU`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `email_2` (`email`);

--
-- Index pour la table `voiture`
--
ALTER TABLE `voiture`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sqdf` (`id_pays`);

--
-- Index pour la table `vol`
--
ALTER TABLE `vol`
  ADD PRIMARY KEY (`idVol`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `croisiere`
--
ALTER TABLE `croisiere`
  MODIFY `idCroisiere` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT pour la table `evenement`
--
ALTER TABLE `evenement`
  MODIFY `IdEvent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `idhotel` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `loc_voiture`
--
ALTER TABLE `loc_voiture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `pays`
--
ALTER TABLE `pays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `reservationagence`
--
ALTER TABLE `reservationagence`
  MODIFY `id_reservation` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `reservationcroisiere`
--
ALTER TABLE `reservationcroisiere`
  MODIFY `IdReservationCroisiere` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `reservationevent`
--
ALTER TABLE `reservationevent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `reservationvol`
--
ALTER TABLE `reservationvol`
  MODIFY `idReservationVol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT pour la table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `id_rest` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `taxi`
--
ALTER TABLE `taxi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `taxi_aero`
--
ALTER TABLE `taxi_aero`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `idticket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `idU` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `voiture`
--
ALTER TABLE `voiture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `vol`
--
ALTER TABLE `vol`
  MODIFY `idVol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `loc_voiture`
--
ALTER TABLE `loc_voiture`
  ADD CONSTRAINT `fk_idpays` FOREIGN KEY (`id_pays`) REFERENCES `pays` (`id`),
  ADD CONSTRAINT `fk_idvoiture` FOREIGN KEY (`id_voiture`) REFERENCES `voiture` (`id`);

--
-- Contraintes pour la table `reservationagence`
--
ALTER TABLE `reservationagence`
  ADD CONSTRAINT `fk_res_agence` FOREIGN KEY (`idU`) REFERENCES `utilisateur` (`idU`);

--
-- Contraintes pour la table `reservationevent`
--
ALTER TABLE `reservationevent`
  ADD CONSTRAINT `fk_idEvent` FOREIGN KEY (`idEvent`) REFERENCES `evenement` (`IdEvent`),
  ADD CONSTRAINT `fk_idU` FOREIGN KEY (`idU`) REFERENCES `utilisateur` (`idU`);

--
-- Contraintes pour la table `taxi`
--
ALTER TABLE `taxi`
  ADD CONSTRAINT `fk_idpayss` FOREIGN KEY (`id_pays`) REFERENCES `pays` (`id`);

--
-- Contraintes pour la table `taxi_aero`
--
ALTER TABLE `taxi_aero`
  ADD CONSTRAINT `fk_idpaays` FOREIGN KEY (`id_pays`) REFERENCES `pays` (`id`),
  ADD CONSTRAINT `fk_idtaxi` FOREIGN KEY (`id_taxi`) REFERENCES `taxi` (`id`);

--
-- Contraintes pour la table `voiture`
--
ALTER TABLE `voiture`
  ADD CONSTRAINT `sqdf` FOREIGN KEY (`id_pays`) REFERENCES `pays` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
