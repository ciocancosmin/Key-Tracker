-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 11, 2020 at 04:51 AM
-- Server version: 10.3.17-MariaDB-0+deb10u1
-- PHP Version: 7.3.11-1~deb10u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `key`
--

-- --------------------------------------------------------

--
-- Table structure for table `keys_move`
--

CREATE TABLE `keys_move` (
  `id` int(11) NOT NULL,
  `tip_misc` tinyint(1) NOT NULL,
  `id_user1` int(11) NOT NULL,
  `id_user2` int(11) NOT NULL,
  `id_keys` varchar(1000) NOT NULL,
  `time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keys_move`
--

INSERT INTO `keys_move` (`id`, `tip_misc`, `id_user1`, `id_user2`, `id_keys`, `time`) VALUES
(1, 1, 2, 9, 'E2000019990702541440E1EB;E20000199907008615203527;E200001999060143051072FF;E20000199906016221408975;E20000199906013315906BE6;E20000199906014407007178;E20000199906012809705FA0;E200001999060132066068C6;E20000199906014908307C3E;', '2020/02/10 20:17:29'),
(2, 0, 2, 9, 'E2000019990702541440E1EB;E20000199906016221408975;E20000199907008615203527;E200001999060143051072FF;E20000199906014407007178;E20000199906013315906BE6;E20000199906014908307C3E;E200001999060132066068C6;', '2020/02/10 21:05:17'),
(3, 1, 2, 9, 'E2000019990702541440E1EB;E20000199906016221408975;E20000199907008615203527;E20000199906014908307C3E;E200001999060143051072FF;E20000199906013315906BE6;E200001999060132066068C6;', '2020/02/10 21:37:39'),
(4, 0, 2, 9, 'E2000019990702541440E1EB;E20000199906016221408975;E200001999060143051072FF;E20000199906014908307C3E;E20000199907008615203527;E20000199906013315906BE6;E200001999060132066068C6;', '2020/02/10 21:39:38'),
(5, 0, 2, 9, 'E20000199906012809705FA0;', '2020/02/10 21:40:27'),
(6, 1, 2, 9, 'E20000199906012809705FA0;E2000019990702541440E1EB;E200001999060143051072FF;E20000199907008615203527;E200001999060132066068C6;E20000199906014908307C3E;E20000199906016221408975;E20000199906013315906BE6;E20000199906014407007178;', '2020/02/10 21:42:18'),
(7, 0, 2, 9, 'E200001999060132066068C6;E20000199906012809705FA0;E20000199907008615203527;E20000199906014908307C3E;E20000199906013315906BE6;E20000199906014407007178;E20000199906016221408975;E200001999060143051072FF;E2000019990702541440E1EB;', '2020/02/10 22:05:17'),
(8, 1, 2, 9, 'E200001999060143051072FF;E200001999060132066068C6;E20000199906016221408975;E20000199907008615203527;E2000019990702541440E1EB;E20000199906014908307C3E;E20000199906014407007178;E20000199906012809705FA0;E20000199906013315906BE6;', '2020/02/10 22:21:58'),
(9, 0, 2, 9, 'E20000199906014908307C3E;E20000199906016221408975;E200001999060143051072FF;E20000199906014407007178;E20000199907008615203527;E20000199906012809705FA0;E200001999060132066068C6;E20000199906013315906BE6;E2000019990702541440E1EB;', '2020/02/10 22:50:06');

-- --------------------------------------------------------

--
-- Table structure for table `keys_table`
--

CREATE TABLE `keys_table` (
  `id` int(11) NOT NULL,
  `key_name` varchar(255) NOT NULL,
  `key_card` varchar(100) NOT NULL,
  `key_state` int(11) NOT NULL,
  `gest` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keys_table`
--

INSERT INTO `keys_table` (`id`, `key_name`, `key_card`, `key_state`, `gest`) VALUES
(2, 'cheie 1', 'E200001999060143051072FF', 1, 9),
(3, 'cheie 2', 'E20000199907008615203527', 1, 9),
(4, 'cheie 3', 'E200001999060132066068C6', 1, 9),
(5, 'cheie 4', 'E20000199906016221408975', 1, 9),
(6, 'cheie 5', 'E20000199906013315906BE6', 1, 9),
(7, 'cheie 6', 'E20000199906014407007178', 1, 9),
(8, 'cheie 7', 'E20000199906014908307C3E', 1, 9),
(9, 'cheie 8', 'E20000199906012809705FA0', 1, 9),
(10, 'cheie 9', 'E2000019990702541440E1EB', 1, 9);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` int(11) NOT NULL,
  `activ` tinyint(1) NOT NULL,
  `card` varchar(255) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `legitimation_id` varchar(100) NOT NULL,
  `last_login_day` varchar(40) NOT NULL,
  `last_login_hour` varchar(20) NOT NULL,
  `last_login_ip` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `level`, `activ`, `card`, `firstname`, `lastname`, `legitimation_id`, `last_login_day`, `last_login_hour`, `last_login_ip`) VALUES
(1, 'user1', '24c9e15e52afc47c225b757e7bee1f9d', 1, 1, 'E200001963020155174063F5', 'gigi', 'ion', 'dsdsdds', '2020-02-08;2020-02-09', '11:03;20:29', '127.0.0.1;127.0.0.1'),
(2, 'gest', '6dc7ad42f970b8b3eb2f8641927d00cb', 2, 1, '', 'fanel', 'gheorghe', '', '2020-02-10;2020-02-10', '22:20;22:49', '10.0.0.50;10.0.0.50'),
(3, 'admin', '21232f297a57a5a743894a0e4a801fc3', 3, 1, '', '', '', '', '2020-02-10;2020-02-10', '12:39;12:48', '10.0.0.50;10.0.0.50'),
(4, 'tech', 'd9f9133fb120cd6096870bc2b496805b', 4, 1, '', '', '', '', '2020-02-10;2020-02-10', '21:01;22:48', '10.0.0.50;10.0.0.50'),
(5, 'test', '098f6bcd4621d373cade4e832627b4f6', 5, 1, '', '1234567890', '1234567890', '', '2020-01-31;2020-01-31', '01:55;03:12', '10.0.0.50;10.0.0.50'),
(6, '12345678901234567890', '522317f4bd21650f6e0ef99da83b003c', 2, 1, '', 'trrtrttrt', 'yyyyyty', 'sssssss', '2020-01-31;2020-01-31', '11:12;19:27', '127.0.0.1;127.0.0.1'),
(8, 'adasqwe', 'a61dae68bf96de78dcf31358bc98f593', 2, 0, '', 'asdas', 'adasd', 'qwe', '', '', ''),
(9, 'user2', '7e58d63b60197ceb55a1c487989a3720', 1, 1, 'E200001963020167174063E7', 'user2', 'gigi', '2222333', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `keys_move`
--
ALTER TABLE `keys_move`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keys_table`
--
ALTER TABLE `keys_table`
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
-- AUTO_INCREMENT for table `keys_move`
--
ALTER TABLE `keys_move`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `keys_table`
--
ALTER TABLE `keys_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
