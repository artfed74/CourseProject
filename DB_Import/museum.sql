-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Мар 14 2024 г., 14:20
-- Версия сервера: 10.4.32-MariaDB
-- Версия PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `museum`
--

-- --------------------------------------------------------

--
-- Структура таблицы `achives`
--

CREATE TABLE `achives` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `year` varchar(25) NOT NULL,
  `type` varchar(75) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Дамп данных таблицы `achives`
--

INSERT INTO `achives` (`id`, `name`, `year`, `type`, `image`) VALUES
(1, 'Sport', '2015', 'Спорт', 'Sport/Слой 95.png'),
(2, 'Sport', '2017', 'Спорт', 'Sport/Слой 96.png'),
(3, 'Sport', '2016', 'Спорт', 'Sport/Слой 97.png'),
(4, 'Sport', '2016', 'Спорт', 'Sport/Слой 98.png'),
(5, 'Sport', '2016', 'Спорт', 'Sport/Слой 99.png'),
(6, 'Sport', '2016', 'Спорт', 'Sport/Слой 100.png'),
(7, 'Sport', '2016', 'Спорт', 'Sport/Слой 101.png'),
(8, 'Sport', '2016', 'Спорт', 'Sport/Слой 102.png'),
(9, 'Sport', '2017', 'Спорт', 'Sport/Слой 103.png'),
(10, 'Sport', '2017', 'Спорт', 'Sport/Слой 104.png'),
(11, 'Sport', '2017', 'Спорт', 'Sport/Слой 105.png'),
(12, 'Sport', '2017', 'Спорт', 'Sport/Слой 106.png'),
(13, 'Sport', '2015', 'Спорт', 'Sport/Слой 107.png'),
(14, 'Sport', '2018', 'Спорт', 'Sport/Слой 108.png'),
(15, 'Sport', '2018', 'Спорт', 'Sport/Слой 109.png'),
(16, 'Sport', '2018', 'Спорт', 'Sport/Слой 110.png'),
(17, 'Sport', '2018', 'Спорт', 'Sport/Слой 111.png'),
(18, 'Sport', '2019', 'Спорт', 'Sport/Слой 112.png'),
(19, 'Sport', '2019', 'Спорт', 'Sport/Слой 113.png'),
(20, 'Worldskill', '2018', 'Worldskill', 'Worldskill/Слой 39.png'),
(21, 'Worldskill', '2018', 'Worldskill', 'Worldskill/Слой 40.png'),
(22, 'Worldskill', '2019', 'Worldskill', 'Worldskill/Слой 41.png'),
(23, 'Worldskill', '2019', 'Worldskill', 'Worldskill/Слой 42.png'),
(24, 'Worldskill', '2019', 'Worldskill', 'Worldskill/Слой 45.png'),
(25, 'Worldskill', '2019', 'Worldskill', 'Worldskill/Слой 46.png'),
(26, 'Worldskill', '2019', 'Worldskill', 'Worldskill/Слой 47.png'),
(28, 'Worldskill', '2019', 'Worldskill', 'Worldskill/Слой 48.png'),
(30, 'Worldskill', '2019', 'Worldskill', 'Worldskill/Слой 50.png'),
(31, 'Worldskill', '2019', 'Worldskill', 'Worldskill/Слой 51.png'),
(32, 'Worldskill', '2019', 'Worldskill', 'Worldskill/Слой 52.png'),
(33, 'Worldskill', '2019', 'Worldskill', 'Worldskill/Слой 53.png'),
(34, 'Worldskill', '2019', 'Worldskill', 'Worldskill/Слой 54.png'),
(35, 'Worldskill', '2019', 'Worldskill', 'Worldskill/Слой 55.png'),
(36, 'Worldskill', '2019', 'Worldskill', 'Worldskill/Слой 56.png'),
(37, 'Worldskill', '2019', 'Worldskill', 'Worldskill/Слой 57.png'),
(38, 'Worldskill', '2020', 'Worldskill', 'Worldskill/Слой 58.png'),
(39, 'Worldskill', '2020', 'Worldskill', 'Worldskill/Слой 59.png'),
(40, 'Worldskill', '2020', 'Worldskill', 'Worldskill/Слой 60.png'),
(41, 'Worldskill', '2020', 'Worldskill', 'Worldskill/Слой 61.png'),
(42, 'Worldskill', '2020', 'Worldskill', 'Worldskill/Слой 62.png'),
(43, 'Worldskill', '2020', 'Worldskill', 'Worldskill/Слой 63.png'),
(44, 'Worldskill', '2020', 'Worldskill', 'Worldskill/Слой 64.png'),
(45, 'Worldskill', '2020', 'Worldskill', 'Worldskill/Слой 65.png'),
(46, 'Worldskill', '2020', 'Worldskill', 'Worldskill/Слой 66.png'),
(47, 'Worldskill', '2020', 'Worldskill', 'Worldskill/Слой 67.png'),
(48, 'Worldskill', '2020', 'Worldskill', 'Worldskill/Слой 68.png'),
(49, 'Worldskill', '2020', 'Worldskill', 'Worldskill/Слой 69.png'),
(50, 'Worldskill', '2020', 'Worldskill', 'Worldskill/Слой 70.png'),
(51, 'Worldskill', '2018', 'Worldskill', 'Worldskill/Слой 71.png'),
(52, 'Worldskill', '2019', 'Worldskill', 'Worldskill/Слой 72.png'),
(53, 'Worldskill', '2019', 'Worldskill', 'Worldskill/Слой 73.png'),
(54, 'Worldskill', '2019', 'Worldskill', 'Worldskill/Слой 74.png'),
(55, 'Best_teacher', '2017', 'Лучший преподаватель', 'Best_teacher/Слой 114.png'),
(56, 'Best_teacher', '2018', 'Лучший преподаватель', 'Best_teacher/Слой 115.png'),
(57, 'Best_teacher', '2020', 'Лучший преподаватель', 'Best_teacher/Слой 116.png'),
(58, 'Best_teacher', '2020', 'Лучший преподаватель', 'Best_teacher/Слой 117.png'),
(59, 'Best_teacher', '2019', 'Лучший преподаватель', 'Best_teacher/Слой 118.png'),
(60, 'Best_teacher', '2020', 'Лучший преподаватель', 'Best_teacher/Слой 119.png'),
(61, 'Best_teacher', '2017', 'Лучший преподаватель', 'Best_teacher/Слой 120.png'),
(62, 'Best_teacher', '2020', 'Лучший преподаватель', 'Best_teacher/Слой 121.png'),
(63, 'Best_teacher', '2020', 'Лучший преподаватель', 'Best_teacher/Слой 122.png'),
(64, 'Best_teacher', '2021', 'Лучший преподаватель', 'Best_teacher/Слой 123.png'),
(65, 'Best_teacher', '2021', 'Лучший преподаватель', 'Best_teacher/Слой 124.png'),
(66, ' Scientific', '2015', 'Научно-исследовательская', 'Scientific/Слой 1.png'),
(67, ' Scientific', '2015', 'Научно-исследовательская', 'Scientific/Слой 2.png'),
(68, ' Scientific', '2017', 'Научно-исследовательская', 'Scientific/Слой 3.png'),
(69, ' Scientific', '2019', 'Научно-исследовательская', 'Scientific/Слой 4.png'),
(70, ' Scientific', '2019', 'Научно-исследовательская', 'Scientific/Слой 5.png'),
(71, ' Scientific', '2020', 'Научно-исследовательская', 'Scientific/Слой 6.png'),
(72, ' Scientific', '2020', 'Научно-исследовательская', 'Scientific/Слой 7.png'),
(73, ' Scientific', '2020', 'Научно-исследовательская', 'Scientific/Слой 8.png'),
(74, ' Scientific', '2020', 'Научно-исследовательская', 'Scientific/Слой 9.png'),
(75, ' Scientific', '2020', 'Научно-исследовательская', 'Scientific/Слой 10.png'),
(76, ' Scientific', '2020', 'Научно-исследовательская', 'Scientific/Слой 11.png'),
(77, ' Scientific', '2020', 'Научно-исследовательская', 'Scientific/Слой 12.png'),
(78, ' Scientific', '2020', 'Научно-исследовательская', 'Scientific/Слой 13.png'),
(79, ' Scientific', '2020', 'Научно-исследовательская', 'Scientific/Слой 14.png'),
(80, ' Scientific', '2020', 'Научно-исследовательская', 'Scientific/Слой 15.png'),
(81, ' Scientific', '2020', 'Научно-исследовательская', 'Scientific/Слой 16.png'),
(82, ' Scientific', '2020', 'Научно-исследовательская', 'Scientific/Слой 17.png'),
(83, ' Scientific', '2020', 'Научно-исследовательская', 'Scientific/Слой 18.png'),
(84, ' Scientific', '2021', 'Научно-исследовательская', 'Scientific/Слой 19.png'),
(85, ' Scientific', '2021', 'Научно-исследовательская', 'Scientific/Слой 20.png'),
(86, ' Scientific', '2021', 'Научно-исследовательская', 'Scientific/Слой 21.png'),
(87, ' Scientific', '2021', 'Научно-исследовательская', 'Scientific/Слой 22.png'),
(88, ' Scientific', '2021', 'Научно-исследовательская', 'Scientific/Слой 23.png'),
(89, ' Scientific', '2021', 'Научно-исследовательская', 'Scientific/Слой 24.png'),
(90, ' Scientific', '2022', 'Научно-исследовательская', 'Scientific/Слой 26.png'),
(91, ' Scientific', '2022', 'Научно-исследовательская', 'Scientific/Слой 27.png'),
(92, ' Scientific', '2022', 'Научно-исследовательская', 'Scientific/Слой 28.png'),
(93, ' Scientific', '2022', 'Научно-исследовательская', 'Scientific/Слой 29.png'),
(94, ' Scientific', '2022', 'Научно-исследовательская', 'Scientific/Слой 30.png'),
(95, ' Scientific', '2022', 'Научно-исследовательская', 'Scientific/Слой 31.png'),
(96, ' Scientific', '2022', 'Научно-исследовательская', 'Scientific/Слой 32.png'),
(97, ' Scientific', '2022', 'Научно-исследовательская', 'Scientific/Слой 33.png'),
(98, ' Scientific', '2022', 'Научно-исследовательская', 'Scientific/Слой 34.png'),
(99, ' Scientific', '2022', 'Научно-исследовательская', 'Scientific/Слой 35.png'),
(100, ' Scientific', '2022', 'Научно-исследовательская', 'Scientific/Слой 36.png'),
(101, ' Scientific', '2022', 'Научно-исследовательская', 'Scientific/Слой 37.png'),
(102, ' Scientific', '2022', 'Научно-исследовательская', 'Scientific/Слой 38.png'),
(103, ' Scientific', '2022', 'Научно-исследовательская', 'Scientific/Слой 40.png'),
(104, ' Scientific', '2022', 'Научно-исследовательская', 'Scientific/Слой 41.png'),
(105, 'Achives_teachers_veterans', '2015', 'Достижения преподавателей и студентов', 'Achives_teachers_veterans/Слой 71.png'),
(106, 'Achives_teachers_veterans', '2015', 'Достижения преподавателей и студентов', 'Achives_teachers_veterans/Слой 72.png'),
(107, 'Achives_teachers_veterans', '2015', 'Достижения преподавателей и студентов', 'Achives_teachers_veterans/Слой 73.png'),
(108, 'Achives_teachers_veterans', '2015', 'Достижения преподавателей и студентов', 'Achives_teachers_veterans/Слой 74.png'),
(109, 'Achives_teachers_veterans', '2016', 'Достижения преподавателей и студентов', 'Achives_teachers_veterans/Слой 75.png'),
(110, 'Achives_teachers_veterans', '2016', 'Достижения преподавателей и студентов', 'Achives_teachers_veterans/Слой 76.png'),
(111, 'Achives_teachers_veterans', '2017', 'Достижения преподавателей и студентов', 'Achives_teachers_veterans/Слой 77.png'),
(112, 'Achives_teachers_veterans', '2018', 'Достижения преподавателей и студентов', 'Achives_teachers_veterans/Слой 78.png'),
(113, 'Achives_teachers_veterans', '2018', 'Достижения преподавателей и студентов', 'Achives_teachers_veterans/Слой 79.png'),
(114, 'Achives_teachers_veterans', '2019', 'Достижения преподавателей и студентов', 'Achives_teachers_veterans/Слой 80.png'),
(115, 'Achives_teachers_veterans', '2019', 'Достижения преподавателей и студентов', 'Achives_teachers_veterans/Слой 81.png'),
(116, 'Achives_teachers_veterans', '2021', 'Достижения преподавателей и студентов', 'Achives_teachers_veterans/Слой 82.png'),
(117, 'Achives_teachers_veterans', '2020', 'Достижения преподавателей и студентов', 'Achives_teachers_veterans/Слой 83.png'),
(118, 'Achives_teachers_veterans', '2020', 'Достижения преподавателей и студентов', 'Achives_teachers_veterans/Слой 84.png'),
(119, 'Achives_teachers_veterans', '2020', 'Достижения преподавателей и студентов', 'Achives_teachers_veterans/Слой 85.png'),
(120, 'Achives_teachers_veterans', '2020', 'Достижения преподавателей и студентов', 'Achives_teachers_veterans/Слой 86.png'),
(121, 'Achives_teachers_veterans', '2020', 'Достижения преподавателей и студентов', 'Achives_teachers_veterans/Слой 87.png'),
(122, 'Achives_teachers_veterans', '2020', 'Достижения преподавателей и студентов', 'Achives_teachers_veterans/Слой 88.png'),
(123, 'Achives_teachers_veterans', '2020', 'Достижения преподавателей и студентов', 'Achives_teachers_veterans/Слой 89.png'),
(124, 'Achives_teachers_veterans', '2020', 'Достижения преподавателей и студентов', 'Achives_teachers_veterans/Слой 90.png'),
(125, 'Achives_teachers_veterans', '2020', 'Достижения преподавателей и студентов', 'Achives_teachers_veterans/Слой 91.png'),
(126, 'Achives_teachers_veterans', '2020', 'Достижения преподавателей и студентов', 'Achives_teachers_veterans/Слой 92.png'),
(127, 'Achives_teachers_veterans', '2020', 'Достижения преподавателей и студентов', 'Achives_teachers_veterans/Слой 93.png'),
(128, 'Achives_teachers_veterans', '2020', 'Достижения преподавателей и студентов', 'Achives_teachers_veterans/Слой 94.png');

