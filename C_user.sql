-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 28-05-2020 a las 02:47:32
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
-- Estructura de tabla para la tabla `C_user`
--

CREATE TABLE `C_user` (
  `id_user` int(50) NOT NULL,
  `user` varchar(50) NOT NULL,
  `create_by` int(11) NOT NULL,
  `creation_date` date NOT NULL DEFAULT current_timestamp(),
  `edit_by` varchar(50) DEFAULT NULL,
  `edit_date` date DEFAULT NULL,
  `delete_by` varchar(50) DEFAULT NULL,
  `delete_date` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `C_user`
--

INSERT INTO `C_user` (`id_user`, `user`, `create_by`, `creation_date`, `edit_by`, `edit_date`, `delete_by`, `delete_date`) VALUES
(1, 'Colaborador', 1, '2020-03-28', '', '0000-00-00', '', '0000-00-00'),
(2, 'Cliente', 1, '2020-03-28', '', '0000-00-00', '', '0000-00-00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `C_user`
--
ALTER TABLE `C_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `fk_CUSR_TUSR` (`create_by`) USING BTREE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
