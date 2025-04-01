-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-04-2024 a las 22:09:30
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pagina`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `cat_nom` varchar(100) NOT NULL,
  `cat_des` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `cat_nom`, `cat_des`) VALUES
(1, 'Sofás y Sillones', 'Invita a la comodidad y el descanso en tu hogar con nuestra selección de sofás y sillones. Desde elegantes sofás modulares hasta acogedores sillones reclinables, nuestra colección ofrece una amplia variedad de estilos, tamaños y colores para adaptars'),
(2, 'Mesas y Sillas de Comedor', 'Transforma tu área de comedor en un lugar de reunión excepcional con nuestras mesas y sillas de comedor. Desde mesas elegantes de madera maciza hasta conjuntos de sillas contemporáneas, nuestra gama de productos combina funcionalidad y estilo para cr'),
(3, 'Dormitorios', 'Crea un refugio de tranquilidad y estilo con nuestros conjuntos de dormitorio. Desde elegantes camas tapizadas hasta prácticos armarios modulares, nuestra colección de muebles para dormitorio ofrece soluciones para optimizar el espacio y mejorar la c'),
(5, 'Muebles de Exterior', 'Disfruta del aire libre con estilo y comodidad gracias a nuestra colección de muebles de exterior. Desde conjuntos de comedor de mimbre hasta cómodos sofás lounge, nuestros muebles están diseñados para resistir los elementos y realzar la experiencia '),
(15, 'categoria añadida', 'descripcion de categoria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL,
  `nom_pro` varchar(200) NOT NULL,
  `costo` float NOT NULL,
  `stock` int(11) NOT NULL,
  `categoria` int(11) NOT NULL,
  `descripcion` varchar(900) NOT NULL,
  `imagen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `nom_pro`, `costo`, `stock`, `categoria`, `descripcion`, `imagen`) VALUES
