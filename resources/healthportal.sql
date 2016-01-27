-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 27, 2016 at 11:28 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `healthportal`
--
CREATE DATABASE IF NOT EXISTS `healthportal` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `healthportal`;

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE IF NOT EXISTS `appointments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `doctor_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `requested_by` varchar(30) NOT NULL,
  `appointment_date` varchar(20) NOT NULL,
  `date_registered` int(10) unsigned NOT NULL,
  `day` int(1) DEFAULT NULL,
  `description` text NOT NULL,
  `time_start` varchar(6) NOT NULL,
  `time_end` varchar(6) NOT NULL,
  `approved` tinyint(1) DEFAULT NULL,
  `user_notified` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `doctor_id`, `user_id`, `requested_by`, `appointment_date`, `date_registered`, `day`, `description`, `time_start`, `time_end`, `approved`, `user_notified`) VALUES
(1, 1, 1, 'Mia Khalifa', '0', 1453722125, 2, 'Doctor I am waiting <3', '01:1', '03:1', NULL, 0),
(2, 1, 1, 'Sanjib', '0', 1453722467, 3, 'Hello', '01:12:', '03:12:', NULL, 0),
(3, 1, 1, '', '0', 1453722774, 3, '', '01:12:', '03:12:', NULL, 0),
(4, 1, 1, '', 'Mon, 25 Jan 16 11:56', 1453722969, 3, '', '01:12:', '03:12:', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE IF NOT EXISTS `doctors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `clinic_name` varchar(50) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `qualification` varchar(50) NOT NULL,
  `rating` int(11) NOT NULL,
  `specialization` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `clinic_name`, `address`, `qualification`, `rating`, `specialization`) VALUES
(1, 'sanjib', 'Sanjib''s Clinic', '28 kilo Dhulikhel', 'MD', 0, 'neurology');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE IF NOT EXISTS `schedule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `doctor_id` int(11) NOT NULL,
  `morning_shift_start` time DEFAULT NULL,
  `morning_shift_end` time DEFAULT NULL,
  `morning_tokens` int(11) DEFAULT NULL,
  `afternoon_shift_start` time DEFAULT NULL,
  `afternoon_shift_end` time DEFAULT NULL,
  `afternoon_tokens` int(11) DEFAULT NULL,
  `evening_shift_start` time DEFAULT NULL,
  `evening_shift_end` time DEFAULT NULL,
  `evening_tokens` int(11) DEFAULT NULL,
  `times_updated` int(3) DEFAULT NULL,
  `day` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `doctor_id` (`doctor_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `doctor_id`, `morning_shift_start`, `morning_shift_end`, `morning_tokens`, `afternoon_shift_start`, `afternoon_shift_end`, `afternoon_tokens`, `evening_shift_start`, `evening_shift_end`, `evening_tokens`, `times_updated`, `day`) VALUES
(1, 1, '10:12:00', '12:12:00', NULL, '01:12:00', '03:12:00', NULL, '07:12:00', '10:12:00', NULL, NULL, 1),
(2, 1, '10:12:00', '12:12:00', NULL, '01:12:00', '03:12:00', NULL, '07:12:00', '10:12:00', NULL, NULL, 2),
(3, 1, '10:12:00', '12:12:00', NULL, '01:12:00', '03:12:00', NULL, '07:12:00', '10:12:00', NULL, NULL, 3),
(4, 1, '10:12:00', '12:12:00', NULL, '01:12:00', '03:12:00', NULL, '07:12:00', '10:12:00', NULL, NULL, 4),
(5, 1, '10:12:00', '12:12:00', NULL, '01:12:00', '03:12:00', NULL, '07:12:00', '10:12:00', NULL, NULL, 5),
(6, 1, '10:12:00', '12:12:00', NULL, '01:12:00', '03:12:00', NULL, '07:12:00', '10:12:00', NULL, NULL, 6),
(7, 1, '10:12:00', '12:12:00', NULL, '01:12:00', '03:12:00', NULL, '07:12:00', '10:12:00', NULL, NULL, 7);

-- --------------------------------------------------------

--
-- Table structure for table `schedule_map`
--

CREATE TABLE IF NOT EXISTS `schedule_map` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `doctor_id` int(11) NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `day` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `doctor_id` (`doctor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `specialization`
--

CREATE TABLE IF NOT EXISTS `specialization` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `address` varchar(500) NOT NULL,
  `contact` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `first_name`, `last_name`, `email`, `address`, `contact`) VALUES
(1, 'dinesh', 'dinesh', 'neupane', 'dinesh@gmail.com', 'Dhulikhel', '9849022387');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
