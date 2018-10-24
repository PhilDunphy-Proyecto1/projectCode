CREATE DATABASE IF NOT EXISTS `db_rec_emp`;
USE `db_rec_emp`;

CREATE TABLE `tbl_empleado` (
  `Empleado_ID` int(11) NOT NULL,
  `Empleado_Nombre` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Empleado_Apellido` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `tbl_empleado` (`Empleado_ID`, `Empleado_Nombre`, `Empleado_Apellido`) VALUES
(1, 'usuario1', 'unknown'),
(2, 'usuario2', 'unknown'),
(3, 'usuario3', 'unknown');

CREATE TABLE `tbl_recurso` (
  `Recurso_ID` int(11) NOT NULL,
  `Recurso_Nombre` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Recurso_Tipo` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `tbl_recurso` (`Recurso_ID`, `Recurso_Nombre`, `Recurso_Tipo`) VALUES
(1, 'Sala Multidisciplinar 1', 'sala'),
(2, 'Sala Multidisciplinar 2', 'sala'),
(3, 'Sala Multidisciplinar 3', 'sala'),
(4, 'Sala Multidisciplinar 4', 'sala'),
(5, 'Sala de informática 1', 'sala'),
(6, 'Sala de informática 2', 'sala'),
(7, 'Taller de cocina', 'sala'),
(8, 'Despacho de entrevistas 1', 'sala'),
(9, 'Despacho de entrevistas 2', 'sala'),
(10, 'Sala de actos 1', 'sala'),
(11, 'Sala de reuniones', 'sala'),
(12, 'Proyector portátil 1', 'material'),
(13, 'Proyector portátil 2', 'material'),
(14, 'Ordenador portátil 1', 'material'),
(15, 'Ordenador portátil 2', 'material'),
(16, 'Ordenador portátil 3', 'material');

CREATE TABLE `tbl_reserva` (
  `Reserva_ID` int(11) NOT NULL,
  `Reserva_FechaRec` date DEFAULT NULL,
  `Reserva_HoraRec` time DEFAULT NULL,
  `Reserva_Estado` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

ALTER TABLE `tbl_empleado`
  ADD PRIMARY KEY (`Empleado_ID`);

ALTER TABLE `tbl_recurso`
  ADD PRIMARY KEY (`Recurso_ID`);

ALTER TABLE `tbl_reserva`
  ADD PRIMARY KEY (`Reserva_ID`);

ALTER TABLE `tbl_empleado`
  MODIFY `Empleado_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `tbl_recurso`
  MODIFY `Recurso_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

ALTER TABLE `tbl_reserva`
  MODIFY `Reserva_ID` int(11) NOT NULL AUTO_INCREMENT;

COMMIT;
