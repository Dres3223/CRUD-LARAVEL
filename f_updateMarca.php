<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>UPDATE MARCA</title>
</head>
<body>
<?php
        include 'barraMenu.php';
    ?>
    <?php
        //Conexion con la base
        include 'conexion.php';
        $conexion = conexion();
        
        // Recuperamos el id de marca del enlace con elmetodo GET
        $idMarca = $_GET["idMarca"];
        // Componemos la sentencia SQL
        $ssql = "select * from marcas where id=".$idMarca;

        // Ejecutamos la sentencia SQL
        $result = $conexion->query($ssql);
        $row = $result->fetch_array();
    ?>
    <div class="contenedorFormulario">
        <a class="boton botonAzul" href="listaMarcas.php"><</a>
        <a class="boton botonAzul" href="index.php">MENU</a>
        <h1>UPDATE MARCA</h1>
        <form method="post"action="c_updateMarca.php">
            <div class="contenedorInput">
                <input type="hidden" name="id" value="<?php echo $idMarca;?>" readonly>
                <label for="">NOMBRE</label>
                <input class="trans" required placeholder="Ingresa nombre de marca"type="TEXT" name="nombreMarca" value="<?php echo $row["nombre"];?>">
            </div>
            <div class="contenedorInput">
                <input class="boton botonVerde" type="submit" >
            </div>
        </form>
    </div>
</body>
</html>