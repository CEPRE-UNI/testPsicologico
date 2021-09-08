-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-09-2021 a las 06:38:56
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area`
--

CREATE TABLE `area` (
  `id` int(11) NOT NULL,
  `nombre` char(50) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_corto` char(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `area`
--

INSERT INTO `area` (`id`, `nombre`, `nombre_corto`) VALUES
(1, 'Realsita', 'R'),
(2, 'Investigador', 'I'),
(3, 'Artístico', 'A'),
(4, 'Social', 'S'),
(5, 'Emprendedor', 'E'),
(6, 'Convencional', 'C');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_test_alumnos`
--

CREATE TABLE `detalle_test_alumnos` (
  `code` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `id_test_pregunta` int(11) NOT NULL,
  `respuesta` tinyint(1) NOT NULL,
  `fecha_alta` timestamp NOT NULL DEFAULT current_timestamp(),
  `fecha_edit` timestamp NOT NULL DEFAULT current_timestamp(),
  `intentos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `test_preguntas`
--

CREATE TABLE `test_preguntas` (
  `id` int(11) NOT NULL,
  `pregunta` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `id_area` int(11) NOT NULL,
  `id_tipo` int(11) NOT NULL,
  `fecha_alta` timestamp NOT NULL DEFAULT current_timestamp(),
  `fecha_edit` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `test_preguntas`
--

INSERT INTO `test_preguntas` (`id`, `pregunta`, `id_area`, `id_tipo`, `fecha_alta`, `fecha_edit`) VALUES
(1, 'Arreglar artefactos eléctricos. ', 1, 1, '2021-09-04 02:34:40', '2021-09-04 02:34:40'),
(2, 'Reparar autos. ', 1, 1, '2021-09-04 02:34:40', '2021-09-04 02:34:40'),
(3, 'Arreglar artefactos mecánicos. . ', 1, 1, '2021-09-04 02:34:40', '2021-09-04 02:34:40'),
(4, 'Construir con madera. ', 1, 1, '2021-09-04 02:34:40', '2021-09-04 02:34:40'),
(5, 'Manejar un camión o tractor. ', 1, 1, '2021-09-04 02:34:40', '2021-09-04 02:34:40'),
(6, 'Usar herramientas.', 1, 1, '2021-09-04 02:34:40', '2021-09-04 02:34:40'),
(7, 'Trabajar con motos.', 1, 1, '2021-09-04 02:34:40', '2021-09-04 02:34:40'),
(8, 'Llevar cursos de manualidades.', 1, 1, '2021-09-04 02:34:40', '2021-09-04 02:34:40'),
(9, 'Llevar cursos de dibujo mecánico.', 1, 1, '2021-09-04 02:34:40', '2021-09-04 02:34:40'),
(10, 'Llevar cursos de carpintería o ebanistería.', 1, 1, '2021-09-04 02:34:40', '2021-09-04 02:34:40'),
(11, 'Llevar cursos de mecánica automotriz.', 1, 1, '2021-09-04 02:34:40', '2021-09-04 02:34:40'),
(12, 'Leer libros o revistas científicas. ', 2, 1, '2021-09-04 15:42:15', '2021-09-04 15:42:15'),
(13, 'Leer Trabajar en un laboratorio. ', 2, 1, '2021-09-04 15:46:47', '2021-09-04 15:46:47'),
(14, 'Trabajar en un proyecto científico.', 2, 1, '2021-09-04 15:46:47', '2021-09-04 15:46:47'),
(15, 'Construir o armar modelos de cohetes.', 2, 1, '2021-09-04 15:46:47', '2021-09-04 15:46:47'),
(16, 'Experimentar con un equipo de química.', 2, 1, '2021-09-04 15:46:47', '2021-09-04 15:46:47'),
(17, 'Leer sobre temas que me interesen. ', 2, 1, '2021-09-04 15:46:47', '2021-09-04 15:46:47'),
(18, 'Resolver juegos matemáticos o de ajedrez.', 2, 1, '2021-09-04 15:46:47', '2021-09-04 15:46:47'),
(19, 'Llevar cursos de física.', 2, 1, '2021-09-04 15:46:47', '2021-09-04 15:46:47'),
(20, 'Llevar cursos de química.', 2, 1, '2021-09-04 15:46:47', '2021-09-04 15:46:47'),
(21, 'Llevar cursos de geometría. ', 2, 1, '2021-09-04 15:46:47', '2021-09-04 15:46:47'),
(22, 'Llevar cursos de biología.', 2, 1, '2021-09-04 15:46:47', '2021-09-04 15:46:47'),
(23, 'Diseñar, dibujar o pintar.', 3, 1, '2021-09-04 21:51:06', '2021-09-04 21:51:06'),
(24, 'Asistir a representaciones teatrales.', 3, 1, '2021-09-04 21:55:29', '2021-09-04 21:55:29'),
(25, 'Diseñar muebles o edificios.', 3, 1, '2021-09-04 21:55:29', '2021-09-04 21:55:29'),
(26, 'Tocar en una banda grupo u orquesta.', 3, 1, '2021-09-04 21:55:29', '2021-09-04 21:55:29'),
(27, 'Tocar un instrumento musical.', 3, 1, '2021-09-04 21:55:29', '2021-09-04 21:55:29'),
(28, 'Asistir a recitales, conciertos o musicales.', 3, 1, '2021-09-04 21:55:29', '2021-09-04 21:55:29'),
(29, 'Leer libros de ciencia ficción.', 3, 1, '2021-09-04 21:55:29', '2021-09-04 21:55:29'),
(30, 'Hacer o diseñar retratos o fotografía.', 3, 1, '2021-09-04 21:55:29', '2021-09-04 21:55:29'),
(31, 'Leer obras teatrales. ', 3, 1, '2021-09-04 21:55:29', '2021-09-04 21:55:29'),
(32, 'Leer o escribir poesía. ', 3, 1, '2021-09-04 21:55:29', '2021-09-04 21:55:29'),
(33, 'Llevar cursos de arte. ', 3, 1, '2021-09-04 21:55:29', '2021-09-04 21:55:29');

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
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`id`, `nombre`, `nombre_corto`) VALUES
(1, 'Actividad', 'Act'),
(2, 'Capacidad', 'Cap'),
(3, 'Ocupaciones', 'Ocu');

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
-- Indices de la tabla `detalle_test_alumnos`
--
ALTER TABLE `detalle_test_alumnos`
  ADD PRIMARY KEY (`code`);

--
-- Indices de la tabla `test_preguntas`
--
ALTER TABLE `test_preguntas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_area` (`id_area`),
  ADD KEY `fk_id_tipo` (`id_tipo`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `area`
--
ALTER TABLE `area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `detalle_test_alumnos`
--
ALTER TABLE `detalle_test_alumnos`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `test_preguntas`
--
ALTER TABLE `test_preguntas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `tipo`
--
ALTER TABLE `tipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `test_preguntas`
--
ALTER TABLE `test_preguntas`
  ADD CONSTRAINT `fk_id_area` FOREIGN KEY (`id_area`) REFERENCES `area` (`id`),
  ADD CONSTRAINT `fk_id_tipo` FOREIGN KEY (`id_tipo`) REFERENCES `tipo` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
