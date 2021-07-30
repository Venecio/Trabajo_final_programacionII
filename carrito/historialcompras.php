<?php
require("../conexion/conexion.php");
session_start();
$id_user = $_SESSION['id_user'];
$consulta = "SELECT compras.numero_compra, SUM(productos.producto_precio) 
FROM compras 
INNER JOIN productos 
ON compras.id_producto = productos.id_producto
WHERE compras.estado_compra = 1 AND compras.id_user = '$id_user'
GROUP BY compras.numero_compra";
$resultado = mysqli_query($conexion, $consulta);
print_r($resultado);
?>
<table>
    <tr>
        <th>Numero compra</th>
        <th>Total</th>
        <th>Accion</th>
    </tr>

    <?php
    while ($row = mysqli_fetch_array($resultado)) {
        print_r($row);
    ?>
        <tr class="item">
            <td><?php echo $row['numero_compra'] ?></td><br>
            <td><?php echo $row['SUM(productos.producto_precio)'] ?></td><br>
            <td><?php echo '<a class="vercompra" href="' . htmlspecialchars("../carrito/carrito.php?numero_compra=" . urlencode($row['numero_compra']) . "&eleccion=Hamburguesa")
                    . '" >Ver compra</a>' ?></td>
    </tr>
    <?php
    }
    ?>
</table>