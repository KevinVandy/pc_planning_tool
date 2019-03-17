-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2018 at 07:13 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pc_planning_tool`
--
CREATE DATABASE IF NOT EXISTS `pc_planning_tool2` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `pc_planning_tool`;

-- --------------------------------------------------------

--
-- Table structure for table `cases`
--

CREATE TABLE `cases` (
  `CaseID` int(11) NOT NULL,
  `SetupID` int(11) NOT NULL,
  `Manufacturer` varchar(30) DEFAULT NULL,
  `ModelName` varchar(40) DEFAULT NULL,
  `FormFactor` varchar(30) DEFAULT NULL,
  `Cost` decimal(10,2) DEFAULT NULL,
  `Link` text,
  `Diminsions` varchar(40) DEFAULT NULL,
  `Material` varchar(30) DEFAULT NULL,
  `Color` char(7) DEFAULT NULL,
  `Expansions` text,
  `Ports` text,
  `FanOptions` text,
  `Features` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cpus`
--

CREATE TABLE `cpus` (
  `CPUID` int(11) NOT NULL,
  `SetupID` int(11) NOT NULL,
  `Manufacturer` varchar(30) DEFAULT NULL,
  `CodeName` varchar(30) DEFAULT NULL,
  `Family` varchar(30) DEFAULT NULL,
  `ModelName` varchar(40) DEFAULT NULL,
  `Cost` decimal(10,2) DEFAULT NULL,
  `Link` text,
  `NumberCores` int(11) DEFAULT NULL,
  `NumberThreads` int(11) DEFAULT NULL,
  `ClockSpeed` decimal(3,1) DEFAULT NULL,
  `Overclock` tinyint(1) DEFAULT NULL,
  `Wattage` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `drives`
--

CREATE TABLE `drives` (
  `DriveID` int(11) NOT NULL,
  `SetupID` int(11) NOT NULL,
  `Manufacturer` varchar(40) DEFAULT NULL,
  `ModelName` varchar(40) DEFAULT NULL,
  `DriveType` varchar(20) DEFAULT NULL,
  `Capacity` int(11) DEFAULT NULL,
  `Cost` decimal(10,2) DEFAULT NULL,
  `Link` text,
  `FormFactor` varchar(30) DEFAULT NULL,
  `Interface` varchar(30) DEFAULT NULL,
  `RPM` int(11) DEFAULT NULL,
  `ReadSpeed` int(11) DEFAULT NULL,
  `WriteSpeed` int(11) DEFAULT NULL,
  `Wattage` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gpus`
--

CREATE TABLE `gpus` (
  `GPUID` int(11) NOT NULL,
  `SetupID` int(11) NOT NULL,
  `Manufacturer` varchar(30) DEFAULT NULL,
  `CodeName` varchar(30) DEFAULT NULL,
  `Series` varchar(30) DEFAULT NULL,
  `ModelName` varchar(40) DEFAULT NULL,
  `Cost` decimal(12,2) DEFAULT NULL,
  `Link` text,
  `VRAM` decimal(10,3) DEFAULT NULL,
  `ClockSpeed` int(11) DEFAULT NULL,
  `Overclock` tinyint(1) DEFAULT NULL,
  `Wattage` int(11) DEFAULT NULL,
  `VGA` tinyint(1) DEFAULT NULL,
  `DVI` tinyint(1) DEFAULT NULL,
  `HDMI` tinyint(1) DEFAULT NULL,
  `DisplayPort` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `monitors`
--

CREATE TABLE `monitors` (
  `MonitorID` int(11) NOT NULL,
  `SetupID` int(11) NOT NULL,
  `NumInSetup` int(11) NOT NULL,
  `Diagonal` decimal(6,1) DEFAULT NULL,
  `Units` char(2) DEFAULT 'in',
  `BezelWidth` decimal(6,3) DEFAULT NULL,
  `Orientation` varchar(20) DEFAULT 'Landscape',
  `AspectRatioType` varchar(20) DEFAULT NULL,
  `ResolutionType` varchar(20) DEFAULT NULL,
  `HorizontalResolution` int(11) DEFAULT NULL,
  `VerticalResolution` int(11) DEFAULT NULL,
  `HDR` tinyint(1) DEFAULT NULL,
  `sRGB` tinyint(1) DEFAULT NULL,
  `Curved` tinyint(1) DEFAULT NULL,
  `Touch` tinyint(1) DEFAULT NULL,
  `Webcam` tinyint(1) DEFAULT NULL,
  `Speakers` tinyint(1) DEFAULT NULL,
  `DisplayType` varchar(15) DEFAULT 'Any',
  `SyncType` varchar(15) DEFAULT 'Any',
  `RefreshRate` varchar(6) DEFAULT 'Any',
  `ResponseTime` int(11) DEFAULT NULL,
  `VGA` tinyint(1) DEFAULT NULL,
  `DVI` tinyint(1) DEFAULT NULL,
  `HDMI` tinyint(1) DEFAULT NULL,
  `DisplayPort` tinyint(1) DEFAULT NULL,
  `Brand` varchar(30) DEFAULT NULL,
  `Model` varchar(80) DEFAULT NULL,
  `Cost` decimal(9,2) DEFAULT NULL,
  `Link` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `motherboards`
--

CREATE TABLE `motherboards` (
  `MotherboardID` int(11) NOT NULL,
  `SetupID` int(11) NOT NULL,
  `Manufacturer` varchar(30) DEFAULT NULL,
  `ModelName` varchar(40) DEFAULT NULL,
  `FormFactor` varchar(20) DEFAULT NULL,
  `Cost` decimal(12,2) DEFAULT NULL,
  `Link` text,
  `Wattage` int(11) DEFAULT NULL,
  `Chipset` varchar(40) DEFAULT NULL,
  `Socket` varchar(40) DEFAULT NULL,
  `MaxRAM` int(11) DEFAULT NULL,
  `RAMType` varchar(8) DEFAULT NULL,
  `ExpansionSlots` text,
  `StorageDevices` text,
  `Ports` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `psus`
--

CREATE TABLE `psus` (
  `PSUID` int(11) NOT NULL,
  `SetupID` int(11) NOT NULL,
  `Manufacturer` varchar(40) DEFAULT NULL,
  `ModelName` varchar(40) DEFAULT NULL,
  `MaxPower` int(11) DEFAULT NULL,
  `Cost` decimal(10,2) DEFAULT NULL,
  `Link` text,
  `Certification` varchar(30) DEFAULT NULL,
  `Outputs` text,
  `Connectors` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rams`
--

CREATE TABLE `rams` (
  `RAMID` int(11) NOT NULL,
  `SetupID` int(11) NOT NULL,
  `Manufacturer` varchar(40) DEFAULT NULL,
  `ModelName` varchar(40) DEFAULT NULL,
  `RAMType` varchar(7) DEFAULT NULL,
  `Cost` decimal(10,2) DEFAULT NULL,
  `Link` text,
  `ECC` tinyint(1) DEFAULT NULL,
  `Capacity` decimal(10,1) DEFAULT NULL,
  `NumSticks` int(11) DEFAULT NULL,
  `ClockSpeed` int(11) DEFAULT NULL,
  `Voltage` decimal(10,2) DEFAULT NULL,
  `Wattage` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `setups`
--

CREATE TABLE `setups` (
  `SetupID` int(11) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `SetupName` varchar(50) NOT NULL,
  `Budget` decimal(15,2) NOT NULL DEFAULT '0.00',
  `MonitorsCost` decimal(15,2) DEFAULT '0.00',
  `PCPartsCost` decimal(15,2) DEFAULT '0.00',
  `OS` varchar(30) DEFAULT NULL,
  `CPUPreference` varchar(20) DEFAULT NULL,
  `GPUPreference` varchar(20) DEFAULT NULL,
  `DeskWidth` decimal(5,2) DEFAULT NULL,
  `SCALE` int(11) DEFAULT '14'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Email` varchar(60) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `SearchEngine` varchar(20) DEFAULT 'Google'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `Username`, `Email`, `Password`, `SearchEngine`) VALUES
(1, 'KevinVandy', 'kevinvandy656@gmail.com', '$2y$13$PjOJV6Cz69uGitgq/XwvlOqna6oDVq4m0oN5R8oCKHg4NokTvEHIC', 'Google');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cases`
--
ALTER TABLE `cases`
  ADD PRIMARY KEY (`CaseID`),
  ADD KEY `fk_Cases_Setups` (`SetupID`);

--
-- Indexes for table `cpus`
--
ALTER TABLE `cpus`
  ADD PRIMARY KEY (`CPUID`),
  ADD UNIQUE KEY `SetupID` (`SetupID`) USING BTREE;

--
-- Indexes for table `drives`
--
ALTER TABLE `drives`
  ADD PRIMARY KEY (`DriveID`),
  ADD KEY `fk_Drives_Setups` (`SetupID`);

--
-- Indexes for table `gpus`
--
ALTER TABLE `gpus`
  ADD PRIMARY KEY (`GPUID`),
  ADD UNIQUE KEY `setupID` (`SetupID`) USING BTREE;

--
-- Indexes for table `monitors`
--
ALTER TABLE `monitors`
  ADD PRIMARY KEY (`MonitorID`),
  ADD KEY `fk_Monitors_SetupID` (`SetupID`);

--
-- Indexes for table `motherboards`
--
ALTER TABLE `motherboards`
  ADD PRIMARY KEY (`MotherboardID`),
  ADD UNIQUE KEY `fk_Motherboards_Setups` (`SetupID`) USING BTREE;

--
-- Indexes for table `psus`
--
ALTER TABLE `psus`
  ADD PRIMARY KEY (`PSUID`),
  ADD KEY `fk_PSUs_Setups` (`SetupID`);

--
-- Indexes for table `rams`
--
ALTER TABLE `rams`
  ADD PRIMARY KEY (`RAMID`),
  ADD UNIQUE KEY `fk_RAMs_Setups` (`SetupID`) USING BTREE;

--
-- Indexes for table `setups`
--
ALTER TABLE `setups`
  ADD PRIMARY KEY (`SetupID`),
  ADD KEY `fk_Setups_UserName` (`Username`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Username` (`Username`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cases`
--
ALTER TABLE `cases`
  MODIFY `CaseID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cpus`
--
ALTER TABLE `cpus`
  MODIFY `CPUID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `drives`
--
ALTER TABLE `drives`
  MODIFY `DriveID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gpus`
--
ALTER TABLE `gpus`
  MODIFY `GPUID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `monitors`
--
ALTER TABLE `monitors`
  MODIFY `MonitorID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `motherboards`
--
ALTER TABLE `motherboards`
  MODIFY `MotherboardID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `psus`
--
ALTER TABLE `psus`
  MODIFY `PSUID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rams`
--
ALTER TABLE `rams`
  MODIFY `RAMID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setups`
--
ALTER TABLE `setups`
  MODIFY `SetupID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cases`
--
ALTER TABLE `cases`
  ADD CONSTRAINT `fk_Cases_Setups` FOREIGN KEY (`SetupID`) REFERENCES `setups` (`SetupID`);

--
-- Constraints for table `cpus`
--
ALTER TABLE `cpus`
  ADD CONSTRAINT `cpus_ibfk_1` FOREIGN KEY (`SetupID`) REFERENCES `setups` (`SetupID`);

--
-- Constraints for table `drives`
--
ALTER TABLE `drives`
  ADD CONSTRAINT `fk_Drives_Setups` FOREIGN KEY (`SetupID`) REFERENCES `setups` (`SetupID`);

--
-- Constraints for table `gpus`
--
ALTER TABLE `gpus`
  ADD CONSTRAINT `gpus_ibfk_1` FOREIGN KEY (`SetupID`) REFERENCES `setups` (`SetupID`);

--
-- Constraints for table `monitors`
--
ALTER TABLE `monitors`
  ADD CONSTRAINT `fk_Monitors_SetupID` FOREIGN KEY (`SetupID`) REFERENCES `setups` (`SetupID`);

--
-- Constraints for table `motherboards`
--
ALTER TABLE `motherboards`
  ADD CONSTRAINT `fk_Motherboards_Setups` FOREIGN KEY (`SetupID`) REFERENCES `setups` (`SetupID`);

--
-- Constraints for table `psus`
--
ALTER TABLE `psus`
  ADD CONSTRAINT `fk_PSUs_Setups` FOREIGN KEY (`SetupID`) REFERENCES `setups` (`SetupID`);

--
-- Constraints for table `rams`
--
ALTER TABLE `rams`
  ADD CONSTRAINT `fk_RAMs_Setups` FOREIGN KEY (`SetupID`) REFERENCES `setups` (`SetupID`);

--
-- Constraints for table `setups`
--
ALTER TABLE `setups`
  ADD CONSTRAINT `fk_Setups_UserName` FOREIGN KEY (`Username`) REFERENCES `users` (`Username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
