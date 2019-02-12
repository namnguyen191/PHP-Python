-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2018 at 11:23 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xyz_travel_agency_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `groupinfo`
--

CREATE TABLE `groupinfo` (
  `groupId` int(4) NOT NULL,
  `groupSize` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `registrationId` int(4) NOT NULL,
  `tourId` int(4) NOT NULL,
  `email` varchar(50) NOT NULL,
  `date` varchar(25) NOT NULL,
  `groupId` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`registrationId`, `tourId`, `email`, `date`, `groupId`) VALUES
(6, 2, 'hoangnamnguyen191@gmail.com', '13/12/2018', NULL),
(7, 7, 'hoangnamnguyen@gmail.com', '13/12/2018', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `userinformation`
--

CREATE TABLE `userinformation` (
  `email` varchar(50) NOT NULL,
  `name` varchar(25) NOT NULL,
  `address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userinformation`
--

INSERT INTO `userinformation` (`email`, `name`, `address`) VALUES
('hoangnamnguyen191@gmail.com', 'Nam Nguyen', '198 Andy Crescent, Vaughan, Ontario, L4H1C6'),
('hoangnamnguyen@gmail.com', 'Nam Nguyen', '198 Andy Crescent, Vaughan, Ontario, L4H1C6');

-- --------------------------------------------------------

--
-- Table structure for table `vacationplan`
--

CREATE TABLE `vacationplan` (
  `tourId` int(4) NOT NULL,
  `tourName` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vacationplan`
--

INSERT INTO `vacationplan` (`tourId`, `tourName`) VALUES
(5, 'Bay of Fundy'),
(1, 'CN Tower'),
(7, 'Gros Morne National Park'),
(2, 'Niagara Falls'),
(4, 'Old Quebec'),
(3, 'Rocky Mountains'),
(6, 'Victoria\'s Inner Harbour');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `groupinfo`
--
ALTER TABLE `groupinfo`
  ADD PRIMARY KEY (`groupId`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`registrationId`),
  ADD KEY `fk_email` (`email`),
  ADD KEY `fk_tourId` (`tourId`),
  ADD KEY `fk_groupId` (`groupId`);

--
-- Indexes for table `userinformation`
--
ALTER TABLE `userinformation`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `vacationplan`
--
ALTER TABLE `vacationplan`
  ADD PRIMARY KEY (`tourId`),
  ADD UNIQUE KEY `tourName` (`tourName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `groupinfo`
--
ALTER TABLE `groupinfo`
  MODIFY `groupId` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `registrationId` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `vacationplan`
--
ALTER TABLE `vacationplan`
  MODIFY `tourId` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `registration`
--
ALTER TABLE `registration`
  ADD CONSTRAINT `fk_email` FOREIGN KEY (`email`) REFERENCES `userinformation` (`email`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_groupId` FOREIGN KEY (`groupId`) REFERENCES `groupinfo` (`groupId`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_tourId` FOREIGN KEY (`tourId`) REFERENCES `vacationplan` (`tourId`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