(10, 'Nordic Chair', 50, 44, 5, 'La silla \"Nordic Chair\" es un ejemplo perfecto de estilo escandinavo combinado con funcionalidad moderna. Su diseño minimalista y elegante se integra sin esfuerzo en una variedad de entornos, desde espacios contemporáneos hasta ambientes más tradicionales.\r\n\r\nFabricada con materiales de alta calidad, esta silla ofrece una estructura sólida y duradera que garantiza comodidad y soporte durante horas. Su respaldo ergonómico y su asiento acolchado proporcionan una experiencia de estar sumamente confortable.\r\n\r\nLa \"Nordic Chair\" es versátil y práctica, ideal tanto para comedores formales como para espacios de trabajo. Su acabado en madera natural y su diseño atemporal la convierten en una pieza icónica que añade calidez y estilo a cualquier ambiente.', '../imgpro/product-3.png'),
(11, 'Pillow Chair', 50, 12, 1, 'La \"Pillow Chair\" es una pieza de mobiliario diseñada para combinar estilo y confort en cualquier ambiente. Su diseño innovador y contemporáneo la convierte en un elemento destacado en cualquier espacio, ya sea en el hogar o en entornos comerciales.  Esta silla se caracteriza por su asiento amplio y acolchado, que proporciona una sensación de confort y relax incomparables. El respaldo alto y ergonómico garantiza un excelente soporte para la espalda, permitiendo largas horas de comodidad y relajación.  Fabricada con materiales de alta calidad, la \"Pillow Chair\" ofrece durabilidad y resistencia, manteniendo su elegancia y funcionalidad con el paso del tiempo. Su diseño versátil se adapta a una variedad de estilos decorativos, desde moderno y minimalista hasta más clásico y tradicional.', '../imgpro/product-1.png'),
(12, 'Kruzo Aero Chair', 78.5, 11, 5, 'La \"Kruzo Aero Chair\" es una pieza de mobiliario que combina un diseño aerodinámico con una comodidad excepcional. Inspirada en la elegancia y la innovación, esta silla se distingue por su estética moderna y sus características ergonómicas avanzadas.  Con líneas suaves y curvas elegantes, la \"Kruzo Aero Chair\" aporta un toque de sofisticación a cualquier ambiente. Su estructura ligera y resistente está diseñada para proporcionar un soporte óptimo y una sensación de ingravidez al sentarse.  El asiento y el respaldo ergonómicos están cuidadosamente diseñados para adaptarse a la forma natural del cuerpo, ofreciendo un confort excepcional incluso durante largas horas de uso. Los materiales de alta calidad garantizan durabilidad y resistencia, mientras que los acabados refinados añaden un toque de lujo a esta silla moderna.', '../imgpro/product-2.png'),
(13, 'Stella Fabric Office', 45.56, 12, 5, 'La silla de oficina de tela Stella combina estilo y funcionalidad para crear una experiencia ergonómica excepcional en cualquier entorno de trabajo. Diseñada para proporcionar comodidad durante largas horas de trabajo, esta silla ofrece un equilibrio perfecto entre apoyo lumbar, movilidad y estilo contemporáneo.  Con un diseño elegante y minimalista, la Stella Fabric Office Chair presenta una estructura robusta pero ligera, ideal para espacios de trabajo modernos. Su tapizado de tela de alta calidad no solo es suave al tacto, sino que también es resistente y fácil de limpiar, lo que la convierte en una opción práctica y duradera.  La ergonomía es una prioridad en el diseño de la Stella Fabric Office Chair. El respaldo contorneado y el asiento acolchado proporcionan un excelente soporte para la espalda, promoviendo una postura saludable y reduciendo la fatiga muscular. Además, cuenta con ', '../imgpro/s1.png'),
(14, 'Chantal Swivel', 120, 11, 1, 'La silla giratoria Chantal es una combinación perfecta de estilo contemporáneo y comodidad excepcional. Diseñada para adaptarse a una variedad de espacios, desde oficinas hasta áreas de estudio en el hogar, esta silla ofrece un equilibrio óptimo entre elegancia y funcionalidad.  Con un diseño aerodinámico y líneas limpias, la Chantal Swivel Chair agrega un toque de sofisticación a cualquier ambiente. Su asiento acolchado y respaldo ergonómico brindan un apoyo óptimo para la espalda, permitiéndote trabajar o estudiar durante largas horas con total comodidad.  La silla giratoria Chantal está equipada con una base resistente y ruedas suaves que permiten un desplazamiento fluido y silencioso en cualquier dirección. Además, su mecanismo giratorio de 360 grados ofrece una libertad de movimiento sin restricciones, lo que la convierte en una opción ideal para multitareas y colaboración en espaci', '../imgpro/s2.png'),
(15, 'Bowtie Cream Boucle', 56, 13, 3, 'La silla Bowtie Cream Boucle es una pieza de mobiliario que combina estilo y confort para crear un ambiente acogedor y elegante en cualquier espacio. Su diseño único y su tapicería de bouclé en tono crema le confieren un aspecto sofisticado y atemporal que complementará perfectamente una variedad de estilos decorativos, desde lo clásico hasta lo contemporáneo.  Con su forma ergonómica y su asiento acolchado, esta silla ofrece una experiencia de sentado cómoda y relajante. El respaldo alto proporciona un excelente soporte para la espalda, mientras que los reposabrazos curvados añaden un toque de elegancia y comodidad adicional.  La silla Bowtie Cream Boucle está montada sobre patas de madera maciza que ofrecen estabilidad y durabilidad. Su diseño compacto la hace perfecta para espacios más reducidos, como salas de estar, dormitorios o áreas de lectura.', '../imgpro/s3.png'),
(16, 'Plato Desk', 48.9, 17, 3, 'El Escritorio Plato es una pieza de mobiliario versátil y funcional diseñada para ofrecer un espacio de trabajo elegante y organizado. Con un diseño minimalista y contemporáneo, este escritorio es perfecto para crear un ambiente de estudio o trabajo eficiente y moderno.  Fabricado con materiales de alta calidad, el Escritorio Plato presenta una superficie amplia y resistente que proporciona espacio más que suficiente para colocar un ordenador portátil, libros, documentos y otros elementos esenciales de trabajo. Su estructura sólida y duradera garantiza una base estable para realizar tareas diarias con comodidad y confianza.  Además, el Escritorio Plato está equipado con prácticos compartimentos de almacenamiento, incluyendo un cajón deslizante y estantes abiertos, que permiten mantener el espacio ordenado y libre de desorden. Estos compartimentos ofrecen un lugar conveniente para guardar', '../imgpro/s4.png'),
(17, 'Herman Miller Eames', 88.5, 21, 3, 'La silla Herman Miller Eames es un ícono del diseño moderno que combina estilo, comodidad y funcionalidad. Diseñada por Charles y Ray Eames, esta silla es reconocida mundialmente por su elegancia atemporal y su innovadora tecnología ergonómica.  Fabricada con materiales de la más alta calidad, la silla Herman Miller Eames presenta una estructura de polipropileno moldeado que se adapta perfectamente al cuerpo, proporcionando un soporte ergonómico excepcional. Su diseño contorneado y sus reposabrazos integrados ofrecen una postura cómoda durante largos períodos de tiempo, lo que la convierte en la opción ideal para espacios de trabajo y salas de reuniones.  La silla Eames se caracteriza por su estilo distintivo y su versatilidad. Disponible en una amplia gama de colores y acabados, esta silla se adapta a una variedad de entornos y estilos decorativos, desde oficinas modernas hasta espacios', '../imgpro/s5.png'),
(18, 'Edna Desk Chair', 40, 21, 1, 'La Silla de Escritorio Edna es la combinación perfecta de estilo y comodidad para tu espacio de trabajo. Con un diseño elegante y contemporáneo, esta silla ofrece un soporte ergonómico para largas horas de trabajo o estudio. Su asiento acolchado y respaldo alto brindan un confort óptimo, mientras que su base giratoria y ruedas permiten una movilidad suave y fácil. Fabricada con materiales de alta calidad, la Silla de Escritorio Edna no solo es funcional, sino también un elemento destacado en cualquier ambiente de oficina o estudio.', '../imgpro/s6.png'),
(19, 'Ergonomic Chair ', 43, 23, 1, 'La Silla Ergonómica es una opción ideal para aquellos que buscan comodidad y apoyo durante largas horas de trabajo o estudio. Su diseño ergonómico está cuidadosamente diseñado para promover una postura saludable y reducir la fatiga, brindando un soporte óptimo para la espalda, cuello y brazos. Equipada con ajustes personalizables, como altura del asiento y reposabrazos ajustables, esta silla se adapta a las necesidades individuales de cada usuario. Además, su construcción duradera y materiales de alta calidad garantizan una larga vida útil. Ya sea en una oficina en casa o en un entorno de trabajo profesional, la Silla Ergonómica ofrece confort y funcionalidad sin comprometer el estilo.', '../imgpro/s7.png'),
(20, 'Slowcoach Love seat', 63, 12, 1, 'El Sofá Love Seat Slowcoach es la definición de lujo y comodidad. Con su diseño contemporáneo y elegante, este sofá es perfecto para crear un ambiente acogedor en cualquier sala de estar o espacio de entretenimiento. Fabricado con materiales de alta calidad y tapizado en una suave tela, el Slowcoach ofrece una experiencia de asiento indulgente y relajante.  Con capacidad para dos personas, este love seat es ideal para parejas o para aquellos que buscan un lugar cómodo para relajarse. Sus amplios cojines y respaldo proporcionan un apoyo excepcional, mientras que sus brazos ligeramente curvados añaden un toque de estilo y sofisticación.  Ya sea para disfrutar de una tarde de lectura, una noche de películas o simplemente para relajarse después de un largo día, el Sofá Love Seat Slowcoach es la elección perfecta para aquellos que valoran la calidad, el confort y el estilo en su hogar.', '../imgpro/s8.png'),
(21, 'Ben Elm Textured', 42.7, 21, 5, 'El Sillón Ben Elm Textured es una pieza de mobiliario elegante y versátil que aportará estilo y confort a cualquier espacio de tu hogar. Con su diseño moderno y acabado texturizado, este sillón combina funcionalidad con estética para crear un ambiente acogedor y contemporáneo.  Fabricado con una estructura de madera de alta calidad, el Sillón Ben Elm Textured ofrece una base sólida y resistente, mientras que su tapizado suave y texturizado proporciona una sensación táctil única y un aspecto visualmente atractivo. Los detalles cuidadosamente diseñados, como los brazos curvados y las patas de madera en forma de cono, añaden un toque de elegancia y sofisticación al diseño.  Ya sea utilizado como un asiento individual en la sala de estar, un rincón de lectura en el dormitorio o un elemento decorativo en el recibidor, el Sillón Ben Elm Textured es una opción ideal para aquellos que buscan com', '../imgpro/s10.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `telefono` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `nombre`, `telefono`) VALUES
(1, 'luisapj41@gmail.com', '$2y$10$ZhoQZdrrB64Sm0KUV2Ml/eOeecsnSCdmdUI7/yt24iMI8G.bLj5NG', 'luisa', 0),
(2, 'luisapj41@gmail.com', '$2y$10$XYhosZYi1Wld/iL0JiZm7eIU62lFmFMdrnu4e7Ia.to/WzTGO.ysa', 'luisa', 0),
(3, 'pepe@gmail.com', '$2y$10$fJweoC0UhHHWEmDqln87J.17HhsFZBieQ9b3n0mGjsfPsLLafzo.O', 'pepe', 0),
(4, 'pedro@gmail.com', '$2y$10$9f8E/O0tqgP0djhps3QxLOywCeKwi.EDEUxitusRpRRPyu/Avlwg.', 'pedro', 123456789);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `categoria` (`categoria`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`categoria`) REFERENCES `categoria` (`id_categoria`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
