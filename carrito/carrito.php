  
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

    // echo $numero_compra;
    // Si hay items en el carrito entra aca y toma el valor que esos productos tengan en su numero de compra
    $consulta = "INSERT INTO compras (id_user,id_producto,estado_compra,numero_compra) VALUES ($id_user,$id_producto,0,$num_compra)";
    $resultado = mysqli_query($conexion, $consulta);
} else {
    // Si no hay items en el carrito entra aca y debe validar primero cual es el ultimo comprobante de compras
    $consulta = "SELECT MAX(numero_compra) as numero FROM compras";
    $resultado = mysqli_query($conexion, $consulta);

    $row = mysqli_fetch_assoc($resultado);
    $numero = (int)$row['numero'];

    echo $numero;    
    if ($numero >= 0) {
        $numero = $numero + 1;
    }

    // Una vez calculado el valor para el numero de compra que debo insertar hago la query . La siguiente vez q inserte un producto el carrito ya contendra el primer valor insertado
    $consulta = "INSERT INTO compras (id_user,id_producto,estado_compra,numero_compra) VALUES ($id_user,$id_producto,0,$numero)";
    $resultado = mysqli_query($conexion, $consulta);
}

// Redireccionamos a la pagina de la cual estamos comprando para mejorar la usabilidad del cliente 
if ($_GET['eleccion'] == 'hamburguesas') {
    header("Location: /Trabajo_final_programacionII/productos/verproductos.php?eleccion=hamburguesas");
}
if ($_GET['eleccion'] == 'pizzas') {
    header("Location: /Trabajo_final_programacionII/productos/verproductos.php?eleccion=pizzas");
}
if ($_GET['eleccion'] == 'bebidas') {
    header("Location: /Trabajo_final_programacionII/productos/verproductos.php?eleccion=bebidas");
}