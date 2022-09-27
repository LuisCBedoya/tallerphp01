-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-09-2022 a las 06:10:19
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tallerphp01`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caso`
--

CREATE TABLE `caso` (
  `id` int(11) NOT NULL,
  `nombre_abogado` varchar(20) NOT NULL,
  `email_abogado` varchar(30) DEFAULT NULL,
  `id_cliente` int(11) NOT NULL,
  `tipo_caso` varchar(50) DEFAULT NULL,
  `inicio_caso` datetime DEFAULT NULL,
  `cierre_caso` date DEFAULT NULL,
  `precio_caso` float DEFAULT NULL,
  `numero_serie` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `caso`
--

INSERT INTO `caso` (`id`, `nombre_abogado`, `email_abogado`, `id_cliente`, `tipo_caso`, `inicio_caso`, `cierre_caso`, `precio_caso`, `numero_serie`) VALUES
(1, 'Lara', 'lacus.vestibulum@gmail.com', 3, 'familiar', '2000-01-21 10:00:00', '2014-01-20', 30, 2504),
(2, 'idalgo', 'lacus.vestibulum@gmail.com', 4, 'laboral', '2010-01-21 10:00:00', '2014-01-20', 30, 2505),
(3, 'gabriel', 'lacus.vestibulum@gmail.com', 4, 'acoso', '2001-01-21 10:00:00', '2014-01-20', 32, 2505),
(4, 'gabriel', 'lacus.vestibulum@gmail.com', 4, 'maltrato domestico', '2001-01-21 10:00:00', '2014-01-20', 32, 2505),
(5, 'gabriel', 'lacus.vestibulum@gmail.com', 4, 'familiar', '2001-01-21 10:00:00', '2014-01-20', 32, 2505);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `cedula` int(11) NOT NULL,
  `email` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `nombre`, `cedula`, `email`) VALUES
(1, 'Omar', 4000001, 'lectus.a.sollicitudin@protonmail.edu'),
(2, 'pedro', 5000001, '1ectus.a.sollicitudin@protonmail.edu'),
(3, 'juan', 6000001, 'dectus.a.sollicitudin@protonmail.edu'),
(4, 'mario', 7000001, 'dectus.a.sollicitudin@protonmail.edu'),
(5, 'laura', 8000001, 'dectus.a.sollicitudin@protonmail.edu'),
(6, 'Omar rios', 4000001, 'lectus.a.sollicitudin@protonmail.edu');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `caso`
--
ALTER TABLE `caso`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `caso`
--
ALTER TABLE `caso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `caso`
--
ALTER TABLE `caso`
  ADD CONSTRAINT `caso_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
