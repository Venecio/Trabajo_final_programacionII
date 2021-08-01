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
<table>
    <tr>
        <th>Numero compra: <?php echo $numero_compra;?></th>
    </tr>
    <tr>
        <th>Numero compra</th>
        <th>Precio</th>
        <th>Descripcion</th>
    </tr>

    <?php

    $total_compra = 0;
    while ($row = mysqli_fetch_array($resultado)) {
    ?>
        <tr class="item">
            <td><?php echo $row['producto_nombre'] ?></td>
            <td><?php echo $row['producto_precio'] ?></td>
            <td><?php echo $row['producto_descripcion'] ?></td>
        </tr>
    <?php
    $total_compra = $total_compra + $row['producto_precio'];
    }
    ?>
</table>
<h3>Total de la compra: <?php echo $total_compra;  ?> </h3>