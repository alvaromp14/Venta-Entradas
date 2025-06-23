-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-12-2023 a las 22:56:55
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
-- Base de datos: `proyecto_eventos_php`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  `lugar` varchar(50) NOT NULL,
  `aforo` int(11) NOT NULL,
  `precio` int(11) NOT NULL,
  `iframe` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id`, `nombre`, `fecha`, `lugar`, `aforo`, `precio`, `iframe`) VALUES
(1, 'Concierto', '2024-07-06', 'Albacete', 55, 20, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d24808.093106605742!2d-1.8811889516993632!3d38.992230744476636!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd665fe2fb218d15%3A0x8269cd31d6186180!2sAlbacete!5e0!3m2!1ses!2ses!4v1701921077691!5m2!1ses!2ses'),
(2, 'Festival', '2024-06-28', 'Madrid', 200, 40, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d194347.47827024403!2d-3.8443432371735984!3d40.43809861025953!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd422997800a3c81%3A0xc436dec1618c2269!2sMadrid!5e0!3m2!1ses!2ses!4v1701922657916!5m2!1ses!2ses'),
(3, 'Obra de teatro', '2024-07-18', 'Albacete', 40, 12, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d24808.093106605742!2d-1.8811889516993632!3d38.992230744476636!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd665fe2fb218d15%3A0x8269cd31d6186180!2sAlbacete!5e0!3m2!1ses!2ses!4v1701921077691!5m2!1ses!2ses'),
(4, 'Festival', '2024-08-15', 'Valencia', 500, 50, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d98646.97135807572!2d-0.4439117246236513!3d39.407888824720814!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd604f4cf0efb06f%3A0xb4a351011f7f1d39!2sValencia!5e0!3m2!1ses!2ses!4v1701923366395!5m2!1ses!2ses');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
