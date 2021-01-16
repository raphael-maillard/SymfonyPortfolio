-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 16 jan. 2021 à 14:37
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `portfolio`
--

-- --------------------------------------------------------

--
-- Structure de la table `about`
--

DROP TABLE IF EXISTS `about`;
CREATE TABLE IF NOT EXISTS `about` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resume` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `about`
--

INSERT INTO `about` (`id`, `title`, `resume`, `image_name`, `created_at`, `modified_at`) VALUES
(1, 'Présentation', 'Je suis passionné depuis mon plus jeune âge par l\'informatique de manière générale (innovation technologique, hardware, programmation...). Je me suis très tôt plongé dans l\'univers linux en installant et en administrant des serveurs Debian ou infrastructure VMware. Je suis rigoureux. J\'aime à la fois le travail en équipe et en autonomie. J\'aime les défis et me dépasser.', '600191a749be4791934563.jpg', '2021-01-15 12:59:18', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `name`, `image_name`, `created_at`, `modified_at`) VALUES
(51, 'Front-End', 'monitor.svg', '2018-09-09 12:52:46', NULL),
(52, 'Back-End', 'server.svg', '2018-09-09 12:52:46', NULL),
(53, 'Tools', 'software.svg', '2018-09-09 12:52:46', NULL),
(54, 'OS', 'os.svg', '2018-09-09 12:52:46', NULL),
(55, 'Veille technologique', 'far fa-eye', '2018-09-09 12:52:46', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20210106131212', '2021-01-15 12:29:49', 652),
('DoctrineMigrations\\Version20210112152053', '2021-01-15 12:29:49', 14),
('DoctrineMigrations\\Version20210112155612', '2021-01-15 12:29:49', 8);

-- --------------------------------------------------------

--
-- Structure de la table `project`
--

DROP TABLE IF EXISTS `project`;
CREATE TABLE IF NOT EXISTS `project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resume` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_source_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `project`
--

INSERT INTO `project` (`id`, `name`, `image_name`, `link`, `resume`, `link_source_code`, `created_at`, `modified_at`) VALUES
(3, 'Site personnel', '6002cc5f36ac4796102776.jpg', 'https://raphael-maillard.com', 'Ceci est mon site personnel dans lequel je me présente et où je mets en avant mes apprentissages', NULL, '2021-01-15 13:52:46', '2021-01-16 13:33:36'),
(4, 'Fast and Go Concept', '6002cc687ab2e452971570.jpg', 'https://fastandgo.eu/', 'Projet de stage lors de la formation Simplon Développeur Web et Web mobile. \r\n\r\nLors du stage ma mission été d\'améliorer l\'application embarqué et d\'ajouter de nouvelles fonctionnalités. \r\n\r\nMise à jour des stats. \r\nNouvelle interface de l\'application. \r\nAdaptation de l\'application pour un nouvel appareil. \r\nCorrection de bug présent auparavant. \r\nOptimisation. \r\n\r\nDurée du stage 1 mois.', NULL, '2021-01-15 17:05:47', '2021-01-16 13:07:40'),
(5, 'NotePad', '6002cc71b9c14253179313.jpg', 'https://github.com/raphael-maillard/Note_Pad', 'Application créé en Kotlin du début à la fin. Pour une utilisation personnel', NULL, '2021-01-15 17:30:16', '2021-01-16 11:22:25'),
(6, 'Application météo', '6002cc7b860a3109343955.jpg', 'https://github.com/raphael-maillard/App-Meteo', 'Application météo développer en Kotlin. L\'application interroge la database de Openweathermap.org qui est en opensource. \r\nCette application est développé entièrement en Kotlin sur l\'éditeur de code Android Studio.', NULL, '2021-01-15 17:39:22', '2021-01-16 11:22:35'),
(7, 'Calculatrice', '6002cc811b858949274701.jpg', NULL, 'Calculatrice codé en Java pour faire certain essaie à l\'époque et pour s’exercer en programmation objet', NULL, '2021-01-15 18:08:03', '2021-01-16 11:22:41');

-- --------------------------------------------------------

--
-- Structure de la table `project_technologie`
--

DROP TABLE IF EXISTS `project_technologie`;
CREATE TABLE IF NOT EXISTS `project_technologie` (
  `project_id` int(11) NOT NULL,
  `technologie_id` int(11) NOT NULL,
  PRIMARY KEY (`project_id`,`technologie_id`),
  KEY `IDX_654EC18F166D1F9C` (`project_id`),
  KEY `IDX_654EC18F261A27D2` (`technologie_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `project_technologie`
--

INSERT INTO `project_technologie` (`project_id`, `technologie_id`) VALUES
(3, 201),
(3, 202),
(3, 204),
(3, 205),
(3, 210),
(3, 211),
(3, 214),
(3, 215),
(3, 216),
(3, 218),
(4, 201),
(4, 202),
(4, 209),
(4, 211),
(4, 218),
(4, 221),
(4, 222),
(4, 223),
(5, 207),
(5, 209),
(5, 213),
(5, 216),
(5, 218),
(6, 207),
(6, 209),
(6, 213),
(6, 216),
(6, 218),
(7, 206),
(7, 209),
(7, 212),
(7, 218);

-- --------------------------------------------------------

--
-- Structure de la table `technologie`
--

