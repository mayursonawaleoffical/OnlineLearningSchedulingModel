-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 15, 2020 at 12:31 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ideamagix`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `timestamp` timestamp NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `timestamp`) VALUES
(1, 'admin', 'admin', '2020-08-11 22:50:29'),
(3, 'mayur', 'mayur', '2020-08-11 22:42:17');

-- --------------------------------------------------------

--
-- Table structure for table `assign`
--

DROP TABLE IF EXISTS `assign`;
CREATE TABLE IF NOT EXISTS `assign` (
  `assign_id` int(11) NOT NULL AUTO_INCREMENT,
  `inst_id` int(11) NOT NULL,
  `course_code` varchar(20) NOT NULL,
  `course_name` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `time_slot` varchar(20) NOT NULL,
  `time_stamp` timestamp NOT NULL,
  PRIMARY KEY (`assign_id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assign`
--

INSERT INTO `assign` (`assign_id`, `inst_id`, `course_code`, `course_name`, `date`, `time_slot`, `time_stamp`) VALUES
(1, 3, 'CO101', 'JAVA easy', '2020-08-22', '2', '2020-08-14 23:59:35'),
(2, 1, 'CO104', 'C++ hard', '2020-08-15', '1', '2020-08-15 00:00:35'),
(3, 1, 'CO104', 'C++ hard', '2020-08-16', '2', '2020-08-15 00:00:35'),
(4, 1, 'CO104', 'C++ hard', '2020-08-17', '3', '2020-08-15 00:00:35'),
(5, 1, 'CO104', 'C++ hard', '2020-08-18', '4', '2020-08-15 00:00:35'),
(6, 1, 'CO104', 'C++ hard', '2020-08-19', '5', '2020-08-15 00:00:35'),
(7, 1, 'CO102', 'JAVA easy', '2020-08-15', '1', '2020-08-15 00:01:28'),
(8, 1, 'CO103', 'java mediocre', '2020-08-16', '2', '2020-08-15 00:02:44'),
(9, 1, 'CO106', 'HTML easy', '2020-08-15', '1', '2020-08-15 00:08:12'),
(10, 1, 'CO105', 'C easy', '2020-08-15', '1', '2020-08-15 00:09:56'),
(11, 1, 'CO105', 'C easy', '2020-08-15', '', '2020-08-15 01:17:57'),
(12, 1, 'CO105', 'C easy', '2020-08-15', '', '2020-08-15 01:21:46'),
(13, 1, 'CO105', 'C easy', '2020-08-15', '1', '2020-08-15 01:24:13'),
(14, 2, 'CO104', 'C++ hard', '2020-08-27', '6', '2020-08-15 01:31:55'),
(15, 2, 'CO104', 'C++ hard', '2020-08-20', '4', '2020-08-15 01:31:55'),
(16, 2, 'CO104', 'C++ hard', '2020-08-27', '10', '2020-08-15 01:31:55'),
(17, 3, 'CO104', 'C++ hard', '2020-08-28', '5', '2020-08-15 01:32:58'),
(18, 3, 'CO104', 'C++ hard', '2020-08-28', '10', '2020-08-15 01:32:58'),
(19, 2, 'CO108', 'PHP easy', '2020-08-15', '10', '2020-08-15 01:33:37'),
(20, 2, 'CO108', 'PHP easy', '2020-08-15', '10', '2020-08-15 01:33:37'),
(21, 2, 'CO103', 'java mediocre', '2020-08-26', '3.00 PM - 4.00 PM', '2020-08-15 01:49:11'),
(22, 2, 'CO103', 'java mediocre', '2020-08-27', '4.00 PM - 5.00 PM', '2020-08-15 01:49:11'),
(23, 2, 'CO103', 'java mediocre', '2020-08-15', '1.00 PM - 2.00 PM', '2020-08-15 01:49:11'),
(24, 3, 'CO105', 'C easy', '2020-08-27', '8.00 AM - 9.00 AM', '2020-08-15 06:40:08'),
(25, 3, 'CO105', 'C easy', '2020-08-28', '9.00 AM - 10.00 AM', '2020-08-15 06:40:08'),
(26, 3, 'CO105', 'C easy', '2020-08-29', '10.00 AM - 11.00 AM', '2020-08-15 06:40:08'),
(27, 3, 'CO105', 'C easy', '2020-08-27', '8.00 AM - 9.00 AM', '2020-08-15 06:42:29'),
(28, 3, 'CO105', 'C easy', '2020-08-28', '9.00 AM - 10.00 AM', '2020-08-15 06:42:29'),
(29, 3, 'CO105', 'C easy', '2020-08-29', '10.00 AM - 11.00 AM', '2020-08-15 06:42:29'),
(30, 3, 'CO105', 'C easy', '2020-08-27', '8.00 AM - 9.00 AM', '2020-08-15 06:44:04'),
(31, 3, 'CO105', 'C easy', '2020-08-28', '9.00 AM - 10.00 AM', '2020-08-15 06:44:04'),
(32, 3, 'CO105', 'C easy', '2020-08-29', '10.00 AM - 11.00 AM', '2020-08-15 06:44:04'),
(33, 3, 'CO105', 'C easy', '2020-08-28', '9.00 AM - 10.00 AM', '2020-08-15 06:54:09'),
(34, 3, 'CO101', 'JAVA easy', '2020-08-28', '9.00 AM - 10.00 AM', '2020-08-15 07:05:17'),
(35, 2, 'CO104', 'C++ hard', '2020-08-28', '9.00 AM - 10.00 AM', '2020-08-15 07:06:07');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
CREATE TABLE IF NOT EXISTS `courses` (
  `course_code` varchar(10) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `course_level` varchar(20) NOT NULL,
  `course_desc` varchar(255) NOT NULL,
  `course_image` varchar(50) NOT NULL,
  `time_stamp` timestamp NOT NULL,
  PRIMARY KEY (`course_code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_code`, `course_name`, `course_level`, `course_desc`, `course_image`, `time_stamp`) VALUES
('CO101', 'JAVA', 'easy', 'easy java', '_DSC5708.jpg', '2020-08-13 19:58:50'),
('CO102', 'JAVA', 'easy', 'java', 'uploads/course/_DSC6937.JPG', '2020-08-13 20:08:51'),
('CO103', 'java', 'mediocre', 'java java', '_DSC5783.jpg', '2020-08-13 20:11:00'),
('CO104', 'C++', 'hard', 'C++ aj tak thikk se nahi padha', '_DSC6937.JPG', '2020-08-13 20:13:54'),
('CO105', 'C', 'easy', 'C++ aur c mai bohot jyada difference hai', '_DSC6937.jpg', '2020-08-13 20:16:43'),
('CO106', 'HTML', 'easy', 'HTML is not a programing language', '_DSC5772.jpg', '2020-08-13 20:17:42'),
('CO107', 'HTML', 'easy', 'LAst time', 'uploads/course/CO_5f35a3f610ecd.jpg', '2020-08-13 20:35:02'),
('CO108', 'PHP', 'easy', 'ye sub sambhalega', 'CO_5f35a4e75925e.jpg', '2020-08-13 20:39:03'),
('CO109', 'PHP', 'mediocre', 'asdasdasd', 'CO_5f35a5cc203d5.jpg', '2020-08-13 20:42:52'),
('CO110', 'javascript', 'easy', 'nala', 'CO_5f35a62531a0b.jpeg', '2020-08-13 20:44:21');

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

DROP TABLE IF EXISTS `instructor`;
CREATE TABLE IF NOT EXISTS `instructor` (
  `inst_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `BOD` date NOT NULL,
  `mobile` int(10) NOT NULL,
  `inst_address` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `inst_password` varchar(20) NOT NULL,
  `time_stamp` timestamp NOT NULL,
  PRIMARY KEY (`inst_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instructor`
--

INSERT INTO `instructor` (`inst_id`, `first_name`, `last_name`, `gender`, `BOD`, `mobile`, `inst_address`, `email`, `inst_password`, `time_stamp`) VALUES
(1, 'harsh', 'thosar', 'Male', '2022-04-05', 1029384756, 'SARSWATI CHS, B-30, ROOM NO - 16 , SECTOR - 10 , SANPADA, NAVI MUMBAI-400705', 'mayursonawale921@gmail.com', 'mklm', '2020-08-13 17:39:09'),
(2, 'manali', 'shinde', 'Female', '1997-12-25', 1593571593, 'SARSWATI CHS, B-30, ROOM NO - 16 , SECTOR - 10 , SANPADA, NAVI MUMBAI-400705', 'mshinde@gmail.com', 'shinde', '2020-08-13 17:42:40'),
(3, 'ganesh', 'sonawle', 'Male', '2016-10-29', 1478523690, 'SARSWATI CHS, B-30, ROOM NO - 16 , SECTOR - 10 , SANPADA, NAVI MUMBAI-400705', 'ganesh@gmail.com', 'gane', '2020-08-13 18:11:13');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `stud_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `BOD` date NOT NULL,
  `mobile` int(11) NOT NULL,
  `stud_address` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `stud_password` varchar(30) NOT NULL,
  `time_stamp` timestamp NOT NULL,
  PRIMARY KEY (`stud_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stud_id`, `first_name`, `last_name`, `gender`, `BOD`, `mobile`, `stud_address`, `email`, `stud_password`, `time_stamp`) VALUES
(1, 'jhjkh', 'kjhjh', 'Male', '2019-11-30', 1234567890, 'SARSWATI CHS, B-30, ROOM NO - 16 , SECTOR - 10 , SANPADA, NAVI MUMBAI-400705', 'mayursonawale921@gmail.com', 'mayur', '2020-08-13 10:35:39'),
(3, 'payal', 'sjinde', 'Female', '2020-07-02', 1256348970, 'SARSWATI CHS, B-30, ROOM NO - 16 , SECTOR - 10 , SANPADA, NAVI MUMBAI-400705', 'payalshinde@gmail.com', 'paya', '2020-08-13 18:01:36'),
(4, 'ganesh', 'sonawale', 'Male', '2019-10-30', 1523648970, 'SARSWATI CHS, B-30, ROOM NO - 16 , SECTOR - 10 , SANPADA, NAVI MUMBAI-400705', 'ganehs@gmail.com', 'gane', '2020-08-13 18:10:35');

-- --------------------------------------------------------

--
-- Table structure for table `timeslot`
--

DROP TABLE IF EXISTS `timeslot`;
CREATE TABLE IF NOT EXISTS `timeslot` (
  `time_slot_id` int(11) NOT NULL AUTO_INCREMENT,
  `slots` varchar(30) NOT NULL,
  PRIMARY KEY (`time_slot_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timeslot`
--

INSERT INTO `timeslot` (`time_slot_id`, `slots`) VALUES
(1, '7.00 AM - 8.00 AM'),
(2, '8.00 AM - 9.00 AM'),
(3, '9.00 AM - 10.00 AM'),
(4, '10.00 AM - 11.00 AM'),
(5, '11.00 AM - 12.00 PM'),
(6, '12.00 PM - 1.00 PM'),
(7, '1.00 PM - 2.00 PM'),
(8, '2.00 PM - 3.00 PM'),
(9, '3.00 PM - 4.00 PM'),
(10, '4.00 PM - 5.00 PM');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
