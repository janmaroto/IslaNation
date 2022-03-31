-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 21, 2022 at 06:04 PM
-- Server version: 10.5.12-MariaDB-0+deb11u1
-- PHP Version: 8.1.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `islanation`
--
DROP DATABASE IF EXISTS islanation;
CREATE DATABASE islanation;
USE islanation;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` char(10) NOT NULL,
  `nickname` varchar(32) NOT NULL,
  `pwd_hash` varchar(64) NOT NULL,
  `email` varchar(32) NOT NULL,
  `avatar` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `uuids`
--

CREATE TABLE `uuids` (
  `uuid` char(36) NOT NULL,
  `user` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uuids`
--
ALTER TABLE `uuids`
  ADD KEY `user` (`user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- Constraints for table `uuids`
--
ALTER TABLE `uuids`
  ADD CONSTRAINT `uuids_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`id`);


CREATE TABLE `islands` (
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
  `owner_id` char(10) NOT NULL,
  `add_date` date NOT NULL,
  `visits` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `islands`
--
ALTER TABLE `islands`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `islands`
--
ALTER TABLE `islands`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

ALTER TABLE `islands`
  ADD CONSTRAINT `islands_ibfk_1` FOREIGN KEY (`owner_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
