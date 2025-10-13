-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-10-2025 a las 20:37:46
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

--
-- Volcado de datos para la tabla `capitulos`
--

INSERT INTO `capitulos` (`ID_capitulos`, `Titulo`, `Descripcion`, `ID_serie_fk`) VALUES
(4, 'Episodio 1', 'Thomas shelby reconoce una oportunidad para avanzar en el mundo criminal gracias a un cargamento perdido de armas.', 3),
(5, 'Episodio 2', 'Thomas arregla una carrera de caballos para provocar a un capo local y comienza una guerra con familia gitana. El inspictor campbell lleva a cabo una redada.', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temporada`
--

CREATE TABLE `temporada` (
  `ID_serie` int(11) NOT NULL,
  `Nombre` varchar(25) NOT NULL,
  `Fecha_estreno` date NOT NULL,
  `Productora` varchar(100) NOT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `temporada`
--

INSERT INTO `temporada` (`ID_serie`, `Nombre`, `Fecha_estreno`, `Productora`, `imagen`) VALUES
(3, 'Peaky Blinders', '2013-09-10', 'BBC Studios, Caryn Mandabach Productions y Tiger Aspect Productions', 'https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcR_cruxvYUrdnxvkziGe4DVWeBnJtEEJCwn8IV_axycdZf7R-9ibsTude_3jOdDLw-njfKW2Q-YRfnhraiYnNWb0SSeNgDoF6oiORAv9-wM');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `Usuario` varchar(200) NOT NULL,
  `contraseña` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `Usuario`, `contraseña`) VALUES
(1, 'webadmin', '$2y$10$.cgeRjA95UxLT5/Oc2hbb.cZ9KPc4bYx.0k0i3ENTFxGNLIIxQFnS');

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
-- Indices de la tabla `temporada`
--
ALTER TABLE `temporada`
  ADD PRIMARY KEY (`ID_serie`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `capitulos`
--
ALTER TABLE `capitulos`
  MODIFY `ID_capitulos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `temporada`
--
ALTER TABLE `temporada`
  MODIFY `ID_serie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `capitulos`
--
ALTER TABLE `capitulos`
  ADD CONSTRAINT `fk_capitulo_serie` FOREIGN KEY (`ID_serie_fk`) REFERENCES `temporada` (`ID_serie`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
