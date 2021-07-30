<?php
require("../conexion/conexion.php");
$id=$_REQUEST['id_compra'];
$consulta="DELETE FROM compras WHERE id_compra = '$id'";
$resultado=mysqli_query($conexion,$consulta);

if($resultado){
    header("Location: vercarrito.php");
}
?>