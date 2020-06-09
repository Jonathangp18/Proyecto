-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 28-05-2020 a las 02:48:25
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
-- Estructura de tabla para la tabla `C_Zone`
--

CREATE TABLE `C_Zone` (
  `zone_id` int(1) NOT NULL,
  `zone` varchar(100) DEFAULT NULL,
  `create_by` int(11) NOT NULL,
  `creation_date` date NOT NULL DEFAULT current_timestamp(),
  `edit_by` varchar(50) DEFAULT NULL,
  `edit_date` date DEFAULT NULL,
  `delete_by` varchar(50) DEFAULT NULL,
  `delete_date` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `C_Zone`
--

INSERT INTO `C_Zone` (`zone_id`, `zone`, `create_by`, `creation_date`, `edit_by`, `edit_date`, `delete_by`, `delete_date`) VALUES
(1, 'Centro', 1, '2020-03-28', '', '0000-00-00', '', '0000-00-00'),
(2, 'Norte', 1, '2020-03-28', '', '0000-00-00', '', '0000-00-00'),
(3, 'Sur', 1, '2020-03-28', '', '0000-00-00', '', '0000-00-00'),
(4, 'Este', 1, '2020-03-28', '', '0000-00-00', '', '0000-00-00'),
(5, 'Oeste', 1, '2020-03-28', '', '0000-00-00', '', '0000-00-00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `C_Zone`
--
ALTER TABLE `C_Zone`
  ADD PRIMARY KEY (`zone_id`),
  ADD KEY `fk_c_zon_t_usr` (`create_by`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `C_Zone`
--
ALTER TABLE `C_Zone`
  MODIFY `zone_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
