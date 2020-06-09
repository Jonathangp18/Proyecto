-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 28-05-2020 a las 02:47:01
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
-- Estructura de tabla para la tabla `C_Season`
--

CREATE TABLE `C_Season` (
  `season_id` int(11) NOT NULL,
  `s_name` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `C_Season`
--

INSERT INTO `C_Season` (`season_id`, `s_name`) VALUES
(1, 'Permanente'),
(2, 'Primavera'),
(3, 'Verano'),
(4, 'Otoño '),
(5, 'Invierno');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `C_Season`
--
ALTER TABLE `C_Season`
  ADD PRIMARY KEY (`season_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `C_Season`
--
ALTER TABLE `C_Season`
  MODIFY `season_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
