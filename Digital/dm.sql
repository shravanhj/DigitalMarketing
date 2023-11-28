-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2023 at 06:59 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id21243488_sample`
--

-- --------------------------------------------------------

--
-- Table structure for table `dbadmin`
--

CREATE TABLE `dbadmin` (
  `id` int(5) NOT NULL,
  `admin_id` varchar(10) DEFAULT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `password2` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dbadmin`
--

INSERT INTO `dbadmin` (`id`, `admin_id`, `name`, `email`, `phone`, `password`, `password2`) VALUES
(15, 'dba15', 'SunainaSunaina', 'sunainab29@gmail.com', 9880351266, 'ca4f9dcf204e2037bfe5884867bead98bd9cbaf8', 'Welcome');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(3) NOT NULL,
  `service_name` varchar(20) NOT NULL,
  `service_price` int(10) NOT NULL,
  `offer_price` int(10) NOT NULL,
  `subscription_supports` varchar(70) NOT NULL,
  `service_details` varchar(500) NOT NULL,
  `service_image` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service_name`, `service_price`, `offer_price`, `subscription_supports`, `service_details`, `service_image`) VALUES
(1, 'Web Designing', 25000, 123, '', 'Fd', NULL),
(2, 'Web Designing', 25000, 123, '', 'Fd', NULL),
(3, 'Web Designing', 25000, 123, '', 'Fd', NULL),
(4, 'Web Designing', 25000, 123, '', 'Fd', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` int(3) NOT NULL,
  `subscription_name` varchar(20) NOT NULL,
  `subscription_price` int(11) NOT NULL,
  `offer_price` int(11) NOT NULL,
  `subscription_details` varchar(500) NOT NULL,
  `validity` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `subscription_name`, `subscription_price`, `offer_price`, `subscription_details`, `validity`) VALUES
(3, 'gold', 1500, 1000, 'kj', '7'),
(4, 'Gold', 122, 44, 'Ded', '7'),
(5, 'Gold', 1500, 1000, 'Qwqw', '7'),
(6, 'Gold', 1500, 1000, 'Dsd', '7'),
(7, 'Gold', 1500, 1000, 'Dss', '5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dbadmin`
--
ALTER TABLE `dbadmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dbadmin`
--
ALTER TABLE `dbadmin`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
