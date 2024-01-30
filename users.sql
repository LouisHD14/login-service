-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 30. Jan 2024 um 20:44
-- Server-Version: 10.4.32-MariaDB
-- PHP-Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `codingag-checkin`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `dates` longtext NOT NULL,
  `admin` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `user_name`, `password`, `date`, `dates`, `admin`) VALUES
(8, 'Taira', '5964c5817b973945e9150c8425515420', '2024-01-20', '0000-00-00,2024-01-20', 0),
(9, 'lulubär', 'ba793e6eba16d1d4e5673976b9be2c46', '0000-00-00', '0000-00-00,2024-01-21', 0),
(10, 'sddfgdfgdfg', 'ba793e6eba16d1d4e5673976b9be2c46', '0000-00-00', '0000-00-00', 0),
(11, 'Theobaby', '25d55ad283aa400af464c76d713c07ad', '0000-00-00', '0000-00-00', 0),
(14, 'louis2', 'c81e728d9d4c2f636f067f89cc14862c', '2024-01-20', '0000-00-00,2024-01-19,2024-01-19,2024-01-19,2024-01-19,2024-01-19,2024-01-19,2024-01-19,2024-01-19,2024-01-19,2024-01-19,2024-01-19,2024-01-19,2024-01-19,2024-01-19,2024-01-20', 1),
(15, 'papa', 'c4ca4238a0b923820dcc509a6f75849b', '2024-01-19', ',2024-01-19,2024-01-19,2024-01-19,2024-01-19,2024-01-19', 1),
(17, 'louis3', 'c81e728d9d4c2f636f067f89cc14862c', '0000-00-00', '', 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
