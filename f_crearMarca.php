<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>CREAR MARCA</title>
</head>
<body>
<?php
        include 'barraMenu.php';
    ?>
    <div class="contenedorFormulario">
        <a class="boton botonAzul" href="listaMarcas.php"><</a>
        <a class="boton botonAzul" href="index.php">MENU</a>
        <h1>CREAR MARCA</h1>
        <form method="post"action="c_crearMarca.php">
            <div class="contenedorInput">
                <label for="">NOMBRE</label>
                <input class="trans"required placeholder="Ingresa nombre de marca"type="TEXT" name="nombreMarca">
            </div>
            <div class="contenedorInput">
                <input class="boton botonVerde" type="submit" >
            </div>
        </form>
    </div>
</body>
</html>