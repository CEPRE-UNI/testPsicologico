-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-09-2021 a las 19:53:02
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `testpsicologia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `id` int(11) NOT NULL,
  `dni` int(8) NOT NULL,
  `nombres` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_nac` date NOT NULL,
  `sexo` tinyint(1) NOT NULL,
  `grado` char(50) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_alta` timestamp NOT NULL DEFAULT current_timestamp(),
  `fecha_edit` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`id`, `dni`, `nombres`, `apellidos`, `fecha_nac`, `sexo`, `grado`, `fecha_alta`, `fecha_edit`) VALUES
(25, 11111111, '1111111', '111', '2000-06-24', 0, '111', '2021-09-03 04:53:09', '2021-09-03 04:53:09'),
(26, 22222222, '222', '22', '2000-06-24', 0, '222', '2021-09-03 04:55:09', '2021-09-03 04:55:09'),
(27, 33333333, '333', '333', '2000-06-24', 0, '33', '2021-09-03 04:55:39', '2021-09-03 04:55:39'),
(28, 44444444, '44444444444444', '444', '2000-06-24', 0, '444', '2021-09-03 04:58:48', '2021-09-03 04:58:48'),
(29, 55555555, '55', '55', '2000-06-24', 0, '55', '2021-09-03 05:00:47', '2021-09-03 05:00:47'),
(30, 66666666, '666', '666', '2000-06-24', 0, '666', '2021-09-03 05:06:36', '2021-09-03 05:06:36'),
(31, 77777777, '7777', '77777', '2000-06-24', 0, '7777', '2021-09-03 05:07:00', '2021-09-03 05:07:00'),
(32, 0, '00', '000', '2000-06-24', 0, '000', '2021-09-03 15:52:05', '2021-09-03 15:52:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area`
--

CREATE TABLE `area` (
  `id` int(11) NOT NULL,
  `nombre` char(50) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_corto` char(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `test_preguntas`
--

CREATE TABLE `test_preguntas` (
  `id` int(11) NOT NULL,
  `pregunta` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `id_area` int(11) NOT NULL,
  `id_tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE `tipo` (
  `id` int(11) NOT NULL,
  `nombre` char(50) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_corto` char(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `test_preguntas`
--
ALTER TABLE `test_preguntas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumno`
--
ALTER TABLE `alumno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `area`
--
ALTER TABLE `area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `test_preguntas`
--
ALTER TABLE `test_preguntas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo`
--
ALTER TABLE `tipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
