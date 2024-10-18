<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>UPDATE MONITOR</title>
</head>
<body>
<?php
        include 'barraMenu.php';
    ?>
    <?php
        //Conexion con la base
        include 'conexion.php';
        $conexion = conexion();
        
        // Recuperamos el cc del monitor del enlace con elmetodo GET
        $CCMonitor = $_GET["CCMonitor"];
        // Componemos la sentencia SQL
        $ssql = "select * from monitores where cc=".$CCMonitor;

        // Ejecutamos la sentencia SQL
        $result = $conexion->query($ssql);
        $row = $result->fetch_array();
    ?>
    <div class="contenedorFormulario">
            <a class="boton botonAzul" href="listaMonitores.php"><</a>
            <a class="boton botonAzul" href="index.php">MENU</a>
            <h1>UPDATE MONITOR</h1>
            <form method="POST"action="c_updateMonitor.php">
                <div class="contenedorInput">
                    <input type="hidden" name="id" value="<?php echo $CCMonitor;?>" readonly>
                    <label for="">IDENTIFICACION</label>
                    <input class="trans" required placeholder="Ingresa identificacion de monitor"type="TEXT" name="CCMonitor" value="<?php echo $row["cc"];?>">
                </div>
                <div class="contenedorInput">
                    <label for="">NOMBRE</label>
                    <input class="trans" required placeholder="Ingresa nombre de monitor"type="TEXT" name="nombreMonitor" value="<?php echo $row["nombre"];?>">
                </div>
                <div class="contenedorInput">
                    <input class="boton botonVerde" type="submit" >
                </div>
            </form>
        </div>
</body>
</html>