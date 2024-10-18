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
    <title>CREAR MANTENIMIENTO</title>
</head>
<body>
<?php
        include 'barraMenu.php';
    ?>
    <div class="contenedorFormulario">
    <br>
        <br>
        <br>
        <br>
        <a class="boton botonAzul" href="listaMantenimientos.php"><</a>
        <a class="boton botonAzul" href="index.php">MENU</a>
        <h1>CREAR MANTENIMIENTO</h1>
        <form method="post"action="c_crearMantenimiento.php">
        <div class="contenedorInput trans">
                <label for="">EQUIPO</label>
                <select required name="idequipo">
                    <option value="" disabled selected>Elige equipo</option>
                    <?php
                            $sql_equipos = "select * from equipos where Estado = 1";
                            $eje_equipos = $conexion->query($sql_equipos);
                            while($reg_equipos = $eje_equipos->fetch_array()){
                                echo "<option value='".$reg_equipos["id"]."'>".$reg_equipos["codigo"]."</option>";
                            }
                        ?>
                </select>
            </div>
            <div class="contenedorInput trans">
                <label for="">TIPO DE MANTENIMIENTO</label>
                <select required name="tipoMantenimiento">
                    <option value="Preventivo">Preventivo</option>
                    <option value="Correctivo">Correctivo</option>
                </select>
            </div>
            <div class="contenedorInput trans">
                <label for="">PROBLEMA</label>
                <textarea required name="problema"></textarea>
            </div>
            <div class="contenedorInput trans">
                <label for="">FECHA INICIO</label>
                <input required class="trans"name="fechaInicio"type="date">
            </div>
            <div class="contenedorInput trans">
                <label for="">MONITOR</label>
                <select required name="monitor">
                    <option value="" disabled selected>Elige monitor encargado</option>
                    <?php
                            $sql_monitores = "select * from monitores";
                            $eje_monitores = $conexion->query($sql_monitores);
                            while($reg_monitores = $eje_monitores->fetch_array()){
                                echo "<option value='".$reg_monitores["id"]."'>".$reg_monitores["nombre"]."</option>";
                            }
                        ?>
                </select>
            </div>
            <div class="contenedorInput">
                <input class="boton botonVerde" type="submit" >
            </div>
        </form>
    </div>
</body>
</html>