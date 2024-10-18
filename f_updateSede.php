<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>UPDATE SEDE</title>
</head>
<body>
<?php
        include 'barraMenu.php';
    ?>
    <?php
        //Conexion con la base
        include 'conexion.php';
        $conexion = conexion();
        
        // Recuperamos el id de la sede del enlace con elmetodo GET
        $idSede = $_GET["idSede"];
        // Componemos la sentencia SQL
        $ssql = "select * from sedes where id=".$idSede;

        // Ejecutamos la sentencia SQL
        $result = $conexion->query($ssql);
        $row = $result->fetch_array();
        ?>
        <div class="contenedorFormulario">
            <a class="boton botonAzul" href="listaSedes.php"><</a>
            <a class="boton botonAzul" href="index.php">MENU</a>
            <h1>UPDATE SEDE</h1>
            <form method="POST"action="c_updateSede.php">
                <div class="contenedorInput">
                    <input type="hidden" name="id" value="<?php echo $idSede;?>" readonly>
                    <label for="">NOMBRE</label>
                    <input class="trans"required placeholder="Ingresa nombre de sede"type="TEXT" name="nombre" value="<?php echo $row["nombre"];?>">
                </div>
                <div class="contenedorInput">
                    <input class="boton botonVerde" type="submit" >
                </div>
            </form>
        </div>
</body>
</html>