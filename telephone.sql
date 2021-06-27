-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2021 at 01:16 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `telephone`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `icno` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `section` varchar(50) NOT NULL,
  `pno` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`icno`, `name`, `designation`, `section`, `pno`) VALUES
(2505, 'S K Gupta', 'SO/D', 'M-P', 0),
(2649, 'Chaitanya A', 'SO/E', 'I-P', 0);

-- --------------------------------------------------------

--
-- Table structure for table `phone_master`
--

CREATE TABLE `phone_master` (
  `pno` int(10) NOT NULL,
  `parallel_pno` int(10) NOT NULL,
  `callerid_phone` int(10) NOT NULL,
  `wireless_phone` int(10) NOT NULL,
  `zero_dialing` int(10) NOT NULL,
  `jbdetails` text NOT NULL,
  `complaint_flag` tinyint(1) NOT NULL,
  `icno` int(10) NOT NULL,
  `off` tinyint(1) NOT NULL,
  `res` tinyint(1) NOT NULL,
  `emergency` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `section_master`
--

CREATE TABLE `section_master` (
  `section` varchar(20) NOT NULL,
  `mgricno` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `section_master`
--

INSERT INTO `section_master` (`section`, `mgricno`) VALUES
('Accounts', 0),
('Admin', 0),
('Civil', 0),
('DPS', 0),
('Fire', 0),
('I-P', 0),
('M-P', 0),
('Others', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`icno`);

--
-- Indexes for table `phone_master`
--
ALTER TABLE `phone_master`
  ADD PRIMARY KEY (`pno`);

--
-- Indexes for table `section_master`
--
ALTER TABLE `section_master`
  ADD PRIMARY KEY (`section`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
