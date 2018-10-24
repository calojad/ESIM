-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-10-2018 a las 01:01:33
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `eval_esim`
--

--
-- Volcado de datos para la tabla `carrera`
--

INSERT INTO `carrera` (`id`, `nombre`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'Medicina', 1, '2018-10-16 21:50:10', '2018-10-16 21:50:10'),
(2, 'OdontologÃ­a', 1, '2018-10-16 21:50:21', '2018-10-16 21:50:21'),
(3, 'EnfermerÃ­a', 1, '2018-10-16 21:50:43', '2018-10-16 21:50:43'),
(4, 'Software', 1, '2018-10-16 21:50:59', '2018-10-16 21:52:02'),
(5, 'EducaciÃ³n', 1, '2018-10-16 21:52:19', '2018-10-16 21:52:19'),
(6, 'EconomÃ­a', 1, '2018-10-16 21:52:42', '2018-10-16 21:52:42'),
(7, 'IngenierÃ­a ElÃ©ctronica', 1, '2018-10-16 21:53:38', '2018-10-16 21:53:38'),
(8, 'EducaciÃ³n Inicial y Parvularia', 1, '2018-10-22 13:57:45', '2018-10-22 13:57:45'),
(9, 'EducaciÃ³n Inicial', 1, '2018-10-22 13:57:56', '2018-10-22 13:57:56'),
(10, 'PedagogÃ­a de la Actividad FÃ­sica y El Deporte', 1, '2018-10-22 13:58:18', '2018-10-22 13:58:18'),
(11, 'Contabilidad y Auditoria', 1, '2018-10-22 13:58:40', '2018-10-22 13:58:40'),
(12, 'AdministraciÃ³n de Empresas', 1, '2018-10-22 13:58:56', '2018-10-22 13:58:56'),
(13, 'Trabajo y Servicio Social', 1, '2018-10-22 13:59:16', '2018-10-22 13:59:16'),
(14, 'Trabajo Social', 1, '2018-10-22 14:01:03', '2018-10-22 14:01:03'),
(15, 'Ciencias de la InformaciÃ³n y la ComunicaciÃ³n', 1, '2018-10-22 14:01:42', '2018-10-22 14:01:42'),
(16, 'Derecho', 1, '2018-10-22 14:01:53', '2018-10-22 14:01:53'),
(17, 'IngenierÃ­a Ambiental', 1, '2018-10-22 14:02:17', '2018-10-22 14:02:17'),
(18, 'IngenierÃ­a ElÃ©ctrica y ElectrÃ³nica', 1, '2018-10-22 14:02:41', '2018-10-22 14:02:41'),
(19, 'IngenierÃ­a Industrial', 1, '2018-10-22 14:03:14', '2018-10-22 14:03:14'),
(20, 'IngenierÃ­a Civil', 1, '2018-10-22 14:03:24', '2018-10-22 14:03:24'),
(21, 'Arquitectura', 1, '2018-10-22 14:03:32', '2018-10-22 14:03:32'),
(22, 'Arquitectura y Urbanismo', 1, '2018-10-22 14:03:46', '2018-10-22 14:03:46'),
(23, 'PsicologÃ­a ClÃ­nica', 1, '2018-10-22 14:04:21', '2018-10-22 14:04:21'),
(24, 'Biofarmacia', 1, '2018-10-22 14:04:30', '2018-10-22 14:04:30'),
(25, 'Medicina Veterinaria', 1, '2018-10-22 14:05:07', '2018-10-22 14:05:07'),
(26, 'IngenierÃ­a en Sistemas', 1, '2018-10-22 14:05:27', '2018-10-22 14:13:02'),
(27, 'Sistemas de InformaciÃ³n', 1, '2018-10-22 14:05:52', '2018-10-22 14:05:52'),
(28, 'TecnologÃ­as de la InformaciÃ³n', 1, '2018-10-22 14:06:04', '2018-10-22 14:06:04');

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_10_12_110756_create_tables_menu_sistema', 1),
(4, '2018_10_12_111210_create_tables_menu_ies', 1),
(5, '2018_10_15_155252_alter_foreign_keys_tables', 1),
(6, '2018_10_22_104432_create_table_usuario_asignacion', 2);

--
-- Volcado de datos para la tabla `periodo`
--

