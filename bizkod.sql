-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2022 at 08:30 PM
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
  `lat` decimal(64,10) NOT NULL,
  `lon` decimal(64,10) NOT NULL,
  `picture` varchar(1024) NOT NULL,
  `description` varchar(2048) NOT NULL,
  `type` varchar(255) NOT NULL,
  `map` varchar(2048) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `name`, `lat`, `lon`, `picture`, `description`, `type`, `map`) VALUES
(1, 'Trg Žrtava Fašizma', '46.0991890000', '19.6591330000', 'hosok.jpg', 'Monument to fallen soldiers and victims of fascism, work of the sculptor Toma Rosandić, was ceremoniously opened on October 30, 1952.', 'church', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2766.602388777997!2d19.65457412881691!3d46.09890243209419!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x474366c5a7ef3447%3A0x4764fa59b8d93ebe!2sTrg%20%C5%BDrtava%20Fa%C5%A1izma%209%2C%20Subotica%2024000!5e0!3m2!1sen!2srs!4v1653157274944!5m2!1sen!2srs'),
(3, 'National Theatre', '46.1008340000', '19.6700070000', 'szinhaz.jpg', 'Built in 1854 as the first monumental public building in Subotica, was razed with the purpose of reconstruction by City authorities in 2007, although it was declared a historic monument under state protection in 1983.', 'culture', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2766.537613837145!2d19.663881115272716!3d46.100193398801565!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x474366cecf1e6925%3A0x7b5fd3253726c072!2sNational%20Theatre!5e0!3m2!1sen!2srs!4v1653157423302!5m2!1sen!2srs'),
(4, 'Lenin Park', '46.1016150000', '19.6698140000', 'lenin.jpg', 'Park found in the heart of Subotica.', 'park', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3386.3508247571594!2d19.666270587092125!3d46.1008336099224!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x474366c96265db0b%3A0x4fe2bb95c5174da9!2sPark%20Ferenca%20Rajhla!5e0!3m2!1sen!2srs!4v1653157469288!5m2!1sen!2srs'),
(5, 'Gradski Stadion FK Spartak', '46.0816550000', '19.6765350000', 'spartak.jpg', 'Subotica City Stadium is a multi-purpose stadium located in Subotica, Serbia. With a capacity of 13,000 people, it is currently used mostly for football matches and is the home ground of FK Spartak Subotica from 1945.', 'sport', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2767.4606456830934!2d19.67462841910567!3d46.081794700042025!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x474360d7851b5521%3A0xb3c1d6f3da3b6036!2sGradski%20stadion!5e0!3m2!1sen!2srs!4v1653157508500!5m2!1sen!2srs'),
(6, 'Church of Holy Greatmartyr Demetrius of Thessaloniki', '46.0725200000', '19.6797000000', 'sandor_templom.jpg', 'The Serbian Orthodox Church of St. Dimitri is located in Aleksandrovo, a suburb of the City of Subotica, erected in 1818 and has the status of a cultural monument of great importance.', 'church', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4147.223142590055!2d19.676261049817672!3d46.072249387918816!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x474360c34f300913%3A0x3c98faece347b663!2sChurch%20of%20Holy%20Greatmartyr%20Demetrius%20of%20Thessaloniki!5e0!3m2!1sen!2srs!4v1653157561998!5m2!1sen!2srs'),
(7, 'StopShop ', '46.1006140000', '19.6985080000', 'shopi.jpg', 'STOP SHOP Subotica is located in Vojvodina, in the very north  of Serbia. It offers a variety of brands as well as a restaurant so everyone can find exactly what they need.', 'shop', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2766.5319188475246!2d19.696334515272767!3d46.10030689879382!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47436140aeff2fd7%3A0xc015806e75c8d891!2sStop%20Shop%20Subotica!5e0!3m2!1sen!2srs!4v1653157608021!5m2!1sen!2srs'),
(8, 'Roda Mega', '46.1007030000', '19.7033140000', 'rodic.jpg', 'Retail store for household tools and everyday needs.', 'shop', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2766.4844718226996!2d19.699664777355263!3d46.10125250000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x474361404f7983ef%3A0xcdbbd49a4eea0d15!2sRoda%20Mega!5e0!3m2!1sen!2srs!4v1653157666592!5m2!1sen!2srs'),
(9, 'Lake Palić', '46.0884720000', '19.7575380000', 'palic.jpg', 'Lake Palić is a lake 8 kilometres from Subotica, near the town of Palić, in Serbia. It covers an area of 3.8 square kilometres.', 'park', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d44281.17187304081!2d19.661901868348536!3d46.07954993864998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x474361afccae70db%3A0x707bdbf474b1a160!2sPalic%20Lake!5e0!3m2!1sen!2srs!4v1653157708734!5m2!1sen!2srs'),
(10, 'Hala Sportova', '46.1095810000', '19.6551530000', 'sportcsarnok.jpg', 'The sports hall is a multifunctional facility that has a gymnasium, a small hall, a hall for martial arts, a gym, a large hall intended primarily for athletes, and in addition it is also suitable for organizing events of various types.', 'sport', NULL),
(11, 'Dudova Šuma', '46.1104030000', '19.6529960000', 'dudova.jpg', 'Dudova Šuma is a small forest, located next to Hala Sportova. It contains a running track, spanning exactly 1 kilometer.', 'park', NULL),
(12, 'St. Theresa of Avila Cathedral', '46.0983860000', '19.6587790000', 'terezija.jpg', 'The Cathedral of St. Theresa of Avila is a Roman Catholic cathedral and minor basilica located in Subotica, Serbia, the seat of the Diocese of Subotica. It is dedicated to Saint Theresa of Avila.', 'church', NULL),
(13, 'Hotel Galerija', '46.1029350000', '19.6670940000', 'galerija.jpg', '4 stars Hotel Galleria is ideally located on Matije Korvina 17 in Subotica just in 340 m from the centre. It is the right place for a spa/relax, romance/honeymoon, gourmet, family, luxury, budget/backpackers, shopping, city trip, international, business vacation.', 'hotel', NULL),
(14, 'Raichle Palace', '46.1015140000', '19.6686390000', 'rajhl.jpg', 'The Palace of Franz Raichl (Reichl, Reichle) in Subotica is an Art Nouveau palace. It was built in 1904.', 'culture', NULL),
(15, 'Main Bus Station', '46.0951160000', '19.6746200000', 'bus.jpg', 'The main bus station of Subotica. Most of the inner city bus lines depart from here.', 'transport', NULL),
(16, 'Subotica Synagogue', '46.1013910000', '19.6613540000', 'zsinagoga.jpg', 'The Jakab and Komor Square Synagogue in Subotica is a Hungarian Art Nouveau synagogue in Subotica, Serbia. It is the second largest synagogue in Europe after the Dohány Street Synagogue in Budapest.', 'church', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2766.4751088501257!2d19.659179915272794!3d46.10143909871753!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x474366c60a83872f%3A0x84818b887e7d51c3!2sSubotica%20Synagogue!5e0!3m2!1sen!2srs!4v1653156546566!5m2!1sen!2srs'),
(17, 'Népkör - Hungarian Cultural Center', '46.1008970000', '19.6581730000', 'nepker.jpg', 'The Hungarian Cultural Center of the Subotica is the oldest continuously operating cultural organization in the South: it was founded on October 15, 1871 as a liberal reading circle.', 'culture', NULL),
(18, 'Pizza+', '46.1010230000', '19.6605120000', 'pizza.jpg', 'Classic local pizzeria, known for their massive slices.', 'food', NULL),
(19, 'Lipa', '46.1034890000', '19.6677590000', 'lipa.jpg', 'Bakery, mostly known for their good tasting Burek.', 'food', NULL),
(20, 'Olympe Gyros 024', '46.1029090000', '19.6675930000', '', 'Olympe Gyros 024 is one of the oldest gyros vendors in Subotica, very populated on weekends.', 'food', NULL),
(21, 'Boss Cafe', '46.1015180000', '19.6680380000', 'boss.jpg', 'Back in 1986, Boss pizzeria was opened in Subotica - then modern and far ahead of its time.\r\nThe striking name, and a completely new, modern concept, quickly became recognizable, and the constant pursuit of quality resulted in success and expansion of offer and capacity.', 'food', NULL),
(22, 'Stara Picerija', '46.1013100000', '19.6680590000', 'stara.jpg', 'Stara Picerija is one of the oldest pizzerias in the Republic of Serbia since, opened in 1977.', 'food', NULL),
(23, 'Mali trg', '46.0999820000', '19.6676950000', 'malitrg.jpg', 'Restaurant Mali Trg is located in the heart of Subotica and is the right place for all those who like good morning coffee, selected food and a pleasant atmosphere.', 'food', NULL),
(24, 'McDonalds', '46.1000780000', '19.6648410000', 'meki.jpg', 'McDonalds is a fast food chain that doesn\'t need no introduction, everyone is lovin\' it.', 'food', NULL),
(25, 'Alloro Gold', '46.0897370000', '19.6724370000', 'alloro.jpg', 'The authentic ambience, warm and pleasant atmosphere of the cafe and restaurant All’oro, will allow you a pleasant stay and good fun.', 'food', NULL),
(26, 'Lidl', '46.0821320000', '19.6742820000', 'lidlkorhaz.jpg', 'Recently opened in Subotica, Lidl is massive retail store that offers arguably the biggest selection of products is the region.', 'shop', NULL),
(27, 'Lidl2', '46.0993720000', '19.6754840000', 'lidl2.jpg', 'Recently opened in Subotica, Lidl is massive retail store that offers arguably the biggest selection of products is the region.', 'shop', NULL),
(28, '024 Univerexport', '46.1000900000', '19.6927730000', '024.jpg', '024 is on the oldest mega markets located in Subotica, ideal for small shopping.', 'shop', NULL),
(29, 'Onore', '46.1053160000', '19.6901020000', 'onore.jpg', 'A nutritious breakfast will give you the energy you need for a successful day. Of course, nothing without fragrant coffee with that.', 'food', NULL),
(31, 'Mala Gostiona', '46.0990960000', '19.7610780000', 'gostiona.jpg', 'Legendary and authentic, \"Mala gostiona\" has been welcoming its guests on the shores of the lake for 164 years.', 'food', NULL),
(32, 'Abraham', '46.1007330000', '19.7767210000', 'abraham.jpg', 'Gostiona Abraham is one of the favorite places in Subotica and its surroundings, where visitors have been very happy to come for decades, thanks to the offer of traditional flavors and quality dishes.', 'food', NULL),
(33, 'Dukat', '46.0973740000', '19.6569710000', 'dukat.jpg', 'Kafana Dukat is a new place where you can come and try a variety of dishes, both traditional and old.', 'food', NULL),
(34, 'Court', '46.0962620000', '19.6729140000', 'sud.jpg', 'High court in Subotica.', 'official', NULL),
(35, 'Higijenski centar', '46.1048800000', '19.6684240000', 'higijenski.jpg', 'Institute of Public Health.', 'official', NULL),
(36, 'Hospital', '46.0810900000', '19.6725010000', 'bolnica.jpg', 'Call for help - 194', 'official', NULL),
(37, 'ER', '46.0999670000', '19.6557530000', 'hitno.jpg', 'Call for help - 194', 'official', NULL),
(38, 'Dispanzer', '46.1044820000', '19.6680270000', 'dispanzer.jpg', 'Medical care for infants, preschool children, school children AND youth', 'official', NULL),
(39, 'Post office', '46.1005140000', '19.6715460000', 'posta.jpg', 'The main post office in Subotica.', 'official', NULL),
(40, 'Posta_makova', '46.1214330000', '19.6733430000', 'post_makova.jpg', 'Post office located in Makova Sedmica.', 'official', NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
