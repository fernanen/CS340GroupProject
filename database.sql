-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: classmysql.engr.oregonstate.edu:3306
-- Generation Time: Nov 16, 2017 at 07:03 PM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cs340_barryj`
--
--
-- Procedures
--
CREATE DEFINER=`cs340_fernanen`@`%`

-- --------------------------------------------------------

--
-- Table structure for table `Consoles`
--

CREATE TABLE `Consoles` (
  `console` varchar(20) NOT NULL,
  `gameID` int(11) NOT NULL,
  `releaseDate` date NOT NULL+








) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Consoles`
--

INSERT INTO `Consoles` (`console`, `gameID`, `releaseDate`) VALUES
('GameCube', 1, '2003-02-18'),
('GameCube', 4, '2001-12-02'),
('Microsoft Windows', 2, '2012-08-28'),
('Nintendo 64', 1, '1998-11-23'),
('OS X', 2, '2012-08-28'),
('PlayStation 2', 3, '2008-11-18'),
('PlayStation 3', 3, '2008-12-09'),
('Wii', 3, '2008-11-18'),
('Wii', 4, '2009-03-09'),
('Wii U', 4, '2016-09-29'),
('Xbox 360', 3, '2008-11-20');

-- --------------------------------------------------------

--
-- Table structure for table `CriticReview`
--

