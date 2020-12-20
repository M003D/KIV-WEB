-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Pon 21. pro 2020, 00:05
-- Verze serveru: 10.4.17-MariaDB
-- Verze PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `hotel`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `hoteltable`
--

CREATE TABLE `hoteltable` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `town` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `post_code` int(5) NOT NULL,
  `tel_number` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vypisuji data pro tabulku `hoteltable`
--

INSERT INTO `hoteltable` (`id`, `name`, `town`, `street`, `post_code`, `tel_number`) VALUES
(1, 'Central Park', 'Plzeň', 'Hustitská 17', 30120, 774566987),
(2, 'Hotel Alley', 'Plzeň', 'Borský 53', 30100, 998666323),
(3, 'Hotel Domino', 'Plzeň', 'Jana 18', 30100, 773688971),
(4, 'Hotel Palác', 'Plzeň', 'Krupská 57', 30100, 825696447),
(5, 'Hotel Trinity', 'Plzeň', 'Dobromysl 10', 30155, 881157963),
(6, 'Penzion v Ráji', 'Plzeň', 'Trojice 15', 30100, 996421588);

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `hoteltable`
--
ALTER TABLE `hoteltable`
  ADD PRIMARY KEY (`name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
