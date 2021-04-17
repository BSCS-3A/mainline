-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 02, 2021 at 05:06 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id16218880_buceils`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_fname` varchar(30) NOT NULL,
  `admin_mname` varchar(30) NOT NULL,
  `admin_lname` varchar(30) NOT NULL,
  `admin_position` varchar(30) NOT NULL,
  `comelec_position` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `photo` varchar(30) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_fname`, `admin_mname`, `admin_lname`, `admin_position`, `comelec_position`, `username`, `password`, `photo`, `reg_date`) VALUES
(1, 'John', 'UCANTSEEME', 'Cena', 'admin', 'admin', 'admin', 'admin', 'user.png', '2021-03-31 16:33:20'),
(2, 'Tomas', 'Mutia', 'Sace', 'adviser', 'adviser', 'taclaskathrindenise@gmail.com', '6QLfkFgK', '', '2021-03-31 16:31:31'),
(3, 'Ariel', 'Bilal', 'Ongpauco', 'Admin', 'chairperson', 'stebo1034@gmail.com', 'CHN8jQWs', '', '2021-03-31 16:31:47'),
(4, 'Isaak', 'Pildilapil', 'Alba', 'Admin', 'secretary', 'makenilla28@gmail.com', 'CX8sCKtx', '', '2021-03-31 16:32:02'),
(5, 'Braedon', 'Lozo', 'Sibug', 'Admin', 'admin', 'eef4de@gmail.com', '8hcTDAjU', '', '2021-03-31 16:32:49'),
(6, 'Julien', 'Cader', 'Puno', 'Admin', 'admin', 'kerbymbart@gmail.com', 'AcsV7how', '', '2021-03-31 16:32:43'),
(7, 'John Wesley', '', 'Atega', 'Admin', 'admin', 'weakerz8@gmail.com', '3LqsTq4Q', '', '2021-03-31 16:32:36');

-- --------------------------------------------------------

--
-- Table structure for table `admin_activity_log`
--

CREATE TABLE `admin_activity_log` (
  `activity_log_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `activity_description` varchar(150) NOT NULL,
  `activity_date` date DEFAULT NULL,
  `activity_time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_activity_log`
--

