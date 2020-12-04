-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-12-2020 a las 19:08:54
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `aquitoy`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `Generar_Clave` (IN `correo` VARCHAR(50), IN `clave` VARCHAR(50))  BEGIN
UPDATE usuarios set usu_clave=clave where usu_correo=correo;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Modificar_Cliente` (IN `codigo` INT, IN `nombres` VARCHAR(50), IN `apellidos` VARCHAR(50), IN `documento` VARCHAR(20), IN `telefono` VARCHAR(20), IN `direccion` VARCHAR(50), IN `estado` VARCHAR(20))  BEGIN
UPDATE clientes set	clie_nombres=nombres, clie_apellidos=apellidos,	clie_documento=documento, clie_telefono=telefono, clie_direccion=direccion, clie_estado=estado WHERE clie_id=codigo;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Modificar_Compras` (IN `codigo` INT, `nombre_mp` VARCHAR(30), IN `cantidad_mp` INT, IN `precio` INT, IN `empleado` INT, IN `proveedor` INT)  BEGIN
UPDATE compras set comp_nombre_materia_prima=nombre_mp,	comp_cantidad_materia_prima=cantidad_mp, comp_precio=precio, emp_id=empleado, prov_id=proveedor WHERE comp_id=codigo;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Modificar_Empleado` (IN `codigo` INT, IN `nombres` VARCHAR(50), IN `apellidos` VARCHAR(50), IN `documento` VARCHAR(20), IN `telefono` VARCHAR(20), IN `cargo` VARCHAR(20), IN `estado` VARCHAR(20))  BEGIN
UPDATE empleados set emp_nombres=nombres, emp_apellidos=apellidos, emp_documento=documento, emp_telefono=telefono, emp_cargo=cargo, emp_estado=estado WHERE emp_id=codigo;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Modificar_MateriaPrima` (IN `codigo` INT, IN `nombre` VARCHAR(50), IN `cantidad` INT)  BEGIN
UPDATE materia_prima set mp_nombre=nombre, mp_cantidad=cantidad where mp_id=codigo;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Modificar_Pedido` (IN `codigo` INT, IN `fecha` DATE, IN `hora` TIME, IN `direccion` VARCHAR(30), IN `total` INT, IN `estado` VARCHAR(30), IN `empleado` INT, IN `cliente` INT)  BEGIN
UPDATE pedidos set ped_fecha_entrega=fecha, ped_hora_entrega=hora, ped_direccion=direccion, ped_total=total, ped_estado=estado, emp_id=empleado, clie_id=cliente where ped_id=codigo;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Modificar_Produccion` (IN `codigo` INT, IN `fecha` DATE, IN `empleado` INT)  BEGIN
UPDATE produccion set prod_fecha=fecha, emp_id=empleado where prod_id=codigo;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Modificar_Producido` (IN `codigo` INT, IN `cantidad_producida` INT, IN `producto` VARCHAR(50), IN `produccion` INT)  BEGIN
UPDATE producido set produ_cantidad_producida=cantidad_producida, pro_id=producto, prod_id=produccion where produ_id=codigo;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Modificar_Productos` (IN `codigo` INT, IN `nombre` VARCHAR(50), IN `descripcion` VARCHAR(50), IN `precio` INT, IN `cantidad_existente` INT)  BEGIN
UPDATE productos set pro_nombre=nombre, pro_descripcion=descripcion, pro_precio=precio, pro_cantidad_existente=cantidad_existente where pro_id=codigo;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Modificar_Proveedor` (IN `codigo` INT, IN `nombres` VARCHAR(50), IN `apellidos` VARCHAR(50), IN `documento` VARCHAR(20), IN `telefono` VARCHAR(20), IN `estado` VARCHAR(20))  BEGIN
UPDATE proveedores set	prov_nombres=nombres, prov_apellidos=apellidos,	prov_documento=documento, prov_telefono=telefono, prov_estado=estado WHERE prov_id=codigo;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `RegistrarDetalle_Pedido` (IN `subtotal` INT, IN `cantidad` INT, IN `producto` INT, IN `pedido` INT)  BEGIN
INSERT INTO detalle_pedido(dep_subtotal, dep_cantidad, pro_id, ped_id)
VALUES (subtotal, cantidad, producto, pedido);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Registrar_Cliente` (IN `nombres` VARCHAR(50), IN `apellidos` VARCHAR(50), IN `documento` VARCHAR(20), IN `telefono` VARCHAR(20), IN `direccion` VARCHAR(50), IN `estado` VARCHAR(20))  BEGIN
INSERT INTO clientes(clie_nombres, clie_apellidos, clie_documento, clie_telefono, clie_direccion ,clie_estado)
VALUES (nombres, apellidos, documento, telefono, direccion, estado);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Registrar_Compras` (`nombre_mp` VARCHAR(30), IN `cantidad_mp` INT, IN `precio` INT, IN `empleado` INT, IN `proveedor` INT)  BEGIN
INSERT INTO compras(comp_nombre_materia_prima,comp_cantidad_materia_prima, comp_precio, emp_id, prov_id)
VALUES (nombre_mp, cantidad_mp, precio, empleado, proveedor);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Registrar_MateriaPrima` (IN `nombre` VARCHAR(50), IN `cantidad` INT)  BEGIN
INSERT INTO materia_prima(mp_nombre, mp_cantidad)
VALUES (nombre, cantidad);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Registrar_Pedido` (IN `codigo` INT, IN `fechaentrega` DATE, IN `horaentrega` TIME, IN `direccion` VARCHAR(30), IN `total` INT, IN `estado` VARCHAR(30), IN `empleado` INT, IN `cliente` INT)  BEGIN
INSERT INTO pedidos(ped_id, ped_fecha_entrega, ped_hora_entrega, ped_direccion, ped_total, ped_estado, emp_id, clie_id)
VALUES (codigo, fechaentrega, horaentrega, direccion, total, estado, empleado, cliente);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Registrar_Produccion` (IN `codigo` INT, IN `fecha` DATE, IN `empleado` INT)  BEGIN
INSERT INTO produccion(prod_id, prod_fecha, emp_id)
VALUES (codigo, fecha, empleado);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Registrar_Producido` (IN `cantidad` INT, IN `producto` INT, IN `produccion` INT)  BEGIN
INSERT INTO producido(produ_cantidad_producida, pro_id, prod_id)
VALUES (cantidad, producto, produccion);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Registrar_Productos` (IN `nombre` VARCHAR(50), IN `descripcion` VARCHAR(50), IN `precio` INT, IN `cantidad_existente` INT)  BEGIN
INSERT INTO productos(pro_nombre, pro_descripcion, pro_precio, pro_cantidad_existente)
VALUES (nombre, descripcion, precio, cantidad_existente);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Registrar_Proveedor` (IN `nombres` VARCHAR(50), IN `apellidos` VARCHAR(50), IN `documento` VARCHAR(20), IN `telefono` VARCHAR(20), IN `estado` VARCHAR(20))  BEGIN
INSERT INTO proveedores(prov_nombres, prov_apellidos, prov_documento, prov_telefono, prov_estado)
VALUES (nombres, apellidos, documento, telefono, estado);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Registrar_Reporte` (IN `problema` VARCHAR(100), IN `estado` VARCHAR(30), IN `fecha` DATE, IN `pedido` INT, IN `empleado` INT)  BEGIN
INSERT INTO reporte(rep_problema, rep_estado, rep_fecha, ped_id, emp_id)
VALUES (problema, estado, fecha, pedido, empleado);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `clie_id` int(11) NOT NULL,
  `clie_nombres` varchar(50) NOT NULL,
  `clie_apellidos` varchar(50) NOT NULL,
  `clie_documento` varchar(20) NOT NULL,
  `clie_telefono` varchar(20) NOT NULL,
  `clie_direccion` varchar(30) NOT NULL,
  `clie_estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`clie_id`, `clie_nombres`, `clie_apellidos`, `clie_documento`, `clie_telefono`, `clie_direccion`, `clie_estado`) VALUES
(1, 'LUIS DANIEL', 'PEREZ QUINTANA', '1124300456', '3045653296', 'SUBA RINCON #56', 'INACTIVO'),
(6, 'DANILO FREY', 'JOSE', '1127600677', '121255491', 'CRA 94D CALLE 131 B', 'ACTIVO'),
(14, 'RAMIRO JOSE', 'PEREZ', '2656565656', '32485556', 'SUBA RINCON 89-23', 'ACTIVO'),
(15, 'MAIRA', 'AGUILAR SOCORRO', '112463359', '3046834', 'SUBA RINCON 92-12', 'ACTIVO'),
(16, 'JHONATAN DANILO', 'CRUZ MANIZALES', '112463362', '30866462', 'SUBA RINCON 36-23', 'INACTIVO'),
(17, 'SANTIAGO DAVID', 'RODRIGUEZ ALCALA', '12465626', '314535651', 'SUBA RINCON 89-54', 'ACTIVO'),
(18, 'ERVIN JOSE', 'ROSAMELO ', '13622863', '311622977', 'SUBA RINCON 29-87', 'ACTIVO'),
(19, 'CAMILO', 'ORTIZ', '3542626232', '365662626', 'SUBA RINCON 21-56', 'ACTIVO'),
(20, 'ANDERSON AMARILLO', 'PEREZ AZUL', '143453775', '232626262', 'SUBA RINCON 22-16', 'ACTIVO'),
(21, 'CRISTIAN ARTURO', 'ALVARADO', '232628425', '32626526', 'SUBA RINCON 89-88', 'ACTIVO'),
(22, 'RAMIRO', 'DIAZ', '1258963258', '300852147', 'SUBA RINCON 78-22', 'ACTIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `comp_id` int(11) NOT NULL,
  `comp_nombre_materia_prima` varchar(30) NOT NULL,
  `comp_cantidad_materia_prima` int(11) NOT NULL,
  `comp_precio` int(11) NOT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `prov_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`comp_id`, `comp_nombre_materia_prima`, `comp_cantidad_materia_prima`, `comp_precio`, `emp_id`, `prov_id`) VALUES
