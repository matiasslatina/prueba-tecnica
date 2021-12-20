-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-12-2021 a las 18:25:16
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prueba_tecnica`
--
CREATE DATABASE IF NOT EXISTS `prueba_tecnica` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `prueba_tecnica`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL DEFAULT '0',
  `username` varchar(50) NOT NULL DEFAULT '0',
  `pass` varchar(50) NOT NULL DEFAULT '0',
  `passKey` varchar(250) DEFAULT '0',
  `delete` int(1) NOT NULL DEFAULT 0,
  `register_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `pass`, `passKey`, `delete`, `register_date`) VALUES
(1, 'Admin', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', NULL, 0, '2021-12-18'),
(2, 'Matias Latina', 'matiasslatina@gmail.comn', 'a87ff679a2f3e71d9181a67b7542122c', NULL, 0, '2021-12-18'),
(3, 'Matias', 'matiasslatina@hotmail.com', 'e10adc3949ba59abbe56e057f20f883e', '01709625e8b7d05fa58c5a1cad4a4a68', 0, '2021-12-18'),
(4, 'Gimena', 'gimenita@g.m', 'e10adc3949ba59abbe56e057f20f883e', NULL, 0, '2021-12-18'),
(5, 'Juan', 'admin2@admin.com', '202cb962ac59075b964b07152d234b70', NULL, 0, '2021-12-18'),
(6, 'Romina', 'romi@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', NULL, 0, '2021-12-18'),
(7, 'Carlos', 'carlos@gmail.com', '900150983cd24fb0d6963f7d28e17f72', NULL, 0, '2021-12-18'),
(8, 'Matute morales', 'mati@hotmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, 0, '2021-12-18'),
(9, 'Matias', 'matiasslatina@gmail.com', '202cb962ac59075b964b07152d234b70', NULL, 0, '2021-12-18'),
(10, 'prueba', 'prueba@p.com', '202cb962ac59075b964b07152d234b70', NULL, 1, '2021-12-19');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
