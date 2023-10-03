-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2023 at 09:39 AM
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

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`book_id`, `user_id`, `car_id`, `driver_id`, `startDate`, `endDate`, `price`, `no_days`, `total_price`, `returned`) VALUES
(8, 4, 8, 6, '2022-12-19', '2022-12-28', 999999, 9, 8999991, 'yes'),
(9, 4, 4, 5, '2022-12-19', '2022-12-20', 150000, 1, 150000, 'yes'),
(14, 5, 7, 6, '2022-12-19', '2022-12-21', 230000, 2, 460000, 'yes'),
(15, 5, 4, 6, '2022-12-19', '2022-12-30', 150000, 11, 1650000, 'yes'),
(16, 6, 8, 5, '2022-12-19', '2022-12-22', 999999, 3, 2999997, 'yes'),
(17, 6, 14, 3, '2022-12-19', '2022-12-20', 350000, 1, 350000, 'yes'),
(18, 6, 3, 8, '2022-12-19', '2022-12-21', 200000, 2, 400000, 'yes'),
(19, 6, 7, 2, '2022-12-19', '2022-12-21', 230000, 2, 460000, 'yes'),
(20, 6, 4, 8, '2022-12-19', '2022-12-20', 150000, 1, 150000, 'yes'),
(21, 6, 3, 6, '2022-12-19', '2022-12-20', 200000, 1, 200000, 'yes'),
(22, 6, 7, 5, '2022-12-19', '2022-12-27', 230000, 8, 1840000, 'yes'),
(23, 6, 4, 3, '2023-09-05', '2023-09-28', 150000, 23, 3450000, 'yes');

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
  `car_availability` tinyint(1) DEFAULT 1,
  `car_status` enum('Accessible','Inaccessible') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`car_id`, `car_name`, `car_nameplate`, `car_img`, `price`, `year`, `car_availability`, `car_status`) VALUES
(3, 'Hyundai', 'B313A312', 'hyundai0.png', 200000, 2009, 1, 'Accessible'),
(4, 'McQueen', '95', 'mcqueen.png', 150000, 2006, 1, 'Accessible'),
(7, 'Jeep', 'M1213HUH', 'jeep.jpg', 230000, 2005, 1, 'Accessible'),
(8, 'Innova', 'J9999JJJ', 'innova.png', 999999, 2022, 1, 'Accessible'),
(10, 'Veloz', 'G6763NUB', 'veloz.png', 500000, 2000, 0, 'Accessible'),
(11, 'Pajero Sport', 'F 1982 GHJ', 'pajero.png', 500000, 2021, 0, 'Accessible'),
(12, 'Toyota Alphard', 'B 1675 FDR', 'alphard.png', 850000, 2021, 0, 'Accessible'),
(13, 'Honda City Hatchback', 'B 1563 HJK', 'city.png', 660000, 2022, 1, 'Accessible'),
(14, 'Avanza Veloz', 'F 8907 KJH', 'veloz.png', 350000, 2022, 1, 'Accessible'),
(15, 'BMW G20', 'B 12 FI', 'bmw.png', 1200000, 2022, 1, 'Accessible'),
(16, 'Mercedes-Benz G-Class', 'B 63 GLS', 'gclass.png', 3000000, 2022, 1, 'Accessible'),
(17, 'Toyota Fortuner', 'B 1434 RYT', 'Fortuner.png', 600000, 2019, 1, 'Accessible'),
(18, 'Toyota Cayla', 'B 7865 TYR', 'calya.png', 350000, 2021, 1, 'Accessible'),
(19, 'Audi', 'M9123KOK', 'audi-a4.jpg', 923000, 2001, 1, 'Accessible');

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
  `driver_availability` tinyint(1) DEFAULT 1,
  `driver_status` enum('Active','Inactive') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`driver_id`, `driver_name`, `dl_number`, `driver_phone`, `driver_address`, `driver_gender`, `driver_availability`, `driver_status`) VALUES
(2, 'Gerald', '1231231', '+61231231', 'Jl.Beringin', 'Male', 1, 'Active'),
(3, 'Dlareg', '1231232', '+61231213', 'Jln.Sukabumi', 'Female', 1, 'Active'),
(4, 'Budi', '76712391', '+628777813122', 'jln.Bukitrendah', 'Male', 0, 'Active'),
(5, 'Punten', '878123451', '+62831255123', 'jln.Bukitsedang', 'Male', 1, 'Active'),
(6, 'Arzidan', '0998798765', '09358387583', 'Bekasi', 'Male', 1, 'Active'),
(8, 'Name1', '1231231', '+61231231', 'Jl. ASDS no. 321', 'Male', 0, 'Active');

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
(5, 'Raldger', 'raldger@mail.co.id', 'e25aee927ac6304845cc75e29be3f2c0', 'user'),
(6, 'gerald', 'user@mail.com', 'ee11cbb19052e40b07aac0ca060c23ee', 'user');

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
  MODIFY `book_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `car_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `driver_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
