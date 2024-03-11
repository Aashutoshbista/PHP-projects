-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2024 at 07:34 AM
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
-- Database: `todolist`
--

-- --------------------------------------------------------

--
-- Table structure for table `todolist`
--

CREATE TABLE `todolist` (
  `id` int(11) NOT NULL,
  `todo` varchar(250) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `uid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `todolist`
--

INSERT INTO `todolist` (`id`, `todo`, `status`, `uid`) VALUES
(8, 'Complete button status \r\n', 1, 2),
(17, 'Nav bar\r\n', 1, 2),
(19, 'complete bar\r\n', 1, 2),
(20, 'admin pannel', 0, 2),
(21, 'danting painting ', 0, 2),
(22, 'laravel\r\n', 0, 2),
(24, 'edit', 0, 2),
(26, 'priority', 0, 2),
(35, 'message box\r\n', 0, 2),
(36, 'timer', 0, 2),
(37, 'charts ', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` tinyint(2) NOT NULL,
  `verificationcode` varchar(50) NOT NULL,
  `verify_status` tinyint(2) NOT NULL DEFAULT 0 COMMENT '0 not verified,1 verified'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `status`, `verificationcode`, `verify_status`) VALUES
(2, 'Aashutosh', 'aashutoshbista717@gmail.com', '1235', 1, '7054c6635e2ac3d0718eb71d6bbf0e23', 1),
(3, 'Aashutosh Bista', 'firefist972@gmail.com', '12345', 1, '7d077d50dff41981c9e437fb3f67fe4b', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `todolist`
--
ALTER TABLE `todolist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `todolist`
--
ALTER TABLE `todolist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
