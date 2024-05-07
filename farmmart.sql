-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2024 at 04:01 PM
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
-- Database: `farmmart`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `email` varchar(50) NOT NULL,
  `id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `farmer`
--

CREATE TABLE `farmer` (
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `mode` varchar(50) NOT NULL DEFAULT 'F'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `farmer`
--

INSERT INTO `farmer` (`name`, `email`, `password`, `mode`) VALUES
('Ashok Dhungana ', 'ashok@gmail.com', '753', 'F'),
('Prajin Singh', 'prajin@gmail.com', '12345', 'F'),
('Samika Bhandari ', 'samika@gmail.com', '54321', 'F');

-- --------------------------------------------------------

--
-- Table structure for table `newproducts`
--

CREATE TABLE `newproducts` (
  `id` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` int(52) NOT NULL,
  `description` longtext NOT NULL,
  `image` longtext NOT NULL,
  `Admin` text NOT NULL DEFAULT 'Disapproved'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `newproducts`
--

INSERT INTO `newproducts` (`id`, `name`, `price`, `description`, `image`, `Admin`) VALUES
(1, 'Alooo', 75, 'Alooo LEllo', 'Images/1000_F_263012223_ac8g7Ref47RcsrKOEJfp8VrD4QkhMmQn.jpg', 'Approved'),
(2, 'Tamatar', 85, 'dfksdhfjsdhf', 'Images/istockphoto-939108006-612x612.jpg', 'Approved'),
(3, 'Pyaj', 45, '', 'Images/ec1ab766e91dae725febee6cfdcde86c.png', 'Approved'),
(4, 'Brabim', 5, 'Brabim is Handsome', 'Images/Untitled.png', 'Approved'),
(5, 'Lassun', 15, 'kljdjflkjsdflkjs', 'Images/management.png', 'Approved'),
(6, 'Kera', 15, 'kljdjflkjsdflkjs', 'Images/unity.png', 'Approved'),
(7, 'Apple', 15, 'kljdjflkjsdflkjs', 'Images/java-script.png', 'Approved'),
(8, 'Gobi', 80, 'Gobi is Allooo', 'Images/user (1).png', 'Approved'),
(9, 'Guava', 45, 'Guavaaaa is Pink', 'Images/python.png', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(50) NOT NULL,
  `price` int(50) NOT NULL,
  `amount` int(50) NOT NULL,
  `fresh` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `table_prajin_gmail_com`
--

CREATE TABLE `table_prajin_gmail_com` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` longtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `mode` varchar(52) NOT NULL DEFAULT 'U'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`name`, `email`, `password`, `mode`) VALUES
('aakash', 'aakash@gmail.com', '159951', 'U'),
('Ashok Dhungana ', 'ashok@gmail.com', '$2y$10$HdbvHFKcBYEboWMCwq9uoOwQotaUIV7oY.ancUiO6U2', 'U'),
('Gagan Khadka', 'gagan@gmail.com', 'gagan', 'U'),
('Prajin Singh', 'prajin@gmail.com', '12345', 'U'),
('Samika Bhandari ', 'samika@gmail.com', '159753', 'U'),
('Yojana Ghimire ', 'yojana@gmail.com', '7595', 'U');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `farmer`
--
ALTER TABLE `farmer`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `newproducts`
--
ALTER TABLE `newproducts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `table_prajin_gmail_com`
--
ALTER TABLE `table_prajin_gmail_com`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `password` (`password`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `newproducts`
--
ALTER TABLE `newproducts`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `table_prajin_gmail_com`
--
ALTER TABLE `table_prajin_gmail_com`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
