-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2023 at 05:45 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `college`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `name` varchar(50) NOT NULL,
  `id` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`name`, `id`, `password`) VALUES
('admin', 'admin', 'admin'),
('admin1', 'admin1', 'admin1');

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `studid` varchar(20) NOT NULL,
  `subjects` varchar(30) NOT NULL,
  `marks` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `semestername` varchar(15) NOT NULL,
  `value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`semestername`, `value`) VALUES
('first', 1),
('second', 2),
('third', 3),
('fourth', 4),
('fifth', 5),
('sixth', 6),
('seventh', 7),
('eighth', 8);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `name` varchar(50) NOT NULL,
  `sid` varchar(20) NOT NULL,
  `urn` varchar(20) NOT NULL,
  `registration` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `branch` varchar(10) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `contact` int(10) NOT NULL,
  `other` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`name`, `sid`, `urn`, `registration`, `email`, `branch`, `semester`, `contact`, `other`) VALUES
('sanskar debnath', '2130401060', '216704056', '020728 of 2021-2022', 'sanskardebnath2019@gmail.com', 'cse', 'fourth', 2147483647, ''),
('sanskar debnath', '2130401061', '216704055', '020728 of 2021-2022', 'sanskardebnath2019@gmail.com', 'cse', 'fourth', 2147483647, '');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `serial` int(3) NOT NULL,
  `semester` int(3) NOT NULL,
  `subject` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`serial`, `semester`, `subject`) VALUES
(1, 1, 'mathematics I'),
(2, 1, 'english'),
(3, 2, 'os'),
(4, 2, 'ds'),
(5, 3, 'es'),
(6, 3, 'math3'),
(7, 4, 'j&k'),
(8, 4, 'Hr'),
(9, 5, 'lol'),
(10, 5, 'huski'),
(11, 6, 'update'),
(12, 6, 'delete'),
(13, 7, 'oops'),
(14, 7, 'os'),
(15, 8, 'physics'),
(16, 8, 'chemistry');

-- --------------------------------------------------------

--
-- Table structure for table `temp_table`
--

CREATE TABLE `temp_table` (
  `studentid` varchar(25) NOT NULL,
  `sub1` varchar(50) NOT NULL,
  `sub1marks` float NOT NULL,
  `sub2` varchar(50) NOT NULL,
  `sub2marks` float NOT NULL,
  `sub3` varchar(50) NOT NULL,
  `sub3marks` float NOT NULL,
  `sub4` varchar(50) NOT NULL,
  `sub4marks` float NOT NULL,
  `sub5` varchar(50) NOT NULL,
  `sub5marks` float NOT NULL,
  `sub6` varchar(50) NOT NULL,
  `sub6marks` float NOT NULL,
  `sgpa` float NOT NULL,
  `cgpa` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `temp_table`
--

INSERT INTO `temp_table` (`studentid`, `sub1`, `sub1marks`, `sub2`, `sub2marks`, `sub3`, `sub3marks`, `sub4`, `sub4marks`, `sub5`, `sub5marks`, `sub6`, `sub6marks`, `sgpa`, `cgpa`) VALUES
('2130401060', 'ES 201', 70, 'ES 202', 80, 'ES 203', 90, 'ES 204', 100, 'ES 205', 100, 'ES 206', 100, 9.89, 8.9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`studid`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`sid`,`email`,`urn`);

--
-- Indexes for table `temp_table`
--
ALTER TABLE `temp_table`
  ADD PRIMARY KEY (`studentid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
