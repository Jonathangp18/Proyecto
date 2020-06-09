-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 28-05-2020 a las 02:53:16
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
-- Estructura de tabla para la tabla `T_visits`
--

CREATE TABLE `T_visits` (
  `visits_id` int(1) NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  `infraestructure_id` int(11) DEFAULT NULL,
  `visit_date` date DEFAULT current_timestamp(),
  `create_by` int(11) NOT NULL,
  `creation_date` date NOT NULL DEFAULT current_timestamp(),
  `edit_by` varchar(50) DEFAULT NULL,
  `edit_date` date DEFAULT NULL,
  `delete_by` varchar(50) DEFAULT NULL,
  `delete_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `T_visits`
--

INSERT INTO `T_visits` (`visits_id`, `client_id`, `infraestructure_id`, `visit_date`, `create_by`, `creation_date`, `edit_by`, `edit_date`, `delete_by`, `delete_date`) VALUES
(1, 2, 110, '2020-05-03', 39, '2020-05-03', NULL, NULL, NULL, '0000-00-00'),
(2, 2, 111, '2020-04-20', 39, '2020-05-03', NULL, NULL, NULL, '0000-00-00'),
(3, 2, 112, '2020-04-22', 39, '2020-05-03', NULL, NULL, NULL, '0000-00-00'),
(7, 2, 110, '2020-04-07', 39, '2020-05-03', NULL, NULL, NULL, '0000-00-00'),
(5, 2, 113, '2020-02-14', 39, '2020-05-03', NULL, NULL, NULL, '0000-00-00'),
(8, 2, 110, '2020-05-22', 2, '2020-05-22', NULL, NULL, NULL, '0000-00-00'),
(9, 2, 111, '2020-05-22', 2, '2020-05-22', NULL, NULL, NULL, '0000-00-00'),
(10, 2, 112, '2020-05-22', 2, '2020-05-22', NULL, NULL, NULL, '0000-00-00'),
(11, 2, 117, '2020-05-22', 2, '2020-05-22', NULL, NULL, NULL, '0000-00-00'),
(12, 2, 118, '2020-05-22', 2, '2020-05-22', NULL, NULL, NULL, '0000-00-00'),
(13, 2, 110, '2020-05-23', 2, '2020-05-23', NULL, NULL, NULL, '0000-00-00'),
(14, 2, 110, '2020-05-23', 2, '2020-05-23', NULL, NULL, NULL, '0000-00-00'),
(15, 2, 112, '2020-05-23', 2, '2020-05-23', NULL, NULL, NULL, '0000-00-00'),
(16, 2, 110, '2020-05-25', 2, '2020-05-25', NULL, NULL, NULL, '0000-00-00'),
(17, 2, 110, '2020-05-25', 2, '2020-05-25', NULL, NULL, NULL, '0000-00-00'),
(18, 2, 112, '2020-05-25', 2, '2020-05-25', NULL, NULL, NULL, '0000-00-00'),
(19, 2, 112, '2020-05-25', 2, '2020-05-25', NULL, NULL, NULL, '0000-00-00'),
(20, 2, 110, '2020-05-25', 2, '2020-05-25', NULL, NULL, NULL, '0000-00-00'),
(21, 2, 112, '2020-05-25', 2, '2020-05-25', NULL, NULL, NULL, '0000-00-00'),
(22, 2, 111, '2020-05-25', 2, '2020-05-25', NULL, NULL, NULL, '0000-00-00'),
(23, 2, 110, '2020-05-26', 2, '2020-05-26', NULL, NULL, NULL, '0000-00-00'),
(24, 2, 116, '2020-05-26', 2, '2020-05-26', NULL, NULL, NULL, '0000-00-00'),
(25, 2, 111, '2020-05-26', 2, '2020-05-26', NULL, NULL, NULL, '0000-00-00'),
(26, 2, 110, '2020-05-26', 2, '2020-05-26', NULL, NULL, NULL, '0000-00-00'),
(27, 2, 112, '2020-05-26', 2, '2020-05-26', NULL, NULL, NULL, '0000-00-00'),
(28, 2, 112, '2020-05-26', 2, '2020-05-26', NULL, NULL, NULL, '0000-00-00'),
(29, 2, 110, '2020-05-26', 2, '2020-05-26', NULL, NULL, NULL, '0000-00-00'),
(30, 2, 111, '2020-05-26', 2, '2020-05-26', NULL, NULL, NULL, '0000-00-00'),
(31, 2, 110, '2020-05-26', 2, '2020-05-26', NULL, NULL, NULL, '0000-00-00'),
(32, 2, 112, '2020-05-26', 2, '2020-05-26', NULL, NULL, NULL, '0000-00-00'),
(33, 2, 110, '2020-05-27', 2, '2020-05-27', NULL, NULL, NULL, '0000-00-00'),
(34, 2, 111, '2020-05-27', 2, '2020-05-27', NULL, NULL, NULL, '0000-00-00'),
(35, 2, 111, '2020-05-27', 2, '2020-05-27', NULL, NULL, NULL, '0000-00-00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `T_visits`
--
ALTER TABLE `T_visits`
  ADD PRIMARY KEY (`visits_id`),
  ADD KEY `fk_t_inf_t_usr` (`infraestructure_id`),
  ADD KEY `fk_t_visc_t_usr` (`client_id`),
  ADD KEY `fk_t_vis_t_usr` (`create_by`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `T_visits`
--
ALTER TABLE `T_visits`
  MODIFY `visits_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