INSERT INTO `admin_activity_log` (`activity_log_id`, `admin_id`, `activity_description`, `activity_date`, `activity_time`) VALUES
(321, 1, 'Login', '2021-03-20', '10:55:55'),
(322, 1, 'Login', '2021-03-20', '10:56:41'),
(323, 1, 'Logout', '2021-03-20', '10:57:53'),
(324, 1, 'Login', '2021-03-20', '10:59:25'),
(325, 1, 'Logout', '2021-03-20', '11:00:58'),
(326, 1, 'Logout', '2021-03-20', '11:11:12'),
(327, 1, 'Login', '2021-03-20', '11:12:10'),
(328, 1, 'Logout', '2021-03-20', '11:12:20'),
(329, 4, 'Login', '2021-03-20', '11:55:45'),
(330, 4, 'Logout', '2021-03-20', '12:08:36'),
(331, 1, 'Login', '2021-03-20', '12:11:29'),
(332, 1, 'Login', '2021-03-20', '13:19:22'),
(333, 1, 'Logout', '2021-03-20', '13:22:17'),
(334, 1, 'Login', '2021-03-20', '13:22:52'),
(335, 1, 'Logout', '2021-03-20', '13:23:10'),
(336, 1, 'Login', '2021-03-20', '13:23:23'),
(337, 1, 'Logout', '2021-03-20', '13:24:12'),
(338, 1, 'Login', '2021-03-20', '15:15:48'),
(339, 1, 'Login', '2021-03-20', '15:24:40'),
(340, 1, 'Logout', '2021-03-20', '15:26:09'),
(341, 1, 'Login', '2021-03-20', '15:30:46'),
(342, 1, 'Logout', '2021-03-20', '15:31:39'),
(343, 1, 'Login', '2021-03-20', '15:42:49'),
(344, 1, 'Logout', '2021-03-20', '15:50:35'),
(345, 1, 'Login', '2021-03-20', '17:23:16'),
(346, 1, 'Login', '2021-03-20', '21:17:00'),
(347, 1, 'Login', '2021-03-20', '21:29:56'),
(348, 1, 'Logout', '2021-03-20', '21:31:12'),
(349, 1, 'Login', '2021-03-20', '21:31:52'),
(350, 1, 'Logout', '2021-03-20', '21:33:21'),
(351, 1, 'Login', '2021-03-20', '21:36:15'),
(352, 1, 'Logout', '2021-03-20', '21:43:10'),
(353, 1, 'Login', '2021-03-21', '14:19:11'),
(354, 1, 'Login', '2021-03-21', '14:28:34'),
(355, 1, 'Login', '2021-03-21', '14:40:02'),
(356, 1, 'Login', '2021-03-21', '17:46:27'),
(357, 1, 'Login', '2021-03-21', '18:17:12'),
(358, 1, 'Login', '2021-03-21', '19:35:51'),
(359, 1, 'Login', '2021-03-21', '20:04:55'),
(360, 1, 'Login', '2021-03-21', '20:19:10'),
(361, 1, 'Login', '2021-03-21', '22:31:54'),
(362, 1, 'Login', '2021-03-21', '22:39:30'),
(363, 1, 'Login', '2021-03-21', '22:55:21'),
(364, 1, 'Login', '2021-03-22', '01:14:27'),
(365, 1, 'Login', '2021-03-22', '08:18:17'),
(366, 1, 'Login', '2021-03-22', '10:55:32'),
(367, 1, 'Login', '2021-03-22', '12:47:41'),
(368, 1, 'Login', '2021-03-22', '13:20:46'),
(369, 1, 'Login', '2021-03-22', '13:30:34'),
(370, 1, 'Login', '2021-03-22', '14:02:18'),
(371, 1, 'Login', '2021-03-22', '14:23:40'),
(372, 1, 'Login', '2021-03-22', '20:59:41'),
(373, 1, 'Logout', '2021-03-22', '21:02:34'),
(380, 1, 'Deleted position:', '2021-03-22', '22:33:44'),
(381, 1, 'Login', '2021-03-22', '22:38:15'),
(382, 1, 'Login', '2021-03-23', '01:08:46'),
(383, 1, 'Login', '2021-03-23', '08:10:35'),
(384, 1, 'Login', '2021-03-23', '08:51:56'),
(385, 1, 'Login', '2021-03-23', '21:12:34'),
(386, 1, 'Login', '2021-03-24', '09:37:48'),
(387, 1, 'Login', '2021-03-24', '13:38:27'),
(388, 1, 'Login', '2021-03-25', '13:38:02'),
(389, 1, 'Login', '2021-03-25', '15:42:41'),
(390, 1, 'Login', '2021-03-25', '15:51:18'),
(391, 1, 'Login', '2021-03-25', '15:51:22'),
(392, 1, 'Login', '2021-03-25', '15:55:17'),
(393, 1, 'Login', '2021-03-25', '15:55:21'),
(394, 1, 'Login', '2021-03-25', '18:10:47'),
(395, 1, 'Login', '2021-03-25', '18:10:47'),
(396, 1, 'Login', '2021-03-25', '18:11:57'),
(397, 1, 'Login', '2021-03-26', '11:10:41'),
(398, 1, 'Login', '2021-03-27', '09:33:59'),
(399, 1, 'Login', '2021-03-27', '11:10:46'),
(400, 1, 'Login', '2021-03-27', '12:44:53'),
(401, 1, 'Login', '2021-03-28', '14:36:17'),
(402, 1, 'Login', '2021-03-29', '08:32:41'),
(403, 1, 'Login', '2021-03-29', '10:14:02'),
(404, 1, 'Logout', '2021-03-29', '10:30:59'),
(405, 1, 'Login', '2021-03-29', '10:31:04'),
(406, 1, 'Logout', '2021-03-29', '10:45:02'),
(407, 1, 'Login', '2021-03-29', '20:05:49'),
(408, 1, 'Login', '2021-03-29', '20:15:25'),
(409, 1, 'Login', '2021-03-29', '20:15:25'),
(410, 1, 'Login', '2021-03-30', '14:11:31'),
(411, 1, 'Login', '2021-03-31', '16:08:07'),
(412, 1, 'Logout', '2021-03-31', '16:08:24'),
(413, 1, 'Login', '2021-03-31', '16:09:14'),
(414, 1, 'Logout', '2021-03-31', '16:09:47'),
(415, 1, 'Login', '2021-03-31', '16:40:02'),
(416, 1, 'Logout', '2021-03-31', '16:40:17'),
(417, 1, 'Login', '2021-03-31', '16:40:22'),
(418, 1, 'Logout', '2021-03-31', '16:43:28'),
(419, 1, 'Login', '2021-03-31', '16:48:25'),
(420, 1, 'Logout', '2021-03-31', '16:48:38'),
(421, 1, 'Login', '2021-03-31', '16:55:04'),
(422, 1, 'Logout', '2021-03-31', '16:55:57'),
(423, 1, 'Login', '2021-03-31', '18:21:28'),
(424, 1, 'Logout', '2021-03-31', '18:23:11'),
(425, 1, 'Login', '2021-03-31', '21:22:27'),
(426, 1, 'Logout', '2021-03-31', '21:22:42'),
(427, 1, 'Login', '2021-03-31', '21:24:54'),
(428, 1, 'Login', '2021-03-31', '21:38:08'),
(429, 1, 'Login', '2021-03-31', '22:00:49'),
(430, 1, 'Logout', '2021-03-31', '22:00:57'),
(431, 1, 'Login', '2021-04-01', '01:32:28'),
(432, 1, 'Login', '2021-04-01', '10:24:22'),
(433, 1, 'Login', '2021-04-01', '10:41:25'),
(434, 1, 'Login', '2021-04-01', '15:12:25'),
(435, 1, 'Login', '2021-04-01', '15:22:26'),
(436, 1, 'Login', '2021-04-01', '18:58:43'),
(437, 1, 'Login', '2021-04-01', '21:36:27'),
(438, 1, 'Login', '2021-04-02', '10:08:46'),
(439, 1, 'Login', '2021-04-02', '11:06:31');

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
  `credentials` varchar(500) NOT NULL,
  `photo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `candidate`
--

INSERT INTO `candidate` (`candidate_id`, `student_id`, `position_id`, `total_votes`, `party_name`, `platform_info`, `credentials`, `photo`) VALUES
(1, 8, 1, 0, 'Run Adrian, Run Partylist', 'I wanna be a billionaire, so freaking bad.', 'Class President for 5 years.', 'img/dp/1.jpg'),
(2, 9, 1, 0, 'Dingdong Dantes Supporters', 'Para kay Tatay Digs, I dig.', 'DU30natics since 1999', 'img/dp/2.jpg'),
(3, 10, 2, 0, 'Run Adrian, Run Partylist', 'I wanna be a billionaire (2)', 'Tiktoker for 2 years.', 'img/dp/3.jpg'),
(4, 11, 2, 0, 'Dingdong Dantes Supporters', 'DDS forever.', 'Clowns since birth.', 'img/dp/4.jpg'),
(5, 12, 3, 0, 'Run Adrian, Run Partylist', 'Do you want to build a snowman?', 'Elsa\'s sister.', 'img/dp/5.jpg'),
(6, 13, 3, 0, 'Dingdong Dantes Supporters', 'I believe in the saying na naniniwala ako sa kasabihan.', 'Sana all may credentials.', 'img/dp/6.jpg'),
(7, 14, 3, 0, 'Independent', 'Strong independent woman, kaya ko mag-secretary.', 'Independent for 10 years.', 'img/dp/7.jpg'),
(8, 15, 4, 0, 'Dingdong Dantes Supporters', 'Payaman lang ako dito.', 'Kurakot pero cute.', 'img/dp/8.jpg'),
(9, 16, 4, 0, 'Independent', 'Isasama kita sa barko ko.', 'I have Noah\'s Arc.\r\nSaving animals for 5 years.', 'img/dp/9.jpg'),
(10, 17, 6, 0, 'Dingdong Dantes Supporters', 'Boses ng grade 7, malakas.', 'Pabibo yesterday, oday and tomorrow.', 'img/dp/10.jpg'),
(11, 18, 6, 0, 'Run Adrian, Run Partylist', 'Meron akong Martin\'s crackers.', 'Owner of Martin\'s crackers.', 'img/dp/11.jpg'),
(12, 19, 7, 0, 'Dingdong Dantes Supporters', 'Kung kailangan mo ng tulang, sabihin mo lang, \"JOSEFA-tulong.\"', 'In the service of grade 8 people...', 'img/dp/12.jpg'),
(13, 20, 7, 0, 'Run Adrian, Run Partylist', 'Danilook, may nangangailangan ng tulong.', 'Nakikita niya lahat ng nangangailangan ng tulong.', 'img/dp/13.jpg'),
(14, 21, 7, 0, 'Independent', 'I will take you to Madagascar.', 'King Julien\'s adviser.', 'img/dp/14.jpg'),
(15, 22, 8, 0, 'Run Adrian, Run Partylist', 'Hello World', 'Bot 77', 'img/dp/15.jpg'),
(16, 23, 8, 0, 'Dingdong Dantes Supporters', 'Itataas ko bandera ng grade 9.', 'Flag-bearer.\r\nBoyscout for 10 years.', 'img/dp/16.jpg'),
(17, 24, 10, 0, 'Independent', 'I set fire to the rain...', 'Kaya ko mag-split.', 'img/dp/17.jpg'),
(18, 25, 10, 0, 'Run Adrian, Run Partylist', 'Kaya NEO ba ang kaya ko?', 'May-kaya sa buhay.', 'img/dp/18.jpg'),
(19, 26, 11, 0, 'Dingdong Dantes Supporters', 'JAZ call my name, and I\'ll be there.', 'Dancer sa munisipyo.', 'img/dp/19.jpg'),
(20, 27, 11, 0, 'Run Adrian, Run Partylist', 'Si Gabriella, isinilang...', 'Woman\'s rights ambassador', 'img/dp/20.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `candidate_position`
--

CREATE TABLE `candidate_position` (
  `position_id` int(11) NOT NULL,
  `heirarchy_id` int(30) NOT NULL,
  `position_name` varchar(30) NOT NULL,
  `position_description` varchar(100) NOT NULL,
  `vote_allow` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `candidate_position`
--

INSERT INTO `candidate_position` (`position_id`, `heirarchy_id`, `position_name`, `position_description`, `vote_allow`) VALUES
(1, 1, 'President', 'The head of the Supreme Student Government.', 1),
(2, 2, 'Vice President', 'Supports the President and will assume the presidency if the President resigns.', 1),
(3, 3, 'Secretary', 'In charge of organization correspondence and document keeping.', 1),
(4, 4, 'Treasurer', 'Financial officer in charge of book keeping organization expenses, income and savings.', 1),
(5, 5, 'Auditor', 'Audits the financial records of the treasurer.', 1),
(6, 6, 'Grade 7 Representative', 'Represents the voice of the Grade 7 students.', 0),
(7, 7, 'Grade 8 Representative', 'Represents the voice of the Grade 8 students.', 0),
(8, 8, 'Grade 9 Representative', 'Represents the voice of the Grade 9 students.', 0),
(9, 9, 'Grade 10 Representative', 'Represents the voice of the Grade 10 students.', 0),
(10, 10, 'Grade 11 Representative', 'Represents the voice of the Grade 11 students.', 0),
(11, 11, 'Grade 12 Representative', 'Represents the voice of the Grade 12 students.', 0);

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
(1, 'Maria', 'Madrona', 'Hanway', 'female', 'dhanjaphetverastigue.ador@bicol-u.edu.ph', 7, '125915', 1),
(2, 'Ariel', 'Bilal', 'Ongpauco', 'male', 'jessicaarimado.ajero@bicol-u.edu.ph', 10, '124622', 1),
(3, 'Isaak', 'Pildilapil', 'Alba', 'male', 'gaybaraquiel.alarcon@bicol-u.edu.ph', 11, '235343', 1),
(4, 'Braedon', 'Lozo', 'Sibug', 'male', 'johnpaulrenevo.asis@bicol-u.edu.ph', 9, '276291', 1),
(5, 'Julien', 'Cader', 'Puno', 'female', 'johnpauljaynario.azore@bicol-u.edu.ph', 9, '217493', 0),
(6, 'John Wesley', '', 'Atega', 'male', 'kayceelanuza.ballesteros@bicol-u.edu.ph', 7, '130104', 1),
(7, 'Jerrald', 'Dura', 'Macatangay', 'male', 'benazirgratela.barrameda@bicol-u.edu.ph', 8, '266719', 1),
(8, 'Adrian', 'Gallora', 'Balangao', 'male', 'stevenandreibansagale.barrios@bicol-u.edu.ph', 11, '869571', 0),
(9, 'Ken', 'Sison', 'Padilla', 'male', 'kerbymaravilla.bartolay@bicol-u.edu.ph', 11, '403364', 0),
(10, 'Horencia', 'Lopa', 'Santiago', 'female', 'christopherbariso.belen@bicol-u.edu.ph', 12, '864223', 1),
(11, 'Mason', 'Felix', 'Montejo', 'male', 'maedeljoicebercasio.castro@bicol-u.edu.ph', 8, '090126', 0),
(12, 'Anna', 'Lacsamana', 'Gevarra', 'female', 'joshuaisaiahmendez.codorniz@bicol-u.edu.ph', 9, '825517', 0),
(13, 'Trevon', 'Daquan', 'Magnaye', 'male', 'janharoldlandicho.delacruz@bicol-u.edu.ph', 7, '927785', 0),
(14, 'Abigail', 'Subrabas', 'Mipa', 'female', 'josedavidmapusao.delossantos@bicol-u.edu.ph', 10, '267220', 0),
(15, 'Sasha', 'Macalipay', 'Buenaventura', 'female', 'carlosgabrielendaya.delrosario@bicol-u.edu.ph', 8, '393606', 0),
(16, 'Noah', 'Moxcir', 'Solas', 'male', 'christianangelodimaano.diesta@bicol-u.edu.ph', 7, '526160', 0),
(17, 'Alliah', 'Lanta', 'Bataller', 'female', 'maveronicasequitin.gallos@bicol-u.edu.ph', 7, '753110', 0),
(18, 'Martin', 'Estevan', 'Pamintuan', 'male', 'mikaellalubiano.jarapa@bicol-u.edu.ph', 7, '252909', 0),
(19, 'Josefa', 'Talon', 'Vicente', 'female', 'iveelozano.jintalan@bicol-u.edu.ph', 8, '072322', 0),
(20, 'Danilo', '', 'Medina', 'male', 'joshuaalexinsuya.llander@bicol-u.edu.ph', 8, '372533', 0),
(21, 'Maurice', 'Clark', 'Madrid', 'female', 'jonjayvegonzales.llaneta@bicol-u.edu.ph', 8, '690885', 0),
(22, 'Sebastiano', 'Gubat', 'Etrone', 'male', 'jaydechosa.majadas@bicol-u.edu.ph', 9, '514101', 0),
(23, 'Marvin', 'Cayco', 'Galíndez', 'male', 'allianahgaile.malate@bicol-u.edu.ph', 9, '159368', 0),
(24, 'Christy Mae', 'Lotivio', 'Sy', 'female', 'mendrixclarianes.manlangit@bicol-u.edu.ph', 11, '465982', 0),
(25, 'Neo', 'Tuico', 'Hermano', 'female', 'johnkennethestipona.maronilla@bicol-u.edu.ph', 11, '619275', 0),
(26, 'Jazmine', '', 'Lim', 'female', 'darlene.rogero@bicol-u.edu.ph', 12, '595719', 0),
(27, 'Gabriella', 'Regidor', 'Briones', 'female', 'krishalouisesanjose.munoz@bicol-u.edu.ph', 12, '000474', 0),
(28, 'Renz', 'Borras', 'Duclayan', 'male', 'alyssamaecezar.olano@bicol-u.edu.ph', 11, '142538', 0),
(29, 'Nicole', '', 'Tiansay', 'female', 'keenbarrameda.padilla@bicol-u.edu.ph', 9, '841182', 0),
(30, 'Kai', 'Batumbakal', 'Guiriba', 'male', 'lizellearcos.penarubia@bicol-u.edu.ph', 8, '921319', 0),
(31, 'Lila', 'Rodriguez', 'Litana', 'female', 'karlorhommelchua.staana@bicol-u.edu.ph', 10, '797244', 0),
(32, 'Rodrigo', 'Bongo', 'Roque', 'male', 'kathrindenisemontallana.taclas@bicol-u.edu.ph', 12, '503908', 0),
(33, 'Lil', '', 'Eminem', 'female', 'ricamae.vega@bicol-u.edu.ph', 11, '097588', 0);

-- --------------------------------------------------------

--
-- Table structure for table `student_access_log`
--

CREATE TABLE `student_access_log` (
  `access_log_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `activity_description` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `student_access_log`
