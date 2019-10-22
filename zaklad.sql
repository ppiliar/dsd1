-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: 127.0.0.1
-- Čas generovania: Št 13.Okt 2016, 05:58
-- Verzia serveru: 5.7.14
-- Verzia PHP: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáza: `zaklad`
--

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `osoba`
--

CREATE TABLE `osoba` (
  `id` int(4) NOT NULL,
  `meno` varchar(20) CHARACTER SET utf8 COLLATE utf8_slovak_ci DEFAULT NULL,
  `priezvisko` varchar(30) CHARACTER SET utf8 COLLATE utf8_slovak_ci DEFAULT NULL,
  `titul` varchar(20) CHARACTER SET utf8 COLLATE utf8_slovak_ci DEFAULT NULL,
  `rc` bigint(12) DEFAULT NULL,
  `nickname` varchar(20) CHARACTER SET utf8 COLLATE utf8_slovak_ci NOT NULL,
  `heslo` varchar(20) CHARACTER SET utf8 COLLATE utf8_slovak_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

--
-- Kľúče pre exportované tabuľky
--

--
-- Indexy pre tabuľku `osoba`
--
ALTER TABLE `osoba`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pre exportované tabuľky
--

--
-- AUTO_INCREMENT pre tabuľku `osoba`
--
ALTER TABLE `osoba`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
