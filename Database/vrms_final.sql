-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2024 at 10:01 AM
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
-- Database: `vrms_final`
--

-- --------------------------------------------------------

--
-- Table structure for table `canceltab`
--

CREATE TABLE `canceltab` (
  `vehicle_id` varchar(100) NOT NULL,
  `vehicle_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `cancel_date` varchar(100) NOT NULL,
  `cancelid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `canceltab`
--

INSERT INTO `canceltab` (`vehicle_id`, `vehicle_name`, `email`, `cancel_date`, `cancelid`) VALUES
('003', 'asd', 'aha@gmail.com', '2024/05/07', '001'),
('004', 'asd', 'aha@gmail.com', '2024/05/07', '002'),
('006', 'Dolphin', 'aha@gmail.com', '2024/05/07', '003'),
('005', 'Dolphin', 'abc@gmail.com', '2024/05/07', '004'),
('001', 'Dolphin', 'aha@gmail.com', '2024/05/08', '07');

-- --------------------------------------------------------

--
-- Table structure for table `fine`
--

CREATE TABLE `fine` (
  `id` varchar(100) NOT NULL,
  `issue` varchar(1000) NOT NULL,
  `fine` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fine`
--

INSERT INTO `fine` (`id`, `issue`, `fine`) VALUES
('01', 'any scratches happens on the car ', 4000);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `UserName` varchar(20) NOT NULL,
  `TelephoneNo` int(20) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `EmailID` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `UserType` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`UserName`, `TelephoneNo`, `Address`, `EmailID`, `password`, `UserType`) VALUES
('', 0, '', '', '', 'User'),
('abc', 771234598, 'galaha', 'abc@gmail.com', 'abc123', 'User'),
('azri', 785272056, 'qatari', 'aha@gmail.com', '1234', 'User'),
('Amri', 771281983, 'Hemmathagama', 'amrymahroof@gmail.com', '6268', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `rental`
--

CREATE TABLE `rental` (
  `vehicle_id` varchar(100) NOT NULL,
  `vehicle_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `rental_date` varchar(100) NOT NULL,
  `duration` int(100) NOT NULL,
  `rental_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rental`
--

INSERT INTO `rental` (`vehicle_id`, `vehicle_name`, `email`, `rental_date`, `duration`, `rental_id`) VALUES
('003', 'asd', 'abc@gmail.com', '2024/05/07', 5, '01'),
('004', 'suzuki Buddy', 'aha@gmail.com', '2024/05/08', 2, '02'),
('006', 'Dolphin', 'aha@gmail.com', '2023/05/10', 2, '03'),
('005', 'Dolphin', 'abc@gmail.com', '2023/05/10', 2, '04'),
('003', 'Dolphin', 'abc@gmail.com', '2023/05/10', 2, '05'),
('001', 'Dolphin', 'aha@gmail.com', '2024/05/08', 2, '07');

-- --------------------------------------------------------

--
-- Table structure for table `returntab`
--

CREATE TABLE `returntab` (
  `vehicle_id` varchar(100) NOT NULL,
  `vehicle_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `return_date` varchar(100) NOT NULL,
  `return_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `returntab`
--

INSERT INTO `returntab` (`vehicle_id`, `vehicle_name`, `email`, `return_date`, `return_id`) VALUES
('003', 'asd', 'aha@gmail.com', '2023/05/11', '2');

-- --------------------------------------------------------

--
-- Table structure for table `rules`
--

CREATE TABLE `rules` (
  `id` varchar(100) NOT NULL,
  `rule` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rules`
--

INSERT INTO `rules` (`id`, `rule`) VALUES
('001', 'if you are srilankan citizen you must want to submit the your NIC copy and Licence copy'),
('002', 'if you are foreign citizen you must want to submit your passport copy');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `image` varchar(100) NOT NULL,
  `vehicle_id` varchar(100) NOT NULL,
  `vehicle_name` varchar(100) NOT NULL,
  `one_day_price` int(100) NOT NULL,
  `AC` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `Status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`image`, `vehicle_id`, `vehicle_name`, `one_day_price`, `AC`, `type`, `Status`) VALUES
('663c53671c34b.jpg', '001', 'ert', 5000, 'AC', 'auto', 'available'),
('663c70ffeef0a.jpg', '002', 'caravan', 1500, 'NO', 'Manual', 'available'),
('663b6ab81f5ca.jpg', '003', 'asd', 800, 'yes', 'auto', 'book'),
('663b6b88cede4.jpg', '004', 'suzuki Buddy', 1000, 'yes', 'auto', 'available'),
('663c5e64b7564.jpg', '005', 'dolphin', 2000, 'yes', 'auto', 'available'),
('663c5c1bc6b9f.jpg', '006', 'Dolphin', 4000, 'yes', 'Manual', 'available'),
('663e3d0380527.jpeg', '009', 'disel', 4000, 'NO', 'auto', 'available');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `canceltab`
--
ALTER TABLE `canceltab`
  ADD PRIMARY KEY (`cancelid`);

--
-- Indexes for table `fine`
--
ALTER TABLE `fine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`EmailID`);

--
-- Indexes for table `rental`
--
ALTER TABLE `rental`
  ADD PRIMARY KEY (`rental_id`);

--
-- Indexes for table `returntab`
--
ALTER TABLE `returntab`
  ADD PRIMARY KEY (`return_id`);

--
-- Indexes for table `rules`
--
ALTER TABLE `rules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`vehicle_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