-- --------------------------------------------------------

--
-- Структура таблицы `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `comment` varchar(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `main`
--

CREATE TABLE `main` (
  `id` int(11) NOT NULL,
  `id_achives` int(11) NOT NULL,
  `id_teachers_veterans` int(11) NOT NULL,
  `id_notable alumni` int(11) NOT NULL,
  `id_veterans` int(11) NOT NULL,
  `id_feedback` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `notable alumni`
--

CREATE TABLE `notable alumni` (
  `id` int(11) NOT NULL,
  `fistname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `patr` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `extend_image` varchar(100) NOT NULL,
  `audio interview` blob NOT NULL,
  `biography` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `teachers-veterans`
--

CREATE TABLE `teachers-veterans` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `patr` varchar(50) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `image` varchar(100) NOT NULL,
  `extend_image` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `biography` text NOT NULL,
  `image_achives` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `veterans`
--

CREATE TABLE `veterans` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `patr` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `extend_image` varchar(100) NOT NULL,
  `biography` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `achives`
--
ALTER TABLE `achives`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `main`
--
ALTER TABLE `main`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `notable alumni`
--
ALTER TABLE `notable alumni`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `teachers-veterans`
--
ALTER TABLE `teachers-veterans`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `veterans`
--
ALTER TABLE `veterans`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `achives`
--
ALTER TABLE `achives`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT для таблицы `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT для таблицы `main`
--
ALTER TABLE `main`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `notable alumni`
--
ALTER TABLE `notable alumni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `teachers-veterans`
--
ALTER TABLE `teachers-veterans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `veterans`
--
ALTER TABLE `veterans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
