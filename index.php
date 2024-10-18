<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>PRINCIPAL</title>
</head>
<body>
    <?php
        include 'barraMenu.php';
    ?>
    <div class="contenedorFormulario">
        <h1>GMANTENIMIENTOS</h1>
        <br>
            <div class="contenedorInput">
                <input value="SEDES"class="boton botonAzul total" type="button"onclick="window.location.href='listaSedes.php';"></input>
            </div>
            <div class="contenedorInput">
                <input value="SALAS"class="boton botonAzul total" type="button"onclick="window.location.href='listaSalas.php';"></input>
            </div>
            <div class="contenedorInput">
                <input value="MARCAS"class="boton botonAzul total" type="button"onclick="window.location.href='listaMarcas.php';"></input>
            </div>
            <div class="contenedorInput">
                <input value="MONITORES"class="boton botonAzul total" type="button"onclick="window.location.href='listaMonitores.php';"></input>
            </div>
            <div class="contenedorInput">
                <input value="EQUIPOS"class="boton botonAzul total" type="button"onclick="window.location.href='listaEquipos.php';"></input>
            </div>
            <div class="contenedorInput">
                <input value="MANTENIMIENTOS"class="boton botonAzul total" type="button"onclick="window.location.href='listaMantenimientos.php';"></input>
            </div>
    </div>
</body>
</html>