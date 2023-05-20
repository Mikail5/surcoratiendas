SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS `sctienda` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `sctienda`;


CREATE TABLE `categoria` (
  `IdCate` int(10) NOT NULL,
  `Descri` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `categoria` (`IdCate`, `Descri`) VALUES
(1, 'Alimentos'),
(2, 'Bebidas'),
(3, 'Productos de aseo'),
(4, 'Paquetes');

CREATE TABLE `empleados` (
  `NoIden` int(10) NOT NULL,
  `Nombre` varchar(26) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Edad` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Telefono` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ConUser` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `factura` (
  `IdFac` int(10) NOT NULL,
  `NomCli` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IdEmp` int(10) NOT NULL,
  `ValorTotal` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `infofactura` (
  `IdFac` int(10) NOT NULL,
  `IdPro` int(10) NOT NULL,
  `CantPC` int(10) NOT NULL,
  `Subtotal` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `productos` (
  `IdPro` int(10) NOT NULL,
  `NomPro` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PrecioPro` int(10) NOT NULL,
  `Cantidad` int(10) NOT NULL,
  `IdCate` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


ALTER TABLE `categoria`
  ADD PRIMARY KEY (`IdCate`);

ALTER TABLE `empleados`
  ADD PRIMARY KEY (`NoIden`);

ALTER TABLE `factura`
  ADD PRIMARY KEY (`IdFac`),
  ADD KEY `IdEmp` (`IdEmp`);

ALTER TABLE `infofactura`
  ADD KEY `IdFac` (`IdFac`),
  ADD KEY `IdPro` (`IdPro`);

ALTER TABLE `productos`
  ADD PRIMARY KEY (`IdPro`),
  ADD KEY `IdCate` (`IdCate`);


ALTER TABLE `categoria`
  MODIFY `IdCate` int(10) NOT NULL AUTO_INCREMENT;

ALTER TABLE `empleados`
  MODIFY `NoIden` int(10) NOT NULL AUTO_INCREMENT;

ALTER TABLE `factura`
  MODIFY `IdFac` int(10) NOT NULL AUTO_INCREMENT;

ALTER TABLE `productos`
  MODIFY `IdPro` int(10) NOT NULL AUTO_INCREMENT;


ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`IdEmp`) REFERENCES `empleados` (`NoIden`);

ALTER TABLE `infofactura`
  ADD CONSTRAINT `infofactura_ibfk_1` FOREIGN KEY (`IdFac`) REFERENCES `factura` (`IdFac`),
  ADD CONSTRAINT `infofactura_ibfk_2` FOREIGN KEY (`IdPro`) REFERENCES `productos` (`IdPro`);

ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`IdCate`) REFERENCES `categoria` (`IdCate`);