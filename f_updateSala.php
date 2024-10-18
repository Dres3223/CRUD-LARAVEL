<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>UPDATE SALA</title>
</head>
<body>
<?php
        include 'barraMenu.php';
    ?>
    <?php
        //Conexion con la base
        include 'conexion.php';
        $conexion = conexion();
        
        // Recuperamos el id de la sala del enlace con elmetodo GET
        $idSala = $_GET["idSala"];
        // Componemos la sentencia SQL
        $ssql = "select * from salas where id=".$idSala;

        // Ejecutamos la sentencia SQL
        $result = $conexion->query($ssql);
        $row = $result->fetch_array();
    ?>
    <div class="contenedorFormulario">
        <a class="boton botonAzul" href="listaSalas.php"><</a>
        <a class="boton botonAzul" href="index.php">MENU</a>
        <h1>UPDATE SALA</h1>
        <form method="post"action="c_updateSala.php">
            <div class="contenedorInput">
                <input type="hidden" name="id" value="<?php echo $idSala;?>" readonly>
                <label for="">NOMBRE</label>
                <input class="trans"required placeholder="Ingresa nombre de sala"type="TEXT" name="nombreSala" value="<?php echo $row["nombre"];?>">
            </div>
            <div class="contenedorInput trans">
                <label for="">SEDE</label>
                <select required name="idsede">
                    <option value="" disabled selected>Elige una opcion</option>
                    <?php
                        $sql_sedes = "select * from sedes";
                        $eje_sedes = $conexion->query($sql_sedes);
                            while($reg_sedes = $eje_sedes->fetch_array()){
                                $selected = ($reg_sedes["id"] == $row["id_sedes"]) ? 'selected' : '';
                                echo "<option $selected value='" . $reg_sedes["id"] . "'>" . $reg_sedes["nombre"] . "</option>";
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