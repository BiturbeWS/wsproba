-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-10-2019 a las 17:40:04
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `quiz`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logindatuak`
--

CREATE TABLE `logindatuak` (
  `Posta` varchar(200) NOT NULL,
  `Mota` int(11) NOT NULL,
  `Deiturak` varchar(200) NOT NULL,
  `Pasahitza` varchar(200) NOT NULL,
  `Argazkia` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `questions`
--

CREATE TABLE `questions` (
  `Identifikazioa` int(11) NOT NULL,
  `Posta` varchar(200) NOT NULL,
  `Galdera` varchar(200) NOT NULL,
  `ErantzunZuzena` varchar(200) NOT NULL,
  `OkerraBat` varchar(200) NOT NULL,
  `OkerraBi` varchar(200) NOT NULL,
  `OkerraHiru` varchar(200) NOT NULL,
  `Zailtasuna` int(11) NOT NULL,
  `Gaia` varchar(200) NOT NULL,
  `Argazkia` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `logindatuak`
--
ALTER TABLE `logindatuak`
  ADD PRIMARY KEY (`Posta`);

--
-- Indices de la tabla `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`Identifikazioa`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `questions`
--
ALTER TABLE `questions`
  MODIFY `Identifikazioa` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
