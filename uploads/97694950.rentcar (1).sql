-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2022 at 10:20 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rentcar`
--

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `car_id` int(11) NOT NULL,
  `car_name` varchar(250) COLLATE utf8mb4_bin DEFAULT NULL,
  `car_name_en` varchar(250) COLLATE utf8mb4_bin DEFAULT NULL,
  `car_number` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `car_model` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `car_info` varchar(1000) COLLATE utf8mb4_bin DEFAULT NULL,
  `car_note` varchar(1000) COLLATE utf8mb4_bin DEFAULT NULL,
  `car_regdate` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `car_color` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `car_size` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `car_pay` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `com_id` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `car_numberch` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `car_imageside` varchar(250) COLLATE utf8mb4_bin DEFAULT NULL,
  `car_imagebehind` varchar(250) COLLATE utf8mb4_bin DEFAULT NULL,
  `car_imagefront` varchar(250) COLLATE utf8mb4_bin DEFAULT NULL,
  `car_imageinside` varchar(250) COLLATE utf8mb4_bin DEFAULT NULL,
  `car_issell` varchar(10) COLLATE utf8mb4_bin DEFAULT NULL,
  `car_datesell` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `car_pricepay` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `car_pricerent` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `car_price` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `sal_id` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` int(11) NOT NULL,
  `emp_name` varchar(250) COLLATE utf8mb4_bin DEFAULT NULL,
  `emp_name_en` varchar(250) COLLATE utf8mb4_bin DEFAULT NULL,
  `emp_father` varchar(250) COLLATE utf8mb4_bin DEFAULT NULL,
  `emp_mother` varchar(250) COLLATE utf8mb4_bin DEFAULT NULL,
  `emp_birthdate` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `emp_cardnumber` varchar(250) COLLATE utf8mb4_bin DEFAULT NULL,
  `emp_regdate` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `emp_salary` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `emp_begin` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `emp_end` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `emp_mobile` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `emp_phone` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `emp_email` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `emp_address` varchar(1000) COLLATE utf8mb4_bin DEFAULT NULL,
  `emp_note` varchar(1000) COLLATE utf8mb4_bin DEFAULT NULL,
  `emp_isdriver` varchar(10) COLLATE utf8mb4_bin DEFAULT NULL,
  `emp_drivernumber` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `emp_startdriver` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `emp_enddriver` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `emp_image` varchar(250) COLLATE utf8mb4_bin DEFAULT NULL,
  `emp_driveimage` varchar(250) COLLATE utf8mb4_bin DEFAULT NULL,
  `com_id` varchar(250) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `salecompany`
--

CREATE TABLE `salecompany` (
  `sal_id` int(11) NOT NULL,
  `sal_name` varchar(250) COLLATE utf8mb4_bin DEFAULT NULL,
  `sal_name_en` varchar(250) COLLATE utf8mb4_bin DEFAULT NULL,
  `sal_mobile` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `sal_phone` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `sal_email` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `sal_address` varchar(1000) COLLATE utf8mb4_bin DEFAULT NULL,
  `sal_note` varchar(1000) COLLATE utf8mb4_bin DEFAULT NULL,
  `sal_image` varchar(250) COLLATE utf8mb4_bin DEFAULT NULL,
  `com_id` varchar(250) COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`car_id`);

--
-- Indexes for table `salecompany`
--
ALTER TABLE `salecompany`
  ADD PRIMARY KEY (`sal_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salecompany`
--
ALTER TABLE `salecompany`
  MODIFY `sal_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
