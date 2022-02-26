-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2022 at 11:09 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xpeed_studio`
--

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` bigint(20) NOT NULL,
  `amount` int(10) NOT NULL,
  `buyer` varchar(255) NOT NULL,
  `receipt_id` varchar(20) NOT NULL,
  `items` varchar(255) NOT NULL,
  `buyer_email` varchar(50) NOT NULL,
  `buyer_ip` varchar(20) NOT NULL,
  `note` text NOT NULL,
  `city` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `hash_key` varchar(255) NOT NULL,
  `entry_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `entry_by` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `amount`, `buyer`, `receipt_id`, `items`, `buyer_email`, `buyer_ip`, `note`, `city`, `phone`, `hash_key`, `entry_at`, `entry_by`) VALUES
(2, 600, 'Solaiman', 'AOJALJDJ', '[\"laptop\"]', 'solaiman@gmail.com', '::1', 'NA', 'Dhaka', '1764567878', '$2y$10$t/lkwbeECQvNloiZHIF4fuhOBdp6n0nwKpbAuHZQNwgY58vAPcj5C', '2022-02-27 02:12:51', 2),
(3, 3423443, 'sefsfdf', 'sfsff', '[\"sdfsf\"]', 'sf@sdfsdf.sfsfd', '::1', 'sdfdsf', 'dfsfsd', '131323', '$2y$10$gEUs.aog0HUBs00xqZdrR.kOXrCb00nTgQsNkaa2lt/39nynXlN1m', '2022-02-27 03:34:39', 1),
(4, 0, 'sfsfdsf', 'sfsdf', '[\"fsdffs\"]', 'sfdsf@sfd.dfgdg', '::1', 'fsdf', 'sdfsfd', '3434324', '$2y$10$R5gM/xoeKHbaP4EBOH3SYeDp7Rl4ZSRGdGtQgiEVwW6V.kE7CTL/a', '2022-02-27 03:36:05', 1),
(5, 34343, 'sdfd', 'dfdf', '[\"sds\"]', 'dfsds@sdfsd.dds', '::1', 'dfdsf', 'ds', '343432', '$2y$10$3WgH7rhKB2xwYap6cvTWi.Xn89JHuz1.3tWaNp5zgs1ke9z5PkiPu', '2022-02-27 03:45:59', 1),
(6, 34343, 'sdfd', 'dfdf', '[\"sds\"]', 'dfsds@sdfsd.dds', '::1', 'dfdsf', 'ds', '343432', '$2y$10$J1FG7p3BG19tLP/hCOMuvu0Cl4bE7moSkdPfZ9esoWEIULao3GmLi', '2022-02-27 03:45:59', 1),
(15, 4323232, 'sdff', 'dsff', '[\"fsdffs\",\"sdff\",\"dsfd\"]', 'sdssdfsd@sdf.fgdg', '::1', 'sdfs', 'sdfsf', '3423424323', '$2y$10$//bv49TsGa/3wduuTjoH0O2Pu5v3.Sdqva5N0T6WX4lBhAxfBZD56', '2022-02-27 04:00:54', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(1, 'Md. Azharul Islam', 'azharul.ece13.hstu@gmail.com', '$2y$10$rbW9yEiHbeifGzPbOo7hR.vZrf1mIve9te7vKN9N8KH5BlMNCN2eW', '2022-02-27 02:04:35'),
(2, 'Solaiman', 'solaiman@gmail.com', '$2y$10$HA302hbybNI80kRD51C/5OsyGLaQF.FIhq1Tfv79peUvg1La0gcAa', '2022-02-27 02:11:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
