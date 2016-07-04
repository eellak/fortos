-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Φιλοξενητής: 127.0.0.1
-- Χρόνος δημιουργίας: 04 Ιουλ 2016 στις 12:47:55
-- Έκδοση Διακομιστή: 5.5.16
-- Έκδοση PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Βάση: `tasks`
--

-- --------------------------------------------------------

--
-- Δομή Πίνακα για τον Πίνακα `actions`
--

CREATE TABLE IF NOT EXISTS `actions` (
  `actionid` int(11) NOT NULL AUTO_INCREMENT,
  `taskid` int(11) NOT NULL,
  `energeia` varchar(400) NOT NULL,
  `syxnotita` double NOT NULL,
  `stoxos` double NOT NULL,
  `monada` int(11) NOT NULL,
  `Y1` double NOT NULL,
  `Y2` double NOT NULL,
  `Y3` double NOT NULL,
  `Y4` double NOT NULL,
  `Y5` double NOT NULL,
  `Y6` double NOT NULL,
  `Y7` double NOT NULL,
  PRIMARY KEY (`actionid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=367282 ;

-- --------------------------------------------------------

--
-- Στημένη δομή για προβολή `completed`
--
CREATE TABLE IF NOT EXISTS `completed` (
`taskid` int(11)
,`gd1` varchar(50)
,`d1` varchar(100)
,`t1` varchar(100)
,`armodiotita` varchar(500)
,`diadikasia` varchar(500)
);
-- --------------------------------------------------------

--
-- Δομή Πίνακα για τον Πίνακα `dieythinsi`
--

CREATE TABLE IF NOT EXISTS `dieythinsi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dieythinsi` varchar(100) NOT NULL,
  `atoma` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=72 ;

-- --------------------------------------------------------

--
-- Δομή Πίνακα για τον Πίνακα `eidikothta`
--

CREATE TABLE IF NOT EXISTS `eidikothta` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `EIDIKOTHTA` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=63 ;

-- --------------------------------------------------------

--
-- Δομή Πίνακα για τον Πίνακα `gd`
--

CREATE TABLE IF NOT EXISTS `gd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gdieythinsi` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

-- --------------------------------------------------------

--
-- Δομή Πίνακα για τον Πίνακα `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
  `taskid` int(11) NOT NULL AUTO_INCREMENT,
  `paratiriseis` varchar(400) NOT NULL,
  `gdieythinsi` int(11) NOT NULL,
  `dieythinsi` int(11) NOT NULL,
  `tmima` int(11) NOT NULL,
  `armodiotita` varchar(500) NOT NULL,
  `diadikasia` varchar(500) NOT NULL,
  `Y1` int(11) NOT NULL,
  `Y2` int(11) NOT NULL,
  `Y3` int(11) NOT NULL,
  `Y4` int(11) NOT NULL,
  `Y5` int(11) NOT NULL,
  `Y6` int(11) NOT NULL,
  `Y7` int(11) NOT NULL,
  `completed` smallint(6) NOT NULL,
  `kodikos` varchar(10) NOT NULL,
  PRIMARY KEY (`taskid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6262 ;

-- --------------------------------------------------------

--
-- Δομή Πίνακα για τον Πίνακα `tmima`
--

CREATE TABLE IF NOT EXISTS `tmima` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tmima` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=179 ;

-- --------------------------------------------------------

--
-- Δομή για προβολή `completed`
--
DROP TABLE IF EXISTS `completed`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `completed` AS select `taskid` AS `taskid`,`gd`.`gdieythinsi` AS `gd1`,`dieythinsi`.`dieythinsi` AS `d1`,`tmima`.`tmima` AS `t1`,`armodiotita` AS `armodiotita`,`diadikasia` AS `diadikasia` from (((`tasks` join `gd` on((`gd`.`id` = `gdieythinsi`))) join `dieythinsi` on((`dieythinsi`.`id` = `dieythinsi`))) join `tmima` on((`tmima`.`id` = `tmima`))) where (`completed` = 1) order by `gd`.`gdieythinsi`,`dieythinsi`.`dieythinsi`,`tmima`.`tmima`,`armodiotita`,`diadikasia`;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
