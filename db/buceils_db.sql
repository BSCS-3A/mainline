-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2021 at 11:53 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `buceils_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `activity_log_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `activity_description` varchar(150) NOT NULL,
  `activity_date` date DEFAULT NULL,
  `activity_time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `admin_id` int(11) NOT NULL,
  `admin_fname` varchar(30) NOT NULL,
  `admin_mname` varchar(30) NOT NULL,
  `admin_lname` varchar(30) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  `photo` text NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`admin_id`, `admin_fname`, `admin_mname`, `admin_lname`, `username`, `password`, `photo`, `reg_date`) VALUES
(14, 'dfh', 'dfh', 'dfh', 'dfh', 'dfh', '', '2021-03-15 15:12:17'),
(15, 'John Kenneth', 'Estipona', 'Maronilla', 'johnkennethestipona.maronilla@', 'ssedhgrsherh', '', '2021-03-15 15:46:53'),
(16, 'Joshua Alex', 'Insuya', 'Llander', 'joshuaalexinsuya.llander@bicol-u.edu.ph', 'supot ako', '', '2021-03-15 15:54:37'),
(17, 'defh', 'dfh', 'sdgh', 'dfh', 'dfhdfh', '', '2021-03-15 15:58:27'),
(18, 'defh', 'dfh', 'sdgh', 'dfh', '', '', '2021-03-15 15:58:51'),
(19, 'dfjh', 'fdgj', 'drfgtj', 'fxgj', 'xfdxdgfj', '', '2021-03-15 16:54:28'),
(20, 'dfh', 'dfzh', 'RWSH', 'DFH', '', '', '2021-03-16 08:16:54'),
(21, 'fdh', 'dfh', 'edrh', 'xdfghj', 'xdfgh', '', '2021-03-17 10:02:46'),
(22, 'dfn', 'dznf', 'dzdzng', 'dzf', 'zdfn', '', '2021-03-17 10:09:14'),
(23, 'SDZFHB', 'ZDSFH', 'TRYYRTUHRTY', 'ZFSDH', 'ZSDFH', '', '2021-03-17 10:15:22'),
(24, 'SDGB', 'SDGB', 'ULITTTT', 'SDG', 'SDG', '', '2021-03-17 10:45:30'),
(25, 'sdf', 'sdg', 'ert', 'sdg', 'sdg', '', '2021-03-17 10:55:27'),
(26, 'sdszfh', 'dfh', 'TRYWITHIMAGE', 'dxfgh', 'dxfh', '', '2021-03-17 15:14:58'),
(27, 'DFGH', 'DFH', 'TRYY999', 'DFXGH', 'XDFGH', '', '2021-03-17 15:30:02'),
(28, 'DH', 'DXH', 'SDHDE', 'DFXGH', 'XDFGH', '', '2021-03-17 15:30:24'),
(29, 'dzfsh', 'fdgh', 'sdegedhg', 'fgxh', 'fxgh', '', '2021-03-17 15:32:32'),
(30, 'SDG', 'DZFG', 'LOLOL', 'DFDFHB', 'DFDFHB', '', '2021-03-17 15:33:59'),
(41, '', '', 'tryulit', '', '', 'IMG-60522e8d7d7292.90397666.jpg', '2021-03-17 16:30:05'),
(42, 'dfh', 'dfzh', 'Maronilla', 'johnkennethestipona.maronilla@bicol-u.edu.ph', '123', 'IMG-605241037ad7e4.15464157.png', '2021-03-17 17:48:51'),
(43, '', '', '', 'johnkennethestipona.maronilla@bicol-u.edu.ph', '', 'IMG-605245ee0b5a63.45802406.png', '2021-03-17 18:09:50'),
(44, 'dfh', 'dfh', 'Maronilla', 'johnkennethestipona.maronilla@bicol-u.edu.ph', '123', 'IMG-605246c5112f42.91301498.png', '2021-03-17 18:13:25'),
(46, '', '', '', 'johnkennethestipona.maronilla@bicol-u.edu.ph', '', 'IMG-60524a3e84c1f5.52013729.png', '2021-03-17 18:28:14'),
(47, 'dfh', 'sdg', 'Maronilla', 'johnkennethestipona.maronilla@bicol-u.edu.ph', '234', 'IMG-60524bba372dc6.14480588.png', '2021-03-17 18:34:34'),
(48, 'dszfh', 'dxh', 'sdgh', 'johnkennethestipona.maronilla@bicol-u.edu.ph', '123', 'IMG-60524cf4a05be8.97125393.jpg', '2021-03-17 18:39:48'),
(49, 'sdg', 'sdg', 'Maronilla', 'johnkennethestipona.maronilla@bicol-u.edu.ph', '123', 'IMG-60525329468c26.37534523.png', '2021-03-17 19:06:17'),
(50, 'dfghj', 'fdxg', 'AAAA', 'johnkennethestipona.maronilla@bicol-u.edu.ph', 'qwe', 'IMG-605254f52d2587.33735659.png', '2021-03-17 19:13:57'),
(51, 'dfh', 'dzsf', 'dsfrh', 'johnkennethestipona.maronilla@bicol-u.edu.ph', '123', 'IMG-605256f66bb6e5.43942663.jpg', '2021-03-17 19:22:30'),
(52, 'dzf', 'sdf', 'Maronilla', 'johnkennethestipona.maronilla@bicol-u.edu.ph', 'qwer', 'IMG-6052579f583756.69368021.jpg', '2021-03-17 19:25:19');

-- --------------------------------------------------------

--
-- Table structure for table `archive`
--

CREATE TABLE `archive` (
  `archive_id` int(11) NOT NULL,
  `position_id` int(11) NOT NULL,
  `winners_name` varchar(30) NOT NULL,
  `school_year` datetime NOT NULL,
  `platform_info` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

CREATE TABLE `candidate` (
  `candidate_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `position_id` int(11) NOT NULL,
  `total_votes` int(11) NOT NULL,
  `party_name` varchar(30) NOT NULL,
  `platform_info` varchar(100) NOT NULL,
  `photo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `candidate_position`
--

CREATE TABLE `candidate_position` (
  `position_id` int(11) NOT NULL,
  `heirarchy_id` int(30) NOT NULL,
  `position_name` varchar(30) NOT NULL,
  `position_description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `candidate_position`
