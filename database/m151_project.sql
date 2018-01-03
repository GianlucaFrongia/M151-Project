-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 03. Jan 2018 um 19:25
-- Server-Version: 10.1.25-MariaDB
-- PHP-Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `m151_project`
--
CREATE DATABASE IF NOT EXISTS `m151_project` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `m151_project`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tb_exercise`
--

CREATE TABLE `tb_exercise` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tb_exercisehasmuscle`
--

CREATE TABLE `tb_exercisehasmuscle` (
  `id` int(11) NOT NULL,
  `exercise_id` int(11) NOT NULL,
  `muscle_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tb_modul`
--

CREATE TABLE `tb_modul` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `description` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `file_path` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `title` varchar(255) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

--
-- Daten für Tabelle `tb_modul`
--

INSERT INTO `tb_modul` (`ID`, `name`, `description`, `file_path`, `title`) VALUES
(1, 'dashboard', NULL, 'modul/start.php', 'Dashboard'),
(2, 'Alle Pläne (Öffentlich)', 'Andere Pläne anschauen, Favorisieren', 'modul/publicPlan.php', 'Alle Pläne'),
(3, 'Meine Pläne (Privat)', 'Plan erstellen, bearbeiten, löschen', 'modul/userPlan.php', 'Meine Pläne'),
(5, 'Übung hinzufügen', NULL, 'modul/exercise.php', 'Meine Übungen'),
(8, 'editprofile.php', 'Profil bearbeiten', 'modul/editProfile.php', 'Profil bearbeiten'),
(9, 'logout.php', 'Ausloggen', 'modul/logout.php', 'Abmelden');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tb_motivations`
--

CREATE TABLE `tb_motivations` (
  `id` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `tb_motivations`
--

INSERT INTO `tb_motivations` (`id`, `title`, `description`) VALUES
(1, 'Test 1', 'Der Frühe Vogel kackt auf den Wurm'),
(2, 'Test 2', 'Morgenstund hat scheisse im Mund');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tb_muscle`
--

CREATE TABLE `tb_muscle` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `tb_muscle`
--

INSERT INTO `tb_muscle` (`id`, `name`) VALUES
(1, 'Brustmuskel'),
(2, 'Bizeps'),
(3, 'Bauchmuskel'),
(4, 'Wadenmuskel');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `pbPath` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `password`, `firstname`, `lastname`, `email`, `reg_date`, `pbPath`) VALUES
(12, 'administrator', '$2y$11$pb5Cle1z2fSvnqqOo2YncetXacs.S1PykCuHsqS4Yz4RWa9Q49IRu', 'Tim', 'Herman', 'admin@test.com', '2018-01-03 18:25:00', NULL);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `tb_exercise`
--
ALTER TABLE `tb_exercise`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indizes für die Tabelle `tb_exercisehasmuscle`
--
ALTER TABLE `tb_exercisehasmuscle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exercise_id` (`exercise_id`),
  ADD KEY `muscle_id` (`muscle_id`);

--
-- Indizes für die Tabelle `tb_modul`
--
ALTER TABLE `tb_modul`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `tb_motivations`
--
ALTER TABLE `tb_motivations`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `tb_muscle`
--
ALTER TABLE `tb_muscle`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `tb_exercise`
--
ALTER TABLE `tb_exercise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `tb_exercisehasmuscle`
--
ALTER TABLE `tb_exercisehasmuscle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `tb_modul`
--
ALTER TABLE `tb_modul`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT für Tabelle `tb_motivations`
--
ALTER TABLE `tb_motivations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT für Tabelle `tb_muscle`
--
ALTER TABLE `tb_muscle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT für Tabelle `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `tb_exercise`
--
ALTER TABLE `tb_exercise`
  ADD CONSTRAINT `tb_exercise_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tb_user` (`id`);

--
-- Constraints der Tabelle `tb_exercisehasmuscle`
--
ALTER TABLE `tb_exercisehasmuscle`
  ADD CONSTRAINT `tb_exercisehasmuscle_ibfk_1` FOREIGN KEY (`exercise_id`) REFERENCES `tb_exercise` (`id`),
  ADD CONSTRAINT `tb_exercisehasmuscle_ibfk_2` FOREIGN KEY (`muscle_id`) REFERENCES `tb_muscle` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
