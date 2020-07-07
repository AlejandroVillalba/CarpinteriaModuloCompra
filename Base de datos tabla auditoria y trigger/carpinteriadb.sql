-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-07-2020 a las 05:23:56
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `carpinteriadb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
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
(9, '2014_10_12_000000_create_users_table', 1),
(10, '2014_10_12_100000_create_password_resets_table', 1),
(11, '2019_08_19_000000_create_failed_jobs_table', 1),
(12, '2020_06_26_042336_create_proveedor_table', 1);

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
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombreEmpresa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ruc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Disparadores `proveedor`
--
DELIMITER $$
CREATE TRIGGER `AUTUALIZA_PROVEEDOR_BU` BEFORE UPDATE ON `proveedor` FOR EACH ROW INSERT INTO proveedor_au_up (Anterior_direccion,Anterior_email,Anterior_nombreEmpresa,Anterior_ruc,Anterior_telefono,
                             Nuevo_direccion,Nuevo_email,Nuevo_nombreEmpresa,Nuevo_ruc,Nuevo_telefono,
                             modificado, usuario)
VALUES(old.direccion, old.email, old.nombreEmpresa, old.ruc, old.telefono, 
       new.direccion, new.email, new.nombreEmpresa, new.ruc, new.telefono,
       now(), CURRENT_USER())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `ELIMINADO_PROVEEDOR_AD` AFTER DELETE ON `proveedor` FOR EACH ROW INSERT INTO proveedor_au_del (Eliminado_direccion, Eliminado_email, Eliminado_nombreEmpresa, Eliminado_ruc, Eliminado_telefono, eliminado, usuario)
VALUES(old.direccion, old.email, old.nombreEmpresa, old.ruc, old.telefono, now(), CURRENT_USER())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `PROVEEDOR_AI` AFTER INSERT ON `proveedor` FOR EACH ROW INSERT INTO proveedor_au_in (
    copia_nombreEmpresa,
    copia_ruc, 
    copia_direccion,
    copia_telefono, 
    copia_email,
    insertado,
    usuario)
VALUES(new.nombreEmpresa, new.ruc, new.direccion, new.telefono, new.email, now(), CURRENT_USER())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor_au_del`
--

CREATE TABLE `proveedor_au_del` (
  `id_proveedorAu` int(11) NOT NULL,
  `Eliminado_nombreEmpresa` varchar(255) DEFAULT NULL,
  `Eliminado_ruc` varchar(255) DEFAULT NULL,
  `Eliminado_direccion` varchar(255) DEFAULT NULL,
  `Eliminado_telefono` varchar(255) DEFAULT NULL,
  `Eliminado_email` varchar(255) DEFAULT NULL,
  `usuario` varchar(255) DEFAULT NULL,
  `eliminado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedor_au_del`
--

INSERT INTO `proveedor_au_del` (`id_proveedorAu`, `Eliminado_nombreEmpresa`, `Eliminado_ruc`, `Eliminado_direccion`, `Eliminado_telefono`, `Eliminado_email`, `usuario`, `eliminado`) VALUES
(1, 'Alejandro', '8000-5', 'adsfadfa', '333', 'Daniel@gmail.com', 'root@localhost', '2020-07-06 23:22:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor_au_in`
--

CREATE TABLE `proveedor_au_in` (
  `id_proveedorAu` int(11) NOT NULL,
  `copia_nombreEmpresa` varchar(255) DEFAULT NULL,
  `copia_ruc` varchar(255) DEFAULT NULL,
  `copia_direccion` varchar(255) DEFAULT NULL,
  `copia_telefono` varchar(255) DEFAULT NULL,
  `copia_email` varchar(255) DEFAULT NULL,
  `usuario` varchar(255) DEFAULT NULL,
  `insertado` datetime DEFAULT NULL,
  `id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `nombreEmpresa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ruc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedor_au_in`
--

INSERT INTO `proveedor_au_in` (`id_proveedorAu`, `copia_nombreEmpresa`, `copia_ruc`, `copia_direccion`, `copia_telefono`, `copia_email`, `usuario`, `insertado`, `id`, `nombreEmpresa`, `ruc`, `direccion`, `telefono`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Ale', '2222-5', 'adsfadfa', '333', 'Daniel@gmail.com', 'root@localhost', '2020-07-06 22:55:45', 0, '', '', '', '', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor_au_up`
--

CREATE TABLE `proveedor_au_up` (
  `id_proveedorAu` int(11) NOT NULL,
  `Anterior_nombreEmpresa` varchar(255) DEFAULT NULL,
  `Anterior_ruc` varchar(255) DEFAULT NULL,
  `Anterior_direccion` varchar(255) DEFAULT NULL,
  `Anterior_telefono` varchar(255) DEFAULT NULL,
  `Anterior_email` varchar(255) DEFAULT NULL,
  `Nuevo_nombreEmpresa` varchar(255) DEFAULT NULL,
  `Nuevo_ruc` varchar(255) DEFAULT NULL,
  `Nuevo_direccion` varchar(255) DEFAULT NULL,
  `Nuevo_telefono` varchar(255) DEFAULT NULL,
  `Nuevo_email` varchar(255) DEFAULT NULL,
  `usuario` varchar(255) DEFAULT NULL,
  `modificado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedor_au_up`
--

INSERT INTO `proveedor_au_up` (`id_proveedorAu`, `Anterior_nombreEmpresa`, `Anterior_ruc`, `Anterior_direccion`, `Anterior_telefono`, `Anterior_email`, `Nuevo_nombreEmpresa`, `Nuevo_ruc`, `Nuevo_direccion`, `Nuevo_telefono`, `Nuevo_email`, `usuario`, `modificado`) VALUES
(1, 'Ale', '2222-5', 'adsfadfa', '333', 'Daniel@gmail.com', 'Alejjjj', '2222-5', 'adsfadfa', '333', 'Daniel@gmail.com', 'root@localhost', '2020-07-06 23:13:57'),
(2, 'Alejjjj', '2222-5', 'adsfadfa', '333', 'Daniel@gmail.com', 'Alejandro', '8000-5', 'adsfadfa', '333', 'Daniel@gmail.com', 'root@localhost', '2020-07-06 23:14:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Alejandro', 'ale@gmail.com', NULL, '$2y$10$e1iBmL0gUG1ihjrDeRPrl.XkN.BD0l6giQbIkSTi7n9daiSdSP9RG', NULL, '2020-07-07 06:14:08', '2020-07-07 06:14:08');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

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
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `proveedor_ruc_unique` (`ruc`);

--
-- Indices de la tabla `proveedor_au_del`
--
ALTER TABLE `proveedor_au_del`
  ADD PRIMARY KEY (`id_proveedorAu`);

--
-- Indices de la tabla `proveedor_au_in`
--
ALTER TABLE `proveedor_au_in`
  ADD PRIMARY KEY (`id_proveedorAu`);

--
-- Indices de la tabla `proveedor_au_up`
--
ALTER TABLE `proveedor_au_up`
  ADD PRIMARY KEY (`id_proveedorAu`);

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
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `proveedor_au_del`
--
ALTER TABLE `proveedor_au_del`
  MODIFY `id_proveedorAu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `proveedor_au_in`
--
ALTER TABLE `proveedor_au_in`
  MODIFY `id_proveedorAu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `proveedor_au_up`
--
ALTER TABLE `proveedor_au_up`
  MODIFY `id_proveedorAu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
