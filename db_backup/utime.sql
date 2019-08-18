-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2019 at 11:25 PM
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

--
-- Dumping data for table `saved`
--

INSERT INTO `saved` (`id`, `userid`, `postid`) VALUES
(4, 37, 57),
(8, 30, 60),
(9, 37, 68),
(10, 37, 69),
(11, 30, 59),
(12, 40, 60),
(13, 40, 59),
(14, 40, 57),
(16, 40, 55);

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

--
-- Dumping data for table `utclassmate`
--

INSERT INTO `utclassmate` (`id`, `userid`, `classmateName`, `classmatePhone`, `classmateAddress`) VALUES
(1, 40, 'Aung Kaung Myat Paing', '09782934722', '221-B, Baker street, Yangon'),
(2, 40, 'Hla Myo mann', '09783252542', '43/3, 43th street, yangon'),
(3, 40, 'Nobody', '0928374819', '192.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `utclasssubjects`
--

CREATE TABLE `utclasssubjects` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `classSubject` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `utclasssubjects`
--

INSERT INTO `utclasssubjects` (`id`, `userid`, `classSubject`) VALUES
(1, 40, 'Programming'),
(2, 40, 'Networking '),
(3, 40, 'Physics'),
(4, 40, 'Something Else');

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
(1, 56, 35, 'Wow Cool Post Thanks for sharing ', '2019-08-10'),
(2, 57, 35, 'comment', '2019-08-10'),
(3, 57, 35, 'comment', '2019-08-10'),
(4, 57, 35, 'Comemet again', '2019-08-10'),
(5, 56, 35, 'Wow What did i done', '2019-08-10'),
(6, 60, 36, 'Wow cool post thanks for sharing ðŸ˜ðŸ˜', '2019-08-10'),
(7, 60, 39, 'Wow', '2019-08-10'),
(8, 69, 37, '', '2019-08-10'),
(9, 69, 37, 'apparent that,\nand .. I\'m sorry for every thing', '2019-08-10'),
(10, 59, 40, 'What\'s a nice songðŸŽ¼ðŸ’šâ¤', '2019-08-13'),
(11, 66, 40, 'Wow Cool Post Thanks for Sharing :)', '2019-08-17');

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
-- Table structure for table `utexam`
--

CREATE TABLE `utexam` (
  `id` int(10) NOT NULL,
  `userid` int(10) NOT NULL,
  `examName` varchar(225) NOT NULL,
  `examDate` varchar(225) NOT NULL,
  `examStatus` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `utexam`
--

INSERT INTO `utexam` (`id`, `userid`, `examName`, `examDate`, `examStatus`) VALUES
(1, 40, 'Final Exam', '2019-08-29', 2),
(8, 40, 'Next Exam', '2019-08-30', 0);

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
  `category` varchar(225) NOT NULL,
  `utdate` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `utposts`
--

INSERT INTO `utposts` (`id`, `userid`, `title`, `utdescription`, `starcount`, `category`, `utdate`) VALUES
(41, 33, 'bj,b', 'huu', 0, 'Programming', '2019-08-11'),
(42, 33, 'asdfasdfasdf', 'dfgasdfg', 0, 'Physic', '2019-08-11'),
(43, 33, 'gsdfgdsfg', 'dfgdsfgdsf', 0, 'Physic', '2019-08-11'),
(44, 33, 'Welcom from', 'uadfklj', 0, 'Physic', '2019-08-11'),
(55, 33, 'That Girl Lyrics', 'There\'s a girl but I let her get away\nIt\'s all my fault \'cause pride got in the way\nAnd I\'d be lying if I said I was ok\nAbout that girl the one I let get away\nI keep saying no\nThis can\'t be the way we\'re supposed to be\nI keep saying no\nThere\'s gotta be a way to get you close to me\nNow I know you gotta\nSpeak up if you want somebody\nCan\'t let him get away, oh no\nYou don\'t wanna end up sorry\nThe way that I\'m feeling everyday\nNo no no no\nThere\'s no hope for the broken heart\nNo no no no\nThere\'s no hope for the broken\nThere\'s a girl but I let her get away\nIt\'s my fault \'cause I said I needed space\nI\'ve been torturing myself night and day\nAbout that girl, the one I let get away\nI keep saying no\nThis can\'t be the way we\'re supposed to be\nI keep saying no\nThere\'s gottaâ€¦', 0, 'Design', '2019-08-11'),
(56, 33, 'Old Tow Road Lyrics', 'Yeah, I\'m gonna take my horse to the old town road\nI\'m gonna ride \'til I can\'t no more\nI\'m gonna take my horse to the old town road\nI\'m gonna ride \'til I can\'t no more (Kio, Kio)\nI got the horses in the back\nHorse tack is attached\nHat is matte black\nGot the boots that\'s black to match\nRidin\' on a horse, ha\nYou can whip your Porsche\nI been in the valley\nYou ain\'t been up off that porch, now\nCan\'t nobody tell me nothin\'\nYou can\'t tell me nothin\'\nCan\'t nobody tell me nothin\'\nYou can\'t tell me nothin\'\nRidin\' on a tractor\nLean all in my bladder\nCheated on my baby\nYou can go and ask her\nMy life is a movie\nBull ridin\' and boobies\nCowboy hat from Gucci\nWrangler onâ€¦', 0, 'Physic', '2019-08-11'),
(57, 35, 'blur Blur', '    Server: 127.0.0.1 via TCP/IP\r\n    Server type: MariaDB\r\n    Server connection: SSL is not being used Documentation\r\n    Server version: 10.1.38-MariaDB - mariadb.org binary distribution\r\n    Protocol version: 10\r\n    User: root@localhost\r\n    Server charset: UTF-8 Unicode (utf8)\r\n', 0, 'Web Security', '2019-08-11'),
(59, 37, 'Dangerously Lyrics', 'This is gonna hurt but I blame myself first\n\'Cause I ignored the truth\nDrunk off that love, my head up\nThere\'s no forgetting you\nYou\'ve awoken me, but you\'re choking me\nI was so obsessed\nGave you all of me, and now honestly, I got nothing left\nI loved you dangerously\nMore than the air that I breathe\nKnew we would crash at the speed that we were going\nDidn\'t care if the explosion ruined me\nBaby, I loved you dangerously\nMmmm, mmmm\nI loved you dangerously\nUsually, I hold the power with both my hands\nTied behind my back\nLook at how things change, \'cause now you\'re the train\nAnd I\'m tied to the track\nYou\'ve awoken me, but you\'re choking me\nI was so obsessed\nGave you all of me, and now honestly, I got nothing left\n\'Cause I loved you dangerously\nMore than the air that I breathe\nKnew we would crash at the speed that we were going\nDidn\'t care if the explosion ruined me\nBaby, I loved you dangerously\nYou took me down, down, down, down\nAnd kissed my lips quick goodbye\nI see it now, now, now, now\nIt was a matter of time\nYou know I know, there\'s only one place this could lead\nBut you are the fire, I\'m gasoline\nI love you, I love you, I love you\nI loved you dangerously\nOoh, more than the air that I breathe\nOh now, knew we would crash at the speed that we were going\nDidn\'t care if the explosion ruined me\nOh, oh baby, I loved you dangerously\nMmmm, mmmm\nOoh, I loved you dangerously\nOoh ooh, I loved you dangerously', 0, 'Game Development', '2019-08-11'),
(60, 37, 'How to be a superhero', 'When I was seven years old, I got the greatest Christmas gift ever. As I tore away the crisp, Santa-Claus-decorated paper, it revealed the most perfect present: a Batman costume, complete with belt and shoes. I ran, I jumped, I rolled, I climbed, I hid and I saved everyone in the house from all the dangers that the holiday season could bring. It was one of the best days of my life.\n\nEver since that day, Iâ€™ve been fixated on comic books and superheroes, their place as Modern Mythology, and all the ideals they bring: saving lives, fighting crime and making the world a better place.\n\nAs an adult, I realize I actually have the power to be a superhero. I may not be able to fly, grow claws or regenerate my limbs â€” but I can make a difference to someoneâ€™s life.\n\nWe all have the power to be a superhero to someone, even if we donâ€™t have the spandex to go with it. Here are five ways you can be a real life superhero:', 0, 'Space', '2019-08-11'),
(62, 40, 'All Of Me', 'What would I do without your smart mouth\nDrawing me in, and you kicking me out\nGot my head spinning, no kidding, I can\'t pin you down\nWhat\'s going on in that beautiful mind\nI\'m on your magical mystery ride\nAnd I\'m so dizzy, don\'t know what hit me, but I\'ll be alright\nMy head\'s under water\nBut I\'m breathing fine\nYou\'re crazy and I\'m out of my mind\n\'Cause all of me\nLoves all of you\nLove your curves and all your edges\nAll your perfect imperfections\nGive your all to me\nI\'ll give my all to you\nYou\'re my end and my beginning\nEven when I lose I\'m winning\n\'Cause I give you all, all of me\nAnd you give me all, all of you\nHow many times do I have to tell you\nEven when you\'re crying you\'re beautiful too\nThe world is beating you down, I\'m around through every move\nYou\'re my downfall, you\'re my muse\nMy worst distraction, my rhythm and blues\nI can\'t stop singing, it\'s ringing, in my head for you\nMy head\'s under water\nBut I\'m breathing fine\nYou\'re crazy and I\'m out of my mind\n\'Cause all of me\nLoves all of you\nLove your curves and all your edges\nAll your perfect imperfections\nGive your all to me\nI\'ll give my all to you\nYou\'re my end and my beginning\nEven when I lose I\'m winning\n\'Cause I give you all of me\nAnd you give me all, all of you\nGive me all of you\nCards on the table, we\'re both showing hearts\nRisking it all, though it\'s hard\n\'Cause all of me\nLoves all of you\nLove your curves and all your edges\nAll your perfect imperfections\nGive your all to me\nI\'ll give my all to you\nYou\'re my end and my beginning\nEven when I lose I\'m winning\n\'Cause I give you all of me\nAnd you give me all of you\nI give you all, all of me\nAnd you give me all, all of you\nSource: LyricFind', 0, 'Programming', '2019-08-13'),
(66, 23, 'What is Algorithem', 'Algorithm is a fnite sequence of precise instructions for performing a computation or for solving a .problem\n(     ) RosenDiscreteMathematicsandItsApplications\n Algorithm á€†á€¯á€­á€á€²á‚• á€…á€€á€¬á€¸á€€á€¯á€­  defnition á€–á€¼á€„á€¹á‚•á€†á€¯á€­á€á€ºá€€á€¹á€¡á€™á€ºá€­á€³á€¸á€¡á€™á€ºá€­á€³á€¸á€›á€½á€­á€•á€«á€á€šá€¹á‹á€¡á€€á€¯á€”á€¹á€œá€¯á€¶á€¸á€œá€€á€¹á€á€¶á€‘á€¬á€¸á€á€²á‚• á€–á€¼á€„á€¹á‚•á€†á€¯á€­á€á€ºá€€á€¹á€€á€±á€á€¬á‚• algorithm á€†á€¯á€­á€á€¬ á€»á€•á€žáá€”á€¬á€á€…á€¹á€á€¯á€€á€¯á€­á€±á€»á€–á€›á€½á€„á€¹á€¸á€á€²á‚•á€¡á€á€« á€¡á€²á‚•á€’á€®á€»á€•á€žáá€”á€¬á€€á€¯á€­ á€±á€»á€–á€›á€½á€„á€¹á€¸á€›á€™á€²á‚• á€”á€Šá€¹á€¸á€œá€™á€¹á€¸ á€”á€²á‚• á€±á€»á€–á€›á€½á€„á€¹á€¸á€•á€¯á€¶á€¡á€†á€„á€¹á‚•á€¡á€†á€„á€¹á‚•á€€á€¯á€­ á€± á€–á€¬á€¹á€±á€†á€¬á€„á€¹á€±á€•á€¸á€›á€á€¬á€•á€«á€•á‹á€²\n Algorithm á€€ á€˜á€¬á€œá€¯á€­á‚•  defnition á€–á€¼á€„á€¹á‚•á€†á€¯á€­á€á€ºá€€á€¹á€¡á€™á€ºá€­á€³á€¸á€¡á€™á€ºá€­á€³á€¸á€›á€½á€­á€±á€”á€á€¬á€œá€Šá€¹á€¸á€†á€¯á€­á€±á€á€¬á‚•  algorithm á€†á€¯á€­á€á€²á‚• á€±á€á€«á€Ÿá€¬á€›á€Ÿá€¬ á€¡á€‚á¤á€œá€­ á€•á€¹á€±á€á€«á€Ÿá€¬á€›á€™á€Ÿá€¯á€á€¹á€•á€«á€˜á€°á€¸á‹á‰ á€›á€¬á€…á€¯á€±á€œá€¬á€€á€¹á€€  ( Persia á€•á€«á€›á€½á€¬á€¸) á€”á€¯á€­á€„á€¹á€„á€¶  Kowarzizmá€†á€¯á€­á€á€²á‚• á€»á€™á€­á€³á‚•á€€ á€žá€á€ºá¤á€¬á€•á€Šá€¬á€›á€½á€„á€¹á€á€…á€¹á€±á€šá€¬á€€á€¹á€€á€¯á€­ á€¡á€…á€¼á€²á€» á€•á€³á€»á€•á€®á€¸ á€±á€•ášá€±á€•á€«á€€á€¹á€œá€¬á€á€²á‚• á€”á€¬á€™á€Šá€¹á€•á€«á‹á€žá€°á€€á€±á€á€¬á‚• - alKhowarizmiá€†á€¯á€­á€á€²á‚•á€žá€á€ºá¤á€¬á€•á€Šá€¬á€›á€½á€„á€¹á€•á€«á€•á€²á‹á€žá€°á€€  á€’á€žáá€™á€€á€­á€”á€¹á€¸á€±á€á€¼á€žá€¯á€¶á€¸á€»á€•á€®á€¸ á€‚á€á€”á€¹á€¸ á€žá€á€ºá¤á€¬á€á€¼á€€á€¹á€á€²á‚•á€¡á€á€« á€œá€¯á€­á€€á€¹á€”á€¬á€›á€™á€²á‚• á€…á€Šá€¹á€¸á€€á€™á€¹á€¸á€±á€á€¼á€±á€–á€¬á€¹á€‘á€¯á€á€¹á€á€²á‚•á€•á€«á€á€šá€¹á‹á€žá€°á€±á€–á€¬á€¹á€‘á€¯á€á€¹á€á€²á‚•á€á€²á‚•á€”á€Šá€¹á€¸á€œá€™á€¹á€¸á€™á€­á€¯á‚• á€žá€°á‚•á€”á€¬á€™á€Šá€¹ al Khowarizmi á€†á€¯á€­á€»á€•á€®á€¸á€±á€•á€¸á€á€²á‚•á€•á€«á€á€šá€¹á‹á€±á€”á€¬á€€á€¹á€±á€á€¬á‚• Latin á€±á€á€¼á€žá€°á‚•á€”á€Šá€¹á€¸á€œá€™á€¹á€¸á€€á€¯á€­ á€šá€°á€žá€¯á€¶á€¸á€»á€•á€®á€¸  Latin á€˜á€¬á€žá€¬á€…á€€á€¬á€¸á€”á€²á‚• á€…á€¬á€œá€¯á€¶á€¸á€±á€•á€«á€„á€¹á€¸ á€á€²á‚•á€¡á€á€«  algorismá€†á€¯á€­á€»á€•á€®á€¸á€»á€–á€…á€¹á€œá€¬á€•á€«á€á€šá€¹á‹á€±á€”á€¬á€€á€¹á€•á€¯á€­á€„á€¹á€¸ ááˆ á€›á€¬á€…á€¯á€±á€›á€¬á€€á€¹á€á€²á‚• á€¡á€á€«á€™á€½á€¬  algorithmá€†á€¯á€­á€»á€•á€®á€¸ á€±á€»á€•á€¬á€„á€¹á€¸á€œá€²á€žá€¼á€¬á€¸á€•á€«á€á€šá€¹á‹\ná€’á€«á€±á¾á€€á€¬á€„á€¹á‚•  algorithmá€†á€¯á€­á€á€¬ á€œá€°á€”á€¬á€™á€Šá€¹á€€á€±á€” á€†á€„á€¹á€¸á€žá€€á€¹á€œá€¬á€á€¬á€™á€¯á€­á‚•  defnitioná€–á€¼á€„á€¹á‚•á€†á€¯á€­á€›á€á€€á€¹á€±á€”á€á€¬á€•á€«á‹ Algorithmá€†á€¯á€­á€á€¬ á€»á€•á€žáá€”á€¬á€á€…á€¹á€á€¯á€€á€¯á€­á€±á€»á€–á€›á€½á€„á€¹á€¸á€á€²á‚•á€¡á€á€« á€¡á€²á‚•á€’á€®á€»á€•á€žáá€”á€¬á€€á€¯á€­ á€±á€»á€–á€›á€½á€„á€¹á€¸á€›á€™á€²á‚• á€”á€Šá€¹á€¸á€œá€™á€¹á€¸ á€”á€²á‚• á€±á€»á€–á€›á€½á€„á€¸á€¹á€•á€¯á€¶á€¡á€†á€„á€¹á‚•á€†á€„á€¹á‚•á€€á€¯á€­ á€±á€–á€¬á€¹ á€‘á€¯á€á€¹á€±á€•á€¸á€›á€á€¬á€œá€¯á€­á‚•á€±á€»á€•á€¬á€á€²á‚•á€•á€«á€á€šá€¹á‹ á€’á€«á€±á¾á€€á€¬á€„á€¹á‚•  Algorithmá€†á€¯á€­á€á€¬    computerscience á€™á€½á€¬á€á€„á€¹á€™á€Ÿá€¯á€á€¹á€˜á€² á€±á€”á€›á€¬á€á€¯á€­á€„á€¹á€¸á€™á€¬á€½ á€›á€½á€­á€•á€«á€á€šá€¹á‹\ná€¥á€•á€™á€¬ á‹ á‹ á€¡á€žá€€á€¹á€›á€½á€„á€¹á€–á€¯á€­á‚• á€¡á€žá€€á€¹á€›á€½á€´á€±á€”á€›á€á€¬á€€á€œá€Šá€¹á€¸  algorithmá€•á€²á‹á€…á€¬á€žá€„á€¹á€–á€¯á€­á‚• á€¡á€­á€™á€¹á€€á€±á€” á€±á€€á€ºá€¬á€„á€¹á€¸á€€á€¯á€­á€žá€¼á€¬á€¸á€á€¬á€œá€Šá€¹á€¸ algorithm á€•á€²á‹á€¡á€œá€¯á€•á€¹á€œá€¯á€•á€¹á€–á€¯á€­á‚• á€¡á€­á€™á€¹á€€á€±á€” á€›á€¯á€¶á€¸á€€á€¯á€­á€žá€¼á€¬á€¸á€á€¬á€œá€Šá€¹á€¸  algorithmá€•á€«á€•á€²á‹\ná€˜á€¬á€œá€¯á€­á‚•á€†á€¯á€­ á€¡á€žá€€á€¹á€›á€½á€´á€á€¬á€€á€œá€Šá€¹á€¸ á€”á€Šá€¹á€¸á€…á€”á€…á€¹á€€á€ºá€–á€¯á€­á‚•á€œá€¯á€­á€•á€«á€á€šá€¹á‹á€žá€¬á€™á€”á€¹ á€¡á€á€ºá€­á€”á€¹á€±á€á€¼á€™á€½á€¬ á€¡á€žá€€á€¹á€›á€½á€´á€á€¬á€€ á€žá€°á‚•á€˜á€¬á€žá€° á€¡á€œá€¯á€­á€¡á€±á€œá€ºá€¬ á€€á€¹ á€»á€–á€…á€¹á€•á€ºá€€á€¹á€±á€”á€á€¬á€™á€¯á€­á‚• á€€á€ºá€±á€”á€¬á€¹á€á€¯á€­á‚• á€žá€á€­á€™á€‘á€¬á€¸á€™á€­á€•á€«á€˜á€°á€¸á‹á€±á€›á€„á€¯á€•á€¹á€±á€”á€á€²á‚•á€¡á€á€ºá€­á€”á€¹ á€™á€ºá€­á€³á€¸á€™á€½á€¬á€±á€á€¬á‚• á€¡á€žá€€á€¹á€›á€½á€´á€”á€Šá€¹á€¸ á€…á€”á€…á€¹ á€¡á€žá€€á€¹á€±á€¡á€¬á€„á€¹á‚•á€›á€™á€²á‚• á€”á€Šá€¹á€¸á€…á€”á€…á€¹á€œá€¯á€­á€œá€¬á€•á€«á€»á€•á‹á€®á€¡á€žá€€á€¹á€›á€½á€´á€•á€¯á€¶ á€¡á€žá€€á€¹á€±á€¡á€¬á€„á€¹á‚•á€•á€¯á€¶á€”á€Šá€¹á€¸á€…á€”á€…á€±á€¹á€á€¼á€€  algorithm á€±á€á€¼á€•á€«á€•á€²á‹\ná€±á€”á€¬á€€á€¹á€á€…á€¹á€á€¯ á€€á€ºá€±á€”á€¬á€¹á€á€¯á€­á‚• á€…á€¬á€žá€„á€¹á€–á€¯á€­á‚• á€¡á€­á€™á€¹á€€á€±á€” á€±á€€á€ºá€¬á€„á€¸á€¹á€€á€¯á€­ á€žá€¼á€¬á€¸á€™á€šá€¹á€†á€¯á€­á€•á€«á€±á€á€¬á‚•á‹á€•á€‘á€™ á€±á€™á€¸á€á€¼á€”á€¹á€¸á€€ á€€á€ºá€±á€”á€¬á€¹á€á€­á€¯á‚• á€±á€€á€ºá€¬á€„á€¹á€¸á€€á€¯á€­ á€œá€™á€¹á€¸á€± á€œá€½á€ºá€¬á€€á€¹á€žá€¼á€¬á€¸á€™á€½á€¬á€œá€¬á€¸á‹á€€á€¬á€¸á€”á€²á‚•á€žá€¼á€¬á€¸á€™á€½á€¬á€œá€¬á€¸ á€†á€¯á€­á€á€²á‚•á€±á€™á€¸á€á€¼á€”á€¹á€¸á€•á€«á‹á€œá€™á€¹á€¸á€±á€œá€½á€ºá€¬á€€á€¹á€žá€¼á€¬á€¸á€™á€šá€¹á€†á€¯á€­á€›á€„á€¹  á€”á€®á€¸á€žá€œá€¬á€¸ á€±á€á€¸á€žá€œá€¬á€¸ á€†á€¯á€­á€á€¬á€€á‚ á€á€¯á€±á€»á€™á€¬ á€€á€¹á€±á€™á€¸á€á€¼á€”á€¹á€¸á€•á€«á‹á€±á€á€¸á€á€šá€¹á€†á€¯á€­á€›á€„á€¹ á€€á€¬á€¸á€”á€²á‚•á€žá€¼á€¬á€¸á€á€²á‚•á€¡á€á€« á€á€…á€¹á€†á€„á€¹á‚•á€‘á€²á€±á€›á€¬á€€á€¹á€žá€œá€¬á€¸ á€†á€¯á€­á€á€¬á€€ áƒ á€á€¯á€±á€»á€™á€¬á€€á€¹ á€±á€™á€¸á€á€¼á€”á€¹á€¸á€•á€«á‹á€˜á€šá€¹á€”á€¶á€•á€«á€á€¹á€±á€á€¼á€…á€®á€¸ á€›á€™á€œá€² á€†á€¯á€­á€á€¬á€€ á„ á€á€¯á€±á€»á€™á€¬á€€á€¹á€±á€™á€¸á€á€¼á€”á€¹á€¸á€•á€«á‹á€˜á€šá€¹á€™á€½á€á€¹á€á€¯á€­á€„á€¹á€™á€½á€¬á€†á€„á€¹á€¸á€›á€™á€œá€² / á€˜á€šá€¹á€™á€½á€á€¹á€á€­á€¯á€„á€¹á€‘á€­ á€±á€œá€½á€ºá€¬á€€á€¹á€›á€™á€œá€² á€†á€¯á€­á€á€¬á€€ á… á€á€¯á€±á€»á€™á€¬á€€á€¹á€±á€™á€¸ á€á€¼á€”á€¹á€¸á€•á€«á€•á€²á‹\ná€’á€®á€±á€™á€¸á€á€¼á€”á€¹á€¸á€±á€á€¼á€€á€¯á€­ á€±á€»á€–á€œá€¯á€­á€€á€¹á€›á€„á€¹ á€€á€ºá€±á€”á€¬á€¹á€á€¯á€­á‚•  algorithmá€¡á€›á€±á€€á€ºá€¬á€„á€¹á€¸á€±á€›á€¬á€€á€¹á€•á€«á€»á€•á€®á‹\ná€€á€¬á€¸á€”á€²á‚•á€žá€¼á€¬á€¸á€™á€šá€¹ á‚ á€†á€„á€¹á‚•á€…á€®á€¸á€›á€™á€šá€¹  á€”á€¶á€•á€«á€á€¹ á á€”á€²á‚• á‚ á€€á€¯á€­á€…á€®á€¸á€•á€« á á€€á€¯á€­á€…á€®á€¸á€»á€•á€®á€¸ á‚ á€™á€½á€á€¹á€á€¯á€­á€„á€¹á€™á€½á€¬á€†á€„á€¹á€¸á€•á€« á‚ á€€á€¯á€­ á€…á€®á€¸á€»á€•á€®á€¸ áƒ á€™á€½á€á€¹á€á€¯á€­á€„á€¹á€™á€½á€¬ á€†á€„á€¹á€¸á€•á€«á‹\ná€±á€”á€¬á€€á€¹á€†á€¯á€¶á€¸ áƒ á€™á€½á€á€¹á€á€¯á€­á€„á€¹á€†á€¯á€­á€á€¬á€€á€±á€á€¬á‚• á€±á€€á€ºá€¬á€„á€¹á€¸á€±á€›á€¬á€€á€¹á€žá€¼á€¬á€¸á€á€²á‚• á€¡á€†á€„á€¹á‚•á€±á€•á€«á‚•  algorithmá€€á€œá€Šá€¹á€¸ á€¡á€²á‚•á€™á€½á€¬ á€¡á€†á€¯á€¶á€¸á€žá€á€¹á€žá€¼á€¬á€¸á€á€šá€¹á‹ á€’á€®á€±á€á€¬á‚• á€±á€€á€ºá€¬á€„á€¹á€¸á€€á€¯á€­ á€€á€¬á€¸á€”á€²á‚• á€žá€¼á€¬á€¸á€›á€™á€²á‚• á€¡á€†á€„á€¹á‚•á€±á€á€¼ á€±á€›á€œá€¯á€­á€€á€¹á€™á€šá€¹á€†á€¯á€­á€›á€„á€¹ (á) á€€á€¬á€¸á€”á€²á‚•á€žá€¼á€¬á€¸á€™á€šá€¹ (á‚) á‚á€†á€„á€¹á‚•á€…á€®á€¸á€›á€™á€šá€¹\n(áƒ) á€”á€¶á€•á€«á€á€¹ á á€”á€²á‚• á‚ á€€á€¯á€­á€…á€®á€¸á€•á€« (á„) á á€€á€¯á€­á€…á€®á€¸á€»á€•á€®á€¸ á‚ á€™á€½á€á€¹á€á€¯á€­á€„á€¹á€™á€½á€¬á€†á€„á€¹á€¸á€•á€« (á…) á‚ á€€á€¯á€­á€…á€®á€¸á€»á€•á€®á€¸ áƒ á€™á€½á€á€¹á€á€¯á€­á€„á€¹á€™á€½á€¬á€†á€„á€¹á€¸á€•á€« á€…á€¯á€…á€¯á€±á€•á€«á€„á€¹á€¸ á… á€†á€„á€¹á‚”á€›á€½á€­á€™á€šá€¹á‹á€’á€®á€œá€¯á€­ á€¡á€†á€„á€¹á‚•á€œá€¯á€­á€€á€¹ á€¡á€†á€„á€¹á‚•á€œá€¯á€­á€€á€¹ á€á€…á€¹á€†á€„á€¹á‚•á€á€ºá€„á€¹á€¸á€€á€¯á€­  algorithmá€™á€½á€¬  stepá€œá€¯á€­á‚•á€±á€ášá€á€šá€¹á‹á€’á€® step á€±á€á€¼ á€¡á€€á€¯ á€”á€¹á€œá€¶á€¯á€¸ á€±á€•á€«á€„á€¹á€¸á€œá€­á€¯á€€á€¹á€›á€„á€¹  algorithm á€á€…á€¹á€á€¯á€»á€–á€…á€¹á€œá€¬á€•á€«á€á€šá€¹á‹step á€±á€á€¼á€™á€ºá€¬á€¸á€±á€œ  algorithm á€€ complex á€»á€–á€…á€¹á€±á€œ á€›á‚ˆá€•á€¹á€±á€‘á€¼á€¸á€±á€œá€± á€•á€«á€·á‹\ná€¡á€±á€•ášá€€ á€¡á€†á€„á€¹á€· á… á€†á€„á€¹á€·á€€á€±á€á€¬á€· á€±á€™á€¸á€á€¼á€”á€¹á€¸ á… á€á€¯á€€á€±á€”á€‘á€¼á€€á€¹á€œá€¬á€á€²á‚• á€¡á€±á€»á€–á€±á€á€¼á€•á€«á‹\ná€¡á€²á‚• á á€€á€±á€” á… á€¡á€‘á€­ á€±á€™á€¸á€á€¼á€”á€¹á€¸ á… á€á€¯á€±á€•á€«á€„á€¹á€¸á€œá€­á€¯á€€á€¹á€›á€„á€¹á€œá€Šá€¹á€¸  algorithmá€á€…á€¹á€á€¯á€•á€«á€•á€²á‹\ná€¡á€±á€»á€– á… á€á€¯á€€á€±á€á€¬á€·  algorithm á€›á€²á‚•  stepá€á€…á€¹á€á€¯á€á€ºá€„á€¹á€¸á€…á€®á€€ output á€±á€á€¼á€±á€•á€«á€·á‹á€’á€®á€™á€½á€¬  algorithm á€›á€²á‚•  inputá€€ á€¡á€­á€™á€¹á€€á€±á€” á€±á€€á€ºá€¬á€„á€¹á€¸ á€žá€¼á€¬á€¸á€™á€šá€¹ á€†á€­á€¯á€á€²á‚•  inputá€•á€«á‹á€±á€€á€ºá€¬á€„á€¹á€¸á€žá€¼á€¬á€¸á€›á€™á€²á‚•á€¡á€†á€„á€¹á€·á€±á€á€¼á€€á€­á€¯  stepá€á€…á€¹á€á€¯á€á€ºá€„á€¹á€¸á€…á€®á€€ á€á€¼á€€á€¹á€‘á€¯á€á€¹á€±á€•á€¸á€œá€­á€¯á€€á€¹á€á€¬á€€ á€¡á€²á‚•  stepá€á€…á€¹á€á€¯á€á€ºá€„á€¹á€¸ á€…á€®á€›á€²á‚•  outputá€•á€«á‹\n stepá€á€…á€¹á€á€¯á€›á€²á‚•  outputá€€ á€±á€”á€¬á€€á€¹  stepá€á€…á€¹á€á€¯á€›á€²á‚• input á€»á€–á€…á€±á€¹á€”á€á€¬á€€á€­á€¯   computerscienceá€™á€½á€¬ - pipelineá€œá€­á€¯á‚•á€±á€ášá€•á€«á€á€šá€¹á‹\ná€•á€­á€¯á€»á€•á€®á€¸á€±á€á€¬á€· input á€±á€á€¼ output á€±á€á€¼á€»á€™á€„á€¹á€žá€¬á€±á€¡á€¬á€„á€¹ á€€á€ºá€±á€”á€¬á€¹á€á€­á€¯á‚•   algebricalmathematicá€€   quadraticfunctioná€”á€²á‚” á€á€¼á€€á€¹á€» á€€á€Šá€¹á€·á€›á€±á€¡á€¬á€„á‹á€¹  Quadraticfunctioná€†á€­á€¯á€á€¬á€€á€±á€á€¬á€· á‚ á€‘á€•á€¹á€€á€­á€”á€¹á€¸á€Šá€®á€™á€½á€ºá€»á€á€„á€¹á€¸á€€á€­á€¯á€±á€»á€•á€¬á€á€¬á€•á€«á‹\n( ) = 2 2+ +1. ( ) = 22   = 3 fx x^ x Prooffx whenx á€†á€­á€¯á€•á€«á€±á€á€¬á€·á‹\ná€’á€®á€™á€½á€¬   ffunctioná€›á€²á‚•  ( ) domain input á€€  xá€•á€«á‹ ( ) range output á€€ 2 2+ +1 x^ x á€•á€«á‹á€’á€®á€±á€á€¬á€·  :  -> 2 2+ +1 f x x^ x á€±á€•á€«á€·á‹\n xá€á€”á€¹á€–á€­á€¯á€¸ 3 á€»á€–á€…á€¹á€á€²á‚•á€¡á€á€« á€€á€ºá€±á€”á€¬á€¹á€á€­á€¯á‚•á€€ ( ) = 22 fx á€»á€–á€…á€¹á€±á€»á€€á€¬á€„á€¹á€¸ á€žá€€á€¹á€±á€žá€»á€•á€›á€•á€«á€™á€šá€¹á‹\n( ) = 2(3) 2+3+1 fx ^       = 2(9)+3+1       = 18+3+1 ( ) = 22 fx\n :            .     Def Algorithm is a sequence of steps it lead to our desired answerA sequence of steps is called .algorithm\ná€’á€®á€•á€¯á€…á¦á€¬á€™á€½á€¬ ( ) = 22 fx á€»á€–á€…á€¹á€–á€­á€¯á‚•á€¡á€á€¼á€€á€¹ step á€±á€á€¼á€á€†á€„á€¹á€·á€»á€•á€®á€¸ á€á€†á€„á€¹á€· á€á€¼á€€á€¹á€»á€•á€®á€¸á€žá€¼á€¬á€¸ á€á€²á‚•á€¡á€á€«á€™á€½á€¬ á€±á€”á€¬á€€á€¹á€†á€¶á€¯á€¸ á€€á€ºá€±á€”á€¬á€¹á€á€­á€¯á‚•á€œá€­á€¯á€á€ºá€„á€¹á€á€²á‚• á€¡á€±á€»á€–  desiredanswerá€›á€™á€œá€¬á€˜á€°á€¸á€œá€¬á€¸á‹á€’á€«á€œá€Šá€¹á€¸  algorithmá€á€…á€¹á€á€¯á€•á€«á€•á€²á‹á€¡á€á€¯á€±á€œá€¬á€€á€¹á€†á€­á€¯  algorithmá€€á€­á€¯á€”á€¬á€¸á€œá€Šá€¹á€žá€¼á€¬á€¸á€±á€œá€¬á€€á€¹á€•á€«á€»á€•á€®á‹\n ', 0, 'Programming', '2019-08-17');

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

--
-- Dumping data for table `utproject`
--

INSERT INTO `utproject` (`id`, `userid`, `projectName`, `projectDescription`, `deadline`, `projectStatus`, `projectPrograss`, `modifiedTime`) VALUES
(1, 40, 'Utime', 'Social Platform for studient', '2019-08-16', 0, '66.7', ''),
(10, 40, 'New Project', 'project with description', '2019-08-27', 0, '100', '');

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

--
-- Dumping data for table `utpsubtask`
--

INSERT INTO `utpsubtask` (`id`, `projectid`, `taskid`, `subtask`, `subtaskStatus`) VALUES
(1, 1, 1, 'show notification on right time', 1),
(2, 1, 1, 'show notification for missed works', 0),
(3, 1, 1, 'planner task status according to noti return', 1),
(27, 3, 21, 'sdfsadfsdaf', 1),
(28, 3, 21, 'sadfsdafsadf', 1),
(29, 3, 21, 'sdafasdfasdfasdf', 1),
(31, 3, 21, 'asdfasdfasdfasdfsadf', 1),
(32, 3, 21, 'sdafsadfasdfsadfsa', 1),
(33, 3, 21, 'asdfsadfasdfasdf', 1),
(37, 4, 27, 'adfasdf', 1),
(38, 4, 27, 'dsfsafasdfasdf', 0),
(39, 5, 28, 'asdfasdfasdf', 0),
(40, 10, 51, 'new subtask', 1);

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
(1, 1, 'planner notification system', 0),
(50, 0, '', 0),
(51, 10, 'New Task', 1),
(52, 11, 'dasfasdfsad', 0),
(53, 11, 'afdsfasdf', 0),
(54, 11, 'fsadfasdf', 0),
(55, 0, '', 0);

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
(41, 57, 35),
(42, 56, 35),
(45, 60, 36),
(46, 59, 36),
(49, 60, 38),
(51, 58, 39),
(52, 59, 39),
(53, 60, 39),
(55, 60, 37),
(57, 42, 37),
(59, 69, 37),
(62, 69, 30),
(63, 60, 40),
(64, 56, 40),
(65, 61, 40),
(66, 59, 40),
(67, 66, 40);

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

--
-- Dumping data for table `utsubjects`
--

INSERT INTO `utsubjects` (`id`, `examid`, `utsubject`, `subjectDate`, `fromTime`, `toTime`, `roomNo`, `chairNo`, `minMark`, `getMark`) VALUES
(1, 1, 'Programming', '2019-08-11', '9:00AM', '12:00PM', '221b', '135', 40, 20),
(2, 1, 'Networking', '2019-08-11', '9:00AM', '12:00PM', '221b', '135', 40, 50),
(3, 1, 'Physic', '2019-08-11', '9:00AM', '12:00PM', '221b', '135', 40, 50),
(4, 1, 'Something Else', '2019-08-11', '9:00AM', '12:00PM', '221b', '135', 40, 50),
(5, 1, 'Game Development', '2019-08-30', '08:00 AM', '11:00 AM', '101', '404', 30, 50),
(6, 1, 'Web Security', '2019-08-29', '05:30 AM', '12:40 PM', '303', 'b-12', 50, 50),
(7, 9, 'sadfasdf', '2019-08-07', '01:00 AM', '01:00 AM', 'asdfsad', 'sd2343', 324, 0),
(10, 8, 'sadfsd', '2019-08-15', '01:00 AM', '01:00 AM', 'sdfd', '3423', 234, 0);

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

--
-- Dumping data for table `uttask`
--

INSERT INTO `uttask` (`id`, `userid`, `tasksubject`, `taskdate`, `shour`, `sminute`, `sampm`, `ehour`, `eminute`, `eampm`, `priority`, `emotion`, `dformat`, `utColor`, `taskStatus`) VALUES
(28, 30, 'Some things to Do', '2019-08-07', '1', '5', 'am', '1', '5', 'am', 3, 3, 'd20190807', '#3AC485', 0),
(29, 30, 'Finish Time Table Page', '2019-08-06', '10', '30', 'pm', '11', '50', 'pm', 4, 5, 'd20190806', '#3AC485', 0),
(30, 30, 'Drink Coffee after split Days', '2019-08-06', '1', '5', 'am', '1', '5', 'am', 4, 5, 'd20190806', '#3AC485', 0),
(31, 30, 'Do Every Thing Make Me Happy', '2019-08-22', '1', '5', 'am', '1', '5', 'am', 3, 3, 'd20190822', '#3AC485', 0),
(32, 30, 'play piano every day', '2019-08-16', '1', '5', 'am', '1', '5', 'am', 3, 3, 'd20190816', '#3AC485', 0),
(33, 30, 'Sleep two Hour', '2019-08-06', '1', '5', 'am', '1', '5', 'am', 3, 3, 'd20190806', '#3366FF', 0),
(34, 30, 'Sleep', '2019-08-07', '3', '30', 'am', '8', '30', 'am', 1, 5, 'd20190807', '#99CC33', 0),
(36, 30, 'Wakeup early and Code agein', '2019-08-07', '7', '10', 'am', '8', '45', 'am', 1, 5, 'd20190807', '#e93a3a', 0),
(37, 30, 'Code till the morning', '2019-08-08', '1', '5', 'am', '7', '5', 'am', 1, 3, 'd20190808', '#e93a3a', 0),
(38, 30, 'Finish Time Table and Community Pages completely', '2019-08-09', '9', '30', 'am', '11', '55', 'pm', 1, 5, 'd20190809', '#3AC485', 0),
(39, 40, 'Play Piano', '2019-08-13', '1', '5', 'am', '1', '5', 'am', 1, 5, 'd20190813', '#3AC485', 1),
(41, 40, 'Project Meeting', '2019-08-16', '1', '5', 'am', '1', '5', 'am', 2, 5, 'd20190816', '#3AC485', 1),
(42, 40, 'Finish Exam Page For U-Time', '2019-08-28', '12', '30', 'pm', '12', '30', 'am', 1, 3, 'd20190828', '#e93a3a', 0),
(43, 40, 'Second Task', '2019-08-13', '1', '5', 'am', '1', '5', 'am', 4, 4, 'd20190813', '#3AC485', 1),
(44, 40, 'Finished Task', '2019-08-15', '1', '5', 'am', '1', '5', 'am', 2, 5, 'd20190815', '#3AC485', 1),
(46, 40, 'Coming Task', '2019-08-16', '3', '5', 'pm', '3', '10', 'pm', 1, 5, 'd20190816', '#3AC485', 1),
(48, 40, 'Finish UTime', '2019-08-17', '12', '30', 'am', '12', '35', 'am', 1, 5, 'd20190817', '#3AC485', 1),
(49, 40, 'Finish The Whole Project', '2019-08-17', '6', '5', 'am', '6', '5', 'pm', 1, 5, 'd20190817', '#3AC485', 0);

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

--
-- Dumping data for table `utteachers`
--

INSERT INTO `utteachers` (`id`, `userid`, `teacherName`, `teacherSubject`, `teacherPhone`) VALUES
(1, 40, 'Daw Aye Aye', 'Programming', '0928329283'),
(2, 40, 'Daw Tin May Lwin', 'Networking ', '09847533245'),
(3, 40, 'Daw Mya Kyi', 'Physics', '0938729193'),
(4, 40, 'Daw Marlar Swe', 'Physics', '0948723521'),
(5, 40, 'sadfsa', 'Programming', '4234234'),
(6, 40, 'asdfasdf', 'Networking ', 'sdfsdf'),
(7, 40, 'sadfsadf', 'Programming', 'sadfasdf');

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
(22, 'May', 'Myat Noe Zaw', 'maymyatnoezaw@gmail.com', 'deD60Uj02F0hQ', 'a:2:{i:0;s:6:\"Design\";i:1;s:16:\"Game Development\";}', '', 'nopp.png'),
(23, 'JR', 'Alli', 'jralli@gmail.com', 'f46thmAIBTN.6', 'a:5:{i:0;s:10:\"Networking\";i:1;s:23:\"Artificial Intelligence\";i:2;s:16:\"Game Development\";i:3;s:12:\"Web Security\";i:4;s:11:\"Programming\";}', '', '220819pm15.jpg'),
(24, 'JK', 'Rolling', 'jkrolling@gmail.com', 'bcHe.ZbgZhOc.', 'a:4:{i:0;s:11:\"Programming\";i:1;s:23:\"Artificial Intelligence\";i:2;s:12:\"Web Security\";i:3;s:5:\"Space\";}', '', 'nopp.png'),
(25, 'WE', 'Yo', 'weyo@gmail.com', '52AULRFggu7do', 'a:4:{i:0;s:11:\"Programming\";i:1;s:23:\"Artificial Intelligence\";i:2;s:12:\"Web Security\";i:3;s:16:\"Game Development\";}', '', 'nopp.png'),
(26, 'Bu', 'Tu', 'buto@mail.comm', '63/cfHYVaivYE', 'a:5:{i:0;s:10:\"Networking\";i:1;s:5:\"Space\";i:2;s:16:\"Game Development\";i:3;s:12:\"Web Security\";i:4;s:11:\"Programming\";}', '', 'nopp.png'),
(27, 'Ma', 'Ma', 'mama@gmail.com', 'c61NmhZuM67sI', 'a:3:{i:0;s:11:\"Programming\";i:1;s:12:\"Web Security\";i:2;s:23:\"Artificial Intelligence\";}', '', 'nopp.png'),
(28, 'Hello', 'JOk', 'jfladk@gmail.com', '21pzV880flaXs', 'a:4:{i:0;s:10:\"Networking\";i:1;s:5:\"Space\";i:2;s:16:\"Game Development\";i:3;s:23:\"Artificial Intelligence\";}', '', 'nopp.png'),
(29, 'Hla', 'Myo', 'hlamyo@gmail.com', '0d9H5N4pBwLm2', 'a:3:{i:0;s:11:\"Programming\";i:1;s:23:\"Artificial Intelligence\";i:2;s:16:\"Game Development\";}', '', 'nopp.png'),
(30, 'May', 'Myat Noe Zaw', 'mglaymama@gmail.com', 'fezN0/xk5iDcQ', 'a:8:{i:0;s:6:\"Physic\";i:1;s:11:\"Programming\";i:2;s:10:\"Networking\";i:3;s:6:\"Design\";i:4;s:5:\"Space\";i:5;s:23:\"Artificial Intelligence\";i:6;s:12:\"Web Security\";i:7;s:16:\"Game Development\";}', '', '220837pm21.jpg'),
(31, 'Jo', 'Kar', 'jokar@gmail.com', '83SPit.UeQ22E', 'a:4:{i:0;s:10:\"Networking\";i:1;s:23:\"Artificial Intelligence\";i:2;s:5:\"Space\";i:3;s:6:\"Design\";}', '', 'nopp.png'),
(32, 'Oz', 'O', 'ozo@gmail.com', 'e8OxPQ356c3is', 'a:5:{i:0;s:10:\"Networking\";i:1;s:23:\"Artificial Intelligence\";i:2;s:5:\"Space\";i:3;s:12:\"Web Security\";i:4;s:16:\"Game Development\";}', '', 'nopp.png'),
(33, 'Ki', 'Ki', 'kiki@gmail.com', 'a3v3l8Me6MOjA', 'a:5:{i:0;s:6:\"Physic\";i:1;s:10:\"Networking\";i:2;s:5:\"Space\";i:3;s:6:\"Design\";i:4;s:16:\"Game Development\";}', '', 'nopp.png'),
(34, 'Re', 'Core', 'recore@gmail.com', 'a3v3l8Me6MOjA', 'a:8:{i:0;s:6:\"Physic\";i:1;s:11:\"Programming\";i:2;s:10:\"Networking\";i:3;s:6:\"Design\";i:4;s:23:\"Artificial Intelligence\";i:5;s:5:\"Space\";i:6;s:12:\"Web Security\";i:7;s:16:\"Game Development\";}', '', 'nopp.png'),
(35, 'Hla Myo', 'Mann', 'hlamyomann@gmail.com', '55OnFvWe./3YY', 'a:4:{i:0;s:6:\"Physic\";i:1;s:11:\"Programming\";i:2;s:23:\"Artificial Intelligence\";i:3;s:12:\"Web Security\";}', '', 'nopp.png'),
(36, 'Elze', 'Zi', 'elzezi@gmail.com', 'c4VjgNsEM.2kY', 'a:8:{i:0;s:12:\"Web Security\";i:1;s:23:\"Artificial Intelligence\";i:2;s:10:\"Networking\";i:3;s:5:\"Space\";i:4;s:16:\"Game Development\";i:5;s:11:\"Programming\";i:6;s:6:\"Physic\";i:7;s:6:\"Design\";}', '', 'nopp.png'),
(37, 'Debu', 'Gger', 'debugger@gmail.com', 'c6NQakceFUPLQ', 'a:8:{i:0;s:10:\"Networking\";i:1;s:23:\"Artificial Intelligence\";i:2;s:5:\"Space\";i:3;s:12:\"Web Security\";i:4;s:16:\"Game Development\";i:5;s:11:\"Programming\";i:6;s:6:\"Physic\";i:7;s:6:\"Design\";}', '', 'nopp.png'),
(38, 'JR', 'Alli', 'jralli2@gmail.com', 'a3v3l8Me6MOjA', 'a:5:{i:0;s:6:\"Physic\";i:1;s:11:\"Programming\";i:2;s:23:\"Artificial Intelligence\";i:3;s:5:\"Space\";i:4;s:16:\"Game Development\";}', '', 'nopp.png'),
(39, 'Myo', 'Mann', 'myimann@gmail.com', '93l2LRJI.up46', 'a:6:{i:0;s:6:\"Physic\";i:1;s:23:\"Artificial Intelligence\";i:2;s:10:\"Networking\";i:3;s:16:\"Game Development\";i:4;s:12:\"Web Security\";i:5;s:5:\"Space\";}', '', 'nopp.png'),
(40, 'Fre', 'Ya', 'freya@gmail.com', 'dfAiVru2FUfAw', 'a:5:{i:0;s:6:\"Physic\";i:1;s:11:\"Programming\";i:2;s:6:\"Design\";i:3;s:23:\"Artificial Intelligence\";i:4;s:16:\"Game Development\";}', '', '220825pmFB_IMG_1500812885800.jpg'),
(41, 'JR', 'Ally', 'jrally123@gmail.com', '85ZNdpczenVl2', 'a:5:{i:0;s:6:\"Physic\";i:1;s:11:\"Programming\";i:2;s:10:\"Networking\";i:3;s:6:\"Design\";i:4;s:23:\"Artificial Intelligence\";}', '', 'nopp.png');

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `utclassmate`
--
ALTER TABLE `utclassmate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `utclasssubjects`
--
ALTER TABLE `utclasssubjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `utcolors`
--
ALTER TABLE `utcolors`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `utcomment`
--
ALTER TABLE `utcomment`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
-- AUTO_INCREMENT for table `utpassions`
--
ALTER TABLE `utpassions`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `utposts`
--
ALTER TABLE `utposts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `utstar`
--
ALTER TABLE `utstar`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `utsubjects`
--
ALTER TABLE `utsubjects`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `uttask`
--
ALTER TABLE `uttask`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `utteachers`
--
ALTER TABLE `utteachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `utusers`
--
ALTER TABLE `utusers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
