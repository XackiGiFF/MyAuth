SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `app_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `additional_services`
--

CREATE TABLE `additional_services` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `cost` int NOT NULL
);

--
-- Дамп данных таблицы `additional_services`
--

INSERT INTO `additional_services` (`id`, `name`, `cost`) VALUES
(1, 'автомобильная стоянки', 3500),
(2, 'экскурсия в горы', 2500),
(3, 'экскурсия в город', 1800),
(4, 'бассейн', 500),
(5, 'Аренда велосипеда', 700);

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL
);

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Эконом'),
(2, 'Комфорт'),
(3, 'Люкс');

-- --------------------------------------------------------

--
-- Структура таблицы `reservation`
--

CREATE TABLE `reservation` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `room_id` int NOT NULL,
  `check_in_date` date NOT NULL,
  `eviction_date` date NOT NULL,
  `prepayment` int NOT NULL
);

--
-- Дамп данных таблицы `reservation`
--

INSERT INTO `reservation` (`id`, `user_id`, `room_id`, `check_in_date`, `eviction_date`, `prepayment`) VALUES
(1, 2, 3, '2022-09-01', '2022-09-10', 900),
(2, 2, 5, '2022-08-01', '2022-08-26', 3200),
(3, 3, 6, '2022-09-02', '2022-09-06', 1900),
(4, 3, 1, '2022-09-14', '2022-09-22', 5000),
(5, 1, 3, '2022-09-06', '2022-09-14', 700);

-- --------------------------------------------------------

--
-- Структура таблицы `reservation_services`
--

CREATE TABLE `reservation_services` (
  `id` int NOT NULL,
  `reservation_id` int NOT NULL,
  `service_id` int NOT NULL,
  `date_rendering` date DEFAULT NULL
);

--
-- Дамп данных таблицы `reservation_services`
--

INSERT INTO `reservation_services` (`id`, `reservation_id`, `service_id`, `date_rendering`) VALUES
(1, 2, 2, '2022-09-04'),
(2, 1, 4, '2022-09-21'),
(3, 3, 2, '2022-09-18'),
(4, 4, 3, '2022-09-10'),
(5, 2, 4, '2022-09-02'),
(6, 2, 3, '2022-09-12'),
(7, 3, 2, '2022-09-15');

-- --------------------------------------------------------

--
-- Структура таблицы `rooms`
--

CREATE TABLE `rooms` (
  `id` int NOT NULL,
  `number` int NOT NULL,
  `category_id` int NOT NULL,
  `cost_per_day` int NOT NULL
);

--
-- Дамп данных таблицы `rooms`
--

INSERT INTO `rooms` (`id`, `number`, `category_id`, `cost_per_day`) VALUES
(1, 1, 1, 500),
(2, 4, 1, 510),
(3, 12, 2, 800),
(4, 15, 2, 850),
(5, 20, 3, 1500),
(6, 26, 3, 1600);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `fio` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `img_src` varchar(255) NOT NULL,
  `gender` tinyint NOT NULL
);

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `fio`, `login`, `password`, `birthday`, `img_src`, `gender`) VALUES
(1, 'Алексе Алексеевич', 'alex', 'alex', '2003-02-01', 'imgs/1662816684.jpg', 1),
(2, 'Неизвестная личность', 'anon', 'anon', '2002-01-15', 'f.jpg', 0),
(3, 'Иванов Иван Иванович', 'ivan', 'ivan', '2001-05-12', 'gdf.jpg', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `additional_services`
--
ALTER TABLE `additional_services`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_id` (`room_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `reservation_services`
--
ALTER TABLE `reservation_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reservation_id` (`reservation_id`),
  ADD KEY `service_id` (`service_id`);

--
-- Индексы таблицы `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `additional_services`
--
ALTER TABLE `additional_services`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `reservation_services`
--
ALTER TABLE `reservation_services`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `reservation_services`
--
ALTER TABLE `reservation_services`
  ADD CONSTRAINT `reservation_services_ibfk_1` FOREIGN KEY (`reservation_id`) REFERENCES `reservation` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `reservation_services_ibfk_2` FOREIGN KEY (`service_id`) REFERENCES `additional_services` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
