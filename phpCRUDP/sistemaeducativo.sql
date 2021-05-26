-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-05-2021 a las 15:38:15
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistemaeducativo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `id` int(11) NOT NULL,
  `curso` varchar(30) NOT NULL,
  `idProfesor` int(11) NOT NULL,
  `fechaInicio` date NOT NULL,
  `fechaFin` date NOT NULL,
  `eliminado` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id`, `curso`, `idProfesor`, `fechaInicio`, `fechaFin`, `eliminado`) VALUES
(1, 'ADSI', 1, '2021-03-08', '2021-10-07', b'0'),
(3, 'matematicas', 7, '2021-05-04', '2021-05-31', b'0'),
(4, 'Farmaco', 3, '2021-05-06', '2022-03-15', b'0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `id` int(11) NOT NULL,
  `tipoDocumento` char(2) NOT NULL,
  `documentoIdentidad` varchar(15) NOT NULL,
  `nombres` varchar(30) NOT NULL,
  `apellidos` varchar(30) NOT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `telefono` varchar(30) NOT NULL,
  `eliminado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`id`, `tipoDocumento`, `documentoIdentidad`, `nombres`, `apellidos`, `direccion`, `telefono`, `eliminado`) VALUES
(3, 'CC', '4444', 'PEPITO', 'PEREZ', NULL, '4232423', 0),
(4, 'TI', '1018431', 'MARTA', 'LAGUNA', NULL, '1235688', 0),
(5, 'CC', '454654745', 'Maria', 'Concepción', NULL, '43443344', 0),
(9, 'RC', '54113456', 'ANA', 'CADENA', 'TAMPOCO', '3214084743', 0),
(10, 'CC', '32211', 'CARLITOS', 'PEREZ', 'DDD', '3423423', 0),
(11, 'CC', '5554466', 'HARLEY', 'DAVINSON', NULL, '875246', 0),
(12, 'CC', '5953712', 'caliche', 'perez', 'calle X # Y - Z', '55534', 0),
(13, 'CC', '10005555', 'Jimena', 'Olaya', 'calle x # y - Z', '55555', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matricula`
--

CREATE TABLE `matricula` (
  `id` int(11) NOT NULL,
  `idCurso` int(11) NOT NULL,
  `idEstudiante` int(11) NOT NULL,
  `NotaFinal` int(11) NOT NULL,
  `Observaciones` int(11) NOT NULL,
  `eliminado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `matricula`
--

INSERT INTO `matricula` (`id`, `idCurso`, `idEstudiante`, `NotaFinal`, `Observaciones`, `eliminado`) VALUES
(1, 1, 3, 0, 0, 0),
(2, 1, 4, 0, 0, 0),
(3, 1, 5, 0, 0, 0),
(4, 1, 9, 0, 0, 0),
(5, 1, 10, 0, 0, 0),
(6, 3, 3, 0, 0, 0),
(7, 3, 4, 0, 0, 0),
(8, 3, 5, 0, 0, 0),
(9, 3, 9, 0, 0, 0),
(10, 3, 10, 0, 0, 0),
(11, 1, 11, 0, 0, 0),
(12, 1, 12, 0, 0, 0),
(13, 1, 13, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `id` int(11) NOT NULL,
  `idMatricula` int(11) NOT NULL,
  `nota1` float NOT NULL,
  `nota2` float NOT NULL,
  `nota3` float NOT NULL,
  `eliminado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`id`, `idMatricula`, `nota1`, `nota2`, `nota3`, `eliminado`) VALUES
(5, 4, 3, 2, 4, NULL),
(6, 1, 4, 2, 5, 0),
(7, 2, 5, 5, 5, 0),
(8, 5, 5, 4, 0.99, 0),
(9, 6, 5, 1, 4.88, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE `profesores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `eliminado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`id`, `nombre`, `apellido`, `direccion`, `telefono`, `eliminado`) VALUES
(1, 'Carlos Julio', 'Cadena Sarasty', 'calle X # Y # Z', '325465', 0),
(2, 'CARLOS JULIO', 'CADENA SARASTY', 'calle X # Y # Z', '325465', 0),
(3, 'HECTOR', 'GONZALES', 'calle X # Y # Z', '325465', 0),
(4, 'MARIA DEL CARMEN', 'AGUDELO', 'calle X # Y # Z', '325465', 0),
(5, 'MARIA', 'CONCEPCIÓN', 'calle X # Y # Z', '325465', 0),
(6, 'PEDRO', 'LOPEZ', 'calle X # Y # Z', '325465', 0),
(7, 'caliche', 'cadena', 'sss123', '1234aaa', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cursoProfesor` (`idProfesor`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unicoidentificacion` (`documentoIdentidad`);

--
-- Indices de la tabla `matricula`
--
ALTER TABLE `matricula`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cursoMatricula` (`idCurso`),
  ADD KEY `estudianteMatricula` (`idEstudiante`);

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notaMatricula` (`idMatricula`);

--
-- Indices de la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `matricula`
--
ALTER TABLE `matricula`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `notas`
--
ALTER TABLE `notas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `profesores`
--
ALTER TABLE `profesores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD CONSTRAINT `cursoProfesor` FOREIGN KEY (`idProfesor`) REFERENCES `profesores` (`id`);

--
-- Filtros para la tabla `matricula`
--
ALTER TABLE `matricula`
  ADD CONSTRAINT `cursoMatricula` FOREIGN KEY (`idCurso`) REFERENCES `cursos` (`id`),
  ADD CONSTRAINT `estudianteMatricula` FOREIGN KEY (`idEstudiante`) REFERENCES `estudiante` (`id`);

--
-- Filtros para la tabla `notas`
--
ALTER TABLE `notas`
  ADD CONSTRAINT `notaMatricula` FOREIGN KEY (`idMatricula`) REFERENCES `matricula` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
