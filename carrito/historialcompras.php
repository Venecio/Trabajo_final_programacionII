<?php
require("../conexion/conexion.php");
include("../menu.php");
$id_user = $_SESSION['id_user'];
$consulta = "SELECT compras.numero_compra, SUM(productos.producto_precio) 
FROM compras 
INNER JOIN productos 
ON compras.id_producto = productos.id_producto
WHERE compras.estado_compra = 1 AND compras.id_user = '$id_user'
GROUP BY compras.numero_compra";
$resultado = mysqli_query($conexion, $consulta);
if (mysqli_num_rows($resultado) > 0) {
?>

<title>Historial de compras</title>

    <body>
        <link rel="stylesheet" href="../estilos/estilo_historial.css">

        <div class="contenedor">
            <table class="tabla">
                <tr>
                    <th class="hth">Numero compra</th>
                    <th class="hth">Total</th>
                    <th class="hth">Accion</th>
                </tr>

                <?php
                while ($row = mysqli_fetch_array($resultado)) {
                ?>
                    <tr class="item">
                        <td class="htd"><?php echo $row['numero_compra'] ?></td><br>
                        <td class="htd"><?php echo "$" . $row['SUM(productos.producto_precio)'] ?></td><br>
                        <td class="htd"><?php echo '<a class="vercompra" href="' . htmlspecialchars("vercompra_historial.php?numero_compra=" . urlencode($row['numero_compra']))
                                            . '" >Ver compra</a>' ?></td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
    <?php
}else{
    echo "<h2 class='h2-carrito'>No hay datos de tus compras anteriores.</h2>";
}
    ?>
    </body>
