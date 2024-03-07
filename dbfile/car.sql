-- phpMyAdmin SQL Dump
-- version 5.2.1deb1ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 07, 2024 at 06:36 PM
-- Server version: 8.0.36-0ubuntu0.23.10.1
-- PHP Version: 8.2.10-2ubuntu1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car`
--

-- --------------------------------------------------------

--
-- Table structure for table `car_brands`
--

CREATE TABLE `car_brands` (
  `id` int NOT NULL,
  `brand_name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `car_brands`
--

INSERT INTO `car_brands` (`id`, `brand_name`) VALUES
(1, 'Toyota'),
(2, 'Honda');

-- --------------------------------------------------------

--
-- Table structure for table `car_models`
--

CREATE TABLE `car_models` (
  `id` int NOT NULL,
  `brand_name` int DEFAULT NULL,
  `model` varchar(40) DEFAULT NULL,
  `vehicle_type` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `car_models`
--

INSERT INTO `car_models` (`id`, `brand_name`, `model`, `vehicle_type`) VALUES
(1, 1, 'Toyota Corolla', 'Compact Sedan'),
(2, 1, 'Toyota RAV4', 'Compact SUV'),
(3, 2, 'Honda Civic', 'Compact Sedan'),
(4, 2, 'Honda CR-V', 'Compact SUV');

-- --------------------------------------------------------

--
-- Table structure for table `client_cars`
--

CREATE TABLE `client_cars` (
  `id` int NOT NULL,
  `client_id` int NOT NULL COMMENT 'Should be Foreign ket to client table',
  `brand_name` int NOT NULL COMMENT 'this field is foreign key\r\nlinkd to the car_brand table',
  `model` int NOT NULL COMMENT 'Foreign key to  car model table',
  `vehicle_type` varchar(50) NOT NULL COMMENT 'my litle contribution is  this vehicle type field could have been avoided here since the car_model has vehicle type we use the car_model id to get it from car_model table',
  `year` varchar(10) DEFAULT NULL,
  `color` int NOT NULL COMMENT 'foreign key to color table',
  `license_plate` varchar(30) DEFAULT NULL,
  `image` text,
  `timestamp` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` int NOT NULL,
  `Name` varchar(40) NOT NULL,
  `Hex` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `Name`, `Hex`) VALUES
(1, 'Red', 'FF0000'),
(2, 'Green', '008000'),
(3, 'Blue', '0000FF');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car_brands`
--
ALTER TABLE `car_brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `car_models`
--
ALTER TABLE `car_models`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_brand_name` (`brand_name`);

--
-- Indexes for table `client_cars`
--
ALTER TABLE `client_cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `car_brands`
--
ALTER TABLE `car_brands`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `car_models`
--
ALTER TABLE `car_models`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `client_cars`
--
ALTER TABLE `client_cars`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `car_models`
--
ALTER TABLE `car_models`
  ADD CONSTRAINT `fk_brand_name` FOREIGN KEY (`brand_name`) REFERENCES `car_brands` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
