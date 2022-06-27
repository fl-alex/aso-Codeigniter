-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 27 2022 г., 23:39
-- Версия сервера: 5.7.33
-- Версия PHP: 8.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `aso`
--

-- --------------------------------------------------------

--
-- Структура таблицы `doc_type`
--

CREATE TABLE `doc_type` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `doc_type`
--

INSERT INTO `doc_type` (`id`, `name`) VALUES
(1, 'Паспорт'),
(2, 'Керівництво з експлуатації (інструкція)'),
(3, 'Гарантійний талон'),
(4, 'Акт здавання-приймання в експлуатацію'),
(6, 'Фото об\'єкта'),
(7, 'Акт дефектації'),
(8, 'Інші документи'),
(9, 'Загальне фото'),
(10, 'Схема'),
(11, 'Акт прийому-здачі виконаних робіт');

-- --------------------------------------------------------

--
-- Структура таблицы `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `group_name` char(255) NOT NULL,
  `permission` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `groups`
--

INSERT INTO `groups` (`id`, `group_name`, `permission`) VALUES
(0, 'newgroup', 'a:4:{i:0;s:10:\"createUser\";i:1;s:10:\"updateUser\";i:2;s:8:\"viewUser\";i:3;s:10:\"deleteUser\";}'),
(1, 'Administrator', 'a:36:{i:0;s:10:\"createUser\";i:1;s:10:\"updateUser\";i:2;s:8:\"viewUser\";i:3;s:10:\"deleteUser\";i:4;s:11:\"createGroup\";i:5;s:11:\"updateGroup\";i:6;s:9:\"viewGroup\";i:7;s:11:\"deleteGroup\";i:8;s:11:\"createBrand\";i:9;s:11:\"updateBrand\";i:10;s:9:\"viewBrand\";i:11;s:11:\"deleteBrand\";i:12;s:14:\"createCategory\";i:13;s:14:\"updateCategory\";i:14;s:12:\"viewCategory\";i:15;s:14:\"deleteCategory\";i:16;s:11:\"createStore\";i:17;s:11:\"updateStore\";i:18;s:9:\"viewStore\";i:19;s:11:\"deleteStore\";i:20;s:15:\"createAttribute\";i:21;s:15:\"updateAttribute\";i:22;s:13:\"viewAttribute\";i:23;s:15:\"deleteAttribute\";i:24;s:13:\"createProduct\";i:25;s:13:\"updateProduct\";i:26;s:11:\"viewProduct\";i:27;s:13:\"deleteProduct\";i:28;s:11:\"createOrder\";i:29;s:11:\"updateOrder\";i:30;s:9:\"viewOrder\";i:31;s:11:\"deleteOrder\";i:32;s:11:\"viewReports\";i:33;s:13:\"updateCompany\";i:34;s:11:\"viewProfile\";i:35;s:13:\"updateSetting\";}'),
(5, 'Testing', 'a:24:{i:0;s:10:\"updateUser\";i:1;s:8:\"viewUser\";i:2;s:11:\"createGroup\";i:3;s:11:\"updateGroup\";i:4;s:9:\"viewGroup\";i:5;s:11:\"createBrand\";i:6;s:11:\"updateBrand\";i:7;s:9:\"viewBrand\";i:8;s:14:\"createCategory\";i:9;s:14:\"updateCategory\";i:10;s:12:\"viewCategory\";i:11;s:11:\"createStore\";i:12;s:11:\"updateStore\";i:13;s:9:\"viewStore\";i:14;s:15:\"createAttribute\";i:15;s:15:\"updateAttribute\";i:16;s:13:\"viewAttribute\";i:17;s:13:\"createProduct\";i:18;s:13:\"updateProduct\";i:19;s:11:\"viewProduct\";i:20;s:11:\"createOrder\";i:21;s:11:\"updateOrder\";i:22;s:9:\"viewOrder\";i:23;s:13:\"updateCompany\";}'),
(7, 'full_admin', 'a:41:{i:0;s:10:\"createUser\";i:1;s:10:\"updateUser\";i:2;s:8:\"viewUser\";i:3;s:10:\"deleteUser\";i:4;s:11:\"createGroup\";i:5;s:11:\"updateGroup\";i:6;s:9:\"viewGroup\";i:7;s:11:\"deleteGroup\";i:8;s:11:\"createBrand\";i:9;s:11:\"updateBrand\";i:10;s:9:\"viewBrand\";i:11;s:11:\"deleteBrand\";i:12;s:14:\"createCategory\";i:13;s:14:\"updateCategory\";i:14;s:12:\"viewCategory\";i:15;s:14:\"deleteCategory\";i:16;s:11:\"createStore\";i:17;s:11:\"updateStore\";i:18;s:9:\"viewStore\";i:19;s:11:\"deleteStore\";i:20;s:15:\"createAttribute\";i:21;s:15:\"updateAttribute\";i:22;s:13:\"viewAttribute\";i:23;s:15:\"deleteAttribute\";i:24;s:13:\"createProduct\";i:25;s:13:\"updateProduct\";i:26;s:11:\"viewProduct\";i:27;s:13:\"deleteProduct\";i:28;s:13:\"createProduct\";i:29;s:13:\"updateProduct\";i:30;s:11:\"viewProduct\";i:31;s:13:\"deleteProduct\";i:32;s:11:\"createOrder\";i:33;s:11:\"updateOrder\";i:34;s:9:\"viewOrder\";i:35;s:11:\"deleteOrder\";i:36;s:13:\"updateCompany\";i:37;s:9:\"createSpr\";i:38;s:9:\"updateSpr\";i:39;s:7:\"viewSpr\";i:40;s:9:\"deleteSpr\";}');

-- --------------------------------------------------------

--
-- Структура таблицы `object_docs`
--

CREATE TABLE `object_docs` (
  `id` int(11) NOT NULL,
  `id_object` int(3) NOT NULL,
  `id_doc_type` int(3) NOT NULL,
  `doc_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `object_docs`
