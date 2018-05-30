-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2018 at 06:47 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.0.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ticket`
--

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `routes` varchar(255) NOT NULL,
  `departure_date` datetime NOT NULL,
  `arrival_date` datetime NOT NULL,
  `total_seat` int(11) NOT NULL,
  `available_seat` int(11) NOT NULL,
  `invalid_seats` text NOT NULL,
  `price` int(11) NOT NULL,
  `images` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `name`, `routes`, `departure_date`, `arrival_date`, `total_seat`, `available_seat`, `invalid_seats`, `price`, `images`) VALUES
(1, 'Shwe Sin Set Kyar', 'Yangon-Mandalay', '2018-05-30 21:30:00', '2018-05-31 05:20:00', 44, 31, '2,3,7,11,13,17,19,23,29,31,37,41,43', 12000, 'dist/images/express_01.jpg'),
(2, 'Mandalar Minn Express', 'Mandalay-Yangon', '2018-05-31 23:30:00', '2018-06-01 04:45:00', 44, 27, '2,3,7,11,13,17,19,23,29,31,37,41,43,1,5,9,6', 13000, 'dist/images/express_02.jpg'),
(3, 'Shwe Sin Set Kyar', 'Yangon-Pakokku', '2018-06-02 23:30:00', '2018-06-03 06:20:00', 44, 26, '2,3,7,11,13,17,19,23,29,31,37,41,43,1,5,9,6,10', 12500, 'dist/images/express_03.jpg'),
(4, 'Mandalar Minn Express', 'Monywa-Yangon', '2018-06-01 20:30:00', '2018-06-02 04:45:00', 44, 31, '2,3,7,11,13,17,19,23,29,31,37,41,43', 18000, 'dist/images/express_04.jpg'),
(5, 'Shwe Mandalar', 'Yangon-Monywa', '2018-05-29 10:30:00', '2018-05-29 19:20:00', 44, 31, '2,3,7,11,13,17,19,23,29,31,37,41,43', 15500, 'dist/images/express_05.jpg'),
(6, 'Shwe Sin Set Kyar', 'Pakokku-Yangon', '2018-05-30 10:30:00', '2018-05-30 19:45:00', 44, 31, '2,3,7,11,13,17,19,23,29,31,37,41,43', 20000, 'dist/images/express_06.jpg'),
(7, 'Shwe Mandalar', 'Mandalay-Yangon', '2018-06-04 21:30:00', '2018-06-05 05:20:00', 44, 31, '2,3,7,11,13,17,19,23,29,31,37,41,43', 17500, 'dist/images/express_02.jpg'),
(8, 'Mandalar Minn Express', 'Yangon-Pakokku', '2018-05-31 09:00:00', '2018-05-31 05:45:00', 44, 31, '2,3,7,11,13,17,19,23,29,31,37,41,43', 12000, 'dist/images/express_04.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `seat_numbers` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `car_id`, `name`, `email`, `phone`, `seat_numbers`) VALUES
(27, 3, 'admin', 'admin@gmail.com', '09773883673', '1,5,9,6,10'),
(28, 2, 'man to ygn', 'mantoyan@gmail.com', '09876564534', '1,5,9,6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
