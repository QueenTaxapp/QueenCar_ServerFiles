-- phpMyAdmin SQL Dump
-- version 4.7.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 27, 2017 at 02:14 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tabandgo`
--

-- --------------------------------------------------------

--
-- Table structure for table `tab_Company`
--

CREATE TABLE `tab_Company` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT ' if 1 inactive or 0 active',
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zipcode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tab_Company`
--

INSERT INTO `tab_Company` (`id`, `company_name`, `name`, `company_url`, `email`, `password`, `status`, `address`, `phone_number`, `state`, `country`, `zipcode`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'vicky1', 'vicky', 'http://localhost/phpmyadmin/tbl_change.php?db=tabandgo&table=tab_Company', 'vicky@gmail.com1', 'http://localhost/phpmyadmin/tbl_change.php?db=tabandgo&table=tab_Company', 1, 'address1', '72007040571', 'state1', 'country1', '6410271', '2017-11-20 00:00:00', '2017-11-21 11:56:21', NULL),
(2, 'RKV builders 2', 'vinoth', NULL, 'vignesh.nplus@gmail.com', '$2y$10$nNbgWVs.GtkBlbQ.6x3w..7Bu233CHV/ebjwdxbT.UUeb8Uyi0mOy', 0, 'palani gounder street', '7200704057', 'tamilnadu', 'india', '641027', '2017-11-21 10:41:58', '2017-11-21 11:51:02', NULL),
(7, 'vinoth R', 'vinoth', NULL, 'vignesh.nplus@gmail.coma', '$2y$10$XnCfH8tbM9PfwNIeVmHOXOzoNriPJjZWSkCJbA7VKY0Xik0yrKP8y', 0, 'palani gounder street', '+917200704057', 'tamilnadu', 'india', '123456789', '2017-11-21 11:42:50', '2017-11-21 12:24:25', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tab_Company`
--
ALTER TABLE `tab_Company`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tab_Company`
--
ALTER TABLE `tab_Company`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
