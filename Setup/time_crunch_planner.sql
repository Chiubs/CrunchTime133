-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2020 at 03:53 AM
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

-- --------------------------------------------------------

--
-- Table structure for table `useraccounts`
--

CREATE TABLE `useraccounts` (
  `userID` int(11) NOT NULL,
  `fname` tinytext NOT NULL,
  `lname` tinytext NOT NULL,
  `username` tinytext NOT NULL,
  `pin` int(4) NOT NULL,
  `email` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `useraccounts`
--

INSERT INTO `useraccounts` (`userID`, `fname`, `lname`, `username`, `pin`, `email`) VALUES
(112145, 'Lauren', 'MacPherson', 'LaurenM', 9999, 'lauren@gmail.com'),
(120642, 'Jesse', 'James', 'JJ', 8888, 'jj@gmail.com'),
(122096, 'Zara', 'Packer', 'Coffee1996', 9876, 'PackerCoffee1996@gmail.com'),
(143926, 'Jesse', 'Acevedo', 'AvocadoJ', 1313, 'Avocado1992@gmail.com'),
(164019, 'John', 'Smith', 'JSmith', 1234, 'JSmith@yahoo.com'),
(164758, 'James', 'White', 'JWhite', 1234, 'JWhite@gmail.com'),
(182390, 'Karen', 'Whittier', 'KW1980', 2222, 'Whittier@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD UNIQUE KEY `eventNum` (`eventNum`);

--
-- Indexes for table `useraccounts`
--
ALTER TABLE `useraccounts`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `username` (`username`) USING HASH,
  ADD UNIQUE KEY `email` (`email`) USING HASH;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `eventNum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195156;

--
-- AUTO_INCREMENT for table `useraccounts`
--
ALTER TABLE `useraccounts`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=182391;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
