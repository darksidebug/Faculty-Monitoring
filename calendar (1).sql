-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2020 at 08:51 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `calendar`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `start_event` varchar(100) NOT NULL,
  `end_event` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `start_event`, `end_event`) VALUES
(8, 'First day of OJT in 2nd Semester', '2020-01-06 08:00:00', '2020-01-06 19:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_log`
--

CREATE TABLE `faculty_log` (
  `tblLine_id` int(11) NOT NULL,
  `school_id` varchar(10) NOT NULL,
  `time_in` varchar(20) DEFAULT NULL,
  `time_out` varchar(20) DEFAULT NULL,
  `date_log` varchar(20) NOT NULL,
  `destination` text NOT NULL,
  `log_type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty_log`
--

INSERT INTO `faculty_log` (`tblLine_id`, `school_id`, `time_in`, `time_out`, `date_log`, `destination`, `log_type`) VALUES
(1, '300', NULL, '11:11:28 AM', 'Thu, Jan/15/2020', 'Registrar\'s Office', 'log_out'),
(2, '300', NULL, '11:11:28 AM', 'Thu, Jan/16/2020', 'Registrar\'s Office', 'log_out');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_registration`
--

CREATE TABLE `faculty_registration` (
  `school_id` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `position` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty_registration`
--

INSERT INTO `faculty_registration` (`school_id`, `name`, `gender`, `position`) VALUES
('086', 'Francis Rey Padao', 'Male', 'Director, GIS Tech Center'),
('300', 'Jovel Bermoy', 'Male', 'Clerk');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty_log`
--
ALTER TABLE `faculty_log`
  ADD PRIMARY KEY (`tblLine_id`);

--
-- Indexes for table `faculty_registration`
--
ALTER TABLE `faculty_registration`
  ADD PRIMARY KEY (`school_id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `faculty_log`
--
ALTER TABLE `faculty_log`
  MODIFY `tblLine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
