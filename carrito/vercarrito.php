<?php
require("../conexion/conexion.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Productos actuales en carrito</title>
</head>

<body>
    

        <?php

        $id_user = $_SESSION['id_user'];
        $consulta = "SELECT *
            FROM compras,productos,usuarios
            WHERE compras.id_user = usuarios.id_user AND productos.id_producto = compras.id_producto 
            AND compras.estado_compra = 0 AND compras.id_user = $id_user";
        $resultado = mysqli_query($conexion, $consulta);
        if(mysqli_num_rows($resultado)>0){
        ?>


        <h2>Productos que hay actualmente</h2>
        <table>
            <tr>
                <th>Producto</th>
                <th>Descripcion</th>
                <th>Precio</th>
            </tr>
        <?php
        $c = 0; 
        $numero_compra = 0;   

        while ($row= mysqli_fetch_array($resultado)) {
            if($c==0){
                $numero_compra=$row['numero_compra'];
            }
        ?>
            <tr>
                <td><?php echo $row['producto_nombre'] ?></td>
                <td><?php echo $row['producto_descripcion'] ?></td>
                <td><?php echo "$" . $row['producto_precio'] ?></td>
                <td><?php echo '<a class="eliminar" href="' . htmlspecialchars("eliminarproducto.php?id=" . urlencode($row['id_producto']))
                        . '" >Eliminar</a>' ?></td>

            </tr>
            <?php 
             $total[$c] = $row['producto_precio'] ?>
             
        <?php
            $c++;
        }

        ?>
        
        <tr>
            <th>Total $<?php echo array_sum($total) ?></th>
        </tr>

    </table>
    <?php echo '<a class="eliminar" href="' . htmlspecialchars("compradef.php?numero_compra=" . urlencode($numero_compra))
                        . '" >Comprar</a>' ?>
    <?php
    }else{
        echo "<h2>No hay nada en el carrito</h2>";  
    }
    ?>
</body>

</html>