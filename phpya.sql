-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-05-2018 a las 12:59:10
-- Versión del servidor: 10.1.25-MariaDB
-- Versión de PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `phpya`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `canalesyt`
--

CREATE TABLE `canalesyt` (
  `id` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `enlace` varchar(100) NOT NULL,
  `lenguajes` varchar(80) NOT NULL,
  `calificacion` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `canalesyt`
--

INSERT INTO `canalesyt` (`id`, `nombre`, `enlace`, `lenguajes`, `calificacion`) VALUES
(1, 'Carlos Alfaro', 'https://www.youtube.com/channel/UCRMJ0vxtnHh_UAq1Yx9BYWQ/featured', 'php, html5, css3', '5'),
(2, 'codigofacilito', 'https://www.youtube.com/user/codigofacilito/playlists', 'php7, python, C, polymer', '5'),
(3, 'FalconMasters', 'https://www.youtube.com/user/FalconMasters/playlists?shelf_id=6&view=50&sort=dd', 'html5, css3, Javascript, php y mysql, crear theme wordpress', '4'),
(4, 'Bluuweb !', 'https://www.youtube.com/user/Bluuweb/playlists', 'php, sass, Javascript, bootstrat 4', '5'),
(5, 'pildorasinformaticas', 'https://www.youtube.com/user/pildorasinformaticas/playlists', 'Java, Python, Android, SQL, Javascript', '5'),
(6, 'CÃ©sar Cancino', 'https://www.youtube.com/user/peligrocesar/playlists', 'php mvc poo', '4'),
(7, 'JesÃºs Conde', 'https://www.youtube.com/user/0utKast/playlists', 'wordpress para desarrolladores, Angular JS, Docker , Ionic, Android Studio', '5'),
(8, 'bextlan lugar de bits vectores y pixeles', 'https://www.youtube.com/user/bextlancom/playlists', 'POO con PHP y MySQL, Node.js, Responsive Design, JQuery, Javascript', '5'),
(9, 'ProgramaciÃ³n ATS', 'https://www.youtube.com/channel/UC7QoKU6bj1QbXQuNIjan82Q/playlists', 'C, C++, Java, Pseudocodigo, Diagrama de flijo', '3'),
(10, 'Java Dev One', 'https://www.youtube.com/channel/UChbgp4v5VDtySNOOU0JinSA/playlists', 'php para principiantes, Java, Javascript', '4'),
(11, 'EasyWebDevTraining', 'https://www.youtube.com/channel/UCbQCKBuL_gYvl8Z8zvObJog/playlists', 'Crear theme para wordpress, Ajax, Sass', '3'),
(12, 'Traversy Media', 'https://www.youtube.com/user/TechGuyWeb/playlists', 'Vanilla Javascript, php, Laravel, Node.js, JavascriptES6', '4'),
(13, 'Diego CastaÃ±o - Desarrollo Web Creativo', 'https://www.youtube.com/channel/UCRCXpqBS9P0_c1eYAZxLacA/playlists', 'Desarrollo web', '2'),
(14, ' LexterXPS', ' LexterXPS', 'Javascript, ajax, php(busque de datos en timpo real)', '5'),
(16, 'ITIC Tutoriales', 'https://www.youtube.com/channel/UCmhvftiqSSrBTPtpTbozLxA/videos', 'php', '4'),
(17, 'Develop With WP', 'https://www.youtube.com/channel/UCnVv6y1FJ2XbbmXvWO9VBDg?pbjreload=10', 'wp plugins, wp action hooks, wp_cli', '3'),
(18, 'The Net Ninja', 'https://www.youtube.com/channel/UCW5YeuERMmlnqo4oq8vwUpg/playlists', 'Kung Fu your web skills', '5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos_calendario`
--

CREATE TABLE `eventos_calendario` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `fecha_inicio` datetime NOT NULL,
  `fecha_fin` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `eventos_calendario`
--

INSERT INTO `eventos_calendario` (`id`, `descripcion`, `fecha_inicio`, `fecha_fin`) VALUES
(1, 'prueba de texto', '2017-09-28 00:00:00', '2017-09-28 00:00:00'),
(2, 'prueba de texto  2', '2017-09-24 00:00:00', '2017-09-24 00:00:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `canalesyt`
--
ALTER TABLE `canalesyt`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `eventos_calendario`
--
ALTER TABLE `eventos_calendario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `canalesyt`
--
ALTER TABLE `canalesyt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `eventos_calendario`
--
ALTER TABLE `eventos_calendario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
