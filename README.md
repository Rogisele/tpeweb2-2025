# tpeweb2-2025
Nuestra tematica de la pagina web va a ser una serie "The Peaky Blinders". Donde va a haber dos tablas "serie" y "capitulos".
En la pagina se va a mostrar dicha serie con sus respectivos capitulos.
La relacion de cada entidad es que para la serie(1, clave primaria) existen capitulos(N, clave foranea).
Integrantes:
Rodriguez, Rocio Gisele Dni 35418532 email rogisele1990@gmail.com
Bryan Daniel, Tolosa Dni 43739527 email czsa156@gmail.com



![Imagen de WhatsApp 2025-09-16 a las 19 49 04_95eb6f06](https://github.com/user-attachments/assets/3e501dee-396f-4060-b612-6d9b9d761550)
[db_peaky_blinders.sql](https://github.com/user-attachments/files/22372703/db_peaky_blinders.sql)
-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-09-2025 a las 00:44:53
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_peaky_blinders`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `capitulos`
--

CREATE TABLE `capitulos` (
  `ID_capitulos` int(11) NOT NULL,
  `Titulo` varchar(25) NOT NULL,
  `Descripcion` text NOT NULL,
  `ID_serie_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `serie`
--

CREATE TABLE `serie` (
  `ID_serie` int(11) NOT NULL,
  `Nombre` varchar(25) NOT NULL,
  `Fecha_estreno` date NOT NULL,
  `Productora` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `capitulos`
--
ALTER TABLE `capitulos`
  ADD PRIMARY KEY (`ID_capitulos`),
  ADD KEY `ID_serie_fk` (`ID_serie_fk`);

--
-- Indices de la tabla `serie`
--
ALTER TABLE `serie`
  ADD PRIMARY KEY (`ID_serie`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `capitulos`
--
ALTER TABLE `capitulos`
  MODIFY `ID_capitulos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `serie`
--
ALTER TABLE `serie`
  MODIFY `ID_serie` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `capitulos`
--
ALTER TABLE `capitulos`
  ADD CONSTRAINT `fk_capitulo_serie` FOREIGN KEY (`ID_serie_fk`) REFERENCES `serie` (`ID_serie`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
