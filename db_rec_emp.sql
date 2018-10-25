CREATE DATABASE IF NOT EXISTS `db_rec_emp`;
USE `db_rec_emp`;

CREATE TABLE `tbl_empleado` (
  `Empleado_ID` int(11) NOT NULL,
  `Empleado_Nombre` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Empleado_Apellido` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `tbl_empleado` (`Empleado_ID`, `Empleado_Nombre`, `Empleado_Apellido`) VALUES
(1, 'usuario1', 'surname1'),
(2, 'usuario2', 'surname2'),
(3, 'usuario3', 'surname3');

CREATE TABLE `tbl_incidencia` (
  `Incidencia_ID` int(11) NOT NULL,
  `Incidencia_Titulo` varchar(50) NOT NULL,
  `Incidencia_Descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `tbl_recurso` (
  `Recurso_ID` int(11) NOT NULL,
  `Recurso_Nombre` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Recurso_Tipo` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Incidencia_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `tbl_recurso` (`Recurso_ID`, `Recurso_Nombre`, `Recurso_Tipo`, `Incidencia_ID`) VALUES
(1, 'Sala Multidisciplinar 1', 'sala', NULL),
(2, 'Sala Multidisciplinar 2', 'sala', NULL),
(3, 'Sala Multidisciplinar 3', 'sala', NULL),
(4, 'Sala Multidisciplinar 4', 'sala', NULL),
(5, 'Sala de informática 1', 'sala', NULL),
(6, 'Sala de informática 2', 'sala', NULL),
(7, 'Taller de cocina', 'sala', NULL),
(8, 'Despacho de entrevistas 1', 'sala', NULL),
(9, 'Despacho de entrevistas 2', 'sala', NULL),
(10, 'Sala de actos 1', 'sala', NULL),
(11, 'Sala de reuniones', 'sala', NULL),
(12, 'Proyector portátil 1', 'material', NULL),
(13, 'Proyector portátil 2', 'material', NULL),
(14, 'Ordenador portátil 1', 'material', NULL),
(15, 'Ordenador portátil 2', 'material', NULL),
(16, 'Ordenador portátil 3', 'material', NULL);

CREATE TABLE `tbl_reserva` (
  `Reserva_ID` int(11) NOT NULL,
  `Reserva_FechaRec` date DEFAULT NULL,
  `Reserva_HoraRec` time DEFAULT NULL,
  `Reserva_Estado` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Reserva_HoraDev` time DEFAULT NULL,
  `Reserva_FechaDev` date DEFAULT NULL,
  `Empleado_ID` int(11) DEFAULT NULL,
  `Recurso_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

ALTER TABLE `tbl_empleado`
  ADD PRIMARY KEY (`Empleado_ID`);

ALTER TABLE `tbl_incidencia`
  ADD PRIMARY KEY (`Incidencia_ID`);

ALTER TABLE `tbl_recurso`
  ADD PRIMARY KEY (`Recurso_ID`),
  ADD KEY `fk_recurso_incidencia` (`Incidencia_ID`);

ALTER TABLE `tbl_reserva`
  ADD PRIMARY KEY (`Reserva_ID`),
  ADD KEY `fk_reserva_empleado` (`Empleado_ID`),
  ADD KEY `fk_reserva_recurso` (`Recurso_ID`);

ALTER TABLE `tbl_empleado`
  MODIFY `Empleado_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `tbl_incidencia`
  MODIFY `Incidencia_ID` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `tbl_recurso`
  MODIFY `Recurso_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

ALTER TABLE `tbl_reserva`
  MODIFY `Reserva_ID` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `tbl_recurso`
  ADD CONSTRAINT `fk_recurso_incidencia` FOREIGN KEY (`Incidencia_ID`) REFERENCES `tbl_incidencia` (`Incidencia_ID`);

ALTER TABLE `tbl_reserva`
  ADD CONSTRAINT `fk_reserva_empleado` FOREIGN KEY (`Empleado_ID`) REFERENCES `tbl_empleado` (`Empleado_ID`),
  ADD CONSTRAINT `fk_reserva_recurso` FOREIGN KEY (`Recurso_ID`) REFERENCES `tbl_recurso` (`Recurso_ID`);
