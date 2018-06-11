-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2018 at 12:59 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `date` varchar(15) NOT NULL,
  `createdby` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`id`, `user_name`, `user_email`, `user_password`, `date`, `createdby`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin', '', ''),
(12, 'sufiyan', 'sufiyan@gmail.com', 'sufiyan', '22-02-2018', '1'),
(13, 'roshni', 'rose@gmail.com', 'roshni', '22-02-2018', '12'),
(14, 'nasreen', 'nasreen@gmail.com', 'nasreen', '22-02-2018', '13'),
(15, 'imaam', 'imaam@gmail.com', 'imaam', '22-02-2018', '1'),
(16, 'sai', 'sai@gmail.com', 'sai', '22-02-2018', '1'),
(17, 'Mahindra', 'mahindra@gmail.com', '123456', '22-02-2018', '1'),
(18, 'azmat', 'azmat@gmail.com', 'azmat', '22-02-2018', '1'),
(19, 'ajay', 'ajay@gmail.com', 'ajay', '22-02-2018', '1'),
(20, 'jay', 'jay@gmail.com', 'jay', '22-02-2018', '1');

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE `wallet` (
  `id` int(11) NOT NULL,
  `user_ref` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `points` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `wallet`
--

INSERT INTO `wallet` (`id`, `user_ref`, `name`, `points`) VALUES
(2, '1', 'sufiyan', '3'),
(3, '12', 'roshni', '3'),
(4, '1', 'roshni', '2'),
(5, '13', 'nasreen', '3'),
(6, '12', 'nasreen', '2'),
(7, '1', 'nasreen', '1'),
(8, '1', 'imaam', '3'),
(9, '1', 'sai', '3'),
(10, '1', 'Mahindra', '3'),
(11, '1', 'azmat', '3'),
(12, '1', 'ajay', '3'),
(13, '1', 'jay', '3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `wallet`
--
ALTER TABLE `wallet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