--

INSERT INTO `student_access_log` (`access_log_id`, `student_id`, `activity_description`, `date`, `time`) VALUES
(3, 14, 'Login', '2021-03-20', '11:38:31'),
(5, 20, 'Logout', '2021-03-20', '11:46:50'),
(6, 20, 'Logout', '2021-03-20', '11:47:53'),
(7, 20, 'Logout', '2021-03-20', '11:54:55'),
(8, 20, 'Login', '2021-03-20', '15:30:16'),
(9, 20, 'Logout', '2021-03-20', '15:30:27'),
(10, 20, 'Login', '2021-03-20', '16:01:46'),
(11, 20, 'Logout', '2021-03-20', '16:01:55'),
(12, 20, 'Login', '2021-03-20', '16:02:37'),
(13, 20, 'Logout', '2021-03-20', '16:02:50'),
(14, 20, 'Login', '2021-03-20', '16:04:23'),
(15, 20, 'Logout', '2021-03-20', '16:05:55'),
(16, 20, 'Login', '2021-03-20', '16:09:26'),
(17, 20, 'Logout', '2021-03-20', '16:09:33'),
(18, 20, 'Login', '2021-03-20', '16:16:17'),
(19, 20, 'Login', '2021-03-20', '16:16:18'),
(20, 20, 'Logout', '2021-03-20', '16:16:23'),
(21, 20, 'Login', '2021-03-20', '18:21:39'),
(22, 20, 'Logout', '2021-03-20', '18:21:43'),
(23, 20, 'Login', '2021-03-20', '21:29:25'),
(24, 20, 'Logout', '2021-03-20', '21:29:42'),
(25, 20, 'Login', '2021-03-20', '21:43:22'),
(26, 20, 'Logout', '2021-03-20', '21:43:35'),
(27, 20, 'Login', '2021-03-29', '10:26:10'),
(28, 20, 'Logout', '2021-03-29', '10:45:05'),
(29, 20, 'Login', '2021-03-31', '16:08:55'),
(30, 20, 'Logout', '2021-03-31', '16:09:07'),
(31, 20, 'Login', '2021-03-31', '17:46:39'),
(32, 20, 'Logout', '2021-03-31', '17:46:43'),
(33, 20, 'Login', '2021-03-31', '17:55:52'),
(34, 20, 'Logout', '2021-03-31', '17:56:00'),
(35, 20, 'Login', '2021-03-31', '18:00:19'),
(36, 20, 'Logout', '2021-03-31', '18:00:23'),
(37, 32, 'Login', '2021-04-01', '15:16:18'),
(38, 32, 'Login', '2021-04-01', '15:21:20'),
(39, 20, 'Login', '2021-04-02', '10:08:23');

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
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `admin_activity_log`
--
ALTER TABLE `admin_activity_log`
  ADD PRIMARY KEY (`activity_log_id`),
  ADD KEY `admin_id` (`admin_id`);

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
-- Indexes for table `student_access_log`
--
ALTER TABLE `student_access_log`
  ADD PRIMARY KEY (`access_log_id`),
  ADD KEY `student_id` (`student_id`);

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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `admin_activity_log`
--
ALTER TABLE `admin_activity_log`
  MODIFY `activity_log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=440;

--
-- AUTO_INCREMENT for table `archive`
--
ALTER TABLE `archive`
  MODIFY `archive_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `candidate`
--
ALTER TABLE `candidate`
  MODIFY `candidate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `candidate_position`
--
ALTER TABLE `candidate_position`
  MODIFY `position_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123456130;

--
-- AUTO_INCREMENT for table `student_access_log`
--
ALTER TABLE `student_access_log`
  MODIFY `access_log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

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
-- Constraints for table `admin_activity_log`
--
ALTER TABLE `admin_activity_log`
  ADD CONSTRAINT `admin_activity_log_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`);

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
-- Constraints for table `student_access_log`
--
ALTER TABLE `student_access_log`
  ADD CONSTRAINT `student_access_log_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`);

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
