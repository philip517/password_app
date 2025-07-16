-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2024 at 02:09 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phil_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `password`) VALUES
(1, 'user1', 'test1234');

-- --------------------------------------------------------

--
-- Table structure for table `website`
--

CREATE TABLE `website` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `url` varchar(250) NOT NULL,
  `description` longtext NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `website`
--

INSERT INTO `website` (`id`, `name`, `url`, `description`, `password`) VALUES
(1, 'google', 'www.example.com', 'we shall use this as an example description', '12345678'),
(2, 'example(1)', 'www.example2.cpom', 'this is the second example', 'example2123'),
(3, 'example(3)', 'www.example3.cpom', 'this is the third example', 'example3123'),
(4, 'example(4)', 'www.example4.cpom', 'this is the fourth example', 'example4123'),
(5, 'mine', 'asasdasd.com', 'hallomyfriend', '1234'),
(6, 'kasman', 'www.hallo.com', 'thisisaseriesofeamplewebsites', 'hallo123'),
(7, 'shadrick', 'www.shadrick.com', 'thisisforshadrick', 'shad1234'),
(8, 'heafeasdf', 'ssss', 'weerwerwe', 'wwwwwww'),
(9, 'Josh', 'www.josh.com', 'anotherexamplepassword', 'josh123'),
(10, 'philim', 'ww.philim.com', 'this is the edit code', 'why'),
(11, 'hallo', 'my.com', 'ajsjasajsgdkasg', 'asaskhlaks'),
(12, '', '', '', ''),
(13, 'BBB', 'WWW.BBB.COM', 'jasgkdjgasda', 'hallo'),
(14, 'kaskam', 'www.kaskam.net', 'thisiskaskam', '1234'),
(15, 'gomez', 'www.gomez.com', 'forgomez', '1234'),
(16, 'kasmans', 'www.pkp.com', 'jakjsasasjkasjassasa', 'askjashjkas'),
(17, 'adsdasd', 'asdasda', 'asdasdasdasd', 'asdasdasd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `website`
--
ALTER TABLE `website`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `website`
--
ALTER TABLE `website`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