--

INSERT INTO `object_docs` (`id`, `id_object`, `id_doc_type`, `doc_link`) VALUES
(11, 6, 1, 'img/Pasport_Konveyer_MCHR-KPK-050518.pdf'),
(12, 7, 1, 'img/Pasport_OVEN_PVT100.pdf'),
(13, 7, 2, 'img/Instrukciya_OVEN_PVT100.pdf'),
(15, 10, 1, 'img/Pasport_Skorostnye_rulonnye_vorota_SACIL_HLB.pdf'),
(16, 10, 4, 'img/Akt_o_priemke-pasport_SACIL_HLB-2.pdf'),
(17, 10, 2, 'img/Instrukciya_Skorostnye_vorota_SACIL_HLB.pdf'),
(52, 7, 9, 'img/Foto_OVEN_PVT100.jpg'),
(53, 19, 9, 'img/IMG_20210603_105126_6.jpg'),
(54, 10, 9, 'img/IMG_20210603_105231_4.jpg'),
(55, 23, 9, 'img/IMG_20210603_105242_0.jpg'),
(56, 23, 1, 'img/Pasport_Sekcionnye_vorota(1).pdf'),
(57, 5, 2, 'img/Instrukciya.-Stellazhi-CTB.-170.pdf'),
(58, 5, 1, 'img/Pasport.-Stellazhi-CTB.-170.pdf'),
(59, 5, 8, 'img/Dodatok-do-dogovoru.-Stellazhi-CTB.-170.pdf'),
(61, 25, 8, 'img/Lampa_trubchataya_F20T8-BL368.bmp'),
(62, 26, 9, 'img/IMG_20210604_093128_5.jpg'),
(63, 28, 9, 'img/IMG_20210604_093303_2.jpg'),
(65, 29, 9, 'img/IMG_20210604_093312_2(1).jpg'),
(66, 30, 9, 'img/T08994AE_DSC04266.JPG'),
(67, 30, 6, 'img/T08994AE_DSC04264.JPG'),
(68, 30, 6, 'img/T08994AE_DSC04265.JPG'),
(69, 30, 6, 'img/T08994AE_DSC04267.JPG'),
(70, 30, 6, 'img/T08994AE_DSC04274.JPG'),
(71, 30, 10, 'img/AE-006944-Linde-E40H-01-600-T08994AE.pdf'),
(72, 31, 9, 'img/T08995AE_DSC04247.JPG'),
(73, 31, 6, 'img/T08995AE_DSC04245.JPG'),
(74, 31, 6, 'img/T08995AE_DSC04246.JPG'),
(75, 31, 6, 'img/T08995AE_DSC04248.JPG'),
(76, 31, 6, 'img/T08995AE_DSC04251.JPG'),
(77, 31, 10, 'img/AE-006945-Linde-E40H-01-600-T08995AE.pdf'),
(78, 32, 9, 'img/T08996AE_DSC04271.JPG'),
(79, 32, 6, 'img/T08996AE_DSC04268.JPG'),
(80, 32, 6, 'img/T08996AE_DSC04269.JPG'),
(81, 32, 6, 'img/T08996AE_DSC04270.JPG'),
(82, 32, 6, 'img/T08996AE_DSC04273.JPG'),
(83, 6, 9, 'img/IMG_20210604_093619_4.jpg'),
(84, 33, 9, 'img/T09003AE_DSC04276.JPG'),
(85, 33, 6, 'img/T09003AE_DSC04277.JPG'),
(86, 33, 6, 'img/T09003AE_DSC04278.JPG'),
(87, 33, 6, 'img/T09003AE_DSC04279.JPG'),
(88, 33, 6, 'img/T09003AE_DSC04280.JPG'),
(89, 33, 10, 'img/AE-006953-Linde-H40T-02-T09003AE.pdf'),
(90, 32, 10, 'img/AE-006946-Linde-E16C-02-T08996AE.pdf'),
(91, 9, 9, 'img/IMG_20210603_102116_1.jpg'),
(92, 34, 9, 'img/DSC04254.JPG'),
(93, 34, 6, 'img/DSC04252.JPG'),
(94, 34, 6, 'img/DSC04253.JPG'),
(95, 34, 6, 'img/DSC04255.JPG'),
(96, 34, 6, 'img/DSC04256.JPG'),
(97, 34, 10, 'img/AE-006947-Linde-E16C-02-T08997AE.pdf'),
(98, 35, 9, 'img/DSC04260.JPG'),
(99, 35, 6, 'img/DSC04258.JPG'),
(100, 35, 6, 'img/DSC04259.JPG'),
(101, 35, 6, 'img/DSC04261.JPG'),
(102, 35, 6, 'img/DSC04263.JPG'),
(103, 35, 10, 'img/AE-006948-Linde-E16C-02-T08998AE.pdf'),
(104, 36, 9, 'img/DSC04235.JPG'),
(113, 19, 6, 'img/Schetki-na-Kerher-4.jpg'),
(114, 19, 6, 'img/Schetki-na-Kerher-3.jpg'),
(115, 19, 6, 'img/Schetki-na-Kerher-2.jpg'),
(116, 19, 6, 'img/Schetki-na-Kerher.jpg'),
(118, 25, 1, 'img/Znischuvach_komah_GC1-60(2).jpg'),
(119, 37, 1, 'img/IMG_20210607_103914_2.jpg'),
(120, 37, 9, 'img/IMG_20210607_103942_9.jpg'),
(121, 37, 6, 'img/IMG_20210607_104020_3.jpg'),
(122, 37, 6, 'img/IMG_20210607_104430_5.jpg'),
(123, 37, 6, 'img/IMG_20210607_104325_1.jpg'),
(124, 37, 6, 'img/IMG_20210607_104038_0.jpg'),
(126, 46, 9, 'img/SATO_CL4NX.jpg'),
(127, 45, 9, 'img/SATO_CL4NX(1).jpg'),
(128, 44, 9, 'img/SATO_CL4NX(2).jpg'),
(129, 42, 9, 'img/SATO_CL4NX(3).jpg'),
(130, 41, 9, 'img/SATO_CL4NX(4).jpg'),
(131, 43, 9, 'img/SATO_CL4NX(5).jpg'),
(138, 56, 9, 'img/P1840223.JPG'),
(139, 56, 6, 'img/P1840215.JPG'),
(140, 56, 6, 'img/P1840216.JPG'),
(141, 56, 6, 'img/P1840217.JPG'),
(142, 56, 6, 'img/P1840218.JPG'),
(143, 56, 6, 'img/P1840219.JPG'),
(144, 56, 6, 'img/P1840220.JPG'),
(145, 56, 6, 'img/P1840221.JPG'),
(146, 56, 6, 'img/P1840222.JPG'),
(167, 66, 10, 'img/IMG_20210625_132854_2.jpg'),
(170, 66, 6, 'img/IMG_20210625_124946_0.jpg'),
(171, 19, 6, 'img/IMG_20210702_162840_0.jpg'),
(172, 19, 6, 'img/IMG_20210702_093403_5.jpg'),
(173, 19, 6, 'img/Derzhatel-vsasyvayuschey-balki-2.jpg'),
(174, 19, 6, 'img/Derzhatel-vsasyvayuschey-balki.jpg'),
(176, 6, 6, 'img/Opticheskiy-datchik.jpg'),
(177, 68, 9, 'img/IMG_20210708_134347_5.jpg'),
(180, 70, 9, 'img/IMG_20210708_134905_4.jpg'),
(181, 70, 6, 'img/IMG_20210708_134913_6.jpg'),
(182, 70, 6, 'img/IMG_20210708_134926_9.jpg'),
(183, 68, 6, 'img/IMG_20210708_134508_7.jpg'),
(184, 72, 11, 'img/Akt-priema-vypolnennyh-rabot-2021.07.13-Logistik-Grupp.pdf'),
(185, 19, 6, 'img/IMG_20210716_150318_8.jpg'),
(186, 19, 3, 'img/KerherV150_garantiynyy_talon-1.jpg'),
(187, 19, 3, 'img/KerherV150-_garantiynyy_talon-2.jpg'),
(188, 46, 0, 'img/download-(1).jfif');

