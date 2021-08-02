<?php
require("../conexion/conexion.php");
include("../menu.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Productos actuales en carrito</title>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="/productos/recursos/favicon/icono.png" type="image/x-icon">
</head>

<body>
    <?php
    $id_user = $_SESSION['id_user'];
    $consulta = "SELECT *
                FROM compras,productos,usuarios
                WHERE compras.id_user = usuarios.id_user AND productos.id_producto = compras.id_producto 
                AND compras.estado_compra = 0 AND compras.id_user = $id_user";
    $resultado = mysqli_query($conexion, $consulta);
    if (mysqli_num_rows($resultado) > 0) {
    ?>
        <table class="tabla-carrito">
            <h2 class="h2-carrito">Productos que hay actualmente</h2>
            <tr>
                <th class="cth">Producto</th>
                <th class="cth">Descripcion</th>
                <th class="cth">Precio</th>
                <th class="cth">Acción</th>
            </tr>
            <?php
            $c = 0;
            $numero_compra = 0;

            while ($row = mysqli_fetch_array($resultado)) {
                if ($c == 0) {
                    $numero_compra = $row['numero_compra'];
                }
            ?>
                <tr>
                    <td class="ctd"><?php echo $row['producto_nombre'] ?></td>
                    <td class="ctd"><?php echo $row['producto_descripcion'] ?></td>
                    <td class="ctd"><?php echo "$" . $row['producto_precio'] ?></td>
                    <td class="ctd"><?php echo '<a class="eliminar" href="' . htmlspecialchars("eliminarproducto.php?id_compra=" . urlencode($row['id_compra'])) . '" >Eliminar</a>' ?></td>

                </tr>
                <?php
                $total[$c] = $row['producto_precio'] ?>

            <?php
                $c++;
            }

            ?>

            <tr>
                
                <th colspan="2" class="cthtotal"><?php echo '<a id="bttn-comprar" href="' . htmlspecialchars("compras.php?numero_compra=" . urlencode($numero_compra)) . '" >Comprar todo</a>' ?></th>
                <th colspan="2" class="cthtotal">Total $<?php echo array_sum($total) ?></th>
            </tr>
        </table>

    <?php

    } else {
        echo "<h2 class='h2-carrito'>No hay nada en el carrito, elegí los productos a comprar.</h2>";
    }
    ?>
</body>

</html>