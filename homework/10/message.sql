-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 18 2021 г., 19:53
-- Версия сервера: 8.0.24
-- Версия PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `guestbook`
--

-- --------------------------------------------------------

--
-- Структура таблицы `message`
--

CREATE TABLE `message` (
  `id` int NOT NULL,
  `user` varchar(25) NOT NULL,
  `message_text` varchar(2000) NOT NULL,
  `message_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `avatar` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `message`
--

INSERT INTO `message` (`id`, `user`, `message_text`, `message_time`, `avatar`) VALUES
(1, 'user 1', 'Test message from user 1', '2021-12-11 14:08:29', NULL),
(2, 'user 2', 'Test message from user 2', '2021-12-11 14:08:29', NULL),
(3, 'user 3', 'Test message from user 3', '2021-12-11 14:08:29', NULL),
(4, 'user 4', 'Test message from user 4', '2021-12-11 14:08:29', NULL),
(5, 'user 5', 'Test message from user 5', '2021-12-11 14:08:29', NULL),
(6, 'user 6', 'Test message from user 6', '2021-12-11 14:08:29', NULL),
(7, 'user 7', 'Test message from user 7', '2021-12-11 14:08:29', NULL),
(8, 'user 8', 'Test message from user 8', '2021-12-11 14:08:29', NULL),
(9, 'user 9', 'Test message from user 9', '2021-12-11 14:08:29', NULL),
(10, 'user 10', 'Test message from user 10', '2021-12-11 14:08:29', NULL),
(11, 'user 11', 'Test message from user 11', '2021-12-11 14:08:29', NULL),
(12, 'user 12', 'Test message from user 12', '2021-12-11 14:08:29', NULL),
(13, 'user 13', 'Test message from user 13', '2021-12-11 14:08:29', NULL),
(14, 'user 14', 'Test message from user 14', '2021-12-11 14:08:29', NULL),
(15, 'user 15', 'Test message from user 15', '2021-12-11 14:08:29', NULL),
(16, 'user 16', 'Test message from user 16', '2021-12-11 14:08:29', NULL),
(17, 'user 17', 'Test message from user 17', '2021-12-11 14:08:29', NULL),
(18, 'user 18', 'Test message from user 18', '2021-12-11 14:08:29', NULL),
(19, 'user 19', 'Test message from user 19', '2021-12-11 14:08:29', NULL),
(20, 'user 20', 'Test message from user 20', '2021-12-11 14:08:29', NULL),
(21, 'user 21', 'Test message from user 21', '2021-12-11 14:08:29', NULL),
(22, 'user 22', 'Test message from user 22', '2021-12-11 14:08:29', NULL),
(23, 'user 23', 'Test message from user 23', '2021-12-11 14:08:29', NULL),
(24, 'user 24', 'Test message from user 24', '2021-12-11 14:08:29', NULL),
(25, 'user 25', 'Test message from user 25', '2021-12-11 14:08:29', NULL),
(26, 'user 26', 'Test message from user 26', '2021-12-11 14:08:29', NULL),
(27, 'user 27', 'Test message from user 27', '2021-12-11 14:08:29', NULL),
(28, 'user 28', 'Test message from user 28', '2021-12-11 14:08:29', NULL),
(29, 'user 29', 'Test message from user 29', '2021-12-11 14:08:29', NULL),
(30, 'user 30', 'Test message from user 30', '2021-12-11 14:08:29', NULL),
(31, 'user 31', 'Test message from user 31', '2021-12-11 14:08:29', NULL),
(32, 'user 32', 'Test message from user 32', '2021-12-11 14:08:29', NULL),
(33, 'user 33', 'Test message from user 33', '2021-12-11 14:08:29', NULL),
(34, 'user 34', 'Test message from user 34', '2021-12-11 14:08:29', NULL),
(35, 'user 35', 'Test message from user 35', '2021-12-11 14:08:29', NULL),
(36, 'user 36', 'Test message from user 36', '2021-12-11 14:08:29', NULL),
(37, 'user 37', 'Test message from user 37', '2021-12-11 14:08:29', NULL),
(38, 'user 38', 'Test message from user 38', '2021-12-11 14:08:29', NULL),
(39, 'user 39', 'Test message from user 39', '2021-12-11 14:08:29', NULL),
(40, 'user 40', 'Test message from user 40', '2021-12-11 14:08:29', NULL),
(41, 'user 41', 'Test message from user 41', '2021-12-11 14:08:29', NULL),
(42, 'user 42', 'Test message from user 42', '2021-12-11 14:08:29', NULL),
(43, 'user 43', 'Test message from user 43', '2021-12-11 14:08:29', NULL),
(44, 'user 44', 'Test message from user 44', '2021-12-11 14:08:29', NULL),
(45, 'user 45', 'Test message from user 45', '2021-12-11 14:08:29', NULL),
(46, 'user 46', 'Test message from user 46', '2021-12-11 14:08:29', NULL),
(47, 'user 47', 'Test message from user 47', '2021-12-11 14:08:29', NULL),
(48, 'user 48', 'Test message from user 48', '2021-12-11 14:08:29', NULL),
(49, 'user 49', 'Test message from user 49', '2021-12-11 14:08:29', NULL),
(50, 'user 50', 'Test message from user 50', '2021-12-11 14:08:29', NULL),
(51, 'user 51', 'Test message from user 51', '2021-12-11 14:08:29', NULL),
(52, 'user 52', 'Test message from user 52', '2021-12-11 14:08:29', NULL),
(53, 'user 53', 'Test message from user 53', '2021-12-11 14:08:29', NULL),
(54, 'user 54', 'Test message from user 54', '2021-12-11 14:08:29', NULL),
(55, 'user 55', 'Test message from user 55', '2021-12-11 14:08:29', NULL),
(56, 'user 56', 'Test message from user 56', '2021-12-11 14:08:29', NULL),
(57, 'user 57', 'Test message from user 57', '2021-12-11 14:08:29', NULL),
(58, 'user 58', 'Test message from user 58', '2021-12-11 14:08:29', NULL),
(59, 'user 59', 'Test message from user 59', '2021-12-11 14:08:29', NULL),
(60, 'user 60', 'Test message from user 60', '2021-12-11 14:08:29', NULL),
(61, 'user 61', 'Test message from user 61', '2021-12-11 14:08:29', NULL),
(62, 'user 62', 'Test message from user 62', '2021-12-11 14:08:29', NULL),
(63, 'user 63', 'Test message from user 63', '2021-12-11 14:08:29', NULL),
(64, 'user 64', 'Test message from user 64', '2021-12-11 14:08:29', NULL),
(65, 'user 65', 'Test message from user 65', '2021-12-11 14:08:29', NULL),
(66, 'user 66', 'Test message from user 66', '2021-12-11 14:08:29', NULL),
(67, 'user 67', 'Test message from user 67', '2021-12-11 14:08:29', NULL),
(68, 'user 68', 'Test message from user 68', '2021-12-11 14:08:29', NULL),
(69, 'user 69', 'Test message from user 69', '2021-12-11 14:08:29', NULL),
(70, 'user 70', 'Test message from user 70', '2021-12-11 14:08:29', NULL),
(71, 'user 71', 'Test message from user 71', '2021-12-11 14:08:29', NULL),
(72, 'user 72', 'Test message from user 72', '2021-12-11 14:08:29', NULL),
(73, 'user 73', 'Test message from user 73', '2021-12-11 14:08:29', NULL),
(74, 'user 74', 'Test message from user 74', '2021-12-11 14:08:29', NULL),
(75, 'user 75', 'Test message from user 75', '2021-12-11 14:08:29', NULL),
(76, 'user 76', 'Test message from user 76', '2021-12-11 14:08:29', NULL),
(77, 'user 77', 'Test message from user 77', '2021-12-11 14:08:29', NULL),
(78, 'user 78', 'Test message from user 78', '2021-12-11 14:08:29', NULL),
(79, 'user 79', 'Test message from user 79', '2021-12-11 14:08:29', NULL),
(80, 'user 80', 'Test message from user 80', '2021-12-11 14:08:29', NULL),
(81, 'user 81', 'Test message from user 81', '2021-12-11 14:08:29', NULL),
(82, 'user 82', 'Test message from user 82', '2021-12-11 14:08:29', NULL),
(83, 'user 83', 'Test message from user 83', '2021-12-11 14:08:29', NULL),
(84, 'user 84', 'Test message from user 84', '2021-12-11 14:08:29', NULL),
(85, 'user 85', 'Test message from user 85', '2021-12-11 14:08:29', NULL),
(86, 'user 86', 'Test message from user 86', '2021-12-11 14:08:29', NULL),
(87, 'user 87', 'Test message from user 87', '2021-12-11 14:08:29', NULL),
(88, 'user 88', 'Test message from user 88', '2021-12-11 14:08:29', NULL),
(89, 'user 89', 'Test message from user 89', '2021-12-11 14:08:29', NULL),
(90, 'user 90', 'Test message from user 90', '2021-12-11 14:08:29', NULL),
(91, 'user 91', 'Test message from user 91', '2021-12-11 14:08:29', NULL),
(92, 'user 92', 'Test message from user 92', '2021-12-11 14:08:29', NULL),
(93, 'user 93', 'Test message from user 93', '2021-12-11 14:08:29', NULL),
(94, 'user 94', 'Test message from user 94', '2021-12-11 14:08:29', NULL),
(95, 'user 95', 'Test message from user 95', '2021-12-11 14:08:29', NULL),
(96, 'user 96', 'Test message from user 96', '2021-12-11 14:08:29', NULL),
(97, 'user 97', 'Test message from user 97', '2021-12-11 14:08:29', NULL),
(98, 'user 98', 'Test message from user 98', '2021-12-11 14:08:29', NULL),
(99, 'user 99', 'Test message from user 99', '2021-12-11 14:08:29', NULL),
(100, 'user 100', 'Test message from user 100', '2021-12-11 14:08:29', NULL),
(101, 'user 101', 'Test message from user 101', '2021-12-11 14:08:29', NULL),
(102, 'user 102', 'Test message from user 102', '2021-12-11 14:08:29', NULL),
(103, 'user 103', 'Test message from user 103', '2021-12-11 14:08:29', NULL),
(104, 'user 104', 'Test message from user 104', '2021-12-11 14:08:29', NULL),
(105, 'user 105', 'Test message from user 105', '2021-12-11 14:08:29', NULL),
(106, 'user 106', 'Test message from user 106', '2021-12-11 14:08:29', NULL),
(107, 'user 107', 'Test message from user 107', '2021-12-11 14:08:29', NULL),
(108, 'user 108', 'Test message from user 108', '2021-12-11 14:08:29', NULL),
(109, 'user 109', 'Test message from user 109', '2021-12-11 14:08:29', NULL),
(110, 'user 110', 'Test message from user 110', '2021-12-11 14:08:29', NULL),
(111, 'user 111', 'Test message from user 111', '2021-12-11 14:08:29', NULL),
(112, 'nadezhda.linnik', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using', '2021-12-15 19:41:34', NULL),
(113, 'Molchanova Elena', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', '2021-12-15 19:48:37', NULL),
(114, 'Poroh Natalya', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', '2021-12-15 19:54:33', NULL),
(116, 'fref', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '2021-12-15 20:38:28', NULL),
(118, 'fref', '&lt;script&gt;alert(&apos;hi-hi&apos;)&lt;/script&gt;', '2021-12-15 20:43:02', NULL),
(126, 'Popova Rita', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&apos;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&apos;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', '2021-12-15 21:44:40', 'images/girl.jpg'),
(130, 'xsx', 'efefe', '2021-12-15 22:00:51', 'images/boy-2.jpg'),
(131, 'Popov Edik', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2021-12-18 18:30:32', 'images/163984143233'),
(132, 'Kristina', 'Vestibulum pharetra, arcu id congue pretium, sem odio ris non varius lorem. Maecenas sed neque nunc. Morbi ac nibh blandit, efficitur tell', '2021-12-18 18:35:57', 'images/1639841757_11');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `message`
--
ALTER TABLE `message`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
