-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 10, 2013 at 08:44 AM
-- Server version: 5.5.20
-- PHP Version: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jharvard_project1`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('08d88a09fffd95c16748ee893dc8f2d5', '127.0.0.1', 'Mozilla/5.0 (X11; Linux i686) AppleWebKit/535.11 (KHTML, like Gecko) Chrome/17.0.963.56 Safari/535.11', 1356017165, 'a:2:{s:9:"user_data";s:0:"";s:8:"equation";a:3:{i:0;i:5;i:1;s:1:"*";i:2;i:9;}}'),
('50dfc21d1f8c4acaf7b83f65e4cbf7b8', '127.0.0.1', 'Mozilla/5.0 (X11; Linux i686) AppleWebKit/535.11 (KHTML, like Gecko) Chrome/17.0.963.56 Safari/535.11', 1357815149, '');

-- --------------------------------------------------------

--
-- Table structure for table `Classes`
--

CREATE TABLE IF NOT EXISTS `Classes` (
  `class_id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `class_name` varchar(32) NOT NULL,
  PRIMARY KEY (`class_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Classes_Teachers`
--

CREATE TABLE IF NOT EXISTS `Classes_Teachers` (
  `class_teacher_id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `class_id` int(9) NOT NULL,
  `teacher_id` int(9) NOT NULL,
  `class_teacher_access_level` int(1) NOT NULL,
  PRIMARY KEY (`class_teacher_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Schools`
--

CREATE TABLE IF NOT EXISTS `Schools` (
  `school_id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `school_name` varchar(128) NOT NULL,
  `school_city` varchar(255) NOT NULL,
  PRIMARY KEY (`school_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Students`
--

CREATE TABLE IF NOT EXISTS `Students` (
  `student_id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `student_password` char(40) NOT NULL,
  `student_first_name` varchar(128) NOT NULL,
  `student_middle_name` varchar(128) NOT NULL,
  `student_last_name` varchar(128) NOT NULL,
  `student_email` varchar(255) NOT NULL,
  `student_parent_email` varchar(255) NOT NULL,
  `school_id` int(9) unsigned NOT NULL,
  `class_id` int(9) unsigned NOT NULL,
  `student_last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Students_Statistics`
--

CREATE TABLE IF NOT EXISTS `Students_Statistics` (
  `students_statistics_id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `student_id` int(9) NOT NULL,
  `student_statistics_score` int(9) NOT NULL,
  `student_statistics_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`students_statistics_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Teachers`
--

CREATE TABLE IF NOT EXISTS `Teachers` (
  `teacher_id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `teacher_password` char(40) NOT NULL,
  `teacher_first_name` varchar(128) NOT NULL,
  `teacher_middle_name` varchar(128) NOT NULL,
  `teacher_last_name` varchar(128) NOT NULL,
  `teacher_email` varchar(255) NOT NULL,
  `teacher_school_id` int(9) unsigned NOT NULL,
  `teacher_last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`teacher_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
