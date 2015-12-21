-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 21-12-2015 a las 09:23:46
-- Versión del servidor: 5.5.43-0ubuntu0.14.04.1
-- Versión de PHP: 5.5.9-1ubuntu4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `newcova`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Asignatura`
--

CREATE TABLE IF NOT EXISTS `Asignatura` (
  `idAsignatura` int(11) NOT NULL AUTO_INCREMENT,
  `nombrea` varchar(50) NOT NULL,
  PRIMARY KEY (`idAsignatura`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `Asignatura`
--

INSERT INTO `Asignatura` (`idAsignatura`, `nombrea`) VALUES
(2, 'Calculo 1'),
(3, 'Fisica planetaria'),
(5, 'Dibujo'),
(6, 'Diseño de sistemas multimediales'),
(7, 'Aplicaciones orientadas a objetos'),
(8, 'Seminario de culminación');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera`
--

CREATE TABLE IF NOT EXISTS `carrera` (
  `idcarrera` int(11) NOT NULL AUTO_INCREMENT,
  `nombreca` varchar(70) NOT NULL,
  `idPlan` int(11) NOT NULL,
  `idFacultad` int(11) NOT NULL,
  PRIMARY KEY (`idcarrera`),
  UNIQUE KEY `indicarr` (`idcarrera`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `carrera`
--

INSERT INTO `carrera` (`idcarrera`, `nombreca`, `idPlan`, `idFacultad`) VALUES
(1, 'Ingenieria en Sistemas de Informacion', 1, 2),
(2, 'Licenciatura en Derecho', 5, 3),
(3, 'Licenciatura en Teología', 5, 5),
(4, 'Matemática', 5, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallemat`
--

CREATE TABLE IF NOT EXISTS `detallemat` (
  `iddetalle` int(11) NOT NULL AUTO_INCREMENT,
  `nota` int(11) DEFAULT NULL,
  `idTipoa` int(11) NOT NULL,
  `idGrupo` int(11) NOT NULL,
  `idMatricula` int(11) NOT NULL,
  PRIMARY KEY (`iddetalle`),
  KEY `Ref947` (`idGrupo`),
  KEY `Ref748` (`idMatricula`),
  KEY `Ref2435` (`idTipoa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `detallemat`
--

INSERT INTO `detallemat` (`iddetalle`, `nota`, `idTipoa`, `idGrupo`, `idMatricula`) VALUES
(1, 95, 1, 4, 1),
(2, 77, 1, 5, 2),
(3, 99, 1, 4, 2),
(4, 85, 1, 5, 3),
(5, 100, 1, 4, 3),
(6, 78, 4, 6, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallepre`
--

CREATE TABLE IF NOT EXISTS `detallepre` (
  `iddetpre` int(11) NOT NULL AUTO_INCREMENT,
  `idPrerreq` int(11) NOT NULL,
  `idAsignatura` int(11) NOT NULL,
  PRIMARY KEY (`iddetpre`),
  KEY `Ref2530` (`idPrerreq`),
  KEY `Ref1231` (`idAsignatura`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Volcado de datos para la tabla `detallepre`
--

INSERT INTO `detallepre` (`iddetpre`, `idPrerreq`, `idAsignatura`) VALUES
(32, 138, 7),
(33, 138, 6),
(34, 139, 7),
(35, 139, 8),
(36, 140, 5),
(37, 140, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Docentes`
--

CREATE TABLE IF NOT EXISTS `Docentes` (
  `idDocente` int(11) NOT NULL AUTO_INCREMENT,
  `carnetDocente` varchar(15) DEFAULT NULL,
  `nombres` varchar(70) NOT NULL,
  `cedula` varchar(20) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `celular` varchar(10) DEFAULT NULL,
  `correo` varchar(40) DEFAULT NULL,
  `idEspecialidad` int(11) NOT NULL,
  PRIMARY KEY (`idDocente`),
  KEY `Ref1016` (`idEspecialidad`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `Docentes`
--

INSERT INTO `Docentes` (`idDocente`, `carnetDocente`, `nombres`, `cedula`, `telefono`, `celular`, `correo`, `idEspecialidad`) VALUES
(3, '1001', 'Ramiro Comuna', '001-090892-2225D', '22326565', '89653232', 'micorre@yahoo.es', 2),
(4, '5005', 'Juan Alberto Ramos Moncada', '005-080912-0005F', '22653636', '88986565', 'juanti@yahoo.com', 4),
(5, '2002', 'Federica Morales Meza', '002-051973-0053F', '22326596', '88965232', 'feder@gmail.com', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Especialidad`
--

CREATE TABLE IF NOT EXISTS `Especialidad` (
  `idEspecialidad` int(11) NOT NULL AUTO_INCREMENT,
  `nombree` varchar(30) NOT NULL,
  PRIMARY KEY (`idEspecialidad`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `Especialidad`
--

INSERT INTO `Especialidad` (`idEspecialidad`, `nombree`) VALUES
(2, 'Teología'),
(3, 'Matemática'),
(4, 'Computación'),
(5, 'Química');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Estudiantes`
--

CREATE TABLE IF NOT EXISTS `Estudiantes` (
  `codEstudiante` int(11) NOT NULL AUTO_INCREMENT,
  `carnetEst` varchar(15) DEFAULT NULL,
  `fechaIngreso` date NOT NULL,
  `teleDomicilio` varchar(20) NOT NULL,
  `direccionDomicilio` varchar(100) NOT NULL,
  `cedula` varchar(20) NOT NULL,
  `fechaNac` datetime NOT NULL,
  `lugarNac` varchar(70) NOT NULL,
  `nomapes` varchar(70) NOT NULL,
  PRIMARY KEY (`codEstudiante`),
  UNIQUE KEY `cedula` (`cedula`),
  UNIQUE KEY `carnetEst` (`carnetEst`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `Estudiantes`
--

INSERT INTO `Estudiantes` (`codEstudiante`, `carnetEst`, `fechaIngreso`, `teleDomicilio`, `direccionDomicilio`, `cedula`, `fechaNac`, `lugarNac`, `nomapes`) VALUES
(1, '2011930216', '0000-00-00', '2265656565', 'Mangua', '001-090882-0005D', '0000-00-00 00:00:00', 'Madrasd', 'Eulalio Perez'),
(2, '2011930698', '2009-02-12', '22659898', 'Masaya', '001-090882-9995F', '1988-12-27 00:00:00', 'Madriz', 'Pedro Alberto Barrientos Tellez'),
(3, '201501', '2015-07-12', '2312464', 'Managua', '001-090882-0007P', '1989-02-03 00:00:00', 'Madriz', 'Juan Perez Molina');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Estudios`
--

CREATE TABLE IF NOT EXISTS `Estudios` (
  `idEstudios` int(11) NOT NULL AUTO_INCREMENT,
  `lugar` varchar(30) DEFAULT NULL,
  `titulo` varchar(30) DEFAULT NULL,
  `logo` varchar(250) CHARACTER SET utf8 NOT NULL,
  `fecha` date DEFAULT NULL,
  `codEstudiante` int(11) NOT NULL,
  PRIMARY KEY (`idEstudios`),
  KEY `Ref349` (`codEstudiante`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Volcado de datos para la tabla `Estudios`
--

INSERT INTO `Estudios` (`idEstudios`, `lugar`, `titulo`, `logo`, `fecha`, `codEstudiante`) VALUES
(1, 'Instituto Olof Palmes', 'Bachiller en Ciencias y Letras', 'uploads/serialkiller3.jpg', '2000-01-12', 1),
(2, 'UNA', 'Ingeniero Agrario', 'uploads/serialkiller3.jpg', '2010-08-07', 2),
(3, 'UAM', 'Ingenieria', 'uploads/serialkiller3.jpg', '2015-07-07', 1),
(4, 'UNAN', 'Doctor', 'uploads/serialkiller3.jpg', '2015-07-09', 2),
(5, 'UDM', 'Veterinario', 'uploads/serialkiller3.jpg', '2015-07-17', 2),
(6, 'UNAN', 'Arqquiecto', '', '2009-02-04', 2),
(7, 'UNA', 'Bachiller en Ciencias y Letras', '', '2009-06-10', 2),
(8, 'Colegio San Andres', 'Bachiller', '', '2000-07-07', 3),
(9, 'ILCOMP', 'Tecnico en reparacion de PC', '', '2010-06-10', 2),
(10, 'Salon SPA', 'Belleza', '', '2009-01-22', 3),
(11, 'Privada', 'Jardinero', '', '2010-01-27', 2),
(12, 'Privada', 'Jardinero', '', '2010-01-27', 2),
(13, 'Privada', 'Jardinero', '', '2010-01-27', 2),
(14, 'Privada', 'Jardinero', '', '2010-01-27', 2),
(15, 'Privada', 'Jardinero', '', '2010-01-27', 2),
(16, 'FSLN', 'Asesino', '', '1989-01-12', 2),
(17, 'UPONIC', 'Tecnico en redesss', '', '2010-11-18', 1),
(18, 'Olof', 'Manicura', '', '2012-04-01', 2),
(19, 'elvisdiaz', 'fbi', '', '2009-01-15', 1),
(20, 'gerer', 'wefew', '', '2015-01-28', 2),
(21, 'INATEC', 'Contabilidad tecnica', '', '2009-01-15', 3),
(22, 'CIA', 'Francotirador', '', '2008-12-30', 1),
(23, 'nuevo', 'nuevo', '', '1999-06-16', 2),
(24, 'UCA', 'serialkiller', '', '2010-07-09', 3),
(25, 'elcole', 'cocinero', '', '2010-02-26', 1),
(26, 'miuni', 'cortero', '', '2012-08-12', 1),
(27, 'lecheria', 'lechero', '', '2010-02-11', 2),
(28, 'dormida', 'dormir', '', '2016-08-13', 1),
(29, 'corredores', 'corredor', '', '2014-06-05', 2),
(30, 'heaven', 'tygod', 'uploads/tygod2.jpg', '2020-07-10', 2),
(31, 'UMAMN', 'Comelon', 'uploads/Comelon2.jpg', '2009-08-07', 2),
(32, 'fgdf', 'sdfdssdsd', 'uploads/sdfdssdsd2.jpeg', '2013-05-07', 2),
(33, 'dfgdf', 'gdf', 'uploads/gdf1.jpeg', '2011-03-04', 1),
(34, 'sdfds', 'asf', 'uploads/asf1.png', '2016-08-12', 1),
(35, 'wfwe', 'wefew', 'uploads/wefew1.jpeg', '2015-07-02', 1),
(36, 'efser', 'asd', 'uploads/asd2.jpg', '2011-03-04', 2),
(37, 'wrwr', 'sdfsf', 'uploads/sdfsf3.jpg', '2010-01-27', 3),
(38, 'erg', 'erg', 'uploads/erg1.jpg', '2014-06-18', 1),
(39, 'asd', 'asd', 'uploads/asd1.jpg', '2009-01-09', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Facultad`
--

CREATE TABLE IF NOT EXISTS `Facultad` (
  `idFacultad` int(11) NOT NULL AUTO_INCREMENT,
  `nombref` varchar(40) NOT NULL,
  PRIMARY KEY (`idFacultad`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `Facultad`
--

INSERT INTO `Facultad` (`idFacultad`, `nombref`) VALUES
(1, 'Facultad de Ciencias'),
(2, 'Facultad de Tecnologia'),
(3, 'Facultad de Derecho'),
(4, 'Facultad de Administración'),
(5, 'Facultad de Teología');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Grupo`
--

CREATE TABLE IF NOT EXISTS `Grupo` (
  `idGrupo` int(11) NOT NULL AUTO_INCREMENT,
  `idDocente` int(11) NOT NULL,
  `idAsignatura` int(11) NOT NULL,
  `idPlan` int(11) NOT NULL,
  PRIMARY KEY (`idGrupo`),
  KEY `Ref2753` (`idPlan`),
  KEY `Ref1117` (`idDocente`),
  KEY `Ref1232` (`idAsignatura`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `Grupo`
--

INSERT INTO `Grupo` (`idGrupo`, `idDocente`, `idAsignatura`, `idPlan`) VALUES
(4, 3, 2, 5),
(5, 4, 5, 5),
(6, 5, 6, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Matricula`
--

CREATE TABLE IF NOT EXISTS `Matricula` (
  `idMatricula` int(11) NOT NULL AUTO_INCREMENT,
  `semestre` char(10) NOT NULL,
  `fecha` char(10) NOT NULL,
  `anioacad` char(10) NOT NULL,
  `codEstudiante` int(11) NOT NULL,
  `idFacultad` int(11) NOT NULL,
  PRIMARY KEY (`idMatricula`),
  KEY `Ref350` (`codEstudiante`),
  KEY `Ref851` (`idFacultad`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `Matricula`
--

INSERT INTO `Matricula` (`idMatricula`, `semestre`, `fecha`, `anioacad`, `codEstudiante`, `idFacultad`) VALUES
(1, 'I semestre', '09/08/2015', '2008', 2, 2),
(2, 'IIIC', '15/09/2015', '2015', 2, 3),
(3, '1C', '09/05/2015', '2015', 3, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1436482295),
('m130524_201442_init', 1436482298);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plan`
--

CREATE TABLE IF NOT EXISTS `plan` (
  `idPlan` int(11) NOT NULL AUTO_INCREMENT,
  `nombrep` varchar(30) DEFAULT NULL,
  `idFacultad` int(11) NOT NULL,
  PRIMARY KEY (`idPlan`),
  KEY `Ref852` (`idFacultad`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `plan`
--

INSERT INTO `plan` (`idPlan`, `nombrep`, `idFacultad`) VALUES
(1, 'Plan 2010', 2),
(2, 'Plan 2011', 1),
(3, 'Plan 2010', 3),
(4, 'Plan 2011', 3),
(5, 'Plan 2015', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Prerrequisito`
--

CREATE TABLE IF NOT EXISTS `Prerrequisito` (
  `idPrerreq` int(11) NOT NULL AUTO_INCREMENT,
  `idAsignatura` int(11) NOT NULL,
  PRIMARY KEY (`idPrerreq`),
  KEY `Ref1229` (`idAsignatura`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=141 ;

--
-- Volcado de datos para la tabla `Prerrequisito`
--

INSERT INTO `Prerrequisito` (`idPrerreq`, `idAsignatura`) VALUES
(139, 2),
(140, 6),
(138, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TipoAp`
--

CREATE TABLE IF NOT EXISTS `TipoAp` (
  `idTipoa` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`idTipoa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `TipoAp`
--

INSERT INTO `TipoAp` (`idTipoa`, `descripcion`) VALUES
(1, 'Regular'),
(2, 'Especial'),
(3, 'Verano'),
(4, 'Tutoria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'kachomanic', 'eWFADyZD2ev6Vn5SfpuWh4Gu3K5F_U31', '$2y$13$1W47c.E9ACWTK/80b4UOZepGUBUpYNM8BOxQYRm5HeglZkvnbQWi6', NULL, 'kachomanic@hotmail.com', 10, 1436547749, 1436547749);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detallemat`
--
ALTER TABLE `detallemat`
  ADD CONSTRAINT `RefGrupo471` FOREIGN KEY (`idGrupo`) REFERENCES `Grupo` (`idGrupo`),
  ADD CONSTRAINT `RefMatricula481` FOREIGN KEY (`idMatricula`) REFERENCES `Matricula` (`idMatricula`),
  ADD CONSTRAINT `RefTipoAp351` FOREIGN KEY (`idTipoa`) REFERENCES `TipoAp` (`idTipoa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detallepre`
--
ALTER TABLE `detallepre`
  ADD CONSTRAINT `RefAsignatura311` FOREIGN KEY (`idAsignatura`) REFERENCES `Asignatura` (`idAsignatura`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `RefPrerrequisito301` FOREIGN KEY (`idPrerreq`) REFERENCES `Prerrequisito` (`idPrerreq`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `Docentes`
--
ALTER TABLE `Docentes`
  ADD CONSTRAINT `RefEspecialidad161` FOREIGN KEY (`idEspecialidad`) REFERENCES `Especialidad` (`idEspecialidad`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `Estudios`
--
ALTER TABLE `Estudios`
  ADD CONSTRAINT `RefEstudiantes491` FOREIGN KEY (`codEstudiante`) REFERENCES `Estudiantes` (`codEstudiante`);

--
-- Filtros para la tabla `Grupo`
--
ALTER TABLE `Grupo`
  ADD CONSTRAINT `RefAsignatura321` FOREIGN KEY (`idAsignatura`) REFERENCES `Asignatura` (`idAsignatura`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `RefDocentes171` FOREIGN KEY (`idDocente`) REFERENCES `Docentes` (`idDocente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Refplan531` FOREIGN KEY (`idPlan`) REFERENCES `plan` (`idPlan`);

--
-- Filtros para la tabla `Matricula`
--
ALTER TABLE `Matricula`
  ADD CONSTRAINT `RefEstudiantes501` FOREIGN KEY (`codEstudiante`) REFERENCES `Estudiantes` (`codEstudiante`),
  ADD CONSTRAINT `RefFacultad511` FOREIGN KEY (`idFacultad`) REFERENCES `Facultad` (`idFacultad`);

--
-- Filtros para la tabla `plan`
--
ALTER TABLE `plan`
  ADD CONSTRAINT `RefFacultad521` FOREIGN KEY (`idFacultad`) REFERENCES `Facultad` (`idFacultad`);

--
-- Filtros para la tabla `Prerrequisito`
--
ALTER TABLE `Prerrequisito`
  ADD CONSTRAINT `RefAsignatura291` FOREIGN KEY (`idAsignatura`) REFERENCES `Asignatura` (`idAsignatura`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
