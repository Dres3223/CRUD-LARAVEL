<!DOCTYPE html>
<?php
    include "conexion.php";
    $conexion = conexion();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>CREAR SALA</title>
</head>
<body>
<?php
        include 'barraMenu.php';
    ?>
    <div class="contenedorFormulario">
            <a class="boton botonAzul" href="listaSalas.php"><</a>
            <a class="boton botonAzul" href="index.php">MENU</a>
            <h1>CREAR SALA</h1>
            <form method="post"action="c_crearSala.php">
                <div class="contenedorInput">
                    <label for="">NOMBRE</label>
                    <input class="trans" required type="text" name="nombreSala">
                </div>
                <div class="contenedorInput trans">
                    <label for="">SEDE</label>
                    <select required name="idsede">
                        <option value="" disabled selected>Elige una Opcion</option>
                        <?php
                            $sql_sedes = "select * from sedes";
                            $eje_sedes = $conexion->query($sql_sedes);
                            while($reg_sedes = $eje_sedes->fetch_array()){
                                echo "<option value='".$reg_sedes["id"]."'>".$reg_sedes["nombre"]."</option>";
                            }
                        ?>
                    </select>
                </div><br>
                <div class="contenedorInput">
                    <input class="boton botonVerde" type="submit" >
                </div>
            </form>
        </div>
</body>
</html>