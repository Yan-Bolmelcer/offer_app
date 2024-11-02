-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 02 2024 г., 17:47
-- Версия сервера: 8.0.30
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `offer_crm`
--

-- --------------------------------------------------------

--
-- Структура таблицы `offers`
--

CREATE TABLE `offers` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `offers`
--

INSERT INTO `offers` (`id`, `name`, `email`, `phone`, `created_at`) VALUES
(62, 'Offer 1', 'rep1@example.com', '1234567890', '2024-11-02 14:00:07'),
(63, 'Offer 2', 'rep2@example.com', '2345678901', '2024-11-02 14:00:07'),
(64, 'Offer 3', 'rep3@example.com', '3456789012', '2024-11-02 14:00:07'),
(65, 'Offer 4', 'rep4@example.com', '4567890123', '2024-11-02 14:00:07'),
(66, 'Offer 5', 'rep5@example.com', '5678901234', '2024-11-02 14:00:07'),
(67, 'Offer 6', 'rep6@example.com', '6789012345', '2024-11-02 14:00:07'),
(68, 'Offer 7', 'rep7@example.com', '7890123456', '2024-11-02 14:00:07'),
(69, 'Offer 8', 'rep8@example.com', '8901234567', '2024-11-02 14:00:07'),
(70, 'Offer 9', 'rep9@example.com', '9012345678', '2024-11-02 14:00:07'),
(71, 'Offer 10', 'rep10@example.com', '0123456789', '2024-11-02 14:00:07'),
(73, 'Offer 12', 'rep12@example.com', '2223456781', '2024-11-02 14:00:07'),
(74, 'Offer 13', 'rep13@example.com', '3334567892', '2024-11-02 14:00:07'),
(75, 'Offer 14', 'rep14@example.com', '4445678903', '2024-11-02 14:00:07'),
(76, 'Offer 15', 'rep15@example.com', '5556789014', '2024-11-02 14:00:07');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