DROP TABLE IF EXISTS `technologie`;
CREATE TABLE IF NOT EXISTS `technologie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resume` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_AD81367412469DE2` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=225 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `technologie`
--

INSERT INTO `technologie` (`id`, `category_id`, `name`, `resume`) VALUES
(201, 51, 'Html', 'Le Html est un langage de balisage conçu pour représenter les pages web. C’est\r\n                            un langage permettant d’écrire de l’hypertexte.'),
(202, 51, 'CSS', 'Le CSS est un langage\r\n                                            informatique utilisé sur l\'internet pour mettre en forme les  zfichiers HTML ou XML.'),
(203, 51, 'Javascript', 'Le Javascript est un langage de programmation de scripts principalement employé dans les pages web\r\n                                        interactives mais aussi pour les serveurs avec l\'utilisation (par exemple) de Node.js'),
(204, 51, 'Bootstrap', 'Bootstrap est une bibliothéque utiles à la création du design (graphisme,\r\n                                        animation et interactions avec la page dans le navigateur, etc.) de sites et\r\n                                        d\'applications web.'),
(205, 52, 'Php', 'Le PHP est un langage de\r\n                                programmation libre, principalement utilisé pour produire des pages\r\n                                Web dynamiques via un serveur HTTP, mais pouvant également\r\n                                fonctionner comme n\'importe quel langage interprété de façon locale.\r\n                                PHP est un langage impératif orienté objet.'),
(206, 52, 'Java', 'Java est un langage de programmation orienté objet Une particularité de Java est que les logiciels écrits dans ce langage\r\n                                sont compilés vers une représentation binaire intermédiaire qui peut\r\n                                être exécutée dans une machine virtuelle Java (JVM) en faisant\r\n                                abstraction du système d\'exploitation.'),
(207, 52, 'Kotlin', 'Kotlin est un langage de\r\n                                programmation orienté objet et fonctionnel, avec un typage statique\r\n                                qui permet de compiler pour la machine virtuelle Java, JavaScript,\r\n                                et vers plusieurs plateformes en natif (grâce à LLVM).'),
(208, 52, 'SQL', 'Le SQL est un langage informatique normalisé servant à exploiter des bases de données relationnelles.'),
(209, 53, 'Git / GitHub', 'Github est un service web d\'hébergement et de gestion de développement de\r\n                            logiciels, utilisant le logiciel de gestion de versions Git.'),
(210, 53, 'Symfony', 'Symfony est un ensemble de composants PHP ainsi\r\n                                qu\'un framework MVC libre écrit en PHP. Il fournit des fonctionnalités modulables et\r\n                                adaptables qui permettent de faciliter et d’accélérer le développement d\'un site web.'),
(211, 53, 'Visual Studio Code', 'Visual Studio Code est un éditeur de code extensible développé par\r\n                                Microsoft.'),
(212, 53, 'Sublime Text 3', 'Sublime Text est un éditeur de texte générique\r\n                                codé en C++ et Python.'),
(213, 53, 'Android Studio', 'Android Studio est un\r\n                                environnement de développement pour développer des applications mobiles\r\n                                Android.'),
(214, 53, 'LAMP / WAMP', 'LAMP/ WAMP est un acronyme désignant un ensemble de logiciels libres\r\n                                permettant de construire des serveurs de sites web.'),
(215, 53, 'MySQL / MariaDB', 'MySQL/MariaDB sont des systèmes de gestions de bases de données\r\n                                relationnelles.'),
(216, 54, 'Windows', 'Un système d\'exploitation tel\r\n                            que ceux de la série Windows est un ensemble de programmes qui\r\n                            manipule les moyens matériels de l\'ordinateur et offre aux logiciels\r\n                            applicatifs des services en rapport avec leur utilisation.'),
(217, 54, 'Debian', 'Debian est une distribution GNU/Linux non commerciale,\r\n                                elle a pour principal but de fournir un système d\'exploitation\r\n                                composé uniquement de logiciels libres.'),
(218, 54, 'Ubuntu', 'Ubuntu est un système d’exploitation GNU/Linux basé\r\n                                sur la distribution Linux Debian.'),
(219, 54, 'VMware ESXi', 'Ce produit s\'installe sur la\r\n                                couche matérielle (on parle d\'hyperviseur de type 1), et non sur un\r\n                                système d\'exploitation « hôte ». VMware ESX permet une gestion plus\r\n                                précise des ressources de chaque machine virtuelle et de meilleures\r\n                                performances.'),
(220, 55, 'Veille Technologique', 'Je suis toujours à l\'affût de nouvelle technologies, j\'aime me renseigner sur divers sujets'),
(221, 51, 'VueJS', 'VueJS est un framework JavaScript open-source utilisé pour construire des interfaces utilisateur et des applications web monopages.'),
(222, 54, 'Raspbian', 'Raspbian est un système d\'exploitation libre et gratuit basé sur Debian optimisé pour fonctionner sur les différents Raspberry Pi.'),
(223, 52, 'Python', 'Python est un langage de programmation interprété, multi-paradigme et multiplateformes.  Il favorise la programmation impérative structurée, fonctionnelle et orientée objet.'),
(224, 52, 'Doctrine', 'Doctrine est l\'ORM (couche d\'abstraction à la base de données) par défaut du framework Symfony. Il s\'agit d\'un logiciel libre sous licence GNU LGPL.');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`) VALUES
(11, 'admin@raphael.fr', '[\"ROLE_SUPER_ADMIN\"]', '$argon2id$v=19$m=65536,t=4,p=1$QThiY2VmZUNzVnZYVEZuNw$zEuKAI7hlFbEx4MCobaZ+GeJZqZOCFt7oDEPi3YV1Mo');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `project_technologie`
--
ALTER TABLE `project_technologie`
  ADD CONSTRAINT `FK_654EC18F166D1F9C` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_654EC18F261A27D2` FOREIGN KEY (`technologie_id`) REFERENCES `technologie` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `technologie`
--
ALTER TABLE `technologie`
  ADD CONSTRAINT `FK_AD81367412469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
