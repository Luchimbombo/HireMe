-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 09-12-2017 a las 19:22:09
-- Versión del servidor: 5.7.15-log
-- Versión de PHP: 5.6.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `basedatoshireme`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `rutAdmin` varchar(10) NOT NULL,
  `nombreAdmin` varchar(25) NOT NULL,
  `apellidoAdmin` varchar(25) NOT NULL,
  `passAdmin` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`rutAdmin`, `nombreAdmin`, `apellidoAdmin`, `passAdmin`) VALUES
('10100100-1', 'Luis', 'Tapia', '123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `IdCargo` int(99) NOT NULL,
  `NombreCargo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`IdCargo`, `NombreCargo`) VALUES
(1, 'Obrero'),
(2, 'Electricistaaaa'),
(6, 'aaaa'),
(7, 'aaa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidad`
--

CREATE TABLE `especialidad` (
  `IdEspecialidad` int(9) NOT NULL,
  `NombreEspecialidad` varchar(30) NOT NULL,
  `IdCargo` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `especialidad`
--

INSERT INTO `especialidad` (`IdEspecialidad`, `NombreEspecialidad`, `IdCargo`) VALUES
(1, 'aaaa', 1),
(2, 'bbbbb', 2),
(3, 'cccc', 0),
(5, 'eeeee', 0),
(6, 'aaaa', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialista`
--

CREATE TABLE `especialista` (
  `IdEspecialista` int(11) NOT NULL,
  `rutEspecialista` varchar(10) NOT NULL,
  `FechaNacimientoEspecialista` varchar(20) NOT NULL,
  `EdadEspecialista` int(11) NOT NULL,
  `EstadoCivilEspecialista` varchar(20) NOT NULL,
  `AfpEspecialista` varchar(25) NOT NULL,
  `PrevisionEspecialista` varchar(25) NOT NULL,
  `EstudiosEspecialista` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `especialista`
--

INSERT INTO `especialista` (`IdEspecialista`, `rutEspecialista`, `FechaNacimientoEspecialista`, `EdadEspecialista`, `EstadoCivilEspecialista`, `AfpEspecialista`, `PrevisionEspecialista`, `EstudiosEspecialista`) VALUES
(1, '10345678-9', '15/01/1994', 23, 'soltero', 'Cuprum', 'Cruz blanca', 'universitario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jefeproyecto`
--

CREATE TABLE `jefeproyecto` (
  `rutJefeP` varchar(10) NOT NULL,
  `nombreJefeP` varchar(25) NOT NULL,
  `apellidoJefeP` varchar(25) NOT NULL,
  `especialidadJefeP` varchar(25) NOT NULL,
  `passwordJefe` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `jefeproyecto`
--

INSERT INTO `jefeproyecto` (`rutJefeP`, `nombreJefeP`, `apellidoJefeP`, `especialidadJefeP`, `passwordJefe`) VALUES
('10500500-8', 'Juan', 'Perez', 'Terminaciones', '1234'),
('12500600-8', 'Pedro', 'Lira', 'Interiores', '1234'),
('13500600-7', 'Andres', 'Lopez', 'Construccion', '1234');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `organizacion`
--

CREATE TABLE `organizacion` (
  `idOrganizacion` int(11) NOT NULL,
  `RutOrganizacion` varchar(20) NOT NULL,
  `NombreOrganizacion` varchar(30) NOT NULL,
  `PaginaWebOrganizacion` varchar(30) NOT NULL,
  `CorreoOrganizacion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `organizacion`
--

INSERT INTO `organizacion` (`idOrganizacion`, `RutOrganizacion`, `NombreOrganizacion`, `PaginaWebOrganizacion`, `CorreoOrganizacion`) VALUES
(2, '123122563-3', 'Ingenieria Choapa', 'www.ingchoapa.cl', 'ingchoapa@gmail.com'),
(5, '155666999-7', 'Inmobiliaria elqui', 'www.ielqui.cl', 'contacto@ielqui.cl');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `perfil` (
  `idPerfil` int(9) NOT NULL,
  `areaPerfil` varchar(25) NOT NULL,
  `cargoPerfil` varchar(25) NOT NULL,
  `remuneracionPerfil` int(9) NOT NULL,
  `habilidadPerfil` varchar(25) NOT NULL,
  `idProyecto` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`idPerfil`, `areaPerfil`, `cargoPerfil`, `remuneracionPerfil`, `habilidadPerfil`, `idProyecto`) VALUES
(1, 'Construccion', 'Obrero', 250000, 'Construccion', 8),
(2, 'Construccion', 'Operador grua', 500000, 'Maquinaria', 8),
(3, 'Minería', 'Supervisor', 500000, 'Supervisor de faena', 10),
(6, 'Minería', 'Ejecucion mecanica', 450000, 'Mantencion de planta', 10),
(8, 'Mineria', 'Supervisor', 550000, 'Supervisor de faena', 0),
(9, 'Mineria', 'Supervisor', 550000, 'Supervisor de faena', 0),
(10, 'Mineria', 'Supervisor', 550000, 'Supervisor de faena', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `rutPersona` varchar(10) NOT NULL,
  `nombrePersona` varchar(30) NOT NULL,
  `ApellidoPatPersona` varchar(30) NOT NULL,
  `ApellidoMatPersona` varchar(30) NOT NULL,
  `CiudadPersona` varchar(25) NOT NULL,
  `Sexo` varchar(10) NOT NULL,
  `FechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `CargoPersona` varchar(15) NOT NULL,
  `HabilidadPersona` varchar(50) NOT NULL,
  `CorreoPersona` varchar(30) NOT NULL,
  `TelefonoPersona` varchar(20) NOT NULL,
  `PasswordPersona` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`rutPersona`, `nombrePersona`, `ApellidoPatPersona`, `ApellidoMatPersona`, `CiudadPersona`, `Sexo`, `FechaRegistro`, `CargoPersona`, `HabilidadPersona`, `CorreoPersona`, `TelefonoPersona`, `PasswordPersona`) VALUES
('18502549-7', 'Joaquin', 'Robles', 'Aravena', 'IV Coquimbo', 'Femenino', '2017-12-06 04:47:29', 'Supervisor', 'Supervisor de faena', 'joaquin.robles@inacapmail.cl', '823234523', 'joaq'),
('18757360-2', 'Sebastian', 'Alaniz', 'Astorga', 'IV Coquimbo', 'Masculino', '2017-12-06 04:53:02', 'Supervisor', 'Supervisor de faena', 'boonewan@live.com', '2227984', '123456'),
('19284493-2', 'Nicolas', 'Jofre', 'Fuenzalida', 'IV Coquimbo', 'Femenino', '2017-12-04 19:32:18', 'Obrero', 'Construccion', 'Natalia@nose.cl', '99377755', 'picopalquelee'),
('19295813-k', 'LuIS', 'Tapia', 'Liberon', 'IV Coquimbo', 'Femenino', '2017-11-29 05:10:40', 'Electricista', 'Electricidad', 'luis.tapia07@inacapmail.cl', '543543223', 'luis123'),
('19848393-1', 'Luis', 'Paez', 'manriquez', 'IV Coquimbo', 'Masculino', '2017-12-06 04:47:32', 'Supervisor', 'Supervisor de faena', 'luchito@gmail.com', '44079485', '123456'),
('5553950-1', 'asmilda', 'astorga', 'cerda', 'IV Coquimbo', 'Femenino', '2017-11-29 05:10:57', 'Electricista', 'Electricidad', 'nosellama@gmail.com', '985291406', '123123'),
('5553950-2', 'Asmilda', 'Astorga', 'Cerda', 'Cuarta region', 'Femenino', '2017-11-30 02:24:30', 'Electricista', 'Electricidad', 'nose@nose.com', '85291400', '12345'),
('6775478', 'fkdh', 'dhsb', 'fghcv', 'Región Metropolitana', 'Femenino', '2017-10-04 23:51:17', 'fdvbn', 'yfdvb\n\n', 'fsggf', '5588855', 'lolo'),
('6775478fh', 'fkdh', 'dhsb', 'fghcv', 'Región Metropolitana', 'Femenino', '2017-10-04 23:52:39', 'fdvbn', 'yfdvb\n\n\n\n', 'fsggf', '5588855', 'lolo'),
('9999999-9', 'probando', 'test', 'test', 'RegiÃ³n Metropolitana', 'Femenino', '2017-07-10 05:32:18', 'Especialista', '', 'test@test.cl', '77767777677', 'nose');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos`
--

CREATE TABLE `proyectos` (
  `IdProyecto` int(9) NOT NULL,
  `NombreProyecto` varchar(50) NOT NULL,
  `DescripcionProyecto` text NOT NULL,
  `FechaInicioProyecto` date NOT NULL,
  `FechaTerminoProyecto` date NOT NULL,
  `CantNecesaria` int(5) NOT NULL,
  `imageurl` text NOT NULL,
  `rutJefeP` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proyectos`
--

INSERT INTO `proyectos` (`IdProyecto`, `NombreProyecto`, `DescripcionProyecto`, `FechaInicioProyecto`, `FechaTerminoProyecto`, `CantNecesaria`, `imageurl`, `rutJefeP`) VALUES
(8, 'Villa 1', 'se construye Villa 1', '0000-00-00', '0000-00-00', 4, '', '12500600-8'),
(9, 'Villa 2', 'se construye Villa 2', '0000-00-00', '0000-00-00', 2, '', '13500600-7'),
(10, 'Mantención Pelambres', 'Se realiza mantención de chancador', '0000-00-00', '0000-00-00', 3, '', '10500500-8'),
(11, 'Villa 4', 'aasas', '0000-00-00', '0000-00-00', 2, '', '12500600-8'),
(12, 'Villa 5', 'aaaaaa', '0000-00-00', '0000-00-00', 4, '', '13500600-7'),
(13, 'Mantención Pelambres', 'Se realiza cambio de correas', '0000-00-00', '0000-00-00', 5, '', '10500500-8'),
(14, 'asasa', 'asasa', '0000-00-00', '0000-00-00', 3, '', '12500600-8');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `representante`
--

CREATE TABLE `representante` (
  `rutRepresentante` varchar(10) NOT NULL,
  `nombreRepresentante` varchar(25) NOT NULL,
  `empresaRepresentante` varchar(30) NOT NULL,
  `passwordRepresentante` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `representante`
--

INSERT INTO `representante` (`rutRepresentante`, `nombreRepresentante`, `empresaRepresentante`, `passwordRepresentante`) VALUES
('10519753-5', 'Luis', 'Iserena', '12345');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

CREATE TABLE `solicitud` (
  `idSolicitud` int(9) NOT NULL,
  `fechaSolicitud` date NOT NULL,
  `estadoSolicitud` int(11) NOT NULL,
  `idProyecto` int(9) NOT NULL,
  `rutPersona` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `solicitud`
--

INSERT INTO `solicitud` (`idSolicitud`, `fechaSolicitud`, `estadoSolicitud`, `idProyecto`, `rutPersona`) VALUES
(90, '0000-00-00', 1, 10, '18502549-7'),
(91, '0000-00-00', 2, 10, '18757360-2');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`rutAdmin`);

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`IdCargo`),
  ADD KEY `IdCargo` (`IdCargo`);

--
-- Indices de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  ADD PRIMARY KEY (`IdEspecialidad`),
  ADD KEY `IdCargo` (`IdCargo`),
  ADD KEY `IdEspecialidad` (`IdEspecialidad`);

--
-- Indices de la tabla `especialista`
--
ALTER TABLE `especialista`
  ADD PRIMARY KEY (`IdEspecialista`),
  ADD KEY `IdEspecialista` (`IdEspecialista`),
  ADD KEY `rutEspecialista` (`rutEspecialista`);

--
-- Indices de la tabla `jefeproyecto`
--
ALTER TABLE `jefeproyecto`
  ADD PRIMARY KEY (`rutJefeP`),
  ADD UNIQUE KEY `rutJefeP_2` (`rutJefeP`),
  ADD KEY `rutJefeP` (`rutJefeP`);

--
-- Indices de la tabla `organizacion`
--
ALTER TABLE `organizacion`
  ADD PRIMARY KEY (`idOrganizacion`),
  ADD KEY `idOrganizacion` (`idOrganizacion`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`idPerfil`),
  ADD UNIQUE KEY `idPerfil` (`idPerfil`),
  ADD KEY `idPerfil_2` (`idPerfil`),
  ADD KEY `idProyecto` (`idProyecto`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`rutPersona`),
  ADD UNIQUE KEY `rutPersona` (`rutPersona`);

--
-- Indices de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD PRIMARY KEY (`IdProyecto`),
  ADD UNIQUE KEY `IdProyecto` (`IdProyecto`),
  ADD KEY `rutJefeP` (`rutJefeP`);

--
-- Indices de la tabla `representante`
--
ALTER TABLE `representante`
  ADD PRIMARY KEY (`rutRepresentante`),
  ADD KEY `idRepresentante` (`rutRepresentante`);

--
-- Indices de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD PRIMARY KEY (`idSolicitud`),
  ADD UNIQUE KEY `rutPersona` (`rutPersona`),
  ADD KEY `idProyecto` (`idProyecto`),
  ADD KEY `idEspecialista` (`rutPersona`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `IdCargo` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  MODIFY `IdEspecialidad` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `especialista`
--
ALTER TABLE `especialista`
  MODIFY `IdEspecialista` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `organizacion`
--
ALTER TABLE `organizacion`
  MODIFY `idOrganizacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
  MODIFY `idPerfil` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  MODIFY `IdProyecto` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  MODIFY `idSolicitud` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD CONSTRAINT `proyectos_ibfk_1` FOREIGN KEY (`rutJefeP`) REFERENCES `jefeproyecto` (`rutJefeP`);

--
-- Filtros para la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD CONSTRAINT `solicitud_ibfk_1` FOREIGN KEY (`rutPersona`) REFERENCES `personas` (`rutPersona`),
  ADD CONSTRAINT `solicitud_ibfk_2` FOREIGN KEY (`idProyecto`) REFERENCES `proyectos` (`IdProyecto`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
