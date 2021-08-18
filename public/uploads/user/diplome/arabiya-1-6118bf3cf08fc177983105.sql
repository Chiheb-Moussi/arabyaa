-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 13 août 2021 à 11:38
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
('DoctrineMigrations\\Version20210813021940', '2021-08-13 04:19:49', 1806);

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
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`id`, `user_id`, `title`, `slug`, `content`, `type`, `image`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 10, 'Marcellus Fahey Sr.', 'marcellus_fahey_sr', 'Est nostrum ut numquam ullam. Rem illo eaque dolorem fugit temporibus autem. At ut eligendi dolorem dolores. Iure debitis vel sed et laboriosam cupiditate nihil.', 'Actualité', 'aaa0.jpg', NULL, '2021-08-12 09:32:08', '2021-08-13 04:19:56'),
(3, 10, 'Dr. Jamil Bartoletti', 'dr_jamil_bartoletti', 'Fugiat placeat iusto quia consequuntur explicabo ut maxime. Voluptate qui rerum sapiente tenetur et mollitia facere id. Culpa quasi ut alias. Eveniet doloremque sunt quisquam quam ea quia non.', 'Actualité', 'aaa1.jpg', NULL, '2021-07-16 17:43:56', '2021-08-13 04:19:56'),
(4, 10, 'Brielle Terry', 'brielle_terry', 'Sunt fugiat doloribus minima dolorum maxime voluptas corporis nobis. Natus laborum eum rerum magni. Consectetur non in nobis quos quibusdam id. Sint molestiae dignissimos dolor maiores facere.', 'Actualité', 'aaa2.jpg', NULL, '2020-09-21 19:36:42', '2021-08-13 04:19:56'),
(5, 10, 'Lorena Lindgren', 'lorena_lindgren', 'Ut mollitia provident quis cumque minus omnis voluptas. Iure nihil molestiae eveniet aut ea cupiditate sint. Necessitatibus quas sed consequatur cumque perferendis ut.', 'Presse', 'aaa3.jpg', NULL, '2004-09-30 08:07:07', '2021-08-13 04:19:56'),
(6, 10, 'Richmond Lubowitz', 'richmond_lubowitz', 'Ratione id quidem minima recusandae exercitationem. Amet unde voluptate earum suscipit. Esse exercitationem architecto consequatur quas beatae odit laudantium.', 'Actualité', 'aaa4.jpg', NULL, '1986-07-30 03:37:17', '2021-08-13 04:19:56'),
(7, 10, 'Raleigh Johns', 'raleigh_johns', 'Nulla nobis asperiores saepe reiciendis quia ut. Quam voluptate deleniti tenetur est quia dolor molestias. Libero ea labore molestiae.', 'Actualité', 'aaa5.jpg', NULL, '2001-08-17 12:46:26', '2021-08-13 04:19:56'),
(8, 10, 'Mrs. Ruth Turcotte', 'mrs_ruth_turcotte', 'Quibusdam rerum facere officia autem et dolores. Dolore sit animi pariatur porro nisi ad. Animi commodi voluptatem aut quis.', 'Presse', 'aaa6.jpg', NULL, '1985-11-16 13:57:26', '2021-08-13 04:19:56'),
(9, 10, 'Xzavier Hartmann III', 'xzavier_hartmann_iii', 'Aspernatur ipsa non occaecati est dicta et et. Facilis fugit aut quisquam ipsam. Inventore debitis beatae dolores non consequatur.', 'Actualité', 'aaa7.jpg', NULL, '2018-06-21 19:31:03', '2021-08-13 04:19:56'),
(10, 10, 'Anjali Batz II', 'anjali_batz_ii', 'Blanditiis reprehenderit id nemo et quos cumque voluptatem. Asperiores ipsum optio voluptatem qui. Magnam ipsam eos vero saepe aut.', 'Presse', 'aaa8.jpg', NULL, '2006-07-07 19:00:15', '2021-08-13 04:19:56'),
(11, 10, 'Calista Kilback Jr.', 'calista_kilback_jr', 'Nobis laudantium perspiciatis nesciunt. Incidunt modi minus unde omnis. Maiores magni aperiam sunt magnam. Eligendi a in omnis repellendus labore autem. Ex minus laboriosam nihil modi est.', 'Actualité', 'aaa9.jpg', NULL, '1974-02-11 16:42:41', '2021-08-13 04:19:56'),
(12, 10, 'Dr. Clemmie D\'Amore', 'dr_clemmie_damore', 'Tempora autem doloribus id qui et. Veritatis quo unde deserunt qui fugiat aut. Ut sint occaecati vero eum sequi veritatis molestiae. Eos dolores et repellendus consequatur.', 'Actualité', 'aaa10.jpg', NULL, '2005-11-12 11:40:14', '2021-08-13 04:19:56'),
(13, 10, 'Wava Hermann', 'wava_hermann', 'Minima eaque quaerat cupiditate aut. Eligendi id rerum non id minima aut. Neque fugit porro doloribus autem dolorum repellat in sed. Perferendis est non tempora molestiae maxime modi.', 'Actualité', 'aaa11.jpg', NULL, '1983-10-25 02:41:28', '2021-08-13 04:19:56'),
(14, 10, 'Dr. Otto Kiehn', 'dr_otto_kiehn', 'Porro qui ratione cumque ducimus. Id dolore veniam harum sit. Reiciendis eos soluta omnis.', 'Actualité', 'aaa12.jpg', NULL, '1992-01-15 18:20:18', '2021-08-13 04:19:56'),
(15, 10, 'Gregoria Bartoletti', 'gregoria_bartoletti', 'Debitis qui autem id excepturi. Eveniet voluptatem totam saepe sit dolorum voluptas qui.', 'Presse', 'aaa13.jpg', NULL, '1975-01-16 15:12:00', '2021-08-13 04:19:56'),
(16, 10, 'Dr. Sheila Hane DVM', 'dr_sheila_hane_dvm', 'Nam qui ducimus iure numquam blanditiis. Voluptas quaerat molestias quaerat ipsum. Architecto possimus ullam beatae quis optio quo nobis et.', 'Actualité', 'aaa14.jpg', NULL, '2001-04-14 18:52:13', '2021-08-13 04:19:56'),
(17, 10, 'Tavares Kutch', 'tavares_kutch', 'Ipsum id repellendus quisquam aliquid repudiandae dolor ipsam. Nam quae est porro consequatur blanditiis quibusdam. Est dignissimos quae dolorem aut.', 'Actualité', 'aaa15.jpg', NULL, '1989-03-21 14:30:32', '2021-08-13 04:19:56'),
(18, 10, 'Madie Blanda MD', 'madie_blanda_md', 'Sed mollitia laborum praesentium laudantium ipsa. Et et tempora quisquam facilis.', 'Actualité', 'aaa16.jpg', NULL, '1999-06-13 17:09:32', '2021-08-13 04:19:56'),
(19, 10, 'Caitlyn Mueller', 'caitlyn_mueller', 'Magnam quo vitae blanditiis sunt hic. Non nihil velit fugit nihil in. Laborum magnam laudantium at et totam odit. Beatae ut consectetur natus enim excepturi autem ad.', 'Actualité', 'aaa17.jpg', NULL, '2019-08-27 01:50:32', '2021-08-13 04:19:56'),
(20, 10, 'Prof. Alexandro Stroman', 'prof_alexandro_stroman', 'Optio nihil ab accusamus accusamus iusto. Exercitationem nam possimus ad totam ipsa. Molestiae perspiciatis sint omnis natus voluptas est.', 'Presse', 'aaa18.jpg', NULL, '1994-08-21 08:43:09', '2021-08-13 04:19:56'),
(21, 10, 'Ms. Agnes Daugherty PhD', 'ms_agnes_daugherty_phd', 'Consequatur sunt consectetur ab molestiae tenetur sint id. Aspernatur ut sit occaecati qui. Itaque quasi et omnis qui. Consequatur cumque nulla provident.', 'Actualité', 'aaa19.jpg', NULL, '1993-11-07 10:33:39', '2021-08-13 04:19:56'),
(22, 10, 'Jordy Cremin', 'jordy_cremin', 'Ratione est aut porro consequatur. Ratione sed reiciendis ipsa nemo. Tempore quasi aut similique atque.', 'Actualité', 'aaa20.jpg', NULL, '1987-07-17 21:18:07', '2021-08-13 04:19:56'),
(23, 10, 'Dr. Emmet Huel PhD', 'dr_emmet_huel_phd', 'Iusto aut cupiditate qui omnis iste. Deleniti ullam reiciendis et dolorem iure. Fuga voluptates et id earum vitae totam. Provident aut ut odit harum aut.', 'Actualité', 'aaa21.jpg', NULL, '2018-08-23 00:48:17', '2021-08-13 04:19:56'),
(24, 10, 'Lysanne Boyer', 'lysanne_boyer', 'Cum sunt totam ut et commodi. Hic provident nemo eos sed velit repudiandae. Aliquid tenetur dignissimos ex nulla. Fugiat ad expedita voluptatem nihil.', 'Actualité', 'aaa22.jpg', NULL, '1982-05-17 23:58:11', '2021-08-13 04:19:56'),
(25, 10, 'Reagan Kuvalis V', 'reagan_kuvalis_v', 'Voluptatem assumenda fugiat deleniti sunt expedita. Doloremque ipsa consectetur omnis. Harum quasi distinctio fuga omnis ipsum. Fugit enim voluptas sint porro assumenda dolor.', 'Presse', 'aaa23.jpg', NULL, '2002-03-31 07:48:02', '2021-08-13 04:19:56'),
(26, 10, 'Wilber Borer', 'wilber_borer', 'Nisi nostrum animi laborum odio quis non quo. Odit perspiciatis dicta omnis consectetur eligendi. Voluptate repellendus itaque doloremque porro. Quasi exercitationem sint assumenda.', 'Actualité', 'aaa24.jpg', NULL, '2007-12-24 16:47:21', '2021-08-13 04:19:56'),
(27, 10, 'Angelica Pfannerstill', 'angelica_pfannerstill', 'Unde et eveniet nihil doloribus. Omnis sed enim tempora sit quis harum rerum. Inventore fugit et nam.', 'Actualité', 'aaa25.jpg', NULL, '2014-12-13 07:56:22', '2021-08-13 04:19:56'),
(28, 10, 'Mrs. Jazmin Collier MD', 'mrs_jazmin_collier_md', 'Qui et quas et molestiae. Error dolore sed aut unde quod. Officia illum consequatur culpa ab et dolorem. Assumenda fuga eveniet quasi amet dolor laborum.', 'Actualité', 'aaa26.jpg', NULL, '1994-07-30 22:23:17', '2021-08-13 04:19:56'),
(29, 10, 'Juliana Willms PhD', 'juliana_willms_phd', 'Quibusdam omnis iure iure aliquid illo. Similique aliquam sed sed ipsum. Non ea consectetur non praesentium et doloremque velit. Quis commodi ipsam odio sunt.', 'Actualité', 'aaa27.jpg', NULL, '1971-07-22 07:25:01', '2021-08-13 04:19:56'),
(30, 10, 'Dr. Maxime Mante DVM', 'dr_maxime_mante_dvm', 'Cupiditate beatae repudiandae repellat est. Voluptatem corrupti et eum sequi voluptatem quos. Vel fugit amet provident expedita nesciunt dolorem repellendus.', 'Presse', 'aaa28.jpg', NULL, '1971-08-26 10:44:16', '2021-08-13 04:19:56'),
(31, 10, 'Ari Frami', 'ari_frami', 'Animi velit ea ad ut odio voluptatem sed. Quisquam hic tenetur provident. Quod enim adipisci consequatur earum provident enim neque quos.', 'Actualité', 'aaa29.jpg', NULL, '2020-07-04 23:40:40', '2021-08-13 04:19:56'),
(32, 10, 'Eino Barton', 'eino_barton', 'Aperiam sint sint nobis aliquam delectus qui molestias sed. Earum ad quae tenetur ducimus aliquam. Id ut explicabo quisquam dolore ut ut.', 'Actualité', 'aaa30.jpg', NULL, '2000-04-29 01:11:44', '2021-08-13 04:19:56'),
(33, 10, 'Miss Elvera Romaguera Sr.', 'miss_elvera_romaguera_sr', 'Est quis consectetur ipsa ex deserunt modi. Nulla sed sint est id quia aliquam quidem ad. Accusantium eaque eum dignissimos animi optio perferendis enim.', 'Actualité', 'aaa31.jpg', NULL, '2020-07-21 11:09:43', '2021-08-13 04:19:56'),
(34, 10, 'Kayleigh Hahn', 'kayleigh_hahn', 'Natus inventore maxime ut iste. Laborum corporis sunt molestiae quasi minus cumque. Possimus nisi aut exercitationem consequatur ipsa hic.', 'Actualité', 'aaa32.jpg', NULL, '2019-07-03 22:24:55', '2021-08-13 04:19:56'),
(35, 10, 'Dejuan McClure', 'dejuan_mcclure', 'Tempora ut ducimus enim. Et eos explicabo ipsum aut eum libero. Eum enim ut unde quo optio et harum.', 'Presse', 'aaa33.jpg', NULL, '2020-11-05 14:17:47', '2021-08-13 04:19:56'),
(36, 10, 'Prof. Khalil Thompson II', 'prof_khalil_thompson_ii', 'Ut aperiam quia rerum nulla et eligendi sit. Quae recusandae eos nesciunt atque nobis. Eos aut beatae adipisci quae. Recusandae voluptate voluptatibus est assumenda dolor.', 'Actualité', 'aaa34.jpg', NULL, '1978-07-21 18:39:20', '2021-08-13 04:19:56'),
(37, 10, 'Lucinda Krajcik', 'lucinda_krajcik', 'Itaque itaque accusantium est sapiente veritatis hic quis dolor. Laudantium est magni quaerat. Ducimus aspernatur est neque aut in debitis aut.', 'Actualité', 'aaa35.jpg', NULL, '1972-02-07 21:59:26', '2021-08-13 04:19:56'),
(38, 10, 'Dr. Lavonne Hyatt', 'dr_lavonne_hyatt', 'Ut illo natus laborum libero qui repudiandae. Omnis officia doloribus eos pariatur consequuntur dolorem. Enim aut aut aut magni. Sit eos debitis repellat non sed.', 'Actualité', 'aaa36.jpg', NULL, '1976-03-18 18:27:26', '2021-08-13 04:19:56'),
(39, 10, 'Lavonne Collier', 'lavonne_collier', 'Assumenda et velit libero. Corrupti ipsam ducimus impedit vero enim porro voluptas. Eveniet sit nostrum iure consequatur delectus.', 'Actualité', 'aaa37.jpg', NULL, '1985-01-30 17:46:25', '2021-08-13 04:19:56'),
(40, 10, 'Eladio Hane Sr.', 'eladio_hane_sr', 'Natus aut laborum atque. Qui veniam aliquam atque ut tempore consequuntur. Adipisci temporibus quidem amet qui aspernatur.', 'Presse', 'aaa38.jpg', NULL, '1987-05-26 23:47:44', '2021-08-13 04:19:56'),
(41, 10, 'Dawn Klein I', 'dawn_klein_i', 'Quam vel labore quis velit ut nemo. Quas qui in sed ipsam qui. Quae at repellat nesciunt aliquam qui sed possimus. Sit optio placeat provident corrupti.', 'Actualité', 'aaa39.jpg', NULL, '1974-01-09 08:41:10', '2021-08-13 04:19:56'),
(42, 10, 'Ms. Domenica Jast', 'ms_domenica_jast', 'Aut blanditiis aut soluta et ea vel autem soluta. Temporibus rerum impedit est neque. Harum eum est consequatur dolorum nesciunt vel dolores. Repudiandae ea doloremque ratione omnis totam et soluta.', 'Actualité', 'aaa40.jpg', NULL, '1973-01-04 21:06:51', '2021-08-13 04:19:56'),
(43, 10, 'Carley Zieme', 'carley_zieme', 'Temporibus sint quia qui et dolores sequi iusto. Voluptatum est tempore velit reiciendis dignissimos ut odio aperiam. Assumenda consectetur laborum consequatur earum consequatur voluptas magni.', 'Actualité', 'aaa41.jpg', NULL, '2019-10-17 00:14:09', '2021-08-13 04:19:56'),
(44, 10, 'Prof. Henderson Stracke Sr.', 'prof_henderson_stracke_sr', 'Ea natus voluptates aut quas quam. Error itaque laborum aspernatur reprehenderit vel id. Suscipit iste tenetur quae sit exercitationem. Quis laboriosam dolores dolores harum.', 'Actualité', 'aaa42.jpg', NULL, '1981-04-23 06:19:06', '2021-08-13 04:19:56'),
(45, 10, 'Dr. Annabell Erdman', 'dr_annabell_erdman', 'Odit rem a repellendus qui earum qui. Numquam consequatur ut voluptatem quo voluptate.', 'Presse', 'aaa43.jpg', NULL, '1978-11-13 04:33:04', '2021-08-13 04:19:56'),
(46, 10, 'Helen Krajcik', 'helen_krajcik', 'Dignissimos aut dolores voluptatem velit laboriosam ducimus rerum. Ut rerum accusantium sed quae illum amet. Quia dicta molestiae iure doloribus.', 'Actualité', 'aaa44.jpg', NULL, '1974-12-19 11:52:30', '2021-08-13 04:19:56'),
(47, 10, 'Dr. Faye Wiegand II', 'dr_faye_wiegand_ii', 'Voluptate expedita in aut fugit. Est consectetur voluptatem repellat tempore quia eos.', 'Actualité', 'aaa45.jpg', NULL, '1991-11-04 04:46:30', '2021-08-13 04:19:56'),
(48, 10, 'Alexa Krajcik', 'alexa_krajcik', 'Numquam ea aut illo cupiditate culpa. Eum ut nam et deserunt provident dolor. Cum aut velit reprehenderit sint a repudiandae est.', 'Actualité', 'aaa46.jpg', NULL, '2003-12-04 09:32:14', '2021-08-13 04:19:56'),
(49, 10, 'Dr. Wilber Sipes', 'dr_wilber_sipes', 'Ullam possimus et nihil et nemo itaque provident. Laudantium qui ut distinctio. Nostrum rerum eos velit dolor qui nihil.', 'Actualité', 'aaa47.jpg', NULL, '2011-02-20 00:40:22', '2021-08-13 04:19:56'),
(50, 10, 'Sarah Aufderhar I', 'sarah_aufderhar_i', 'Laborum aut esse laborum minus natus ex magnam. Neque ducimus maxime laborum ad quisquam neque qui quo.', 'Presse', 'aaa48.jpg', NULL, '2020-05-12 16:34:48', '2021-08-13 04:19:56'),
(51, 10, 'Chelsea Roob', 'chelsea_roob', 'Voluptatibus necessitatibus odio quibusdam beatae exercitationem quam dolorem. Quia quo temporibus ut suscipit aliquam sit ab.', 'Actualité', 'aaa49.jpg', NULL, '2004-08-07 15:59:23', '2021-08-13 04:19:56'),
(52, 10, 'Kiarra Deckow', 'kiarra_deckow', 'Unde mollitia eum quis provident ducimus error autem. Sit sint error voluptas vel nisi. Itaque esse veritatis explicabo eaque veniam quo nihil.', 'Actualité', 'aaa50.jpg', NULL, '1990-03-04 09:54:24', '2021-08-13 04:19:56'),
(53, 10, 'Prof. Mervin Tillman', 'prof_mervin_tillman', 'Voluptatem dolorem nemo quae quaerat quia vel nesciunt. Recusandae tempore iusto ut id non iusto nostrum. Commodi cum quia vel qui et aut. Eaque ducimus qui molestiae qui.', 'Actualité', 'aaa51.jpg', NULL, '1995-09-17 10:59:59', '2021-08-13 04:19:56'),
(54, 10, 'Dr. Bobby Bins', 'dr_bobby_bins', 'Quidem deserunt ut quidem et natus. Quis atque qui labore et qui ab. Rem molestiae rerum accusamus odio consequuntur qui. Repudiandae et officiis sit illum tenetur eaque.', 'Actualité', 'aaa52.jpg', NULL, '1983-09-18 22:16:56', '2021-08-13 04:19:56'),
(55, 10, 'Dr. Arianna Gaylord', 'dr_arianna_gaylord', 'Eos nostrum perferendis iste consequatur. Veniam voluptatem eius quasi sint. Expedita eius odit sint non.', 'Presse', 'aaa53.jpg', NULL, '2002-11-07 04:01:48', '2021-08-13 04:19:56'),
(56, 10, 'Wallace Wolff V', 'wallace_wolff_v', 'Et commodi cum modi. Et tenetur magnam sed vel voluptate sint aut. Cum est culpa nemo vero aliquid consectetur.', 'Actualité', 'aaa54.jpg', NULL, '2003-09-10 22:31:44', '2021-08-13 04:19:56'),
(57, 10, 'Gabriel Cole', 'gabriel_cole', 'Sed quia et et est quia ut. Est ab provident omnis et in tempora soluta commodi. Autem beatae quia occaecati provident. Non labore corrupti sed dolorem eos.', 'Actualité', 'aaa55.jpg', NULL, '2016-05-23 04:03:18', '2021-08-13 04:19:56'),
(58, 10, 'Walter McGlynn MD', 'walter_mcglynn_md', 'Expedita in distinctio et deserunt numquam. Ut rerum id aut neque. Qui inventore dolor tempora explicabo placeat molestiae ex.', 'Actualité', 'aaa56.jpg', NULL, '2010-04-16 08:07:33', '2021-08-13 04:19:56'),
(59, 10, 'Prof. Mose Auer Jr.', 'prof_mose_auer_jr', 'Cumque laboriosam ut neque vero iusto sapiente et. Ad sed vitae sint ut magni consequatur. Nihil aut rem sint quia ad minima et recusandae.', 'Actualité', 'aaa57.jpg', NULL, '1973-01-16 14:39:48', '2021-08-13 04:19:56'),
(60, 10, 'Angelita Bauch DVM', 'angelita_bauch_dvm', 'Enim eos deserunt consequuntur molestiae similique. Eaque ut quod quis qui. Magnam dolorem ut qui et explicabo. Omnis magni expedita eaque nobis impedit. Quis debitis sit possimus labore.', 'Presse', 'aaa58.jpg', NULL, '2008-07-02 08:31:41', '2021-08-13 04:19:56'),
(61, 10, 'Katrine Pouros', 'katrine_pouros', 'Ut assumenda facilis velit reiciendis quo molestias magnam soluta. Voluptatem voluptatem accusantium quis quod ipsum ex hic sint.', 'Actualité', 'aaa59.jpg', NULL, '1986-12-09 15:18:39', '2021-08-13 04:19:56'),
(62, 10, 'Elfrieda Koepp DVM', 'elfrieda_koepp_dvm', 'Voluptates aut aut odio molestiae inventore excepturi. Accusantium ipsam et aut debitis ullam eos. Sunt quasi quasi quidem sapiente.', 'Actualité', 'aaa60.jpg', NULL, '2005-02-24 18:53:56', '2021-08-13 04:19:56'),
(63, 10, 'Sarah Gaylord', 'sarah_gaylord', 'Et repudiandae et sunt aliquid autem assumenda. Dolores ullam ut qui maiores nobis. Ducimus quisquam maiores unde laboriosam.', 'Actualité', 'aaa61.jpg', NULL, '2017-12-08 11:26:32', '2021-08-13 04:19:56'),
(64, 10, 'Bruce Beahan', 'bruce_beahan', 'Libero quidem molestiae soluta. Consequatur quisquam nam ipsam. Beatae officiis culpa minus ea mollitia quae laboriosam. Atque doloribus pariatur sequi ut.', 'Actualité', 'aaa62.jpg', NULL, '1981-01-01 03:59:09', '2021-08-13 04:19:56'),
(65, 10, 'Margarete Kuhlman', 'margarete_kuhlman', 'Enim eum molestias qui et adipisci. Officia assumenda eaque minima laboriosam sit. Temporibus eum reiciendis numquam corporis doloremque. Et dolorem eos ullam est hic illum.', 'Presse', 'aaa63.jpg', NULL, '2012-10-06 15:34:58', '2021-08-13 04:19:56'),
(66, 10, 'Johan Kuphal', 'johan_kuphal', 'Exercitationem adipisci rerum veritatis excepturi fugit dolorem magni. Nam explicabo dolorum nostrum optio est. Non ea eum sed doloremque quam molestias.', 'Actualité', 'aaa64.jpg', NULL, '2002-01-02 08:14:11', '2021-08-13 04:19:56'),
(67, 10, 'Reagan Schmeler', 'reagan_schmeler', 'Illum qui quaerat quam. Itaque architecto autem amet excepturi a quia rem. Aut laudantium rerum sit voluptatum. Sit enim architecto saepe quibusdam ipsum qui illum eaque.', 'Actualité', 'aaa65.jpg', NULL, '2016-09-04 02:14:11', '2021-08-13 04:19:56'),
(68, 10, 'Jerel Hoppe V', 'jerel_hoppe_v', 'Pariatur et numquam vel est natus voluptatem. Voluptatem minus fugiat sequi sit debitis non. Quis incidunt at et ut natus expedita enim ut. Sed sunt ipsum velit quia incidunt reiciendis.', 'Actualité', 'aaa66.jpg', NULL, '1977-08-25 13:08:00', '2021-08-13 04:19:56'),
(69, 10, 'Kenton Huel', 'kenton_huel', 'Quia enim maxime amet eligendi quia eius voluptas. Aliquid non non praesentium molestias quia hic asperiores. Animi et quia assumenda doloremque sapiente placeat quis.', 'Actualité', 'aaa67.jpg', NULL, '1990-03-19 14:15:25', '2021-08-13 04:19:56'),
(70, 10, 'Ernest Nicolas', 'ernest_nicolas', 'Tenetur tempora odio eveniet. Eos autem distinctio illum provident praesentium illo fuga. Et consequatur est alias iusto laborum autem. Omnis repellat perferendis aut odit et.', 'Presse', 'aaa68.jpg', NULL, '1987-08-02 18:04:25', '2021-08-13 04:19:56'),
(71, 10, 'Mrs. Alfreda Steuber Jr.', 'mrs_alfreda_steuber_jr', 'Sed incidunt voluptas tempora. Rem unde rerum beatae blanditiis delectus debitis. Eius iste consequatur est et. Eos et eos amet totam dolorum vel ab.', 'Actualité', 'aaa69.jpg', NULL, '2007-12-23 03:31:41', '2021-08-13 04:19:56'),
(72, 10, 'Diego Pollich', 'diego_pollich', 'Voluptas commodi aut corporis officia est reprehenderit qui. Id omnis fuga dicta nobis ut dolorem. Voluptatem quod necessitatibus illum. Eius harum doloribus delectus fugit omnis.', 'Actualité', 'aaa70.jpg', NULL, '1971-11-25 17:25:08', '2021-08-13 04:19:56'),
(73, 10, 'Mrs. Gladys Luettgen III', 'mrs_gladys_luettgen_iii', 'Fuga eos fugit ut vel sint. Accusantium cumque porro possimus et nulla. Voluptatem blanditiis fuga voluptatibus molestiae esse consequuntur inventore. Sed nostrum similique repellat.', 'Actualité', 'aaa71.jpg', NULL, '1989-10-10 10:15:48', '2021-08-13 04:19:56'),
(74, 10, 'Clementine Wilkinson', 'clementine_wilkinson', 'Ea aliquam ullam dolores voluptatem dicta eius dolores ipsa. A aliquam error voluptates atque inventore vero voluptatem dolor. Aperiam perspiciatis corporis excepturi cum.', 'Actualité', 'aaa72.jpg', NULL, '2003-01-23 04:28:31', '2021-08-13 04:19:56'),
(75, 10, 'Mr. Bernie Reilly II', 'mr_bernie_reilly_ii', 'Et qui optio veritatis et eius eos saepe. Natus temporibus eos quia laudantium ea. Repellat tempore vitae enim ut.', 'Presse', 'aaa73.jpg', NULL, '2017-06-20 21:16:43', '2021-08-13 04:19:56'),
(76, 10, 'Alexie Runolfsdottir', 'alexie_runolfsdottir', 'Dolor pariatur mollitia in qui dolorum ut. Minima consectetur ullam ullam aperiam dignissimos dicta et. In voluptatem temporibus aperiam.', 'Actualité', 'aaa74.jpg', NULL, '1990-02-13 10:36:14', '2021-08-13 04:19:56'),
(77, 10, 'Lillie Kuhic', 'lillie_kuhic', 'Reiciendis sit voluptate ut est aut excepturi. Aut qui rerum fugit perferendis. Nihil optio eaque voluptate eum repellendus. Quis ut natus quod vero perferendis perspiciatis.', 'Actualité', 'aaa75.jpg', NULL, '1982-01-23 14:39:49', '2021-08-13 04:19:56'),
(78, 10, 'Durward Rempel PhD', 'durward_rempel_phd', 'Corporis nemo eum deleniti. Et et dignissimos aliquam ipsa aut aut laudantium. Ut rerum omnis eius. Esse ut neque nostrum velit officiis culpa nihil.', 'Actualité', 'aaa76.jpg', NULL, '1991-11-14 18:15:00', '2021-08-13 04:19:56'),
(79, 10, 'Dimitri Labadie', 'dimitri_labadie', 'Sed sapiente dolorem tempore vel. Aspernatur dolores corporis repudiandae praesentium sit. Fugiat debitis qui eligendi sed esse officia vitae harum.', 'Actualité', 'aaa77.jpg', NULL, '2015-03-18 23:33:16', '2021-08-13 04:19:56'),
(80, 10, 'Mrs. Martine Grant Sr.', 'mrs_martine_grant_sr', 'Aut ratione aut ratione sed itaque pariatur qui. Qui ea consequuntur omnis deserunt placeat dicta et. Velit at maxime omnis.', 'Presse', 'aaa78.jpg', NULL, '1995-03-27 03:29:29', '2021-08-13 04:19:56'),
(81, 10, 'Mrs. Justine Stroman Sr.', 'mrs_justine_stroman_sr', 'Dolorum doloremque ut quo vero dolorem porro. Officia ea consectetur nostrum. Dolor cupiditate sint harum qui sit quia. Necessitatibus amet ea facilis incidunt et sed.', 'Actualité', 'aaa79.jpg', NULL, '1988-02-20 21:48:35', '2021-08-13 04:19:56'),
(82, 10, 'Lynn Ledner', 'lynn_ledner', 'Aut dolorem corporis occaecati repudiandae quam dolore. Qui inventore tenetur aut quas ullam assumenda. Ipsam nihil dolore exercitationem ut amet numquam id.', 'Actualité', 'aaa80.jpg', NULL, '2013-04-30 21:58:57', '2021-08-13 04:19:56'),
(83, 10, 'Ms. Candice Wilderman III', 'ms_candice_wilderman_iii', 'Aut quia explicabo eius minima nobis. Et vel corporis aut possimus et quia tempora enim. Et adipisci nulla et dolorem perferendis. Nostrum quod tempora esse voluptatem eum totam provident.', 'Actualité', 'aaa81.jpg', NULL, '1990-05-31 06:15:51', '2021-08-13 04:19:56'),
(84, 10, 'Estel Okuneva', 'estel_okuneva', 'Exercitationem et et ad eum similique sed cumque. Expedita dolor voluptas ex odio ullam illo. Enim voluptatum quia qui ipsum expedita optio. Eum eius autem voluptas ducimus veniam tenetur.', 'Actualité', 'aaa82.jpg', NULL, '1972-09-02 19:04:20', '2021-08-13 04:19:56'),
(85, 10, 'Amy Osinski', 'amy_osinski', 'Dolorem animi veniam assumenda consequatur aut. Laborum magnam dolorum unde reiciendis. Et eum voluptatem enim non commodi. Enim saepe et qui eveniet id amet soluta.', 'Presse', 'aaa83.jpg', NULL, '2016-03-20 00:19:22', '2021-08-13 04:19:56'),
(86, 10, 'Ahmed Hayes', 'ahmed_hayes', 'Est fugit hic dolores magni sunt itaque. Ea et dolor minus maxime. Labore eum et nulla.', 'Actualité', 'aaa84.jpg', NULL, '1997-08-13 04:08:14', '2021-08-13 04:19:56'),
(87, 10, 'Prof. Terrell Hettinger IV', 'prof_terrell_hettinger_iv', 'Distinctio aspernatur unde voluptatem tenetur nihil repudiandae. Fuga voluptas pariatur quo earum assumenda odio laborum. Est assumenda et et fugiat sunt natus. Vitae ut optio aliquid ut ipsam.', 'Actualité', 'aaa85.jpg', NULL, '1976-02-05 06:15:44', '2021-08-13 04:19:56'),
(88, 10, 'Electa Konopelski', 'electa_konopelski', 'A et explicabo alias voluptas corporis. Ullam vitae accusantium quia eaque. Ut voluptatibus eos modi doloribus voluptatem voluptas consectetur.', 'Actualité', 'aaa86.jpg', NULL, '2006-06-11 06:16:52', '2021-08-13 04:19:56'),
(89, 10, 'Clemens Osinski', 'clemens_osinski', 'Et rerum alias dolor eos quisquam aut non. Ut dolore id fugit molestiae nobis nam facilis ut.', 'Actualité', 'aaa87.jpg', NULL, '1979-12-16 22:58:39', '2021-08-13 04:19:56'),
(90, 10, 'Prof. Ephraim Runte', 'prof_ephraim_runte', 'Similique ullam qui sint tempora et. Eligendi ratione rem esse. Iure occaecati explicabo voluptatem accusamus rerum.', 'Presse', 'aaa88.jpg', NULL, '1992-08-27 07:16:51', '2021-08-13 04:19:56'),
(91, 10, 'Tina Hintz', 'tina_hintz', 'Dolorem labore earum amet ea error amet amet ducimus. Molestiae assumenda quod ut sint rerum sunt. Modi quos suscipit dolore ut perferendis.', 'Actualité', 'aaa89.jpg', NULL, '2005-05-30 07:32:36', '2021-08-13 04:19:56'),
(92, 10, 'Vena Stehr', 'vena_stehr', 'Alias repellendus non dolorem exercitationem est asperiores voluptatum. Perspiciatis qui magni ut deleniti. Voluptas illo a dolor aut.', 'Actualité', 'aaa90.jpg', NULL, '1984-02-17 02:30:31', '2021-08-13 04:19:56'),
(93, 10, 'Dr. Fernando Hoeger Sr.', 'dr_fernando_hoeger_sr', 'Recusandae a aut deserunt non deserunt voluptate et. Nihil voluptas et incidunt voluptate et molestias. Est voluptatem quas sit est magni vero.', 'Actualité', 'aaa91.jpg', NULL, '2009-01-09 19:09:03', '2021-08-13 04:19:56'),
(94, 10, 'Bria Hegmann Sr.', 'bria_hegmann_sr', 'Ut consectetur quod est repudiandae modi vero consequatur. Expedita earum iure dolores nesciunt dicta architecto. Dignissimos id rerum quas et similique est aperiam quia.', 'Actualité', 'aaa92.jpg', NULL, '1989-12-05 16:17:27', '2021-08-13 04:19:56'),
(95, 10, 'Lonie Trantow', 'lonie_trantow', 'Sed quas laudantium dolores culpa aut iure omnis. Est corrupti expedita molestiae asperiores. Quia enim aut suscipit rerum vel. Voluptatem nobis ipsa dolor et autem amet mollitia illo.', 'Presse', 'aaa93.jpg', NULL, '1998-03-17 02:45:45', '2021-08-13 04:19:56'),
(96, 10, 'Wilburn Zboncak', 'wilburn_zboncak', 'Repudiandae dolor qui veniam libero nisi. Ea vitae dolore laudantium officiis corporis. Quidem adipisci tenetur qui et consequatur iure.', 'Actualité', 'aaa94.jpg', NULL, '1996-01-21 02:30:18', '2021-08-13 04:19:56'),
(97, 10, 'Mrs. Justina Hickle DDS', 'mrs_justina_hickle_dds', 'Omnis nam nihil nemo rem. Sint ut autem perspiciatis ullam id. Quibusdam voluptatem ipsum ut sapiente.', 'Actualité', 'aaa95.jpg', NULL, '1991-09-14 03:55:23', '2021-08-13 04:19:56'),
(98, 10, 'Kip Tillman', 'kip_tillman', 'Laudantium aut veritatis quae laborum non. Dolore non voluptatem quod rerum consequatur impedit qui ratione. Excepturi sint quas consequatur consectetur doloribus at dolore.', 'Actualité', 'aaa96.jpg', NULL, '1990-02-19 14:40:07', '2021-08-13 04:19:56'),
(99, 10, 'Sallie Reichel', 'sallie_reichel', 'Magni velit corrupti aperiam accusamus est. Blanditiis ipsa illum ducimus autem nam ipsa. Est maiores impedit fuga officiis sint nam repellat.', 'Actualité', 'aaa97.jpg', NULL, '2018-01-30 11:01:22', '2021-08-13 04:19:56'),
(100, 10, 'Elbert Wiegand', 'elbert_wiegand', 'Autem possimus cum ex laudantium eos amet. Adipisci adipisci dolor consectetur officiis rerum quod. Velit quis nostrum iste corporis. Ab quia ducimus vero eos autem non in.', 'Actualité', 'aaa98.jpg', NULL, '1986-08-07 08:36:37', '2021-08-13 04:19:56'),
(101, 10, 'Alene Spinka', 'alene_spinka', 'Voluptatem et et blanditiis voluptatem. Dolor reprehenderit illum voluptate saepe non. Eum et velit dolorum sint necessitatibus enim. Laudantium mollitia quos distinctio molestiae.', 'Actualité', 'aaa99.jpg', NULL, '1987-11-12 10:45:20', '2021-08-13 04:19:56'),
(102, 10, 'article x', 'article_x', 'aezzaezea', 'Actualité', '100x100-61163a9d2338b572969547.png', NULL, '2021-08-13 11:25:48', '2021-08-13 11:25:49'),
(103, 10, 'test 1', 'test_1', 'ezaeza', 'Presse', '100x100-61163ae9eb4d7818921485.png', NULL, '2021-08-13 11:27:05', '2021-08-13 11:27:05'),
(104, 10, 'xxxxx', 'xxxxx', 'xxxxxxxx', 'Actualité', '100x100-61163b42ad1c5860913591.png', NULL, '2021-08-13 11:28:34', '2021-08-13 11:28:34');

