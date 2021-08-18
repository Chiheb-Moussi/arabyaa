-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 13 août 2021 à 22:20
-- Version du serveur :  8.0.19
-- Version de PHP : 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `arabiya`
--

-- --------------------------------------------------------

--
-- Structure de la table `diplome`
--

CREATE TABLE `diplome` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `diplome` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20210726183134', '2021-07-26 20:31:58', 2947),
('DoctrineMigrations\\Version20210726230257', '2021-07-27 01:05:27', 3275),
('DoctrineMigrations\\Version20210726231733', '2021-07-27 01:17:43', 335),
('DoctrineMigrations\\Version20210810141204', '2021-08-10 16:12:13', 2151),
('DoctrineMigrations\\Version20210810143040', '2021-08-10 16:30:48', 1075),
('DoctrineMigrations\\Version20210812231230', '2021-08-13 01:12:38', 3878),
('DoctrineMigrations\\Version20210813004422', '2021-08-13 02:44:31', 5626),
('DoctrineMigrations\\Version20210813021940', '2021-08-13 04:19:49', 1806),
('DoctrineMigrations\\Version20210813123736', '2021-08-13 14:37:45', 1112);

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

CREATE TABLE `post` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `parent_id` int DEFAULT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_naissance` date DEFAULT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ville` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code_postal` int DEFAULT NULL,
  `gouvernerat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pays` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fb_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iban` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ecole` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `classe` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ministere` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `web_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cv` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `motivation_letter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bulletin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `parent_id`, `email`, `roles`, `password`, `nom`, `prenom`, `date_naissance`, `adresse`, `ville`, `code_postal`, `gouvernerat`, `pays`, `tel`, `whatsapp`, `fb_link`, `iban`, `bic`, `ecole`, `classe`, `ministere`, `web_link`, `deleted_at`, `created_at`, `updated_at`, `photo`, `passport`, `cin`, `cv`, `motivation_letter`, `bulletin`, `user_type`, `status`, `description`) VALUES
(1, NULL, 'admin@araabya.com', '[\"ROLE_SUPER_ADMIN\", \"ROLE_USER\"]', '$2y$13$4OBYNY5Ot1fhrjlxFiJ0fOAMaM/YAcq1.73rjbry1BoWgWWv7DZ2y', 'Super', 'Admin', '1993-03-13', '32 rue de la republique', 'Tunis', 9000, 'Tunis Nord', 'Tunisie', '+21651910667', '+21651910667', NULL, 'xxxxxxxx', 'xxxxxxxxxxx', '', '1ere année', NULL, NULL, NULL, '2021-08-13 04:23:41', '2021-08-13 04:23:41', 'avatar.png', NULL, NULL, NULL, NULL, NULL, 'Super admin', 'Approuvé', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `diplome`
--
ALTER TABLE `diplome`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_EB4C4D4EA76ED395` (`user_id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_5A8A6C8D989D9B62` (`slug`),
  ADD KEY `IDX_5A8A6C8DA76ED395` (`user_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`),
  ADD KEY `IDX_8D93D649727ACA70` (`parent_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `diplome`
--
ALTER TABLE `diplome`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `post`
--
ALTER TABLE `post`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `diplome`
--
ALTER TABLE `diplome`
  ADD CONSTRAINT `FK_EB4C4D4EA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `FK_5A8A6C8DA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_8D93D649727ACA70` FOREIGN KEY (`parent_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
