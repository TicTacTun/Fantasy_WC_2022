-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2022 at 09:14 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fantasy_wc_2022`
--

-- --------------------------------------------------------

--
-- Table structure for table `team x`
--

CREATE TABLE `team x` (
  `Country` varchar(30) DEFAULT NULL,
  `id` varchar(30) DEFAULT NULL,
  `Name` varchar(30) DEFAULT NULL,
  `position` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `team x`
--

INSERT INTO `team x` (`Country`, `id`, `Name`, `position`) VALUES
('England', '7', 'Harry Kane', 'Forward'),
('England', '9', 'Tammy Abraham', 'Forward'),
('England', '5', 'Jack Grealish', 'MidFielder'),
('England', '6', 'James Ward-Prowse', 'MidFielder'),
('Germany', '21', 'Julian Brandt', 'MidFielder'),
('Argentina', '29', 'Guido Rodriguez', 'MidFielder'),
('England', '3', 'John Stones', 'Defender'),
('England', '4', 'Kieran Trippier', 'Defender'),
('Germany', '14', 'David Raum', 'Defender'),
('Germany', '15', 'Niklas Suele', 'Defender'),
('England', '11', 'Nick Pope', 'GoalKeeper');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `team x`
--
ALTER TABLE `team x`
  ADD UNIQUE KEY `id` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
