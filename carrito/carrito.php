<?php
require("../conexion/conexion.php");
$id_producto = $_REQUEST['id'];
session_start();
$id_user = $_SESSION['id_user'];
$consulta = "SELECT * FROM compras WHERE id_user = '$id_user' and estado_compra = 0";
$resultado = mysqli_query($conexion, $consulta);
$row = mysqli_num_rows($resultado);
$valores_consulta = mysqli_fetch_assoc($resultado);
$num_compra = $valores_consulta['numero_compra'];

if ($row > 0) {
    $consulta = "INSERT INTO compras (id_user,id_producto,estado_compra,numero_compra) VALUES ($id_user,$id_producto,0,$num_compra)";
    $resultado = mysqli_query($conexion, $consulta);
} else {
    $numero = "SELECT MAX(numero_compra) FROM compras";
    if ($numero >= 0) {
        $numero = $numero + 1;
    }
    $consulta = "INSERT INTO compras (id_user,id_producto,estado_compra,numero_compra) VALUES ($id_user,$id_producto,0,$numero)";
    $resultado = mysqli_query($conexion, $consulta);
}

if ($_GET['eleccion'] == 'Hamburguesa') {
    header("Location: ../productos/verproductos.php?eleccion=Hamburguesa");
}
if ($_GET['eleccion'] == 'Pizza') {
    header("Location: ../productos/verproductos.php?eleccion=Pizza");
}
if ($_GET['eleccion'] == 'Bebidas') {
    header("Location: ../productos/verproductos.php?eleccion=Bebidas");
}
