-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 07 2021 г., 21:25
-- Версия сервера: 8.0.19
-- Версия PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `site`
--
DROP DATABASE IF EXISTS `site`;
CREATE DATABASE IF NOT EXISTS `site` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `site`;

-- --------------------------------------------------------

--
-- Структура таблицы `guestbook`
--

CREATE TABLE `guestbook` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `message_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `guestbook`
--

INSERT INTO `guestbook` (`id`, `name`, `message`, `message_time`) VALUES
(1, 'admin', 'Пишите свои сообщения', '2021-05-21 15:38:31'),
(4, 'user', 'Первое сообщение', '2021-06-06 21:15:18');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `login` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `role`) VALUES
(1, 'admin', '$2y$10$/ZWf4mK8B1/G4/ylbnHcPen3sZOxHlIZCczodFtEwCzxwK32XQY6W', 'admin'),
(2, 'user', '$2y$10$lnW9KZbgNkQy1kuqkEn93On1KoRqvrRcWzVbymLPciKQaCYUdd6Tm', 'user');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `guestbook`
--
ALTER TABLE `guestbook`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `guestbook`
--
ALTER TABLE `guestbook`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
