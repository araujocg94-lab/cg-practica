-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-02-2017 a las 04:09:13
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prueba`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `nombre_cliente` varchar(100) NOT NULL,
  `ci_cliente` varchar(15) NOT NULL,
  `telefono_cliente` char(30) NOT NULL,
  `email_cliente` varchar(64) NOT NULL,
  `direccion_cliente` varchar(255) NOT NULL,
  `tipo_cliente` tinyint(4) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nombre_cliente`, `ci_cliente`, `telefono_cliente`, `email_cliente`, `direccion_cliente`, `tipo_cliente`, `date_added`) VALUES
(2, 'luis', '4454', '115', 'ca@hotmail', '111', 0, '2017-01-08 17:28:37'),
(3, 'henry', '458745', '123456', 'car@hotmail.com', '77855', 1, '2017-01-08 17:56:03'),
(4, 'selia', '45675675', '0243-743322', 'selia@hotmail.com', 'dd 27', 1, '2017-01-19 03:30:59');

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
  `total_compra` varchar(20) NOT NULL,
  `estado_compra` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id_compra`, `numero_compra`, `fecha_compra`, `id_prov`, `id_vendedor`, `condiciones`, `total_compra`, `estado_compra`) VALUES
(6, 3, '2017-02-18 04:02:45', 1, 1, '1', '224', 1),
(7, 4, '2017-02-18 04:03:14', 1, 1, '1', '672', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_compra`
--

CREATE TABLE `detalle_compra` (
  `id_detalle` int(11) NOT NULL,
  `numero_compra` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `descuento_compra` double(3,2) DEFAULT NULL,
  `costo_compra` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_factura`
--

CREATE TABLE `detalle_factura` (
  `id_detalle` int(11) NOT NULL,
  `numero_factura` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `descuento_venta` double(3,2) DEFAULT NULL,
  `precio_venta` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detalle_factura`
--

INSERT INTO `detalle_factura` (`id_detalle`, `numero_factura`, `id_producto`, `cantidad`, `descuento_venta`, `precio_venta`) VALUES
(2, 1, 1, 1, 0.00, 12),
(3, 2, 1, 1, 0.00, 12),
(4, 3, 2, 1, 0.00, 240.22),
(5, 3, 1, 1, 0.00, 12),
(6, 4, 1, 1, 0.00, 12),
(7, 5, 1, 1, 0.00, 12),
(8, 5, 2, 1, 0.00, 240.22),
(13, 8, 1, 1, 0.00, 12),
(10, 7, 1, 1, 0.00, 12),
(11, 7, 2, 1, 0.00, 240.22),
(12, 7, 3, 1, 0.00, 214),
(14, 9, 1, 1, 0.00, 12);

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
  `total_venta` varchar(20) NOT NULL,
  `estado_factura` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `facturas`
--

INSERT INTO `facturas` (`id_factura`, `numero_factura`, `fecha_factura`, `id_cliente`, `id_vendedor`, `condiciones`, `total_venta`, `estado_factura`) VALUES
(2, 1, '2017-01-08 01:13:25', 1, 1, '1', '13.44', 1),
(3, 2, '2017-01-08 01:21:46', 1, 1, '1', '13.44', 1),
(4, 3, '2017-01-08 22:31:07', 2, 1, '1', '282.49', 1),
(5, 4, '2017-01-09 00:35:09', 2, 1, '1', '13.44', 1),
(6, 5, '2017-01-15 21:46:49', 2, 1, '1', '282.49', 1),
(9, 8, '2017-01-19 23:11:28', 2, 1, '1', '13.44', 1),
(8, 7, '2017-01-19 03:31:21', 4, 1, '1', '522.17', 1),
(11, 9, '2017-02-18 03:23:13', 2, 1, '1', '13.44', 1);

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
  `descuento_producto` double(3,2) DEFAULT NULL,
  `precio_producto` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `codigo_producto`, `nombre_producto`, `descripcion_producto`, `imagen_producto`, `cantidad_producto`, `tipo_producto`, `date_added`, `costo_producto`, `descuento_producto`, `precio_producto`) VALUES
