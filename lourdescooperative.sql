-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2017 at 11:40 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lourdescooperative`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `added_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `username`, `password`, `added_date`) VALUES
(1, 'Alexander Suan', 'suanarcade', '12345678', '2017-09-08 15:25:40');

-- --------------------------------------------------------

--
-- Table structure for table `balance`
--

CREATE TABLE `balance` (
  `balance_id` int(11) NOT NULL,
  `balance` double NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `balance`
--

INSERT INTO `balance` (`balance_id`, `balance`, `userID`) VALUES
(1, 0, 47),
(2, 33, 48),
(3, 0, 49),
(4, 0, 50),
(5, 0, 51),
(6, 0, 52),
(7, 0, 53),
(8, 5000, 54),
(9, 0, 55),
(10, 0, 56),
(11, 2000, 57),
(12, 0, 58);

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `IDnumber` int(15) NOT NULL,
  `Firstname` varchar(15) NOT NULL,
  `Lastname` varchar(15) NOT NULL,
  `Middlename` varchar(15) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Level` varchar(20) NOT NULL,
  `Password` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`IDnumber`, `Firstname`, `Lastname`, `Middlename`, `Email`, `Level`, `Password`) VALUES
(123456445, 'oriel', 'BAGARES', 'vecina', 'oriel@gmail.com', 'Basic-ED', '13456'),
(0, '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id` int(11) NOT NULL,
  `level` varchar(30) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id`, `level`, `description`) VALUES
(1, 'Basic-Ed', 'Basic Education'),
(2, 'High-Ed', 'Higher Education');

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `loan_id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `spouse_name` varchar(255) NOT NULL,
  `occupation` text NOT NULL,
  `monthly_income` double NOT NULL,
  `properties_owned` text NOT NULL,
  `assessed_value` double NOT NULL,
  `amount_applied` double NOT NULL,
  `purpose` text NOT NULL,
  `term` int(2) NOT NULL,
  `date_granted` date DEFAULT NULL,
  `date_due` date DEFAULT NULL,
  `balance_id` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `date_applied` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loans`
--

INSERT INTO `loans` (`loan_id`, `userID`, `spouse_name`, `occupation`, `monthly_income`, `properties_owned`, `assessed_value`, `amount_applied`, `purpose`, `term`, `date_granted`, `date_due`, `balance_id`, `status`, `date_applied`) VALUES
(4, 55, 'Sophia ', 'Nurse', 25000, 'Villa Manor', 500000000, 10000, 'Pangtagay', 12, NULL, NULL, 9, 0, '2017-09-27 17:11:18');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notification_id` int(11) NOT NULL,
  `notification` longtext NOT NULL,
  `sender` varchar(255) NOT NULL,
  `recipient` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`notification_id`, `notification`, `sender`, `recipient`, `status`, `timestamp`) VALUES
