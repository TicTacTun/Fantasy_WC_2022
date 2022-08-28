-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2022 at 09:13 PM
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
-- Table structure for table `matches`
--

CREATE TABLE `matches` (
  `Home` varchar(100) NOT NULL,
  `match` int(100) NOT NULL,
  `Away` varchar(100) NOT NULL,
  `faces` varchar(100) NOT NULL,
  `dates` varchar(100) NOT NULL,
  `Kick` varchar(100) NOT NULL,
  `Stadium` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `matches`
--

INSERT INTO `matches` (`Home`, `match`, `Away`, `faces`, `dates`, `Kick`, `Stadium`) VALUES
('GERMANY', 1, 'SPAIN', 'vs', '21 NOV', '10:30 PM	', 'AL BAYT STADIUM'),
('ENGLAND', 2, 'USA', 'vs', '22 NOV', '6:00PM', 'KHALIFA INTERNATIONAL STADIU'),
('PORTUGAL', 3, 'URUGUAY', 'vs', '22 NOV', '10:00 PM', 'AL THUMAMA STADIUM'),
('QATAR', 4, 'NETHERLANDS', 'vs', '23 NOV', '1:00 AM', 'LUSAIL STADIUM'),
('ARGENTINA', 5, 'MEXICO', 'vs', '23 NOV	', '6:00 PM	', 'EDUCATION CITY STADIUM'),
('CROATIA', 6, 'BELGIUM	', 'vs	', '23 NOV	', '10:00 PM	', 'AHMED BIN ALI STADIUM'),
('SWITZERLAND', 7, 'BRAZIL', 'vs', '24 NOV', '2:30 AM	', 'AL JANOUB STADIUM'),
('DENMARK	', 8, 'FRANCE', 'vs', '24 NOV	', '7:00 PM	', 'STADIUM 974'),
('GERMANY', 9, 'JAPAN', 'vs', '25 NOV', '10:00 PM', 'AL BAYT STADIUM'),
('ARGENTINA', 10, 'POLAND', 'vs', '26 NOV', '1:00 AM', 'AL JANOUB STADIUM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`match`),
  ADD KEY `match` (`match`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
