-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 20, 2016 at 11:05 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `abaokbah`
--

-- --------------------------------------------------------

--
-- Table structure for table `CHOCO`
--

CREATE TABLE `CHOCO` (
  `p_Id` int(11) NOT NULL,
  `Maker` varchar(255) NOT NULL,
  `Kind` varchar(255) NOT NULL,
  `Price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `CHOCO`
--

INSERT INTO `CHOCO` (`p_Id`, `Maker`, `Kind`, `Price`) VALUES
(18, 'Galaxy', 'Bubbles', 3),
(19, 'Galaxy', 'Bubbles', 3),
(20, 'Galaxy', 'Ripple', 2),
(21, 'Galaxy', 'Ripple', 2),
(22, 'Kinder', 'Bueno', 1),
(23, 'Kinder', 'Bueno', 1),
(24, 'Kinder', 'Bueno', 1),
(25, 'Kinder', 'Bueno', 1),
(26, 'Kinder', 'Country', 3),
(27, 'Kinder', 'Country', 3),
(28, 'Kinder', 'Country', 3),
(29, 'Kinder', 'Country', 3),
(30, 'Galaxy', 'Bubbles', 3),
(32, 'k', 'security', 1),
(33, 'Kinder', 'Bueno', 8);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `mem_id` int(11) NOT NULL,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(12) DEFAULT NULL,
  `fname` varchar(25) DEFAULT NULL,
  `lname` varchar(25) DEFAULT NULL,
  `gender` varchar(7) DEFAULT NULL,
  `fav_hero1` varchar(20) NOT NULL,
  `fav_hero2` varchar(20) NOT NULL,
  `fav_hero3` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`mem_id`, `username`, `password`, `fname`, `lname`, `gender`, `fav_hero1`, `fav_hero2`, `fav_hero3`) VALUES
(1, 'abaokbah', 'Akillian123', 'ali', 'baok', 'Male', 'Rexxar', 'Tassadar', ''),
(2, 'asdf', 'akillian123', 'hil', 'hal', 'Male', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `mempics`
--

CREATE TABLE `mempics` (
  `PID` int(11) NOT NULL,
  `membername` varchar(25) DEFAULT NULL,
  `picname` varchar(512) DEFAULT NULL,
  `caption` varchar(50) DEFAULT NULL,
  `OrderDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mempics`
--

INSERT INTO `mempics` (`PID`, `membername`, `picname`, `caption`, `OrderDate`) VALUES
(3, 'abaokbah', 'Ccbt3nCUYAAKs49.jpg_large.jpg', '', '2016-05-20 06:05:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `CHOCO`
--
ALTER TABLE `CHOCO`
  ADD PRIMARY KEY (`p_Id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`mem_id`);

--
-- Indexes for table `mempics`
--
ALTER TABLE `mempics`
  ADD PRIMARY KEY (`PID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `CHOCO`
--
ALTER TABLE `CHOCO`
  MODIFY `p_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `mem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `mempics`
--
ALTER TABLE `mempics`
  MODIFY `PID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
