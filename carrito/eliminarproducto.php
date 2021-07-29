<?php
require("../conexion/conexion.php");
$id=$_REQUEST['id'];
$consulta="DELETE FROM compras WHERE id_producto = '$id'";
$resultado=mysqli_query($conexion,$consulta);

if($resultado){
    header("Location: vercarrito.php");
}
?>