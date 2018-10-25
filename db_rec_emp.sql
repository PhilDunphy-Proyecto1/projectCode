-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-10-2018 a las 18:35:55
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_rec_emp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_empleado`
--

CREATE TABLE `tbl_empleado` (
  `Empleado_ID` int(11) NOT NULL,
  `Empleado_Nombre` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Empleado_Apellido` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Empleado_UserName` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Empleado_Password` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Empleado_LevelAccess` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_empleado`
--

INSERT INTO `tbl_empleado` (`Empleado_ID`, `Empleado_Nombre`, `Empleado_Apellido`, `Empleado_UserName`, `Empleado_Password`, `Empleado_LevelAccess`) VALUES
(1, 'usuario1', 'surname1', 'user1', '1234', 'user'),
(2, 'usuario2', 'surname2', 'user2', '1234', 'user'),
(3, 'usuario3', 'surname3', 'user3', '1234', 'user'),
(4, 'Erix', 'Mamani Villacresis', 'erixmv', '1234', 'admin'),
(5, 'Alejandro', 'Reñones Farré', 'alejandrorf', '1234', 'admin'),
(6, 'Joel', 'Moreno Hidalgo', 'joelmh', '1234', 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_incidencia`
--

CREATE TABLE `tbl_incidencia` (
  `Incidencia_ID` int(11) NOT NULL,
  `Incidencia_Titulo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Incidencia_Descripcion` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_recurso`
--

CREATE TABLE `tbl_recurso` (
  `Recurso_ID` int(11) NOT NULL,
  `Recurso_Nombre` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Recurso_Tipo` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Recurso_Estado` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_recurso`
--

INSERT INTO `tbl_recurso` (`Recurso_ID`, `Recurso_Nombre`, `Recurso_Tipo`, `Recurso_Estado`) VALUES
(1, 'Sala Multidisciplinar 1', 'Sala', 'Disponible'),
(2, 'Sala Multidisciplinar 2', 'Sala', 'Disponible'),
(3, 'Sala Multidisciplinar 3', 'Sala', 'Disponible'),
(4, 'Sala Multidisciplinar 4', 'Sala', 'Disponible'),
(5, 'Sala de informática 1', 'Sala', 'Disponible'),
(6, 'Sala de informática 2', 'Sala', 'Disponible'),
(7, 'Taller de cocina', 'Sala', 'Disponible'),
(8, 'Despacho de entrevistas 1', 'Sala', 'Disponible'),
(9, 'Despacho de entrevistas 2', 'Sala', 'Disponible'),
(10, 'Sala de actos 1', 'Sala', 'Disponible'),
(11, 'Sala de reuniones', 'Sala', 'Disponible'),
(12, 'Proyector portátil 1', 'Material', 'Disponible'),
(13, 'Proyector portátil 2', 'Material', 'Disponible'),
(14, 'Ordenador portátil 1', 'Material', 'Disponible'),
(15, 'Ordenador portátil 2', 'Material', 'Disponible'),
(16, 'Ordenador portátil 3', 'Material', 'Disponible'),
(18, 'Teléfono móvil 1', 'Material', 'Disponible'),
(19, 'Teléfono móvil 1', 'Material', 'Disponible');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_reserva`
--

CREATE TABLE `tbl_reserva` (
  `Reserva_ID` int(11) NOT NULL,
  `Reserva_FechaRec` date DEFAULT NULL,
  `Reserva_HoraRec` time DEFAULT NULL,
  `Reserva_HoraDev` time DEFAULT NULL,
  `Reserva_FechaDev` date DEFAULT NULL,
  `Empleado_ID` int(11) DEFAULT NULL,
  `Recurso_ID` int(11) DEFAULT NULL,
  `Incidencia_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_empleado`
--
ALTER TABLE `tbl_empleado`
  ADD PRIMARY KEY (`Empleado_ID`);

--
-- Indices de la tabla `tbl_incidencia`
--
ALTER TABLE `tbl_incidencia`
  ADD PRIMARY KEY (`Incidencia_ID`);

--
-- Indices de la tabla `tbl_recurso`
--
ALTER TABLE `tbl_recurso`
  ADD PRIMARY KEY (`Recurso_ID`);

--
-- Indices de la tabla `tbl_reserva`
--
ALTER TABLE `tbl_reserva`
  ADD PRIMARY KEY (`Reserva_ID`),
  ADD KEY `fk_reserva_empleado` (`Empleado_ID`),
  ADD KEY `fk_reserva_recurso` (`Recurso_ID`),
  ADD KEY `fk_reserva_incidencia` (`Incidencia_ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_empleado`
--
ALTER TABLE `tbl_empleado`
  MODIFY `Empleado_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tbl_incidencia`
--
ALTER TABLE `tbl_incidencia`
  MODIFY `Incidencia_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_recurso`
--
ALTER TABLE `tbl_recurso`
  MODIFY `Recurso_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `tbl_reserva`
--
ALTER TABLE `tbl_reserva`
  MODIFY `Reserva_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_reserva`
--
ALTER TABLE `tbl_reserva`
  ADD CONSTRAINT `fk_reserva_empleado` FOREIGN KEY (`Empleado_ID`) REFERENCES `tbl_empleado` (`Empleado_ID`),
  ADD CONSTRAINT `fk_reserva_incidencia` FOREIGN KEY (`Incidencia_ID`) REFERENCES `tbl_incidencia` (`Incidencia_ID`),
  ADD CONSTRAINT `fk_reserva_recurso` FOREIGN KEY (`Recurso_ID`) REFERENCES `tbl_recurso` (`Recurso_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
