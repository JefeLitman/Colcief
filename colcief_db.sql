-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 23-10-2018 a las 22:15:34
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `colcief_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acudiente`
--

CREATE TABLE `acudiente` (
  `pk_acudiente` int(10) UNSIGNED NOT NULL,
  `nombre_acu_1` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion_acu_1` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono_acu_1` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre_acu_2` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion_acu_2` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono_acu_2` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `boletin`
--

CREATE TABLE `boletin` (
  `pk_boletin` int(10) UNSIGNED NOT NULL,
  `fk_curso` int(10) UNSIGNED NOT NULL,
  `fk_estudiante` int(10) UNSIGNED NOT NULL,
  `estado` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ano` year(4) NOT NULL,
  `nota_final` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `pk_curso` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `division`
--

CREATE TABLE `division` (
  `pk_division` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `porcentaje` int(11) NOT NULL,
  `limite` date NOT NULL,
  `ano` year(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `cedula` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `titulo` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tiempo_extra` int(11) NOT NULL DEFAULT '0',
  `director` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` tinyint(1) DEFAULT '1',
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '/storage/default.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `pk_estudiante` int(10) UNSIGNED NOT NULL,
  `fk_acudiente` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `grado` int(11) NOT NULL,
  `discapacidad` tinyint(1) DEFAULT '0',
  `estado` tinyint(1) DEFAULT '1',
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '/storage/default.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `pk_horario` int(10) UNSIGNED NOT NULL,
  `fk_materia_pc` int(10) UNSIGNED NOT NULL,
  `dia` date NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE `materia` (
  `pk_materia` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contenido` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `logros_custom` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia_boletin`
--

CREATE TABLE `materia_boletin` (
  `pk_materia_boletin` int(10) UNSIGNED NOT NULL,
  `fk_materia_pc` int(10) UNSIGNED NOT NULL,
  `fk_boletin` int(10) UNSIGNED NOT NULL,
  `nota_materia` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia_pc`
--

CREATE TABLE `materia_pc` (
  `pk_materia_pc` int(10) UNSIGNED NOT NULL,
  `fk_curso` int(10) UNSIGNED NOT NULL,
  `fk_materia` int(10) UNSIGNED NOT NULL,
  `fk_empleado` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salon` char(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logros_custom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2018_08_24_000707_todo', 1),
(2, '2018_08_24_001806_fks', 1),
(3, '2018_10_12_162552_create_sessions_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nota`
--

CREATE TABLE `nota` (
  `pk_nota` int(10) UNSIGNED NOT NULL,
  `fk_division` int(10) UNSIGNED NOT NULL,
  `fk_materia_pc` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `porcentaje` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nota_estudiante`
--

CREATE TABLE `nota_estudiante` (
  `pk_nota_estudiante` int(10) UNSIGNED NOT NULL,
  `fk_estudiante` int(10) UNSIGNED NOT NULL,
  `fk_nota` int(10) UNSIGNED NOT NULL,
  `fk_nota_periodo` int(10) UNSIGNED NOT NULL,
  `nota` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nota_periodo`
--

CREATE TABLE `nota_periodo` (
  `pk_nota_periodo` int(10) UNSIGNED NOT NULL,
  `fk_periodo` int(10) UNSIGNED NOT NULL,
  `fk_materia_boletin` int(10) UNSIGNED NOT NULL,
  `nota_final` int(11) NOT NULL,
  `habilidad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodo`
--

CREATE TABLE `periodo` (
  `pk_periodo` int(10) UNSIGNED NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_limite` datetime NOT NULL,
  `ano` year(4) NOT NULL,
  `nro_periodo` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('ip2OHJzABdkH5lIX1JuoiJ0YaB5A3EQCJGzdyn9k', NULL, '127.0.0.1', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Mobile Safari/537.36', 'YTo2OntzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNzoiaHR0cDovL2xvY2FsaG9zdDo4MDAwL2VtcGxlYWRvcy9jcmVhciI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NjoiX3Rva2VuIjtzOjQwOiI0MW9vYjlEUFJEUGJndkVWSUdyTFEwTVNvWWkzaTljSjY2WXZ4WEc0IjtzOjYwOiJsb2dpbl9hZG1pbmlzdHJhZG9yXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MjEwMjM4NDM3MDtzOjQ6InVzZXIiO2E6MTU6e3M6NjoiY2VkdWxhIjtpOjIxMDIzODQzNzA7czo2OiJub21icmUiO3M6MTQ6Imp1YW4gc2ViYXN0aWFuIjtzOjg6ImFwZWxsaWRvIjtzOjE2OiJtYXJjb24gY2FiYWxsZXJvIjtzOjY6ImNvcnJlbyI7czoyNDoianVhbm1hcmNvbjEwODBAZ21haWwuY29tIjtzOjg6InBhc3N3b3JkIjtzOjYwOiIkMnkkMTAkNlhydTBHY0VBbGI5dmRwU1NEaDIzdXhNd1VBV1VkQi5FNmQvR0NtVXQ2TVcvbWpYZE52U2EiO3M6OToiZGlyZWNjaW9uIjtzOjE5OiJjcmEgMTkjMy04MiBhcHQgMTAyIjtzOjY6InRpdHVsbyI7czo4OiJwcm9mZXNvciI7czo0OiJyb2xlIjtzOjE6IjAiO3M6MTI6InRpZW1wb19leHRyYSI7aTowO3M6ODoiZGlyZWN0b3IiO3M6MToiOSI7czo2OiJlc3RhZG8iO2k6MTtzOjQ6ImZvdG8iO3M6MzE6Ii9zdG9yYWdlL2VtcGxlYWRvMjEwMjM4NDM3MC5wbmciO3M6MTA6ImNyZWF0ZWRfYXQiO3M6MTk6IjIwMTgtMTAtMjMgMTM6MTU6MjciO3M6MTA6InVwZGF0ZWRfYXQiO3M6MTk6IjIwMTgtMTAtMjMgMTM6MTU6MjciO3M6MTA6ImRlbGV0ZWRfYXQiO047fXM6NDoicm9sZSI7czoxMzoiYWRtaW5pc3RyYWRvciI7fQ==', 1540324610);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acudiente`
--
ALTER TABLE `acudiente`
  ADD PRIMARY KEY (`pk_acudiente`);

--
-- Indices de la tabla `boletin`
--
ALTER TABLE `boletin`
  ADD PRIMARY KEY (`pk_boletin`),
  ADD KEY `boletin_fk_curso_foreign` (`fk_curso`),
  ADD KEY `boletin_fk_estudiante_foreign` (`fk_estudiante`);

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`pk_curso`);

--
-- Indices de la tabla `division`
--
ALTER TABLE `division`
  ADD PRIMARY KEY (`pk_division`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`cedula`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`pk_estudiante`),
  ADD KEY `estudiante_fk_acudiente_foreign` (`fk_acudiente`);

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`pk_horario`),
  ADD KEY `horario_fk_materia_pc_foreign` (`fk_materia_pc`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`pk_materia`);

--
-- Indices de la tabla `materia_boletin`
--
ALTER TABLE `materia_boletin`
  ADD PRIMARY KEY (`pk_materia_boletin`),
  ADD KEY `materia_boletin_fk_materia_pc_foreign` (`fk_materia_pc`),
  ADD KEY `materia_boletin_fk_boletin_foreign` (`fk_boletin`);

--
-- Indices de la tabla `materia_pc`
--
ALTER TABLE `materia_pc`
  ADD PRIMARY KEY (`pk_materia_pc`),
  ADD KEY `materia_pc_fk_curso_foreign` (`fk_curso`),
  ADD KEY `materia_pc_fk_materia_foreign` (`fk_materia`),
  ADD KEY `materia_pc_fk_empleado_foreign` (`fk_empleado`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`pk_nota`),
  ADD KEY `nota_fk_division_foreign` (`fk_division`),
  ADD KEY `nota_fk_materia_pc_foreign` (`fk_materia_pc`);

--
-- Indices de la tabla `nota_estudiante`
--
ALTER TABLE `nota_estudiante`
  ADD PRIMARY KEY (`pk_nota_estudiante`),
  ADD KEY `nota_estudiante_fk_estudiante_foreign` (`fk_estudiante`),
  ADD KEY `nota_estudiante_fk_nota_foreign` (`fk_nota`),
  ADD KEY `nota_estudiante_fk_nota_periodo_foreign` (`fk_nota_periodo`);

--
-- Indices de la tabla `nota_periodo`
--
ALTER TABLE `nota_periodo`
  ADD PRIMARY KEY (`pk_nota_periodo`),
  ADD KEY `nota_periodo_fk_periodo_foreign` (`fk_periodo`),
  ADD KEY `nota_periodo_fk_materia_boletin_foreign` (`fk_materia_boletin`);

--
-- Indices de la tabla `periodo`
--
ALTER TABLE `periodo`
  ADD PRIMARY KEY (`pk_periodo`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD UNIQUE KEY `sessions_id_unique` (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acudiente`
--
ALTER TABLE `acudiente`
  MODIFY `pk_acudiente` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `boletin`
--
ALTER TABLE `boletin`
  MODIFY `pk_boletin` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `pk_curso` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `division`
--
ALTER TABLE `division`
  MODIFY `pk_division` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  MODIFY `pk_estudiante` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `horario`
--
ALTER TABLE `horario`
  MODIFY `pk_horario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `materia`
--
ALTER TABLE `materia`
  MODIFY `pk_materia` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `materia_boletin`
--
ALTER TABLE `materia_boletin`
  MODIFY `pk_materia_boletin` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `materia_pc`
--
ALTER TABLE `materia_pc`
  MODIFY `pk_materia_pc` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `nota`
--
ALTER TABLE `nota`
  MODIFY `pk_nota` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `nota_estudiante`
--
ALTER TABLE `nota_estudiante`
  MODIFY `pk_nota_estudiante` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `nota_periodo`
--
ALTER TABLE `nota_periodo`
  MODIFY `pk_nota_periodo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `periodo`
--
ALTER TABLE `periodo`
  MODIFY `pk_periodo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `boletin`
--
ALTER TABLE `boletin`
  ADD CONSTRAINT `boletin_fk_curso_foreign` FOREIGN KEY (`fk_curso`) REFERENCES `curso` (`pk_curso`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `boletin_fk_estudiante_foreign` FOREIGN KEY (`fk_estudiante`) REFERENCES `estudiante` (`pk_estudiante`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD CONSTRAINT `estudiante_fk_acudiente_foreign` FOREIGN KEY (`fk_acudiente`) REFERENCES `acudiente` (`pk_acudiente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `horario`
--
ALTER TABLE `horario`
  ADD CONSTRAINT `horario_fk_materia_pc_foreign` FOREIGN KEY (`fk_materia_pc`) REFERENCES `materia_pc` (`pk_materia_pc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `materia_boletin`
--
ALTER TABLE `materia_boletin`
  ADD CONSTRAINT `materia_boletin_fk_boletin_foreign` FOREIGN KEY (`fk_boletin`) REFERENCES `boletin` (`pk_boletin`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `materia_boletin_fk_materia_pc_foreign` FOREIGN KEY (`fk_materia_pc`) REFERENCES `materia_pc` (`pk_materia_pc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `materia_pc`
--
ALTER TABLE `materia_pc`
  ADD CONSTRAINT `materia_pc_fk_curso_foreign` FOREIGN KEY (`fk_curso`) REFERENCES `curso` (`pk_curso`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `materia_pc_fk_empleado_foreign` FOREIGN KEY (`fk_empleado`) REFERENCES `empleado` (`cedula`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `materia_pc_fk_materia_foreign` FOREIGN KEY (`fk_materia`) REFERENCES `materia` (`pk_materia`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `nota`
--
ALTER TABLE `nota`
  ADD CONSTRAINT `nota_fk_division_foreign` FOREIGN KEY (`fk_division`) REFERENCES `division` (`pk_division`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nota_fk_materia_pc_foreign` FOREIGN KEY (`fk_materia_pc`) REFERENCES `materia_pc` (`pk_materia_pc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `nota_estudiante`
--
ALTER TABLE `nota_estudiante`
  ADD CONSTRAINT `nota_estudiante_fk_estudiante_foreign` FOREIGN KEY (`fk_estudiante`) REFERENCES `estudiante` (`pk_estudiante`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nota_estudiante_fk_nota_foreign` FOREIGN KEY (`fk_nota`) REFERENCES `nota` (`pk_nota`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nota_estudiante_fk_nota_periodo_foreign` FOREIGN KEY (`fk_nota_periodo`) REFERENCES `nota_periodo` (`pk_nota_periodo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `nota_periodo`
--
ALTER TABLE `nota_periodo`
  ADD CONSTRAINT `nota_periodo_fk_materia_boletin_foreign` FOREIGN KEY (`fk_materia_boletin`) REFERENCES `materia_boletin` (`pk_materia_boletin`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nota_periodo_fk_periodo_foreign` FOREIGN KEY (`fk_periodo`) REFERENCES `periodo` (`pk_periodo`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
