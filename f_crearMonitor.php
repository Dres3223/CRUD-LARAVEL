<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>CREAR MONITOR</title>
</head>
<body>
<?php
        include 'barraMenu.php';
    ?>
    <div class="contenedorFormulario">
        <a class="boton botonAzul" href="listaMonitores.php"><</a>
        <a class="boton botonAzul" href="index.php">MENU</a>
        <h1>CREAR MONITOR</h1>
        <form method="post"action="c_crearMonitor.php">
            <div class="contenedorInput">
                <label for="">IDENTIFICACION</label>
                <input class="trans"required placeholder="Ingresa identificacion de monitor"type="TEXT" name="CCMonitor">
            </div>
            <div class="contenedorInput">
                <label for="">NOMBRE</label>
                <input class="trans"required placeholder="Ingresa nombre de monitor"type="TEXT" name="nombreMonitor">
            </div>
            <div class="contenedorInput">
                <input class="boton botonVerde" type="submit" >
            </div>
        </form>
    </div>
</body>
</html>