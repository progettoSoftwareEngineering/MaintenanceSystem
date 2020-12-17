-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Dic 16, 2020 alle 15:35
-- Versione del server: 10.1.38-MariaDB
-- Versione PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ipm`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(2) NOT NULL,
  `birthday` date NOT NULL,
  `userType` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `accounts`
--

INSERT INTO `accounts` (`id`, `name`, `surname`, `username`, `password`, `email`, `gender`, `birthday`, `userType`) VALUES
(1, 'Alex', 'Solimine', 'alessio', '12345', 'alex@solimine.com', 'M', '1996-05-10', 'SA'),
(2, 'Emidio', 'Pierro', 'emidio', '12345', 'emidio@pierro.com', 'M', '1997-07-21', 'RM'),
(3, 'Toni', 'Pannese', 'toni', '12345', 'toni@pannese.com', 'NS', '2021-02-10', 'PL'),
(4, 'Veronica', 'Salvati', 'veronica', '12345', 'veronica@salvati.com', 'F', '2020-12-01', 'MT');

-- --------------------------------------------------------

--
-- Struttura della tabella `activity`
--

CREATE TABLE `activity` (
  `id` int(11) NOT NULL,
  `sitesId` int(11) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `estimatedTime` int(11) NOT NULL,
  `typology` varchar(255) NOT NULL,
  `interruptible` tinyint(1) NOT NULL,
  `week` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `activity`
--

INSERT INTO `activity` (`id`, `sitesId`, `description`, `estimatedTime`, `typology`, `interruptible`, `week`) VALUES
(1, 1, 'Minor electrical machine problem', 90, 'Electronics', 1, 52),
(2, 1, 'Some machines seems to be stuck', 30, 'Mechanical', 0, 50);

-- --------------------------------------------------------

--
-- Struttura della tabella `materials`
--

CREATE TABLE `materials` (
  `id` int(11) NOT NULL,
  `sitesId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `materials`
--

INSERT INTO `materials` (`id`, `sitesId`, `name`) VALUES
(1, 1, 'Tessuto A01');

-- --------------------------------------------------------

--
-- Struttura della tabella `sites`
--

CREATE TABLE `sites` (
  `id` int(11) NOT NULL,
  `workArea` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `sites`
--

INSERT INTO `sites` (`id`, `workArea`, `name`) VALUES
(1, 'Pellame', 'Solofra'),
(2, 'Ingegneria', 'Scampitella');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indici per le tabelle `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sitesId` (`sitesId`);

--
-- Indici per le tabelle `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sitesId` (`sitesId`) USING BTREE;

--
-- Indici per le tabelle `sites`
--
ALTER TABLE `sites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ID` (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT per la tabella `activity`
--
ALTER TABLE `activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `materials`
--
ALTER TABLE `materials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la tabella `sites`
--
ALTER TABLE `sites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `activity`
--
ALTER TABLE `activity`
  ADD CONSTRAINT `activity_ibfk_1` FOREIGN KEY (`sitesId`) REFERENCES `sites` (`id`);

--
-- Limiti per la tabella `materials`
--
ALTER TABLE `materials`
  ADD CONSTRAINT `materials_ibfk_1` FOREIGN KEY (`sitesId`) REFERENCES `sites` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
