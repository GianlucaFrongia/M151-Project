-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 09. Jan 2018 um 15:22
-- Server-Version: 10.1.29-MariaDB
-- PHP-Version: 7.2.0

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
CREATE DATABASE IF NOT EXISTS `m151_project` DEFAULT CHARACTER SET utf8 COLLATE utf8_german2_ci;
USE `m151_project`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tb_changpasstoken`
--

CREATE TABLE `tb_changpasstoken` (
  `id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `token` varchar(50) COLLATE utf8_german2_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tb_exercise`
--

CREATE TABLE `tb_exercise` (
  `id` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8_german2_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `description` text COLLATE utf8_german2_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

--
-- Daten für Tabelle `tb_exercise`
--

INSERT INTO `tb_exercise` (`id`, `name`, `user_id`, `description`) VALUES
(34, 'Liegestütze', 12, 'Rauf und Runter mit den Adrmenasd'),
(35, 'Kniebeugen', 12, 'Nach oben und unten mit Oberkörper'),
(36, 'Beinschere Links', 12, 'Linkes Beim hoch und runter'),
(37, 'Beinschere Rechts', 12, 'Rechtes Bein hoch und runter'),
(48, 'Kreuzheben', 13, 'Kreuzheben kann den Unterschied zwischen einer gut ausgeprägten und einer herausragend gut ausgeprägten Rückenmuskulatur machen.'),
(49, 'Rücken Flieger', 13, 'Dieses workout eignet sich hervorragend zur Aktivierung und zum Muskelaufbau ihrer Arme und Schultern. Gekräftigt wird dabei vor allem der obere und mittlere Rücken.'),
(50, 'Beingrätsche', 13, 'Zum Abnehmen und Muskelaufbau das workout für den unteren Körperberfffeich. Nicht nur der untere Körper werden durch diese Fitnessübungen erwärmt. Ihre gesamten Muskeln werden dabei leicht erwärmt. Zudem aktivieren Sie ihr Herz-Kreislaufsystem.'),
(51, 'Brücke liegend', 13, 'Das Workout eignet sich gut zur Kräftigung der Rumpfmuskulatur und sorgt für eine stabile Körpermitte. Es verhilft ihnen zu einer aufrechten und stabilen Haltung. Zudem kräftigt die Brücke optimal ihren unteren Rücken, ihre Pomuskulatur und die Muskulatur der Beinrückseite.'),
(52, 'Schulter heben', 14, 'Das Training zur Stärkung als auch zur Erwärmung ihrer Muskulatur. Gestärkt wird mit dieser Übung der obere Anteil des Trapezius-Muskels, also des Muskels der sich wie ein Trapez über den Rücken spannt. Der Nackenbereich wird gestärkt gleichzeit straff. '),
(53, 'Käfer', 14, 'Eine der guten Fitnessübungen für einen tollen Sixpack. Mit diesen Fitnessübungen bekommen Sie Ihr Gewicht in den Griff. Sie stärken dabei den Bauch und beugen damit auch Haltungsproblemen vor, die oft durch die Schwierigkeit einer zu schwachen Rumpfmuskulatur entstehen.'),
(54, 'Rumpfdrehung', 14, 'Mit diesen Übungen beanspruchen Sie vor allem die seitliche Bauchmuskulatur zum Abnehmen und Muskelaufbau. Zusätzlich ist ein kleiner Ball empfehlenswert, muss jedoch nich sein. Setzen Sie sich auf die Erde. Ihre Knie sind leicht vor ihnen angewinkelt. '),
(98, 'Beine dehnen', 28, 'Auf den Boden setzen. Das linke Bein ausstrecken, das rechte Bein anwinkeln und den Fuss gegen den linken Oberschenkel pressen. Den linken Fuss aufstellen, die Spitze zeigt so weit wie möglich zum Körper. Nun mit geradem Rücken nach vorne lehnen und die linke Fussspitze mit beiden Händen berühren, bestenfalls umfassen und nach vorne ziehen.'),
(99, 'Wade dehnen', 28, 'Stellen Sie sich einen guten Meter entfernt vor einem Baum oder einer Wand auf. Strecken Sie nun die Arme nach vorn aus und lehnen Sie sich gegen den Baum. Ziehen Sie dabei das linke Bein leicht angewinkelt mit nach vorn, während das rechte Bein gestreckt bleibt.'),
(100, 'Oberschenkel dehnen', 28, 'Gerade aufstellen. Der Blick ist nach vorn gerichtet. Nun das rechte Bein nach hinten anwinkeln bis die Ferse den Po berührt. Die Oberschenkel beider Beine bleiben parallel. Umfassen Sie den rechten Fuss mit beiden Händen und pressen Sie ihn gegen den Rücken.'),
(101, 'Rücken dehnen', 28, 'Knien Sie sich auf den Boden. Nun nach vorne einen Katzenbuckel machen und den Oberkörper auf dem Schoss ablegen. Der Kopf ist in der Verlängerung der Wirbelsäule. Strecken Sie beide Arme so weit wie möglich nach vorn aus, sodass der Rücken gedehnt und entspannt wird.'),
(102, 'Seitbeuge', 28, ' Zum Aufwärmen breitbeinig hinstellen, die Arme anwinkeln und in die Hüften stemmen. Nun vorsichtig soweit es geht zur linken Seite lehnen. Kurz halten, dann zur rechten Seite beugen. Beine und Hüfte bleiben dabei gerade, nur der Oberkörper soll sich bewegen.'),
(103, 'Tauziehen', 28, 'Nehmen Sie nun ein Theraband aus Gummi zwischen die Hände. Greifen Sie das Band mit beiden Händen, wobei Sie zunächst nur einen kleinen Abstand von etwa 15 Zentimeter zwischen den Fäusten lassen. Ziehen Sie das Band nun vor der Brust so weit wie möglich auseinander, halten Sie es fünf Sekunden und lassen Sie dann wieder locker.'),
(104, 'Elefantenrüssel', 28, 'Strecken Sie nun den rechten Arm auf Höhe der Schultern nach hinten zur linken Seite. Umfassen Sie mit der linken Hand den Ellbogen des rechten Arms und pressen Sie so den Arm gegen den Körper. Zehn Sekunden halten, dann die Seiten wechseln.');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tb_exercisehasmuscle`
--

