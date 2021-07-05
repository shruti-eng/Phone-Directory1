-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2021 at 07:38 AM
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
-- Table structure for table `category_master`
--

CREATE TABLE `category_master` (
  `eno` int(11) NOT NULL,
  `cname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_master`
--

INSERT INTO `category_master` (`eno`, `cname`) VALUES
(1, 'Accounts'),
(2, 'Administration'),
(3, 'AEC School '),
(4, 'Chemical Lab'),
(5, 'Common Places (CL)'),
(6, 'CPP Control Room'),
(7, 'Civil Site'),
(8, 'Common User Numbers at Colony & Site'),
(9, 'DRCC'),
(10, 'EM Cell Colony Civil'),
(11, 'Common Places (EM Cell Civil)'),
(12, 'EM Cell Colony Electrical'),
(13, 'Common Places (EM Cell Electrical)'),
(14, 'Emergency Numbers'),
(15, 'Electrical Process (EP)'),
(16, 'Common Places (EP)'),
(17, 'Electrical Utilities (EU)'),
(18, 'Common Places (EU)'),
(19, 'Fire Services'),
(20, 'HWPM Hospital'),
(21, 'Common Places (HWPM Hospital)'),
(22, 'HRD'),
(23, 'Instrumentation Process (IP)'),
(24, 'Common Places (IP)'),
(25, 'Instrumentation Utilities (IU)'),
(26, 'Common Places (IU)'),
(27, 'Managers and Section Heads'),
(28, 'Mechanical Process (MP)'),
(29, 'Common Places (MP)'),
(30, 'Mechanical Utilities (MU)'),
(31, 'Common Places (MU)'),
(32, 'Occupations Health Centre'),
(33, 'M&OM / IIS Section'),
(34, 'Production Process (PP)'),
(35, 'Common Places (PP)'),
(36, 'Production Utilities (PU)'),
(37, 'Common Places (PU)'),
(38, 'Safety Section'),
(39, 'Common Places (SS)'),
(40, 'Technical Servies'),
(41, 'None'),
(43, 'DPS'),
(44, 'Colony Security'),
(45, 'Ayurvedic and Homeopathy'),
(46, 'Allopathy'),
(47, 'Super Spreciality Hospitals at Hyd'),
(48, 'Heavy Water General Facilities (HWGF)'),
(49, 'NFC HWB Training School ');

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `eno` int(11) NOT NULL,
  `pno` int(20) NOT NULL,
  `details` varchar(200) NOT NULL,
  `active` int(11) NOT NULL,
  `action` text NOT NULL,
  `technician` text NOT NULL,
  `updatedon` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`eno`, `pno`, `details`, `active`, `action`, `technician`, `updatedon`) VALUES
(10, 4451, 'not working', 0, 'done', 'abc', '0000-00-00 00:00:00'),
(11, 4451, 'tewerwe', 1, '', '', '0000-00-00 00:00:00'),
(12, 4451, 'asdfasdfadf', 1, '', '', '0000-00-00 00:00:00'),
(13, 4451, 'test complaint-2', 1, '', '', '2021-07-01 04:41:53'),
(14, 4446, 'not working', 0, '', '', '2021-07-02 13:57:02'),
(15, 4446, 'not working', 1, '', '', '2021-07-02 02:41:39');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `icno` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `section` varchar(50) NOT NULL,
  `pno` int(20) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mobile` varchar(20) NOT NULL,
  `cat1` int(11) NOT NULL,
  `cat2` int(11) NOT NULL,
  `cat3` int(11) NOT NULL,
  `cat4` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`icno`, `name`, `designation`, `section`, `pno`, `email`, `mobile`, `cat1`, `cat2`, `cat3`, `cat4`) VALUES
(2340, 'T. Mohana Kumar', 'SO/F', 'I-P', 4451, 'tmohanakumar@man.hwb.gov.in', '0', 23, 0, 0, 0),
(2505, 'S K Gupta', 'SO/D', 'P-P', 4446, 'skgupta@man.hwb.gov.in', '9014702550', 34, 34, 34, 34),
(2649, 'Chaitanya A', 'SO/E', 'I-P', 4549, 'chaitanya@man.hwb.gov.in', '0', 23, 23, 23, 23),
(4545, 'Occupations Health Centre', '', 'Others', 0, '', '', 14, 32, 41, 0);

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
  `complaint_flag` tinyint(1) NOT NULL DEFAULT 0,
  `icno` int(10) NOT NULL,
  `off` tinyint(1) NOT NULL,
  `res` tinyint(1) NOT NULL,
  `emergency` tinyint(1) NOT NULL,
  `cat1` int(11) NOT NULL,
  `cat2` int(11) NOT NULL,
  `cat3` int(11) NOT NULL,
  `cat4` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `phone_master`
--

INSERT INTO `phone_master` (`pno`, `parallel_pno`, `callerid_phone`, `wireless_phone`, `zero_dialing`, `jbdetails`, `complaint_flag`, `icno`, `off`, `res`, `emergency`, `cat1`, `cat2`, `cat3`, `cat4`) VALUES
(4446, 1, 0, 0, 0, 'test', 1, 2505, 1, 0, 0, 34, 41, 41, 0),
(4451, 0, 0, 0, 0, 'test2', 1, 2340, 1, 0, 0, 23, 41, 41, 0),
(4545, 0, 1, 0, 0, 'ohc test', 0, 0, 0, 0, 0, 14, 32, 41, 0),
(4549, 0, 0, 0, 0, 'test1', 0, 2649, 1, 0, 0, 23, 41, 41, 0);

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
-- Indexes for table `category_master`
--
ALTER TABLE `category_master`
  ADD PRIMARY KEY (`eno`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`eno`);

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

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category_master`
--
ALTER TABLE `category_master`
  MODIFY `eno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `eno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
