-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 31, 2016 at 11:51 PM
-- Server version: 5.5.49-0ubuntu0.14.04.1
-- PHP Version: 5.5.34-1+deb.sury.org~trusty+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `abaokbah`
--

-- --------------------------------------------------------

--
-- Table structure for table `CHOCO`
--

CREATE TABLE IF NOT EXISTS `CHOCO` (
  `p_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Maker` varchar(255) NOT NULL,
  `Kind` varchar(255) NOT NULL,
  `Price` int(11) DEFAULT NULL,
  PRIMARY KEY (`p_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

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
(30, 'Lindor', 'Truffles', 4),
(31, 'Ben n Jerrys', 'Choclate Fudge Brownie', 99),
(33, 'Ben n Jerrys', 'cinnamon swirl', 6),
(34, 'Ben n Jerrys', 'cinnamon swirl', 6),
(35, 'blah', 'dude', 0);

-- --------------------------------------------------------

--
-- Table structure for table `fp_blog`
--

CREATE TABLE IF NOT EXISTS `fp_blog` (
  `blog_id` int(11) NOT NULL AUTO_INCREMENT,
  `blog` text NOT NULL,
  `OrderDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `blog_title` varchar(50) NOT NULL,
  `memname` varchar(50) NOT NULL,
  PRIMARY KEY (`blog_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=67 ;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `mem_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(12) DEFAULT NULL,
  `fname` varchar(25) DEFAULT NULL,
  `lname` varchar(25) DEFAULT NULL,
  `gender` varchar(7) DEFAULT NULL,
  `fav_hero1` varchar(20) DEFAULT NULL,
  `fav_hero2` varchar(20) DEFAULT NULL,
  `fav_hero3` varchar(20) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `battleground` varchar(30) DEFAULT NULL,
  `rank` int(11) NOT NULL DEFAULT '0',
  `badge` varchar(7) DEFAULT '*',
  PRIMARY KEY (`mem_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`mem_id`, `username`, `password`, `fname`, `lname`, `gender`, `fav_hero1`, `fav_hero2`, `fav_hero3`, `role`, `battleground`, `rank`, `badge`) VALUES
(1, 'abaokbah', 'Akillian123', 'ali', 'baok', 'Male', 'Artanis', 'Tassadar', 'Zeratul', 'Warrior', 'Cursed Hollow', 3, '*'),
(4, 'mans', 'mans', 'mans', 'mala', 'Male', 'Illidan', 'Thrall', 'Jaina', 'Assassin', 'TowersofDoom', 6, '**'),
(5, 'Ani', '311ali', 'Steffi', 'S', 'Female', 'Abathur', 'Zagara', 'Brightwing', 'Specialist', 'InfernalShrines', 4, '*');

-- --------------------------------------------------------

--
-- Table structure for table `mempics`
--

CREATE TABLE IF NOT EXISTS `mempics` (
  `PID` int(11) NOT NULL AUTO_INCREMENT,
  `membername` varchar(25) DEFAULT NULL,
  `picname` varchar(512) DEFAULT NULL,
  `caption` varchar(50) DEFAULT NULL,
  `OrderDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `rank` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`PID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `mempics`
--

INSERT INTO `mempics` (`PID`, `membername`, `picname`, `caption`, `OrderDate`, `rank`) VALUES
(17, 'abaokbah', 'Ccbt3nCUYAAKs49.jpg_large.jpg', '', '2016-06-01 05:31:10', 0),
(19, 'abaokbah', 'ScreenShot2016-05-21at1.15.15AM.png', '', '2016-06-01 05:40:54', 0),
(20, 'abaokbah', 'ScreenShot2015-11-07at2.27.45AM.png', '', '2016-06-01 05:41:27', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
