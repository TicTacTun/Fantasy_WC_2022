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
-- Table structure for table `team y`
--

CREATE TABLE `team y` (
  `Country` varchar(30) DEFAULT NULL,
  `id` varchar(30) DEFAULT NULL,
  `Name` varchar(30) DEFAULT NULL,
  `position` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `team y`
--

INSERT INTO `team y` (`Country`, `id`, `Name`, `position`) VALUES
('England', '7', 'Harry Kane', 'Forward'),
('Argentina', '25', 'Nicolas Gonzalez', 'Forward'),
('Argentina', '37', 'Juan Foyth', 'Defender'),
('England', '3', 'John Stones', 'Defender'),
('Argentina', '34', 'Cristian Romero', 'Defender'),
('Germany', '21', 'Julian Brandt', 'MidFielder'),
('England', '6', 'James Ward-Prowse', 'MidFielder'),
('Argentina', '32', 'Giovani Lo Celso', 'MidFielder'),
('Germany', '19', 'Ilkay Guendagon', 'MidFielder'),
('Argentina', '35', 'Lisandro Martinez', 'Defender'),
('Argentina', '38', 'Emiliano MartÃƒÂ­nez', 'GoalKeeper');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `team y`
--
ALTER TABLE `team y`
  ADD UNIQUE KEY `id` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
