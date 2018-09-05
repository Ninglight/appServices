-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1:8889
-- Généré le :  Mar 04 Septembre 2018 à 15:53
-- Version du serveur :  5.6.35
-- Version de PHP :  7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `appservices`
--

-- --------------------------------------------------------

--
-- Structure de la table `answers`
--

CREATE TABLE `answers` (
  `id` int(10) UNSIGNED NOT NULL,
  `question_id` int(11) NOT NULL,
  `default_value_id` int(11) NOT NULL,
  `value` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `answers`
--

INSERT INTO `answers` (`id`, `question_id`, `default_value_id`, `value`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Intermédiaire (9h-11h)', '2018-08-27 07:43:04', '2018-09-03 06:49:45'),
(2, 1, 2, 'Basique (6h - 8h)', '2018-08-27 07:43:11', '2018-09-03 06:49:20'),
(4, 2, 4, 'Autonomie standard (50h)', '2018-08-27 07:50:38', '2018-09-03 06:47:14'),
(8, 2, 3, 'Bonne autonomie (60h)', '2018-08-29 12:27:42', '2018-09-03 06:48:20'),
(9, 3, 7, 'Oui', '2018-08-31 07:30:12', '2018-08-31 07:30:12'),
(11, 3, 8, 'Non', '2018-08-31 07:30:24', '2018-08-31 07:30:24'),
(12, 4, 5, 'Je me déplace peu', '2018-09-03 06:37:51', '2018-09-03 06:37:51'),
(13, 4, 6, 'Je suis mobile', '2018-09-03 06:38:02', '2018-09-03 06:38:02'),
(14, 1, 9, 'Intensive (Plus de 11h)', '2018-09-03 06:41:55', '2018-09-03 06:50:06'),
(15, 2, 12, 'Très grande autonomie (+150h)', '2018-09-03 06:46:00', '2018-09-03 06:47:00'),
(16, 2, 10, 'Peu d\'autonomie (40h)', '2018-09-03 06:46:28', '2018-09-03 06:47:28'),
(17, 2, 11, 'Grande autonomie (100h)', '2018-09-03 06:47:50', '2018-09-03 06:47:50');

-- --------------------------------------------------------

--
-- Structure de la table `attributes`
--

CREATE TABLE `attributes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `identification` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `assignment_multiple` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `attributes`
--

INSERT INTO `attributes` (`id`, `name`, `category_id`, `identification`, `assignment_multiple`, `created_at`, `updated_at`) VALUES
(1, 'Autonomie en conversation', 1, 'autonomie_conversation', 0, '2018-08-27 07:32:37', '2018-08-27 07:32:37'),
(2, 'Autonomie en veille', 1, 'autonomie_veille', 0, '2018-08-27 07:32:49', '2018-08-27 07:32:49'),
(3, 'Filaire', 1, 'filaire', 0, '2018-08-31 05:17:59', '2018-08-31 05:17:59'),
(4, 'Écran', 2, 'ecran', 0, '2018-08-31 07:28:51', '2018-08-31 07:28:51'),
(5, 'Nombre d\'écouteurs', 1, 'nombre_ecouteurs', 0, '2018-09-03 13:08:00', '2018-09-03 13:08:00'),
(6, 'Compatibilité', 1, 'compatibilites_casque', 1, '2018-09-03 13:08:21', '2018-09-03 13:08:21'),
(7, 'Connexion', 1, 'connexion_casque', 1, '2018-09-03 13:08:43', '2018-09-03 13:08:43'),
(8, 'Prix', 1, 'price', 0, '2018-09-03 13:30:57', '2018-09-03 13:30:57');

-- --------------------------------------------------------

--
-- Structure de la table `brands`
--

CREATE TABLE `brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url_logo` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `brands`
--

INSERT INTO `brands` (`id`, `name`, `url_logo`, `created_at`, `updated_at`) VALUES
(1, 'Jabra', 'brand/XipmrMwCVYc8GrBjb5ONAbUJXBX9LemC4kjuvdbq.svg', NULL, '2018-08-31 07:22:31'),
(2, 'apple', 'brand/yJq77x2PwkcbYhZKZ3x6I0FetP3ONXkOwHreEWnS.svg', '2018-08-31 07:10:58', '2018-08-31 07:10:58'),
(3, 'Cisco', 'brand/sRZfRJqCVjZ7ZYmEd2MMKlhMAbKFjRSAIWRzAsav.svg', '2018-08-31 07:22:53', '2018-08-31 07:22:53'),
(4, 'Plantronics', 'brand/dkJECHVcy5G513Z8xLvnAvcqfutnc0Jamp0TqcIx.svg', '2018-08-31 07:23:12', '2018-08-31 07:23:12'),
(5, 'Sennheiser', 'brand/sh8pBSVsWVMdjXFV5Us4q0GpbARQhdQOKkyiwMLu.svg', '2018-08-31 07:23:26', '2018-08-31 07:23:26'),
(6, 'Avaya', 'brand/LqV7PypdSGwKWbsZJ1aZqnXdaXbkCfloT3yJySpz.svg', '2018-08-31 07:23:49', '2018-08-31 07:23:49');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url_img` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `identification` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`id`, `name`, `url_img`, `identification`, `created_at`, `updated_at`) VALUES
(1, 'Casques téléphoniques', 'category/gG7kGJe1IMINDVPvMGgMlqOK0XeRloU29CPU3Il9.jpeg', 'casques', NULL, '2018-09-03 11:04:17'),
(2, 'Téléphones filaires', 'category/717ZEaY3PpJkBmMsX6H0WXV8RAYR0m39aALkgezR.jpeg', 'filaire', '2018-08-31 07:10:17', '2018-09-03 11:04:24');

-- --------------------------------------------------------

--
-- Structure de la table `default_values`
--

CREATE TABLE `default_values` (
  `id` int(10) UNSIGNED NOT NULL,
  `attribute_id` int(11) NOT NULL,
  `value` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `identification` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `default_values`
--

INSERT INTO `default_values` (`id`, `attribute_id`, `value`, `identification`, `created_at`, `updated_at`) VALUES
(1, 1, '10 heures', '9h-11h', '2018-08-27 07:33:27', '2018-09-01 13:32:23'),
(2, 1, '7 heures', '6h-8h', '2018-08-27 07:33:34', '2018-09-01 13:32:36'),
(3, 2, '60 heures', '60h', '2018-08-27 07:33:49', '2018-09-01 13:33:11'),
(4, 2, '50 heures', '50h', '2018-08-27 07:33:54', '2018-09-01 13:33:18'),
(5, 3, 'Filaire', '250', '2018-08-31 05:18:07', '2018-08-31 05:18:07'),
(6, 3, 'Sans-fil', '246', '2018-08-31 05:18:12', '2018-08-31 05:18:12'),
(7, 4, 'Oui', '', '2018-08-31 07:28:59', '2018-08-31 07:28:59'),
(8, 4, 'Non', '', '2018-08-31 07:29:02', '2018-08-31 07:29:02'),
(9, 1, 'Plus de 11 heures', '+11h', '2018-09-01 13:32:47', '2018-09-01 13:32:47'),
(10, 2, '40 heures', '40h', '2018-09-01 13:33:29', '2018-09-01 13:33:29'),
(11, 2, '100 heures', '100h', '2018-09-01 13:33:39', '2018-09-01 13:33:39'),
(12, 2, 'Plus de 150 heures', '+ 150h', '2018-09-01 13:34:02', '2018-09-01 13:34:02'),
(13, 5, 'Monaural', '1', '2018-09-03 13:09:44', '2018-09-03 13:09:44'),
(14, 5, 'Binaural', '2', '2018-09-03 13:09:51', '2018-09-03 13:09:51'),
(15, 6, 'Téléphone fixe', 'Tel Fixe', '2018-09-03 13:10:12', '2018-09-03 13:10:12'),
(16, 6, 'Ordinateur', 'PC', '2018-09-03 13:10:22', '2018-09-03 13:10:22'),
(17, 6, 'Mobile', 'Gsm', '2018-09-03 13:10:32', '2018-09-03 13:10:32'),
(18, 6, 'Téléphone sans fil', 'DECT', '2018-09-03 13:11:02', '2018-09-03 13:11:02'),
(19, 7, 'Ethernet', 'RJ', '2018-09-03 13:11:50', '2018-09-03 13:11:50'),
(20, 7, 'Cordon QD', 'QD', '2018-09-03 13:12:04', '2018-09-03 13:12:04'),
(21, 7, 'Câble USB', 'USB', '2018-09-03 13:12:18', '2018-09-03 13:13:11'),
(22, 7, 'Bluetooth', 'Bluetooth', '2018-09-03 13:12:32', '2018-09-03 13:12:32'),
(23, 7, 'Câble Jack', 'Jack', '2018-09-03 13:13:04', '2018-09-03 13:13:04'),
(24, 8, '< 100 €', '100', '2018-09-03 13:31:17', '2018-09-03 13:31:17'),
(25, 8, '100 - 200 €', '150', '2018-09-03 13:31:28', '2018-09-03 13:31:28'),
(26, 8, '> 200 €', '200', '2018-09-03 13:31:36', '2018-09-03 13:31:36');

-- --------------------------------------------------------

--
-- Structure de la table `imports`
--

CREATE TABLE `imports` (
  `id` int(10) UNSIGNED NOT NULL,
  `filename` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `header` tinyint(1) NOT NULL DEFAULT '0',
  `data` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `informations`
--

CREATE TABLE `informations` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `informations`
--

INSERT INTO `informations` (`id`, `title`, `content`, `question_id`, `created_at`, `updated_at`) VALUES
(1, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.', 1, '2018-08-27 07:44:04', '2018-08-27 07:44:04'),
(2, 'Les écrans ne sont pas obligatoires pour enregistrer des numéros', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.', 3, '2018-08-31 07:31:18', '2018-08-31 07:31:18'),
(3, 'Conserver votre indépendance avec un caque sans-fil', 'Lorem ipsum sit dolor amet.', 4, '2018-09-03 06:39:52', '2018-09-03 06:39:52');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_07_24_093450_create_categories_table', 1),
(4, '2018_07_24_093501_create_brands_table', 1),
(5, '2018_07_24_093511_create_products_table', 1),
(6, '2018_07_24_093521_create_attributes_table', 1),
(7, '2018_07_24_093529_create_product_values_table', 1),
(8, '2018_07_24_093550_create_answers_table', 1),
(9, '2018_07_24_093559_create_informations_table', 1),
(10, '2018_07_24_144756_create_default_values_table', 1),
(11, '2018_08_10_091841_create_questions_table', 1),
(12, '2018_08_27_145023_create_sessions_table', 2),
(13, '2018_08_31_080519_create_imports_table', 3),
(14, '2018_09_03_075741_create_sessions_table', 4),
(15, '2018_09_03_170835_create_parameters_table', 4),
(16, '2018_09_03_170834_create_parameters_table', 5),
(17, '2018_09_03_170864_create_parameters_table', 6),
(18, '2018_09_03_171864_create_parameters_table', 7),
(19, '2018_09_03_171664_create_parameters_table', 8);

-- --------------------------------------------------------

--
-- Structure de la table `parameters`
--

CREATE TABLE `parameters` (
  `id` int(10) UNSIGNED NOT NULL,
  `lang_id` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang_name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url_logo` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `home_baseline` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `home_title` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `home_questions_btn` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `home_products_btn` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `questions_title` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `questions_skip` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `questions_readmore` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_baseline` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `products_title` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `products_baseline` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `filter_baseline` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `filter_validate` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `filter_trash` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` tinyint(1) NOT NULL,
  `product_price_taxe` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_link_connexing` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_link_cotation` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_link_cotation_link` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `parameters`
--

INSERT INTO `parameters` (`id`, `lang_id`, `lang_name`, `title`, `url_logo`, `home_baseline`, `menu_name`, `home_title`, `home_questions_btn`, `home_products_btn`, `questions_title`, `questions_skip`, `questions_readmore`, `category_baseline`, `products_title`, `products_baseline`, `filter_baseline`, `filter_validate`, `filter_trash`, `product_price`, `product_price_taxe`, `product_link_connexing`, `product_link_cotation`, `product_link_cotation_link`, `created_at`, `updated_at`) VALUES
(1, 'fr', 'Français', 'appServices', 'icons/co.svg', 'Définissons vos besoins, nous trouvons votre solution', 'Menu', 'Accueil', 'Répondre aux questions', 'Rechercher directement', 'Assistant', 'Je ne sais pas', 'En savoir plus', 'Séléctionnez une catégorie de produit', 'Les produits', 'Liste des articles', 'Filtrer les resultats', 'Mettre à jour les filtres', 'Retirer les filtres', 1, 'HT', 'Commander sur connexing.fr', 'Demande de devis', 'https://www.connexing.fr/contacts', '2018-09-04 07:00:34', '2018-09-04 07:00:34');

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `constructor_reference` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connexing_reference` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `url_ecommerce` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `external_url_img` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `constructor_reference`, `connexing_reference`, `price`, `url_ecommerce`, `external_url_img`, `status`, `category_id`, `brand_id`, `created_at`, `updated_at`) VALUES
(1, 'GN 12345', 'Super casque jabra', 'AZERTY123456', 'P000001', '10.56', 'https://connexing.fr/jabra', 'https://www.connexing.fr/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/j/a/jabra-speak710-bluetooth.jpg', 1, 1, 1, NULL, '2018-08-29 11:14:04'),
(2, 'azerttyuiopoijhgfc', 'azedazfdvrtzvfdc', 'zefezc', 'cfdvfdvg', '20.00', 'fvsdvgfvg', 'vdgsvscxdf', 1, 1, 1, '2018-08-29 13:28:07', '2018-08-29 13:28:07'),
(3, 'cekopzfjaklqhreéui', 'aczdijohefvilg', 'yuauiocghiup@hfuao@huihuzea', '@fiaelhdsqcioehiz', '130.00', 'ayvchjdnuiegor', 'huaviberip@', 1, 1, 1, '2018-08-29 13:28:37', '2018-08-29 13:28:37'),
(4, 'dczae', 'azfec', 'azedxze', 'recercre', '30.00', 'reeazdx', 'recrecre', 0, 1, 1, '2018-08-29 13:28:51', '2018-08-29 13:28:51'),
(5, 'Avaya 9504', 'Le poste Avaya 9504 fait partie de la gamme 9500, il convient parfaitement aux utilisateurs réguliers de téléphone.', '700508197', 'P005293', '178.90', 'https://www.connexing.fr/avaya-9504-telephone-numerique.html', 'https://www.connexing.fr/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/a/v/avaya_9504.jpg', 1, 2, 6, '2018-08-31 07:28:06', '2018-08-31 07:28:16'),
(6, 'Plantronics CS540', 'Le Plantronics CS540 est un casque sans-fil de bonne qualité pour téléphone fixe. Il est idéal pour les cadres dirigeant, car il possède un design élégant et discret.', '84693-02', 'P000479', '141.00', 'https://www.connexing.fr/plantronics-cs540-casque-sans-fil.html/', 'https://www.connexing.fr/media/catalog/product/p/l/plantronics_cs_540.jpg', 1, 1, 4, '2018-09-01 10:30:01', '2018-09-01 10:30:01'),
(7, 'Plantronics CS510', 'Plantronics CS510 est un micro-casque DECT sans fil avec deux oreillettes pour avoir les mains libres lors d\'une conversation téléphonique. Le CS510 est un casque pour téléphone fixe', '84691-02', 'P000475', '175.00', 'https://www.connexing.fr/plantronics-cs510-casque-sans-fil.html/', 'https://www.connexing.fr/media/catalog/product/p/l/plantronics_cs510.jpg', 1, 1, 4, '2018-09-01 10:30:01', '2018-09-01 10:30:01'),
(148, 'Plantronics CS520 ', 'Plantronics CS520 est un Casque sans-fil avec deux écouteurs similicuir pour téléphonie fixe, idéal pour employé de bureau', '84692-02', 'P000469', '189.00', 'https://www.connexing.fr/plantronics-cs520-casque-sans-fil.html/', 'https://www.connexing.fr/media/catalog/product/p/s/ps_cs520_b_high.jpg', 1, 1, 4, '2018-09-01 15:05:25', '2018-09-01 15:05:25'),
(149, 'Plantronics Entera HW111N/A Monaural ', 'Plantronics Entera Monaural HW111N/A est Casque filaire à petit prix tout en étant performant', '79180-13', 'P000204', '64.90', 'https://www.connexing.fr/plantronics-entera-casque-filaire-monaural.html/', 'https://www.connexing.fr/media/catalog/product/p/s/ps_entera_monaural_high.jpg', 1, 1, 4, '2018-09-01 15:05:25', '2018-09-01 15:05:25'),
(150, 'Plantronics Entera HW121N/A Binaural', 'PLANTRONICS Entera HW121N/A Binaural est un Casque filaire avec deux oreillettes avec un prix compétitif', '79181-13', 'P000205', '66.50', 'https://www.connexing.fr/plantronics-entera-binaural-casque-filaire.html/', 'https://www.connexing.fr/media/catalog/product/e/n/entera_binaural.jpg', 1, 1, 4, '2018-09-01 15:05:25', '2018-09-01 15:05:25'),
(161, 'Plantronics Savi 740 ', 'Profitez de la liberté sans fil dans la gestion instantanée de vos appels entre le téléphone portable, celui du bureau ou PC avec un seul système de micro-casque.', '83542-12', 'P000485', '239.00', 'https://www.connexing.fr/plantronics-savi-740-casque-sans-fil.html/', 'https://www.connexing.fr/media/catalog/product/p/s/ps_savi_w740_d_med.jpg', 1, 1, 4, '2018-09-01 15:14:47', '2018-09-01 15:14:47'),
(162, 'Plantronics Savi 710 ', 'Plantronics Savi 710 est un Casque sans fil doté d\'une triple connectivité pour une meilleure efficacité', '83545-12', 'P000484', '253.00', 'https://www.connexing.fr/plantronics-savi-710.html/', 'https://www.connexing.fr/media/catalog/product/p/l/plantronics_savi_w710.jpg', 1, 1, 4, '2018-09-01 15:14:47', '2018-09-01 15:14:47'),
(163, 'Plantronics EncorePro 710 ', 'Plantronics EncorePro est un offrir de hautes performances et pour durer', '78712-102', 'P001056', '108.90', 'https://www.connexing.fr/plantronics-encorepro-monaural.html/', 'https://www.connexing.fr/media/catalog/product/e/n/encorepro_monaural.jpg', 1, 1, 4, '2018-09-01 15:14:47', '2018-09-01 15:14:47'),
(164, 'Plantronics EncorePro 720 ', 'Plantronics EncorePro HW720 est un casque filaire professionnel pour milieu bruyant et utilisation. Facile à positionner avec sa perche extensible et un design unique', '78714-102', 'P001057', '119.00', 'https://www.connexing.fr/plantronics-encorepro-binaural.html/', 'https://www.connexing.fr/media/catalog/product/e/n/encorepro_binaural.jpg', 1, 1, 4, '2018-09-01 15:14:47', '2018-09-01 15:14:47'),
(165, 'Plantronics Savi 440', 'Plantronics Savi 440 est un Casque sans fil révolutionnaire pour le bureau ', '203946-02', 'P001133', '169.00', 'https://www.connexing.fr/plantronics-savi-440.html/', 'https://www.connexing.fr/media/catalog/product/p/l/plantronics_savi_440.jpg', 1, 1, 4, '2018-09-01 15:14:47', '2018-09-01 15:14:47'),
(166, 'Jabra Biz 2400 Duo IP ', 'Jabra BIZ 2400 Duo IP est un casque pour téléphone qui permet de faire de la VoIp. Ce casque pour centre d\'appel offre des performances évoluées.', '2489-820-104', '', '143.90', 'https://www.connexing.fr/jabra-biz-2400-duo-ip-3-en-1-casque-filaire.html/', 'https://www.connexing.fr/media/catalog/product/j/a/jabra_biz_2400_duo_1.jpg', 0, 1, 4, '2018-09-01 15:14:47', '2018-09-01 15:14:47'),
(167, 'Sennheiser DW Office ', 'Le Sennheiser DW Office est un casque monaural sans-fil destiné aux centres d\'appels  pour les communications du PC et téléphone fixe', '', 'P000435', '219.00', 'https://www.connexing.fr/sennheiser-dw-office-casque-sans-fil.html/', 'https://www.connexing.fr/media/catalog/product/o/r/oreillette-dw-office_1.jpg', 1, 1, 4, '2018-09-01 15:14:47', '2018-09-01 15:14:47'),
(181, 'Jabra UC VOICE 150 Duo', 'Jabra uc voice 150 duo est un casque de communications unifiées pour téléphoner sur PC via USB, dans un milieu bruyant ouvert. L’installation est rapide et facile.', '1599-829-209', 'P000522', '26.80', 'https://www.connexing.fr/jabra-uc-voice-150-casque-usb.html/', 'https://www.connexing.fr/media/catalog/product/u/c/uc_voice_150_1.jpg', 1, 1, 4, '2018-09-01 15:14:47', '2018-09-01 15:14:47'),
(188, 'Jabra GN 2100 Duo flex', 'Jabra GN 2100 Duo, est un casque filaire avec deux écouteurs, qui allie une conception ultra légère et une qualité inégalée. Le micro antibruit assure un son clair', '2129-82-04', 'P000075', '128.95', 'https://www.connexing.fr/jabra-gn-2100-duo-flex.html/', 'https://www.connexing.fr/media/catalog/product/g/n/gn2100microbinaural.jpg', 1, 1, 4, '2018-09-01 15:14:47', '2018-09-01 15:14:47'),
(189, 'Jabra GN 2100 Mono flex', 'Jabra GN 2100 Mono flex, est un casque filaire avec un écouteur. Avec prix accessible et une bonne qualité du son, le Gn2100 trouve sa place dans les centres d’appels.', '2126-82-04', 'P000012', '126.15', 'https://www.connexing.fr/jabra-gn-2100-mono-flex.html/', 'https://www.connexing.fr/media/catalog/product/g/n/gn2100flexmonorale.jpg', 1, 1, 4, '2018-09-01 15:14:47', '2018-09-01 15:14:47'),
(190, 'Jabra Biz 1900 USB Duo ', 'Jabra Biz 1900 USB Duo est un casque filaire entrée de gamme pour les communications sur ordinateur. Ce casque USB a deux écouteurs pour une meilleure isolation.', '1989-829-104', 'P000523', '63.95', 'https://www.connexing.fr/jabra-biz-1900-usb-duo-casque-filaire.html/', 'https://www.connexing.fr/media/catalog/product/_/0/_0000_jabra_biz_1900_duo_qd_lr.tif.jpg', 1, 1, 4, '2018-09-01 15:14:47', '2018-09-01 15:14:47'),
(191, 'Jabra Pro 9460 Duo ', 'Jabra Pro 9460 binaural est un casque sans-fil à double connectivité (PC et téléphone) et écran tactile. Un casque simple et efficace. Livraison en 24/48h !', '9460-29-707-101', 'P000268', '260.00', 'https://www.connexing.fr/jabra-pro-9460-duo.html/', 'https://www.connexing.fr/media/catalog/product/j/a/jabra9460duo.jpg', 1, 1, 4, '2018-09-01 15:14:47', '2018-09-01 15:14:47'),
(192, 'Jabra Pro 9460 Monaural', 'Jabra Pro 9460 monaural est un casque sans fil à deux connexions. Ce micro-casque haut de gamme possède un écran tactile et offre une expérience utilisateur intuitive. ', '9460-25-707-101', 'P000259', '263.20', 'https://www.connexing.fr/jabra-pro-9460-monaural-casque-sans-fil.html/', 'https://www.connexing.fr/media/catalog/product/j/a/jabra9460mono.jpg', 1, 1, 4, '2018-09-01 15:14:47', '2018-09-01 15:14:47'),
(193, 'Jabra Pro 9465 duo', 'Jabra Pro 9465 est un casque deux écouteurs haut de gamme, avec une triple connexion sur PC, téléphone fixe, et smartphone. Sa base tactile est compacte et design. ', '9465-29-804-101', 'P000359', '285.00', 'https://www.connexing.fr/jabra-pro-9465-casque-sans-fil.html/', 'https://www.connexing.fr/media/catalog/product/j/a/jabra9465duo.jpg', 1, 1, 4, '2018-09-01 15:14:47', '2018-09-01 15:14:47'),
(194, 'Jabra Pro 9450 Mono ', 'Le casque sans-fil  le plus vendu en Jabra : Pro 9450 mono possède une double connectivité. Ce microcasque d’entreprise s’utilise sur PC et téléphone fixe.', '9450-25-507-101', 'P000451', '224.00', 'https://www.connexing.fr/jabra-pro-9450-mono-casque-sans-fil.html/', 'https://www.connexing.fr/media/catalog/product/j/a/jabra-pro-9450-mono-midi--connexing-casque-sans-fil_1.jpg', 1, 1, 4, '2018-09-01 15:14:47', '2018-09-01 15:14:47'),
(195, 'Jabra Pro 9470 ', 'Jabra Pro 9470 est un casque pour téléphone, pc et smartphone à triple connectivité. Ce micro-casque professionnel sans fil est idéal pour les cadres et dirigeants. ', '9470-26-904-101', 'P000258', '282.00', 'https://www.connexing.fr/jabra-pro-9470-casque-sans-fil.html/', 'https://www.connexing.fr/media/catalog/product/j/a/jabra9470.jpg', 1, 1, 4, '2018-09-01 15:14:47', '2018-09-01 15:14:47'),
(196, 'Jabra Pro 920', 'Le Jabra Pro 920 est un casque pour téléphone fixe, pour le partage de bureau. Ce casque professionnel est le moins cher, tout en proposant la qualité Jabra.', '920-25-508-101', 'P000492', '139.00', 'https://www.connexing.fr/jabra-pro-920.html/', 'https://www.connexing.fr/media/catalog/product/j/a/jabra-pro-920-mono-connexing.jpg', 1, 1, 4, '2018-09-01 15:14:47', '2018-09-01 15:14:47'),
(197, 'Jabra Pro 930', 'Jabra Pro 930 est un casque sans-fil avec une connexion sur PC. Ce casque professionnel usb permet de se lancer dans les communications unifiées à moindre coût. ', '930-25-509-101', 'P000493', '134.33', 'https://www.connexing.fr/jabra-pro-930.html/', 'https://www.connexing.fr/media/catalog/product/j/a/jabra_pro_930.jpg', 1, 1, 4, '2018-09-01 15:14:47', '2018-09-01 15:14:47'),
(199, 'Jabra GN 9120 Duo Flex', 'Jabra GN 9120 Duo Flex est un casque sans-fil à deux écouteurs. Doté d\'une perche flexible et d\'un micro antibruit il assure une bonne performance téléphonique.', '9129-808-101', 'P000139', '238.00', 'https://www.connexing.fr/jabra-gn-9120-duo.html/', 'https://www.connexing.fr/media/catalog/product/j/a/jabra_gn_9120_1.jpg', 1, 1, 4, '2018-09-01 15:14:47', '2018-09-01 15:14:47'),
(200, 'Jabra GN 9120 Midi Mono ', 'Jabra GN9120 est un casque sans-fil avec une perche Midi et un seul écouteur. Ce casque professionnel pour téléphone permet de rester en contact avec son entourage. ', '9120-48-01', 'P000015', '201.83', 'https://www.connexing.fr/jabra-gn-9120-midi-mono.html/', 'https://www.connexing.fr/media/catalog/product/g/n/gn-9120-midi-mono.jpg', 1, 1, 4, '2018-09-01 15:14:47', '2018-09-01 15:14:47'),
(201, 'Plantronics Savi 730 -M ', 'Plantronics Savi 730 certifié Microsoft Lync, est un casque sans-fil haut de gamme à triple connectivité: pc, mobile, téléphone fixe.', '84002-12', 'P001558', '248.00', 'https://www.connexing.fr/plantronics-savi-730-casque-sans-fil.html/', 'https://www.connexing.fr/media/catalog/product/p/l/plantronics_savi_730-m_w730a-m_.jpg', 1, 1, 4, '2018-09-01 15:14:47', '2018-09-01 15:14:47'),
(203, 'Jabra Pro 9450 Duo', 'Jabra Pro 9450 Duo : casque téléphonique sans fil, micro casque antibruit, 2 écouteur. Simple et intuitif idéal pour un environnement bruyant Jabra pro 9450 Duo\n', '9450-29-707-101 T', 'P000560', '239.00', 'https://www.connexing.fr/jabra-pro-9450-duo-casque-sans-fil.html/', 'https://www.connexing.fr/media/catalog/product/j/a/jabra_pro_9450_duo.jpg', 1, 1, 4, '2018-09-01 15:14:47', '2018-09-01 15:14:47'),
(204, 'Jabra Pro 9450 Flex', 'Le casque téléphonique Jabra Pro 9450 est doté d’une perche Flex avec micro antibruit. Grâce au Jabra 9450, s’éloigner de son bureau et décrocher à distance est facile', '9450-25-707-101', 'P000561', '224.00', 'https://www.connexing.fr/jabra-pro-9450-flex-casque-sans-fil.html/', 'https://www.connexing.fr/media/catalog/product/j/a/jabra_pro_9450_headset_in_base_14_1440x810.jpg', 1, 1, 4, '2018-09-01 15:14:47', '2018-09-01 15:14:47');

-- --------------------------------------------------------

--
-- Structure de la table `product_values`
--

CREATE TABLE `product_values` (
  `product_id` int(11) NOT NULL,
  `attribute_id` int(11) NOT NULL,
  `default_value_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `product_values`
--

INSERT INTO `product_values` (`product_id`, `attribute_id`, `default_value_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2018-08-27 07:42:02', '2018-08-29 13:28:13'),
(1, 2, 4, '2018-08-27 07:42:02', '2018-08-29 13:28:13'),
(3, 1, 2, '2018-08-29 13:29:18', '2018-08-29 13:29:18'),
(3, 2, 4, '2018-08-29 13:29:18', '2018-08-29 13:29:18'),
(4, 1, 2, '2018-08-29 13:29:09', '2018-08-29 13:29:09'),
(4, 2, 3, '2018-08-29 13:29:09', '2018-08-29 13:29:09'),
(5, 4, 7, '2018-08-31 07:29:20', '2018-08-31 07:29:20'),
(6, 1, 2, '2018-09-01 14:04:51', '2018-09-01 14:04:51'),
(6, 2, 3, '2018-09-01 14:04:51', '2018-09-01 14:04:51'),
(6, 3, 6, '2018-09-01 13:36:39', '2018-09-01 13:36:39'),
(7, 1, 1, '2018-09-01 14:07:28', '2018-09-01 14:07:28'),
(7, 2, 3, '2018-09-01 14:07:28', '2018-09-01 14:07:28'),
(7, 3, 6, '2018-09-01 13:36:39', '2018-09-01 13:36:39'),
(148, 1, 1, '2018-09-01 15:05:25', '2018-09-01 15:05:25'),
(148, 2, 3, '2018-09-01 15:05:25', '2018-09-01 15:05:25'),
(148, 3, 6, '2018-09-01 15:05:25', '2018-09-01 15:05:25'),
(149, 3, 5, '2018-09-01 15:05:25', '2018-09-01 15:05:25'),
(150, 3, 5, '2018-09-01 15:05:25', '2018-09-01 15:05:25'),
(161, 1, 2, '2018-09-01 15:14:47', '2018-09-01 15:14:47'),
(161, 2, 4, '2018-09-01 15:14:47', '2018-09-01 15:14:47'),
(161, 3, 6, '2018-09-01 15:14:47', '2018-09-01 15:14:47'),
(162, 1, 1, '2018-09-01 15:14:47', '2018-09-01 15:14:47'),
(162, 2, 10, '2018-09-01 15:14:47', '2018-09-01 15:14:47'),
(162, 3, 6, '2018-09-01 15:14:47', '2018-09-01 15:14:47'),
(163, 3, 5, '2018-09-01 15:14:47', '2018-09-01 15:14:47'),
(164, 3, 5, '2018-09-01 15:14:47', '2018-09-01 15:14:47'),
(165, 1, 2, '2018-09-01 15:14:47', '2018-09-01 15:14:47'),
(165, 2, 10, '2018-09-01 15:14:47', '2018-09-01 15:14:47'),
(165, 3, 6, '2018-09-01 15:14:47', '2018-09-01 15:14:47'),
(166, 3, 5, '2018-09-01 15:14:47', '2018-09-01 15:14:47'),
(167, 1, 2, '2018-09-01 15:14:47', '2018-09-01 15:14:47'),
(167, 1, 9, '2018-09-01 15:14:47', '2018-09-01 15:14:47'),
(167, 2, 11, '2018-09-01 15:14:47', '2018-09-01 15:14:47'),
(167, 3, 5, '2018-09-01 15:14:47', '2018-09-01 15:14:47'),
(167, 3, 6, '2018-09-01 15:14:47', '2018-09-01 15:14:47'),
(181, 3, 5, '2018-09-01 15:14:47', '2018-09-01 15:14:47'),
(188, 3, 5, '2018-09-01 15:14:47', '2018-09-01 15:14:47'),
(189, 3, 5, '2018-09-01 15:14:47', '2018-09-01 15:14:47'),
(190, 3, 5, '2018-09-01 15:14:47', '2018-09-01 15:14:47'),
(191, 1, 1, '2018-09-01 15:14:47', '2018-09-01 15:14:47'),
(191, 2, 10, '2018-09-01 15:14:47', '2018-09-01 15:14:47'),
(191, 3, 6, '2018-09-01 15:14:47', '2018-09-01 15:14:47'),
(192, 1, 1, '2018-09-01 15:14:47', '2018-09-01 15:14:47'),
(192, 2, 10, '2018-09-01 15:14:47', '2018-09-01 15:14:47'),
(192, 3, 6, '2018-09-01 15:14:47', '2018-09-01 15:14:47'),
(193, 1, 1, '2018-09-01 15:14:47', '2018-09-01 15:14:47'),
(193, 2, 10, '2018-09-01 15:14:47', '2018-09-01 15:14:47'),
(193, 3, 6, '2018-09-01 15:14:47', '2018-09-01 15:14:47'),
(194, 1, 1, '2018-09-01 15:14:47', '2018-09-01 15:14:47'),
(194, 2, 10, '2018-09-01 15:14:47', '2018-09-01 15:14:47'),
(194, 3, 6, '2018-09-01 15:14:47', '2018-09-01 15:14:47'),
(195, 1, 1, '2018-09-01 15:14:47', '2018-09-01 15:14:47'),
(195, 2, 10, '2018-09-01 15:14:47', '2018-09-01 15:14:47'),
(195, 3, 6, '2018-09-01 15:14:47', '2018-09-01 15:14:47'),
(196, 1, 2, '2018-09-01 15:14:47', '2018-09-01 15:14:47'),
(196, 3, 6, '2018-09-01 15:14:47', '2018-09-01 15:14:47'),
(197, 1, 2, '2018-09-01 15:14:47', '2018-09-01 15:14:47'),
(197, 3, 6, '2018-09-01 15:14:47', '2018-09-01 15:14:47'),
(199, 3, 6, '2018-09-01 15:14:47', '2018-09-01 15:14:47'),
(200, 1, 9, '2018-09-01 15:14:47', '2018-09-01 15:14:47'),
(200, 3, 6, '2018-09-01 15:14:47', '2018-09-01 15:14:47'),
(201, 1, 2, '2018-09-01 15:14:47', '2018-09-01 15:14:47'),
(201, 2, 10, '2018-09-01 15:14:47', '2018-09-01 15:14:47'),
(201, 3, 6, '2018-09-01 15:14:47', '2018-09-01 15:14:47'),
(203, 1, 1, '2018-09-01 15:14:47', '2018-09-01 15:14:47'),
(203, 2, 10, '2018-09-01 15:14:47', '2018-09-01 15:14:47'),
(203, 3, 6, '2018-09-01 15:14:47', '2018-09-01 15:14:47'),
(204, 1, 1, '2018-09-01 15:14:47', '2018-09-01 15:14:47'),
(204, 2, 10, '2018-09-01 15:14:47', '2018-09-01 15:14:47'),
(204, 3, 6, '2018-09-01 15:14:47', '2018-09-01 15:14:47');

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

CREATE TABLE `questions` (
  `id` int(10) UNSIGNED NOT NULL,
  `value` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `attribute_id` int(11) NOT NULL,
  `order` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `questions`
--

INSERT INTO `questions` (`id`, `value`, `category_id`, `attribute_id`, `order`, `created_at`, `updated_at`) VALUES
(1, 'Communiquez-vous longtemps dans une journée ?', 1, 1, 2, '2018-08-27 07:42:18', '2018-09-03 06:42:23'),
(2, 'Aurez-vous peu l\'occasion de recharger votre casques ?', 1, 2, 3, '2018-08-27 07:42:44', '2018-09-03 06:43:30'),
(3, 'Est-ce que vous avez besoin d\'accéder rapidement à des informations visuelles ?', 2, 4, 2, '2018-08-31 07:29:59', '2018-08-31 07:29:59'),
(4, 'Êtes-vous mobile dans votre activité ?', 1, 3, 1, '2018-09-03 06:37:22', '2018-09-03 06:37:22');

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'toto', 'toto@connexing.com', '$2y$10$tbBDgouDrwleAIFR5yqlauY2lZylzQPzD3OdK7AhWjOzch2BN4I6W', 'gWKWPHDcS8qHHXDF4Mg6xquZQPeceGFvltt3K9JKsXtMzF3ZklJHF3b1TEef', NULL, NULL),
(2, 'azerty', 'azerty@azerty.com', '$2y$10$SHU.LpSPQCB1/jTYkerta.3csDCbHOj2HfNCRETDlwWUoyMQA1EG.', 'tmwbC53mi9N3xyyul5qEQUhP4vHihcOjNacoGvuQu6QSTDlKfAAFxuYyfMPN', '2018-08-31 07:34:17', '2018-08-31 07:34:17');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_name_unique` (`name`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`),
  ADD UNIQUE KEY `categories_identification_unique` (`identification`);

--
-- Index pour la table `default_values`
--
ALTER TABLE `default_values`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `imports`
--
ALTER TABLE `imports`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `informations`
--
ALTER TABLE `informations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `parameters`
--
ALTER TABLE `parameters`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_name_unique` (`name`),
  ADD UNIQUE KEY `products_constructor_reference_unique` (`constructor_reference`),
  ADD UNIQUE KEY `products_connexing_reference_unique` (`connexing_reference`),
  ADD UNIQUE KEY `products_url_ecommerce_unique` (`url_ecommerce`);

--
-- Index pour la table `product_values`
--
ALTER TABLE `product_values`
  ADD PRIMARY KEY (`product_id`,`attribute_id`,`default_value_id`);

--
-- Index pour la table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sessions`
--
ALTER TABLE `sessions`
  ADD UNIQUE KEY `sessions_id_unique` (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT pour la table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `default_values`
--
ALTER TABLE `default_values`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT pour la table `imports`
--
ALTER TABLE `imports`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `informations`
--
ALTER TABLE `informations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT pour la table `parameters`
--
ALTER TABLE `parameters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;
--
-- AUTO_INCREMENT pour la table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;