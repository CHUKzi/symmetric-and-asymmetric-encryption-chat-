-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2023 at 03:32 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chatdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `id` int(11) NOT NULL,
  `user1` int(11) NOT NULL,
  `user2` int(11) NOT NULL,
  `is_accept` tinyint(4) NOT NULL,
  `requ_datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`id`, `user1`, `user2`, `is_accept`, `requ_datetime`) VALUES
(1, 2, 1, 1, '2023-01-03 14:26:08');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `incoming_msg` int(11) NOT NULL,
  `outgoing_msg` int(11) NOT NULL,
  `mg` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `encryption_key` varchar(20) DEFAULT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msg_id`, `incoming_msg`, `outgoing_msg`, `mg`, `encryption_key`, `date_time`) VALUES
(1, 1, 2, 'bzxP9Yc1YJCiYICY+t3weT3bxM5N1zL8CQ==', '63b43b454375f', '2023-01-03 14:27:17'),
(2, 2, 1, 'bzADy4dsRp/gJ7SS', '63b43b454375f', '2023-01-03 14:27:35'),
(3, 2, 1, 'TiEHzoZgIZPhK67e+d3sNzQ=', '63b43b454375f', '2023-01-03 14:27:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `user_name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `uniqid` varchar(20) DEFAULT NULL,
  `device` varchar(40) DEFAULT NULL,
  `privet_key` longtext DEFAULT NULL,
  `public_key` mediumtext DEFAULT NULL,
  `is_asymmetric` tinyint(4) NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `regi_datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `user_name`, `uniqid`, `device`, `privet_key`, `public_key`, `is_asymmetric`, `last_login`, `regi_datetime`) VALUES
(1, 'royanharsha6@gmail.com', ' Royan Harsha', '63b43917e265e', '2d112d2cba5594df4efb66162b3b43f5241785d7', NULL, NULL, 0, '2023-01-03 19:47:59', '2023-01-03 14:17:59'),
(2, 'chukzi4242@gmail.com', ' Gangul Kalhara', '63b43ad6f11af', '71446d68b3c853641e50874529f7da5211fb267f', NULL, NULL, 0, '2023-01-03 19:55:26', '2023-01-03 14:25:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
