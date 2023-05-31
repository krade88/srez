-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 31 2023 г., 14:29
-- Версия сервера: 10.8.4-MariaDB
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `MusicHouse`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Category`
--

CREATE TABLE `Category` (
  `Id` int(11) NOT NULL,
  `nameCat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `Category`
--

INSERT INTO `Category` (`Id`, `nameCat`) VALUES
(2, '1');

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `Id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` int(11) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`Id`, `image`, `name`, `price`, `description`, `country`, `model`, `year`, `count`) VALUES
(2, '../Images/6ad71b6c71d1212f3222acbf9a42177a.jpeg', 'Струнный инструмент 2', '1000', 'Классная', 'РФ', 'T1000', 2023, 1),
(3, '../Images/6b8ff4aa5dbb588a6060bdd0aa681d06.jpeg', 'Струнный инструмент 3', '1000', 'Классная', 'РФ', 'T1000', 2023, 2),
(6, '../Images/61e3012c9fbb2126150a65217989ac40.jpeg', 'Клавишный инструмент', '1000', 'Балдёжный', 'РФ', 'T1000', 2023, 3),
(7, '../Images/64cfdacbf99b58def0266e5637f67a60.jpeg', 'Струнный инструмент 6', '1000', 'Классная', 'РФ', 'T1000', 2023, 4),
(8, '../Images/81667a90791d9d3a095f5baf2739a20f.jpeg', 'Клавишный инструмент 2', '1000', 'Балдёжный', 'РФ', 'T1000', 2023, 0),
(9, '../Images/b0b8537c31a8db2e313085f53ceedb8f.jpeg', 'Струнный инструмент 7', '1000', 'Классная', 'РФ', 'T1000', 2023, 5),
(11, '../Images/b39e8882d68fed2dce3984d12319718a.png', 'Клавишный инструмент 3', '1000', 'Балдёжный', 'РФ', 'T1000', 2023, 0),
(13, '../Images/ca41b0a3824f7aa1d155a726162e9f5d.jpeg', 'Струнный инструмент 9', '10', 'Классная', 'РФ', 'T1000', 2023, 0),
(14, '../Images/dcc2056b19c1c8cc30b0539235719a36.jpeg', 'Струнный инструмент 10', '1000', 'Классная', 'РФ', 'T1000', 2023, 0),
(16, '../Images/e9a917c442e68e8721fb6dcece67ea7c.jpeg', 'Струнный инструмент 11', '1000', 'Классная', 'РФ', 'T1000', 2023, 6),
(19, '../Images/2d5d0cc68ffe42f62dddcda05bf80304.jpeg', '1', '1', '1', 'РФ', 'T1000', 2023, 0),
(20, '../Images/2d5d0cc68ffe42f62dddcda05bf80304.jpeg', '1', '1', '1', 'РФ', 'T1000', 2023, 0),
(22, '../Images/9e1e3bf9c49924a6f73cf10b6f0d3a91.jpeg', '1', '1', '1', 'РФ', 'T1000', 2023, 0),
(23, '../Images/2d5d0cc68ffe42f62dddcda05bf80304.jpeg', '1', '1', '1', 'РФ', 'T1000', 2023, 0),
(24, '../Images/1.jpg', 'Чел с яблоком', '1', '1', '', '', 0, 0),
(25, '../Images/2.jpg', 'Картина Ван Гога', '500 рублей', 'Круть', 'Нидерланды', 'Т1000', 1889, 0),
(27, '../Images/2d5d0cc68ffe42f62dddcda05bf80304.jpeg', '1', '1', '1', '1', '1', 2, 0),
(28, '../Images/eef58e896eb2b75fa6526e15a30c74f4.png', 'dfg', '1', 'w', '12', '21', 2, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `Id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patronymic` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rpassword` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`Id`, `name`, `surname`, `patronymic`, `login`, `email`, `password`, `rpassword`, `role`) VALUES
(9, 'Александр', 'Егоров', 'Евгеньевич', 'krade88', 'alexandregorov882204@gmail.com', '$2y$10$44rDq6e9f6UjzwUnBkQnLehnrn6ZC.qMDYIWfFXCVW2dVFdLexcvC', '123', 'client'),
(10, 'Александр', 'Егоров', 'Евгеньевич', 'admin', 'alexandregorov882204@gmail.com', '$2y$10$Ut6u2/eh3OpTYkk7i0kmSeW9r3lCJ.VoenRNVCOdlVOSPSaYTXdRu', 'admin22', 'admin');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Category`
--
ALTER TABLE `Category`
  ADD PRIMARY KEY (`Id`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Category`
--
ALTER TABLE `Category`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
