-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2021 at 12:36 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tele`
--

-- --------------------------------------------------------

--
-- Table structure for table `master`
--

CREATE TABLE `master` (
  `eno` int(11) NOT NULL,
  `icno` int(11) NOT NULL,
  `name` text NOT NULL,
  `desig` text NOT NULL,
  `cat-1` text NOT NULL,
  `cat-2` text NOT NULL,
  `cat-3` text NOT NULL,
  `section` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master`
--

INSERT INTO `master` (`eno`, `icno`, `name`, `desig`, `cat-1`, `cat-2`, `cat-3`, `section`) VALUES
(1, 2649, 'A Chaiatnya', 'SO/E', '', '', '', 'Inst-P'),
(2, 2500, 'T Mohana Kumar', 'SO/E', '', '', '', 'Inst-P'),
(4, 2500, 'T Mohana Kumar', 'SO/E', '', '', '', 'Inst-P'),
(5, 2500, 'T Mohana Kumar', 'SO/E', '', '', '', 'Inst-P'),
(6, 2500, 'T Mohana Kumar', 'SO/E', '', '', '', 'Inst-P'),
(7, 2500, 'T Mohana Kumar', 'SO/E', '', '', '', 'Inst-P'),
(8, 2500, 'T Mohana Kumar', 'SO/E', '', '', '', 'Inst-P'),
(9, 2500, 'T Mohana Kumar', 'SO/E', '', '', '', 'Inst-P'),
(10, 2500, 'T Mohana Kumar', 'SO/E', '', '', '', 'Inst-P'),
(11, 2649, 'chaitanya', 'SO/E', '', '', '', 'Inst-P'),
(12, 12356, 'test', '2323', '', '', '', 'Inst-P');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `eno` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`eno`, `name`) VALUES
(1, 'Inst-P'),
(2, 'Elec-P');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `master`
--
ALTER TABLE `master`
  ADD PRIMARY KEY (`eno`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`eno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `master`
--
ALTER TABLE `master`
  MODIFY `eno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `eno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
