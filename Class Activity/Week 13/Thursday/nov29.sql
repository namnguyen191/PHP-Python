-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2018 at 09:22 PM
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
-- Database: `nov29`
--

-- --------------------------------------------------------

--
-- Table structure for table `phonebook`
--

CREATE TABLE `phonebook` (
  `ContactNo` varchar(50) NOT NULL,
  `ContactName` varchar(50) NOT NULL,
  `ContactAddress` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `phonebook`
--

INSERT INTO `phonebook` (`ContactNo`, `ContactName`, `ContactAddress`) VALUES
('465-545-8956', 'John Doe', '231 Hw 27, Vaughan'),
('465-545-8956', 'John Doe', '231 Hw 27, Vaughan'),
('878-215-5485', 'Jane Smith', '254 Queensway, Toronto'),
('587-455-5488', 'Nam Nguyen', '198 Andy Cres, Vaughan'),
('256-123-7856', 'Bob Will', '1 Wall Street, NY'),
('465-545-8956', 'John Doe', '231 Hw 27, Vaughan'),
('878-215-5485', 'Jane Smith', '254 Queensway, Toronto'),
('587-455-5488', 'Nam Nguyen', '198 Andy Cres, Vaughan'),
('256-123-7856', 'Bob Will', '1 Wall Street, NY'),
('654546654', 'Nam Nguyen', '38912 dasjdh'),
('465-545-8956', 'John Doe', '231 Hw 27, Vaughan'),
('465-545-8956', 'John Doe', '231 Hw 27, Vaughan'),
('878-215-5485', 'Jane Smith', '254 Queensway, Toronto'),
('587-455-5488', 'Nam Nguyen', '198 Andy Cres, Vaughan'),
('256-123-7856', 'Bob Will', '1 Wall Street, NY');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
