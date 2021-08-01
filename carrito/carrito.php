  
<?php
require("../conexion/conexion.php");

$id_producto = $_REQUEST['id'];
session_start();
$id_user = $_SESSION['id_user'];
$consulta = "SELECT * FROM compras WHERE id_user = '$id_user' and estado_compra = 0";
$resultado = mysqli_query($conexion, $consulta);
$cantidad_productos_carrito = mysqli_num_rows($resultado);

if ($cantidad_productos_carrito > 0) {

    $productos_carrito = mysqli_fetch_assoc($resultado);
    $num_compra = $productos_carrito['numero_compra'];

    $consulta = "INSERT INTO compras (id_user,id_producto,estado_compra,numero_compra) VALUES ($id_user,$id_producto,0,$num_compra)";
    $resultado = mysqli_query($conexion, $consulta);
} else {

    $consulta = "SELECT MAX(numero_compra) as numero FROM compras";
    $resultado = mysqli_query($conexion, $consulta);

    $row = mysqli_fetch_assoc($resultado);
    $numero = (int)$row['numero'];

    echo $numero;
    if ($numero >= 0) {
        $numero = $numero + 1;
    }


    $consulta = "INSERT INTO compras (id_user,id_producto,estado_compra,numero_compra) VALUES ($id_user,$id_producto,0,$numero)";
    $resultado = mysqli_query($conexion, $consulta);
}


if ($_GET['eleccion'] == 'hamburguesas') {
    header("Location: /tienda/productos/verproductos.php?eleccion=hamburguesas");
}
if ($_GET['eleccion'] == 'pizzas') {
    header("Location: /tienda/productos/verproductos.php?eleccion=pizzas");
}
if ($_GET['eleccion'] == 'bebidas') {
    header("Location: /tienda/productos/verproductos.php?eleccion=bebidas");
}
if ($_GET['eleccion'] == 'postres') {
    header("Location: /tienda/productos/verproductos.php?eleccion=postres");
}
