-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2025 at 12:22 PM
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
-- Database: `xitebmedi`
--

-- --------------------------------------------------------

--
-- Table structure for table `accepted`
--

CREATE TABLE `accepted` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `drug_list` varchar(255) NOT NULL,
  `amount` int(200) NOT NULL,
  `status` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accepted`
--

INSERT INTO `accepted` (`id`, `username`, `drug_list`, `amount`, `status`, `created_at`) VALUES
(1, 'user1', 'Amoxicillin 250mg (Qty: 10, Amount: 100.00), Paracetamol 500mg (Qty: 2, Amount: 10.00), Amoxicillin 250mg (Qty: 5, Amount: 50.00)', 160, 'accepted', '2024-09-28 23:24:20'),
(2, 'user1', 'Amoxicillin 250mg (Qty: 5, Amount: 50.00), Paracetamol 500mg (Qty: 5, Amount: 25.00)', 75, 'accepted', '2024-09-28 23:24:20'),
(3, 'user1', 'Amoxicillin 250mg (Qty: 10, Amount: 100.00)', 100, 'accepted', '2024-09-28 23:24:20'),
(4, 'user1', 'Amoxicillin 250mg (Qty: 10, Amount: 100.00)', 100, 'rejected', '2024-09-29 12:01:56'),
(5, 'user1', 'Amoxicillin 250mg (Qty: 10, Amount: 100.00)', 100, 'rejected', '2024-09-29 12:02:40'),
(6, 'user1', 'Amoxicillin 250mg (Qty: 12, Amount: 120.00), Paracetamol 500mg (Qty: 15, Amount: 75.00), Paracetamol 500mg (Qty: 5, Amount: 25.00)', 220, 'accepted', '2024-09-29 12:05:25'),
(7, 'user1', 'Amoxicillin 250mg (Qty: 5, Amount: 50.00), Paracetamol 500mg (Qty: 12, Amount: 60.00), Ibuprofen 150 (Qty: 12, Amount: 900.00)', 1010, 'accepted', '2024-09-29 20:39:42');

-- --------------------------------------------------------

--
-- Table structure for table `done`
--

CREATE TABLE `done` (
  `id` int(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` int(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `time` varchar(20) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `done`
--

INSERT INTO `done` (`id`, `username`, `name`, `email`, `mobile`, `address`, `time`, `image`) VALUES
(7, 'user1', 'john', 'john@gmail.com', 1564321321, 'Kegalle , town', '03:25', 'image/images.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `drugs`
--

CREATE TABLE `drugs` (
  `id` int(20) NOT NULL,
  `drugname` varchar(100) NOT NULL,
  `price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `drugs`
--

INSERT INTO `drugs` (`id`, `drugname`, `price`) VALUES
(1, 'Amoxicillin 250mg', 10),
(2, 'Paracetamol 500mg', 5),
(3, 'Ibuprofen 150', 75),
(4, 'Ibuprofen 150', 75),
(5, 'Ibuprofen 150', 75),
(6, 'penadol 50', 10),
(7, 'penadol 50', 25),
(8, 'asprin 20mg', 15),
(9, 'penadol 50', 10),
(10, 'penadol 50mg', 20),
(11, 'penadol 50mg', 20);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `message` varchar(255) DEFAULT NULL,
  `is_read` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `message`, `is_read`, `created_at`) VALUES
(1, 'New accepted quotation from user1.', 1, '2024-09-28 14:58:37'),
(2, 'New accepted quotation from user1.', 1, '2024-09-28 17:44:51'),
(3, 'New rejected quotation from user1.', 1, '2024-09-29 06:31:56'),
(4, 'New rejected quotation from user1.', 0, '2024-09-29 06:32:40'),
(5, 'New accepted quotation from user1.', 1, '2024-09-29 06:35:25'),
(6, 'New accepted quotation from user1.', 0, '2024-09-29 15:09:42');

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `id` int(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `time` varchar(10) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`id`, `username`, `name`, `email`, `mobile`, `address`, `time`, `image`) VALUES
(7, 'user1', 'xiteb', 'xiteb@gmail.com', '765212356', 'boudhaloka mawatha , colombo 4', '01:30', 'image/images.jpg'),
(8, 'user1', 'bob', 'neymar@gmail.com', '123654789', 'peradeniya, kandy', '05:15', 'image/z3p36wgxzoe91.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `qotation`
--

CREATE TABLE `qotation` (
  `id` int(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `drug_list` varchar(255) NOT NULL,
  `amount` int(200) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'not_accepted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `qotation`
--

INSERT INTO `qotation` (`id`, `username`, `drug_list`, `amount`, `status`) VALUES
(9, 'vini', 'Amoxicillin 250mg (Qty: 20, Amount: 200.00), Paracetamol 500mg (Qty: 10, Amount: 50.00), Amoxicillin 250mg (Qty: 5, Amount: 50.00)', 300, 'not_accepted'),
(14, 'user1', 'Amoxicillin 250mg (Qty: 5, Amount: 50.00), Paracetamol 500mg (Qty: 12, Amount: 60.00)', 110, 'not_accepted');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` char(255) NOT NULL,
  `role` text NOT NULL DEFAULT 'user',
  `reg_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `reg_time`) VALUES
(1, 'user1', '1234', 'user', '2024-09-25 13:22:02'),
(2, 'admin', 'admin123', 'admin', '2024-09-25 13:23:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accepted`
--
ALTER TABLE `accepted`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `done`
--
ALTER TABLE `done`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drugs`
--
ALTER TABLE `drugs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qotation`
--
ALTER TABLE `qotation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accepted`
--
ALTER TABLE `accepted`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `done`
--
ALTER TABLE `done`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `drugs`
--
ALTER TABLE `drugs`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `qotation`
--
ALTER TABLE `qotation`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
