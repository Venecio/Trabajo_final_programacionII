
--
-- Base de datos: `tienda_cp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id_compra` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `estado_compra` int(11) NOT NULL,
  `numero_compra` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id_compra`, `id_user`, `id_producto`, `estado_compra`, `numero_compra`) VALUES
(43, 1, 1, 1, 2),
(46, 1, 1, 1, 2),
(48, 1, 3, 1, 2),
(49, 1, 3, 1, 2),
(50, 1, 3, 1, 2),
(51, 1, 2, 1, 2),
(52, 1, 2, 1, 2),
(53, 1, 2, 1, 2),
(54, 1, 1, 1, 2),
(57, 1, 3, 1, 2),
(58, 1, 3, 1, 2),
(59, 1, 1, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `producto_nombre` varchar(32) NOT NULL,
  `producto_precio` double NOT NULL,
  `producto_descripcion` text NOT NULL,
  `tipo_producto` varchar(32) NOT NULL,
  `producto_imagen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `producto_nombre`, `producto_precio`, `producto_descripcion`, `tipo_producto`, `producto_imagen`) VALUES
(1, 'Hamburguesa de queso', 250, 'Hamburguesa con pan fresco con queso', 'hamburguesas', 'hamburguesa.jpg'),
(2, 'Coca cola', 150, 'Gaseosa completamente saludable', 'bebidas', ''),
(3, 'Pizza a la piedra', 300, 'Pizza hecha a la piedra con una masa fina', 'pizzas', ''),
(4, 'Helado de limon', 100, 'Libera texturas y aromas que conquistan a los paladares más exigentes.', 'postres', ''),
(5, 'Hamburguesa con papas', 300, 'Hamburguesa de carne primera calidad acompañado con papas medianas', 'hamburguesas', 'hamburguesa-papas.jpg'),
(6, 'Hamburguesa doble', 300, 'Hamburguesa de carne primera calidad ahora doble. ', 'hamburguesas', 'hamburguesa-doble.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_user` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `user_password` int(11) NOT NULL,
  `email` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_user`, `username`, `user_password`, `email`) VALUES
(1, 'Venecio', 3322, 'jack@live.com'),
(2, 'Cristian', 2271, 'AAA@gmail.com'),
(3, 'jac7', 333444, 'vnco7@gmail.com'),
(4, 'Crisn', 3399, 'Cristian1@gmail.com'),
(5, 'Coi', 3399, 'Cristian@gmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id_compra`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `usuarios` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `compras_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

