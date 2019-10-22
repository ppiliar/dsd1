-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Hostiteľ: localhost
-- Vygenerované:: 22.Apr, 2013 - 19:46
-- Verzia serveru: 5.0.51
-- Verzia PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databáza: `zaklad`
--

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `osoba`
--

CREATE TABLE IF NOT EXISTS `osoba` (
  `id` int(4) NOT NULL auto_increment,
  `meno` varchar(20) default NULL,
  `priezvisko` varchar(30) default NULL,
  `titul` varchar(20) default NULL,
  `rc` bigint(12) default NULL,
  `nickname` varchar(20) NOT NULL,
  `heslo` varchar(20) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Sťahujem dáta pre tabuľku `osoba`
--

INSERT INTO `osoba` (`id`, `meno`, `priezvisko`, `titul`, `rc`, `nickname`, `heslo`) VALUES
(1, 'Ján', 'Zeller', 'bc.', 8512113647, 'zell', 'zell'),
(2, 'Ivan', 'Kaleráb', '', 7905263254, 'kale', 'kale'),
(3, 'Emil', 'Kapusta', 'Ing.', 8004153268, 'kapu', 'kapu'),
(4, 'Jana', 'Kapustová', 'Mgr.', 8561125421, 'jaka', 'jaka'),
(5, 'Natália', 'Mrkvová', 'Ing.', 8706292365, 'namr', 'namr'),
(6, 'Ivan', 'Cibula', 'PhDr.', 7606063256, 'cibu', 'cibu'),
(7, 'Ján', 'Cibula', 'Mgr.', 7805232547, 'jaci', 'jaci'),
(8, 'Olivia', 'Cesnaková', '', 8962113584, 'olce', 'olce'),
(9, 'Peter', 'Karfiol', 'PhDr.', 7402056523, 'karfi', 'karfi'),
(10, 'Ivan ', 'Ivanka', 'MVDr.', 7251652514, 'ivan', 'ivan');
