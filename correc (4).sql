-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-03-2017 a las 14:29:34
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `correc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `nombre_cliente` varchar(100) NOT NULL,
  `ci_cliente` varchar(15) NOT NULL,
  `telefono_cliente` varchar(30) DEFAULT NULL,
  `email_cliente` varchar(64) DEFAULT NULL,
  `direccion_cliente` varchar(255) DEFAULT NULL,
  `date_added` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nombre_cliente`, `ci_cliente`, `telefono_cliente`, `email_cliente`, `direccion_cliente`, `date_added`) VALUES
(2, 'luis', 'V4454557', '1151234', 'ca@hotmail', '111', '2017-01-08 17:28:37'),
(3, 'henry', 'V4587454', '1234567', 'car@hotmail.com', '77855', '2017-01-08 17:56:03'),
(4, 'selia', 'V45675675', '0243743322', 'selia@hotmail.com', 'dd 27', '2017-01-19 03:30:59'),
(5, 'betty reyes', 'V23456789', '7489467', '11@hotmail', 'ffhgfghfghfhgh', '2017-02-28 02:19:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id_compra` int(11) NOT NULL,
  `numero_compra` int(11) NOT NULL,
  `fecha_compra` datetime NOT NULL,
  `id_prov` int(11) NOT NULL,
  `id_vendedor` int(11) NOT NULL,
  `condiciones` varchar(30) NOT NULL,
  `total_compra` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id_compra`, `numero_compra`, `fecha_compra`, `id_prov`, `id_vendedor`, `condiciones`, `total_compra`) VALUES
(30, 2, '2017-02-21 01:48:45', 2, 1, '1', '224'),
(31, 3, '2017-02-21 01:49:56', 2, 1, '1', '1120'),
(32, 4, '2017-02-21 01:54:15', 2, 1, '1', '4256'),
(33, 5, '2017-02-21 02:47:08', 1, 1, '1', '87137.12'),
(34, 6, '2017-02-21 23:44:07', 1, 1, '1', '14050.4'),
(35, 7, '2017-02-26 13:27:30', 1, 0, '1', '14050.4'),
(36, 8, '2017-02-26 13:28:22', 1, 0, '1', '13826.4'),
(37, 9, '2017-02-26 13:29:13', 1, 1, '1', '87137.12'),
(38, 10, '2017-03-05 21:13:13', 1, 1, '1', '13440'),
(39, 11, '2017-03-12 03:13:12', 1, 1, '1', '2240');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_compra`
--

CREATE TABLE `detalle_compra` (
  `id_detalle` int(11) NOT NULL,
  `numero_compra` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `costo_compra` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle_compra`
--

INSERT INTO `detalle_compra` (`id_detalle`, `numero_compra`, `id_producto`, `cantidad`, `costo_compra`) VALUES
(61, 2, 1, 1, 200),
(64, 3, 1, 5, 200),
(65, 4, 1, 19, 200),
(66, 5, 12, 1, 12345),
(67, 5, 13, 1, 65456),
(68, 6, 1, 1, 200),
(69, 6, 12, 1, 12345),
(70, 7, 1, 1, 200),
(71, 7, 12, 1, 12345),
(72, 8, 12, 1, 12345),
(73, 9, 13, 1, 65456),
(74, 9, 12, 1, 12345),
(75, 10, 1, 1, 2000),
(76, 10, 12, 1, 12000),
(77, 11, 1, 1, 2000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_factura`
--

CREATE TABLE `detalle_factura` (
  `id_detalle` int(11) NOT NULL,
  `numero_factura` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `descuento_venta` double DEFAULT NULL,
  `precio_venta` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detalle_factura`
--

INSERT INTO `detalle_factura` (`id_detalle`, `numero_factura`, `id_producto`, `cantidad`, `descuento_venta`, `precio_venta`) VALUES
(2, 1, 1, 1, 0, 12),
(3, 2, 1, 1, 0, 12),
(4, 3, 2, 1, 0, 240.22),
(5, 3, 1, 1, 0, 12),
(6, 4, 1, 1, 0, 12),
(7, 5, 1, 1, 0, 12),
(8, 5, 2, 1, 0, 240.22),
(13, 8, 1, 1, 0, 12),
(10, 7, 1, 1, 0, 12),
(11, 7, 2, 1, 0, 240.22),
(12, 7, 3, 1, 0, 214),
(14, 9, 1, 1, 0, 12),
(22, 10, 3, 1, 0, 214),
(21, 10, 1, 1, 0, 12),
(20, 10, 3, 1, 0, 214),
(19, 10, 1, 5, 0, 12),
(23, 10, 1, 1, 0, 12),
(24, 11, 1, 1, 0, 12),
(40, 15, 12, 1, 0, 200),
(41, 15, 12, 1, 0, 14532),
(39, 14, 1, 1, 5, 12),
(42, 16, 1, 1, 0, 5000),
(43, 16, 1, 1, 0, 5000),
(44, 16, 1, 1, 0, 5000),
(45, 16, 12, 1, 2, 20000),
(46, 16, 12, 1, 2, 20000),
(47, 17, 12, 1, 2, 20000),
(48, 18, 12, 3, 2, 20000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `id_factura` int(11) NOT NULL,
  `numero_factura` int(11) NOT NULL,
  `fecha_factura` datetime NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_vendedor` int(11) NOT NULL,
  `condiciones` varchar(30) NOT NULL,
  `total_venta` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `facturas`
--

INSERT INTO `facturas` (`id_factura`, `numero_factura`, `fecha_factura`, `id_cliente`, `id_vendedor`, `condiciones`, `total_venta`) VALUES
(4, 3, '2017-01-08 22:31:07', 2, 8, '1', '282.49'),
(5, 4, '2017-01-09 00:35:09', 2, 1, '1', '13.44'),
(6, 5, '2017-01-15 21:46:49', 2, 1, '1', '282.49'),
(9, 8, '2017-01-19 23:11:28', 2, 1, '1', '13.44'),
(8, 7, '2017-01-19 03:31:21', 4, 1, '1', '522.17'),
(11, 9, '2017-02-18 03:23:13', 2, 1, '1', '13.44'),
(13, 10, '2017-02-19 04:59:22', 2, 1, '1', '573.44'),
(14, 11, '2017-02-19 05:06:30', 2, 1, '1', '13.44'),
(20, 15, '2017-02-21 02:26:33', 3, 1, '1', '16499.84'),
(19, 14, '2017-02-19 19:24:13', 2, 1, '1', '7.84'),
(21, 16, '2017-03-05 21:12:38', 2, 1, '1', '20160'),
(22, 17, '2017-03-05 21:25:21', 2, 1, '1', '20160'),
(23, 18, '2017-03-05 22:09:03', 2, 1, '1', '64960');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `codigo_producto` char(20) NOT NULL,
  `nombre_producto` char(255) NOT NULL,
  `descripcion_producto` varchar(500) DEFAULT NULL,
  `imagen_producto` text,
  `cantidad_producto` int(11) NOT NULL,
  `tipo_producto` tinyint(4) NOT NULL,
  `date_added` datetime NOT NULL,
  `costo_producto` double NOT NULL,
  `descuento_producto` double DEFAULT NULL,
  `precio_producto` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `codigo_producto`, `nombre_producto`, `descripcion_producto`, `imagen_producto`, `cantidad_producto`, `tipo_producto`, `date_added`, `costo_producto`, `descuento_producto`, `precio_producto`) VALUES
(1, '12225488', 'Body 99', 'Body de bebe de camuflaje.', 'catalogo/12225488.jpg', 16, 1, '2017-02-01 00:00:00', 1000, 0, 5000),
(12, '23123234', 'Vestido corto', 'vestido corto, color negro, talla Ãºnica.', 'catalogo/23123234.jpg', 31, 3, '2017-02-19 15:37:42', 12000, 2000, 20000),
(13, '41234874', 'Blusa amarilla', 'blusa color amarillo de seda tallas s, l, m.', 'catalogo/41234874.jpg', 30, 3, '2017-02-19 15:44:04', 3000, 1000, 10000),
(18, '21458745', 'Camisa Bicolor', 'Camisa negro y rojo, cuello alto tallas x y s', 'catalogo/21458745.jpg', 15, 2, '2017-02-26 00:45:10', 25, 0, 15000),
(19, '1597845', 'Chaqueta azul', 'Chaqueta azul de gamuza, talla unica', 'catalogo/1597845.jpg', 20, 2, '2017-02-28 02:09:48', 15000, 0, 30000),
(20, '5587489', 'Camisa blanca', 'camisa blanca cuello alto.', 'catalogo/5587489.jpg', 5, 2, '2017-02-28 02:15:02', 10000, 2000, 15000),
(21, '58748999', 'Mono rojo', 'Mono deportivo juvenil.', 'catalogo/58748999.jpg', 5, 0, '2017-02-28 02:28:45', 10500, 0, 20000),
(22, 'ss55', 'SuÃ©ter azul.', 'SuÃ©ter abrigado color azul.', 'catalogo/ss55.jpg', 20, 2, '2017-02-28 02:31:00', 5000, 1000, 15000),
(23, 'gg487', 'Chaqueta a rayas', 'Chaqueta abrigada, color azul con rayas rojas.  ', 'catalogo/gg487.jpg', 10, 0, '2017-02-28 02:33:21', 10000, 1000, 20000),
(24, '58744kk', 'Pijama minni', 'Pijama de minni mause color rosado.', 'catalogo/58744kk.jpg', 6, 1, '2017-02-28 02:37:40', 15000, 2000, 30000),
(25, '58788', 'Body rosado', 'Body para bebes color rosado.', 'catalogo/58788.jpg', 6, 1, '2017-02-28 02:39:23', 5000, 0, 10000),
(26, '88941', 'Camisa a cudro Thomas', 'Camisa a cuadros de thomas el tren.', 'catalogo/88941.jpg', 6, 1, '2017-02-28 02:41:07', 5000, 0, 15000),
(28, '15487', 'Camisa a cuadros', 'Camisa larga manga corta a cuadros', 'catalogo/15487.jpg', 16, 0, '2017-03-12 00:22:35', 5000, 5000, 10000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id_prov` int(11) NOT NULL,
  `nombre_prov` varchar(100) NOT NULL,
  `ci_prov` varchar(15) NOT NULL,
  `telefono_prov` varchar(30) NOT NULL,
  `email_prov` varchar(64) NOT NULL,
  `direccion_prov` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id_prov`, `nombre_prov`, `ci_prov`, `telefono_prov`, `email_prov`, `direccion_prov`, `date_added`) VALUES
(1, 'empresa', 'J12345678', '1155454', 'eeea@hotmail', '45445k', '2017-01-08 00:00:00'),
(2, 'zapateria', 'V12358445', '11558871', '11@hotmail', '4564548', '2017-02-17 01:18:50'),
(3, 'gama', 'J123456789', '11558871', '11@hotmail', 'khjkhjkhj', '2017-03-12 02:24:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmp`
--

CREATE TABLE `tmp` (
  `id_tmp` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad_tmp` int(11) NOT NULL,
  `descuento_tmp` double DEFAULT NULL,
  `precio_tmp` double(8,2) DEFAULT NULL,
  `session_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmp_compra`
--

CREATE TABLE `tmp_compra` (
  `id_tmp` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad_tmp` int(11) NOT NULL,
  `costo_tmp` double(8,2) DEFAULT NULL,
  `session_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL COMMENT 'auto incrementing user_id of each user, unique index',
  `nombre` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `user_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s name, unique',
  `user_password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s password in salted and hashed format',
  `user_email` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s email, unique',
  `user_tipo` tinyint(4) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='user data';

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user_id`, `nombre`, `apellido`, `user_name`, `user_password_hash`, `user_email`, `user_tipo`, `date_added`) VALUES
(1, 'carlos', 'araujo', 'admin', '$2y$10$Jx6XEphhg5bqF9veMStTKOIrr8gdH8kGJUjwXVWZ9sVVQsdCObdiG', 'admin@hotmail.com', 1, '2017-03-06 00:11:34'),
(8, 'betty', 'fuenmayor', 'bet', '$2y$10$S/UaPdJeFHkT.rQXsDp.MOLEgfRzJJie/125q0/qZrKjgFysJiNba', 'bet@hotmail.com', 0, '2017-03-06 00:39:38'),
(10, 'selene', 'marcano', 'sele', '$2y$10$nzZuyXFhCPrF1ISCCdFYvO9dc6pu743WAtHX.0amDaIKOg6IcUcVK', 'sele@12.com', 0, '2017-03-06 01:32:43');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`),
  ADD UNIQUE KEY `codigo_producto` (`ci_cliente`),
  ADD UNIQUE KEY `nombre_cliente` (`ci_cliente`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id_compra`),
  ADD UNIQUE KEY `numero_compra` (`numero_compra`),
  ADD KEY `id_provedor` (`id_prov`),
  ADD KEY `id_vendedor` (`id_vendedor`);

--
-- Indices de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  ADD PRIMARY KEY (`id_detalle`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `detalle_factura`
--
ALTER TABLE `detalle_factura`
  ADD PRIMARY KEY (`id_detalle`),
  ADD KEY `numero_cotizacion` (`numero_factura`,`id_producto`);

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`id_factura`),
  ADD UNIQUE KEY `numero_cotizacion` (`numero_factura`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD UNIQUE KEY `codigo_producto` (`codigo_producto`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id_prov`),
  ADD UNIQUE KEY `ci_prov` (`ci_prov`);

--
-- Indices de la tabla `tmp`
--
ALTER TABLE `tmp`
  ADD PRIMARY KEY (`id_tmp`);

--
-- Indices de la tabla `tmp_compra`
--
ALTER TABLE `tmp_compra`
  ADD PRIMARY KEY (`id_tmp`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
--
-- AUTO_INCREMENT de la tabla `detalle_factura`
--
ALTER TABLE `detalle_factura`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT de la tabla `facturas`
--
ALTER TABLE `facturas`
  MODIFY `id_factura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id_prov` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tmp`
--
ALTER TABLE `tmp`
  MODIFY `id_tmp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=275;
--
-- AUTO_INCREMENT de la tabla `tmp_compra`
--
ALTER TABLE `tmp_compra`
  MODIFY `id_tmp` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto incrementing user_id of each user, unique index', AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
