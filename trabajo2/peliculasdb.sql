-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-04-2025 a las 04:51:42
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
-- Base de datos: `peliculasdb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clasificaciones`
--

CREATE TABLE `clasificaciones` (
  `id` int(11) NOT NULL,
  `nombre_clasificacion` varchar(10) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clasificaciones`
--

INSERT INTO `clasificaciones` (`id`, `nombre_clasificacion`, `descripcion`) VALUES
(1, 'G', 'Apta para todo público'),
(2, 'PG', 'Se sugiere la guía de los padres'),
(3, 'PG-13', 'No recomendada para menores de 13 años'),
(4, 'R', 'Restringida, menores de 17 años requieren acompañante'),
(5, 'NC-17', 'Solo para adultos, no se admiten menores de 17 años');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `directores`
--

CREATE TABLE `directores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `nacionalidad` varchar(50) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `directores`
--

INSERT INTO `directores` (`id`, `nombre`, `apellido`, `nacionalidad`, `fecha_nacimiento`) VALUES
(1, 'Steven', 'Spielberg', 'Estadounidense', '1946-12-18'),
(2, 'Christopher', 'Nolan', 'Británico-Estadounidense', '1970-07-30'),
(3, 'Guillermo', 'del Toro', 'Mexicano', '1964-10-09'),
(4, 'Alfonso', 'Cuarón', 'Mexicano', '1961-11-28'),
(5, 'Quentin', 'Tarantino', 'Estadounidense', '1963-03-27'),
(6, 'Martin', 'Scorsese', 'Estadounidense', '1942-11-17'),
(7, 'James', 'Cameron', 'Canadiense', '1954-08-16'),
(8, 'Greta', 'Gerwig', 'Estadounidense', '1983-08-04'),
(9, 'Alejandro', 'González Iñárritu', 'Mexicano', '1963-08-15'),
(10, 'Hayao', 'Miyazaki', 'Japonés', '1941-01-05'),
(11, 'Steven', 'Spielberg', 'Estadounidense', '1946-12-18'),
(12, 'Christopher', 'Nolan', 'Británico-Estadounidense', '1970-07-30'),
(13, 'Guillermo', 'del Toro', 'Mexicano', '1964-10-09'),
(14, 'Alfonso', 'Cuarón', 'Mexicano', '1961-11-28'),
(15, 'Quentin', 'Tarantino', 'Estadounidense', '1963-03-27'),
(16, 'Martin', 'Scorsese', 'Estadounidense', '1942-11-17'),
(17, 'James', 'Cameron', 'Canadiense', '1954-08-16'),
(18, 'Greta', 'Gerwig', 'Estadounidense', '1983-08-04'),
(19, 'Alejandro', 'González Iñárritu', 'Mexicano', '1963-08-15'),
(20, 'Hayao', 'Miyazaki', 'Japonés', '1941-01-05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudios`
--

CREATE TABLE `estudios` (
  `id` int(11) NOT NULL,
  `nombre_estudio` varchar(100) NOT NULL,
  `pais` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estudios`
--

INSERT INTO `estudios` (`id`, `nombre_estudio`, `pais`) VALUES
(1, 'Warner Bros.', 'Estados Unidos'),
(2, 'Universal Pictures', 'Estados Unidos'),
(3, '20th Century Studios', 'Estados Unidos'),
(4, 'Paramount Pictures', 'Estados Unidos'),
(5, 'Sony Pictures', 'Estados Unidos'),
(6, 'Walt Disney Pictures', 'Estados Unidos'),
(7, 'Studio Ghibli', 'Japón');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generos`
--

CREATE TABLE `generos` (
  `id` int(11) NOT NULL,
  `nombre_genero` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `generos`
--

INSERT INTO `generos` (`id`, `nombre_genero`) VALUES
(1, 'Acción'),
(8, 'Animación'),
(2, 'Aventura'),
(5, 'Ciencia Ficción'),
(3, 'Comedia'),
(9, 'Documental'),
(4, 'Drama'),
(10, 'Fantasía'),
(12, 'Musical'),
(7, 'Romance'),
(6, 'Terror'),
(11, 'Thriller');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

CREATE TABLE `peliculas` (
  `id` int(11) NOT NULL,
  `codigo` varchar(10) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `sinopsis` text DEFAULT NULL,
  `anio_lanzamiento` int(11) NOT NULL,
  `duracion` int(11) NOT NULL COMMENT 'Duración en minutos',
  `id_clasificacion` int(11) NOT NULL,
  `id_genero` int(11) NOT NULL,
  `id_director` int(11) NOT NULL,
  `id_estudio` int(11) NOT NULL,
  `poster_url` varchar(255) DEFAULT NULL,
  `fecha_registro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`id`, `codigo`, `titulo`, `sinopsis`, `anio_lanzamiento`, `duracion`, `id_clasificacion`, `id_genero`, `id_director`, `id_estudio`, `poster_url`, `fecha_registro`) VALUES
(5, '02374', 'sadnes', 'proceso propio ', 2023, 123, 3, 9, 13, 5, NULL, '2025-03-21');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clasificaciones`
--
ALTER TABLE `clasificaciones`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre_clasificacion` (`nombre_clasificacion`);

--
-- Indices de la tabla `directores`
--
ALTER TABLE `directores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estudios`
--
ALTER TABLE `estudios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre_estudio` (`nombre_estudio`);

--
-- Indices de la tabla `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre_genero` (`nombre_genero`);

--
-- Indices de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo` (`codigo`),
  ADD KEY `id_clasificacion` (`id_clasificacion`),
  ADD KEY `id_genero` (`id_genero`),
  ADD KEY `id_director` (`id_director`),
  ADD KEY `id_estudio` (`id_estudio`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clasificaciones`
--
ALTER TABLE `clasificaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `directores`
--
ALTER TABLE `directores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `estudios`
--
ALTER TABLE `estudios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `generos`
--
ALTER TABLE `generos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD CONSTRAINT `peliculas_ibfk_1` FOREIGN KEY (`id_clasificacion`) REFERENCES `clasificaciones` (`id`),
  ADD CONSTRAINT `peliculas_ibfk_2` FOREIGN KEY (`id_genero`) REFERENCES `generos` (`id`),
  ADD CONSTRAINT `peliculas_ibfk_3` FOREIGN KEY (`id_director`) REFERENCES `directores` (`id`),
  ADD CONSTRAINT `peliculas_ibfk_4` FOREIGN KEY (`id_estudio`) REFERENCES `estudios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
