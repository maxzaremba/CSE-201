-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 30, 2021 at 04:50 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skylight_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `apps`
--

CREATE TABLE `apps` (
  `appId` bigint(20) NOT NULL,
  `name` varchar(500) NOT NULL,
  `creator` varchar(500) NOT NULL,
  `platforms` varchar(500) NOT NULL,
  `version` varchar(500) NOT NULL,
  `appleLink` varchar(500) NOT NULL,
  `googleLink` varchar(500) NOT NULL,
  `price` varchar(100) NOT NULL,
  `genre` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `apps`
--

INSERT INTO `apps` (`appId`, `name`, `creator`, `platforms`, `version`, `appleLink`, `googleLink`, `price`, `genre`, `description`) VALUES
(1, 'Spotify', 'Spotify Ltd.', 'iOS, Android', '8.6.20', 'https://apps.apple.com/us/app/spotify-discover-new-music/id324684580', 'https://play.google.com/store/apps/details?id=com.spotify.music', 'Free', 'Music', ''),
(3, 'Minecraft', 'Mojang', 'iOS, Android', '1.16.221', 'https://apps.apple.com/us/app/minecraft/id479516143', 'https://play.google.com/store/apps/details?id=com.mojang.minecraftpe', '$6.99, $7.49', 'Game', ''),
(4, 'Venmo', 'Venmo', 'iOS, Android', '8.19.3', 'https://apps.apple.com/us/app/venmo/id351727428', 'https://play.google.com/store/apps/details?id=com.venmo', 'Free', 'Finance', ''),
(7, 'PayPal', 'PayPal, Inc.', 'iOS, Android', '7.40.1', 'https://apps.apple.com/us/app/paypal-mobile-cash/id283646709', 'https://play.google.com/store/apps/details?id=com.paypal.android.p2pmobile', 'Free', 'Finance', ''),
(8, 'Doodle Jump', 'Lima Sky', 'iOS, Android', '3.23.3', 'https://apps.apple.com/us/app/doodle-jump/id307727765', 'https://play.google.com/store/apps/details?id=com.lima.doodlejump', '$0.99', 'Game', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apps`
--
ALTER TABLE `apps`
  ADD PRIMARY KEY (`appId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apps`
--
ALTER TABLE `apps`
  MODIFY `appId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
