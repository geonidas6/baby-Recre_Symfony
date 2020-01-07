-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 25 juin 2019 à 20:32
-- Version du serveur :  10.1.37-MariaDB
-- Version de PHP :  7.0.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `paroise`
--

-- --------------------------------------------------------

--
-- Structure de la table `encadreur`
--

CREATE TABLE `encadreur` (
  `id` int(11) NOT NULL,
  `numPart` int(11) NOT NULL,
  `numPost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `enfant`
--

CREATE TABLE `enfant` (
  `id` int(11) NOT NULL,
  `numPart` int(11) NOT NULL,
  `nom_fam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `entiy_attribuer`
--

CREATE TABLE `entiy_attribuer` (
  `id` int(11) NOT NULL,
  `numFam` int(11) NOT NULL,
  `numTach` int(11) NOT NULL,
  `numJour` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `entiy_attribuer`
--

INSERT INTO `entiy_attribuer` (`id`, `numFam`, `numTach`, `numJour`) VALUES
(1, 1, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `famille`
--

CREATE TABLE `famille` (
  `id` int(11) NOT NULL,
  `nom_fam` varchar(25) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `famille`
--

INSERT INTO `famille` (`id`, `nom_fam`) VALUES
(1, 'dddd');

-- --------------------------------------------------------

--
-- Structure de la table `fichier`
--

CREATE TABLE `fichier` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `image`
--

INSERT INTO `image` (`id`, `name`) VALUES
(3, '50b59e6fb5c6cfeb02949d931176e0c1.jpeg'),
(1, '7beb323c0aadc689d675a3c40abc7f10.jpeg'),
(2, 'abbe9c2bf67d8bcac2e8ff70a71f0efd.jpeg');

-- --------------------------------------------------------

--
-- Structure de la table `jour`
--

CREATE TABLE `jour` (
  `id` int(11) NOT NULL,
  `nom_jour` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `jour`
--

INSERT INTO `jour` (`id`, `nom_jour`) VALUES
(2, 'LUNDI');

-- --------------------------------------------------------

--
-- Structure de la table `legion`
--

CREATE TABLE `legion` (
  `id` int(11) NOT NULL,
  `nom_leg` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `legion`
--

INSERT INTO `legion` (`id`, `nom_leg`) VALUES
(1, 'cvw');

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `recipient_id` int(11) NOT NULL,
  `type` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `sent_date` datetime NOT NULL,
  `lu` tinyint(1) NOT NULL,
  `defaultprofile` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contenue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `niveau`
--

CREATE TABLE `niveau` (
  `id` int(11) NOT NULL,
  `nom_niv` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `niveau`
--

INSERT INTO `niveau` (`id`, `nom_niv`) VALUES
(1, 's');

-- --------------------------------------------------------

--
-- Structure de la table `paroise`
--

CREATE TABLE `paroise` (
  `id` int(11) NOT NULL,
  `nom_paroise` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quartier` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `paroise`
--

INSERT INTO `paroise` (`id`, `nom_paroise`, `quartier`) VALUES
(1, 'ff', 'hh');

-- --------------------------------------------------------

--
-- Structure de la table `participant`
--

CREATE TABLE `participant` (
  `id` int(11) NOT NULL,
  `num_par` int(11) NOT NULL,
  `num_niv` int(11) NOT NULL,
  `att_part` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nom_part` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prenom_part` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `genre_part` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `age_part` int(11) NOT NULL,
  `prix_part` int(11) NOT NULL,
  `priv_part` tinyint(1) NOT NULL,
  `numLeg` int(11) NOT NULL,
  `image_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `participant`
--

INSERT INTO `participant` (`id`, `num_par`, `num_niv`, `att_part`, `nom_part`, `prenom_part`, `genre_part`, `age_part`, `prix_part`, `priv_part`, `numLeg`, `image_id`) VALUES
(1, 1, 1, 'Equipe dirigeante', 'kljl', 'kjlk', 'Homme', 2, 2, 1, 1, NULL),
(2, 1, 1, 'Equipe dirigeante', 'kljl', 'kjlk', 'Homme', 3, 4, 1, 1, 1),
(3, 1, 1, 'Equipe dirigeante', 'kljl', 'kjlk', 'Homme', 3, 4, 1, 1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `poste`
--

CREATE TABLE `poste` (
  `id` int(11) NOT NULL,
  `nom_post` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `poste`
--

INSERT INTO `poste` (`id`, `nom_post`) VALUES
(2, 'sdfs'),
(3, 'sdfs');

-- --------------------------------------------------------

--
-- Structure de la table `tache`
--

CREATE TABLE `tache` (
  `id` int(11) NOT NULL,
  `nom_tach` varchar(25) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `tache`
--

INSERT INTO `tache` (`id`, `nom_tach`) VALUES
(1, 'ugu');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `image_id` int(11) DEFAULT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prenoms` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `locked` tinyint(1) NOT NULL,
  `user_role` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sexe` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tel` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_ajout` datetime NOT NULL,
  `dialcode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `image_id`, `nom`, `prenoms`, `username`, `password`, `email`, `enabled`, `locked`, `user_role`, `sexe`, `tel`, `date_ajout`, `dialcode`) VALUES
(1, NULL, 'AKOTSE', 'Patrice', 'geonidas', '$2y$13$Kluefg.Miec336Slc8y8m.aIN42s5cJ7bR6vheS6HgUiHa4DPU43m', 'geonidas6@gmail.com', 1, 0, 'ROLE_USER', 'Homme', '90787599', '2019-06-25 08:34:01', '229');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `encadreur`
--
ALTER TABLE `encadreur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_43B1C5B9B4D1C7AC` (`numPart`),
  ADD KEY `IDX_43B1C5B9A754DBE7` (`numPost`);

--
-- Index pour la table `enfant`
--
ALTER TABLE `enfant`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_34B70CA2B4D1C7AC` (`numPart`),
  ADD KEY `IDX_34B70CA24E3409D0` (`nom_fam`);

--
-- Index pour la table `entiy_attribuer`
--
ALTER TABLE `entiy_attribuer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_2F938E9C40B03999` (`numFam`),
  ADD KEY `IDX_2F938E9C7C6B2FA4` (`numTach`),
  ADD KEY `IDX_2F938E9C27C96EAF` (`numJour`);

--
-- Index pour la table `famille`
--
ALTER TABLE `famille`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `fichier`
--
ALTER TABLE `fichier`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_9B76551F5E237E06` (`name`);

--
-- Index pour la table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_C53D045F5E237E06` (`name`);

--
-- Index pour la table `jour`
--
ALTER TABLE `jour`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `legion`
--
ALTER TABLE `legion`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_B6BD307FF624B39D` (`sender_id`),
  ADD KEY `IDX_B6BD307FE92F8F78` (`recipient_id`);

--
-- Index pour la table `niveau`
--
ALTER TABLE `niveau`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `paroise`
--
ALTER TABLE `paroise`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `participant`
--
ALTER TABLE `participant`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_D79F6B113DA5256D` (`image_id`),
  ADD KEY `IDX_D79F6B11C99E9055` (`numLeg`),
  ADD KEY `IDX_D79F6B1179DAFA1A` (`num_par`),
  ADD KEY `IDX_D79F6B11A0D63A71` (`num_niv`);

--
-- Index pour la table `poste`
--
ALTER TABLE `poste`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tache`
--
ALTER TABLE `tache`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649F85E0677` (`username`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`),
  ADD UNIQUE KEY `UNIQ_8D93D6493DA5256D` (`image_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `encadreur`
--
ALTER TABLE `encadreur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `enfant`
--
ALTER TABLE `enfant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `entiy_attribuer`
--
ALTER TABLE `entiy_attribuer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `famille`
--
ALTER TABLE `famille`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `fichier`
--
ALTER TABLE `fichier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `jour`
--
ALTER TABLE `jour`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `legion`
--
ALTER TABLE `legion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `niveau`
--
ALTER TABLE `niveau`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `paroise`
--
ALTER TABLE `paroise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `participant`
--
ALTER TABLE `participant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `poste`
--
ALTER TABLE `poste`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `tache`
--
ALTER TABLE `tache`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `encadreur`
--
ALTER TABLE `encadreur`
  ADD CONSTRAINT `FK_43B1C5B9A754DBE7` FOREIGN KEY (`numPost`) REFERENCES `poste` (`id`),
  ADD CONSTRAINT `FK_43B1C5B9B4D1C7AC` FOREIGN KEY (`numPart`) REFERENCES `participant` (`id`);

--
-- Contraintes pour la table `enfant`
--
ALTER TABLE `enfant`
  ADD CONSTRAINT `FK_34B70CA24E3409D0` FOREIGN KEY (`nom_fam`) REFERENCES `famille` (`id`),
  ADD CONSTRAINT `FK_34B70CA2B4D1C7AC` FOREIGN KEY (`numPart`) REFERENCES `participant` (`id`);

--
-- Contraintes pour la table `entiy_attribuer`
--
ALTER TABLE `entiy_attribuer`
  ADD CONSTRAINT `FK_2F938E9C27C96EAF` FOREIGN KEY (`numJour`) REFERENCES `jour` (`id`),
  ADD CONSTRAINT `FK_2F938E9C40B03999` FOREIGN KEY (`numFam`) REFERENCES `famille` (`id`),
  ADD CONSTRAINT `FK_2F938E9C7C6B2FA4` FOREIGN KEY (`numTach`) REFERENCES `tache` (`id`);

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `FK_B6BD307FE92F8F78` FOREIGN KEY (`recipient_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_B6BD307FF624B39D` FOREIGN KEY (`sender_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `participant`
--
ALTER TABLE `participant`
  ADD CONSTRAINT `FK_D79F6B113DA5256D` FOREIGN KEY (`image_id`) REFERENCES `image` (`id`),
  ADD CONSTRAINT `FK_D79F6B1179DAFA1A` FOREIGN KEY (`num_par`) REFERENCES `paroise` (`id`),
  ADD CONSTRAINT `FK_D79F6B11A0D63A71` FOREIGN KEY (`num_niv`) REFERENCES `niveau` (`id`),
  ADD CONSTRAINT `FK_D79F6B11C99E9055` FOREIGN KEY (`numLeg`) REFERENCES `legion` (`id`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_8D93D6493DA5256D` FOREIGN KEY (`image_id`) REFERENCES `image` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
