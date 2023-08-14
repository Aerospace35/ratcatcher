-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 13, 2023 at 06:10 PM
-- Server version: 10.5.19-MariaDB-0+deb11u2
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ratcatcher`
--

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `test_id` varchar(20) NOT NULL,
  `testserial` varchar(10) NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `city` text NOT NULL,
  `recent_travel` varchar(1) NOT NULL DEFAULT '0',
  `where_travel` varchar(1) NOT NULL DEFAULT '0',
  `result` varchar(10) NOT NULL,
  `symptoms` text NOT NULL,
  `timeofreport` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`test_id`, `testserial`, `user_id`, `city`, `recent_travel`, `where_travel`, `result`, `symptoms`, `timeofreport`) VALUES
('1692956444', '1050100', '000000000000', 'hinton', '0', '0', '', 'none', '2023-08-13 05:59:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` varchar(10) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `phone` varchar(20) NOT NULL,
  `city` text NOT NULL,
  `teststaken` varchar(255) NOT NULL DEFAULT '0',
  `flagged` varchar(1) NOT NULL DEFAULT '0',
  `isvaccinated` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `phone`, `city`, `teststaken`, `flagged`, `isvaccinated`) VALUES
('9201354687', 'REDACTEDFORPRIVACY', 'b*****m', '780*******', 'hinton', '0', '0', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`test_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
