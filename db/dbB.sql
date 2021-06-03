-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 03, 2021 at 11:20 AM
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

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_fname`, `admin_mname`, `admin_lname`, `admin_position`, `comelec_position`, `username`, `password`, `photo`, `reg_date`, `eSignature`) VALUES
(1, 'John', 'Dela Cruz', 'Cena', 'Head Admin', 'Adviser', 'Cena_Adviser', 'admin', '../../user/img/60ad3e79def400.76385195.jpg', '2021-06-01 11:59:13', '../user/sig/0-Sig3.png'),
(2, 'Tomas', 'Mutya', 'Sarsa', 'Admin', 'Chairperson', 'Sarsa_Chairperson', 'admin', '../../user/img/60ac5a5f283949.23455842.jpg', '2021-05-26 04:00:45', '../user/sig/0-Sig4.jpg'),
(3, 'Ariel', 'Bilal', 'Oñgpauco', 'Admin', 'Co-Chairperson', 'Ongpauco_CoChair', 'admin', '../../user/img/60ac5a9ab74da7.55193577.jpg', '2021-05-25 17:38:43', '../user/sig/0-Sig2.jpg'),
(11, 'Steve', 'Carter', 'Rogers', 'Admin', 'Board Member', 'Rogers_Member', 'peggy70!', '../../user/img/60ad07a5df7102.90446062.jpg', '2021-05-26 05:42:07', '');

-- --------------------------------------------------------

--
-- Table structure for table `admin_activity_log`
--

--
-- Dumping data for table `admin_activity_log`
--

INSERT INTO `admin_activity_log` (`activity_log_id`, `admin_id`, `activity_description`, `activity_date`, `activity_time`) VALUES
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
(945, 1, 'Login', '2021-05-18', '20:34:10'),
(946, 1, 'Login', '2021-05-19', '00:09:18'),
(947, 1, 'Logout', '2021-05-19', '00:10:34'),
(948, 1, 'Login', '2021-05-19', '00:17:49'),
(949, 1, 'Login', '2021-05-19', '17:59:46'),
(950, 1, 'Login', '2021-05-20', '10:38:10'),
(951, 1, 'Added candidate Noah Solas to position President', '2021-05-20', '10:39:46'),
(952, 1, 'Login', '2021-05-20', '18:54:24'),
(953, 1, 'Login', '2021-05-21', '15:46:53'),
(954, 1, 'Logout', '2021-05-21', '16:02:27'),
(955, 1, 'Login', '2021-05-21', '16:18:51'),
(956, 1, 'Login', '2021-05-22', '00:13:09'),
(957, 1, 'Login', '2021-05-22', '15:46:22'),
(958, 1, 'Login', '2021-05-22', '17:15:47'),
(959, 1, 'Login', '2021-05-22', '17:36:31'),
(960, 1, 'Logout', '2021-05-22', '17:39:10'),
(961, 1, 'Login', '2021-05-22', '17:42:56'),
(962, 1, 'Login', '2021-05-22', '17:47:00'),
(963, 1, 'Login', '2021-05-22', '17:48:28'),
(964, 1, 'Login', '2021-05-22', '17:49:41'),
(965, 1, 'Login', '2021-05-22', '17:53:27'),
(966, 1, 'Logout', '2021-05-22', '18:18:32'),
(967, 1, 'Logout', '2021-05-22', '18:20:17'),
(968, 1, 'Login', '2021-05-22', '18:29:58'),
(969, 1, 'Logout', '2021-05-22', '18:45:12'),
(970, 1, 'updated Admin Account : admin@email.com', '2021-05-22', '18:54:11'),
(971, 1, 'Logout', '2021-05-22', '18:54:42'),
(972, 1, 'Login', '2021-05-22', '18:55:37'),
(973, 1, 'updated Admin Account : admin@email.com', '2021-05-22', '18:56:13'),
(974, 1, 'Logout', '2021-05-22', '19:00:04'),
(975, 1, 'Login', '2021-05-22', '19:00:08'),
(976, 1, 'Login', '2021-05-22', '19:02:27'),
(977, 1, 'Login', '2021-05-22', '19:05:07'),
(978, 1, 'Login', '2021-05-22', '19:06:30'),
(979, 1, 'created Admin Account : Rawr_Comelec', '2021-05-22', '19:07:40'),
(980, 1, 'created Admin Account : IronMan', '2021-05-22', '19:10:09'),
(981, 1, 'updated Admin Account : taclaskathrindenise@gmail.com', '2021-05-22', '19:10:56'),
(982, 1, 'updated Admin Account : stebo1034@gmail.com', '2021-05-22', '19:11:20'),
(983, 1, 'Logout', '2021-05-22', '19:15:28'),
(984, 1, 'updated Info of Student : 32', '2021-05-22', '19:17:19'),
(985, 1, 'Logout', '2021-05-22', '19:19:17'),
(986, 1, 'Login', '2021-05-22', '19:20:00'),
(987, 1, 'Login', '2021-05-22', '19:20:04'),
(988, 1, 'Logout', '2021-05-22', '19:20:06'),
(989, 1, 'Login', '2021-05-22', '19:20:25'),
(990, 1, 'Login', '2021-05-22', '19:22:34'),
(991, 1, 'Login', '2021-05-22', '19:25:36'),
(992, 1, 'deleted Info of Student : 32', '2021-05-22', '19:31:41'),
(993, 1, 'deleted Info of Student : 2', '2021-05-22', '19:32:00'),
(994, 1, 'Login', '2021-05-22', '19:32:12'),
(995, 1, 'Logout', '2021-05-22', '19:42:17'),
(996, 1, 'loaded default positions', '2021-05-22', '19:48:56'),
(997, 1, 'Deleted position:President', '2021-05-22', '19:49:02'),
(998, 1, 'loaded default positions', '2021-05-22', '19:49:14'),
(999, 1, 'Deleted position:President', '2021-05-22', '19:49:48'),
(1000, 1, 'loaded default positions', '2021-05-22', '19:54:10'),
(1001, 1, 'Unallowed:Auditor', '2021-05-22', '19:54:22'),
(1002, 1, 'Unallowed:Treasurer', '2021-05-22', '19:54:22'),
(1003, 1, 'Unallowed:Vice President', '2021-05-22', '19:54:24'),
(1004, 1, 'Unallowed:President', '2021-05-22', '19:54:26'),
(1005, 1, 'Unallowed:Secretary', '2021-05-22', '19:54:26'),
(1006, 1, 'Allowed:President', '2021-05-22', '19:54:34'),
(1007, 1, 'Allowed:Vice President', '2021-05-22', '19:54:35'),
(1008, 1, 'Allowed:Secretary', '2021-05-22', '19:54:35'),
(1009, 1, 'Allowed:Treasurer', '2021-05-22', '19:54:35'),
(1010, 1, 'Added position:CEO', '2021-05-22', '19:54:50'),
(1011, 1, 'Deleted position:CEO', '2021-05-22', '19:54:58'),
(1012, 1, 'Added position:asd', '2021-05-22', '19:55:22'),
(1013, 1, 'Deleted position:asd', '2021-05-22', '19:55:37'),
(1014, 1, 'loaded default positions', '2021-05-22', '19:55:49'),
(1015, 1, 'Login', '2021-05-22', '19:56:21'),
(1016, 1, 'Deleted position:Vice President', '2021-05-22', '19:56:34'),
(1017, 1, 'loaded default positions', '2021-05-22', '19:56:55'),
(1018, 1, 'Deleted position:President', '2021-05-22', '19:57:28'),
(1019, 1, 'Deleted position:Vice President', '2021-05-22', '19:57:39'),
(1020, 1, 'loaded default positions', '2021-05-22', '19:57:45'),
(1021, 1, 'Deleted position:President', '2021-05-22', '19:57:51'),
(1022, 1, 'Unallowed:Vice President', '2021-05-22', '19:58:28'),
(1023, 1, 'Allowed:Vice President', '2021-05-22', '19:58:29'),
(1024, 1, 'Login', '2021-05-22', '20:00:29'),
(1025, 1, 'Deleted position:Vice President', '2021-05-22', '20:00:55'),
(1026, 1, 'loaded default positions', '2021-05-22', '20:00:59'),
(1027, 1, ' Updated position Treasurer', '2021-05-22', '20:02:42'),
(1028, 1, ' Updated position Treasurer', '2021-05-22', '20:03:04'),
(1029, 1, ' Updated position Treasurer', '2021-05-22', '20:03:13'),
(1030, 1, 'Allowed:Grade 7 Representative', '2021-05-22', '20:03:23'),
(1031, 1, 'Allowed:Grade 8 Representative', '2021-05-22', '20:03:24'),
(1032, 1, 'Allowed:Grade 9 Representative', '2021-05-22', '20:03:24'),
(1033, 1, 'Unallowed:Grade 9 Representative', '2021-05-22', '20:03:29'),
(1034, 1, 'Unallowed:Grade 8 Representative', '2021-05-22', '20:03:29'),
(1035, 1, 'Unallowed:Grade 7 Representative', '2021-05-22', '20:03:30'),
(1036, 1, 'Login', '2021-05-22', '20:07:12'),
(1037, 1, 'Added candidate John Wesley Atega to position Treasurer', '2021-05-22', '20:17:18'),
(1038, 1, 'Added candidate Isaak Alba to position Treasurer', '2021-05-22', '20:17:31'),
(1039, 1, 'Logout', '2021-05-22', '20:18:23'),
(1040, 1, 'Logout', '2021-05-22', '20:18:52'),
(1041, 1, 'Added candidate Alliah Bataller to position Grade 7 Representative', '2021-05-22', '20:20:15'),
(1042, 1, 'Login', '2021-05-22', '20:22:52'),
(1043, 1, 'Edited candidate John Wesley Atega to position Treasurer', '2021-05-22', '20:22:53'),
(1044, 1, 'Added candidate Neo Hermano to position Grade 7 Representative', '2021-05-22', '20:23:30'),
(1045, 1, 'Deleted candidate:Neo from position: Grade 7 Representative', '2021-05-22', '20:23:41'),
(1046, 1, 'Logout', '2021-05-22', '20:36:03'),
(1047, 1, 'Logout', '2021-05-22', '20:37:45'),
(1048, 1, 'set Election Countdown.', '2021-05-22', '20:42:39'),
(1049, 1, 'set Election Countdown.', '2021-05-22', '20:45:39'),
(1050, 1, 'Login', '2021-05-22', '20:49:08'),
(1051, 1, 'Logout', '2021-05-22', '20:51:29'),
(1052, 1, 'set Election Countdown.', '2021-05-22', '20:58:01'),
(1053, 1, 'Login', '2021-05-22', '21:07:43'),
(1054, 1, 'set Election Countdown.', '2021-05-22', '21:09:18'),
(1055, 1, 'Login', '2021-05-22', '21:22:30'),
(1056, 1, 'Logout', '2021-05-22', '21:22:41'),
(1057, 1, 'Login', '2021-05-22', '21:24:11'),
(1058, 1, 'Logout', '2021-05-22', '21:32:20'),
(1059, 1, 'Added candidate Mason Montejo to position Treasurer', '2021-05-22', '21:37:40'),
(1060, 1, 'Login', '2021-05-22', '21:37:49'),
(1061, 1, 'Login', '2021-05-22', '21:53:55'),
(1062, 1, 'Login', '2021-05-22', '21:57:51'),
(1063, 1, 'Login', '2021-05-22', '22:03:08'),
(1064, 1, 'Login', '2021-05-22', '22:08:11'),
(1065, 1, 'Login', '2021-05-22', '22:11:13'),
(1066, 1, 'Logout', '2021-05-22', '22:20:29'),
(1067, 1, 'Login', '2021-05-22', '22:24:52'),
(1068, 1, 'Login', '2021-05-22', '22:27:57'),
(1069, 1, 'Logout', '2021-05-22', '22:28:48'),
(1070, 1, 'Login', '2021-05-22', '22:29:11'),
(1071, 1, 'Logout', '2021-05-22', '22:31:20'),
(1072, 1, 'Logout', '2021-05-22', '22:31:48'),
(1073, 1, 'Login', '2021-05-22', '22:40:35'),
(1074, 1, 'Logout', '2021-05-22', '22:41:39'),
(1075, 1, 'Login', '2021-05-22', '22:44:08'),
(1076, 1, 'Login', '2021-05-22', '22:46:34'),
(1077, 1, 'set Election Countdown.', '2021-05-22', '22:50:16'),
(1078, 1, 'Login', '2021-05-22', '22:55:24'),
(1079, 1, 'Login', '2021-05-22', '22:58:10'),
(1080, 1, 'updated Info of Student : 1', '2021-05-22', '22:58:33'),
(1081, 1, 'deleted Info of Student : 15', '2021-05-22', '23:12:54'),
(1082, 1, 'Logout', '2021-05-22', '23:20:43'),
(1083, 1, 'updated Info of Student : 33', '2021-05-22', '23:23:51'),
(1084, 1, 'Login', '2021-05-22', '23:29:49'),
(1085, 1, 'Login', '2021-05-22', '23:29:51'),
(1086, 1, 'Login', '2021-05-22', '23:30:28'),
(1087, 1, 'deleted Info of Student : 34', '2021-05-22', '23:31:55'),
(1088, 1, 'Login', '2021-05-22', '23:32:35'),
(1089, 1, 'Login', '2021-05-22', '23:35:56'),
(1090, 1, 'updated Info of Student : 37', '2021-05-22', '23:40:09'),
(1091, 1, 'Login', '2021-05-22', '23:46:34'),
(1092, 1, 'deleted Info of Student : 36', '2021-05-22', '23:48:32'),
(1093, 1, 'deleted Info of Student : 36', '2021-05-22', '23:55:32'),
(1094, 1, 'Logout', '2021-05-23', '00:07:09'),
(1095, 1, 'Logout', '2021-05-23', '12:08:15'),
(1096, 1, 'Login', '2021-05-23', '12:09:16'),
(1097, 1, 'set Election Countdown.', '2021-05-23', '12:10:46'),
(1098, 1, 'set Election Countdown.', '2021-05-23', '12:24:03'),
(1099, 1, 'updated Info of Student : 1', '2021-05-23', '12:36:09'),
(1100, 1, 'updated Info of Student : 1', '2021-05-23', '12:36:24'),
(1101, 1, 'updated Info of Student : 1', '2021-05-23', '12:36:42'),
(1102, 1, 'updated Info of Student : 1', '2021-05-23', '12:37:15'),
(1103, 1, 'updated Info of Student : 2', '2021-05-23', '12:37:59'),
(1104, 1, 'updated Info of Student : 9', '2021-05-23', '12:50:23'),
(1105, 1, 'updated Info of Student : 9', '2021-05-23', '12:51:02'),
(1106, 1, 'Logout', '2021-05-23', '12:58:03'),
(1107, 1, 'Login', '2021-05-23', '12:58:12'),
(1108, 1, 'set Election Countdown.', '2021-05-23', '12:58:45'),
(1109, 1, 'Logout', '2021-05-23', '12:58:52'),
(1110, 1, 'Login', '2021-05-23', '12:59:25'),
(1111, 1, 'set Election Countdown.', '2021-05-23', '12:59:48'),
(1112, 1, 'loaded default positions', '2021-05-23', '13:10:00'),
(1113, 1, 'Login', '2021-05-23', '13:10:22'),
(1114, 1, 'set Election Countdown.', '2021-05-23', '13:11:52'),
(1115, 1, 'Added candidate Horencia Santiago to position President', '2021-05-23', '13:12:28'),
(1116, 1, 'Added candidate Adrian Balangao to position Auditor', '2021-05-23', '13:12:49'),
(1117, 1, 'Logout', '2021-05-23', '13:13:35'),
(1118, 1, 'Added candidate Braedon Sibug to position President', '2021-05-23', '13:14:03'),
(1119, 1, 'Edited candidate Braedon Sibug to position President', '2021-05-23', '13:14:41'),
(1120, 1, 'Edited candidate Braedon Sibug to position President', '2021-05-23', '13:14:52'),
(1121, 1, 'Added candidate Isaak Alba to position Grade 7 Representative', '2021-05-23', '13:15:17'),
(1122, 1, 'Login', '2021-05-23', '13:15:26'),
(1123, 1, 'set Election Countdown.', '2021-05-23', '13:15:55'),
(1124, 1, 'Logout', '2021-05-23', '13:16:21'),
(1125, 1, 'Login', '2021-05-23', '13:17:34'),
(1126, 1, 'Logout', '2021-05-23', '13:19:41'),
(1127, 1, 'Login', '2021-05-23', '13:29:16'),
(1128, 1, 'Logout', '2021-05-23', '13:31:16'),
(1129, 1, 'Login', '2021-05-23', '13:32:01'),
(1130, 1, 'Logout', '2021-05-23', '13:32:33'),
(1131, 1, 'Logout', '2021-05-23', '13:34:52'),
(1132, 1, 'Login', '2021-05-23', '18:15:19'),
(1133, 1, 'Logout', '2021-05-23', '19:29:27'),
(1134, 1, 'Login', '2021-05-23', '19:43:50'),
(1135, 1, 'Login', '2021-05-23', '20:29:58'),
(1136, 1, 'set Election Countdown.', '2021-05-23', '20:32:29'),
(1137, 1, 'Logout', '2021-05-23', '20:51:39'),
(1138, 1, 'Login', '2021-05-24', '04:05:29'),
(1139, 1, 'Logout', '2021-05-24', '04:21:48'),
(1140, 1, 'Login', '2021-05-24', '11:28:08'),
(1141, 1, 'set Election Countdown.', '2021-05-24', '11:34:56'),
(1142, 1, 'Logout', '2021-05-24', '11:36:26'),
(1143, 1, 'Login', '2021-05-24', '11:36:44'),
(1144, 1, 'updated Info of Student : 9', '2021-05-24', '11:39:17'),
(1145, 1, 'updated Info of Student : 10', '2021-05-24', '11:43:05'),
(1146, 1, 'updated Info of Student : 10', '2021-05-24', '11:45:26'),
(1147, 1, 'updated Info of Student : 10', '2021-05-24', '11:46:13'),
(1148, 1, 'updated Info of Student : 10', '2021-05-24', '11:48:14'),
(1149, 1, 'Logout', '2021-05-24', '12:03:16'),
(1150, 1, 'Login', '2021-05-24', '12:03:28'),
(1151, 1, 'updated Info of Student : 10', '2021-05-24', '12:04:23'),
(1152, 1, 'Logout', '2021-05-24', '12:19:25'),
(1153, 1, 'Login', '2021-05-24', '20:30:14'),
(1154, 1, 'updated Info of Student : 10', '2021-05-24', '20:35:17'),
(1155, 1, 'updated Info of Student : 10', '2021-05-24', '20:35:42'),
(1156, 1, 'Login', '2021-05-24', '20:35:59'),
(1157, 1, 'Login', '2021-05-24', '20:45:01'),
(1158, 1, 'Logout', '2021-05-24', '20:50:45'),
(1159, 1, 'Login', '2021-05-24', '21:26:14'),
(1160, 1, 'Logout', '2021-05-24', '22:24:23'),
(1161, 1, 'Login', '2021-05-25', '02:34:46'),
(1162, 1, 'deleted Info of Student : 3', '2021-05-25', '02:38:56'),
(1163, 1, 'Logout', '2021-05-25', '09:34:01'),
(1164, 1, 'Login', '2021-05-25', '09:43:19'),
(1165, 1, 'updated Info of Student : 16', '2021-05-25', '09:44:04'),
(1166, 1, 'updated Admin Account : Cena_Adviser', '2021-05-25', '09:59:22'),
(1167, 1, 'Logout', '2021-05-25', '09:59:34'),
(1168, 1, 'Login', '2021-05-25', '09:59:47'),
(1169, 1, 'updated Admin Account : Sarsa_Chairperson', '2021-05-25', '10:01:03'),
(1170, 1, 'updated Admin Account : Sarsa_Chairperson', '2021-05-25', '10:01:17'),
(1171, 1, 'updated Admin Account : Ongpauco_CoChair', '2021-05-25', '10:02:02'),
(1172, 1, 'updated Admin Account : Alba_Member', '2021-05-25', '10:03:07'),
(1173, 1, 'created Admin Account : Stark_Member', '2021-05-25', '10:05:24'),
(1174, 1, 'Logout', '2021-05-25', '10:06:31'),
(1175, 2, 'Login', '2021-05-25', '10:06:42'),
(1176, 2, 'Logout', '2021-05-25', '10:06:56'),
(1177, 1, 'Login', '2021-05-25', '10:07:43'),
(1178, 1, 'updated Info of Student : 35', '2021-05-25', '10:20:40'),
(1179, 1, 'deleted Info of Student : 35', '2021-05-25', '10:21:14'),
(1180, 1, 'deleted Info of Student : 35', '2021-05-25', '10:24:41'),
(1181, 1, 'deleted Info of Student : 35', '2021-05-25', '10:28:58'),
(1182, 1, 'deleted Info of Student : 36', '2021-05-25', '10:29:13'),
(1183, 1, 'Login', '2021-05-25', '10:33:56'),
(1184, 1, 'Logout', '2021-05-25', '11:02:16'),
(1185, 1, ' Updated position VPresident', '2021-05-25', '11:05:39'),
(1186, 1, ' Updated position VPresident', '2021-05-25', '11:05:51'),
(1187, 1, 'Added position:President', '2021-05-25', '11:06:12'),
(1188, 1, 'Added position:CEO', '2021-05-25', '11:06:30'),
(1189, 1, 'Deleted position:CEO', '2021-05-25', '11:06:38'),
(1190, 1, 'Unallowed:President', '2021-05-25', '11:07:21'),
(1191, 1, 'loaded default positions', '2021-05-25', '11:07:28'),
(1192, 1, 'Added candidate Isaak Alba to position President', '2021-05-25', '11:08:22'),
(1193, 1, 'Login', '2021-05-25', '11:11:23'),
(1194, 1, 'Added candidate Maria Hañway to position President', '2021-05-25', '11:12:05'),
(1195, 1, 'Edited candidate Maria Hañway to position President', '2021-05-25', '11:13:14'),
(1196, 1, 'Deleted candidate:Maria from position: President', '2021-05-25', '11:13:33'),
(1197, 1, 'Added candidate Sasha Buenaventura to position President', '2021-05-25', '11:14:56'),
(1198, 1, 'Added candidate Maria Hañway to position Vice President', '2021-05-25', '11:17:37'),
(1199, 1, 'Deleted candidate:Maria from position: Vice President', '2021-05-25', '11:17:42'),
(1200, 1, 'Added candidate Maria Hañway to position Vice President', '2021-05-25', '11:18:28'),
(1201, 1, 'Added candidate Mason Montejo to position Grade 7 Representative', '2021-05-25', '11:18:57'),
(1202, 1, 'Added candidate Alliah Bataller to position Grade 12 Representative', '2021-05-25', '11:19:22'),
(1203, 1, 'Login', '2021-05-25', '11:31:14'),
(1204, 1, 'updated Info of Student : 1', '2021-05-25', '11:31:26'),
(1205, 1, 'Login', '2021-05-25', '11:31:33'),
(1206, 1, 'Logout', '2021-05-25', '11:31:52'),
(1207, 1, 'Login', '2021-05-25', '12:49:37'),
(1208, 1, 'Login', '2021-05-25', '12:59:27'),
(1209, 1, 'Login', '2021-05-25', '12:59:57'),
(1210, 1, 'Login', '2021-05-25', '13:00:14'),
(1211, 1, 'Logout', '2021-05-25', '13:05:41'),
(1212, 1, 'Logout', '2021-05-25', '13:18:30'),
(1213, 1, 'Login', '2021-05-25', '13:26:07'),
(1214, 1, 'Login', '2021-05-25', '13:26:17'),
(1215, 1, 'Login', '2021-05-25', '13:26:20'),
(1216, 1, 'Login', '2021-05-25', '13:26:43'),
(1217, 1, 'Login', '2021-05-25', '13:27:05'),
(1218, 1, 'Login', '2021-05-25', '13:28:33'),
(1219, 1, 'Deleted position:Grade 11 Representative', '2021-05-25', '13:28:52'),
(1220, 1, 'Login', '2021-05-25', '13:44:59'),
(1221, 1, 'Logout', '2021-05-25', '13:46:31'),
(1222, 1, 'Logout', '2021-05-25', '13:48:03'),
(1223, 1, 'Login', '2021-05-25', '13:48:13'),
(1224, 1, 'Login', '2021-05-25', '13:48:23'),
(1225, 1, 'Login', '2021-05-25', '13:48:25'),
(1226, 1, 'Logout', '2021-05-25', '13:48:31'),
(1227, 1, 'Login', '2021-05-25', '13:48:48'),
(1228, 1, 'Login', '2021-05-25', '13:48:49'),
(1229, 1, 'Login', '2021-05-25', '13:48:50'),
(1230, 1, 'Login', '2021-05-25', '13:49:13'),
(1231, 1, 'Login', '2021-05-25', '13:55:05'),
(1232, 1, 'updated Info of Student : 1', '2021-05-25', '13:56:59'),
(1233, 1, 'Login', '2021-05-25', '13:57:03'),
(1234, 1, 'created Admin Account : Bdkdkd', '2021-05-25', '13:57:08'),
(1235, 1, 'created Admin Account : MJ_Comelec', '2021-05-25', '14:01:34'),
(1236, 1, 'Logout', '2021-05-25', '14:03:18'),
(1237, 1, 'Login', '2021-05-25', '14:05:01'),
(1238, 1, 'updated Admin Account : Sarsa_Chairperson', '2021-05-25', '14:05:30'),
(1239, 1, 'updated Admin Account : Sarsa_Chairperson', '2021-05-25', '14:05:40'),
(1240, 1, 'created Admin Account : Stark_Member', '2021-05-25', '14:06:46'),
(1241, 1, 'created Admin Account : Stark_Member', '2021-05-25', '14:06:48'),
(1242, 1, 'Logout', '2021-05-25', '14:18:32'),
(1243, 1, 'Login', '2021-05-25', '14:18:45'),
(1244, 1, 'Logout', '2021-05-25', '14:20:45'),
(1245, 1, 'Login', '2021-05-25', '14:21:44'),
(1246, 1, 'created Admin Account : fgh', '2021-05-25', '14:22:31'),
(1247, 1, 'Added candidate Josefa Vicente to position President', '2021-05-25', '14:24:16'),
(1248, 1, 'Login', '2021-05-25', '14:24:19'),
(1249, 1, 'Edited candidate Josefa Vicente to position President', '2021-05-25', '14:26:16'),
(1250, 1, ' Updated position President', '2021-05-25', '14:27:19'),
(1251, 1, 'Login', '2021-05-25', '14:27:54'),
(1252, 1, 'created Admin Account : try_comelec', '2021-05-25', '14:28:02'),
(1253, 1, 'Logout', '2021-05-25', '14:29:00'),
(1254, 1, 'created Admin Account : try_comelec', '2021-05-25', '14:45:19'),
(1255, 1, 'Login', '2021-05-25', '18:07:23'),
(1256, 1, 'Login', '2021-05-25', '18:18:50'),
(1257, 1, 'Login', '2021-05-25', '19:41:15'),
(1258, 1, 'Login', '2021-05-25', '19:46:58'),
(1259, 1, 'created Admin Account : try_comelec', '2021-05-25', '19:48:56'),
(1260, 1, 'Logout', '2021-05-25', '19:50:50'),
(1261, 1, 'Login', '2021-05-25', '19:54:50'),
(1262, 1, 'Login', '2021-05-25', '19:55:23'),
(1263, 1, 'Edited candidate Isaak Alba to position Vice President', '2021-05-25', '19:55:31'),
(1264, 1, 'Added candidate Adrian Balangao to position <h2>Presi<br>dent</h2>', '2021-05-25', '19:56:01'),
(1265, 1, 'Login', '2021-05-25', '19:56:25'),
(1266, 1, 'created Admin Account : try@gmail.com', '2021-05-25', '19:56:59'),
(1267, 1, 'Login', '2021-05-25', '19:59:05'),
(1268, 1, 'created Admin Account : try_comelec', '2021-05-25', '19:59:14'),
(1269, 1, 'created Admin Account : ge', '2021-05-25', '20:07:55'),
(1270, 1, 'created Admin Account : geg', '2021-05-25', '20:08:54'),
(1271, 1, 'created Admin Account : try_comelec', '2021-05-25', '20:14:02'),
(1272, 1, 'Logout', '2021-05-25', '20:14:14'),
(1273, 1, 'Logout', '2021-05-25', '20:14:22'),
(1274, 1, 'created Admin Account : s', '2021-05-25', '20:16:50'),
(1275, 1, 'created Admin Account : s', '2021-05-25', '20:17:34'),
(1276, 1, 'created Admin Account : s', '2021-05-25', '20:21:25'),
(1277, 1, 'created Admin Account : s', '2021-05-25', '20:22:49'),
(1278, 1, 'created Admin Account : s', '2021-05-25', '20:23:25'),
(1279, 1, 'created Admin Account : s', '2021-05-25', '20:24:16'),
(1280, 1, 'created Admin Account : s', '2021-05-25', '20:25:00'),
(1281, 1, 'Logout', '2021-05-25', '20:29:08'),
(1282, 1, 'Login', '2021-05-25', '20:29:57'),
(1283, 1, 'Login', '2021-05-25', '20:33:13'),
(1284, 1, 'created Admin Account : try_comelec', '2021-05-25', '20:33:43'),
(1285, 1, 'Logout', '2021-05-25', '20:33:46'),
(1286, 1, 'Login', '2021-05-25', '20:36:18'),
(1287, 1, 'updated Admin Account : try_comelec', '2021-05-25', '20:41:31'),
(1288, 1, 'Logout', '2021-05-25', '20:44:52'),
(1289, 1, 'Logout', '2021-05-25', '20:46:04'),
(1290, 1, 'Login', '2021-05-25', '20:56:07'),
(1291, 1, 'Login', '2021-05-25', '20:56:52'),
(1292, 1, 'Login', '2021-05-25', '20:59:14'),
(1293, 1, 'Logout', '2021-05-25', '21:03:16'),
(1294, 1, 'updated Admin Account : try_comelec', '2021-05-25', '21:08:41'),
(1295, 1, 'Logout', '2021-05-25', '21:12:01'),
(1296, 1, 'Login', '2021-05-25', '21:18:00'),
(1297, 1, 'Logout', '2021-05-25', '21:19:35'),
(1298, 1, 'Logout', '2021-05-25', '21:23:47'),
(1299, 1, 'Login', '2021-05-25', '21:24:30'),
(1300, 1, 'Logout', '2021-05-25', '21:31:45'),
(1301, 1, 'Login', '2021-05-25', '21:37:17'),
(1302, 1, 'Login', '2021-05-25', '21:46:40'),
(1303, 1, 'Login', '2021-05-25', '21:55:57'),
(1304, 1, 'Logout', '2021-05-25', '22:05:15'),
(1305, 1, 'Login', '2021-05-25', '22:12:40'),
(1306, 1, 'Login', '2021-05-25', '22:14:33'),
(1307, 1, 'Login', '2021-05-25', '22:16:34'),
(1308, 1, 'Login', '2021-05-25', '22:19:05'),
(1309, 1, 'created Admin Account : Rogers_Member', '2021-05-25', '22:20:21'),
(1310, 1, 'Login', '2021-05-25', '22:23:45'),
(1311, 1, 'Logout', '2021-05-25', '22:41:59'),
(1312, 1, 'Login', '2021-05-25', '22:42:46'),
(1313, 1, 'Logout', '2021-05-25', '22:57:31'),
(1314, 1, 'Logout', '2021-05-25', '22:58:54'),
(1315, 1, 'Login', '2021-05-25', '23:03:45'),
(1316, 1, 'Login', '2021-05-25', '23:11:48'),
(1317, 1, 'Login', '2021-05-25', '23:12:57'),
(1318, 1, 'Login', '2021-05-25', '23:27:19'),
(1319, 1, 'Login', '2021-05-25', '23:32:54'),
(1320, 1, 'Logout', '2021-05-25', '23:32:58'),
(1321, 1, 'Login', '2021-05-25', '23:33:43'),
(1322, 1, 'Logout', '2021-05-25', '23:35:45'),
(1323, 1, 'Logout', '2021-05-25', '23:35:52'),
(1324, 1, 'Login', '2021-05-25', '23:39:16'),
(1325, 1, 'Logout', '2021-05-25', '23:42:03'),
(1326, 1, 'Login', '2021-05-25', '23:44:42'),
(1327, 1, 'Login', '2021-05-25', '23:47:24'),
(1328, 1, 'Login', '2021-05-25', '23:52:17'),
(1329, 1, 'Logout', '2021-05-25', '23:55:29'),
(1330, 1, 'Logout', '2021-05-25', '23:59:57'),
(1331, 1, 'Logout', '2021-05-26', '00:00:43'),
(1332, 1, 'Login', '2021-05-26', '00:01:16'),
(1333, 1, 'Login', '2021-05-26', '00:03:45'),
(1334, 1, 'Logout', '2021-05-26', '00:09:03'),
(1335, 1, 'Login', '2021-05-26', '00:09:24'),
(1336, 1, 'Login', '2021-05-26', '00:11:08'),
(1337, 1, 'Logout', '2021-05-26', '00:11:46'),
(1338, 1, 'Login', '2021-05-26', '00:11:59'),
(1339, 1, 'Logout', '2021-05-26', '00:12:32'),
(1340, 1, 'Logout', '2021-05-26', '00:12:37'),
(1341, 1, 'Login', '2021-05-26', '00:13:55'),
(1342, 1, 'Login', '2021-05-26', '00:15:52'),
(1343, 1, 'Logout', '2021-05-26', '00:19:52'),
(1344, 1, 'Login', '2021-05-26', '00:20:00'),
(1345, 1, 'created Admin Account : g', '2021-05-26', '00:22:53'),
(1346, 1, 'Login', '2021-05-26', '00:28:37'),
(1347, 1, 'Login', '2021-05-26', '00:31:49'),
(1348, 1, 'Login', '2021-05-26', '00:35:00'),
(1349, 1, 'Logout', '2021-05-26', '00:45:13'),
(1350, 1, 'Logout', '2021-05-26', '00:46:26'),
(1351, 1, 'Logout', '2021-05-26', '00:47:31'),
(1352, 1, 'Login', '2021-05-26', '00:48:53'),
(1353, 1, 'Logout', '2021-05-26', '00:51:51'),
(1354, 1, 'Login', '2021-05-26', '00:52:37'),
(1355, 1, 'Login', '2021-05-26', '00:59:14'),
(1356, 1, 'Login', '2021-05-26', '01:01:22'),
(1357, 1, 'Logout', '2021-05-26', '01:01:49'),
(1358, 1, 'Logout', '2021-05-26', '01:05:19'),
(1359, 1, 'Login', '2021-05-26', '01:06:13'),
(1360, 1, 'created Admin Account : IronMan', '2021-05-26', '01:08:23'),
(1361, 1, 'Logout', '2021-05-26', '01:08:36'),
(1364, 1, 'Login', '2021-05-26', '01:09:29'),
(1365, 1, 'updated Admin Account : IronMan', '2021-05-26', '01:09:50'),
(1366, 1, 'updated Admin Account : IronMan', '2021-05-26', '01:10:15'),
(1367, 1, 'updated Info of Student : 35', '2021-05-26', '01:13:17'),
(1368, 1, 'deleted Info of Student : 35', '2021-05-26', '01:13:48'),
(1369, 1, 'Login', '2021-05-26', '01:17:16'),
(1370, 1, 'Unallowed:Auditor', '2021-05-25', '01:17:29'),
(1371, 1, 'Allowed:Auditor', '2021-05-25', '01:17:36'),
(1372, 1, 'Added position:CEO', '2021-05-25', '01:18:53'),
(1373, 1, ' Updated position CEO', '2021-05-25', '01:19:10'),
(1374, 1, ' Updated position CEO', '2021-05-25', '01:19:24'),
(1375, 1, ' Updated position CEO', '2021-05-25', '01:19:36'),
(1376, 1, 'Deleted position:CEO', '2021-05-25', '01:19:45'),
(1377, 1, 'Deleted position:President', '2021-05-25', '01:20:04'),
(1378, 1, 'loaded default positions', '2021-05-25', '01:20:20'),
(1379, 1, 'Deleted position:President', '2021-05-25', '01:20:26'),
(1380, 1, 'loaded default positions', '2021-05-25', '01:20:43'),
(1381, 1, 'Added candidate Maria Hañway to position President', '2021-05-25', '01:21:32'),
(1382, 1, 'Login', '2021-05-26', '01:21:51'),
(1383, 1, 'Added candidate Neo Hermano to position President', '2021-05-25', '01:22:42'),
(1384, 1, 'Added candidate Adrian Balangao to position Vice President', '2021-05-25', '01:23:17'),
(1385, 1, 'Added candidate Marvin Galíndez to position Vice President', '2021-05-25', '01:23:38'),
(1386, 1, 'Added candidate Horencia Santiago to position Grade 12 Representative', '2021-05-25', '01:25:25'),
(1387, 1, 'Added candidate Jerrald Macatangay to position Grade 8 Representative', '2021-05-25', '01:25:51'),
(1388, 1, 'Edited candidate Maria Hañway to position President', '2021-05-25', '01:26:05'),
(1389, 1, 'Added candidate Mason Montejo to position Secretary', '2021-05-25', '01:26:18'),
(1390, 1, 'Deleted candidate:Mason from position: Secretary', '2021-05-25', '01:26:34'),
(1391, 1, 'sent Last Reminders.', '2021-05-26', '01:43:02'),
(1392, 1, 'Logout', '2021-05-26', '02:10:16'),
(1393, 1, 'Login', '2021-05-26', '02:10:55'),
(1394, 1, 'updated Admin Account : Cena_Adviser', '2021-05-26', '02:14:17'),
(1395, 1, 'Logout', '2021-05-26', '02:14:45'),
(1396, 1, 'Login', '2021-05-26', '02:15:29'),
(1397, 1, 'Logout', '2021-05-26', '02:22:01'),
(1398, 1, 'Login', '2021-05-26', '02:43:24'),
(1399, 1, 'Logout', '2021-05-26', '03:36:37'),
(1400, 1, 'Login', '2021-05-26', '03:36:45'),
(1401, 1, 'Logout', '2021-05-26', '03:37:37'),
(1402, 1, 'Login', '2021-05-26', '04:30:10'),
(1403, 1, 'Login', '2021-05-26', '04:31:14'),
(1404, 1, 'Login', '2021-05-26', '04:34:07'),
(1405, 1, 'created Admin Account : try_yow', '2021-05-26', '04:43:00'),
(1406, 1, 'updated Admin Account : try_yow', '2021-05-26', '04:51:45'),
(1407, 1, 'Login', '2021-05-26', '04:55:59'),
(1408, 1, 'Logout', '2021-05-26', '04:56:56'),
(1409, 1, 'Logout', '2021-05-26', '06:22:56'),
(1410, 1, 'Logout', '2021-05-26', '06:23:12'),
(1411, 1, 'Login', '2021-05-26', '07:36:04'),
(1412, 1, 'Login', '2021-05-26', '07:45:44'),
(1413, 1, 'Logout', '2021-05-26', '07:51:14'),
(1414, 1, 'Login', '2021-05-26', '08:20:44'),
(1415, 1, 'Login', '2021-05-26', '08:21:19'),
(1416, 1, 'Logout', '2021-05-26', '08:21:22'),
(1417, 1, 'Login', '2021-05-26', '08:22:17'),
(1418, 1, 'Login', '2021-05-26', '08:31:40'),
(1419, 1, 'Logout', '2021-05-26', '08:42:40'),
(1420, 1, 'Login', '2021-05-26', '08:50:29'),
(1421, 1, 'Logout', '2021-05-26', '08:52:46'),
(1422, 1, 'Login', '2021-05-26', '08:53:56'),
(1423, 1, 'Logout', '2021-05-26', '09:00:21'),
(1424, 1, 'Login', '2021-05-26', '09:07:54'),
(1425, 1, 'Login', '2021-05-26', '09:15:45'),
(1426, 1, 'Added position:add', '2021-05-26', '09:16:06'),
(1427, 1, 'Login', '2021-05-26', '09:19:36'),
(1428, 1, 'Deleted candidate:Maria from position: President', '2021-05-26', '09:22:23'),
(1429, 1, 'Added candidate Maria Hañway to position President', '2021-05-26', '09:23:00'),
(1430, 1, 'Login', '2021-05-26', '09:29:58'),
(1431, 1, 'Added position:test', '2021-05-26', '09:30:33'),
(1432, 1, 'Deleted position:test', '2021-05-26', '09:30:36'),
(1433, 1, 'Login', '2021-05-26', '09:31:34'),
(1434, 1, 'Added position:test', '2021-05-26', '09:33:39'),
(1435, 1, 'Logout', '2021-05-26', '09:36:45'),
(1436, 1, 'Login', '2021-05-26', '09:39:15'),
(1437, 1, 'Login', '2021-05-26', '09:40:42'),
(1438, 1, 'Login', '2021-05-26', '09:47:49'),
(1439, 1, 'Logout', '2021-05-26', '09:49:09'),
(1440, 1, 'Login', '2021-05-26', '09:49:17'),
(1441, 1, 'Login', '2021-05-26', '09:52:59'),
(1442, 1, 'updated Admin Account : Rogers_Member', '2021-05-26', '09:54:45'),
(1443, 1, 'created Admin Account : Dalisay_Comelec', '2021-05-26', '09:56:51'),
(1444, 1, 'updated Admin Account : Dalisay_Comelec', '2021-05-26', '09:58:27'),
(1445, 1, 'updated Admin Account : Dalisay_Comelec_eehehe', '2021-05-26', '09:59:12'),
(1446, 1, 'Logout', '2021-05-26', '09:59:46'),
(1447, 1, 'loaded default positions', '2021-05-26', '10:02:25'),
(1448, 1, 'Added position:test', '2021-05-26', '10:02:33'),
(1449, 1, 'Deleted position:test', '2021-05-26', '10:02:36'),
(1450, 1, 'Added position:test', '2021-05-26', '10:03:18'),
(1451, 1, 'Deleted position:test', '2021-05-26', '10:03:21'),
(1452, 1, 'Added position:test', '2021-05-26', '10:04:21'),
(1453, 1, 'Deleted position:test', '2021-05-26', '10:04:26'),
(1454, 1, 'Logout', '2021-05-26', '10:04:31'),
(1455, 1, 'Added position:test', '2021-05-26', '10:06:16'),
(1456, 1, 'Deleted position:test', '2021-05-26', '10:06:19'),
(1457, 1, 'Added position:test', '2021-05-26', '10:07:28'),
(1458, 1, 'Added position:test', '2021-05-26', '10:07:45'),
(1459, 1, 'Login', '2021-05-26', '10:08:10'),
(1460, 1, 'loaded default positions', '2021-05-26', '10:08:18'),
(1461, 1, 'Added position:test', '2021-05-26', '10:08:27'),
(1462, 1, 'Deleted position:test', '2021-05-26', '10:08:32'),
(1463, 1, 'Login', '2021-05-26', '10:09:11'),
(1464, 1, 'Login', '2021-05-26', '10:09:21'),
(1465, 1, 'Login', '2021-05-26', '10:10:16'),
(1466, 1, 'loaded default positions', '2021-05-26', '10:10:43'),
(1467, 1, 'loaded default positions', '2021-05-26', '10:11:39'),
(1468, 1, 'loaded default positions', '2021-05-26', '10:13:04'),
(1469, 1, 'Added position:test', '2021-05-26', '10:13:16'),
(1470, 1, 'Deleted position:test', '2021-05-26', '10:13:18'),
(1471, 1, 'Login', '2021-05-26', '10:13:27'),
(1472, 1, 'loaded default positions', '2021-05-26', '10:17:09'),
(1473, 1, 'Added candidate Adrian Balangao to position President', '2021-05-26', '10:17:11'),
(1474, 1, 'Added position:test', '2021-05-26', '10:17:18'),
(1475, 1, 'Deleted position:test', '2021-05-26', '10:17:20'),
(1476, 1, 'Deleted candidate:Adrian from position: President', '2021-05-26', '10:17:52'),
(1477, 1, 'loaded default positions', '2021-05-26', '10:17:59'),
(1478, 1, 'Added position:test', '2021-05-26', '10:18:06'),
(1479, 1, 'Deleted position:test', '2021-05-26', '10:18:08'),
(1480, 1, 'loaded default positions', '2021-05-26', '10:18:12'),
(1481, 1, 'Login', '2021-05-26', '10:19:18'),
(1482, 1, 'Logout', '2021-05-26', '10:21:14'),
(1483, 1, 'Login', '2021-05-26', '10:22:31'),
(1484, 1, 'Added position:test', '2021-05-26', '10:23:08'),
(1485, 1, 'Deleted position:test', '2021-05-26', '10:23:14'),
(1486, 1, 'Logout', '2021-05-26', '10:24:11'),
(1487, 1, 'Logout', '2021-05-26', '10:24:32'),
(1488, 1, 'loaded default positions', '2021-05-26', '10:25:01'),
(1489, 1, 'Login', '2021-05-26', '10:28:30'),
(1490, 1, 'Logout', '2021-05-26', '10:28:46'),
(1491, 1, 'loaded default positions', '2021-05-26', '10:28:50'),
(1492, 1, 'Added candidate John Wesley Atega to position President', '2021-05-26', '10:28:58'),
(1493, 1, 'Added position:test', '2021-05-26', '10:28:59'),
(1494, 1, 'Deleted position:test', '2021-05-26', '10:29:02'),
(1495, 1, 'Login', '2021-05-26', '10:29:12'),
(1496, 1, 'Login', '2021-05-26', '10:32:16'),
(1497, 1, 'Logout', '2021-05-26', '10:33:11'),
(1498, 1, 'Logout', '2021-05-26', '10:33:50'),
(1499, 1, 'Added position:test', '2021-05-26', '10:33:55'),
(1500, 1, 'Deleted position:test', '2021-05-26', '10:34:00'),
(1501, 1, 'Added position:tes', '2021-05-26', '10:34:07'),
(1502, 1, ' Updated position tesw', '2021-05-26', '10:34:12'),
(1503, 1, 'Deleted position:tesw', '2021-05-26', '10:34:15'),
(1504, 1, 'Login', '2021-05-26', '10:34:18'),
(1505, 1, 'Login', '2021-05-26', '10:34:55'),
(1506, 1, 'Logout', '2021-05-26', '10:36:32'),
(1507, 1, 'Login', '2021-05-26', '10:37:45'),
(1508, 1, 'Logout', '2021-05-26', '10:38:42'),
(1509, 1, 'Login', '2021-05-26', '10:38:46'),
(1510, 1, 'Added position:CEO', '2021-05-26', '10:39:06'),
(1511, 1, 'Deleted position:President', '2021-05-26', '10:39:12'),
(1512, 1, 'Deleted position:CEO', '2021-05-26', '10:39:12'),
(1513, 1, 'Login', '2021-05-26', '10:39:18'),
(1514, 1, 'Login', '2021-05-26', '10:40:07'),
(1515, 1, 'Logout', '2021-05-26', '10:41:17'),
(1516, 1, 'Login', '2021-05-26', '10:44:43'),
(1517, 1, 'Login', '2021-05-26', '10:44:53'),
(1518, 1, 'loaded default positions', '2021-05-26', '10:45:25'),
(1519, 1, 'Added position:CEO', '2021-05-26', '10:46:53'),
(1520, 1, 'Added position:rapist', '2021-05-26', '10:47:01'),
(1521, 1, 'Deleted position:CEO', '2021-05-26', '10:47:02'),
(1522, 1, 'Deleted position:rapist', '2021-05-26', '10:47:19'),
(1523, 1, 'loaded default positions', '2021-05-26', '10:47:21'),
(1524, 1, 'loaded default positions', '2021-05-26', '10:47:33'),
(1525, 1, 'Added position:CEO', '2021-05-26', '10:47:34'),
(1526, 1, 'Deleted position:CEO', '2021-05-26', '10:47:38'),
(1527, 1, 'Deleted position:President', '2021-05-26', '10:47:57'),
(1528, 1, 'Deleted position:Vice President', '2021-05-26', '10:48:02'),
(1529, 1, ' Updated position Secretaryok', '2021-05-26', '10:48:09'),
(1530, 1, 'Added position:Pres', '2021-05-26', '10:48:22'),
(1531, 1, 'loaded default positions', '2021-05-26', '10:48:26'),
(1532, 1, 'Added candidate Isaak Alba to position President', '2021-05-26', '10:49:52'),
(1533, 1, 'Login', '2021-05-26', '10:50:18'),
(1534, 1, 'Deleted candidate:Isaak from position: President', '2021-05-26', '10:50:21'),
(1535, 1, 'Added candidate Adrian Balangao to position President', '2021-05-26', '10:50:30'),
(1536, 1, 'Logout', '2021-05-26', '10:53:07'),
(1537, 1, 'Logout', '2021-05-26', '10:54:40'),
(1538, 1, 'Login', '2021-05-26', '10:57:50'),
(1539, 1, 'Login', '2021-05-26', '10:57:57'),
(1540, 1, 'Added candidate Braedon Sibug to position Vice President', '2021-05-26', '11:00:29'),
(1541, 1, 'Login', '2021-05-26', '11:02:01'),
(1542, 1, 'Logout', '2021-05-26', '11:05:29'),
(1543, 1, 'updated Admin Account : Cena_Adviser', '2021-05-26', '11:05:52'),
(1544, 1, 'Login', '2021-05-26', '11:07:15'),
(1545, 1, 'Logout', '2021-05-26', '11:07:49'),
(1546, 1, 'Logout', '2021-05-26', '11:09:23'),
(1547, 1, 'Login', '2021-05-26', '11:12:59'),
(1548, 1, 'Logout', '2021-05-26', '11:14:40'),
(1549, 1, 'Login', '2021-05-26', '11:15:56'),
(1550, 1, 'Logout', '2021-05-26', '11:20:01'),
(1551, 1, 'Login', '2021-05-26', '11:20:25'),
(1552, 1, 'Logout', '2021-05-26', '11:21:47'),
(1553, 1, 'Login', '2021-05-26', '11:27:28'),
(1554, 1, 'Login', '2021-05-26', '11:30:50'),
(1555, 1, 'Logout', '2021-05-26', '11:30:51'),
(1556, 1, 'Added candidate Maria Hañway to position President', '2021-05-26', '11:31:11'),
(1557, 1, 'Logout', '2021-05-26', '11:36:16'),
(1558, 1, 'Logout', '2021-05-26', '11:40:01'),
(1559, 1, 'Login', '2021-05-26', '11:41:39'),
(1560, 1, 'Login', '2021-05-26', '11:41:52'),
(1561, 1, 'created Admin Account : IronMan', '2021-05-26', '11:42:54'),
(1562, 1, 'Logout', '2021-05-26', '11:43:05'),
(1565, 1, 'Login', '2021-05-26', '11:43:50'),
(1566, 1, 'deleted Info of Student : 34', '2021-05-26', '11:44:34'),
(1567, 1, 'Logout', '2021-05-26', '11:46:16'),
(1568, 1, 'loaded default positions', '2021-05-26', '11:48:36'),
(1569, 1, 'Deleted position:President', '2021-05-26', '11:48:43'),
(1570, 1, 'loaded default positions', '2021-05-26', '11:48:48'),
(1571, 1, 'Added candidate Maria Hañway to position President', '2021-05-26', '11:49:33'),
(1572, 1, 'Added candidate Marvin Galíndez to position President', '2021-05-26', '11:49:50'),
(1573, 1, 'Added candidate Mason Montejo to position President', '2021-05-26', '11:50:08'),
(1574, 1, 'Added candidate Neo Hermano to position Vice President', '2021-05-26', '11:50:24'),
(1575, 1, 'Added candidate Adrian Balangao to position Secretary', '2021-05-26', '11:50:40'),
(1576, 1, 'Added candidate Jazmine Lim to position Secretary', '2021-05-26', '11:50:58'),
(1577, 1, 'Added candidate Alliah Bataller to position Treasurer', '2021-05-26', '11:51:17'),
(1578, 1, 'Added candidate Maurice Madrid to position Auditor', '2021-05-26', '11:51:37'),
(1579, 1, 'Added candidate Noah Solas to position Grade 7 Representative', '2021-05-26', '11:52:54'),
(1580, 1, 'Added candidate Braedon Sibug to position Grade 9 Representative', '2021-05-26', '11:53:33'),
(1581, 1, 'Added candidate Gabriella Briones to position Grade 12 Representative', '2021-05-26', '11:54:03'),
(1582, 1, 'Login', '2021-05-26', '11:55:16'),
(1583, 1, 'Logout', '2021-05-26', '11:55:42'),
(1584, 1, 'Logout', '2021-05-26', '11:56:34'),
(1585, 1, 'Logout', '2021-05-26', '12:02:15'),
(1586, 1, 'Logout', '2021-05-26', '12:19:40'),
(1587, 1, 'Logout', '2021-05-26', '12:23:18'),
(1588, 1, 'Login', '2021-05-26', '12:23:44'),
(1589, 1, 'Login', '2021-05-26', '12:27:23'),
(1590, 1, 'Login', '2021-05-26', '12:41:45'),
(1591, 1, 'Login', '2021-05-26', '12:42:56'),
(1592, 1, 'Logout', '2021-05-26', '12:53:37'),
(1593, 1, 'Logout', '2021-05-26', '12:58:32'),
(1594, 1, 'Login', '2021-05-26', '12:58:59'),
(1595, 1, 'Logout', '2021-05-26', '13:14:07'),
(1596, 1, 'Login', '2021-05-26', '13:16:35'),
(1597, 1, 'created Admin Account : IronMan', '2021-05-26', '13:20:04'),
(1598, 1, 'Logout', '2021-05-26', '13:20:26'),
(1601, 1, 'Login', '2021-05-26', '13:21:46'),
(1602, 1, 'updated Admin Account : IronMan', '2021-05-26', '13:22:10'),
(1603, 1, 'Added position:CEO', '2021-05-26', '13:32:30'),
(1604, 1, ' Updated position CEO', '2021-05-26', '13:32:58'),
(1605, 1, 'Deleted position:CEO', '2021-05-26', '13:33:09'),
(1606, 1, 'Allowed:Grade 7 Representative', '2021-05-26', '13:33:23'),
(1607, 1, 'Unallowed:Grade 7 Representative', '2021-05-26', '13:33:24'),
(1608, 1, 'Added position:Hello', '2021-05-26', '13:33:59'),
(1609, 1, 'Deleted position:Hello', '2021-05-26', '13:34:23');
INSERT INTO `admin_activity_log` (`activity_log_id`, `admin_id`, `activity_description`, `activity_date`, `activity_time`) VALUES
(1610, 1, 'Added candidate Rodrigo Roque to position Vice President', '2021-05-26', '13:36:14'),
(1611, 1, 'Logout', '2021-05-26', '14:46:45'),
(1612, 1, 'Login', '2021-05-26', '14:50:15'),
(1613, 1, 'Logout', '2021-05-28', '16:31:56'),
(1614, 1, 'Login', '2021-05-28', '16:32:03'),
(1615, 1, 'Logout', '2021-05-28', '16:44:35'),
(1616, 1, 'Login', '2021-05-28', '17:01:18'),
(1617, 1, 'Login', '2021-05-28', '20:49:14'),
(1618, 1, 'Logout', '2021-05-28', '20:51:16'),
(1619, 1, 'Login', '2021-05-28', '21:15:19'),
(1620, 1, 'Logout', '2021-05-28', '21:30:27'),
(1621, 1, 'Login', '2021-05-28', '21:34:08'),
(1622, 1, 'Login', '2021-05-28', '22:06:49'),
(1623, 1, 'Logout', '2021-05-28', '22:14:39'),
(1624, 1, 'Login', '2021-05-28', '22:37:33'),
(1625, 1, 'Login', '2021-05-29', '01:48:31'),
(1626, 1, 'Logout', '2021-05-29', '01:58:48'),
(1627, 1, 'Login', '2021-05-29', '02:02:31'),
(1628, 1, 'Login', '2021-05-29', '02:20:31'),
(1629, 1, 'Logout', '2021-05-29', '02:26:01'),
(1630, 1, 'Logout', '2021-05-29', '02:26:38'),
(1631, 1, 'Login', '2021-05-29', '03:20:59'),
(1632, 1, 'Logout', '2021-05-29', '04:09:46'),
(1633, 1, 'Login', '2021-05-29', '19:04:01'),
(1634, 1, 'Logout', '2021-05-29', '19:31:19'),
(1635, 1, 'Login', '2021-05-29', '21:31:11'),
(1636, 1, 'Login', '2021-05-29', '21:35:25'),
(1637, 1, 'Logout', '2021-05-29', '21:50:34'),
(1638, 1, 'Logout', '2021-05-29', '22:02:52'),
(1639, 1, 'Login', '2021-05-29', '22:21:27'),
(1640, 1, 'Logout', '2021-05-29', '22:40:55'),
(1641, 1, 'Login', '2021-05-30', '00:07:49'),
(1642, 1, 'Logout', '2021-05-30', '00:26:59'),
(1643, 1, 'Login', '2021-05-30', '07:04:37'),
(1644, 1, 'Login', '2021-05-30', '14:20:35'),
(1645, 1, 'Login', '2021-05-30', '14:23:55'),
(1646, 1, 'updated Admin Account : Cena_Adviser', '2021-05-30', '14:31:42'),
(1647, 1, 'Logout', '2021-05-30', '14:46:48'),
(1648, 1, 'Logout', '2021-05-30', '14:51:26'),
(1649, 1, 'Login', '2021-05-30', '16:34:54'),
(1650, 1, 'Logout', '2021-05-30', '16:50:06'),
(1651, 1, 'Login', '2021-05-30', '18:16:17'),
(1652, 1, 'Logout', '2021-05-30', '18:36:43'),
(1653, 1, 'Login', '2021-05-30', '18:47:16'),
(1654, 1, 'Logout', '2021-05-30', '18:49:30'),
(1655, 1, 'Login', '2021-05-30', '18:52:18'),
(1656, 1, 'Logout', '2021-05-30', '18:56:29'),
(1657, 1, 'Login', '2021-05-30', '18:56:37'),
(1658, 1, 'Logout', '2021-05-30', '19:19:42'),
(1659, 1, 'Login', '2021-05-30', '19:27:39'),
(1660, 1, 'Login', '2021-05-30', '19:28:32'),
(1661, 1, 'Login', '2021-05-30', '19:30:01'),
(1662, 1, 'Logout', '2021-05-30', '19:44:04'),
(1663, 1, 'Logout', '2021-05-30', '19:45:24'),
(1664, 1, 'Login', '2021-05-30', '19:46:28'),
(1665, 1, 'Logout', '2021-05-30', '19:49:14'),
(1666, 1, 'Login', '2021-05-30', '19:52:38'),
(1667, 1, 'Logout', '2021-05-30', '20:29:40'),
(1668, 1, 'Logout', '2021-05-30', '20:31:02'),
(1669, 1, 'Login', '2021-05-30', '20:33:27'),
(1670, 1, 'Login', '2021-05-30', '20:46:12'),
(1671, 1, 'Login', '2021-05-30', '23:07:24'),
(1672, 1, 'Logout', '2021-05-30', '23:10:58'),
(1673, 1, 'Login', '2021-05-30', '23:21:25'),
(1674, 1, 'Logout', '2021-05-30', '23:46:14'),
(1675, 1, 'Login', '2021-05-31', '13:38:28'),
(1676, 1, 'Login', '2021-05-31', '16:52:57'),
(1677, 1, 'Logout', '2021-05-31', '17:08:22'),
(1678, 1, 'Login', '2021-05-31', '17:51:25'),
(1679, 1, 'issued a Tie Breaker for :', '2021-06-01', '19:34:34'),
(1680, 1, 'issued a Tie Breaker for :', '2021-06-01', '19:34:34'),
(1681, 1, 'Added candidate Ken Padilla to position President', '2021-06-01', '20:07:22'),
(1682, 1, 'Added candidate Adrian Balangao to position Grade 12 Representative', '2021-06-01', '20:08:17'),
(1683, 1, 'Added candidate Rodrigo Roque to position Grade 12 Representative', '2021-06-01', '20:09:30'),
(1684, 1, 'Edited candidate Ken Padilla to position Vice President', '2021-06-01', '20:14:08'),
(1685, 1, 'Logout', '2021-06-01', '20:23:06'),
(1686, 1, 'Login', '2021-06-01', '20:26:52'),
(1687, 1, 'Login', '2021-06-01', '20:37:46'),
(1688, 1, 'Login', '2021-06-01', '20:42:28'),
(1689, 1, 'Logout', '2021-06-01', '21:12:30'),
(1690, 1, 'Login', '2021-06-01', '21:25:08'),
(1691, 1, 'Login', '2021-06-01', '21:26:31'),
(1692, 1, 'Login', '2021-06-01', '21:57:31'),
(1693, 1, 'Logout', '2021-06-01', '21:59:40'),
(1694, 1, 'Login', '2021-06-01', '21:59:58'),
(1695, 1, 'Logout', '2021-06-01', '22:17:00'),
(1696, 1, 'Login', '2021-06-02', '11:37:49'),
(1697, 1, 'Login', '2021-06-02', '11:38:39'),
(1698, 1, 'Logout', '2021-06-02', '11:54:07'),
(1699, 1, 'Login', '2021-06-02', '12:00:41'),
(1700, 1, 'Added candidate Horencia Santiago to position Vice President', '2021-06-02', '12:03:17'),
(1701, 1, 'Logout', '2021-06-02', '12:32:56'),
(1702, 1, 'Logout', '2021-06-02', '14:29:03'),
(1703, 1, 'Login', '2021-06-02', '17:00:29'),
(1704, 1, 'Login', '2021-06-03', '16:31:13'),
(1705, 1, 'Logout', '2021-06-03', '16:37:33'),
(1706, 1, 'Login', '2021-06-03', '16:38:21'),
(1707, 1, 'updated Admin Account : Sarsa_Chairperson', '2021-06-03', '16:41:16'),
(1708, 1, 'updated Admin Account : Ongpauco_CoChair', '2021-06-03', '16:41:28'),
(1709, 1, 'Login', '2021-06-03', '16:52:30'),
(1710, 1, 'Logout', '2021-06-03', '18:33:42'),
(1711, 1, 'Login', '2021-06-03', '18:36:34'),
(1712, 1, 'set Election Countdown', '2021-06-03', '18:42:26'),
(1713, 1, 'updated Election Period.', '2021-06-03', '18:44:16'),
(1714, 1, 'sent Election Reminders.', '2021-06-03', '18:47:16'),
(1715, 1, 'Added candidate Mason Montejo to position President', '2021-06-03', '18:56:21'),
(1716, 1, 'updated Election Period', '2021-06-03', '18:57:17'),
(1717, 1, 'updated Election Period', '2021-06-03', '18:57:52'),
(1718, 1, 'updated Election Period', '2021-06-03', '18:59:37'),
(1719, 1, 'Added candidate Mason Montejo to position President', '2021-06-03', '19:00:00'),
(1720, 1, 'Added candidate Anna Gevarra to position President', '2021-06-03', '19:00:24'),
(1721, 1, 'Added candidate Horencia Santiago to position Vice President', '2021-06-03', '19:00:47'),
(1722, 1, 'Added candidate Ken Padilla to position Vice President', '2021-06-03', '19:01:25'),
(1723, 1, 'Added candidate Adrian Balangao to position Secretary', '2021-06-03', '19:02:26'),
(1724, 1, 'Added candidate Jerrald Macatangay to position Secretary', '2021-06-03', '19:02:40'),
(1725, 1, 'Added candidate Julien Puno to position Treasurer', '2021-06-03', '19:03:50'),
(1726, 1, 'Added candidate John Wesley Atega to position Treasurer', '2021-06-03', '19:04:11'),
(1727, 1, 'set Election Countdown', '2021-06-03', '19:08:15'),
(1728, 1, 'set Election Countdown', '2021-06-03', '19:16:41');

-- --------------------------------------------------------

--
-- Table structure for table `archive`
--

--
-- Dumping data for table `archive`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--


-- --------------------------------------------------------

--
-- Table structure for table `candidate_position`
--

INSERT INTO `student` (`student_id`, `fname`, `Mname`, `lname`, `gender`, `bumail`, `grade_level`, `otp`, `voting_status`) VALUES
(1, 'Maria', 'Madrona', 'Hañway', 'female', 'a@bicol-u.edu.ph', 7, '123456', 1),
(2, 'Ariel', 'Bilal', 'Ongpauco', 'male', 'b@bicol-u.edu.ph', 7, '123456', 1),
(3, 'Isaak', 'Pildilapil', 'Alba', 'male', 'c@bicol-u.edu.ph', 8, '123456', 1),
(4, 'Braedon', 'Lozo', 'Sibug', 'male', 'd@bicol-u.edu.ph', 8, '123456', 1),
(5, 'Julien', 'Cader', 'Puno', 'female', 'e@bicol-u.edu.ph', 9, '123456', 1),
(6, 'John Wesley', '', 'Atega', 'male', 'f@bicol-u.edu.ph', 9, '123456', 1),
(7, 'Jerrald', 'Dura', 'Macatangay', 'male', 'g@bicol-u.edu.ph', 10, '123456', 1),
(8, 'Adrian', 'Gallora', 'Balangao', 'male', 'h@bicol-u.edu.ph', 10, '123456', 1),
(9, 'Ken', 'Sison', 'Padilla', 'male', 'i@bicol-u.edu.ph', 11, '123456', 1),
(10, 'Horencia', 'Lopa', 'Santiago', 'female', 'j@bicol-u.edu.ph', 11, '123456', 1),
(11, 'Mason', 'Felix', 'Montejo', 'male', 'k@bicol-u.edu.ph', 12, '123456', 1),
(12, 'Anna', 'Lacsamana', 'Gevarra', 'female', 'l@bicol-u.edu.ph', 12, '123456', 1);
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
(8, 8, 'Grade 9 Representative', 'Represents the voice of Grade 9 students.', 0),
(9, 9, 'Grade 10 Representative', 'Represents the voice of the Grade 10 students.', 0),
(10, 10, 'Grade 11 Representative', 'Represents the voice of the Grade 11 students.', 0),
(11, 11, 'Grade 12 Representative', 'Represents the voice of the Grade 12 students.', 0);

-- --------------------------------------------------------

-- Dumping data for table `candidate`
--

INSERT INTO `candidate` (`candidate_id`, `student_id`, `position_id`, `total_votes`, `party_name`, `platform_info`, `credentials`, `photo`) VALUES
(115, 11, 1, 6, 'Uno', 'Uno', 'Uno', '../user/img/60b8d07ca03d70.00134910.jpg'),
(116, 12, 1, 6, 'Dos', 'Dos', 'Dos', '../user/img/60b8d092290e68.41141922.jpg'),
(117, 10, 2, 6, 'Uno', 'Uno', 'Uno', '../user/img/60b8d0b799b707.95880284.jpg'),
(118, 9, 2, 6, 'Dos', 'Dos', 'Dos', '../user/img/60b8d0cd940b76.27055304.jpg'),
(119, 8, 3, 5, 'Uno', 'Uno', 'Uno', '../user/img/60b8d0e0056875.05296331.jpg'),
(120, 7, 3, 1, 'Dos', 'Dos', 'Dos', '../user/img/60b8d0f895e4f5.91898570.jpg'),
(121, 5, 4, 3, 'Uno', 'Uno', 'Uno', '../user/img/60b8d112851cd0.41171876.jpg'),
(122, 6, 4, 8, 'Dos', 'Dos', 'Dos', '../user/img/60b8d1262d1ef8.67935069.jpg');
--
-- Table structure for table `student`
--

--
-- Dumping data for table `student`
--

-- --------------------------------------------------------

--
-- Table structure for table `student_access_log`
--

--
-- Dumping data for table `student_access_log`
--

INSERT INTO `student_access_log` (`access_log_id`, `student_id`, `activity_description`, `date`, `time`) VALUES
(517, 1, 'Login', '2021-06-03', '19:09:03'),
(518, 1, 'Logout', '2021-06-03', '19:10:07'),
(519, 2, 'Login', '2021-06-03', '19:10:13'),
(520, 2, 'Logout', '2021-06-03', '19:10:37'),
(521, 3, 'Login', '2021-06-03', '19:10:45'),
(522, 3, 'Logout', '2021-06-03', '19:11:02'),
(523, 4, 'Login', '2021-06-03', '19:11:10'),
(524, 4, 'Logout', '2021-06-03', '19:11:41'),
(525, 5, 'Login', '2021-06-03', '19:11:49'),
(526, 5, 'Logout', '2021-06-03', '19:12:20'),
(527, 6, 'Login', '2021-06-03', '19:12:28'),
(528, 6, 'Logout', '2021-06-03', '19:12:53'),
(529, 7, 'Login', '2021-06-03', '19:13:04'),
(530, 7, 'Logout', '2021-06-03', '19:13:25'),
(531, 8, 'Login', '2021-06-03', '19:13:36'),
(532, 8, 'Logout', '2021-06-03', '19:13:53'),
(533, 9, 'Login', '2021-06-03', '19:14:02'),
(534, 9, 'Logout', '2021-06-03', '19:14:20'),
(535, 10, 'Login', '2021-06-03', '19:14:28'),
(536, 10, 'Logout', '2021-06-03', '19:14:52'),
(537, 11, 'Login', '2021-06-03', '19:15:00'),
(538, 11, 'Logout', '2021-06-03', '19:15:18'),
(539, 12, 'Login', '2021-06-03', '19:15:25');

-- --------------------------------------------------------

--
-- Table structure for table `temp_candidate`
--

--
-- Table structure for table `vote`
--

--
-- Dumping data for table `vote`
--

INSERT INTO `vote` (`vote_log_id`, `student_id`, `candidate_id`, `status`, `time_stamp`) VALUES
(1, 1, 115, 'Voted', '2021-06-03 11:10:04'),
(2, 1, 116, 'Abstain', '2021-06-03 11:10:04'),
(3, 1, 117, 'Voted', '2021-06-03 11:10:04'),
(4, 1, 118, 'Abstain', '2021-06-03 11:10:04'),
(5, 1, 120, 'Abstain', '2021-06-03 11:10:04'),
(6, 1, 119, 'Voted', '2021-06-03 11:10:04'),
(7, 1, 121, 'Voted', '2021-06-03 11:10:04'),
(8, 1, 122, 'Abstain', '2021-06-03 11:10:04'),
(9, 2, 115, 'Voted', '2021-06-03 11:10:32'),
(10, 2, 116, 'Abstain', '2021-06-03 11:10:32'),
(11, 2, 117, 'Voted', '2021-06-03 11:10:32'),
(12, 2, 118, 'Abstain', '2021-06-03 11:10:32'),
(13, 2, 120, 'Abstain', '2021-06-03 11:10:32'),
(14, 2, 119, 'Voted', '2021-06-03 11:10:32'),
(15, 2, 121, 'Voted', '2021-06-03 11:10:32'),
(16, 2, 122, 'Abstain', '2021-06-03 11:10:32'),
(17, 3, 116, 'Abstain', '2021-06-03 11:10:59'),
(18, 3, 115, 'Voted', '2021-06-03 11:10:59'),
(19, 3, 117, 'Voted', '2021-06-03 11:10:59'),
(20, 3, 118, 'Abstain', '2021-06-03 11:10:59'),
(21, 3, 119, 'Voted', '2021-06-03 11:10:59'),
(22, 3, 120, 'Abstain', '2021-06-03 11:10:59'),
(23, 3, 122, 'Abstain', '2021-06-03 11:10:59'),
(24, 3, 121, 'Voted', '2021-06-03 11:10:59'),
(25, 4, 115, 'Voted', '2021-06-03 11:11:34'),
(26, 4, 116, 'Abstain', '2021-06-03 11:11:34'),
(27, 4, 117, 'Voted', '2021-06-03 11:11:34'),
(28, 4, 118, 'Abstain', '2021-06-03 11:11:34'),
(29, 4, 120, 'Abstain', '2021-06-03 11:11:34'),
(30, 4, 119, 'Voted', '2021-06-03 11:11:34'),
(31, 4, 121, 'Abstain', '2021-06-03 11:11:34'),
(32, 4, 122, 'Abstain', '2021-06-03 11:11:34'),
(33, 5, 115, 'Voted', '2021-06-03 11:12:11'),
(34, 5, 116, 'Abstain', '2021-06-03 11:12:11'),
(35, 5, 117, 'Voted', '2021-06-03 11:12:11'),
(36, 5, 118, 'Abstain', '2021-06-03 11:12:11'),
(37, 5, 119, 'Voted', '2021-06-03 11:12:11'),
(38, 5, 120, 'Abstain', '2021-06-03 11:12:11'),
(39, 5, 121, 'Abstain', '2021-06-03 11:12:11'),
(40, 5, 122, 'Voted', '2021-06-03 11:12:11'),
(41, 6, 115, 'Voted', '2021-06-03 11:12:48'),
(42, 6, 116, 'Abstain', '2021-06-03 11:12:48'),
(43, 6, 117, 'Voted', '2021-06-03 11:12:48'),
(44, 6, 118, 'Abstain', '2021-06-03 11:12:48'),
(45, 6, 119, 'Abstain', '2021-06-03 11:12:48'),
(46, 6, 120, 'Abstain', '2021-06-03 11:12:48'),
(47, 6, 121, 'Abstain', '2021-06-03 11:12:48'),
(48, 6, 122, 'Voted', '2021-06-03 11:12:48'),
(49, 7, 115, 'Abstain', '2021-06-03 11:13:21'),
(50, 7, 116, 'Voted', '2021-06-03 11:13:21'),
(51, 7, 117, 'Abstain', '2021-06-03 11:13:21'),
(52, 7, 118, 'Voted', '2021-06-03 11:13:21'),
(53, 7, 119, 'Abstain', '2021-06-03 11:13:21'),
(54, 7, 120, 'Abstain', '2021-06-03 11:13:21'),
(55, 7, 121, 'Abstain', '2021-06-03 11:13:21'),
(56, 7, 122, 'Voted', '2021-06-03 11:13:21'),
(57, 8, 115, 'Abstain', '2021-06-03 11:13:47'),
(58, 8, 116, 'Voted', '2021-06-03 11:13:47'),
(59, 8, 117, 'Abstain', '2021-06-03 11:13:47'),
(60, 8, 118, 'Voted', '2021-06-03 11:13:47'),
(61, 8, 119, 'Abstain', '2021-06-03 11:13:47'),
(62, 8, 120, 'Abstain', '2021-06-03 11:13:47'),
(63, 8, 121, 'Abstain', '2021-06-03 11:13:47'),
(64, 8, 122, 'Voted', '2021-06-03 11:13:47'),
(65, 9, 115, 'Abstain', '2021-06-03 11:14:15'),
(66, 9, 116, 'Voted', '2021-06-03 11:14:15'),
(67, 9, 117, 'Abstain', '2021-06-03 11:14:15'),
(68, 9, 118, 'Voted', '2021-06-03 11:14:15'),
(69, 9, 120, 'Voted', '2021-06-03 11:14:15'),
(70, 9, 119, 'Abstain', '2021-06-03 11:14:15'),
(71, 9, 121, 'Abstain', '2021-06-03 11:14:15'),
(72, 9, 122, 'Voted', '2021-06-03 11:14:15'),
(73, 10, 115, 'Abstain', '2021-06-03 11:14:46'),
(74, 10, 116, 'Voted', '2021-06-03 11:14:46'),
(75, 10, 117, 'Abstain', '2021-06-03 11:14:46'),
(76, 10, 118, 'Voted', '2021-06-03 11:14:46'),
(77, 10, 119, 'Abstain', '2021-06-03 11:14:46'),
(78, 10, 120, 'Abstain', '2021-06-03 11:14:46'),
(79, 10, 121, 'Abstain', '2021-06-03 11:14:46'),
(80, 10, 122, 'Voted', '2021-06-03 11:14:46'),
(81, 11, 115, 'Abstain', '2021-06-03 11:15:14'),
(82, 11, 116, 'Voted', '2021-06-03 11:15:14'),
(83, 11, 117, 'Abstain', '2021-06-03 11:15:14'),
(84, 11, 118, 'Voted', '2021-06-03 11:15:14'),
(85, 11, 120, 'Abstain', '2021-06-03 11:15:14'),
(86, 11, 119, 'Abstain', '2021-06-03 11:15:14'),
(87, 11, 121, 'Abstain', '2021-06-03 11:15:14'),
(88, 11, 122, 'Voted', '2021-06-03 11:15:14'),
(89, 12, 115, 'Abstain', '2021-06-03 11:15:39'),
(90, 12, 116, 'Voted', '2021-06-03 11:15:39'),
(91, 12, 117, 'Abstain', '2021-06-03 11:15:39'),
(92, 12, 118, 'Voted', '2021-06-03 11:15:39'),
(93, 12, 120, 'Abstain', '2021-06-03 11:15:39'),
(94, 12, 119, 'Abstain', '2021-06-03 11:15:39'),
(95, 12, 121, 'Abstain', '2021-06-03 11:15:39'),
(96, 12, 122, 'Voted', '2021-06-03 11:15:39');

-- --------------------------------------------------------

--
-- Table structure for table `vote_event`
--

-- Dumping data for table `vote_event`
--

INSERT INTO `vote_event` (`vote_event_id`, `start_date`, `end_date`, `vote_duration`) VALUES
(1, '2021-06-03 19:17:00', '2021-06-03 19:18:00', 1);

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
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `admin_activity_log`
--
ALTER TABLE `admin_activity_log`
  MODIFY `activity_log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1729;

--
-- AUTO_INCREMENT for table `archive`
--
ALTER TABLE `archive`
  MODIFY `archive_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `candidate`
--
ALTER TABLE `candidate`
  MODIFY `candidate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `candidate_position`
--
ALTER TABLE `candidate_position`
  MODIFY `position_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `student_access_log`
--
ALTER TABLE `student_access_log`
  MODIFY `access_log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=540;

--
-- AUTO_INCREMENT for table `vote`
--
ALTER TABLE `vote`
  MODIFY `vote_log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `vote_event`
--
ALTER TABLE `vote_event`
  MODIFY `vote_event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
