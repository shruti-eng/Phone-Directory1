-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2021 at 04:48 AM
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
(0, '', '', 'Accounts', 0),
(2340, 'T. Mohana Kumar', 'SO/F', 'I-P', 4451),
(2505, 'S K Gupta', 'SO/D', 'P-P', 4446),
(2649, 'Chaitanya A', 'SO/E', 'I-P', 4549);

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

--
-- Dumping data for table `phone_master`
--

INSERT INTO `phone_master` (`pno`, `parallel_pno`, `callerid_phone`, `wireless_phone`, `zero_dialing`, `jbdetails`, `complaint_flag`, `icno`, `off`, `res`, `emergency`) VALUES
(4446, 1, 0, 0, 0, 'test', 0, 2505, 1, 0, 0),
(4451, 0, 0, 0, 0, 'test2', 0, 2340, 1, 0, 0),
(4549, 0, 0, 0, 0, 'test1', 0, 2649, 1, 0, 0);

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
('E-P', 0),
('E-U', 0),
('Fire', 0),
('HRD', 0),
('I-P', 0),
('I-U', 0),
('LAB', 0),
('M-P', 0),
('M-U', 0),
('Others', 0),
('P-P', 0),
('P-U', 0),
('SE', 0);

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
