-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 16 Lis 2020, 21:00
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
-- Struktura tabeli dla tabeli `doswiadczenie`
--

CREATE TABLE `doswiadczenie` (
  `klucz_doswiadczenie` int(11) NOT NULL,
  `id_uzytkownika` int(11) NOT NULL,
  `nazwa_firmy` text COLLATE utf8_bin NOT NULL,
  `stanowisko` text COLLATE utf8_bin NOT NULL,
  `rok_rozp_d` int(11) NOT NULL,
  `rok_zak_d` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Zrzut danych tabeli `doswiadczenie`
--

INSERT INTO `doswiadczenie` (`klucz_doswiadczenie`, `id_uzytkownika`, `nazwa_firmy`, `stanowisko`, `rok_rozp_d`, `rok_zak_d`) VALUES
(3, 2, 'Intel', 'sprzataczka', 2002, 2012),
(5, 2, 'Mikrosoooooft', 'ochroniarz', 2001, 2022),
(6, 2, 'kerfur', 'sprzatacz', 1999, 2022),
(7, 2, 'lidl', 'kasjer', 1234, 1234);

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
(2, 2, 'Jakub', 'Wołodyjowski', '1998-11-09', 'M', NULL, NULL, '', NULL, NULL),
(3, 2, 'dasdfasfsda', 'dfgsfsdafads', '2020-11-22', 'K', NULL, NULL, '', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `szkolenia`
--

CREATE TABLE `szkolenia` (
  `klucz_szkolenia` int(11) NOT NULL,
  `id_uzytkownika` int(11) NOT NULL,
  `nazwa_szkolenia` text COLLATE utf8_bin NOT NULL,
  `rok_rozp_s` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Zrzut danych tabeli `szkolenia`
--

INSERT INTO `szkolenia` (`klucz_szkolenia`, `id_uzytkownika`, `nazwa_szkolenia`, `rok_rozp_s`) VALUES
(1, 2, 'Przysposobienie obronne', 2016);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `umiejetnosci`
--

CREATE TABLE `umiejetnosci` (
  `klucz_umiejetnosci` int(11) NOT NULL,
  `id_uzytkownika` int(11) NOT NULL,
  `nazwa_umiejetnosci` text COLLATE utf8_bin NOT NULL,
  `poziom_umiejetnosci` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Zrzut danych tabeli `umiejetnosci`
--

INSERT INTO `umiejetnosci` (`klucz_umiejetnosci`, `id_uzytkownika`, `nazwa_umiejetnosci`, `poziom_umiejetnosci`) VALUES
(1, 2, 'Bieganie', 5);

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
('petent', 10, 'zdzisiuwiertara', 'asdf', 0),
('petent', 11, 'panpawel', 'hselko', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wyksztalcenie`
--

CREATE TABLE `wyksztalcenie` (
  `klucz_wyksztalcenie` int(11) NOT NULL,
  `id_uzytkownika` int(11) NOT NULL,
  `poziom` enum('Podstawowe','Zawodowe','Średnie','Techniczne','Wyższe') COLLATE utf8_bin NOT NULL,
  `nazwa_szkoly` text COLLATE utf8_bin NOT NULL,
  `rok_rozpoczecia` int(11) NOT NULL,
  `rok_zakonczenia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Zrzut danych tabeli `wyksztalcenie`
--

INSERT INTO `wyksztalcenie` (`klucz_wyksztalcenie`, `id_uzytkownika`, `poziom`, `nazwa_szkoly`, `rok_rozpoczecia`, `rok_zakonczenia`) VALUES
(3, 2, 'Średnie', 'Zespół Szkół Łączności', 2014, 2018),
(5, 2, 'Podstawowe', 'Szkoła Podstawowa nr 5 im. Józefa Piłsudskiego w Krapkowicach', 2005, 2011),
(9, 11, 'Techniczne', 'Zespół Szkół Technicznych w Zbąszynku im Bolesława Bieruta', 1966, 1971),
(10, 10, 'Zawodowe', 'Zasadnicza Szkoła Zawodowa nr 13 w Wadowicach', 1991, 1995);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `doswiadczenie`
--
ALTER TABLE `doswiadczenie`
  ADD PRIMARY KEY (`klucz_doswiadczenie`),
  ADD KEY `id_uzytkownika` (`id_uzytkownika`);

--
-- Indeksy dla tabeli `podanie`
--
ALTER TABLE `podanie`
  ADD PRIMARY KEY (`id_podania`),
  ADD KEY `id_uzytkownika` (`id_uzytkownika`);

--
-- Indeksy dla tabeli `szkolenia`
--
ALTER TABLE `szkolenia`
  ADD PRIMARY KEY (`klucz_szkolenia`),
  ADD KEY `id_uzytkownika` (`id_uzytkownika`);

--
-- Indeksy dla tabeli `umiejetnosci`
--
ALTER TABLE `umiejetnosci`
  ADD PRIMARY KEY (`klucz_umiejetnosci`),
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
-- AUTO_INCREMENT dla tabeli `doswiadczenie`
--
ALTER TABLE `doswiadczenie`
  MODIFY `klucz_doswiadczenie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT dla tabeli `podanie`
--
ALTER TABLE `podanie`
  MODIFY `id_podania` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `szkolenia`
--
ALTER TABLE `szkolenia`
  MODIFY `klucz_szkolenia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `umiejetnosci`
--
ALTER TABLE `umiejetnosci`
  MODIFY `klucz_umiejetnosci` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `uzytkownik`
--
ALTER TABLE `uzytkownik`
  MODIFY `id_uzytkownika` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT dla tabeli `wyksztalcenie`
--
ALTER TABLE `wyksztalcenie`
  MODIFY `klucz_wyksztalcenie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `doswiadczenie`
--
ALTER TABLE `doswiadczenie`
  ADD CONSTRAINT `doswiadczenie_ibfk_1` FOREIGN KEY (`id_uzytkownika`) REFERENCES `uzytkownik` (`id_uzytkownika`);

--
-- Ograniczenia dla tabeli `podanie`
--
ALTER TABLE `podanie`
  ADD CONSTRAINT `podanie_ibfk_1` FOREIGN KEY (`id_uzytkownika`) REFERENCES `uzytkownik` (`id_uzytkownika`);

--
-- Ograniczenia dla tabeli `szkolenia`
--
ALTER TABLE `szkolenia`
  ADD CONSTRAINT `szkolenia_ibfk_1` FOREIGN KEY (`id_uzytkownika`) REFERENCES `uzytkownik` (`id_uzytkownika`);

--
-- Ograniczenia dla tabeli `umiejetnosci`
--
ALTER TABLE `umiejetnosci`
  ADD CONSTRAINT `umiejetnosci_ibfk_1` FOREIGN KEY (`id_uzytkownika`) REFERENCES `uzytkownik` (`id_uzytkownika`);

--
-- Ograniczenia dla tabeli `wyksztalcenie`
--
ALTER TABLE `wyksztalcenie`
  ADD CONSTRAINT `wyksztalcenie_ibfk_1` FOREIGN KEY (`id_uzytkownika`) REFERENCES `uzytkownik` (`id_uzytkownika`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
