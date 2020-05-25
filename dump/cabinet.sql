-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Окт 15 2019 г., 15:47
-- Версия сервера: 10.1.19-MariaDB
-- Версия PHP: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `cabinet`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `patronymic` varchar(255) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `phone`, `name`, `surname`, `patronymic`, `birthday`, `email`, `password`, `created_at`) VALUES
(2, '2147483647', 'Ð’Ð°Ð´Ð¸Ð¼', 'Ð¡Ð°Ð¼Ð¾Ð¹Ð»ÐµÐ½ÐºÐ¾', 'ÐÐ»ÐµÐºÑÐ°Ð½Ð´Ñ€Ð¾Ð²Ð¸Ñ‡', '0000-00-00', 'vadim123544@gmail.com', '$2y$10$ZbtN74kL2WaJoyUcc0cNhOZH5Cv3OBLZoIJyYoZdi/Xk7mg91k56C', '2019-10-15 16:00:57'),
(3, '2147483647', 'Вадим', 'Самойленко', 'Александрович', '0000-00-00', 'vadin123@i.ua', '$2y$10$u9uw.rcedjUIpHa5ECdkveeywR3mAUPKst3XD4A0l1oZmRriZt5xm', '2019-10-15 16:04:07'),
(4, '+38(067) 179-1678', 'Вадим', 'Самойленко', 'Александрович', '1988-09-14', 'vadim@i.oa', '$2y$10$656wocvsyXXG0f1j4ZpGueClEFQCGbs3Ouv4h7aisHZVqIN/6TZ8u', '2019-10-15 16:25:14'),
(5, '+38(067) 179-1679', 'Вадим', 'Самойленко', 'Александрович', '1988-09-14', 'vadim@i.ua', '$2y$10$VvY//OX82Vdd0M6qnOvjAOXy9QZ.921A.PzBEQG.w6mw4e4alj2Fa', '2019-10-15 16:29:22');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
