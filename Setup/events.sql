-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2020 at 03:54 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `time_crunch_planner`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `date` datetime NOT NULL,
  `end` datetime NOT NULL,
  `userID` int(11) NOT NULL,
  `eventNum` int(11) NOT NULL,
  `eventName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`date`, `end`, `userID`, `eventNum`, `eventName`) VALUES
('2020-12-16 00:00:00', '2020-12-16 00:00:00', 171524, 195138, 'New event'),
('2020-12-08 12:00:00', '2020-12-08 14:00:00', 164019, 195151, 'Lunch Date'),
('2020-12-08 00:00:00', '2020-12-09 00:00:00', 112145, 195153, 'New Event'),
('2020-12-11 09:00:00', '2020-12-11 09:50:00', 112145, 195155, 'Short event');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD UNIQUE KEY `eventNum` (`eventNum`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `eventNum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195156;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
