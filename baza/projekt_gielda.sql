-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Czas generowania: 13 Cze 2016, 23:59
-- Wersja serwera: 5.6.21
-- Wersja PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `projekt_gielda`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `firma`
--

CREATE TABLE IF NOT EXISTS `firma` (
`id_firmy` int(10) NOT NULL,
  `nazwa_firmy` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `id_wlasciciela` int(10) NOT NULL,
  `opis_firmy` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `firma`
--

INSERT INTO `firma` (`id_firmy`, `nazwa_firmy`, `id_wlasciciela`, `opis_firmy`) VALUES
(1, 'Firma Dostawcza', 1, 'Dostarczamy byle co.'),
(2, 'stal dla hut', 3, 'produkujemy stal dla hut.'),
(3, 'aaa', 1, 'Opis Twojej Firmy'),
(4, 'Nowa Firma', 1, 'Zajmujemy siÄ™ nowymi sprawami.'),
(5, 'FIrmanowa', 1, 'Opis Twojej Firmy');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `oferta_pracy`
--

CREATE TABLE IF NOT EXISTS `oferta_pracy` (
`id_oferty` int(10) NOT NULL,
  `Id_firmy` int(10) NOT NULL,
  `tytul_oferty` varchar(30) COLLATE utf8_polish_ci DEFAULT NULL,
  `opis_oferty` text COLLATE utf8_polish_ci,
  `kategorie` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `oferta_pracy`
--

INSERT INTO `oferta_pracy` (`id_oferty`, `Id_firmy`, `tytul_oferty`, `opis_oferty`, `kategorie`) VALUES
(1, 3, 'OgÅ‚oszenie1', 'WynajmÄ™ sprzÄ…taczkÄ™', 'Programowanie Muzyka'),
(2, 1, 'Sprzedawca jaj', 'Opis Twojej Oferty', ' Restauracja\r\n'),
(3, 1, 'asdasdasd', 'Opis Twojej Oferty', ' Muzyka Sklep'),
(4, 1, 'nowafirma', 'Opis Twojej Oferty', ' Restauracja'),
(5, 3, 'ogloszenie oglafa', 'Opis Twojej Oferty', ' Muzyka Sklep'),
(6, 1, 'OgÅ‚oszenie', 'Opis Twojej Oferty', 'Programowanie'),
(7, 1, 'OgÅ‚oszenie333', 'Opis Twojej Oferty', ' Restauracja');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownik`
--

CREATE TABLE IF NOT EXISTS `uzytkownik` (
`id_uz` int(10) NOT NULL,
  `login` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `haslo` varchar(80) COLLATE utf8_polish_ci NOT NULL,
  `Imie` text COLLATE utf8_polish_ci NOT NULL,
  `Nazwisko` text COLLATE utf8_polish_ci NOT NULL,
  `email` text COLLATE utf8_polish_ci NOT NULL,
  `is_Admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `uzytkownik`
--

INSERT INTO `uzytkownik` (`id_uz`, `login`, `haslo`, `Imie`, `Nazwisko`, `email`, `is_Admin`) VALUES
(1, 'wojciech', 'e1b429b19a9e5931d30e72f14616a117', 'wojciech', 'wojciech', 'wojciech', 1),
(3, 'kokoko', 'd5cbfe9ff07fef1ecc93861ce5dd4f3b', 'koko', 'koko', 'koko', 0),
(5, 'administrator', '200ceb26807d6bf99fd6f4f0d1ca54d4', 'Admin', 'Adminek', 'admin', 0),
(7, 'wojciecha', '8b47a6bc71ce09e4c5e275cb4349e985', 'wojciecha', 'wojciecha', 'wojciecha', 0);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `firma`
--
ALTER TABLE `firma`
 ADD PRIMARY KEY (`id_firmy`), ADD KEY `id_wlasciciela` (`id_wlasciciela`);

--
-- Indexes for table `oferta_pracy`
--
ALTER TABLE `oferta_pracy`
 ADD PRIMARY KEY (`id_oferty`), ADD KEY `Id_firmy` (`Id_firmy`);

--
-- Indexes for table `uzytkownik`
--
ALTER TABLE `uzytkownik`
 ADD PRIMARY KEY (`id_uz`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `firma`
--
ALTER TABLE `firma`
MODIFY `id_firmy` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT dla tabeli `oferta_pracy`
--
ALTER TABLE `oferta_pracy`
MODIFY `id_oferty` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT dla tabeli `uzytkownik`
--
ALTER TABLE `uzytkownik`
MODIFY `id_uz` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
