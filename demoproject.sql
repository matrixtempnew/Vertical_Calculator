-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2020 at 10:33 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demoproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `vertical_data`
--

CREATE TABLE `vertical_data` (
  `serial_no` int(11) NOT NULL,
  `date1` date NOT NULL,
  `date2` date NOT NULL,
  `input1` float NOT NULL,
  `input2` float NOT NULL,
  `input3` float NOT NULL,
  `input11` float NOT NULL,
  `input22` float NOT NULL,
  `input33` float NOT NULL,
  `input_v1` float NOT NULL,
  `input_v2` float NOT NULL,
  `input_v3` float NOT NULL,
  `output_v1` float NOT NULL,
  `output_v2` float NOT NULL,
  `output_v3` float NOT NULL,
  `diff_v1` float NOT NULL,
  `diff_v2` float NOT NULL,
  `diff_v3` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vertical_data`
--

INSERT INTO `vertical_data` (`serial_no`, `date1`, `date2`, `input1`, `input2`, `input3`, `input11`, `input22`, `input33`, `input_v1`, `input_v2`, `input_v3`, `output_v1`, `output_v2`, `output_v3`, `diff_v1`, `diff_v2`, `diff_v3`) VALUES
(7, '2020-01-02', '2020-01-03', 10, 10, 10, 25, 25, 25, 150, 150, 150, 150, 150, 150, 0, 0, 0),
(8, '0000-00-00', '0000-00-00', 30, 32, 34, 11, 20, 31, -63.3333, -37.5, -8.82353, -63.3333, -37.5, -8.82353, 900, -1100, 200000),
(9, '2020-01-09', '2020-01-23', 35, 39, 40, 45, 50, 55, 28.5714, 28.2051, 37.5, 350, 400, 450, 500, -500, 100000),
(10, '2020-01-24', '2020-01-25', 12, 56, 45, 89, 45, 12, 641.667, -19.6429, -73.3333, 790, 350, 20, -4400, 3300, -770000),
(12, '2020-01-22', '2020-01-27', 45, 50, 60, 55, 75, 80, 22.2222, 50, 33.3333, 450, 650, 700, 2000, -500, 250000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `vertical_data`
--
ALTER TABLE `vertical_data`
  ADD PRIMARY KEY (`serial_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `vertical_data`
--
ALTER TABLE `vertical_data`
  MODIFY `serial_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
