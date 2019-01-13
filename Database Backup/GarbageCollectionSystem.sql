-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 13, 2019 at 04:09 AM
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
-- Table structure for table `GuestMessages`
--

CREATE TABLE `GuestMessages` (
  `MessageNumber` int(11) NOT NULL,
  `GuestName` varchar(25) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Message` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `GuestMessages`
--

INSERT INTO `GuestMessages` (`MessageNumber`, `GuestName`, `Email`, `Message`) VALUES
(1, 'as', 'asd@asd.com', 'asda'),
(2, 'Asiri Iroshan', 'asiriiroshan@hotmail.com', 'asdasdasdasdasdasdasda'),
(3, 'Asiri Iroshan', 'asiriiroshan@hotmail.com', 'kakssdnlKJFNLKJDF '),
(5, 'Asiri Iroshan', 'asiriiroshan@hotmail.com', 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `PostComplaints`
--

CREATE TABLE `PostComplaints` (
  `UserName` varchar(25) NOT NULL,
  `PostNumber` int(11) NOT NULL,
  `ComplaintSubject` varchar(50) NOT NULL,
  `ComplaintDescription` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Posts`
--

CREATE TABLE `Posts` (
  `PostNumber` int(11) NOT NULL,
  `UserName` varchar(25) NOT NULL,
  `PostTopic` varchar(100) NOT NULL,
  `PostDescription` varchar(500) NOT NULL,
  `ImageContent` longblob DEFAULT NULL,
  `ImageName` longblob DEFAULT NULL,
  `Latitude` double NOT NULL,
  `Longitude` double NOT NULL,
  `PriorityLevel` varchar(25) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `UserDetails`
--

CREATE TABLE `UserDetails` (
  `UserName` varchar(25) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `ContactNumber` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `UserType` varchar(10) NOT NULL DEFAULT 'normal'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `UserDetails`
--

INSERT INTO `UserDetails` (`UserName`, `Email`, `ContactNumber`, `password`, `UserType`) VALUES
('Admin', 'team24@gmail.com', '9999999999', '$2y$10$FStMIl2NO.KGQTEHB70Y6eqwTdbA85VX/UEIbCT9kroeI9UCd9VE2', 'admin'),
('Asiri', 'asiriiroshan@hotmail.com', '0768386669', '$2y$10$e7C.eXkw3HG1bRba/1uFAuVI5qZd8wV9R46dTDZTp8HfrtA9Ly66.', 'normal'),
('Ayesh', 'ayeshdulanja@gmail.com', '0766638903', '$2y$10$.wql4vnj3dVtO5M2aa1qlOTnM0oF3i1c9KlUbb0L8IrOd6ZU9eWX2', 'normal'),
('Captain', 'team24captain@gmail.com', '0900900909', '$2y$10$oS88tHbVcxLMa05E0rHygOPnQiPBLe5fAlP49AmMQupeZDoVi8czG', 'captain'),
('Indrajith', 'indrajith@gmail.com', '0713101658', '$2y$10$vKnMouKkt0fNdG085cAjeeNcHQB/2iPM2KdzLWG17IQIMtXe5f0Ei', 'normal'),
('Piumi', 'Piuprabodhani96@gmail.com', '0713122657', '$2y$10$VBqV5X.7TDG91a88smMA4Ow7SDyLWt4PMtB6t6CvfkEoy36waF9XG', 'normal'),
('Tharindu', 'sewmaltsl@gmal.com', '0712051370', '$2y$10$N/xU9KvQmiA4T1kuZhGHyuVqNSyPYhmRunxSRfgZrORDaqlR8g1Ai', 'normal');

-- --------------------------------------------------------

--
-- Table structure for table `UserMessages`
--

CREATE TABLE `UserMessages` (
  `MessageNo` int(11) NOT NULL,
  `UserName` varchar(25) NOT NULL,
  `Subject` varchar(100) NOT NULL,
  `Message` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `UserMessages`
--

INSERT INTO `UserMessages` (`MessageNo`, `UserName`, `Subject`, `Message`) VALUES
(7, 'Asiri', 'I have an issue at posting', 'I can\'t create a new post');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `GuestMessages`
--
ALTER TABLE `GuestMessages`
  ADD PRIMARY KEY (`MessageNumber`);

--
-- Indexes for table `PostComplaints`
--
ALTER TABLE `PostComplaints`
  ADD PRIMARY KEY (`UserName`,`PostNumber`),
  ADD KEY `fk_PostNumber` (`PostNumber`);

--
-- Indexes for table `Posts`
--
ALTER TABLE `Posts`
  ADD PRIMARY KEY (`PostNumber`),
  ADD KEY `fk_UserName` (`UserName`);

--
-- Indexes for table `UserDetails`
--
ALTER TABLE `UserDetails`
  ADD PRIMARY KEY (`UserName`);

--
-- Indexes for table `UserMessages`
--
ALTER TABLE `UserMessages`
  ADD PRIMARY KEY (`MessageNo`),
  ADD KEY `fk_UserName_UserMessages` (`UserName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `GuestMessages`
--
ALTER TABLE `GuestMessages`
  MODIFY `MessageNumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `Posts`
--
ALTER TABLE `Posts`
  MODIFY `PostNumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `UserMessages`
--
ALTER TABLE `UserMessages`
  MODIFY `MessageNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `PostComplaints`
--
ALTER TABLE `PostComplaints`
  ADD CONSTRAINT `fk_PostNumber` FOREIGN KEY (`PostNumber`) REFERENCES `Posts` (`PostNumber`),
  ADD CONSTRAINT `fk_UserName_PostComplaints` FOREIGN KEY (`UserName`) REFERENCES `UserDetails` (`UserName`);

--
-- Constraints for table `Posts`
--
ALTER TABLE `Posts`
  ADD CONSTRAINT `fk_UserName` FOREIGN KEY (`UserName`) REFERENCES `UserDetails` (`UserName`);

--
-- Constraints for table `UserMessages`
--
ALTER TABLE `UserMessages`
  ADD CONSTRAINT `fk_UserName_UserMessages` FOREIGN KEY (`UserName`) REFERENCES `UserDetails` (`UserName`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
