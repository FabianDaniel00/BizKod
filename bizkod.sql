-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2022 at 11:44 PM
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

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `message`, `created_at`, `userID`) VALUES
(1, 'Sziasztok', '2022-05-21 18:10:25', 1),
(2, 'Sziasztok', '2022-05-21 18:10:39', 2),
(3, 'Mizu??', '2022-05-21 18:10:52', 1),
(4, 'Sziasztok! Minden ok, ott?', '2022-05-21 18:11:14', 3),
(5, 'Hang vagy', '2022-05-21 23:12:48', 1),
(6, 'Pot Miki <3', '2022-05-21 23:13:04', 2),
(7, 'qweqwe', '2022-05-21 23:14:57', 3),
(8, 'asdasd', '2022-05-21 23:17:51', 2),
(9, 'asdasd', '2022-05-21 23:18:46', 1),
(10, 'valami', '2022-05-21 23:18:58', 2),
(11, 'portnklnlbdf', '2022-05-21 23:21:36', 1),
(12, 'kljsdghkbkkjsbdkjbvs', '2022-05-21 23:23:24', 1),
(13, 'asdasdasd', '2022-05-21 23:24:22', 2),
(14, 'qqqqqqq', '2022-05-21 23:24:35', 2),
(15, 'qqqqqqq', '2022-05-21 23:24:42', 3),
(16, 'kurwa', '2022-05-21 23:27:02', 1),
(17, 'valami', '2022-05-21 23:27:14', 1);

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
(10, 'Hala Sportova', '46.1095810000', '19.6551530000', 'sportcsarnok.jpg', 'The sports hall is a multifunctional facility that has a gymnasium, a small hall, a hall for martial arts, a gym, a large hall intended primarily for athletes, and in addition it is also suitable for organizing events of various types.', 'sport', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2259.8033768053333!2d19.65387988983922!3d46.1085095771569!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x474366bfc7d211cf%3A0x29f18f320f9bec3a!2sHala%20sportova!5e0!3m2!1sen!2srs!4v1653158666416!5m2!1sen!2srs'),
(11, 'Dudova Šuma', '46.1104030000', '19.6529960000', 'dudova.jpg', 'Dudova Šuma is a small forest, located next to Hala Sportova. It contains a running track, spanning exactly 1 kilometer.', 'park', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2259.796152018823!2d19.653459169571526!3d46.108685802127184!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47436695784d33b1%3A0xd01aed6f588ef315!2sDudova%20%C5%A1uma!5e0!3m2!1sen!2srs!4v1653158700463!5m2!1sen!2srs'),
(12, 'St. Theresa of Avila Cathedral', '46.0983860000', '19.6587790000', 'terezija.jpg', 'The Cathedral of St. Theresa of Avila is a Roman Catholic cathedral and minor basilica located in Subotica, Serbia, the seat of the Diocese of Subotica. It is dedicated to Saint Theresa of Avila.', 'church', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2766.628385990312!2d19.656641815272668!3d46.09838429892346!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x474366c56b739d8f%3A0x619a39d505107666!2sSt.%20Theresa%20of%20Avila%20Cathedral%2C%20Subotica!5e0!3m2!1sen!2srs!4v1653158892173!5m2!1sen!2srs'),
(13, 'Hotel Galerija', '46.1029350000', '19.6670940000', 'galerija.jpg', '4 stars Hotel Galleria is ideally located on Matije Korvina 17 in Subotica just in 340 m from the centre. It is the right place for a spa/relax, romance/honeymoon, gourmet, family, luxury, budget/backpackers, shopping, city trip, international, business vacation.', 'hotel', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2766.4109516931003!2d19.66422251527286!3d46.10271769863124!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x474366c9aa0534e9%3A0x5f9a5c8554cf98a1!2sHotel%20Galleria!5e0!3m2!1sen!2srs!4v1653158932200!5m2!1sen!2srs'),
(14, 'Raichle Palace', '46.1015140000', '19.6686390000', 'rajhl.jpg', 'The Palace of Franz Raichl (Reichl, Reichle) in Subotica is an Art Nouveau palace. It was built in 1904.', 'culture', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2766.4668245957982!2d19.666464115272777!3d46.10160419870639!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x474366c96ed567d1%3A0x3672af10cf7d56c3!2sRaichle%20Palace!5e0!3m2!1sen!2srs!4v1653158969238!5m2!1sen!2srs'),
(15, 'Main Bus Station', '46.0951160000', '19.6746200000', 'bus.jpg', 'The main bus station of Subotica. Most of the inner city bus lines depart from here.', 'transport', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1508.610353621291!2d19.673688700059945!3d46.094893489966225!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x474361329434749d%3A0xb0a40cbfce55b6b9!2sMain%20Bus%20station!5e0!3m2!1sen!2srs!4v1653159034349!5m2!1sen!2srs'),
(16, 'Subotica Synagogue', '46.1013910000', '19.6613540000', 'zsinagoga.jpg', 'The Jakab and Komor Square Synagogue in Subotica is a Hungarian Art Nouveau synagogue in Subotica, Serbia. It is the second largest synagogue in Europe after the Dohány Street Synagogue in Budapest.', 'church', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2766.4751088501257!2d19.659179915272794!3d46.10143909871753!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x474366c60a83872f%3A0x84818b887e7d51c3!2sSubotica%20Synagogue!5e0!3m2!1sen!2srs!4v1653156546566!5m2!1sen!2srs'),
(17, 'Népkör - Hungarian Cultural Center', '46.1008970000', '19.6581730000', 'nepker.jpg', 'The Hungarian Cultural Center of the Subotica is the oldest continuously operating cultural organization in the South: it was founded on October 15, 1871 as a liberal reading circle.', 'culture', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2766.506931011427!2d19.656170215272834!3d46.10080489876023!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x474366c435e53733%3A0x7d44b5fcb0641ce9!2sN%C3%A9pk%C3%B6r%20-%20Hungarian%20Cultural%20Center!5e0!3m2!1sen!2srs!4v1653159072629!5m2!1sen!2srs'),
(18, 'Pizza+', '46.1010230000', '19.6605120000', 'pizza.jpg', 'Classic local pizzeria, known for their massive slices.', 'food', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2766.4922191997307!2d19.658178215272812!3d46.10109809874055!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x474366c5dc4cb8c3%3A0x3348754ccaa80984!2sPizza%2B!5e0!3m2!1sen!2srs!4v1653159103600!5m2!1sen!2srs'),
(19, 'Lipa', '46.1034890000', '19.6677590000', 'lipa.jpg', 'Bakery, mostly known for their good tasting Burek.', 'food', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d22131.92486047584!2d19.64285730068432!3d46.10113021793896!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x474366c9b30fdd9f%3A0xd5893e3da1f60f0d!2sLipa!5e0!3m2!1sen!2srs!4v1653159150231!5m2!1sen!2srs'),
(20, 'Olympe Gyros 024', '46.1029090000', '19.6675930000', 'gyros.png', 'Olympe Gyros 024 is one of the oldest gyros vendors in Subotica, very populated on weekends.', 'food', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1846.3528322246111!2d19.664413450805483!3d46.10286666466984!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x474366c9abebffab%3A0x9f38dd1fe38d0751!2sOlympe%20Gyros%20Plus!5e0!3m2!1sen!2srs!4v1653159188623!5m2!1sen!2srs'),
(21, 'Boss Cafe', '46.1015180000', '19.6680380000', 'boss.jpg', 'Back in 1986, Boss pizzeria was opened in Subotica - then modern and far ahead of its time.\r\nThe striking name, and a completely new, modern concept, quickly became recognizable, and the constant pursuit of quality resulted in success and expansion of offer and capacity.', 'food', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2766.469334736403!2d19.66683792861778!3d46.101554173228045!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x474366c914d2792f%3A0x7af561bf72e4dffa!2sBoss%20Caffe!5e0!3m2!1sen!2srs!4v1653159227895!5m2!1sen!2srs'),
(22, 'Stara Picerija', '46.1013100000', '19.6680590000', 'stara.jpg', 'Stara Picerija is one of the oldest pizzerias in the Republic of Serbia since, opened in 1977.', 'food', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2766.471415811663!2d19.665498115272825!3d46.10151269871258!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x474366c93e19776b%3A0x3222b6ba458ef0cb!2sStara%20picerija%20-%20Since%201977!5e0!3m2!1sen!2srs!4v1653159261775!5m2!1sen!2srs'),
(23, 'Mali trg', '46.0999820000', '19.6676950000', 'malitrg.jpg', 'Restaurant Mali Trg is located in the heart of Subotica and is the right place for all those who like good morning coffee, selected food and a pleasant atmosphere.', 'food', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d199.77093730210223!2d19.667460839866283!3d46.100055095725935!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x474367a1ca43bca1%3A0x6929d863ec54bbeb!2sMali%20Trg%20Subotica!5e0!3m2!1sen!2srs!4v1653159301902!5m2!1sen!2srs'),
(24, 'McDonalds', '46.1000780000', '19.6648410000', 'meki.jpg', 'McDonalds is a fast food chain that doesn\'t need no introduction, everyone is lovin\' it.', 'food', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d671.9451563675442!2d19.664418178994055!3d46.10017621496093!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x474366cf28e02ee9%3A0xf03e02f5ed45ae17!2zTWNEb25hbGTigJlzIEdyYWRza2Ega3XEh2E!5e0!3m2!1sen!2srs!4v1653159339808!5m2!1sen!2srs'),
(25, 'Alloro Gold', '46.0897370000', '19.6724370000', 'alloro.jpg', 'The authentic ambience, warm and pleasant atmosphere of the cafe and restaurant All’oro, will allow you a pleasant stay and good fun.', 'food', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d366.44806415955964!2d19.67218654753558!3d46.09003802854656!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4743612c8713f6d5%3A0xbdf325f608bf5c14!2sAll&#39;oro!5e0!3m2!1sen!2srs!4v1653159380367!5m2!1sen!2srs'),
(26, 'Lidl', '46.0821320000', '19.6742820000', 'lidlkorhaz.jpg', 'Recently opened in Subotica, Lidl is massive retail store that offers arguably the biggest selection of products is the region.', 'shop', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d549.1238784203468!2d19.67377446026345!3d46.0827887881994!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4743612954e8f41d%3A0x8c708207187d94a8!2sLidl%20u%20izgradnji!5e0!3m2!1sen!2srs!4v1653159416349!5m2!1sen!2srs'),
(27, 'Lidl2', '46.0993720000', '19.6754840000', 'lidl2.jpg', 'Recently opened in Subotica, Lidl is massive retail store that offers arguably the biggest selection of products is the region.', 'shop', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d708239.8976647612!2d18.983147175520067!3d46.09970538701733!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x474366cb51a0692d%3A0x2f721a2f354ead6d!2sLidl!5e0!3m2!1sen!2srs!4v1653159450517!5m2!1sen!2srs'),
(28, '024 Univerexport', '46.1000900000', '19.6927730000', '024.jpg', '024 is on the oldest mega markets located in Subotica, ideal for small shopping.', 'shop', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1956.198596617632!2d19.691021527933763!3d46.10129463852397!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x474361386e4d236b%3A0xdbc5dfbdadc9d5f7!2sUniverExport%20MP224!5e0!3m2!1sen!2srs!4v1653159509711!5m2!1sen!2srs'),
(29, 'Onore', '46.1053160000', '19.6901020000', 'onore.jpg', 'A nutritious breakfast will give you the energy you need for a successful day. Of course, nothing without fragrant coffee with that.', 'food', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2766.2830246528465!2d19.68798541527291!3d46.10526709845931!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4743611f4a1f93c3%3A0xdca2ef6b25825ce1!2sONORE!5e0!3m2!1sen!2srs!4v1653159544929!5m2!1sen!2srs'),
(31, 'Mala Gostiona', '46.0990960000', '19.7610780000', 'gostiona.jpg', 'Legendary and authentic, \"Mala gostiona\" has been welcoming its guests on the shores of the lake for 164 years.', 'food', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2766.597511765545!2d19.756332828816983!3d46.09899963208765!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4743618d5a58174d%3A0x4f2b4462f57cf7bd!2sMala%20Gostiona!5e0!3m2!1sen!2srs!4v1653159575071!5m2!1sen!2srs'),
(32, 'Abraham', '46.1007330000', '19.7767210000', 'abraham.jpg', 'Gostiona Abraham is one of the favorite places in Subotica and its surroundings, where visitors have been very happy to come for decades, thanks to the offer of traditional flavors and quality dishes.', 'food', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1232.3327076072424!2d19.775002467061825!3d46.101076276693334!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x474361f3f30433a9%3A0xe915c554fdc8e477!2sAbraham!5e0!3m2!1sen!2srs!4v1653159648495!5m2!1sen!2srs'),
(33, 'Croatian Cultural Centre \"Bunjevacko kolo\"', '46.0973740000', '19.6569710000', 'dukat.jpg', 'The Croatian cultural centre of Bunjevacko kolo will introduce to you the unique blend of nations. This institution can organize small scale gatherings and cocktails, and you can use the opportunity to meet and understand what extraordinary contribution each community gives to city identity.', 'food', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d172.91662991105227!2d19.656804934555613!3d46.09763306500917!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x474366c5329335e9%3A0x24ee399f2a7acb59!2sCroatian%20Cultural%20Centre%20%22Bunjevacko%20kolo%22!5e0!3m2!1sen!2srs!4v1653159724950!5m2!1sen!2srs'),
(34, 'Court', '46.0962620000', '19.6729140000', 'sud.jpg', 'High court in Subotica.', 'official', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d366.40693794171443!2d19.672703742089308!3d46.09622784415613!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x474366cd2e1c4139%3A0xe9549ba851c67090!2sOsnovni%20sud%20u%20Subotici!5e0!3m2!1sen!2srs!4v1653159968006!5m2!1sen!2srs'),
(35, 'Higijenski centar', '46.1048800000', '19.6684240000', 'higijenski.jpg', 'Institute of Public Health.', 'official', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d548.9067942780152!2d19.667919623274464!3d46.104595096072686!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x474366c82ba01271%3A0x4dff4879c99ae295!2sZavod%20za%20javno%20zdravlje!5e0!3m2!1sen!2srs!4v1653160027479!5m2!1sen!2srs'),
(36, 'Hospital', '46.0810900000', '19.6725010000', 'bolnica.jpg', 'Call for help - 194', 'official', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1232.7702355390932!2d19.670570520782267!3d46.08149794333359!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x474360d6ef1697e9%3A0x5ae6bec4e48c7d62!2sThe%20Hospital%20Subotica!5e0!3m2!1sen!2srs!4v1653160061048!5m2!1sen!2srs'),
(37, 'ER', '46.0999670000', '19.6557530000', 'hitno.jpg', 'Call for help - 194', 'official', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d172.90999419140863!2d19.655720105558792!3d46.09974909724338!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x474366c48bb4f8e3%3A0x62153af371a2c966!2sHitna%20Pomp%C4%87!5e0!3m2!1sen!2srs!4v1653160110542!5m2!1sen!2srs'),
(38, 'Dispanzer', '46.1044820000', '19.6680270000', 'dispanzer.jpg', 'Medical care for infants, preschool children, school children AND youth', 'official', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d548.9067933269687!2d19.667377728651157!3d46.104595191588714!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x474366c833b49921%3A0x827201ee2a4d207d!2sDispanzer!5e0!3m2!1sen!2srs!4v1653160146303!5m2!1sen!2srs'),
(39, 'Post office', '46.1005140000', '19.6715460000', 'posta.jpg', 'The main post office in Subotica.', 'official', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d978.1068454535153!2d19.67071117565827!3d46.100869212098935!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x474366cb96c7617b%3A0xb916e1cd7b086c13!2sPo%C5%A1ta%20Srbije!5e0!3m2!1sen!2srs!4v1653160182910!5m2!1sen!2srs'),
(40, 'Posta_makova', '46.1214330000', '19.6733430000', 'post_makova.jpg', 'Post office located in Makova Sedmica.', 'official', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1423.2690420493275!2d19.672787421501848!3d46.12082023393989!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x474366b09cf72c7f%3A0x6087c91634b91289!2sPost%20of%20Serbia!5e0!3m2!1sen!2srs!4v1653160250862!5m2!1sen!2srs');

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

--
-- Dumping data for table `location_rating`
--

INSERT INTO `location_rating` (`id`, `location_id`, `rating`, `message`, `user_id`, `created_at`) VALUES
(1, 1, 2, 'Okej', 2, '2022-05-21 22:58:19'),
(3, 1, 4, 'very good', 3, '2022-05-21 22:59:07'),
(4, 2, 1, 'very good', 3, '2022-05-21 23:06:16'),
(5, 3, 2, 'meh not good', 1, '2022-05-21 23:06:16'),
(6, 3, 3, 'average', 2, '2022-05-21 23:06:16'),
(7, 3, 4, 'very good', 3, '2022-05-21 23:06:16'),
(8, 4, 4, 'very good', 1, '2022-05-21 23:06:16'),
(9, 4, 5, 'super good come here', 2, '2022-05-21 23:06:16'),
(10, 5, 3, 'average', 2, '2022-05-21 23:06:16'),
(11, 5, 2, 'bad quality', 3, '2022-05-21 23:06:16'),
(12, 5, 1, 'not good', 1, '2022-05-21 23:06:16'),
(13, 6, 1, 'not good', 1, '2022-05-21 23:06:16'),
(14, 6, 5, 'very good', 3, '2022-05-21 23:06:17'),
(15, 7, 5, 'very good', 3, '2022-05-21 23:06:17'),
(16, 7, 4, 'nice', 1, '2022-05-21 23:06:17'),
(17, 7, 3, 'pretty average', 4, '2022-05-21 23:06:17'),
(18, 7, 2, 'poor', 2, '2022-05-21 23:06:17'),
(19, 8, 1, 'very good', 3, '2022-05-21 23:07:59'),
(20, 8, 2, 'meh not good', 1, '2022-05-21 23:07:59'),
(21, 8, 3, 'average', 2, '2022-05-21 23:07:59'),
(22, 8, 4, 'very good', 4, '2022-05-21 23:07:59'),
(23, 9, 4, 'very good', 1, '2022-05-21 23:07:59'),
(24, 9, 5, 'super good come here', 2, '2022-05-21 23:07:59'),
(25, 10, 3, 'average', 2, '2022-05-21 23:07:59'),
(26, 10, 2, 'bad quality', 3, '2022-05-21 23:07:59'),
(27, 10, 1, 'not good', 1, '2022-05-21 23:07:59'),
(28, 11, 1, 'not good', 1, '2022-05-21 23:07:59'),
(29, 11, 5, 'very good', 3, '2022-05-21 23:07:59'),
(30, 12, 5, 'very good', 3, '2022-05-21 23:07:59'),
(31, 12, 4, 'nice', 1, '2022-05-21 23:07:59'),
(32, 12, 3, 'pretty average', 4, '2022-05-21 23:07:59'),
(33, 12, 2, 'poor', 2, '2022-05-21 23:07:59'),
(34, 11, 1, 'very bad', 3, '2022-05-21 23:11:55'),
(35, 11, 2, 'meh not good', 1, '2022-05-21 23:11:55'),
(36, 11, 3, 'average', 2, '2022-05-21 23:11:55'),
(37, 11, 4, 'very good', 4, '2022-05-21 23:11:55'),
(38, 12, 4, 'very good', 1, '2022-05-21 23:11:55'),
(39, 12, 5, 'super good come here', 2, '2022-05-21 23:11:55'),
(40, 13, 3, 'average', 2, '2022-05-21 23:11:55'),
(41, 13, 2, 'bad quality', 3, '2022-05-21 23:11:55'),
(42, 13, 1, 'not good', 1, '2022-05-21 23:11:55'),
(43, 14, 1, 'not good', 1, '2022-05-21 23:11:55'),
(44, 14, 5, 'very good', 3, '2022-05-21 23:11:55'),
(45, 15, 5, 'very good', 3, '2022-05-21 23:11:55'),
(46, 15, 4, 'nice', 1, '2022-05-21 23:11:55'),
(47, 15, 3, 'pretty average', 4, '2022-05-21 23:11:55'),
(48, 15, 2, 'poor', 2, '2022-05-21 23:11:55'),
(49, 16, 1, 'very bad', 3, '2022-05-21 23:13:17'),
(50, 16, 2, 'meh not good', 1, '2022-05-21 23:13:17'),
(51, 16, 3, 'average', 2, '2022-05-21 23:13:17'),
(52, 16, 4, 'very good', 4, '2022-05-21 23:13:17'),
(53, 17, 4, 'very good', 1, '2022-05-21 23:13:17'),
(54, 17, 5, 'super good come here', 2, '2022-05-21 23:13:17'),
(55, 18, 3, 'average', 2, '2022-05-21 23:13:17'),
(56, 18, 2, 'bad quality', 3, '2022-05-21 23:13:17'),
(57, 18, 1, 'not good', 1, '2022-05-21 23:13:17'),
(58, 19, 1, 'not good', 1, '2022-05-21 23:13:17'),
(59, 19, 5, 'very good', 3, '2022-05-21 23:13:17'),
(60, 20, 5, 'very good', 3, '2022-05-21 23:13:17'),
(61, 20, 4, 'nice', 1, '2022-05-21 23:13:17'),
(62, 20, 3, 'pretty average', 4, '2022-05-21 23:13:17'),
(63, 20, 2, 'poor', 2, '2022-05-21 23:13:17'),
(64, 21, 1, 'very bad', 3, '2022-05-21 23:14:06'),
(65, 21, 2, 'meh not good', 1, '2022-05-21 23:14:06'),
(66, 21, 3, 'average', 2, '2022-05-21 23:14:06'),
(67, 21, 4, 'very good', 4, '2022-05-21 23:14:06'),
(68, 22, 4, 'very good', 1, '2022-05-21 23:14:06'),
(69, 22, 5, 'super good come here', 2, '2022-05-21 23:14:06'),
(70, 23, 3, 'average', 2, '2022-05-21 23:14:06'),
(71, 23, 2, 'bad quality', 3, '2022-05-21 23:14:06'),
(72, 23, 1, 'not good', 1, '2022-05-21 23:14:06'),
(73, 24, 1, 'not good', 1, '2022-05-21 23:14:06'),
(74, 24, 5, 'very good', 3, '2022-05-21 23:14:07'),
(75, 25, 5, 'very good', 3, '2022-05-21 23:14:07'),
(76, 25, 4, 'nice', 1, '2022-05-21 23:14:07'),
(77, 25, 3, 'pretty average', 4, '2022-05-21 23:14:07'),
(78, 25, 2, 'poor', 2, '2022-05-21 23:14:07'),
(79, 26, 1, 'very bad', 3, '2022-05-21 23:14:41'),
(80, 26, 2, 'meh not good', 1, '2022-05-21 23:14:41'),
(81, 26, 3, 'average', 2, '2022-05-21 23:14:41'),
(82, 26, 4, 'very good', 4, '2022-05-21 23:14:41'),
(83, 27, 4, 'very good', 1, '2022-05-21 23:14:41'),
(84, 27, 5, 'super good come here', 2, '2022-05-21 23:14:41'),
(85, 28, 3, 'average', 2, '2022-05-21 23:14:41'),
(86, 28, 2, 'bad quality', 3, '2022-05-21 23:14:41'),
(87, 28, 1, 'not good', 1, '2022-05-21 23:14:41'),
(88, 29, 1, 'not good', 1, '2022-05-21 23:14:41'),
(89, 29, 5, 'very good', 3, '2022-05-21 23:14:41'),
(90, 30, 5, 'very good', 3, '2022-05-21 23:14:41'),
(91, 30, 4, 'nice', 1, '2022-05-21 23:14:41'),
(92, 30, 3, 'pretty average', 4, '2022-05-21 23:14:41'),
(93, 30, 2, 'poor', 2, '2022-05-21 23:14:41'),
(94, 31, 1, 'very bad', 3, '2022-05-21 23:15:25'),
(95, 31, 2, 'meh not good', 1, '2022-05-21 23:15:25'),
(96, 31, 3, 'average', 2, '2022-05-21 23:15:25'),
(97, 31, 4, 'very good', 4, '2022-05-21 23:15:25'),
(98, 32, 4, 'very good', 1, '2022-05-21 23:15:25'),
(99, 32, 5, 'super good come here', 2, '2022-05-21 23:15:25'),
(100, 33, 3, 'average', 2, '2022-05-21 23:15:25'),
(101, 33, 2, 'bad quality', 3, '2022-05-21 23:15:25'),
(102, 33, 1, 'not good', 1, '2022-05-21 23:15:25'),
(103, 34, 1, 'not good', 1, '2022-05-21 23:15:25'),
(104, 34, 5, 'very good', 3, '2022-05-21 23:15:25'),
(105, 35, 5, 'very good', 3, '2022-05-21 23:15:25'),
(106, 35, 4, 'nice', 1, '2022-05-21 23:15:25'),
(107, 35, 3, 'pretty average', 4, '2022-05-21 23:15:25'),
(108, 35, 2, 'poor', 2, '2022-05-21 23:15:25'),
(109, 36, 1, 'very bad', 3, '2022-05-21 23:15:54'),
(110, 36, 2, 'meh not good', 1, '2022-05-21 23:15:54'),
(111, 36, 3, 'average', 2, '2022-05-21 23:15:54'),
(112, 36, 4, 'very good', 4, '2022-05-21 23:15:54'),
(113, 37, 4, 'very good', 1, '2022-05-21 23:15:54'),
(114, 37, 5, 'super good come here', 2, '2022-05-21 23:15:54'),
(115, 38, 3, 'average', 2, '2022-05-21 23:15:54'),
(116, 38, 2, 'bad quality', 3, '2022-05-21 23:15:54'),
(117, 38, 1, 'not good', 1, '2022-05-21 23:15:54'),
(118, 39, 1, 'not good', 1, '2022-05-21 23:15:54'),
(119, 39, 5, 'very good', 3, '2022-05-21 23:15:54'),
(120, 40, 5, 'very good', 3, '2022-05-21 23:15:54'),
(121, 40, 4, 'nice', 1, '2022-05-21 23:15:54'),
(122, 40, 3, 'pretty average', 4, '2022-05-21 23:15:54'),
(123, 40, 2, 'poor', 2, '2022-05-21 23:15:54');

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
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location_rating`
--
ALTER TABLE `location_rating`
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
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `location_rating`
--
ALTER TABLE `location_rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
