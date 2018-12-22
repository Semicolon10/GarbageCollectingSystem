-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 22, 2018 at 03:59 PM
-- Server version: 10.2.19-MariaDB
-- PHP Version: 7.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `GarbageCollectionSystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `UserDetails`
--

CREATE TABLE `UserDetails` (
  `UserName` varchar(25) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `ContactNumber` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `UserDetails`
--

INSERT INTO `UserDetails` (`UserName`, `Email`, `ContactNumber`, `password`) VALUES
('asd', 'asdasd@sad.com', '0222222222', '$2y$10$2XJ6tiqy6qMXeqTVO8LcPeOIIkYLa7YOnCf6FnvZJ2K1nIpQ4.Hry'),
('Ashvinda', 'ashvindajayanathranasinghe@gmail.com', '0713083296', '$2y$10$AyTf/31z1qk9c2RqD7Q9wO1Ua7uG4hIuMvoo0GjM5eWk.Wd2HxTv6'),
('Asiri', 'asiriiroshan@hotmail.com', '0768386669', '$2y$10$fkmNQlzrdLXwfprvlLeGuO9Lr7Fc3nNLrbuNMQNt72H/NXOmqqh3y'),
('GasGemba', 'asd@a.com', '0885965845', '$2y$10$f.87TFGDDy6iXwlQ714fPOZ5agNvU6mC2sQLyltjKBJeYNLeRq.TS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `UserDetails`
--
ALTER TABLE `UserDetails`
  ADD PRIMARY KEY (`UserName`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
