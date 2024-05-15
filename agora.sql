-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 23-04-2024 a las 07:43:52
-- Versión del servidor: 8.0.31
-- Versión de PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `agora`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `event`
--

DROP TABLE IF EXISTS `event`;
CREATE TABLE IF NOT EXISTS `event` (
  `idEvent` int NOT NULL AUTO_INCREMENT,
  `idUser` int NOT NULL,
  `idLocation` int NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `dateTime` datetime NOT NULL,
  `description` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`idEvent`),
  KEY `idUser` (`idUser`),
  KEY `idLocation` (`idLocation`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `event`
--

INSERT INTO `event` (`idEvent`, `idUser`, `idLocation`, `name`, `dateTime`, `description`) VALUES
(19, 7, 7, 'Plan jugar a los bolos', '2024-01-02 20:09:00', 'Ir a la bolera con los colegas'),
(21, 10, 1, 'Chocolate', '2024-01-02 20:02:00', 'Tomar chocolate con churros'),
(46, 20, 18, 'Caballito', '2024-04-19 14:38:00', 'Montar caballito'),
(48, 20, 7, 'Cata de vinos', '2024-06-30 09:08:00', 'Cata de vinos'),
(60, 20, 1, 'Programación estudio', '2024-04-22 09:58:00', 'Quedada para estudiar en grupo'),
(62, 20, 9, 'Piscina', '2024-04-25 14:07:00', 'piscina con colegas'),
(64, 20, 13, 'Feria de la cerveza', '2024-04-22 15:47:00', 'Tomaremos cañas de diferentes orígenes'),
(66, 20, 1, 'Lectura al aire libre', '2024-04-22 18:01:00', 'Reunión en el parque para leer y compartir opinión'),
(67, 20, 7, 'Cena', '2024-04-23 09:43:02', 'Cena de despedida');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `location`
--

DROP TABLE IF EXISTS `location`;
CREATE TABLE IF NOT EXISTS `location` (
  `idLocation` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`idLocation`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `location`
--

INSERT INTO `location` (`idLocation`, `name`) VALUES
(1, 'Alcobendas'),
(2, 'San Sebastián de los Reyes'),
(3, 'Alcorcón'),
(4, 'Getafe'),
(5, 'Torrejón de Ardoz'),
(6, 'Algete'),
(7, 'Barajas'),
(8, 'Madrid Capital'),
(9, 'Villaverde'),
(10, 'Parla'),
(11, 'Tres Cantos'),
(12, 'Alcalá de Henares'),
(13, 'Arganda del Rey'),
(14, 'Boadilla del Monte'),
(15, 'Collado Villalba'),
(16, 'Coslada'),
(17, 'Fuenlabrada'),
(18, 'Leganés'),
(19, 'Pozuelo de Alarcón'),
(20, 'Majadahonda'),
(21, 'Rivas-Vaciamadrid'),
(22, 'San Fernando de Henares'),
(23, 'Valdemoro'),
(24, 'Las Rozas de Madrid'),
(25, 'Pinto'),
(26, 'Villaviciosa de Odón'),
(27, 'Torrelodones'),
(28, 'Colmenar viejo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `participants`
--

DROP TABLE IF EXISTS `participants`;
CREATE TABLE IF NOT EXISTS `participants` (
  `idParticipants` int NOT NULL AUTO_INCREMENT,
  `idUser` int NOT NULL,
  `idEvent` int NOT NULL,
  PRIMARY KEY (`idParticipants`),
  KEY `idUser` (`idUser`),
  KEY `idEvent` (`idEvent`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `participants`
--

INSERT INTO `participants` (`idParticipants`, `idUser`, `idEvent`) VALUES
(29, 7, 19),
(30, 10, 19),
(32, 10, 21),
(33, 11, 19),
(51, 14, 21),
(55, 17, 19),
(63, 20, 62),
(67, 20, 64),
(71, 20, 66),
(72, 20, 21),
(73, 20, 67);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `idUser` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `age` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `secretToken` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `idLocation` int NOT NULL,
  PRIMARY KEY (`idUser`),
  KEY `idLocation` (`idLocation`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`idUser`, `name`, `email`, `password`, `age`, `secretToken`, `idLocation`) VALUES
(7, 'eva', 'name@example.com', 'eva', '28', '45dc0136-2e6d-441c-ba13-e4835cea2fcf', 1),
(8, 'bob', 'name@example.com', 'bob', '24', '05a0d3bc-4384-435a-9a22-ad954fe1e6d3', 3),
(9, 'ana', 'name@example.com', 'ana', '30', '9709a420-a1f1-4d87-a0a6-f357bda9a039', 5),
(10, 'nuria', 'name@example.com', 'nuria', '20', '61a3e226-9908-4881-ba02-9eae96ca0174', 7),
(11, 'raul', 'name@example.com', 'raul', '20', 'a4c1e255-3e60-489c-9893-73d0910240eb', 8),
(12, 'dani', 'name@example.com', 'dani', '26', 'b74673be-3074-4382-89c1-844582f833d2', 5),
(13, 'anton', 'name@example.com', 'anton', '36', '72d97ccc-96ec-44e7-b537-c053a2eddf01', 7),
(14, 'lola', 'name@example.com', 'lola', '29', '67be21c6-78c2-4b72-9def-43d9f5b04167', 6),
(15, 'pepe', 'name@example.com', 'pepe', '29', '08f67549-212f-42e6-a21e-160016fcc9d5', 2),
(16, 'momo', 'name@example.com', 'momo', '54', 'cbee1f00-03e3-43d6-8eee-1a896742be50', 7),
(17, 'lili', 'name@example.com', 'lili', '18', '6683af8d-cd44-4a4b-b4eb-f69fa5077093', 3),
(18, 'prueba', 'name@example.com', 'prueba', '28', '9b373edb-9f3f-4666-a636-5c84a8b898f1', 1),
(19, 'luismi', 'luismi@gmail.es', 'luismi', '25', 'c56f4edf-ba22-43c3-957a-cccce1687013', 1),
(20, 'a', 'a@a.es', 'a', '1', 'f9e1a7d3-295b-40b0-a3e3-3d93aa49ab57', 1),
(21, 'axel', 'axel@gmail.es', 'axel', '15', 'e2fd69bd-da15-4a44-8766-81f407921951', 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`),
  ADD CONSTRAINT `event_ibfk_2` FOREIGN KEY (`idLocation`) REFERENCES `location` (`idLocation`);

--
-- Filtros para la tabla `participants`
--
ALTER TABLE `participants`
  ADD CONSTRAINT `participants_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`),
  ADD CONSTRAINT `participants_ibfk_2` FOREIGN KEY (`idEvent`) REFERENCES `event` (`idEvent`) ON DELETE CASCADE;

--
-- Filtros para la tabla `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`idLocation`) REFERENCES `location` (`idLocation`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
