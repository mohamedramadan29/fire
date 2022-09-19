-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2022 at 09:34 AM
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
-- Table structure for table `accident`
--

CREATE TABLE `accident` (
  `acc_id` int(11) NOT NULL,
  `ren_id` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `acc_date` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `acc_number` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `acc_place` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `acc_cost` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `acc_note` varchar(1000) COLLATE utf8mb4_bin DEFAULT NULL,
  `acc_paid` varchar(10) COLLATE utf8mb4_bin DEFAULT NULL,
  `acc_image` varchar(250) COLLATE utf8mb4_bin DEFAULT NULL,
  `acc_image2` varchar(250) COLLATE utf8mb4_bin DEFAULT NULL,
  `acc_image3` varchar(250) COLLATE utf8mb4_bin DEFAULT NULL,
  `acc_image4` varchar(250) COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `pay_customer`
--

CREATE TABLE `pay_customer` (
  `pay_id` int(11) NOT NULL,
  `pay_amount` varchar(150) COLLATE utf8mb4_bin DEFAULT NULL,
  `ren_id` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `pay_datepay` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `pay_note` varchar(1000) COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `rental`
--

CREATE TABLE `rental` (
  `ren_id` int(11) NOT NULL,
  `ren_number` varchar(250) COLLATE utf8mb4_bin DEFAULT NULL,
  `cus_id` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `ren_fromdate` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `ren_todate` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `ren_price` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `car_id` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `emp_id_recive` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `emp_id_take` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `ren_before_note` varchar(1000) COLLATE utf8mb4_bin DEFAULT NULL,
  `ren_after_note` varchar(1000) COLLATE utf8mb4_bin DEFAULT NULL,
  `ren_kmin` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `ren_kmout` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `ren_timeout` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `ren_timein` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `ren_out` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `ren_out_petrol` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `ren_in_petrol` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `pay_id` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `ren_amount_take` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `ren_amount_remain` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `ren_costaccident` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `ren_distance` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `ren_number_day` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `ins_id` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `ren_price_out_km` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `ren_price_petrol` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `ren_price_wash` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `ren_price_extra` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `ren_check` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `ren_regdate` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accident`
--
ALTER TABLE `accident`
  ADD PRIMARY KEY (`acc_id`);

--
-- Indexes for table `pay_customer`
--
ALTER TABLE `pay_customer`
  ADD PRIMARY KEY (`pay_id`);

--
-- Indexes for table `rental`
--
ALTER TABLE `rental`
  ADD PRIMARY KEY (`ren_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accident`
--
ALTER TABLE `accident`
  MODIFY `acc_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pay_customer`
--
ALTER TABLE `pay_customer`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rental`
--
ALTER TABLE `rental`
  MODIFY `ren_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
