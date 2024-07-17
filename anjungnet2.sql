-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2024 at 09:44 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `anjungnet`
--

-- --------------------------------------------------------

--
-- Table structure for table `anj_banner`
--

CREATE TABLE `anj_banner` (
  `id` int(11) UNSIGNED NOT NULL,
  `banner_title` varchar(100) NOT NULL,
  `banner_description` text DEFAULT NULL,
  `banner_approve` int(1) NOT NULL,
  `banner_publish` int(1) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `anj_banner`
--

INSERT INTO `anj_banner` (`id`, `banner_title`, `banner_description`, `banner_approve`, `banner_publish`, `created_at`, `updated_at`) VALUES
(12, 'Aktiviti Akan Datang', '', 1, 1, NULL, NULL),
(13, 'Ayam Kampung', '\r\n', 1, 1, NULL, NULL),
(16, 'Penyakit Ayam', '', 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `anj_banner_item`
--

CREATE TABLE `anj_banner_item` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_anj_banner` int(11) UNSIGNED NOT NULL,
  `item_title` varchar(100) NOT NULL,
  `item_description` text DEFAULT NULL,
  `item_image` varchar(255) NOT NULL,
  `item_link` longtext DEFAULT NULL,
  `item_datatype` varchar(100) DEFAULT NULL,
  `item_caption` text DEFAULT NULL,
  `item_start_publish` datetime DEFAULT NULL,
  `item_end_publish` datetime DEFAULT NULL,
  `item_approve` int(1) NOT NULL,
  `item_publish` int(1) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `anj_banner_item`
--

INSERT INTO `anj_banner_item` (`id`, `id_anj_banner`, `item_title`, `item_description`, `item_image`, `item_link`, `item_datatype`, `item_caption`, `item_start_publish`, `item_end_publish`, `item_approve`, `item_publish`, `created_at`, `updated_at`) VALUES
(2, 1, 'test2', 'test2', 'asdas', 'ads', 'asd', 'asdas', '2024-07-05 15:03:03', '2024-07-12 15:03:03', 1, 1, NULL, NULL),
(3, 2, 'test3', 'test3', 'asdas', 'ads', 'asd', 'asdas', '2024-07-05 15:03:03', '2024-07-12 15:03:03', 1, 1, NULL, NULL),
(6, 13, 't1', 't1', '', NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL),
(9, 16, 'asdasd', 'das', '', NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL),
(10, 16, 'fsas', 'sdaas', '', NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL),
(18, 12, 'final', 'final', '1720683890_ca477c7d68f9f8b9897b.jpg', NULL, NULL, NULL, '2024-07-11 00:00:00', '2024-07-13 00:00:00', 1, 1, NULL, NULL),
(25, 13, 'Fugiat culpa o', 'Sed velit accus', '1720685685_da41fa424d32f2bf3545.png', NULL, NULL, NULL, '2020-10-25 00:00:00', '2014-04-09 00:00:00', 1, 1, NULL, NULL),
(26, 12, 'Minima sit mai', 'Velit reiciendi', '1721115503_c42f47df295cbef47e24.jpg', NULL, NULL, NULL, '1994-12-11 00:00:00', '2012-06-20 00:00:00', 1, 1, NULL, NULL),
(27, 12, 'u3', 'Perspiciatis q', '1721115684_e1354b209816d6680d51.html', NULL, NULL, NULL, '1973-07-15 00:00:00', '2010-10-28 00:00:00', 1, 1, NULL, NULL),
(28, 12, 'u5', 'Eius et fugit ', '1721116164_ac0c3f48164643530a0d.jpg', NULL, NULL, NULL, '1987-07-22 00:00:00', '1996-06-07 00:00:00', 1, 1, NULL, NULL),
(30, 12, 'Facere consecte', 'Aut laboris del', '1721117027_7bd25c57d7545a272ba2.html', NULL, NULL, NULL, '2018-04-08 00:00:00', '2000-02-22 00:00:00', 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `anj_menu`
--

CREATE TABLE `anj_menu` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama_menu` varchar(255) NOT NULL,
  `url_menu` varchar(255) NOT NULL,
  `parent` int(11) NOT NULL DEFAULT 0,
  `icon` varchar(50) NOT NULL,
  `susunan` int(11) NOT NULL,
  `aras` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `anj_menu`
--

INSERT INTO `anj_menu` (`id`, `nama_menu`, `url_menu`, `parent`, `icon`, `susunan`, `aras`) VALUES
(1, '', 'Modi sunt nemo', 0, '', 0, 0),
(3, '', 'Voluptas magnam', 0, '', 0, 0),
(4, 'Consequuntur ut', 'Cupidatat rem q', 0, '', 0, 0),
(5, 't1', 't1', 0, '', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `anj_pengumuman`
--

CREATE TABLE `anj_pengumuman` (
  `id` int(11) UNSIGNED NOT NULL,
  `pengumuman_name` varchar(255) NOT NULL,
  `pengumuman_group_by` varchar(255) NOT NULL,
  `pengumuman_update_by` varchar(255) NOT NULL,
  `pengumuman_mail_status` int(11) NOT NULL,
  `pengumuman_date_created` datetime DEFAULT NULL,
  `pengumuman_date_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `anj_sso`
--

CREATE TABLE `anj_sso` (
  `id` int(11) UNSIGNED NOT NULL,
  `app_name` varchar(255) NOT NULL,
  `form_name` varchar(255) NOT NULL,
  `login_url` varchar(255) NOT NULL,
  `login_action_url` varchar(255) NOT NULL,
  `submit_type` int(1) NOT NULL,
  `app_status` int(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `anj_sso`
--

INSERT INTO `anj_sso` (`id`, `app_name`, `form_name`, `login_url`, `login_action_url`, `submit_type`, `app_status`, `created_at`, `updated_at`) VALUES
(2, 'Rinah Dennis', 'Dawn Flores', 'Accusamus sit ', 'Consequatur sin', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Yen Tran', 'Lesley Chaney', 'Hic mollit dolo', 'Consequatur Of', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Owen Whitfield', 'Nissim Park', 'Natus animi nu', 'Laboris libero ', 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Josiah Pitts', 'Giselle Rhodes', 'Est ullam susc', 'Excepteur eveni', 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Nina Flores', 'Ursa Mooney', 'Cupiditate reic', 'Voluptatem even', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(3, '2024-07-04-063327', 'App\\Database\\Migrations\\Banner', 'default', 'App', 1720079055, 1),
(4, '2024-07-04-063403', 'App\\Database\\Migrations\\BannerItem', 'default', 'App', 1720079055, 1),
(5, '2024-07-09-074556', 'App\\Database\\Migrations\\SSO', 'default', 'App', 1720511549, 2),
(6, '2024-07-10-024236', 'App\\Database\\Migrations\\Menu', 'default', 'App', 1720579783, 3),
(7, '2024-07-17-070646', 'App\\Database\\Migrations\\Pengumuman', 'default', 'App', 1721200273, 4);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `roleid` int(11) NOT NULL,
  `role_name` varchar(100) DEFAULT NULL,
  `role_status` varchar(100) DEFAULT NULL,
  `role_updateby` varchar(255) DEFAULT NULL,
  `role_date_update` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `role_date_created` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`roleid`, `role_name`, `role_status`, `role_updateby`, `role_date_update`, `role_date_created`) VALUES
(1, 'Superadmin', 'Aktif', '18163', NULL, '2024-06-25 16:26:57'),
(2, 'Admin', 'Aktif', '18163', NULL, '2024-06-25 16:27:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `nokp` varchar(255) NOT NULL DEFAULT '',
  `nok` varchar(255) NOT NULL DEFAULT '',
  `fname` varchar(255) NOT NULL DEFAULT '',
  `user_pwd` varchar(255) DEFAULT NULL,
  `user_salt` varchar(25) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `nama_ptj` varchar(255) DEFAULT NULL,
  `ptj` varchar(255) DEFAULT NULL,
  `nama_stesen` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `userstat` varchar(255) DEFAULT NULL,
  `date_created` date DEFAULT NULL,
  `date_updated` date DEFAULT NULL,
  `lastlogin` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `nokp`, `nok`, `fname`, `user_pwd`, `user_salt`, `email`, `nama_ptj`, `ptj`, `nama_stesen`, `role`, `userstat`, `date_created`, `date_updated`, `lastlogin`) VALUES
(1, '890612435089', '18163', 'FARIS ZAIDI BIN MOHD NOR', '123456', NULL, 'fariszaidi@mardi.gov.my', 'Pusat Pengurusan ICT', 'IM', 'Ibu Pejabat MARDI', '1', 'Aktif', '2024-06-25', NULL, '2024-07-10 10:50:53'),
(1, '990811145963', '19379', 'MUHAMMAD HAMIZAN BIN MOHAMAD NORWAN', '0000', NULL, 'hamizannorwan@mardi.gov.my', 'Pusat Pengurusan ICT', 'IM', 'Ibu Pejabat MARDI', '1', 'Aktif', '2024-06-25', NULL, '2024-07-10 10:50:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anj_banner`
--
ALTER TABLE `anj_banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `anj_banner_item`
--
ALTER TABLE `anj_banner_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `anj_menu`
--
ALTER TABLE `anj_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `anj_pengumuman`
--
ALTER TABLE `anj_pengumuman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `anj_sso`
--
ALTER TABLE `anj_sso`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`roleid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`,`nokp`,`nok`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anj_banner`
--
ALTER TABLE `anj_banner`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `anj_banner_item`
--
ALTER TABLE `anj_banner_item`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `anj_menu`
--
ALTER TABLE `anj_menu`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `anj_pengumuman`
--
ALTER TABLE `anj_pengumuman`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `anj_sso`
--
ALTER TABLE `anj_sso`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `roleid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
