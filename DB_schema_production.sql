-- phpMyAdmin SQL Dump
-- version 3.4.4
-- http://www.phpmyadmin.net
--
-- Host: mysql.webcindario.com
-- Generation Time: Jan 13, 2015 at 10:01 AM
-- Server version: 5.5.38
-- PHP Version: 5.3.29

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `drinkteam`
--

-- --------------------------------------------------------

--
-- Table structure for table `championship`
--

CREATE TABLE IF NOT EXISTS `championship` (
  `idChampionship` int(2) NOT NULL,
  `idSport` int(6) NOT NULL,
  `nameChampionship` varchar(40) NOT NULL,
  `year` int(4) NOT NULL,
  PRIMARY KEY (`idChampionship`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `championshipPlayer`
--

CREATE TABLE IF NOT EXISTS `championshipPlayer` (
  `idChampionship` int(2) unsigned NOT NULL DEFAULT '0',
  `DNI` varchar(9) NOT NULL DEFAULT '',
  `idTeam` int(2) NOT NULL,
  `position` varchar(20) NOT NULL,
  `dorsal` int(2) DEFAULT NULL,
  `gamesPlayed` int(2) DEFAULT NULL,
  `goals` int(2) DEFAULT NULL,
  `assists` int(2) DEFAULT NULL,
  `yellowCards` int(2) DEFAULT NULL,
  `redCards` int(2) DEFAULT NULL,
  PRIMARY KEY (`idChampionship`,`DNI`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `idComment` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `idRelated` int(6) NOT NULL,
  `topic` varchar(20) NOT NULL,
  `nickname` varchar(20) NOT NULL,
  `dateComment` date NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`idComment`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13771 ;

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `idImage` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `pathImage` varchar(200) NOT NULL,
  PRIMARY KEY (`idImage`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=71 ;

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

CREATE TABLE IF NOT EXISTS `matches` (
  `idMatch` int(4) NOT NULL,
  `nameMatch` varchar(20) NOT NULL,
  `idChampionship` int(2) NOT NULL,
  `firstTeam` varchar(40) NOT NULL,
  `secondTeam` varchar(40) NOT NULL,
  `goals1` int(2) NOT NULL,
  `goals2` int(2) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `place` varchar(40) NOT NULL,
  PRIMARY KEY (`idMatch`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `idNew` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `sportNew` enum('Futbol','Futbol Sala','Baloncesto','General') NOT NULL,
  `dateNew` date NOT NULL,
  `timeNew` time NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(200) NOT NULL,
  PRIMARY KEY (`idNew`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `idPayment` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `idPerson` varchar(9) NOT NULL,
  `months` varchar(40) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`idPayment`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=124 ;

-- --------------------------------------------------------

--
-- Table structure for table `playerSport`
--

CREATE TABLE IF NOT EXISTS `playerSport` (
  `idPlayer` varchar(9) NOT NULL DEFAULT '',
  `idSport` int(2) unsigned NOT NULL,
  PRIMARY KEY (`idPlayer`,`idSport`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `prize`
--

CREATE TABLE IF NOT EXISTS `prize` (
  `idPrize` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `idSport` int(2) NOT NULL,
  `namePrize` varchar(40) NOT NULL,
  `year` int(4) NOT NULL,
  `image` varchar(200) NOT NULL,
  PRIMARY KEY (`idPrize`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Table structure for table `sport`
--

CREATE TABLE IF NOT EXISTS `sport` (
  `idSport` int(2) NOT NULL,
  `nameSport` enum('Futbol','Futbol Sala','Baloncesto') NOT NULL,
  PRIMARY KEY (`idSport`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sportDay`
--

CREATE TABLE IF NOT EXISTS `sportDay` (
  `idSportDay` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `sportDay` int(2) NOT NULL,
  `idChampionship` int(2) NOT NULL,
  `dateDay` date NOT NULL,
  `place` varchar(40) NOT NULL,
  `sportName` enum('Futbol','Futbol Sala','Baloncesto') NOT NULL,
  `firstTeam` varchar(40) NOT NULL,
  `secondTeam` varchar(40) NOT NULL,
  `goalsFirstTeam` int(2) NOT NULL,
  `goalsSecondTeam` int(2) NOT NULL,
  PRIMARY KEY (`idSportDay`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=130 ;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `user` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `userType` enum('Administrator','Editor') NOT NULL,
  PRIMARY KEY (`user`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE IF NOT EXISTS `team` (
  `idTeam` int(4) NOT NULL,
  `idSport` int(2) NOT NULL,
  `idChampionship` int(2) NOT NULL,
  `nameTeam` varchar(40) NOT NULL,
  `played` int(2) NOT NULL,
  `points` int(4) NOT NULL,
  `won` int(2) NOT NULL,
  `draw` int(2) NOT NULL,
  `lost` int(2) NOT NULL,
  `scored` int(4) NOT NULL,
  `conceded` int(4) NOT NULL,
  `difference` int(4) NOT NULL,
  `imageTeam` varchar(200) NOT NULL,
  PRIMARY KEY (`idTeam`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `usergroup`
--

CREATE TABLE IF NOT EXISTS `usergroup` (
  `DNI` varchar(9) NOT NULL,
  `userName` varchar(40) NOT NULL,
  `userSurname` varchar(40) NOT NULL,
  `password` char(20) NOT NULL,
  `dateBirth` date NOT NULL,
  `address` varchar(200) NOT NULL,
  `phoneNumber` int(9) NOT NULL,
  `email` varchar(40) NOT NULL,
  `nameSport` enum('Futbol','Futbol Sala','Baloncesto') NOT NULL,
  `image` varchar(200) NOT NULL,
  PRIMARY KEY (`DNI`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
