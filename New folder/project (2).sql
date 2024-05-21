-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2024 at 11:16 PM
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
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobnumber` bigint(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `name`, `mobnumber`, `password`) VALUES
(1, 'admin@gmail.com', 'ATRIMA.B', 9856471240, 'ab1234');

-- --------------------------------------------------------

--
-- Table structure for table `booktable`
--

CREATE TABLE `booktable` (
  `r_id` int(11) NOT NULL,
  `uni_id` varchar(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `restaurant` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `reservationdatetime` datetime(6) NOT NULL,
  `tabletype` varchar(100) NOT NULL,
  `mobnumber` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booktable`
--

INSERT INTO `booktable` (`r_id`, `uni_id`, `name`, `email`, `restaurant`, `location`, `reservationdatetime`, `tabletype`, `mobnumber`) VALUES
(1, 'e90e0f05-1', 'Atrima Bhattacharyya', 'atrima1@gmail.com', 'Chili\'s American Grill & Bar', 'Kolkata', '2024-05-21 12:20:00.000000', 'Medium Table (2-4 Persons)', 7945612370),
(2, 'e90e0f05-1', 'Atrima Bhattacharyya', 'atrima1@gmail.com', 'Chili\'s American Grill & Bar', 'Kolkata', '2024-05-21 12:20:00.000000', 'Medium Table (2-4 Persons)', 7945612370),
(3, '026b845b-1', 'Adrika.G', 'adr567@gmail.com', 'Ozora', 'Pune', '2024-05-29 16:30:00.000000', 'Single Table (0-1 Persons)', 9830221524),
(4, '026b845b-1', 'Adrika', 'adr567@gmail.com', 'Dada Boudi Hotel', 'Kolkata', '2024-05-21 18:00:00.000000', 'Large Table ( 5-8 Persons)', 9830221524);

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE `tables` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`id`, `name`, `location`, `details`) VALUES
(1, 'BHOOTER RAJA DILO BOR', 'Chandannagar', 'For 2 people 1500approx'),
(2, 'The Eater', 'Tahir', 'For 2 people 500approx'),
(3, 'The Eater', 'Midzone', 'For 2 people 500approx');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(255) NOT NULL,
  `uni_id` varchar(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobnumber` bigint(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `uni_id`, `username`, `name`, `mobnumber`, `password`) VALUES
(2, 'e90e0f05-1', 'atrima1@gmail.com', 'Atrima Bhattacharyya', 7945612370, 'asdref'),
(3, '026b845b-1', 'adr567@gmail.com', 'ADRIKA', 9830221524, 'aw1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booktable`
--
ALTER TABLE `booktable`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`id`,`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`,`uni_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booktable`
--
ALTER TABLE `booktable`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
