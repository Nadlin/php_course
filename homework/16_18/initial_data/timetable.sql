-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 07 2020 г., 19:17
-- Версия сервера: 8.0.15
-- Версия PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `timetable`
--
CREATE DATABASE IF NOT EXISTS `timetable` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `timetable`;

-- --------------------------------------------------------

--
-- Структура таблицы `buildings`
--

CREATE TABLE `buildings` (
  `idbuilding` int(11) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `buildings`
--

INSERT INTO `buildings` (`idbuilding`, `address`) VALUES
(1, 'ул. Скрыганова, 14');

-- --------------------------------------------------------

--
-- Структура таблицы `classrooms`
--

CREATE TABLE `classrooms` (
  `idclassroom` int(11) NOT NULL,
  `idbuilding` int(11) NOT NULL,
  `classroomnumber` varchar(30) NOT NULL,
  `seats` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `classrooms`
--

INSERT INTO `classrooms` (`idclassroom`, `idbuilding`, `classroomnumber`, `seats`) VALUES
(1, 1, '52', 20),
(2, 1, '53', 20),
(3, 1, '54', 20),
(4, 1, '55', 20),
(5, 1, '56', 15),
(6, 1, '57', 20);

-- --------------------------------------------------------

--
-- Структура таблицы `curriculum`
--

CREATE TABLE `curriculum` (
  `idcurriculum` int(11) NOT NULL,
  `idspeciality` int(11) NOT NULL,
  `ideducationform` int(11) NOT NULL,
  `entranceyear` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `curriculum`
--

INSERT INTO `curriculum` (`idcurriculum`, `idspeciality`, `ideducationform`, `entranceyear`) VALUES
(1, 1, 1, 2020),
(2, 2, 1, 2020),
(3, 3, 1, 2020),
(4, 4, 2, 2020),
(5, 5, 3, 2020),
(6, 1, 3, 2020);

-- --------------------------------------------------------

--
-- Структура таблицы `curriculumsubjects`
--

CREATE TABLE `curriculumsubjects` (
  `idcurriculum` int(11) NOT NULL,
  `idsubject` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `curriculumsubjects`
--

INSERT INTO `curriculumsubjects` (`idcurriculum`, `idsubject`) VALUES
(1, 1),
(2, 2),
(3, 3),
(1, 5),
(2, 5),
(3, 5),
(4, 6),
(4, 7),
(5, 8);

-- --------------------------------------------------------

--
-- Структура таблицы `educationforms`
--

CREATE TABLE `educationforms` (
  `ideducationform` int(11) NOT NULL,
  `educationform` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `educationforms`
--

INSERT INTO `educationforms` (`ideducationform`, `educationform`) VALUES
(3, 'Вечерняя'),
(2, 'Заочная'),
(1, 'Очная');

-- --------------------------------------------------------

--
-- Структура таблицы `groupstudents`
--

CREATE TABLE `groupstudents` (
  `idgroup` int(11) NOT NULL,
  `idcurriculum` int(11) NOT NULL,
  `groupnumber` varchar(45) NOT NULL,
  `studentsnumber` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `groupstudents`
--

INSERT INTO `groupstudents` (`idgroup`, `idcurriculum`, `groupnumber`, `studentsnumber`) VALUES
(1, 1, 'N1', 12),
(2, 2, 'J1', 16),
(3, 3, 'P1', 10),
(4, 4, 'W1', 14),
(5, 5, 'C1', 13),
(6, 6, 'N2', 17);

-- --------------------------------------------------------

--
-- Структура таблицы `groupteachers`
--

CREATE TABLE `groupteachers` (
  `idgroupteacher` int(11) NOT NULL,
  `idgroup` int(11) NOT NULL,
  `idcurriculum` int(11) NOT NULL,
  `idsubjecthours` int(11) NOT NULL,
  `idteacher` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `groupteachers`
--

INSERT INTO `groupteachers` (`idgroupteacher`, `idgroup`, `idcurriculum`, `idsubjecthours`, `idteacher`) VALUES
(1, 1, 1, 1, 1),
(2, 2, 2, 2, 1),
(3, 3, 3, 3, 2),
(4, 4, 4, 4, 3),
(5, 1, 1, 5, 2),
(6, 2, 2, 6, 2),
(7, 3, 3, 7, 2),
(8, 4, 4, 8, 3),
(9, 5, 5, 9, 1),
(10, 3, 3, 10, 2),
(11, 3, 3, 11, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `lessons`
--

CREATE TABLE `lessons` (
  `idlesson` int(11) NOT NULL,
  `idgroupteacher` int(11) NOT NULL,
  `idclassroom` int(11) NOT NULL,
  `lessondate` date NOT NULL,
  `lessontime` time NOT NULL,
  `hours` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `lessons`
--

INSERT INTO `lessons` (`idlesson`, `idgroupteacher`, `idclassroom`, `lessondate`, `lessontime`, `hours`) VALUES
(1, 10, 6, '2020-05-04', '09:30:00', 4),
(2, 7, 6, '2020-05-04', '12:30:00', 4),
(3, 2, 4, '2020-05-04', '09:30:00', 4),
(4, 1, 3, '2020-05-04', '15:30:00', 4),
(5, 5, 3, '2020-05-04', '09:30:00', 4),
(6, 4, 2, '2020-05-04', '15:30:00', 4),
(7, 8, 2, '2020-05-04', '18:30:00', 4),
(8, 9, 5, '2020-05-04', '18:30:00', 4),
(9, 10, 6, '2020-05-05', '09:30:00', 4),
(10, 7, 6, '2020-05-05', '12:30:00', 4),
(11, 2, 4, '2020-05-05', '09:30:00', 4),
(12, 1, 3, '2020-05-05', '15:30:00', 4),
(13, 5, 3, '2020-05-05', '09:30:00', 4),
(14, 4, 2, '2020-05-05', '15:30:00', 4),
(15, 8, 2, '2020-05-05', '18:30:00', 4),
(16, 9, 5, '2020-05-05', '18:30:00', 4),
(17, 10, 6, '2020-05-06', '09:30:00', 4),
(18, 7, 6, '2020-05-06', '12:30:00', 4),
(19, 2, 4, '2020-05-06', '09:30:00', 4),
(20, 1, 3, '2020-05-06', '15:30:00', 4),
(21, 5, 3, '2020-05-06', '09:30:00', 4),
(22, 4, 2, '2020-05-06', '15:30:00', 4),
(23, 8, 2, '2020-05-06', '18:30:00', 4),
(24, 9, 5, '2020-05-06', '18:30:00', 4),
(25, 10, 6, '2020-05-07', '09:30:00', 4),
(26, 7, 6, '2020-05-07', '12:30:00', 4),
(27, 2, 4, '2020-05-07', '09:30:00', 4),
(28, 1, 3, '2020-05-07', '15:30:00', 4),
(29, 5, 3, '2020-05-07', '09:30:00', 4),
(30, 4, 2, '2020-05-07', '15:30:00', 4),
(31, 8, 2, '2020-05-07', '18:30:00', 4),
(32, 9, 5, '2020-05-07', '18:30:00', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `lessontypes`
--

CREATE TABLE `lessontypes` (
  `idlessontype` int(11) NOT NULL,
  `lessontype` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `lessontypes`
--

INSERT INTO `lessontypes` (`idlessontype`, `lessontype`) VALUES
(3, 'Вебинар'),
(1, 'Лекция'),
(2, 'Семинар');

-- --------------------------------------------------------

--
-- Структура таблицы `positions`
--

CREATE TABLE `positions` (
  `idposition` int(11) NOT NULL,
  `position` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `positions`
--

INSERT INTO `positions` (`idposition`, `position`) VALUES
(2, 'Доцент'),
(3, 'Преподаватель'),
(1, 'Профессор');

-- --------------------------------------------------------

--
-- Структура таблицы `specialities`
--

CREATE TABLE `specialities` (
  `idspeciality` int(11) NOT NULL,
  `speciality` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `specialities`
--

INSERT INTO `specialities` (`idspeciality`, `speciality`) VALUES
(1, '.NET Developer'),
(5, 'C++ developer'),
(2, 'Java developer'),
(3, 'PHP developer'),
(4, 'Web developer');

-- --------------------------------------------------------

--
-- Структура таблицы `subjecthours`
--

CREATE TABLE `subjecthours` (
  `idsubjecthours` int(11) NOT NULL,
  `idcurriculum` int(11) NOT NULL,
  `idsubject` int(11) NOT NULL,
  `idlessontype` int(11) NOT NULL,
  `hours` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `subjecthours`
--

INSERT INTO `subjecthours` (`idsubjecthours`, `idcurriculum`, `idsubject`, `idlessontype`, `hours`) VALUES
(1, 1, 1, 2, 32),
(2, 2, 2, 1, 44),
(3, 3, 3, 3, 30),
(4, 4, 6, 1, 46),
(5, 1, 5, 2, 30),
(6, 2, 5, 3, 26),
(7, 3, 5, 2, 20),
(8, 4, 7, 2, 20),
(9, 5, 8, 1, 30),
(10, 3, 3, 2, 24),
(11, 3, 5, 1, 20);

-- --------------------------------------------------------

--
-- Структура таблицы `subjects`
--

CREATE TABLE `subjects` (
  `idsubject` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `subjects`
--

INSERT INTO `subjects` (`idsubject`, `subject`) VALUES
(1, 'ASP.NET'),
(8, 'C++'),
(6, 'HTML'),
(2, 'Java'),
(7, 'Javascript'),
(5, 'MySQL'),
(4, 'Oracle'),
(3, 'PHP');

-- --------------------------------------------------------

--
-- Структура таблицы `teachers`
--

CREATE TABLE `teachers` (
  `idteacher` int(11) NOT NULL,
  `idposition` int(11) NOT NULL,
  `surname` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `middlename` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `teachers`
--

INSERT INTO `teachers` (`idteacher`, `idposition`, `surname`, `name`, `middlename`) VALUES
(1, 1, 'Иванов', 'Иван', 'Иванович'),
(2, 2, 'Петров', 'Алексей', 'Михайлович'),
(3, 1, 'Михайлов', 'Андрей', 'Сидорович'),
(4, 2, 'Иванов', 'Петр', 'Николаевич');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `buildings`
--
ALTER TABLE `buildings`
  ADD PRIMARY KEY (`idbuilding`),
  ADD UNIQUE KEY `address_UNIQUE` (`address`);

--
-- Индексы таблицы `classrooms`
--
ALTER TABLE `classrooms`
  ADD PRIMARY KEY (`idclassroom`),
  ADD KEY `fk_classrooms_buildings1_idx` (`idbuilding`);

--
-- Индексы таблицы `curriculum`
--
ALTER TABLE `curriculum`
  ADD PRIMARY KEY (`idcurriculum`),
  ADD KEY `fk_curriculum_specialities_idx` (`idspeciality`),
  ADD KEY `fk_curriculum_educationforms1_idx` (`ideducationform`);

--
-- Индексы таблицы `curriculumsubjects`
--
ALTER TABLE `curriculumsubjects`
  ADD PRIMARY KEY (`idcurriculum`,`idsubject`),
  ADD KEY `fk_curriculumsubjects_subjects1_idx` (`idsubject`);

--
-- Индексы таблицы `educationforms`
--
ALTER TABLE `educationforms`
  ADD PRIMARY KEY (`ideducationform`),
  ADD UNIQUE KEY `educationform_UNIQUE` (`educationform`);

--
-- Индексы таблицы `groupstudents`
--
ALTER TABLE `groupstudents`
  ADD PRIMARY KEY (`idgroup`,`idcurriculum`),
  ADD KEY `fk_groupstudents_curriculum1_idx` (`idcurriculum`);

--
-- Индексы таблицы `groupteachers`
--
ALTER TABLE `groupteachers`
  ADD PRIMARY KEY (`idgroupteacher`),
  ADD KEY `fk_groupteachers_groups1_idx` (`idgroup`,`idcurriculum`),
  ADD KEY `fk_groupteachers_subjecthours1_idx` (`idsubjecthours`,`idcurriculum`),
  ADD KEY `fk_groupteachers_teachers1_idx` (`idteacher`);

--
-- Индексы таблицы `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`idlesson`),
  ADD KEY `fk_lessons_groupteachers1_idx` (`idgroupteacher`),
  ADD KEY `fk_lessons_classrooms1_idx` (`idclassroom`),
  ADD KEY `IDX_lessondate` (`lessondate`);

--
-- Индексы таблицы `lessontypes`
--
ALTER TABLE `lessontypes`
  ADD PRIMARY KEY (`idlessontype`),
  ADD UNIQUE KEY `lessontype_UNIQUE` (`lessontype`);

--
-- Индексы таблицы `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`idposition`),
  ADD UNIQUE KEY `position_UNIQUE` (`position`);

--
-- Индексы таблицы `specialities`
--
ALTER TABLE `specialities`
  ADD PRIMARY KEY (`idspeciality`),
  ADD UNIQUE KEY `speciality_UNIQUE` (`speciality`);

--
-- Индексы таблицы `subjecthours`
--
ALTER TABLE `subjecthours`
  ADD PRIMARY KEY (`idsubjecthours`,`idcurriculum`),
  ADD KEY `fk_subjecthours_curriculumsubjects1_idx` (`idcurriculum`,`idsubject`),
  ADD KEY `fk_subjecthours_lessontypes1_idx` (`idlessontype`);

--
-- Индексы таблицы `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`idsubject`),
  ADD UNIQUE KEY `subject_UNIQUE` (`subject`);

--
-- Индексы таблицы `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`idteacher`),
  ADD KEY `fk_teachers_positions1_idx` (`idposition`),
  ADD KEY `fio` (`surname`,`name`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `buildings`
--
ALTER TABLE `buildings`
  MODIFY `idbuilding` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `classrooms`
--
ALTER TABLE `classrooms`
  MODIFY `idclassroom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `curriculum`
--
ALTER TABLE `curriculum`
  MODIFY `idcurriculum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `educationforms`
--
ALTER TABLE `educationforms`
  MODIFY `ideducationform` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `groupstudents`
--
ALTER TABLE `groupstudents`
  MODIFY `idgroup` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `groupteachers`
--
ALTER TABLE `groupteachers`
  MODIFY `idgroupteacher` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `lessons`
--
ALTER TABLE `lessons`
  MODIFY `idlesson` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT для таблицы `lessontypes`
--
ALTER TABLE `lessontypes`
  MODIFY `idlessontype` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `positions`
--
ALTER TABLE `positions`
  MODIFY `idposition` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `specialities`
--
ALTER TABLE `specialities`
  MODIFY `idspeciality` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `subjecthours`
--
ALTER TABLE `subjecthours`
  MODIFY `idsubjecthours` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `subjects`
--
ALTER TABLE `subjects`
  MODIFY `idsubject` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `teachers`
--
ALTER TABLE `teachers`
  MODIFY `idteacher` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `classrooms`
--
ALTER TABLE `classrooms`
  ADD CONSTRAINT `fk_classrooms_buildings1` FOREIGN KEY (`idbuilding`) REFERENCES `buildings` (`idbuilding`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `curriculum`
--
ALTER TABLE `curriculum`
  ADD CONSTRAINT `fk_curriculum_educationforms1` FOREIGN KEY (`ideducationform`) REFERENCES `educationforms` (`ideducationform`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_curriculum_specialities` FOREIGN KEY (`idspeciality`) REFERENCES `specialities` (`idspeciality`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `curriculumsubjects`
--
ALTER TABLE `curriculumsubjects`
  ADD CONSTRAINT `fk_curriculumsubjects_curriculum1` FOREIGN KEY (`idcurriculum`) REFERENCES `curriculum` (`idcurriculum`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_curriculumsubjects_subjects1` FOREIGN KEY (`idsubject`) REFERENCES `subjects` (`idsubject`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `groupstudents`
--
ALTER TABLE `groupstudents`
  ADD CONSTRAINT `fk_groupstudents_curriculum1` FOREIGN KEY (`idcurriculum`) REFERENCES `curriculum` (`idcurriculum`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `groupteachers`
--
ALTER TABLE `groupteachers`
  ADD CONSTRAINT `fk_groupteachers_groups1` FOREIGN KEY (`idgroup`,`idcurriculum`) REFERENCES `groupstudents` (`idgroup`, `idcurriculum`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_groupteachers_subjecthours1` FOREIGN KEY (`idsubjecthours`,`idcurriculum`) REFERENCES `subjecthours` (`idsubjecthours`, `idcurriculum`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_groupteachers_teachers1` FOREIGN KEY (`idteacher`) REFERENCES `teachers` (`idteacher`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `lessons`
--
ALTER TABLE `lessons`
  ADD CONSTRAINT `fk_lessons_classrooms1` FOREIGN KEY (`idclassroom`) REFERENCES `classrooms` (`idclassroom`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_lessons_groupteachers1` FOREIGN KEY (`idgroupteacher`) REFERENCES `groupteachers` (`idgroupteacher`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `subjecthours`
--
ALTER TABLE `subjecthours`
  ADD CONSTRAINT `fk_subjecthours_curriculumsubjects1` FOREIGN KEY (`idcurriculum`,`idsubject`) REFERENCES `curriculumsubjects` (`idcurriculum`, `idsubject`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_subjecthours_lessontypes1` FOREIGN KEY (`idlessontype`) REFERENCES `lessontypes` (`idlessontype`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `fk_teachers_positions1` FOREIGN KEY (`idposition`) REFERENCES `positions` (`idposition`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
