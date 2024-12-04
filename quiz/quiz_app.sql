-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2024 at 03:40 PM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz_app`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `question` mediumtext NOT NULL,
  `correct_answer` tinyint(1) NOT NULL,
  `question_en` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `correct_answer`, `question_en`) VALUES
(11, 'Czy ziemia jest okrągła?', 1, 'Is the Earth round?'),
(12, 'Czy Słońce krąży wokół Ziemi?', 0, 'Does the Sun orbit the Earth?'),
(13, 'Czy 1+1=2?', 1, 'Is 1+1=2?'),
(14, 'Czy koty są ssakami?', 1, 'Are cats mammals?'),
(15, 'Czy woda wrze w 90 stopniach?', 0, 'Does water boil at 90 degrees?'),
(16, 'Czy Polska leży w Europie?', 1, 'Is Poland in Europe?'),
(17, 'Czy prędkość światła to 300000 km/s?', 1, 'Is the speed of light 300,000 km/s?'),
(18, 'Czy pingwin to ptak?', 1, 'Is a penguin a bird?'),
(19, 'Czy Mars ma pierścienie?', 0, 'Does Mars have rings?'),
(20, 'Czy największy ocean to Atlantyk?', 0, 'Is the largest ocean the Atlantic?'),
(21, 'Czy Ziemia jest płaska?', 0, 'Is the Earth flat?'),
(22, 'Czy delfiny są ssakami?', 1, 'Are dolphins mammals?'),
(23, 'Czy kawa pochodzi z Indii?', 0, 'Does coffee come from India?'),
(24, 'Czy wieloryby to ryby?', 0, 'Are whales fish?'),
(25, 'Czy K2 jest najwyższą górą na świecie?', 0, 'Is K2 the highest mountain in the world?'),
(26, 'Czy Wenus jest najgorętszą planetą w Układzie Słonecznym?', 1, 'Is Venus the hottest planet in the Solar System?'),
(27, 'Czy Einstein wynalazł teorię względności?', 1, 'Did Einstein invent the theory of relativity?'),
(28, 'Czy pierwsze lądowanie na Księżycu miało miejsce w 1969 roku?', 1, 'Did the first moon landing happen in 1969?'),
(29, 'Czy najdłuższa rzeka na świecie to Amazonka?', 1, 'Is the longest river in the world the Amazon?'),
(30, 'Czy komputery są szybsze niż ludzkie mózgi?', 1, 'Are computers faster than human brains?');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `results`
--

CREATE TABLE `results` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `quiz_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `user_id`, `score`, `quiz_date`) VALUES
(1, 1, 6, '2024-12-04 13:25:28'),
(2, 2, 5, '2024-12-04 13:33:33');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'Olo', '$2y$10$LQsJTEDWmTbRVUg8Hn.BWeWq.029J55vD78ERwBHOSA9thAqBDQv6'),
(2, 'SÅ‚awomir', '$2y$10$ZFbTjcjjadsdzSb18E4W3eJzpezdlIfrgUf6vt7lwqNc8ibuHYpZG');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `results_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
