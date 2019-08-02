-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2019 at 08:54 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `utime`
--

-- --------------------------------------------------------

--
-- Table structure for table `utpassions`
--

CREATE TABLE `utpassions` (
  `id` int(10) NOT NULL,
  `passions` varchar(225) NOT NULL,
  `count` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `utpassions`
--

INSERT INTO `utpassions` (`id`, `passions`, `count`) VALUES
(1, 'Physic', 0),
(2, 'Programming', 0),
(5, 'Networking', 0),
(6, 'Design', 0),
(7, 'Artificial Intelligence', 0),
(8, 'Space', 0),
(9, 'Web Security', 0),
(10, 'Game Development', 0);

-- --------------------------------------------------------

--
-- Table structure for table `utusers`
--

CREATE TABLE `utusers` (
  `id` int(10) NOT NULL,
  `firstName` varchar(225) NOT NULL,
  `lastName` varchar(225) NOT NULL,
  `Email` varchar(225) NOT NULL,
  `pass` varchar(225) NOT NULL,
  `passions` text NOT NULL,
  `school` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `utusers`
--

INSERT INTO `utusers` (`id`, `firstName`, `lastName`, `Email`, `pass`, `passions`, `school`) VALUES
(22, 'May', 'Myat Noe Zaw', 'maymyatnoezaw@gmail.com', 'deD60Uj02F0hQ', 'a:2:{i:0;s:6:\"Design\";i:1;s:16:\"Game Development\";}', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `utpassions`
--
ALTER TABLE `utpassions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utusers`
--
ALTER TABLE `utusers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `utpassions`
--
ALTER TABLE `utpassions`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `utusers`
--
ALTER TABLE `utusers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
