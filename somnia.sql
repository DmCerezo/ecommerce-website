-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-05-2025 a las 18:43:57
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `somnia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL DEFAULT 1,
  `precio_unitario` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `fecha_venta` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`id`, `usuario_id`, `producto_id`, `cantidad`, `precio_unitario`, `total`, `fecha_venta`) VALUES
(32, 1, 3, 1, 135.00, 135.00, '2025-05-27 18:18:45'),
(33, 1, 1, 2, 100.00, 200.00, '2025-05-27 18:28:59'),
(34, 1, 2, 1, 110.00, 110.00, '2025-05-27 18:34:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `imagen_url` varchar(255) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  `tamaño` varchar(50) DEFAULT NULL,
  `funcionalidades` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`, `stock`, `imagen_url`, `color`, `tamaño`, `funcionalidades`) VALUES
(1, 'Manta Calm Plus', 'Ideal para reducir el estrés diario gracias a su peso terapéutico y confort.', 100.00, 10, 'images/Manta1.png', 'Gris', 'Individual', 'Peso terapéutico'),
(2, 'Somnia Heat & Sound', 'Combina calor suave y sonido envolvente para una noche de descanso completa.', 110.00, 8, 'images/Manta4.png', 'Azul', 'Queen', 'Calor, sonido'),
(3, 'SmartVibe Blanket', 'Perfecta para quienes buscan relajación profunda con tecnología avanzada.', 135.00, 5, 'images/Manta5.png', 'Blanco', 'King', 'Vibración, app'),
(4, 'Somnia DreamWave', 'Manta con peso que combina vibraciones rítmicas y sonidos de la naturaleza para un sueño reparador.', 120.00, 12, 'images/Manta6.png', 'Verde Bosque', 'Individual', 'Vibración rítmica, sonidos naturales'),
(5, 'CozyTech Comfort', 'Manta con calor ajustable y conectividad Bluetooth para personalizar tu experiencia de relajación desde tu teléfono.', 145.00, 7, 'images/Manta3.png', 'Beige', 'Queen', 'Calor ajustable, Bluetooth'),
(6, 'Tranquil Sleep Pro', 'Manta con peso avanzada con sensores de presión y app móvil para monitorear y mejorar tu calidad de sueño.', 180.00, 5, 'images/Manta7.png', 'Negro', 'King', 'Sensores de presión, app móvil'),
(7, 'RelaxZen Audio', 'Manta ligera con altavoces integrados y peso terapéutico para disfrutar de meditaciones guiadas o música relajante.', 95.00, 15, 'images/Manta8.png', 'Lavanda', 'Individual', 'Altavoces integrados, peso ligero');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fecha_registro` datetime DEFAULT current_timestamp(),
  `telefono` varchar(20) DEFAULT NULL,
  `direccion_facturacion` text DEFAULT NULL,
  `direccion_entrega` text DEFAULT NULL,
  `codigo_postal` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `password`, `fecha_registro`, `telefono`, `direccion_facturacion`, `direccion_entrega`, `codigo_postal`) VALUES
(1, 'prueba', 'prueba@somnia.com', '1234', '2025-05-20 21:13:53', NULL, NULL, NULL, NULL),
(9, 'pepe', 'pepe@gmail.com', '1234', '2025-05-27 17:07:30', '65234324', 'Avenida Juaquina Eguaras 13 5A', 'Avenida Juaquina Eguaras 13 5A', '18013');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `producto_id` (`producto_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `carrito_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
