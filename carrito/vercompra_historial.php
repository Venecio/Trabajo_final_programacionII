<?php
require("../conexion/conexion.php");
include("../menu.php");
$numero_compra = $_GET['numero_compra'];
$consulta = "SELECT productos.producto_nombre, productos.producto_precio, productos.producto_descripcion, compras.numero_compra 
            FROM productos 
            INNER JOIN compras 
            ON compras.id_producto = productos.id_producto
            WHERE compras.estado_compra = 1 AND compras.id_user = $id_user AND compras.numero_compra = $numero_compra";
$resultado = mysqli_query($conexion, $consulta);
?>
<title>Compra detallada</title>
<link rel="stylesheet" href="../estilos/estilo_historial.css">
<h1 class="htitulo">Productos correspondientes a su compra</h1>
<link rel="shortcut icon" href="../../tienda/productos/recursos/favicon/icono.png" type="image/x-icon">

<table class="tabla">
    <tr>
        <th class="hth">Numero compra: <?php echo $numero_compra; ?></th>
    </tr>
    <tr>
        <th class="hth">Numero compra</th>
        <th class="hth">Precio</th>
        <th class="hth">Descripcion</th>
    </tr>

    <?php

    $total_compra = 0;
    while ($row = mysqli_fetch_array($resultado)) {
    ?>
        <tr class="item">
            <td><?php echo $row['producto_nombre'] ?></td>
            <td><?php echo "$".$row['producto_precio'] ?></td>
            <td><?php echo $row['producto_descripcion'] ?></td>
        </tr>

    <?php
        $total_compra = $total_compra + $row['producto_precio'];
    }
    ?>
    <tr class="hth">
        <th>Total de la compra: </th>
        <th><?php echo "$".$total_compra; ?></th>
    </tr>
   
   
</table>