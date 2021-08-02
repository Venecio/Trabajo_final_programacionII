<?php
require("../conexion/conexion.php");
$numero_compra=$_REQUEST['numero_compra'];
session_start();
$id_user=$_SESSION['id_user'];
$consulta="UPDATE compras 
            SET estado_compra = 1
            WHERE numero_compra = $numero_compra
            AND id_user = $id_user";
$resultado=mysqli_query($conexion,$consulta);  
header("Location: ../index.php");  