<?php

session_start();
if (isset($_SESSION['username'])) {
    if ($_SESSION['username'] == "username") {
        header("Location: index.php");
    }
} else {
    header("Location: ./login/login.php");
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <header>
        <nav class="menu">

            <h1>Bienvenid@ <?php echo $_SESSION['username'] ?></h1>
            <li><a href="../tienda/productos/verproductos.php?eleccion=Hamburguesa">Hamburguesas</a></li>
            <li><a href="../tienda/productos/verproductos.php?eleccion=Pizza">Pizzas</a></li>
            <li><a href="">Embutidos</a></li>
            <li><a href="../tienda/productos/verproductos.php?eleccion=Bebidas">Bebidas</a></li>
            <li><a href="./login/cerrarsesion.php">Cerrar Sesión</a></li>
            

        </nav>
    </header>

    <footer>

    </footer>
</body>

</html>