-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 22 2018 г., 18:03
-- Версия сервера: 5.6.37
-- Версия PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `comment_bd`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `text_comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `page_id`, `name`, `text_comment`) VALUES
(81, 2, 'проверим', 'проверим'),
(82, 3, 'стр3', 'стр3'),
(83, 1, '1', '1'),
(84, 4, 'камент4', '4'),
(85, 1, '1', 'комментрий для стр 1'),
(86, 2, '2', 'камент 2'),
(87, 0, '', ''),
(88, 4, '4', 'камент44'),
(89, 9, 'а', 'а'),
(90, 10, 'проверим а', 'проверим а'),
(91, 11, '11', 'камент11'),
(92, 9, '1', 'камент индекс'),
(93, 12, '4', 'камент44'),
(94, 10, '2', 'камент2'),
(95, 13, '5', 'камент к 5'),
(96, 10, 'вася', 'пупкин'),
(97, 10, 'имя', 'камент'),
(98, 10, 'еще', 'еще камент'),
(99, 11, 'камент345', 'камент345'),
(100, 10, '1', 'Полное содержание сообщения 2 редакт');

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `id_comment` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `author` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `page_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `text_comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `id_comment`, `title`, `text`, `author`, `content`, `page_id`, `name`, `text_comment`) VALUES
(10, 0, 'сообщение редакт', 'Полное содержание сообщения 2 редакт', 'Вася пупкин', 'Краткое содержание сообщения 2', 0, '', 'прикол'),
(11, 0, 'сообщение 3', 'Полное содержанание3', 'пушкин', 'соо3', 0, '', ''),
(12, 0, '4', '44', '4', '4', 0, '', ''),
(13, 0, 'ссобщение5', 'Полное содержанание ссобщение5', 'дюма', '5', 0, '', '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
