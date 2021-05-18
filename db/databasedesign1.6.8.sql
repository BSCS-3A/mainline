-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 18, 2021 at 12:45 PM
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
  `password` varchar(500) NOT NULL,
  `photo` varchar(500) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `eSignature` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_fname`, `admin_mname`, `admin_lname`, `admin_position`, `comelec_position`, `username`, `password`, `photo`, `reg_date`, `eSignature`) VALUES
(1, 'John', 'UCANTSEEME', 'Cena', 'Head Admin', 'Adviser', 'admin@email.com', 'admin', 'user.png', '2021-05-12 02:38:32', ''),
(2, 'Tomas', 'Mutya', 'Sace', 'Head Admin', 'Adviser', 'taclaskathrindenise@gmail.com', 'admin', '', '2021-05-12 02:39:08', ''),
(3, 'Ariel', 'Bilal', 'Ongpauco', 'Admin', 'Chairperson', 'stebo1034@gmail.com', 'admin', '', '2021-05-12 02:39:38', ''),
(4, 'Isaakk', 'Pildilapil', 'Alba', 'Admin', 'Secretary', 'makenilla28@gmail.com', 'admin', '', '2021-05-12 16:48:45', ''),
(5, 'Braedon', 'Lozo', 'Sibug', 'Admin', 'Treasurer', 'eef4de@gmail.com', 'admin', '', '2021-05-12 02:40:41', ''),
(9, 'Anthony', 'Edward', 'Stark', 'Admin', 'CEO', 'iamironman@avengers.com', '123', '../../user/img/609b681340d592.60734527.jpg', '2021-05-12 05:30:59', '');

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
(535, 1, 'Logout', '2021-04-15', '00:07:53'),
(536, 1, 'Logout', '2021-04-15', '10:56:07'),
(537, 1, 'Login', '2021-04-15', '10:56:16'),
(538, 1, 'Login', '2021-04-15', '18:04:26'),
(539, 1, 'Login', '2021-04-15', '23:09:21'),
(540, 1, 'Login', '2021-04-16', '03:44:03'),
(541, 1, 'Added position:test', '2021-04-16', '09:14:54'),
(542, 1, 'Deleted position:', '2021-04-16', '09:15:03'),
(543, 1, 'Deleted position:', '2021-04-16', '09:31:06'),
(544, 1, 'Deleted position:', '2021-04-16', '09:32:58'),
(545, 1, 'Deleted position:', '2021-04-16', '09:37:25'),
(546, 1, 'Deleted position:', '2021-04-16', '09:39:55'),
(547, 1, 'Deleted position:', '2021-04-16', '09:42:54'),
(548, 1, 'Deleted position:', '2021-04-16', '09:43:25'),
(549, 1, 'Deleted position:', '2021-04-16', '09:45:04'),
(550, 1, 'Deleted position:', '2021-04-16', '09:46:59'),
(551, 1, 'Deleted position:', '2021-04-16', '09:48:04'),
(552, 1, 'Deleted position:', '2021-04-16', '09:57:06'),
(553, 1, 'Deleted position:', '2021-04-16', '10:08:31'),
(554, 1, 'Deleted position:', '2021-04-16', '10:14:30'),
(555, 1, 'Deleted position:', '2021-04-16', '10:16:48'),
(556, 1, ' Updated to position Grade 9 Representative', '2021-04-16', '10:20:08'),
(557, 1, ' Updated to position Grade 9 Representative', '2021-04-16', '10:22:24'),
(558, 1, ' Updated to position Grade 9 Representative', '2021-04-16', '10:25:37'),
(559, 1, ' Updated to position Grade 10 Representative', '2021-04-16', '10:26:00'),
(560, 1, ' Updated to position Grade 11 Representative', '2021-04-16', '10:26:15'),
(561, 1, ' Updated to position Grade 12 Representative', '2021-04-16', '10:26:22'),
(562, 1, 'Deleted position:', '2021-04-16', '11:41:51'),
(563, 1, ' Updated to position Grade 10 Representative', '2021-04-16', '11:42:07'),
(564, 1, ' Updated to position Grade 11 Representative', '2021-04-16', '11:42:22'),
(565, 1, ' Updated to position Grade 12 Representative', '2021-04-16', '11:42:31'),
(566, 1, 'Deleted position:', '2021-04-16', '11:44:06'),
(567, 1, 'Deleted position:', '2021-04-16', '11:57:47'),
(568, 1, 'Deleted position:', '2021-04-16', '11:58:55'),
(569, 1, 'Deleted position:', '2021-04-16', '12:01:53'),
(570, 1, ' Updated to position Grade 9 Representative', '2021-04-16', '12:02:26'),
(571, 1, ' Updated to position Grade 10 Representative', '2021-04-16', '12:02:36'),
(572, 1, ' Updated to position Grade 10 Representative', '2021-04-16', '12:02:48'),
(573, 1, ' Updated to position Grade 11 Representative', '2021-04-16', '12:02:57'),
(574, 1, ' Updated to position Grade 12 Representative', '2021-04-16', '12:03:05'),
(575, 1, 'Added position:test', '2021-04-16', '13:30:25'),
(576, 1, 'Deleted position:', '2021-04-16', '13:30:31'),
(577, 1, ' Updated to position Grade 9 Representative', '2021-04-16', '13:31:16'),
(578, 1, ' Updated to position Grade 10 Representative', '2021-04-16', '13:31:27'),
(579, 1, ' Updated to position Grade 11 Representative', '2021-04-16', '13:31:34'),
(580, 1, ' Updated to position Grade 12 Representative', '2021-04-16', '13:31:41'),
(581, 1, 'Added position:test', '2021-04-16', '13:42:29'),
(582, 1, ' Updated to position President', '2021-04-16', '13:43:30'),
(583, 1, ' Updated to position Vice President', '2021-04-16', '13:43:38'),
(584, 1, ' Updated to position Secretary', '2021-04-16', '13:43:50'),
(585, 1, ' Updated to position Treasurer', '2021-04-16', '13:43:56'),
(586, 1, ' Updated to position Auditor', '2021-04-16', '13:44:02'),
(587, 1, ' Updated to position Grade 7 Representative', '2021-04-16', '13:44:10'),
(588, 1, ' Updated to position Grade 8 Representative', '2021-04-16', '13:44:17'),
(589, 1, ' Updated to position Grade 9 Representative', '2021-04-16', '13:44:24'),
(590, 1, ' Updated to position Grade 10 Representative', '2021-04-16', '13:44:32'),
(591, 1, ' Updated to position Grade 11 Representative', '2021-04-16', '13:44:40'),
(592, 1, ' Updated to position Grade 12 Representative', '2021-04-16', '13:44:47'),
(593, 1, 'Added position:test', '2021-04-16', '13:45:14'),
(594, 1, 'Deleted position:', '2021-04-16', '13:45:21'),
(595, 1, 'Added position:tetst=', '2021-04-16', '13:46:29'),
(596, 1, 'Deleted position:', '2021-04-16', '13:46:34'),
(597, 1, 'Added position:test', '2021-04-16', '13:46:50'),
(598, 1, 'Deleted position:', '2021-04-16', '13:47:18'),
(599, 1, 'Added position:test', '2021-04-16', '13:47:41'),
(600, 1, 'Deleted position:', '2021-04-16', '13:47:56'),
(601, 1, 'Login', '2021-04-17', '13:20:25'),
(602, 1, 'Login', '2021-04-17', '13:42:24'),
(603, 1, 'Login', '2021-04-17', '13:42:24'),
(604, 1, 'Login', '2021-04-17', '23:55:31'),
(605, 1, 'Login', '2021-04-18', '17:26:44'),
(606, 1, 'Logout', '2021-04-18', '19:11:10'),
(607, 1, 'Login', '2021-04-18', '19:24:37'),
(608, 1, 'Logout', '2021-04-18', '19:26:43'),
(609, 1, 'Login', '2021-04-19', '01:33:01'),
(610, 1, 'Login', '2021-04-19', '14:35:34'),
(611, 1, 'Login', '2021-04-20', '17:38:52'),
(612, 1, 'Login', '2021-04-21', '21:03:17'),
(613, 1, 'Login', '2021-04-21', '22:04:44'),
(614, 1, 'Logout', '2021-04-21', '23:17:13'),
(615, 1, 'Login', '2021-04-21', '23:17:45'),
(616, 1, 'Login', '2021-04-21', '23:20:59'),
(617, 1, 'Login', '2021-04-21', '23:26:14'),
(618, 1, 'Login', '2021-04-21', '23:26:54'),
(619, 1, 'Login', '2021-04-21', '23:36:28'),
(620, 1, 'Login', '2021-04-22', '18:38:55'),
(621, 1, 'Added position:test', '2021-04-22', '19:20:14'),
(622, 1, 'Deleted position:', '2021-04-22', '19:20:34'),
(623, 1, 'Added position:test', '2021-04-22', '19:27:57'),
(624, 1, 'Deleted position:', '2021-04-22', '19:28:24'),
(625, 1, 'Added position:test', '2021-04-22', '19:31:08'),
(626, 1, 'Deleted position:', '2021-04-22', '19:31:15'),
(627, 1, 'Logout', '2021-04-22', '20:11:23'),
(628, 1, 'Login', '2021-04-22', '20:14:19'),
(629, 1, 'Login', '2021-04-22', '20:17:38'),
(630, 1, 'Login', '2021-04-22', '20:21:31'),
(631, 1, 'Added position:test', '2021-04-22', '20:50:38'),
(632, 1, 'Added position:test', '2021-04-22', '20:51:53'),
(633, 1, 'Added position:test', '2021-04-22', '20:54:19'),
(634, 1, 'Added position:test', '2021-04-22', '20:55:01'),
(635, 1, 'Added position:test', '2021-04-22', '20:58:41'),
(636, 1, 'Added position:test', '2021-04-22', '20:59:27'),
(637, 1, 'Added position:test', '2021-04-22', '21:01:08'),
(638, 1, 'Login', '2021-04-23', '08:37:55'),
(639, 1, 'Login', '2021-04-23', '08:49:48'),
(640, 1, 'Login', '2021-04-23', '09:00:54'),
(641, 1, 'Login', '2021-04-23', '09:03:25'),
(642, 1, 'Login', '2021-04-23', '12:36:35'),
(643, 1, 'Logout', '2021-04-23', '12:43:50'),
(644, 1, 'Login', '2021-04-23', '12:55:43'),
(645, 1, 'Login', '2021-04-23', '12:56:39'),
(646, 1, 'Login', '2021-04-23', '13:01:56'),
(647, 1, 'Login', '2021-04-23', '13:30:38'),
(648, 1, 'Logout', '2021-04-23', '14:29:03'),
(649, 1, 'Login', '2021-04-23', '14:29:35'),
(650, 1, 'Allowed:Grade 7 Representative', '2021-04-23', '15:20:17'),
(652, 1, 'Login', '2021-04-23', '15:36:04'),
(657, 1, 'Deleted candidate:Isaak from position: President', '2021-04-23', '15:50:37'),
(658, 1, 'Deleted candidate:Isaak from position: President', '2021-04-23', '15:54:00'),
(659, 1, 'Deleted candidate:Isaak from position: President', '2021-04-23', '15:56:49'),
(660, 1, 'Deleted candidate:Maria from position: President', '2021-04-23', '15:56:55'),
(661, 1, 'Login', '2021-04-23', '16:04:27'),
(662, 1, 'Login', '2021-04-23', '17:22:51'),
(663, 1, 'Login', '2021-04-23', '22:41:30'),
(664, 1, 'Login', '2021-04-24', '01:17:46'),
(665, 1, 'Login', '2021-04-24', '01:24:02'),
(666, 1, 'Login', '2021-04-24', '23:19:43'),
(667, 1, 'Login', '2021-04-26', '07:55:33'),
(668, 1, 'Login', '2021-04-26', '12:48:38'),
(669, 1, 'Login', '2021-04-26', '17:06:07'),
(670, 1, 'Login', '2021-04-26', '17:57:30'),
(671, 1, 'Login', '2021-04-26', '18:00:10'),
(672, 1, 'Logout', '2021-04-26', '18:00:31'),
(673, 1, 'Login', '2021-04-26', '18:22:30'),
(674, 1, 'Logout', '2021-04-26', '18:22:35'),
(675, 1, 'Login', '2021-04-26', '18:23:22'),
(676, 1, 'Logout', '2021-04-26', '18:23:25'),
(677, 1, 'Login', '2021-04-26', '18:31:34'),
(678, 1, 'Logout', '2021-04-26', '18:31:37'),
(679, 1, 'Login', '2021-04-26', '23:35:04'),
(680, 1, 'Login', '2021-04-27', '16:33:58'),
(681, 1, 'Login', '2021-04-28', '08:35:42'),
(682, 1, 'Login', '2021-04-28', '13:19:06'),
(683, 1, 'Added position:test', '2021-04-28', '19:05:52'),
(684, 1, 'Deleted position:', '2021-04-28', '19:05:57'),
(685, 1, 'Added position:test', '2021-04-28', '20:18:45'),
(686, 1, 'Deleted position:', '2021-04-28', '20:18:49'),
(687, 1, 'Added position:test', '2021-04-28', '20:18:58'),
(688, 1, 'Deleted position:', '2021-04-28', '20:19:02'),
(689, 1, 'Added position:test', '2021-04-28', '20:20:54'),
(690, 1, 'Deleted position:', '2021-04-28', '20:20:59'),
(691, 1, 'Login', '2021-04-29', '00:17:51'),
(692, 1, 'Login', '2021-04-29', '00:57:29'),
(693, 1, 'Login', '2021-04-29', '01:18:21'),
(694, 1, 'Login', '2021-04-29', '13:43:15'),
(695, 1, 'Login', '2021-04-29', '14:17:09'),
(696, 1, 'Login', '2021-04-29', '20:26:11'),
(697, 1, 'Login', '2021-04-30', '09:24:36'),
(698, 1, 'Login', '2021-04-30', '09:30:29'),
(699, 1, 'Login', '2021-04-30', '10:56:03'),
(700, 1, 'Login', '2021-04-30', '11:13:29'),
(701, 1, 'Login', '2021-04-30', '21:43:46'),
(702, 1, 'Login', '2021-04-30', '21:45:11'),
(703, 1, 'Login', '2021-05-01', '21:33:12'),
(704, 1, 'Login', '2021-05-01', '23:42:12'),
(705, 1, 'Login', '2021-05-01', '23:58:50'),
(706, 1, 'Login', '2021-05-02', '00:17:06'),
(707, 1, 'Login', '2021-05-02', '01:22:34'),
(708, 1, 'Login', '2021-05-02', '13:15:25'),
(709, 1, 'Login', '2021-05-03', '00:14:30'),
(710, 1, 'Logout', '2021-05-03', '00:34:29'),
(711, 1, 'Login', '2021-05-03', '00:47:23'),
(712, 1, 'Login', '2021-05-03', '23:35:02'),
(713, 1, 'Login', '2021-05-05', '20:24:44'),
(714, 1, 'Login', '2021-05-05', '21:50:34'),
(715, 1, 'Login', '2021-05-07', '20:51:41'),
(716, 1, 'Login', '2021-05-07', '21:11:50'),
(717, 1, 'Login', '2021-05-07', '21:55:54'),
(718, 1, 'Login', '2021-05-07', '21:58:29'),
(719, 1, 'Login', '2021-05-07', '23:30:05'),
(720, 1, 'Login', '2021-05-08', '00:33:33'),
(721, 1, 'Login', '2021-05-09', '13:37:42'),
(722, 1, 'Login', '2021-05-09', '22:32:01'),
(723, 1, 'Logout', '2021-05-09', '23:44:51'),
(724, 1, 'Login', '2021-05-09', '23:48:26'),
(725, 1, 'Login', '2021-05-10', '01:06:36'),
(726, 1, 'Login', '2021-05-10', '12:17:45'),
(727, 1, 'Login', '2021-05-11', '20:44:20'),
(728, 1, 'Login', '2021-05-12', '09:28:26'),
(729, 1, 'Login', '2021-05-12', '10:30:49'),
(730, 1, 'Logout', '2021-05-12', '10:30:58'),
(731, 1, 'Login', '2021-05-12', '10:32:54'),
(732, 1, 'Logout', '2021-05-12', '10:32:57'),
(733, 1, 'Login', '2021-05-12', '10:33:59'),
(734, 1, 'Login', '2021-05-12', '10:34:14'),
(735, 1, 'Logout', '2021-05-12', '10:34:26'),
(736, 1, 'Login', '2021-05-12', '10:34:36'),
(737, 1, 'Logout', '2021-05-12', '10:36:49'),
(738, 1, 'Login', '2021-05-12', '10:37:15'),
(739, 1, 'updated Admin Account : admin@email.com', '2021-05-12', '10:38:32'),
(740, 1, 'updated Admin Account : taclaskathrindenise@gmail.com', '2021-05-12', '10:39:08'),
(741, 1, 'updated Admin Account : stebo1034@gmail.com', '2021-05-12', '10:39:38'),
(742, 1, 'updated Admin Account : makenilla28@gmail.com', '2021-05-12', '10:40:06'),
(743, 1, 'updated Admin Account : eef4de@gmail.com', '2021-05-12', '10:40:41'),
(744, 1, 'created Admin Account : iamironman@avengers.com', '2021-05-12', '10:42:53'),
(745, 1, 'Logout', '2021-05-12', '10:44:01'),
(748, 1, 'Login', '2021-05-12', '10:45:16'),
(749, 1, 'deleted Info of Student : 20', '2021-05-12', '10:47:58'),
(750, 1, 'Logout', '2021-05-12', '10:55:15'),
(751, 1, 'Logout', '2021-05-12', '11:02:57'),
(752, 1, 'Login', '2021-05-12', '11:06:12'),
(753, 1, 'Logout', '2021-05-12', '11:06:58'),
(754, 1, 'Login', '2021-05-12', '11:07:35'),
(755, 1, 'Logout', '2021-05-12', '11:07:42'),
(756, 1, 'Added position:ceo', '2021-05-12', '11:08:33'),
(757, 1, 'Allowed:ceo', '2021-05-12', '11:09:22'),
(758, 1, 'Logout', '2021-05-12', '11:10:01'),
(759, 1, ' Updated position ceo', '2021-05-12', '11:10:03'),
(760, 1, 'Deleted position:ceo', '2021-05-12', '11:10:17'),
(761, 1, 'Added position:CEO', '2021-05-12', '11:10:42'),
(762, 1, 'loaded default positions', '2021-05-12', '11:11:08'),
(763, 1, 'loaded default positions', '2021-05-12', '11:11:18'),
(764, 1, 'loaded default positions', '2021-05-12', '11:11:32'),
(765, 1, 'Added candidate John Wesley Atega to position President', '2021-05-12', '11:12:10'),
(766, 1, 'Edited candidate John Wesley Atega to position President', '2021-05-12', '11:12:38'),
(767, 1, 'Added candidate Alliah Bataller to position President', '2021-05-12', '11:12:58'),
(768, 1, 'Deleted candidate:John Wesley from position: President', '2021-05-12', '11:13:04'),
(769, 1, 'Added candidate John Wesley Atega to position President', '2021-05-12', '11:13:20'),
(770, 1, 'Added candidate Ariel Ongpauco to position Vice President', '2021-05-12', '11:15:25'),
(771, 1, 'Added candidate Marvin Galíndez to position Grade 7 Representative', '2021-05-12', '11:15:43'),
(772, 1, 'Logout', '2021-05-12', '11:15:59'),
(773, 1, 'Login', '2021-05-12', '11:20:44'),
(774, 1, 'Login', '2021-05-12', '11:23:18'),
(775, 1, 'Edited candidate Anna Gevarra to position Grade 12 Representative', '2021-05-12', '11:23:25'),
(776, 1, 'Login', '2021-05-12', '11:31:23'),
(777, 1, 'Login', '2021-05-12', '11:31:38'),
(778, 1, 'Logout', '2021-05-12', '11:32:11'),
(779, 1, 'Logout', '2021-05-12', '11:32:52'),
(780, 1, 'set Election Countdown.', '2021-05-12', '11:33:00'),
(781, 1, 'sent Election Reminders.', '2021-05-12', '11:38:42'),
(782, 1, 'Logout', '2021-05-12', '11:43:51'),
(783, 1, 'Login', '2021-05-12', '11:48:07'),
(784, 1, 'set Election Countdown.', '2021-05-12', '11:48:52'),
(785, 1, 'sent Election Reminders.', '2021-05-12', '12:01:07'),
(786, 1, 'sent Election Reminders.', '2021-05-12', '12:01:19'),
(787, 1, 'sent Election Reminders.', '2021-05-12', '12:02:21'),
(788, 1, 'sent Election Reminders.', '2021-05-12', '12:02:36'),
(789, 1, 'Logout', '2021-05-12', '12:19:14'),
(790, 1, 'Login', '2021-05-12', '12:20:41'),
(791, 1, 'Login', '2021-05-12', '12:21:57'),
(792, 1, 'Logout', '2021-05-12', '12:24:41'),
(793, 1, 'Login', '2021-05-12', '12:27:11'),
(794, 1, 'Login', '2021-05-12', '12:39:22'),
(795, 1, 'Login', '2021-05-12', '12:40:28'),
(796, 1, 'Logout', '2021-05-12', '12:50:49'),
(797, 1, 'Logout', '2021-05-12', '12:55:38'),
(798, 1, 'Logout', '2021-05-12', '12:56:55'),
(799, 1, 'Login', '2021-05-12', '12:59:48'),
(800, 1, 'Logout', '2021-05-12', '13:03:10'),
(801, 1, 'Logout', '2021-05-12', '13:11:22'),
(802, 1, 'Logout', '2021-05-12', '13:19:55'),
(803, 1, 'Login', '2021-05-12', '13:23:50'),
(804, 1, 'Logout', '2021-05-12', '13:24:18'),
(805, 1, 'Login', '2021-05-12', '13:25:16'),
(806, 1, 'created Admin Account : iamironman@avengers.com', '2021-05-12', '13:30:59'),
(807, 1, 'Logout', '2021-05-12', '13:32:02'),
(808, 9, 'Login', '2021-05-12', '13:32:15'),
(809, 9, 'Logout', '2021-05-12', '13:33:40'),
(810, 1, 'Login', '2021-05-12', '13:33:52'),
(811, 1, 'deleted Info of Student : 1', '2021-05-12', '13:39:30'),
(812, 1, 'Login', '2021-05-12', '13:49:54'),
(813, 1, 'Logout', '2021-05-12', '13:50:27'),
(814, 1, 'Added position:ceo', '2021-05-12', '13:56:23'),
(815, 1, ' Updated position ceo', '2021-05-12', '13:56:42'),
(816, 1, 'Deleted position:ceo', '2021-05-12', '13:56:52'),
(817, 1, 'Added position:CEO', '2021-05-12', '13:57:24'),
(818, 1, 'Allowed:CEO', '2021-05-12', '13:57:32'),
(819, 1, 'loaded default positions', '2021-05-12', '13:58:02'),
(820, 1, 'Added candidate Noah Solas to position President', '2021-05-12', '13:59:30'),
(821, 1, 'Added candidate Sebastiano Etrone to position President', '2021-05-12', '13:59:56'),
(822, 1, 'Edited candidate Noah Solas to position President', '2021-05-12', '14:00:10'),
(823, 1, 'Added candidate Sasha Buenaventura to position Secretary', '2021-05-12', '14:01:53'),
(824, 1, 'set Election Countdown.', '2021-05-12', '14:11:02'),
(825, 1, 'Login', '2021-05-12', '14:35:09'),
(826, 1, 'Logout', '2021-05-12', '14:35:18'),
(827, 1, 'Login', '2021-05-12', '14:42:37'),
(828, 1, 'Logout', '2021-05-12', '14:56:56'),
(829, 1, 'Logout', '2021-05-12', '15:18:20'),
(830, 1, 'Login', '2021-05-13', '00:36:10'),
(831, 1, 'Login', '2021-05-13', '00:38:33'),
(832, 1, 'Login', '2021-05-13', '00:47:21'),
(833, 1, 'updated Admin Account : makenilla28@gmail.com', '2021-05-13', '00:48:45'),
(834, 1, 'Logout', '2021-05-13', '00:54:27'),
(835, 1, 'Logout', '2021-05-13', '00:59:35'),
(836, 1, 'Login', '2021-05-13', '02:00:41'),
(837, 1, 'Login', '2021-05-13', '10:40:45'),
(838, 1, 'Login', '2021-05-13', '10:43:08'),
(839, 1, 'Login', '2021-05-13', '10:46:52'),
(840, 1, 'Login', '2021-05-13', '10:50:03'),
(841, 1, 'Added candidate Isaak Alba to position Treasurer', '2021-05-13', '10:53:43'),
(842, 1, 'Deleted candidate:Isaak from position: Treasurer', '2021-05-13', '10:55:28'),
(843, 1, 'Deleted position:Grade 12 Representative', '2021-05-13', '10:58:55'),
(844, 1, 'Login', '2021-05-13', '12:11:38'),
(845, 1, 'set Election Countdown.', '2021-05-13', '12:12:22'),
(846, 1, 'Logout', '2021-05-13', '13:34:03'),
(847, 1, 'Login', '2021-05-13', '13:50:03'),
(848, 1, 'Logout', '2021-05-13', '13:51:36'),
(849, 1, 'Login', '2021-05-13', '13:51:50'),
(850, 1, 'Logout', '2021-05-13', '13:59:57'),
(851, 1, 'Login', '2021-05-13', '14:08:28'),
(852, 1, 'Login', '2021-05-14', '06:15:13'),
(853, 1, 'Added position:Gradec12 Representative', '2021-05-13', '06:19:29'),
(854, 1, ' Updated position Grade 12 Representative', '2021-05-13', '06:20:09'),
(855, 1, 'Edited candidate Sasha Buenaventura to position Secretary', '2021-05-13', '06:33:02'),
(856, 1, 'Added candidate Anna Gevarra to position Grade 12 Representative', '2021-05-13', '06:35:16'),
(857, 1, 'Edited candidate Anna Gevarra to position Grade 12 Representative', '2021-05-13', '06:35:54'),
(858, 1, 'Deleted candidate:Anna from position: Grade 12 Representative', '2021-05-13', '06:36:18'),
(859, 1, 'Login', '2021-05-14', '11:14:42'),
(860, 1, 'Login', '2021-05-14', '18:25:14'),
(861, 1, 'Login', '2021-05-14', '18:58:32'),
(862, 1, 'Logout', '2021-05-14', '18:58:47'),
(863, 1, 'Allowed:Grade 7 Representative', '2021-05-14', '19:04:47'),
(864, 1, 'Unallowed:Grade 7 Representative', '2021-05-14', '19:04:47'),
(865, 1, 'Logout', '2021-05-14', '19:19:54'),
(866, 1, 'Login', '2021-05-14', '20:16:57'),
(867, 1, 'Logout', '2021-05-14', '20:32:11'),
(868, 1, 'Login', '2021-05-14', '22:37:34'),
(869, 1, 'Logout', '2021-05-14', '22:40:33'),
(870, 1, 'Login', '2021-05-15', '01:47:50'),
(871, 1, 'Login', '2021-05-15', '08:54:42'),
(872, 1, 'Unallowed:Auditor', '2021-05-15', '09:26:42'),
(873, 1, 'Unallowed:Treasurer', '2021-05-15', '09:26:42'),
(874, 1, 'Unallowed:Secretary', '2021-05-15', '09:26:43'),
(875, 1, 'Unallowed:Vice President', '2021-05-15', '09:26:45'),
(876, 1, 'Unallowed:President', '2021-05-15', '09:26:45'),
(877, 1, 'Login', '2021-05-15', '09:56:41'),
(878, 1, 'Allowed:Grade 12 Representative', '2021-05-15', '09:57:23'),
(879, 1, 'Unallowed:Grade 12 Representative', '2021-05-15', '09:57:23'),
(880, 1, 'Allowed:Grade 11 Representative', '2021-05-15', '09:57:24'),
(881, 1, 'Login', '2021-05-15', '09:58:57'),
(882, 1, ' Updated position Vice President', '2021-05-15', '10:05:41'),
(883, 1, ' Updated position Vice President', '2021-05-15', '10:05:57'),
(884, 1, 'Unallowed:Grade 11 Representative', '2021-05-15', '10:09:16'),
(885, 1, 'Allowed:President', '2021-05-15', '10:09:21'),
(886, 1, 'Logout', '2021-05-15', '10:24:22'),
(887, 1, 'Login', '2021-05-15', '10:26:22'),
(888, 1, 'Added position:uwu', '2021-05-15', '10:32:59'),
(889, 1, 'Deleted position:Grade 12 Representative', '2021-05-15', '10:35:28'),
(890, 1, 'Deleted position:Grade 11 Representative', '2021-05-15', '10:35:34'),
(891, 1, 'Login', '2021-05-15', '10:38:39'),
(892, 1, 'Added position:Jabsm', '2021-05-15', '10:39:46'),
(893, 1, 'Deleted position:Jabsm', '2021-05-15', '10:45:16'),
(894, 1, 'Added position:*:#()', '2021-05-15', '10:58:14'),
(895, 1, 'Added position:Morning', '2021-05-15', '10:59:05'),
(896, 1, 'Deleted position:Morning', '2021-05-15', '10:59:27'),
(897, 1, 'Login', '2021-05-15', '11:53:20'),
(898, 1, 'Deleted candidate:Noah from position: President', '2021-05-15', '12:04:39'),
(899, 1, 'Deleted candidate:Sebastiano from position: President', '2021-05-15', '12:04:42'),
(900, 1, 'Deleted candidate:Sasha from position: Secretary', '2021-05-15', '12:04:45'),
(901, 1, 'loaded default positions', '2021-05-15', '12:04:59'),
(902, 1, 'Added candidate Isaak Alba to position President', '2021-05-15', '12:05:32'),
(903, 1, 'Added position:test', '2021-05-15', '12:06:09'),
(904, 1, 'Deleted position:test', '2021-05-15', '12:06:13'),
(905, 1, 'Deleted candidate:Isaak from position: President', '2021-05-15', '12:06:35'),
(906, 1, 'loaded default positions', '2021-05-15', '12:06:45'),
(907, 1, 'Added position:test', '2021-05-15', '12:06:54'),
(908, 1, 'Deleted position:test', '2021-05-15', '12:06:57'),
(909, 1, 'loaded default positions', '2021-05-15', '12:10:08'),
(910, 1, 'Added position:test', '2021-05-15', '12:10:18'),
(911, 1, 'Deleted position:test', '2021-05-15', '12:10:26'),
(912, 1, 'loaded default positions', '2021-05-15', '12:13:00'),
(913, 1, 'Added position:test', '2021-05-15', '12:24:37'),
(914, 1, 'loaded default positions', '2021-05-15', '12:26:50'),
(915, 1, 'Logout', '2021-05-15', '12:47:08'),
(916, 1, 'Login', '2021-05-15', '13:46:58'),
(917, 1, 'Deleted position:Treasurer', '2021-05-15', '13:47:39'),
(918, 1, 'loaded default positions', '2021-05-15', '13:47:48'),
(919, 1, 'Added position:asdsd', '2021-05-15', '13:50:28'),
(920, 1, 'Deleted position:asdsd', '2021-05-15', '13:50:41'),
(921, 1, 'Added candidate Anna Gevarra to position Grade 11 Representative', '2021-05-15', '14:05:37'),
(922, 1, 'Login', '2021-05-15', '14:07:44'),
(923, 1, 'Added candidate Maria Hanway to position Vice President', '2021-05-15', '14:08:31'),
(924, 1, 'Added candidate Marvin Galíndez to position Vice President', '2021-05-15', '14:10:17'),
(925, 1, 'Edited candidate Marvin Galíndez to position Secretary', '2021-05-15', '14:10:42'),
(926, 1, 'Edited candidate Marvin Galíndez to position President', '2021-05-15', '14:22:26'),
(927, 1, 'Added candidate Isaak Alba to position Grade 11 Representative', '2021-05-15', '14:24:07'),
(928, 1, 'Logout', '2021-05-15', '14:52:29'),
(929, 1, 'Login', '2021-05-15', '16:22:50'),
(930, 1, 'Login', '2021-05-15', '16:46:10'),
(931, 1, 'Login', '2021-05-15', '16:46:17'),
(932, 1, 'Added position:Kgjgxh', '2021-05-15', '16:47:56'),
(933, 1, 'Deleted position:Kgjgxh', '2021-05-15', '16:48:18'),
(934, 1, 'Login', '2021-05-15', '16:49:52'),
(935, 1, 'Added position:Jsndk', '2021-05-15', '16:50:48'),
(936, 1, 'Deleted position:Jsndk', '2021-05-15', '16:50:53'),
(937, 1, 'Login', '2021-05-16', '06:03:37'),
(938, 1, 'Added position:hajah', '2021-05-15', '06:04:14'),
(939, 1, 'Deleted position:hajah', '2021-05-15', '06:04:24'),
(940, 1, 'Added candidate Maurice Madrid to position Grade 9 Representative', '2021-05-15', '06:05:30'),
(941, 1, 'Login', '2021-05-16', '06:07:14'),
(942, 1, 'Login', '2021-05-16', '19:57:50'),
(943, 1, 'Login', '2021-05-18', '20:28:35'),
(944, 1, 'Logout', '2021-05-18', '20:29:53'),
(945, 1, 'Login', '2021-05-18', '20:34:10');

-- --------------------------------------------------------

--
-- Table structure for table `archive`
--

CREATE TABLE `archive` (
  `archive_id` int(11) NOT NULL,
  `position_name` varchar(50) NOT NULL,
  `winner_fname` varchar(30) NOT NULL,
  `winner_mname` varchar(30) NOT NULL,
  `winner_lname` varchar(30) NOT NULL,
  `school_year` datetime NOT NULL,
  `platform_info` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `archive`
--

INSERT INTO `archive` (`archive_id`, `position_name`, `winner_fname`, `winner_mname`, `winner_lname`, `school_year`, `platform_info`) VALUES
(1, 'President', 'Jose Protacio ', 'Alonzo-Realonda', 'Rizal-Mercado', '2021-03-09 14:28:51', 'Hello');

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
  `platform_info` varchar(500) NOT NULL,
  `credentials` varchar(500) NOT NULL,
  `photo` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `candidate`
--

INSERT INTO `candidate` (`candidate_id`, `student_id`, `position_id`, `total_votes`, `party_name`, `platform_info`, `credentials`, `photo`) VALUES
(60, 12, 10, 0, 'uwu', 'uwu', 'uwu', ''),
(61, 1, 2, 0, 'Dilaw', 'Jqkdbd', 'Kaghsndn', ''),
(62, 23, 1, 0, 'hihi', 'hihi', 'hihi', ''),
(63, 3, 10, 0, 'w', 'w', 'w', ''),
(64, 21, 8, 0, 'hakaam', 'bajsjs', 'kqnals', '');

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
(1, 2, 'President', 'The head of the Supreme Student Government.', 1),
(2, 3, 'Vice President', 'Supports the President and will assume the presidency if the President resigns.', 1),
(3, 4, 'Secretary', 'In charge of organization correspondence and document keeping.', 1),
(4, 5, 'Treasurer', 'Financial officer in charge of book keeping organization expenses, income and savings.', 1),
(5, 6, 'Auditor', 'Audits the financial records of the treasurer.', 1),
(6, 7, 'Grade 7 Representative', 'Represents the voice of the Grade 7 students.', 0),
(7, 8, 'Grade 8 Representative', 'Represents the voice of the Grade 8 students.', 0),
(8, 9, 'Grade 9 Representative', 'Represents the voice of Grade 9 students.', 0),
(9, 10, 'Grade 10 Representative', 'Represents the voice of the Grade 10 students.', 0),
(10, 11, 'Grade 11 Representative', 'Represents the voice of the Grade 11 students.', 0),
(11, 12, 'Grade 12 Representative', 'Represents the voice of the Grade 12 students.', 0);

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
  `otp` varchar(500) NOT NULL,
  `voting_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `fname`, `Mname`, `lname`, `gender`, `bumail`, `grade_level`, `otp`, `voting_status`) VALUES
