-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2024 at 03:59 AM
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
-- Database: `weathersystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `location_id` int(5) NOT NULL,
  `country` char(255) NOT NULL,
  `city` char(255) NOT NULL,
  `latitude` int(5) NOT NULL,
  `longitude` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`location_id`, `country`, `city`, `latitude`, `longitude`) VALUES
(1, 'Philippines', 'Bacolod', 12, 121),
(2, 'Japan', 'Tokyo', 24, 26),
(3, 'Canada', 'Quebec', 45, 48);

-- --------------------------------------------------------

--
-- Table structure for table `public_weather`
--

CREATE TABLE `public_weather` (
  `weatherID` int(5) NOT NULL,
  `location_id` int(5) NOT NULL,
  `dateTime` datetime NOT NULL,
  `temperature` int(5) NOT NULL,
  `humidity` int(5) NOT NULL,
  `windspeed` int(5) NOT NULL,
  `weatherCondition` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `public_weather`
--

INSERT INTO `public_weather` (`weatherID`, `location_id`, `dateTime`, `temperature`, `humidity`, `windspeed`, `weatherCondition`) VALUES
(2, 1, '0000-00-00 00:00:00', 32, 100, 100, 'The weather seems to be rainy.'),
(3, 2, '0000-00-00 00:00:00', 27, 50, 150, 'Temperate Weather Condition'),
(4, 3, '0000-00-00 00:00:00', 3, 20, 100, 'It is very cold. I know...');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(5) NOT NULL,
  `username` char(255) NOT NULL,
  `password` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`) VALUES
(3, 'Ced', 'abea67652c6cf65c9f3e0573d0fc4074');

-- --------------------------------------------------------

--
-- Table structure for table `userlocation`
--

CREATE TABLE `userlocation` (
  `userloc__id` int(5) NOT NULL,
  `user__id` int(5) NOT NULL,
  `location_id` int(5) NOT NULL,
  `country` char(255) NOT NULL,
  `city` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userlocation`
--

INSERT INTO `userlocation` (`userloc__id`, `user__id`, `location_id`, `country`, `city`) VALUES
(1, 3, 1, 'Philippines', 'Bacolod');

-- --------------------------------------------------------

--
-- Table structure for table `weather`
--

CREATE TABLE `weather` (
  `weatherID` int(5) NOT NULL,
  `userloc_id` int(5) NOT NULL,
  `dateTime` datetime NOT NULL,
  `temperature` int(5) NOT NULL,
  `humidity` int(5) NOT NULL,
  `windspeed` int(5) NOT NULL,
  `weatherCondition` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `weather`
--

INSERT INTO `weather` (`weatherID`, `userloc_id`, `dateTime`, `temperature`, `humidity`, `windspeed`, `weatherCondition`) VALUES
(1, 1, '0000-00-00 00:00:00', 12, 123, 21, '12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`location_id`),
  ADD KEY `country` (`country`),
  ADD KEY `city` (`city`);

--
-- Indexes for table `public_weather`
--
ALTER TABLE `public_weather`
  ADD PRIMARY KEY (`weatherID`),
  ADD KEY `location_id` (`location_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `userlocation`
--
ALTER TABLE `userlocation`
  ADD PRIMARY KEY (`userloc__id`),
  ADD KEY `country` (`country`),
  ADD KEY `city` (`city`),
  ADD KEY `user__id` (`user__id`),
  ADD KEY `location_id` (`location_id`);

--
-- Indexes for table `weather`
--
ALTER TABLE `weather`
  ADD PRIMARY KEY (`weatherID`),
  ADD KEY `userloc_id` (`userloc_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `location_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `public_weather`
--
ALTER TABLE `public_weather`
  MODIFY `weatherID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `userlocation`
--
ALTER TABLE `userlocation`
  MODIFY `userloc__id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `weather`
--
ALTER TABLE `weather`
  MODIFY `weatherID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `public_weather`
--
ALTER TABLE `public_weather`
  ADD CONSTRAINT `public_weather_ibfk_1` FOREIGN KEY (`location_id`) REFERENCES `location` (`location_id`);

--
-- Constraints for table `userlocation`
--
ALTER TABLE `userlocation`
  ADD CONSTRAINT `userlocation_ibfk_6` FOREIGN KEY (`user__id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `userlocation_ibfk_7` FOREIGN KEY (`city`) REFERENCES `location` (`city`),
  ADD CONSTRAINT `userlocation_ibfk_8` FOREIGN KEY (`country`) REFERENCES `location` (`country`),
  ADD CONSTRAINT `userlocation_ibfk_9` FOREIGN KEY (`location_id`) REFERENCES `location` (`location_id`);

--
-- Constraints for table `weather`
--
ALTER TABLE `weather`
  ADD CONSTRAINT `weather_ibfk_2` FOREIGN KEY (`userloc_id`) REFERENCES `userlocation` (`userloc__id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
