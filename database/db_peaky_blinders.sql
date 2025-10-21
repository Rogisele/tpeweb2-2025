-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-10-2025 a las 01:17:14
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
  `Personajes` varchar(200) NOT NULL,
  `ID_temporada_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `capitulos`
--

INSERT INTO `capitulos` (`ID_capitulos`, `Titulo`, `Descripcion`, `Personajes`, `ID_temporada_fk`) VALUES
(10, 'Episodio 1', 'Un visitante misterioso aparece en medio de las celebraciones y pone en peligro a la familia el día de la boda tan esperada de Grace y Thomas. Además, Arthur conoce a una mujer.', ' Grace, Thomas y Arthur Shelvy,Freddie Thorne, Billy Kimber.', 7),
(11, 'Episodio 1', 'Thomas arregla una carrera de caballos para provocar a un capo local y comienza una guerra con familia gitana. El inspictor campbell lleva a cabo una redada.', 'Thomas Shelby,Johnny Dogs, Inspector Campbell', 10),
(12, 'Episodio 1', 'Thomas Shelby se acerca a Billy Kimber para llevar el negocio de carreras de caballos y empieza una pelea con los Lees, una familia gitana. Además, se reúne con el inspector Campbell para hablar de las armas robadas.', 'Thomas Shelby,Billy Kimber, inspector Campbell.', 3),
(13, 'episodio 2', 'Thomas está furioso al descubrir que Ada y Freddie están casados. Además, viaja a Cheltenham junto a Grace para estar más cerca de Billy Kimber.', 'Thomas y Ada Shelby, Grace y Billy Kimber.', 10),
(14, 'Episodio 2', 'Thomas enfrenta a un jefe del IRA que busca vengar la muerte de su primo, Campbell se acerca a las armas robadas, y Grace tiene que decidir dónde está su lealtad.', 'Thomas Shelby, Grace, Campbell', 3),
(15, 'Episodio 2', 'Mientras que Thomas se prepara para la batalla, los secretos se revelan y la familia tiene que hacer frente a los problemas que los han separado.', 'Thomas, Ada y Arthur Shelby, Polly Grace', 7),
(16, 'Episodio 3', 'Tommy prepara el crimen más audaz de su carrera y enfrenta a sus peores miedos. Vive su mayor pesadilla y necesita a su familia más cerca que nunca pero no está seguro de poder confiar en ellos.', '', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temporadas`
--

CREATE TABLE `temporadas` (
  `ID_temporada` int(11) NOT NULL,
  `Nombre` varchar(25) NOT NULL,
  `Fecha_estreno` date NOT NULL,
  `Productora` varchar(100) NOT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `temporadas`
--

INSERT INTO `temporadas` (`ID_temporada`, `Nombre`, `Fecha_estreno`, `Productora`, `imagen`) VALUES
(3, 'Peaky Blinders', '2013-09-10', 'BBC Studios, Caryn Mandabach Productions y Tiger Aspect Productions', 'https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcR_cruxvYUrdnxvkziGe4DVWeBnJtEEJCwn8IV_axycdZf7R-9ibsTude_3jOdDLw-njfKW2Q-YRfnhraiYnNWb0SSeNgDoF6oiORAv9-wM'),
(7, 'Temporada 3', '2025-10-30', 'BBC Studios, Caryn Mandabach Productions y Tiger Aspect Productions', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSWn4sVm6ybDVah8bejE8OH3NCbZBv_UNbAyfLm--FqOn2MLDB4Q-nBd9uQleHUD_xbS_Lm9tVYB1OKB5hkdyO9RdcKLIDRR98KADOP0HqqkQ'),
(8, 'Temporada 4', '2025-10-24', 'BBC Studios, Caryn Mandabach Productions y Tiger Aspect Productions', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSWn4sVm6ybDVah8bejE8OH3NCbZBv_UNbAyfLm--FqOn2MLDB4Q-nBd9uQleHUD_xbS_Lm9tVYB1OKB5hkdyO9RdcKLIDRR98KADOP0HqqkQ'),
(10, 'Temporada 1', '2013-09-12', 'BBC Studios, Caryn Mandabach Productions y Tiger Aspect Productions', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSWn4sVm6ybDVah8bejE8OH3NCbZBv_UNbAyfLm--FqOn2MLDB4Q-nBd9uQleHUD_xbS_Lm9tVYB1OKB5hkdyO9RdcKLIDRR98KADOP0HqqkQ');

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
  ADD KEY `ID_serie_fk` (`ID_temporada_fk`);

--
-- Indices de la tabla `temporadas`
--
ALTER TABLE `temporadas`
  ADD PRIMARY KEY (`ID_temporada`);

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
  MODIFY `ID_capitulos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `temporadas`
--
ALTER TABLE `temporadas`
  MODIFY `ID_temporada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  ADD CONSTRAINT `fk_capitulo_serie` FOREIGN KEY (`ID_temporada_fk`) REFERENCES `temporadas` (`ID_temporada`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
