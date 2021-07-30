<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Productos disponibles</title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Scar bootstrap e importar tus css-->
    
    
</head>
<body>

    <?php
    require("../conexion/conexion.php");
    include("../menu.php");

    if ($_GET['eleccion'] == "hamburguesas") {
        $producto = "hamburguesas";
    } elseif ($_GET['eleccion'] == "pizzas") { 
        $producto = "pizzas";
    } elseif ($_GET['eleccion'] == "bebidas") {
        $producto = "bebidas";
    }elseif ($_GET['eleccion'] == "postres") {
        $producto = "postres";
    }
    if (isset($producto)){
        
        $consulta = "SELECT * FROM productos WHERE tipo_producto LIKE '%" . "$producto" . "%'";
            $result = mysqli_query($conexion, $consulta);
    ?>

        <div class="contenedor">
            <?php

            while ($row = mysqli_fetch_array($result)) {
                $path=$row['producto_imagen'];
            ?>
                <div class="item">
                <img src=<?php echo "/tienda/productos/recursos/$path"; ?> width="200" height="200">
                    <?php echo $row['producto_nombre'] ?><br>
                    <?php echo $row['producto_descripcion'] ?><br>
                    <?php echo $row['tipo_producto'] ?><br>
                    <?php echo "$" . $row['producto_precio'] ?><br>
                    <?php echo '<a class="comprarbttn" href="' . htmlspecialchars("../carrito/carrito.php?id=" . urlencode($row['id_producto'])."&eleccion=$producto") . '" >Comprar</a>' ?>
                </div>
            <?php
            }
            ?>
        </div>

    <?php
    } else {

        echo "<h2>Debe seleccionar un producto para comprar</h2>";
    }
    ?>
</body>
</html>