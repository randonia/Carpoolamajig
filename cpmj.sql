-- phpMyAdmin SQL Dump
-- version 3.3.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 05, 2011 at 03:45 AM
-- Server version: 5.1.54
-- PHP Version: 5.3.5-1ubuntu7.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cpmj`
--

-- --------------------------------------------------------

--
-- Table structure for table `bios`
--

CREATE TABLE IF NOT EXISTS `bios` (
  `id` int(11) NOT NULL,
  `bio` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bios`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `uuid` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(16) NOT NULL,
  `title` varchar(50) NOT NULL,
  `startAddr` varchar(100) NOT NULL,
  `endAddr` varchar(100) NOT NULL,
  `info` text NOT NULL,
  `permissionedPeople` varchar(90) NOT NULL,
  KEY `uuid` (`uuid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `events`
--

-- --------------------------------------------------------

--
-- Table structure for table `poolerBios`
--

CREATE TABLE IF NOT EXISTS `poolerBios` (
  `id` int(11) NOT NULL,
  `score` int(3) DEFAULT '0',
  `carMake` varchar(15) NOT NULL,
  `carSeats` int(2) NOT NULL,
  `carGasComp` int(3) NOT NULL,
  `carAmenities` text NOT NULL,
  `numRides` int(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `poolerBios`
--

-- --------------------------------------------------------

--
-- Table structure for table `riderBios`
--

CREATE TABLE IF NOT EXISTS `riderBios` (
  `id` int(11) NOT NULL,
  `score` int(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `riderBios`
--


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `email` varchar(89) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

