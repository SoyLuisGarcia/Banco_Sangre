-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-04-2026 a las 16:40:55
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `banco_sangre`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `estado` enum('pendiente','confirmada','cancelada') DEFAULT 'pendiente',
  `tipo_donacion` varchar(255) DEFAULT NULL,
  `sede` varchar(255) DEFAULT NULL,
  `peso` varchar(50) DEFAULT NULL,
  `donado_antes` varchar(10) DEFAULT NULL,
  `medicamentos` text DEFAULT NULL,
  `cirugia` varchar(10) DEFAULT NULL,
  `tipo_donante` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`id`, `user_id`, `fecha`, `hora`, `estado`, `tipo_donacion`, `sede`, `peso`, `donado_antes`, `medicamentos`, `cirugia`, `tipo_donante`) VALUES
(1, 2, '2026-03-08', '06:35:00', 'pendiente', 'Sangre Total', 'Hospital General', '80', 'No', 'no', 'No', 'reposicion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `donadores`
--

CREATE TABLE `donadores` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tipo_sangre` varchar(15) DEFAULT NULL,
  `es_altruista` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `donantes`
--

CREATE TABLE `donantes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `direccion` text DEFAULT NULL,
  `tipo_sangre_id` int(11) DEFAULT NULL,
  `fecha_registro` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `id` int(11) NOT NULL,
  `tipo_sangre_id` int(11) DEFAULT NULL,
  `cantidad_disponible` int(11) DEFAULT 0,
  `fecha_actualizacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `hospital` varchar(255) DEFAULT NULL,
  `tipo_sangre_id` int(11) DEFAULT NULL,
  `cantidad_requerida` int(11) DEFAULT NULL,
  `fecha_solicitud` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_sangre`
--

CREATE TABLE `tipos_sangre` (
  `id` int(11) NOT NULL,
  `tipo` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `rol` enum('admin','usuario') DEFAULT 'usuario',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `tipo_sanguineo` varchar(5) DEFAULT NULL,
  `ciudad` varchar(100) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `permiso` varchar(50) DEFAULT 'usuario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nombre`, `correo`, `telefono`, `password`, `rol`, `created_at`, `tipo_sanguineo`, `ciudad`, `imagen`, `permiso`) VALUES
(1, 'Luis Garcia', 'luis.garcia88@unach.mx', '9661092329', '$2y$10$EUFILPtuJWLC9OFgiRg7meM36aILzEz2SBnQWpFgZhe1RdNzsi80S', 'admin', '2026-03-07 06:27:20', 'A+', 'Tuxtla Gutierrez', '1773338822_dos.jpg', 'admin'),
(2, 'Ximena Segundo', 'ximena.segundo55@unach.com', '9613649197', '$2y$10$j2M3zoHIP1L1dkwTiQtXIuqlamJaiVM7zOTTbx3tiEXVBFVKgXF3.', 'usuario', '2026-03-07 06:27:29', 'A+', 'Tuxtla Gutierrez', '1772872026_user_Ximena.jpg', 'usuario');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `donadores`
--
ALTER TABLE `donadores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `donantes`
--
ALTER TABLE `donantes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipos_sangre`
--
ALTER TABLE `tipos_sangre`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `donadores`
--
ALTER TABLE `donadores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `donantes`
--
ALTER TABLE `donantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipos_sangre`
--
ALTER TABLE `tipos_sangre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
