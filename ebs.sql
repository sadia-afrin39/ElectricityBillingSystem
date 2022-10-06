-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2022 at 04:19 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ebs`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill_detail`
--

CREATE TABLE `bill_detail` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `unit` int(11) NOT NULL,
  `bill` decimal(10,2) NOT NULL,
  `month` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bill_detail`
--

INSERT INTO `bill_detail` (`id`, `userId`, `unit`, `bill`, `month`, `status`) VALUES
(15, 9, 1000, '6265.00', 'January', 1),
(16, 9, 457, '2081.75', 'February', 0),
(17, 10, 295, '1236.50', 'January', 1),
(18, 11, 569, '2946.30', 'January', 1),
(20, 10, 354, '1541.00', 'February', 0),
(21, 11, 2345, '16621.50', 'February', 1),
(22, 12, 235, '984.50', 'January', 0),
(23, 13, 547, '2776.90', 'January', 1),
(24, 9, 357, '1556.75', 'March', 0);

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `complaint` varchar(1000) NOT NULL,
  `reply` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`id`, `userId`, `complaint`, `reply`) VALUES
(2, 11, 'i am conmuser1. I have no complaint', 'Ok fine.'),
(3, 11, 'errwryh', 'ugfalknbsgnn'),
(4, 13, 'i am consumer02.', 'iuf rdgbfldnlfxkmnhfmn'),
(5, 13, 'I have a problem regarding my submission', ''),
(6, 14, 'I don\'t have any bill.', ''),
(7, 11, 'sjyufkh,bvn.jkl', '');

-- --------------------------------------------------------

--
-- Table structure for table `meters`
--

CREATE TABLE `meters` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `meterNo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `meters`
--

INSERT INTO `meters` (`id`, `userId`, `meterNo`) VALUES
(8, 9, 'admin01'),
(9, 10, 'biller01'),
(10, 11, 'consumer01'),
(11, 12, 'manager01'),
(12, 13, 'consumer02');

-- --------------------------------------------------------

--
-- Table structure for table `new_applications`
--

CREATE TABLE `new_applications` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `location` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `new_applications`
--

INSERT INTO `new_applications` (`id`, `name`, `phone`, `email`, `location`) VALUES
(5, 'Sayma Sultana', '01903153052', 'sayma.cse5.bu@gmail.com', 'rupatoli,barishal'),
(6, 'New Applicant', '01903153012', 'new@gmail.com', 'Nathullabad,barishal'),
(7, 'Nasif Ahmed', '01903153022', 'nasif@gmail.com', 'Bhandaria,Pirojpur');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `userId`, `amount`, `date`) VALUES
(3, 11, '2946.30', '2022-01-08 16:04:51'),
(5, 10, '1236.50', '2022-01-08 16:52:34'),
(6, 9, '6265.00', '2022-01-08 17:22:10'),
(7, 11, '16621.50', '2022-01-08 17:30:41'),
(8, 13, '2776.90', '2022-01-08 17:32:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `type`) VALUES
(9, 'Admin', 'admin@gmail.com', '01903153061', 1),
(10, 'Biller', 'biller@gmail.com', '01903153062', 2),
(11, 'Consumer1', 'consumer1@gmail.com', '01903153063', 3),
(12, 'Manager', 'manager@gmail.com', '01903153064', 4),
(13, 'consumer2', 'consumer2@gmail.com', '01903153065', 3),
(14, 'consumer3', 'consumer3@gmail.com', '01903153066', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meters`
--
ALTER TABLE `meters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_applications`
--
ALTER TABLE `new_applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill_detail`
--
ALTER TABLE `bill_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `meters`
--
ALTER TABLE `meters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `new_applications`
--
ALTER TABLE `new_applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
