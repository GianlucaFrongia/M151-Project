-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 06. Dez 2017 um 15:23
-- Server-Version: 10.1.13-MariaDB
-- PHP-Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `befit`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(75) NOT NULL,
  `password` varchar(255) NOT NULL,
  `weight` double(10,3) NOT NULL,
  `height` double(10,3) NOT NULL,
  `geschlecht` tinyint(10) NOT NULL,
  `age` smallint(100) NOT NULL,
  `email` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `weight`, `height`, `geschlecht`, `age`, `email`) VALUES
(11, '', '$2y$11$ROpZRqI9mFELMsKp/9bMneYNnNOm6L5G87iLsKXgnJ7ZaVDtOrrmi', 0.000, 0.000, 0, 0, ''),
(12, '', '$2y$11$313qngfz5GpHrbWD5hJBfOSA.espth/OTRKNu/gs5mDnOMqA/mW0i', 0.000, 0.000, 0, 0, ''),
(13, '', '$2y$11$HVCfUTzMwdO4SqE4ZMn3E.fOJx2j2.V2ycAkbooj1vPtMH9182F7e', 0.000, 0.000, 0, 0, ''),
(14, '', '$2y$11$G9XoqNA9HhIGFoCQt0pJMu/b.tqdUaaVtkfO2p7SU46N0RdXsXhce', 0.000, 0.000, 0, 0, ''),
(15, 'Vaekek', '$2y$11$4Z4yuxpWyLQNSvybhZmLgOuO574Tb9FuM3KTbPNNHPpax31OLgXl.', 12.000, 12.000, 1, 12, 'gianluca.frongia@gibmit.ch');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
