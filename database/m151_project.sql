-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 07. Jan 2018 um 06:18
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
-- Tabellenstruktur für Tabelle `tb_changpasstoken`
--

CREATE TABLE `tb_changpasstoken` (
  `id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `token` varchar(50) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(34, 'LiegestÃ¼tze', 12, 'Rauf und Runter mit den Adrmenasd'),
(35, 'Kniebeugen', 12, 'Nach oben und unten mit OberkÃ¶rper'),
(36, 'Beinschere Links', 12, 'Linkes Beim hoch und runter'),
(37, 'Beinschere Rechts', 12, 'Rechtes Bein hoch und runter'),
(48, 'Kreuzheben', 13, 'Kreuzheben kann den Unterschied zwischen einer gut ausgeprÃ¤gten und einer herausragend gut ausgeprÃ¤gten RÃ¼ckenmuskulatur machen.'),
(49, 'RÃ¼cken Flieger', 13, 'Dieses workout eignet sich hervorragend zur Aktivierung und zum Muskelaufbau ihrer Arme und Schultern. GekrÃ¤ftigt wird dabei vor allem der obere und mittlere RÃ¼cken.'),
(50, 'BeingrÃ¤tsche', 13, 'Zum Abnehmen und Muskelaufbau das workout fÃ¼r den unteren KÃ¶rperberfffeich. Nicht nur der untere KÃ¶rper werden durch diese FitnessÃ¼bungen erwÃ¤rmt. Ihre gesamten Muskeln werden dabei leicht erwÃ¤rmt. Zudem aktivieren Sie ihr Herz-Kreislaufsystem.'),
(51, 'BrÃ¼cke liegend', 13, 'Das Workout eignet sich gut zur KrÃ¤ftigung der Rumpfmuskulatur und sorgt fÃ¼r eine stabile KÃ¶rpermitte. Es verhilft ihnen zu einer aufrechten und stabilen Haltung. Zudem krÃ¤ftigt die BrÃ¼cke optimal ihren unteren RÃ¼cken, ihre Pomuskulatur und die Muskulatur der BeinrÃ¼ckseite.'),
(52, 'Schulter heben', 14, 'Das Training zur StÃ¤rkung als auch zur ErwÃ¤rmung ihrer Muskulatur. GestÃ¤rkt wird mit dieser Ãœbung der obere Anteil des Trapezius-Muskels, also des Muskels der sich wie ein Trapez Ã¼ber den RÃ¼cken spannt. Der Nackenbereich wird gestÃ¤rkt gleichzeit straff. '),
(53, 'KÃ¤fer', 14, 'Eine der guten FitnessÃ¼bungen fÃ¼r einen tollen Sixpack. Mit diesen FitnessÃ¼bungen bekommen Sie Ihr Gewicht in den Griff. Sie stÃ¤rken dabei den Bauch und beugen damit auch Haltungsproblemen vor, die oft durch die Schwierigkeit einer zu schwachen Rumpfmuskulatur entstehen.'),
(54, 'Rumpfdrehung', 14, 'Mit diesen Ãœbungen beanspruchen Sie vor allem die seitliche Bauchmuskulatur zum Abnehmen und Muskelaufbau. ZusÃ¤tzlich ist ein kleiner Ball empfehlenswert, muss jedoch nich sein. Setzen Sie sich auf die Erde. Ihre Knie sind leicht vor ihnen angewinkelt. ');

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
(53, 37, 12),
(101, 48, 10),
(102, 48, 13),
(103, 49, 6),
(104, 49, 10),
(105, 49, 13),
(106, 49, 14),
(107, 50, 11),
(108, 50, 12),
(109, 51, 6),
(110, 51, 10),
(111, 51, 12),
(112, 52, 5),
(113, 52, 6),
(114, 52, 7),
(115, 53, 5),
(116, 53, 6),
(117, 53, 7),
(118, 53, 8),
(119, 53, 10),
(120, 53, 13),
(121, 53, 15),
(122, 54, 6),
(123, 54, 7),
(124, 54, 9),
(125, 54, 10),
(126, 54, 11),
(127, 54, 12),
(128, 54, 13),
(129, 54, 14),
(178, 50, 8),
(179, 50, 10);

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
(1, 'dashboard', 'startseite', 'modul/start.php', 'Dashboard'),
(2, 'Alle Pläne (Öffentlich)', 'Andere Pläne anschauen, Favorisieren', 'modul/publicPlan.php', 'Alle Pläne'),
(3, 'Meine Pläne (Privat)', 'Plan erstellen, bearbeiten, löschen', 'modul/userPlan.php', 'Meine Pläne'),
(5, 'Übung hinzufügen', 'Übung hinzufügen', 'modul/exercise.php', 'Meine Übungen'),
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
-- Tabellenstruktur für Tabelle `tb_news`
--

CREATE TABLE `tb_news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `tb_news`
--

INSERT INTO `tb_news` (`id`, `title`, `content`, `date`) VALUES
(1, 'Alpha Released', 'Die Alpha-Version ist nun mit dem einbau des \"News\"-Abschnittes auf dem Dashboard offiziell released.', '2018-01-05 15:40:18'),
(2, 'Beta Released', 'In der Beta-Version der Applikation wurden einige Bugs behoben und weitere Funktionen hinzugefügt. Zur besseren Usability wurden einige Feedbacks ergänzt. Die Passwort-zurücksetzen Funktion im Profil ist nun voll funktionsfähig. Den kompletten Änderungsverlauf ist auf <a href=\"https://github.com/GianlucaFrongia/M151-Project/commits/master\">Github</a>  zu finden.', '2018-01-07 05:09:27');

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

--
-- Daten für Tabelle `tb_plan`
--

INSERT INTO `tb_plan` (`id`, `name`, `description`, `creator`) VALUES
(8, 'Morgenroutine', 'Um jeden Morgen gleich Fit zu werden', 12),
(9, 'Sprint-Workout', 'TÃ¤gliche Dosis an Testosteron und Anabolika.', 12),
(10, 'Abendgymnastik', 'Nach diesem Plan sind alle Gelenke wieder in Takt und man kann gemÃ¼tlich schlafen.', 12),
(11, 'Zu Hause Abnehmen', 'Mit diesen Ãœbungen kann man ganz einfach zu Hause abnehmen.', 13),
(12, 'KrÃ¤ftiger RÃ¼cken', 'Mit dieser Ãœbung schÃ¼tzen Sie ihren RÃ¼cken vor Schmerzen', 13),
(13, 'Extreme-Kondition', 'Durch den schnellen Wechsel der Aufgaben soll die Kondition gestÃ¤rkt werden.', 14),
(14, 'Schlaf-Selbst-Hypnose', 'Nach dieser Ãœbung sind die Muskeln entspannt, was beim Einschlafen hilft.', 14);

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

--
-- Daten für Tabelle `tb_planhasexercise`
--

INSERT INTO `tb_planhasexercise` (`id`, `plan_id`, `exercise_id`, `repetitions`, `sets`) VALUES
(24, 8, 34, 20, 3),
(25, 8, 35, 40, 3),
(26, 8, 36, 40, 1),
(27, 8, 37, 40, 1),
(28, 8, 36, 40, 1),
(29, 8, 37, 40, 1),
(30, 9, 34, 50, 2),
(31, 9, 35, 50, 3),
(32, 9, 36, 50, 1),
(33, 9, 37, 50, 1),
(34, 10, 36, 10, 1),
(35, 10, 37, 10, 1),
(36, 10, 36, 20, 1),
(37, 10, 37, 20, 1),
(38, 11, 48, 15, 3),
(39, 11, 49, 60, 3),
(40, 11, 50, 30, 3),
(41, 12, 49, 60, 2),
(42, 12, 51, 60, 2),
(43, 13, 52, 30, 1),
(44, 13, 53, 30, 1),
(45, 13, 54, 30, 1),
(46, 13, 52, 30, 1),
(47, 13, 53, 30, 1),
(48, 13, 54, 30, 1),
(49, 13, 52, 60, 1),
(50, 13, 53, 60, 1),
(51, 13, 54, 60, 1),
(52, 14, 53, 60, 3);

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
(12, 'awecklenbuch', '$2y$11$AQvu5uLS9U5diYXNI2RxvePOXvPwL5mDxd0o8UidmbDNoFq.cycOW', 'Adam', 'Wecklenbuch', 'admin@test.com', '2018-01-07 05:14:53', 'userpb/pb2.jpg'),
(13, 'mansalthe', '$2y$11$AQvu5uLS9U5diYXNI2RxvePOXvPwL5mDxd0o8UidmbDNoFq.cycOW', 'Manuel', 'SalbeithÃ¨f', 'test@user.comr', '2018-01-07 05:15:17', 'userpb/pb1.jpg'),
(14, 'schadmark', '$2y$11$AQvu5uLS9U5diYXNI2RxvePOXvPwL5mDxd0o8UidmbDNoFq.cycOW', 'Maria', 'SchÃ¤deli', 'test@user.com', '2018-01-07 05:15:36', 'userpb/pb3.jpg');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tb_userhasfavorite`
--

CREATE TABLE `tb_userhasfavorite` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `plan_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `tb_userhasfavorite`
--

INSERT INTO `tb_userhasfavorite` (`id`, `user_id`, `plan_id`) VALUES
(41, 14, 11),
(42, 14, 10),
(43, 14, 8),
(44, 12, 13),
(45, 12, 12),
(46, 12, 14),
(48, 13, 14),
(63, 13, 10),
(64, 13, 9);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `tb_changpasstoken`
--
ALTER TABLE `tb_changpasstoken`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

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
-- Indizes für die Tabelle `tb_news`
--
ALTER TABLE `tb_news`
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
-- Indizes für die Tabelle `tb_userhasfavorite`
--
ALTER TABLE `tb_userhasfavorite`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `plan_id` (`plan_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `tb_changpasstoken`
--
ALTER TABLE `tb_changpasstoken`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT für Tabelle `tb_exercise`
--
ALTER TABLE `tb_exercise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;
--
-- AUTO_INCREMENT für Tabelle `tb_exercisehasmuscle`
--
ALTER TABLE `tb_exercisehasmuscle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;
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
-- AUTO_INCREMENT für Tabelle `tb_news`
--
ALTER TABLE `tb_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT für Tabelle `tb_plan`
--
ALTER TABLE `tb_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT für Tabelle `tb_planhasexercise`
--
ALTER TABLE `tb_planhasexercise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT für Tabelle `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT für Tabelle `tb_userhasfavorite`
--
ALTER TABLE `tb_userhasfavorite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `tb_changpasstoken`
--
ALTER TABLE `tb_changpasstoken`
  ADD CONSTRAINT `tb_changpasstoken_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tb_user` (`id`);

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

--
-- Constraints der Tabelle `tb_userhasfavorite`
--
ALTER TABLE `tb_userhasfavorite`
  ADD CONSTRAINT `tb_userhasfavorite_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tb_user` (`id`),
  ADD CONSTRAINT `tb_userhasfavorite_ibfk_2` FOREIGN KEY (`plan_id`) REFERENCES `tb_plan` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
