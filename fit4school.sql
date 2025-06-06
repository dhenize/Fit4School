-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2025 at 08:00 AM
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
-- Database: `fit4school`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `acc_id` int(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`acc_id`, `email`, `password`) VALUES
(1, 'admin321@gmail.com', 'Admain@123'),
(2, 'admin@123.com', '@Dmin1234');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `student_id` int(11) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `items` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date_of_appointment` date NOT NULL,
  `time_of_appointment` time NOT NULL,
  `Total` int(11) NOT NULL,
  `remark` varchar(50) DEFAULT 'ongoing'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`student_id`, `order_id`, `items`, `size`, `quantity`, `date_of_appointment`, `time_of_appointment`, `Total`, `remark`) VALUES
(202210001, 'ORD001', 'POLO(BOYS)', 'M', 1, '2024-06-07', '10:00:00', 1200, 'missed'),
(202210002, 'ORD002', 'PE T-Shirt', 'L', 2, '2024-11-20', '11:30:00', 780, 'ongoing'),
(202210003, 'ORD003', 'PE T-Shirt', 'M', 1, '2024-06-19', '09:00:00', 1500, 'done'),
(202210004, 'ORD004', 'PE T-Shirt', 'S', 1, '2024-10-02', '14:00:00', 850, 'missed'),
(202210005, 'ORD005', 'PE T-Shirt', 'S', 3, '2024-10-10', '10:15:00', 500, 'missed'),
(202210006, 'ORD006', 'POLO(BOYS)', 'L', 1, '2024-10-10', '13:45:00', 2000, 'done'),
(202210007, 'ORD007', 'PANTS(Girls)', 'L', 5, '2024-10-10', '09:30:00', 250, 'missed'),
(202210008, 'ORD008', 'PANTS(Girls)', 'S', 1, '2024-10-10', '16:00:00', 180, 'ongoing'),
(202210009, 'ORD009', 'NSTP(T-Shirt)', 'L', 1, '2024-10-10', '10:45:00', 900, 'missed'),
(202210010, 'ORD010', 'NSTP(T-Shirt)', 'L', 1, '2024-10-10', '12:00:00', 300, 'done');

-- --------------------------------------------------------

--
-- Table structure for table `archive`
--

CREATE TABLE `archive` (
  `student_id` int(11) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `items` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date_of_appointment` date NOT NULL,
  `time_of_appointment` time NOT NULL,
  `Total` int(11) NOT NULL,
  `remark` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `archive`
--

INSERT INTO `archive` (`student_id`, `order_id`, `items`, `quantity`, `date_of_appointment`, `time_of_appointment`, `Total`, `remark`) VALUES
(202210001, 'ORD001', 'PE T-Shirt', 1, '2024-06-15', '10:00:00', 1200, 'done'),
(202210002, 'ORD002', 'PE T-Shirt', 2, '2024-06-16', '11:30:00', 780, 'done'),
(202210003, 'ORD003', 'PANTS(Girls)', 1, '2024-06-17', '09:00:00', 1500, 'done'),
(202210004, 'ORD004', 'PANTS(Girls)', 1, '2024-06-18', '14:00:00', 850, 'missed'),
(202210005, 'ORD005', 'POLO(BOYS)', 3, '2024-06-19', '10:15:00', 500, 'missed'),
(202210006, 'ORD006', 'POLO(BOYS)', 1, '2024-06-20', '13:45:00', 2000, 'missed'),
(202210007, 'ORD007', 'NSTP(T-Shirt)', 5, '2024-06-21', '09:30:00', 250, 'done'),
(202210008, 'ORD008', 'NSTP(T-Shirt)', 1, '2024-06-22', '16:00:00', 180, 'missed'),
(202210009, 'ORD009', 'NSTP(T-Shirt)', 1, '2024-06-23', '10:45:00', 900, 'done'),
(202210010, 'ORD010', 'POLO(BOYS)', 1, '2024-06-24', '12:00:00', 300, 'missed');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `otp` varchar(6) NOT NULL,
  `expiry_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `otp`, `expiry_time`) VALUES
('ic.marcedlin.pasquin@cvsu.edu.ph', '8185', '2025-06-03 18:11:02');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `email`, `password`) VALUES
(202210123, 'ic.marcedlin.pasquin@cvsu.edu.ph', 'M@rcpasquin00'),
(202210602, 'dhenizelopez@gmail.com', 'Dhenizelopez00!');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`acc_id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `acc_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202210011;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
