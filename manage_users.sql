-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2024 at 07:56 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manage_users`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` varchar(50) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `name_en` varchar(50) DEFAULT NULL,
  `owner_id` varchar(50) NOT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `helper` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `name_en`, `owner_id`, `is_active`, `is_deleted`, `created_at`, `created_by`, `helper`) VALUES
('0796b722-2ed6-11ef-89bc-74563c98df48', NULL, NULL, '0796b44d-2ed6-11ef-89bc-74563c98df48', NULL, 0, '2024-06-20 14:23:45', '0796b44d-2ed6-11ef-89bc-74563c98df48', 1),
('af6312db-2ef9-11ef-8d56-74563c98df48', NULL, NULL, 'af630c47-2ef9-11ef-8d56-74563c98df48', NULL, 0, '2024-06-20 18:38:59', 'af630c47-2ef9-11ef-8d56-74563c98df48', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` longtext NOT NULL,
  `user_level` int(11) NOT NULL,
  `company_id` varchar(50) DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `is_verify` tinyint(1) NOT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `lastname`, `email`, `password`, `user_level`, `company_id`, `is_deleted`, `is_verify`, `is_active`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
('0796b44d-2ed6-11ef-89bc-74563c98df48', '0643560564', 'phirapat', 'intarueangsorn', 'test@gmail.com', '$2y$10$6plrwJRW2DUKvRl1O74hQePsNi62SjH/QtTvxhMIRAoviSof5zRvC', 0, '0796b722-2ed6-11ef-89bc-74563c98df48', 0, 1, 1, '2024-06-20 14:23:45', '0796b44d-2ed6-11ef-89bc-74563c98df48', NULL, NULL),
('a809aedf-2f03-11ef-8d56-74563c98df48', 'macgyver', 'test', 'test', 'macgyver@gmail.com', '$2y$10$2H9PrL02rF.dwwBVsllVUua4OesKdBSHoHCcL0ZrnJwjYPf5M4jja', 1, '0796b722-2ed6-11ef-89bc-74563c98df48', 0, 1, 0, '2024-06-20 19:50:22', '0796b44d-2ed6-11ef-89bc-74563c98df48', NULL, NULL),
('af630c47-2ef9-11ef-8d56-74563c98df48', 'mac1997', 'Phirapat', 'Intarueangsorn', 'conan2091@gmail.com', '$2y$10$UvbZTlMNcoYHT3kMgUYVGeas1L50q1WhjHfXfIPRLSCjeGJwi3cnm', 0, 'af6312db-2ef9-11ef-8d56-74563c98df48', 0, 1, 0, '2024-06-20 18:38:59', 'af630c47-2ef9-11ef-8d56-74563c98df48', NULL, NULL),
('e49c0b3b-2f03-11ef-8d56-74563c98df48', 'aaaaa', 'test', 'aaaa', 'aaa@gmail.com', '$2y$10$8Jhn/Qg5OwyZJGAUpiLCqePjcnurInNQJowO.GDg0pI.1DmZIFn66', 3, '0796b722-2ed6-11ef-89bc-74563c98df48', 0, 1, 0, '2024-06-20 19:52:03', '0796b44d-2ed6-11ef-89bc-74563c98df48', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
