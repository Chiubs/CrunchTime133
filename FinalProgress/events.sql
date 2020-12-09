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
-- Indexes for table `accounts`
--
ALTER TABLE `events`
  ADD UNIQUE KEY `eventNum` (`eventNum`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `events`
  MODIFY `eventNum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195096;
COMMIT;
