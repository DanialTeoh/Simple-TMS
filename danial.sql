-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 19, 2024 at 04:13 AM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `danial`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20241029065342', '2024-10-29 06:53:52', 34),
('DoctrineMigrations\\Version20241104010813', '2024-11-04 01:09:18', 35),
('DoctrineMigrations\\Version20241104022838', '2024-11-04 02:28:53', 109),
('DoctrineMigrations\\Version20241104073401', '2024-11-04 07:34:46', 37),
('DoctrineMigrations\\Version20241105013948', '2024-11-05 01:39:56', 91),
('DoctrineMigrations\\Version20241105074756', '2024-11-05 07:48:24', 98),
('DoctrineMigrations\\Version20241105082256', '2024-11-05 08:23:03', 96),
('DoctrineMigrations\\Version20241106032859', '2024-11-06 03:29:19', 115),
('DoctrineMigrations\\Version20241106063917', '2024-11-06 06:39:31', 136),
('DoctrineMigrations\\Version20241106073544', '2024-11-06 07:35:50', 38),
('DoctrineMigrations\\Version20241106073640', '2024-11-06 07:36:48', 139),
('DoctrineMigrations\\Version20241113061958', '2024-11-13 06:20:08', 35);

-- --------------------------------------------------------

--
-- Table structure for table `flag`
--

DROP TABLE IF EXISTS `flag`;
CREATE TABLE IF NOT EXISTS `flag` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `flag`
--

INSERT INTO `flag` (`id`, `nama`) VALUES
(1, 'Jawatan'),
(2, 'Bahagian'),
(3, 'Roles');

-- --------------------------------------------------------

--
-- Table structure for table `reset_password_request`
--

DROP TABLE IF EXISTS `reset_password_request`;
CREATE TABLE IF NOT EXISTS `reset_password_request` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `selector` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hashed_token` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `requested_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `expires_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`id`),
  KEY `IDX_7CE748AA76ED395` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rujukan`
--

DROP TABLE IF EXISTS `rujukan`;
CREATE TABLE IF NOT EXISTS `rujukan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `flag_id` int DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_A0798F34919FE4E5` (`flag_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rujukan`
--

INSERT INTO `rujukan` (`id`, `flag_id`, `nama`) VALUES
(1, 1, 'SUB'),
(2, 1, 'Penolong SU'),
(4, 2, 'BPTM'),
(5, 3, 'admin'),
(6, 3, 'public'),
(7, 1, 'MySTEP'),
(8, 2, 'Sumber Manusia');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

DROP TABLE IF EXISTS `task`;
CREATE TABLE IF NOT EXISTS `task` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `user_id` int DEFAULT NULL,
  `jawatan_id` int DEFAULT NULL,
  `bahagian_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_527EDB25A76ED395` (`user_id`),
  KEY `IDX_527EDB25931B3BC8` (`jawatan_id`),
  KEY `IDX_527EDB2521A19CD4` (`bahagian_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id`, `title`, `description`, `status`, `created_at`, `user_id`, `jawatan_id`, `bahagian_id`) VALUES
(11, 'test', 'testing', 1, '2024-11-11 15:58:00', 18, 7, 4),
(12, '111', '1111', 0, '2024-11-12 14:48:00', 18, 7, 4),
(14, 'ddd', 'ddd', 1, '2024-11-19 09:48:00', 18, 7, 4);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_verified` tinyint(1) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_IDENTIFIER_USERNAME` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `roles`, `password`, `is_verified`, `email`, `picture`) VALUES
(17, 'admin', '[]', '$2y$13$XxoMa3Wm1eArsur8KeK5Ue78EW/SIfRHVETzvM17kfGQCi.hutEtm', 0, 'admin@gmail.com', '010316020075-67344b04e9614.jpg'),
(18, 'test', '[]', '$2y$13$VKGHLxtS7NdnxX.QwiRg5OXD4QrObEimqtTVNLfMLzmuIpL/dJOre', 0, 'test@gmail.com', 'a-67344c115423b.jpg'),
(19, 'test1', '[]', '$2y$13$s6jYG62Fa0Y/cbn0I8HdXu49E2JFTZXKMymJ3bPyV9xzRrdrGkDES', 0, 'test1@gmail.com', NULL),
(20, 'test2', '[]', '$2y$13$Ttf6ezlBR8s6PZV5tX8O/OePUPom3EU6B6AHj2ubRkzdN5Nsh6KnG', 0, 'test2@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_rujukan`
--

DROP TABLE IF EXISTS `user_rujukan`;
CREATE TABLE IF NOT EXISTS `user_rujukan` (
  `user_id` int NOT NULL,
  `rujukan_id` int NOT NULL,
  PRIMARY KEY (`user_id`,`rujukan_id`),
  KEY `IDX_F874913EA76ED395` (`user_id`),
  KEY `IDX_F874913ED0E1C5C0` (`rujukan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_rujukan`
--

INSERT INTO `user_rujukan` (`user_id`, `rujukan_id`) VALUES
(17, 5),
(18, 6),
(19, 6),
(20, 6);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reset_password_request`
--
ALTER TABLE `reset_password_request`
  ADD CONSTRAINT `FK_7CE748AA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `rujukan`
--
ALTER TABLE `rujukan`
  ADD CONSTRAINT `FK_A0798F34919FE4E5` FOREIGN KEY (`flag_id`) REFERENCES `flag` (`id`);

--
-- Constraints for table `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `FK_527EDB2521A19CD4` FOREIGN KEY (`bahagian_id`) REFERENCES `rujukan` (`id`),
  ADD CONSTRAINT `FK_527EDB25931B3BC8` FOREIGN KEY (`jawatan_id`) REFERENCES `rujukan` (`id`),
  ADD CONSTRAINT `FK_527EDB25A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `user_rujukan`
--
ALTER TABLE `user_rujukan`
  ADD CONSTRAINT `FK_F874913EA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_F874913ED0E1C5C0` FOREIGN KEY (`rujukan_id`) REFERENCES `rujukan` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
