-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 02-08-2018 a las 04:55:51
-- Versión del servidor: 5.7.23
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `colcief_DB`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `attendants`
--

CREATE TABLE `attendants` (
  `id_attendant` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `attendants_students`
--

CREATE TABLE `attendants_students` (
  `id_attendant` int(10) UNSIGNED NOT NULL,
  `id_student` int(10) UNSIGNED NOT NULL,
  `relationship` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `divisions`
--

CREATE TABLE `divisions` (
  `id_division` int(10) UNSIGNED NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `percentage` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` year(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `employees`
--

CREATE TABLE `employees` (
  `id_employee` int(10) UNSIGNED NOT NULL,
  `id_card` int(11) NOT NULL,
  `first_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `degree` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `employees`
--

INSERT INTO `employees` (`id_employee`, `id_card`, `first_name`, `last_name`, `email`, `password`, `address`, `degree`, `role`, `created_at`, `updated_at`) VALUES
(1, 1, 'juan', 'juan', 'juan@1gmail.com', '$2y$10$9YNzhoz/9BdslUD3vlCvFuq8rOq2sC06ZFfhlfFsNi0KU4jd7itx6', 'cra 19', 'ingeniero', 'admin', '2018-07-28 19:44:01', '2018-07-28 19:44:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grades`
--

CREATE TABLE `grades` (
  `id_grade` int(10) UNSIGNED NOT NULL,
  `name` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periods`
--

CREATE TABLE `periods` (
  `id_period` int(10) UNSIGNED NOT NULL,
  `deadline` date NOT NULL,
  `period_number` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` year(4) NOT NULL,
  `limit_time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `report_cards`
--

CREATE TABLE `report_cards` (
  `id_report_card` int(10) UNSIGNED NOT NULL,
  `id_grade` int(10) UNSIGNED NOT NULL,
  `id_student` int(10) UNSIGNED NOT NULL,
  `approved` tinyint(1) NOT NULL,
  `year` year(4) NOT NULL,
  `final_score` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `schedules`
--

CREATE TABLE `schedules` (
  `id_schedule` int(10) UNSIGNED NOT NULL,
  `id_subject_tc` int(10) UNSIGNED NOT NULL,
  `day` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `star_time` time NOT NULL,
  `end_time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `scores`
--

CREATE TABLE `scores` (
  `id_score` int(10) UNSIGNED NOT NULL,
  `percentage` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_division` int(10) UNSIGNED NOT NULL,
  `id_period` int(10) UNSIGNED NOT NULL,
  `id_subject_tc` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `students`
--

CREATE TABLE `students` (
  `id_student` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `grade` char(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `students`
--

INSERT INTO `students` (`id_student`, `first_name`, `last_name`, `email`, `password`, `phone`, `birthday`, `grade`, `created_at`, `updated_at`) VALUES
(1, 'juan', 'marcon', 'juanmarcon1080@gmail.com', '$2y$12$AwarJr79rajpIdidEYHUTuyntoKt0aalH4iFtMwrNE7o6MKae2Dua\n', '3154390477', '2008-08-08', '12345678', NULL, NULL),
(2, 'juan', 'juan', 'juan@hotmail.com', '$2y$10$vqGfpAQu3DDD5kctJH5JVOEHpw9OXCyjz5yiyCelcu7ucMW8h/zaa', '3154390477', '2008-08-08', '12345678', '2018-07-28 05:31:55', '2018-07-28 05:31:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `student_scores`
--

CREATE TABLE `student_scores` (
  `id_student_score` int(10) UNSIGNED NOT NULL,
  `score` decimal(8,2) NOT NULL,
  `id_score` int(10) UNSIGNED NOT NULL,
  `id_subject_report` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subjects`
--

CREATE TABLE `subjects` (
  `id_subject` int(10) UNSIGNED NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subject_reports`
--

CREATE TABLE `subject_reports` (
  `id_subject_report` int(10) UNSIGNED NOT NULL,
  `subject_score` decimal(8,2) NOT NULL,
  `id_report_card` int(10) UNSIGNED NOT NULL,
  `id_subject_tc` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subject_tc`
--

CREATE TABLE `subject_tc` (
  `id_subject_tc` int(10) UNSIGNED NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `classroom` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_subject` int(10) UNSIGNED NOT NULL,
  `id_employee` int(10) UNSIGNED NOT NULL,
  `id_grade` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `attendants`
--
ALTER TABLE `attendants`
  ADD PRIMARY KEY (`id_attendant`),
  ADD UNIQUE KEY `attendants_email_unique` (`email`);

--
-- Indices de la tabla `attendants_students`
--
ALTER TABLE `attendants_students`
  ADD PRIMARY KEY (`id_attendant`,`id_student`),
  ADD KEY `attendants_students_id_student_foreign` (`id_student`);

--
-- Indices de la tabla `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id_division`);

--
-- Indices de la tabla `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id_employee`),
  ADD UNIQUE KEY `employees_id_card_unique` (`id_card`),
  ADD UNIQUE KEY `employees_email_unique` (`email`);

--
-- Indices de la tabla `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id_grade`);

--
-- Indices de la tabla `periods`
--
ALTER TABLE `periods`
  ADD PRIMARY KEY (`id_period`);

--
-- Indices de la tabla `report_cards`
--
ALTER TABLE `report_cards`
  ADD PRIMARY KEY (`id_report_card`),
  ADD KEY `report_cards_id_student_foreign` (`id_student`),
  ADD KEY `report_cards_id_grade_foreign` (`id_grade`);

--
-- Indices de la tabla `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id_schedule`),
  ADD KEY `schedules_id_subject_tc_foreign` (`id_subject_tc`);

--
-- Indices de la tabla `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`id_score`),
  ADD KEY `scores_id_division_foreign` (`id_division`),
  ADD KEY `scores_id_period_foreign` (`id_period`),
  ADD KEY `scores_id_subject_tc_foreign` (`id_subject_tc`);

--
-- Indices de la tabla `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id_student`),
  ADD UNIQUE KEY `students_email_unique` (`email`);

--
-- Indices de la tabla `student_scores`
--
ALTER TABLE `student_scores`
  ADD PRIMARY KEY (`id_student_score`),
  ADD KEY `student_scores_id_score_foreign` (`id_score`),
  ADD KEY `student_scores_id_subject_report_foreign` (`id_subject_report`);

--
-- Indices de la tabla `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id_subject`);

--
-- Indices de la tabla `subject_reports`
--
ALTER TABLE `subject_reports`
  ADD PRIMARY KEY (`id_subject_report`),
  ADD KEY `subject_reports_id_report_card_foreign` (`id_report_card`),
  ADD KEY `subject_reports_id_subject_tc_foreign` (`id_subject_tc`);

--
-- Indices de la tabla `subject_tc`
--
ALTER TABLE `subject_tc`
  ADD PRIMARY KEY (`id_subject_tc`),
  ADD KEY `subject_tc_id_subject_foreign` (`id_subject`),
  ADD KEY `subject_tc_id_employee_foreign` (`id_employee`),
  ADD KEY `subject_tc_id_grade_foreign` (`id_grade`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id_division` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `grades`
--
ALTER TABLE `grades`
  MODIFY `id_grade` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `periods`
--
ALTER TABLE `periods`
  MODIFY `id_period` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `report_cards`
--
ALTER TABLE `report_cards`
  MODIFY `id_report_card` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id_schedule` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `scores`
--
ALTER TABLE `scores`
  MODIFY `id_score` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `student_scores`
--
ALTER TABLE `student_scores`
  MODIFY `id_student_score` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id_subject` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `subject_reports`
--
ALTER TABLE `subject_reports`
  MODIFY `id_subject_report` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `subject_tc`
--
ALTER TABLE `subject_tc`
  MODIFY `id_subject_tc` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `attendants_students`
--
ALTER TABLE `attendants_students`
  ADD CONSTRAINT `attendants_students_id_attendant_foreign` FOREIGN KEY (`id_attendant`) REFERENCES `attendants` (`id_attendant`),
  ADD CONSTRAINT `attendants_students_id_student_foreign` FOREIGN KEY (`id_student`) REFERENCES `students` (`id_student`);

--
-- Filtros para la tabla `report_cards`
--
ALTER TABLE `report_cards`
  ADD CONSTRAINT `report_cards_id_grade_foreign` FOREIGN KEY (`id_grade`) REFERENCES `grades` (`id_grade`),
  ADD CONSTRAINT `report_cards_id_student_foreign` FOREIGN KEY (`id_student`) REFERENCES `students` (`id_student`);

--
-- Filtros para la tabla `schedules`
--
ALTER TABLE `schedules`
  ADD CONSTRAINT `schedules_id_subject_tc_foreign` FOREIGN KEY (`id_subject_tc`) REFERENCES `subject_tc` (`id_subject_tc`);

--
-- Filtros para la tabla `scores`
--
ALTER TABLE `scores`
  ADD CONSTRAINT `scores_id_division_foreign` FOREIGN KEY (`id_division`) REFERENCES `divisions` (`id_division`),
  ADD CONSTRAINT `scores_id_period_foreign` FOREIGN KEY (`id_period`) REFERENCES `periods` (`id_period`),
  ADD CONSTRAINT `scores_id_subject_tc_foreign` FOREIGN KEY (`id_subject_tc`) REFERENCES `subject_tc` (`id_subject_tc`);

--
-- Filtros para la tabla `student_scores`
--
ALTER TABLE `student_scores`
  ADD CONSTRAINT `student_scores_id_score_foreign` FOREIGN KEY (`id_score`) REFERENCES `scores` (`id_score`),
  ADD CONSTRAINT `student_scores_id_subject_report_foreign` FOREIGN KEY (`id_subject_report`) REFERENCES `subject_reports` (`id_subject_report`);

--
-- Filtros para la tabla `subject_reports`
--
ALTER TABLE `subject_reports`
  ADD CONSTRAINT `subject_reports_id_report_card_foreign` FOREIGN KEY (`id_report_card`) REFERENCES `report_cards` (`id_report_card`),
  ADD CONSTRAINT `subject_reports_id_subject_tc_foreign` FOREIGN KEY (`id_subject_tc`) REFERENCES `subject_tc` (`id_subject_tc`);

--
-- Filtros para la tabla `subject_tc`
--
ALTER TABLE `subject_tc`
  ADD CONSTRAINT `subject_tc_id_employee_foreign` FOREIGN KEY (`id_employee`) REFERENCES `employees` (`id_employee`),
  ADD CONSTRAINT `subject_tc_id_grade_foreign` FOREIGN KEY (`id_grade`) REFERENCES `grades` (`id_grade`),
  ADD CONSTRAINT `subject_tc_id_subject_foreign` FOREIGN KEY (`id_subject`) REFERENCES `subjects` (`id_subject`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
