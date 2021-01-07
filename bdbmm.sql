-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 07 Sty 2021, 20:00
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
-- Baza danych: `bdbmm`
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
(3, 2, 'Intel', 'programista', 2002, 2012),
(5, 4, 'Mikrosoft', 'ochroniarz', 2001, 2021),
(6, 3, 'Lidl', 'Kasjer', 1999, 2010),
(7, 11, 'Biedronka', 'Kierownik', 2005, 2009),
(10, 10, 'Piekarnia Saga', 'Piekarz', 2000, 2003),
(11, 23, 'Fluor S.A.', 'Młodszy programista', 2018, 2021),
(12, 24, 'Szkoła rysunku współczesnego', 'Nauczyciel', 2017, 2019),
(13, 24, 'Pędzle.pl', 'Zastępca kierownika', 2019, 2021),
(14, 25, 'Sejmik młodzieżowy', 'Radna', 2015, 2016),
(15, 25, 'Federacja młodych socjaldemokratów', 'Członek', 2016, 2021),
(16, 26, 'ING polska', 'Ambasador', 2020, 2020),
(17, 26, 'Hamachi', 'Konsultant', 2020, 2021),
(18, 26, 'Politechnika Śląska', 'Starosta', 2018, 2022);

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
(2, 2, 'Jakub', 'Wołodyjowski', '1998-11-09', 'M', 4, NULL, 'Ok', NULL, 0),
(5, 10, 'Zdzisław', 'Wieratara', '1982-12-12', 'M', 1, NULL, 'Odrzucony', 0, 0),
(6, 21, 'Maria', 'Spytkowska', '1990-03-12', 'K', 6, NULL, 'Ok', 1, 0),
(9, 23, 'Marcin', 'Ziobro', '1985-02-14', 'M', NULL, NULL, '', NULL, 1),
(10, 24, 'Sławomira', 'Mentzen', '1998-12-31', 'K', NULL, NULL, '', NULL, 1),
(11, 25, 'Anna', 'Krzaczkowska', '2001-05-01', 'I', NULL, NULL, '', NULL, 1),
(12, 26, 'Natalia', 'Kajzerka', '1999-01-25', 'K', NULL, NULL, '', NULL, 1);

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
(3, 2, 'Uprawnienie na wózki widłowe', 2018),
(5, 3, 'Zarządzanie zasobami ludzkimi', 2011),
(6, 4, 'Pisanie na maszynie', 1999),
(10, 10, 'BHP', 2005),
(12, 23, 'Projektowanie układów scalonych', 2016),
(13, 24, 'Rysunek techniczny', 2016),
(14, 24, 'Rzeźba nowoczesna', 2015);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `umiejetnosci`
--