INSERT INTO `periodo` (`id`, `tipo_periodo_id`, `nombre`, `fecha_inicio`, `fecha_fin`, `estado`, `created_at`, `updated_at`) VALUES
(1, 1, '2017-2018', '2017-09-11', '2018-02-22', 1, '2018-10-16 16:20:17', '2018-10-16 16:51:17'),
(2, 1, '2018-2018', '2018-03-12', '2018-08-08', 1, '2018-10-16 16:21:10', '2018-10-16 21:30:44');

--
-- Volcado de datos para la tabla `tipo_evaluacion`
--

INSERT INTO `tipo_evaluacion` (`id`, `nombre`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'Digital', 1, '2018-10-15 14:44:53', '2018-10-16 21:30:12');

--
-- Volcado de datos para la tabla `tipo_periodo`
--

INSERT INTO `tipo_periodo` (`id`, `nombre`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'Ciclos', 1, NULL, '2018-10-16 21:30:25'),
(2, 'AÃ±os', 1, NULL, '2018-10-16 21:30:28');

--
-- Volcado de datos para la tabla `tipo_unidad`
--

INSERT INTO `tipo_unidad` (`id`, `nombre`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'Matriz', 1, NULL, NULL),
(2, 'Sede', 1, NULL, NULL),
(3, 'ExtenciÃ³n', 1, NULL, '2018-10-16 14:12:56');

--
-- Volcado de datos para la tabla `ubicacion`
--

INSERT INTO `ubicacion` (`id`, `nombre`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'Cuenca', 1, NULL, '2018-10-15 22:11:51'),
(2, 'Azogues', 1, NULL, NULL),
(3, 'Macas', 1, NULL, NULL),
(4, 'CaÃ±ar', 1, NULL, NULL),
(5, 'Troncal', 1, NULL, NULL);

--
-- Volcado de datos para la tabla `unidad`
--