CREATE TABLE `tb_exercisehasmuscle` (
  `id` int(11) NOT NULL,
  `exercise_id` int(11) NOT NULL,
  `muscle_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

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
(179, 50, 10),
(198, 98, 5),
(199, 98, 9),
(200, 98, 13),
(201, 99, 6),
(202, 99, 9),
(203, 99, 11),
(204, 100, 6),
(205, 100, 9),
(206, 100, 11),
(207, 101, 7),
(208, 101, 9),
(209, 101, 12),
(210, 102, 5),
(211, 102, 9),
(212, 102, 11),
(213, 103, 1),
(214, 103, 10),
(215, 103, 13),
(216, 104, 5),
(217, 104, 6),
(218, 104, 7);

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
  `title` varchar(30) COLLATE utf8_german2_ci NOT NULL,
  `description` text COLLATE utf8_german2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

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
  `name` varchar(45) COLLATE utf8_german2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

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
  `title` varchar(255) COLLATE utf8_german2_ci NOT NULL,
  `content` text COLLATE utf8_german2_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

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
  `name` varchar(45) COLLATE utf8_german2_ci NOT NULL,
  `description` text COLLATE utf8_german2_ci,
  `creator` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

--
-- Daten für Tabelle `tb_plan`
--

INSERT INTO `tb_plan` (`id`, `name`, `description`, `creator`) VALUES
(8, 'Morgenroutine', 'Um jeden Morgen gleich Fit zu werden', 12),
(9, 'Sprint-Workout', 'Tägliche Dosis an Testosteron und Anabolika.', 12),
(10, 'Abendgymnastik', 'Nach diesem Plan sind alle Gelenke wieder in Takt und man kann gemütlich schlafen.', 12),
(11, 'Zu Hause Abnehmen', 'Mit diesen Übungen kann man ganz einfach zu Hause abnehmen.', 13),
(12, 'Kräftiger Rücken', 'Mit dieser Übung schützen Sie ihren Rücken vor Schmerzen', 13),
(13, 'Extreme-Kondition', 'Durch den schnellen Wechsel der Aufgaben soll die Kondition gestärkt werden.', 14),
(14, 'Schlaf-Selbst-Hypnose', 'Nach dieser Übung sind die Muskeln entspannt, was beim Einschlafen hilft.', 14),
(32, 'Dehnübungen', 'Dehnen vor Sport, dehnen nach Sport, wippend dehnen oder statisch dehnen, darf es schmerzen oder nur leicht ziehen â€“ um das Thema Dehnübungen ranken sich viele Sport-Mythen. Dabei ist es im Grunde ganz einfach: Tun Sie das beim Dehnen, was Ihnen gut tut.\n', 28),
(33, 'Seniorengymnastik', 'Nicht nur in jungen Jahren, sondern auch und gerade im Alter ist es enorm wichtig, sich sportlich zu betätigen. Senioren, die sich regelmässig bewegen, sind in der Regel körperlich und auch geistig weitaus fitter als Couchpotatoes im gleichen Alter. Natürlich sind Menschen über 70 nur noch selten zu sportlichen Höchstleistungen fähig.', 28);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

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
(52, 14, 53, 60, 3),
(73, 32, 98, 2, 15),
(74, 32, 99, 2, 15),
(75, 32, 100, 2, 15),
(76, 32, 101, 2, 15),
(77, 33, 102, 5, 5),
(78, 33, 103, 10, 2),
(79, 33, 104, 15, 30);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_german2_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_german2_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8_german2_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8_german2_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_german2_ci DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `pbPath` varchar(255) COLLATE utf8_german2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

--
-- Daten für Tabelle `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `password`, `firstname`, `lastname`, `email`, `reg_date`, `pbPath`) VALUES
(12, 'awecklenbuch', '$2y$11$AQvu5uLS9U5diYXNI2RxvePOXvPwL5mDxd0o8UidmbDNoFq.cycOW', 'Adam', 'Wecklenbuch', 'test@user.com', '2018-01-09 14:21:46', 'userpb/pb2.jpg'),
(13, 'mansalthe', '$2y$11$AQvu5uLS9U5diYXNI2RxvePOXvPwL5mDxd0o8UidmbDNoFq.cycOW', 'Manuel', 'SalbeithÃ¨f', 'test@user.comr', '2018-01-07 05:15:17', 'userpb/pb1.jpg'),
(14, 'schadmark', '$2y$11$AQvu5uLS9U5diYXNI2RxvePOXvPwL5mDxd0o8UidmbDNoFq.cycOW', 'Maria', 'Schädeli', 'test@user.com', '2018-01-07 05:15:36', 'userpb/pb3.jpg'),
(28, 'copernicus', '$2y$11$AQvu5uLS9U5diYXNI2RxvePOXvPwL5mDxd0o8UidmbDNoFq.cycOW', 'Elias', 'Matteo', 'test@user.com', '2018-01-09 14:21:49', 'userpb/eliareutlinger.jpg');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tb_userhasfavorite`
--

CREATE TABLE `tb_userhasfavorite` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `plan_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

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
(64, 13, 9),
(74, 28, 10),
(83, 28, 12);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT für Tabelle `tb_exercisehasmuscle`
--
ALTER TABLE `tb_exercisehasmuscle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=219;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT für Tabelle `tb_planhasexercise`
--
ALTER TABLE `tb_planhasexercise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT für Tabelle `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT für Tabelle `tb_userhasfavorite`
--
ALTER TABLE `tb_userhasfavorite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

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
