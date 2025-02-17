-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 28-05-2020 a las 02:50:29
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
-- Estructura de tabla para la tabla `T_indicators`
--

CREATE TABLE `T_indicators` (
  `indicators_id` int(1) NOT NULL,
  `cost_infra` decimal(11,2) DEFAULT NULL,
  `budget_id` int(11) DEFAULT NULL,
  `zone_id` int(11) NOT NULL,
  `people_involved` varchar(10) DEFAULT NULL,
  `infraestructure_id` int(11) DEFAULT NULL,
  `create_by` int(11) NOT NULL,
  `creation_date` date NOT NULL DEFAULT current_timestamp(),
  `edit_by` varchar(50) DEFAULT NULL,
  `edit_date` date DEFAULT NULL,
  `delete_by` varchar(50) DEFAULT '0',
  `delete_date` date DEFAULT NULL,
  `type_id` int(11) NOT NULL,
  `season_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `T_indicators`
--

INSERT INTO `T_indicators` (`indicators_id`, `cost_infra`, `budget_id`, `zone_id`, `people_involved`, `infraestructure_id`, `create_by`, `creation_date`, `edit_by`, `edit_date`, `delete_by`, `delete_date`, `type_id`, `season_id`) VALUES
(167, 1000000.00, 26, 3, '1000', 110, 39, '2020-05-01', '39', '2020-05-04', '0', '0000-00-00', 1, 1),
(168, 1000000.00, 22, 3, '1000', 110, 39, '2020-05-01', '39', '2020-05-04', '0', '0000-00-00', 1, 1),
(169, 500000.00, 27, 3, '500', 110, 39, '2020-05-01', '39', '2020-05-04', '0', '0000-00-00', 1, 1),
(170, 600000.00, 28, 3, '500', 110, 39, '2020-05-01', '39', '2020-05-04', '0', '0000-00-00', 1, 1),
(171, 2000000.00, 22, 2, '3000', 111, 39, '2020-05-01', NULL, NULL, '0', NULL, 3, 1),
(172, 5000000.00, 27, 2, '4000', 111, 39, '2020-05-01', NULL, NULL, '0', NULL, 3, 1),
(173, 2000000.00, 28, 2, '2000', 111, 39, '2020-05-01', NULL, NULL, '0', NULL, 3, 1),
(174, 1000000.00, 29, 2, '1000', 111, 39, '2020-05-01', NULL, NULL, '0', NULL, 3, 1),
(175, 7000000.00, 24, 2, '5000', 111, 39, '2020-05-01', NULL, NULL, '0', NULL, 3, 1),
(176, 1000000.00, 30, 2, '3000', 111, 39, '2020-05-01', NULL, NULL, '0', NULL, 3, 1),
(190, 1000000.00, 24, 2, '1000', 112, 39, '2020-05-02', '39', '2020-05-27', '0', NULL, 1, 1),
(189, 2000000.00, 29, 2, '5000', 112, 39, '2020-05-02', '39', '2020-05-27', '0', NULL, 1, 1),
(188, 100000.00, 28, 2, '6000', 112, 39, '2020-05-02', '39', '2020-05-27', '0', NULL, 1, 1),
(187, 500000.00, 27, 2, '2000', 112, 39, '2020-05-02', '39', '2020-05-27', '0', NULL, 1, 1),
(186, 500000.00, 22, 2, '3000', 112, 39, '2020-05-02', '39', '2020-05-27', '0', NULL, 1, 1),
(185, 1000000.00, 26, 2, '3000', 112, 39, '2020-05-02', '39', '2020-05-27', '0', NULL, 1, 1),
(184, 2000000.00, 21, 2, '5000', 112, 39, '2020-05-02', '39', '2020-05-27', '0', '0000-00-00', 1, 1),
(191, 1000000.00, 30, 2, '1000', 112, 39, '2020-05-02', '39', '2020-05-27', '0', NULL, 1, 1),
(192, 200000.00, 29, 3, '200', 110, 39, '2020-05-02', '39', '2020-05-04', '0', '0000-00-00', 1, 1),
(193, 2000000.00, 21, 3, '3000', 110, 39, '2020-05-03', '39', '2020-05-04', '0', '0000-00-00', 1, 1),
(194, 120001.50, 29, 1, '300', 113, 39, '2020-05-03', '1', '2020-05-22', '0', '0000-00-00', 15, 5),
(220, 100000.00, 31, 2, '100', 112, 39, '2020-05-04', '39', '2020-05-27', '0', NULL, 1, 1),
(216, 1000000.00, 32, 3, '3000', 110, 39, '2020-05-04', NULL, NULL, '0', NULL, 1, 1),
(217, 1000000.00, 26, 2, '3000', 111, 39, '2020-05-04', NULL, NULL, '0', NULL, 3, 1),
(212, 200000.00, 25, 2, '200', 116, 39, '2020-05-04', '39', '2020-05-27', '0', '0000-00-00', 15, 2),
(290, 1000000.00, 28, 1, '1000', 138, 1, '2020-05-22', '39', '2020-05-27', '1', '2020-05-22', 1, 1),
(214, 200000.00, 24, 0, '2020', 110, 39, '2020-05-04', NULL, NULL, '0', '0000-00-00', 1, 1),
(215, 1000000.00, 30, 0, '200', 110, 39, '2020-05-04', NULL, NULL, '0', '0000-00-00', 1, 1),
(219, 2000000.00, 32, 2, '3000', 112, 39, '2020-05-04', '39', '2020-05-27', '0', NULL, 1, 1),
(218, 2000000.00, 31, 2, '2000', 111, 39, '2020-05-04', NULL, NULL, '0', NULL, 3, 1),
(221, 1000000.00, 21, 2, '2000', 111, 39, '2020-05-04', NULL, NULL, '0', NULL, 3, 1),
(222, 2000000.00, 20, 1, '3000', 117, 1, '2020-05-04', NULL, NULL, '0', NULL, 1, 1),
(223, 1000000.00, 25, 1, '2000', 117, 1, '2020-05-04', NULL, NULL, '0', NULL, 1, 1),
(224, 2000000.00, 28, 2, '2000', 118, 39, '2020-05-15', '39', '2020-05-15', '39', '2020-05-15', 2, 1),
(225, 3000000.00, 29, 2, '3000', 118, 39, '2020-05-15', '39', '2020-05-15', '0', NULL, 2, 1),
(226, 1000000.00, 24, 2, '500', 118, 39, '2020-05-15', '39', '2020-05-15', '0', NULL, 2, 1),
(227, 2000000.00, 30, 2, '2000', 118, 39, '2020-05-15', NULL, NULL, '0', NULL, 2, 1),
(228, 50000.00, 20, 1, '200', 119, 39, '2020-05-15', '39', '2020-05-27', '0', NULL, 7, 5),
(229, 50000.00, 20, 1, '200', 119, 39, '2020-05-15', '39', '2020-05-27', '0', NULL, 7, 5),
(230, 1000000.55, 19, 1, '1000', 117, 39, '2020-05-17', NULL, NULL, '0', NULL, 1, 1),
(231, 3000000.65, 31, 2, '200', 118, 1, '2020-05-17', NULL, NULL, '0', NULL, 2, 1),
(303, 12000.00, 13, 3, '120', 140, 45, '2020-05-27', '45', '2020-05-27', '0', NULL, 8, 1),
(302, 120000.00, 12, 3, '120', 140, 45, '2020-05-27', '45', '2020-05-27', '0', NULL, 8, 1),
(297, 2400.00, 25, 1, '10', 139, 45, '2020-05-22', NULL, NULL, '45', '2020-05-22', 1, 1),
(296, 2400.00, 18, 1, '10', 139, 45, '2020-05-22', '45', '2020-05-22', '45', '2020-05-22', 1, 1),
(295, 2400.00, 17, 1, '10', 139, 45, '2020-05-22', '45', '2020-05-22', '45', '2020-05-22', 1, 1),
(294, 24000.00, 16, 1, '10', 139, 45, '2020-05-22', '45', '2020-05-22', '45', '2020-05-22', 1, 1),
(289, 1000000.00, 30, 1, '1000', 138, 1, '2020-05-22', '39', '2020-05-27', '0', NULL, 1, 1),
(287, 1000000.00, 29, 1, '1000', 138, 1, '2020-05-22', '39', '2020-05-27', '0', NULL, 1, 1),
(288, 1000000.00, 24, 1, '1000', 138, 1, '2020-05-22', '39', '2020-05-27', '0', NULL, 1, 1),
(301, 12000.00, 11, 3, '120', 140, 45, '2020-05-27', '45', '2020-05-27', '0', NULL, 8, 1),
(304, 450000.00, 11, 1, '2300', 141, 45, '2020-05-27', '39', '2020-05-27', '0', NULL, 7, 5),
(310, 12000.00, 13, 2, '120', 142, 45, '2020-05-27', NULL, NULL, '45', '2020-05-27', 8, 1),
(309, 12000.00, 12, 2, '120', 142, 45, '2020-05-27', NULL, NULL, '45', '2020-05-27', 8, 1),
(308, 12000.00, 11, 2, '120', 142, 45, '2020-05-27', NULL, NULL, '45', '2020-05-27', 8, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `T_indicators`
--
ALTER TABLE `T_indicators`
  ADD PRIMARY KEY (`indicators_id`),
  ADD KEY `fk_budget` (`budget_id`),
  ADD KEY `fk_infra` (`infraestructure_id`),
  ADD KEY `fk_t_ind_t_usr` (`create_by`) USING BTREE,
  ADD KEY `fk_tind_z` (`zone_id`),
  ADD KEY `fk_type` (`type_id`),
  ADD KEY `fk_season` (`season_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `T_indicators`
--
ALTER TABLE `T_indicators`
  MODIFY `indicators_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=311;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
