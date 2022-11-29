-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2019 at 10:54 PM
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
-- Database: `input`
--

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `main_ID` int(11) NOT NULL,
  `task_ID` varchar(40) NOT NULL,
  `ST` varchar(40) DEFAULT NULL,
  `task_name` varchar(40) DEFAULT NULL,
  `esc_grp` varchar(40) DEFAULT NULL,
  `esc_time` varchar(40) DEFAULT NULL,
  `severity` varchar(40) DEFAULT NULL,
  `stat` varchar(40) DEFAULT NULL,
  `pend_time` varchar(40) DEFAULT NULL,
  `end_t` varchar(40) DEFAULT NULL,
  `mail_ref` varchar(255) DEFAULT NULL,
  `updt` varchar(255) DEFAULT NULL,
  `user` varchar(40) NOT NULL,
  `uuser` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`main_ID`, `task_ID`, `ST`, `task_name`, `esc_grp`, `esc_time`, `severity`, `stat`, `pend_time`, `end_t`, `mail_ref`, `updt`, `user`, `uuser`) VALUES
(8786608, '201907241743', '07/10/2019 11:43 PM', 'Temperature High', 'ROD_Savar', '07/11/2019 11:43 PM', 'Major', 'Done', 'pending time', NULL, 'u', 'u', '', ''),
(8786653, '201907261709', '07/26/2019 5:20 PM', 'test ticket', 'ROD_GAZ', '07/26/2019 5:06 PM', 'Critical', 'Pending', NULL, NULL, 'None', 'created the ticket', 'CSM_SOC', ''),
(8786660, '201907262125', '07/04/2019 9:25 PM', 'ERS Dump Missing', 'IN', '07/05/2019 9:25 PM', 'Major', 'Done', NULL, '07/23/2019 1:31 AM', 'test', 'test to', 'CSM_SOC', 'soumik.shadman'),
(8786658, '201907261955', '07/03/2019 7:54 PM', 'test', 'ROD_Savar', '07/04/2019 7:54 PM', 'Major', 'Done', NULL, 'no', 'test', 'test tr', 'CSM_SOC', '$usr'),
(8786659, '201907261955', '07/08/2019 7:55 PM', 'Temperature High', 'ROD_Savar', '07/09/2019 7:55 PM', 'Major', 'Done', NULL, 'no', 'test', 'test tr', 'CSM_SOC', '$usr'),
(8786662, '201907270121', '07/10/2019 1:21 AM', 'Sudden ERS SR droped', 'IN', '07/11/2019 1:21 AM', 'Critical', 'Done', NULL, '07/16/2019 2:00 AM', 'test1', 'test1+3', 'soumik.shadman', 'soumik.shadman'),
(8786663, '201907270134', '07/09/2019 1:33 AM', 'GPAY DB Purging', 'Summit Communications', '07/10/2019 1:33 AM', 'Major', 'Done', NULL, '07/16/2019 1:39 AM', 'test 001', 'test 001', 'soumik.shadman', 'soumik.shadman'),
(8786664, '201907270142', '07/17/2019 1:41 AM', 'ERS Dump Missing', 'IN', '07/18/2019 1:41 AM', 'Critical', 'Done', NULL, '07/16/2019 1:58 AM', 'test', 'test+1', 'soumik.shadman', 'soumik.shadman'),
(8786665, '201907270148', '07/09/2019 1:48 AM', 'Alarms in vVSMSC', 'IN', '07/10/2019 1:48 AM', 'Major', 'Pending', NULL, NULL, 'testtt', 'testtt', 'soumik.shadman', ''),
(8786666, '201907270150', '07/09/2019 1:50 AM', 'not', 'VAS & DO', '07/10/2019 1:50 AM', 'Major', 'done', NULL, '07/24/2019 2:38 AM', 'test', 'test +1', 'soumik.shadman', 'soumik.shadman'),
(8786667, '201907270151', '07/09/2019 1:51 AM', 'ERS Health check', 'FS Operations', '07/10/2019 1:51 AM', 'Major', 'Pending', NULL, '', 'test', 'test+4', 'soumik.shadman', 'soumik.shadman'),
(8786668, '201907270205', '07/15/2019 2:04 AM', 'ERS Dump Missing', 'VAS & DO', '07/16/2019 2:04 AM', 'Major', 'Choose...', NULL, '07/22/2019 2:06 AM', 'test', 'test = 5', 'soumik.shadman', 'soumik.shadman'),
(8786669, '201907270241', '07/03/2019 2:40 AM', 'aboltabol', 'aboltabol', '07/04/2019 2:40 AM', 'Critical', 'done', NULL, '07/27/2019 2:42 AM', 'sadasd', 'sadwqe+++', 'soumik.shadman', 'soumik.shadman');

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
(1, 'CSM_SOC', '1234'),
(2, 'soumik.shadman', 'Grameen@033');

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
  MODIFY `main_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8786670;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
