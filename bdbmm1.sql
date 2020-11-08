-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 08 Lis 2020, 19:31
-- Wersja serwera: 10.4.8-MariaDB
-- Wersja PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `bdbmm1`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `podanie`
--

CREATE TABLE `podanie` (
  `id_podania` int(11) NOT NULL,
  `id_uzytkownika` int(11) NOT NULL,
  `imie` text COLLATE utf8_bin NOT NULL,
  `nazwisko` text COLLATE utf8_bin NOT NULL,
  `data_urodzenia` date DEFAULT NULL,
  `plec` char(1) COLLATE utf8_bin DEFAULT NULL,
  `ocena_rekruta` int(11) DEFAULT NULL,
  `decyzja` tinyint(1) DEFAULT NULL,
  `uzasadnienie_decyzji` text COLLATE utf8_bin NOT NULL,
  `zatrudniono` tinyint(1) DEFAULT NULL,
  `etap_rekrutacji` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Zrzut danych tabeli `podanie`
--

INSERT INTO `podanie` (`id_podania`, `id_uzytkownika`, `imie`, `nazwisko`, `data_urodzenia`, `plec`, `ocena_rekruta`, `decyzja`, `uzasadnienie_decyzji`, `zatrudniono`, `etap_rekrutacji`) VALUES
(2, 2, 'Jakub', 'Wołodyjowski', '1998-11-09', 'M', NULL, NULL, '', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownik`
--

CREATE TABLE `uzytkownik` (
  `typ_uzytkownika` enum('administrator','kierownik','asystent','petent') COLLATE utf8_bin NOT NULL,
  `id_uzytkownika` int(11) NOT NULL,
  `nazwa_uzytkownika` text COLLATE utf8_bin NOT NULL,
  `haslo` text COLLATE utf8_bin NOT NULL,
  `czy_usuniety` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Zrzut danych tabeli `uzytkownik`
--

INSERT INTO `uzytkownik` (`typ_uzytkownika`, `id_uzytkownika`, `nazwa_uzytkownika`, `haslo`, `czy_usuniety`) VALUES
('petent', 2, 'petent1', 'petent', 0),
('petent', 3, 'petent2', 'petent', 1),
('administrator', 4, 'administrator', 'admin', 0),
('petent', 10, 'zdzisiuwiertara', 'asdf', 1),
('petent', 11, 'panpawel', 'hselko', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wyksztalcenie`
--

CREATE TABLE `wyksztalcenie` (
  `klucz_wyksztalcenie` int(11) NOT NULL,
  `id_uzytkownika` int(11) NOT NULL,
  `poziom` enum('podstawowe','zawodowe','średnie','techniczne','wyższe') COLLATE utf8_bin NOT NULL,
  `nazwa_szkoly` text COLLATE utf8_bin NOT NULL,
  `rok_rozpoczecia` int(11) NOT NULL,
  `rok_zakonczenia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Zrzut danych tabeli `wyksztalcenie`
--

INSERT INTO `wyksztalcenie` (`klucz_wyksztalcenie`, `id_uzytkownika`, `poziom`, `nazwa_szkoly`, `rok_rozpoczecia`, `rok_zakonczenia`) VALUES
(3, 2, 'średnie', 'Zespół Szkół Łączności', 2014, 2018),
(5, 2, 'podstawowe', 'Szkoła Podstawowa nr 5 im. Józefa Piłsudskiego w Krapkowicach', 2005, 2011);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `podanie`
--
ALTER TABLE `podanie`
  ADD PRIMARY KEY (`id_podania`),
  ADD KEY `id_uzytkownika` (`id_uzytkownika`);

--
-- Indeksy dla tabeli `uzytkownik`
--
ALTER TABLE `uzytkownik`
  ADD PRIMARY KEY (`id_uzytkownika`);

--
-- Indeksy dla tabeli `wyksztalcenie`
--
ALTER TABLE `wyksztalcenie`
  ADD PRIMARY KEY (`klucz_wyksztalcenie`),
  ADD KEY `id_uzytkownika` (`id_uzytkownika`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `podanie`
--
ALTER TABLE `podanie`
  MODIFY `id_podania` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `uzytkownik`
--
ALTER TABLE `uzytkownik`
  MODIFY `id_uzytkownika` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT dla tabeli `wyksztalcenie`
--
ALTER TABLE `wyksztalcenie`
  MODIFY `klucz_wyksztalcenie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `podanie`
--
ALTER TABLE `podanie`
  ADD CONSTRAINT `podanie_ibfk_1` FOREIGN KEY (`id_uzytkownika`) REFERENCES `uzytkownik` (`id_uzytkownika`);

--
-- Ograniczenia dla tabeli `wyksztalcenie`
--
ALTER TABLE `wyksztalcenie`
  ADD CONSTRAINT `wyksztalcenie_ibfk_1` FOREIGN KEY (`id_uzytkownika`) REFERENCES `uzytkownik` (`id_uzytkownika`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
