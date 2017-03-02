-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Мар 02 2017 г., 15:16
-- Версия сервера: 5.5.54-0ubuntu0.14.04.1
-- Версия PHP: 5.5.9-1ubuntu4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `admin_oncore`
--

-- --------------------------------------------------------

--
-- Структура таблицы `guest_book`
--

CREATE TABLE IF NOT EXISTS `guest_book` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `img` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=42 ;

--
-- Дамп данных таблицы `guest_book`
--

INSERT INTO `guest_book` (`id`, `name`, `email`, `message`, `img`) VALUES
(25, 'Витовт Григорович', 'IP-94@mail.ru', 'tEST', NULL),
(26, 'Витовт Григорович', 'IP-94@mail.ru', 'DFGJJ', NULL),
(27, 'Витовт Григорович', 'IP-94@mail.ru', 'Привет', 'tainstvennye-gory1488464078.jpg'),
(28, 'Витовт Григорович', 'IP-94@mail.ru', 'Привет', 'tainstvennye-gory1488464128.jpg'),
(29, 'Витовт Григорович', 'IP-94@mail.ru', 'Привет', NULL),
(30, 'Витовт Григорович', 'IP-94@mail.ru', 'ваыв', NULL),
(31, 'Витовт Григорович', 'IP-94@mail.ru', 'Привет', NULL),
(32, 'Витовт Григорович', 'IP-94@mail.ru', 'ывапр', NULL),
(33, 'Витовт Григорович', 'IP-94@mail.ru', 'ывапро', NULL),
(34, 'Витовт Григорович', 'IP-94@mail.ru', 'ывапро', NULL),
(35, 'Витовт Григорович', 'IP-94@mail.ru', 'ывапро', NULL),
(36, 'Витовт Григорович', 'IP-94@mail.ru', 'ывапро', NULL),
(37, 'Витовт Григорович', 'IP-94@mail.ru', 'ывапро', NULL),
(38, 'Витовт Григорович', 'IP-94@mail.ru', 'ывапро', NULL),
(39, 'Витовт Григорович', 'IP-94@mail.ru', 'ывапро', NULL),
(40, 'Витовт Григорович', 'IP-94@mail.ru', 'ывапро', NULL),
(41, 'Витовт Григорович', 'IP-94@mail.ru', 'ывапро', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
