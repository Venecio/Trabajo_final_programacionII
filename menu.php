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
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Poppins:ital,wght@1,200&display=swap" rel="stylesheet">
<script src="https://kit.fontawesome.com/c0bb3670ef.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="/tienda/estilos/estilo_menu.css">


<nav class="menu">
    <li class="productos li-izquierda"><a id="fuente" href="/tienda/index.php">Inicio</a></li>
    <li class="productos"><a id="fuente" href="/tienda/productos/verproductos.php?eleccion=hamburguesas">Hamburguesas</a></li>
    <li class="productos"><a id="fuente" href="/tienda/productos/verproductos.php?eleccion=pizzas">Pizzas</a></li>
    <li class="productos"><a id="fuente" href="/tienda/productos/verproductos.php?eleccion=bebidas">Bebidas</a></li>
    <li class="productos"><a id="fuente" href="/tienda/productos/verproductos.php?eleccion=postres">Postres</a></li>

    <li class="pr_derecha li-derecha"><i class="fas fa-sign-out-alt"></i><a id="fuente" href="/tienda/login/cerrarsesion.php">Cerrar Sesión</a></li>
    <li class="pr_derecha"><i class="fas fa-shopping-cart"></i><a id="fuente" href="/tienda/carrito/vercarrito.php">Carrito (<?php echo $rows ?>)</a></li>
    <li class="pr_derecha "><i class="fas fa-history"></i><a id="fuente" href="/tienda/carrito/historialcompras.php">Compras</a></li>
</nav>