-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:8889
-- Tiempo de generación: 04-04-2025 a las 13:09:07
-- Versión del servidor: 5.7.34
-- Versión de PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `api_rest_lawyer`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagemovil` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gotBoton` tinyint(1) DEFAULT NULL,
  `botonName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('PUBLISHED','PENDING','REJECTED') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'PENDING',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documents`
--

CREATE TABLE `documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favorites`
--

CREATE TABLE `favorites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_11_30_175428_create_jobs_table', 1),
(6, '2022_12_09_225551_create_payments_table', 1),
(7, '2022_12_18_035041_create_contacts_table', 1),
(8, '2023_04_30_145301_create_categories_table', 1),
(9, '2023_04_30_145714_create_posts_table', 1),
(10, '2023_04_30_150901_create_profile_table', 1),
(11, '2023_05_02_150541_create_banner_table', 1),
(12, '2025_04_02_132501_create_specialities_table', 1),
(13, '2025_04_02_133755_create_documents_table', 1),
(14, '2025_04_02_134455_create_favorites_table', 1),
(15, '2025_04_03_184829_create_solicitudes_table', 1),
(16, '2025_04_03_220836_create_solicitud_user_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `referencia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `monto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isFeatured` tinyint(1) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('PUBLISHED','PENDING','REJECTED') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'PENDING',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `speciality_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `n_doc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pais` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ciudad` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telhome` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telmovil` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redessociales` json DEFAULT NULL,
  `precios` json DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('VERIFIED','PENDING','REJECTED') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'PENDING',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `speciality_id`, `nombre`, `surname`, `direccion`, `description`, `n_doc`, `pais`, `estado`, `ciudad`, `telhome`, `telmovil`, `redessociales`, `precios`, `avatar`, `rating`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 2, 'Carlos', 'Martinez', 'Avenida Siempre Viva 742', 'Experto en derecho civil y comercial.', '12345678', 'Argentina', 'CABA', 'Buenos Aires', '011-1234-5678', '011-9876-5432', '[{\"url\": \"https://facebook.com/carlosmartinez\", \"icono\": \"fa fa-facebook\", \"title\": \"facebook\"}, {\"url\": \"https://linkedin.com/in/carlosmartinez\", \"icono\": \"fa fa-linkedin\", \"title\": \"linkedin\"}]', '[{\"precio\": 150, \"item_tarifa\": \"Consulta Inicial\"}]', NULL, NULL, 'VERIFIED', NULL, '2025-04-04 03:52:00'),
(2, 4, 3, 'Ana', 'Gomez', 'Calle Falsa 456', 'Abogada especializada en derecho laboral.', '12993678', 'Venezuela', 'Caracas', 'Caracas', '0212-1234-5678', '0412-9876-5432', '[{\"url\": \"https://twitter.com/anagomez\", \"icono\": \"fa fa-twitter\", \"title\": \"twitter\"}, {\"url\": \"https://instagram.com/anagomez\", \"icono\": \"fa fa-instagram\", \"title\": \"instagram\"}]', '[{\"precio\": 30, \"item_tarifa\": \"Consulta Inicial\"}]', NULL, NULL, 'VERIFIED', NULL, '2025-04-04 03:51:55'),
(3, 5, NULL, 'Luis', 'Fernandez', 'Avenida Libertador 1234', 'Abogado con experiencia en derecho penal.', NULL, 'Colombia', 'Bogotá', 'Bogotá', '0571-1234-5678', '0571-9876-5432', '[{\"url\": \"https://facebook.com/luisfernandez\", \"icono\": \"fa fa-facebook\", \"title\": \"facebook\"}, {\"url\": \"https://linkedin.com/in/luisfernandez\", \"icono\": \"fa fa-linkedin\", \"title\": \"linkedin\"}, {\"url\": \"dsa\", \"icono\": \"fa fa-youtube\", \"title\": \"ads\"}]', 'null', NULL, NULL, 'PENDING', NULL, '2025-04-04 15:54:17'),
(4, 6, NULL, 'Manuel', 'Fernandez', 'Avenida Libertador 12s', 'Persona común.', '12330678', 'Colombia', 'Bogotá', 'Bogotá', '0571-1234-5678', '0571-9876-5432', '[{\"url\": \"https://facebook.com/luisfernandez\", \"icono\": \"fa fa-facebook\", \"title\": \"facebook\"}, {\"url\": \"https://linkedin.com/in/luisfernandez\", \"icono\": \"fa fa-linkedin\", \"title\": \"linkedin\"}]', NULL, NULL, NULL, 'PENDING', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicituds`
--

