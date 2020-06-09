-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 28-05-2020 a las 02:51:59
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
-- Estructura de tabla para la tabla `T_Infraestructure`
--

CREATE TABLE `T_Infraestructure` (
  `infraestructure_id` int(1) NOT NULL,
  `name_infra` varchar(100) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `zone_id` int(11) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `season_id` int(11) NOT NULL DEFAULT 1,
  `creator_id` int(11) DEFAULT NULL,
  `creation_date` date NOT NULL DEFAULT current_timestamp(),
  `edit_by` varchar(50) DEFAULT NULL,
  `edit_date` date DEFAULT NULL,
  `delete_by` varchar(50) DEFAULT '0',
  `delete_date` date DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `finish_date` date DEFAULT NULL,
  `notes` longtext DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `T_Infraestructure`
--

INSERT INTO `T_Infraestructure` (`infraestructure_id`, `name_infra`, `location`, `zone_id`, `type_id`, `season_id`, `creator_id`, `creation_date`, `edit_by`, `edit_date`, `delete_by`, `delete_date`, `start_date`, `finish_date`, `notes`) VALUES
(110, 'Parque de los Venados', 'Coyoacan', 3, 1, 1, 39, '2020-05-01', '39', '2020-05-04', '0', '0000-00-00', '1999-02-01', '2007-03-01', 'parque localizado en el centro de coyoacÃ¡n.'),
(111, 'Hospital la raza', 'Calzada Vallejo 8', 2, 3, 1, 39, '2020-05-01', '39', '2020-05-04', '0', NULL, '2000-04-01', '2008-01-01', ''),
(112, 'Parque Mexico', 'Condesa, av Amsterdam.', 2, 1, 1, 39, '2020-05-02', '39', '2020-05-27', '0', NULL, '1999-01-01', '2008-02-01', ''),
(113, 'Paseo navideÃ±o Reforma', 'Reforma Angel', 1, 15, 5, 39, '2020-05-03', '1', '2020-05-22', '0', '0000-00-00', '2005-12-01', '2005-12-30', 'paseo nocturno'),
(116, 'Obra de temporada', 'cdmx', 2, 15, 2, 39, '2020-05-04', '39', '2020-05-27', '0', '0000-00-00', '2020-01-01', '2020-01-03', 'obra de temporada'),
(117, 'Parque Lincon', 'Polanco', 1, 1, 1, 1, '2020-05-04', '39', '2020-05-17', '0', NULL, '2018-01-01', '2020-05-31', ''),
(118, 'Periferico segundo piso', 'Pedregal', 2, 2, 1, 39, '2020-05-15', '1', '2020-05-17', '0', NULL, '2005-02-01', '2008-01-01', 'prueba1'),
(119, 'Flores Noche Buenas', 'Reforma', 1, 7, 5, 39, '2020-05-15', '39', '2020-05-27', '0', NULL, '2019-12-01', '2019-12-12', 'prueba'),
(139, 'Parque Rosa', 'Centro Historico', 1, 1, 1, 45, '2020-05-22', '45', '2020-05-22', '45', '2020-05-22', '2015-12-30', '2020-05-22', 'InformaciÃ³n importante aÃºn mÃ¡s importante'),
(138, 'Prueba', 'CDMX', 1, 1, 1, 1, '2020-05-22', '39', '2020-05-27', '0', NULL, '2005-02-01', '2007-03-10', 'prueba'),
(140, 'Escuela Publica 72', 'Coyoacan', 3, 8, 1, 45, '2020-05-27', '45', '2020-05-27', '0', NULL, '2010-04-20', '2012-03-20', 'Datos curiosos del lugar... (:'),
(141, 'Arbol de Navidad', 'Angel de la independencia', 1, 7, 5, 45, '2020-05-27', '39', '2020-05-27', '0', NULL, '2010-12-12', '2011-12-12', 'det'),
(142, 'Escuela no.12', 'Lindavista', 2, 8, 1, 45, '2020-05-27', '45', '2020-05-27', '45', '2020-05-27', '2010-04-04', '2020-05-27', 'InformaciÃ³n importante');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `T_Infraestructure`
--
ALTER TABLE `T_Infraestructure`
  ADD PRIMARY KEY (`infraestructure_id`),
  ADD KEY `fk_zona` (`zone_id`),
  ADD KEY `fk_type` (`type_id`),
  ADD KEY `fk_creator` (`creator_id`),
  ADD KEY `fk_season` (`season_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `T_Infraestructure`
--
ALTER TABLE `T_Infraestructure`
  MODIFY `infraestructure_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