--

INSERT INTO `candidate_position` (`position_id`, `heirarchy_id`, `position_name`, `position_description`) VALUES
(1, 1, 'President', 'duterte '),
(2, 2, 'Vice President', 'awitsayo ');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `Mname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `bumail` varchar(100) NOT NULL,
  `grade_level` int(11) NOT NULL,
  `otp` varchar(6) NOT NULL,
  `voting_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `fname`, `Mname`, `lname`, `gender`, `bumail`, `grade_level`, `otp`, `voting_status`) VALUES
(111, 'Den', '', 'Taclas', '', 'taclaskathrindenise@gmail.com', 0, '', 0),
(100317, 'John Kenneth', 'Estipona', 'Maronilla', 'Male', 'johnkennethestipona.maronilla@bicol-u.edu.ph', 11, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vote`
--

CREATE TABLE `vote` (
  `vote_log_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `candidate_id` int(11) NOT NULL,
  `status` varchar(30) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vote_event`
--

CREATE TABLE `vote_event` (
  `vote_event_id` int(11) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `vote_duration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`activity_log_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `archive`
--
ALTER TABLE `archive`
  ADD PRIMARY KEY (`archive_id`),
  ADD KEY `position_id` (`position_id`);

--
-- Indexes for table `candidate`
--
ALTER TABLE `candidate`
  ADD PRIMARY KEY (`candidate_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `position_id` (`position_id`);

--
-- Indexes for table `candidate_position`
--
ALTER TABLE `candidate_position`
  ADD PRIMARY KEY (`position_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `vote`
--
ALTER TABLE `vote`
  ADD PRIMARY KEY (`vote_log_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `candidate_id` (`candidate_id`);

--
-- Indexes for table `vote_event`
--
ALTER TABLE `vote_event`
  ADD PRIMARY KEY (`vote_event_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `activity_log_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `archive`
--
ALTER TABLE `archive`
  MODIFY `archive_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `candidate`
--
ALTER TABLE `candidate`
  MODIFY `candidate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `candidate_position`
--
ALTER TABLE `candidate_position`
  MODIFY `position_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123456128;

--
-- AUTO_INCREMENT for table `vote`
--
ALTER TABLE `vote`
  MODIFY `vote_log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vote_event`
--
ALTER TABLE `vote_event`
  MODIFY `vote_event_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD CONSTRAINT `activity_log_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin_table` (`admin_id`);

--
-- Constraints for table `archive`
--
ALTER TABLE `archive`
  ADD CONSTRAINT `archive_ibfk_1` FOREIGN KEY (`position_id`) REFERENCES `candidate_position` (`position_id`);

--
-- Constraints for table `candidate`
--
ALTER TABLE `candidate`
  ADD CONSTRAINT `candidate_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`),
  ADD CONSTRAINT `candidate_ibfk_2` FOREIGN KEY (`position_id`) REFERENCES `candidate_position` (`position_id`);

--
-- Constraints for table `vote`
--
ALTER TABLE `vote`
  ADD CONSTRAINT `vote_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`),
  ADD CONSTRAINT `vote_ibfk_2` FOREIGN KEY (`candidate_id`) REFERENCES `candidate` (`candidate_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
