-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Gegenereerd op: 15 jun 2020 om 11:56
-- Serverversie: 8.0.13-4
-- PHP-versie: 7.2.24-0ubuntu0.18.04.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `n3UZJG59Uc`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `drukte`
--

CREATE TABLE `drukte` (
  `winkel_id` int(11) NOT NULL,
  `drukte` varchar(125) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `drukte`
--

INSERT INTO `drukte` (`winkel_id`, `drukte`) VALUES
(1, 'Druk'),
(2, 'Druk'),
(3, 'Druk'),
(4, 'Heel druk'),
(5, 'Druk'),
(6, 'Niet druk'),
(7, 'Druk');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `full_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `email`, `full_name`, `user_name`, `password`, `code`) VALUES
(3, 'Fabian.et.je@hotmail.com', 'Fabian Hendriks', 'Fappie', '$2y$10$MZXPXi97F2jXIxeP6fx/hu2R6f8KK0Pn5cXXq72FvuUmWzyG6Hfsi', NULL),
(4, 'your.email+faker87491@gmail.com', 'Thijs Hendriks', 'Nick25', '$2y$10$0HqY39aUQQ6LCGlTxHKpkOhiNj7RCaQIton.c7/D3U8Qao6TqWSei', NULL),
(5, 'your.email+faker23963@gmail.com', 'Eva Jong', 'Sander_Janssen60', '$2y$10$IoXygL5dgo7kfI63curnluK9qDiiXxuy5eyGIRpmeyTxhu6wz8O..', NULL),
(6, 'bormannromer@gmail.com', 'Romer', 'Romer', '$2y$10$piVQSzcgjxZQ/yxlLnnO1OoVq/QN928jARqdW0M8kuqWq5rXGz2US', '2e1469b063f3cead4574d97f60f2d376'),
(7, 'test123@gmail.com', 'Romer', '', '$2y$10$LMyY0BnLmiOCQi7HJ2lkZujylq.sETk3KYBTodi298cik.bhACSjq', '3c7687a076bcfb17ba33e66566fb82c0'),
(8, '28746@ma-web.nl', 'Romer', 'test123', '$2y$10$XQt9.Aspnhr//glhtWo1Se0dDM61/0MSZSqLtvqk6/OmRep/AWr1u', '1b2a791cc321f8f8c8964dc10415d348'),
(10, 'test@testmail.nl', 'Testaccount', 'tester', '$2y$10$YT/FofkIHS1JGCmJ/g/Ieuft1VzSXwPXQDPIZCG.tEI2pj7lbHcnu', '2a9bc63ef1c10af194e09fa67c0665d0'),
(11, '29743@ma-web.nl', 'Bram van Baren', 'Brummer', '$2y$10$g1yDKB84udMWSsh.vSo0n.o/Q7LEDXrb0YNLUICNE20jl7l5kveD2', 'a22926833e5e9975f33ea3bab1dcc1c0'),
(12, 'vanbarenbram@gmail.com', 'Bram van Baren', 'Bram', '$2y$10$Hkpqm8G6Ff9m/m1a.qEJrO0hc5/xPr/7jYxAvT4k6OkQOg8EJVW0K', 'ddf1c48103c4385d00bde2dfe4630c1d'),
(13, 'koekje@gmail.com', 'Koekje', 'Koekje', '$2y$10$xwPELUj5pWy7NAuPLqhhpeKZv6B4siMGh9/mBIUylMZgtqvn3aSFS', '389aab650d98a8b629fddc56347b002b');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `winkels`
--

CREATE TABLE `winkels` (
  `id` int(11) NOT NULL,
  `winkelnaam` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adres` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `plaats` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `eigenaar` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Gegevens worden geëxporteerd voor tabel `winkels`
--

INSERT INTO `winkels` (`id`, `winkelnaam`, `adres`, `plaats`, `eigenaar`) VALUES
(5, 'Lidl', 'Dr. H. G. Scholtenstraat 5 ', 'Zaandam', NULL),
(1, 'Dekamarkt', 'Drielse Wetering 48', 'Zaandam', '...'),
(6, 'Intertoys', 'Gedempte Gracht 32', 'Zaandam', NULL),
(7, 'Aldi', 'Grote Beer 5M', 'Hoorn', NULL),
(3, 'Dirk van den Broek', 'Marie Heinekenplein 25', 'Amsterdam', 'Detailresult'),
(4, 'Coop', 'Niersstraat 16', 'Amsterdam', ''),
(2, 'Albert Heijn', 'Van Dedemstraat 19', 'Hoorn', '');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `drukte`
--
ALTER TABLE `drukte`
  ADD UNIQUE KEY `winkel_id` (`winkel_id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexen voor tabel `winkels`
--
ALTER TABLE `winkels`
  ADD UNIQUE KEY `adres` (`adres`) USING BTREE,
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT voor een tabel `winkels`
--
ALTER TABLE `winkels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
