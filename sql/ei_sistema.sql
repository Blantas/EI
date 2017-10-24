-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2017 m. Spa 24 d. 22:54
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ei_sistema`
--

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `ei_groups`
--

CREATE TABLE `ei_groups` (
  `ID` int(11) NOT NULL,
  `group_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_lithuanian_ci NOT NULL,
  `group_description` text CHARACTER SET utf8 COLLATE utf8_lithuanian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Sukurta duomenų kopija lentelei `ei_groups`
--

INSERT INTO `ei_groups` (`ID`, `group_name`, `group_description`) VALUES
(1, 'Narys', ''),
(2, 'Vadovas', ''),
(3, 'Programuotojas', ''),
(4, 'Administratorius', ''),
(5, 'Vadybininkas', ''),
(11, 'Dizaineris', '');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `ei_group_permissions`
--

CREATE TABLE `ei_group_permissions` (
  `group_ID` int(11) NOT NULL,
  `permission_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Sukurta duomenų kopija lentelei `ei_group_permissions`
--

INSERT INTO `ei_group_permissions` (`group_ID`, `permission_ID`) VALUES
(1, 1),
(4, 5),
(4, 6),
(4, 7),
(4, 1),
(4, 2),
(4, 3),
(4, 4);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `ei_permissions`
--

CREATE TABLE `ei_permissions` (
  `ID` int(11) NOT NULL,
  `permission_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_lithuanian_ci NOT NULL,
  `permission_description` text CHARACTER SET utf8 COLLATE utf8_lithuanian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Sukurta duomenų kopija lentelei `ei_permissions`
--

INSERT INTO `ei_permissions` (`ID`, `permission_name`, `permission_description`) VALUES
(1, 'matytiSavoProfili', 'Matyti savo profilį'),
(2, 'matytiKitoProfili', 'Matyti kito profilį'),
(3, 'matytiNariuSarasa', 'Matyti narių sąrašą'),
(4, 'redaguotiSavoProfili', 'Redaguoti savo profilį'),
(5, 'redaguotiKitoProfili', 'Redaguoti kito profilį'),
(6, 'redaguotiTeises', 'Redaguoti teises'),
(7, 'redaguotiGrupes', 'Redaguoti grupes');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `ei_users`
--

CREATE TABLE `ei_users` (
  `ID` int(11) NOT NULL,
  `user_login` varchar(60) DEFAULT NULL,
  `user_name` varchar(60) DEFAULT NULL,
  `user_email` varchar(100) DEFAULT NULL,
  `user_phone` varchar(20) DEFAULT NULL,
  `user_joined` date DEFAULT NULL,
  `user_left` date DEFAULT NULL,
  `user_status` int(4) DEFAULT NULL,
  `user_password` varchar(61) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='vartotojai';

--
-- Sukurta duomenų kopija lentelei `ei_users`
--

INSERT INTO `ei_users` (`ID`, `user_login`, `user_name`, `user_email`, `user_phone`, `user_joined`, `user_left`, `user_status`, `user_password`) VALUES
(1, 'admin', 'Karolis', 'karolis.vaikutis@gmail.com', '+37068948423', '2017-10-19', NULL, 1, '$2y$10$LsWwWxxb7rkDFMOfYeFRzeNY5NdMGNHnQ1bl2/6g3ZJes2FSIITlS');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `ei_user_groups`
--

CREATE TABLE `ei_user_groups` (
  `user_ID` int(11) NOT NULL,
  `group_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Sukurta duomenų kopija lentelei `ei_user_groups`
--

INSERT INTO `ei_user_groups` (`user_ID`, `group_ID`) VALUES
(1, 3),
(1, 4),
(1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ei_groups`
--
ALTER TABLE `ei_groups`
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `ei_permissions`
--
ALTER TABLE `ei_permissions`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `ei_users`
--
ALTER TABLE `ei_users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ei_users_ID_uindex` (`ID`),
  ADD UNIQUE KEY `ei_users_user_password_uindex` (`user_password`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ei_groups`
--
ALTER TABLE `ei_groups`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `ei_permissions`
--
ALTER TABLE `ei_permissions`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ei_users`
--
ALTER TABLE `ei_users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