(30, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n			consequat. Duis aute ', 'james belisario', 48, 0, '2017-09-20 07:33:54'),
(31, '	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n							consequa', 'jaybagz bagares', 48, 0, '2017-09-20 07:38:36'),
(32, '	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n			consequat. Duis aute', 'jaybagz bagares', 48, 0, '2017-09-20 07:57:31'),
(33, '  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n             tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n             quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n             consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n             cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n             proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n             Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n             tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n             quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n             consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n             cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n             proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n             Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n             tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n             quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n             consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n             cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n             proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n                ', 'jaybagz bagares', 48, 0, '2017-09-20 08:02:30'),
(34, 'Hi james :) ', 'Jantinn Erezo', 54, 0, '2017-09-20 14:24:32'),
(35, 'dsdasdada', 'Alexander Suan', 54, 0, '2017-09-22 05:09:12'),
(36, 'sample', 'Alexander Suan', 57, 0, '2017-09-23 07:41:28'),
(37, 'Hello dude', 'Alexander Suan', 55, 0, '2017-09-27 19:04:55');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transaction_id` int(11) NOT NULL,
  `transaction` varchar(255) NOT NULL,
  `userID` int(11) NOT NULL,
  `transaction_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transaction_id`, `transaction`, `userID`, `transaction_date`) VALUES
(1, 'Jantinn Erezo deposited an amount of 579', 27, '2017-09-09 16:45:21'),
(2, 'grapes rosalem deposited an amount of 5000', 30, '2017-09-09 16:54:10'),
(3, 'grapes rosalem deposited an amount of 5500', 30, '2017-09-11 06:15:14'),
(4, 'qwerty zxcvb deposited an amount of 10000', 31, '2017-09-12 06:38:01'),
(5, 'carl bondoc deposited an amount of 5000', 33, '2017-09-12 07:36:22'),
(6, 'carl bondoc deposited an amount of 1000005000', 33, '2017-09-12 07:44:15'),
(7, 'carl bondoc deposited an amount of 5000', 33, '2017-09-18 16:09:53'),
(8, 'Jantinn erezo deposited an amount of 90', 48, '2017-09-20 03:33:32'),
(9, 'Jantinn erezo deposited an amount of Php60', 48, '2017-09-20 03:38:16'),
(10, 'Jantinn erezo deposited an amount of Php70', 48, '2017-09-20 03:40:03'),
(11, 'Jantinn erezo deposited an amount of Php 70', 48, '2017-09-20 03:40:29'),
(12, 'Jantinn erezo deposited an amount of Php 100', 48, '2017-09-20 03:41:00'),
(13, 'Jantinn erezo deposited an amount of Php 20', 48, '2017-09-20 03:41:29'),
(14, ' withdrawed an amount of 30', 48, '2017-09-20 03:42:30'),
(15, 'Jantinn erezo just logged in', 48, '2017-09-20 04:19:02'),
(16, 'Jantinn erezo just logged in', 48, '2017-09-20 07:38:18'),
(17, ' withdrawed an amount of 67', 48, '2017-09-20 07:47:45'),
(18, 'Jantinn erezo just logged in', 48, '2017-09-20 08:36:18'),
(19, 'james belisario just logged in', 54, '2017-09-20 14:24:00'),
(20, 'james belisario deposited an amount of Php 5000', 54, '2017-09-22 05:07:42'),
(21, 'rose cardenas just logged in', 57, '2017-09-23 07:37:38'),
(22, 'rose cardenas deposited an amount of Php 5000', 57, '2017-09-23 07:38:51'),
(23, ' withdrawed an amount of 3000', 57, '2017-09-23 07:41:00'),
(24, 'rose cardenas just logged in', 57, '2017-09-23 07:41:43'),
(25, 'oriel bagares just logged in', 55, '2017-09-27 14:43:20'),
(26, 'oriel bagares just logged in', 55, '2017-09-27 15:00:58'),
(27, 'oriel bagares just logged in', 55, '2017-09-27 15:45:21'),
(28, 'oriel bagares just logged in', 55, '2017-09-27 15:54:07'),
(29, 'oriel bagares just logged in', 55, '2017-09-27 16:43:50'),
(30, 'oriel bagares just logged in', 55, '2017-09-27 16:45:31'),
(31, 'oriel bagares just logged in', 55, '2017-09-27 19:01:12');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(15) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `user_type` int(1) NOT NULL,
  `level_id` int(11) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `birth_date` date NOT NULL,
  `marital_status` varchar(30) NOT NULL,
  `citizenship` varchar(100) DEFAULT NULL,
  `age` int(2) DEFAULT NULL,
  `spouse_name` varchar(255) DEFAULT NULL,
  `occupation` varchar(255) DEFAULT NULL,
  `monthly_income` varchar(255) DEFAULT NULL,
  `properties_owned` text,
  `assessed_value` varchar(255) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `zipcode` varchar(10) NOT NULL,
  `approved` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `password`, `firstname`, `middlename`, `lastname`, `email`, `user_type`, `level_id`, `gender`, `birth_date`, `marital_status`, `citizenship`, `age`, `spouse_name`, `occupation`, `monthly_income`, `properties_owned`, `assessed_value`, `address`, `city`, `zipcode`, `approved`) VALUES
(57, '95ac379040aef05c290dc011e191a6d8', 'rose', '', 'cardenas', 'carlbondoc@gmail.com', 0, 1, 'male', '2017-09-05', 'single', 'filipino', NULL, NULL, NULL, NULL, NULL, NULL, 'kauswagan', 'male', '9000', 1),
(54, '7a27370c305d9e9108f1918efcf61c9e', 'james', '', 'belisario', 'belisario@gmail.com', 0, 1, 'male', '2017-09-08', 'single', 'filipino', NULL, NULL, NULL, NULL, NULL, NULL, 'somewhere', 'male', '9000', 1),
(55, '7faa8fe5cae588afed587e208409dfe2', 'oriel', '', 'bagares', 'orielbagares@gmail.com', 0, 2, 'male', '2017-10-08', 'single', 'filipino', NULL, NULL, NULL, NULL, NULL, NULL, 'NHA Kauswagan CDO', 'male', '9000', 1),
(56, '3dc8525def06cc5d54dadddf3e477d98', 'Alexander', '', 'Suan', 'alexandersuan@gmail.com', 1, 2, 'male', '2017-09-13', 'married', 'filipino', NULL, NULL, NULL, NULL, NULL, NULL, 'CDO', 'male', '9000', 1),
(58, 'dfb920cd47cfccffd99fc7ac6bcab223', 'Jantinn', '', 'Erezo', 'janerezo10@gmail.com', 0, 2, 'male', '2017-09-30', 'single', 'filipino', 20, NULL, NULL, NULL, NULL, NULL, 'lessandra', 'male', '9000', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `balance`
--
ALTER TABLE `balance`
  ADD PRIMARY KEY (`balance_id`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`loan_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `balance`
--
ALTER TABLE `balance`
  MODIFY `balance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `loans`
--
ALTER TABLE `loans`
  MODIFY `loan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