-- --------------------------------------------------------

--
-- Структура таблицы `object_location`
--

CREATE TABLE `object_location` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Места размещения объектов';

--
-- Дамп данных таблицы `object_location`
--

INSERT INTO `object_location` (`id`, `name`) VALUES
(1, 'Склад. 1 поверх'),
(2, 'Склад. 2 поверх'),
(3, 'АБК 1 поверх'),
(4, 'Серверна'),
(5, 'АБК 2 поверх'),
(6, 'Крохмальний цех (старий)'),
(7, 'Крохмальний цех (новий ЦМК)'),
(8, 'Паточний цех'),
(9, 'Кормовий цех'),
(10, 'АБК бойлерна');

-- --------------------------------------------------------

--
-- Структура таблицы `object_parameters`
--

CREATE TABLE `object_parameters` (
  `id` int(11) NOT NULL,
  `id_object` int(3) NOT NULL,
  `id_ob_par` int(3) NOT NULL,
  `par_value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `object_register`
--

CREATE TABLE `object_register` (
  `id` int(11) NOT NULL,
  `id_ob_location` int(11) DEFAULT NULL,
  `id_ob_type` int(11) NOT NULL,
  `id_ob_parent` int(11) DEFAULT NULL,
  `name` varchar(70) NOT NULL,
  `object_descr` varchar(255) NOT NULL,
  `object_count` varchar(255) NOT NULL,
  `object_history` varchar(255) NOT NULL,
  `id_service_company` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Объекты обслуживания';

--
-- Дамп данных таблицы `object_register`
--

INSERT INTO `object_register` (`id`, `id_ob_location`, `id_ob_type`, `id_ob_parent`, `name`, `object_descr`, `object_count`, `object_history`, `id_service_company`) VALUES
(5, 1, 6, 0, 'Стелажі CTB. 170', '(6 поверхів * 3 ячейки * 21 колон * 9 рядів) + 6*3*18*1 = 3402+324=3726', '10', '', NULL),
(6, 1, 3, 13, 'Конвейер_MCHR-KPK-050518', '', '', 'Березень 2021 - заміна датчиків каретки, перекомутація та посилення фіксуючих елементів оптичних датчиків', NULL),
(7, 1, 9, 5, 'ОВЕН ПВТ100', 'Преобразователь влажности и температуры', '', '', NULL),
(8, 1, 4, 0, 'Система ОВиК', 'Система опалення, вентиляції та кондиціювання', '1', '', NULL),
(9, 4, 8, 8, 'Щит системи моніторінгу ОВиК', 'Сервер з веб-інтерфейсом та засобами отримання сигналу від перетворювачів ОВЕН ПВТ100', '1', '', NULL),
(10, 1, 7, 13, 'Ворота скоростные рулонные', 'Ворота рулонні, встановлені на 1 і 2 поверсі', '5', '', 1),
(19, 1, 11, 0, 'Керхер B150R', '', '1', '', NULL),
(23, 1, 7, 0, 'Ворота секционные', 'Ворота секционные, установлены на 1 и 2 этаже', '', '', NULL),
(25, 1, 5, 0, 'Знищувач комах GC1-60', '', '5', 'Електриками комбінату виконана заміна ламп та стартерів в травні 2021р.', NULL),
(26, 1, 2, 0, 'Зарядний пристрій для 4т. навантажувача', '', '2', '', NULL),
(28, 1, 2, 0, 'Зарядний пристрій для 1,6т навантажувача', '', '5', '', NULL),
(29, 1, 2, 0, 'Зарядний пристрій для електричного візка', '', '2', '', NULL),
(30, 1, 1, 0, 'Навантажувач електричний Linde E40H-01-600 T08994A', '', '1', 'Свідоцтво AE 006944', NULL),
(31, 1, 1, 0, 'Навантажувач електричний Linde E40H-01-600 T08995A', '', '1', '', NULL),
(32, 1, 1, 0, 'Навантажувач електричний Linde E16C-02 T08996AE', '', '1', '', NULL),
(33, 1, 1, 0, 'Навантажувач газовий Linde H40T-02 T09003AE', '', '1', '', NULL),
(34, 1, 1, 0, 'Навантажувач електричний Linde E16C-02 T08997AE', '', '1', 'Свідоцтво AE 006947', NULL),
(35, 1, 1, 0, 'Навантажувач електричний Linde E16C-02 T08998AE', '', '1', 'Свідоцтво AE 006948', NULL),
(36, 1, 1, 0, 'Навантажувач електричний Linde E16C-02 T08999AE', '', '1', 'Свідоцтво AE 006949', NULL),
(37, 5, 13, 0, 'Кулер для води YRL1.0-5(BD82-2)', '500W/65W', '1', '', NULL),
(38, 3, 13, 0, 'Кулер для води YRL1.0-5(BD82-2)', '500W/65W', '1', '', NULL),
(39, 3, 13, 0, 'Принтер Xerox B215', '', '1', '', NULL),
(40, 4, 13, 0, 'Принтер OKI C332 лазерний кольоровий', '', '', '', NULL),
(41, 6, 13, 0, 'Принтер SATO CL4NX (169.254.233.24)', '', '1', '', NULL),
(42, 7, 13, 0, 'Принтер SATO CL4NX (169.254.233.23)', '', '1', 'ip-169.254.233.23', NULL),
(43, 8, 13, 0, 'Принтер SATO CL4NX (169.254.233.25)', '', '1', 's/n-BG101194, ip-169.254.233.25, mac-00:19:98:15:76:30', NULL),
(44, 9, 13, 0, 'Принтер SATO CL4NX (169.254.233.22)', '', '1', 's/n BG103337, ip-169.254.233.22, mac-00:19:98:15:77:C5', NULL),
(45, 4, 13, 0, 'Принтер SATO CL4NX (169.254.233.27)', '', '1', '', NULL),
(46, 4, 13, 0, 'Принтер SATO CL4NX (192.168.11...)', '', '1', '', NULL),
(47, 2, 2, 0, 'Зарядний пристрій HAWKER (1) для електричного візка', '', '1', '', NULL),
(48, 2, 2, 0, 'Зарядний пристрій HAWKER (2) для електричного візка', '', '1', '', NULL),
(49, 1, 14, 0, 'Шкаф комутаційний №1 для wi-fi обладнання', '', '1', '', NULL),
(50, 1, 14, 0, 'Шкаф комутаційний №2 для wi-fi обладнання', '', '1', '', NULL),
(51, 1, 14, 0, 'Шкаф комутаційний №3 для wi-fi обладнання', '', '1', '', NULL),
(52, 1, 14, 0, 'Шкаф комутаційний №4 для wi-fi обладнання', '', '1', '', NULL),
(53, 2, 14, 0, 'Шкаф комутаційний №5 для wi-fi обладнання', '', '1', '', NULL),
(54, 99999, 15, 0, '94542214', '', '1', '', NULL),
(56, 2, 15, 0, 'Платформа 94542370', '', '1', '', NULL),
(60, 4, 16, 0, 'WMS', '', '1', '', NULL),
(62, 1, 13, 0, 'Доки', 'Доки 1 поверху (без воріт)', '11', '', NULL),
(63, 1, 17, 0, 'Кондиціонер', 'в кабінеті у Блохи', '1', '', NULL),
(64, 1, 18, 0, 'СКЛАД', '', '1', '', NULL),
(65, 1, 19, 0, 'Док №11', '', '1', '', NULL),
(66, 1, 8, 0, 'Щит ЩР-5', 'В приміщенні &quot;для ремонту техніки&quot;', '1', '', NULL),
(67, 1, 19, 0, 'Док №10', '', '1', '', NULL),
(68, 10, 20, 0, 'Котел опалювальний №2', '', '', '', NULL),
(69, 10, 20, 0, 'Бойлер №1', '', '', '', NULL),
(70, 10, 20, 0, 'Бойлер №2', '', '', '', NULL),
(71, 1, 19, 0, 'Док №9', '', '1', '', NULL),
(72, 1, 19, 0, 'Док №3', '', '1', '', NULL),
(73, 1, 7, 0, 'Ворота секционные №2', '', '1', '', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `object_service`
--

CREATE TABLE `object_service` (
  `id` int(11) NOT NULL,
  `id_object` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_plan` date DEFAULT NULL,
  `date_fact` date DEFAULT NULL,
  `type_service` int(3) NOT NULL,
  `state_id` int(3) NOT NULL,
  `descript` varchar(500) DEFAULT NULL,
  `id_service_parts` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `object_service`
--

INSERT INTO `object_service` (`id`, `id_object`, `date`, `date_plan`, `date_fact`, `type_service`, `state_id`, `descript`, `id_service_parts`) VALUES
(7, 19, '2021-06-11 13:24:15', '2021-06-11', '2021-06-11', 3, 3, 'Заміна мийних щіток. Щітки замовлені. Проблеми з проплатою. Керівництво в курсі.\r\n11.06.2021 - отримали щітки на склад. Встановлені. Працює.', 0),
(13, 10, '2021-06-11 13:24:15', '0000-00-00', '0000-00-00', 3, 1, 'Зроблений Акт дефектації. Далі фірма працює з техвіддвлом.', 0),
(14, 25, '2021-06-11 13:24:15', '0000-00-00', '2021-05-25', 3, 3, 'Заміна ламп і стартерів на приладах 1 і 2 поверху', 0),
(15, 6, '2021-06-11 13:24:15', '0000-00-00', '2021-03-18', 3, 3, 'Заміна датчиків зупинки каретки, перекомутація оптичних датчиків на 1 і 2 поверсі.', 0),
(16, 8, '2021-06-11 13:24:15', '2021-06-04', '2021-06-10', 3, 3, 'Поставити датчики на тепловий модуль.\r\nВтсановлено. Фото скинуто Віктору Хладотехніка. Їх програміст зайде на щит зробить налагодження, якщо потрібно.', 0),
(25, 23, '2021-06-11 13:24:15', '2021-06-01', '0000-00-00', 3, 1, 'Зроблений Акт дефектації. \r\nДалі фірма працює з техвідділом.', 0),
(27, 32, '2021-06-11 13:24:15', '0000-00-00', '2021-05-27', 2, 3, 'Не запускається FDCAM №357396.\r\nПерепрошивка з різними чіпами не допомогла.\r\nВстановлений блок FDCAM №358427 з маленького газового навантажувача, якмй зараз в ремонті.', 0),
(28, 32, '2021-06-11 13:24:15', '0000-00-00', '2021-05-31', 2, 3, 'Приїзд представника Лінде.\r\nПеревірив блок №357396. Він дійсно непридатний. Дасть заявку по блокам на Климовського.\r\nЯрослав поставив собі в план встановлення датчика на новий навантажувач. Посуховський дав добро.', 0),
(29, 37, '2021-06-11 13:24:15', '0000-00-00', '2021-06-07', 3, 3, 'Обслуживание кранов. Текут оба. На на силиконовом запорном элементе выработка. Чистка особо не помогла. Смазан охлаждающий вентилятор. Нужна закупка кранов. Заявка на краны (4 шт.) отправлена руководству.', 0),
(30, 39, '2021-06-11 13:24:15', '0000-00-00', '2021-06-07', 5, 3, 'Замена картриджа (2-й раз).', 0),
(31, 38, '2021-06-11 13:24:15', '0000-00-00', '2021-05-27', 3, 3, 'Не работало охлаждение. Біла проблема с контактами. Обслужили охлаждающий вентиилятор.', 0),
(32, 41, '2021-06-11 13:24:15', '0000-00-00', '2021-05-10', 3, 3, 'Пропала сеть. Линк звонится. Проблема с сетевым интерфейсом. Перевели на USB. Свич не забирали.', 0),
(33, 47, '2021-06-11 13:24:15', '0000-00-00', '2020-11-26', 3, 3, 'Згорів варістор. Пристрій розібрали, впаяли аналогічний варістор зі старої плати з UPS', 0),
(35, 49, '2021-06-11 13:24:15', '0000-00-00', '0000-00-00', 1, 1, 'Чистка шкафа. Нужен пылесос. Заявка отправлена 10.06.2021', 0),
(36, 30, '2021-06-11 13:24:15', '2021-06-11', '2021-06-11', 3, 3, 'Не запускається. Блок FDCAM працездатний. Чіп (таблетка) не працює. Ярослава визвали, Паша (техвідділ в курсі).\r\n11.06.2021 - заміна чіпа самостійно зі старих. Один виявився робочим.', 0),
(37, 60, '2021-06-11 13:24:15', '0000-00-00', '2021-06-09', 6, 3, '8-9.06.2021 друк 11 тис. етикеток на Lingsi ', 0),
(38, 60, '2021-06-11 13:24:15', '0000-00-00', '2021-06-11', 6, 3, 'Друк 290 етикеток на Lingsi;\r\n\r\n14-25. Звонила Зоя Михайловна. Отправила 1-19 паллету на потребителя 112 партии Патоки крохмальной в ведрах. Не смогли отсканировать. Просила списать. Перемещено в 002.', 0),
(39, 41, '2021-06-11 13:24:15', '0000-00-00', '2021-06-11', 6, 3, 'Пробег головки - 9,7 км', 0),
(40, 42, '2021-06-11 13:24:15', '0000-00-00', '2021-06-11', 6, 3, 'Пробег головки - 6 км', 0),
(41, 43, '2021-06-11 13:24:15', '0000-00-00', '2021-06-11', 6, 3, 'Пробег головки - 4 км', 0),
(42, 44, '2021-06-11 13:24:15', '0000-00-00', '2021-06-11', 6, 3, 'Пробег головки - 2 км', 0),
(43, 45, '2021-06-11 13:24:15', '0000-00-00', '2021-06-11', 6, 3, 'Пробег головки - 5,2 км', 0),
(44, 46, '2021-06-11 13:24:15', '0000-00-00', '2021-06-11', 6, 3, 'Пробег головки - 0,1 км', 0),
(45, 6, '2021-06-16 06:20:25', '2021-06-16', '2021-06-16', 6, 3, 'Аварійна зупинка ліфта. На 2 поверсі передостанній бег наїджає на останній. Причина - відключився оптичний датчик із-за пошкодженого контакту. Потребує заміни. Нач. відділу в курсі.\r\n-----------------------------------\r\n15-30 Повторна зупинка ліфта. Захват двох датчиків палети на каретці при завантаженні на 1 поверсі. Усунено. Працює.', 0),
(46, 60, '2021-06-18 11:45:04', '2021-06-18', '2021-06-18', 6, 3, 'Звонив Паточний. Мовчан. Попросив видалити 72 партія МД18 на ROYAL....\r\nВиконано.\r\n\r\nПо 71 партии на SpA Чили неправильно внесен потребитель. Для них некритично. Позвонил Симоновой. Для нас тоже. Оставили как есть.', 0),
(47, 19, '2021-06-18 12:47:08', '2021-06-21', '0000-00-00', 3, 1, 'Замінити щітки електричні на турбіні', 0),
(49, 23, '2021-06-22 10:18:41', '2021-06-22', '2021-06-22', 3, 2, 'Приїзд \"Логістик-Групп\". Паша був. Будуть робити все, що вказано в Акті дефектації.', 0),
(51, 10, '2021-06-22 10:19:52', '2021-06-22', '2021-06-22', 3, 2, 'Приїзд \"Логістик-Групп\". Паша був. Будуть робити все, що вказано в Акті дефектації.', 0),
(52, 62, '2021-06-22 10:21:14', '2021-06-22', '2021-06-22', 3, 2, 'Приїзд \"Логістик-Групп\". Паша був. Будуть робити все, що вказано в Акті дефектації.', 0),
(53, 63, '2021-06-22 13:37:13', '2021-06-22', '2021-06-22', 3, 3, 'Потік по стіні. Причина - в роз\'єднанні шланги на криші АБК. Визвали Зайвого. Посуховський в курсі. Така сама ситуація у Толока. Криша одна.', 0),
(54, 6, '2021-06-25 06:57:44', '2021-06-25', '2021-06-25', 3, 3, '09-30 - 09-50\r\nПісля аваійної зупинки (пакувальна плівка) не спрацьовує ключ на 2 поверсі. Перевірка та підтяжка контактів, перезавантаження ліфта. працює. ', 0),
(55, 62, '2021-06-25 07:00:21', '2021-06-24', '2021-06-24', 6, 3, '12-30 - 12-45\r\nЧерговий приїзд Логістик-Групп.\r\nТри дні не могли пройти через проходну. привезли панелі для заміни на пробитих секційних воротах 1 поверху. Уклали для тимчасового зберігання біля офісу АБК на 1 поверсі.', 0),
(56, 64, '2021-06-25 07:07:05', '2021-06-24', '2021-06-24', 6, 3, 'Зробили перелік існуючих потреб складу.', 0),
(57, 65, '2021-06-25 07:27:52', '2021-06-25', '2021-06-25', 4, 3, 'Логістик-Групп Розпочали роботу 10-30 \r\nГоловна причина пошкоджень: неправильне паркування фур та необережні заїзди водіїв навантажувачів.\r\n11-50 дал огнетушитель, чтоб поставилди возле места сварочных работ.\r\nЗакінчили роботи - 14-30. Апарель встановлена, працює.', 0),
(58, 67, '2021-06-29 08:07:03', '2021-06-29', '2021-06-29', 4, 3, 'Логістик-Групп. Заміна апарелі та інші роботи\r\nРоботу закінчили в 15-00\r\nАпарель працює.\r\nБудуть на слідуючому тижні.', 0),
(59, 19, '2021-06-30 05:49:22', '2021-06-30', '2021-06-30', 6, 3, 'Аварійна зупинка по перевантаженню головки мийної щітки. Overload Header Brush. Одна щітка не працює. Необхідний комплексний сервіс. Нач. відд. в курсі.\r\n01.07.2021 - розібрали блок двигуна щіток, продули, піджали контакти на панелі керування. Один двигун не працює.\r\n02.07.2021 полная разборка, на валу редуктора - проволока, сняли, но не рабботает. Обмотка обоих двигателей подгоревшая, щетки на рабочем - максимально сработаны, следы перегрева из-за больших нагрузок при мытье стертыми щетками', 0),
(60, 60, '2021-06-30 10:50:22', '2021-06-30', '2021-06-30', 6, 3, 'Добавлен Крохмал 30.10 для ЦМК.', 0),
(62, 6, '2021-07-01 12:33:58', '2021-07-02', '0000-00-00', 3, 1, '01.07.2021 збитий оптичний датчик (зігнутий профіль) на приймальній секції конвейеру на 1 поверсі. Плановий час робіт - 2 години.', 0),
(63, 60, '2021-07-02 05:59:39', '2021-07-02', '2021-07-02', 6, 3, 'Удалены паллеты 7421000000273, 7421000000274 Мальтодекстрин МД-18 выпуска от 25.06.2021 по просьбе Мовчана', 0),
(64, 41, '2021-07-02 13:43:46', '2021-07-05', '2021-07-08', 6, 3, 'Звонила Острякова в 16-40. Очень светлая печать на принтере. Посмотреть в понедельник настройки на железе.\r\nЭтикетка бледная, возможно из-за качества бумаги. Выставили плотность печати 8, режим плотности С. Стало лучше.', 0),
(65, 19, '2021-07-05 10:49:23', '2021-07-05', '2021-07-05', 3, 3, 'Встановлення блоку мийних щіток після ремонту, працює.', 0),
(66, 19, '2021-07-05 13:00:50', '2021-10-04', '0000-00-00', 1, 1, 'Заміна електричних щіток на двигунах мийних щіток', 0),
(67, 60, '2021-07-05 13:35:33', '2021-07-05', '2021-07-05', 6, 3, 'Добавлен Veyseloglu Yaycili Qardashlar (Азербайджан)', 0),
(68, 60, '2021-07-07 08:41:39', '2021-07-07', '2021-07-07', 6, 3, 'Добавлен контрагент SAGA FOODSTUFFS MANUFACT (Singapore)', 0),
(69, 19, '2021-07-08 07:36:58', '2021-07-08', '2021-07-08', 6, 3, 'Отправлен запрос на техотдел по замене держателя всасывающей балки и т.п. ', 0),
(70, 6, '2021-07-08 07:37:56', '2021-07-08', '2021-07-08', 6, 3, 'Отправлен запрос на техотдел по обслуживанию/ремонту тормозов двигателей подъема.', 0),
(71, 6, '2021-07-08 07:40:13', '2021-07-08', '2021-07-08', 6, 3, 'Обновил и повторно отправил запрос нач. отдела на закупку оптических датчиков - 4 шт. и направляющих для цепей транспортера (аналога) из высокомолеклярного поиетилена.', 0),
(72, 60, '2021-07-08 11:39:44', '2021-07-08', '2021-07-08', 6, 3, 'Не работал сканер в кормовом. После переподключения сети на терминале работает', 0),
(73, 70, '2021-07-08 12:38:29', '2021-07-08', '2021-07-08', 6, 3, 'Отправлена заявка на ремонт на техотдел', 0),
(74, 68, '2021-07-08 12:38:50', '2021-07-08', '2021-07-08', 6, 3, 'Отправлена заявка на ремонт на техотдел', 0),
(75, 60, '2021-07-08 12:43:53', '2021-07-08', '2021-07-08', 6, 3, 'Острякова просила отчет о выпуске продукции. У них уже установлен. Показал как пользоваться Сеню. Остальным он расскажет.', 0),
(76, 60, '2021-07-08 13:47:01', '2021-07-09', '2021-07-09', 6, 3, 'Написать запрос на доработку по изменению параметров принятой партии. Для партии в целом и отдельно по паллете.', 0),
(77, 64, '2021-07-09 07:55:21', '2021-07-09', '2021-07-09', 6, 3, 'Приїзд Логістик-Групп 10-55. Ремонт 9 дока', 0),
(78, 71, '2021-07-09 08:01:44', '2021-07-09', '2021-07-09', 4, 3, 'Логістик-Групп 11-00 - 15-40\r\nЗаміна апарелі. Працює.', 0),
(79, 72, '2021-07-13 06:43:16', '2021-07-12', '2021-07-12', 4, 3, 'Заміна апарелі. 10-45-15-00', 0),
(80, 60, '2021-07-13 07:19:04', '2021-07-13', '2021-07-13', 6, 3, 'В интерфейсе всех пользователей старого крохмального добавлен отчет о выпуске продукции (показано, рассказано где)', 0),
(81, 73, '2021-07-13 07:46:09', '2021-07-13', '2021-07-13', 4, 2, '10-45 замена пробитой панели ворот (нижняя часть), обслуживание механики', 0),
(82, 60, '2021-07-16 05:22:47', '2021-07-16', '2021-07-16', 6, 3, 'Удалены контейнеры 13821000000047-50 (Патока крохмальна В/Г барабан L43 Піддон 1,2х1,2)', 0),
(83, 23, '2022-05-26 17:47:40', '2022-05-26', '2022-05-26', 2, 2, 'test---23445', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `object_type`
--

CREATE TABLE `object_type` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Типы объектов';

--
-- Дамп данных таблицы `object_type`
--

INSERT INTO `object_type` (`id`, `name`) VALUES
(1, 'Навантажувачі'),
(2, 'Зарядні пристрої'),
(3, 'Ліфт'),
(4, 'Система ОВиК'),
(5, 'Знищувачі комах'),
(6, 'Стелажі'),
(7, 'Ворота'),
(8, 'Щити (електричні, моніторінгу)'),
(9, 'Датчики'),
(10, 'Коробки керування електричні'),
(11, 'Прибиральна техніка'),
(12, 'Комплектуючі'),
(13, 'Інше обладнання'),
(14, 'Шкафи (серверні, комутаційні)'),
(15, 'Платформа'),
(16, 'Програмне забезпечення'),
(17, 'Кондиціонери'),
(18, 'СКЛАД'),
(19, 'Доки'),
(20, 'Опалювальне обладнання');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `id_parent` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `date_appl` date DEFAULT NULL,
  `date_exec` date DEFAULT NULL,
  `id_state` int(3) NOT NULL,
  `descript` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `id_parent`, `number`, `date_appl`, `date_exec`, `id_state`, `descript`) VALUES
(3, 4, 1, '2021-07-07', NULL, 1, 'тест для 4'),
(6, 46, 1, '2021-07-07', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `orders_state`
--

CREATE TABLE `orders_state` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `descript` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders_state`
--

INSERT INTO `orders_state` (`id`, `name`, `descript`) VALUES
(1, 'Підготовлений', NULL),
(2, 'Відправлений', NULL),
(3, 'Виконаний', NULL),
(4, 'Скасований', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `parts_state`
--

CREATE TABLE `parts_state` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `descript` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `parts_state`
--

INSERT INTO `parts_state` (`id`, `name`, `descript`) VALUES
(1, 'Замовлені', NULL),
(2, 'В наявності', NULL),
(3, 'Використані', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `par_type`
--

CREATE TABLE `par_type` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `service_company`
--

CREATE TABLE `service_company` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `location` varchar(50) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `service_company`
--

INSERT INTO `service_company` (`id`, `name`, `location`, `description`) VALUES
(1, 'ООО \"Корпорация Логистик Групп\"', 'Днепр, Автотранспортная, 29', '0562-794-57-34, 0562-794-57-35, 067-632-66-29 (Михаил, монтажник)');

-- --------------------------------------------------------

--
-- Структура таблицы `service_parts`
--

CREATE TABLE `service_parts` (
  `id` int(11) NOT NULL,
  `id_parent` int(11) NOT NULL,
  `id_state` int(3) NOT NULL,
  `name` varchar(100) NOT NULL,
  `catalog_number` varchar(25) DEFAULT NULL,
  `quantity` int(5) NOT NULL,
  `descript` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `service_parts`
--

INSERT INTO `service_parts` (`id`, `id_parent`, `id_state`, `name`, `catalog_number`, `quantity`, `descript`) VALUES
(1, 7, 1, 'Щітки мийні', 'catalog number', 2, 'описание'),
(2, 47, 1, 'Щітки електричні на турбіну', 'catalog number', 1, 'описание'),
(4, 66, 1, 'Название запчасти 3', 'Невідомий', 2, 'Два комплекти кожний по 4 щітки'),
(9, 64, 1, 'asdg', 'argh', 0, 'dj'),
(46, 66, 1, 'Название запчасти 1', 'aerh', 0, 'ehqjh');

-- --------------------------------------------------------

--
-- Структура таблицы `service_state`
--

CREATE TABLE `service_state` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `descript` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `service_state`
--

INSERT INTO `service_state` (`id`, `name`, `descript`) VALUES
(1, 'Заплановано', NULL),
(2, 'Виконується', NULL),
(3, 'Виконано', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `service_type`
--

CREATE TABLE `service_type` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `descript` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `service_type`
--

INSERT INTO `service_type` (`id`, `name`, `descript`) VALUES
(1, 'Планове ТО', NULL),
(2, 'Позапланове ТО', NULL),
(3, 'Поточний ремонт', NULL),
(4, 'Капітальний ремонт', NULL),
(5, 'Заміна витратних матеріал', NULL),
(6, 'Інші роботи', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` char(255) NOT NULL,
  `password` char(255) NOT NULL,
  `email` char(255) NOT NULL,
  `firstname` char(255) NOT NULL,
  `lastname` char(255) NOT NULL,
  `phone` char(255) NOT NULL,
  `gender` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `firstname`, `lastname`, `phone`, `gender`) VALUES
(1, 'super admin', '$2y$10$yfi5nUQGXUZtMdl27dWAyOd/jMOmATBpiUvJDmUu9hJ5Ro6BE5wsK', 'admin@admin.com', 'john', 'doe', '65646546', 1),
(12, 'admin', '$2y$10$Z2izWoCqlQcdieZRMxFcReDzqFAi93kAeTKYKpzTTRL9hebfUCq.2', 'admin@gmail.com', 'admin', 'admin', '123455678', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `user_group`
--

CREATE TABLE `user_group` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user_group`
--

INSERT INTO `user_group` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(7, 6, 4),
(8, 7, 4),
(9, 8, 4),
(10, 9, 5),
(11, 10, 5),
(12, 11, 5),
(13, 12, 7);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `doc_type`
--
ALTER TABLE `doc_type`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `object_docs`
--
ALTER TABLE `object_docs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `object_docs_del_cascade` (`id_object`);

--
-- Индексы таблицы `object_location`
--
ALTER TABLE `object_location`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `object_register`
--
ALTER TABLE `object_register`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `object_service`
--
ALTER TABLE `object_service`
  ADD PRIMARY KEY (`id`),
  ADD KEY `object_service_del_cascade` (`id_object`);

--
-- Индексы таблицы `object_type`
--
ALTER TABLE `object_type`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_del_cascade` (`id_parent`);

--
-- Индексы таблицы `orders_state`
--
ALTER TABLE `orders_state`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `parts_state`
--
ALTER TABLE `parts_state`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `service_company`
--
ALTER TABLE `service_company`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `service_parts`
--
ALTER TABLE `service_parts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_parts_del_cascade` (`id_parent`);

--
-- Индексы таблицы `service_state`
--
ALTER TABLE `service_state`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `service_type`
--
ALTER TABLE `service_type`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user_group`
--
ALTER TABLE `user_group`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `doc_type`
--
ALTER TABLE `doc_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `object_docs`
--
ALTER TABLE `object_docs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;

--
-- AUTO_INCREMENT для таблицы `object_location`
--
ALTER TABLE `object_location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `object_register`
--
ALTER TABLE `object_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT для таблицы `object_service`
--
ALTER TABLE `object_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT для таблицы `object_type`
--
ALTER TABLE `object_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `orders_state`
--
ALTER TABLE `orders_state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `parts_state`
--
ALTER TABLE `parts_state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `service_company`
--
ALTER TABLE `service_company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `service_parts`
--
ALTER TABLE `service_parts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT для таблицы `service_state`
--
ALTER TABLE `service_state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `service_type`
--
ALTER TABLE `service_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `object_docs`
--
ALTER TABLE `object_docs`
  ADD CONSTRAINT `object_docs_del_cascade` FOREIGN KEY (`id_object`) REFERENCES `object_register` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `object_service`
--
ALTER TABLE `object_service`
  ADD CONSTRAINT `object_service_del_cascade` FOREIGN KEY (`id_object`) REFERENCES `object_register` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_del_cascade` FOREIGN KEY (`id_parent`) REFERENCES `service_parts` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `service_parts`
--
ALTER TABLE `service_parts`
  ADD CONSTRAINT `service_parts_del_cascade` FOREIGN KEY (`id_parent`) REFERENCES `object_service` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
