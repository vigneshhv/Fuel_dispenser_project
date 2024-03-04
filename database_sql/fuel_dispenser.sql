-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2024 at 07:18 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fuel_dispenser`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminid` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `password`) VALUES
('admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `block`
--

CREATE TABLE `block` (
  `Reg_no` varchar(20) NOT NULL,
  `Reason` varchar(20) NOT NULL,
  `Block_date` datetime NOT NULL DEFAULT current_timestamp(),
  `Unblock_date` datetime DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `block_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `block`
--

INSERT INTO `block` (`Reg_no`, `Reason`, `Block_date`, `Unblock_date`, `status`, `block_id`) VALUES
('KA17EG3771', 'challan', '2023-12-01 20:12:48', '2023-12-02 21:40:40', 0, 16),
('KA17EG3771', 'challan', '2023-12-01 20:14:46', '2023-12-02 21:40:40', 0, 17),
('KA17HJ9105', 'court_order', '2023-12-03 18:41:25', NULL, 1, 18);

-- --------------------------------------------------------

--
-- Table structure for table `challan`
--

CREATE TABLE `challan` (
  `Challan_Id` int(11) NOT NULL,
  `Reg_no` varchar(20) NOT NULL,
  `Ammount` int(11) NOT NULL,
  `Reason` text NOT NULL,
  `Challan_type` tinytext NOT NULL,
  `Status` tinyint(1) NOT NULL,
  `challan_ date` date DEFAULT current_timestamp(),
  `amount_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `challan`
--

INSERT INTO `challan` (`Challan_Id`, `Reg_no`, `Ammount`, `Reason`, `Challan_type`, `Status`, `challan_ date`, `amount_date`) VALUES
(125, 'KA17EG3772', 100, 'Caught at drink and drive', 'Negligence Driving', 0, '2023-11-18', NULL),
(126, 'KA17EG3772', 150, 'Speeding', 'Traffic', 1, '2023-11-18', '2023-11-23'),
(127, 'KA17EG3772', 75, 'Parking violation', 'Parking', 0, '2023-11-18', NULL),
(128, 'KA17EG3771', 120, 'Red light violation', 'Traffic', 1, '2023-11-18', '2023-12-03'),
(129, 'KA17EG3771', 90, 'No seatbelt', 'Traffic', 0, '2023-11-18', NULL),
(130, 'KA17EG3772', 110, 'Wrong lane driving', 'Traffic', 0, '2023-11-18', NULL),
(131, 'KA17EG3771', 80, 'Expired license', 'Documentation', 0, '2023-11-18', NULL),
(132, 'KA17EG3772', 95, 'Illegal parking', 'Parking', 0, '2023-11-18', NULL),
(133, 'KA17EG3771', 200, 'Reckless driving', 'Negligence Driving', 1, '2023-11-18', '2023-12-03'),
(134, 'KA17EG3772', 130, 'Over speeding', 'Traffic', 1, '2023-11-18', '2023-11-23');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `ID` int(11) NOT NULL,
  `File_type` varchar(40) NOT NULL,
  `File` longblob NOT NULL,
  `file_name` varchar(20) NOT NULL,
  `Submitted_date` date NOT NULL DEFAULT current_timestamp(),
  `verified_date` date NOT NULL,
  `File_status` enum('Under Verification','Verifed','Rejected','Not submitted') NOT NULL DEFAULT 'Not submitted',
  `Reg_no` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fuel`
--

CREATE TABLE `fuel` (
  `Reg_no` varchar(10) NOT NULL,
  `Date` date DEFAULT current_timestamp(),
  `Time` time DEFAULT current_timestamp(),
  `amount` int(11) DEFAULT NULL,
  `RFID_no` varchar(20) DEFAULT NULL,
  `fuel_used` tinytext NOT NULL,
  `ID` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fuel`
--

INSERT INTO `fuel` (`Reg_no`, `Date`, `Time`, `amount`, `RFID_no`, `fuel_used`, `ID`, `status`) VALUES
('KA17EG3772', '2023-11-13', '13:10:33', 100, 'KA12345abc', 'Diesel', 3, 1),
('KA17EG3771', '2023-11-13', '14:21:05', 500, 'KA1234abc', 'Petrol', 5, 1),
('KA17EG3771', '2023-11-13', '18:42:39', 200, 'KA1234abc', 'Petrol', 6, 1),
('KA17EG3772', '2023-11-13', '18:47:57', 100, 'KA12345abc', 'Diesel', 7, NULL),
('KA17EG3772', '2023-11-13', '18:55:36', 100, 'KA12345abc', 'Diesel', 8, NULL),
('KA17EG3772', '2023-11-13', '18:59:54', 100, 'KA12345abc', 'Diesel', 9, 1),
('KA17EG3771', '2023-11-13', '19:01:19', 50, 'KA1234abc', 'Petrol', 10, 1),
('KA17EG3771', '2023-11-13', '19:06:03', 70, 'KA1234abc', 'Petrol', 11, 1),
('KA17EG3772', '2023-11-18', '19:24:50', 100, 'KA12345abc', 'Diesel', 17, 1),
('KA17EG3772', '2023-11-23', '11:39:25', 80, 'KA12345abc', 'Diesel', 18, 1);

-- --------------------------------------------------------

--
-- Table structure for table `fuel_price`
--

CREATE TABLE `fuel_price` (
  `fuel` enum('Petrol','Diesel') NOT NULL,
  `price` int(11) NOT NULL,
  `ID` int(11) NOT NULL,
  `Place` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fuel_price`
--

INSERT INTO `fuel_price` (`fuel`, `price`, `ID`, `Place`) VALUES
('Petrol', 100, 1, ''),
('Diesel', 70, 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `Sl_no` int(11) NOT NULL,
  `password` varchar(20) NOT NULL,
  `Phone` varchar(30) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `user_type` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`Sl_no`, `password`, `Phone`, `user_name`, `email`, `user_type`) VALUES
(9, 'Niharika@999', '9902557843', 'Niharikam', 'niharika@gmail.com', 'user'),
(14, 'admin', '8951269743', 'vigneshhv', 'vigneshhv2002@gmail.com', 'user'),
(16, 'Avinash@99', '09902257843', 'avinash', 'avinashv2007@gmail.com', 'user'),
(18, 'AVinash@22', '09902257843', 'Avinash123', 'avinashv2007@gmail.com', 'user'),
(19, 'Avinash@1234', '09902257843', 'Avinash1234', 'avinashv2007@gmail.com', 'user'),
(20, 'Suraj@991', '08951269743', 'Suraj', 'suraj@gmail.com', 'user'),
(21, 'Suraj12@09', '08951269743', 'Suraj12', 'suraj@gmail.com', 'user'),
(23, 'Svm@2002', '8431030800', 'Suraj V Mudhole', 'svmdvg800@gmail.com', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `Name` text NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Reg_no` varchar(10) NOT NULL,
  `RFID_no` varchar(15) NOT NULL,
  `Vehicle_type` enum('Two Wheeler','Four-Wheeler','Goods','') NOT NULL,
  `Model` varchar(20) NOT NULL,
  `Address` mediumtext NOT NULL,
  `Tank_capacity` int(11) NOT NULL,
  `Fuel_used` enum('Petrol','Diesel','CNG','Electric') NOT NULL,
  `req_fuel` float DEFAULT NULL,
  `req_fuel_amnt` float DEFAULT NULL,
  `account_balance` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `Reward` int(11) NOT NULL,
  `user_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`Name`, `Phone`, `Email`, `Reg_no`, `RFID_no`, `Vehicle_type`, `Model`, `Address`, `Tank_capacity`, `Fuel_used`, `req_fuel`, `req_fuel_amnt`, `account_balance`, `status`, `Reward`, `user_name`) VALUES
('Vignesh H V', '895126974', 'vigneshhv2002@gmail.', 'KA17EG3771', 'KA1234abc', 'Two Wheeler', 'Honda', '3308', 20, 'Petrol', 0, 100, 680, 1, 0, 'vigneshhv'),
('Avinash H V', '564815899', 'vigneshhv200@gmail.com', 'KA17EG3772', 'KA12345abc', 'Two Wheeler', 'Honda', '#33456', 20, 'Diesel', 1, 0, 737, 1, 0, ''),
('SURAJ VIJAYKUMAR MUDHOLE', '8431030800', 'svmdvg800@gmail.com', 'KA17HJ9105', 'ABC12589SD', 'Two Wheeler', 'GIXXER SF 155', '#2546/4 , 6th main , MCC A Block\r\nNear Sukrithendra kalyana mantapa', 13, 'Petrol', 0, 100, 0, 0, 0, 'vigneshhv');

-- --------------------------------------------------------

--
-- Table structure for table `rtologin`
--

CREATE TABLE `rtologin` (
  `userid` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rtologin`
--

INSERT INTO `rtologin` (`userid`, `password`) VALUES
('svm', 'svm123');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `slno` int(11) NOT NULL,
  `refence_id` varchar(20) NOT NULL,
  `Transaction_Id` varchar(20) NOT NULL,
  `ammount` int(11) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`slno`, `refence_id`, `Transaction_Id`, `ammount`, `time`) VALUES
(26, '126', 'pay_N3omh6pL5MHeFv', 150, '2023-11-23 12:04:25'),
(27, '134', 'pay_N3onSYO57MTVEv', 130, '2023-11-23 12:05:08'),
(28, '128', 'pay_N7spPShAviHBhU', 120, '2023-12-03 18:37:47'),
(29, '133', 'pay_N7tJGyua7uZLXH', 200, '2023-12-03 19:06:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `block`
--
ALTER TABLE `block`
  ADD PRIMARY KEY (`block_id`);

--
-- Indexes for table `challan`
--
ALTER TABLE `challan`
  ADD PRIMARY KEY (`Challan_Id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `fuel`
--
ALTER TABLE `fuel`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `fuel_price`
--
ALTER TABLE `fuel_price`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`Sl_no`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`Reg_no`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`slno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `block`
--
ALTER TABLE `block`
  MODIFY `block_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `fuel`
--
ALTER TABLE `fuel`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `fuel_price`
--
ALTER TABLE `fuel_price`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `Sl_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `slno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
