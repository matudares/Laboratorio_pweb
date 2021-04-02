-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-04-2021 a las 05:07:00
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `laboratorio_pweb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_clientes` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Apellido` varchar(50) NOT NULL,
  `Telefono` varchar(11) NOT NULL,
  `Correo` varchar(50) NOT NULL,
  `Direccion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_clientes`, `Nombre`, `Apellido`, `Telefono`, `Correo`, `Direccion`) VALUES
(1, 'Josefino', 'Manuel', '04127687586', 'jose.morena@gmail.com', 'Sabanet'),
(9, 'Roberto', 'Alvarado', '04121234567', 'roberto', 'Sabaneta'),
(10, 'hola', 'kmassss', '04121234567', 'maaa@hotmail.com', 'aksdasda');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exam_clinicos`
--

CREATE TABLE `exam_clinicos` (
  `id_examen` int(11) NOT NULL,
  `Nombre_examen` varchar(50) NOT NULL,
  `Precio_examen` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `exam_clinicos`
--

INSERT INTO `exam_clinicos` (`id_examen`, `Nombre_examen`, `Precio_examen`) VALUES
(1, 'Examen de Sangre', '250000.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `res_examenes`
--

CREATE TABLE `res_examenes` (
  `id_resultado` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_examen` int(11) NOT NULL,
  `id_doctor` int(11) NOT NULL,
  `id_parametros` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `res_examenes`
--

INSERT INTO `res_examenes` (`id_resultado`, `id_cliente`, `id_examen`, `id_doctor`, `id_parametros`) VALUES
(1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuarios` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Apellido` varchar(50) NOT NULL,
  `Telefono` varchar(11) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `contraseña` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuarios`, `Nombre`, `Apellido`, `Telefono`, `correo`, `contraseña`) VALUES
(1, 'Miguel', 'Tudares', '04146998866', 'matudares@gmail.com', 'Matl120399.');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_clientes`);

--
-- Indices de la tabla `exam_clinicos`
--
ALTER TABLE `exam_clinicos`
  ADD PRIMARY KEY (`id_examen`);

--
-- Indices de la tabla `res_examenes`
--
ALTER TABLE `res_examenes`
  ADD PRIMARY KEY (`id_resultado`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_examen` (`id_examen`),
  ADD KEY `id_doctor` (`id_doctor`),
  ADD KEY `id_parametros` (`id_parametros`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuarios`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_clientes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `exam_clinicos`
--
ALTER TABLE `exam_clinicos`
  MODIFY `id_examen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `res_examenes`
--
ALTER TABLE `res_examenes`
  MODIFY `id_resultado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `res_examenes`
--
ALTER TABLE `res_examenes`
  ADD CONSTRAINT `res_examenes_ibfk_1` FOREIGN KEY (`id_examen`) REFERENCES `exam_clinicos` (`id_examen`),
  ADD CONSTRAINT `res_examenes_ibfk_2` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_clientes`),
  ADD CONSTRAINT `res_examenes_ibfk_3` FOREIGN KEY (`id_doctor`) REFERENCES `usuarios` (`id_usuarios`),
  ADD CONSTRAINT `res_examenes_ibfk_4` FOREIGN KEY (`id_parametros`) REFERENCES `parametros` (`id_parametros`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
