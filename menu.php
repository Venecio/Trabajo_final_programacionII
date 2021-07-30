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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/tienda/estilos/estilo_menu.css">
    <title>Bienvenido</title>
</head>

<body>
    <header>
        <div class="menucompleto">
            <nav class="menu">
                <li class="productos"><a href="/tienda/index.php">Inicio</a></li>
                <li class="productos"><a href="/tienda/productos/verproductos.php?eleccion=hamburguesas">Hamburguesas</a></li>
                <li class="productos"><a href="/tienda/productos/verproductos.php?eleccion=pizzas">Pizzas</a></li>
                <li class="productos"><a href="/tienda/productos/verproductos.php?eleccion=bebidas">Bebidas</a></li>
                <li class="productos"><a href="/tienda/productos/verproductos.php?eleccion=postres">Postres</a></li>
                <li class="pr_derecha"><a href="/tienda/carrito/vercarrito.php">Carrito (<?php echo $rows ?>)</a></li>
                <li class="pr_derecha"><a href="/tienda/carrito/historialcompras.php">Compras</a></li>
                <li class="pr_derecha"><a href="/tienda/login/cerrarsesion.php">Cerrar Sesión</a></li>
            </nav>
        </div>
    </header>

    <footer>

    </footer>
</body>

</html>