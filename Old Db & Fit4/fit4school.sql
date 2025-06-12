-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2025 at 11:31 AM
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
  `order_id` int(10) UNSIGNED NOT NULL,
  `student_id` int(15) NOT NULL,
  `Queue_Number` varchar(20) NOT NULL,
  `items` text NOT NULL,
  `size` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date_of_appointment` date NOT NULL,
  `time_of_appointment` time NOT NULL,
  `total` int(11) NOT NULL,
  `Ticket` varchar(255) DEFAULT NULL,
  `remark` varchar(50) DEFAULT 'Ongoing',
  `admin_id` int(15) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`order_id`, `student_id`, `Queue_Number`, `items`, `size`, `quantity`, `date_of_appointment`, `time_of_appointment`, `total`, `Ticket`, `remark`, `admin_id`, `created_at`) VALUES
(15, 202210123, 'Q-001', 'School Uniform Set', 'Medium', 1, '2025-06-10', '09:00:00', 850, NULL, 'Ongoing', 1, '2025-06-06 08:58:32'),
(16, 202210602, 'Q-002', 'PE Shirt', 'Large', 2, '2025-06-11', '14:00:00', 500, NULL, 'Ongoing', 1, '2025-06-06 08:58:32'),
(17, 202210123, 'Q-001', 'School Uniform Set', 'Medium', 1, '2025-06-10', '09:00:00', 850, NULL, 'Ongoing', 1, '2025-06-06 08:58:43'),
(18, 202210602, 'Q-002', 'PE Shirt', 'Large', 2, '2025-06-11', '14:00:00', 500, NULL, 'Missed', 1, '2025-06-06 08:58:43');

-- --------------------------------------------------------

--
-- Table structure for table `archive`
--

CREATE TABLE `archive` (
  `Archive_ID` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `student_id` int(15) NOT NULL,
  `Queue_Number` varchar(20) NOT NULL,
  `items` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `date_of_appointment` date NOT NULL,
  `time_of_appointment` time NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `ticket` varchar(255) DEFAULT NULL,
  `remark` varchar(50) NOT NULL DEFAULT 'ongoing',
  `admin_id` int(15) DEFAULT NULL,
  `archived_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `archive`
--

INSERT INTO `archive` (`Archive_ID`, `order_id`, `student_id`, `Queue_Number`, `items`, `quantity`, `date_of_appointment`, `time_of_appointment`, `total`, `ticket`, `remark`, `admin_id`, `archived_at`) VALUES
(9, 1, 202210123, 'Q-001', 'School Uniform Set', 1, '2025-05-25', '09:00:00', 850.00, NULL, 'Done', 1, '2025-06-06 08:19:37'),
(10, 2, 202210602, 'Q-002', 'PE Shirt', 2, '2025-05-28', '14:00:00', 500.00, NULL, 'Done', 1, '2025-06-06 08:19:37');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `otp` varchar(6) NOT NULL,
  `expiry_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(202210123, 'ic.marcedlin.pasquin@cvsu.edu.ph', 'password'),
(202210602, 'dhenizelopez@gmail.com', 'Dhenizelopez00!');

-- --------------------------------------------------------

--
-- Table structure for table `uniform_items`
--

CREATE TABLE `uniform_items` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `size` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock_quantity` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `uniform_items`
--

INSERT INTO `uniform_items` (`item_id`, `item_name`, `gender`, `size`, `price`, `stock_quantity`) VALUES
(1, 'Polo', 'Boys', 'XS', 250.00, 50),
(2, 'Polo', 'Boys', 'S', 250.00, 75),
(3, 'Polo', 'Boys', 'M', 250.00, 120),
(4, 'Polo', 'Boys', 'L', 250.00, 90),
(5, 'Polo', 'Boys', 'XL', 250.00, 40),
(6, 'Polo', 'Boys', 'XXL', 250.00, 15),
(7, 'Pants', 'Boys', 'S', 300.00, 60),
(8, 'Pants', 'Boys', 'M', 300.00, 100),
(9, 'Pants', 'Boys', 'L', 300.00, 80),
(10, 'Pants', 'Boys', 'XL', 300.00, 30),
(11, 'Blouse', 'Girls', 'XS', 295.00, 45),
(12, 'Blouse', 'Girls', 'S', 295.00, 80),
(13, 'Blouse', 'Girls', 'M', 295.00, 110),
(14, 'Blouse', 'Girls', 'L', 295.00, 70),
(15, 'Skirt', 'Girls', 'S', 320.00, 55),
(16, 'Skirt', 'Girls', 'M', 320.00, 90),
(17, 'Skirt', 'Girls', 'L', 320.00, 65),
(18, 'PE T-Shirt', 'Unisex', 'S', 200.00, 150),
(19, 'PE T-Shirt', 'Unisex', 'M', 200.00, 200),
(20, 'PE T-Shirt', 'Unisex', 'L', 200.00, 180),
(21, 'PE Jogger Pants', 'Unisex', 'S', 350.00, 100),
(22, 'PE Jogger Pants', 'Unisex', 'M', 350.00, 120),
(23, 'PE Jogger Pants', 'Unisex', 'L', 350.00, 90);

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
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `Student_ID` (`student_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `archive`
--
ALTER TABLE `archive`
  ADD PRIMARY KEY (`Archive_ID`),
  ADD KEY `Order_ID` (`order_id`),
  ADD KEY `Student_ID` (`student_id`),
  ADD KEY `admin_id` (`admin_id`);

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
-- Indexes for table `uniform_items`
--
ALTER TABLE `uniform_items`
  ADD PRIMARY KEY (`item_id`),
  ADD UNIQUE KEY `item_gender_size` (`item_name`,`gender`,`size`);

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
  MODIFY `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `archive`
--
ALTER TABLE `archive`
  MODIFY `Archive_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `uniform_items`
--
ALTER TABLE `uniform_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_ibfk_1` FOREIGN KEY (`Student_ID`) REFERENCES `students` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appointments_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`acc_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `archive`
--
ALTER TABLE `archive`
  ADD CONSTRAINT `archive_ibfk_1` FOREIGN KEY (`Order_ID`) REFERENCES `appointments` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `archive_ibfk_2` FOREIGN KEY (`Student_ID`) REFERENCES `students` (`student_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `archive_ibfk_3` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`acc_id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
