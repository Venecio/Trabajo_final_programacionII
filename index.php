<html lang="en">

<head>
    <title>Bienvenido</title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./estilos/estilo_index.css">
    <link rel="shortcut icon" href="./productos/recursos/favicon/icono.png" type="image/x-icon">
</head>

<body>
    <?php
    require("./conexion/conexion.php");
    include("./menu.php"); ?>

    <h1 class="h1index">Bienvenid@ a la tienda <span class="usercolor"><?php echo $_SESSION['username']; ?></span></h1>
    <h2 class="h2index">Nuestro servicio consta de enviarte toda la comida que compres hasta tu casa<h2>
    <h3 class="h3index">Contamos con una alta variedad de comidas, bebidas y postres para que puedas armar a tu gusto</h3>
        <div class="slider">
             <ul>
                <li><img src="./productos/recursos/slider/hambur.jpg" alt=""></li>
                <li><img src="./productos/recursos/slider/pizza.jpg" alt=""></li>
            </ul>
        </div>
    <footer>

    </footer>
</body>

</html>