INSERT INTO `unidad` (`id`, `tipo_unidad_id`, `ubicacion_id`, `nombre`, `estado`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Matriz Cuenca', 1, '2018-10-16 19:32:27', '2018-10-16 19:57:13'),
(2, 2, 2, 'Sede Azogues', 1, '2018-10-16 19:32:45', '2018-10-16 19:32:45'),
(3, 2, 3, 'Sede Macas', 1, '2018-10-16 19:33:05', '2018-10-16 19:33:05'),
(4, 3, 4, 'ExtenciÃ³n CaÃ±ar', 1, '2018-10-16 19:33:21', '2018-10-16 21:24:12'),
(5, 3, 5, 'ExtenciÃ³n Troncal', 1, '2018-10-16 19:33:35', '2018-10-16 19:33:35');

--
-- Volcado de datos para la tabla `unidad_carrera`
--

INSERT INTO `unidad_carrera` (`id`, `unidad_id`, `carrera_id`, `created_at`, `updated_at`) VALUES
(1, 1, 12, '2018-10-22 14:10:11', '2018-10-22 14:10:11'),
(2, 1, 22, '2018-10-22 14:10:11', '2018-10-22 14:10:11'),
(3, 1, 24, '2018-10-22 14:10:11', '2018-10-22 14:10:11'),
(4, 1, 15, '2018-10-22 14:10:11', '2018-10-22 14:10:11'),
(5, 1, 11, '2018-10-22 14:10:11', '2018-10-22 14:10:11'),
(6, 1, 16, '2018-10-22 14:10:11', '2018-10-22 14:10:11'),
(7, 1, 6, '2018-10-22 14:10:11', '2018-10-22 14:10:11'),
(8, 1, 8, '2018-10-22 14:10:11', '2018-10-22 14:10:11'),
(9, 1, 3, '2018-10-22 14:10:11', '2018-10-22 14:10:11'),
(10, 1, 17, '2018-10-22 14:10:11', '2018-10-22 14:10:11'),
(11, 1, 20, '2018-10-22 14:10:11', '2018-10-22 14:10:11'),
(12, 1, 18, '2018-10-22 14:10:11', '2018-10-22 14:10:11'),
(13, 1, 19, '2018-10-22 14:10:11', '2018-10-22 14:10:11'),
(14, 1, 25, '2018-10-22 14:10:11', '2018-10-22 14:10:11'),
(15, 1, 2, '2018-10-22 14:10:11', '2018-10-22 14:10:11'),
(16, 1, 23, '2018-10-22 14:10:11', '2018-10-22 14:10:11'),
(17, 1, 4, '2018-10-22 14:10:11', '2018-10-22 14:10:11'),
(18, 1, 13, '2018-10-22 14:10:11', '2018-10-22 14:10:11'),
(19, 2, 12, '2018-10-22 15:13:06', '2018-10-22 15:13:06'),
(20, 2, 22, '2018-10-22 15:13:06', '2018-10-22 15:13:06'),
(21, 2, 11, '2018-10-22 15:13:06', '2018-10-22 15:13:06'),
(22, 2, 16, '2018-10-22 15:13:06', '2018-10-22 15:13:06'),
(23, 2, 5, '2018-10-22 15:13:06', '2018-10-22 15:13:06'),
(24, 2, 3, '2018-10-22 15:13:06', '2018-10-22 15:13:06'),
(25, 2, 20, '2018-10-22 15:13:06', '2018-10-22 15:13:06'),
(26, 2, 26, '2018-10-22 15:13:06', '2018-10-22 15:13:06'),
(27, 2, 2, '2018-10-22 15:13:06', '2018-10-22 15:13:06'),
(28, 2, 10, '2018-10-22 15:13:06', '2018-10-22 15:13:06'),
(29, 3, 12, '2018-10-22 15:38:00', '2018-10-22 15:38:00'),
(30, 3, 11, '2018-10-22 15:38:01', '2018-10-22 15:38:01'),
(31, 3, 9, '2018-10-22 15:38:01', '2018-10-22 15:38:01'),
(32, 3, 8, '2018-10-22 15:38:01', '2018-10-22 15:38:01'),
(33, 4, 12, '2018-10-22 15:39:39', '2018-10-22 15:39:39'),
(34, 4, 8, '2018-10-22 15:39:40', '2018-10-22 15:39:40'),
(35, 4, 3, '2018-10-22 15:39:40', '2018-10-22 15:39:40'),
(36, 4, 26, '2018-10-22 15:39:40', '2018-10-22 15:39:40'),
(37, 5, 12, '2018-10-22 15:40:13', '2018-10-22 15:40:13'),
(38, 5, 11, '2018-10-22 15:40:13', '2018-10-22 15:40:13'),
(39, 5, 16, '2018-10-22 15:40:13', '2018-10-22 15:40:13'),
(41, 5, 28, '2018-10-22 19:32:31', '2018-10-22 19:32:31');

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `estado`, `rol`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Andres Loja', 'calojad', 'cal-107@hotmail.com', '$2y$10$oWkdooeCSrAAEJA.LHI5L.AZ72AFiv/Ufevvm20Ofvofo8abEgl9.', 1, 1, 'ftjEwHmVgptKz6WuDKAOlV5cZ3g3oDC4Uye2f1ZnECVqmpEi7j89vwqXfypz', '2018-10-15 21:15:34', '2018-10-15 21:15:34'),
(2, 'Irma Carchi Quezada', 'Icarchi', 'icharchi@gmail.com', '$2y$10$jaO40i9j6wNwykIhYKojDOy96vtSes6yiqtwy04oGZgCEpjh3PCLy', 1, 2, NULL, '2018-10-22 16:52:23', '2018-10-23 15:16:19'),
(3, 'Carmen Cecilia Saeteros', 'Csaeteros', 'csaeteros@gmail.com', '$2y$10$2TFaIQ6b9hneUCdvDQtWA.kZz.wt/kzIdGGByeBEj28wcnQDgay9G', 1, 2, NULL, '2018-10-23 14:58:58', '2018-10-23 14:58:58'),
(4, 'Rosa Ana Pesantez', 'Rpesantez', 'rpesantez@gmail.com', '$2y$10$Qz.u1FY.suj0LVQE5UtBhu8GFqhJm4ZngdNq/LrS1zrkUj96Gd756', 1, 2, NULL, '2018-10-23 15:15:26', '2018-10-23 15:15:26');

--
-- Volcado de datos para la tabla `usuario_asignacion`
--

INSERT INTO `usuario_asignacion` (`id`, `usuario_id`, `carrera_id`, `periodo_id`, `created_at`, `updated_at`) VALUES
(1, 3, 2, 1, '2018-10-24 20:12:13', '2018-10-24 20:13:08'),
(2, 3, 12, 1, '2018-10-24 20:16:17', '2018-10-24 20:16:17'),
(3, 3, 8, 1, '2018-10-24 20:16:17', '2018-10-24 20:16:17'),
(7, 3, 13, 2, '2018-10-24 20:28:33', '2018-10-24 20:28:33'),
(8, 3, 9, 2, '2018-10-24 20:28:33', '2018-10-24 20:28:33'),
(9, 3, 25, 2, '2018-10-24 20:28:34', '2018-10-24 20:28:34');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
