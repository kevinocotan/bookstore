<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once "app/views/sections/css.php"; ?>
    <link rel="shortcut icon" href="<?php echo URL;?>public_html/images/avatar.jpg" type="image/x-icon">
    <title>..::BookStore::..</title>
</head>
<body>
    <div class="container">
        <!--Todos los elementos del encabezado-->
        <section id="encabezado">
            <?php include_once "app/views/sections/header_user.php"; ?>
        </section>
        <!--Opciones de menu-->
        <section id="menu">
            <?php include_once "app/views/sections/menu_user.php"; ?>
        </section>
        <!-- Todos los elementos que varian-->
        <section id="contenido">
            <div class="container">
                <h3>Un poco de historia</h3>
                <p>Somos una empresa de venta de libros de todo tipo, fundada en 
                    los 1998.
                </p>
                <p>Sus creadores son Jose Batres y Maria Juarez</p>
            </div>
        </section>
    <!--Todos los elementos del pie del sitio-->
        <section id="pie">
            <?php include_once "app/views/sections/footer_user.php"; ?>
        </section>
    </div>
    <?php include_once "app/views/sections/scripts_user.php"; ?>
</body>
</html>