-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 05. Feb 2018 um 20:26
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
-- Datenbank: `marzian_ws`
--

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
-- Indizes für die Tabelle `hersteller`
--
ALTER TABLE `hersteller`
  ADD PRIMARY KEY (`Hid`);

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
-- AUTO_INCREMENT für Tabelle `hersteller`
--
ALTER TABLE `hersteller`
  MODIFY `Hid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `kunde`
--
ALTER TABLE `kunde`
  MODIFY `Kid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `produkt`
--
ALTER TABLE `produkt`
  MODIFY `ArtNr` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `rechnung`
--
ALTER TABLE `rechnung`
  MODIFY `BID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
