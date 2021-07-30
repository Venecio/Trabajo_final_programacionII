<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ./login/login.php");
}
$id_user = $_SESSION['id_user'];
$consulta = "SELECT * FROM compras WHERE id_user = '$id_user' and estado_compra = 0";
$resultado = mysqli_query($conexion, $consulta);
$rows = mysqli_num_rows($resultado);   //ver productos del carrito();      

?>
<link rel="stylesheet" href="estilomenu.css">
<body>
    <header>
        <nav class="menu">
            <li><a href="/tienda/index.php">Inicio</a></li>
            <li><a href="/tienda/productos/verproductos.php?eleccion=hamburguesas">Hamburguesas</a></li>
            <li><a href="/tienda/productos/verproductos.php?eleccion=pizzas">Pizzas</a></li>
            <li><a href="/tienda/productos/verproductos.php?eleccion=bebidas">Bebidas</a></li>
            <li><a href="/tienda/productos/verproductos.php?eleccion=postres">Postres</a></li>
            
            <li><a href="/tienda/carrito/comprashistorial.php">Compras</a></li>
            <li><a href="/tienda/carrito/vercarrito.php">Carrito (<?php echo $rows ?>)</a></li>
            <li><a href="/tienda/login/cerrarsesion.php">Cerrar Sesión</a></li>
        </nav>
    </header>

    <footer>

    </footer>
</body>

</html>