-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2019 at 05:50 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `csm_task_creater`
--

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `main_ID` int(11) NOT NULL,
  `task_ID` varchar(255) NOT NULL,
  `ST` varchar(255) DEFAULT NULL,
  `task_name` varchar(255) DEFAULT NULL,
  `esc_grp` varchar(255) DEFAULT NULL,
  `esc_time` varchar(255) DEFAULT NULL,
  `severity` varchar(255) DEFAULT NULL,
  `stat` varchar(255) DEFAULT NULL,
  `end_t` varchar(255) DEFAULT NULL,
  `mail_ref` varchar(255) DEFAULT NULL,
  `updt` varchar(255) DEFAULT NULL,
  `user` varchar(255) DEFAULT NULL,
  `uuser` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'soumik.shadman', 'Grameen@033'),
(3, 'chinmoy.roy', 'Grameen@731'),
(4, 'joytu.chakma', 'Grameen@479'),
(5, 'minar.munasib', 'Grameen@063'),
(6, 'mainul.m.islam', 'Grameen@095'),
(7, 'anthonya.barsha', 'Grameen@026'),
(8, 'kazi.farhana', 'Grameen@036'),
(9, 'khaled.waleed', 'Grameen@926'),
(10, 'monaem', 'Grameen@288'),
(11, 'r.m.karim', 'Grameen@057'),
(12, 'rokibul.h.robin', 'Grameen@957'),
(13, 'tariq.alam', 'Grameen@622'),
(14, 'mahomudul', 'Grameen@091'),
(15, 'wahidur.r.shakil', 'Grameen@685');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`main_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `main_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
