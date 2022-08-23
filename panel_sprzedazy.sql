-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 23 Sie 2022, 12:37
-- Wersja serwera: 10.4.24-MariaDB
-- Wersja PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `panel_sprzedazy`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `add_subtract_amount`
--

CREATE TABLE `add_subtract_amount` (
  `add_subtract_item_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `_where` varchar(10) COLLATE utf8_polish_ci NOT NULL,
  `currency` varchar(10) COLLATE utf8_polish_ci NOT NULL,
  `operation_1` varchar(300) COLLATE utf8_polish_ci NOT NULL,
  `operation_2` varchar(350) COLLATE utf8_polish_ci NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `add_subtract_amount`
--

INSERT INTO `add_subtract_amount` (`add_subtract_item_id`, `amount`, `_where`, `currency`, `operation_1`, `operation_2`, `date`) VALUES
(4, -500, 'M', 'PLN', 'zaliczka', '321312', '2021-03-27'),
(6, -100, 'M', 'USD', 'zaliczka', '', '2021-04-12'),
(7, -20, 'M', 'PLN', 'zaliczka', '', '2021-04-12'),
(8, -15, 'M', 'PLN', 'zaliczka', '', '2021-04-12'),
(9, -40, 'M', 'PLN', 'zaliczka', '', '2021-04-12'),
(10, -21, 'M', 'USD', 'zaliczka', '', '2021-04-12'),
(11, -12, 'M', 'PLN', 'zaliczka', '', '2021-04-12'),
(12, -543, 'M', 'EUR', 'zaliczka', '', '2021-04-12');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `add_subtract_item_table`
--

CREATE TABLE `add_subtract_item_table` (
  `add_subtract_id` int(11) NOT NULL,
  `item_name` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `_where` varchar(10) COLLATE utf8_polish_ci NOT NULL,
  `size` varchar(10) COLLATE utf8_polish_ci NOT NULL,
  `operation` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `too` varchar(5) COLLATE utf8_polish_ci NOT NULL,
  `fromm` varchar(5) COLLATE utf8_polish_ci NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `add_subtract_item_table`
--

INSERT INTO `add_subtract_item_table` (`add_subtract_id`, `item_name`, `_where`, `size`, `operation`, `too`, `fromm`, `date`) VALUES
(13, 'Adela beżowa', 'M', '52', 'Dopisać', '-', 'M', '2021-03-25'),
(14, 'Adela granatowa perła', 'M', '52', 'Odpisać', 'P', '-', '2021-03-25');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `currency`
--

CREATE TABLE `currency` (
  `currencyID` int(11) NOT NULL,
  `currencySymbol` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `currency`
--

INSERT INTO `currency` (`currencyID`, `currencySymbol`) VALUES
(8, 'USD'),
(9, 'PLN'),
(10, 'EUR'),
(11, 'GBP'),
(12, 'HUF'),
(13, 'CAD');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `item_name`
--

CREATE TABLE `item_name` (
  `item_name_id` int(11) NOT NULL,
  `item_name` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `size_exist` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `item_name`
--

INSERT INTO `item_name` (`item_name_id`, `item_name`, `size_exist`) VALUES
(3, 'Adela czarna', 1),
(4, 'Adela granatowa perła', 1),
(5, 'Adela czerwona', 1),
(6, 'Adela granatowa', 1),
(7, 'Adela niebieska', 1),
(8, 'Adela zielona', 1),
(9, 'Adela żółta', 1),
(10, 'Alicja nowa', 1),
(11, 'Alina czarna', 1),
(12, 'Amanda czarna', 1),
(13, 'Barbara czarna', 1),
(14, 'Beata w paski', 1),
(15, 'Bella bordowa', 1),
(16, 'Bella czarna', 1),
(17, 'Bona czarna', 1),
(18, 'Cecylia czarna (2 w 1)', 1),
(19, 'Dagmara granat', 1),
(20, 'Danuta beżowa', 1),
(21, 'Danuta czarna', 1),
(22, 'Danuta czarna kratka', 1),
(23, 'Danuta malinowa', 1),
(24, 'Danuta popielata', 1),
(25, 'Danuta tricco', 1),
(26, 'Dioniza czarna', 1),
(27, 'Dominika czarna', 1),
(28, 'Dominika kakao', 1),
(29, 'Edyta czarna', 1),
(30, 'Edyta czerwona ', 1),
(31, 'Edyta zółta', 1),
(32, 'Elwira czarna', 1),
(33, 'Elwira czerwona', 1),
(34, 'Emilia czarna zamek stójka ', 1),
(35, 'Galina czarna kafelki na rękawach', 1),
(36, 'Grażyna bordowa', 1),
(37, 'Grażyna granatowa', 1),
(38, 'Honorata czerowna z zatrzaskami', 1),
(39, 'Honorata czarna z zatrzaskami', 1),
(40, 'Helena czarna', 1),
(41, 'Ilona beżowa ', 1),
(42, 'Ilona czarna', 1),
(43, 'Ilona malinowa', 1),
(44, 'Ilona popielata', 1),
(45, 'Ilona ruda', 1),
(46, 'Inga czerwona', 1),
(47, 'Iwona czerwona', 1),
(48, 'Iwona niebieska\\granatowa', 1),
(49, 'Iza beżowa/kremowa', 1),
(50, 'Iza czerwona', 1),
(51, 'Iza kakao', 1),
(52, 'Iza niebieska', 1),
(53, 'Jadwiga', 1),
(54, 'Judyta czarna', 1),
(55, 'Judyta żółta', 1),
(56, 'Julia czarna', 1),
(57, 'Julia czerwona', 1),
(58, 'Karina sukienka ', 1),
(59, 'Klara czarna', 1),
(60, 'Klara niebieska', 1),
(61, 'Klara popielata', 1),
(62, 'Konstancja czarna', 1),
(63, 'Konstancja żółta', 1),
(64, 'Laura czerwona', 1),
(65, 'Laura niebieska', 1),
(66, 'Laura ruda', 1),
(67, 'Laura żółta', 1),
(68, 'Lidia dragon', 1),
(69, 'Lidia dragon długa', 1),
(70, 'Lidia erkri ciemny', 1),
(71, 'Lidia popiel', 1),
(72, 'Lidia ruda', 1),
(73, 'Lucyna czarna ramoneska', 1),
(74, 'Łucja beżowowa kołnierz', 1),
(75, 'Łucja czarna kołnierz', 1),
(76, 'Łucja czarna stójka', 1),
(77, 'Łucja czerwona kołnierz', 1),
(78, 'Łucja czerwona stójka', 1),
(79, 'Łucja koral kołnierz', 1),
(80, 'Magda czarna ', 1),
(81, 'Magda oliwkowa', 1),
(82, 'Malina czarna paski skośne', 1),
(83, 'Malwina czarna w paski', 1),
(84, 'Marcelina', 1),
(85, 'Marianna czarna kamizelka z rękawami', 1),
(86, 'Mariola', 1),
(87, 'Marta czarna w paski', 1),
(88, 'Marzena ramoneska czerwona patka', 1),
(89, 'Nikola brąz', 1),
(90, 'Nikola czarny', 1),
(91, 'Nikola czerwona', 1),
(92, 'Nikola erki ciemny', 1),
(93, 'Nikola erki jasny', 1),
(94, 'Nikola oliwka', 1),
(95, 'Oda granatowa', 1),
(96, 'Ola czarna ', 1),
(97, 'Otylia szara', 1),
(98, 'Patrycja czarna', 1),
(99, 'Patrycja czerwona', 1),
(100, 'Patrycja zielona', 1),
(101, 'Paula szara', 1),
(102, 'Pola czarna', 1),
(103, 'Pola czerwona', 1),
(104, 'Pola ekri jasny', 1),
(105, 'Pola erki ciemny', 1),
(106, 'Pola oliwka', 1),
(107, 'Rebeka kakao', 1),
(108, 'Regina czarna', 1),
(109, 'Regina czerwona', 1),
(110, 'Renata kakao', 1),
(111, 'Róża na zamek czarna stójka', 1),
(112, 'Róża na zamek czerowna stójka', 1),
(113, 'Sandra popielata', 1),
(114, 'Sandra ruda', 1),
(115, 'Sara biała', 1),
(116, 'Sara czarna', 1),
(117, 'Sara czerwona', 1),
(118, 'Sonia granatowa', 1),
(119, 'Sonia granatowa długa', 1),
(120, 'Stella biała', 1),
(121, 'Stella czarna ', 1),
(122, 'Stella czerwona ', 1),
(123, 'Stella erki ciemny', 1),
(124, 'Stella erki jasny', 1),
(125, 'Stella żółta', 1),
(126, 'Szanelka czarna', 1),
(127, 'Szanelka czarna z przeszyciem', 1),
(128, 'Szanelka czerwona przeszyciem', 1),
(129, 'Szanelka ekri ciemny', 1),
(130, 'Szanelka ekri jasny', 1),
(131, 'Szanelka granatowa z przeszyciem', 1),
(132, 'Szanelka kakao', 1),
(133, 'Szanelka koral', 1),
(134, 'Szanelka muton', 1),
(135, 'Szanelka niebieska ', 1),
(136, 'Szanelka oliwkowa', 1),
(137, 'Szanelka ruda ', 1),
(138, 'Szanelka żółta', 1),
(139, 'Tina czarna', 1),
(140, 'Urszula niebieska ramoneska', 1),
(141, 'Zofia beżowa ramoneska', 1),
(142, 'Zofia żółta ramoneska ', 1),
(143, 'Zuzanna płaszcz damski pikowany', 1),
(144, 'Żaneta', 1),
(145, 'Adam brąz', 1),
(146, 'Adam czarny guzik', 1),
(147, 'Adam czarny zam', 1),
(148, 'Alan brąz harex', 1),
(149, 'Alan brązowy', 1),
(150, 'Alan chevree', 1),
(151, 'Alan czarny', 1),
(152, 'Alan popielaty +szary gładki', 1),
(153, 'Alan brązowy', 1),
(154, 'Albert brązowy', 1),
(155, 'Antek czarny gładki', 1),
(156, 'Antek czarny kratka', 1),
(157, 'Arkadiusz', 1),
(158, 'Artur kożuch męski', 1),
(159, 'Axel czarny', 1),
(160, 'Axel granat', 1),
(161, 'Bartek czarny', 1),
(162, 'Dawid brązowy', 1),
(163, 'Dawid czarny', 1),
(164, 'Filip brąz ciemny', 1),
(165, 'Filip brąz jasny', 1),
(166, 'Filip brąz masimo', 1),
(167, 'Filip czarny masimo', 1),
(168, 'Filip rudy masimo', 1),
(169, 'Grzegorz granatowy', 1),
(170, 'Ireneusz bordowy', 1),
(171, 'Jacek', 1),
(172, 'Jakub czarny', 1),
(173, 'Jakub czarny b. n.', 1),
(174, 'Jakub erki', 1),
(175, 'Jarek', 1),
(176, 'Jerzy', 1),
(177, 'Kacper brąz', 1),
(178, 'Kasper popiel', 1),
(179, 'Klaudiusz', 1),
(180, 'Kornel', 1),
(181, 'Krystian granat', 1),
(182, 'Leopold granatowy', 1),
(183, 'Ludwik dziurki', 1),
(184, 'Łukasz brąz', 1),
(185, 'Łukasz brąz 2', 1),
(186, 'Łukasz popiel', 1),
(187, 'Marcel', 1),
(188, 'Marcin brąz 2', 1),
(189, 'Marek', 1),
(190, 'Marian czarny', 1),
(191, 'Mariusz czarny', 1),
(192, 'Patryk', 1),
(193, 'Paweł LAVARD', 1),
(194, 'Robert granatowy', 1),
(195, 'Roman brąz', 1),
(196, 'Samuel dwustronny', 1),
(197, 'Sebastian rudy', 1),
(198, 'Stanisław granatowy', 1),
(199, 'Stanisław czarny', 1),
(200, 'Szczepan', 1),
(201, 'Szymon', 1),
(202, 'Tomasz', 1),
(203, 'Wojtek granat', 1),
(204, '355 granat Buk', 1),
(205, '355 rudy Buk', 1),
(206, 'Agata czarna', 1),
(207, 'Agata popielata', 1),
(208, 'Agata tabaka', 1),
(209, 'Amelia bordowa', 1),
(210, 'Amelia czarna', 1),
(211, 'Angelika czarna', 1),
(212, 'Angelika popielata', 1),
(213, 'Anka beżowa\\Anka beż kr\\dł', 1),
(214, 'Anka czarna \"90\"', 1),
(215, 'Anka czarna lis snow top', 1),
(216, 'Anka jasny beż', 1),
(217, 'Anka maroko 90', 1),
(218, 'Anna brąz pleciona', 1),
(219, 'Anna brązowa', 1),
(220, 'Blanka czerwona', 1),
(221, 'Blanka niebieska', 1),
(222, 'Brygida czarna', 1),
(223, 'Daria ruda ', 1),
(224, 'Dorota niebieska ', 1),
(225, 'Estera tabaka', 1),
(226, 'Faustyna czarna', 1),
(227, 'Hajduk zamsz', 1),
(228, 'Irena beżowa', 1),
(229, 'Irena brąz', 1),
(230, 'Irena czarna ', 1),
(231, 'Irena kr. Brąz', 1),
(232, 'Klaudia 7/8 beżowa', 1),
(233, 'Klaudia 7/8 brązowa', 1),
(234, 'Klaudia beż bez lisa', 1),
(235, 'Klaudia beżowa', 1),
(236, 'Klaudia brąz bez lisa', 1),
(237, 'Klaudia brąz ciemny', 1),
(238, 'Klaudia brąz jasny', 1),
(239, 'Klaudia czarna', 1),
(240, 'Klaudia czarna bez lisa', 1),
(241, 'Kołek czarny lis snołtop', 1),
(242, 'Kołek maroko', 1),
(243, 'Kołek szary', 1),
(244, 'Kornelia', 1),
(245, 'Luiza czarna jenot', 1),
(246, 'Luiza srebrna', 1),
(247, 'Maria ruda', 1),
(248, 'Marlena beżowa', 1),
(249, 'Marlena czarno pomarańczowa', 1),
(250, 'Marlena popiel nowy', 1),
(251, 'Marlena popielata z białym', 1),
(252, 'Marlena ruda', 1),
(253, 'Marlena rudo czarna', 1),
(254, 'Monika beżowa', 1),
(255, 'Monika brąz', 1),
(256, 'Monika czarna ', 1),
(257, 'Natalia krótka', 1),
(258, 'Natasza', 1),
(259, 'Pilot.dam.ruda biały włos', 1),
(260, 'Pilotka damska czarna z czarnym włosem ', 1),
(261, 'Pilotka damska z kapturem NOWA', 1),
(262, 'Pilotka damska bez kapruta NOWA', 1),
(263, 'Pilotka damska pop. z kapt. bez obszycia', 1),
(264, 'Sabina beżowa ', 1),
(265, 'Sabina niebieska', 1),
(266, 'Sabina popielata', 1),
(267, 'Sabina ruda', 1),
(268, 'Sylwia czarna', 1),
(269, 'Sylwia czarna z rudym włosem', 1),
(270, 'Sylwia granatowa', 1),
(271, 'Sylwia kakao', 1),
(272, 'Sylwia popielata', 1),
(273, 'Sylwia ruda', 1),
(274, 'Talia', 1),
(275, 'Toscan 3/4 brąz stary i 7/8 brąz stary', 1),
(276, 'Toscan 3/4 brązowy nowy', 1),
(277, 'Toscan 3/4 czarny sn', 1),
(278, 'Toscan brąz', 1),
(279, 'Toscan czarny bryza', 1),
(280, 'Toscan jasny', 1),
(281, 'Toscan kakaowy 3/4 b. włos', 1),
(282, 'Toscan KOF 3/4 czarny bryza', 1),
(283, 'Toscan KOF kr bryza', 1),
(284, 'Wanda', 1),
(285, 'Wiktoria czarna', 1),
(286, 'Wiktoria popielata kr.', 1),
(287, 'Wiola beż', 1),
(288, 'Wiola beż ciemny', 1),
(289, 'Wiola beż zamek', 1),
(290, 'Wiola brąz ', 1),
(291, 'Wiola szara', 1),
(292, 'Alaska czarna', 1),
(293, 'Dyplo. Brąz sn', 1),
(294, 'Dyplom. Beżowa', 1),
(295, 'Dyplom. Brąz brąz', 1),
(296, 'Dyplom. Czarna', 1),
(297, 'Dyplom. Miodowa', 1),
(298, 'Dyplom. Oliwka', 1),
(299, 'Dyplom. Ruda j.wł', 1),
(300, 'Hubert czarny', 1),
(301, 'Krzysiek biały włos', 1),
(302, 'Krzysiek brąz brąz', 1),
(303, 'Krzysiek popiel ciemny\\popiel jasny', 1),
(304, 'Krzysiek brąz sn', 1),
(305, 'Krzysiek czarny mat', 1),
(306, 'Leszek brąz ', 1),
(307, 'Leszek rudy biały włos', 1),
(308, 'Leszek czarny', 1),
(309, 'Luzak b. włos', 1),
(310, 'Luzak brąz brąz', 1),
(311, 'Luzak brąz sn.\\br sn stary', 1),
(312, 'Luzak czarny', 1),
(313, 'Mateusz czarno rudy', 1),
(314, 'Mateusz gargo', 1),
(315, 'Mateusz brąz ochnik', 1),
(316, 'Paweł kożuch szary', 1),
(317, 'Paweł Czarny ochnik', 1),
(318, 'Paweł rudy biały włos', 1),
(319, 'Pilotka ruda biały włos', 1),
(320, 'Pilotka brąz sn.', 1),
(321, 'Rysiek grafit', 1),
(322, 'Rysiek brąz sn', 1),
(323, 'Rysiek oliwka', 1),
(324, 'Wojtek czarny', 1),
(325, 'Wiktor kożuch', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `operations`
--

CREATE TABLE `operations` (
  `id_operation` int(11) NOT NULL,
  `operation` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `operations`
--

INSERT INTO `operations` (`id_operation`, `operation`) VALUES
(1, 'Odpisać'),
(2, 'Dopisać');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `operations2`
--

CREATE TABLE `operations2` (
  `id_operation2` int(11) NOT NULL,
  `operation` varchar(30) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `operations2`
--

INSERT INTO `operations2` (`id_operation2`, `operation`) VALUES
(1, 'zaliczka'),
(2, 'ochrona'),
(3, 'zakupy');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `operations3`
--

CREATE TABLE `operations3` (
  `id_operation3` int(11) NOT NULL,
  `operation` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `operations3`
--

INSERT INTO `operations3` (`id_operation3`, `operation`) VALUES
(1, 'M'),
(2, 'T'),
(3, 'P'),
(4, 'Kr'),
(6, 'Dom'),
(7, 'Wysyłka');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `operations4`
--

CREATE TABLE `operations4` (
  `id_operation4` int(11) NOT NULL,
  `operation` varchar(10) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `operations4`
--

INSERT INTO `operations4` (`id_operation4`, `operation`) VALUES
(1, 'M'),
(2, 'T'),
(3, 'P'),
(4, 'Kr'),
(5, 'Dom');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `name_of_prudut_and_color` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `size` varchar(10) COLLATE utf8_polish_ci NOT NULL,
  `price` double NOT NULL,
  `price_currency` varchar(10) COLLATE utf8_polish_ci NOT NULL,
  `advance_payment` double NOT NULL,
  `advance_payment_currency` varchar(10) COLLATE utf8_polish_ci NOT NULL,
  `last_pay` double NOT NULL,
  `last_pay_currency` varchar(10) COLLATE utf8_polish_ci NOT NULL,
  `pick_up_from` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `details` varchar(350) COLLATE utf8_polish_ci NOT NULL,
  `adress_and_telefon` varchar(350) COLLATE utf8_polish_ci NOT NULL,
  `date_of_taken` date NOT NULL,
  `date_of_achievment` date NOT NULL,
  `status` varchar(20) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `orders`
--

INSERT INTO `orders` (`order_id`, `name_of_prudut_and_color`, `size`, `price`, `price_currency`, `advance_payment`, `advance_payment_currency`, `last_pay`, `last_pay_currency`, `pick_up_from`, `details`, `adress_and_telefon`, `date_of_taken`, `date_of_achievment`, `status`) VALUES
(3, 'Wojtek', 'XL', 300, 'PLN', 0, 'PLN', 200, 'PLN', 'brak', 'brak', 'Rogoźnik os. Za Torem 20a\n34-471 Ludźmierz\ntel 604-971-789', '2021-04-06', '2021-05-01', 'oczekiwanie'),
(4, 'Paweł ', 'L', 0, 'PLN', 0, 'PLN', 200, 'PLN', 'brak', 'brak', 'brak', '2021-04-06', '2021-05-05', 'oczekiwanie'),
(5, 'Staszek', 'L', 200, 'PLN', 100, 'PLN', 200, 'PLN', 'brak', 'brak', 'brak', '2021-04-07', '2021-05-02', 'oczekiwanie');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sales_table`
--

CREATE TABLE `sales_table` (
  `id` int(11) NOT NULL,
  `item_name` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `where_sold` varchar(10) COLLATE utf8_polish_ci NOT NULL,
  `item_from` varchar(10) COLLATE utf8_polish_ci NOT NULL,
  `size` varchar(10) COLLATE utf8_polish_ci NOT NULL,
  `amount_1` double NOT NULL,
  `currency_1` varchar(10) COLLATE utf8_polish_ci NOT NULL,
  `amount_2` double NOT NULL,
  `currency_2` varchar(10) COLLATE utf8_polish_ci NOT NULL,
  `amount_3` double NOT NULL,
  `currency_3` varchar(10) COLLATE utf8_polish_ci NOT NULL,
  `card` double NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `sales_table`
--

INSERT INTO `sales_table` (`id`, `item_name`, `where_sold`, `item_from`, `size`, `amount_1`, `currency_1`, `amount_2`, `currency_2`, `amount_3`, `currency_3`, `card`, `date`) VALUES
(12, 'Adam brąz', 'M', 'T', '38', 22, '', 2, 'PLN', 2, 'USD', 2, '2022-07-08'),
(20, 'Alan brązowy', 'M', 'M', '34', 2, 'PLN', 2, 'PLN', 2, 'USD', 2, '2022-01-08'),
(21, 'Adela granatowa', 'M', 'M', '36', 2, 'PLN', 2, 'PLN', 2, 'PLN', 2, '2022-01-08'),
(22, 'Alan brązowy', 'M', 'T', '38', 2, 'PLN', 2, 'PLN', 2, 'PLN', 2, '2022-02-08'),
(23, 'Adam brąz', 'T', 'K', '44', 200, 'EUR', 100, 'GBP', 2, 'PLN', 2, '2022-09-08');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sizes`
--

CREATE TABLE `sizes` (
  `size_id` int(11) NOT NULL,
  `size` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `sizes`
--

INSERT INTO `sizes` (`size_id`, `size`) VALUES
(1, '34'),
(2, '36'),
(3, '38'),
(4, '40'),
(5, '42'),
(6, '44'),
(7, '46'),
(8, '48'),
(9, '50'),
(10, '52'),
(11, '54'),
(12, '56'),
(13, '58'),
(14, '60'),
(15, '62'),
(16, 'XXS'),
(17, 'XS'),
(18, 'S'),
(19, 'M'),
(20, 'L'),
(21, 'XL'),
(22, '2XL'),
(23, '3XL'),
(24, '4XL'),
(25, '5XL'),
(26, '6XL');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user` text COLLATE utf8_polish_ci NOT NULL,
  `pass` text COLLATE utf8_polish_ci NOT NULL,
  `abbr` varchar(10) COLLATE utf8_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `user`, `pass`, `abbr`) VALUES
(9, 'admin', '$2y$10$phju4pMpS5et.CE0LgJW3./teurzWqKhOMiN50z0I5ArscyWChL9y', 'Admin'),
(11, 'most', '$2y$10$BVt5ifrQtoHRKybenc1jteMGLiJi5f5r8YmLsFNqrertak68ZU0k6', 'M'),
(12, 'tata', '$2y$10$2vWNC3uW082LQ7nAZ8tFVOi6y/8NxLk20z663aaDUqOxwumupxrbS', 'T'),
(13, 'skrzat', '$2y$10$5dahke6JSfh3pS18Y16khuv2jbnMkhpu26r7cHuC7pNiv2bcwqleu', 'S'),
(14, 'krupówki', '$2y$10$BHb37BT6i2KJj9TupcPPkOF028HHuA8ulF/Farsu9cQ1NTfem4emi', 'K'),
(15, 'dom', '$2y$10$MRZI0C9lYt04Y9njxDYmauIxuCWTsnLxhY46DW.YgI7DeB6JmHwxK', 'DOM'),
(16, 'parzygnat', '$2y$10$fpLOYyGsq/D.5tEU9KYft..5OkO8JtI8ddTd35VMNAAVI48N0thda', 'P');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users_excel`
--

CREATE TABLE `users_excel` (
  `id` int(11) NOT NULL,
  `abbr` varchar(20) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `users_excel`
--

INSERT INTO `users_excel` (`id`, `abbr`) VALUES
(1, 'Wszystkie punkty'),
(2, 'M'),
(3, 'P'),
(4, 'T'),
(5, 'K'),
(6, 'Kar'),
(7, 'S');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `add_subtract_amount`
--
ALTER TABLE `add_subtract_amount`
  ADD PRIMARY KEY (`add_subtract_item_id`);

--
-- Indeksy dla tabeli `add_subtract_item_table`
--
ALTER TABLE `add_subtract_item_table`
  ADD PRIMARY KEY (`add_subtract_id`);

--
-- Indeksy dla tabeli `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`currencyID`);

