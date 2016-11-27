-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Gostitelj: 127.0.0.1
-- Čas nastanka: 16. jan 2016 ob 20.17
-- Različica strežnika: 5.6.17
-- Različica PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Zbirka podatkov: `sh6004_challengeme`
--

-- --------------------------------------------------------

--
-- Struktura tabele `challengeme`
--

CREATE TABLE IF NOT EXISTS `challengeme` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `fromU` text NOT NULL,
  `toU` text NOT NULL,
  `description` text NOT NULL,
  `path` text NOT NULL,
  `challenge` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Odloži podatke za tabelo `challengeme`
--

INSERT INTO `challengeme` (`id`, `name`, `fromU`, `toU`, `description`, `path`, `challenge`) VALUES
(19, 'Pojej banano', 'Matej', 'Nejc', 'Pojej banano :-) ', 'VID_20160113_162830.mp4', 0),
(20, 'Predstavitev projekta', 'Nejc', 'Jost', 'Predstavi aplikacijo narejeno pri predmetu TPO.', '', 0),
(21, 'Preteci 5km', 'Jost', 'Matej', 'Preteci 5km v 1h.', '', 0);

-- --------------------------------------------------------

--
-- Struktura tabele `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mail` text CHARACTER SET latin1 NOT NULL,
  `username` text CHARACTER SET latin1 NOT NULL,
  `password` text CHARACTER SET latin1 NOT NULL,
  `points` int(11) NOT NULL DEFAULT '0',
  `friends` text CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci AUTO_INCREMENT=27 ;

--
-- Odloži podatke za tabelo `users`
--

INSERT INTO `users` (`id`, `mail`, `username`, `password`, `points`, `friends`) VALUES
(22, 'matej@gmail.com', 'Matej', '4077890445e562015a5bb27f862e49b7', 0, ''),
(23, 'nejc@gmail.com', 'Nejc', 'be421e847210b214b5287597c8fc11c0', 0, ''),
(25, 'tomaz@gmail.com', 'Tomaz', '7c06d6c6268ae1606b37d8b730abf0c8', 0, ''),
(26, 'jost@gmail.com', 'Jost', '4d31c931e5d16e3436a48cb97d2b766b', 0, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
