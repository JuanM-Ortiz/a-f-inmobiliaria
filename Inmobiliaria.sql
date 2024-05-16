-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-05-2024 a las 05:32:48
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inmob`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ambientes`
--

CREATE TABLE `ambientes` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ambientes`
--

INSERT INTO `ambientes` (`id`, `descripcion`, `deleted_at`) VALUES
(2, 'Cocina', NULL),
(3, 'Baño', NULL),
(4, 'Balcón', NULL),
(5, 'Cochera', NULL),
(6, 'Lavadero', NULL),
(7, 'Living comedor', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comodidades`
--

CREATE TABLE `comodidades` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `comodidades`
--

INSERT INTO `comodidades` (`id`, `descripcion`, `deleted_at`) VALUES
(1, 'Piscina', NULL),
(2, 'Parrila', NULL),
(3, 'Aire Acondicionado', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localidades`
--

CREATE TABLE `localidades` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `localidades`
--

INSERT INTO `localidades` (`id`, `descripcion`, `deleted_at`) VALUES
(3, 'Merlo', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propiedades`
--

CREATE TABLE `propiedades` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `id_tipo_propiedad` int(11) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `superficie_cubierta` int(11) DEFAULT NULL,
  `superficie` int(11) DEFAULT NULL,
  `pisos` int(11) DEFAULT NULL,
  `dormitorios` int(11) DEFAULT NULL,
  `baños` int(11) DEFAULT NULL,
  `id_localidad` int(11) DEFAULT NULL,
  `id_zona` int(11) DEFAULT NULL,
  `disponible` tinyint(1) DEFAULT NULL,
  `maps_url` text DEFAULT NULL,
  `video` text DEFAULT NULL,
  `codigo` varchar(255) DEFAULT NULL,
  `imagen_portada` varchar(300) DEFAULT NULL,
  `es_destacada` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `propiedades`
--

INSERT INTO `propiedades` (`id`, `titulo`, `id_tipo_propiedad`, `descripcion`, `superficie_cubierta`, `superficie`, `pisos`, `dormitorios`, `baños`, `id_localidad`, `id_zona`, `disponible`, `maps_url`, `video`, `codigo`, `imagen_portada`, `es_destacada`, `created_at`, `deleted_at`) VALUES
(1, 'DEPARTAMENTO PLANTA BAJA EN ALQUILER', 2, 'Departamento planta baja en ALQUILER - Barranca Colorada\r\nAv. Libertador y Pablo Llerena', 100, 120, 1, 2, 2, 3, 1, NULL, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d25934.127630171635!2d-63.7370368!3d-35.6581376!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95c37d583efa3525%3A0x60725c33461b6a7f!2sLa%20An%C3%B3nima!5e0!3m2!1ses!2sar!4v17146938894', '<iframe width=\"1903\" height=\"742\" src=\"https://www.youtube.com/embed/AtqhneeKhj0\" title=\"Lumion 10 - Casa moderna en Pinar / Recorrido animado render A&amp;M\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; pic', 'AYF5611', '20240516045117descarga.jpg', 1, '2024-05-16 02:51:17', NULL),
(2, 'DEPARTAMENTO PLANTA BAJA EN ALQUILER', 2, 'Departamento planta baja en ALQUILER - Barranca Colorada\r\nAv. Libertador y Pablo Llerena\r\nARS180,000 - ALQUILER\r\nDepartamento planta baja en ALQUILER \r\nUbicados en Barraca Colorada. Sobre Av Libertador, a metros de Av. Dos Venados.', 100, 124, 1, 3, 2, 3, 1, NULL, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d25934.127630171635!2d-63.7370368!3d-35.6581376!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95c37d583efa3525%3A0x60725c33461b6a7f!2sLa%20An%C3%B3nima!5e0!3m2!1ses!2sar!4v1714693889476!5m2!1ses!2sar\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '<iframe width=\"1903\" height=\"742\" src=\"https://www.youtube.com/embed/AtqhneeKhj0\" title=\"Lumion 10 - Casa moderna en Pinar / Recorrido animado render A&amp;M\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', 'AYF98805', '20240516052913descarga.jpg', 1, '2024-05-16 03:29:13', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propiedades_ambientes`
--

CREATE TABLE `propiedades_ambientes` (
  `id` int(11) NOT NULL,
  `id_propiedad` int(11) DEFAULT NULL,
  `id_ambiente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `propiedades_ambientes`
--

INSERT INTO `propiedades_ambientes` (`id`, `id_propiedad`, `id_ambiente`) VALUES
(1, 1, 2),
(2, 1, 3),
(3, 1, 5),
(4, 1, 6),
(5, 1, 7),
(6, 2, 2),
(7, 2, 3),
(8, 2, 4),
(9, 2, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propiedades_comodidades`
--

CREATE TABLE `propiedades_comodidades` (
  `id` int(11) NOT NULL,
  `id_propiedad` int(11) DEFAULT NULL,
  `id_comodidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `propiedades_comodidades`
--

INSERT INTO `propiedades_comodidades` (`id`, `id_propiedad`, `id_comodidad`) VALUES
(1, 1, 2),
(2, 1, 3),
(3, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propiedades_imagenes`
--

CREATE TABLE `propiedades_imagenes` (
  `id` int(11) NOT NULL,
  `id_propiedad` int(11) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `propiedades_imagenes`
--

INSERT INTO `propiedades_imagenes` (`id`, `id_propiedad`, `imagen`, `deleted_at`) VALUES
(1, 1, '20240516045117descarga.jpg', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propiedades_servicios`
--

CREATE TABLE `propiedades_servicios` (
  `id` int(11) NOT NULL,
  `id_propiedad` int(11) DEFAULT NULL,
  `id_servicio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `propiedades_servicios`
--

INSERT INTO `propiedades_servicios` (`id`, `id_propiedad`, `id_servicio`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 1),
(5, 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propiedades_tipo_publicaciones`
--

CREATE TABLE `propiedades_tipo_publicaciones` (
  `id` int(11) NOT NULL,
  `id_propiedad` int(11) DEFAULT NULL,
  `id_tipo_publicacion` int(11) DEFAULT NULL,
  `precio` float NOT NULL,
  `moneda` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1 = peso\r\n2 = dolar'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `propiedades_tipo_publicaciones`
--

INSERT INTO `propiedades_tipo_publicaciones` (`id`, `id_propiedad`, `id_tipo_publicacion`, `precio`, `moneda`) VALUES
(1, 1, 1, 370000, 1),
(2, 2, 1, 250000, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id`, `descripcion`, `deleted_at`) VALUES
(1, 'Gas', NULL),
(2, 'Electricidad', NULL),
(3, 'Agua corriente', NULL),
(4, 'Internet', NULL),
(5, 'Cable TV', NULL),
(6, 'Tv Satelital', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_propiedad`
--

CREATE TABLE `tipos_propiedad` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipos_propiedad`
--

INSERT INTO `tipos_propiedad` (`id`, `descripcion`, `deleted_at`) VALUES
(1, 'Chacra', '2024-04-30 22:32:01'),
(2, 'Casa', NULL),
(3, 'Campo', NULL),
(4, 'Lote', NULL),
(5, 'Quinta', NULL),
(6, 'Depto', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_publicaciones`
--

CREATE TABLE `tipo_publicaciones` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_publicaciones`
--

INSERT INTO `tipo_publicaciones` (`id`, `descripcion`, `deleted_at`) VALUES
(1, 'alquiler', NULL),
(2, 'venta', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `contraseña` varchar(200) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `contraseña`, `deleted_at`) VALUES
(1, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zonas`
--

CREATE TABLE `zonas` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `zonas`
--

INSERT INTO `zonas` (`id`, `descripcion`, `deleted_at`) VALUES
(1, 'centro', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ambientes`
--
ALTER TABLE `ambientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comodidades`
--
ALTER TABLE `comodidades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `localidades`
--
ALTER TABLE `localidades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `propiedades`
--
ALTER TABLE `propiedades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `propiedades_ambientes`
--
ALTER TABLE `propiedades_ambientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `propiedades_comodidades`
--
ALTER TABLE `propiedades_comodidades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `propiedades_imagenes`
--
ALTER TABLE `propiedades_imagenes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `propiedades_servicios`
--
ALTER TABLE `propiedades_servicios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `propiedades_tipo_publicaciones`
--
ALTER TABLE `propiedades_tipo_publicaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipos_propiedad`
--
ALTER TABLE `tipos_propiedad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_publicaciones`
--
ALTER TABLE `tipo_publicaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `zonas`
--
ALTER TABLE `zonas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ambientes`
--
ALTER TABLE `ambientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `comodidades`
--
ALTER TABLE `comodidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `localidades`
--
ALTER TABLE `localidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `propiedades`
--
ALTER TABLE `propiedades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `propiedades_ambientes`
--
ALTER TABLE `propiedades_ambientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `propiedades_comodidades`
--
ALTER TABLE `propiedades_comodidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `propiedades_imagenes`
--
ALTER TABLE `propiedades_imagenes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `propiedades_servicios`
--
ALTER TABLE `propiedades_servicios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `propiedades_tipo_publicaciones`
--
ALTER TABLE `propiedades_tipo_publicaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tipos_propiedad`
--
ALTER TABLE `tipos_propiedad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tipo_publicaciones`
--
ALTER TABLE `tipo_publicaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `zonas`
--
ALTER TABLE `zonas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
