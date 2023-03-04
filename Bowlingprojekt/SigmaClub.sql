-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: sql477.your-server.de
-- Erstellungszeit: 04. Mrz 2023 um 10:44
-- Server-Version: 10.5.18-MariaDB-0+deb11u1
-- PHP-Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `wip_p_wt`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `wt_Appointments`
--

CREATE TABLE `wt_Appointments` (
  `AppointmentID` int(10) UNSIGNED NOT NULL,
  `AppointmentDate` date NOT NULL,
  `TimeSlot` int(10) UNSIGNED NOT NULL,
  `CustomerFK` int(10) UNSIGNED NOT NULL,
  `ResourceID` int(10) UNSIGNED NOT NULL,
  `StartTime` datetime NOT NULL,
  `CRD` datetime NOT NULL,
  `CHD` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `wt_Appointments`
--

INSERT INTO `wt_Appointments` (`AppointmentID`, `AppointmentDate`, `TimeSlot`, `CustomerFK`, `ResourceID`, `StartTime`, `CRD`, `CHD`) VALUES
(6, '2022-11-01', 1, 1, 1, '2022-11-01 12:45:00', '2022-11-07 23:55:43', '2022-11-07 23:55:43');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `wt_Attendees`
--

CREATE TABLE `wt_Attendees` (
  `AppointmentFK` int(10) UNSIGNED NOT NULL,
  `AttendeeNr` tinyint(3) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `wt_Attendees`
--

INSERT INTO `wt_Attendees` (`AppointmentFK`, `AttendeeNr`) VALUES
(6, 5);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `wt_Customers`
--

CREATE TABLE `wt_Customers` (
  `CustomerID` int(10) UNSIGNED NOT NULL,
  `FirstName` text NOT NULL,
  `LastName` text NOT NULL,
  `Phone` text NOT NULL,
  `Mail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `wt_Customers`
--

INSERT INTO `wt_Customers` (`CustomerID`, `FirstName`, `LastName`, `Phone`, `Mail`) VALUES
(1, 'Alex', 'Schweizer', '123345', 'a.schweizer@rycola.ch');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `wt_Dates`
--

CREATE TABLE `wt_Dates` (
  `AppointmentDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `wt_Dates`
--

INSERT INTO `wt_Dates` (`AppointmentDate`) VALUES
('2022-11-01');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `wt_Resources`
--

CREATE TABLE `wt_Resources` (
  `ResourceID` int(5) UNSIGNED NOT NULL,
  `ResourceArt` enum('BowlingLane','Darts','AirHockey','TableTopSoccer','PoolBilliard') NOT NULL,
  `ResourceNr` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `wt_Resources`
--

INSERT INTO `wt_Resources` (`ResourceID`, `ResourceArt`, `ResourceNr`) VALUES
(1, 'BowlingLane', 10);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `wt_Slots`
--

CREATE TABLE `wt_Slots` (
  `SlotID` int(10) UNSIGNED NOT NULL,
  `StartTime` time NOT NULL,
  `EndTime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `wt_Slots`
--

INSERT INTO `wt_Slots` (`SlotID`, `StartTime`, `EndTime`) VALUES
(1, '18:45:00', '22:45:00');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `wt_Appointments`
--
ALTER TABLE `wt_Appointments`
  ADD PRIMARY KEY (`AppointmentID`),
  ADD KEY `ConstraintDate` (`AppointmentDate`),
  ADD KEY `ConstraintSlot` (`TimeSlot`),
  ADD KEY `ConstraintResource` (`ResourceID`),
  ADD KEY `ConstraintCustomer` (`CustomerFK`);

--
-- Indizes für die Tabelle `wt_Attendees`
--
ALTER TABLE `wt_Attendees`
  ADD PRIMARY KEY (`AppointmentFK`),
  ADD UNIQUE KEY `AttendeeNr` (`AttendeeNr`);

--
-- Indizes für die Tabelle `wt_Customers`
--
ALTER TABLE `wt_Customers`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Indizes für die Tabelle `wt_Dates`
--
ALTER TABLE `wt_Dates`
  ADD PRIMARY KEY (`AppointmentDate`);

--
-- Indizes für die Tabelle `wt_Resources`
--
ALTER TABLE `wt_Resources`
  ADD PRIMARY KEY (`ResourceID`);

--
-- Indizes für die Tabelle `wt_Slots`
--
ALTER TABLE `wt_Slots`
  ADD PRIMARY KEY (`SlotID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `wt_Appointments`
--
ALTER TABLE `wt_Appointments`
  MODIFY `AppointmentID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT für Tabelle `wt_Customers`
--
ALTER TABLE `wt_Customers`
  MODIFY `CustomerID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `wt_Resources`
--
ALTER TABLE `wt_Resources`
  MODIFY `ResourceID` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `wt_Slots`
--
ALTER TABLE `wt_Slots`
  MODIFY `SlotID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `wt_Appointments`
--
ALTER TABLE `wt_Appointments`
  ADD CONSTRAINT `ConstraintCustomer` FOREIGN KEY (`CustomerFK`) REFERENCES `wt_Customers` (`CustomerID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints der Tabelle `wt_Attendees`
--
ALTER TABLE `wt_Attendees`
  ADD CONSTRAINT `ConstraintAttendee` FOREIGN KEY (`AppointmentFK`) REFERENCES `wt_Appointments` (`AppointmentID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints der Tabelle `wt_Dates`
--
ALTER TABLE `wt_Dates`
  ADD CONSTRAINT `ConstraintDate` FOREIGN KEY (`AppointmentDate`) REFERENCES `wt_Appointments` (`AppointmentDate`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints der Tabelle `wt_Resources`
--
ALTER TABLE `wt_Resources`
  ADD CONSTRAINT `ConstraintResource` FOREIGN KEY (`ResourceID`) REFERENCES `wt_Appointments` (`ResourceID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints der Tabelle `wt_Slots`
--
ALTER TABLE `wt_Slots`
  ADD CONSTRAINT `ConstraintSlot` FOREIGN KEY (`SlotID`) REFERENCES `wt_Appointments` (`TimeSlot`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
