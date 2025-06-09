-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2025 at 11:35 AM
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
-- Database: `db_fit4school`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `email`, `password`) VALUES
(1, 'admin321@gmail.com', 'Admain@123');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `app_id` int(15) NOT NULL,
  `student_id` int(15) NOT NULL,
  `queue_no` int(15) NOT NULL,
  `date_of_app` date NOT NULL,
  `time_of_app` time NOT NULL,
  `ticket_file` varchar(255) DEFAULT NULL,
  `remarks` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `appointment_items`
--

CREATE TABLE `appointment_items` (
  `appitems_id` int(15) NOT NULL,
  `app_id` int(15) NOT NULL,
  `item_id` int(15) NOT NULL,
  `quantity` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `archive`
--

CREATE TABLE `archive` (
  `archive_id` int(15) NOT NULL,
  `dump_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(15) NOT NULL,
  `item_id` int(15) NOT NULL,
  `student_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dump`
--

CREATE TABLE `dump` (
  `dump_id` int(15) NOT NULL,
  `app_id` int(15) NOT NULL,
  `stud_id` int(15) NOT NULL,
  `appitems_id` int(15) NOT NULL,
  `item_id` int(15) NOT NULL,
  `quantity` int(15) NOT NULL,
  `date_of_app` date NOT NULL,
  `time_of_app` time NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `item_id` int(15) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `quantity` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`item_id`, `item_name`, `size`, `price`, `quantity`) VALUES
(1, 'Polo (Boys)', 'XS', 315, 250),
(2, 'Polo (Boys)', 'S', 315, 250),
(3, 'Polo (Boys)', 'M', 315, 250),
(4, 'Polo (Boys)', 'L', 315, 250),
(5, 'Polo (Boys)', 'XL', 335, 250),
(6, 'Polo (Boys)', 'XXL', 350, 250),
(7, 'Pants (Boys)', 'XS', 320, 250),
(8, 'Pants (Boys)', 'S', 340, 250),
(9, 'Pants (Boys)', 'M', 360, 250),
(10, 'Pants (Boys)', 'L', 375, 250),
(11, 'Pants (Boys)', 'XL', 400, 250),
(12, 'Pants (Boys)', 'XXL', 415, 250),
(13, 'Blouse (Girls)', 'XS', 275, 250),
(14, 'Blouse (Girls)', 'S', 275, 250),
(15, 'Blouse (Girls)', 'M', 275, 250),
(16, 'Blouse (Girls)', 'L', 275, 250),
(17, 'Blouse (Girls)', 'XL', 290, 250),
(18, 'Blouse (Girls)', 'XXL', 300, 250),
(19, 'Slacks (Girls)', 'XS', 320, 250),
(20, 'Slacks (Girls)', 'S', 340, 250),
(21, 'Slacks (Girls)', 'M', 360, 250),
(22, 'Slacks (Girls)', 'L', 375, 250),
(23, 'Slacks (Girls)', 'XL', 400, 250),
(24, 'Slacks (Girls)', 'XXL', 415, 250),
(25, 'PE (T-Shirt)', 'XS', 370, 250),
(26, 'PE (T-Shirt)', 'S', 380, 250),
(27, 'PE (T-Shirt)', 'M', 390, 250),
(28, 'PE (T-Shirt)', 'L', 400, 250),
(29, 'PE (T-Shirt)', 'XL', 410, 250),
(30, 'PE (T-Shirt)', 'XXL', 430, 250),
(31, 'PE (Pants)', 'XS', 410, 250),
(32, 'PE (Pants)', 'S', 420, 250),
(33, 'PE (Pants)', 'M', 430, 250),
(34, 'PE (Pants)', 'L', 440, 250),
(35, 'PE (Pants)', 'XL', 460, 250),
(36, 'PE (Pants)', 'XXL', 480, 250);

-- --------------------------------------------------------

--
-- Table structure for table `pass_reset`
--

CREATE TABLE `pass_reset` (
  `email` varchar(255) NOT NULL,
  `otp` varchar(6) NOT NULL,
  `expiry_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `bdate` date NOT NULL,
  `crs_sec` varchar(255) NOT NULL,
  `contact_no` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`app_id`),
  ADD KEY `stud_id` (`student_id`);

--
-- Indexes for table `appointment_items`
--
ALTER TABLE `appointment_items`
  ADD PRIMARY KEY (`appitems_id`),
  ADD KEY `app_id` (`app_id`),
  ADD KEY `appointment_items_ibfk_2` (`item_id`);

--
-- Indexes for table `archive`
--
ALTER TABLE `archive`
  ADD PRIMARY KEY (`archive_id`),
  ADD KEY `dump_id` (`dump_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `dump`
--
ALTER TABLE `dump`
  ADD PRIMARY KEY (`dump_id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `pass_reset`
--
ALTER TABLE `pass_reset`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `archive`
--
ALTER TABLE `archive`
  MODIFY `archive_id` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dump`
--
ALTER TABLE `dump`
  MODIFY `dump_id` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `item_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`);

--
-- Constraints for table `appointment_items`
--
ALTER TABLE `appointment_items`
  ADD CONSTRAINT `appointment_items_ibfk_1` FOREIGN KEY (`app_id`) REFERENCES `appointments` (`app_id`),
  ADD CONSTRAINT `appointment_items_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `inventory` (`item_id`);

--
-- Constraints for table `archive`
--
ALTER TABLE `archive`
  ADD CONSTRAINT `archive_ibfk_1` FOREIGN KEY (`dump_id`) REFERENCES `dump` (`dump_id`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `inventory` (`item_id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`email`) REFERENCES `pass_reset` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
