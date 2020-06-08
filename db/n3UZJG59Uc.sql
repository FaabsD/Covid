-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Gegenereerd op: 08 jun 2020 om 19:59
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
(1, 'Heel druk');

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
(5, 'your.email+faker23963@gmail.com', 'Eva Jong', 'Sander_Janssen60', '$2y$10$IoXygL5dgo7kfI63curnluK9qDiiXxuy5eyGIRpmeyTxhu6wz8O..', NULL);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `winkels`
--

CREATE TABLE `winkels` (
  `id` int(11) NOT NULL,
  `winkelnaam` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adres` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `plaats` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `eigenaar` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `winkels`
--

INSERT INTO `winkels` (`id`, `winkelnaam`, `adres`, `plaats`, `eigenaar`) VALUES
(1, 'Dekamarkt', 'Drielse Wetering 48', 'Zaandam', '...');

--
-- Indexen voor geëxporteerde tabellen
--

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT voor een tabel `winkels`
--
ALTER TABLE `winkels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
