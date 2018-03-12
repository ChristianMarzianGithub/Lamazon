-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 13. Feb 2018 um 12:55
-- Server-Version: 10.1.30-MariaDB
-- PHP-Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `marzian_ws`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `benutzer`
--

CREATE TABLE `benutzer` (
  `BenutzerID` int(11) NOT NULL,
  `Kennung` text NOT NULL,
  `Passwort` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `benutzer`
--

INSERT INTO `benutzer` (`BenutzerID`, `Kennung`, `Passwort`) VALUES
(1, 'Test', 'TestPasswort'),
(2, 'admin', 'root');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `hersteller`
--

CREATE TABLE `hersteller` (
  `Hid` int(11) NOT NULL,
  `Name` text NOT NULL,
  `WebAdresse` text NOT NULL,
  `EMail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `hersteller`
--

INSERT INTO `hersteller` (`Hid`, `Name`, `WebAdresse`, `EMail`) VALUES
(1, 'Hewlett Packard', 'http://www.hp.de/', 'info@hp.de'),
(2, 'Siemens', 'www.siemens.de', 'support@siemens.de'),
(3, 'Medion', 'www.medion.de', 'support@medion.de');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kategorie`
--

CREATE TABLE `kategorie` (
  `KatID` int(11) NOT NULL,
  `Beschreibung` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `kategorie`
--

INSERT INTO `kategorie` (`KatID`, `Beschreibung`) VALUES
(1, 'Scanner'),
(2, 'Monitore'),
(3, 'Drucker');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kunde`
--

CREATE TABLE `kunde` (
  `Kid` int(11) NOT NULL,
  `Kennung` text NOT NULL,
  `Vorname` text NOT NULL,
  `Nachname` text NOT NULL,
  `Strasse` text NOT NULL,
  `PLZ` text NOT NULL,
  `Ort` text NOT NULL,
  `KontoNummer` text NOT NULL,
  `BLZ` text NOT NULL,
  `BankInstitut` text NOT NULL,
  `Passwort` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `produkt`
--

CREATE TABLE `produkt` (
  `ArtNr` int(11) NOT NULL,
  `Name` text NOT NULL,
  `Beschreibung` text NOT NULL,
  `Preis` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `produkt`
--

INSERT INTO `produkt` (`ArtNr`, `Name`, `Beschreibung`, `Preis`) VALUES
(1, 'HP ScanJet3300C', 'Flachbettscanner', '99'),
(2, 'HP ScanJet 2220A', 'Flachbettscanner', '56'),
(3, 'HP LaseerJet 3477C', 'Laserdrucker', '299'),
(4, 'HP LaserJet 7769 C', 'Farblaserdrucker', '1590'),
(5, 'MD 1772 JC', 'Monitor', '150'),
(6, 'MD 6155 AH', '17 Zoll TFT Bildschirm', '350'),
(7, 'MD 1334 S', 'Flachbettscanner', '65'),
(8, 'MD 2443 S', 'Flachbettscanner', '76'),
(9, 'SI 1221 C', '19 Zoll Monitor', '200'),
(10, 'SI 7822 TFT', '21 Zoll TFT-Monitor', '569'),
(11, 'SI P 3244', 'DIN A1 Plotter', '1590'),
(12, 'SI D 1121 C', 'Farblaserdrucker', '547');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `rechnung`
--

CREATE TABLE `rechnung` (
  `BID` int(11) NOT NULL,
  `Datum` date NOT NULL,
  `UhrzeitErstellung` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `benutzer`
--
ALTER TABLE `benutzer`
  ADD PRIMARY KEY (`BenutzerID`);

--
-- Indizes für die Tabelle `hersteller`
--
ALTER TABLE `hersteller`
  ADD PRIMARY KEY (`Hid`);

--
-- Indizes für die Tabelle `kategorie`
--
ALTER TABLE `kategorie`
  ADD PRIMARY KEY (`KatID`);

--
-- Indizes für die Tabelle `kunde`
--
ALTER TABLE `kunde`
  ADD PRIMARY KEY (`Kid`);

--
-- Indizes für die Tabelle `produkt`
--
ALTER TABLE `produkt`
  ADD PRIMARY KEY (`ArtNr`);

--
-- Indizes für die Tabelle `rechnung`
--
ALTER TABLE `rechnung`
  ADD PRIMARY KEY (`BID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `benutzer`
--
ALTER TABLE `benutzer`
  MODIFY `BenutzerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `hersteller`
--
ALTER TABLE `hersteller`
  MODIFY `Hid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `kategorie`
--
ALTER TABLE `kategorie`
  MODIFY `KatID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `kunde`
--
ALTER TABLE `kunde`
  MODIFY `Kid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `produkt`
--
ALTER TABLE `produkt`
  MODIFY `ArtNr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT für Tabelle `rechnung`
--
ALTER TABLE `rechnung`
  MODIFY `BID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