CREATE TABLE `umiejetnosci` (
  `klucz_umiejetnosci` int(11) NOT NULL,
  `id_uzytkownika` int(11) NOT NULL,
  `nazwa_umiejetnosci` text COLLATE utf8_bin NOT NULL,
  `poziom_umiejetnosci` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Zrzut danych tabeli `umiejetnosci`
--

INSERT INTO `umiejetnosci` (`klucz_umiejetnosci`, `id_uzytkownika`, `nazwa_umiejetnosci`, `poziom_umiejetnosci`) VALUES
(3, 2, 'sprzatanie', 'do blysku'),
(5, 4, 'gotowanie', 'masterszef'),
(6, 11, 'mycie szyb', 'bez smug'),
(9, 10, 'wiercenie', '5'),
(10, 23, 'Programowanie w C', '4'),
(11, 23, 'Umiejętności interpersonalne', '5'),
(12, 23, 'Znajomość wzorców projektowych', '4'),
(13, 24, 'Rysunek ', '5'),
(14, 24, 'Zarządzanie stroną internetową ', '4'),
(15, 24, 'Komunikacja', '5'),
(16, 25, 'Komunikacja', '5'),
(17, 25, 'Znajomość prawa', '3'),
(18, 25, 'Nauki społeczne ', '5'),
(19, 26, 'Komunikacja', '5');

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
('petent', 11, 'panpawel', 'hselko', 1),
('kierownik', 16, 'kierownik', 'kier', 0),
('asystent', 17, 'rekruter', 'rekrut', 0),
('petent', 21, 'test', 'test', 0),
('petent', 23, 'Marcin', 'haslo', 0),
('petent', 24, 'Sławomira', 'haslo', 0),
('petent', 25, 'Anna', 'haslo', 0),
('petent', 26, 'Natalia', 'haslo', 0);

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
(3, 2, 'Podstawowe', 'Zespół Szkół Łączności', 2014, 2018),
(5, 4, 'Średnie', 'Szkoła Podstawowa nr 5 im. Józefa Piłsudskiego w Krapkowicach', 2005, 2011),
(9, 11, 'Średnie', 'Liceum nr 3 w Zabrzu', 2012, 2018),
(96, 10, 'Średnie', 'Technikum nr 2 w Katowicach', 2012, 2018),
(98, 23, 'Wyższe', 'Politechnika Warszawska', 2015, 2020),
(99, 24, 'Techniczne', 'Technikum malarskie', 2013, 2017),
(100, 25, 'Wyższe', 'Uniwersytet Śląski socjologia', 2019, 2024),
(101, 26, 'Podstawowe', 'SP im. Jana Pawła 2 w Wadowice', 2006, 2012),
(102, 26, 'Średnie', '3 LO w Zabrzu', 2015, 2018),
(103, 26, 'Wyższe', 'Politechnika Śląska AEI Informatyka', 2018, 2022),
(104, 26, 'Wyższe', 'Politechnika Śląska WOiZ Analityka Biznesowa', 2018, 2022);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zalaczone_dokumenty`
--

CREATE TABLE `zalaczone_dokumenty` (
  `id_dokumentu` int(11) NOT NULL,
  `id_uzytkownika` int(11) NOT NULL,
  `nazwa_pliku` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `doswiadczenie`
--
ALTER TABLE `doswiadczenie`
  ADD PRIMARY KEY (`klucz_doswiadczenie`),
  ADD KEY `id_uzytkownika` (`id_uzytkownika`) USING BTREE;

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
  ADD KEY `id_uzytkownika` (`id_uzytkownika`) USING BTREE;

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
-- Indeksy dla tabeli `zalaczone_dokumenty`
--
ALTER TABLE `zalaczone_dokumenty`
  ADD PRIMARY KEY (`id_dokumentu`),
  ADD KEY `id_uzytkownika` (`id_uzytkownika`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `doswiadczenie`
--
ALTER TABLE `doswiadczenie`
  MODIFY `klucz_doswiadczenie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT dla tabeli `podanie`
--
ALTER TABLE `podanie`
  MODIFY `id_podania` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT dla tabeli `szkolenia`
--
ALTER TABLE `szkolenia`
  MODIFY `klucz_szkolenia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT dla tabeli `umiejetnosci`
--
ALTER TABLE `umiejetnosci`
  MODIFY `klucz_umiejetnosci` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT dla tabeli `uzytkownik`
--
ALTER TABLE `uzytkownik`
  MODIFY `id_uzytkownika` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT dla tabeli `wyksztalcenie`
--
ALTER TABLE `wyksztalcenie`
  MODIFY `klucz_wyksztalcenie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT dla tabeli `zalaczone_dokumenty`
--
ALTER TABLE `zalaczone_dokumenty`
  MODIFY `id_dokumentu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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

--
-- Ograniczenia dla tabeli `zalaczone_dokumenty`
--
ALTER TABLE `zalaczone_dokumenty`
  ADD CONSTRAINT `zalaczone_dokumenty_ibfk_1` FOREIGN KEY (`id_uzytkownika`) REFERENCES `uzytkownik` (`id_uzytkownika`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
