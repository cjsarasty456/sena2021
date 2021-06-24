-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-06-2021 a las 01:34:55
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `login`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagina`
--

CREATE TABLE `pagina` (
  `idPagina` int(11) NOT NULL,
  `idModulo` int(11) NOT NULL,
  `nombrePagina` varchar(30) NOT NULL,
  `url` varchar(100) NOT NULL,
  `eliminado` tinyint(1) NOT NULL,
  `menu` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pagina`
--

INSERT INTO `pagina` (`idPagina`, `idModulo`, `nombrePagina`, `url`, `eliminado`, `menu`) VALUES
(2, 1, 'Perfil', '', 0, 1),
(3, 1, 'Rol', '', 0, 0),
(4, 1, 'Modulos', '', 0, 0),
(5, 4, 'Pagina Inicial', '', 0, 1),
(6, 4, 'Acerca de', '', 0, 1),
(7, 6, 'inicio', '', 0, 0),
(8, 6, 'Acerca de', '', 0, 1),
(9, 6, 'Listar Profesor', '', 0, 0),
(10, 6, 'Nuevo Profesor', '', 0, 0),
(11, 1, 'detalles Rol', '', 0, 0),
(12, 1, 'Nuevo Rol', '', 0, 0),
(13, 1, 'Nuevo Modulo', '', 0, 0),
(14, 1, 'detalle Modulo', '', 0, 0),
(15, 1, 'Listar Modulo', '', 0, 1),
(16, 1, 'Listar Roles', '', 0, 1),
(17, 1, 'Nueva Página', '', 0, 0),
(18, 1, 'editar Página', 'user/editarPagina.php', 0, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pagina`
--
ALTER TABLE `pagina`
  ADD PRIMARY KEY (`idPagina`),
  ADD KEY `idModulo` (`idModulo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pagina`
--
ALTER TABLE `pagina`
  MODIFY `idPagina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pagina`
--
ALTER TABLE `pagina`
  ADD CONSTRAINT `pagina_ibfk_1` FOREIGN KEY (`idModulo`) REFERENCES `modulo` (`idModulo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
