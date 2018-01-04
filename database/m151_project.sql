-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 04. Jan 2018 um 16:20
-- Server-Version: 10.1.28-MariaDB
-- PHP-Version: 7.1.11

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

--
-- Daten für Tabelle `tb_exercise`
--

INSERT INTO `tb_exercise` (`id`, `name`, `user_id`, `description`) VALUES
(34, 'LiegestÃ¼tze', 12, 'Rauf und Runter mit den Armen'),
(35, 'Kniebeugen', 12, 'Nach oben und unten mit OberkÃ¶rper'),
(36, 'Beinschere Links', 12, 'Linkes Beim hoch und runter'),
(37, 'Beinschere Rechts', 12, 'Rechtes Bein hoch und runter');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tb_exercisehasmuscle`
--

CREATE TABLE `tb_exercisehasmuscle` (
  `id` int(11) NOT NULL,
  `exercise_id` int(11) NOT NULL,
  `muscle_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `tb_exercisehasmuscle`
--

INSERT INTO `tb_exercisehasmuscle` (`id`, `exercise_id`, `muscle_id`) VALUES
(47, 34, 1),
(48, 34, 2),
(49, 35, 1),
(50, 36, 11),
(51, 36, 12),
(52, 37, 11),
(53, 37, 12);

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
(1, 'Vogelzwitschtern', 'Der Frühe Vogel fängt den Wurm'),
(3, 'Beginn', 'Was immer du tun kannst oder träumst es zu können, fang damit an.'),
(4, 'Spuren', 'Wer in die Fußstapfen anderer tritt, hinterlässt selbst keine Spuren.'),
(5, 'Kraft', 'Wenn es einen Glauben gibt, der Berge versetzen kann, so ist es der Glaube an die eigene Kraft.'),
(6, 'steinige Wege', 'Auf einfache Wege schickt man nur die Schwachen.'),
(7, 'goldener Lohn', 'Nichts, was sich zu haben lohnt, fällt einem in den Schoß.'),
(8, 'Fertigstellung', 'Das größte Vergnügen im Leben besteht darin, Dinge zu tun, die man nach Meinung anderer Leute nicht fertig bringt!'),
(9, 'Kraftschub', 'Trau lieber deiner Kraft als deinem Glück.'),
(10, 'Sein', 'Du kannst tun, was du tun willst. Du kannst sein, was du sein willst.'),
(11, 'Dreams', 'dreams dont work unless you do!'),
(12, 'Keep going', 'It doesnt matter how slowly you go as long as you dont stop! '),
(13, 'Believe in yourself', 'In order to succeed, we must first believe that we can.'),
(14, 'Keep going', 'Dont watch the clock, do what it does - keep going!');

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
(1, 'Brustmuskulatur'),
(2, 'Bizeps'),
(4, 'Trizeps'),
(5, 'vordere Schultermuskulatur'),
(6, 'hintere Schultermuskulatur'),
(7, 'mittlere Schultermuskulatur'),
(8, 'Latisimus'),
(9, 'Trapezmuskel'),
(10, 'Kreuz / untere Rückenmuskulatur'),
(11, 'Beinstrecker'),
(12, 'Beinbeuger'),
(13, 'Nackenmuskulatur'),
(14, 'seitliche Bauchmuskulatur'),
(15, 'untere Bauchmuskulatur'),
(16, 'obere Bauchmuskulatur');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tb_plan`
--

CREATE TABLE `tb_plan` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` text,
  `creator` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tb_planhasexercise`
--

CREATE TABLE `tb_planhasexercise` (
  `id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `exercise_id` int(11) NOT NULL,
  `repetitions` int(11) NOT NULL,
  `sets` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(12, 'administrator', '$2y$11$pb5Cle1z2fSvnqqOo2YncetXacs.S1PykCuHsqS4Yz4RWa9Q49IRu', 'Elisa', 'Hesmaa', 'admin@test.com', '2018-01-04 15:05:41', NULL);

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
-- Indizes für die Tabelle `tb_plan`
--
ALTER TABLE `tb_plan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `creator` (`creator`);

--
-- Indizes für die Tabelle `tb_planhasexercise`
--
ALTER TABLE `tb_planhasexercise`
  ADD PRIMARY KEY (`id`),
  ADD KEY `plan_id` (`plan_id`),
  ADD KEY `exercise_id` (`exercise_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT für Tabelle `tb_exercisehasmuscle`
--
ALTER TABLE `tb_exercisehasmuscle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT für Tabelle `tb_modul`
--
ALTER TABLE `tb_modul`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT für Tabelle `tb_motivations`
--
ALTER TABLE `tb_motivations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT für Tabelle `tb_muscle`
--
ALTER TABLE `tb_muscle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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

--
-- Constraints der Tabelle `tb_plan`
--
ALTER TABLE `tb_plan`
  ADD CONSTRAINT `tb_plan_ibfk_1` FOREIGN KEY (`creator`) REFERENCES `tb_user` (`id`);

--
-- Constraints der Tabelle `tb_planhasexercise`
--
ALTER TABLE `tb_planhasexercise`
  ADD CONSTRAINT `tb_planhasexercise_ibfk_1` FOREIGN KEY (`plan_id`) REFERENCES `tb_plan` (`id`),
  ADD CONSTRAINT `tb_planhasexercise_ibfk_2` FOREIGN KEY (`exercise_id`) REFERENCES `tb_exercise` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