(1, 'Maria', 'Madrona', 'Hanway', 'female', 'dhanjaphetverastigue.ador@bicol-u.edu.ph', 7, '352378', 1),
(2, 'Ariel', 'Bilal', 'Ongpauco', 'male', 'jessicaarimado.ajero@bicol-u.edu.ph', 10, '719453', 0),
(3, 'Isaak', 'Pildilapil', 'Alba', 'male', 'gaybaraquiel.alarcon@bicol-u.edu.ph', 11, '117753', 0),
(4, 'Braedon', 'Lozo', 'Sibug', 'male', 'johnpaulrenevo.asis@bicol-u.edu.ph', 9, '359382', 0),
(5, 'Julien', 'Cader', 'Puno', 'female', 'johnpauljaynario.azore@bicol-u.edu.ph', 9, '972395', 1),
(6, 'John Wesley', '', 'Atega', 'male', 'kayceelanuza.ballesteros@bicol-u.edu.ph', 7, '455531', 0),
(7, 'Jerrald', 'Dura', 'Macatangay', 'male', 'benazirgratela.barrameda@bicol-u.edu.ph', 8, '177468', 0),
(8, 'Adrian', 'Gallora', 'Balangao', 'male', 'stevenandreibansagale.barrios@bicol-u.edu.ph', 11, '433135', 0),
(9, 'Ken', 'Sison', 'Padilla', 'male', 'kerbymaravilla.bartolay@bicol-u.edu.ph', 11, '794527', 1),
(10, 'Horencia', 'Lopa', 'Santiago', 'female', 'christopherbariso.belen@bicol-u.edu.ph', 12, '587436', 1),
(11, 'Mason', 'Felix', 'Montejo', 'male', 'maedeljoicebercasio.castro@bicol-u.edu.ph', 8, '443586', 1),
(12, 'Anna', 'Lacsamana', 'Gevarra', 'female', 'joshuaisaiahmendez.codorniz@bicol-u.edu.ph', 9, '464678', 0),
(13, 'Trevon', 'Daquan', 'Magnaye', 'male', 'janharoldlandicho.delacruz@bicol-u.edu.ph', 7, '319424', 0),
(14, 'Abigail', 'Subrabas', 'Mipa', 'female', 'josedavidmapusao.delossantos@bicol-u.edu.ph', 10, '136646', 1),
(15, 'Sasha', 'Macalipay', 'Buenaventura', 'female', 'carlosgabrielendaya.delrosario@bicol-u.edu.ph', 8, '291571', 0),
(16, 'Noah', 'Moxcir', 'Solas', 'male', 'christianangelodimaano.diesta@bicol-u.edu.ph', 7, '744312', 0),
(17, 'Alliah', 'Lanta', 'Bataller', 'female', 'maveronicasequitin.gallos@bicol-u.edu.ph', 7, '653494', 0),
(18, 'Martin', 'Estevan', 'Pamintuan', 'male', 'mikaellalubiano.jarapa@bicol-u.edu.ph', 7, '391339', 0),
(19, 'Josefa', 'Talon', 'Vicente', 'female', 'iveelozano.jintalan@bicol-u.edu.ph', 8, '827895', 1),
(20, 'Danilo', '', 'Medina', 'male', 'joshuaalexinsuya.llander@bicol-u.edu.ph', 8, '162997', 1),
(21, 'Maurice', 'Clark', 'Madrid', 'female', 'jonjayvegonzales.llaneta@bicol-u.edu.ph', 8, '194298', 0),
(22, 'Sebastiano', 'Gubat', 'Etrone', 'male', 'jaydechosa.majadas@bicol-u.edu.ph', 9, '295547', 0),
(23, 'Marvin', 'Cayco', 'Galíndez', 'male', 'allianahgaile.malate@bicol-u.edu.ph', 9, '175258', 0),
(24, 'Christy Mae', 'Lotivio', 'Sy', 'female', 'mendrixclarianes.manlangit@bicol-u.edu.ph', 11, '727591', 0),
(25, 'Neo', 'Tuico', 'Hermano', 'female', 'johnkennethestipona.maronilla@bicol-u.edu.ph', 11, '442944', 0),
(26, 'Jazmine', '', 'Lim', 'female', 'darlene.rogero@bicol-u.edu.ph', 12, '982739', 0),
(27, 'Gabriella', 'Regidor', 'Briones', 'female', 'krishalouisesanjose.munoz@bicol-u.edu.ph', 12, '635392', 0),
(28, 'Renz', 'Borras', 'Duclayan', 'male', 'alyssamaecezar.olano@bicol-u.edu.ph', 11, '321142', 0),
(29, 'Nicole', '', 'Tiansay', 'female', 'keenbarrameda.padilla@bicol-u.edu.ph', 9, '464619', 0),
(30, 'Kai', 'Batumbakal', 'Guiriba', 'male', 'lizellearcos.penarubia@bicol-u.edu.ph', 8, '731349', 0),
(31, 'Lila', 'Rodriguez', 'Litana', 'female', 'karlorhommelchua.staana@bicol-u.edu.ph', 10, '839847', 1),
(32, 'Rodrigo', 'Bongo', 'Roque', 'male', 'kathrindenisemontallana.taclas@bicol-u.edu.ph', 12, '468896', 1),
(33, 'Lil', '', 'Eminem', 'female', 'ricamae.vega@bicol-u.edu.ph', 11, '599861', 0);

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
(192, 16, 'Login', '2021-05-12', '13:47:45'),
(193, 5, 'Logout', '2021-05-12', '13:48:37'),
(194, 16, 'Logout', '2021-05-12', '13:48:44'),
(195, 20, 'Login', '2021-05-12', '13:48:50'),
(196, 20, 'Logout', '2021-05-12', '13:49:15'),
(197, 5, 'Login', '2021-05-12', '13:49:15'),
(198, 32, 'Logout', '2021-05-12', '14:03:42'),
(199, 32, 'Login', '2021-05-12', '14:03:52'),
(200, 11, 'Logout', '2021-05-12', '14:14:08'),
(201, 11, 'Login', '2021-05-12', '14:14:25'),
(202, 10, 'Login', '2021-05-12', '14:15:52'),
(203, 1, 'Login', '2021-05-12', '14:16:14'),
(204, 19, 'Login', '2021-05-12', '14:16:27'),
(205, 20, 'Login', '2021-05-12', '14:16:29'),
(206, 14, 'Login', '2021-05-12', '14:16:37'),
(207, 31, 'Login', '2021-05-12', '14:17:13'),
(208, 9, 'Login', '2021-05-12', '14:18:20'),
(209, 9, 'Login', '2021-05-12', '14:19:10'),
(210, 3, 'Login', '2021-05-12', '14:19:38'),
(211, 4, 'Login', '2021-05-12', '14:20:38'),
(212, 32, 'Logout', '2021-05-12', '14:34:07'),
(213, 13, 'Login', '2021-05-12', '15:11:11'),
(214, 13, 'Logout', '2021-05-12', '15:12:21'),
(215, 5, 'Logout', '2021-05-12', '16:15:38'),
(216, 5, 'Login', '2021-05-12', '16:15:50'),
(217, 20, 'Logout', '2021-05-12', '16:42:59'),
(218, 25, 'Login', '2021-05-13', '00:55:14'),
(219, 25, 'Logout', '2021-05-13', '00:59:18'),
(220, 3, 'Logout', '2021-05-13', '10:17:36'),
(221, 25, 'Login', '2021-05-13', '14:00:18'),
(222, 25, 'Logout', '2021-05-13', '14:08:06'),
(223, 7, 'Login', '2021-05-15', '13:58:22');

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
  `end_date` datetime NOT NULL
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
  ADD PRIMARY KEY (`archive_id`);

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
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `admin_activity_log`
--
ALTER TABLE `admin_activity_log`
  MODIFY `activity_log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=946;

--
-- AUTO_INCREMENT for table `archive`
--
ALTER TABLE `archive`
  MODIFY `archive_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `candidate`
--
ALTER TABLE `candidate`
  MODIFY `candidate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `candidate_position`
--
ALTER TABLE `candidate_position`
  MODIFY `position_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123456131;

--
-- AUTO_INCREMENT for table `student_access_log`
--
ALTER TABLE `student_access_log`
  MODIFY `access_log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=224;

--
-- AUTO_INCREMENT for table `vote`
--
ALTER TABLE `vote`
  MODIFY `vote_log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

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