(1, '123', 'caja', 'ffgfgfg', NULL, 0, 0, '2017-01-07 00:19:19', 200, 0.00, 12),
(2, '22', 'ropa', 'hgfghfg', NULL, 0, 0, '2017-01-07 01:45:17', 0, 0.00, 240.22),
(3, '125', 'vestido', 'fgfgf', NULL, 0, 0, '2017-01-16 02:15:52', 0, 0.00, 214);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id_prov` int(11) NOT NULL,
  `nombre_prov` varchar(100) NOT NULL,
  `ci_prov` varchar(15) NOT NULL,
  `telefono_prov` char(30) NOT NULL,
  `email_prov` varchar(64) NOT NULL,
  `direccion_prov` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id_prov`, `nombre_prov`, `ci_prov`, `telefono_prov`, `email_prov`, `direccion_prov`, `date_added`) VALUES
(1, 'empresa', 'j-125487', '1155454', 'eeea@hotmail', '45445k', '2017-01-08 00:00:00'),
(2, 'zapateria', '15487', '11558871', '11@hotmail', '4564548', '2017-02-17 01:18:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmp`
--

CREATE TABLE `tmp` (
  `id_tmp` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad_tmp` int(11) NOT NULL,
  `descuento_tmp` double(3,2) DEFAULT NULL,
  `precio_tmp` double(8,2) DEFAULT NULL,
  `session_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tmp`
--

INSERT INTO `tmp` (`id_tmp`, `id_producto`, `cantidad_tmp`, `descuento_tmp`, `precio_tmp`, `session_id`) VALUES
(26, 1, 1, NULL, 12.00, 'm5bk7aiokpes7rcpr3b6m9qeu7'),
(44, 1, 1, NULL, 12.00, 'hjrfq6t8qqetvt5n33jh23kne3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmp_compra`
--

CREATE TABLE `tmp_compra` (
  `id_tmp` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad_tmp` int(11) NOT NULL,
  `descuento_com` double(3,2) DEFAULT NULL,
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
(1, 'carlos', 'araujo', 'admin', '$2y$10$MPVHzZ2ZPOWmtUUGCq3RXu31OTB.jo7M9LZ7PmPQYmgETSNn19ejO', 'admin@admin.com', 1, '2016-05-21 15:06:00'),
(2, 'car', 'ara', 'cg', '$2y$10$dNS.7nA8zTcIRVVohqLgnujNfpr64D7QeroE2yMZjI39UpgYGNSHi', '12@12.com', 2, '2017-01-07 02:12:15'),
(3, 'betty', 'reyes', 'bet', '$2y$10$m40otm6Y9cO44HTRwAHpt.FPDziYceZscYN769zU1b3nbbyr6SUea', 'bet@hotmail.com', 0, '2017-02-17 00:55:59');

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
  ADD KEY `numero_compra` (`numero_compra`),
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
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `detalle_factura`
--
ALTER TABLE `detalle_factura`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `facturas`
--
ALTER TABLE `facturas`
  MODIFY `id_factura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id_prov` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tmp`
--
ALTER TABLE `tmp`
  MODIFY `id_tmp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT de la tabla `tmp_compra`
--
ALTER TABLE `tmp_compra`
  MODIFY `id_tmp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto incrementing user_id of each user, unique index', AUTO_INCREMENT=4;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`id_vendedor`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `compras_ibfk_2` FOREIGN KEY (`id_prov`) REFERENCES `proveedor` (`id_prov`) ON DELETE CASCADE;

--
-- Filtros para la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  ADD CONSTRAINT `detalle_compra_ibfk_1` FOREIGN KEY (`numero_compra`) REFERENCES `compras` (`numero_compra`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
