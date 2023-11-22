-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2023 at 06:09 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mecanico`
--

-- --------------------------------------------------------

--
-- Table structure for table `mecanico_clientes`
--

CREATE TABLE `mecanico_clientes` (
  `cedula` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `estado` varchar(2) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mecanico_mecanicos`
--

CREATE TABLE `mecanico_mecanicos` (
  `cedula` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `especialidad` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `estado` varchar(2) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mecanico_reparaciones`
--

CREATE TABLE `mecanico_reparaciones` (
  `idmecanico_reparaciones` int(11) NOT NULL,
  `detalles` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `costototal` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `estado` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `mecanico_mecanicos_cedula` int(11) NOT NULL,
  `mecanico_vehiculos_idmecanico_vehiculos` int(11) NOT NULL,
  `mecanico_repuestos_idmecanico_repuestos` int(11) NOT NULL,
  `mecanico_clientes_cedula` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mecanico_repuestos`
--

CREATE TABLE `mecanico_repuestos` (
  `idmecanico_repuestos` int(11) NOT NULL,
  `codigo` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `marca` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `modelo` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `clasificacion` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `imagenruta` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `costo` int(11) NOT NULL,
  `estado` varchar(2) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `mecanico_repuestos`
--

INSERT INTO `mecanico_repuestos` (`idmecanico_repuestos`, `codigo`, `marca`, `modelo`, `nombre`, `descripcion`, `tipo`, `clasificacion`, `cantidad`, `imagenruta`, `costo`, `estado`) VALUES
(1, 'PRUEBA MOD SIN IMG', 'ASDAS', 'ASDAS', 'ASDASD', 'ASDASD', 'ASDA', 'ASDFAS', 23422, 'uploads/repuesto1.jpg', 23425, 'SI');

-- --------------------------------------------------------

--
-- Table structure for table `mecanico_usuarios`
--

CREATE TABLE `mecanico_usuarios` (
  `username` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `clave` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `estado` varchar(2) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `mecanico_usuarios`
--

INSERT INTO `mecanico_usuarios` (`username`, `clave`, `estado`) VALUES
('ADMIN', 'ADMIN', 'SI');

-- --------------------------------------------------------

--
-- Table structure for table `mecanico_vehiculos`
--

CREATE TABLE `mecanico_vehiculos` (
  `idmecanico_vehiculos` int(11) NOT NULL,
  `marca` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `modelo` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `ano` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `imagenruta` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `costo` int(11) NOT NULL,
  `estado` varchar(2) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mecanico_ventas`
--

CREATE TABLE `mecanico_ventas` (
  `idmecanico_ventas` int(11) NOT NULL,
  `matricula` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` datetime NOT NULL,
  `estado` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `mecanico_vehiculos_idmecanico_vehiculos` int(11) NOT NULL,
  `mecanico_clientes_cedula` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mecanico_clientes`
--
ALTER TABLE `mecanico_clientes`
  ADD PRIMARY KEY (`cedula`);

--
-- Indexes for table `mecanico_mecanicos`
--
ALTER TABLE `mecanico_mecanicos`
  ADD PRIMARY KEY (`cedula`);

--
-- Indexes for table `mecanico_reparaciones`
--
ALTER TABLE `mecanico_reparaciones`
  ADD PRIMARY KEY (`idmecanico_reparaciones`,`mecanico_mecanicos_cedula`,`mecanico_vehiculos_idmecanico_vehiculos`,`mecanico_repuestos_idmecanico_repuestos`,`mecanico_clientes_cedula`),
  ADD KEY `fk_mecanico_reparaciones_mecanico_mecanicos1_idx` (`mecanico_mecanicos_cedula`),
  ADD KEY `fk_mecanico_reparaciones_mecanico_vehiculos1_idx` (`mecanico_vehiculos_idmecanico_vehiculos`),
  ADD KEY `fk_mecanico_reparaciones_mecanico_repuestos1_idx` (`mecanico_repuestos_idmecanico_repuestos`),
  ADD KEY `fk_mecanico_reparaciones_mecanico_clientes1_idx` (`mecanico_clientes_cedula`);

--
-- Indexes for table `mecanico_repuestos`
--
ALTER TABLE `mecanico_repuestos`
  ADD PRIMARY KEY (`idmecanico_repuestos`);

--
-- Indexes for table `mecanico_usuarios`
--
ALTER TABLE `mecanico_usuarios`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`),
  ADD UNIQUE KEY `clave_UNIQUE` (`clave`);

--
-- Indexes for table `mecanico_vehiculos`
--
ALTER TABLE `mecanico_vehiculos`
  ADD PRIMARY KEY (`idmecanico_vehiculos`);

--
-- Indexes for table `mecanico_ventas`
--
ALTER TABLE `mecanico_ventas`
  ADD PRIMARY KEY (`idmecanico_ventas`,`mecanico_vehiculos_idmecanico_vehiculos`,`mecanico_clientes_cedula`),
  ADD KEY `fk_mecanico_ventas_mecanico_vehiculos_idx` (`mecanico_vehiculos_idmecanico_vehiculos`),
  ADD KEY `fk_mecanico_ventas_mecanico_clientes1_idx` (`mecanico_clientes_cedula`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mecanico_reparaciones`
--
ALTER TABLE `mecanico_reparaciones`
  MODIFY `idmecanico_reparaciones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mecanico_repuestos`
--
ALTER TABLE `mecanico_repuestos`
  MODIFY `idmecanico_repuestos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mecanico_vehiculos`
--
ALTER TABLE `mecanico_vehiculos`
  MODIFY `idmecanico_vehiculos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `mecanico_ventas`
--
ALTER TABLE `mecanico_ventas`
  MODIFY `idmecanico_ventas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mecanico_reparaciones`
--
ALTER TABLE `mecanico_reparaciones`
  ADD CONSTRAINT `fk_mecanico_reparaciones_mecanico_clientes1` FOREIGN KEY (`mecanico_clientes_cedula`) REFERENCES `mecanico_clientes` (`cedula`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_mecanico_reparaciones_mecanico_mecanicos1` FOREIGN KEY (`mecanico_mecanicos_cedula`) REFERENCES `mecanico_mecanicos` (`cedula`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_mecanico_reparaciones_mecanico_repuestos1` FOREIGN KEY (`mecanico_repuestos_idmecanico_repuestos`) REFERENCES `mecanico_repuestos` (`idmecanico_repuestos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_mecanico_reparaciones_mecanico_vehiculos1` FOREIGN KEY (`mecanico_vehiculos_idmecanico_vehiculos`) REFERENCES `mecanico_vehiculos` (`idmecanico_vehiculos`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `mecanico_ventas`
--
ALTER TABLE `mecanico_ventas`
  ADD CONSTRAINT `fk_mecanico_ventas_mecanico_clientes1` FOREIGN KEY (`mecanico_clientes_cedula`) REFERENCES `mecanico_clientes` (`cedula`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_mecanico_ventas_mecanico_vehiculos` FOREIGN KEY (`mecanico_vehiculos_idmecanico_vehiculos`) REFERENCES `mecanico_vehiculos` (`idmecanico_vehiculos`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