--
-- Indeksy dla tabeli `item_name`
--
ALTER TABLE `item_name`
  ADD PRIMARY KEY (`item_name_id`),
  ADD KEY `item_name_index` (`item_name`);

--
-- Indeksy dla tabeli `operations`
--
ALTER TABLE `operations`
  ADD PRIMARY KEY (`id_operation`);

--
-- Indeksy dla tabeli `operations2`
--
ALTER TABLE `operations2`
  ADD PRIMARY KEY (`id_operation2`);

--
-- Indeksy dla tabeli `operations3`
--
ALTER TABLE `operations3`
  ADD PRIMARY KEY (`id_operation3`);

--
-- Indeksy dla tabeli `operations4`
--
ALTER TABLE `operations4`
  ADD PRIMARY KEY (`id_operation4`);

--
-- Indeksy dla tabeli `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indeksy dla tabeli `sales_table`
--
ALTER TABLE `sales_table`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`size_id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users_excel`
--
ALTER TABLE `users_excel`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `add_subtract_amount`
--
ALTER TABLE `add_subtract_amount`
  MODIFY `add_subtract_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT dla tabeli `add_subtract_item_table`
--
ALTER TABLE `add_subtract_item_table`
  MODIFY `add_subtract_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT dla tabeli `currency`
--
ALTER TABLE `currency`
  MODIFY `currencyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT dla tabeli `item_name`
--
ALTER TABLE `item_name`
  MODIFY `item_name_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=326;

--
-- AUTO_INCREMENT dla tabeli `operations`
--
ALTER TABLE `operations`
  MODIFY `id_operation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `operations2`
--
ALTER TABLE `operations2`
  MODIFY `id_operation2` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `operations3`
--
ALTER TABLE `operations3`
  MODIFY `id_operation3` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT dla tabeli `operations4`
--
ALTER TABLE `operations4`
  MODIFY `id_operation4` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `sales_table`
--
ALTER TABLE `sales_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT dla tabeli `sizes`
--
ALTER TABLE `sizes`
  MODIFY `size_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT dla tabeli `users_excel`
--
ALTER TABLE `users_excel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
