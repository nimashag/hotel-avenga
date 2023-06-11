-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2023 at 11:56 AM
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
-- Database: `hotel avenga`
--

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `reservationID` int(20) NOT NULL,
  `UserID` int(11) NOT NULL,
  `date` varchar(20) NOT NULL,
  `venue` varchar(20) DEFAULT NULL,
  `package` varchar(20) DEFAULT NULL,
  `total` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reservationID`, `UserID`, `date`, `venue`, `package`, `total`) VALUES
(14, 0, '2023-06-11', '200', '1000', 'Rs. 1200.00 /='),
(15, 0, '2023-06-27', '200', '1000', 'Rs. 1200.00 /='),
(16, 0, '2023-06-27', '200', '1000', 'Rs. 1200.00 /='),
(17, 0, '2023-06-27', '100', '1000', 'Rs. 1100.00 /='),
(18, 0, '2023-06-22', '100', '1000', 'Rs. 1100.00 /='),
(19, 0, '2023-06-11', '200', '1000', 'Rs. 1200.00 /='),
(20, 0, '2023-06-11', '50', '500', 'Rs. 550.00 /='),
(21, 0, '2023-06-22', '50', '500', 'Rs. 550.00 /='),
(22, 0, '2023-06-22', '100', '1000', 'Rs. 1100.00 /='),
(23, 0, '2023-06-22', '100', '1000', 'Rs. 1100.00 /='),
(24, 0, '2023-06-22', '100', '1000', 'Rs. 1100.00 /='),
(25, 0, '2023-06-15', '200', '500', 'Rs. 700.00 /=');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reservationID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reservationID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
