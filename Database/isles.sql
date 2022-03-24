-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-03-2022 a las 17:07:54
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `m14`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `isles`
--

CREATE TABLE `isles` (
  `id` int(10) NOT NULL,
  `name` varchar(10) NOT NULL,
  `description` text NOT NULL,
  `area` int(10) NOT NULL,
  `latitude` bigint(30) NOT NULL,
  `longitude` bigint(30) NOT NULL,
  `country` varchar(255) NOT NULL,
  `population` int(20) NOT NULL,
  `images` varchar(50) NOT NULL,
  `flag` varchar(50) NOT NULL,
  `price` int(20) NOT NULL,
  `owner_id` int(10) NOT NULL,
  `add_date` date NOT NULL,
  `visits` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `isles`
--
ALTER TABLE `isles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `isles`
--
ALTER TABLE `isles`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
