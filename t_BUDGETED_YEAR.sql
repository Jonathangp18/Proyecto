-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 28-05-2020 a las 02:49:59
-- Versión del servidor: 10.2.31-MariaDB
-- Versión de PHP: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sepherot_jonathanBD`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_BUDGETED_YEAR`
--

CREATE TABLE `t_BUDGETED_YEAR` (
  `budget_id` int(1) NOT NULL,
  `budget` decimal(11,2) DEFAULT NULL,
  `year_budget` year(4) DEFAULT NULL,
  `create_by` int(11) NOT NULL,
  `creation_date` date NOT NULL DEFAULT current_timestamp(),
  `edit_by` varchar(50) DEFAULT NULL,
  `edit_date` date DEFAULT NULL,
  `delete_by` varchar(50) DEFAULT '0',
  `delete_date` date DEFAULT NULL,
  `rem_budget` decimal(11,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `t_BUDGETED_YEAR`
--

INSERT INTO `t_BUDGETED_YEAR` (`budget_id`, `budget`, `year_budget`, `create_by`, `creation_date`, `edit_by`, `edit_date`, `delete_by`, `delete_date`, `rem_budget`) VALUES
(21, 20000000.00, 2000, 1, '2020-04-02', '39', '2020-05-21', '0', NULL, 15000000.00),
(20, 15000000.45, 2019, 38, '2020-04-02', '39', '2020-05-21', '0', NULL, 12900000.45),
(19, 7000000.00, 2018, 38, '2020-04-03', '39', '2020-05-22', '0', '0000-00-00', 5999999.45),
(18, 10000000.00, 2017, 38, '2020-04-02', '39', '2020-05-21', '0', NULL, 9997600.00),
(17, 10000000.00, 2016, 38, '2020-04-02', '39', '2020-05-21', '0', NULL, 9997600.00),
(16, 2000000.00, 2015, 38, '2020-04-02', '39', '2020-05-21', '0', NULL, 1976000.00),
(15, 10000000.00, 2014, 38, '2020-04-02', '39', '2020-05-21', '0', NULL, 10000000.00),
(11, 10000000.00, 2010, 38, '2020-04-02', '39', '2020-05-21', '0', NULL, 9526000.00),
(12, 10000000.00, 2011, 38, '2020-04-02', '39', '2020-05-21', '0', NULL, 9868000.00),
(13, 10000000.00, 2012, 38, '2020-04-02', '39', '2020-05-21', '0', NULL, 9988000.00),
(14, 10000000.55, 2013, 38, '2020-04-02', '39', '2020-05-21', '0', NULL, 10000000.55),
(22, 10000000.00, 2002, 1, '2020-04-02', '39', '2020-05-21', '0', NULL, 6500000.00),
(23, 5000000.00, 2009, 1, '2020-04-03', '39', '2020-05-21', '0', NULL, 5000000.00),
(24, 15000000.00, 2006, 1, '2020-04-04', '39', '2020-05-21', '0', NULL, 4800000.00),
(25, 12000000.52, 2020, 45, '2020-04-28', '45', '2020-05-26', '0', NULL, 10797600.52),
(26, 5000000.00, 2001, 45, '2020-04-28', '39', '2020-05-21', '0', NULL, 2000000.00),
(27, 10000000.00, 2003, 45, '2020-04-28', '39', '2020-05-21', '0', NULL, 4000000.00),
(28, 10000000.00, 2004, 45, '2020-04-28', '39', '2020-05-21', '0', NULL, 5300000.00),
(29, 10000000.00, 2005, 45, '2020-04-28', '39', '2020-05-21', '0', NULL, 2679998.50),
(30, 7600000.00, 2007, 45, '2020-04-28', '39', '2020-05-21', '0', NULL, 1600000.00),
(31, 10690000.00, 2008, 45, '2020-04-28', '39', '2020-05-21', '0', NULL, 5589999.35),
(32, 10000.00, 1999, 1, '2020-05-19', '45', '2020-05-21', '0', NULL, -2990000.00);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `t_BUDGETED_YEAR`
--
ALTER TABLE `t_BUDGETED_YEAR`
  ADD PRIMARY KEY (`budget_id`),
  ADD KEY `fk_t_bud_t_usr` (`create_by`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `t_BUDGETED_YEAR`
--
ALTER TABLE `t_BUDGETED_YEAR`
  MODIFY `budget_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
