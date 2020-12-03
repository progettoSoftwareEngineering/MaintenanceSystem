-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Dic 03, 2020 alle 12:23
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
(1, 'ATVE', 'EVTA', 'bingtbangt', '123456', 'atve@evta.com', 'NS', '2021-05-10', 'SA'),
(2, 'Veronica', 'Salvati', 'vsal', '123456', 'vasl@salvini.com', 'NS', '2020-12-22', 'PL'),
(3, 'Toni', 'Pannese', 't.pannese', '123456', 't.pannese@pannese.t.com', 'M', '2021-01-01', 'PL'),
(4, 'Tatonno', 'Toni', 'a.solimine', '123456', 'a.solimine@pannese.t.com', 'NS', '2021-01-01', 'PL');

-- --------------------------------------------------------

--
-- Struttura della tabella `activity`
--

CREATE TABLE `activity` (
  `id` int(11) NOT NULL,
  `site` varchar(255) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `estimatedTime` int(11) NOT NULL,
  `typology` varchar(255) NOT NULL,
  `interruptible` tinyint(1) NOT NULL,
  `week` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `materials`
--

CREATE TABLE `materials` (
  `id` int(11) NOT NULL,
  `sites` varchar(255) CHARACTER SET utf8 NOT NULL,
  `brand` varchar(255) CHARACTER SET utf8 NOT NULL,
  `lot` varchar(255) CHARACTER SET utf8 NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `yearProd` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Lotto` (`lot`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `materials`
--
ALTER TABLE `materials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
