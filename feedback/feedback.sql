-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 02, 2012 at 07:38 PM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `feedback`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedpract`
--

CREATE TABLE IF NOT EXISTS `feedpract` (
  `planned_lab` int(5) NOT NULL,
  `uniform_coverage` int(5) NOT NULL,
  `checking_journals` int(5) NOT NULL,
  `preparations` int(5) NOT NULL,
  `planning` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedpract`
--

INSERT INTO `feedpract` (`planned_lab`, `uniform_coverage`, `checking_journals`, `preparations`, `planning`) VALUES
(4, 3, 2, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `feedtheory`
--

CREATE TABLE IF NOT EXISTS `feedtheory` (
  `planning_lessons` int(5) NOT NULL,
  `effective_communication` int(5) NOT NULL,
  `management_lecture` int(5) NOT NULL,
  `involvement_student` int(5) NOT NULL,
  `use_of_media` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedtheory`
--

INSERT INTO `feedtheory` (`planning_lessons`, `effective_communication`, `management_lecture`, `involvement_student`, `use_of_media`) VALUES
(4, 3, 4, 3, 4);
