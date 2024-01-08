-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-03-2020 a las 20:55:26
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `taller`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo`
--

CREATE TABLE `articulo` (
  `id_articulo` int(11) NOT NULL,
  `titulo_articulo` varchar(200) CHARACTER SET utf8 NOT NULL DEFAULT 'Sin Titulo',
  `descripcion_articulo` varchar(5000) CHARACTER SET utf8 NOT NULL DEFAULT 'Sin Descripción',
  `imagen` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `estado_articulo` int(11) NOT NULL DEFAULT '1',
  `fecha_articulo` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `articulo`
--

INSERT INTO `articulo` (`id_articulo`, `titulo_articulo`, `descripcion_articulo`, `imagen`, `estado_articulo`, `fecha_articulo`) VALUES
(5, '¿Porque mi estufa produce llamas naranja?', 'Ciencia del quemado\r\nTodas las sustancias requieren oxígeno para hacer combustión. Para quemar gas natural eficientemente, éste debe combinarse con una cantidad exacta y correcta de oxígeno del aire circundante. Si el balance es incorrecto, la estufa no quemará de forma eficiente.\r\n\r\nCausas de las llamas naranjas\r\nLas llamas amarillas o naranjas ocurren si hay demasiado gas y poco aire en la combustión. Sólo un poco del gas se quema, y el resto es desperdiciado. Un síntoma adicional de este problema es la basura que puede contener el gas.', '4879233937_feeaf9b949_b.jpg', 1, '2020-02-15'),
(6, '¿Por qué Tubos Argentinos sigue fabricando caños de acero para gas?', 'Tubos Argentinos S.A. fabrica caños para gas, con la marca TASAGAS, conforme a las normas NAG 250 y 251 y cumple rigurosamente con los más altos estándares de calidad, desde hace más de 12 años.\r\n\r\nLos procesos de producción están certificados bajo las normas ISO 9001:2008, lo que obliga a la compañía a establecer una política de calidad que se manifiesta en sus procesos, pero también en sus productos.\r\n\r\nAnte la aparición de nuevos sistemas de conducción de gas domiciliario, nuestros distribuidores sanitarios nos preguntan ¿por qué TUBOS ARGENTINOS no fabrica estos productos? La respuesta a esta inquietud ha sido analizada extensamente y nuestra respuesta es contundente: Seguimos fabricando tubos de acero. ¿Por qué?\r\n\r\nEn primer lugar vamos a comentar las ventajas de nuestro producto:\r\n\r\nEl 100 % de los caños está probado hidrostáticamente con lo que se asegura la estanqueidad del gas, un elemento tan noble pero al mismo tiempo tan peligroso.\r\nLos caños NAG 250 pueden ser unidos por roscas o por soldadura, lo que otorga continuidad acero – acero.\r\nEl gran espesor de pared de los caños ( 2.35 mm a 4.05 mm ) le otorga las siguientes propiedades al producto:\r\n1- Resistencia al punzonado (resistencia a la perforación de un clavo, tornillo o broca).\r\n\r\n2 - Resistencia frente a altas temperaturas (mayor seguridad ante casos de incendio).\r\n\r\n3 - Elevada rigidez mecánica, otorga mayor resistencia a golpes y maltrato (permite una adecuada y segura instalación en obra).\r\n\r\nLa experiencia ha demostrado que el sistema de caños de espesor NAG 251 con recubrimiento epóxidico, funciona sin comprometer la seguridad domiciliaria.', 'unnamed.jpg', 1, '2020-02-11'),
(7, 'Caños de polipropileno con alma de acero, mayor seguridad para la instalación de gas', 'El polietileno que recubre al caño le brinda protección anticorrosiva y permite obtener uniones seguras por termofusión. El alma de acero aporta la resistencia estructural y mecánica necesarias para prevenir aplastamiento, punzonado o perforaciones accidentales.\r\n\r\nLos caños Sigas, del Grupo Dema, surgieron hace una década y por entonces se fabricaban en solo tres medidas (20, 25 y 32 mm). Con el transcurso del tiempo, la tecnología fue seduciendo a los instaladores y la oferta se fue ampliando. Actualmente hay nueve medidas de caño (hasta 110 mm) y más de 150 conexiones, lo que le da flexibilidad al sistema para resolver todo tipo de proyectos.\r\n\r\nTambién surgió la competencia. La empresa IPS, fabricante de cañerías para distribución de agua con uniones termo fusionadas, lanzó el sistema para gas Vantec+ con similares características que el anterior. Desde IPS aseguran que el promedio de tendido de instalación de su sistema es de la tercera parte del tiempo en comparación con una tradicional.', 'ventajas-tuberias-pe-03.jpg', 1, '2020-02-11'),
(8, 'El gas natural, hacia una economía baja en carbono', 'Para entender la dimensión del problema de la contaminación del aire en las ciudades conviene tener presentes algunos datos. Según estimaciones de la Organización Mundial de la Salud (OMS), más de 400.000 personas mueren prematuramente cada año en la Unión Europea por la mala calidad del aire y varios millones padecen enfermedades respiratorias y cardiovasculares provocadas por la contaminación. Además, el 92% de la población mundial vive en lugares donde no se respetan las directrices de la OMS sobre la calidad del aire.\r\n\r\n\"12,6 millones personas mueren cada año por exposición a factores de riesgo medioambientales, especialmente la contaminación. De ahí que la movilidad sostenible, junto a la gestión de residuos eficientes, sea la base para un aire saludable y de calidad en las ciudades\", señalaba la directora del Departamento de Salud Pública y Medio Ambiente de OMS, Maria Neira, durante el Congreso Anual de la Asociación Ibérica del GAS NATURAL para la Movilidad (GASNAM), en marzo de este año.', 'Diario_Sur.jpg', 1, '2020-02-15'),
(9, '¿que son los gases nobles?', 'Los gases nobles son un grupo de elementos químicos con propiedades muy similares: por ejemplo, bajo condiciones normales, son gases monoatómicos inodoros, incoloros y presentan una reactividad química muy baja. Se sitúan en el grupo 18 (VIIIA)1​de la tabla periódica (anteriormente llamado grupo 0). Los siete gases son helio (He), neón (Ne), argón (Ar), kriptón (Kr), xenón (Xe), el radiactivo radón (Rn)1​ y el sintético oganesón (Og).\r\n\r\nLas propiedades de los gases nobles pueden ser explicadas por las teorías modernas de la estructura atómica: a su capa electrónica de electrones valentes se la considera completa,2​ dándoles poca tendencia a participar en reacciones químicas, por lo que solo unos pocos compuestos de gases nobles han sido preparados hasta 2008. El xenón reacciona de manera espontánea con el flúor (debido a la alta electronegatividad de este), y a partir de los compuestos resultantes se han alcanzado otros. También se han aislado algunos compuestos con kriptón. Los puntos de fusión y de ebullición de cada gas noble están muy próximos, difiriendo en menos de 10 °C; consecuentemente, solo son líquidos en un rango muy pequeño de temperaturas.\r\n\r\nEl neón, argón, kriptón y xenón se obtienen del aire3​ usando los métodos de licuefacción y destilación fraccionada.4​ El helio es típicamente separado del gas natural y el radón se aísla normalmente a partir del decaimiento radioactivo de compuestos disueltos del radio. Los gases nobles tienen muchas aplicaciones importantes en industrias como iluminación, soldadura y exploración espacial. La combinación helio-oxígeno-nitrógeno (trimix) se emplea para respirar en inmersiones de profundidad para evitar que los buzos sufran el efecto narcótico del nitrógeno. Después de verse los riesgos causados por la inflamabilidad del hidrógeno, este fue reemplazado por helio en los dirigibles y globos aerostáticos.', 'gases-nobles-1-728.jpg', 1, '2020-02-15'),
(10, 'Cambio de Color!!!', 'A partir de enero del 2019, Sigas Thermofusión® se produce con una nueva materia prima, identificada con un color amarillo intenso.\r\n\r\nEste cambio responde a una Disposición del ENARGAS, que determina una calidad ajustada a la norma NAG 140 actual (ex 129 para redes de hasta 4 bar).\r\n\r\nPor este motivo, hasta diciembre de 2020, coexistirán en el mercado tubos y conexiones de color amarillo intenso y de color amarillo suave. Todos esos productos se pueden mezclar, porque son compatibles y están aprobados.\r\n\r\nSigas Thermofusión® es el único sistema con 9 medidas de tubos y conexiones, 12 años de experiencia y más de 35.000.000 de metros instalados.Para su correcta instalación, según norma, se han capacitado más de 130.000 profesionales, técnicos, instaladores, inspectores y supervisores de empresas distribuidoras de gas, titulares y vendedores de comercios sanitaristas en cursos teórico-prácticos de carácter gratuito, en todo el país.', '8bcfbc3f1d60eeaead8ae0e1bdd635f58279aa95.jpeg', 1, '2020-03-16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `descripcion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `descripcion`) VALUES
(1, 'Codos'),
(2, 'Curvas'),
(3, 'uniones'),
(4, 'tes'),
(5, 'otros'),
(6, 'caños'),
(7, 'tuercas'),
(8, 'Herramientas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consulta`
--

CREATE TABLE `consulta` (
  `id_consulta` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `email` varchar(300) NOT NULL,
  `ciudad` varchar(200) NOT NULL,
  `provincia` varchar(200) NOT NULL,
  `mensaje` varchar(1000) NOT NULL,
  `asunto` varchar(100) NOT NULL,
  `leido` int(11) NOT NULL DEFAULT '0',
  `archivo` int(11) NOT NULL DEFAULT '1',
  `id_usuario` int(11) DEFAULT NULL,
  `respuesta` varchar(5000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `consulta`
--

INSERT INTO `consulta` (`id_consulta`, `nombre`, `apellido`, `email`, `ciudad`, `provincia`, `mensaje`, `asunto`, `leido`, `archivo`, `id_usuario`, `respuesta`) VALUES
(1, 'pablo', 'perez', 'pabloperez233444@gmail.com', 'corrientes', 'corrientes', 'hola quisiera saber si existe disponibilidad de productos de gas', 'mensaje', 1, 0, NULL, NULL),
(2, 'pablo', 'perez', 'pablo@gmail.com', 'corrientes', 'corrientes', ' Este es un mensaje\r\n               \r\n            ', 'mensaje', 1, 0, NULL, NULL),
(3, 'Andres', 'Billordo', 'billo@hotmail.com', 'Resistencia', 'Chaco', 'No se si llego', 'Algo', 1, 0, NULL, NULL),
(4, 'dsfsdf', 'dfsdf', 'billosdfs@hotmail.com', 'sdfsdf', 'sdf', 'sdfsdf', 'dfsdf', 0, 0, NULL, NULL),
(5, 'alfonzo', 'alfonzo', 'alfonzo@gmail.com', 'corrientes', 'corrientes', '1234', 'taller', 1, 0, NULL, NULL),
(6, 'diego', 'Almiron', 'diego@gmail.com', 'corrientes', 'corrientes', 'quisiera saber si tiene en stock caño de epoxi', 'caño ', 1, 0, NULL, NULL),
(7, 'Bruno', 'Almiron', 'brunoalmiron@gmail.com', 'corrientes', 'corrientes', 'tiene en stock caños?', 'caño ', 1, 1, NULL, NULL),
(8, 'el principito', 'gomez', 'diegodavidalmiron17@gmail.com', 'corrientes', 'corrientes', 'hhhhhhhhhhhhhhhhh', 'caño 2', 1, 1, NULL, NULL),
(9, 'Bruno', 'Almiron', 'brunoalmiron@gmail.com', 'corrientes', 'corrientes', 'ya tienen caños galvanixados?', 'caño ', 1, 0, NULL, NULL),
(10, 'el principito', 'gomez', 'diego@gmail.com', 'corrientes', 'corrientes', 'cuando llegan las uniones?', 'producto', 0, 0, NULL, NULL),
(11, 'juan', 'perez', 'juan@gmail.com', 'corrientes', 'corrientes', 'cuando llegan los nuevos productos de gas?', 'gas', 0, 1, NULL, NULL),
(12, 'pablo', 'ramirez', 'pablito@gmail.com', 'bs as', 'bs as', 'cuando tendran los productos innovadores?', 'innovacion', 0, 1, NULL, NULL),
(13, 'Juan', 'Gomez', 'usuario@taller.com', 'corrientes', 'corrientes', 'realizan servicios de instalacion?', 'servicio', 1, 0, 2, 'Hola. Por el momento nos encontramos sin servicio de instalación Saludos!!'),
(14, 'pedro', 'ramirez', 'diegodavidalmiron17@gmail.com', 'corrientes', 'corrientes', 'quiero hacer una consulta', 'servicio', 0, 1, NULL, NULL),
(15, 'blas', 'pareras', 'blas@gmail.com', 'corrientes', 'corrientes', 'Estan disponibles los caños?', 'caño ', 0, 1, NULL, NULL),
(16, 'jorge', 'perez', 'jorgitoo@gmail.com', 'corrientes', 'corrientes', 'cuanto cuesta una tuerca?', 'tuercas', 0, 1, NULL, NULL),
(17, 'Patricio', 'pareras', 'juanitaromero@gmail.com', 'corrientes', 'corrientes', 'que productos innovadores saldran en estos dias?', 'innovacion', 0, 1, NULL, NULL),
(19, 'pablo', 'Duete', 'pablo@taller.com', 'corrientes', 'corrientes', 'hola puedo consultar por los caños?', 'caño', 1, 0, 3, 'Hola si. Se encuentran en stock. Saludos !!!'),
(20, 'pablo', 'Duete', 'pablo@taller.com', 'asxda', 'bs as', 'presta servicios de reparacion?', 'servicio', 0, 1, 3, NULL),
(22, 'pablo', 'duete', 'pablo@gmail.com', 'corrientes', 'corrientes', 'Buenas noches quisiera saber cuando llega mi Pedido', 'Consultar Pedido', 0, 1, 5, NULL),
(23, 'Juan', 'Gomez', 'usuario@taller.com', 'corrientes', 'corrientes', 'Realizan reparaciones de cocinas?', 'reparacion', 0, 1, 6, NULL),
(24, 'Walter', 'Bou', 'walter@gmail.com', 'Cordoba', 'Cordoba', 'Buenos días tienen productos en promoción?', 'Promociones', 0, 1, NULL, NULL),
(25, 'Maria', 'Perez', 'mariaperez@gmail.com', 'Corrientes', 'Corrientes', 'Hola aun no tienen caños galvanizados?', 'Caños', 0, 1, NULL, NULL),
(26, 'Juan', 'Perez', 'otro@gmail.com', 'Corrientes', 'Corrientes', 'Buenas noches, queria saber si dispone de garrafas de 10 kilos', 'Garrafa', 1, 0, 2, 'hola por ahora no contamos con garrafas saludos...'),
(27, 'Juan', 'Perez', 'otro@gmail.com', 'Corrientes', 'Corrientes', 'Hola. para cuando van a prestar servicios de reparacion?', 'Servicio', 1, 0, 2, 'todavia no contamos gracias'),
(28, 'Alicia', 'Paez', 'aliciapaez@gmail.com', 'Corrientes', 'Corrientes', 'Hola como puedo realizar una compra a través del sitio?', 'Compra', 1, 0, 31, 'Hola. Las compras se hacen mediante el catalogo agregando productos al carrito. y seguir los pasos para realizar tu pedido. Saludos !!!'),
(29, 'Alicia', 'Paez', 'aliciapaez@gmail.com', 'Corrientes', 'Corrientes', 'Hola queria saber cuando llegan las herramientas?', 'Herramientas', 1, 1, 31, 'Hola. Muy pronto tendremos herramientas en el sitio Saludos!!!'),
(30, 'Maria', 'Pino', 'pinomara566@gmail.com', 'Corrientes', 'Corrientes', 'Buenos dias, cuando llegan los tubos de gas?', 'Tubos de gas', 0, 1, 24, NULL),
(31, 'Raul', 'Gimenez', 'raulgimenez@gmai.com', 'Corrientes', 'Corrientes', 'Hola, quiero saber cuando tardan en llegar los pedidos?', 'Pedidos', 0, 1, 32, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallepedido`
--

CREATE TABLE `detallepedido` (
  `id_detalle` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(10) NOT NULL,
  `preciodetalle` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detallepedido`
--

INSERT INTO `detallepedido` (`id_detalle`, `id_pedido`, `id_producto`, `cantidad`, `preciodetalle`) VALUES
(1, 2, 11, 2, 0),
(2, 3, 12, 1, 0),
(3, 6, 8, 1, 1500),
(4, 6, 11, 1, 1400),
(5, 8, 13, 1, 18000),
(6, 8, 11, 1, 1400),
(7, 10, 2, 1, 800),
(8, 10, 13, 1, 18000),
(9, 11, 13, 1, 18000),
(10, 11, 2, 1, 800),
(11, 13, 1, 1, 800),
(12, 14, 1, 1, 800),
(13, 19, 1, 1, 800),
(14, 21, 13, 1, 18000),
(15, 23, 13, 1, 18000),
(16, 23, 11, 1, 1400),
(17, 24, 21, 2, 25000),
(18, 24, 7, 1, 1000),
(19, 25, 8, 3, 1500),
(20, 26, 13, 1, 18000),
(21, 26, 6, 1, 2500),
(22, 27, 21, 1, 25000),
(23, 28, 21, 1, 25000),
(24, 30, 21, 1, 25000),
(25, 31, 21, 2, 25000),
(26, 32, 8, 2, 1500),
(27, 33, 7, 1, 1000),
(28, 34, 5, 1, 700),
(29, 35, 5, 1, 700),
(30, 44, 13, 1, 18000),
(31, 53, 8, 1, 1500),
(32, 54, 23, 1, 1000),
(33, 55, 10, 1, 750),
(34, 55, 11, 1, 1400),
(35, 55, 17, 1, 1300),
(36, 55, 21, 2, 25000),
(37, 55, 20, 1, 250),
(38, 56, 23, 1, 1000),
(39, 57, 4, 3, 700),
(40, 57, 5, 1, 700),
(41, 58, 5, 1, 700),
(42, 58, 4, 1, 700),
(43, 59, 9, 1, 1300),
(44, 59, 18, 1, 900),
(45, 59, 20, 1, 250),
(46, 60, 8, 2, 1500),
(47, 60, 7, 1, 1000),
(48, 60, 3, 1, 1200),
(49, 60, 9, 1, 1300),
(50, 61, 1, 2, 700),
(51, 61, 3, 1, 1200),
(52, 62, 4, 1, 700),
(53, 63, 8, 2, 1500),
(54, 64, 8, 1, 1500),
(55, 65, 22, 13, 700),
(56, 65, 35, 6, 700),
(57, 65, 23, 1, 1000),
(58, 65, 37, 2, 700),
(59, 65, 19, 2, 300),
(60, 65, 21, 1, 25000),
(61, 65, 8, 1, 1500),
(62, 66, 8, 1, 1500),
(63, 66, 1, 1, 700),
(64, 66, 12, 2, 1200),
(65, 66, 10, 1, 750),
(66, 67, 1, 3, 700),
(67, 67, 3, 1, 1200),
(68, 67, 4, 1, 700),
(69, 67, 6, 1, 2500),
(70, 68, 5, 1, 700),
(71, 68, 6, 1, 2500),
(72, 68, 7, 1, 1000),
(73, 68, 8, 2, 1500),
(74, 69, 7, 5, 1000),
(75, 69, 8, 1, 1500),
(76, 69, 6, 1, 2500),
(77, 69, 5, 3, 700),
(78, 69, 11, 1, 1400),
(79, 69, 13, 1, 18000),
(80, 70, 1, 11, 700),
(81, 70, 2, 25, 600),
(82, 71, 14, 3, 1300),
(83, 71, 15, 3, 800),
(84, 71, 16, 1, 800),
(85, 71, 13, 1, 18000),
(86, 72, 17, 1, 1300),
(87, 73, 38, 1, 2000),
(88, 73, 40, 1, 1500),
(89, 73, 39, 2, 3000),
(90, 73, 41, 1, 1000),
(91, 74, 42, 3, 2500),
(92, 75, 43, 3, 3500),
(93, 75, 44, 1, 3000),
(94, 75, 45, 1, 200),
(95, 75, 46, 1, 1800),
(96, 76, 47, 2, 300),
(97, 76, 46, 1, 1800),
(98, 76, 48, 1, 300),
(99, 76, 49, 3, 19500),
(100, 77, 50, 1, 23400),
(101, 78, 51, 11, 1000),
(102, 78, 52, 2, 840),
(103, 78, 53, 3, 700),
(104, 79, 54, 6, 7600),
(105, 79, 2, 3, 600),
(106, 79, 3, 1, 1200),
(107, 80, 49, 1, 54500),
(108, 80, 50, 1, 43400),
(109, 80, 55, 2, 45050),
(110, 80, 43, 1, 17600),
(111, 80, 39, 1, 3000),
(112, 80, 54, 1, 7600),
(113, 80, 6, 1, 2500),
(114, 80, 42, 1, 2500),
(115, 81, 55, 1, 45050),
(116, 82, 49, 1, 54500),
(117, 82, 19, 2, 300),
(118, 82, 1, 1, 700);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `envio`
--

CREATE TABLE `envio` (
  `id_envio` int(11) NOT NULL,
  `descripcion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `envio`
--

INSERT INTO `envio` (`id_envio`, `descripcion`) VALUES
(1, 'Domicilio'),
(2, 'Correo Argentino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_usuario`
--

CREATE TABLE `estado_usuario` (
  `usuario_estado` int(30) NOT NULL,
  `descripcion_estado` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estado_usuario`
--

INSERT INTO `estado_usuario` (`usuario_estado`, `descripcion_estado`) VALUES
(0, 'Bloqueado'),
(1, 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `id_pago` int(11) NOT NULL,
  `descripcion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pago`
--

INSERT INTO `pago` (`id_pago`, `descripcion`) VALUES
(1, 'Depósito'),
(2, 'Tarjeta de Crédito'),
(3, 'Tarjeta de Débito');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `id_pedido` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `id_pago` int(11) NOT NULL,
  `id_envio` int(11) NOT NULL,
  `archivar_pedido` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`id_pedido`, `fecha`, `id_usuario`, `direccion`, `id_pago`, `id_envio`, `archivar_pedido`) VALUES
(1, '2019-06-03', 5, 'las heras 1100', 1, 1, 1),
(2, '2019-06-04', 5, 'las heras 1100', 1, 2, 1),
(3, '2019-06-03', 5, 'las heras 1100', 1, 1, 1),
(4, '2019-06-04', 5, 'las heras 1100', 1, 2, 0),
(5, '2019-06-09', 2, 'ytrytry', 1, 1, 0),
(6, '2019-06-09', 2, 'ytrytry', 1, 1, 1),
(8, '2019-06-09', 2, 'gdfgd', 1, 1, 1),
(9, '2019-06-09', 2, 'gdfgd', 1, 1, 0),
(10, '2019-06-09', 2, 'asdas', 1, 2, 0),
(11, '2019-06-09', 2, '423', 3, 1, 0),
(13, '2019-06-11', 2, 'Las Heras 6000', 2, 1, 0),
(14, '2019-06-11', 2, 'Las Heras 6000', 2, 2, 0),
(15, '2019-06-11', 2, 'Las Heras 6000', 2, 2, 0),
(16, '2019-06-11', 2, 'Las Heras 6000', 2, 2, 0),
(17, '2019-06-11', 2, 'Las Heras 6000', 2, 2, 0),
(18, '2019-06-11', 2, 'Las Heras 6000', 2, 2, 0),
(19, '2019-06-11', 2, 'Las Heras 6000', 1, 2, 0),
(20, '2019-06-11', 2, 'Las Heras 6000', 1, 2, 0),
(21, '2019-06-11', 2, 'Las Heras 6000', 1, 1, 0),
(23, '2019-06-11', 2, 'Las Heras 6000', 2, 1, 0),
(24, '2019-06-11', 2, 'Las Heras 6000', 3, 2, 0),
(25, '2019-06-11', 7, 'Las Heras 654', 3, 1, 0),
(26, '2019-06-13', 2, 'Las Heras 6004', 2, 1, 0),
(27, '2019-06-13', 2, 'Las Heras 6004', 1, 2, 0),
(28, '2019-06-13', 2, 'Las Heras 6004', 1, 1, 0),
(29, '2019-06-13', 2, 'Las Heras 6004', 1, 1, 0),
(30, '2019-06-13', 2, 'Las Heras 6004', 1, 2, 0),
(31, '2019-06-13', 2, 'Las Heras 6004', 1, 1, 0),
(32, '2019-06-13', 2, 'Las Heras 6004', 1, 1, 0),
(33, '2019-12-13', 10, 'junin 3000', 1, 1, 0),
(34, '2019-12-13', 2, 'Las Heras 6004', 1, 2, 0),
(35, '2019-12-13', 2, 'dkldmklmd', 1, 1, 0),
(36, '2019-12-13', 2, 'dkldmklmd', 1, 1, 0),
(37, '2019-12-13', 2, 'dkldmklmd', 1, 1, 0),
(38, '2019-12-13', 2, 'dkldmklmd', 1, 1, 0),
(39, '2019-12-13', 2, 'dkldmklmd', 1, 1, 0),
(40, '2019-12-13', 2, 'dkldmklmd', 1, 1, 0),
(41, '2019-12-13', 2, 'dkldmklmd', 1, 1, 0),
(42, '2019-12-13', 2, 'dkldmklmd', 1, 1, 0),
(43, '2019-12-13', 2, 'dkldmklmd', 1, 1, 0),
(44, '2019-12-13', 10, 'junin 3000', 1, 1, 0),
(45, '2019-12-13', 10, 'junin 3000', 1, 1, 0),
(46, '2019-12-13', 10, 'junin 3000', 1, 1, 0),
(47, '2019-12-13', 10, 'junin 3000', 1, 1, 0),
(48, '2019-12-13', 10, 'junin 3000', 1, 1, 0),
(49, '2019-12-13', 10, 'junin 3000', 1, 1, 0),
(50, '2019-12-13', 10, 'junin 3000', 1, 1, 0),
(51, '2019-12-13', 10, 'junin 3000', 1, 1, 0),
(52, '2019-12-13', 10, 'junin 3000', 1, 1, 0),
(53, '2019-12-13', 10, 'junin 3000', 3, 1, 0),
(54, '2019-12-15', 2, 'Las Heras 6004', 2, 1, 0),
(55, '2019-12-16', 10, 'junin 3000', 3, 1, 0),
(56, '2019-12-18', 6, 'Lamadrid 3456', 1, 1, 0),
(57, '2019-12-18', 10, 'junin 3000', 3, 1, 0),
(58, '2020-01-29', 2, 'Las Heras 6004', 2, 1, 0),
(59, '2020-02-17', 5, 'JR Fernandes 245', 3, 1, 0),
(60, '2020-02-24', 3, 'belgrano 234', 3, 1, 0),
(61, '2020-03-02', 2, 'Las Heras 6004', 1, 1, 1),
(62, '2020-03-06', 2, 'Las Heras 6004', 1, 1, 0),
(63, '2020-03-06', 2, 'Las Heras 6004', 1, 1, 0),
(64, '2020-03-06', 6, 'Lamadrid 3456', 1, 1, 0),
(65, '2020-03-06', 31, 'Gral Paz 4356', 2, 1, 0),
(66, '2020-03-06', 31, 'Gral Paz 4356', 2, 1, 0),
(67, '2020-03-06', 31, 'Gral Paz 4356', 2, 1, 0),
(68, '2020-03-06', 31, 'Gral Paz 4356', 1, 1, 0),
(69, '2020-03-06', 31, 'Gral Paz 4356', 2, 1, 0),
(70, '2020-03-06', 30, 'JR Vidal 3400', 2, 1, 0),
(71, '2020-03-06', 30, 'JR Vidal 3400', 2, 1, 0),
(72, '2020-03-08', 31, 'Gral Paz 4355', 3, 1, 0),
(73, '2020-03-11', 25, 'Velez Sarfield 322', 1, 1, 0),
(74, '2020-03-11', 26, 'Barrio las rosas 344', 1, 1, 0),
(75, '2020-03-11', 26, 'Barrio las rosas 344', 2, 1, 0),
(76, '2020-03-11', 24, 'Astrada 23344', 2, 1, 0),
(77, '2020-03-11', 24, 'Astrada 23344', 2, 1, 0),
(78, '2020-03-14', 32, 'En el centro', 1, 1, 0),
(79, '2020-03-14', 32, 'En el centro', 3, 1, 0),
(80, '2020-03-14', 32, 'En el centro', 1, 1, 0),
(81, '2020-03-14', 6, 'Lamadrid 3456', 2, 1, 0),
(82, '2020-03-14', 6, 'Lamadrid 3456', 3, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `perfil` (
  `id_perfil` int(11) NOT NULL,
  `descripcion_perfil` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`id_perfil`, `descripcion_perfil`) VALUES
(1, 'Administrador'),
(2, 'Usuario'),
(3, 'Super');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL,
  `descripcion_producto` varchar(1000) NOT NULL,
  `nombre_producto` varchar(300) NOT NULL,
  `stock` int(20) NOT NULL,
  `precio` double NOT NULL,
  `estado` int(2) NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `vendidos` int(20) NOT NULL,
  `codigo_producto` int(11) NOT NULL DEFAULT '1000000000'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `descripcion_producto`, `nombre_producto`, `stock`, `precio`, `estado`, `imagen`, `id_categoria`, `vendidos`, `codigo_producto`) VALUES
(1, 'Codo de Reduccion Epoxi 1/2\"', 'Codo de Reduccion Epoxi', 19, 700, 1, 'Codo de Reduccion Epoxi.jpg', 1, 18, 1000000001),
(2, 'Codo Red. 3/4 X 1/2\"', 'Codo de Reduccion', 0, 600, 1, 'Codo de Reduccion.jpg', 1, 28, 1000000002),
(3, 'Codo M.H. 90 1/2\"', 'Codo M-H Epoxi', 30, 1200, 1, 'Codo M-H 90 Epoxi.jpg', 1, 5, 1000000003),
(4, 'Codo M.H. 90 3/8\"', 'Codo M-H.', 47, 700, 1, 'Codo M-H 90.jpg', 1, 6, 1000000004),
(5, 'Curva H.H. 45 3/8\"', 'Curva H-H 45 Epoxi', 24, 700, 1, 'Curva H-H 45 Epoxi.jpg', 2, 10, 1000000005),
(6, 'Curva H.H. 45 3/8\"', 'Curva H.H. 45', 497, 2500, 1, 'Curva H-H 45.jpg', 2, 9, 1000000006),
(7, 'Curva H.H. 90 1/2\"', 'Curva H-H 90 Epoxi', 23, 1000, 1, 'Curva H-H 90 Epoxi.jpg', 2, 58, 1000000007),
(8, 'Curva H.H. 90 1/2\"', 'Curva H-H 90', 20, 1500, 1, 'Curva H-H 90.jpg', 2, 116, 1000000008),
(9, 'Tapon M. 1/2\"', 'Tapon M Epoxi', 18, 1300, 1, 'Tapon M Epoxi.jpg', 3, 102, 1000000009),
(10, 'Tapon M. 1/2\"', 'Tapon M', 19, 750, 1, 'Tapon M.jpg', 3, 91, 1000000010),
(11, 'Union Doble Conica Epoxi 1/4\"', 'Union doble conica Epoxi', 19, 1400, 1, 'Union doble conica Epoxi.jpg', 3, 35, 1000000011),
(12, 'Union Doble Conica 1/4\"', 'Union doble conica', 13, 1200, 1, 'Union doble conica.jpg', 3, 57, 1000000012),
(13, 'Te 1/2\"', 'Te Epoxi', 2, 1000, 1, 'Te Epoxi.jpg', 4, 60, 1000000013),
(14, 'Te 1/2\"', 'Te Galvanizada', 0, 1300, 1, 'Te.jpg', 4, 70, 1000000014),
(15, 'Te Cab. 3/4 X 1/2 X 1/2\"\"', 'Te de reducc. extrema Epoxi', 1, 800, 1, 'Te de reduccion extrema y central epoxi.jpg', 4, 25, 1000000015),
(16, 'Te Cab. 3/4 X 1/2 X 1/2\"\"', 'Te de reducc. extrema', 3, 800, 1, 'Te de reduccion extrema y central.jpg', 4, 2, 1000000016),
(17, 'Cruz 1/2\" 3/4\"', 'Cruz Epoxi', 2, 1300, 1, 'cruz epoxi.jpg', 4, 6, 1000000017),
(18, 'Cruz 1/2\" 3/4\"', 'Cruz Común', 29, 900, 1, 'cruz.jpg', 4, 8, 1000000018),
(19, 'rosca con tuerca 1/2\"', 'rosca con tuerca', 0, 300, 1, 'rosca con tuerca.jpg', 3, 6, 1000000019),
(20, 'Brida Mediana 1/2\"', 'Brida Mediana Epoxi', 4, 650, 1, 'Brida Mediana Epoxi.jpg', 3, 79, 1000000020),
(21, 'Brida Mediana 1/2\"', 'Brida Mediana', 8, 600, 1, 'Brida Mediana.jpg', 3, 16, 1000000021),
(22, 'Niple Epoxi 1/2\"', 'Niple Epoxi', 17, 700, 1, 'niple_epoxi.jpeg', 6, 13, 1000000022),
(23, 'Conexion completa  1/2\"', 'conexion completa', 27, 1000, 1, 'conexion_completa.jpg', 6, 3, 1000000023),
(35, 'tuerca', 'Tuerca Simple', 34, 700, 1, 'tuerc_simple.jpg', 7, 6, 1000000024),
(37, 'Tuerca Epoxi 1/2\"', 'Tuerca Epoxi', 68, 700, 1, 'tuerca_epoxi.jpg', 7, 2, 1000000025),
(38, 'Caño Epoxi 1/2\"', 'Caño Epoxi', 49, 2000, 1, 'canio_epoxi.jpg', 6, 1, 1000000026),
(39, 'Tubo De Acero Polietileno', 'Tubo de Acero', 47, 3000, 1, 'Tubo_acero_polietileno.jpeg', 6, 3, 1000000027),
(40, 'Caño Galvanizado 1/2\'\'', 'Caño Galvanizado', 29, 1500, 1, 'canio_galvanizado.jpeg', 6, 1, 1000000028),
(41, 'Niple Galvanizado 1/2&quot;', 'Niple Galvanizado', 39, 1000, 1, 'Niple_Galvanizado.jpeg', 6, 1, 1000000029),
(42, 'Curva de sobrepasaje', 'Curva de sobrepasaje', 46, 2500, 1, 'Curva_de_sobrepasaje.jpeg', 2, 4, 1000000030),
(43, 'Boquilla para montura de reparación', 'Boquilla De Reparación', 46, 17600, 1, 'Boquilla_para_montura_de_reparación.jpeg', 8, 4, 1000000031),
(44, 'Boquillas para termofusion', 'Boquillas termofusion', 19, 3000, 1, 'Boquillas_para_termofusion.jpeg', 8, 1, 1000000032),
(45, 'Cinta Aluminizada', 'Cinta Aluminizada', 199, 200, 1, 'Cinta_Aluminizada.jpeg', 8, 1, 1000000033),
(46, 'Cortatubo radial', 'Cortatubo', 78, 1800, 1, 'Cortatubo_radial.jpeg', 8, 2, 1000000034),
(47, 'Cuchilla de corta tubo', 'Cuchilla Cortatubo', 343, 300, 1, 'Cuchilla_de_corta_tubo.jpeg', 8, 2, 1000000036),
(48, 'Llave Alem 7-32', 'Llave Alem', 11, 300, 1, 'Llave_Alem_7-32.jpeg', 8, 1, 1000000035),
(49, 'Máquina Dual para electrofusion', 'Máquina electrofusion', 3, 54500, 1, 'Maquina_Dual_para_electrofusion.jpeg', 8, 5, 1000000037),
(50, 'Termofusor de banco 50 A 12', 'Termofusor banco', 5, 43400, 1, 'Termofusor_de_banco_50_A_12.jpeg', 8, 2, 1000000038),
(51, 'Cupla electrica', 'Cupla electrica', 29, 1000, 1, 'Cupla_electrica.jpeg', 5, 11, 1000000039),
(52, 'Kit repuesto Llave esferica', 'Kit repuesto', 8, 840, 1, 'Kit_repuesto_Llave_esferica.jpeg', 5, 2, 1000000040),
(53, 'Montura de reparacion', 'Montura de reparacion', 27, 700, 1, 'Montura_de_reparacion.jpeg', 5, 3, 1000000041),
(54, 'Tubo PE', 'Tubo PE', 33, 7600, 1, 'Tubo_PE.jpeg', 5, 7, 1000000042),
(55, 'Termofusor 1400w - 220v S-boquillas', 'Termofusor S', 3, 45050, 1, 'Termofusor_1400w_-_220v_S-boquillas.jpeg', 8, 3, 1000000043);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `email` varchar(300) NOT NULL,
  `contraseña` varchar(100) NOT NULL,
  `id_perfil` int(11) NOT NULL,
  `direccion` varchar(300) DEFAULT NULL,
  `telefono` int(20) DEFAULT NULL,
  `usuario_estado` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `apellido`, `email`, `contraseña`, `id_perfil`, `direccion`, `telefono`, `usuario_estado`) VALUES
(2, 'Juan', 'perez', 'otro@gmail.com', 'cHJvZ3JhbWE=', 2, 'Las Heras 6004', 2147483647, 1),
(3, 'pablo', 'Duete', 'pablo@taller.com', 'cHJvZ3JhbWE=', 2, 'belgrano 234', 345566774, 1),
(5, 'pablo', 'duete', 'pablo@gmail.com', 'cHJvZ3JhbWE=', 2, 'JR Fernandes 245', 4456778, 1),
(6, 'Juan', 'Gómez', 'usuario@taller.com', 'cHJvZ3JhbWE=', 2, 'Lamadrid 3456', 2147483647, 1),
(7, 'Federico', 'Duete', 'duete@gmail.com', 'cHJvZ3JhbWE=', 2, 'Las Heras 654', 4445555, 0),
(8, 'Diego', 'Almirón', 'diego@gmail.com', 'cHJvZ3JhbWE=', 3, 'Dr Montaña. 387 viv.', 2147483647, 1),
(10, 'Bruno', 'Almirón', 'brunoalmiron@gmail.com', 'cHJvZ3JhbWE=', 1, 'junin 3000', 442903, 1),
(15, 'fernando', 'Almiron', 'fernando_40@gmail.com', 'cHJvZ3JhbWE=', 2, 'Cazadores Correntinos 2345', 5677889, 1),
(23, 'David', 'Torres', 'david17@gmail.com', 'cHJvZ3JhbWE=', 1, 'Costanera 345', 45677, 1),
(24, 'Maria', 'Pino', 'pinomara566@gmail.com', 'cHJvZ3JhbWE=', 2, 'Astrada 23344', 377544000, 1),
(25, 'Julian', 'Frias', 'friasjulian@gmail.com', 'cHJvZ3JhbWE=', 2, 'Velez Sarfield 322', 283459350, 1),
(26, 'Lucia', 'Martinez', 'luci455@gmail.com', 'cHJvZ3JhbWE=', 2, 'Barrio las rosas 344', 213309367, 1),
(27, 'Erica', 'Talavera', 'erikat344@gmail.com', 'cHJvZ3JhbWE=', 2, 'Astrada 5550', 223484038, 0),
(28, 'Tamara', 'Estigarribia', 'tamara@gmail.com', 'cHJvZ3JhbWE=', 2, 'Chaco y la madrid', 986529463, 1),
(29, 'Patricio', 'Palacios', 'patricio45677@gmail.com', 'cHJvZ3JhbWE=', 2, 'Calle 12', 226608394, 1),
(30, 'Adrian', 'Fernandez', 'adrianalmironfernadez@gmail.com', 'cHJvZ3JhbWE=', 2, 'JR Vidal 3400', 864310693, 1),
(31, 'Alicia', 'Suarez', 'aliciapaez@gmail.com', 'cHJvZ3JhbWE=', 2, 'Gral Paz 4355', 2147483647, 1),
(32, 'Raul', 'Gimenez', 'raulgimenez@gmai.com', 'cHJvZ3JhbWE=', 2, 'En el centro', 15664433, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD PRIMARY KEY (`id_articulo`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `consulta`
--
ALTER TABLE `consulta`
  ADD PRIMARY KEY (`id_consulta`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `detallepedido`
--
ALTER TABLE `detallepedido`
  ADD PRIMARY KEY (`id_detalle`),
  ADD KEY `id_pedido` (`id_pedido`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_producto_2` (`id_producto`),
  ADD KEY `id_pedido_2` (`id_pedido`);

--
-- Indices de la tabla `envio`
--
ALTER TABLE `envio`
  ADD PRIMARY KEY (`id_envio`);

--
-- Indices de la tabla `estado_usuario`
--
ALTER TABLE `estado_usuario`
  ADD PRIMARY KEY (`usuario_estado`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`id_pago`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_pago` (`id_pago`),
  ADD KEY `id_envio` (`id_envio`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id_perfil`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_perfil` (`id_perfil`),
  ADD KEY `id_perfil_2` (`id_perfil`),
  ADD KEY `usuario_estado` (`usuario_estado`),
  ADD KEY `usuario_estado_2` (`usuario_estado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulo`
--
ALTER TABLE `articulo`
  MODIFY `id_articulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `consulta`
--
ALTER TABLE `consulta`
  MODIFY `id_consulta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `detallepedido`
--
ALTER TABLE `detallepedido`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `consulta`
--
ALTER TABLE `consulta`
  ADD CONSTRAINT `consulta_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `detallepedido`
--
ALTER TABLE `detallepedido`
  ADD CONSTRAINT `detallepedido_ibfk_1` FOREIGN KEY (`id_pedido`) REFERENCES `pedido` (`id_pedido`),
  ADD CONSTRAINT `detallepedido_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`);

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`id_pago`) REFERENCES `pago` (`id_pago`),
  ADD CONSTRAINT `pedido_ibfk_2` FOREIGN KEY (`id_envio`) REFERENCES `envio` (`id_envio`),
  ADD CONSTRAINT `pedido_ibfk_3` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_perfil`) REFERENCES `perfil` (`id_perfil`),
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`usuario_estado`) REFERENCES `estado_usuario` (`usuario_estado`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
