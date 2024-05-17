-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2024 at 11:10 PM
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
  `productId` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `userEmail` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`productId`, `status`, `userEmail`) VALUES
(4, 1, 'samika@gmail.com'),
(3, 1, 'samika@gmail.com'),
(5, 1, 'samika@gmail.com'),
(6, 1, 'samika@gmail.com'),
(4, 1, 'samika@gmail.com'),
(4, 1, 'samika@gmail.com');

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
('Anu Singh', 'anusingh@gmail.com', 'anu123#', 'F'),
('Ashok Dhungana ', 'ashok@gmail.com', '753', 'F'),
('Prajin Singh', 'prajin@gmail.com', '12345', 'F'),
('Samika Bhandari ', 'samika@gmail.com', '456789', 'F');

-- --------------------------------------------------------

--
-- Table structure for table `inquiry`
--

CREATE TABLE `inquiry` (
  `id` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(52) NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inquiry`
--

INSERT INTO `inquiry` (`id`, `name`, `email`, `subject`, `message`) VALUES
(5, 'Rajesh Hamal', 'rajesh@gmail.com', 'Rotten Vegetables ', 'I was delivered rotten vegetables');

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
  `fresh` tinyint(50) NOT NULL,
  `Admin` varchar(50) NOT NULL DEFAULT 'Disapproved'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `newproducts`
--

INSERT INTO `newproducts` (`id`, `name`, `price`, `description`, `image`, `fresh`, `Admin`) VALUES
(1, 'Alooo', 75, 'Alooo LEllo', 'Images/1000_F_263012223_ac8g7Ref47RcsrKOEJfp8VrD4QkhMmQn.jpg', 0, 'Approved'),
(2, 'Tamatar', 85, 'dfksdhfjsdhf', 'Images/istockphoto-939108006-612x612.jpg', 0, 'Disapproved'),
(3, 'Pyaj', 45, '', 'Images/ec1ab766e91dae725febee6cfdcde86c.png', 0, 'Disapproved'),
(4, 'Brabim', 5, 'Brabim is Handsome', 'Images/Untitled.png', 0, 'Disapproved'),
(5, 'Lassun', 15, 'kljdjflkjsdflkjs', 'Images/management.png', 0, 'Disapproved'),
(6, 'Kera', 15, 'kljdjflkjsdflkjs', 'Images/unity.png', 0, 'Disapproved'),
(7, 'Apple', 15, 'kljdjflkjsdflkjs', 'Images/java-script.png', 0, 'Disapproved'),
(8, 'Gobi', 80, 'Gobi is Allooo', 'Images/user (1).png', 0, 'Disapproved'),
(9, 'Guava', 45, 'Guavaaaa is Pink', 'Images/python.png', 0, 'Disapproved'),
(10, 'Kerau', 85, 'klasdjlkasdja', 'Images/database.png', 0, 'Disapproved'),
(21, 'Allu', 75, '', 'Images/lms_simplified.webp', 1, 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` longtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `fresh` tinyint(4) NOT NULL,
  `Admin` varchar(50) NOT NULL DEFAULT 'Disapproved'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `description`, `image`, `fresh`, `Admin`) VALUES
