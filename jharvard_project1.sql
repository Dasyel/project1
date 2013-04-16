-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 30, 2013 at 03:26 AM
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
('87282aa698339aede22dcbbb04a02131', '127.0.0.1', 'Mozilla/5.0 (X11; Linux i686) AppleWebKit/535.11 (KHTML, like Gecko) Chrome/17.0.963.56 Safari/535.11', 1358772620, 'a:2:{s:9:"user_data";s:0:"";s:3:"tid";s:1:"1";}');

-- --------------------------------------------------------

--
-- Table structure for table `Classes`
--

CREATE TABLE IF NOT EXISTS `Classes` (
  `class_id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `class_name` varchar(32) NOT NULL,
  PRIMARY KEY (`class_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `Classes`
--

INSERT INTO `Classes` (`class_id`, `class_name`) VALUES
(8, 'test 2');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `Classes_Teachers`
--

INSERT INTO `Classes_Teachers` (`class_teacher_id`, `class_id`, `teacher_id`, `class_teacher_access_level`) VALUES
(7, 8, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `Schools`
--

CREATE TABLE IF NOT EXISTS `Schools` (
  `school_id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `school_name` varchar(128) NOT NULL,
  `school_city` varchar(255) NOT NULL,
  PRIMARY KEY (`school_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `Schools`
--

INSERT INTO `Schools` (`school_id`, `school_name`, `school_city`) VALUES
(1, 'Harvard', 'Cambridge');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `Students`
--

INSERT INTO `Students` (`student_id`, `student_password`, `student_first_name`, `student_middle_name`, `student_last_name`, `student_email`, `student_parent_email`, `school_id`, `class_id`, `student_last_login`) VALUES
(1, '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Sjaak', 'de', 'Student', 'Sjaak@Student.nl', 'OudersvanSjaak@Student.nl', 1, 1, '2013-01-16 08:42:49');

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
  `school_id` int(9) unsigned NOT NULL,
  `teacher_last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`teacher_id`),
  UNIQUE KEY `teacher_email` (`teacher_email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `Teachers`
--

INSERT INTO `Teachers` (`teacher_id`, `teacher_password`, `teacher_first_name`, `teacher_middle_name`, `teacher_last_name`, `teacher_email`, `school_id`, `teacher_last_login`) VALUES
(1, 'ad5333beb0b6fda50a0eac3528495b97fc4b9902', 'j', '', 'harvard', 'jharvard@crimson.com', 1, '2013-01-16 10:06:38');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
