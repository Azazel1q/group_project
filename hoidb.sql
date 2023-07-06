-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3307
-- Время создания: Июн 15 2023 г., 08:33
-- Версия сервера: 8.0.24
-- Версия PHP: 8.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `hoidb`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id_categ` int NOT NULL,
  `name_categ` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id_categ`, `name_categ`) VALUES
(1, 'Блюда с рисом'),
(2, 'Блюда с лапшой'),
(3, 'Блюда с рыбой и мясом');

-- --------------------------------------------------------

--
-- Структура таблицы `clients`
--

CREATE TABLE `clients` (
  `id_client` int NOT NULL,
  `id_role` int NOT NULL,
  `phone` varchar(150) NOT NULL,
  `surname` varchar(150) NOT NULL,
  `name` varchar(150) NOT NULL,
  `patronymic` varchar(150) NOT NULL,
  `city` varchar(150) NOT NULL,
  `street` varchar(150) NOT NULL,
  `house` varchar(150) NOT NULL,
  `entrance` varchar(150) NOT NULL,
  `apartment` varchar(150) NOT NULL,
  `login` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `clients`
--

INSERT INTO `clients` (`id_client`, `id_role`, `phone`, `surname`, `name`, `patronymic`, `city`, `street`, `house`, `entrance`, `apartment`, `login`, `password`) VALUES
(1, 4, '89273647564', 'Иванов', 'Генадий', 'Петрович', 'Уфа', 'Комсомольская', '24', '2', '47', 'ivanov', '123'),
(2, 4, '89278374654', 'Иванов', 'Иван', 'Гуренин', 'Уфа', 'Аланта', '12', '2', '23', '123', '111');

-- --------------------------------------------------------

--
-- Структура таблицы `curt`
--

CREATE TABLE `curt` (
  `id_curt` int NOT NULL,
  `id_client` int NOT NULL,
  `id_dish` int NOT NULL,
  `count` int NOT NULL,
  `price` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `dishes`
--

CREATE TABLE `dishes` (
  `id_dish` int NOT NULL,
  `id_categ` int NOT NULL,
  `photo` varchar(150) NOT NULL,
  `name_dish` varchar(150) NOT NULL,
  `cost` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `dishes`
--

INSERT INTO `dishes` (`id_dish`, `id_categ`, `photo`, `name_dish`, `cost`) VALUES
(4, 1, 'gohan.jpg', 'Гохан', 15000),
(5, 2, 'ramen.jpg', 'Рамэн', 50),
(6, 3, 'nigiridsusi.jpg', 'Нигиридзуси', 20);

-- --------------------------------------------------------

--
-- Структура таблицы `employees`
--

CREATE TABLE `employees` (
  `id_employee` int NOT NULL,
  `id_role` int NOT NULL,
  `phone` varchar(150) NOT NULL,
  `surname` varchar(150) NOT NULL,
  `name` varchar(150) NOT NULL,
  `patronymic` varchar(150) NOT NULL,
  `login` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `status_empl` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `employees`
--

INSERT INTO `employees` (`id_employee`, `id_role`, `phone`, `surname`, `name`, `patronymic`, `login`, `password`, `status_empl`) VALUES
(1, 3, '89274857654', 'Лаврентьев', 'Иван', 'Петрович', 'lavra', '123', 2),
(2, 1, '89278746354', 'Анатольев', 'Петр', 'Петрович', 'log', '123', 1),
(3, 2, '', '', '', '', 'admin', 'admin', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id_order` int NOT NULL,
  `numb_order` int NOT NULL,
  `id_client` int NOT NULL,
  `name_dish` varchar(150) NOT NULL,
  `count` int NOT NULL,
  `price` int NOT NULL,
  `employee` int DEFAULT NULL,
  `comment` varchar(150) NOT NULL,
  `date` date NOT NULL,
  `status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id_order`, `numb_order`, `id_client`, `name_dish`, `count`, `price`, `employee`, `comment`, `date`, `status`) VALUES
(97, 1235, 1, 'Гохан', 12, 44, 1, '', '2023-06-21', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `order_info`
--

CREATE TABLE `order_info` (
  `id_order_info` int NOT NULL,
  `numb_order_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `role`
--

CREATE TABLE `role` (
  `id_role` int NOT NULL,
  `name_role` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `role`
--

INSERT INTO `role` (`id_role`, `name_role`) VALUES
(1, 'Логист'),
(2, 'Администратор'),
(3, 'Курьер'),
(4, 'Клиент');

-- --------------------------------------------------------

--
-- Структура таблицы `status`
--

CREATE TABLE `status` (
  `id_status` int NOT NULL,
  `title_status` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `status`
--

INSERT INTO `status` (`id_status`, `title_status`) VALUES
(1, 'В ожидании'),
(2, 'Подтвержден'),
(3, 'Отклонен'),
(4, 'Доставлен'),
(5, 'Доставляется');

-- --------------------------------------------------------

--
-- Структура таблицы `status_empl`
--

CREATE TABLE `status_empl` (
  `id_status_empl` int NOT NULL,
  `title_status_empl` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `status_empl`
--

INSERT INTO `status_empl` (`id_status_empl`, `title_status_empl`) VALUES
(1, 'Свободен'),
(2, 'Занят');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_categ`);

--
-- Индексы таблицы `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id_client`),
  ADD KEY `id_role` (`id_role`);

--
-- Индексы таблицы `curt`
--
ALTER TABLE `curt`
  ADD PRIMARY KEY (`id_curt`),
  ADD KEY `id_client` (`id_client`),
  ADD KEY `id_dish` (`id_dish`);

--
-- Индексы таблицы `dishes`
--
ALTER TABLE `dishes`
  ADD PRIMARY KEY (`id_dish`),
  ADD KEY `id_categ` (`id_categ`);

--
-- Индексы таблицы `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id_employee`),
  ADD KEY `id_role` (`id_role`),
  ADD KEY `status_empl` (`status_empl`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `employee` (`employee`),
  ADD KEY `status` (`status`),
  ADD KEY `id_client` (`id_client`);

--
-- Индексы таблицы `order_info`
--
ALTER TABLE `order_info`
  ADD PRIMARY KEY (`id_order_info`),
  ADD KEY `numb_order_id` (`numb_order_id`);

--
-- Индексы таблицы `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Индексы таблицы `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- Индексы таблицы `status_empl`
--
ALTER TABLE `status_empl`
  ADD PRIMARY KEY (`id_status_empl`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id_categ` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `clients`
--
ALTER TABLE `clients`
  MODIFY `id_client` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `curt`
--
ALTER TABLE `curt`
  MODIFY `id_curt` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT для таблицы `dishes`
--
ALTER TABLE `dishes`
  MODIFY `id_dish` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `employees`
--
ALTER TABLE `employees`
  MODIFY `id_employee` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT для таблицы `order_info`
--
ALTER TABLE `order_info`
  MODIFY `id_order_info` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `status`
--
ALTER TABLE `status`
  MODIFY `id_status` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `status_empl`
--
ALTER TABLE `status_empl`
  MODIFY `id_status_empl` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `clients_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `curt`
--
ALTER TABLE `curt`
  ADD CONSTRAINT `curt_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `clients` (`id_client`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `curt_ibfk_2` FOREIGN KEY (`id_dish`) REFERENCES `dishes` (`id_dish`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `dishes`
--
ALTER TABLE `dishes`
  ADD CONSTRAINT `dishes_ibfk_1` FOREIGN KEY (`id_categ`) REFERENCES `categories` (`id_categ`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `employees_ibfk_2` FOREIGN KEY (`status_empl`) REFERENCES `status_empl` (`id_status_empl`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`employee`) REFERENCES `employees` (`id_employee`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`status`) REFERENCES `status` (`id_status`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `orders_ibfk_4` FOREIGN KEY (`id_client`) REFERENCES `clients` (`id_client`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
