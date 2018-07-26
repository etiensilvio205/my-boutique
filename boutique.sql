-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2018 at 08:05 AM
-- Server version: 5.7.17
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `boutique`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(100) NOT NULL,
  `password` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('Etien', '123456789'),
('Line', '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) NOT NULL,
  `name` text NOT NULL,
  `phone` text NOT NULL,
  `balance` int(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `phone`, `balance`) VALUES
(36, 'Ritchie', '514748169', 135),
(41, 'Natasha', '57894516', 525),
(37, 'Leo', '57849516', 50),
(27, 'Ruwaidah', '57474158', 5000),
(25, 'Samiirah', '57481496', 575),
(24, 'Keanu', '57481946', 8500),
(23, 'Shadyaah', '54714844', 75),
(44, 'Umeir', '51748941', 215),
(38, 'Sarah', '57481496', 100),
(42, 'Geerish', '57849451', 5000);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transactionID` int(10) NOT NULL,
  `id` int(10) NOT NULL,
  `product` text NOT NULL,
  `cost` int(10) NOT NULL,
  `date` varchar(50) NOT NULL,
  `seller` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transactionID`, `id`, `product`, `cost`, `date`, `seller`) VALUES
(93, 25, 'CPU', 500, '07/10/2018 09:20:04 am', 'line'),
(92, 41, 'Game', 500, '07/09/2018 03:26:49 pm', 'etien'),
(91, 41, 'Sugar', 25, '07/09/2018 02:27:09 pm', 'etien'),
(90, 24, 'Printer', 3500, '07/09/2018 01:20:20 pm', 'etien'),
(81, 42, 'Phone', 5000, '07/09/2018 11:45:20 am', 'etien'),
(89, 36, 'Coffee', 120, '07/09/2018 01:14:28 pm', 'etien'),
(80, 38, 'Keyboard', 100, '07/09/2018 11:45:11 am', 'etien'),
(78, 23, 'Stickers', 75, '07/09/2018 11:44:43 am', 'etien'),
(77, 24, 'iPhone', 5000, '07/09/2018 11:44:35 am', 'etien'),
(76, 25, 'Apple', 50, '07/09/2018 11:44:25 am', 'etien'),
(75, 27, 'iPhone', 5000, '07/09/2018 11:44:11 am', 'etien'),
(74, 25, 'Bread', 25, '07/09/2018 11:43:56 am', 'etien'),
(73, 37, 'Juice', 50, '07/09/2018 11:43:35 am', 'etien'),
(71, 36, 'Apple', 15, '07/09/2018 11:43:13 am', 'etien'),
(88, 44, 'Switch', 215, '07/09/2018 12:05:56 pm', 'etien');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`(50));

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transactionID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transactionID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
