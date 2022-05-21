-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2022 at 04:47 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bizkod`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `message` varchar(1024) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `name` varchar(1024) NOT NULL,
  `lat` float NOT NULL,
  `lon` float NOT NULL,
  `picture` varchar(1024) NOT NULL,
  `description` varchar(2048) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `name`, `lat`, `lon`, `picture`, `description`) VALUES
(1, 'Trg Žrtava Fašizma', 46.0992, 19.6591, 'hosok.jpg', 'Monument to fallen soldiers and victims of fascism, work of the sculptor Toma Rosandić, was ceremoniously opened on October 30, 1952.'),
(3, 'National Theatre', 46.1008, 19.67, 'szinhaz.jpg', 'Built in 1854 as the first monumental public building in Subotica, was razed with the purpose of reconstruction by City authorities in 2007, although it was declared a historic monument under state protection in 1983.'),
(4, 'Lenin Park', 46.1016, 19.6698, 'lenin.jpg', 'Park found in the heart of Subotica.'),
(5, 'Gradski Stadion FK Spartak', 46.0817, 19.6765, 'spartak.jpg', 'Subotica City Stadium is a multi-purpose stadium located in Subotica, Serbia. With a capacity of 13,000 people, it is currently used mostly for football matches and is the home ground of FK Spartak Subotica from 1945.'),
(6, 'Church of Holy Greatmartyr Demetrius of Thessaloniki', 46.0725, 19.6797, 'sandor_templom.jpg', 'The Serbian Orthodox Church of St. Dimitri is located in Aleksandrovo, a suburb of the City of Subotica, erected in 1818 and has the status of a cultural monument of great importance.'),
(7, 'StopShop ', 46.1006, 19.6985, 'shopi.jpg', 'STOP SHOP Subotica is located in Vojvodina, in the very north  of Serbia. It offers a variety of brands as well as a restaurant so everyone can find exactly what they need.'),
(8, 'Roda Mega', 46.1007, 19.7033, 'rodic.jpg', 'Retail store for household tools and everyday needs.'),
(9, 'Lake Palić', 46.0885, 19.7575, 'palic.jpg', 'Lake Palić is a lake 8 kilometres from Subotica, near the town of Palić, in Serbia. It covers an area of 3.8 square kilometres.'),
(10, 'Hala Sportova', 46.1096, 19.6552, 'sportcsarnok.jpg', 'The sports hall is a multifunctional facility that has a gymnasium, a small hall, a hall for martial arts, a gym, a large hall intended primarily for athletes, and in addition it is also suitable for organizing events of various types.'),
(11, 'Dudova Šuma', 46.1104, 19.653, 'dudova.jpg', 'Dudova Šuma is a small forest, located next to Hala Sportova. It contains a running track, spanning exactly 1 kilometer.'),
(12, 'St. Theresa of Avila Cathedral', 46.0984, 19.6588, 'terezija.jpg', 'The Cathedral of St. Theresa of Avila is a Roman Catholic cathedral and minor basilica located in Subotica, Serbia, the seat of the Diocese of Subotica. It is dedicated to Saint Theresa of Avila.');

-- --------------------------------------------------------

--
-- Table structure for table `location_rating`
--

CREATE TABLE `location_rating` (
  `id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `rating` tinyint(2) DEFAULT NULL,
  `message` varchar(2048) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `is_admin` tinyint(4) NOT NULL DEFAULT 0,
  `verification_code` varchar(200) DEFAULT NULL,
  `is_verified` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `firstname`, `lastname`, `password`, `is_admin`, `verification_code`, `is_verified`, `created_at`) VALUES
(1, 'test@gmail.com', 'Jon', 'Doe', '$2y$10$Bzl36sK6UJ3ixbAcRu8GVu1G7iVEGqzb77l0lmlEQlE4pXoQSGoIe', 1, NULL, 1, '2022-05-20 11:46:14'),
(9, '2000boris@gmail.com', 'Botris', 'Vidakod', '$2y$10$aGynyJe3JgyZXdww4/9KJOggbjDgVflcjMaqA0Y7vut8dIR1iZeIS', 1, NULL, 1, '2022-05-21 12:35:00'),
(10, 'vidakovic.boris@gmail.com', 'Boban', 'Taxi', '$2y$10$tS.uhYhl5w47RvmCSCqEiu3c1ji8LwZKwKcpk5/.GagCJHflz.vr.', 0, NULL, 1, '2022-05-21 12:38:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
