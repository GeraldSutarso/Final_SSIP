-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2022 at 08:09 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rent`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `book_id` int(255) NOT NULL,
  `user_id` int(50) NOT NULL,
  `car_id` int(50) NOT NULL,
  `driver_id` int(50) NOT NULL,
  `startDate` varchar(2555) NOT NULL,
  `endDate` varchar(2555) NOT NULL,
  `price` int(100) NOT NULL,
  `no_days` int(50) DEFAULT NULL,
  `total_price` int(255) NOT NULL,
  `returned` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `car_id` int(255) NOT NULL,
  `car_name` varchar(50) NOT NULL,
  `car_nameplate` varchar(50) NOT NULL,
  `car_img` varchar(50) DEFAULT 'NA',
  `price` int(11) DEFAULT NULL,
  `year` int(6) DEFAULT NULL,
  `car_availability` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`car_id`, `car_name`, `car_nameplate`, `car_img`, `price`, `year`, `car_availability`) VALUES
(11, 'Pajero Sport', 'F 1982 GHJ', 'pajero.png', 500000, 2021, 1),
(12, 'Toyota Alphard', 'B 1675 FDR', 'alphard.png', 850000, 2021, 1),
(13, 'Honda City Hatchback', 'B 1563 HJK', 'city.png', 660000, 2022, 1),
(14, 'Avanza Veloz', 'F 8907 KJH', 'veloz.png', 350000, 2022, 1),
(15, 'BMW G20', 'B 12 FI', 'bmw.png', 1200000, 2022, 1),
(16, 'Mercedes-Benz G-Class', 'B 63 GLS', 'gclass.png', 3000000, 2022, 1),
(17, 'Toyota Fortuner', 'B 1434 RYT', 'Fortuner.png', 600000, 2019, 1),
(18, 'Toyota Cayla', 'B 7865 TYR', 'calya.png', 350000, 2021, 1),
(19, 'toyota 86', 'B 86 GTR', 'mcqueen.png', 900000, 2020, 1);

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `driver_id` int(255) NOT NULL,
  `driver_name` varchar(50) NOT NULL,
  `dl_number` varchar(50) NOT NULL,
  `driver_phone` varchar(15) NOT NULL,
  `driver_address` varchar(50) NOT NULL,
  `driver_gender` varchar(10) NOT NULL,
  `driver_availability` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`driver_id`, `driver_name`, `dl_number`, `driver_phone`, `driver_address`, `driver_gender`, `driver_availability`) VALUES
(2, 'Gerald', '1231231', '+61231231', 'Jl.Beringin', 'Male', 1),
(3, 'Dlareg', '1231232', '+61231213', 'Jln.Sukabumi', 'Female', 1),
(4, 'Budi', '76712391', '+628777813122', 'jln.Bukitrendah', 'Male', 1),
(5, 'Arzidan', '0998798765', '09358387583', 'Bekasi', 'Male', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_form`
--

CREATE TABLE `user_form` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_form`
--

INSERT INTO `user_form` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(1, 'ARZIDAN ', 'arzidanakbar7@gmail.com', 'cc03e747a6afbbcbf8be7668acfebee5', 'user'),
(2, 'Geraldadmin', 'testTwo@mail.co.id', 'e00cf25ad42683b3df678c61f42c6bda', 'admin'),
(3, 'test', 'test@gmail.com', 'cc03e747a6afbbcbf8be7668acfebee5', 'admin'),
(4, 'Geralduser', 'geralduser@mail.com', '24c9e15e52afc47c225b757e7bee1f9d', 'user'),
(5, 'Admin', 'admin@gmail.com', '0192023a7bbd73250516f069df18b500', 'admin'),
(6, 'Zidan', 'arzidan@gmail.com', '4fbf75d0116d507cf2a465f44665dd49', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `FK_PersonOrder` (`user_id`),
  ADD KEY `car_id` (`car_id`),
  ADD KEY `driver_id` (`driver_id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`car_id`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`driver_id`);

--
-- Indexes for table `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `book_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `car_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `driver_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`car_id`) REFERENCES `cars` (`car_id`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`driver_id`) REFERENCES `driver` (`driver_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
