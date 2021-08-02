CREATE DATABASE tienda_cp;
CREATE TABLE `compras` (
  `id_compra` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `estado_compra` int(11) NOT NULL,
  `numero_compra` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `producto_nombre` varchar(32) NOT NULL,
  `producto_precio` double NOT NULL,
  `producto_descripcion` text NOT NULL,
  `tipo_producto` varchar(32) NOT NULL,
  `producto_imagen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `productos` (`id_producto`, `producto_nombre`, `producto_precio`, `producto_descripcion`, `tipo_producto`, `producto_imagen`) VALUES
(1, 'Hamburguesa de queso', 250, 'Hamburguesa armada con pan fresco y queso', 'hamburguesas', 'imagen3.png'),
(2, 'Coca cola', 150, 'Gaseosa completamente saludable', 'bebidas', 'coca.png'),
(3, 'Pizza a la piedra', 300, 'Pizza hecha a la piedra con una masa fina', 'pizzas', 'pizza-piedra.png'),
(4, 'Helado', 400, '1kg helado primera calidad', 'postres', '1kghelado.png'),
(5, 'Hamburguesa con papas', 300, 'Hamburguesa de carne primera calidad acompañado con papas medianas', 'hamburguesas', 'imagen1.png'),
(6, 'Hamburguesa doble', 300, 'Hamburguesa de carne primera calidad ahora doble. ', 'hamburguesas', 'imagen2.png'),
(7, 'Hamburguesa vegana', 222, 'Hecha con lentejas y verduras', 'hamburguesas', 'h-vegana.png'),
(8, 'V Burguer', 1000, 'Hamburguesa especial del creador', 'hamburguesas', 'v-burger.png'),
(9, 'Hamburguesa triple', 399, 'Hamburguesa hecha para los más capaces', 'hamburguesas', 'h-triple.png'),
(10, 'Hamburguesa de pescado', 155, 'Para los amantes del pescado', 'hamburguesas', 'h-pescado.png');

CREATE TABLE `usuarios` (
  `id_user` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `user_password` int(11) NOT NULL,
  `email` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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

