-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 31, 2021 at 04:40 PM
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
