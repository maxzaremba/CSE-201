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
-- Table structure for table `appRequests`
--

CREATE TABLE `appRequests` (
  `requestId` bigint(20) NOT NULL,
  `name` varchar(500) NOT NULL,
  `creator` varchar(500) NOT NULL,
  `platforms` varchar(500) NOT NULL,
  `version` varchar(500) NOT NULL,
  `appleLink` varchar(500) NOT NULL,
  `googleLink` varchar(500) NOT NULL,
  `price` varchar(100) NOT NULL,
  `genre` varchar(100) NOT NULL,
  `description` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appRequests`
--

INSERT INTO `appRequests` (`requestId`, `name`, `creator`, `platforms`, `version`, `appleLink`, `googleLink`, `price`, `genre`, `description`) VALUES
(3, 'Instagram', 'Instagram, Inc.', 'iOS, Android', '185.0', 'https://apps.apple.com/us/app/instagram/id389801252', 'https://play.google.com/store/apps/details?id=com.instagram.android', 'Free', 'Social Media', 'Connect with friends, share what you’re up to, or see what\'s new from others all over the world. Explore our community where you can feel free to be yourself and share everything from your daily moments to life\'s highlights'),
(4, 'Snapchat', 'Snap, Inc.', 'iOS, Android', '11.25.0.29', 'https://apps.apple.com/us/app/snapchat/id447188370', 'https://play.google.com/store/apps/details?id=com.snapchat.android', 'Free', 'Social Media', 'Snapchat opens right to the camera, so you can send a Snap in seconds! Just take a photo or video, add a caption, and send it to your best friends and family. Express yourself with Filters, Lenses, Bitmojis, and all kinds of fun effects');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appRequests`
--
ALTER TABLE `appRequests`
  ADD PRIMARY KEY (`requestId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appRequests`
--
ALTER TABLE `appRequests`
  MODIFY `requestId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
