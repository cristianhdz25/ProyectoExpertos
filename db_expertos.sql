-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-01-2024 a las 19:59:07
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_expertos`
--



--
-- Estructura de tabla para la tabla `img_tours`
--

CREATE TABLE `img_tours` (
  `id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `id_tours` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `img_tours`
--

INSERT INTO `img_tours` (`id`, `img`, `id_tours`) VALUES
(1, 'Playa/pl04-1\n', 1),
(2, 'Playa/pl01-1', 2),
(3, 'Playa/pl02-1', 3),
(4, 'Playa/pl03-1', 4),
(5, 'Playa/pl05-1', 5),
(6, 'Playa/pl06-1', 6),
(7, 'Montana/mo01-1', 7),
(8, 'Ciudad/cd01-1', 8),
(9, 'Ciudad/cd01-2', 8),
(10, 'Ciudad/cd01-3', 8),
(11, 'Ciudad/cd02-1', 11),
(12, 'Ciudad/cd04-1', 10),
(13, 'Ciudad/cd03-1', 12),
(14, 'Ciudad/cd05-1', 13),
(15, 'Montana/mo02-1', 14),
(16, 'Montana/mo03-1', 15),
(17, 'Montana/mo04-1', 17),
(18, 'Montana/mo05-1', 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preferencias`
--

CREATE TABLE `preferencias` (
  `id` int(11) NOT NULL,
  `id_tipo` int(11) NOT NULL,
  `id_subtipo` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recomendaciones`
--

CREATE TABLE `recomendaciones` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_tipo` int(11) NOT NULL,
  `contador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subtipo`
--

CREATE TABLE `subtipo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `subtipo`
--

INSERT INTO `subtipo` (`id`, `nombre`) VALUES
(0, 'Ninguna'),
(1, 'Caminata'),
(2, 'A caballo'),
(3, 'Conocimiento Cultural'),
(4, 'Senderismo'),
(5, 'Snorkel');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE `tipo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`id`, `nombre`) VALUES
(0, 'Ninguna\r\n'),
(1, 'Montana'),
(2, 'Ciudad'),
(3, 'Playa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tours`
--

CREATE TABLE `tours` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` varchar(900) NOT NULL,
  `valoracion` varchar(11) NOT NULL,
  `ubicacion` varchar(255) NOT NULL,
  `id_tipo` int(11) NOT NULL,
  `id_subtipo` int(11) NOT NULL,
  `img_def` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tours`
--

INSERT INTO `tours` (`id`, `nombre`, `descripcion`, `valoracion`, `ubicacion`, `id_tipo`, `id_subtipo`, `img_def`) VALUES
(1, 'Playa Hermosa', ' A pesar de compartir el nombre con otras playas en el país, esta Playa Hermosa se distingue por su impresionante belleza natural y su ambiente tranquilo.\n\nLa playa cuenta con una extensa franja de arena dorada y aguas cálidas y cristalinas, lo que la convierte en un lugar perfecto para relajarse, tomar el sol y disfrutar del océano. La playa es ideal para nadar, hacer snorkel, practicar deportes acuáticos como el kayak y el paddleboarding, y también para simplemente pasear por la orilla.', '4.8', 'Provincia de Guanacaste', 3, 5, 'Playa/pl04-1'),
(2, 'Playa Negra ', 'Lo que hace única a Playa Negra es su arena de color oscuro, compuesta de pequeñas partículas de lava volcánica. Esta singularidad le da su nombre y crea un contraste visual impresionante con el azul intenso del océano.', '4.7', 'Provincia de Limón', 3, 2, 'Playa/pl01-1'),
(3, 'Playa Ballena', 'Lo que distingue a Playa Ballena es su forma única de media luna, que se asemeja a la cola de una ballena, de ahí su nombre.\n\nEsta playa es famosa por su belleza natural y su entorno tranquilo y virgen. Durante la marea baja, es posible caminar hasta la formación rocosa conocida como la \"Cola de Ballena\", que emerge del océano y se asemeja a la cola de una ballena. Además de disfrutar del sol y el mar, los visitantes pueden practicar snorkel y buceo para explorar los arrecifes de coral y la diversidad marina de la zona.', '5', 'Provincia de Puntarenas', 3, 1, 'Playa/pl02-1'),
(4, 'Playa Conchal', 'Lo que hace única a Playa Conchal es su distintiva arena compuesta principalmente de conchas de concha de mar, de ahí su nombre. Esta playa es conocida por su belleza escénica, aguas turquesas y arena blanca y suave, que la convierten en un destino popular para los amantes del sol y el mar.', '4.9', 'Provincia de Guanacaste', 3, 1, 'Playa/pl03-1'),
(5, 'Playa Manzanillo', 'Esta playa se destaca por su belleza natural, aguas cristalinas y su entorno tropical exuberante. Rodeada de densa vegetación y bosques tropicales, ofrece un ambiente sereno y pintoresco que atrae a viajeros en busca de tranquilidad y conexión con la naturaleza.', '5', 'Provincia de Limón', 3, 2, 'Playa/pl05-1'),
(6, 'Playa Bonita', 'Es una hermosa playa, conocida por sus aguas cristalinas y su ambiente tranquilo, Playa Bonita ofrece a los visitantes la oportunidad de disfrutar de la belleza natural de la región en un entorno relajado y pintoresco.', '4.2', 'Provincia de Limón', 3, 1, 'Playa/pl06-1'),
(7, 'Monteverde', 'Monteverde es una reserva biológica y una de las áreas protegidas más famosas de Costa Rica. Ubicada en las tierras altas del país, en la Cordillera de Tilarán, Monteverde es conocida por su exuberante biodiversidad y sus bosques nubosos únicos. La reserva alberga una gran cantidad de especies de flora y fauna, incluyendo miles de tipos de plantas, cientos de aves, mamíferos, anfibios y reptiles.', '4.7', 'Provincia de Puntarenas', 1, 2, 'Montana/mo01-1'),
(8, 'Museo de los niños', 'El Museo de los Niños de Costa Rica es un espacio interactivo diseñado especialmente para el aprendizaje y la diversión de los niños. Este museo ofrece exhibiciones interactivas y actividades educativas que abarcan diversos temas, desde la ciencia y la tecnología hasta la cultura y el arte. Los niños tienen la oportunidad de participar en experiencias prácticas que estimulan su creatividad, curiosidad y habilidades cognitivas. Además de sus exposiciones permanentes, el Museo de los Niños organiza eventos especiales, talleres y programas educativos que enriquecen la experiencia de sus visitantes. Es un destino popular para familias y escuelas, y se encuentra convenientemente ubicado en el corazón de San José, siendo fácilmente accesible para residentes y turistas por igual.', '4.7', 'Provincia de San José', 2, 1, 'Ciudad/cd01-1'),
(10, 'Basílica de Los Ángeles', 'La Basílica de los Ángeles es uno de los sitios religiosos más importantes de Costa Rica y se encuentra en la ciudad de Cartago. Es conocida por albergar la imagen de la Virgen de los Ángeles, la patrona del país. La basílica es un destino de peregrinación muy popular, especialmente durante la romería anual el 2 de agosto, cuando miles de personas caminan desde diferentes partes de Costa Rica para rendir homenaje a la Virgen. El edificio actual es de estilo neorrománico y es un lugar de gran significado espiritual y cultural para los costarricenses.', '4.8', 'Provincia de Cartago', 2, 3, 'Ciudad/cd04-1'),
(11, 'Museo Nacional ', 'El Museo Nacional de Costa Rica es una destacada institución cultural y educativa ubicada en San José, la capital del país. Situado en el antiguo edificio de la fortaleza militar Bellavista, este museo presenta una amplia variedad de exhibiciones que abarcan desde la prehistoria hasta la actualidad, destacando la historia natural y cultural de Costa Rica. Es reconocido por sus colecciones de artefactos precolombinos, objetos históricos, fósiles y muestras de biodiversidad costarricense. ', '4.8', 'Provincia de San José', 2, 3, 'Ciudad/cd02-1'),
(12, 'Teatro Nacional', 'El Teatro Nacional de Costa Rica es un ícono cultural. Es una obra maestra arquitectónica que data del siglo XIX y se destaca por su impresionante diseño neoclásico y detalles ornamentales. El teatro alberga una rica historia cultural y ha sido escenario de numerosas presentaciones artísticas, desde óperas y conciertos hasta obras de teatro y ballet. Su interior está decorado con lujosos detalles, incluyendo pinturas murales y una majestuosa lámpara de araña proveniente de Bélgica. El Teatro Nacional es tanto un punto de referencia histórico como un centro cultural vibrante que ofrece una experiencia única para los visitantes interesados en el arte y la historia de Costa Rica.', '4.8', 'Provincia de San José', 2, 3, 'Ciudad/cd03-1'),
(13, 'Estadio Nacional', 'El Estadio Nacional de Costa Rica es una instalación deportiva de primer nivel y un importante centro de eventos. Inaugurado en 2011, este estadio moderno y multifuncional es el hogar de la selección nacional de fútbol y ha sido sede de numerosos eventos deportivos nacionales e internacionales, incluyendo partidos de fútbol, conciertos, y eventos culturales. Su diseño vanguardista y su capacidad para albergar a más de 35,000 espectadores lo convierten en uno de los estadios más impresionantes de Centroamérica. Además de su función deportiva, el Estadio Nacional es un lugar emblemático que refleja la pasión de Costa Rica por el deporte y la cultura.', '4.7', 'Provincia de San José', 2, 5, 'Ciudad/cd05-1'),
(14, 'Volcán Turrialba', 'El Volcán Turrialba es uno de los volcanes más activos y prominentes de Costa Rica. Con una altitud de aproximadamente 3,340 metros (10,958 pies), el Turrialba es el segundo volcán más alto del país, después del Volcán Irazú.\r\n\r\nA lo largo de los años, el Volcán Turrialba ha experimentado numerosas erupciones, algunas de las cuales han generado nubes de ceniza y emisiones de gases, lo que ha llevado a la evacuación de áreas circundantes y a la interrupción de vuelos en el aeropuerto internacional cercano de San José. Su actividad volcánica lo convierte en un destino de interés para los vulcanólogos y los amantes de la geología.', '4.7', 'Provincia de Cartago', 1, 4, 'Montana/mo02-1'),
(15, 'Volcán Arenal', 'El Volcán Arenal es uno de los destinos naturales más icónicos y visitados de Costa Rica. El Arenal es un estratovolcán activo que se eleva majestuosamente sobre la exuberante selva tropical.\r\n\r\nEl volcán era famoso por su cono casi perfecto y su actividad volcánica constante, que incluía flujos de lava y espectaculares erupciones. Sin embargo, su actividad explosiva cesó en 2010, y desde entonces el volcán ha entrado en un estado de \"reposo\". Aun así, su belleza escénica y su entorno natural siguen atrayendo a visitantes de todo el mundo.', '4.7', 'Provincia de Alajuela', 1, 1, 'Montana/mo03-1'),
(16, 'Tapantí', 'Este parque protege una extensa área de bosque lluvioso y bosque nuboso en las laderas de la Cordillera de Talamanca.\r\n\r\nEl parque es famoso por su biodiversidad excepcional, que incluye una gran variedad de especies de flora y fauna endémicas y en peligro de extinción. Tapantí es un paraíso para los amantes de la naturaleza y los observadores de aves, ya que alberga una gran diversidad de aves tropicales, incluyendo quetzales, tucanes, colibríes y tangaras, entre otras especies.', '4.6', 'Provincia de Cartago', 1, 4, 'Montana/mo05-1'),
(17, 'Parque Nacional Chirripó', 'El Parque Nacional Chirripó, ubicado en la provincia de San José y Limón en Costa Rica, es el hogar del famoso Cerro Chirripó, el pico más alto del país y de toda América Central, con una altitud de 3,820 metros sobre el nivel del mar. La región es reconocida por su asombrosa biodiversidad y su impresionante belleza natural.\r\n\r\nChirripó ofrece algunas de las experiencias de senderismo más sobresalientes de Costa Rica. El ascenso al Cerro Chirripó es una caminata desafiante y gratificante que lleva a los visitantes a través de diversos ecosistemas, desde bosques tropicales hasta páramos de alta montaña. Durante el ascenso, los excursionistas pueden disfrutar de vistas panorámicas espectaculares y observar una variedad de flora y fauna única en el camino.', '4.7', 'Provincias de San José y Limón', 1, 4, 'Montana/mo04-1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `contrasenia` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `img_tours`
--
ALTER TABLE `img_tours`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `preferencias`
--
ALTER TABLE `preferencias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `recomendaciones`
--
ALTER TABLE `recomendaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `subtipo`
--
ALTER TABLE `subtipo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tours`
--
ALTER TABLE `tours`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `img_tours`
--
ALTER TABLE `img_tours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `preferencias`
--
ALTER TABLE `preferencias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `recomendaciones`
--
ALTER TABLE `recomendaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `subtipo`
--
ALTER TABLE `subtipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de la tabla `tipo`
--
ALTER TABLE `tipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tours`
--
ALTER TABLE `tours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

DELIMITER $$
--
-- Procedimientos
--
CREATE PROCEDURE `sp_actualizar_contadores_recomendaciones` (IN `_id_usuario` INT, IN `_montana` INT, IN `_ciudad` INT, IN `_playa` INT)   BEGIN
UPDATE recomendaciones
SET contador = _montana
WHERE id_usuario = _id_usuario AND id_tipo = 1;

UPDATE recomendaciones
SET  contador = _ciudad
WHERE id_usuario = _id_usuario AND id_tipo = 2;

UPDATE recomendaciones
SET  contador = _playa
WHERE id_usuario = _id_usuario AND id_tipo = 3;


END$$

CREATE PROCEDURE `sp_actualizar_preferencia` (IN `_nombreusuario` VARCHAR(255), IN `_id_tipo` INT, IN `_id_subtipo` INT)   UPDATE preferencias P
SET P.id_tipo = _id_tipo,
P.id_subtipo = _id_subtipo
WHERE P.id_usuario =
(SELECT id FROM usuario U WHERE U.usuario like _nombreusuario)$$

CREATE PROCEDURE `sp_buscar_usuario` (IN `_nombreusuario` VARCHAR(200), IN `_contrasenia` VARCHAR(200))   SELECT * FROM usuario WHERE _nombreusuario LIKE usuario AND _contrasenia LIKE contrasenia$$

CREATE PROCEDURE `sp_obtener_contadores_recomendaciones` (IN `_nombreusuario` VARCHAR(255))   SELECT * FROM recomendaciones 
WHERE id_usuario = (SELECT id FROM usuario WHERE usuario like _nombreusuario)$$

CREATE PROCEDURE `sp_obtener_id_usuario` (IN `_nombreusuario` VARCHAR(255))   SELECT id FROM usuario WHERE usuario like _nombreusuario$$

CREATE PROCEDURE `sp_obtener_img` (IN `_id_tour` INT)   SELECT img FROM img_tours WHERE id_tours = _id_tour
LIMIT 1$$

CREATE PROCEDURE `sp_obtener_imgs_tours` (IN `_tour` INT)   SELECT img FROM img_tours WHERE id_tours = _tour$$

CREATE PROCEDURE `sp_obtener_preferencia` (IN `_nombreusuario` VARCHAR(200))   SELECT id_tipo,id_subtipo FROM preferencias 
WHERE id_usuario = (SELECT id FROM usuario WHERE usuario like _nombreusuario)$$

CREATE PROCEDURE `sp_obtener_preferencias_subtipo` (IN `_id_subtipo` INT)   SELECT * FROM tours T
WHERE T.id_subtipo = _id_subtipo 
LIMIT 4$$

CREATE PROCEDURE `sp_obtener_subtipos` ()   SELECT * FROM subtipo$$

CREATE PROCEDURE `sp_obtener_tipos` ()   SELECT * FROM tipo$$

CREATE PROCEDURE `sp_obtener_tour` (IN `_id_tour` INT)   SELECT * FROM tours WHERE id = _id_tour$$

CREATE PROCEDURE `sp_obtener_tours` (IN `tipo_ingresado` VARCHAR(50))   SELECT * FROM tours 
WHERE id_tipo LIKE 
(SELECT id FROM tipo WHERE nombre like CONCAT(tipo_ingresado,'%'))$$

CREATE PROCEDURE `sp_obtener_tours_preferencias` (IN `id_tipo` INT, IN `id_subtipo` INT)   SELECT * FROM tours T
WHERE T.id_tipo = id_tipo AND T.id_subtipo = id_subtipo
LIMIT 4$$

CREATE PROCEDURE `sp_obtener_tours_preferencias_tipo` (IN `_id_tipo` INT)   SELECT * FROM tours T
WHERE T.id_tipo = _id_tipo 
LIMIT 4$$

CREATE PROCEDURE `sp_obtener_tours_recomendados` (IN `_nombreusuario` VARCHAR(255))   SELECT id_tipo
FROM recomendaciones
WHERE id_usuario like (SELECT id FROM usuario Where usuario like _nombreusuario)
ORDER BY contador DESC 
LIMIT 1$$

CREATE PROCEDURE `sp_registrar_usuario` (IN `_nombre` VARCHAR(255), IN `_apellidos` VARCHAR(255), IN `_correo` VARCHAR(255), IN `_usuario` VARCHAR(255), IN `_contrasenia` VARCHAR(255))   BEGIN
    INSERT INTO usuario (nombre, apellidos, correo, usuario, contrasenia)
    VALUES (_nombre, _apellidos, _correo, _usuario, _contrasenia);

    SET @id_usuario = LAST_INSERT_ID();

    INSERT INTO preferencias (id_tipo, id_subtipo, id_usuario)
    VALUES (0, 0, @id_usuario);
    
    INSERT INTO recomendaciones(id_usuario,id_tipo,contador)
    VALUES (@id_usuario,1,0);
    
     INSERT INTO recomendaciones(id_usuario,id_tipo,contador)
    VALUES (@id_usuario,2,0);
    
     INSERT INTO recomendaciones(id_usuario,id_tipo,contador)
    VALUES (@id_usuario,3,0);
    
END$$

DELIMITER ;

-- --------------------------------------------------------