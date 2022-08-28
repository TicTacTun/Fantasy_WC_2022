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
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `Country` text NOT NULL,
  `id` int(100) NOT NULL,
  `Position` varchar(100) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `age` int(100) NOT NULL,
  `apps` int(100) NOT NULL,
  `goals` int(100) NOT NULL,
  `goalp` int(100) NOT NULL,
  `assistp` int(100) NOT NULL,
  `cleanp` int(100) NOT NULL,
  `points` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`Country`, `id`, `Position`, `Name`, `age`, `apps`, `goals`, `goalp`, `assistp`, `cleanp`, `points`) VALUES
('England', 1, 'Defender', 'Fikayo Tomori', 26, 28, 6, 10, 5, 6, 21),
('England', 2, 'Defender', 'Harry Maguire', 28, 58, 3, 15, 8, 18, 41),
('England', 3, 'Defender', 'John Stones', 22, 29, 4, 3, 3, 3, 9),
('England', 4, 'Defender', 'Kieran Trippier', 26, 93, 1, 5, 6, 7, 18),
('England', 5, 'MidFielder', 'Jack Grealish', 20, 48, 6, 15, 3, 2, 20),
('England', 6, 'MidFielder', 'James Ward-Prowse', 27, 100, 9, 10, 3, 5, 18),
('England', 7, 'Forward', 'Harry Kane', 24, 55, 1, 5, 5, 5, 15),
('England', 8, 'Forward', 'Raheem Sterling', 33, 95, 1, 5, 8, 4, 17),
('England', 9, 'Forward', 'Tammy Abraham', 30, 102, 2, 8, 6, 7, 21),
('Brazil', 10, 'Forward', 'Neymar', 24, 84, 9, 8, 12, 5, 25),
('England', 11, 'GoalKeeper', 'Nick Pope', 32, 28, 1, 15, 56, 7, 78),
('Germany', 12, 'Defender', 'Antonio Ruediger', 24, 45, 1, 59, 59, 7, 125),
('Germany', 13, 'Defender', 'Benjamin Henrichs', 28, 115, 4, 52, 41, 69, 162),
('Germany', 14, 'Defender', 'David Raum', 29, 150, 9, 5, 95, 87, 187),
('Germany', 15, 'Defender', 'Niklas Suele', 26, 98, 3, 45, 45, 15, 105),
('Germany', 16, 'Forward', 'Leroy Sane', 26, 80, 2, 25, 45, 58, 128),
('Germany', 17, 'Forward', 'Marco Reus', 25, 92, 6, 45, 87, 95, 227),
('Germany', 18, 'Forward', 'Thomas Mueller', 22, 50, 2, 78, 36, 16, 130),
('Germany', 19, 'MidFielder', 'Ilkay Guendagon', 33, 82, 10, 18, 54, 26, 98),
('Germany', 20, 'MidFielder', 'Joshua Kimmich', 20, 69, 5, 49, 59, 37, 145),
('Germany', 21, 'MidFielder', 'Julian Brandt', 23, 83, 2, 9, 6, 12, 27),
('Germany', 22, 'GoalKeeper', 'Manuel Neuer', 25, 50, 2, 15, 57, 68, 140),
('Argentina', 23, 'Forward', 'Lionel Messi', 35, 162, 86, 58, 57, 48, 163),
('Argentina', 24, 'Forward', 'Lautaro MartÃƒÂ­nez', 24, 38, 20, 48, 74, 59, 181),
('Argentina', 25, 'Forward', 'Nicolas Gonzalez', 24, 21, 3, 47, 77, 89, 213),
('Argentina', 26, 'Forward', 'Angel Di Maria', 34, 122, 25, 45, 29, 87, 161),
('Argentina', 27, 'Forward', 'Paulo Dybala', 28, 34, 3, 8, 41, 58, 107),
('Argentina', 28, 'Forward', 'Julian Alvarez', 22, 9, 1, 74, 59, 62, 195),
('Argentina', 29, 'MidFielder', 'Guido Rodriguez', 28, 24, 1, 8, 9, 5, 22),
('Argentina', 30, 'MidFielder', 'Leandro Paredes', 28, 44, 4, 5, 5, 6, 16),
('Argentina', 31, 'MidFielder', 'Rodrigo de Paul', 28, 41, 2, 78, 59, 25, 162),
('Argentina', 32, 'MidFielder', 'Giovani Lo Celso', 26, 39, 2, 75, 89, 96, 260),
('Argentina', 33, 'MidFielder', 'Papu Gomez', 34, 14, 3, 485, 48, 26, 559),
('Argentina', 34, 'Defender', 'Cristian Romero', 24, 11, 1, 48, 49, 26, 123),
('Argentina', 35, 'Defender', 'Lisandro Martinez', 24, 7, 25, 24, 25, 49, 98),
('Argentina', 36, 'Defender', 'Nicolas Otamendi', 34, 91, 4, 55, 59, 42, 156),
('Argentina', 37, 'Defender', 'Juan Foyth', 24, 15, 78, 56, 38, 29, 123),
('Argentina', 38, 'GoalKeeper', 'Emiliano MartÃƒÂ­nez', 29, 17, 55, 23, 41, 63, 127),
('Argentina', 39, 'GoalKeeper', 'GerÃƒÂ³nimo Rulli', 30, 3, 45, 15, 114, 47, 176),
('France', 40, 'Forward', 'Karim Benzema', 34, 45, 12, 0, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD UNIQUE KEY `Player_ID` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
