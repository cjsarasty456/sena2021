-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-08-2021 a las 17:19:59
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
-- Base de datos: `logintest`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulo`
--

CREATE TABLE `modulo` (
  `idModulo` int(11) NOT NULL,
  `nombreModulo` varchar(50) NOT NULL,
  `eliminado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `modulo`
--

INSERT INTO `modulo` (`idModulo`, `nombreModulo`, `eliminado`) VALUES
(1, 'Configuración', 0),
(3, 'sdfsdfsd', 1),
(4, 'Inicio', 0),
(5, 'Estudiante', 1),
(6, 'Profesor', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagina`
--

CREATE TABLE `pagina` (
  `idPagina` int(11) NOT NULL,
  `idModulo` int(11) NOT NULL,
  `nombrePagina` varchar(30) NOT NULL,
  `url` varchar(100) NOT NULL,
  `eliminado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pagina`
--

INSERT INTO `pagina` (`idPagina`, `idModulo`, `nombrePagina`, `url`, `eliminado`) VALUES
(2, 1, 'Perfil', '', 0),
(3, 1, 'Rol', '', 0),
(4, 1, 'Modulos', '', 0),
(5, 4, 'Pagina Inicial', '', 0),
(6, 4, 'Acerca de', '', 0),
(7, 6, 'inicio', '', 0),
(8, 6, 'Acerca de', '', 0),
(9, 6, 'Listar Profesor', '', 0),
(10, 6, 'Nuevo Profesor', '', 0),
(11, 1, 'detalles Rol', '', 0),
(12, 1, 'Nuevo Rol', '', 0),
(13, 1, 'Nuevo Modulo', '', 0),
(14, 1, 'detalle Modulo', '', 0),
(15, 1, 'Listar Modulo', '', 0),
(16, 1, 'Listar Roles', '', 0),
(17, 1, 'Nueva Página', '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso`
--

CREATE TABLE `permiso` (
  `idRol` int(11) NOT NULL,
  `idModulo` int(11) NOT NULL,
  `idPagina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `permiso`
--

INSERT INTO `permiso` (`idRol`, `idModulo`, `idPagina`) VALUES
(1, 4, 5),
(1, 4, 6),
(1, 1, 11),
(1, 1, 16),
(1, 1, 2),
(1, 1, 3),
(1, 1, 4),
(1, 1, 12),
(1, 1, 13),
(1, 1, 14),
(1, 1, 15),
(1, 1, 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recuperacioncontrasena`
--

CREATE TABLE `recuperacioncontrasena` (
  `idRecuperacion` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `codigoRecuperacion` char(36) NOT NULL,
  `habilitado` int(11) NOT NULL,
  `fechaRecuperacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `recuperacioncontrasena`
--

INSERT INTO `recuperacioncontrasena` (`idRecuperacion`, `email`, `codigoRecuperacion`, `habilitado`, `fechaRecuperacion`) VALUES
(14, 'admin@gmail.com', 'e106ecc0-9c28-4c4f-89d8-fa9f57428adc', 1, '2021-06-15 10:34:04'),
(15, 'admin@gmail.com', '99a4ad3b-8c81-43ea-a00a-54b11b63e21f', 1, '2021-06-15 10:42:01'),
(16, 'admin@gmail.com', '9492304f-4582-47ee-95b0-69ef2fc2d735', 1, '2021-06-15 10:42:43'),
(17, 'admin@gmail.com', 'b17e9f93-d4d6-43b4-bb82-33073d223704', 1, '2021-06-15 10:47:42'),
(18, 'cjsarasty@gmail.com', 'da68c9ba-eb75-45a0-a685-9c4168fc428e', 1, '2021-06-15 11:19:58'),
(19, 'cjsarasty@gmail.com', 'fb8c48ff-9d42-4220-919a-885eb4bd72e1', 1, '2021-06-15 13:55:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idRol` int(11) NOT NULL,
  `nombreRol` varchar(30) NOT NULL,
  `eliminado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idRol`, `nombreRol`, `eliminado`) VALUES
(1, 'Administrador', 0),
(3, 'sadasdas', 0),
(4, 'General', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUser` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `correoElectronico` varchar(100) NOT NULL,
  `contrasena` char(35) NOT NULL,
  `resetContrasena` tinyint(1) NOT NULL,
  `idRol` int(11) DEFAULT NULL,
  `eliminado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUser`, `nombre`, `correoElectronico`, `contrasena`, `resetContrasena`, `idRol`, `eliminado`) VALUES
(1, 'administrador', 'admin@gmail.com', '25f9e794323b453885f5181f1b624d0b', 0, 1, 0),
(3, 'carlos', 'cjsarasty@gmail.com', 'ec1a938636e8b49dca339e2e11cdd6ce', 1, NULL, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `modulo`
--
ALTER TABLE `modulo`
  ADD PRIMARY KEY (`idModulo`);

--
-- Indices de la tabla `pagina`
--
ALTER TABLE `pagina`
  ADD PRIMARY KEY (`idPagina`),
  ADD KEY `idModulo` (`idModulo`);

--
-- Indices de la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD KEY `idModulo` (`idModulo`),
  ADD KEY `idPagina` (`idPagina`),
  ADD KEY `idRol` (`idRol`);

--
-- Indices de la tabla `recuperacioncontrasena`
--
ALTER TABLE `recuperacioncontrasena`
  ADD PRIMARY KEY (`idRecuperacion`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idRol`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUser`),
  ADD KEY `idRol` (`idRol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `modulo`
--
ALTER TABLE `modulo`
  MODIFY `idModulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `pagina`
--
ALTER TABLE `pagina`
  MODIFY `idPagina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `recuperacioncontrasena`
--
ALTER TABLE `recuperacioncontrasena`
  MODIFY `idRecuperacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pagina`
--
ALTER TABLE `pagina`
  ADD CONSTRAINT `pagina_ibfk_1` FOREIGN KEY (`idModulo`) REFERENCES `modulo` (`idModulo`);

--
-- Filtros para la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD CONSTRAINT `permiso_ibfk_2` FOREIGN KEY (`idPagina`) REFERENCES `pagina` (`idPagina`),
  ADD CONSTRAINT `permiso_ibfk_3` FOREIGN KEY (`idRol`) REFERENCES `rol` (`idRol`),
  ADD CONSTRAINT `permiso_ibfk_4` FOREIGN KEY (`idModulo`) REFERENCES `modulo` (`idModulo`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`idRol`) REFERENCES `rol` (`idRol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
