# ************************************************************
# Sequel Pro SQL dump
# Versión 4499
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.6.25)
# Base de datos: reborn
# Tiempo de Generación: 2016-01-18 21:33:26 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Volcado de tabla Dependencias
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Dependencias`;

CREATE TABLE `Dependencias` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBREDEPENDENCIA` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `COBRO` tinyint(1) NOT NULL,
  `ACTIVO` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Volcado de tabla Discapacidades
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Discapacidades`;

CREATE TABLE `Discapacidades` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Volcado de tabla Estados
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Estados`;

CREATE TABLE `Estados` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Volcado de tabla friends
# ------------------------------------------------------------

DROP TABLE IF EXISTS `friends`;

CREATE TABLE `friends` (
  `user_id` int(11) NOT NULL,
  `friend_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`friend_id`),
  KEY `IDX_21EE7069A76ED395` (`user_id`),
  KEY `IDX_21EE70696A5458E8` (`friend_id`),
  CONSTRAINT `FK_21EE70696A5458E8` FOREIGN KEY (`friend_id`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_21EE7069A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Volcado de tabla Gruposetnicos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Gruposetnicos`;

CREATE TABLE `Gruposetnicos` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Volcado de tabla language
# ------------------------------------------------------------

DROP TABLE IF EXISTS `language`;

CREATE TABLE `language` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `abbreviation` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Volcado de tabla Municipios
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Municipios`;

CREATE TABLE `Municipios` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ESTADO_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `IDX_F4A7B6564D3F186E` (`ESTADO_id`),
  CONSTRAINT `FK_F4A7B6564D3F186E` FOREIGN KEY (`ESTADO_id`) REFERENCES `Estados` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Volcado de tabla Nivelessocioeconomicos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Nivelessocioeconomicos`;

CREATE TABLE `Nivelessocioeconomicos` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Volcado de tabla Pacientes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Pacientes`;

CREATE TABLE `Pacientes` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `CURP` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SEXO` int(11) DEFAULT NULL,
  `NOMBRE` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `APELLIDO_PATERNO` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `APELLIDO_MATERNO` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `FECHA_NACIMIENTO` date DEFAULT NULL,
  `OCUPACION` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EMBARAZO` int(11) DEFAULT NULL,
  `CALLE` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NUMERO_EXT` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NUMERO_INT` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CODIGO_POSTAL` int(11) DEFAULT NULL,
  `COLONIA` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TELEFONO_1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TELEFONO_2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EMAIL` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `RFC` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `FECHA_REGISTRO` date NOT NULL,
  `ESTADO_CIVIL` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `REFERIDO` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `IMAGEN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `FECHA_MODIFICACION` date DEFAULT NULL,
  `AFILIACION` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CLINICA` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NIVEL_SOCIOECONOMICO_id` int(11) DEFAULT NULL,
  `TIPO_SANGUINEO_id` int(11) DEFAULT NULL,
  `DISCAPACIDAD_id` int(11) DEFAULT NULL,
  `GRUPO_ETNICO_id` int(11) DEFAULT NULL,
  `ESTADO_id` int(11) DEFAULT NULL,
  `RELIGION_id` int(11) DEFAULT NULL,
  `MUNICIPIO_id` int(11) DEFAULT NULL,
  `VIVIENDA_id` int(11) DEFAULT NULL,
  `USUARIO_id` int(11) DEFAULT NULL,
  `DEPENDENCIA_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `IDX_15EAFAF257F28A7E` (`NIVEL_SOCIOECONOMICO_id`),
  KEY `IDX_15EAFAF2E17BA5C4` (`TIPO_SANGUINEO_id`),
  KEY `IDX_15EAFAF2E69063BB` (`DISCAPACIDAD_id`),
  KEY `IDX_15EAFAF259130E16` (`GRUPO_ETNICO_id`),
  KEY `IDX_15EAFAF24D3F186E` (`ESTADO_id`),
  KEY `IDX_15EAFAF2AC21DCDF` (`RELIGION_id`),
  KEY `IDX_15EAFAF25B29107A` (`MUNICIPIO_id`),
  KEY `IDX_15EAFAF29A0387EA` (`VIVIENDA_id`),
  KEY `IDX_15EAFAF246001C2B` (`USUARIO_id`),
  KEY `IDX_15EAFAF2A2AB0A01` (`DEPENDENCIA_id`),
  CONSTRAINT `FK_15EAFAF246001C2B` FOREIGN KEY (`USUARIO_id`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_15EAFAF24D3F186E` FOREIGN KEY (`ESTADO_id`) REFERENCES `Estados` (`ID`),
  CONSTRAINT `FK_15EAFAF257F28A7E` FOREIGN KEY (`NIVEL_SOCIOECONOMICO_id`) REFERENCES `Nivelessocioeconomicos` (`ID`),
  CONSTRAINT `FK_15EAFAF259130E16` FOREIGN KEY (`GRUPO_ETNICO_id`) REFERENCES `Gruposetnicos` (`ID`),
  CONSTRAINT `FK_15EAFAF25B29107A` FOREIGN KEY (`MUNICIPIO_id`) REFERENCES `Municipios` (`ID`),
  CONSTRAINT `FK_15EAFAF29A0387EA` FOREIGN KEY (`VIVIENDA_id`) REFERENCES `Viviendas` (`ID`),
  CONSTRAINT `FK_15EAFAF2A2AB0A01` FOREIGN KEY (`DEPENDENCIA_id`) REFERENCES `Dependencias` (`ID`),
  CONSTRAINT `FK_15EAFAF2AC21DCDF` FOREIGN KEY (`RELIGION_id`) REFERENCES `Religiones` (`ID`),
  CONSTRAINT `FK_15EAFAF2E17BA5C4` FOREIGN KEY (`TIPO_SANGUINEO_id`) REFERENCES `Tipossanguineos` (`ID`),
  CONSTRAINT `FK_15EAFAF2E69063BB` FOREIGN KEY (`DISCAPACIDAD_id`) REFERENCES `Discapacidades` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Volcado de tabla privilege
# ------------------------------------------------------------

DROP TABLE IF EXISTS `privilege`;

CREATE TABLE `privilege` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `resource_id` int(11) DEFAULT NULL,
  `role_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `permission_allow` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_87209A8789329D25` (`resource_id`),
  KEY `IDX_87209A87D60322AC` (`role_id`),
  CONSTRAINT `FK_87209A8789329D25` FOREIGN KEY (`resource_id`) REFERENCES `resource` (`id`),
  CONSTRAINT `FK_87209A87D60322AC` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Volcado de tabla question
# ------------------------------------------------------------

DROP TABLE IF EXISTS `question`;

CREATE TABLE `question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_B6F7494EB6F7494E` (`question`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Volcado de tabla Religiones
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Religiones`;

CREATE TABLE `Religiones` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Volcado de tabla resource
# ------------------------------------------------------------

DROP TABLE IF EXISTS `resource`;

CREATE TABLE `resource` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Volcado de tabla role
# ------------------------------------------------------------

DROP TABLE IF EXISTS `role`;

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;

INSERT INTO `role` (`id`, `name`)
VALUES
	(1,'Admin'),
	(2,'Administrativo'),
	(3,'Médico'),
	(4,'Técnico'),
	(5,'Recepción'),
	(6,'Invitado');

/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla roles_parents
# ------------------------------------------------------------

DROP TABLE IF EXISTS `roles_parents`;

CREATE TABLE `roles_parents` (
  `role_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  PRIMARY KEY (`role_id`,`parent_id`),
  KEY `IDX_C70E6B91D60322AC` (`role_id`),
  KEY `IDX_C70E6B91727ACA70` (`parent_id`),
  CONSTRAINT `FK_C70E6B91727ACA70` FOREIGN KEY (`parent_id`) REFERENCES `role` (`id`),
  CONSTRAINT `FK_C70E6B91D60322AC` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `roles_parents` WRITE;
/*!40000 ALTER TABLE `roles_parents` DISABLE KEYS */;

INSERT INTO `roles_parents` (`role_id`, `parent_id`)
VALUES
	(1,2),
	(2,3),
	(3,4),
	(4,5);

/*!40000 ALTER TABLE `roles_parents` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla state
# ------------------------------------------------------------

DROP TABLE IF EXISTS `state`;

CREATE TABLE `state` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `state` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_A393D2FBA393D2FB` (`state`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `state` WRITE;
/*!40000 ALTER TABLE `state` DISABLE KEYS */;

INSERT INTO `state` (`id`, `state`)
VALUES
	(1,'Activo'),
	(2,'Inactivo'),
	(3,'Suspendido');

/*!40000 ALTER TABLE `state` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla Tipossanguineos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Tipossanguineos`;

CREATE TABLE `Tipossanguineos` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Volcado de tabla user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `answer` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `registration_date` datetime DEFAULT NULL,
  `registration_token` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_confirmed` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649F85E0677` (`username`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`),
  KEY `IDX_8D93D649D60322AC` (`role_id`),
  KEY `IDX_8D93D64982F1BAF4` (`language_id`),
  KEY `IDX_8D93D6495D83CC1` (`state_id`),
  KEY `IDX_8D93D6491E27F6BF` (`question_id`),
  KEY `search_idx` (`username`,`first_name`,`last_name`,`email`),
  CONSTRAINT `FK_8D93D6491E27F6BF` FOREIGN KEY (`question_id`) REFERENCES `question` (`id`),
  CONSTRAINT `FK_8D93D6495D83CC1` FOREIGN KEY (`state_id`) REFERENCES `state` (`id`),
  CONSTRAINT `FK_8D93D64982F1BAF4` FOREIGN KEY (`language_id`) REFERENCES `language` (`id`),
  CONSTRAINT `FK_8D93D649D60322AC` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Volcado de tabla Usuarios
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Usuarios`;

CREATE TABLE `Usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `USUARIO` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `NOMBRE` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `EMAIL` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `PASSWORD` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `FOTO` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `FECHAREGISTRO` datetime DEFAULT NULL,
  `EMAILCONFIRMADO` tinyint(1) NOT NULL,
  `ROL_id` int(11) NOT NULL,
  `ESTATUS_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_F780E5A41D204E47` (`USUARIO`),
  UNIQUE KEY `UNIQ_F780E5A410C6BEC4` (`EMAIL`),
  KEY `IDX_F780E5A462E53C60` (`ROL_id`),
  KEY `IDX_F780E5A4C482ECE4` (`ESTATUS_id`),
  KEY `search_idx` (`USUARIO`,`NOMBRE`,`EMAIL`),
  CONSTRAINT `FK_F780E5A462E53C60` FOREIGN KEY (`ROL_id`) REFERENCES `role` (`id`),
  CONSTRAINT `FK_F780E5A4C482ECE4` FOREIGN KEY (`ESTATUS_id`) REFERENCES `state` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `Usuarios` WRITE;
/*!40000 ALTER TABLE `Usuarios` DISABLE KEYS */;

INSERT INTO `Usuarios` (`id`, `USUARIO`, `NOMBRE`, `EMAIL`, `PASSWORD`, `FOTO`, `FECHAREGISTRO`, `EMAILCONFIRMADO`, `ROL_id`, `ESTATUS_id`)
VALUES
	(1,'Admin','Abraham Martínez Wong','mtz_wg@hotmail.com','$2y$10$z9WCLFgyQ.3UlyYZlDL3MeXnqUam0ZqbP/bL0.7rQ2b/6Hc.m8PWK',NULL,NULL,1,1,1);

/*!40000 ALTER TABLE `Usuarios` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla Viviendas
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Viviendas`;

CREATE TABLE `Viviendas` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
