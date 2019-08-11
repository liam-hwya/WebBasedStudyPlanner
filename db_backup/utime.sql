-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2019 at 01:19 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.1.30

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
-- Table structure for table `utcolors`
--

CREATE TABLE `utcolors` (
  `id` int(10) NOT NULL,
  `utcolor` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `utcolors`
--

INSERT INTO `utcolors` (`id`, `utcolor`) VALUES
(1, '#FFCC33'),
(2, '#99CC33'),
(3, '#66CCFF'),
(4, '#3366FF'),
(5, '#40e371'),
(6, '#e93a3a');

-- --------------------------------------------------------

--
-- Table structure for table `utevent`
--

CREATE TABLE `utevent` (
  `id` int(10) NOT NULL,
  `event` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `utevent`
--

INSERT INTO `utevent` (`id`, `event`) VALUES
(1, 'd2019082'),
(2, 'd20190812'),
(3, 'd20190830'),
(4, 'd20190910'),
(5, 'd20190924');

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
-- Table structure for table `utposts`
--

CREATE TABLE `utposts` (
  `id` int(10) NOT NULL,
  `userid` int(10) NOT NULL,
  `title` varchar(225) NOT NULL,
  `utdescription` text NOT NULL,
  `starcount` int(10) NOT NULL,
  `category` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `utposts`
--

INSERT INTO `utposts` (`id`, `userid`, `title`, `utdescription`, `starcount`, `category`) VALUES
(41, 33, 'bj,b', 'huu', 0, 'Programming'),
(42, 33, 'asdfasdfasdf', 'dfgasdfg', 0, 'Physic'),
(43, 33, 'gsdfgdsfg', 'dfgdsfgdsf', 0, 'Physic'),
(44, 33, 'Welcom from', 'uadfklj', 0, 'Physic'),
(55, 33, 'That Girl Lyrics', 'There\'s a girl but I let her get away\nIt\'s all my fault \'cause pride got in the way\nAnd I\'d be lying if I said I was ok\nAbout that girl the one I let get away\nI keep saying no\nThis can\'t be the way we\'re supposed to be\nI keep saying no\nThere\'s gotta be a way to get you close to me\nNow I know you gotta\nSpeak up if you want somebody\nCan\'t let him get away, oh no\nYou don\'t wanna end up sorry\nThe way that I\'m feeling everyday\nNo no no no\nThere\'s no hope for the broken heart\nNo no no no\nThere\'s no hope for the broken\nThere\'s a girl but I let her get away\nIt\'s my fault \'cause I said I needed space\nI\'ve been torturing myself night and day\nAbout that girl, the one I let get away\nI keep saying no\nThis can\'t be the way we\'re supposed to be\nI keep saying no\nThere\'s gottaâ€¦', 0, 'Design'),
(56, 33, 'Old Tow Road Lyrics', 'Yeah, I\'m gonna take my horse to the old town road\nI\'m gonna ride \'til I can\'t no more\nI\'m gonna take my horse to the old town road\nI\'m gonna ride \'til I can\'t no more (Kio, Kio)\nI got the horses in the back\nHorse tack is attached\nHat is matte black\nGot the boots that\'s black to match\nRidin\' on a horse, ha\nYou can whip your Porsche\nI been in the valley\nYou ain\'t been up off that porch, now\nCan\'t nobody tell me nothin\'\nYou can\'t tell me nothin\'\nCan\'t nobody tell me nothin\'\nYou can\'t tell me nothin\'\nRidin\' on a tractor\nLean all in my bladder\nCheated on my baby\nYou can go and ask her\nMy life is a movie\nBull ridin\' and boobies\nCowboy hat from Gucci\nWrangler onâ€¦', 0, 'Physic');

-- --------------------------------------------------------

--
-- Table structure for table `utstar`
--

CREATE TABLE `utstar` (
  `postId` int(10) NOT NULL,
  `userId` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `uttask`
--

CREATE TABLE `uttask` (
  `id` int(10) NOT NULL,
  `userid` int(10) NOT NULL,
  `tasksubject` text NOT NULL,
  `taskdate` varchar(225) NOT NULL,
  `shour` varchar(225) NOT NULL,
  `sminute` varchar(225) NOT NULL,
  `sampm` varchar(225) NOT NULL,
  `ehour` varchar(225) NOT NULL,
  `eminute` varchar(225) NOT NULL,
  `eampm` varchar(225) NOT NULL,
  `priority` int(1) NOT NULL,
  `emotion` int(1) NOT NULL,
  `dformat` varchar(225) NOT NULL,
  `utColor` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `uttask`
--

INSERT INTO `uttask` (`id`, `userid`, `tasksubject`, `taskdate`, `shour`, `sminute`, `sampm`, `ehour`, `eminute`, `eampm`, `priority`, `emotion`, `dformat`, `utColor`) VALUES
(28, 30, 'Some things to Do', '2019-08-07', '1', '5', 'am', '1', '5', 'am', 3, 3, 'd20190807', '#3AC485'),
(29, 30, 'Finish Time Table Page', '2019-08-06', '10', '30', 'pm', '11', '50', 'pm', 4, 5, 'd20190806', '#3AC485'),
(30, 30, 'Drink Coffee after split Days', '2019-08-06', '1', '5', 'am', '1', '5', 'am', 4, 5, 'd20190806', '#3AC485'),
(31, 30, 'Do Every Thing Make Me Happy', '2019-08-22', '1', '5', 'am', '1', '5', 'am', 3, 3, 'd20190822', '#3AC485'),
(32, 30, 'play piano every day', '2019-08-16', '1', '5', 'am', '1', '5', 'am', 3, 3, 'd20190816', '#3AC485'),
(33, 30, 'Sleep two Hour', '2019-08-06', '1', '5', 'am', '1', '5', 'am', 3, 3, 'd20190806', '#3366FF'),
(34, 30, 'Sleep', '2019-08-07', '3', '30', 'am', '8', '30', 'am', 1, 5, 'd20190807', '#99CC33'),
(36, 30, 'Wakeup early and Code agein', '2019-08-07', '7', '10', 'am', '8', '45', 'am', 1, 5, 'd20190807', '#e93a3a'),
(37, 30, 'Code till the morning', '2019-08-08', '1', '5', 'am', '7', '5', 'am', 1, 3, 'd20190808', '#e93a3a'),
(38, 30, 'Finish Time Table and Community Pages completely', '2019-08-09', '9', '30', 'am', '11', '55', 'pm', 1, 5, 'd20190809', '#3AC485');

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
  `school` text DEFAULT NULL,
  `profilePicture` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `utusers`
--

INSERT INTO `utusers` (`id`, `firstName`, `lastName`, `Email`, `pass`, `passions`, `school`, `profilePicture`) VALUES
(22, 'May', 'Myat Noe Zaw', 'maymyatnoezaw@gmail.com', 'deD60Uj02F0hQ', 'a:2:{i:0;s:6:\"Design\";i:1;s:16:\"Game Development\";}', '', 'nopp.png'),
(23, 'JR', 'Alli', 'jralli@gmail.com', 'f46thmAIBTN.6', 'a:5:{i:0;s:10:\"Networking\";i:1;s:23:\"Artificial Intelligence\";i:2;s:16:\"Game Development\";i:3;s:12:\"Web Security\";i:4;s:11:\"Programming\";}', '', 'nopp.png'),
(24, 'JK', 'Rolling', 'jkrolling@gmail.com', 'bcHe.ZbgZhOc.', 'a:4:{i:0;s:11:\"Programming\";i:1;s:23:\"Artificial Intelligence\";i:2;s:12:\"Web Security\";i:3;s:5:\"Space\";}', '', 'nopp.png'),
(25, 'WE', 'Yo', 'weyo@gmail.com', '52AULRFggu7do', 'a:4:{i:0;s:11:\"Programming\";i:1;s:23:\"Artificial Intelligence\";i:2;s:12:\"Web Security\";i:3;s:16:\"Game Development\";}', '', 'nopp.png'),
(26, 'Bu', 'Tu', 'buto@mail.comm', '63/cfHYVaivYE', 'a:5:{i:0;s:10:\"Networking\";i:1;s:5:\"Space\";i:2;s:16:\"Game Development\";i:3;s:12:\"Web Security\";i:4;s:11:\"Programming\";}', '', 'nopp.png'),
(27, 'Ma', 'Ma', 'mama@gmail.com', 'c61NmhZuM67sI', 'a:3:{i:0;s:11:\"Programming\";i:1;s:12:\"Web Security\";i:2;s:23:\"Artificial Intelligence\";}', '', 'nopp.png'),
(28, 'Hello', 'JOk', 'jfladk@gmail.com', '21pzV880flaXs', 'a:4:{i:0;s:10:\"Networking\";i:1;s:5:\"Space\";i:2;s:16:\"Game Development\";i:3;s:23:\"Artificial Intelligence\";}', '', 'nopp.png'),
(29, 'Hla', 'Myo', 'hlamyo@gmail.com', '0d9H5N4pBwLm2', 'a:3:{i:0;s:11:\"Programming\";i:1;s:23:\"Artificial Intelligence\";i:2;s:16:\"Game Development\";}', '', 'nopp.png'),
(30, 'May', 'Myat Noe Zaw', 'mglaymama@gmail.com', 'fezN0/xk5iDcQ', 'a:8:{i:0;s:6:\"Physic\";i:1;s:11:\"Programming\";i:2;s:10:\"Networking\";i:3;s:6:\"Design\";i:4;s:5:\"Space\";i:5;s:23:\"Artificial Intelligence\";i:6;s:12:\"Web Security\";i:7;s:16:\"Game Development\";}', '', 'nopp.png'),
(31, 'Jo', 'Kar', 'jokar@gmail.com', '83SPit.UeQ22E', 'a:4:{i:0;s:10:\"Networking\";i:1;s:23:\"Artificial Intelligence\";i:2;s:5:\"Space\";i:3;s:6:\"Design\";}', '', 'nopp.png'),
(32, 'Oz', 'O', 'ozo@gmail.com', 'e8OxPQ356c3is', 'a:5:{i:0;s:10:\"Networking\";i:1;s:23:\"Artificial Intelligence\";i:2;s:5:\"Space\";i:3;s:12:\"Web Security\";i:4;s:16:\"Game Development\";}', '', 'nopp.png'),
(33, 'Ki', 'Ki', 'kiki@gmail.com', 'a3v3l8Me6MOjA', 'a:5:{i:0;s:6:\"Physic\";i:1;s:10:\"Networking\";i:2;s:5:\"Space\";i:3;s:6:\"Design\";i:4;s:16:\"Game Development\";}', '', 'nopp.png'),
(34, 'Re', 'Core', 'recore@gmail.com', 'a3v3l8Me6MOjA', 'a:8:{i:0;s:6:\"Physic\";i:1;s:11:\"Programming\";i:2;s:10:\"Networking\";i:3;s:6:\"Design\";i:4;s:23:\"Artificial Intelligence\";i:5;s:5:\"Space\";i:6;s:12:\"Web Security\";i:7;s:16:\"Game Development\";}', '', 'nopp.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `utcolors`
--
ALTER TABLE `utcolors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utevent`
--
ALTER TABLE `utevent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utpassions`
--
ALTER TABLE `utpassions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utposts`
--
ALTER TABLE `utposts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uttask`
--
ALTER TABLE `uttask`
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
-- AUTO_INCREMENT for table `utcolors`
--
ALTER TABLE `utcolors`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `utevent`
--
ALTER TABLE `utevent`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `utpassions`
--
ALTER TABLE `utpassions`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `utposts`
--
ALTER TABLE `utposts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `uttask`
--
ALTER TABLE `uttask`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `utusers`
--
ALTER TABLE `utusers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