(1, 'JAMON', 60, 4000, 1, 8),
(7, 'ACEITE', 20, 8000, 1, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pedido`
--

CREATE TABLE `detalle_pedido` (
  `dep_id` int(11) NOT NULL,
  `dep_subtotal` int(11) NOT NULL,
  `dep_cantidad` int(11) NOT NULL,
  `pro_id` int(11) DEFAULT NULL,
  `ped_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_pedido`
--

INSERT INTO `detalle_pedido` (`dep_id`, `dep_subtotal`, `dep_cantidad`, `pro_id`, `ped_id`) VALUES
(44, 50000, 10, 3, 3),
(47, 15000, 10, 1, 4),
(50, 50000, 10, 3, 7),
(51, 45000, 18, 2, 7),
(52, 30000, 20, 1, 8),
(53, 50000, 10, 4, 8),
(54, 15000, 10, 6, 8),
(55, 15000, 10, 6, 81),
(56, 20000, 10, 5, 81),
(57, 50000, 10, 4, 81),
(68, 15000, 10, 6, 83),
(69, 2000, 1, 5, 83),
(70, 15000, 10, 6, 84),
(71, 20000, 10, 5, 84),
(73, 20000, 10, 5, 85),
(74, 50000, 10, 4, 85),
(75, 50000, 10, 3, 85),
(76, 20000, 10, 5, 86),
(77, 50000, 10, 4, 86),
(78, 50000, 10, 3, 86);

--
-- Disparadores `detalle_pedido`
--
DELIMITER $$
CREATE TRIGGER `Agregarle_Total_Pedidos` AFTER INSERT ON `detalle_pedido` FOR EACH ROW BEGIN
UPDATE pedidos set ped_total=ped_total+new.dep_subtotal where ped_id=new.ped_id; 

  END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Devolver_Cantidad_Productos` BEFORE DELETE ON `detalle_pedido` FOR EACH ROW BEGIN
UPDATE productos set pro_cantidad_existente=pro_cantidad_existente+old.dep_cantidad where pro_id=old.pro_id; 

  END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Restar_Cantidad_Producto` AFTER INSERT ON `detalle_pedido` FOR EACH ROW BEGIN
UPDATE productos SET pro_cantidad_existente=pro_cantidad_existente-new.dep_cantidad WHERE pro_id=new.pro_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_produccion`
--

CREATE TABLE `detalle_produccion` (
  `deta_id` int(11) NOT NULL,
  `deta_cantidad_materia_prima` int(11) NOT NULL,
  `mp_id` int(11) DEFAULT NULL,
  `prod_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_produccion`
--

INSERT INTO `detalle_produccion` (`deta_id`, `deta_cantidad_materia_prima`, `mp_id`, `prod_id`) VALUES
(1, 5, 2, 5),
(2, 5, 2, 5),
(3, 10, 6, 7),
(4, 10, 5, 7),
(5, 5, 4, 7),
(6, 10, 2, 7),
(7, 10, 6, 8),
(8, 1, 5, 9),
(9, 10, 4, 9),
(10, 10, 1, 9),
(11, 10, 6, 9),
(12, 10, 1, 11);

--
-- Disparadores `detalle_produccion`
--
DELIMITER $$
CREATE TRIGGER `Devolver_Cantidad` AFTER DELETE ON `detalle_produccion` FOR EACH ROW BEGIN
UPDATE materia_prima set mp_cantidad=mp_cantidad+old.deta_cantidad_materia_prima where mp_id=old.mp_id; 

  END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Restar_Cantidad_MateriaPrima` AFTER INSERT ON `detalle_produccion` FOR EACH ROW BEGIN
UPDATE materia_prima SET mp_cantidad=mp_cantidad-new.deta_cantidad_materia_prima WHERE mp_id=new.mp_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `emp_id` int(11) NOT NULL,
  `emp_nombres` varchar(50) NOT NULL,
  `emp_apellidos` varchar(50) NOT NULL,
  `emp_documento` varchar(20) NOT NULL,
  `emp_telefono` varchar(20) NOT NULL,
  `emp_cargo` varchar(20) NOT NULL,
  `emp_estado` varchar(20) NOT NULL,
  `usu_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`emp_id`, `emp_nombres`, `emp_apellidos`, `emp_documento`, `emp_telefono`, `emp_cargo`, `emp_estado`, `usu_id`) VALUES
(1, 'HENRY DANIEL', 'CARVAJAL AGUILAR', '1127600677', '3212554914', 'ADMINISTRADOR', 'ACTIVO', 1),
(2, 'BRAYAM', 'BLANCO', '122131345', '421255491', 'DOMICILIARIO', 'ACTIVO', 2),
(3, 'ERVIN ERNEY ', 'PENNA CARDENAS', '1003232365', '3666852', 'EMPLEADO', 'ACTIVO', 3),
(5, 'ESTEBAN', 'CASTELLAR', '12546526', '310424554', 'EMPLEADO', 'ACTIVO', 5),
(6, 'JHONATAN', 'BOHORQUEZ', '1245252154', '304524452', 'EMPLEADO', 'ACTIVO', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia_prima`
--

CREATE TABLE `materia_prima` (
  `mp_id` int(11) NOT NULL,
  `mp_nombre` varchar(50) NOT NULL,
  `mp_cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `materia_prima`
--

INSERT INTO `materia_prima` (`mp_id`, `mp_nombre`, `mp_cantidad`) VALUES
(1, 'QUESO', 20),
(2, 'JAMON', 30),
(4, 'ACEITE', 35),
(5, 'HARINA', 19),
(6, 'MANTEQUILLA', 80);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `ped_id` int(11) NOT NULL,
  `ped_fecha_entrega` date NOT NULL,
  `ped_hora_entrega` time NOT NULL,
  `ped_direccion` varchar(30) NOT NULL,
  `ped_total` int(11) NOT NULL,
  `ped_estado` varchar(50) NOT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `clie_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`ped_id`, `ped_fecha_entrega`, `ped_hora_entrega`, `ped_direccion`, `ped_total`, `ped_estado`, `emp_id`, `clie_id`) VALUES
(3, '2020-11-27', '10:30:00', 'CRA 94D CALLE 131 ', 1570000, 'NO ENTREGADO', 1, 15),
(4, '2020-12-04', '17:23:00', 'SUBA RINCON 02-45', 15000, 'PENDIENTE', 1, 17),
(7, '2020-11-27', '18:00:00', 'SUBA RINCON 89-23', 195000, 'NO ENTREGADO', 1, 6),
(8, '2020-11-27', '00:17:00', 'SUBA RINCON 92-12', 95000, 'NO ENTREGADO', 1, 15),
(81, '2020-12-02', '10:50:00', 'CRA 54 #45', 85000, 'NO ENTREGADO', 1, 18),
(83, '2020-11-27', '11:59:00', 'CRA 54 #45', 187000, 'PENDIENTE', 1, 22),
(84, '2020-11-27', '12:18:00', 'CRA 54 #45', 35000, 'ENTREGADO', 1, 15),
(85, '2020-11-27', '20:30:00', 'CRA 54 #45', 121500, 'NO ENTREGADO', 1, 14),
(86, '2020-11-27', '18:42:00', 'CRA 54 #45', 120000, 'NO ENTREGADO', 1, 19),
(87, '2021-01-03', '18:26:00', 'SUBA RINCON 87-21', 0, 'PENDIENTE', 1, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `produccion`
--

CREATE TABLE `produccion` (
  `prod_id` int(11) NOT NULL,
  `prod_fecha` date NOT NULL,
  `emp_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `produccion`
--

INSERT INTO `produccion` (`prod_id`, `prod_fecha`, `emp_id`) VALUES
(1, '2020-10-22', 1),
(5, '2020-10-27', 1),
(6, '2020-10-30', 1),
(7, '2020-10-30', 1),
(8, '2020-10-30', 1),
(9, '2020-11-24', 1),
(10, '2020-11-24', 1),
(11, '2020-12-03', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producido`
--

CREATE TABLE `producido` (
  `produ_id` int(11) NOT NULL,
  `produ_cantidad_producida` int(11) NOT NULL,
  `pro_id` int(11) DEFAULT NULL,
  `prod_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producido`
--

INSERT INTO `producido` (`produ_id`, `produ_cantidad_producida`, `pro_id`, `prod_id`) VALUES
(1, 10, 3, 1),
(2, 30, 3, 5),
(3, 50, 5, 7),
(4, 20, 4, 8),
(5, 30, 3, 9);

--
-- Disparadores `producido`
--
DELIMITER $$
CREATE TRIGGER `Sumarle_Cantidad_Producida` AFTER INSERT ON `producido` FOR EACH ROW BEGIN
UPDATE productos set pro_cantidad_existente=pro_cantidad_existente+new.produ_cantidad_producida where pro_id=new.pro_id; 

  END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `pro_id` int(11) NOT NULL,
  `pro_nombre` varchar(32) NOT NULL,
  `pro_descripcion` varchar(20) NOT NULL,
  `pro_precio` int(11) NOT NULL,
  `pro_cantidad_existente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`pro_id`, `pro_nombre`, `pro_descripcion`, `pro_precio`, `pro_cantidad_existente`) VALUES
(1, 'EMPANADA', 'EMPANADA DE QUESO', 4500, 80),
(2, 'AREPA', 'AREPA DE HUEVO', 2500, 32),
(3, 'AREPA', 'AREPA DE QUESO', 5000, 40),
(4, 'EMPANADA', 'EMPANADA DE POLLO', 5000, 80),
(5, 'EMPANADA', 'EMPANADA JAMON', 2000, 69),
(6, 'EMPANADA', 'EMPANADA DE HUEVO', 1500, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `prov_id` int(11) NOT NULL,
  `prov_nombres` varchar(50) NOT NULL,
  `prov_apellidos` varchar(50) NOT NULL,
  `prov_documento` varchar(20) NOT NULL,
  `prov_telefono` varchar(20) NOT NULL,
  `prov_estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`prov_id`, `prov_nombres`, `prov_apellidos`, `prov_documento`, `prov_telefono`, `prov_estado`) VALUES
(2, 'DANILO', 'JOSE', '1127600677', '321255491', 'INACTIVO'),
(8, 'GREGORIO ', 'RAMIREZ', '3542626226', '326462626', 'ACTIVO'),
(9, 'FRANCISCO', 'JAMIOY', '262656513', '132365526', 'ACTIVO'),
(10, 'ROSA', 'JULIAO', '32662565', '332332356', 'ACTIVO'),
(11, 'ESTEFANIA', 'DIAZ', '212326266', '312166266', 'ACTIVO'),
(12, 'KAREN', 'DIAZ', '3221516', '3466265936', 'ACTIVO'),
(13, 'JESSICA', 'ABRIL', '122656266', '32125956', 'INACTIVO'),
(16, 'JAVIER', 'BLANCO', '12546526', '31855644', 'ACTIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte`
--

CREATE TABLE `reporte` (
  `rep_id` int(11) NOT NULL,
  `rep_problema` varchar(100) NOT NULL,
  `rep_estado` varchar(50) NOT NULL,
  `rep_fecha` date DEFAULT NULL,
  `ped_id` int(11) DEFAULT NULL,
  `emp_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reporte`
--

INSERT INTO `reporte` (`rep_id`, `rep_problema`, `rep_estado`, `rep_fecha`, `ped_id`, `emp_id`) VALUES
(1, 'buena', 'NO ENTREGADO', '2020-11-26', 7, 1),
(2, 'se daño la cicla', 'NO ENTREGADO', '2020-11-26', 7, 2),
(3, 'paila mi socio', 'NO ENTREGADO', '2020-11-26', 86, 2),
(4, 'paila x2', 'NO ENTREGADO', '2020-11-26', 85, 2),
(5, 'se pincho la cicla', 'NO ENTREGADO', '2020-11-27', 8, 2),
(6, 'se pincho la cicla', 'NO ENTREGADO', '2020-12-02', 81, 2);

--
-- Disparadores `reporte`
--
DELIMITER $$
CREATE TRIGGER `CambiarEstado` AFTER INSERT ON `reporte` FOR EACH ROW BEGIN
UPDATE pedidos set ped_estado=new.rep_estado where ped_id=new.ped_id; 

  END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usu_id` int(11) NOT NULL,
  `usu_correo` varchar(32) DEFAULT NULL,
  `usu_clave` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usu_id`, `usu_correo`, `usu_clave`) VALUES
(1, 'henrycarvajalhannie@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(2, 'brayanjm379@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(3, 'ervinpenna@gmail.com', '$2y$10$aG7CtSSNL3cRu0VSUp183.kxI'),
(5, 'es.jo.castellar@gmail.com', '1927fb28f6ae212585a55afc1673e90d'),
(6, 'jbohorquemadrid02@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`clie_id`),
  ADD UNIQUE KEY `Duplicaste_El_Campo_Documento` (`clie_documento`),
  ADD UNIQUE KEY `Duplicaste_El_Campo_Telefono` (`clie_telefono`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`comp_id`),
  ADD KEY `emp_id` (`emp_id`),
  ADD KEY `prov_id` (`prov_id`);

--
-- Indices de la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD PRIMARY KEY (`dep_id`),
  ADD KEY `pro_id` (`pro_id`),
  ADD KEY `ped_id` (`ped_id`);

--
-- Indices de la tabla `detalle_produccion`
--
ALTER TABLE `detalle_produccion`
  ADD PRIMARY KEY (`deta_id`),
  ADD KEY `mp_id` (`mp_id`),
  ADD KEY `prod_id` (`prod_id`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`emp_id`),
  ADD UNIQUE KEY `Duplicaste_El_Campo_Telefono` (`emp_telefono`),
  ADD UNIQUE KEY `Duplicaste_El_Campo_Documento` (`emp_documento`),
  ADD KEY `usu_id` (`usu_id`);

--
-- Indices de la tabla `materia_prima`
--
ALTER TABLE `materia_prima`
  ADD PRIMARY KEY (`mp_id`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`ped_id`),
  ADD KEY `emp_id` (`emp_id`),
  ADD KEY `clie_id` (`clie_id`);

--
-- Indices de la tabla `produccion`
--
ALTER TABLE `produccion`
  ADD PRIMARY KEY (`prod_id`),
  ADD KEY `emp_id` (`emp_id`);

--
-- Indices de la tabla `producido`
--
ALTER TABLE `producido`
  ADD PRIMARY KEY (`produ_id`),
  ADD KEY `pro_id` (`pro_id`),
  ADD KEY `prod_id` (`prod_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`prov_id`),
  ADD UNIQUE KEY `Duplicaste_El_Campo_Telefono` (`prov_telefono`),
  ADD UNIQUE KEY `Duplicaste_El_Campo_Documento` (`prov_documento`);

--
-- Indices de la tabla `reporte`
--
ALTER TABLE `reporte`
  ADD PRIMARY KEY (`rep_id`),
  ADD KEY `ped_id` (`ped_id`),
  ADD KEY `emp_id` (`emp_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usu_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `clie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `comp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  MODIFY `dep_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT de la tabla `detalle_produccion`
--
ALTER TABLE `detalle_produccion`
  MODIFY `deta_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `materia_prima`
--
ALTER TABLE `materia_prima`
  MODIFY `mp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `ped_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT de la tabla `produccion`
--
ALTER TABLE `produccion`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `producido`
--
ALTER TABLE `producido`
  MODIFY `produ_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `prov_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `reporte`
--
ALTER TABLE `reporte`
  MODIFY `rep_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `empleados` (`emp_id`),
  ADD CONSTRAINT `compras_ibfk_2` FOREIGN KEY (`prov_id`) REFERENCES `proveedores` (`prov_id`);

--
-- Filtros para la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD CONSTRAINT `detalle_pedido_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `productos` (`pro_id`),
  ADD CONSTRAINT `detalle_pedido_ibfk_2` FOREIGN KEY (`ped_id`) REFERENCES `pedidos` (`ped_id`);

--
-- Filtros para la tabla `detalle_produccion`
--
ALTER TABLE `detalle_produccion`
  ADD CONSTRAINT `detalle_produccion_ibfk_1` FOREIGN KEY (`mp_id`) REFERENCES `materia_prima` (`mp_id`),
  ADD CONSTRAINT `detalle_produccion_ibfk_2` FOREIGN KEY (`prod_id`) REFERENCES `produccion` (`prod_id`);

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `empleados_ibfk_1` FOREIGN KEY (`usu_id`) REFERENCES `usuarios` (`usu_id`);

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `empleados` (`emp_id`),
  ADD CONSTRAINT `pedidos_ibfk_2` FOREIGN KEY (`clie_id`) REFERENCES `clientes` (`clie_id`);

--
-- Filtros para la tabla `produccion`
--
ALTER TABLE `produccion`
  ADD CONSTRAINT `produccion_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `empleados` (`emp_id`);

--
-- Filtros para la tabla `producido`
--
ALTER TABLE `producido`
  ADD CONSTRAINT `producido_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `productos` (`pro_id`),
  ADD CONSTRAINT `producido_ibfk_2` FOREIGN KEY (`prod_id`) REFERENCES `produccion` (`prod_id`);

--
-- Filtros para la tabla `reporte`
--
ALTER TABLE `reporte`
  ADD CONSTRAINT `reporte_ibfk_1` FOREIGN KEY (`ped_id`) REFERENCES `pedidos` (`ped_id`),
  ADD CONSTRAINT `reporte_ibfk_2` FOREIGN KEY (`emp_id`) REFERENCES `empleados` (`emp_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
