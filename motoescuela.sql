-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-01-2019 a las 02:59:10
-- Versión del servidor: 10.1.32-MariaDB
-- Versión de PHP: 7.2.5

SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `motoescuela`
--
CREATE DATABASE IF NOT EXISTS `motoescuela` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE motoescuela;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

DROP TABLE IF EXISTS `alumnos`;
CREATE TABLE `alumnos` (
  `id` int(10) UNSIGNED NOT NULL,
  `alumno_nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alumno_celular` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alumno_direccion` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alumno_ci` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alumno_activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id`, `alumno_nombre`, `alumno_celular`, `alumno_direccion`, `alumno_ci`, `alumno_activo`) VALUES
(1, 'BERTHA BLANCO', '78787878', 'LA PAZ BOLIVIA', '6123456', 1),
(4, 'ALVARO APAZA', '78787878', 'LA PAZ BOLIVIA', '6123459', 1),
(5, 'MARCO FLORES', '78787878', 'LA PAZ BOLIVIA', '6123460', 1),
(6, 'MARIA PEREZ', '787878', 'LA PAZ', '92321012 PN', 1),
(7, 'FREDDY FERNANDEZ', '78787414', 'EL ALTO', '9245454 LP', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencias`
--

DROP TABLE IF EXISTS `asistencias`;
CREATE TABLE `asistencias` (
  `id` int(10) UNSIGNED NOT NULL,
  `asistencia_fecha` date NOT NULL,
  `asistencia_entrada` time NOT NULL,
  `asistencia_salida` time DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

DROP TABLE IF EXISTS `cursos`;
CREATE TABLE `cursos` (
  `id` int(10) UNSIGNED NOT NULL,
  `curso_nombre` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `curso_estudiantes` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `curso_observacion` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

DROP TABLE IF EXISTS `facturas`;
CREATE TABLE `facturas` (
  `id` int(10) UNSIGNED NOT NULL,
  `factura_numero` int(11) NOT NULL,
  `factura_fecha` date NOT NULL,
  `factura_razon` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `factura_nit` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `factura_cantidad` int(11) NOT NULL,
  `factura_concepto` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `factura_monto` double(8,2) NOT NULL,
  `factura_total` double(8,2) NOT NULL,
  `factura_estado` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pagos_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `facturas`
--

INSERT INTO `facturas` (`id`, `factura_numero`, `factura_fecha`, `factura_razon`, `factura_nit`, `factura_cantidad`, `factura_concepto`, `factura_monto`, `factura_total`, `factura_estado`, `pagos_id`) VALUES
(1, 0, '2018-05-12', 'DEFAULT', 'DEFAULT', 0, 'DEFAULT', 0.00, 0.00, 'DEFAULT', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

DROP TABLE IF EXISTS `horarios`;
CREATE TABLE `horarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `horario_nombre` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `horario_entrada` time NOT NULL,
  `horario_salida` time NOT NULL,
  `horario_dias` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `horario_tipo` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `horarios`
--

INSERT INTO `horarios` (`id`, `horario_nombre`, `horario_entrada`, `horario_salida`, `horario_dias`, `horario_tipo`) VALUES
(1, 'PERIODO 1', '08:30:00', '10:30:00', 'LUNES A VIERNES', 'REGULAR'),
(2, 'PERIODO 2', '10:30:00', '12:30:00', 'LUNES A VIERNES', 'REGULAR'),
(3, 'PERIODO 3', '14:30:00', '16:30:00', 'LUNES A VIERNES', 'REGULAR'),
(4, 'PERIODO 4', '16:30:00', '18:30:00', 'LUNES A VIERNES', 'REGULAR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcones`
--

DROP TABLE IF EXISTS `inscripcones`;
CREATE TABLE `inscripcones` (
  `id` int(10) UNSIGNED NOT NULL,
  `ins_fecha` date NOT NULL,
  `ins_obs` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `inscripcion_estado` tinyint(1) NOT NULL,
  `alumno_id` int(10) UNSIGNED NOT NULL,
  `moto_id` int(10) UNSIGNED NOT NULL,
  `horario_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instructores`
--

DROP TABLE IF EXISTS `instructores`;
CREATE TABLE `instructores` (
  `id` int(10) UNSIGNED NOT NULL,
  `inst_nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `inst_celular` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `inst_direccion` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `inst_ci` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `inst_foto` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inst_observacion` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_04_06_143626_create_alumnos_table', 1),
(4, '2018_04_06_144904_create_instructores_table', 1),
(5, '2018_04_06_150014_create_motos_table', 1),
(6, '2018_04_06_153235_create_horarios_table', 1),
(7, '2018_04_06_153236_create_cursos_table', 1),
(8, '2018_04_06_153638_create_pagos_table', 1),
(9, '2018_04_06_154159_create_inscripcones_table', 1),
(10, '2018_04_06_154946_create_asistencias_table', 1),
(11, '2018_04_06_161845_create_teoria_table', 1),
(12, '2018_04_06_161917_create_practica_table', 1),
(13, '2018_04_06_163130_create_notas_table', 1),
(14, '2018_04_17_160151_create_facturas_table', 1),
(15, '2018_04_30_120216_create_preguntas_table', 1),
(16, '2018_04_30_120337_create_opciones_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `motos`
--

DROP TABLE IF EXISTS `motos`;
CREATE TABLE `motos` (
  `id` int(10) UNSIGNED NOT NULL,
  `moto_marca` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `moto_tipo` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `moto_modelo` int(11) NOT NULL,
  `moto_placa` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `moto_color` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `moto_observacion` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `moto_foto` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

DROP TABLE IF EXISTS `notas`;
CREATE TABLE `notas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nota_obs` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opciones`
--

DROP TABLE IF EXISTS `opciones`;
CREATE TABLE `opciones` (
  `id` int(10) UNSIGNED NOT NULL,
  `opcion_pregunta` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `opcion_foto` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opcion_respuesta` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `preguntas_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

DROP TABLE IF EXISTS `pagos`;
CREATE TABLE `pagos` (
  `id` int(10) UNSIGNED NOT NULL,
  `pago_monto` double(8,2) NOT NULL,
  `pago_saldo` double(8,2) NOT NULL,
  `alumno_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `practica`
--

DROP TABLE IF EXISTS `practica`;
CREATE TABLE `practica` (
  `id` int(10) UNSIGNED NOT NULL,
  `practica_fecha` date NOT NULL,
  `practica_nota` double(8,2) NOT NULL,
  `practica_pruebas` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `practica_obs` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

DROP TABLE IF EXISTS `preguntas`;
CREATE TABLE `preguntas` (
  `id` int(10) UNSIGNED NOT NULL,
  `pregunta_pregunta` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pregunta_foto` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `teoria`
--

DROP TABLE IF EXISTS `teoria`;
CREATE TABLE `teoria` (
  `id` int(10) UNSIGNED NOT NULL,
  `teoria_fecha` date NOT NULL,
  `teoria_respuestas` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alumno_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_ci` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_direccion` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_celular` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_cargo` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_tipo` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_user` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_foto` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `user_nombre`, `user_ci`, `user_direccion`, `user_celular`, `user_cargo`, `user_tipo`, `user_user`, `password`, `user_foto`, `remember_token`) VALUES
(1, 'Juan Jose Velarde', '9221121 LP', 'fMxzNoUY2T', 'kgSHgOSOpf', 'Qcl6F1ZUcy', 'USER1', 'juan', '$2y$10$7LQH6L9QicyAO2Z6HDJY7.XpstxLIl3jNbEIOVXychJIpm3AGt4GG', 'sQrR30a9d0', 'xo6iP5lgmINjjSn5NeDfiOTSSu1XHIL2cOub1ckD0VWyfcFfHVp2oGw6lHGe');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `alumnos_alumno_ci_unique` (`alumno_ci`);

--
-- Indices de la tabla `asistencias`
--
ALTER TABLE `asistencias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `asistencias_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `facturas_pagos_id_foreign` (`pagos_id`);

--
-- Indices de la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `inscripcones`
--
ALTER TABLE `inscripcones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inscripcones_alumno_id_foreign` (`alumno_id`),
  ADD KEY `inscripcones_moto_id_foreign` (`moto_id`),
  ADD KEY `inscripcones_horario_id_foreign` (`horario_id`),
  ADD KEY `inscripcones_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `instructores`
--
ALTER TABLE `instructores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `instructores_inst_ci_unique` (`inst_ci`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `motos`
--
ALTER TABLE `motos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `opciones`
--
ALTER TABLE `opciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `opciones_preguntas_id_foreign` (`preguntas_id`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pagos_alumno_id_foreign` (`alumno_id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `practica`
--
ALTER TABLE `practica`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `teoria`
--
ALTER TABLE `teoria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teoria_alumno_id_foreign` (`alumno_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_user_ci_unique` (`user_ci`),
  ADD UNIQUE KEY `users_user_user_unique` (`user_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `asistencias`
--
ALTER TABLE `asistencias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `facturas`
--
ALTER TABLE `facturas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `horarios`
--
ALTER TABLE `horarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `inscripcones`
--
ALTER TABLE `inscripcones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `instructores`
--
ALTER TABLE `instructores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `motos`
--
ALTER TABLE `motos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `notas`
--
ALTER TABLE `notas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `opciones`
--
ALTER TABLE `opciones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `practica`
--
ALTER TABLE `practica`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `teoria`
--
ALTER TABLE `teoria`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asistencias`
--
ALTER TABLE `asistencias`
  ADD CONSTRAINT `asistencias_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD CONSTRAINT `facturas_pagos_id_foreign` FOREIGN KEY (`pagos_id`) REFERENCES `pagos` (`id`);

--
-- Filtros para la tabla `inscripcones`
--
ALTER TABLE `inscripcones`
  ADD CONSTRAINT `inscripcones_alumno_id_foreign` FOREIGN KEY (`alumno_id`) REFERENCES `alumnos` (`id`),
  ADD CONSTRAINT `inscripcones_horario_id_foreign` FOREIGN KEY (`horario_id`) REFERENCES `horarios` (`id`),
  ADD CONSTRAINT `inscripcones_moto_id_foreign` FOREIGN KEY (`moto_id`) REFERENCES `motos` (`id`),
  ADD CONSTRAINT `inscripcones_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `opciones`
--
ALTER TABLE `opciones`
  ADD CONSTRAINT `opciones_preguntas_id_foreign` FOREIGN KEY (`preguntas_id`) REFERENCES `preguntas` (`id`);

--
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `pagos_alumno_id_foreign` FOREIGN KEY (`alumno_id`) REFERENCES `alumnos` (`id`);

--
-- Filtros para la tabla `teoria`
--
ALTER TABLE `teoria`
  ADD CONSTRAINT `teoria_alumno_id_foreign` FOREIGN KEY (`alumno_id`) REFERENCES `alumnos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
