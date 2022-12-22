-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2022 at 11:34 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `csc_415_proj`
--

-- --------------------------------------------------------

--
-- Table structure for table `asset`
--

CREATE TABLE `asset` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `type` enum('stationery','appliance','computers&accessories','furniture') NOT NULL,
  `description` text NOT NULL,
  `available` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `asset`
--

INSERT INTO `asset` (`id`, `name`, `type`, `description`, `available`) VALUES
(1, 'Air Conditioner', 'appliance', 'LG Split Unit AC. Has 8 different cooling modes. That\'s cool.', 1),
(2, 'Fridge', 'appliance', 'Haier Thermocool fridge-freezer with ice maker and water dispenser.', 1),
(3, 'Water Dispenser', 'appliance', 'Appliance for dispensing hot, cool and cold water.', 1),
(4, 'Printer', 'computers&accessories', 'HPENVY5540 with a duplexer. Supports printing on both sides, scanning and has internet-enabled features', 1),
(5, 'Laptop Computer', 'computers&accessories', 'ASUS Ryzer Pro with Intel Core i7 11th Generation, 500GB SSD, NVIDIA GPU, 14\" OLED Display', 1),
(6, 'Wireless Keyboard & Mouse Set', 'computers&accessories', 'Logitech Bluetooth Keyboard and Mouse. Has Bluetooth 5.1', 1),
(7, 'Work Desk', 'furniture', 'Mahogany desk, with drawers and lacquer finish on top', 1),
(8, 'Ergonomic Chair', 'furniture', 'Chair with wheels and a swivel. Has various levers and buttons to adjust height, lean and armrest width. Built for comfort and to promote good posture.', 1),
(9, 'Notepad', 'stationery', 'Pad for taking notes. Has sticky notes too.', 1),
(10, 'Stapler', 'stationery', 'Implement for joining papers together. Should comes with the staples.', 1),
(11, 'Clearboard & Marker', 'stationery', 'Used to illustrate ideas visually and clearly, especially for others to view and comment on', 1);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`, `description`) VALUES
(1, 'Engineering', 'Resident code monkeys. All in-house applications are developed here'),
(3, 'Accounting', 'Book balancing and Money Laundering where necessary'),
(4, 'Legal', 'Primarily here to bail out Accounting. Maybe handle a few class action lawsuits.');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(14) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(64) NOT NULL,
  `role` varchar(64) NOT NULL,
  `employment_type` enum('full-time','part-time','contract','intern') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `department_id`, `name`, `address`, `phone`, `email`, `password`, `role`, `employment_type`) VALUES
(1, 3, 'Hugh Jackman', '1407 Claw Ave', '+2348188451407', 'logan@live.company.com', '56SBtj3pQ7', 'Paper Shredding', 'full-time'),
(2, 3, 'Sophie Turner', '1602 Phoenix Way', '+2348188451602', 'Jean@live.company.com', 'QR2Us8F4VC', 'Chartered Accountant', 'full-time'),
(3, 1, 'Nicholas Hoult', '1201 Beast Boulevard', '+2348188451201', 'DrHenry@live.company.com', 'tNuf25W2y2', 'Fullstack Engineering', 'part-time'),
(4, 1, 'Tye Sheridan', '1302 Cyclops Circle', '+2348188451302', 'Scott@live.company.com', 'qF8WFvqC46', 'Quality Assurance Tester', 'intern'),
(5, 4, 'Patrick Stewart', '1004 Xavier Place', '+2348188451004', 'ProfXavier@live.company.com', 'q86Cx849gE', 'Head of Department', 'full-time'),
(6, 4, 'Halle Berry', '1105 Storm Street', '+2348188451105', 'Ororo@live.company.com', 'kQz542KFUj', 'Defense Attorney', 'contract');

-- --------------------------------------------------------

--
-- Table structure for table `employee_asset`
--

CREATE TABLE `employee_asset` (
  `employee_id` int(11) NOT NULL,
  `asset_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_asset`
--

INSERT INTO `employee_asset` (`employee_id`, `asset_id`) VALUES
(2, 4),
(3, 7);

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `employee_id` int(11) NOT NULL,
  `asset_id` int(11) NOT NULL,
  `status` enum('requested','approved','rejected') NOT NULL,
  `date_created` datetime NOT NULL,
  `date_resolved` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asset`
--
ALTER TABLE `asset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `employee_asset`
--
ALTER TABLE `employee_asset`
  ADD PRIMARY KEY (`employee_id`,`asset_id`),
  ADD KEY `employee_asset_ibfk_1` (`asset_id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`employee_id`,`asset_id`),
  ADD KEY `asset_id` (`asset_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `asset`
--
ALTER TABLE `asset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `department` (`id`);

--
-- Constraints for table `employee_asset`
--
ALTER TABLE `employee_asset`
  ADD CONSTRAINT `employee_asset_ibfk_1` FOREIGN KEY (`asset_id`) REFERENCES `asset` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `employee_asset_ibfk_2` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `request_ibfk_1` FOREIGN KEY (`asset_id`) REFERENCES `asset` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `request_ibfk_2` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
