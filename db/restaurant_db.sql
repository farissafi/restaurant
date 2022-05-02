-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2022 at 09:56 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurant_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `food_menu`
--

CREATE TABLE `food_menu` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` int(50) NOT NULL,
  `details` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `food_menu`
--

INSERT INTO `food_menu` (`id`, `name`, `price`, `details`, `image`) VALUES
(5, 'همبرجر', 10, 'تطلب مع مايونيز وبطاطا', 'img1651459464.jpg'),
(6, 'كباب', 10, 'تطلب مع سلطة وكاتشب', 'img1651461475.jpg'),
(7, 'سمك', 10, 'تطلب مع سلطة و ليمون', 'img1651461501.jpg'),
(8, 'شاورما', 10, 'تطلب مع سلطة و مايونيز', 'img1651461523.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `order_list`
--

CREATE TABLE `order_list` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `food_meals_id` int(11) NOT NULL,
  `number_of_meal` int(11) NOT NULL,
  `order_state` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_list`
--

INSERT INTO `order_list` (`id`, `name`, `phone`, `address`, `food_meals_id`, `number_of_meal`, `order_state`) VALUES
(3, 'محمد قطيط', '0599454401', 'معن', 5, 5, 1),
(4, 'محمد قطيط', '0599454401', 'معن', 5, 5, 1),
(5, 'محمد قطيط', '0599454401', 'معن', 5, 5, 1),
(6, 'محمد قطيط', '0599454401', 'معن', 5, 5, 1),
(7, 'محمود كويك', '0592733242', 'القرارة', 7, 5, 1),
(8, 'احمد الاغا', '055945540', '6+ب', 7, 5, 1),
(9, 'احمد الاغا', '055945540', '6+ب', 7, 5, 1),
(10, 'احمد الاغا', '055945540', '6+ب', 7, 5, 1),
(11, 'احمد الاغا', '055945540', '6+ب', 7, 5, 1),
(12, 'احمد الاغا', '055945540', '6+ب', 7, 5, 1),
(13, 'احمد الاغا', '055945540', '6+ب', 7, 5, 1),
(14, 'احمد الاغا', '0599011800', 'القلعة', 7, 3, 1),
(15, 'احمد مؤنس الاغا', '0599454420', 'خانيونس القلعة ', 6, 3, 0),
(16, 'حسين الاسطل', '059454480', 'خانيونس المحطة', 7, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', '123\r\n'),
(2, 'admin', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `food_menu`
--
ALTER TABLE `food_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_list`
--
ALTER TABLE `order_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `food_meals_id` (`food_meals_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `food_menu`
--
ALTER TABLE `food_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order_list`
--
ALTER TABLE `order_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_list`
--
ALTER TABLE `order_list`
  ADD CONSTRAINT `order_list_ibfk_1` FOREIGN KEY (`food_meals_id`) REFERENCES `food_menu` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
