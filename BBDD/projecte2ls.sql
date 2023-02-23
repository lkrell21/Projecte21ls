-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-02-2023 a las 17:39:39
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `projecte2ls`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `farmacos`
--

CREATE TABLE `farmacos` (
  `idFarmaco` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `SMILES` varchar(100) NOT NULL,
  `InChl` varchar(100) NOT NULL,
  `fecha` datetime NOT NULL,
  `estado` varchar(50) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `farmacos`
--

INSERT INTO `farmacos` (`idFarmaco`, `nombre`, `SMILES`, `InChl`, `fecha`, `estado`, `imagen`, `descripcion`, `idUsuario`) VALUES
(1, 'Aspirina', 'CC(=O)OC1=CC=CC=C1C(=O)O', '1S/C9H8O4/c1-6(10)13-8-5-3-2-4-7(8)9(11)12/h2-5H,1H3,(H,11,12)', '2023-01-07 17:29:43', 'en venta', '../img/farmaco.jpg', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit.</br> Eligendi rerum repellat magnam similique praesentium                     consectetur odit modi, asperiores, ipsum dolor ex, repellendus delectus.</br> Eligendi architecto eos, unde earum commodi aut.', 2),
(2, 'Paracetamol', 'CC(=O)Nc1ccc(cc1)O', '1S/C8H9NO2/c1-6(10)9-7-2-4-8(11)5-3-7/h2-5,11H,1H3,(H,9,10)', '2023-01-07 17:29:43', 'en venta', '../img/farmaco.jpg', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit.</br> Eligendi rerum repellat magnam similique praesentium                     consectetur odit modi, asperiores, ipsum dolor ex, repellendus delectus.</br> Eligendi architecto eos, unde earum commodi aut.', 1),
(21, 'prueba4', 'x', 'x', '0000-00-00 00:00:00', 'x', 'estudiante2.jpg', 'corregido problema imagen', 2),
(31, 'prueba', 'x', 'x', '0000-00-00 00:00:00', 'x', 'estudiante1.jpg', 'x', 2),
(40, 'prueba4', '', '', '2023-01-10 21:57:11', '', '', 'probando fecha', 2),
(41, '', '', '', '2023-01-10 22:00:36', '', '', '', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proteinas`
--

CREATE TABLE `proteinas` (
  `idProteina` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `resolucion` varchar(100) NOT NULL,
  `especie` varchar(50) NOT NULL,
  `fecha` datetime NOT NULL,
  `tipoFichero` varchar(10) NOT NULL,
  `nombreFichero` varchar(50) NOT NULL,
  `metodo` varchar(50) NOT NULL,
  `imagen` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proteinas`
--

INSERT INTO `proteinas` (`idProteina`, `nombre`, `resolucion`, `especie`, `fecha`, `tipoFichero`, `nombreFichero`, `metodo`, `imagen`, `descripcion`, `idUsuario`) VALUES
(1, 'globulina', 'x', 'x', '2023-01-08 12:09:07', 'x', 'x', 'x', '../img/proteina.jpg', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit.</br> Eligendi rerum repellat magnam similique praesentium\n                        consectetur odit modi, asperiores, ipsum dolor ex, repellendus delectus.</br> Eligendi architecto eos, unde earum commodi aut.', 2),
(8, 'queratina', 'x', 'humana', '2023-01-08 12:27:01', 'x', 'x', 'x', '../img/proteina.jpg', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit.</br> Eligendi rerum repellat magnam similique praesentium                         consectetur odit modi, asperiores, ipsum dolor ex, repellendus delectus.</br> Eligendi architecto eos, unde earum commodi aut.', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `contrasenya` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `rol` varchar(50) NOT NULL,
  `fechaAlta` datetime NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nombre`, `contrasenya`, `email`, `rol`, `fechaAlta`, `activo`) VALUES
(1, 'jacinto', '1234', 'jacinto.ruiz@gmail.com', 'usuario', '2023-01-07 17:27:19', 1),
(2, 'anastasia', '1234', 'anastasia.ruiz@gmail.com', 'usuario', '2023-01-07 17:27:19', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `farmacos`
--
ALTER TABLE `farmacos`
  ADD PRIMARY KEY (`idFarmaco`),
  ADD UNIQUE KEY `idFarmaco` (`idFarmaco`),
  ADD KEY `idUsuario` (`idUsuario`) USING BTREE;

--
-- Indices de la tabla `proteinas`
--
ALTER TABLE `proteinas`
  ADD PRIMARY KEY (`idProteina`),
  ADD UNIQUE KEY `idProteina` (`idProteina`),
  ADD KEY `idUsuario` (`idUsuario`) USING BTREE;

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `idUsuario` (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `farmacos`
--
ALTER TABLE `farmacos`
  MODIFY `idFarmaco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `proteinas`
--
ALTER TABLE `proteinas`
  MODIFY `idProteina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `farmacos`
--
ALTER TABLE `farmacos`
  ADD CONSTRAINT `farmacos_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `proteinas`
--
ALTER TABLE `proteinas`
  ADD CONSTRAINT `proteinas_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
