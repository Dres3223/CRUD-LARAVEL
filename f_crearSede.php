<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>CREAR SEDE</title>
</head>
<body>
<?php
        include 'barraMenu.php';
    ?>
    <div class="contenedorFormulario">
            <a class="boton botonAzul" href="listaSedes.php"><</a>
            <a class="boton botonAzul" href="index.php">MENU</a>
            <h1>CREAR SEDE</h1>
            <form method="POST"action="c_crearSede.php">
                <div class="contenedorInput">
                    <label for="">NOMBRE</label>
                    <input placeholder="Ingresa nombre de la sede"class="trans" required type="text" name="nombreSede">
                </div>
                <div class="contenedorInput">
                    <input class="boton botonVerde" type="submit" >
                </div>
            </form>
        </div>
</body>
</html>