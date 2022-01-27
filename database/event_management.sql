-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2022 at 10:21 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `event_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_event`
--

DROP TABLE IF EXISTS `tbl_event`;
CREATE TABLE `tbl_event` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `recurrence_type` enum('repeat_type1','repeat_type2') NOT NULL,
  `type1_recurrence_at` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1=> Every, 2 => Every Other, 3 => Every Third, 4 => Every Fourth',
  `type1_duration` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1 => Day, 2 => Week, 3 => Month, 4 => Year',
  `type2_recurrence_at` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1 => First, 2 => Second, 3 => Third, 4 => Fourth',
  `type2_day` int(11) NOT NULL COMMENT '1 => Sun, 2 => Mon, 3 => Tue, 4 => Wed, 5 => Thu, 6 => Fri, 7 => Sat ',
  `type2_duration` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1 => Month , 2 => Three Month, 3 => Four Month, 4 => Six Month, 5 => Year',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL,
  `is_deleted` tinyint(4) NOT NULL COMMENT '0 => Not Deleted, 1 => Deleted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_event`
--
ALTER TABLE `tbl_event`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_event`
--
ALTER TABLE `tbl_event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
