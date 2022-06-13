CREATE DATABASE Garcia;
USE Garcia;

DROP TABLE IF EXISTS `categorias`;

CREATE TABLE `categorias` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `inventarios`;

CREATE TABLE `inventarios` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) DEFAULT NULL,
 `stock` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `rol`;

CREATE TABLE `rol` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) DEFAULT NULL
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `contraseña` varchar(50) DEFAULT NULL,
  `codigorol` int(11) DEFAULT NULL
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `trabajos`;

CREATE TABLE `trabajos` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `codigoclinica` int(11) DEFAULT NULL,
  `codigodentista` int(11) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellidos` varchar(50) DEFAULT NULL,
  `codigoproducto` int(11) DEFAULT NULL,
     `cantidad` varchar(50) DEFAULT NULL,
      `color` varchar(50) DEFAULT NULL,
     `piezas` varchar(50) DEFAULT NULL,
    `estado` varchar(50) DEFAULT NULL,
     `total` varchar(50) DEFAULT NULL
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS `clínicas`;

CREATE TABLE `clínicas` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `mail` varchar(70) DEFAULT NULL,
  `direccion` varchar(70) DEFAULT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS `productos`;

CREATE TABLE `productos` (
  `código` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `codigocategoria` int(11) DEFAULT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `dentistas`;

CREATE TABLE `dentistas` (
  `código` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `codigoclinica` int(11) DEFAULT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

