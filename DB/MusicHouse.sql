-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 24 2023 г., 17:36
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

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
  `Id` int NOT NULL,
  `nameCat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
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
  `Id` int NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `year` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`Id`, `image`, `name`, `price`, `description`, `country`, `model`, `year`) VALUES
(2, '../Images/6ad71b6c71d1212f3222acbf9a42177a.jpeg', 'Струнный инструмент 2', '1000', 'Классная', 'РФ', 'T1000', 2023),
(3, '../Images/6b8ff4aa5dbb588a6060bdd0aa681d06.jpeg', 'Струнный инструмент 3', '1000', 'Классная', 'РФ', 'T1000', 2023),
(6, '../Images/61e3012c9fbb2126150a65217989ac40.jpeg', 'Клавишный инструмент', '1000', 'Балдёжный', 'РФ', 'T1000', 2023),
(7, '../Images/64cfdacbf99b58def0266e5637f67a60.jpeg', 'Струнный инструмент 6', '1000', 'Классная', 'РФ', 'T1000', 2023),
(8, '../Images/81667a90791d9d3a095f5baf2739a20f.jpeg', 'Клавишный инструмент 2', '1000', 'Балдёжный', 'РФ', 'T1000', 2023),
(9, '../Images/b0b8537c31a8db2e313085f53ceedb8f.jpeg', 'Струнный инструмент 7', '1000', 'Классная', 'РФ', 'T1000', 2023),
(11, '../Images/b39e8882d68fed2dce3984d12319718a.png', 'Клавишный инструмент 3', '1000', 'Балдёжный', 'РФ', 'T1000', 2023),
(13, '../Images/ca41b0a3824f7aa1d155a726162e9f5d.jpeg', 'Струнный инструмент 9', '10', 'Классная', 'РФ', 'T1000', 2023),
(14, '../Images/dcc2056b19c1c8cc30b0539235719a36.jpeg', 'Струнный инструмент 10', '1000', 'Классная', 'РФ', 'T1000', 2023),
(16, '../Images/e9a917c442e68e8721fb6dcece67ea7c.jpeg', 'Струнный инструмент 11', '1000', 'Классная', 'РФ', 'T1000', 2023),
(19, '../Images/2d5d0cc68ffe42f62dddcda05bf80304.jpeg', '1', '1', '1', 'РФ', 'T1000', 2023),
(20, '../Images/2d5d0cc68ffe42f62dddcda05bf80304.jpeg', '1', '1', '1', 'РФ', 'T1000', 2023),
(22, '../Images/9e1e3bf9c49924a6f73cf10b6f0d3a91.jpeg', '1', '1', '1', 'РФ', 'T1000', 2023),
(23, '../Images/2d5d0cc68ffe42f62dddcda05bf80304.jpeg', '1', '1', '1', 'РФ', 'T1000', 2023),
(24, '../Images/1.jpg', 'Чел с яблоком', '1', '1', '', '', 0),
(25, '../Images/2.jpg', 'Картина Ван Гога', '500 рублей', 'Круть', 'Нидерланды', 'Т1000', 1889),
(27, '../Images/2d5d0cc68ffe42f62dddcda05bf80304.jpeg', '1', '1', '1', '1', '1', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `Id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `patronymic` varchar(50) DEFAULT NULL,
  `login` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rpassword` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`Id`, `name`, `surname`, `patronymic`, `login`, `email`, `password`, `rpassword`, `role`) VALUES
(1, '1', '1', '1', 'admin', '1@1', 'admin22', 'admin22', 'admin'),
(2, '2', '2', '2', '2', '2@2', '2', '2', 'client');

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
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
