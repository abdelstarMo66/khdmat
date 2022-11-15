-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2022 at 06:00 PM
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
-- Database: `khdmate`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(33) NOT NULL,
  `password` varchar(66) NOT NULL,
  `email` varchar(50) NOT NULL,
  `job` varchar(50) NOT NULL,
  `image` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`, `email`, `job`, `image`) VALUES
(8, 'Mohamed', '456', 'Mohamed456@yahoo.com', 'Programmer', 'IMG_20220615_010347_584.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `phone` varchar(66) NOT NULL,
  `address` varchar(50) NOT NULL,
  `filed` varchar(22) NOT NULL,
  `adminId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `phone`, `address`, `filed`, `adminId`) VALUES
(3, 'احمد خالد', '01017477073', 'طوخ', 'سمكري سيارات', 8),
(4, 'محمد السيد كريب', '01065284676', 'كفر منصور - طوخ', 'منجد', 8),
(5, 'محمد احمد موزه', '01202535715', 'الزقازيق', 'نقاش', 8);

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `data` varchar(200) NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `data`, `userId`) VALUES
(4, 'good', 5);

-- --------------------------------------------------------

--
-- Stand-in structure for view `note_info`
-- (See below for the actual view)
--
CREATE TABLE `note_info` (
`id` int(11)
,`note` varchar(200)
,`user_name` varchar(20)
);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `empId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `userId`, `empId`) VALUES
(5, 5, 3),
(6, 5, 3);

-- --------------------------------------------------------

--
-- Stand-in structure for view `order_info`
-- (See below for the actual view)
--
CREATE TABLE `order_info` (
`id` int(11)
,`user_name` varchar(20)
,`user_email` varchar(66)
,`user_address` varchar(333)
,`user_phone` varchar(12)
,`emp_name` varchar(200)
,`emp_filed` varchar(22)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `order_info_with_rate`
-- (See below for the actual view)
--
CREATE TABLE `order_info_with_rate` (
`id` int(11)
,`user_name` varchar(20)
,`user_email` varchar(66)
,`user_address` varchar(333)
,`user_phone` varchar(12)
,`emp_name` varchar(200)
,`emp_filed` varchar(22)
,`rate` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `rate_info`
-- (See below for the actual view)
--
CREATE TABLE `rate_info` (
`id` int(11)
,`rate` int(11)
,`employee_name` varchar(200)
,`employee_jop` varchar(22)
,`user_name` varchar(20)
);

-- --------------------------------------------------------

--
-- Table structure for table `reting`
--

CREATE TABLE `reting` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `empId` int(11) NOT NULL,
  `rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reting`
--

INSERT INTO `reting` (`id`, `userId`, `empId`, `rate`) VALUES
(4, 5, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(66) NOT NULL,
  `password` varchar(23) NOT NULL,
  `address` varchar(333) NOT NULL,
  `phone` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `address`, `phone`) VALUES
(5, 'abdelstar', 'mmm@yahoo.com', '456', 'shoubra', '01227559261');

-- --------------------------------------------------------

--
-- Structure for view `note_info`
--
DROP TABLE IF EXISTS `note_info`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `note_info`  AS SELECT `notes`.`id` AS `id`, `notes`.`data` AS `note`, `users`.`name` AS `user_name` FROM (`notes` join `users` on(`notes`.`userId` = `users`.`id`))  ;

-- --------------------------------------------------------

--
-- Structure for view `order_info`
--
DROP TABLE IF EXISTS `order_info`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `order_info`  AS SELECT `orders`.`id` AS `id`, `users`.`name` AS `user_name`, `users`.`email` AS `user_email`, `users`.`address` AS `user_address`, `users`.`phone` AS `user_phone`, `employees`.`name` AS `emp_name`, `employees`.`filed` AS `emp_filed` FROM ((`orders` join `users` on(`orders`.`userId` = `users`.`id`)) join `employees` on(`orders`.`empId` = `employees`.`id`))  ;

-- --------------------------------------------------------

--
-- Structure for view `order_info_with_rate`
--
DROP TABLE IF EXISTS `order_info_with_rate`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `order_info_with_rate`  AS SELECT `order_info`.`id` AS `id`, `order_info`.`user_name` AS `user_name`, `order_info`.`user_email` AS `user_email`, `order_info`.`user_address` AS `user_address`, `order_info`.`user_phone` AS `user_phone`, `order_info`.`emp_name` AS `emp_name`, `order_info`.`emp_filed` AS `emp_filed`, `rate_info`.`rate` AS `rate` FROM (`order_info` join `rate_info`) WHERE `order_info`.`emp_name` = `rate_info`.`employee_name``employee_name`  ;

-- --------------------------------------------------------

--
-- Structure for view `rate_info`
--
DROP TABLE IF EXISTS `rate_info`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `rate_info`  AS SELECT `reting`.`id` AS `id`, `reting`.`rate` AS `rate`, `employees`.`name` AS `employee_name`, `employees`.`filed` AS `employee_jop`, `users`.`name` AS `user_name` FROM ((`reting` join `employees` on(`reting`.`empId` = `employees`.`id`)) join `users` on(`reting`.`userId` = `users`.`id`))  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `adminId` (`adminId`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`),
  ADD KEY `empId` (`empId`);

--
-- Indexes for table `reting`
--
ALTER TABLE `reting`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`),
  ADD KEY `empId` (`empId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `reting`
--
ALTER TABLE `reting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`adminId`) REFERENCES `admin` (`id`);

--
-- Constraints for table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `notes_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`empId`) REFERENCES `employees` (`id`);

--
-- Constraints for table `reting`
--
ALTER TABLE `reting`
  ADD CONSTRAINT `reting_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `reting_ibfk_2` FOREIGN KEY (`empId`) REFERENCES `employees` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
