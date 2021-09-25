-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 25, 2021 at 09:16 PM
-- Server version: 5.7.31
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `authsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Farah darzaid', 'darzaid.farah@gmail.com', '12345farah', '2021-09-25 20:59:47', '2021-09-25 20:59:47'),
(2, 'system admin', 'admin@local.com', '12345admin', '2021-09-25 21:01:27', '2021-09-25 21:01:27'),
(6, 'third test user', 'test@local.com', 'test12345', '2021-09-25 21:09:45', '2021-09-25 21:09:45');

-- --------------------------------------------------------

--
-- Table structure for table `user_information`
--

DROP TABLE IF EXISTS `user_information`;
CREATE TABLE IF NOT EXISTS `user_information` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `nationality` varchar(100) NOT NULL,
  `job` varchar(100) NOT NULL,
  `date_of_birth` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_information`
--

INSERT INTO `user_information` (`id`, `user_id`, `first_name`, `last_name`, `address`, `nationality`, `job`, `date_of_birth`, `created_at`) VALUES
(1, 1, 'Farah', 'Dar zaid', 'Jordan/Amman', 'Jordanian', 'Back end Developer', '1997-04-11', '2021-09-25 18:32:10'),
(2, 2, 'Admin', 'user', 'Palestine', 'palestinian', 'system admin', '2021-09-24', '2021-09-25 18:32:22');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
