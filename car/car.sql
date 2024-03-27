-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Мар 27 2024 г., 20:12
-- Версия сервера: 10.4.32-MariaDB
-- Версия PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `car`
--

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `userid` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `saletype` varchar(255) NOT NULL,
  `seller` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `bodytype` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `engine` varchar(255) NOT NULL,
  `enginesize` varchar(255) NOT NULL,
  `gearbox` varchar(255) NOT NULL,
  `towtruck` varchar(255) NOT NULL,
  `run` int(11) NOT NULL,
  `runtype` varchar(255) NOT NULL,
  `condition` varchar(255) NOT NULL,
  `gasequipment` varchar(255) NOT NULL,
  `wheel` varchar(255) NOT NULL,
  `customclear` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `wheelsize` varchar(255) NOT NULL,
  `headlight` varchar(255) NOT NULL,
  `salonname` varchar(255) NOT NULL,
  `luke` varchar(255) NOT NULL,
  `value` int(11) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `airconditioner` tinyint(1) NOT NULL,
  `heatedseats` tinyint(1) NOT NULL,
  `heatedwheel` tinyint(1) NOT NULL,
  `ventilatedseats` tinyint(1) NOT NULL,
  `cruisecontrol` tinyint(1) NOT NULL,
  `tinted` tinyint(1) NOT NULL,
  `imgNames` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`userid`, `id`, `saletype`, `seller`, `region`, `brand`, `model`, `bodytype`, `year`, `engine`, `enginesize`, `gearbox`, `towtruck`, `run`, `runtype`, `condition`, `gasequipment`, `wheel`, `customclear`, `color`, `wheelsize`, `headlight`, `salonname`, `luke`, `value`, `currency`, `description`, `airconditioner`, `heatedseats`, `heatedwheel`, `ventilatedseats`, `cruisecontrol`, `tinted`, `imgNames`) VALUES
(3, 1, 'lookfor', 'diller', 'Աջափնյակ', 'Aito', 'A4', 'Հետչբեք', '2002', 'Հիբրիդ', '1.6 լ', 'Ավտոմատ', 'Ետևի', 214, 'մղոն', 'Վթարված', 'Չտեղադրված', 'Ձախ', 'Այո', 'Սև', 'R13', 'Хenon լուսարձակներ', 'Արծաթագույն', 'Սովորական լյուկ', 123, '$ (USD)', '                dssssssssssss                                       ', 1, 0, 0, 0, 0, 0, 'Stalker.jpg'),
(3, 2, 'lookfor', 'diller', 'Աջափնյակ', 'Aito', 'A4', 'Հետչբեք', '2002', 'Հիբրիդ', '1.6 լ', 'Ավտոմատ', 'Ետևի', 214, 'մղոն', 'Վթարված', 'Չտեղադրված', 'Ձախ', 'Այո', 'Սև', 'R13', 'Хenon լուսարձակներ', 'Արծաթագույն', 'Սովորական լյուկ', 123, '$ (USD)', '                                 dssssssssssss                                                                   ', 1, 0, 0, 0, 0, 0, 'Stalker_bc1.jpg'),
(1, 3, 'sale', 'owner', 'Աջափնյակ', 'Bugatti', 'A2', 'Հետչբեք', '2003', 'Դիզել', '1.5 լ', 'Մեխանիկական', 'Լիաքարշակ', 8686, 'կմ', 'Վթարված', 'Տեղադրված', 'Աջ', 'Ոչ', 'Մոխրագույն', 'R12', 'Хenon լուսարձակներ', 'Արծաթագույն', 'Սովորական լյուկ', 89, '$ (USD)', '                                                                                            jkkkkkkkkkkk                                                                    ', 1, 0, 1, 0, 0, 0, 'Stalker (2).jpg,Stalker.jpg,Stalker_bc1.jpg'),
(1, 4, 'lookfor', 'owner', 'Նալբանդյան', 'Bugatti', 'A4 Allroad', 'Սեդան', '2001', 'Բենզին', '1.8 լ', 'Մեխանիկական', 'Լիաքարշակ', 2147483647, 'կմ', 'Վթարված', 'Տեղադրված', 'Ձախ', 'Այո', 'Մոխրագույն', 'R13', 'Հալոգեն', 'Սպիտակ', 'Սովորական լյուկ', 1111111, '$ (USD)', '                              123333333333333                              ', 1, 1, 1, 1, 1, 1, 'Stalker_CallofPripyat.jpg,Stalker_ClearSky.jpg,Stalker_ShadowofChernobyl.jpg'),
(3, 5, 'sale', 'diller', 'Աջափնյակ', 'Buick', 'A3', 'Ունիվերսալ', '2003', 'Հիբրիդ', '1.6 լ', 'Ավտոմատ', 'Առջևի', 2134, 'կմ', 'Չվթարված', 'Տեղադրված', 'Աջ', 'Այո', 'Մոխրագույն', 'R13', 'LED լուսարձակներ', 'Մոխրագույն', 'Սովորական լյուկ', 2312, '֏ (AMD)', '                    werrrrrrrrrrrrrrrrrr                                        ', 1, 0, 0, 0, 0, 0, 'Stalker.jpg'),
(3, 6, 'sale', 'diller', 'Աջափնյակ', 'Buick', 'A3', 'Ունիվերսալ', '2003', 'Հիբրիդ', '1.6 լ', 'Ավտոմատ', 'Առջևի', 2134, 'կմ', 'Չվթարված', 'Տեղադրված', 'Աջ', 'Այո', 'Մոխրագույն', 'R13', 'LED լուսարձակներ', 'Մոխրագույն', 'Սովորական լյուկ', 2312, '֏ (AMD)', '                                                    werrrrrrrrrrrrrrrrrr                                                                    ', 1, 0, 0, 0, 0, 0, 'Stalker_bc1.jpg'),
(1, 7, 'lookfor', 'diller', 'Ավան', 'Aito', 'A4', 'Հետչբեք', '2002', 'Հիբրիդ', '1.6 լ', 'Ավտոմատ', 'Ետևի', 214, 'մղոն', 'Վթարված', 'Չտեղադրված', 'Ձախ', 'Այո', 'Սպիտակ', 'R13', 'LED լուսարձակներ', 'Արծաթագույն', 'Սովորական լյուկ', 123, '֏ (AMD)', '                                      sdddddddddddddddddddddd                                                                                  ', 1, 0, 0, 0, 0, 1, 'Stalker (2).jpg,Stalker.jpg,Stalker_bc1.jpg,Stalker_bc2.jpg,Stalker_bc3.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `date`) VALUES
(1, 'Mher Karoyan', 'karoyanmher521@gmail.com', 'W9Cu5.ZVDmcm9jQ', '06/02/2024'),
(3, 'Mher Karoyan', 'karoyanmh@mail.ru', '12345', '10/02/2024');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
