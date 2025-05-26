-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-05-2025 a las 08:47:04
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `cat_nom`, `cat_des`) VALUES
(18, 'Macetas', 'Masetas decoradas al gusto del cliente'),
(19, 'Fertilizantes', 'Productos para la que la planta crezca de mejor forma'),
(20, 'Herramientas', 'Herramientas  para el sembrado y cuidado de la planta'),
(21, 'Plantas', 'Plantas de todo tipo para el cliente'),
(22, 'Accesorios', 'Accesorios para adornar las plantas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `password` varchar(200) NOT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `fecha_registro` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `id` int(11) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `mensaje` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`id`, `nombres`, `apellidos`, `correo`, `mensaje`) VALUES
(10, 'Pedro Alessandro', 'Rodenas Aponte', 'rodenaspedro094@gmail.com', 'Buena tienda'),
(11, 'Jorge Antonio', 'Luque Chambi', 'jlsiatmedia@senati.pe', 'Buena tienda'),
(12, 'daniel', 'yww', 'dc2832838@gmail.com', 'dasdas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pedido`
--

CREATE TABLE `detalle_pedido` (
  `id_detalle` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_unitario` float NOT NULL,
  `nombre_producto` varchar(200) DEFAULT NULL,
  `subtotal` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `id_pedido` int(11) NOT NULL,
  `fecha` datetime DEFAULT current_timestamp(),
  `total` float NOT NULL,
  `estado` varchar(30) DEFAULT 'pendiente',
  `nombre` varchar(80) DEFAULT NULL,
  `correo` varchar(80) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `direccion` varchar(150) DEFAULT NULL,
  `metodo_pago` varchar(30) DEFAULT NULL,
  `igv` float DEFAULT NULL,
  `subtotal` float DEFAULT NULL,
  `id_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `nom_pro`, `costo`, `stock`, `categoria`, `descripcion`, `imagen`) VALUES
(22, 'La paz', 54, 999, 21, 'Es una planta que te transmite paz', '../imgpro/planta1.jpg'),
(23, 'La cuidadosa ', 54, 999, 21, 'Una planta que requiere de mucho cuidado es aquella que demanda atención constante para mantenerse saludable y en buen estado. Estas plantas suelen ser sensibles a los cambios de temperatura, luz y humedad, por lo que es fundamental conocer bien sus necesidades específicas. Requieren riegos medidos, abonos adecuados y una ubicación precisa que favorezca su desarrollo. Además, es necesario estar atentos a posibles plagas o enfermedades, ya que cualquier descuido puede afectar su crecimiento o incluso hacer que muera. Aunque su mantenimiento puede ser exigente, también ofrece una gran satisfacción, ya que verlas florecer y prosperar es una recompensa que vale la pena para quienes disfrutan del arte de cuidar plantas.', '../imgpro/planta2.jpg'),
(24, 'La Tranquila', 54, 999, 21, 'Es una planta que, aunque necesita cuidados, posee un fuerte instinto de supervivencia. Si no recibe la atención adecuada, no se rinde fácilmente: adapta su ritmo de crecimiento, conserva sus recursos y busca formas de sobrevivir. Sus raíces se extienden en busca de agua, sus hojas se ajustan para resistir el sol o la sombra, y su estructura cambia para afrontar las condiciones difíciles. A pesar del descuido, esta planta lucha por mantenerse viva, demostrando que, incluso en la adversidad, sigue buscando sobrevivir.', '../imgpro/planta3.jpg'),
(25, 'Solina', 54, 999, 21, 'Solina es una planta con alma luminosa. Desde que amanece, estira sus hojas como si saludara al sol, buscando con ansias cada rayo de luz que le dé vida. Tiene un comportamiento casi hipnótico: gira lentamente durante el día, siguiendo el recorrido del sol en el cielo. Es como si estuviera bailando en silencio con la luz. Esta planta no solo necesita el sol, lo anhela. Sin él, pierde su brillo, pero cuando lo tiene, florece con fuerza y energía. Es ideal para balcones soleados, ventanas con luz directa o espacios donde el sol la acaricie sin interrupción. Solina no teme al calor; lo abraza con amor.', '../imgpro/planta4.jpg'),
(26, 'Espinela', 54, 0, 21, 'Espinela es la guerrera del desierto. Fuerte, serena y casi indestructible, guarda su esencia en lo más profundo de su cuerpo espinoso. No necesita mucho para vivir: unas gotas de agua, un poco de sol, y ahí sigue, firme y orgullosa. Es una planta que enseña que la belleza también se encuentra en la resistencia. Su forma compacta y sus espinas son su escudo, pero detrás de esa dureza hay una historia de supervivencia. Ideal para cactus y suculentas, Espinela es perfecta para quienes valoran la fuerza en la simplicidad.', '../imgpro/planta5.jpg'),
(27, 'Verdeluz', 54, 999, 21, 'Verdeluz es la encarnación de la frescura. Sus hojas, amplias y llenas de vida, se iluminan con el más mínimo rayo de sol, como si brillaran desde adentro. Esta planta responde al cuidado con gratitud: si la riegas, se pone más verde; si le hablas, parece escucharte. Su color intenso y su crecimiento constante la convierten en una compañera vibrante, ideal para espacios que necesitan un toque de energía natural. Verdeluz no solo vive, transmite vida.', '../imgpro/planta6.jpg'),
(28, 'Tierra Madre', 25, 999, 18, 'Esta maceta tiene un alma protectora. Con sus formas suaves y su material firme, envuelve a la planta como una madre que la cuida con amor. Ideal para plantas que necesitan espacio para expandir sus raíces y crecer con calma. Tierra Madre es símbolo de origen, conexión y vida.', '../imgpro/maceta1.webp'),
(29, 'Raíz de Barro', 25, 999, 18, 'Hecha con barro cocido o de estilo rústico, esta maceta tiene un aire ancestral. Es perfecta para quienes buscan un toque natural, como si la hubieran encontrado en medio del campo. Conserva la humedad con sabiduría y respira con la tierra, ayudando a la planta a mantenerse equilibrada.', '../imgpro/maceta2.webp'),
(30, 'Estrella del Sol', 25, 999, 18, 'Con un color claro o un diseño brillante, esta maceta refleja la luz y da un toque de alegría al entorno. Ideal para plantas que aman el sol, ya que su forma ayuda a mantenerlas frescas por dentro y vistosas por fuera. Estrella del Sol es como un faro para las hojas verdes.', '../imgpro/maceta3.webp'),
(31, 'La Vanidosa', 25, 0, 18, 'Diseñada con detalles decorativos, formas únicas o colores llamativos, esta maceta le roba protagonismo incluso a la planta. Pero no es por ego, es porque le encanta lucir bien. Perfecta para interiores modernos o rincones donde se quiere llamar la atención. La Vanidosa brilla donde la pongas.', '../imgpro/maceta4.webp'),
(32, 'Nocturna', 25, 999, 18, 'Con tonos oscuros o acabados mate, esta maceta parece capturar el silencio de la noche. Su presencia es elegante, sobria y misteriosa. Ideal para plantas de follaje denso o flores blancas que contrasten con su base. Nocturna es discreta, pero con mucha personalidad.', '../imgpro/maceta5.webp'),
(33, 'La Geométrica', 25, 999, 18, 'Minimalista y con formas definidas —cuadrada, hexagonal, cilíndrica— esta maceta va directo al punto. Es perfecta para ambientes modernos o plantas de crecimiento vertical. La Geométrica aporta orden, estructura y una estética limpia al espacio.', '../imgpro/maceta6.webp'),
(34, 'Raíz Fértil', 25, 0, 19, 'Actúa desde lo más profundo. Estimula el desarrollo de raíces fuertes y sanas, creando una base sólida para cualquier planta. Ideal para trasplantes o comienzos. Raíz Fértil es el primer paso para un crecimiento berrako.', '../imgpro/fer1.webp'),
(35, ' Verde Vivo', 25, 999, 19, 'Devuelve el color, la fuerza y el brillo a las hojas. Este fertilizante está lleno de nutrientes esenciales que reviven el verdor natural de la planta. Para esos momentos en que la planta se ve apagada, Verde Vivo le devuelve la chispa.', '../imgpro/fer2.webp'),
(36, 'Brote Express', 25, 999, 19, 'Cuando una planta necesita un impulso rápido, Brote Express entra en acción. Estimula el crecimiento de tallos y nuevas hojas en poco tiempo. Es como un café cargado para tus plantas: energizante, potente y efectivo.', '../imgpro/fer3.webp'),
(37, 'Gota Dorada', 25, 999, 19, 'Concentrado y preciso. Solo unas gotas bastan para nutrir profundamente. Este fertilizante líquido de acción lenta es ideal para quienes prefieren calidad antes que cantidad. Gota Dorada nutre con elegancia.', '../imgpro/fer4.webp'),
(38, 'Flor Mayor', 25, 999, 19, 'Especialmente formulado para plantas con flores. Estimula la floración prolongada, mejora el tamaño de los pétalos y realza los colores. Flor Mayor es como un festival de primavera embotellado.', '../imgpro/fer5.webp'),
(39, 'Nitro Raudal', 25, 999, 19, 'Ideal para plantas de crecimiento acelerado o cultivos exigentes. Tiene un alto contenido de nitrógeno que favorece el desarrollo rápido sin dañar la estructura de la planta. Nitro Raudal es pura potencia natural.', '../imgpro/fer6.webp'),
(40, 'Firmeza Bruta', 15, 999, 20, 'Con mango resistente y hoja de acero, esta pala no se rinde ante nada. Está hecha para los trabajos más pesados: tierra dura, raíces rebeldes y jornadas largas. Firmeza Bruta es fuerza en estado puro. Si el terreno se pone duro, ella se pone más dura.', '../imgpro/pala.webp'),
(41, 'Dedo de Tierra', 15, 999, 20, 'Más que una herramienta, es una extensión de tus manos. Dedo de Tierra se desliza entre hojas secas, piedras pequeñas y surcos de tierra con una precisión casi instintiva. Su diseño, liviano pero firme, está pensado para equilibrar fuerza y suavidad en cada movimiento. No solo remueve lo que estorba: acomoda, organiza y limpia como si estuviera peinando la superficie del mundo vegetal.  Su mango ergonómico permite jornadas largas sin cansancio, y sus púas —curvadas con intención— penetran la tierra sin dañarla, aireándola con respeto. Ideal para preparar el terreno antes de sembrar, retirar lo innecesario o simplemente devolverle armonía al jardín. Dedo de Tierra no solo rastrilla: conversa con el suelo. Es la herramienta para quienes entienden que la jardinería no se trata solo de plantar, sino de acompañar.', '../imgpro/rastrillo.webp'),
(42, 'Quebramonte', 18, 999, 20, 'Forjado para abrir caminos donde nadie más puede. Quebramonte no es solo un pico: es la fuerza concentrada de quienes trabajan con la tierra sin miedo. Su cabeza de acero templado corta rocas, parte raíces duras y penetra suelos compactos como si supiera lo que hace desde hace siglos.  Su mango, balanceado al milímetro, absorbe la vibración de cada golpe, cuidando tus manos y haciéndote sentir que el poder está en ti. No se oxida con facilidad, no se tuerce, no se quiebra. Es una herramienta diseñada para los retos reales, para terrenos rebeldes, para quienes no quieren excusas sino resultados.  Quebramonte es compañero de jornadas largas, de amaneceres con tierra en las botas y de tardes donde el suelo cede solo ante la voluntad de quien lo trabaja. Si lo cargas contigo, no hay superficie que no puedas conquistar.', '../imgpro/pico.webp'),
(43, 'Rompebarro', 24, 999, 20, 'Con un diseño robusto y una punta afilada como la voluntad de quien lo usa, Rompebarro es el picote que transforma el trabajo duro en una batalla ganada. Hecho para atravesar suelos compactos y barro resbaladizo, su punta afilada y su mango ergonómico permiten que cada golpe se sienta controlado, sin perder potencia.  Ya sea para excavar pequeñas zanjas, remover tierra densa o eliminar obstáculos que se interponen en el camino, Rompebarro nunca duda. Este picote está listo para enfrentarse a la resistencia del terreno más difícil y romper los límites de lo que se cree posible.  Cada golpe de Rompebarro se siente como una promesa cumplida: el suelo cederá, y tu trabajo se hará realidad. Con él en las manos, no hay barro que no puedas romper ni tierra que no puedas dominar.', '../imgpro/picota.webp'),
(44, 'Corte Fino', 6, 999, 20, 'Más que unas tijeras, Corte Fino es la herramienta de precisión que todo jardinero necesita. Con hojas afiladas como cuchillas y un diseño equilibrado, estas tijeras están hechas para trabajar con las plantas más delicadas. Desde recortar ramas finas hasta darle forma a arbustos ornamentales, su filo impecable garantiza cortes limpios y suaves que promueven un crecimiento saludable.  Su mango ergonómico, que se ajusta perfectamente a la mano, hace que cada corte sea intuitivo y cómodo, reduciendo la fatiga en jornadas largas. Corte Fino es ideal para quienes buscan detalles perfectos en sus jardines, ya que no solo corta, sino que transforma cada planta con cuidado y destreza.  Ya sea para podar, dar forma o eliminar hojas secas, estas tijeras trabajan con suavidad pero con la potencia necesaria para cualquier tarea de jardinería. Corte Fino es la herramienta que te da el control para lo', '../imgpro/tujera.webp'),
(45, 'Brisa Verde', 14, 999, 20, 'Ligera, ágil y eficiente, Brisa Verde es la escoba de jardín que hará que cada rincón de tu espacio exterior se vea impecable. Con cerdas flexibles pero resistentes, diseñada para barrer con facilidad hojas secas, ramitas y restos de plantas, sin dañar el suelo ni las delicadas raíces que hay cerca. Esta escoba se desliza como una brisa suave, pero con la efectividad de una tormenta controlada.  Su mango ergonómico te permite barrer por horas sin esfuerzo, mientras que las cerdas distribuidas estratégicamente aseguran que ninguna suciedad se quede atrás. Brisa Verde es perfecta para limpiar grandes superficies, jardines llenos de plantas, o incluso rincones donde las hojas se acumulan con el viento.  Ideal para aquellos que buscan eficiencia sin sacrificar el cuidado de su jardín, Brisa Verde es más que una escoba: es tu compañera fiel en la creación de un ambiente ordenado y cuidado, do', '../imgpro/escioa.webp'),
(46, 'Nombre: Solifeo', 25, 999, 22, 'Cuando la luz natural no es suficiente, Solifeo está aquí para brindar la energía que tus plantas necesitan. Con un diseño moderno y eficiente, esta lámpara de crecimiento imita la luz solar, estimulando la fotosíntesis y favoreciendo el crecimiento de las plantas en cualquier espacio cerrado. Solifeo no solo ilumina, sino que revitaliza, ofreciendo la luz perfecta para tus plantas, incluso en los días más nublados.', '../imgpro/ACCESORIO1.avif'),
(47, ' Raíz Cuidada ', 25, 999, 22, 'Cuando se trata de raíces saludables, Raíz Cuidada es el sustrato definitivo. Hecho con materiales orgánicos que favorecen el desarrollo de raíces fuertes y robustas, proporciona la aireación y la humedad necesarias para el crecimiento óptimo de tus plantas. Raíz Cuidada es perfecto para trasplantes y para plantas que requieren un suelo bien drenado y nutritivo. Con él, las raíces de tus plantas estarán en su hábitat ideal, garantizando un crecimiento saludable y sostenido.', '../imgpro/ACCESORIO3.avif'),
(48, 'Suspensión Celestial', 25, 999, 22, 'Eleva tus plantas a nuevas alturas con Suspensión Celestial. Este elegante soporte para colgar plantas ha sido diseñado para darle a tu jardín interior un toque sofisticado y ligero. Su estructura robusta, pero delicada, mantiene tus plantas suspendidas con gracia, creando una atmósfera etérea en cualquier espacio. Perfecto para jardines de estilo bohemio, espacios minimalistas o terrazas con vistas, Suspensión Celestial no solo cuida de tus plantas, sino que también las pone en el centro de atención.', '../imgpro/ACCESORIO4.avif'),
(49, 'Luminara Verde ', 25, 999, 22, 'Haz brillar tu jardín con Luminara Verde, una lámpara de iluminación especial que no solo embellece, sino que también promueve el crecimiento saludable de tus plantas. Equipado con tecnología LED de bajo consumo, Luminara Verde emite una luz suave y cálida que simula la luz natural, favoreciendo la fotosíntesis y creando un ambiente acogedor para tu hogar. Su diseño moderno y compacto lo hace ideal para interiores, balcones o cualquier rincón donde necesites un toque de luz y vida. Luminara Verde ilumina el camino hacia un jardín más brillante y lleno de vida.', '../imgpro/ACCESORIO2.avif');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `rol` varchar(20) NOT NULL DEFAULT 'empleado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `nombre`, `telefono`, `rol`) VALUES
(14, 'dc644373@gmail.com', '', 'Daniel Calderon', '000000000', 'empleado'),
(15, 'dc644373@gmail.com', '', 'Daniel Calderon', '000000000', 'empleado'),
(16, 'dc644373@gmail.com', '', 'Daniel Calderon', '000000000', 'empleado'),
(17, 'dc644373@gmail.com', '', 'Daniel Calderon', '000000000', 'empleado'),
(18, 'dc644373@gmail.com', '', 'Daniel Calderon', '000000000', 'empleado');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD PRIMARY KEY (`id_detalle`),
  ADD KEY `id_pedido` (`id_pedido`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `pedido_ibfk_cliente` (`id_cliente`);

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
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD CONSTRAINT `detalle_pedido_ibfk_1` FOREIGN KEY (`id_pedido`) REFERENCES `pedido` (`id_pedido`),
  ADD CONSTRAINT `detalle_pedido_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`);

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`categoria`) REFERENCES `categoria` (`id_categoria`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
