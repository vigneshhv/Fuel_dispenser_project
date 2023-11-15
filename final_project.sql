-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2023 at 03:30 AM
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
-- Database: `final_project`
--

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
  `Status` int(11) NOT NULL
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
('KA17EG3771', '2023-11-13', '19:06:03', 70, 'KA1234abc', 'Petrol', 11, 1);

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
('Diesel', 80, 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `Sl_no` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `user_type` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `pollution_certifcate` longblob NOT NULL,
  `pollution_status` tinyint(4) NOT NULL,
  `insurance_certificate` longblob NOT NULL,
  `insurance` tinytext NOT NULL,
  `Reward` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`Name`, `Phone`, `Email`, `Reg_no`, `RFID_no`, `Vehicle_type`, `Model`, `Address`, `Tank_capacity`, `Fuel_used`, `req_fuel`, `req_fuel_amnt`, `account_balance`, `status`, `pollution_certifcate`, `pollution_status`, `insurance_certificate`, `insurance`, `Reward`) VALUES
('Vignesh H V', '895126974', 'vigneshhv2002@gmail.', 'KA17EG3771', 'KA1234abc', 'Two Wheeler', 'Honda', '3308', 20, 'Petrol', 0, 0, 680, 1, '', 0, '', '', 0),
('Avinash H V', '564815899', 'vigneshhv200@gmail.com', 'KA17EG3772', 'KA12345abc', 'Two Wheeler', 'Honda', '#33456', 20, 'Diesel', 0, 100, 665, 1, '', 0, '', '', 0);

--
-- Indexes for dumped tables
--

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
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`Reg_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fuel`
--
ALTER TABLE `fuel`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `fuel_price`
--
ALTER TABLE `fuel_price`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
