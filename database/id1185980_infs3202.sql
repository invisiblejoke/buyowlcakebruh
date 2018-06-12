-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2017 at 06:26 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id1185980_infs3202`
--

-- --------------------------------------------------------

--
-- Table structure for table `recoveryemails_enc`
--

CREATE TABLE `recoveryemails_enc` (
  `ID` int(20) NOT NULL,
  `uid` int(20) NOT NULL,
  `ukey` varchar(32) NOT NULL,
  `expDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recoveryemails_enc`
--

INSERT INTO `recoveryemails_enc` (`ID`, `uid`, `ukey`, `expDate`) VALUES
(9, 1241, '0a9d3f71c920b29303cfabc7a0c243b5', '2017-05-16 18:27:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phoneNo` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `username`, `password`, `email`, `phoneNo`) VALUES
(1235, '1234', '1234', '1234@gmail.com', ''),
(1237, 'qqqqqq', '$2a$10$.5lhv1uCwisigWoEc78ZqOnctAUUdVAcxKSYEfaupWxrYfNNjy6Ja', 'qqqqqq@gmail.com', ''),
(1238, 'qwqwqw', '$2a$10$qChZJ0ikZtsTSjCjjKLgFuU.vw59AmpLksr/lWfeIrpeYkMu6XQw.', 'qwqwqw@gmail.com', ''),
(1239, '', '', '', ''),
(1240, 'qqqq', '1718c24b10aeb8099e3fc44960ab6949ab76a267352459f203ea1036bec382c2', 'qqqq@gmail.com', '12-12121212'),
(1241, 'weiqing', 'ec4c88ca7f69534f10c0611c1ecd13e7c2cdf73e1b915e9fd0cf27ac10da43fa', 'weiqing.chin@gmail.com', '12-12121212'),
(1242, 'eethung', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'loh_eethung@hotmail.com', '12-12121212'),
(1243, 'jjjj', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'j@j.com', '12-12121212'),
(1245, 'yolo', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'yolo@gmail.com', '12-12121212'),
(1246, 'yolo2', '8bb0cf6eb9b17d0f7d22b456f121257dc1254e1f01665370476383ea776df414', 'yolo2@gmail.com', '12-12121212'),
(1247, 'testing', '1718c24b10aeb8099e3fc44960ab6949ab76a267352459f203ea1036bec382c2', 'qdevtestingemail@gmail.com', '12-12121212');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `recoveryemails_enc`
--
ALTER TABLE `recoveryemails_enc`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `recoveryemails_enc`
--
ALTER TABLE `recoveryemails_enc`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1248;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