(3, 'Potato', 75.00, 'we present our freshly harvested potatoes. Grown with care and expertise, these potatoes are bursting with flavor and nutrients. With their earthy taste and versatile nature, they are perfect for countless recipes.', 'Images/potato.jpg', 1, 'Approved'),
(4, 'Onion', 45.00, 'Grown with dedication and expertise, these onions are rich in flavor and nutrients. Their versatile taste and crisp texture make them a must-have ingredient for countless recipes. ', 'Images/onion.jpg', 1, 'Approved'),
(6, 'Broccoli', 50.00, 'Grown with meticulous care and attention, our broccoli is bursting with vibrant color and crispness. Packed with essential nutrients like vitamins C and K, as well as fiber, this nutrient-dense vegetable is a delicious and healthy addition to any meal.', 'Images/Broccoli.jpg', 1, 'Approved'),
(7, 'Cilantro', 95.00, 'Dhaniyaaaaaaaaaaaa', 'Images/Cilantro.jpg', 1, 'Approved'),
(8, 'Beetroot', 500.00, 'Beetrooiyaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'Images/Beetroot.jpg', 1, 'Approved'),
(9, 'Fenugreek', 10.00, 'Fenugreekiyaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'Images/Fenugreek.jpg', 1, 'Approved'),
(10, 'Lentil', 1000.00, 'Lentiliyaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'Images/lentil.jpg', 1, 'Approved'),
(11, 'Lady Finger', 75.00, 'Bhendiii', 'Images/ladyFinger.jpg', 1, 'Approved'),
(12, 'Pumpkin', 750.00, 'Pimkinyaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'Images/Pumpkin.jpg', 0, 'Approved'),
(13, 'Tomato ', 35.00, 'Tamatar', 'Images/Tomato.jpeg', 1, 'Approved'),
(20, 'Carrot', 25.00, '', 'Images/carrots.jpg', 1, 'Approved'),
(22, 'Carrot', 25.00, 'Carrot', 'Images/carrots.jpg', 0, 'Disapproved');

-- --------------------------------------------------------

--
-- Table structure for table `table_prajin_gmail_com`
--

CREATE TABLE `table_prajin_gmail_com` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` longtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `fresh` tinyint(4) NOT NULL,
  `Admin` varchar(50) NOT NULL DEFAULT 'Disapproved'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_prajin_gmail_com`
--

INSERT INTO `table_prajin_gmail_com` (`id`, `name`, `price`, `description`, `image`, `fresh`, `Admin`) VALUES
(4, 'Broccoli', 50.00, 'Dal Bhat Power 24 hr ', 'Images/Broccoli.jpg', 1, 'Approved'),
(5, 'Cilantro', 95.00, 'Dhaniyaaaaaaaaaaaa', 'Images/Cilantro.jpg', 1, 'Approved'),
(6, 'Beetroot', 500.00, 'Beetrooiyaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'Images/Beetroot.jpg', 1, 'Approved'),
(7, 'Fenugreek', 10.00, 'Fenugreekiyaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'Images/Fenugreek.jpg', 1, 'Approved'),
(8, 'Lentil', 1000.00, 'Lentiliyaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'Images/lentil.jpg', 1, 'Approved'),
(9, 'Lady Finger', 75.00, 'Bhendiii', 'Images/ladyFinger.jpg', 1, 'Approved'),
(10, 'Pumpkin', 750.00, 'Pimkinyaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'Images/Pumpkin.jpg', 0, 'Approved'),
(11, 'Tomato ', 35.00, 'Tamatar', 'Images/Tomato.jpeg', 1, 'Approved'),
(18, 'Carrot', 25.00, 'Carrot', 'Images/carrots.jpg', 0, 'Disapproved');

-- --------------------------------------------------------

--
-- Table structure for table `table_samika_gmail_com`
--

CREATE TABLE `table_samika_gmail_com` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` longtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `fresh` tinyint(4) NOT NULL,
  `Admin` varchar(50) NOT NULL DEFAULT 'Disapproved'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_samika_gmail_com`
--

INSERT INTO `table_samika_gmail_com` (`id`, `name`, `price`, `description`, `image`, `fresh`, `Admin`) VALUES
(2, 'Onion', 45.00, 'Onion is dark red', 'Images/onion.jpg', 1, 'Approved');

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
-- Indexes for table `farmer`
--
ALTER TABLE `farmer`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `inquiry`
--
ALTER TABLE `inquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newproducts`
--
ALTER TABLE `newproducts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_prajin_gmail_com`
--
ALTER TABLE `table_prajin_gmail_com`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_samika_gmail_com`
--
ALTER TABLE `table_samika_gmail_com`
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
-- AUTO_INCREMENT for table `inquiry`
--
ALTER TABLE `inquiry`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `newproducts`
--
ALTER TABLE `newproducts`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `table_prajin_gmail_com`
--
ALTER TABLE `table_prajin_gmail_com`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `table_samika_gmail_com`
--
ALTER TABLE `table_samika_gmail_com`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
