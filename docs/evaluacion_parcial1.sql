-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 02-03-2024 a las 00:47:04
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `evaluacion_parcial1`
--
CREATE DATABASE IF NOT EXISTS `evaluacion_parcial1` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `evaluacion_parcial1`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `ID_CURSO` int(11) NOT NULL,
  `NOMBRE_CURSO` varchar(50) NOT NULL,
  `CREDITOS` int(11) NOT NULL,
  `PROFESOR` varchar(100) NOT NULL,
  `HORARIO` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`ID_CURSO`, `NOMBRE_CURSO`, `CREDITOS`, `PROFESOR`, `HORARIO`) VALUES
(1, 'Aplicaciones Distribuidas', 30, 'Ing. Luis Llerena', '2024-03-01 18:30:00'),
(2, 'Investigacion de Operaciones', 25, 'Ing. Luis Molina', '2024-03-02 18:30:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `ID_ESTUDIANTE` int(11) NOT NULL,
  `NOMBRE` varchar(100) NOT NULL,
  `EDAD` varchar(5) NOT NULL,
  `CARRERA` varchar(50) NOT NULL,
  `PROMEDIO` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`ID_ESTUDIANTE`, `NOMBRE`, `EDAD`, `CARRERA`, `PROMEDIO`) VALUES
(1, 'Juan Pérez', '22', 'Software', '10'),
(2, 'Pedro Garcia', '21', 'Software', '8'),
(3, 'Ismael Yepez', '23', 'Software', '9');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscrito_en`
--

CREATE TABLE `inscrito_en` (
  `id_inscrito` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `id_estudiante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `inscrito_en`
--

INSERT INTO `inscrito_en` (`id_inscrito`, `id_curso`, `id_estudiante`) VALUES
(1, 1, 1),
(2, 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `rol_id` int(11) NOT NULL,
  `nombre_rol` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`rol_id`, `nombre_rol`) VALUES
(1, 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario_id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `rol` int(11) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario_id`, `nombre`, `usuario`, `clave`, `rol`, `estado`) VALUES
(1, 'Matías Mosquera', 'admin', '$2y$10$xtHrt8xU6q2gfIs32ZOlou313YkpHxRtHncR4v5.MDalDHqxdhdaO', 1, 1),
(2, 'Andres Sanchez', 'andres1', '$2y$10$O73Y2UWl3EmB1R.ypipNUeBBeLlMotril2hVY5zXVxE0ILnWAaD.O', 1, 1),
(3, 'Marcelo Baez', 'marcelo1', '$2y$10$to4og1mmEZH0tVIspXycP.0oGINic3vmnRQn7aEUjjR.QUUWaUxVC', 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`ID_CURSO`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`ID_ESTUDIANTE`);

--
-- Indices de la tabla `inscrito_en`
--
ALTER TABLE `inscrito_en`
  ADD PRIMARY KEY (`id_inscrito`),
  ADD KEY `inscrito_id_curso` (`id_curso`),
  ADD KEY `inscrito_id_estudiante` (`id_estudiante`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`rol_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `ID_CURSO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  MODIFY `ID_ESTUDIANTE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `inscrito_en`
--
ALTER TABLE `inscrito_en`
  MODIFY `id_inscrito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `rol_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `inscrito_en`
--
ALTER TABLE `inscrito_en`
  ADD CONSTRAINT `inscrito_id_curso` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`ID_CURSO`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inscrito_id_estudiante` FOREIGN KEY (`id_estudiante`) REFERENCES `estudiante` (`ID_ESTUDIANTE`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