-- --------------------------------------------------------

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
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `parent_id`, `email`, `roles`, `password`, `nom`, `prenom`, `date_naissance`, `adresse`, `ville`, `code_postal`, `gouvernerat`, `pays`, `tel`, `whatsapp`, `fb_link`, `iban`, `bic`, `ecole`, `classe`, `ministere`, `web_link`, `deleted_at`, `created_at`, `updated_at`, `photo`, `passport`, `cin`, `cv`, `motivation_letter`, `bulletin`, `user_type`, `status`) VALUES
(10, NULL, 'admin@araabya.com', '[\"ROLE_SUPER_ADMIN\", \"ROLE_USER\"]', '$2y$13$4OBYNY5Ot1fhrjlxFiJ0fOAMaM/YAcq1.73rjbry1BoWgWWv7DZ2y', 'Super', 'Admin', '1993-03-13', '32 rue de la republique', 'Beja', 9000, 'Beja Nord', 'Tunisie', '+21651910667', '+21651910667', NULL, 'xxxxxxxx', 'xxxxxxxxxxx', 'Esprit', '1ere année', NULL, NULL, NULL, '2021-08-13 04:23:41', '2021-08-13 04:23:41', '100x100-6115d7ad12247282801190.png', NULL, NULL, NULL, NULL, NULL, 'Super admin', 'Approuvé');

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

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
