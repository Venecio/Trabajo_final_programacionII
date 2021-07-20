<link rel="stylesheet" href="../estilos/estilo_productos.css">
<?php
if ($_GET['eleccion'] == "Hamburguesa") {
    require("../conexion/conexion.php");
?>

    <div class="contenedor">
        <?php
       
        $consulta = "SELECT * FROM productos WHERE producto_nombre LIKE '%" . "Hamburguesa" . "%'";
        $result = mysqli_query($conexion, $consulta);
        while ($row = mysqli_fetch_array($result)) {
            $path=$row['producto_imagen'];
        ?>
            <div class="item">
            <img src=<?php echo "$path"; ?> width="200" height="200">
                <td><?php echo $row['producto_nombre'] ?></td><br>
                <td><?php echo $row['producto_descripcion'] ?></td><br>
                <td><?php echo $row['tipo_producto'] ?></td><br>
                <td><?php echo "$" . $row['producto_precio'] ?></td><br>
                <td><?php echo '<a class="comprarbttn" href="' . htmlspecialchars("../../visual/modificarform.php?id=" . urlencode($row['id_producto']))
                        . '" >Comprar</a>' ?></td>
            </div>
        <?php
        }
        ?>
    </div>
<?php
} elseif ($_GET['eleccion'] == "Pizza") {
    require("../conexion/conexion.php");

?>

    <div class="contenedor">
        <?php
        $consulta = "SELECT * FROM productos WHERE producto_nombre LIKE '%" . "Pizza" . "%'";
        $result = mysqli_query($conexion, $consulta);
        while ($row = mysqli_fetch_array($result)) {
        ?>
            <div class="item">
                <td><?php echo $row['producto_nombre'] ?></td><br>
                <td><?php echo $row['producto_descripcion'] ?></td><br>
                <td><?php echo $row['tipo_producto'] ?></td><br>
                <td><?php echo "$" . $row['producto_precio'] ?></td><br>
                <td><?php echo '<a class="comprarbttn" href="' . htmlspecialchars("../../visual/modificarform.php?id=" . urlencode($row['id_producto']))
                        . '" >Comprar</a>' ?></td>
            </div>
        <?php
        }
        ?>
    </div>
<?php
}elseif ($_GET['eleccion'] == "Bebidas") {
    require("../conexion/conexion.php");

?>

    <div class="contenedor">
        <?php
        $consulta = "SELECT * FROM productos WHERE tipo_producto = 'bebida'";
        $result = mysqli_query($conexion, $consulta);
        while ($row = mysqli_fetch_array($result)) {
        ?>
            <div class="item">
                <td><?php echo $row['producto_nombre'] ?></td><br>
                <td><?php echo $row['producto_descripcion'] ?></td><br>
                <td><?php echo $row['tipo_producto'] ?></td><br>
                <td><?php echo "$" . $row['producto_precio'] ?></td><br>
                <td><?php echo '<a class="comprarbttn" href="' . htmlspecialchars("../../visual/modificarform.php?id=" . urlencode($row['id_producto']))
                        . '" >Comprar</a>' ?></td>
            </div>
        <?php
        }
        ?>
    </div>
<?php
}


