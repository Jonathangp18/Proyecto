-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 28-05-2020 a las 02:52:38
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
-- Estructura de tabla para la tabla `T_USERCC`
--

CREATE TABLE `T_USERCC` (
  `usercc_id` int(1) NOT NULL,
  `first_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `cellphone` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `c_caddress` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `c_password` varchar(70) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `SALT` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_user` int(50) NOT NULL,
  `create_by` varchar(50) DEFAULT NULL,
  `creation_date` date DEFAULT current_timestamp(),
  `edit_by` varchar(50) DEFAULT NULL,
  `edit_date` date DEFAULT NULL,
  `delete_by` varchar(50) DEFAULT '0',
  `delete_date` date DEFAULT NULL,
  `TOKEN` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `T_USERCC`
--

INSERT INTO `T_USERCC` (`usercc_id`, `first_name`, `last_name`, `cellphone`, `c_caddress`, `c_password`, `SALT`, `id_user`, `create_by`, `creation_date`, `edit_by`, `edit_date`, `delete_by`, `delete_date`, `TOKEN`) VALUES
(1, 'Jonathan ', 'Gaitan Perez', '1999-02-18', 'jonathangaitan@lasallistas.org.mx', 'b07fa44493940dafc4471f85e8b76ff93a03ca767cd2a7894656d599568b8ad6', '5ecc1f2f77ad1', 1, NULL, NULL, '', '0000-00-00', '', '0000-00-00', ''),
(34, 'Victor', 'Gonzalez', '5566778899001122', 'victor.gonzalez@lasalle.mx', 'b4c63419ac1a2673c84a5553562ae06c54e343daf865c1389bd85847cb59bb1c', '5ebee582990db', 1, 'joniigaitan9@gmail.com', '2020-04-01', '', '0000-00-00', '0', '0000-00-00', ''),
(40, 'jennifer', 'enriquez', '5544332211', 'jennie@gmail.com', 'a2ff7f5c0c735b93a145dcbf95b54eea232fbf3a35c0efea8decdaa0ffe86691', '5e856c3e777fa', 1, 'joniigaitan9@gmail.com', '2020-04-02', NULL, NULL, '0', '0000-00-00', ''),
(39, 'Jonathan', 'GaitÃ¡n Perez', '5545621402', 'joniigaitan9@gmail.com', '3242121a3bc68a6b06409f1ffa5d1791dcbe7c60b878dd72a9d6325043426fda', '5ece0a03e3d0f', 1, 'joniigaitan9@gmail.com', '2020-04-01', '1', '2020-05-27', '0', '0000-00-00', ''),
(41, 'braulio', 'martin', '5566778899', 'bm@gmail.com', 'f9be7e8d477b29fa30d49a2c460d6f5d45f8238b2bcf313639f2e32ca7158ec1', '5e856cc512768', 1, 'jennie@gmail.com', '2020-04-02', NULL, NULL, '0', NULL, ''),
(38, 'regina', 'gaitan', '554466332211', 'rg@gmail.com', 'ea593440a25980d52567a6fca9018684ea678cf1f139358c7a5f3be985146f0f', '5e853360846e6', 1, 'joniigaitan9@gmail.com', '2020-04-02', NULL, NULL, '39', '2020-04-02', ''),
(42, 'andy', 'Jimenez', '5566778899', 'andy@gmail.com', '2d320a4be694100dae0fa1e3f8979513f0767ea0d44085506ed076c4b521f273', '5e85a3a9e1272', 1, 'jonathangaitan@lasallistas.org.mx', '2020-04-02', NULL, NULL, '1', '2020-04-03', ''),
(43, 'Jennifer', 'Enriquez', '5566778899', 'je@lasallistas.org.mx', 'ad1e15845a0b46560bbf0ee3a3b98858b25dfe7c500fd1e14806394f24463367', '5e86cdec5074a', 1, 'jonathangaitan@lasallistas.org.mx', '2020-04-03', NULL, NULL, '0', '0000-00-00', ''),
(44, 'lll', 'mmm', '3344556677', 'lm@gmail.com', 'ca3c253aad2d8bb43f3407b537b975586afc2338e4f1a3cf5d678be6b4f355ca', '5ecc1f59ef9bd', 1, 'joniigaitan9@gmail.com', '2020-04-03', 'jonathangaitan@lasallistas.org.mx', '2020-05-25', '0', NULL, ''),
(45, 'Jennie', 'Enriquez', '5513988586', 'jennieec98@gmail.com', 'ca186acea535f5b4b00dd42641bb943083d580f7c3c57c6b4e37c8c6efa392a6', '5ecdf45d347c6', 1, '', '2020-04-27', '1', '2020-05-27', '0', NULL, ''),
(46, 'usuarioprueba', 'prueba', '5546831203', 'prueba@gmail.com', '6bd2219f5740ee05c64b3761d2877e13841019023aa356199d61444ca80c0b0e', '5eaf7d769098a', 1, 'joniigaitan9@gmail.com', '2020-05-04', NULL, NULL, '39', '2020-05-04', ''),
(47, 'Ernesto', 'Servigon', '443556677', 'ernestoservigon@lasallistas.org.mx', '4b9bc9f1ea7601d558a68ef6f804bae2aa085ac0abbb222cad58fbadb9290967', '5ebee1249bf50', 1, 'joniigaitan9@gmail.com', '2020-05-15', NULL, NULL, '0', NULL, ''),
(48, 'Daniela', 'Lepe', '5568295748', 'dl@lasallistas.org.mx', 'f91dd35069aa58e46cc7c19abdc39541fd05a53a24f6a1c196a21af45cc856f9', '5ec8020b554d2', 1, 'jonathangaitan@lasallistas.org.mx', '2020-05-22', NULL, NULL, '1', '2020-05-22', ''),
(49, 'Paola', 'Cedillo', '5511223344', 'paolac@gmail.com', '757ae611fc1f3284f7fa88c15eedc5a4bbc5a0c354494111aebf83171fb92dcb', '5ec81ba052c5a', 1, 'jennieec98@gmail.com', '2020-05-22', NULL, NULL, '45', '2020-05-27', '5ec81bc9312d9'),
(50, 'prueba2', 'prueba', '4455669234', 'prueba2@gmail.com', '86c50e6d7b56fb0f62ba01a59c811bb44576cfc55bcedab5bda8a833f9d6f155', '5ecc1fb1a92fa', 1, 'lm@gmail.com', '2020-05-25', NULL, NULL, '0', NULL, ''),
(56, 'je', 'ec', '445566321', 'ec@gmail.com', '64c0d586df029687c7ccab54e423e768e07f4c22ec173f53b5127ca5e26b0132', '5ecc70b8c8e74', 2, 'ec@gmail.com', '2020-05-26', NULL, NULL, '0', NULL, ''),
(54, 'ju', 'jg', '5547329148', 'jg@gmail.com', '2b419cae029f1e72ba25a05644fffbf8252f3f782ccfac5f8533b698a7ca8322', '5ecc5ddc25669', 2, 'jg@gmail.com', '2020-05-26', NULL, NULL, '0', '0000-00-00', ''),
(57, 'aa', 'bb', '4455667733', 'aa@gmail.com', '0b08c8e149eaf8043c31d6caab049d15eaef3183f5b2efacb95e2dc417e5bdb8', '5ecc710209937', 2, 'aa@gmail.com', '2020-05-26', NULL, NULL, '0', NULL, ''),
(58, 'Jonhy', 'Gaitan', '5545032184', 'jonhy@gmail.com', 'b787c88fcd8a44cb1f17a12d5feb6695394e50c0ea8e3698660983a78ca4d777', '5ecedbffdd421', 2, 'jonhy@gmail.com', '2020-05-27', NULL, NULL, '0', NULL, ''),
(59, 'Jonathan Uriel ', 'Gaitan Perez', '5545678391', 'jonhgp@gmail.com', '8b6455f5fca795fe508a66e9de5114b6e8d41d9347034806950dfb24793f9d56', '5ecedff92c826', 2, 'jonhgp@gmail.com', '2020-05-27', NULL, NULL, '0', NULL, '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `T_USERCC`
--
ALTER TABLE `T_USERCC`
  ADD PRIMARY KEY (`usercc_id`),
  ADD KEY `fk_user` (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `T_USERCC`
--
ALTER TABLE `T_USERCC`
  MODIFY `usercc_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