CREATE TABLE `CriticReview` (
  `url` varchar(200) NOT NULL,
  `gameID` int(11) NOT NULL,
  `websiteName` varchar(50) NOT NULL,
  `authorName` varchar(20) NOT NULL,
  `score` int(11) NOT NULL,
  `reviewContent` text NOT NULL,
  `datePosted` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `CriticReview`
--

INSERT INTO `CriticReview` (`url`, `gameID`, `websiteName`, `authorName`, `score`, `reviewContent`, `datePosted`) VALUES
('http://www.ign.com/articles/2001/12/03/pikmin', 4, 'IGN', 'Fran Mirabella III', 91, 'Pikmin is one of the most refreshing games to come out of Nintendo in a while. It\'s really great to see the company take a chance and try to conjure up a whole new franchise. Equally great is the gameplay style which blends exploration, puzzle solving, and intelligent boss fights.', '2001-12-03'),
('http://www.ign.com/articles/2008/11/19/sonic-unleashed-review-3', 3, 'IGN', 'Matt Cassamasina', 72, 'As far as I\'m concerned, these stages are so well crafted, in fact, that die-hard Hedgehog fans can probably justify purchasing the title for the sunlit selection alone. Just resign yourself to trudging through the nighttime stages as penance for the daylight ones. Come on -- if you\'re a Sonic fan, you should be used to sacrifice and suffering by now, anyway.', '2008-11-18'),
('http://www.tentonhammer.com/articles/guild-wars-2-review', 2, 'Ten Ton Hammer', 'Karen Hertzberg', 94, 'When ArenaNet first released its MMO Manifesto we knew they were aiming for something revolutionary with Guild Wars 2. What we got is the first worthy successor to World of Warcraft.', '2012-08-28'),
('https://countzeroor.wordpress.com/2010/05/10/where-i-read-electronic-gaming-monthly-issue-113/', 1, 'Electronic Gaming Monthly', 'N/A', 100, 'An epic adventure that is among the best N64 games. [Jan 2004, p.189]', '2004-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `Games`
--

CREATE TABLE `Games` (
  `gameID` int(11) NOT NULL,
  `gameName` varchar(40) NOT NULL,
  `esrb` varchar(5) NOT NULL,
  `description` text NOT NULL,
  `overallScore` decimal(4,1) NOT NULL,
  `overallCriticScore` decimal(4,1) NOT NULL,
  `overallUserScore` decimal(4,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Games`
--

INSERT INTO `Games` (`gameID`, `gameName`, `esrb`, `description`, `overallScore`, `overallCriticScore`, `overallUserScore`) VALUES
(1, 'The Legend of Zelda: Ocarina of Time', 'E', 'As a young boy, Link is tricked by Ganondorf, the King of the Gerudo Thieves. The evil human uses Link to gain access to the Sacred Realm, where he places his tainted hands on Triforce and transforms the beautiful Hyrulean landscape into a barren wasteland. Link is determined to fix the problems he helped to create, so with the help of Rauru he travels through time gathering the powers of the Seven Sages. [Nintendo]', '1.0', '1.0', '1.0'),
(2, 'Guild Wars 2', 'T', 'Guild Wars 2 draws from the game mechanics that made the original Guild Wars one of the most popular online games and adds a fully persistent world. Like its predecessors, Guild Wars 2 does not have a subscription fee. Guild Wars Eye of the North provides a Hall of Monuments where players\' accomplishments are memorialized and eventually inherited by their Guild Wars 2 characters, unlocking exclusive items and bonuses in Guild Wars 2. [NCSoft]', '1.0', '1.0', '1.0'),
(3, 'Sonic Unleashed', 'E10+', 'Having been broken apart by the evil Dr. Eggman, it\'s up to Sonic to put the pieces of the world back together again by retrieving the power of the chaos emeralds! In doing so, Sonic finds himself in a race against time and faced with an unusual situation that challenge hims in ways never before seen. Both day and night play different, yet important, roles in Sonic\'s newest quest... as the sun sets, a new adventure awakens. By completing a wide variety of action-packed stages, spanning the seven broken continents of the world, gamers unleash Sonic’s amazing abilities to save the world, and himself! In addition to running at high speeds, which is highlighted in four new speed mechanics, combat fighting now becomes possible. New combat, movement, functional abilities and platforming are introduced to offer increased depth and variety. Sonic Unleashed offers a re-defined experience for fans and newcomers of the franchise alike by combing picturesque & detailed scenery, an expansive world with multiple paths to choose from and dynamic viewpoints for an immersive and renewed gaming atmosphere. Along with seamless 3D to classic 2D camera transitions, the game is built on a powerful, new proprietary \"Hedgehog Engine,\" which introduces impressive lighting abilities and new technology tailor made for Sonic’s new speed capabilities. [Sega]', '1.0', '1.0', '1.0'),
(4, 'Pikmin', 'E', 'Pikmin may be small and plantlike, but they can be a space traveler\'s best friend. Stranded on an unknown planet, Captain Olimar must enlist the help of these native Pikmin to rebuild his spaceship before the life-support system runs out. In the meantime, you\'ll have to fend off attackers and solve various puzzles. To produce additional multicolored Pikmin you must defeat enemies and carry them back to the Pikmin nests called onions. But beware--watching giant predators gobble your Pikmin might make you angrier than you\'d expect. [Nintendo]', '1.0', '1.0', '1.0');

-- --------------------------------------------------------

--
-- Table structure for table `Genre`
--

CREATE TABLE `Genre` (
  `genre` varchar(20) NOT NULL,
  `gameID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Genre`
--

INSERT INTO `Genre` (`genre`, `gameID`) VALUES
('Action', 1),
('Action', 3),
('Adventure', 1),
('Adventure', 3),
('Beat \'Em Up', 3),
('MMORPG', 2),
('Platformer', 3),
('RTS', 4);

-- --------------------------------------------------------

--
-- Table structure for table `UserReview`
--

CREATE TABLE `UserReview` (
  `username` varchar(10) NOT NULL,
  `gameID` int(11) NOT NULL,
  `reviewContent` text NOT NULL,
  `score` int(11) NOT NULL,
  `datePosted` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `UserReview`
--

INSERT INTO `UserReview` (`username`, `gameID`, `reviewContent`, `score`, `datePosted`) VALUES
('barryj', 1, 'Easily the worst game of all time. Complete trash.', 0, '2017-11-03'),
('barryj', 2, 'Pretty good. Only played it for a few hundred hours. ', 80, '2017-11-03'),
('barryj', 3, 'It\'s okay.', 100, '2017-11-03'),
('luoja', 1, 'Best game of all time.', 100, '2017-11-03'),
('luoja', 4, 'Too much water.', 80, '2017-11-03');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `username` varchar(10) NOT NULL,
  `password` varchar(256) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`username`, `password`, `firstName`, `lastName`, `age`) VALUES
('barryj', 'testpassword', 'James', 'Barry', 20),
('luoja', 'testpassword2', 'James', 'Luo', 20);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Consoles`
--
ALTER TABLE `Consoles`
  ADD PRIMARY KEY (`console`,`gameID`),
  ADD KEY `Game ID` (`gameID`);

--
-- Indexes for table `CriticReview`
--
ALTER TABLE `CriticReview`
  ADD PRIMARY KEY (`url`),
  ADD KEY `gameID` (`gameID`);

--
-- Indexes for table `Games`
--
ALTER TABLE `Games`
  ADD PRIMARY KEY (`gameID`);

--
-- Indexes for table `Genre`
--
ALTER TABLE `Genre`
  ADD PRIMARY KEY (`genre`,`gameID`),
  ADD KEY `gameID` (`gameID`);

--
-- Indexes for table `UserReview`
--
ALTER TABLE `UserReview`
  ADD PRIMARY KEY (`username`,`gameID`),
  ADD KEY `gameID` (`gameID`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`username`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Consoles`
--
ALTER TABLE `Consoles`
  ADD CONSTRAINT `Game ID` FOREIGN KEY (`gameID`) REFERENCES `Games` (`gameID`) ON DELETE CASCADE;

--
-- Constraints for table `CriticReview`
--
ALTER TABLE `CriticReview`
  ADD CONSTRAINT `CriticReview_ibfk_1` FOREIGN KEY (`gameID`) REFERENCES `Games` (`gameID`) ON DELETE CASCADE;

--
-- Constraints for table `Genre`
--
ALTER TABLE `Genre`
  ADD CONSTRAINT `Genre_ibfk_1` FOREIGN KEY (`gameID`) REFERENCES `Games` (`gameID`) ON DELETE CASCADE;

--
-- Constraints for table `UserReview`
--
ALTER TABLE `UserReview`
  ADD CONSTRAINT `UserReview_ibfk_1` FOREIGN KEY (`username`) REFERENCES `Users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `UserReview_ibfk_2` FOREIGN KEY (`gameID`) REFERENCES `Games` (`gameID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