CREATE TABLE `solicituds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pedido` json DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `solicituds`
--

INSERT INTO `solicituds` (`id`, `pedido`, `status`, `created_at`, `updated_at`) VALUES
(1, '{\"precio\": 150, \"item_tarifa\": \"Consulta Inicial\"}', 1, '2025-04-04 03:52:36', '2025-04-04 03:52:36'),
(2, '{\"precio\": 150, \"item_tarifa\": \"Consulta Inicial\"}', 1, '2025-04-04 03:53:48', '2025-04-04 03:53:48'),
(3, '{\"precio\": 150, \"item_tarifa\": \"Consulta Inicial\"}', 1, '2025-04-04 03:54:24', '2025-04-04 03:54:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud_user`
--

CREATE TABLE `solicitud_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `solicitud_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `specialities`
--

CREATE TABLE `specialities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `is_active` tinyint(1) DEFAULT NULL,
  `isFeatured` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `specialities`
--

INSERT INTO `specialities` (`id`, `title`, `description`, `is_active`, `isFeatured`, `created_at`, `updated_at`) VALUES
(1, 'Derecho Civil', 'Especialidad en Derecho Civil', 1, 0, NULL, NULL),
(2, 'Derecho Penal', 'Especialidad en Derecho Penal', 1, 0, NULL, NULL),
(3, 'Derecho Laboral', 'Especialidad en Derecho Laboral', 1, 0, NULL, NULL),
(4, 'Derecho Mercantil', 'Especialidad en Derecho Mercantil', 1, 0, NULL, NULL),
(5, 'Derecho Administrativo', 'Especialidad en Derecho Administrativo', 1, 0, NULL, NULL),
(6, 'Derecho Constitucional', 'Especialidad en Derecho Constitucional', 1, 0, NULL, NULL),
(7, 'Derecho Tributario', 'Especialidad en Derecho Tributario', 1, 0, NULL, NULL),
(8, 'Derecho Internacional', 'Especialidad en Derecho Internacional', 1, 0, NULL, NULL),
(9, 'Derecho de Familia', 'Especialidad en Derecho de Familia', 1, 0, NULL, NULL),
(10, 'Derecho Procesal', 'Especialidad en Derecho Procesal', 1, 0, NULL, NULL),
(11, 'Derecho Ambiental', 'Especialidad en Derecho Ambiental', 1, 0, NULL, NULL),
(12, 'Derecho de Propiedad Intelectual', 'Especialidad en Derecho de Propiedad Intelectual', 1, 0, NULL, NULL),
(13, 'Derecho Bancario', 'Especialidad en Derecho Bancario', 1, 0, NULL, NULL),
(14, 'Derecho de Seguros', 'Especialidad en Derecho de Seguros', 1, 0, NULL, NULL),
(15, 'Derecho Notarial', 'Especialidad en Derecho Notarial', 1, 0, NULL, NULL),
(16, 'Derecho Registral', 'Especialidad en Derecho Registral', 1, 0, NULL, NULL),
(17, 'Derecho Marítimo', 'Especialidad en Derecho Marítimo', 1, 0, NULL, NULL),
(18, 'Derecho Aeronáutico', 'Especialidad en Derecho Aeronáutico', 1, 0, NULL, NULL),
(19, 'Derecho Deportivo', 'Especialidad en Derecho Deportivo', 1, 0, NULL, NULL),
(20, 'Derecho Médico', 'Especialidad en Derecho Médico', 1, 0, NULL, NULL),
(21, 'Derecho Tecnológico', 'Especialidad en Derecho Tecnológico', 1, 0, NULL, NULL),
(22, 'Derecho Consumidor', 'Especialidad en Derecho del Consumidor', 1, 0, NULL, NULL),
(23, 'Derecho Minero', 'Especialidad en Derecho Minero', 1, 0, NULL, NULL),
(24, 'Derecho Agrario', 'Especialidad en Derecho Agrario', 1, 0, NULL, NULL),
(25, 'Derecho Migratorio', 'Especialidad en Derecho Migratorio', 1, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('SUPERADMIN','ADMIN','MEMBER','GUEST') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'GUEST',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `role`, `email`, `email_verified_at`, `password`, `is_active`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'superadministrador', 'SUPERADMIN', 'superadmin@superadmin.com', '2025-04-04 03:51:12', '$2y$10$ytPXnqFsVBwYHpD273t.zOjt0zWLmquM0iugQPiwgtZZoNxHcdYea', NULL, NULL, '2025-04-04 03:51:12', '2025-04-04 03:51:12', NULL),
(2, 'administrador', 'ADMIN', 'admin@admin.com', '2025-04-04 03:51:12', '$2y$10$wYIs.3wUcFMnwaOBKH62XuAO62Vt3JuLAUwgTVmmbNVHbN2dB3VVm', NULL, NULL, '2025-04-04 03:51:12', '2025-04-04 03:51:12', NULL),
(3, 'miembro', 'MEMBER', 'miembro@miembro.com', '2025-04-04 03:51:12', '$2y$10$J9RQmh3WIgFwinNI8/4d0.nE/amKGRlKiEkxMuN1V.z.Gb1cwyk0G', NULL, NULL, '2025-04-04 03:51:12', '2025-04-04 03:51:12', NULL),
(4, 'miembro', 'MEMBER', 'miembro2@miembro.com', '2025-04-04 03:51:12', '$2y$10$W/SrFh0DItDafyKzS5TiiOOAlKKptzqOZ1w5uNeT7nh5mpGAonpMq', NULL, NULL, '2025-04-04 03:51:12', '2025-04-04 03:51:12', NULL),
(5, 'invitado', 'GUEST', 'invitado@invitado.com', '2025-04-04 03:51:12', '$2y$10$WEyIaQi0RtLzGBKK/4dMCeGUAI27odK5h0xS0Ii9WTdWr6b2IYBre', NULL, NULL, '2025-04-04 03:51:12', '2025-04-04 03:51:12', NULL),
(6, 'invitado', 'GUEST', 'invitado2@invitado.com', '2025-04-04 03:51:12', '$2y$10$McqZ9wzlDzAFVQWVLBOM1.x8VU/0JbUAoC1lKWV.MbM9WQvgtVGfy', NULL, NULL, '2025-04-04 03:51:12', '2025-04-04 03:51:12', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `documents_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favorites_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_foreign` (`user_id`),
  ADD KEY `posts_category_id_foreign` (`category_id`);

--
-- Indices de la tabla `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profiles_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `solicituds`
--
ALTER TABLE `solicituds`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `solicitud_user`
--
ALTER TABLE `solicitud_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `solicitud_user_solicitud_id_foreign` (`solicitud_id`),
  ADD KEY `solicitud_user_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `specialities`
--
ALTER TABLE `specialities`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `documents`
--
ALTER TABLE `documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `solicituds`
--
ALTER TABLE `solicituds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `solicitud_user`
--
ALTER TABLE `solicitud_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `specialities`
--
ALTER TABLE `specialities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `documents_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `solicitud_user`
--
ALTER TABLE `solicitud_user`
  ADD CONSTRAINT `solicitud_user_solicitud_id_foreign` FOREIGN KEY (`solicitud_id`) REFERENCES `solicituds` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `solicitud_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
