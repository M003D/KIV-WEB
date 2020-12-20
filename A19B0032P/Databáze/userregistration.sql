-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Pon 21. pro 2020, 00:12
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
-- Databáze: `userregistration`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `userreservation`
--

CREATE TABLE `userreservation` (
  `user` varchar(100) NOT NULL,
  `u_name` varchar(100) NOT NULL,
  `u_surrname` varchar(100) NOT NULL,
  `u_adress` varchar(100) NOT NULL,
  `u_town` varchar(100) NOT NULL,
  `u_post_code` int(100) NOT NULL,
  `u_tel_phone` int(100) NOT NULL,
  `u_email` varchar(100) NOT NULL,
  `h_name` varchar(100) NOT NULL,
  `h_town` varchar(100) NOT NULL,
  `h_adress` varchar(100) NOT NULL,
  `h_post_code` int(100) NOT NULL,
  `h_tel_phone` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vypisuji data pro tabulku `userreservation`
--

INSERT INTO `userreservation` (`user`, `u_name`, `u_surrname`, `u_adress`, `u_town`, `u_post_code`, `u_tel_phone`, `u_email`, `h_name`, `h_town`, `h_adress`, `h_post_code`, `h_tel_phone`) VALUES
('jan', 'Jan', 'Janáček', 'Školní 15', 'Most', 877, 666325987, 'jan@email.cz', 'Hotel Trinity ', 'Plzeň', 'Dobromysl 10', 30155, 881157963),
('vajsbi', 'Marek', 'Vajšejn', 'Testovací 15', 'Poděbrady', 403, 744, 'vajsbi@email.cz', 'Hotel Domino ', 'Plzeň', 'Jana 18', 30100, 773688971),
('vajsbi', 'Petra', 'Hrubá', 'Testovací 15', 'Poděbrady', 403, 744, 'hruba@email.cz', 'Hotel Palác ', 'Plzeň', 'Krupská 57', 30100, 825696447);

-- --------------------------------------------------------

--
-- Struktura tabulky `usertable`
--

CREATE TABLE `usertable` (
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vypisuji data pro tabulku `usertable`
--

INSERT INTO `usertable` (`name`, `password`) VALUES
('admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918'),
('jan', '6a0ac0fd972c325d6ca5512b67a5e0ad996c4a3e9b59971d125164e6d4db1a1c'),
('testing', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08'),
('vajsbi', 'bb196a9f86b3d9edcd41530d9821351551158032e016e20b236bdf89a2605020');

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `userreservation`
--
ALTER TABLE `userreservation`
  ADD PRIMARY KEY (`u_name`);

--
-- Klíče pro tabulku `usertable`
--
ALTER TABLE `usertable`
  ADD PRIMARY KEY (`name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
