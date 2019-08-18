-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2019 at 02:36 PM
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
-- Table structure for table `saved`
--

CREATE TABLE `saved` (
  `id` int(10) NOT NULL,
  `userid` int(10) NOT NULL,
  `postid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `utclassmate`
--

CREATE TABLE `utclassmate` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `classmateName` varchar(225) NOT NULL,
  `classmatePhone` varchar(225) NOT NULL,
  `classmateAddress` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `utclasssubjects`
--

CREATE TABLE `utclasssubjects` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `classSubject` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Table structure for table `utcomment`
--

CREATE TABLE `utcomment` (
  `id` int(10) NOT NULL,
  `postid` int(10) NOT NULL,
  `userid` int(10) NOT NULL,
  `comment` text NOT NULL,
  `mentDate` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `utcomment`
--

INSERT INTO `utcomment` (`id`, `postid`, `userid`, `comment`, `mentDate`) VALUES
(12, 70, 44, 'Every Lonely Night I sing this songðŸ˜¥ðŸ˜”ðŸ’šðŸ’”', '2019-08-18'),
(13, 70, 42, 'Me Too ,Re CoreðŸ˜¥', '2019-08-18'),
(14, 72, 42, 'Thanks for Sharing Bro', '2019-08-18');

-- --------------------------------------------------------

--
-- Table structure for table `utevent`
--

CREATE TABLE `utevent` (
  `id` int(10) NOT NULL,
  `event` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `utexam`
--

CREATE TABLE `utexam` (
  `id` int(10) NOT NULL,
  `userid` int(10) NOT NULL,
  `examName` varchar(225) NOT NULL,
  `examDate` varchar(225) NOT NULL,
  `examStatus` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `utfeedback`
--

CREATE TABLE `utfeedback` (
  `id` int(11) NOT NULL,
  `fbsubject` varchar(225) NOT NULL,
  `fbmessage` text NOT NULL,
  `userid` int(11) NOT NULL,
  `starcount` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(11, 'Programmin', 0),
(12, 'Networking', 0),
(13, 'Data Science', 0),
(14, 'Space', 0),
(15, 'Physics ', 0),
(16, 'Game Development', 0),
(17, 'Graphic Design', 0),
(18, 'Management', 0),
(19, 'Healthy ', 0),
(20, 'Electronics ', 0),
(21, 'Computer Science', 0),
(22, 'Psychology ', 0),
(23, 'Music', 0),
(24, 'Life Style', 0);

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
  `category` varchar(225) NOT NULL,
  `utdate` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `utposts`
--

INSERT INTO `utposts` (`id`, `userid`, `title`, `utdescription`, `starcount`, `category`, `utdate`) VALUES
(70, 42, 'That Girl Lyrics', 'There\'s a girl but I let her get away\nIt\'s all my fault \'cause pride got in the way\nAnd I\'d be lying if I said I was ok\nAbout that girl the one I let get away\nI keep saying no\nThis can\'t be the way we\'re supposed to be\nI keep saying no\nThere\'s gotta be a way to get you close to me\nNow I know you gotta\nSpeak up if you want somebody\nCan\'t let him get away, oh no\nYou don\'t wanna end up sorry\nThe way that I\'m feeling everyday\nNo no no no\nThere\'s no hope for the broken heart\nNo no no no\nThere\'s no hope for the broken\nThere\'s a girl but I let her get away\nIt\'s my fault \'cause I said I needed space\nI\'ve been torturing myself night and day\nAbout that girl, the one I let get away\nI keep saying no\nThis can\'t be the way we\'re supposed to be\nI keep saying no\nThere\'s gotta be a way to get you\nThere\'s gotta be a way\nTo get you close to me\nYou gotta\nSpeak up if you want somebody\nCan\'t let him get away, oh no\nYou don\'t wanna end up sorry\nThe way that I\'m feeling everyday\nNo no no no\nThere\'s no hope for the broken heart\nNo no no no\nThere\'s no hope for the broken\nNo home for me\nNo home \'cause I\'m broken\nNo room to breathe\nAnd I got no one to blame\nNo home for me\nNo home \'cause I\'m broken\nAbout that girl\nThe one I let get away\nSo you better speak up if you want somebody\nCan\'t let him get away oh no no\nYou don\'t wanna end up sorry\nThe way that I\'m feeling everyday\nDon\'t you know\nNo no no no\nThere\'s no hope for the broken heart\nDon\'t you know\nNo no no no\nThere\'s no hope for the broken\nYou don\'t wanna lose at love\nIt\'s only gonna hurt too much\nI\'m telling you\nYou don\'t wanna lose at love\nIt\'s only gonna hurt too much\nYou don\'t wanna lose at love\n\'Cause there\'s no hope for the broken heart\nAbout that girl\nThe one I let get away', 0, 'Music', '2019-08-18'),
(71, 42, 'Attention Lyrics', 'Oh-oh, ooh\nYou\'ve been runnin\' round, runnin\' round, runnin\' round throwin\' that dirt all on my name\n\'Cause you knew that I, knew that I, knew that I\'d call you up\nYou\'ve been going round, going round, going round every party in L.A.\n\'Cause you knew that I, knew that I, knew that I\'d be at one, oh\nI know that dress is karma, perfume regret\nYou got me thinking \'bout when you were mine, oh\nAnd now I\'m all up on ya, what you expect?\nBut you\'re not coming home with me tonight\nYou just want attention, you don\'t want my heart\nMaybe you just hate the thought of me with someone new\nYeah, you just want attention, I knew from the start\nYou\'re just making sure I\'m never gettin\' over you\nyou\'ve been runnin\' round, runnin\' round, runnin\' round throwing that dirt all on my name\n\'Cause you knew that I, knew that I, knew that I\'d call you up\nBaby, now that we\'re, now that we\'re, now that we\'re right here standing face-to-face\nYou already know, already know, already know that you won, oh\nI know that dress is karma (dress is karma), perfume regret\nYou got me thinking \'bout when you were mine (you got me thinking \'bout when you were mine)\nAnd now I\'m all up on ya (all up on ya), what you expect? (oh baby)\nBut you\'re not coming home with me tonight (oh no)\nYou just want attention, you don\'t want my heart\nMaybe you just hate the thought of me with someone new\nYeah, you just want attention, I knew from the start\nYou\'re just making sure I\'m never gettin\' over you, oh\nWhat are you doin\' to me, what are you doin\', huh?\n(What are you doin\'?)\nWhat are you doin\' to me, what are you doin\', huh?\n(What are you doin\'?)\nWhat are you doin\' to me, what are you doin\', huh?\n(What are you doin\'?)\nWhat are you doin\' to me, what are you doin\', huh?\nI know that dress is karma, perfume regret\nYou got me thinking \'bout when you were mine\nAnd now I\'m all up on ya, what you expect?\nBut you\'re not coming home with me tonight\nYou just want attention, you don\'t want my heart\nMaybe you just hate the thought of me with someone new\nYeah, you just want attention, I knew from the start\nYou\'re just making sure I\'m never gettin\' over you (over you)\nWhat are you doin\' to me? (hey) what are you doin\', huh? (what are you doin\', what?)\n(What are you doin\', to me? What are you doin\', huh?)\n(What are you doin\', to me? What are you doin\', huh?)\n(What are you doin\' to me, what are you doin\', huh?)', 0, 'Music', '2019-08-18'),
(72, 44, 'What is Algorithm?ðŸ§', '               Algorithm is a fnite sequence of precise instructions for performing a computation or for solving a .problem\n(     ) RosenDiscreteMathematicsandItsApplications\n Algorithm á€†á€¯á€­á€á€²á‚• á€…á€€á€¬á€¸á€€á€¯á€­  defnition á€–á€¼á€„á€¹á‚•á€†á€¯á€­á€á€ºá€€á€¹á€¡á€™á€ºá€­á€³á€¸á€¡á€™á€ºá€­á€³á€¸á€›á€½á€­á€•á€«á€á€šá€¹á‹á€¡á€€á€¯á€”á€¹á€œá€¯á€¶á€¸á€œá€€á€¹á€á€¶á€‘á€¬á€¸á€á€²á‚• á€–á€¼á€„á€¹á‚•á€†á€¯á€­á€á€ºá€€á€¹á€€á€±á€á€¬á‚• algorithm á€†á€¯á€­á€á€¬ á€»á€•á€žáá€”á€¬á€á€…á€¹á€á€¯á€€á€¯á€­á€±á€»á€–á€›á€½á€„á€¹á€¸á€á€²á‚•á€¡á€á€« á€¡á€²á‚•á€’á€®á€»á€•á€žáá€”á€¬á€€á€¯á€­ á€±á€»á€–á€›á€½á€„á€¹á€¸á€›á€™á€²á‚• á€”á€Šá€¹á€¸á€œá€™á€¹á€¸ á€”á€²á‚• á€±á€»á€–á€›á€½á€„á€¹á€¸á€•á€¯á€¶á€¡á€†á€„á€¹á‚•á€¡á€†á€„á€¹á‚•á€€á€¯á€­ á€± á€–á€¬á€¹á€±á€†á€¬á€„á€¹á€±á€•á€¸á€›á€á€¬á€•á€«á€•á‹á€²\n Algorithm á€€ á€˜á€¬á€œá€¯á€­á‚•  defnition á€–á€¼á€„á€¹á‚•á€†á€¯á€­á€á€ºá€€á€¹á€¡á€™á€ºá€­á€³á€¸á€¡á€™á€ºá€­á€³á€¸á€›á€½á€­á€±á€”á€á€¬á€œá€Šá€¹á€¸á€†á€¯á€­á€±á€á€¬á‚•  algorithm á€†á€¯á€­á€á€²á‚• á€±á€á€«á€Ÿá€¬á€›á€Ÿá€¬ á€¡á€‚á¤á€œá€­ á€•á€¹á€±á€á€«á€Ÿá€¬á€›á€™á€Ÿá€¯á€á€¹á€•á€«á€˜á€°á€¸á‹á‰ á€›á€¬á€…á€¯á€±á€œá€¬á€€á€¹á€€  ( Persia á€•á€«á€›á€½á€¬á€¸) á€”á€¯á€­á€„á€¹á€„á€¶  Kowarzizmá€†á€¯á€­á€á€²á‚• á€»á€™á€­á€³á‚•á€€ á€žá€á€ºá¤á€¬á€•á€Šá€¬á€›á€½á€„á€¹á€á€…á€¹á€±á€šá€¬á€€á€¹á€€á€¯á€­ á€¡á€…á€¼á€²á€» á€•á€³á€»á€•á€®á€¸ á€±á€•ášá€±á€•á€«á€€á€¹á€œá€¬á€á€²á‚• á€”á€¬á€™á€Šá€¹á€•á€«á‹á€žá€°á€€á€±á€á€¬á‚• - alKhowarizmiá€†á€¯á€­á€á€²á‚•á€žá€á€ºá¤á€¬á€•á€Šá€¬á€›á€½á€„á€¹á€•á€«á€•á€²á‹á€žá€°á€€  á€’á€žáá€™á€€á€­á€”á€¹á€¸á€±á€á€¼á€žá€¯á€¶á€¸á€»á€•á€®á€¸ á€‚á€á€”á€¹á€¸ á€žá€á€ºá¤á€¬á€á€¼á€€á€¹á€á€²á‚•á€¡á€á€« á€œá€¯á€­á€€á€¹á€”á€¬á€›á€™á€²á‚• á€…á€Šá€¹á€¸á€€á€™á€¹á€¸á€±á€á€¼á€±á€–á€¬á€¹á€‘á€¯á€á€¹á€á€²á‚•á€•á€«á€á€šá€¹á‹á€žá€°á€±á€–á€¬á€¹á€‘á€¯á€á€¹á€á€²á‚•á€á€²á‚•á€”á€Šá€¹á€¸á€œá€™á€¹á€¸á€™á€­á€¯á‚• á€žá€°á‚•á€”á€¬á€™á€Šá€¹ al Khowarizmi á€†á€¯á€­á€»á€•á€®á€¸á€±á€•á€¸á€á€²á‚•á€•á€«á€á€šá€¹á‹á€±á€”á€¬á€€á€¹á€±á€á€¬á‚• Latin á€±á€á€¼á€žá€°á‚•á€”á€Šá€¹á€¸á€œá€™á€¹á€¸á€€á€¯á€­ á€šá€°á€žá€¯á€¶á€¸á€»á€•á€®á€¸  Latin á€˜á€¬á€žá€¬á€…á€€á€¬á€¸á€”á€²á‚• á€…á€¬á€œá€¯á€¶á€¸á€±á€•á€«á€„á€¹á€¸ á€á€²á‚•á€¡á€á€«  algorismá€†á€¯á€­á€»á€•á€®á€¸á€»á€–á€…á€¹á€œá€¬á€•á€«á€á€šá€¹á‹á€±á€”á€¬á€€á€¹á€•á€¯á€­á€„á€¹á€¸ ááˆ á€›á€¬á€…á€¯á€±á€›á€¬á€€á€¹á€á€²á‚• á€¡á€á€«á€™á€½á€¬  algorithmá€†á€¯á€­á€»á€•á€®á€¸ á€±á€»á€•á€¬á€„á€¹á€¸á€œá€²á€žá€¼á€¬á€¸á€•á€«á€á€šá€¹á‹\ná€’á€«á€±á¾á€€á€¬á€„á€¹á‚•  algorithmá€†á€¯á€­á€á€¬ á€œá€°á€”á€¬á€™á€Šá€¹á€€á€±á€” á€†á€„á€¹á€¸á€žá€€á€¹á€œá€¬á€á€¬á€™á€¯á€­á‚•  defnitioná€–á€¼á€„á€¹á‚•á€†á€¯á€­á€›á€á€€á€¹á€±á€”á€á€¬á€•á€«á‹ Algorithmá€†á€¯á€­á€á€¬ á€»á€•á€žáá€”á€¬á€á€…á€¹á€á€¯á€€á€¯á€­á€±á€»á€–á€›á€½á€„á€¹á€¸á€á€²á‚•á€¡á€á€« á€¡á€²á‚•á€’á€®á€»á€•á€žáá€”á€¬á€€á€¯á€­ á€±á€»á€–á€›á€½á€„á€¹á€¸á€›á€™á€²á‚• á€”á€Šá€¹á€¸á€œá€™á€¹á€¸ á€”á€²á‚• á€±á€»á€–á€›á€½á€„á€¸á€¹á€•á€¯á€¶á€¡á€†á€„á€¹á‚•á€†á€„á€¹á‚•á€€á€¯á€­ á€±á€–á€¬á€¹ á€‘á€¯á€á€¹á€±á€•á€¸á€›á€á€¬á€œá€¯á€­á‚•á€±á€»á€•á€¬á€á€²á‚•á€•á€«á€á€šá€¹á‹ á€’á€«á€±á¾á€€á€¬á€„á€¹á‚•  Algorithmá€†á€¯á€­á€á€¬    computerscience á€™á€½á€¬á€á€„á€¹á€™á€Ÿá€¯á€á€¹á€˜á€² á€±á€”á€›á€¬á€á€¯á€­á€„á€¹á€¸á€™á€¬á€½ á€›á€½á€­á€•á€«á€á€šá€¹á‹\ná€¥á€•á€™á€¬ á‹ á‹ á€¡á€žá€€á€¹á€›á€½á€„á€¹á€–á€¯á€­á‚• á€¡á€žá€€á€¹á€›á€½á€´á€±á€”á€›á€á€¬á€€á€œá€Šá€¹á€¸  algorithmá€•á€²á‹á€…á€¬á€žá€„á€¹á€–á€¯á€­á‚• á€¡á€­á€™á€¹á€€á€±á€” á€±á€€á€ºá€¬á€„á€¹á€¸á€€á€¯á€­á€žá€¼á€¬á€¸á€á€¬á€œá€Šá€¹á€¸ algorithm á€•á€²á‹á€¡á€œá€¯á€•á€¹á€œá€¯á€•á€¹á€–á€¯á€­á‚• á€¡á€­á€™á€¹á€€á€±á€” á€›á€¯á€¶á€¸á€€á€¯á€­á€žá€¼á€¬á€¸á€á€¬á€œá€Šá€¹á€¸  algorithmá€•á€«á€•á€²á‹\ná€˜á€¬á€œá€¯á€­á‚•á€†á€¯á€­ á€¡á€žá€€á€¹á€›á€½á€´á€á€¬á€€á€œá€Šá€¹á€¸ á€”á€Šá€¹á€¸á€…á€”á€…á€¹á€€á€ºá€–á€¯á€­á‚•á€œá€¯á€­á€•á€«á€á€šá€¹á‹á€žá€¬á€™á€”á€¹ á€¡á€á€ºá€­á€”á€¹á€±á€á€¼á€™á€½á€¬ á€¡á€žá€€á€¹á€›á€½á€´á€á€¬á€€ á€žá€°á‚•á€˜á€¬á€žá€° á€¡á€œá€¯á€­á€¡á€±á€œá€ºá€¬ á€€á€¹ á€»á€–á€…á€¹á€•á€ºá€€á€¹á€±á€”á€á€¬á€™á€¯á€­á‚• á€€á€ºá€±á€”á€¬á€¹á€á€¯á€­á‚• á€žá€á€­á€™á€‘á€¬á€¸á€™á€­á€•á€«á€˜á€°á€¸á‹á€±á€›á€„á€¯á€•á€¹á€±á€”á€á€²á‚•á€¡á€á€ºá€­á€”á€¹ á€™á€ºá€­á€³á€¸á€™á€½á€¬á€±á€á€¬á‚• á€¡á€žá€€á€¹á€›á€½á€´á€”á€Šá€¹á€¸ á€…á€”á€…á€¹ á€¡á€žá€€á€¹á€±á€¡á€¬á€„á€¹á‚•á€›á€™á€²á‚• á€”á€Šá€¹á€¸á€…á€”á€…á€¹á€œá€¯á€­á€œá€¬á€•á€«á€»á€•á‹á€®á€¡á€žá€€á€¹á€›á€½á€´á€•á€¯á€¶ á€¡á€žá€€á€¹á€±á€¡á€¬á€„á€¹á‚•á€•á€¯á€¶á€”á€Šá€¹á€¸á€…á€”á€…á€±á€¹á€á€¼á€€  algorithm á€±á€á€¼á€•á€«á€•á€²á‹\ná€±á€”á€¬á€€á€¹á€á€…á€¹á€á€¯ á€€á€ºá€±á€”á€¬á€¹á€á€¯á€­á‚• á€…á€¬á€žá€„á€¹á€–á€¯á€­á‚• á€¡á€­á€™á€¹á€€á€±á€” á€±á€€á€ºá€¬á€„á€¸á€¹á€€á€¯á€­ á€žá€¼á€¬á€¸á€™á€šá€¹á€†á€¯á€­á€•á€«á€±á€á€¬á‚•á‹á€•á€‘á€™ á€±á€™á€¸á€á€¼á€”á€¹á€¸á€€ á€€á€ºá€±á€”á€¬á€¹á€á€­á€¯á‚• á€±á€€á€ºá€¬á€„á€¹á€¸á€€á€¯á€­ á€œá€™á€¹á€¸á€± á€œá€½á€ºá€¬á€€á€¹á€žá€¼á€¬á€¸á€™á€½á€¬á€œá€¬á€¸á‹á€€á€¬á€¸á€”á€²á‚•á€žá€¼á€¬á€¸á€™á€½á€¬á€œá€¬á€¸ á€†á€¯á€­á€á€²á‚•á€±á€™á€¸á€á€¼á€”á€¹á€¸á€•á€«á‹á€œá€™á€¹á€¸á€±á€œá€½á€ºá€¬á€€á€¹á€žá€¼á€¬á€¸á€™á€šá€¹á€†á€¯á€­á€›á€„á€¹  á€”á€®á€¸á€žá€œá€¬á€¸ á€±á€á€¸á€žá€œá€¬á€¸ á€†á€¯á€­á€á€¬á€€á‚ á€á€¯á€±á€»á€™á€¬ á€€á€¹á€±á€™á€¸á€á€¼á€”á€¹á€¸á€•á€«á‹á€±á€á€¸á€á€šá€¹á€†á€¯á€­á€›á€„á€¹ á€€á€¬á€¸á€”á€²á‚•á€žá€¼á€¬á€¸á€á€²á‚•á€¡á€á€« á€á€…á€¹á€†á€„á€¹á‚•á€‘á€²á€±á€›á€¬á€€á€¹á€žá€œá€¬á€¸ á€†á€¯á€­á€á€¬á€€ áƒ á€á€¯á€±á€»á€™á€¬á€€á€¹ á€±á€™á€¸á€á€¼á€”á€¹á€¸á€•á€«á‹á€˜á€šá€¹á€”á€¶á€•á€«á€á€¹á€±á€á€¼á€…á€®á€¸ á€›á€™á€œá€² á€†á€¯á€­á€á€¬á€€ á„ á€á€¯á€±á€»á€™á€¬á€€á€¹á€±á€™á€¸á€á€¼á€”á€¹á€¸á€•á€«á‹á€˜á€šá€¹á€™á€½á€á€¹á€á€¯á€­á€„á€¹á€™á€½á€¬á€†á€„á€¹á€¸á€›á€™á€œá€² / á€˜á€šá€¹á€™á€½á€á€¹á€á€­á€¯á€„á€¹á€‘á€­ á€±á€œá€½á€ºá€¬á€€á€¹á€›á€™á€œá€² á€†á€¯á€­á€á€¬á€€ á… á€á€¯á€±á€»á€™á€¬á€€á€¹á€±á€™á€¸ á€á€¼á€”á€¹á€¸á€•á€«á€•á€²á‹\ná€’á€®á€±á€™á€¸á€á€¼á€”á€¹á€¸á€±á€á€¼á€€á€¯á€­ á€±á€»á€–á€œá€¯á€­á€€á€¹á€›á€„á€¹ á€€á€ºá€±á€”á€¬á€¹á€á€¯á€­á‚•  algorithmá€¡á€›á€±á€€á€ºá€¬á€„á€¹á€¸á€±á€›á€¬á€€á€¹á€•á€«á€»á€•á€®á‹\ná€€á€¬á€¸á€”á€²á‚•á€žá€¼á€¬á€¸á€™á€šá€¹ á‚ á€†á€„á€¹á‚•á€…á€®á€¸á€›á€™á€šá€¹  á€”á€¶á€•á€«á€á€¹ á á€”á€²á‚• á‚ á€€á€¯á€­á€…á€®á€¸á€•á€« á á€€á€¯á€­á€…á€®á€¸á€»á€•á€®á€¸ á‚ á€™á€½á€á€¹á€á€¯á€­á€„á€¹á€™á€½á€¬á€†á€„á€¹á€¸á€•á€« á‚ á€€á€¯á€­ á€…á€®á€¸á€»á€•á€®á€¸ áƒ á€™á€½á€á€¹á€á€¯á€­á€„á€¹á€™á€½á€¬ á€†á€„á€¹á€¸á€•á€«á‹\ná€±á€”á€¬á€€á€¹á€†á€¯á€¶á€¸ áƒ á€™á€½á€á€¹á€á€¯á€­á€„á€¹á€†á€¯á€­á€á€¬á€€á€±á€á€¬á‚• á€±á€€á€ºá€¬á€„á€¹á€¸á€±á€›á€¬á€€á€¹á€žá€¼á€¬á€¸á€á€²á‚• á€¡á€†á€„á€¹á‚•á€±á€•á€«á‚•  algorithmá€€á€œá€Šá€¹á€¸ á€¡á€²á‚•á€™á€½á€¬ á€¡á€†á€¯á€¶á€¸á€žá€á€¹á€žá€¼á€¬á€¸á€á€šá€¹á‹ á€’á€®á€±á€á€¬á‚• á€±á€€á€ºá€¬á€„á€¹á€¸á€€á€¯á€­ á€€á€¬á€¸á€”á€²á‚• á€žá€¼á€¬á€¸á€›á€™á€²á‚• á€¡á€†á€„á€¹á‚•á€±á€á€¼ á€±á€›á€œá€¯á€­á€€á€¹á€™á€šá€¹á€†á€¯á€­á€›á€„á€¹ (á) á€€á€¬á€¸á€”á€²á‚•á€žá€¼á€¬á€¸á€™á€šá€¹ (á‚) á‚á€†á€„á€¹á‚•á€…á€®á€¸á€›á€™á€šá€¹\n(áƒ) á€”á€¶á€•á€«á€á€¹ á á€”á€²á‚• á‚ á€€á€¯á€­á€…á€®á€¸á€•á€« (á„) á á€€á€¯á€­á€…á€®á€¸á€»á€•á€®á€¸ á‚ á€™á€½á€á€¹á€á€¯á€­á€„á€¹á€™á€½á€¬á€†á€„á€¹á€¸á€•á€« (á…) á‚ á€€á€¯á€­á€…á€®á€¸á€»á€•á€®á€¸ áƒ á€™á€½á€á€¹á€á€¯á€­á€„á€¹á€™á€½á€¬á€†á€„á€¹á€¸á€•á€« á€…á€¯á€…á€¯á€±á€•á€«á€„á€¹á€¸ á… á€†á€„á€¹á‚”á€›á€½á€­á€™á€šá€¹á‹á€’á€®á€œá€¯á€­ á€¡á€†á€„á€¹á‚•á€œá€¯á€­á€€á€¹ á€¡á€†á€„á€¹á‚•á€œá€¯á€­á€€á€¹ á€á€…á€¹á€†á€„á€¹á‚•á€á€ºá€„á€¹á€¸á€€á€¯á€­  algorithmá€™á€½á€¬  stepá€œá€¯á€­á‚•á€±á€ášá€á€šá€¹á‹á€’á€® step á€±á€á€¼ á€¡á€€á€¯ á€”á€¹á€œá€¶á€¯á€¸ á€±á€•á€«á€„á€¹á€¸á€œá€­á€¯á€€á€¹á€›á€„á€¹  algorithm á€á€…á€¹á€á€¯á€»á€–á€…á€¹á€œá€¬á€•á€«á€á€šá€¹á‹step á€±á€á€¼á€™á€ºá€¬á€¸á€±á€œ  algorithm á€€ complex á€»á€–á€…á€¹á€±á€œ á€›á‚ˆá€•á€¹á€±á€‘á€¼á€¸á€±á€œá€± á€•á€«á€·á‹\ná€¡á€±á€•ášá€€ á€¡á€†á€„á€¹á€· á… á€†á€„á€¹á€·á€€á€±á€á€¬á€· á€±á€™á€¸á€á€¼á€”á€¹á€¸ á… á€á€¯á€€á€±á€”á€‘á€¼á€€á€¹á€œá€¬á€á€²á‚• á€¡á€±á€»á€–á€±á€á€¼á€•á€«á‹\ná€¡á€²á‚• á á€€á€±á€” á… á€¡á€‘á€­ á€±á€™á€¸á€á€¼á€”á€¹á€¸ á… á€á€¯á€±á€•á€«á€„á€¹á€¸á€œá€­á€¯á€€á€¹á€›á€„á€¹á€œá€Šá€¹á€¸  algorithmá€á€…á€¹á€á€¯á€•á€«á€•á€²á‹\ná€¡á€±á€»á€– á… á€á€¯á€€á€±á€á€¬á€·  algorithm á€›á€²á‚•  stepá€á€…á€¹á€á€¯á€á€ºá€„á€¹á€¸á€…á€®á€€ output á€±á€á€¼á€±á€•á€«á€·á‹á€’á€®á€™á€½á€¬  algorithm á€›á€²á‚•  inputá€€ á€¡á€­á€™á€¹á€€á€±á€” á€±á€€á€ºá€¬á€„á€¹á€¸ á€žá€¼á€¬á€¸á€™á€šá€¹ á€†á€­á€¯á€á€²á‚•  inputá€•á€«á‹á€±á€€á€ºá€¬á€„á€¹á€¸á€žá€¼á€¬á€¸á€›á€™á€²á‚•á€¡á€†á€„á€¹á€·á€±á€á€¼á€€á€­á€¯  stepá€á€…á€¹á€á€¯á€á€ºá€„á€¹á€¸á€…á€®á€€ á€á€¼á€€á€¹á€‘á€¯á€á€¹á€±á€•á€¸á€œá€­á€¯á€€á€¹á€á€¬á€€ á€¡á€²á‚•  stepá€á€…á€¹á€á€¯á€á€ºá€„á€¹á€¸ á€…á€®á€›á€²á‚•  outputá€•á€«á‹\n stepá€á€…á€¹á€á€¯á€›á€²á‚•  outputá€€ á€±á€”á€¬á€€á€¹  stepá€á€…á€¹á€á€¯á€›á€²á‚• input á€»á€–á€…á€±á€¹á€”á€á€¬á€€á€­á€¯   computerscienceá€™á€½á€¬ - pipelineá€œá€­á€¯á‚•á€±á€ášá€•á€«á€á€šá€¹á‹\ná€•á€­á€¯á€»á€•á€®á€¸á€±á€á€¬á€· input á€±á€á€¼ output á€±á€á€¼á€»á€™á€„á€¹á€žá€¬á€±á€¡á€¬á€„á€¹ á€€á€ºá€±á€”á€¬á€¹á€á€­á€¯á‚•   algebricalmathematicá€€   quadraticfunctioná€”á€²á‚” á€á€¼á€€á€¹á€» á€€á€Šá€¹á€·á€›á€±á€¡á€¬á€„á‹á€¹  Quadraticfunctioná€†á€­á€¯á€á€¬á€€á€±á€á€¬á€· á‚ á€‘á€•á€¹á€€á€­á€”á€¹á€¸á€Šá€®á€™á€½á€ºá€»á€á€„á€¹á€¸á€€á€­á€¯á€±á€»á€•á€¬á€á€¬á€•á€«á‹\n( ) = 2 2+ +1. ( ) = 22   = 3 fx x^ x Prooffx whenx á€†á€­á€¯á€•á€«á€±á€á€¬á€·á‹\ná€’á€®á€™á€½á€¬   ffunctioná€›á€²á‚•  ( ) domain input á€€  xá€•á€«á‹ ( ) range output á€€ 2 2+ +1 x^ x á€•á€«á‹á€’á€®á€±á€á€¬á€·  :  -> 2 2+ +1 f x x^ x á€±á€•á€«á€·á‹\n xá€á€”á€¹á€–á€­á€¯á€¸ 3 á€»á€–á€…á€¹á€á€²á‚•á€¡á€á€« á€€á€ºá€±á€”á€¬á€¹á€á€­á€¯á‚•á€€ ( ) = 22 fx á€»á€–á€…á€¹á€±á€»á€€á€¬á€„á€¹á€¸ á€žá€€á€¹á€±á€žá€»á€•á€›á€•á€«á€™á€šá€¹á‹\n( ) = 2(3) 2+3+1 fx ^       = 2(9)+3+1       = 18+3+1 ( ) = 22 fx\n :            .     Def Algorithm is a sequence of steps it lead to our desired answerA sequence of steps is called .algorithm\ná€’á€®á€•á€¯á€…á¦á€¬á€™á€½á€¬ ( ) = 22 fx á€»á€–á€…á€¹á€–á€­á€¯á‚•á€¡á€á€¼á€€á€¹ step á€±á€á€¼á€á€†á€„á€¹á€·á€»á€•á€®á€¸ á€á€†á€„á€¹á€· á€á€¼á€€á€¹á€»á€•á€®á€¸á€žá€¼á€¬á€¸ á€á€²á‚•á€¡á€á€«á€™á€½á€¬ á€±á€”á€¬á€€á€¹á€†á€¶á€¯á€¸ á€€á€ºá€±á€”á€¬á€¹á€á€­á€¯á‚•á€œá€­á€¯á€á€ºá€„á€¹á€á€²á‚• á€¡á€±á€»á€–  desiredanswerá€›á€™á€œá€¬á€˜á€°á€¸á€œá€¬á€¸á‹á€’á€«á€œá€Šá€¹á€¸  algorithmá€á€…á€¹á€á€¯á€•á€«á€•á€²á‹á€¡á€á€¯á€±á€œá€¬á€€á€¹á€†á€­á€¯  algorithmá€€á€­á€¯á€”á€¬á€¸á€œá€Šá€¹á€žá€¼á€¬á€¸á€±á€œá€¬á€€á€¹á€•á€«á€»á€•á€®á‹\n ', 0, 'Data Science', '2019-08-18');

-- --------------------------------------------------------

--
-- Table structure for table `utproject`
--

CREATE TABLE `utproject` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `projectName` varchar(225) NOT NULL,
  `projectDescription` text NOT NULL,
  `deadline` date NOT NULL,
  `projectStatus` int(1) NOT NULL,
  `projectPrograss` varchar(225) NOT NULL,
  `modifiedTime` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `utpsubtask`
--

CREATE TABLE `utpsubtask` (
  `id` int(10) NOT NULL,
  `projectid` int(10) NOT NULL,
  `taskid` int(10) NOT NULL,
  `subtask` text NOT NULL,
  `subtaskStatus` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `utptask`
--

CREATE TABLE `utptask` (
  `id` int(10) NOT NULL,
  `projectid` int(10) NOT NULL,
  `ptask` text NOT NULL,
  `ptaskStatus` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `utptask`
--

INSERT INTO `utptask` (`id`, `projectid`, `ptask`, `ptaskStatus`) VALUES
(111, 0, '', 0),
(112, 0, '', 0),
(113, 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `utstar`
--

CREATE TABLE `utstar` (
  `id` int(10) NOT NULL,
  `postId` int(10) NOT NULL,
  `userId` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `utstar`
--

INSERT INTO `utstar` (`id`, `postId`, `userId`) VALUES
(70, 67, 42),
(71, 70, 44),
(72, 70, 42),
(73, 71, 42),
(74, 71, 44),
(75, 72, 42);

-- --------------------------------------------------------

--
-- Table structure for table `utsubjects`
--

CREATE TABLE `utsubjects` (
  `id` int(10) NOT NULL,
  `examid` int(10) NOT NULL,
  `utsubject` varchar(225) NOT NULL,
  `subjectDate` varchar(225) NOT NULL,
  `fromTime` varchar(225) NOT NULL,
  `toTime` varchar(225) NOT NULL,
  `roomNo` varchar(10) NOT NULL,
  `chairNo` varchar(10) NOT NULL,
  `minMark` int(10) NOT NULL,
  `getMark` int(10) NOT NULL
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
  `utColor` varchar(225) NOT NULL,
  `taskStatus` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `utteachers`
--

CREATE TABLE `utteachers` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `teacherName` varchar(225) NOT NULL,
  `teacherSubject` varchar(225) NOT NULL,
  `teacherPhone` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `school` text,
  `profilePicture` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `utusers`
--

INSERT INTO `utusers` (`id`, `firstName`, `lastName`, `Email`, `pass`, `passions`, `school`, `profilePicture`) VALUES
(42, 'JR', 'Alli', 'jralli@gmail.com', 'f46thmAIBTN.6', 'a:5:{i:0;s:10:\"Programmin\";i:1;s:8:\"Physics \";i:2;s:10:\"Management\";i:3;s:11:\"Psychology \";i:4;s:5:\"Music\";}', '', '130848pmFB_IMG_1500812895922.jpg'),
(44, 'Re', 'Core', 'recore@gmail.com', '3d7wTq2zMuXOg', 'a:8:{i:0;s:12:\"Data Science\";i:1;s:5:\"Space\";i:2;s:16:\"Game Development\";i:3;s:5:\"Music\";i:4;s:10:\"Life Style\";i:5;s:16:\"Computer Science\";i:6;s:11:\"Psychology \";i:7;s:10:\"Programmin\";}', '', '140856pmFB_IMG_1499319485202.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `saved`
--
ALTER TABLE `saved`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utclassmate`
--
ALTER TABLE `utclassmate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utclasssubjects`
--
ALTER TABLE `utclasssubjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utcolors`
--
ALTER TABLE `utcolors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utcomment`
--
ALTER TABLE `utcomment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utevent`
--
ALTER TABLE `utevent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utexam`
--
ALTER TABLE `utexam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utfeedback`
--
ALTER TABLE `utfeedback`
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
-- Indexes for table `utproject`
--
ALTER TABLE `utproject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utpsubtask`
--
ALTER TABLE `utpsubtask`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utptask`
--
ALTER TABLE `utptask`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utstar`
--
ALTER TABLE `utstar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utsubjects`
--
ALTER TABLE `utsubjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uttask`
--
ALTER TABLE `uttask`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utteachers`
--
ALTER TABLE `utteachers`
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
-- AUTO_INCREMENT for table `saved`
--
ALTER TABLE `saved`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `utclassmate`
--
ALTER TABLE `utclassmate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `utclasssubjects`
--
ALTER TABLE `utclasssubjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `utcolors`
--
ALTER TABLE `utcolors`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `utcomment`
--
ALTER TABLE `utcomment`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `utevent`
--
ALTER TABLE `utevent`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `utexam`
--
ALTER TABLE `utexam`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `utfeedback`
--
ALTER TABLE `utfeedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `utpassions`
--
ALTER TABLE `utpassions`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `utposts`
--
ALTER TABLE `utposts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `utproject`
--
ALTER TABLE `utproject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `utpsubtask`
--
ALTER TABLE `utpsubtask`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `utptask`
--
ALTER TABLE `utptask`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `utstar`
--
ALTER TABLE `utstar`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `utsubjects`
--
ALTER TABLE `utsubjects`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `uttask`
--
ALTER TABLE `uttask`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `utteachers`
--
ALTER TABLE `utteachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `utusers`
--
ALTER TABLE `utusers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
