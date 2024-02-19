-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Фев 19 2024 г., 05:32
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
  `name` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `notable alumni`
--

CREATE TABLE `notable alumni` (
  `id` int(11) NOT NULL,
  `fistname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `patr` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `extend_image` varchar(255) NOT NULL,
  `audio interview` blob NOT NULL,
  `biography` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `teachers-veterans`
--

CREATE TABLE `teachers-veterans` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `patr` varchar(255) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `image` varchar(255) NOT NULL,
  `extend_image` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `biography` varchar(10000) NOT NULL,
  `image_achives` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `veterans`
--

CREATE TABLE `veterans` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `patr` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `extend_image` varchar(255) NOT NULL,
  `biography` varchar(10000) NOT NULL
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `feedback`
--
ALTER TABLE `feedback`
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
